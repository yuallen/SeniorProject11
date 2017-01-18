<?php

if (isset($_GET['view'])) { 
    viewTask();
}

if (isset($_GET['add'])) { 
    $addTask = $_GET['add'];
    addTask($addTask);
}

if (isset($_GET['delete'])) { 
    $deleteID = $_GET['delete'];
    deleteTask($deleteID);
}

function viewTask() {

    $servername = "localhost";
    $username = "yuallen";
    $password = "password";
    $connect = new mysqli($servername, $username, $password);
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

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
    $connect = new mysqli($servername, $username, $password);
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }
    
    $selectTasks = $connect->query("INSERT INTO tasks.todo (task) VALUES ('$var');");
    echo "Adding Successful";
}

function deleteTask($var) {
    $servername = "localhost";
    $username = "yuallen";
    $password = "password";
    $connect = new mysqli($servername, $username, $password);
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }
    
    $selectTasks = $connect->query("DELETE FROM tasks.todo WHERE id = $var;");
    echo "If task number exists, it has been successfully deleted.";
}
?>
