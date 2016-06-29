  <?php

  // Acesso ao Banco de dados

    require_once 'Connection.php';

$usuario = $_POST['login'];
$senha = $_POST['senha'];



$sql = "SELECT * FROM clientes" . " WHERE login = '" . $usuario . "' " . "AND senha = ('" . $senha ."')"; 



$conexao = new Connection();
$resultado = $conexao->execute($sql);

if ($resultado->num_rows == 0){
    
    header ("Location: http://localhost/tp02/autenticar.php?erro=1");
    
    }
else{
    session_start();
    $_SESSION['cliente'];
    //session_cache_expire(40);

        header("Location: http://localhost/tp02/product_summary.php");

}


 ?>
