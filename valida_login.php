<?php
if (isset($_SESSION["id_pac"])) {
	// echo $_SESSION["id_pac"];
} elseif (isset($_SESSION["id_psi"])) {
	// echo $_SESSION["id_psi"];
} else {
	echo "<script>alert('É preciso estar logado para acessar esta página.')</script>";
	echo "<script>location.href = ('index.php#login') </script>";
}
?>