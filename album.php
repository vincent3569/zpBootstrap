<?php
/*****************************************************************/
/* redirect to album script, depending on zpB_use_isotope option */
/*****************************************************************/

if (getOption('zpB_use_isotope')) {
	include ('album_isotope.php');
} else {
	include ('album_standard.php');
}
?>