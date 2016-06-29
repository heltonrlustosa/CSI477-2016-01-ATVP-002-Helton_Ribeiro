<?php
          
            $host = "localhost";
            $db   = "petshop";
            $user = "sispetshop";
            $pass = "123456";

            // conecta ao banco de dados
            $con = mysql_pconnect($host, $user, $pass) or trigger_error(mysql_error(),E_USER_ERROR); 
            // seleciona a base de dados em que vamos trabalhar
            mysql_select_db($db, $con);
            // cria a instrução SQL que vai selecionar os dados
            $query = sprintf("SELECT id, nome, preco, imagem FROM produtos");
            // executa a query
            $dados = mysql_query($query, $con) or die(mysql_error());
            // transforma os dados em um array
            $linha = mysql_fetch_assoc($dados);
            // calcula quantos dados retornaram
            $total = mysql_num_rows($dados);
          ?>

        

<html>
	<head>
	<title>Exemplo</title>
</head>
<body>
		<?php
          if($total > 0){
    
          do {
        ?>
              <p><?=$linha['nome']?> / <?=$linha['preco']?></p>
        <?php
    
              }while($linha = mysql_fetch_assoc($dados));
          }
        ?>
  
</body>
</html>
<?php
// tira o resultado da busca da memória
mysql_free_result($dados);
?>