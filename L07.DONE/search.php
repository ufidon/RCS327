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
echo  "<script>"
            ."$(function runGalleria () {Galleria.run('#galleria'); }); runGalleria (); </script>";


# close the connection
$DBH = null;
?>

