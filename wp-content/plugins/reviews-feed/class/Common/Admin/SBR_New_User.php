<?php
/**
 * SBR_New_User.
 *
 * @since 1.2
 */
namespace SmashBalloon\Reviews\Common\Admin;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class SBR_New_User extends SBR_Notifications {

	/**
	 * Source of notifications content.
	 *
	 * @since 1.2
	 *
	 * @var string
	 */
	const SOURCE_URL = 'https://plugin.smashballoon.com/newuser.json';

	/**
	 * @var string
	 */
	const OPTION_NAME = 'sbr_newuser_notifications';

	/**
	 * Register hooks.
	 *
	 * @since 1.2
	 */
	public function hooks() {
		add_action( 'admin_init', array( $this, 'dismiss' ) );
		add_action( 'wp_ajax_sbr_review_notice_consent_update', array( $this, 'review_notice_consent' ) );
	}

	public function option_name() {
		return self::OPTION_NAME;
	}

	public function source_url() {
		return self::SOURCE_URL;
	}

	/**
	 * Verify notification data before it is saved.
	 *
	 * @param array $notifications Array of notifications items to verify.
	 *
	 * @return array
	 *
	 * @since 1.2
	 */
	public function verify( $notifications ) {
		$data = array();

		if ( ! is_array( $notifications ) || empty( $notifications ) ) {
			return $data;
		}

		$option = $this->get_option();

		foreach ( $notifications as $key => $notification ) {

			// The message should never be empty, if they are, ignore.
			if ( empty( $notification['content'] ) ) {
				continue;
			}

			// Ignore if notification has already been dismissed.
			if ( ! empty( $option['dismissed'] ) && in_array( $notification['id'], $option['dismissed'] ) ) { // phpcs:ignore WordPress.PHP.StrictInArray.MissingTrueStrict
				continue;
			}

			$data[ $key ] = $notification;
		}

		return $data;
	}

	/**
	 * Verify saved notification data for active notifications.
	 *
	 * @since 1.2
	 *
	 * @param array $notifications Array of notifications items to verify.
	 *
	 * @return array
	 */
	public function verify_active( $notifications ) {
		if ( ! is_array( $notifications ) || empty( $notifications ) ) {
			return array();
		}

		$sbr_statuses_option = get_option( 'sbr_statuses', array() );
		$current_time        = sbr_get_current_time();

		// rating notice logic
		$sbr_rating_notice_option  = get_option( 'sbr_rating_notice', false );
		$sbr_rating_notice_waiting = get_transient( 'reviews_feed_rating_notice_waiting' );
		$should_show_rating_notice = ( $sbr_rating_notice_waiting !== 'waiting' && $sbr_rating_notice_option !== 'dismissed' );

		// new user discount logic
		$in_new_user_month_range                   = true;
		$should_show_new_user_discount             = false;
		$has_been_one_month_since_rating_dismissal = isset( $sbr_statuses_option['rating_notice_dismissed'] ) ? ( (int) $sbr_statuses_option['rating_notice_dismissed'] + ( (int) $notifications['review']['wait'] * DAY_IN_SECONDS ) ) < $current_time + 1 : true;

		if ( isset( $sbr_statuses_option['first_install'] ) && $sbr_statuses_option['first_install'] === 'from_update' ) {
			global $current_user;
			$user_id                          = $current_user->ID;
			$ignore_new_user_sale_notice_meta = get_user_meta( $user_id, 'sbr_ignore_new_user_sale_notice' );
			$ignore_new_user_sale_notice_meta = isset( $ignore_new_user_sale_notice_meta[0] ) ? $ignore_new_user_sale_notice_meta[0] : '';
			if ( $ignore_new_user_sale_notice_meta !== 'always' ) {
				$should_show_new_user_discount = true;
			}
		} elseif ( $in_new_user_month_range && $has_been_one_month_since_rating_dismissal && $sbr_rating_notice_waiting !== 'waiting' ) {
			global $current_user;
			$user_id                          = $current_user->ID;
			$ignore_new_user_sale_notice_meta = get_user_meta( $user_id, 'sbr_ignore_new_user_sale_notice' );
			$ignore_new_user_sale_notice_meta = isset( $ignore_new_user_sale_notice_meta[0] ) ? $ignore_new_user_sale_notice_meta[0] : '';

			if ( $ignore_new_user_sale_notice_meta !== 'always'
				 && isset( $sbr_statuses_option['first_install'] )
				 && $current_time > (int) $sbr_statuses_option['first_install'] + ( (int) $notifications['discount']['wait'] * DAY_IN_SECONDS ) ) {
				$should_show_new_user_discount = true;
			}
		}

		if ( \SmashBalloon\Reviews\Common\Util::sbr_is_pro() ) {
			$should_show_new_user_discount = false;
		}

		if ( isset( $notifications['review'] ) && $should_show_rating_notice ) {
			return array( $notifications['review'] );
		} elseif ( isset( $notifications['discount'] ) && $should_show_new_user_discount ) {
			return array( $notifications['discount'] );
		}

		return array();
	}

