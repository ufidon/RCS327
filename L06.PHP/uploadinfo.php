<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        $imagecaption = $_POST["ImageCaption"] ;
        $imagegenre = $_POST["ImageGenre"];
        $photolocation = $_POST["PhotoLocation"] ;
        $photographername = $_POST["PhotographerName"];
        
        echo $imagecaption . "<br/>";
        echo $imagegenre . "<br/>";
        echo $photolocation . "<br/>";
        echo $photographername . "<br/>";
        
        ?>
    </body>
</html>
