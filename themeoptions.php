<?php

/* Plug-in for theme option handling
 * The Admin Options page tests for the presence of this file in a theme folder
 * If it is present it is linked to with a require_once call.
 * If it is not present, no theme options are displayed.
 */

require_once(SERVERPATH . '/' . ZENFOLDER . '/admin-functions.php');

class ThemeOptions {

	function __construct() {

		$me = basename(dirname(__FILE__));
		setThemeOptionDefault('albums_per_row', 3);
		setThemeOptionDefault('albums_per_page', 12);
		setThemeOptionDefault('images_per_row', 4);
		setThemeOptionDefault('images_per_page', 16);
		setThemeOptionDefault('thumb_size', 220);
		setThemeOptionDefault('thumb_crop', 1);
		setThemeOptionDefault('thumb_crop_width', 220);
		setThemeOptionDefault('thumb_crop_height', 220);
		purgeThemeOption('image_size');
		setThemeOptionDefault('image_size', 1000);
		setThemeOptionDefault('image_use_side', 'longest');
		setThemeOptionDefault('custom_index_page', 'gallery');

		setThemeOptionDefault('zpB_homepage', true);
		setThemeOptionDefault('zpB_latest_news_homepage', false);
		setThemeOptionDefault('zpB_homepage_album_filename', '');
		setThemeOptionDefault('zpB_homepage_random_pictures', 5);
		setThemeOptionDefault('zpB_use_infinitescroll_gallery', false);
		setThemeOptionDefault('zpB_use_infinitescroll_albums', false);
		setThemeOptionDefault('zpB_use_infinitescroll_news', false);
		setThemeOptionDefault('zpB_use_isotope', false);
		setThemeOptionDefault('zpB_allow_search', true);
		setThemeOptionDefault('zpB_exerpt_length', 200);
		setThemeOptionDefault('zpB_show_archive', true);
		setThemeOptionDefault('zpB_show_tags', true);
		setThemeOptionDefault('zpB_social_links', true);
		setThemeOptionDefault('zpB_show_exif', true);
		setThemeOptionDefault('zpB_custom_menu', false);

		if (class_exists('cacheManager')) {
			cacheManager::deleteCacheSizes($me);
			cacheManager::addDefaultThumbSize();
			cacheManager::addDefaultSizedImageSize();
			$img_wmk = getOption('fullimage_watermark') ? getOption('fullimage_watermark') : null;
			$thumb_wmk = getOption('Image_watermark') ? getOption('Image_watermark') : null;
			cacheManager::addCacheSize($me, NULL, getOption('zpB_album_thumb_width'), getOption('zpB_album_thumb_height'), getOption('zpB_album_thumb_width'), getOption('zpB_album_thumb_height'), NULL, NULL, NULL, $thumb_wmk, $img_effect, false);
			cacheManager::addCacheSize($me, NULL, 1000, 500, 1000, 500, NULL, NULL, NULL, $img_wmk, $img_effect, false);
		}

		if (class_exists('menu_manager')) {
			$menuitems = array(
				array('type' => 'homepage', 'title' => gettext('Home'), 'link' => '', 'show' => 1, 'nesting' => 0),
				array('type' => 'zenpagenewsindex', 'title' => gettext('News'), 'link' => '', 'show' => 1, 'nesting' => 0),
				array('type' => 'galleryindex', 'title' => gettext('Gallery'), 'link' => '', 'show' => 1, 'nesting' => 0),
				array('type' => 'menufunction', 'title' => gettext('Pages'), 'link' => 'printPageMenu("list-top", "", "active", "", "", "", 0, false);', 'show' => 1, 'nesting' => 0),
			);
			createMenuIfNotExists($menuitems, 'zpBootstrap');
		}
	}

	function getOptionsDisabled() {
		return array('thumb_size', 'image_size', 'custom_index_page');
	}

