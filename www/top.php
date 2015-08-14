<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Facts</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
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
                </ul>
                <?php
                if(1){
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
  <input type="text" class="form-control" name="login" placeholder="Ваш логін" aria-describedby="basic-addon1">
</div>

<div class="input-group" style="margin:2%;">
  <span class="input-group-addon" id="basic-addon1">P</span>
  <input type="text" class="form-control" name="password" placeholder="Ваш пароль" aria-describedby="basic-addon1">
</div>

<div class="input-group" style="margin:2%;">
  <span class="input-group-addon" id="basic-addon1">P</span>
  <input type="text" class="form-control" name="password2" placeholder="Підтвердіть вашого пароля" aria-describedby="basic-addon1">
</div>

<div class="input-group" style="margin:2%;">
  <span class="input-group-addon" id="basic-addon1">@</span>
  <input type="text" class="form-control" name="email" placeholder="Ваш E-mail" aria-describedby="basic-addon1">
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
        <form>
          <div class="input-group" style="margin:2%;">
  <span class="input-group-addon" id="basic-addon1">L</span>
  <input type="text" class="form-control" placeholder="Ваш Логін" aria-describedby="basic-addon1">
  </div>
          
  <div class="input-group" style="margin:2%;">
  <span class="input-group-addon" id="basic-addon1">P</span>
  <input class="form-control" name="password" type="password" placeholder="Ваш пароль" aria-describedby="basic-addon1">
</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрити</button>
        <button type="button" class="btn btn-primary">Війти</button>
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

                      if($password == $password2){
                        ?>
  <div class="modal-open">
  <div class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
                        <?php
                      }
                      $pdo = db_conect();

                      $stmt = $pdo->prepare("INSERT INTO  information(name, text, img) VALUES (?, ?, ?)");

                      $stmt->execute(array($name, $img, $text));


                    }
                }
                if(0){
                  ?>
                  <a type="button" class="btn btn-default" style="position:relavite; float:right; margin-top:8px; margin:8px;" data-toggle="modal" data-target="#myModal">
                 Вихід
                </a>
                <?php
                }
                ?>
                
            </div>
        </div>
    </div>
    </div>
  </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

