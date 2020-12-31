<?php
include("config.php");
$id=$_GET['id'];

mySQLi_query($mysqli,"INSERT INTO cart (poduct_id,quantity)
			VALUES ('$id',1)");
echo "<script>alert('Added to cat'); window.location='index.php'</script>"

?>