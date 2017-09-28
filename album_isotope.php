<?php include('inc_header.php');
require_once (SERVERPATH . '/' . ZENFOLDER . '/' . PLUGIN_FOLDER . '/tag_extras.php');
?>

	<!-- .container main -->
		<!-- .page-header -->
			<!-- .header -->
				<h3><?php printGalleryTitle(); ?></h3>
			</div><!-- .header -->
		</div><!-- /.page-header -->

		<div class="breadcrumb">
			<h4>
				<?php printGalleryIndexURL(' » ', getGalleryTitle(), false); ?><?php printParentBreadcrumb('', ' » ', ' » '); ?><?php printAlbumTitle(); ?>
			</h4>
		</div>

		<div class="page-header margin-bottom-reset">
			<?php printAlbumDesc(true); ?>
		</div>

		<?php
		$name = $_zp_current_album->name;
		$tags_album = getAllTagsFromAlbum($name, false, 'images');
		?>
		<?php if (!empty($tags_album)) { ?>
		<div class="pager">
			<div class="btn-group filters-button-group">
				<button class="btn btn-default btn-sm active" data-filter="*">Toutes</button>
				<?php foreach ($tags_album as $tag) { ?>
				<button class="btn btn-default btn-sm" data-filter=".<?php echo $tag['name']; ?>"><?php echo $tag['name']; ?></button>
				<?php } ?>
			</div>
		</div>
		<?php } ?>

		<div id="isotope-wrap" class="images-wrap margin-bottom-double">
			<?php
			while (next_image(true)) {
				if (getFullWidth() > getFullHeight()) {
					$image_item_size_2 = 'image-item-width2';
				} else if (getFullWidth() < getFullHeight()) {
					$image_item_size_2 = 'image-item-height2';
				} else {
					$image_item_size_2 = '';
				}

				$tags_image = getTags();
				$tags_list = implode(' ', $tags_image);

				if ($tags_list <> '') {
					$class = $image_item_size_2 . ' ' . $tags_list;
				} else {
					$class = $image_item_size_2;
				}
				?>

				<div class="image-item <?php echo $class; ?>">
					<a class="swipebox" href="<?php echo html_encode(getUnprotectedImageURL()); ?>" title="<?php echo getBareImageTitle(); ?>">
						<?php
						if (getFullWidth() > getFullHeight()) {
							printCustomSizedImage(getBareImageTitle(), NULL, 235, 150, 235, 150, NULL, NULL, 'remove-attributes img-responsive', NULL, true);
						} else if (getFullWidth() < getFullHeight()) {
							printCustomSizedImage(getBareImageTitle(), NULL, 150, 235, 150, 235, NULL, NULL, 'remove-attributes img-responsive', NULL, true);
						} else {
							printCustomSizedImage(getBareImageTitle(), NULL, 150, 150, NULL, NULL, NULL, NULL, 'remove-attributes img-responsive', NULL, true);
						} ?>
					</a>
				</div>
			<?php } ?>
		</div>

		<script type="text/javascript" src="<?php echo $_zp_themeroot; ?>/js/imagesloaded.pkgd.min.js"></script>
		<script type="text/javascript" src="<?php echo $_zp_themeroot; ?>/js/isotope.pkgd.min.js"></script>
		<script type="text/javascript" src="<?php echo $_zp_themeroot; ?>/js/packery-mode.pkgd.min.js"></script>

		<script type="text/javascript">
			// init Isotope
			var $containter = $('#isotope-wrap').imagesLoaded( function() {
				// init Isotope after all images have loaded
				$containter.isotope({
					itemSelector: '.image-item',
					layoutMode: 'packery',
					// packery layout
					packery: {
						gutter: 20
					}
					// standard masonry layout
					/*masonry: {
						columnWidth: 5
					}*/
				});
			});

			// bind filter button click
			$('.filters-button-group').on( 'click', 'button', function() {
				var filterValue = $(this).attr('data-filter');
				$containter.isotope({ filter: filterValue });
			});

			// change is-active class on buttons
			$('.btn-group').each( function( i, buttonGroup ) {
				var $buttonGroup = $(buttonGroup);
				$buttonGroup.on( 'click', 'button', function() {
					$buttonGroup.find('.active').removeClass('active');
					$(this).addClass('active');
				});
			});
		</script>

		<?php if ((zp_loggedin()) && (extensionEnabled('favoritesHandler'))) { ?>
			<div class="favorites panel-group" role="tablist">
				<?php printAddToFavorites($_zp_current_album); ?>
			</div>
		<?php } ?>

		<?php if (extensionEnabled('GoogleMap')) {
			// theme doesnot support colorbox option for googlemap plugin
			if (getOption('gmap_display') == 'colorbox') { ?>
				<div class="alert alert-danger">theme doesn't support colorbox option for googlemap plugin</div>
			<?php }
			// display map only if they are geodata
			if ((getOption('gmap_display') == 'hide') || (getOption('gmap_display') == 'show')) {
				$hasAlbumGeodata = false;
				$album = $_zp_current_album;
				$images = $album->getImages();

				foreach ($images as $an_image) {
					$image = newImage($album, $an_image);
					$exif = $image->getMetaData();
					if ((!empty($exif['EXIFGPSLatitude'])) && (!empty($exif['EXIFGPSLongitude']))) {
						$hasAlbumGeodata = true; // at least one image has geodata
					}
				}

				if ($hasAlbumGeodata == true) {
					if (getOption('gmap_display') == 'hide') {
						$gmap_display = 'gmap_hide';
					} else if (getOption('gmap_display') == 'show') {
						$gmap_display = 'gmap_show';
					}
					?>
					<div id="gmap_accordion" class="panel-group" role="tablist">
						<div class="panel panel-default">
							<div id="gmap_heading" class="panel-heading" role="tab">
								<h4 class="panel-title">
									<a id="<?php echo $gmap_display; ?>" data-toggle="collapse" data-parent="#gmap_accordion" href="#gmap_collapse_data">
										<span class="glyphicon glyphicon-map-marker"></span>&nbsp;<?php echo gettext('Google Map'); ?>
									</a>
								</h4>
							</div>
						</div>
						<?php printGoogleMap('', 'gmap_collapse'); ?>
						<script type="text/javascript">
						//<![CDATA[
							;$('#gmap_collapse_data').on('show.bs.collapse', function () {
								$('.hidden_map').removeClass('hidden_map');
							})
						//]]>
						</script>
					</div>
					<?php
				}
			}
		}
		?>

		<?php if (extensionEnabled('comment_form')) { ?>
			<?php include('inc_print_comment.php'); ?>
		<?php } ?>

	</div><!-- /.container main -->

<?php include('inc_footer.php'); ?>