	/**
	 * Get notification data.
	 *
	 * @since 1.2
	 *
	 * @return array
	 */
	public function get() {
		if ( ! $this->has_access() ) {
			return array();
		}

		$option = $this->get_option();

		// Only update if does not exist.
		if ( empty( $option['update'] ) ) {
			$this->update();
		}

		$events = ! empty( $option['events'] ) ? $this->verify_active( $option['events'] ) : array();
		$feed   = ! empty( $option['feed'] ) ? $this->verify_active( $option['feed'] ) : array();

		return array_merge( $events, $feed );
	}

	/**
	 * Add a manual notification event.
	 *
	 * @since 1.2
	 *
	 * @param array $notification Notification data.
	 */
	public function add( $notification ) {
		if ( empty( $notification['id'] ) ) {
			return;
		}

		$option = $this->get_option();

		if ( in_array( $notification['id'], $option['dismissed'] ) ) { // phpcs:ignore WordPress.PHP.StrictInArray.MissingTrueStrict
			return;
		}

		foreach ( $option['events'] as $item ) {
			if ( $item['id'] === $notification['id'] ) {
				return;
			}
		}

		$notification = $this->verify( array( $notification ) );

		update_option(
			$this->option_name(),
			array(
				'update'    => $option['update'],
				'feed'      => $option['feed'],
				'events'    => array_merge( $notification, $option['events'] ),
				'dismissed' => $option['dismissed'],
			)
		);
	}

	/**
	 * Update notification data from feed.
	 *
	 * @since 1.2
	 */
	public function update() {
		$feed   = $this->fetch_feed();
		$option = $this->get_option();

		update_option(
			$this->option_name(),
			array(
				'update'    => time(),
				'feed'      => $feed,
				'events'    => $option['events'],
				'dismissed' => $option['dismissed'],
			)
		);
	}

	/**
	 * Do not enqueue anything extra.
	 *
	 * @since 1.2
	 */
	public function enqueues() {

	}

	public function review_notice_consent() {
		// Security Checks
		check_ajax_referer('sbr-admin', 'sbr_nonce' );
        if ( ! sbr_current_user_can('manage_reviews_feed_options') ) {
            wp_send_json_error(); // This auto-dies.
        }

		$consent = isset( $_POST['consent'] ) ? sanitize_text_field( $_POST['consent'] ) : '';

		update_option( 'sbr_review_consent', $consent );

		if ( $consent == 'no' ) {
			$sbr_statuses_option = get_option( 'sbr_statuses', array() );
			update_option( 'sbr_rating_notice', 'dismissed', false );
			$sbr_statuses_option['rating_notice_dismissed'] = sbr_get_current_time();
			update_option( 'sbr_statuses', $sbr_statuses_option, false );
		}
		wp_die();
	}

