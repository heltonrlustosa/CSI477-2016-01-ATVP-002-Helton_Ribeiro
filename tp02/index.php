<?php

	session_start();

	if(!isset($_SESSION['carrinho'])){
		
		$_SESSION['carrinho'] = array();
	}
		//add produto
		if(isset($_GET['acao'])){

			//add carrinho
			if(isset($_GET['acao']) == 'add'){

				$id = intval($_GET['id']);
				if(!isset($_SESSION['carrinho'][$id])){

					$_SESSION['carrinho'][$id] = 1;

				}else{

					$_SESSION['carrinho'][$id] += 1;
				}
			}

			

		}
	
		//verifica login
			if(isset($_GET['acao2']) == 'logar'){

				if(!isset($_SESSION['cliente'])){
		
					header("Location: autenticar.php");
				}

			}
	
	//print_r($_SESSION['carrinho']);
?>

<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Petshop online</title>
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
<div id="welcomeLine" class="row">
	<div class="span6"><strong>Bem vindo!</strong></div>
</div>
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
	 <a href="index.php?acao2=logar" role="button"  style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
	
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
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
		<div class="well well-small"><a id="myCart" href="product_summary.php"><img src="themes/images/ico-cart.png" alt="cart">Ir para carrinho!</span></a></div>

	</div>
<!-- Sidebar end=============================================== -->
		<div class="span9">		
		<h4>Produtos:</h4>
			  <ul class="thumbnails">

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
		          	<!--<form method="post" action="verificaCadastro.php" >-->
		        <?php
		          if($total > 0){
		    
		          do {
		        ?>
		        <li class="span3">
				  <div class="thumbnail">
					<a  href="#"><img src="themes/images/products/<?=$linha['imagem']?>.jpg" alt=""/></a>
					<div class="caption">
					  <h5><?=$linha['nome']?></h5>
					  
					 	
					  <h4 style="text-align:center"><a class="btn" href= "#"> <i class="icon-zoom-in"></i></a> <a href="index.php?acao=add&id=<?=$linha['id']?>" class="btn"  >Adicionar ao <i class="icon-shopping-cart"></i></a> </br><a class="btn btn-primary" ><?=$linha['preco']?></a></h4>
					</div>
				  </div>
				</li>
		           
		        <?php
		    
		              }while($linha = mysql_fetch_assoc($dados));
		          }
		        ?>

				<!--</form>-->
			  </ul>	

		</div>
		</div>
	</div>
</div>
<!-- Footer ================================================================== -->
	<div  id="footerSection">
	<div class="container">
		<div class="row">
			<div class="span3">
				<h5>Administrativo:</h5>
				<a href="areaAdministrativa.php">Área administrativa</a>
				
			 </div>
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
	
	<!-- Themes switcher section ============================================================================================= -->

<span id="themesBtn"></span>
</body>
</html>