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
        
        //If you are looking to run this on your desktop,
        //you will have to change the username/password/database name 
        //to what you have set for your mySQL
        $servername = "localhost";
        $username = "yuallen";
        $password = "password";
        $dbname = "tasks";

        // Create connection, included database name to create the table
        $connect = new mysqli($servername, $username, $password, $dbname);
        // Check connection, if connection fails, prints error message within
        //the webpage
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        } 

        //Creating the table, so the user does not have to do it on their own.
        //Originally created the table within mySQL command line to test
        //View tasks button
        $sql = "CREATE TABLE todo (id INT(11) NOT NULL AUTO_INCREMENT 
        PRIMARY KEY, task VARCHAR(140) DEFAULT NULL)";

        //Needed to add this line to connect to the db
        $connect->query($sql);
        
        //Testing to see if creating a button will work with php as well as
        //in html format.
        //Result: Same thing, just more typing if creating within php tags.
        echo '<input id=textbox1 type="text" name="TextBox" >';
        
        echo '<form name="View">';
        echo '<input id="sends" type="button" value="Click here to view table">';
        echo '</form>';
        ?>

        <input id="delete" type="button" value="Delete a task" />
        
        <input id="add" type="button" value="Add a task" />
        
        <p>To view the table, click on the corresponding table.</p>
        <p>To add a task, enter the task name.</p>
        <p>To delete a task, input the task number.</p>
        

    <script>
        $('#sends').click(function(){
        $.ajax({
        url:'handleAjax.php?view=true',
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
        $('#delete').click(function(){
        $.ajax({
        url:'handleAjax.php?delete=' + $('#textbox1').val(),
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
