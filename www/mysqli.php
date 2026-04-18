<?php
$servername = "mariadb";
$username = "zach";
$password = "lamp_password123";
$dbname = "lamp_db";

echo "<h1>MySQLi Test</h1>";

// Test PHP
echo "<h2>PHP Information</h2>";
echo "<p>PHP Version: " . phpversion() . "</p>";
echo "<p>Server Time: " . date('Y-m-d H:i:s') . "</p>";

// Test MySQL Connection
echo "<h2>Database Connection</h2>";
try {
	// connect to database
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


    // $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p style='color: green;'>✅ Connected to MySQL with MySQLi successfully!</p>";

	mysqli_query($conn, "DROP TABLE users");

    // Create a test table and insert data
    // $pdo->exec("CREATE TABLE IF NOT EXISTS users (
    //     id INT AUTO_INCREMENT PRIMARY KEY,
    //     name VARCHAR(50) NOT NULL,
    //     email VARCHAR(100) NOT NULL,
    //     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    // )");
	// Create table
	$createTableSQL = "CREATE TABLE IF NOT EXISTS users (
		id INT AUTO_INCREMENT PRIMARY KEY,
		name VARCHAR(50) NOT NULL,
		email VARCHAR(100) NOT NULL,
		created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
	)";
	mysqli_query($conn, $createTableSQL);

    // Insert sample data if table is empty
    // $stmt = $pdo->query("SELECT COUNT(*) FROM users");
    // if ($stmt->fetchColumn() == 0) {
    //     $pdo->exec("INSERT INTO users (name, email) VALUES 
    //         ('John Doe', 'john@example.com'),
    //         ('Jane Smith', 'jane@example.com'),
    //         ('Bob Johnson', 'bob@example.com')");
    // }
	// Check if table is empty
	$result = mysqli_query($conn, "SELECT COUNT(*) AS count FROM users");
	$row = mysqli_fetch_assoc($result);
	if ($row['count'] == 0) {
		$insertSQL = "INSERT INTO users (name, email) VALUES 
			('Jonathan Doe', 'john@example.com'),
			('Janice Smith', 'jane@example.com'),
			('Robert Johnson', 'bob@example.com')";
		mysqli_query($conn, $insertSQL);
	}	

    // Display users
    // echo "<h3>Sample Users:</h3>";
    // $stmt = $pdo->query("SELECT * FROM users");
    // echo "<table border='1' cellpadding='5'>";
    // echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Created At</th></tr>";
    // while ($row = $stmt->fetch()) {
    //     echo "<tr>";
    //     echo "<td>" . $row['id'] . "</td>";
    //     echo "<td>" . $row['name'] . "</td>";
    //     echo "<td>" . $row['email'] . "</td>";
    //     echo "<td>" . $row['created_at'] . "</td>";
    //     echo "</tr>";
    // }
    // echo "</table>";

	// Display users
	echo "<h3>Sample Users:</h3>";
	$result = mysqli_query($conn, "SELECT * FROM users");
	echo "<table border='1' cellpadding='5'>";
	echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Created At</th></tr>";
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td>" . $row['id'] . "</td>";
		echo "<td>" . $row['name'] . "</td>";
		echo "<td>" . $row['email'] . "</td>";
		echo "<td>" . $row['created_at'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
	// Close connection
	mysqli_close($conn);

} catch(mysqli_sql_exception $e) {
    echo "<p style='color: red;'>❌ Connection failed: " . $e->getMessage() . "</p>";
}

// Test Apache
echo "<h2>Server Information</h2>";
echo "<p>Server Software: " . $_SERVER['SERVER_SOFTWARE'] . "</p>";
echo "<p>Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "</p>";

echo "<h2>Access Points</h2>";
echo "<ul>";
echo "<li><a href='http://localhost:8080' target='_blank'>Web Application (Port 8080)</a></li>";
echo "<li><a href='http://localhost:8081' target='_blank'>phpMyAdmin (Port 8081)</a></li>";
echo "<li><a href='http://localhost:8080/mysqli.php' target='_blank'>MySQLi Test</a></li>";
echo "</ul>";
?>