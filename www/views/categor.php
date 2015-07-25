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
    foreach ($produc as $item):
    ?>
    <div class="col-sm-10 col-md-8" style="margin-left:10%; margin-top:1%; ">
    <div class="thumbnail">
      <img src="img_bd/<? echo $item['img'];?>" style="  float:left;" alt="...">
      <div class="caption">
        <div class="page-header">
          <h2><?php echo $item['name'] ; ?></h2>
        </div>
        
        <p><a href="facts.php?views=item_fact&id=<?=$item['id'] ?>" class="btn btn-primary" role="button">Читати далі</a> 
        </p>
      </div>
    </div>
  </div>
  <?endforeach;?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>