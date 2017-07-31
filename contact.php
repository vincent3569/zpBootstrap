<?php include('inc_header.php'); ?>

	<!-- wrap -->
		<!-- container -->
			<!-- header -->
				<h3><?php echo gettext('Contact'); ?></h3>
			</div> <!-- /header -->

			<div class="row">
				<div class="span10 offset1">
					<div class="post">
						<?php
						if (function_exists('printContactForm')) {
							printContactForm();
						} else {
							echo '<p>' . gettext('The Contact Form plugin has not been activated.' . '</p>');
						}
						?>
					</div>
				</div>
			</div>

<?php include('inc_footer.php'); ?>