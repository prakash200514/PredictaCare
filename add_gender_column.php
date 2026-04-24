<?php
include('link/config.php');
try {
    $sql = "ALTER TABLE user ADD COLUMN gender VARCHAR(20) AFTER contact";
    $query = $dbh->prepare($sql);
    $query->execute();
    echo "Column 'gender' added successfully.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
