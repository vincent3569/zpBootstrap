<?php
$me = basename(dirname(__FILE__));

// Zenphoto theme definition file
$theme_description['name'] = 'zpBootstrap';
$theme_description['author'] = 'Vincent3569';
$theme_description['version'] = '2.3';
$theme_description['date'] = '31/03/2020';
$theme_description['desc'] =
gettext_th('A responsive Zenphoto theme ready for desktop to mobile device, using <a href="https://getbootstrap.com/docs/3.4/" title="Boostrap" target="_blank">Boostrap 3.4</a> framework.', $me) . '<br />' .
gettext_th('Please read', $me) . ' <a href="' . FULLWEBPATH . '/' . THEMEFOLDER . '/' . $me . '/readme.htm' . '" title="Readme File" target="_blank">Readme</a>, <a href="' . FULLWEBPATH . '/' . THEMEFOLDER . '/' . $me . '/license.htm' . '" title="License File" target="_blank">License</a> ' . gettext_th('and', $me) . ' <a href="' . FULLWEBPATH . '/' . THEMEFOLDER . '/' . $me . '/changelog.txt' . '" title="ChangeLog File" target="_blank">ChangeLog</a><br />' .
gettext_th('To design your content to be responsive using Boostrap framework, you can have a look on', $me). ' <a href="' . FULLWEBPATH . '/' . THEMEFOLDER . '/' . $me . '/bootstrap_grid_system.htm' . '" title="Bootstrap Grid System" target="_blank">' . gettext_th('Bootstrap Grid System', $me) . '</a>';
?>