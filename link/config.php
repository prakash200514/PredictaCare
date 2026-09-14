<?php 
// PredictaCare Database Configuration
// Supports environment variables for cloud PaaS (Render, Railway, etc.) with local fallbacks.

$dbHost = getenv('DB_HOST') ?: (getenv('MYSQLHOST') ?: 'localhost');
$dbUser = getenv('DB_USER') ?: (getenv('MYSQLUSER') ?: 'root');
$dbPass = getenv('DB_PASS') !== false ? getenv('DB_PASS') : (
    getenv('MYSQLPASSWORD') !== false ? getenv('MYSQLPASSWORD') : (
        getenv('DB_PASSWORD') !== false ? getenv('DB_PASSWORD') : 'password'
    )
);
$dbName = getenv('DB_NAME') ?: (getenv('MYSQLDATABASE') ?: 'disease');
$dbPort = getenv('DB_PORT') ?: (getenv('MYSQLPORT') ?: '3306');

// Support DATABASE_URL if provided (common on PaaS platforms)
if ($dbUrl = getenv('DATABASE_URL')) {
    $urlParts = parse_url($dbUrl);
    if ($urlParts) {
        if (!empty($urlParts['host'])) $dbHost = $urlParts['host'];
        if (!empty($urlParts['port'])) $dbPort = $urlParts['port'];
        if (!empty($urlParts['user'])) $dbUser = $urlParts['user'];
        if (isset($urlParts['pass']))  $dbPass = $urlParts['pass'];
        if (!empty($urlParts['path'])) $dbName = ltrim($urlParts['path'], '/');
    }
}

if (!defined('DB_HOST')) define('DB_HOST', $dbHost);
if (!defined('DB_USER')) define('DB_USER', $dbUser);
if (!defined('DB_PASS')) define('DB_PASS', $dbPass);
if (!defined('DB_NAME')) define('DB_NAME', $dbName);
if (!defined('DB_PORT')) define('DB_PORT', (int)$dbPort);

// Determine SSL requirement (TiDB Cloud, Aiven, or DB_SSL=true)
$useSsl = (getenv('DB_SSL') === 'true' || strpos(DB_HOST, 'tidbcloud.com') !== false || strpos(DB_HOST, 'aivencloud.com') !== false);

$pdoOptions = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
];
if ($useSsl && defined('PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT')) {
    $pdoOptions[PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT] = false;
}

// Establish PDO connection
try {
    $dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=utf8";
    $dbh = new PDO($dsn, DB_USER, DB_PASS, $pdoOptions);
} catch (PDOException $e) {
    // If local localhost fails with password, attempt blank password fallback for default XAMPP
    if (DB_HOST === 'localhost' && DB_PASS !== '') {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=utf8";
            $dbh = new PDO($dsn, DB_USER, '', $pdoOptions);
        } catch (PDOException $e2) {
            die("Database Connection Error: " . $e->getMessage());
        }
    } else {
        die("Database Connection Error: " . $e->getMessage());
    }
}

// Establish MySQLi connection for scripts using mysqli
if ($useSsl) {
    $link = mysqli_init();
    if (defined('MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT')) {
        @mysqli_real_connect($link, DB_HOST, DB_USER, DB_PASS, DB_NAME, (int)DB_PORT, NULL, MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);
    } else {
        @mysqli_real_connect($link, DB_HOST, DB_USER, DB_PASS, DB_NAME, (int)DB_PORT);
    }
} else {
    $link = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, (int)DB_PORT);
    if (!$link && DB_HOST === 'localhost' && DB_PASS !== '') {
        $link = @mysqli_connect(DB_HOST, DB_USER, '', DB_NAME, (int)DB_PORT);
    }
}
?>