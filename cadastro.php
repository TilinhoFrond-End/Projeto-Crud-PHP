<?php
$servidor = 'localhost';
$user = 'root';
$senha = '';
$banco = 'bancodeusers';

$conexion = mysqli_connect($servidor, $user, $senha, $banco) or die('Não Conectou');

$nome = $_POST['cad_nome'];
$descricao = $_POST['cad_descricao'];
$inicio = $_POST['cad_inicio'];
$termino = $_POST['cad_termino'];
$status = $_POST['cad_status'];

//$insert = "INSERT INTO fornecedores(nome, Descrição, Inicio, Termino, status) VALUES ($nome, $descricao, $inicio, $termino, $status)";
$insert = "INSERT INTO `fornecedores`(`nome`, `Descrição`, `Inicio`, `Termino`, `status`) VALUES ($nome, $descricao, $inicio, $termino, $status)";
$cadastro = mysqli_query($conexion, $insert);

/*if(mysqli_affected_rows($conn) != 0){
    echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/aula/cadastro.php'>
        <script type='text/javascript'>
            alert('Usuario cadastrado com Sucesso.');
        </script>
    ";    
}else{
    echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/aula/cadastro.php'>
        <script type='text/javascript'>
            alert('O Usuario não foi cadastrado com Sucesso.');
        </script>
    ";    
}*/

//mysqli_close($conn);
?>