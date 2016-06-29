<?php

    $dbhost = 'localhost'; // endereco do servidor de banco de dados
    $dbuser = 'sispetshop'; // login do banco de dados
    $dbpass = '123456'; // senha
    $dbname = 'petshop'; // nome do banco de dados a ser usado
    $conecta = mysql_connect($dbhost, $dbuser, $dbpass, $dbname);
    $seleciona = mysql_select_db($dbname);

 
      $id = "null";
      $nome = $_POST["nome"]; 
      $login = $_POST["login"];
      $senha = $_POST["senha"];
        
    $sqlinsert = "INSERT INTO clientes (id, nome, login, senha) VALUES ('$id','$nome', '$login', '$senha')";
    
    $inserenome = mysql_query( $sqlinsert, $conecta );
    
    session_start();
    $_SESSION['cliente'];
    exit('<script>location.href = "http://localhost/tp02/product_summary.php" </script>');
    //header("Location: http://localhost/tp02/product_summary.html");
   
    
    // encerra a conexão
    mysql_close($conecta);
?>