<?php
include('connection.php');

$sql = "CREATE TABLE tours (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(100) NOT NULL,
    Tour_Description VARCHAR(100) NOT NULL,
    Transport VARCHAR(100) NOT NULL,
    five_hour_three_pax FLOAT(10,2),
    five_hour_six_pax FLOAT(10,2),
    five_hour_seven_pax FLOAT(10,2),
    eight_hour_three_pax FLOAT(10,2),
    eight_hour_six_pax FLOAT(10,2),
    eight_hour_seven_pax FLOAT(10,2),
    twelve_hour_three_pax FLOAT(10,2),
    twelve_hour_six_pax FLOAT(10,2),
    twelve_hour_seven_pax FLOAT(10,2),
    Tour_Type VARCHAR(100),
    Tour_Image LONGBLOB
    )";
    if ($conn->query($sql) === TRUE)
    {
        echo "Table Tours created successfully";
    } 
    else 
    {
        echo "Error creating table: " . $conn->error;
    }
      
    $conn->close();

?>