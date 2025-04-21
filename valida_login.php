<?php
if (isset($_SESSION["email_pac"])) {
	echo $_SESSION["email_pac"];
} elseif (isset($_SESSION["email_psi"])) {
	echo $_SESSION["email_psi"];
} else {
	echo "<script>alert('Acesso negado! É preciso estar logado para acessar esta página.')</script>";
	echo "<script>location.href = ('index.php') </script>";
}
?>