<?php

if (isset($_GET['view'])) { 
    viewTask();
}
if (isset($_GET['add'])) { 
    $addTask = $_GET['add'];
    addTask($addTask);
}

function viewTask() {

    $servername = "localhost";
    $username = "yuallen";
    $password = "password";
    $connect = new mysqli($servername, $username, $password);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    //$conn->query("INSERT INTO tasks.todo (task) VALUES ('Read');");

    $selectTasks = $connect->query("SELECT * FROM tasks.todo;");

    echo "<table>";

    while ($row = $selectTasks->fetch_assoc()) {
        $id = $row["id"];
        $var = $row["task"];
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$var</td>";
        echo "</tr>";
    }

    echo "</table>";
}

function addTask($var) {
    $servername = "localhost";
    $username = "yuallen";
    $password = "password";
    $conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $selectTasks = $conn->query("INSERT INTO tasks.todo (task) VALUES ('$var');");
    echo "Adding Successful";

}

?>