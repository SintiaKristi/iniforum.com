<?php include_once"koneksi.php"; ?>
<!docytype html>
<html>
<head>
<meta charset="utf-8">
<title>iniforum.com</title>
</head>
<body>
<marquee behavior="alternate">
WELCOME TO INIFORUM.COM | WELCOME TO INIFORUM.COM | WELCOME TO INIFORUM.COM | WELCOME TO INIFORUM.COM
</marquee>
<?php
require(dirname(__FILE__).'/header.php' );

if( $option == 'create-account' ) {
	create_account_form();
} elseif( isset( $_SESSION['user_id'] ) ) {
	front_end_user();
} else {
	echo "<div class=\"box\">";
	echo "	<h1>Welcome to INIFORUM.COM</h1>";
	echo "	<p>Forum ini hadir sebagai salah satu wadah bagi Anda untuk menyuarakan opini, aspirasi, cita-cita serta berbagi rasa dan pengalaman bersama dengan seluruh orang dari penjuru dunia. Ayo segera bergabung dengan komunitas ini dan daftarkan diri Anda secara gratis <a href=\"".SITE_URL."/?option=create-account\">disini</a> sekarang juga.</p>";
	echo "</div>";
	
	echo "<div class=\"box\">";
	echo "	<h1>Daftar kategori</h1>";
	get_categories();
	echo "</div>";
}
?>
    <div class="clear"></div>
</body>
</html>