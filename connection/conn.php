<?php

$host = getenv('DB_HOST') ?: 'localhost';
$database = getenv('DB_NAME') ?: 'your_database';
$username = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASS') ?: '';

try {
	$conn = new PDO(
		"mysql:host={$host};dbname={$database};charset=utf8mb4",
		$username,
		$password,
		[
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES => false,
		]
	);
} catch (PDOException $exception) {
	error_log('Database connection failed: ' . $exception->getMessage());
	die('Database connection failed.');
}
