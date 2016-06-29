<?php


  session_start();
  
    if( !isset($_SESSION['admin'])){
        //header("Location: autenticar.php");
    }

      //adiciona produto

      if(isset($_GET['acao'])){
         

         //REMOVER produto do banco
         if($_GET['acao'] == 'del'){
            $id = intval($_GET['id']);

            $dbhost = 'localhost'; // endereco do servidor de banco de dados
            $dbuser = 'sispetshop'; // login do banco de dados
            $dbpass = '123456'; // senha
            $dbname = 'petshop'; // nome do banco de dados a ser usado
            $conecta = mysql_connect($dbhost, $dbuser, $dbpass, $dbname);
            $seleciona = mysql_select_db($dbname);

            $sqldelete = "DELETE FROM produtos WHERE id = '$id'";
            $inserenome = mysql_query( $sqldelete, $conecta );
            
         }


      }

 ?>

<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Petshop online - carrinho</title>

    <!--<script src="bootstrap/js/jquery-1.12.3.js"></script>
    <script src="bootstrap/js/validar.js"></script>
    <script src="bootstrap/js/jquery.validate.js"></script>-->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

	
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
  </head>
<body>
<div id="header">
<div class="container">

<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="index.html"><img src="themes/images/logo.png" alt="Bootsshop"/></a>
		
 <ul id="topMenu" class="nav pull-right">
    <li class="">
	 
	
	</li>
	
    </ul>
  </div>
</div>
</div>
</div>
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">

	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active"> Área Administrativa</li>
    </ul>

	<h3> Manutenção </h3>	

	   <ul class="nav nav-tabs">
      <li class="active"><a href="areaAdministrativa.php">Editar produtos:</a></li>
      <li><a href="areaAdministrativa2.html">Adicionar produtos:</a></li>
    </ul>

    <!--tabela com todos os registros de produtos-->
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Preço</th>
          <th>Imagem</th>
          <th>Eliminar</th>
      </thead>
        </tr>
    

      <tbody>
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

        <?php
          if($total > 0){
    
          do {
        ?>
          <tr>
              <td><?=$linha['id']?></td>
              <td><?=$linha['nome']?></td>
              <td><?=$linha['preco']?></td>
              <td><img width="60" src="themes/images/products/<?=$linha['imagem']?>.jpg" alt=""/></td>
              <td><a href="areaAdministrativa.php?acao=del&id=<?=$linha['id']?>" class="btn btn-danger" type="button"><i class="icon-remove icon-white"></i></a></td>
          </tr>  
        <?php
    
              }while($linha = mysql_fetch_assoc($dados));
          }
        ?>
			
		  </tbody>
	
    </table>
	</div>
</div></div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
	<div  id="footerSection">
	<div class="container">
		<div class="row">
			<div id="socialMedia" class="span3 pull-right">
				<h5>Mídia: </h5>
				<a href="#"><img width="60" height="60" src="themes/images/facebook.png" title="facebook" alt="facebook"/></a>
				<a href="#"><img width="60" height="60" src="themes/images/twitter.png" title="twitter" alt="twitter"/></a>
				<a href="#"><img width="60" height="60" src="themes/images/youtube.png" title="youtube" alt="youtube"/></a>
			 </div> 
		 </div>
		<p class="pull-right">&copy; Petshop</p>
	</div><!-- Container End -->
	</div>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>
	

<span id="themesBtn"></span>
</body>
</html>