<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Facts</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/s.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php
    include "factsbd.php";
    include "class_facts.php";
     $content = array('main', 'categor', 'item_fact', 'info');
      if(!isset($_SESSION['user'])){
      $_SESSION['user'] = 1;
      $_SESSION['login'] = "";
      $_SESSION['password'] = "";
      }

      if(isset($_GET['exit'])){

      $acount->exit_acount($_SESSION['login'], $_SESSION['password'], $_SESSION['open']);

      } 

      if(isset($_POST['open'])){
      $_SESSION['login'] = security($_POST['login']);
      $_SESSION['password'] = security($_POST['password']);
      
      $acount = new Acount($_SESSION['login'], $_SESSION['password']);
  
      $open_sesion = $acount->open_acount();

  if($open_sesion){
    $_SESSION['open'] = 1;
  }
  else{
    ?>
    <script>
    alert('Не вірний логін або пароль, повторіть ще раз');
    </script>
    <?php                    
  }
  }
    ?>
      

    <div class="jumbotron" >
      <div class="container-fluid">
    <div class="row">
      <div class="navbar navbar-default navbar-fixed-top">
      <a href="facts.php?views=main" class="navbar-brand">Facts</a>
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="facts.php?views=main">Головна</a></li>
                   <li><a href="facts.php?views=categor">Факти</a></li>
                   <li><a href="facts.php?views=info">Про нас</a></li>
                   <?php
                   if(isset($_SESSION['open'])){
                    ?>
                     <li><a href="facts.php?views=add">Додати статтю</a></li>
                    <?php
                   }
                   ?>
                </ul>
                <?php
                if(!isset($_SESSION['open'])){
                  ?>
                  
<button type="button" class="btn btn-default" style="position:relavite; float:right; margin-top:8px;" data-toggle="modal" data-target="#exampleModal2">Авторизуватися</button>
<button type="button" class="btn btn-default" style="position:relavite; float:right; margin-top:8px; margin:8px;" data-toggle="modal" data-target="#exampleModal">Зареєструватися</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Форма Реєстрації</h4>
      </div>
      <div class="modal-body">
        <form method="POST" > 
<div class="input-group" style="margin:2%;">
  <span class="input-group-addon" id="basic-addon1">L</span>
  <input type="text" class="form-control" name="login"  required placeholder="Ваш логін" aria-describedby="basic-addon1">
</div>

<div class="input-group" style="margin:2%;">
  <span class="input-group-addon" id="basic-addon1">P</span>
  <input type="password" class="form-control" name="password"  required placeholder="Ваш пароль" aria-describedby="basic-addon1">
</div>

<div class="input-group" style="margin:2%;">
  <span class="input-group-addon" id="basic-addon1">P</span>
  <input type="password" class="form-control" name="password2"  required placeholder="Підтвердіть вашого пароля" aria-describedby="basic-addon1">
</div>

<div class="input-group" style="margin:2%;">
  <span class="input-group-addon" id="basic-addon1">@</span>
  <input type="email" class="form-control" name="email"  required placeholder="Ваш E-mail" aria-describedby="basic-addon1">
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрити</button>
        <button type="submit" name="res" class="btn btn-primary">Зареєструватися</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Форма Авторизації</h4>
      </div>
      <div class="modal-body">

        <form method="POST">
          <div class="input-group" style="margin:2%;">
  <span class="input-group-addon" id="basic-addon1">L</span>
  <input type="text" class="form-control" name="login" required placeholder="Ваш Логін" aria-describedby="basic-addon1">
  </div>
          
  <div class="input-group" style="margin:2%;">
  <span class="input-group-addon" id="basic-addon1">P</span>
  <input class="form-control" name="password" type="password" required placeholder="Ваш пароль" aria-describedby="basic-addon1">
</div>
    <div class="modal-footer">
        <button  type="button" class="btn btn-default" data-dismiss="modal">Закрити</button>
        <button type="submit" name="open" class="btn btn-primary">Війти</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
                  <?php
                    if(isset($_POST['res'])){
                      $login = security($_POST['login']);
                      $password = security($_POST['password']);
                      $email = security($_POST['email']);
                      $password2 = $_POST['password2'];

                      $users = new User($login, $password, $password2, $email);
                      $enter = $users->add_user();

                      if($enter){
                        ?>
                        <script>
                        alert('Дякуєм ви успішно зареєструвались');
                        </script>
                        <?php
                      }else{
                         ?>
                        <script>
                        alert('Помилка реєстрації: повторіть спробу');
                        </script>
                        <?php

                      }
                    }
                    }

                    }
                    }
                }
                else{
                  ?>
                  <a type="button" href="facts.php?views=main&exit=true" class="btn btn-default" style="position:relavite; float:right; margin-top:8px; margin:8px;" >
                 Вихід з <b> <?php echo $_SESSION['login']; ?> </b>
                </a>
                <?php
                }
                ?>
                
            </div>
        </div>
    </div>
    </div>
  </div>
    <div class="row" style="margin-right:0; ">
  <?php
  if($_SESSION['open']){
    array_push($content, 'add');
  }

   $news = new get_write_news();

$views = empty($_GET['views']) ? 'main' : $_GET['views'];
  for ($i=0; $i <5 ; $i++) { 
    if($content[$i] == $views){
      $views2 = $views;
      break;
    }
    else{
      $views2 = 'error';
    }
  }

  $views = $views2;

  switch ($views) {
        case 'categor':
            $produc = $news->get_bd_all_news();
              break;
        case 'item_fact':
            $id = $_GET['id'];
            $comment = new get_write_comment();
            $fact = $news->get_bd($id);
            $comment = $comment->get_bd($id);
              break;
            }
include($_SERVER['DOCUMENT_ROOT']."/views/".$views.".php");
?>
  </div>
  </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>