	/**
	 * Output notifications on Form Overview admin area.
	 *
	 * @since 1.2
	 */
	public function output() {
		$notifications = $this->get();
		if ( empty( $notifications ) ) {
			return;
		}
		// new user notices included in regular settings page notifications so this
		// checks to see if user is one of those pages
		if ( ! empty( $_GET['page'] )
			 && strpos( $_GET['page'], 'sbr' ) !== false ) {
			return;
		}

		$content_allowed_tags = array(
			'em'     => array(),
			'strong' => array(),
			'span'   => array(
				'style' => array(),
			),
			'a'      => array(
				'href'   => array(),
				'target' => array(),
				'rel'    => array(),
			),
		);
		$image_overlay        = '';

		foreach ( $notifications as $notification ) {
			$img_src = SBR_PLUGIN_URL . 'assets/images/' . sanitize_text_field( str_replace( 'sbi', 'sbr', $notification['image'] ) );
			$type    = sanitize_text_field( $notification['id'] );
			// check if this is a review notice
			if ( $type == 'review' ) {
				$review_consent        = get_option( 'sbr_review_consent' );
				$sbr_open_feedback_url = 'https://smashballoon.com/feedback/?plugin=reviews-pro';
				// step #1 for the review notice
				if ( ! $review_consent ) {
					?>
					<div class="sbr_notice sbr_review_notice_step_1">
						<div class="sbr_thumb">
							<img src="<?php echo esc_url( $img_src ); ?>" alt="notice">
						</div>
						<div class="sbr-notice-text">
							<p class="sbr-notice-text-p"><?php echo __( 'Are you enjoying the Reviews Feed Plugin?', 'reviews-feed' ); ?></p>
						</div>
						<div class="sbr-notice-consent-btns">
							<?php
							printf(
								'<button class="sbr-btn-link" id="sbr_review_consent_yes">%s</button>',
								__( 'Yes', 'reviews-feed' )
							);

							printf(
								'<a href="%s" target="_blank" class="sbr-btn-link"  id="sbr_review_consent_no">%s</a>',
								$sbr_open_feedback_url,
								__( 'No', 'reviews-feed' )
							);
							?>
						</div>
					</div>
					<?php
				}
			}
			$close_href = wp_nonce_url( add_query_arg( array( 'sbr_dismiss' => $type ) ), 'sbr-' . $type, 'sbr_nonce' );

			$title   = $this->get_notice_title( $notification );
			$content = $this->get_notice_content( $notification, $content_allowed_tags );

			$buttons = array();
			if ( ! empty( $notification['btns'] ) && is_array( $notification['btns'] ) ) {
				foreach ( $notification['btns'] as $btn_type => $btn ) {
					if ( ! is_array( $btn['url'] ) ) {
						$buttons[ $btn_type ]['url'] = $this->replace_merge_fields( $btn['url'], $notification );
					} elseif ( is_array( $btn['url'] ) ) {
						$buttons[ $btn_type ]['url'] = wp_nonce_url( add_query_arg( $btn['url'] ), 'sbr-' . $type, 'sbr_nonce' );
						$close_href                  = $buttons[ $btn_type ]['url'];
					}

					$buttons[ $btn_type ]['attr'] = '';
					if ( ! empty( $btn['attr'] ) ) {
						$buttons[ $btn_type ]['attr'] = ' target="_blank" rel="noopener noreferrer"';
					}

					$buttons[ $btn_type ]['class'] = '';
					if ( ! empty( $btn['class'] ) ) {
						$buttons[ $btn_type ]['class'] = ' ' . $btn['class'];
					}

					$buttons[ $btn_type ]['text'] = '';
					if ( ! empty( $btn['text'] ) ) {
						$buttons[ $btn_type ]['text'] = wp_kses( $btn['text'], $content_allowed_tags );
					}
				}
			}
		}

		$review_consent     = get_option( 'sbr_review_consent' );
		$review_step2_style = '';
		if ( $type == 'review' && ! $review_consent ) {
			$review_step2_style = 'style="display: none;"';
		}
		?>

		<div class="sbr_notice_op sbr_notice sbr_<?php echo esc_attr( $type ); ?>_notice" <?php echo ! empty( $review_step2_style ) ? $review_step2_style : ''; ?>>
			<div class="sbr_thumb">
				<img src="<?php echo esc_url( $img_src ); ?>" alt="notice">
				<?php echo $image_overlay; ?>
			</div>
			<div class="sbr-notice-text">
				<div class="sbr-notice-text-inner">
					<h3 class="sbr-notice-text-header"><?php echo $title; ?></h3>
					<p class="sbr-notice-text-p"><?php echo $content; ?></p>
				</div>
				<div class="sbr-notice-btns-wrap">
					<p class="sbr-notice-links">
						<?php
						foreach ( $buttons as $type => $button ) :
							$btn_classes   = array( 'sbr-btn' );
							$btn_classes[] = esc_attr( $button['class'] );
							if ( $type == 'primary' ) {
								$btn_classes[] = 'sbr-btn-blue';
							} else {
								$btn_classes[] = 'sbr-btn-grey';
							}
							?>
							<a class="<?php echo implode( ' ', $btn_classes ); ?>" href="<?php echo esc_attr( $button['url'] ); ?>"<?php echo $button['attr']; ?>><?php echo $button['text']; ?></a>
						<?php endforeach; ?>
					</p>
				</div>
			</div>
			<div class="sbr-notice-dismiss">
				<a href="<?php echo esc_url( $close_href ); ?>">
					<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z" fill="#141B38"></path>
					</svg>
				</a>
			</div>
		</div>
		<?php
	}

