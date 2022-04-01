<?php
//Enter information about Database host
    $host = "localhost"; 
    $dbname = "iot_db";    // Database name
    $username = "root";                    // Database username
    $password = "";                        // Database password

    // Establish connection to MySQL database, using the inbuilt MySQLi library.
    $conn = new mysqli($host, $username, $password, $dbname);

    // Check if connection established successfully
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        echo "Connected to mysql database.";
    }


  //Check if values sent by NodeMCU are not empty then insert into MySQL database table
  if(!empty($_GET['sendval1']) && !empty($_GET['sendval2']) ){
        // "sendval1" and "sendval2" are query parameters accessed from the GET Request made by the NodeMCU.
            $temperature = $_GET['sendval1'];
            $humidity = $_GET['sendval2'];

        //Update your tablename here
                $sql = "INSERT INTO dht_tab (temperature, humidity) VALUES ('".$temperature."','".$humidity."')";
                        if ($conn->query($sql) === TRUE) {
                            // If the query returns true, it means it ran successfully
                            echo "Values inserted in MySQL database table.";
                        } else {
                            echo "Error: " ;

                        }
            }
else{
echo "no data received from the device:";
}

    // Close MySQL connection
    $conn->close();
    
?>