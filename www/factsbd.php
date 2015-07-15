<?
function db_conect()
{
$host = 'localhost';
$user = 'print_house';
$pass = '248213';
$db = 'facts';
$charset = "utf-8";

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
$pdo = new PDO($dsn, $user, $pass, $opt);
return $pdo;
}

function security($field){

	$new_field = strip_tags($field);
	$new_field = trim($new_field);
	$new_field = htmlspecialchars($new_field, ENT_QUOTES);
	$new_field = htmlentities($new_field, ENT_QUOTES, "UTF-8");

	return $new_field;
}


function get_date()
{
	$pdo = db_conect();

	$stmt = $pdo->query('SELECT * FROM users');

	return $stmt;	
}

function get_comment($id)
{
	$pdo = db_conect();

	$stmt = $pdo->prepare('SELECT COUNT(id) FROM commentary WHERE id_st = ?');

	$stmt->execute(array($id));

	$stmt = $stmt->fetch(PDO::FETCH_NUM);

	return $stmt;	
}

function get_facts()
{
	$pdo = db_conect();

	$stmt = $pdo->query('SELECT * FROM information');

	return $stmt;
}

function get_fact_item($id)
{
	$pdo = db_conect();

	$stmt = $pdo->prepare('SELECT * FROM information WHERE id = ?');

	$stmt->execute(array($id));

	return $stmt;
}

function get_fact_comment($id)
{
	$pdo = db_conect();

	$stmt = $pdo->prepare('SELECT * FROM commentary WHERE id_st = ?');

	$stmt->execute(array($id));

	return $stmt;
}



function get_facts_filtr_login($id)
{
	$pdo = db_conect();

	$stmt = $pdo->query('SELECT * FROM users');

	foreach ($stmt as $key) {
		if($key['login'] == $id){
			$filtr = true;
		}else{
			$filtr = false;
		}
	}

	return $filtr;
}

function get_facts_filtr_email($id)
{
	$pdo = db_conect();

	$stmt = $pdo->query('SELECT * FROM users');

	foreach ($stmt as $key) {
		if($key['Email'] == $id){
			$filtr = true;
		}else{
			$filtr = false;
		}
	}

	return $filtr;
}

function get_user($email)
{
	$pdo = db_conect();

	$stmt = $pdo->prepare('SELECT COUNT(*) FROM user WHERE email =  ? ');

	$stmt->execute(array($email));

	$stmt = $stmt->fetch(PDO::FETCH_NUM);

	return $stmt;
}
?>