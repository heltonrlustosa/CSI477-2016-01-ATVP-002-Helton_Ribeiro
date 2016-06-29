<?php

    $dbhost = 'localhost'; // endereco do servidor de banco de dados
    $dbuser = 'sispetshop'; // login do banco de dados
    $dbpass = '123456'; // senha
    $dbname = 'petshop'; // nome do banco de dados a ser usado
    $conecta = mysql_connect($dbhost, $dbuser, $dbpass, $dbname);
    $seleciona = mysql_select_db($dbname);


      $id = "null";
      $nome = $_POST["nome"];
      $preco = $_POST["preco"];
      $imagem = $_POST["imagem"];
        
    $sqlinsert = "INSERT INTO produtos (id, nome, preco, imagem) VALUES ('$id','$nome', '$preco', '$imagem')";
    
    $inserenome = mysql_query( $sqlinsert, $conecta );
    
  
    exit('<script>location.href = "http://localhost/tp02/areaAdministrativa2.html" </script>');
    //header("Location: http://localhost/tp02/product_summary.html");
   
    
    // encerra a conexão
    mysql_close($conecta);
?>