<?php
include '../database/config.php';
// sql to delete a record
$id = $_GET['id'];
$sql = "DELETE FROM orders WHERE id='$id' AND emp_id_makeup!=0 OR emp_id_hair!=0";

if ($mysqli->query($sql) === TRUE) {
    echo "<script>alert('You just deleted a record successfully!'); window.location.href = 'transactions.php'</script>";
} else {
    echo "Error deleting record: " . $mysqli->error;
}

$mysqli->close();
?>