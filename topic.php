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

if( $option == 'create-topic' ) { create_topic_form(); }
elseif( $option == 'view-topic' ) { view_topic(); }
elseif( $option == 'update-topic' ) { update_topic_form( $_GET['topicid'] ); }

?>
</body>
</html>