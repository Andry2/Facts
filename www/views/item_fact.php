<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

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
    <?
    if(isset($_POST['commentary'])){
      $commentary = $_POST['t_commentary'];
      $date = date('d-m-Y');
      $time = date('H:i:s');
      $user = $_SESSION['login'];

        $commen = new Comment($id, $commentary, $user, $date, $time);
        
        $commen->add_comment();

        echo "<script>document.location.replace('facts.php?views=item_fact&id=$id');</script>";

    }
    foreach ($fact as $item):
      $about = $item['about'];
    ?>
    <div class="col-sm-10 col-md-8" style="margin-left:10%; margin-top:1%; ">
    <div class="thumbnail">
      <img src="img_bd/<? echo $item['img'];?>" style="  float:left;" alt="...">
      <div class="caption">
        <div class="page-header">
          <h2><?php echo $item['name'] ; ?></h2>
          <p><small><? echo $item['text']; ?></small></p>
          <p style="float:left; margin:%;"><small><b>Автор: <? echo $item['about']; ?></b></small></p>
          <br>
          <p style="float:right; margin:1%;"><small> <? echo $item['date']; ?></small></p>
          <br>
          <br>  
          <?endforeach;?>
        </div>
        <h2>Коментарі:</h2>
        <?
        foreach ($comment as $item):
        ?>
      <div class="jumbotron"  style="border:1px solid #111; margin:0.5%;">
          <h2 style="margin:1%;"><small><? echo $item['about']; ?></small></h2>
          <p style="margin-left:4%;"><small><? echo $item['commentary']; ?></small></p>
          <p style="float:right; margin:1%;"><small><? echo $item['date']; echo " "; echo $item['time']; ?></small></p>
        </div>
        <?endforeach;?>
        <?php
        if($_SESSION['open']){
          ?>
        <h3><?php echo $_SESSION['login']; ?></h3>
        <br>
        <div class="form-group">
          <form method="POST">
            <textarea class="form-control" name="t_commentary" id="message-text"></textarea>          
            <button type="submit"  name="commentary" class="btn btn-default" style="position:relavite; float:right; margin-top:8px; margin:8px;" data-toggle="modal" data-target="#exampleModal">Додати коментар</button>
            </form>
          <br>
          <?php
            }
          ?>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
  if($_POST['pop'] == 2){
      ?>
      <script> alert("aaaaa"); </script>
      <?
    }
  ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>