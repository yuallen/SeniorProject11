<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <script src="./javascript/jquery.min.js"> </script>
        <title>To Do Application</title>
    </head>
    <body>
        <div id="view"></div>
        
        <?php
        $servername = "localhost";
        $username = "yuallen";
        $password = "password";
        $dbname = "tasks";

        // Create connection, included database name to create the table
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        //SQL Create the table
        $sql = "CREATE TABLE todo (
        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
        task VARCHAR(140) DEFAULT NULL
        )";
                
        ?>

    </body>
</html>
