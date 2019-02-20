<?php
include '../database/config.php';
// sql to delete a record
$id = $_GET['id'];
$sql = "DELETE FROM packages WHERE id='$id'";

if ($mysqli->query($sql) === TRUE) {
    echo "<script>alert('You just deleted a record successfully!'); window.location.href = 'packages.php'</script>";
} else {
    echo "Error deleting record: " . $mysqli->error;
}

$mysqli->close();
?>