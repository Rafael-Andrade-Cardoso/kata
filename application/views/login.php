<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Katá</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url();?>assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?=base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="<?=base_url();?>assets/css/style.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	    <?php
          //Criação de formulario
            echo form_open("login/autenticar", array('action' => base_url() . 'login/autenticar', 'class' => 'form-login'));
              echo "<h2 class='form-login-heading'>Entrar agora</h2>";
              echo "<div class='login-wrap'>";
              //echo validation_errors();
              if (isset($erro)){
                  echo "<div class='alert alert-danger'>" . $erro . "</div>";
              }
              echo form_error('user');
              echo form_input(array(
                      "name" => "user",
                      "id" => "user",
                      "class" => "form-control",
                      "maxlenth" => "150",
                      "placeholder" => "Usuário",
                      "value" => "",
                      "required" => ""
                  ));
              echo "<br />";
              echo form_error('pass');
              echo form_password(array(
                      "name" => "pass",
                      "id" => "pass",
                      "class" => "form-control",
                      "maxlenth" => "255",
                      "placeholder" => "Senha",
                      "required" => ""
                  ));
              echo form_label("<span class='pull-right'>" . anchor('login.html#myModal', 'Esqueceu sua senha?', array('data-toggle' => 'modal')) . "</span>", "recuperasenha", array('class' => 'checkbox'));
              echo form_button(array(
                  "class" => "btn btn-theme btn-block",
                  "content" => "<i class='fa fa-lock'></i> ENTRAR",
                  "type" => "submit"
              ));
              /*
              echo "<hr />";
              echo "<div class='login-social-link centered'>";
              echo "<p>ou você pode logar com sua rede social</p>";
              echo form_button(array(
                      "class" => "btn btn-facebook",
                      "type" => "submit",
                      "content" => "<i class='fa fa-facebook'></i> Facebook"
              ));
              echo "</div>";
              echo "<div class='registration'>Ainda não posui uma conta?<br />" . anchor('#', 'Criar conta', array('class' => '')) . "</div>";
              */
              echo "</div>";
              /* Modal */
  		          echo "<div aria-hidden='true' aria-labelledby='myModalLabel' role='dialog' tabindex='-1' id='myModal' class='modal fade'>";
  		          echo "<div class='modal-dialog'>";
  		          echo "<div class='modal-content'>";
                echo "<div class='modal-header'>";
  		          echo form_button(array(
                        "type" => "button",
                        "class" => "close",
                        "data-dismiss" => "modal",
                        "aria-hidden" => "true",
                        "content" => "&times;"
                ));
                echo "<h4 class='modal-title'>Esqueceu a senha?</h4>";
  		          echo "</div>";
  		          echo "<div class='modal-body'>";
  		          echo "<p>Insira seu e-mail abaixo para recuperar sua senha.</p>";
                echo form_input(array(
                          "name" => "email",
                          "type" => "text",
                          "placeholder" => "Email",
                          "autocomplete" => "off",
                          "class" => "form-control placeholder-no-fix",
                          "maxlenth" => "150"
                      ));
                echo "<div>";
  		          echo "<div class='modal-footer'>";
                echo form_button(array(
                        "type" => "button",
                        "class" => "btn btn-default",
                        "data-dismiss" => "modal",
                        "aria-hidden" => "true",
                        "content" => "Cancelar"
                ));
                echo form_button(array(
                        "type" => "button",
                        "class" => "btn btn-theme",
                        "content" => "Enviar"
                ));
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
  		        /* modal */
            echo form_close();
            echo "</div>";
            echo "</div>";
        ?>



		      </form>

	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?=base_url();?>assets/js/jquery.js"></script>
    <script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="<?=base_url();?>assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("<?=base_url();?>assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>