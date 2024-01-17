<?php
include "conn.php"; // Including database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize inputs (adjust as needed)
    $title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '';
    $artist = isset($_POST['artist']) ? htmlspecialchars($_POST['artist']) : '';
    $thumbnail = isset($_POST['thumbnail']) ? htmlspecialchars($_POST['thumbnail']) : '';
    $sheetData = isset($_POST['sheet_data']) ? htmlspecialchars($_POST['sheet_data']) : '';

    // Insert received data into the database
    $sql = "INSERT INTO music_sheets (title, artist, sheet_data, thumbnail) VALUES (?, ?, ?, ?)";
    $s = $conn->prepare($sql);

    if ($s) {
        $s->bind_param("ssss", $title, $artist, $sheetData, $thumbnail);
        if ($s->execute()) {
            echo "New record created successfully"; // Notify if insertion is successful
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error; // Display error message if insertion fails
        }
        $s->close();
    } else {
        echo "Error in query preparation";
    }
} else {
    echo "Invalid request method";
}

$conn->close(); // Closing the database connection
?>