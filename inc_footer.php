		</div> <!-- /container -->

		<div class="navbar bottom">
			<div class="navbar-inner">
				<div class="row">
					<?php if (getOption('allow_search')) { ?>
					<div class="span6 pull-right">
						<?php printSearchForm(); ?>
					</div>
					<?php } ?>
					<div class="span6 pull-left">
						<div id="copyright">
							<?php
							echo getMainSiteName();
							if (getOption('zpB_show_archive')) {
								printCustomPageURL(gettext('Archive View'), 'archive', '', ' | ');
							}
							if ((!zp_loggedin()) && (function_exists('printRegistrationForm'))) {
								printCustomPageURL(gettext('Register'), 'register', '', ' | ');
							}
							if (!zp_loggedin()) {
								if (function_exists('printUserLogin_out')) {
									printUserLogin_out(' | ', '', 1); ?>
									<script type="text/javascript">
										$('.passwordform').before('| <a href="#zpB_login_passwordform" data-toggle="modal" class="zpB_logonlink" title="<?php echo gettext('Login'); ?>"><?php echo gettext('Login'); ?></a>');
										
										$('#zpB_login_passwordform').modal({
											show: true
										});
									</script>
								<?php
								}
							} else {
								echo ' | '; printAdminToolbox(); ?>
								<script type="text/javascript">
									$('#admin_data').modal({
										show: false
									});
								</script>
							<?php } ?>
						</div>
						<div>
							<?php printZenphotoLink(); ?> & <a href="http://twitter.github.com/bootstrap/" target="_blank" title="Bootstrap">Bootstrap</a>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- /footer -->

	</div> <!-- /wrap -->

	<!-- a supprimer en prod -->
	<!-- <div class="resize"></div> -->

	<?php zp_apply_filter('theme_body_close'); ?>

	</body>
</html>
<!-- zpBootstrap 1.4.3 - a ZenPhoto/ZenPage theme by Vincent3569 -->