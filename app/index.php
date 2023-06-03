<?php
// Retrieve the necessary environment variables
// $host = getenv('DB_HOST');
// $port = getenv('DB_PORT');
// $db = getenv('DB_NAME');
// $user = getenv('DB_USER');
// $password = getenv('DB_PASSWORD');

$host = 'mysql';
$port = 3306;
$db = 'university';
$user = 'test';
$password_file = '/run/secrets/mysql_password';

// Read the MySQL password from the secret file
$password = trim(file_get_contents($password_file));

// Create a new PDO instance
$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Print the header
echo "<h1>Student Information from Database</h1>";

// Fetch the first row from the students table
$query = "SELECT * FROM students LIMIT 1";
try {
    $stmt = $pdo->query($query);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}

// Display the data
if ($row) {
    echo "<p>First Name: " . $row['firstname'] . "</p>";
    echo "<p>Surname: " . $row['surname'] . "</p>";
    echo "<p>Index Number: " . $row['index_number'] . "</p>";
} else {
    echo "No data found in the students table.";
}
?>
