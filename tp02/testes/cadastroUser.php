<?php

    $dbhost = 'localhost'; // endereco do servidor de banco de dados
    $dbuser = 'sispetshop'; // login do banco de dados
    $dbpass = '123456'; // senha
    $dbname = 'petshop'; // nome do banco de dados a ser usado
    $conecta = mysql_connect($dbhost, $dbuser, $dbpass, $dbname);
    $seleciona = mysql_select_db($dbname);

      $id = "null";
      $nome = "Helton ";
      $login = "helton";
      $senha = "123456";
      $tipo = "1";
        
    $sqlinsert = "INSERT INTO usuarios (id, nome, login, senha, tipo) VALUES ('$id','$nome', '$login', '$senha', '$tipo')";
    
    $inserenome = mysql_query( $sqlinsert, $conecta );
    // inicia a conexao ao servidor de banco de dados
    if(! $conecta )
    {
      die("<br />Nao foi possivel conectar: " . mysql_error());
    }
    echo "<br />Conexao realizada!";

    // seleciona o banco de dados no qual a tabela vai ser criada
    if (! $seleciona)
    {
      die("<br />Nao foi possivel selecionar o banco de dados $dbname");
    }
    echo "<br />selecionado o banco de dados $dbname";

    // finalmente, cria a tabela 
    if(! $inserenome )
    {
      die("<br />Nao foi possivel inserir registro: " . mysql_error());
    }
    echo "<br />Um novo registro foi feito!";
    // encerra a conexão
    mysql_close($conecta);
?>