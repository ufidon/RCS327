<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="./css/myccs.css">
        <script src="./jscript/myscript.js"></script>

        <title > upload status</title>

    </head>
    <body>
        <ul class="nav">
            <li><a class="active" href="index.html">Home</a></li>
            <li><a href="search.html">Search images</a></li>
            <li><a href="psearch.php">pSearch images</a></li>
            <li><a href="upload.html">Upload images</a></li>
            <li><a href="about.html">About</a></li>
        </ul>

        <?php
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["fileupload"]["name"]);
        // echo $target_file;
        $uploadOk = 1;
        $errormsg = "";
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        // Check if file already exists
        if (file_exists($target_file) && is_file($target_file)) {
            $errormsg .= "Sorry, file already exists.<br/>";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileupload"]["size"] > 500000) {
            $errormsg .= "Sorry, your file is too large.<br/>";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $errormsg .= "Sorry, your file was not uploaded.<br/>";
            echo $errormsg;
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["fileupload"]["name"]) . " has been uploaded.<br>";
                $filename = basename($_FILES["fileupload"]["name"]);
                // Get the information of the uploaded image
                $imagecaption = $_POST["ImageCaption"];
                $imagegenre = $_POST["ImageGenre"];
                $photolocation = $_POST["PhotoLocation"];
                $photographername = $_POST["PhotographerName"];

                $imagecaption = mysql_real_escape_string($imagecaption);
                $imagegenre = mysql_escape_string($imagegenre);
                $photolocation = mysql_escape_string($photolocation);
                $photographername = mysql_escape_string($photographername);

                $servername = "localhost";
                $username = "rcs327";
                $password = "12345678";
                $dbname = "dbgallery";

                try {
                    # MySQL with PDO_MYSQL
                    $DBH = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }

                //build query
                $sql = "INSERT INTO tbimages (FILENAME, IMAGECAPTION, IMAGEGENRE, PHOTOLOCATION, PHOTOGRAPHERNAME) VALUES ('$filename', '$imagecaption', '$imagegenre', '$photolocation', '$photographername')";


                # STH means "Statement Handle"
                $STH = $DBH->prepare($sql);

                if ($STH->execute() === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                # close the connection
                $DBH = null;

                /*
                  // Create connection
                  $conn = new mysqli($servername, $username, $password, $dbname);
                  // Check connection
                  if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                  }

                  //build query
                  $sql = "INSERT INTO tbimages (FILENAME, IMAGECAPTION, IMAGEGENRE, PHOTOLOCATION, PHOTOGRAPHERNAME) VALUES ('$filename', '$imagecaption', '$imagegenre', '$photolocation', '$photographername')";

                  if ($conn->query($sql) === TRUE) {
                  echo "New record created successfully";
                  } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
                  }
                  $conn->close();
                 * */
            } else {
                echo "Sorry, there were errors uploading your file.<br/>";
                echo $errormsg;
            }
        }
        ?>

    </body>
</html>