<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="./css/myccs.css">
        <script src="./jscript/myscript.js"></script>
        <script src="./jscript/interact.min.js"></script>
        <title > search images</title>

    </head>
    <body>
        <ul class="nav">
            <li><a class="active" href="index.html">Home</a></li>
            <li><a href="search.html">Search images</a></li>
            <li><a href="psearch.php">pSearch images</a></li>
            <li><a href="upload.html">Upload images</a></li>
            <li><a href="about.html">About</a></li>
        </ul>

        <h1> What do you want to find?</h1>
        <!-- Refer to: http://www.w3schools.com/tags/att_input_pattern.asp
        use patterns to check input
        -->
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            Image caption<br/>
            <input type="text" id="imgcap"  name="ImageCaption" value="" size="40"  title="At least one word character" /><br/>
            Image genre<br/>
            <input type="text" id="imggen"  name="ImageGenre" value="" size="40"  title="At least one word character" /><br/>
            Photoing location<br/>
            <input type="text" id="pholoc"  name="PhotoLocation" value="" size="60"  title="At least one word character" /><br/>
            Photographer Name<br/>
            <input type="text" id="phonam"  name="PhotographerName" value="" size="40"  title="At least one word character" /><br/>
            <input type='button' name="submit" value='search images'/>

            <input type="reset" name="reset"  />
        </form>



        <!-- Refer to: https://galleria.io/
        -->
        <h1> Search result shows here.</h1>

        <div id="galleria" style="height:500px">

            <?php
// Refer to : https://code.tutsplus.com/tutorials/why-you-should-be-using-phps-pdo-for-database-access--net-12059

            $target_dir = "images/";
            $filename = "";
// Get the information of the uploaded image
            $imagecaption = $_GET["imgcap"];
            $imagegenre = $_GET["imggen"];
            $photolocation = $_GET["pholoc"];
            $photographername = $_GET["phonam"];

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
                $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $DBH->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

//build query
            $sql = "SELECT * FROM tbimages  WHERE IMAGECAPTION  LIKE '%{$imagecaption}%' " .
        "OR  IMAGEGENRE LIKE '%{$imagegenre}%' " .
        "  OR  PHOTOLOCATION LIKE '%{$photolocation}%'" .
        "  OR  PHOTOGRAPHERNAME LIKE '%{$photographername}%'";


# using the shortcut ->query() method here since there are no variable
# values in the select statement.

            $STH = $DBH->prepare($sql);

            $STH->setFetchMode(PDO::FETCH_ASSOC);
            $STH->execute();
            $Result = $STH->fetchAll();

            foreach ($Result as $row) {/* ... */
                echo " <img ";
                echo "src=" . "\"" . $target_dir . $row["FILENAME"] . "\"";
                echo "data-big=" . "\"" . $target_dir . $row["FILENAME"] . "\"";
                echo "data-title=" . "\"" . $row["IMAGECAPTION"] . "\"";
                echo "data-description=" . "\"" . $row["PHOTOLOCATION"] . "\"";
                echo " />";
            }

            /*
              <!--
              <img
              src="images/Koala_climbing_tree.jpg"
              data-big="images/Koala_climbing_tree.jpg"
              data-title="Koala climbing tree"
              data-description="Koala climbing tree."
              />
              */


# close the connection
            $DBH = null;
            ?>

        </div>



        <!-- load jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
        <!-- load Galleria -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/galleria/1.4.7/galleria.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/galleria/1.4.7/themes/classic/galleria.classic.min.js"></script>
        <script>
                $(function runGalleria () {
                    Galleria.run('#galleria');
                });
        </script>


    </body>
</html>

