<?php include_once"koneksi.php"; ?>
<!docytype html>
<html>
<head>
<meta charset="utf-8">
<title>iniforum.com</title>
</head>
<body>
<?php

require(dirname(__FILE__).'/header.php');

if($option == 'create-category')
{
	create_category_form();
}
elseif($option == 'view-category')
{
	view_category();
}
?>
</body>
</html>