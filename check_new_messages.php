<?php
require_once 'database.php';
session_start();

$table_name = $_SESSION['table_name'];

// Query to get the latest message timestamp
$query = "SELECT MAX(timestamp) AS latest_message_timestamp FROM $table_name";
$query_run = mysqli_query($conn, $query);

if ($query_run) {
    $row = mysqli_fetch_assoc($query_run);
    $latest_message_timestamp = $row['latest_message_timestamp'];

    // Initialize last known timestamp if not set
    if (!isset($_SESSION['last_known_message_timestamp'])) {
        $_SESSION['last_known_message_timestamp'] = '1970-01-01 00:00:00'; // Default to the Unix epoch
    }

    // Compare with the last known message timestamp stored in the session
    if ($_SESSION['last_known_message_timestamp'] < $latest_message_timestamp) {
        // New messages are available
        echo 'new_messages';

        // Update the session with the latest timestamp
        $_SESSION['last_known_message_timestamp'] = $latest_message_timestamp;
    } else {
        // No new messages
        echo 'no_new_messages';
    }
} else {
    // Handle query failure
    echo 'error';
}
?>
