<?php
// Enable full error reporting for debugging (remove in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config.php';

header('Content-Type: text/plain; charset=utf-8');
echo "Pension Project - DB test\n";
echo "-----------------------\n";

// Check mysqli connection
if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error . "\n";
    exit(1);
}

echo "Connected to MySQL host: $db_host\n";
echo "Database name in config: $db_name\n";

// Simple query to verify tables exist
$res = $conn->query("SHOW TABLES LIKE 'users'");
if ($res && $res->num_rows > 0) {
    echo "Table `users` found.\n";
} else {
    echo "Table `users` NOT found. Have you imported Project/database.sql?\n";
}

echo "\nSession status: ";
echo (session_status() === PHP_SESSION_NONE) ? "No session started\n" : "Session active\n";

echo "\nIf you see connection errors, ensure:\n";
echo "- MySQL (MariaDB) is running in XAMPP.\n";
echo "- `Project/database.sql` was imported into the database named in `Project/config.php`.\n";
echo "- `Project/config.php` has correct credentials (user/password/db).\n";

?>
