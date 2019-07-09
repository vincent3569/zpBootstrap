<?php
if ((getNumAlbums() > 0) && (getNumImages() > 0)) {
	include('album_standard.php');
} else {
	include('inc_header.php');
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
			<?php printAlbumDesc(); ?>
		</div>

		<?php
		if (isAlbumPage()) {
			include('inc_print_album_thumb.php');
		}
		if (isImagePage()) {
			include('inc_print_image_thumb.php');
		}

		include('inc_print_infinitescroll.php');
		?>

		<?php if ((zp_loggedin()) && (extensionEnabled('favoritesHandler'))) { ?>
			<div class="favorites panel-group" role="tablist">
				<?php printAddToFavorites($_zp_current_album); ?>
			</div>
		<?php } ?>

		<?php if (extensionEnabled('GoogleMap')) { ?>
			<?php include('inc_print_googlemap.php'); ?>
		<?php } ?>

		<?php if (extensionEnabled('openstreetmap')) { ?>
			<?php include('inc_print_osm.php'); ?>
		<?php } ?>

		<?php if (extensionEnabled('comment_form')) { ?>
			<?php include('inc_print_comment.php'); ?>
		<?php } ?>

	</div><!-- /.container main -->

<?php
	include('inc_footer.php'); 
}
?>