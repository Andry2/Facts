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
?>