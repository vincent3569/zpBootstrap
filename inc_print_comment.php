			<?php
			switch ($_zp_gallery_page) {
				case 'album.php':
					$comments_open = getOption('comment_form_albums');
					$comments_allowed = getCommentsAllowed();
					break;
				case 'image.php':
					$comments_open = getOption('comment_form_images');
					$comments_allowed = getCommentsAllowed();
					break;
				case 'pages.php':
					$comments_open = getOption('comment_form_pages');
					$comments_allowed = zenpageOpenedForComments();
					break;
				case 'news.php':
					$comments_open = getOption('comment_form_articles');
					$comments_allowed = zenpageOpenedForComments();
					break;
				default:
					return;
					break;
			}

			if ((function_exists('printCommentForm')) && ($comments_open)) {
				if ($comments_allowed || (getCommentCount() > 0 )) { ?>
					<div class="accordion" id="comment_accordion">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#comment_accordion" href="#comment">
								<i class="icon-comment"></i>
								<?php
								$num = getCommentCount();
								if ($num == 0) {
									echo gettext('No Comments');
								} else {
									echo sprintf(ngettext('%u Comment','%u Comments',$num), $num);
								}
								?>
							</a>
						</div>
						<div id="comment" class="collapse">
							<?php printCommentForm(true, NULL, true); ?>
						</div>
					</div>
				<?php
				}
			}
			?>