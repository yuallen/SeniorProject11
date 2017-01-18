<?php

if (isset($_GET['view'])) { 
    viewTask();
}

function viewTask() {

    $servername = "localhost";
    $username = "yuallen";
    $password = "password";
    $conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    //$conn->query("INSERT INTO tasks.todo (task) VALUES ('Read');");

    $selectTasks = $conn->query("SELECT * FROM tasks.todo;");

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