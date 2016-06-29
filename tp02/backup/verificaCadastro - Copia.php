
<?php

    //Acesso ao BadFunctionCallException
    require_once 'Connection.php';
    $login = $_POST['nome'];
    $senha = $_POST['senha'];

    // Acesso ao Banco de dados
    // -- variaveis de conexao
    $db_server = "localhost";
    $db_username = "sispetshop";
    $db_password = "123456";
    $db_base = "petshop";

    $sql = "SELECT * FROM clientes ".
            "WHERE login = '".$login."'".
            "AND senha = md5('".$senha."')";

    //echo $sql;

    $conexao = new Connection();
    $resultado = $conexao->execute($sql);

    if($resultado->num_rows == 0){
        
        header("Location: autenticar.php");
    }else{
        //criando cookie. Perssistência
        session_start();
        echo "session_name()";
        echo "</br>chegou aqui";
        header("Location: product_summary.php?cliente=" . $login);

        $_SESSION['cliente'] = $login;
    }

    die();

  
 ?>
