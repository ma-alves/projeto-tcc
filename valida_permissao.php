<?php
if (!isset($_SESSION["admin"])) {
	echo "<script>alert('Acesso restrito!')</script>";
	echo "<script>location.href = ('index.php') </script>";
} else {
}
?>