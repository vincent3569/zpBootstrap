<?php include('inc_header.php'); ?>

	<!-- wrap -->
		<!-- container -->
			<!-- header -->
				<h3><?php echo gettext('Archive View'); ?></h3>
			</div> <!-- /header -->

			<table id="archives" class="table">
				<thead>
					<th><h4 class="center"><?php echo gettext('Gallery Archive'); ?></h4></th>
					<?php if (function_exists('printNewsArchive')) { ?>
					<th><h4 class="center"><?php echo gettext_th('News archive'); ?></h4></th>
					<?php } ?>
				</thead>
				<tbody>
					<tr>
						<td>
							<?php printAllDates('unstyled', 'year', 'nav nav-pills', 'desc'); ?>
						</td>
						<?php if (function_exists('printNewsArchive')) { ?>
						<td id="newsarchives">
							<?php printNewsArchive('unstyled', 'year', 'nav nav-pills', null, false, 'desc'); ?>
						</td>
						<?php } ?>
					</tr>
				</tbody>
			</table>

			<?php if (getOption('zpB_show_tags')) { ?>
			<table id="tags" class="table">
				<thead>
					<th><h4 class="center"><?php echo gettext('Tags'); ?></h4></th>
				</thead>
				<tbody>
					<tr>
						<td>
							<?php printAllTagsAs('cloud', 'nav nav-pills', 'abc', false, true, 2.5, 30, 5, NULL, 1); ?>
						</td>
					</tr>
				</tbody>
			</table>
			<?php } ?>

<?php include('inc_footer.php'); ?>