	/**
	 * SBR Get Notice Title depending on the notice type
	 *
	 * @since 1.1
	 *
	 * @param array $notification
	 *
	 * @return string $title
	 */
	public function get_notice_title( $notification ) {
		$type  = $notification['id'];
		$title = '';

		// Notice title depending on notice type
		if ( $type == 'review' ) {
			$title = __( 'Glad to hear you are enjoying it. Would you consider leaving a positive review?', 'reviews-feed' );
		} elseif ( $type == 'discount' ) {
			$title = __( 'Exclusive Offer! 60% OFF', 'reviews-feed' );
		} else {
			$title = $this->replace_merge_fields( $notification['title'], $notification );
		}

		return $title;
	}

	/**
	 * SBR Get Notice Content depending on the notice type
	 *
	 * @since 1.1
	 *
	 * @param array $notification
	 * @param array $content_allowed_tags
	 *
	 * @return string $content
	 */
	public function get_notice_content( $notification, $content_allowed_tags ) {
		$type    = $notification['id'];
		$content = '';

		// Notice content depending on notice type
		if ( $type == 'review' ) {
			$content = __( 'It really helps to support the plugin and help others to discover it too!', 'reviews-feed' );
		} elseif ( $type == 'discount' ) {
			$content = __( 'We don’t run promotions very often, but for a limited time we’re offering 60% Off our Pro version to all users of our free Reviews Feed.', 'reviews-feed' );
		} else {
			if ( ! empty( $notification['content'] ) ) {
				$content = wp_kses( $this->replace_merge_fields( $notification['content'], $notification ), $content_allowed_tags );
			}
		}
		return $content;
	}

