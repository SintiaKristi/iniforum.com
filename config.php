<?php include_once"koneksi.php"; ?>
<!docytype html>
<html>
<head>
<meta charset="utf-8">
<title>iniforum.com</title>
</head>
<body>
<?php

date_default_timezone_set("Asia/Jakarta");

# Defenisikan variable global
define( 'FORUM_HOST','localhost');
define( 'FORUM_USER','root' );
define( 'FORUM_PASS','vertrigo');
define( 'FORUM_DB','forum');
define( 'TABLE_USER','forum_user');
define( 'TABLE_TOPIC','forum_topic');
define( 'TABLE_CATEGORY','forum_category');
define( 'TABLE_REPLY','forum_reply');
define( 'TABLE_ADMIN','forum_admin');
define( 'SITE_NAME','INIFORUM.COM');
define( 'SITE_URL','http://localhost/forum');

# Fungsi Buatan Sederhana
function query( $str ) { return mysql_query( $str ); }
function fetch( $str ) { return mysql_fetch_array( $str ); }
function num( $str ) { return mysql_num_rows( $str ); }
function clean( $str ) { return mysql_real_escape_string( $str );}

$option = isset( $_GET['option'] ) ? $_GET['option'] : '';
$action = isset( $_POST['action'] ) ? $_POST['action'] : '';
?>
</body>
</html>