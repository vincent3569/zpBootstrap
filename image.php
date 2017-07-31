<?php include('inc_header.php'); ?>

	<!-- wrap -->
		<!-- container -->
			<!-- header -->
				<h3><?php printGalleryTitle(); ?></h3>
			</div>

			<div class="breadcrumb">
				<h4>
					<?php if (getOption('zpB_homepage')) { ?>
						<?php printCustomPageURL(getGalleryTitle(), 'gallery'); ?>
					<?php } else { ?>
						<a href="<?php echo html_encode(getGalleryIndexURL()); ?>" title="<?php echo gettext('Albums Index'); ?>"><?php echo html_encode(getGalleryTitle()); ?></a>
					<?php } ?>&raquo;
					<?php printParentBreadcrumb('', ' » ', ' » '); ?>
					<?php printAlbumBreadcrumb('', ' » '); printImageTitle(true); ?>
				</h4>
			</div>

			<div class="center">
				<?php if (getOption('zpB_slideshow') <> 'none') { ?>
				<ul class="pager hidden-phone pull-right">
					<li>
						<?php zpB_printSlideShowLink(gettext('Slideshow')); ?>
					</li>
				</ul>
				<?php } ?>

				<ul class="pager">
				<?php if (hasPrevImage()) { ?>
					<li><a href="<?php echo html_encode(getPrevImageURL()); ?>" title="<?php echo gettext('Previous Image'); ?>">&laquo; <?php echo gettext('prev'); ?></a></li>
				<?php } else { ?>
					<li class="disabled"><a href="#">&laquo; <?php echo gettext('prev'); ?></a></li>
				<?php } ?>
				<?php if (hasNextImage()) { ?>
					<li><a href="<?php echo html_encode(getNextImageURL()); ?>" title="<?php echo gettext('Next Image'); ?>"><?php echo gettext('next'); ?> &raquo;</a></li>
				<?php } else { ?>
					<li class="disabled"><a href="#"><?php echo gettext('next'); ?> &raquo;</a></li>
				<?php } ?>
				</ul>
			</div>

			<div class="center">
				<?php printDefaultSizedImage(getImageTitle(), 'image ombre remove-attributes'); ?>
			</div>

			<div class="row photo-description">
				<div class="span3 offset2">
					<h4>
						<?php if ((getOption('zpB_show_exif')) && (getImageMetaData())) { ?>
						<a href="#exif_data" data-toggle="modal"><i class="icon-info-sign"></i></a>
						<?php } ?>
						<?php printImageTitle(true); ?>
					</h4>
					<?php if ((getOption('zpB_show_exif')) && (getImageMetaData())) { ?>
					<div id="exif_data" class="modal hide"><?php printImageMetadata('', false); ?></div>
					<script type="text/javascript">
						jQuery(document).ready(function($) {
							$('#exif_data').modal({
								show: false
							});
						});
					</script>
					<?php } ?>
				</div>
				<div class="span5">
					<?php printImageDesc(true); ?>
				</div>
			</div>

			<?php if (getOption('zpB_show_tags') || function_exists('printRating')) { ?>
			<div class="row photo-description">
				<?php if (getOption('zpB_show_tags')) { ?>
				<div class="span8 offset2">
					<div class="center"><?php printTags('links', NULL, 'nav nav-pills', NULL); ?></div>
				</div>
				<?php } ?>

				<?php if (function_exists('printRating')) { ?>
				<div id="rating" class="span8 offset2">
					<div><?php printRating(); ?></div>
				</div>
				<?php } ?>
			</div>
			<?php } ?>

			<?php include('inc_print_comment.php'); ?>

<?php include('inc_footer.php'); ?>