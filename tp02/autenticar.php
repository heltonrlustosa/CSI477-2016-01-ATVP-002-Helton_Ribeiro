<?php

	
	if(isset($_SESSION['cliente'])){
		
		header("Location: http://localhost/tp02/product_summary.php");
	}

?>

<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>Petshop online - cadastro</title>

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
<div id="welcomeLine" class="row">
	
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="index.php"><img src="themes/images/logo.png" alt="Bootsshop"/></a>
		
 <ul id="topMenu" class="nav pull-right">
    <li class="">
	 
	<div id="cadastro" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
			<h3>Cadastro:</h3>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal loginFrm" method="post" action="cadastroCliente.php" name="cadastrar">
			  <div class="control-group">								
				<input type="text" id="id_nome" name="nome" placeholder="Nome">
			  </div>
			   <div class="control-group">								
				<input type="text" id="id_login" name="login" placeholder="Login">
			 </div>
			  <div class="control-group">
				<input type="password" id="id_senha" name="senha" placeholder="Senha">
			  </div></br>

				<button type="submit" class="btn btn-success">Cadastrar</button>
				<button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
			</form>		
			
		  </div>
	</div>
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
		<li class="active"> Cadastro</li>
    </ul>
	<h3>  Verificar cadastro</h3>	
	<hr class="soft"/>
	<table class="table table-bordered">
		<tr><th> Confirmação de cadastro:  </th></tr>
		 <tr> 
		 <td>
			<form class="form-horizontal" method="post" action="verificaCadastro.php" >
				<div class="control-group">
				  <label class="control-label" for="inputUsername" >Login:</label>
				  <div class="controls">
					<input type="text" id="inputUsername" placeholder="Username" name="login">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="inputPassword1">Senha:</label>
				  <div class="controls">
					<input type="password" id="inputPassword1" placeholder="Password" name="senha">
				  </div>
				</div>
				<div class="control-group">
				  <div class="controls">
					<button type="submit" class="btn" >Entrar</button> ou <a href="#cadastro" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Cadastre agora!</span></a>
				  </div>
				</div>
			</form>
		  </td>
		  </tr>
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