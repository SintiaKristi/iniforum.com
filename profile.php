<?php include_once"koneksi.php"; ?>
<!docytype html>
<html>
<head>
<meta charset="utf-8">
<title>iniforum.com</title>
</head>
<body>
<?php

require(dirname(__FILE__).'/header.php' );

$user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : '';
if( $user_id ) {
	$row = fetch( query( "SELECT * FROM ".TABLE_USER." WHERE user_id='$user_id'" ) );
	$password = substr( $row['password'], 0, 5 ) . "*****";
	echo "<div class=\"box\">";
	echo "	<h1>Profil : ".$row['fullname']."</h1>";
	if( isset( $_SESSION['update-profil']['gagal'] ) ) {
		echo "<p class=\"err\"><b>Pesan Kesalahan:</b><br>".$_SESSION['update-profil']['gagal']."</p>";
		unset( $_SESSION['update-profil']['gagal'] );
	}
	echo "	<form method=\"post\" action=\"\" class=\"reg\" enctype=\"multipart/form-data\">";
	echo "		<table border=\"1\">";
	echo "		<tr class=\"tops\">";
	echo "			<td width=\"200\">Data Anda</td>";
	echo "			<td width=\"400\">Ubah Data Anda</td>";
	echo "		</tr>";
	echo "		<tr>";
	echo "			<td>Nama Lengkap</td>";
	echo "			<td><input type=\"text\" name=\"fullname\" size=\"25\" value=\"".$row['fullname']."\"></td>";
	echo "		</tr>";
	echo "		<tr>";
	echo "			<td>Password</td>";
	echo "			<td><input type=\"password\" name=\"password\" size=\"25\"></td>";
	echo "		</tr>";
	echo "		<tr>";
	echo "			<td>Alamat Email</td>";
	echo "			<td><input type=\"text\" name=\"email\" size=\"40\" value=\"".$row['email']."\"></td>";
	echo "		</tr>";
	echo "		<tr>";
	echo "			<td>Alamat Website</td>";
	echo "			<td><input type=\"text\" name=\"url\" size=\"40\" value=\"".$row['url']."\"></td>";
	echo "		</tr>";
	echo "		<tr>";
	echo "			<td>Upload Photo</td>";
	echo "			<td><input type=\"file\" name=\"photo\" size=\"50\"></td>";
	echo "		</tr>";
	echo "		<tr>";
	echo "			<td>&nbsp;</td>";
	echo "			<td><input type=\"submit\" name=\"action\" value=\"Ubah Profil\" id=\"button\"></td>";
	echo "		</tr>";
	echo "		</table>";
	echo "	</form>";
	echo "</div>";
}
?>
</body>
</html>