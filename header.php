<?php include_once"koneksi.php"; ?>
<!docytype html>
<html>
<head>
<meta charset="utf-8">
<title>iniforum.com</title>
</head>
<body>
<?php

session_start();
require(dirname(__FILE__).'/function.php' );
if( $action == 'Create Account' ) { add_new_member(); } 
elseif( $action == 'Login Member' ) { check_member_login(); }
elseif( $option == 'logout' ) { logout_member(); }
elseif( $action == 'Create Category' ) { add_new_category(); }
elseif( $action == 'Create Topic' ) { add_new_topic(); }
elseif( $action == 'Update Topic' ) { update_topic( $_GET['topic_id'] ); }
elseif( $action == 'Reply Topic' ) { save_topic_reply(); }
elseif( $action == 'Ubah Profil' ) { update_profile( $_SESSION['user_id'] ); }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>
<?php
if( isset( $_SESSION['user_id'] ) ) { 
	if( isset( $_GET['cat_id'] ) ) { echo get_category_name( $_GET['cat_id'] ) ." | ".SITE_NAME; }
	elseif( isset( $_GET['topic_id'] ) ) { echo get_topic_title( $_GET['topic_id'] )." | ".SITE_NAME; }
	else { echo get_user_name( $_SESSION['user_id'] ) ." | ".SITE_NAME; }
} 
elseif( isset( $_GET['cat_id'] ) ) { echo get_category_name( $_GET['cat_id'] ) ." | ".SITE_NAME; }
elseif( isset( $_GET['topic_id'] ) ) { echo get_topic_title( $_GET['topic_id'] )." | ".SITE_NAME; }
else { echo "Home | ".SITE_NAME; }
?>
</title>
<link rel="stylesheet" type="text/css" href="style.css" media="all" />
<script type="text/javascript" src="nicEdit.js"></script>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="forum.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
</head>
<body>
<div class="top">
	<div class="wrap">
		<h1><?php echo SITE_NAME;?></h1>
		<p>Tempat berdiskusi &amp; berbagi pengetahuan dan informasi, namun tidak untuk ghibah.</p>
	</div>
</div>
<div class="nav">
	<div class="wrap">
		<?php
		echo "<ul>";
		echo "	<li><a href=\"".SITE_URL."/\" class=\"current\">Home</a></li>";
		if( isset( $_SESSION['admin_id'] ) ) {
			echo "	<li><a href=\"".SITE_URL."/?option=logout\">Logout Admin</a></li>";
		} elseif( isset( $_SESSION['user_id'] ) ) {
			echo "	<li><a href=\"".SITE_URL."/category.php?option=create-category\">Create Category</a></li>";
			echo "	<li><a href=\"".SITE_URL."/?option=logout\">Logout</a></li>";
		} else {
			echo "	<li><a href=\"".SITE_URL."/?option=create-account\">Create Account</a></li>";
		}
		
		echo "</ul>";
		?>
	</div>
</div>
<div class="page">
	<div class="wrap">
		<div class="page-right">
			<?php
			if( isset( $_SESSION['user_id'] ) ) { 
				get_user_photo( $_SESSION['user_id'] );
				sidebar_user(); 
				get_all_online_user();
			}
			else { 
				member_login_form();
				nine_top_user();
				get_all_online_user();
			}
			?>
		</div>
		<div class="page-left">
</body>
</html>