<?php

// force UTF-8 Ø

/**
 * Prints a link to call the slideshow (not shown if there are no images in the album)
 * To be used on album.php and image.php
 * @param string $linktext Text for the link
 */
function zpB_printSlideShowLink($linktext='') {
	global $_zp_gallery, $_zp_current_album, $_zp_current_image, $_zp_current_search, $_zp_gallery_page;

	$numberofimages = getNumImages();
	if ($numberofimages > 1) {
		if ((in_context(ZP_SEARCH_LINKED) && !in_context(ZP_ALBUM_LINKED)) || in_context(ZP_SEARCH) && is_null($_zp_current_album)) {
			$images = $_zp_current_search->getImages(0);
		} else {
			$images = $_zp_current_album->getImages(0);
		}
		$count = '';
		foreach ($images as $image) {
			if (is_array($image)) {
				$suffix = getSuffix($image['filename']);
			} else {
				$suffix = getSuffix($image);
			}
			$suffixes = array('jpg','jpeg','gif','png');
			if (in_array($suffix,$suffixes)) {
				$count++;
				if (is_array($image)) {
					$albobj = new Album($_zp_gallery,$image['folder']);
					$imgobj = newImage($albobj,$image['filename']);
				} else {
					$imgobj = newImage($_zp_current_album,$image);
				}
				if ($_zp_gallery_page == 'image.php' || in_context(ZP_SEARCH_LINKED)) {
					if (in_context(ZP_SEARCH_LINKED)) {
						if ($count == 1) {
							$style = '';
						} else {
							$style = ' style="display:none"';
						}
					} else {
						if ($_zp_current_image->filename == $image) {
							$style = '';
						} else {
							$style = ' style="display:none"';
						}
					}
				} elseif ($_zp_gallery_page == 'album.php' || $_zp_gallery_page == 'search.php') {
					if ($count == 1) {
						$style = '';
					} else {
						$style = ' style="display:none"';
					}
				}
				switch(getOption('zpB_slideshow')) {
					case 'fullimage':
						$imagelink = $imgobj->getFullImage();
						break;
					case 'sizedimage':
						$imagelink = $imgobj->getCustomImage(getOption('image_size'), NULL, NULL, NULL, NULL, NULL, NULL);
						break;
				}
				$imagetitle = html_encode(strip_tags($imgobj->getTitle())); ?>

				<a href="<?php echo html_encode($imagelink); ?>" rel="slideshow"<?php echo $style; ?> title="<?php echo $imagetitle; ?>"><?php echo $linktext; ?></a>

				<?php
			}
		}
	}
}

/**
 * Prints a warning if there is some plugin used
 */
function zpB_checkPlugin() {
	if (!getOption('zpB_disablewarning')) {
		$plugin_count = 0; $warning_item = '';
		if (getOption('zp_plugin_colorbox_js')) {
			$warning_item .= gettext_th('<li>Disable <strong><em>Colorbox</em></strong> plugin (zpBoostrap uses and configures it\'s own colorbox and modal plugins)</li>', 'zpBootstrap');
			$plugin_count++;
		}
		if (getOption('zp_plugin_slideshow')) {
			$warning_item .= gettext_th('<li>Disable <strong><em>Slideshow</em></strong> plugin (zpBoostrap uses and configures it\'s own colorbox plugin for the slideshow)</li>', 'zpBootstrap');
			$plugin_count++;
		}
		if ($plugin_count > 0) {
			$warning_msg = '<div class="row"><div class="span10 offset1"><div class="alert alert-error">' . gettext_th('<h4>Warning</h4><p>There are some plugins that you should be disabled in admin</p>', 'zpBootstrap') . '<ul>';
			$warning_msg .= $warning_item;
			$warning_msg .= '</ul><p>' . gettext_th('You can turn off this message in the theme options.', 'zpBootstrap') . '</p></div></div></div>';

			echo $warning_msg;
		}
	}
}
?>