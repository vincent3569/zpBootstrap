<?php
/**
 * Form for registering users
 */

Zenphoto_Authority::printPasswordFormJS();
$action = preg_replace('/\?verify=(.*)/', '', sanitize($_SERVER['REQUEST_URI']));
$emailid = getOption('register_user_email_is_id');
?>
	<form id="mailform" class="form-horizontal" action="<?php echo $action; ?>" method="post" autocomplete="off">
		<input type="hidden" name="register_user" value="yes" />

		<div class="control-group">
			<label class="control-label" for="adminuser"><?php if ($emailid) {echo gettext("Email* (this will be your user id)");} else {echo gettext("User ID").' *';}  ?></label>
			<div class="controls">
				<input type="text" id="adminuser" name="user" class="input-large" value="<?php echo html_encode($user); ?>" size="<?php echo TEXT_INPUT_SIZE; ?>" />
			</div>
		</div>

		<?php /*$_zp_authority->printPasswordForm('', false, NULL, false, $flag='*'); */?>

		<input type="hidden" name="passrequired" id="passrequired-" value="<?php echo (int) false; ?>" />

		<div class="control-group">
			<label class="control-label" for="pass" id="strength"><?php echo gettext("Password"); ?> *</label>
			<div class="controls">
				<input type="password" id="pass" class="input-large" name="pass" value="" size="<?php echo TEXT_INPUT_SIZE; ?>"
							onchange="$('#passrequired-').val(1);"
							onkeydown="passwordKeydown('');"
							onkeyup="passwordStrength('');" />
				<br clear="all" />
				<input type="checkbox" name="disclose_password_" id="disclose_password_" onclick="passwordKeydown(''); togglePassword('');" />&nbsp;Afficher le mot de passe
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="pass_r" id="match"><?php echo gettext("Repeat password"); ?> *</label>
			<div class="controls">
				<input type="password" id="pass_r" class="input-large" name="pass_r_" value="" size="<?php echo TEXT_INPUT_SIZE; ?>" disabled="disabled"
							onchange="$('#passrequired-').val(1);"
							onkeydown="passwordKeydown('');"
							onkeyup="passwordMatch('');" />
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="admin_name"><?php echo trim(str_replace(':', '', gettext("Name:"))).'*'; ?></label>
			<div class="controls">
				<input type="text" id="admin_name" name="admin_name" class="input-large" value="<?php echo html_encode($admin_n); ?>" size="<?php echo TEXT_INPUT_SIZE; ?>" />
			</div>
		</div>

		<?php if (!$emailid) { ?>
		<div class="control-group">
			<label class="control-label" for="admin_email"><?php echo trim(str_replace(':', '', gettext("Email:"))); if (!$emailid) echo '*'; ?></label>
			<div class="controls">
				<input type="text" id="admin_email" name="admin_email" class="input-large" value="<?php echo html_encode($admin_e); ?>" size="<?php echo TEXT_INPUT_SIZE; ?>" />
			</div>
		</div>
		<?php } ?>

		<?php
		$html = zp_apply_filter('register_user_form', '');
		if (!empty($html)) {
			$rows = explode('</tr>', $html);
			foreach ($rows as $row) {
				if (!empty($row)) {
					$row = str_replace('<tr>', '' ,$row);
					$elements = explode('</td>', $row);
					$legend = trim(str_replace(array('<td>', ':'), '', $elements[0]));
					if (!empty($legend)) {
						$input = str_replace('size="40"', 'size="'.TEXT_INPUT_SIZE.'"', $elements[1]);
						$input = str_replace('class="inputbox"', 'class="input-large"', $input);
						$input = trim(str_replace('<td>', '', $input));
						$id = substr(stristr($input, 'id="'), 4, stristr($input, 'id="') - 4);
						$id = substr($id, 0, strpos($id, '"'));
						?>
						<div class="control-group">
							<label class="control-label" for="<?php echo $id; ?>"><?php echo $legend; ?></label>
							<div class="controls">
								<?php echo $input; ?>
							</div>
						</div>
					<?php
					}
				}
			}
		}
		?>

		<?php if (getOption('register_user_captcha')) { ?>
		<div class="control-group">
			<?php $captcha = $_zp_captcha->getCaptcha(); ?>
			<label class="control-label" for="code">
				<?php echo gettext("Enter"); ?>
			</label>
			<div class="controls">
				<?php
				if (isset($captcha['html']) && isset($captcha['input'])) echo $captcha['html'];
				if (isset($captcha['input'])) {
					echo $captcha['input'];
				} else {
					if (isset($captcha['html'])) echo $captcha['html'];
				}
				if (isset($captcha['hidden'])) echo $captcha['hidden'];
				?>
			</div>
		</div>
		<?php } ?>
		
		<div><?php echo gettext('*Required'); ?></div>
		<div id="contact-submit" class="form-actions">
			<input class="btn btn-inverse" type="submit" value="<?php echo gettext('Submit') ?>" />
		</div>

		<?php if (function_exists('federated_login_buttons')) { ?>
		<fieldset id="Federated_buttons_fieldlist">
			<legend><?php echo gettext('You may also register using federated credentials'); ?></legend>
			<?php federated_login_buttons(WEBPATH.'/index.php'); ?>
		</fieldset>
		<?php } ?>

	</form>