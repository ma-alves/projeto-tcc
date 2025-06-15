<?php
if ($_SESSION["admin"] == 0) {
	echo "<script>alert('Acesso restrito!')</script>";
	echo "<script>location.href = ('index.php') </script>";
}
?>