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
        
        
        <input id=textbox1 type="text" name="TextBox" >
        
        <form name="View">
        <input id="viewButton" type="button" value="Click here to view table">
        </form>

        <input id ="delete" type="button" value ="Deletes a task"/>
        <input id ="add" type="button" value ="Adds a task"/>
        
        <p>To view the table, click on the corresponding button to view table.</p>
        <p>To add a task, enter the task name.</p>
        <p>To delete a task, input the task number.</p>

        <script>
        //handler for the view button
        $('#viewButton').click(function(){
            $.ajax({
            url:'HandlingAjax.php?view=true',
            type:'GET',
            success:function(data)
            {
                $('#view').empty();
                $('#view').append(data);
            }
            });
        });
        </script>

        <script>
        $('#add').click(function(){
            $.ajax({
            url:'handleAjax.php?add=' + $('#textbox1').val(),
            type:'GET',
            success:function(data)
            {
                $('#view').empty();
                $('#view').append(data);
            }
            });
        });
    </script>

    </body>
</html>