<!DOCTYPE html> 
<html> 
<head> 
	<title>Zombie Sightings</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.1/jquery.mobile-1.2.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.1/jquery.mobile-1.2.1.min.js"></script>
</head> 
<body> 

<div data-role="page">

	<div data-role="header">
		<h1><?= $page_header ?></h1>
	</div><!-- /header -->

	<div data-role="content">
    <?= $page_content ?>
  </div><!-- /content -->

</div><!-- /page -->

</body>
</html>