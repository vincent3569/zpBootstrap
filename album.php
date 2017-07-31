<?php include ('inc_header.php'); ?>

	<!-- wrap -->
		<!-- container -->
			<!-- header -->
				<h3><?php printGalleryTitle(); ?></h3>
			</div> <!-- / header -->

			<div class="breadcrumb">
				<h4>
					<?php if (getOption('zpB_homepage')) { ?>
						<?php printCustomPageURL(getGalleryTitle(), 'gallery'); ?>
					<?php } else { ?>
						<a href="<?php echo html_encode(getGalleryIndexURL()); ?>" title="<?php echo gettext('Albums Index'); ?>"><?php echo html_encode(getGalleryTitle()); ?></a>
					<?php } ?>&raquo;
					<?php printParentBreadcrumb('', ' » ', ' » '); ?>
					<?php printAlbumTitle(); ?>
				</h4>
			</div>

			<?php if (getOption('zpB_slideshow') <> 'none') { ?>
			<ul class="pager hidden-phone pull-right">
				<li>
					<?php zpB_printSlideShowLink(gettext('Slideshow')); ?>
				</li>
			</ul>
			<?php } ?>

			<?php printPageListWithNav('«', '»', false, true, 'pagination', NULL, true, 7); ?>

			<div class="page-header bottom-margin-reset">
				<p><?php printAlbumDesc(true); ?></p>
			</div>

			<?php include('inc_print_album_thumb.php'); ?>

			<?php include('inc_print_image_thumb.php'); ?>

			<?php printPageListWithNav('«', '»', false, true, 'pagination', NULL, true, 7); ?>

			<?php if (function_exists('printGoogleMap')) {
				$MAP = new GoogleMapAPI();
				if (getAlbumGeodata($_zp_current_album, $MAP)) {
				?>
				<div class="accordion" id="gmap_accordion">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#gmap_accordion" href="#zpB_googlemap_data" title="<?php echo gettext('Display or hide the Google Map.'); ?>">
							<i class="icon-map-marker"></i><?php echo gettext('Google Map'); ?>
						</a>
						<?php printGoogleMap(NULL, 'googlemap'); ?>
						<script type="text/javascript">
							jQuery(document).ready(function($) {
								$('#zpB_googlemap_data').collapse(
									'<?php if ((getoption('gmap_display') == 'hide') || (getoption('gmap_display') == 'colorbox'))  { echo 'hide'; } else if (getoption('gmap_display') == 'show') { echo 'show'; } ?>'
								);
							});
						</script>
					</div>
				</div>
				<?php
				}
			}
			?>

			<?php include('inc_print_comment.php'); ?>

<?php include ('inc_footer.php'); ?>