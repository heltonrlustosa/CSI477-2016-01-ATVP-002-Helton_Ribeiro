<?php


	session_start();
	
    if( !isset($_SESSION['cliente'])){
        //header("Location: autenticar.php");
    }

      //adiciona produto

      if(isset($_GET['acao'])){

         //ADICIONAR CARRINHO
         if($_GET['acao'] == 'add'){
            $id = intval($_GET['id']);
            if(!isset($_SESSION['carrinho'][$id])){
               $_SESSION['carrinho'][$id] = 1;
            }else{
               $_SESSION['carrinho'][$id] += 1;
            }
         }
         //decrementa a quantidade em 1 unidade
         if($_GET['acao'] == 'rem'){
            $id = intval($_GET['id']);
            if(!isset($_SESSION['carrinho'][$id])){
               $_SESSION['carrinho'][$id] = 1;
            }else{
               $_SESSION['carrinho'][$id] -= 1;
            }
         }

         //REMOVER CARRINHO
         if($_GET['acao'] == 'del'){
            $id = intval($_GET['id']);
            if(isset($_SESSION['carrinho'][$id])){
               unset($_SESSION['carrinho'][$id]);
            }
         }

         //ALTERAR QUANTIDADE
         if($_GET['acao'] == 'up'){
            if(is_array($_POST['prod'])){
               foreach($_POST['prod'] as $id => $qtd){
                  $id  = intval($id);
                  $qtd = intval($qtd);
                  if(!empty($qtd) || $qtd <> 0){
                     $_SESSION['carrinho'][$id] = $qtd;
                  }else{
                     unset($_SESSION['carrinho'][$id]);
                  }
               }
            }
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
<div id="welcomeLine" class="row">
	<div class="span6">Bem vindo!<strong> </strong></div>
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
		<li class="active"> Carrinho de Compras</li>

    </ul>
	<h3>  Carrinho de Compras</h3>	
	<hr class="soft"/>
		
	 <a href="index.php"> <span class="btn btn-large btn-success"> Continuar comprando</a></span> </br>
	
	<br><table class="table table-bordered">
              <thead>
                <tr>
                  <th>Produto</th>
                  <th>Descrição</th>
                  <th>Quantidade/Update</th>
				          <th>Preço</th>
                  <th>Desconto</th>
                  <th>Frete</th>
                  <th>Total</th>
				        </tr>
              </thead>
              <tbody>
                <?php
                  $total="0";
                  $frete="15.00";


                foreach($_SESSION['carrinho'] as $id => $qtd){
                              $host = "localhost";
                              $db   = "petshop";
                              $user = "sispetshop";
                              $pass = "123456";

                              // conecta ao banco de dados
                              $con = mysql_pconnect($host, $user, $pass) or trigger_error(mysql_error(),E_USER_ERROR); 
                              // seleciona a base de dados em que vamos trabalhar
                              mysql_select_db($db, $con);
                              $sql   = "SELECT *  FROM produtos WHERE id = '$id'";
                              $qr    = mysql_query($sql) or die(mysql_error());
                              $ln    = mysql_fetch_assoc($qr);

                             
                              $total = $total + $ln['preco'];

                
                ?>
                <tr>
                  <td> <img width="60" src="themes/images/products/<?=$ln['imagem']?>.jpg" alt=""/></td>
                  <td>Produto: <?=$ln['nome']?> </br>Frete fixo para qualquer região</td>
				          <td>
					         <div class="input-append"><input class="span1" style="max-width:34px" placeholder="<?=$qtd?>" id="appendedInputButtons" size="16" type="text"><a href="product_summary.php?acao=rem&id=<?=$ln['id']?>" class="btn" type="button"><i  class="icon-minus"></i></a><a href="product_summary.php?acao=add&id=<?=$ln['id']?>" class="btn" type="button"><i class="icon-plus"></i></a><a href="product_summary.php?acao=del&id=<?=$ln['id']?>" class="btn btn-danger" type="button"><i class="icon-remove icon-white"></i></a></div>
				          </td>
                  <td><?=$ln['preco']?></td>
                  <td>$0.00</td>
                  <td>$15.00</td>
                  <td><?=$ln['preco'] + 15.00?></td>
                  

                </tr>
                <?php } ?>
				       
                
				        <tr>
                  <td colspan="6" style="text-align:right"><strong>TOTAL = </strong></td>
                  <td class="label label-important" style="display:block"> <strong> <?=$total ?> </strong></td>
                </tr>
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