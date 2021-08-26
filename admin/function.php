<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "eshop";

function connect("localhost", "root", "", "eshop"){
    $conn = mysqli_connect("localhost", "root", "root", "eshop");
    if (!conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function init() {
    // вывожу список товаров
    $conn = connect();

    $sql = "SELECT * FROM goods;
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $out = array();
      while($row = $result->fetch_assoc()) {
        $out[$row["id"]] = $row;
      }
      echo json_encode($out);
    } else {
      echo "0";
    }
    $conn->close();
}