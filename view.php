<?php include_once"koneksi.php"; ?>
<!docytype html>
<html>
<head>
<meta charset="utf-8">
<title>iniforumaja</title>
</head>
<body>
<?php

require(dirname(__FILE__).'/header.php' );

$user_id = isset( $_GET['userid'] ) ? $_GET['userid'] : '';
if( $user_id ) {
	$row = fetch( query( "SELECT * FROM ".TABLE_USER." WHERE user_id='$user_id'" ) );
	$password = substr( $row['password'], 0, 5 ) . "*****";
	echo "<div class=\"box\">";
	echo "	<h1>Profil : ".$row['fullname']."</h1>";
	if( isset( $_SESSION['update-profil']['gagal'] ) ) {
		echo "<p class=\"err\"><b>Pesan Kesalahan:</b><br>".$_SESSION['update-profil']['gagal']."</p>";
		unset( $_SESSION['update-profil']['gagal'] );
	}
	echo "		<table border=\"1\">";
	echo "		<tr>";
	echo "			<td rowspan=\"8\" width=\"215\">";
	if( $row['photo'] == 'N' ) {
		echo "			<img src=\"".SITE_URL."/photo/who.jpg\" class=\"photo-profile\">";
	} else {
		echo "			<img src=\"".SITE_URL."/photo/".$row['photo']."\" class=\"photo-profile\">";
	}
	echo "		</td>";
	echo "		</tr>";
	echo "		<tr height=\"35\">";
	echo "			<td width=\"150\">Nama Lengkap</td>";
	echo "			<td>".$row['fullname']."</td>";
	echo "		</tr>";
	echo "		<tr height=\"35\">";
	echo "			<td>Alamat Email</td>";
	echo "			<td>".$row['email']."</td>";
	echo "		</tr>";
	echo "		<tr height=\"35\">";
	echo "			<td>Alamat Website</td>";
	echo "			<td>".$row['url']."</td>";
	echo "		</tr>";
	echo "		<tr height=\"35\">";
	echo "			<td>Bergabung Sejak</td>";
	echo "			<td>".date( "d/m/Y H:i:s A", $row['member_date'] )."</td>";
	echo "		</tr>";
	echo "		<tr height=\"35\">";
	echo "			<td>Login Terakhir</td>";
	echo "			<td>".date( "d/m/Y H:i:s A", $row['lastup_date'] )."</td>";
	echo "		</tr>";
	echo "		<tr height=\"35\">";
	echo "			<td>Total Artikel</td>";
	$total_article = num( query( "SELECT * FROM ".TABLE_TOPIC." WHERE user_id='".$row['user_id']."'" ) );
	echo "			<td>$total_article artikel</td>";
	echo "		</tr>";
	echo "		<tr height=\"35\">";
	echo "			<td>Total Komentar</td>";
	$total_reply = num( query( "SELECT * FROM ".TABLE_REPLY." WHERE user_id='".$row['user_id']."'" ) );
	echo "			<td>$total_reply balasan</td>";
	echo "		</tr>";
	echo "		<tr height=\"35\">";
	echo "			<td>&nbsp;</td>";
	echo "			<td>Total Kategori</td>";
	$total_cat = num( query( "SELECT * FROM ".TABLE_CATEGORY." WHERE user_id='".$row['user_id']."'" ) );
	echo "			<td>$total_cat kategori</td>";
	echo "		</tr>";
	echo "		</table>";
	echo "</div>";
	
	echo "<div class=\"box\">";
	echo "	<h1>Category Posted By this awesome guys</h1>";
	$cat = query( "SELECT * FROM ".TABLE_USER." u, ".TABLE_CATEGORY." c WHERE u.user_id=c.user_id AND c.user_id='$user_id'" );
	if( num( $cat ) == 0 ) {
		echo "<p>Belum ada kategori yang diposting oleh <b>".$row['fullname']."</b></p>";
	} else {
		while( $catrow = fetch( $cat ) ) {
			echo "<p><a href=\"".SITE_URL."/category.php?option=view-category&catid={$catrow['cat_id']}\">{$catrow['cat_name']}</a> </p>";
		}
	}
	echo "</div>";
}
?>
</body>
</html>