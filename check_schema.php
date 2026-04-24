<?php
include('link/config.php');
try {
    $sql = "DESCRIBE user";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach($results as $row) {
        echo $row['Field'] . " " . $row['Type'] . "\n";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
