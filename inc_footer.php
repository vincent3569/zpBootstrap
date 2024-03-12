	<footer id="footer" class="footer">
		<div class="container">
			<div id="copyright">
				<?php
				echo getParentSiteTitle();
				if (getOption('zpB_show_archive')) {
					printCustomPageURL(gettext('Archive View'), 'archive', '', ' | ');
				}
				$data = getDataUsageNotice();
				if (!empty($data['url'])) {
					echo ' | '; printLinkHTML($data['url'], $data['linktext'], $data['linktext'], null, null);
				}
				?>
			</div>
			<div>
				<?php printZenphotoLink(); ?> & <a href="https://getbootstrap.com/docs/3.4/" target="_blank" title="Bootstrap">Bootstrap</a>
			</div>
		</div>
	</footer>

	<?php zp_apply_filter('theme_body_close'); ?>

	</body>
</html>
<!-- zpBootstrap 2.3 - a Zenphoto theme by Vincent3569 -->