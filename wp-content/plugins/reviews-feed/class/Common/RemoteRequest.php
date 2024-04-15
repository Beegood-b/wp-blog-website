<?php
/**
 * Class RemoteRequest
 *
 * @since 1.0
 */
namespace SmashBalloon\Reviews\Common;

use SmashBalloon\Reviews\Common\Builder\SBR_Feed_Saver_Manager;
use SmashBalloon\Reviews\Common\Integrations\SBRelay;
use SmashBalloon\Reviews\Common\Services\SettingsManagerService;

class RemoteRequest {

	public const BASE_URL = SBR_RELAY_BASE_URL;

	private $provider;

	private $args;

	private $endpoint;

	public function __construct( $provider, $args, $endpoint = 'reviews' ) {
		$this->provider = $provider;
		$this->args     = $args;
		$this->endpoint = $endpoint;
	}

	public function fetch() {
		if ( empty( $this->args['business'] ) ) {
			return '';
		}
        $business = $this->args['business'];
		$args     = array( 'place_id' => $business );

        if( $this->provider === 'wordpress.org' ){
            $wordpressorg_args = SBR_Feed_Saver_Manager::get_place_id_wordpressorg( $this->args['info']['url'] );
            $args['type'] = $wordpressorg_args['type'];
            $args['slug'] = $wordpressorg_args['slug'];
        }

        if( $this->provider !== 'facebook' ){
            $api_keys = get_option('sbr_apikeys', []);
            if( isset( $api_keys[ $this->provider ] ) && !empty( $api_keys[ $this->provider ] ) ){
                $args['api_key'] = $api_keys[ $this->provider ];
            }
        }else{
            $args['api_key'] = isset( $this->args['access_token'] ) ? $this->args['access_token'] : '';
        }

        if (isset($this->args['language']) && !empty($this->args['language']) && $this->args['language'] !== 'default') {
            $args['language'] = $this->args['language'];
        }

        $settings = new SettingsManagerService();

        $relay    = new SBRelay( $settings );
		$response = $relay->call( $this->endpoint . '/' . $this->provider, $args, 'GET', true );

        return $response;
	}

}
