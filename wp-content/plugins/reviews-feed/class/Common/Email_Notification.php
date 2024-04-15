<?php
namespace SmashBalloon\Reviews\Common;



/**
 * Class Email_Notification
 */
class Email_Notification
{

	/**
	 * Sends a notification email to the admin(s) of the site.
	 *
	 * @param string $title
	 * @param string $bold
	 * @param string $details
	 *
	 * @return bool
	 */
	public static function send($title, $bold, $details)
	{
		$options = get_option('cff_style_settings');

		$to_string = !empty($options['email_notification_addresses']) ? str_replace(' ', '', $options['email_notification_addresses']) : get_option('admin_email', '');

		$all_emails = explode(',', $to_string);
		$valid_emails = [];

		foreach ($all_emails as $email) {
			if (is_email($email)) {
				$valid_emails[] = $email;
			}
		}

		if (empty($valid_emails)) {
			return false;
		}

		$headers = array('Content-Type: text/html; charset=utf-8');

		$header_image = SBR_PLUGIN_URL . '/assets/images/balloon-120.png';

		$footer_link = admin_url('admin.php?page=sbr-settings&view=advanced&flag=emails');

		$message_content = '<h6 style="padding:0;word-wrap:normal;font-family:\'Helvetica Neue\',Helvetica,Arial,sans-serif;font-weight:bold;line-height:130%;font-size: 16px;color:#444444;text-align:inherit;margin:0 0 20px 0;Margin:0 0 20px 0;">' . $bold . '</h6>' . $details;

		$educator = new SBR_Education();
		$dyk_message = $educator->dyk_display();

		ob_start();
		include_once SBR_PLUGIN_URL . '/templates/email.php';
		$email_body = ob_get_contents();
		ob_get_clean();

		return wp_mail($valid_emails, $title, $email_body, $headers);
	}
}