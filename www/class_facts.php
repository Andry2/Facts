<?php
class News{

	protected $title;
	protected $text;
	protected $about;
	protected $img;
	protected $date;

	public function __construct($title, $text, $about, $img, $date){

		$this->title = $title;
		$this->text = $text;
		$this->about = $about;
		$this->img = $img;
		$this->date = $date;

	}

	public function add_news(){

		$pdo = db_conect();

        $stmt = $pdo->prepare("INSERT INTO  information(name, img, text, about, date) VALUES (?, ?, ?, ?, ?)");

        $stmt->execute(array($this->title, $this->img, $this->text, $this->about, $this->date));

        if($stmt){
        	$result = "<b>Ок!</b> Статтю успішно додано.";
		
			$stmt = $pdo->query('SELECT * FROM users');

        	foreach ($stmt as $key) {

        	$resalt = mail($key['Email'],"Facts","На сайті зявилась нова статя зайдіть на сайт для її перегляду\n");	
        	}
        }
        else{
        	$result = "<b>Помилка!</b> Сталася помилка під час додавання статті повторіть будь-ласка!.";
        }

       return $result;

	}

}

abstract class  get_news_News{

    abstract function get_bd($id);
    abstract function get_bd_all_news();

}


class get_write_news extends get_news_News{

public function get_bd($id){

	$pdo = db_conect();

	$stmt = $pdo->prepare('SELECT * FROM information WHERE id = ?');

	$stmt->execute(array($id));

	return $stmt;
}

public function get_bd_all_news(){
	
	$pdo = db_conect();

	$stmt = $pdo->query('SELECT * FROM information');

	return $stmt;
}

}

class get_write_comment extends get_write_news{

public function get_bd($id){

	$pdo = db_conect();

	$stmt = $pdo->prepare('SELECT * FROM commentary WHERE id_st = ?');

	$stmt->execute(array($id));

	return $stmt;
}

}

class Comment{

	protected $id_st;
	protected $commentary;
	protected $user;
	protected $date;
	protected $time;

	public function __construct($id_st, $commentary, $user, $date, $time){

		$this->id_st = $id_st;
		$this->commentary = $commentary;
		$this->user = $user;
		$this->date = $date;
		$this->time = $time;
	}

	public function add_comment(){
		
	$pdo = db_conect();

    $stmt = $pdo->prepare("INSERT INTO  commentary(id_st, commentary, about, date, time) VALUES (?, ?, ?, ?, ?)");

    $stmt->execute(array($this->id_st, $this->commentary, $this->user, $this->date, $this->time));

	return $stmt;
	}
} 

	class User{

		protected $login;
		protected $password;
		protected $password2;
		protected $email;

		public function __construct($login, $password, $password2, $email){

			$this->login = $login;
			$this->password = $password;
			$this->password2 = $password2;
			$this->email = $email;
		}

    public function add_user(){

	$pdo = db_conect();

	if($this->password != $this->password2){
    ?>
    <script>
    alert('Помилка реєстрації: Паролі не співпадають, повторіть спробу');
    </script>
    <?php
    }
    else{

	$stmt = $pdo->query('SELECT * FROM users');

	foreach ($stmt as $key) {
		if($key['login'] == $this->login){
			$filtr = true;
		}else{
			$filtr = false;
		}
	}

    if($filtr){
    ?>
    <script>
    alert('Помилка реєстрації: Дани логін вже існує в базі даних, змініть логін');
    </script>
    <?php
    }else{

    $stmt = $pdo->query('SELECT * FROM users');

	foreach ($stmt as $key) {
		if($key['Email'] == $this->email){
			$filtr = true;
		}else{
			$filtr = false;
		}
	}

    if($filtr){
    ?>
    <script>
    alert('Помилка реєстрації: Дани E-mail вже існує в базі даних, змініть E-mail');
    </script>
    <?php
    }else{

    $stmt = $pdo->prepare("INSERT INTO  users(login, password, Email) VALUES (?, ?, ?)");

    $stmt->execute(array($this->login, $this->password, $this->email));
				}	
			}
 		}

 		return $stmt;
 	}
 }


 class Acount{

 	protected $login;
 	protected $password;

 	public function __construct($login, $password){

 		$this->login = $login;
 		$this->password = $password;	

 	}

 	public function open_acount(){

	$pdo = db_conect();

	$stmt = $pdo->query('SELECT * FROM users');

	foreach ($stmt as  $item) {
    $login_bd = $item['login'];
    $password_bd = $item['password'];
  
  	if($this->login == $login_bd && $this->password == $password_bd){
      $open_sesion = true;
    break;
  	}
  	else{
    $open_sesion = false;
  			}
		}
		return $open_sesion;
	}

	public function exit_acount($login, $password, $open_sesion){

	  unset($login);
      unset($password);
      unset($open_sesion);

	}
 }
 ?>