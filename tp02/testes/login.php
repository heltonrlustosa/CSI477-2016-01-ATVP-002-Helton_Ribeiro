<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Acesso ao Sistema</title>
  </head>
  <body>

    <form action="validar.php" method="post">

      <input type="text" name="usuario" />
      <input type="password" name="senha" />

      <input type="submit" name="validar" value="Acessar" />

    </form>

    <?php

      if (isset($_GET['erro'])) {
        if($_GET['erro'] == 1) {
          echo "<h3>Usuário e/ou senha inválidos!</h3>";
        }
      }

     ?>






  </body>
</html>
