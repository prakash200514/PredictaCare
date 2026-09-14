<?php
/**
 * PredictaCare - Cloud Database Initialization / Migration Helper
 * 
 * This script runs either from browser or CLI to test connection and
 * initialize all tables and seed data from database/disease.sql into
 * the configured MySQL database.
 */

// Include database configuration
require_once __DIR__ . '/link/config.php';

$lockFile = __DIR__ . '/database/.installed';
$sqlFile  = __DIR__ . '/database/disease.sql';
$isCli    = (php_sapi_name() === 'cli');

$statusMessage = '';
$statusType    = ''; // success, danger, info, warning
$tablesStatus  = [];

// Helper to inspect tables
function getTableCounts($dbh) {
    $tables = ['admin', 'disease_tb', 'symptoms_tb', 'user', 'user_result'];
    $counts = [];
    foreach ($tables as $table) {
        try {
            $stmt = $dbh->query("SELECT COUNT(*) AS total FROM `$table`");
            $counts[$table] = $stmt->fetchColumn();
        } catch (Exception $e) {
            $counts[$table] = null; // table doesn't exist
        }
    }
    return $counts;
}

$tablesStatus = getTableCounts($dbh);
$isInstalled = file_exists($lockFile);

// Handle installation request
if (($isCli && in_array('--run', $argv ?? [])) || (!$isCli && isset($_POST['initialize']))) {
    try {
        if (!file_exists($sqlFile)) {
            throw new Exception("SQL file not found at: " . $sqlFile);
        }

        $sql = file_get_contents($sqlFile);
        if (empty(trim($sql))) {
            throw new Exception("SQL file is empty.");
        }

        // Execute SQL script
        $dbh->exec($sql);

        // Touch lock file
        @file_put_contents($lockFile, "Installed on " . date('Y-m-d H:i:s'));

        $statusType = 'success';
        $statusMessage = "Database initialized and seeded successfully!";
        $tablesStatus = getTableCounts($dbh);
        $isInstalled = true;
    } catch (Exception $e) {
        $statusType = 'danger';
        $statusMessage = "Error initializing database: " . $e->getMessage();
    }
}

// If CLI mode, print text output and exit
if ($isCli) {
    echo "========================================\n";
    echo " PredictaCare Database Setup\n";
    echo "========================================\n";
    echo "Host: " . DB_HOST . ":" . DB_PORT . "\n";
    echo "Database: " . DB_NAME . "\n";
    echo "User: " . DB_USER . "\n";
    echo "Connection: SUCCESS\n";
    echo "----------------------------------------\n";
    foreach ($tablesStatus as $tbl => $count) {
        echo "Table `$tbl`: " . ($count !== null ? "$count rows" : "MISSING") . "\n";
    }
    if (!empty($statusMessage)) {
        echo "Status: $statusMessage\n";
    }
    if (!in_array('--run', $argv ?? [])) {
        echo "Run with 'php setup-db.php --run' to execute import.\n";
    }
    exit(0);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PredictaCare - Database Setup</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: #333;
        }
        .card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.25);
            width: 100%;
            max-width: 650px;
            padding: 35px;
        }
        .header {
            text-align: center;
            margin-bottom: 25px;
        }
        .header h1 {
            font-size: 26px;
            color: #1a365d;
            font-weight: 700;
        }
        .header p {
            color: #718096;
            font-size: 14px;
            margin-top: 5px;
        }
        .alert {
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            font-weight: 500;
        }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-danger  { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .alert-info    { background: #e2e3e5; color: #383d41; border: 1px solid #d6d8db; }
        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-bottom: 25px;
            background: #f7fafc;
            padding: 16px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
        }
        .info-item {
            font-size: 13px;
        }
        .info-label {
            color: #718096;
            font-weight: 500;
        }
        .info-value {
            color: #2d3748;
            font-weight: 600;
            margin-top: 2px;
            word-break: break-all;
        }
        .status-badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }
        .badge-green { background: #c6f6d5; color: #22543d; }
        .badge-red   { background: #fed7d7; color: #742a2a; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }
        th, td {
            text-align: left;
            padding: 10px 12px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 13px;
        }
        th {
            background: #edf2f7;
            color: #4a5568;
            font-weight: 600;
        }
        .btn {
            display: inline-block;
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            text-align: center;
            text-decoration: none;
        }
        .btn-primary {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: #ffffff;
        }
        .btn-primary:hover {
            opacity: 0.95;
            transform: translateY(-1px);
        }
        .btn-home {
            background: #e2e8f0;
            color: #2d3748;
            margin-top: 10px;
        }
        .btn-home:hover {
            background: #cbd5e0;
        }
    </style>
</head>
<body>
<div class="card">
    <div class="header">
        <h1>🩺 PredictaCare Cloud Setup</h1>
        <p>Database Diagnostic & Initialization Tool</p>
    </div>

    <?php if (!empty($statusMessage)): ?>
        <div class="alert alert-<?php echo htmlspecialchars($statusType); ?>">
            <?php echo htmlspecialchars($statusMessage); ?>
        </div>
    <?php endif; ?>

    <div class="info-grid">
        <div class="info-item">
            <div class="info-label">Database Host:</div>
            <div class="info-value"><?php echo htmlspecialchars(DB_HOST); ?>:<?php echo htmlspecialchars((string)DB_PORT); ?></div>
        </div>
        <div class="info-item">
            <div class="info-label">Database Name:</div>
            <div class="info-value"><?php echo htmlspecialchars(DB_NAME); ?></div>
        </div>
        <div class="info-item">
            <div class="info-label">Database User:</div>
            <div class="info-value"><?php echo htmlspecialchars(DB_USER); ?></div>
        </div>
        <div class="info-item">
            <div class="info-label">Connection Status:</div>
            <div class="info-value">
                <span class="status-badge badge-green">✓ Connected</span>
            </div>
        </div>
    </div>

    <h3 style="font-size: 15px; margin-bottom: 10px; color: #2d3748;">Current Database Tables</h3>
    <table>
        <thead>
            <tr>
                <th>Table Name</th>
                <th>Status</th>
                <th>Rows</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $allExist = true;
            foreach ($tablesStatus as $tbl => $count): 
                if ($count === null) $allExist = false;
            ?>
            <tr>
                <td><strong><?php echo htmlspecialchars($tbl); ?></strong></td>
                <td>
                    <?php if ($count !== null): ?>
                        <span class="status-badge badge-green">Ready</span>
                    <?php else: ?>
                        <span class="status-badge badge-red">Not Found</span>
                    <?php endif; ?>
                </td>
                <td><?php echo $count !== null ? number_format($count) : '-'; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <form method="POST">
        <?php if (!$allExist): ?>
            <button type="submit" name="initialize" class="btn btn-primary" onclick="return confirm('Initialize tables and seed data now?');">
                🚀 Initialize Database Tables & Data
            </button>
        <?php else: ?>
            <button type="submit" name="initialize" class="btn btn-primary" onclick="return confirm('Tables already exist. Re-running will apply any missing tables or updates. Continue?');">
                🔄 Re-sync / Update Database
            </button>
        <?php endif; ?>
    </form>

    <a href="index.php" class="btn btn-home">Go to PredictaCare App &rarr;</a>
</div>
</body>
</html>
