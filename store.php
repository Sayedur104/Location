<?php
// Check if POST data exists
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get JSON content from POST body
    $data = json_decode(file_get_contents("php://input"), true);

    // Extract latitude and longitude
    $latitude = $data['latitude'];
    $longitude = $data['longitude'];

    // Format data to be saved
    $content = "Latitude: $latitude\nLongitude: $longitude\n";

    // File path where coordinates will be saved
    $file = 'coordinates.txt';

    // Open the file to save new coordinates
    if (file_put_contents($file, $content, FILE_APPEND | LOCK_EX) !== false) {
        echo "Coordinates saved successfully.";
    } else {
        echo "Failed to save coordinates.";
    }
} else {
    echo "Method not allowed.";
}
?>