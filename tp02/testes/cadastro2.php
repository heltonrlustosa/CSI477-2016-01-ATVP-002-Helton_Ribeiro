
      <?php

          $usuario = $_POST['usuario'];
          $senha = $_POST['senha'];

          // Acesso ao Banco de dados
          // -- variaveis de conexao
          $db_server = "localhost";
          $db_username = "sistemaweb";
          $db_password = "123456";
          $db_base = "academico";

          // -- conexao
          $connection = new mysqli($db_server, $db_username,
                          $db_password, $db_base);

          if($connection->connect_errno) {
            echo "Falha na conexão com o Banco de Dados! " . $connection->connect_errno . " - " . $connection->connect_error;
          } else {
            echo "Conexão com realizada com sucesso!";
          }

          $sql = "SELECT * FROM alunos";
          $result = $connection->query($sql);
          //var_dump($result->fetch_all());

          while($row = $result->fetch_assoc()) {


            echo $row["id"] . " - " . $row["nome"] . "<br />";
          }


          die();

          // Recuperar/validar as informações

          if ($usuario != "admin" || $senha != "123") {
            //echo "<h1>Usuario e/ou senha inválidos !</h1>";
            header("Location: login.php?erro=1");
          }
          else {
            echo "<h1>Seja bem-vindo(a) $usuario !</h1>";
          }

        ?>

