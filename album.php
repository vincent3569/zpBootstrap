<?php
/**************************************************************************************************/
/* redirect to album script, depending on zpB_use_isotope and zpB_use_infinitscroll_albums option */
/**************************************************************************************************/

if (getOption('zpB_use_isotope')) {
	include ('album_isotope.php');
} else if (getOption('zpB_use_infinitscroll_albums')) {
	include ('album_infinitscroll.php');
} else {
	include ('album_standard.php');
}
?>