	/**
	 * Hide messages permanently or some can be dismissed temporarily
	 *
	 * @since 1.2
	 */
	public function dismiss() {
		global $current_user;
		$user_id             = $current_user->ID;
		$sbr_statuses_option = get_option( 'sbr_statuses', array() );

		if ( isset( $_GET['sbr_ignore_rating_notice_nag'] ) ) {
			$rating_ignore = false;
			if ( isset( $_GET['sbr_nonce'] ) && wp_verify_nonce( $_GET['sbr_nonce'], 'sbr-review' ) ) {
				$rating_ignore = isset( $_GET['sbr_ignore_rating_notice_nag'] ) ? sanitize_text_field( $_GET['sbr_ignore_rating_notice_nag'] ) : false;
			}
			if ( 1 === (int) $rating_ignore ) {
				update_option( 'sbr_rating_notice', 'dismissed', false );
				$sbr_statuses_option['rating_notice_dismissed'] = sbr_get_current_time();
				update_option( 'sbr_statuses', $sbr_statuses_option, false );

			} elseif ( 'later' === $rating_ignore ) {
				set_transient( 'reviews_feed_rating_notice_waiting', 'waiting', 2 * WEEK_IN_SECONDS );
				delete_option( 'sbr_review_consent' );
				update_option( 'sbr_rating_notice', 'pending', false );
			}
		}

		if ( isset( $_GET['sbr_ignore_new_user_sale_notice'] ) ) {
			$new_user_ignore = false;
			if ( isset( $_GET['sbr_nonce'] ) && wp_verify_nonce( $_GET['sbr_nonce'], 'sbr-discount' ) ) {
				$new_user_ignore = isset( $_GET['sbr_ignore_new_user_sale_notice'] ) ? sanitize_text_field( $_GET['sbr_ignore_new_user_sale_notice'] ) : false;
			}
			if ( 'always' === $new_user_ignore ) {
				update_user_meta( $user_id, 'sbr_ignore_new_user_sale_notice', 'always' );

				$current_month_number  = (int) date( 'n', sbr_get_current_time() );
				$not_early_in_the_year = ( $current_month_number > 5 );

				if ( $not_early_in_the_year ) {
					update_user_meta( $user_id, 'sbr_ignore_bfcm_sale_notice', date( 'Y', sbr_get_current_time() ) );
				}
			}
		}

		if ( isset( $_GET['sbr_ignore_bfcm_sale_notice'] ) ) {
			$bfcm_ignore = false;
			if ( isset( $_GET['sbr_nonce'] ) && wp_verify_nonce( $_GET['sbr_nonce'], 'sbr-bfcm' ) ) {
				$bfcm_ignore = isset( $_GET['sbr_ignore_bfcm_sale_notice'] ) ? sanitize_text_field( $_GET['sbr_ignore_bfcm_sale_notice'] ) : false;
			}
			if ( 'always' === $bfcm_ignore ) {
				update_user_meta( $user_id, 'sbr_ignore_bfcm_sale_notice', 'always' );
			} elseif ( date( 'Y', sbr_get_current_time() ) === $bfcm_ignore ) {
				update_user_meta( $user_id, 'sbr_ignore_bfcm_sale_notice', date( 'Y', sbr_get_current_time() ) );
			}
			update_user_meta( $user_id, 'sbr_ignore_new_user_sale_notice', 'always' );
		}

		if ( isset( $_GET['sbr_dismiss'] ) ) {
			$notice_dismiss = false;
			if ( isset( $_GET['sbr_nonce'] ) && wp_verify_nonce( $_GET['sbr_nonce'], 'sbr-notice-dismiss' ) ) {
				$notice_dismiss = sanitize_text_field( $_GET['sbr_dismiss'] );
			}
			if ( 'review' === $notice_dismiss ) {
				update_option( 'sbr_rating_notice', 'dismissed', false );
				$sbr_statuses_option['rating_notice_dismissed'] = sbr_get_current_time();
				update_option( 'sbr_statuses', $sbr_statuses_option, false );

				update_user_meta( $user_id, 'sbr_ignore_new_user_sale_notice', 'always' );
			} elseif ( 'discount' === $notice_dismiss ) {
				$current_month_number  = (int) date( 'n', sbr_get_current_time() );
				$not_early_in_the_year = ( $current_month_number > 5 );

				if ( $not_early_in_the_year ) {
					update_user_meta( $user_id, 'sbr_ignore_bfcm_sale_notice', date( 'Y', sbr_get_current_time() ) );
				}

				update_user_meta( $user_id, 'sbr_ignore_new_user_sale_notice', 'always' );
			}
		}
	}
}