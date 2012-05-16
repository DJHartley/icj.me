<!-- Header file -->
<!-- Meta tags -->
<meta name="googlebot" content="NOODP, nofollow">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="format-detection" content="telephone=no">

<?php 
if(!$nocrawl) {
// basic meta info
	if(!$description) {
		$description = "Just a Penguin is the home of cj, an aspiring software developer.";
	}
	echo '<meta name="description" content="'.$description.'"/>' . "\n";

	if (!$keywords) {
		$keywords = "icj, jailbreak, cj, ikeyhelper, ios firmware links, download ios, ios, iphone, ipad";
	}
	echo '<meta name="keywords" content="'.$keywords.'"/>' . "\n";
} else {
	echo '<meta name="robots" content="noindex" />';
}
?>

<!-- styles -->
<link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico">
<link rel="apple-touch-icon" href="./images/icon_ios.png">
<link rel="stylesheet" type="text/css" href="./css/style.min.css?v=3">

<!-- scripts -->
<?php 
	// iOS formatting - including orientation change
	if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod')) {
		echo '<meta name="viewport" content="width=device-width, initial-scale=0.533, maximum-scale=0.533, user-scalable=no">';
		echo '</head>
<body onorientationchange="updateOrientation();">';	
	} else {
		echo '</head>
<body>';
	}
?>

<div id="header">
	<div id="center">
		<a href="/"><img class="logo" src="./images/JustaPenguin.png" alt="Just A Penguin"></a>
	</div>
</div>

<div id="navigation">
<?php
	// formatting for the current page
	// sometimes recursive (e.g. /ios/faq will show "Firmware Links" as the active page)
	function is_current_page($url, $title, $follow = false) {
		if (($_SERVER['REQUEST_URI'] == $url) || (strpos($_SERVER['REQUEST_URI'], $url) !== false)  && $follow) {
			echo '	<a class="current" href="' . $url . '">' . $title . "</a>\n";
		} else {
			echo '	<a href="' . $url . '">' . $title . "</a>\n";
		}
	}

	// load navigation bar
	is_current_page("/", "Home");
	is_current_page("/iKeyHelper", "iKeyHelper");
	is_current_page("/ios", "Firmware Links", true);
	is_current_page("/tutorials", "Tutorials", true);
	is_current_page("/dont-afk-and-minecraft", "Minecraft");
	is_current_page("/contact", "Contact", true);

?>
</div>
<!--/ Header file -->