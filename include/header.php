<?php
	// mobile formatting - including orientation change
	$supported_browsers = array('iPhone', 'iPod', 'Android');
	foreach($supported_browsers as $browser) {
		if(strstr($_SERVER['HTTP_USER_AGENT'], $browser)) {
			$mobile = true;
		}
	}
	
	// non displaying php that has uses in other files
	$country_code = geoip_country_code_by_name($_SERVER["REMOTE_ADDR"]);
?>
<!-- header file -->
<!-- meta tags -->
<meta name="googlebot" content="NOODP, nofollow">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="apple-mobile-web-app-title" content="icj.me">
<?php 

if($title && $mobile && $index_page) {
	echo "<title>icj.me</title>";
} else {
	echo "<title>$title</title>";
}


if(!$nocrawl) {
	// basic meta info
	if(!$description) {
		$description = "Just a Penguin is the website of cj. Here you can find iOS firmware links, tutorials and other stuffs.";
	}
	echo '<meta name="description" content="' . $description . '"/>' . "\n";

	if (!$keywords) {
		$keywords = "icj, jailbreak, cj, ikeyhelper, ios firmware links, download ios, ios, iphone, ipad";
	}
	echo '<meta name="keywords" content="' . $keywords . '"/>' . "\n";
} else {
	echo '<meta name="robots" content="noindex" />';
}

?>

<!-- styles -->
<link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon.ico">
<link rel="apple-touch-icon-precomposed" href="/assets/images/apple-touch-icon-precomposed.png">
<?php 
	if(!$index_page || $mobile) { 
		echo '<link rel="stylesheet" type="text/css" href="/assets/css/style.min.css">';
	} elseif($index_page) {
		echo '<link rel="stylesheet" type="text/css" href="/assets/css/index.css">';
	}
	
	// extra css for separate pages
	if($extra_css) {
		echo '<style type="text/css">';
		echo $extra_css;
		echo '</style>';
	} 
	if($extra_css_url) {
		echo '<link rel="stylesheet" type="text/css" href="' . $extra_css_url . '">';
	}

	echo "\n\n<!-- scripts -->\n";
	
	// google analytics
	include 'analytics.php';
	
	$IE = strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE');
	
	if ($mobile) {
		// echo '<meta name="apple-mobile-web-app-capable" content="yes" />';
		// echo '<meta name="apple-mobile-web-app-status-bar-style" content="black" />';
		echo '<meta name="viewport" content="width=device-width, initial-scale=0.533, maximum-scale=0.533, user-scalable=0"/> ';
		echo '<script type="text/javascript" src="/assets/js/ios.js"></script>';
		echo '<script src="/assets/js/addressbar.js" type="text/javascript"></script>';
		echo '</head>
		<body onorientationchange="updateOrientation();">';
	} else {
		echo "\n</head>\n<body>";
	}

	if($IE && !$index_page) {
		// this is internet explorer, cry.
		echo '<div id="iebanner">This site is better displayed on a standards compliant browser. To view this site properly, please <a href="http://www.google.com/chrome">download a respectable browser</a></div>';
	}

	// display highlighted link on the navbar if this page is the one you are viewing
	function is_current_page($url, $title, $follow = false) {
		if (($_SERVER['REQUEST_URI'] == $url) || (strpos($_SERVER['REQUEST_URI'], $url) !== false) && $follow) {
			return "\t" . '<a class="current" href="' . $url . '">' . $title . "</a>\n";
		} else {
			return "\t" . '<a href="' . $url . '">' . $title . "</a>\n";
		}
	}

	// navigation
	$navigation_html .= is_current_page("/", "Home");
	$navigation_html .= is_current_page("/projects", "Projects", true);
	$navigation_html .= is_current_page("/ios", "Firmware Links", true);
	$navigation_html .= is_current_page("/tutorials", "Tutorials", true);
	if(!$index_page || $mobile) $navigation_html .= is_current_page("/minecraft", "Minecraft", true);
	$navigation_html .= is_current_page("/contact", "Contact", true);

?>


<?php if(!$index_page || $mobile) { ?>

<div id="header">
	<div id="center">
		<a href="/"><img class="logo" src="/assets/images/logo.png" alt="Just A Penguin"></a>
	</div>
</div>

<div id="navigation">
	<?php echo $navigation_html; ?>
</div>

<?php } elseif($index_page && !$mobile) { ?>

<div id="header">
	<div id="center">
		<img id="penguin" src="/assets/images/penguin.png" alt="A pretty picture of a penguin, that you're really missing out on.">
		<img id="logo" src="/assets/images/logo.png" alt="Just a Penguin">
		<p>Impersonating penguins since 2010.</p>
		<div id="navigation">
			<?php echo $navigation_html; ?>
		</div>
	</div>		
</div>

<?php } ?>

<!--/ header file -->
<!-- content -->

<?php if($mobile && $index_page) { ?>

<div id="container" class="center">
	<img class="penguin" src="/assets/images/penguin.png" alt="A pretty picture of a penguin, that you're really missing out on.">
	<h2>Just a penguin</h2>
</div>

<?php } ?>