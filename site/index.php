<?php
// Default page
$page = 'home';

// Pages
$pages = array(
	'home', 
	'services', 
	'about',
	'contact'
);

if(isset($_GET['page'])) {
	// If page exists
	if(in_array($_GET['page'], $pages)) {
		$page = $_GET['page'];
	}
} 
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="Full service advertising agency serving the Spokane and Coeur d'Alene area with a fantastic reputation and unbeatable pricing for all of your advertising needs."/>
    <meta name="keywords" content="advertise, advertising, marketing, graphic design, account management, commercial advertising, radio advertising, full service advertising agency, advertising agency, TV advertising, commercial production, video production, marketing production, internet advertising, social media management, social media advertising, web design, direct mail, billboard, media, media buyer, Spokane, Spokane Area, Coeur d'Alene"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Stuart Advertising - Full Service Advertising/Marketing Specialists</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/custom.css" />

    <link href="img/favicon.png" rel="shortcut icon">
</head>
<body>
    <div class="row">
        <div class="col-md-12 text-center">
            <img id="logo" src="img/logo.gif" alt="Stuart Advertising Logo">
        </div>
    </div>

    <div class="row">
        <div id="top_menu" class="col-md-12 text-center">
            <ul>
                <li><a href="index.php?page=home">Timeline</a></li>
                <li><a href="index.php?page=about">About</a></li>
                <li><a href="index.php?page=services">Services</a></li>
                <li><a href="index.php?page=contact">Contact</a></li>
            </ul>
        </div>
    </div>

	<div id="top_vignette"></div>
		<?php
		require 'content/' . $page . '.php';
		?>
	</div>

	<div class="row">
		<div class="col-md-12 text-center">
			<img id="stuart_advertising_offices" src="img/house.png" alt="Stuart Advertising Offices">
		</div>
	</div>


    <div class="row">
        <div class="col-md-12 text-center">
            <h1 id="stuart_phone_number"><a href="tel:5094485601">(509) 448-5601</a></h1>
            <a id="stuart_email" href="mailto:realperson@stuartadv.com">realperson@stuartadv.com</a>
        </div>
    </div>


    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/scrolly.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
			if('<?=$page?>'=='home') {
				scrolly().init();
			}
        });
    </script>
</body>
</html>
