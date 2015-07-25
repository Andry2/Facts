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
    <div class="jumbotron" >
    <h1 style="margin-left:15%;">Нова стаття</h1>
      <br>
      <form method="POST" enctype = 'multipart/form-data'>
              <div class="container">
              <div class="input-group input-group-lg" style="width:600px;">
          <span class="input-group-addon" id="sizing-addon1">N</span>
          <input name="name" type="text" class="form-control" placeholder="Назва" aria-describedby="sizing-addon1" rows autofocus required>
        </div>
        <br>
        <div class="input-group input-group-lg" style="width:600px;">
          <span class="input-group-addon" id="sizing-addon1" > <span class="glyphicon glyphicon-picture" aria-hidden="true"></span> </span>
          <input name="img" type="file" class="form-control" placeholder="Фото" aria-describedby="sizing-addon1" rows autofocus required>
        </div>
        <br>
        <div class="input-group input-group-lg" style="width:600px; height:200px;">
          <span class="input-group-addon" id="sizing-addon1" > <span class="glyphicon glyphicon-align-center" aria-hidden="true"></span> </span>
          <textarea style="height:200px;" name="text" class="form-control" placeholder="Текст" rows autofocus required rows="3"></textarea>
        </div>
        <br>
        <button type="submit" name="ger" class="btn btn-success col-sm-2 col-md-2" style="position:relavity; margin-top:20px;"> Додати </button>
      </form>
    <?php
      if(isset($_POST['ger'])){
         $name = $_POST['name'];
        $text = $_POST['text'];
        $date = date('d-m-Y');
        $user = $_SESSION['login'];

        $uploadfile = "img_bd/".$_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);

        $img = $_FILES['img']['name'];
        
        $news = new News($name, $text, $user, $img, $date);

        $res_add = $news->add_news();

        ?>
        <br>
        <br>
        <br>
        <br>
        <div  class="alert alert-success" role="alert"><?php echo $res_add; ?></div>
        <?
        }
    ?>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>