<!-- ------------------------------------ --
Universidade de Passo Fundo       
 Desenvolvimento para Web
      ADS - Nível III
  Djessyca Louise Saraiva
      150105@upf.br
---------------------------------------- -->
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link  type="text/css" rel="stylesheet"  href="estilo.css"></link>
        <title>ADSZoo</title>
    </head>
    <body>
        <div class="body">
            <div class="c01">
                <h1 class="titulo">ADSZoo</h1>
                <div class="c02">
                    <form action="valida.php" method="post" class="form-signin">
                        <h2 class="form-signin-heading">Login:</h2>
                        <?php
                        if (isset($erro)) {
                            echo "<p class='alert alert-danger'>" . $erro . "</p>";
                        }
                        ?>
                        <label for="inputEmail" class="sr-only">E-mail </label>
                        E-mail: <input name="email" type="email" id="inputEmail" class="form-control" placeholder="dj@upf.br" required autofocus><br>
                        <label for="inputPassword" class="sr-only">Senha</label>
                        Senha: <input name="senha" type="password" id="inputPassword" class="form-control" placeholder="123" required>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="remember-me">Lembrar
                            </label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Logar</button>
                    </form>
                </div>
            </div> 

    </body>
</html>


