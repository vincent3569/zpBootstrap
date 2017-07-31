<?php
if (getOption('zpB_homepage')) {
	$isHomePage = true;
	include ('home.php');
} else {
	$isHomePage = false;
	include ('gallery.php');
}
?>