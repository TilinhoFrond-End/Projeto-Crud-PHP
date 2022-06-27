<?php
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('BD', 'bancodeusers');
// Create connection
$conn = mysqli_connect(HOST, USUARIO, SENHA, BD) or die('Não Conectou');
$consulta = "SELECT * FROM `fornecedores`";
$result = mysqli_query($conn, $consulta);
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}
//mysqli_close($conn);
?>