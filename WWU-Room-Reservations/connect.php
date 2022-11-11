<?php 

$server = 'mysqlweb.cs.wwu.edu';
$username = 'ricek20';
$password = '&Imyq5ef+g[';
$database = 'ricek20_db';

$db = null;

try {
  $db = new PDO("mysql:dbname=${database};host=${server}", $username, $password);

} catch (PDOException $ex) {
  // echo 'Message: ' . $ex->getMessage();
  exit('Error: could not establish database connection');
}

/*
$rows = $db->query("SELECT * FROM users;");
$rows = $rows->fetchAll();
print_r($rows[0]);
*/
?>
