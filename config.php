<?php
// Database configuration
define('DB_HOST', 'your-rds-endpoint.rds.amazonaws.com');
define('DB_PORT', '5432');
define('DB_NAME', 'your_database_name');
define('DB_USER', 'your_db_username');
define('DB_PASS', 'your_db_password');

// Create connection
function getDBConnection() {
    $connString = "host=".DB_HOST." port=".DB_PORT." dbname=".DB_NAME." user=".DB_USER." password=".DB_PASS;
    $conn = pg_connect($connString);
    
    if(!$conn) {
        die("Connection failed: " . pg_last_error());
    }
    return $conn;
}

// Initialize session
session_start();

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
