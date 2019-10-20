<!DOCTYPE html>
<html>

<?php
/**
 * Erros: 
 *  1 = Suas senhas estão diferentes.
 *  2 = Por favor, digite seus dados novamente.
 *  3 = Esse CPF e/ou email já estão cadastrados.
 */

require('./config.php');
if (isset($_GET['error']) && !empty($_GET['error'])) {

  $stmt = $db->prepare('SELECT erro FROM tb_error WHERE tela = :tela AND id = :e');
  $stmt->execute([
    'tela' => 1,
    'e' => $_GET['error']
  ]);

  $err = $stmt->fetch(PDO::FETCH_ASSOC);

}

?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" sizes="16x16" href="dist/img/favicon-32x32.png">
  <title>OutFire | Registrar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <style>
    .register-page {
      background-color: #fff;
    }

    a:hover {
      color: #cc150b;
    }

    label {
      color: #cc150b;
    }
  </style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="index.php" style="color: #CE0B00"><b>OUT</b>Fire</a>
    </div>
    <?php
    if (isset($err['erro']) && !empty($err['erro'])) {
      ?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Erro!</h4>
        <?= $err['erro'] ?>
      </div>
    <?php
    }
    ?>

    <div class="register-box-body">
      <p class="login-box-msg">Crie uma conta com a gente.</p>

      <form action="./actions/cadastraLogin.php" method="GET">
        <div class="form-group has-feedback">
          <label>Nome completo:</label>
          <input type="text" class="form-control" name="nome_completo" placeholder="Digite seu nome completo: ">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <label>CPF:</label>
          <input type="text" class="form-control" name="cpf" placeholder="Digite seu CPF: ">
          <span class="glyphicon glyphicon-globe form-control-feedback"></span>
        </div>

        <div class="form-group">
          <label>Tipo de Usuario: </label>
          <select name="tipo" class="form-control">
            <option value="1">Bombeiro</option>
            <option value="3">Comum</option>
            <option value="2">Voluntario</option>
          </select>
        </div>
        <div class="form-group has-feedback">
          <label>E-mail: </label>
          <input type="email" name="email" class="form-control" placeholder="Digite o seu email: ">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <label>Senha: </label>

          <input type="password" class="form-control" name="senha" placeholder="Digite a sua senha: ">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <label>Repetir Senha: </label>
          <input type="password" class="form-control" name="r-senha" placeholder="Digite sua senha novamente: ">
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>

        <div class="row">
          <div class="col-xs-8">
            <div class="">
              <label>
                <input type="checkbox"> Eu aceito os <a href="#">termos.</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="login.php" class="text-center">Eu já tenho uma conta :)</a>
    </div>
    <!-- /.form-box -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script>
</body>

</html>