<?php
$dsn = 'mysql:host=localhost;dbname=taikhoan';
$usernamedb = 'root';
$passworddb = '';
try {
	$db = new PDO($dsn, $usernamedb, $passworddb);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	$error_message = $e->getMessage();
	echo "<p>An error occurred while connecting to
	the database: $error_message </p>";
}
?>