	function getOptionsSupported() {

		$me = basename(dirname(__FILE__));
		$albums = $album_list = array();
		global $_zp_gallery;
		$album_list = $_zp_gallery->getAllAlbums(NULL, ALL_ALBUMS_RIGHTS, true);
		foreach ($album_list as $fullfolder => $albumtitle) {
			$albums[$fullfolder] = $fullfolder;
		}

		return array(
			gettext('Homepage') => array(
				'order' => 0,
				'key' => 'zpB_homepage',
				'type' => OPTION_TYPE_CHECKBOX,
				'desc' => gettext_th('Display a home page, with a slider of random pictures, the gallery description and the latest news.', $me)),
			gettext_th('Latest news on Homepage', $me) => array(
				'order' => 1,
				'key' => 'zpB_latest_news_homepage',
				'type' => OPTION_TYPE_CHECKBOX,
				'desc' => gettext_th('Display the latest news on the home page (Homepage option have to be selected too).', $me)),
			gettext_th('Homepage slider', $me) => array(
				'order' => 2,
				'key' => 'zpB_homepage_album_filename',
				'type' => OPTION_TYPE_SELECTOR,
				'null_selection' => '* ' . gettext('Gallery') . ' *',
				'selections' => $albums,
				'multilingual' => 0,
				'desc' =>
					gettext_th('Select the Album to use for the homepage slider (Dynamic albums may used).', $me) . '<br />' .
					gettext_th('If Gallery is selected, the whole gallery will be used for the slider.', $me)),
			gettext_th('Random pictures for homepage slider', $me) => array(
				'order' => 4,
				'key' => 'zpB_homepage_random_pictures',
				'type' => OPTION_TYPE_TEXTBOX,
				'multilingual' => 0,
				'desc' => gettext_th('Number of random pictures to use for the homepage slider.', $me)),
			gettext_th('Use infinite scroll', $me) => array(
				'order' => 5,
				'key' => 'zpB_infinitescroll',
				'type' => OPTION_TYPE_CHECKBOX_ARRAY,
				'checkboxes' => array(
					gettext('Gallery') => 'zpB_use_infinitescroll_gallery',
					gettext('Albums') => 'zpB_use_infinitescroll_albums',
					gettext('News') => 'zpB_use_infinitescroll_news'),
				'desc' =>
					gettext_th('Check pages which use <a href="https://infinite-scroll.com/" target="_blank">infinite-scroll jQuery plugin</a>. This layout will automatically load items of next page (albums, images or news) without pagination.', $me) . '<br />' .
					gettext_th('The behavior is "manual first": it requires visitor to click a button the first time to load new items and then, it automatically load after.', $me) . '<br />' .
					gettext_th('Rather than using infinite-scroll layout for all albums, you may also allow "multiple_layouts" plugin and then choose "album_infinitescroll" as layout for specific albums of your gallery.', $me) .
					'<p class="notebox">' . gettext_th('<strong>Note:</strong> This album layout does not manage albums with images and sub-albums (in that case, standard album layout is automatically used).', $me) . '</p>'),
			gettext_th('Use isotope', $me) => array(
				'order' => 6,
				'key' => 'zpB_use_isotope',
				'type' => OPTION_TYPE_CHECKBOX,
				'desc' =>
					gettext_th('Use <a href="https://isotope.metafizzy.co/" target="_blank">isotope jQuery plugin</a> for albums pages. This layout allows to display uncropped thumbnails and to filter them based on their tags.', $me) . '<br />' .
					gettext_th('Rather than use isotope layout for all albums, you may also allow "multiple_layouts" plugin and then choice "album_isotope" as layout for specific albums of your gallery.', $me) .
					'<p class="notebox">' .
						gettext_th('<strong>Note:</strong> This album layout does not manage sub-albums (in that case, only pictures of the album are shown and you cant not access on sub-albums).', $me) . '<br />' .
						gettext_th('This option overwrites the infinite scroll on album option above.', $me) .
					'</p>'),
			gettext_th('Social Links', $me) => array(
				'order' => 8,
				'key' => 'zpB_social_links',
				'type' => OPTION_TYPE_CHECKBOX,
				'desc' => gettext_th('Check to show some social links.', $me)),
			gettext('Allow search') => array(
				'order' => 10,
				'key' => 'zpB_allow_search',
				'type' => OPTION_TYPE_CHECKBOX,
				'desc' => gettext('Check to enable search form.')),
			gettext_th('Excerpt length', $me) => array(
				'order' => 11,
				'key' => 'zpB_exerpt_length',
				'type' => OPTION_TYPE_TEXTBOX,
				'desc' => gettext_th('Excerpt length for news and pages lists in search page', $me)),
			gettext('Archive View') => array(
				'order' => 12,
				'key' => 'zpB_show_archive',
				'type' => OPTION_TYPE_CHECKBOX,
				'desc' => gettext_th('Display a link to the Archive list.', $me)),
			gettext('Tags') => array(
				'order' => 14,
				'key' => 'zpB_show_tags',
				'type' => OPTION_TYPE_CHECKBOX,
				'desc' => gettext_th('Check to show a tag cloud in Archive list, with all the tags of the gallery.', $me)),
			gettext('Exif') => array(
				'order' => 16,
				'key' => 'zpB_show_exif',
				'type' => OPTION_TYPE_CHECKBOX,
				'desc' => gettext_th('Show the EXIFs Data on Image page. Remember you have to check EXIFs data you want to show on Options>Image>Metadata.', $me)),
			gettext('Use custom menu') => array(
				'order' => 4.5,
				'key' => 'zpB_custom_menu',
				'type' => OPTION_TYPE_CHECKBOX,
				'desc' =>
					gettext_th('Check this if you want to use the "menu_manager" plugin if enabled to use a custom menu instead of the standard one.', $me) .
					'<p class="notebox">' . gettext_th('<strong>Note:</strong> A custom menu named "zpBootstrap" is used automatically. You can change this custom menu in "menu" tab.', $me) . '</p>'),
		);
	}

	function handleOption($option, $currentValue) {
	}
}
?>