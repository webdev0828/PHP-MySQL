<?php
/**
 * Social Icons Widget
 */

/**
* Class The_WP_Social_Icons_Widget
*/
class The_WP_Social_Icons_Widget extends The_WP_WP_Widget {

	function __construct() {
		parent::__construct(

			//id
			'the-wp-social-icons-widget',

			//name
			sprintf( "&bull; %1s &rarr; %2s", __('The WP','the-wp'), __('Social Icons','the-wp') ),

			//widget_options
			array(
				'description'	=> __('Display Social Icons', 'the-wp'),
				'class'			=> 'the-wp-social-icons-widget', // CSS class applied to frontend widget container via 'before_widget' arg
			),

			//control_options
			array(),

			//form_options
			//'name' => can be empty or false to hide the name
			array(
				array(
					'name'		=> __( 'Description', 'the-wp' ),
					'id'		=> 'description',
					'type'		=> 'text',
					'sanitize'	=> 'esc_attr',
					'std'		=> __( 'Follow me on these social networks:', 'the-wp' ),
				),
				array(
					'name'		=> __('Background color', 'the-wp'),
					'id'		=> 'bgcolor',
					'type'		=> 'color-picker',
				),
				array(
					'name'		=> __( 'Icon Size', 'the-wp' ),
					'id'		=> 'size',
					'type'		=> 'select',
					'std'		=> 'medium',
					'options'	=> array(
						'small'		=> __( 'Small', 'the-wp' ),
						'medium'	=> __( 'Medium', 'the-wp' ),
						'large'		=> __( 'Large', 'the-wp' ),
						'huge'		=> __( 'Huge', 'the-wp' ),
					),
				),
				array(
					'name'		=> __( 'Social Icons', 'the-wp' ),
					'id'		=> 'icons',
					'type'		=> 'group',
					'options'	=> array(
						'item_name'	=> __( 'Icon', 'the-wp' ),
					),
					'fields'	=> array(
						array(
							'name'		=> __( 'Social Icon', 'the-wp' ),
							'id'		=> 'icon',
							'type'		=> 'select',
							'options'	=> array(
												'fa-amazon'         => __( 'Amazon', 'the-wp' ),
												'fa-behance'        => __( 'Behance', 'the-wp' ),
												'fa-bitbucket'      => __( 'Bitbucket', 'the-wp' ),
												'fa-btc'            => __( 'BTC', 'the-wp' ),
												'fa-codepen'        => __( 'Codepen', 'the-wp' ),
												'fa-delicious'      => __( 'Delicious', 'the-wp' ),
												'fa-deviantart'     => __( 'Deviantart', 'the-wp' ),
												'fa-digg'           => __( 'Digg', 'the-wp' ),
												'fa-dribbble'       => __( 'Dribbble', 'the-wp' ),
												'fa-dropbox'        => __( 'Dropbox', 'the-wp' ),
												'fa-envelope'       => __( 'Email', 'the-wp' ),
												'fa-facebook'       => __( 'Facebook', 'the-wp' ),
												'fa-flickr'         => __( 'Flickr', 'the-wp' ),
												'fa-foursquare'     => __( 'Foursquare', 'the-wp' ),
												'fa-github'         => __( 'Github', 'the-wp' ),
												'fa-google-plus'    => __( 'Google Plus', 'the-wp' ),
												'fa-instagram'      => __( 'Instagram', 'the-wp' ),
												'fa-jsfiddle'       => __( 'JS Fiddle', 'the-wp' ),
												'fa-lastfm'         => __( 'Last FM', 'the-wp' ),
												'fa-linkedin'       => __( 'Linkedin', 'the-wp' ),
												'fa-mixcloud'       => __( 'Mixcloud', 'the-wp' ),
												'fa-paypal'         => __( 'Paypal', 'the-wp' ),
												'fa-pinterest'      => __( 'Pinterest', 'the-wp' ),
												'fa-reddit'         => __( 'Reddit', 'the-wp' ),
												'fa-rss'            => __( 'RSS', 'the-wp' ),
												'fa-scribd'         => __( 'Scribd', 'the-wp' ),
												'fa-skype'          => __( 'Skype', 'the-wp' ),
												'fa-slack'          => __( 'Slack', 'the-wp' ),
												'fa-slideshare'     => __( 'Slideshare', 'the-wp' ),
												'fa-soundcloud'     => __( 'Soundcloud', 'the-wp' ),
												'fa-spotify'        => __( 'Spotify', 'the-wp' ),
												'fa-stack-exchange' => __( 'Stack Exchange', 'the-wp' ),
												'fa-stack-overflow' => __( 'Stack Overflow', 'the-wp' ),
												'fa-steam'          => __( 'Steam', 'the-wp' ),
												'fa-stumbleupon'    => __( 'Stumbleupon', 'the-wp' ),
												'fa-trello'         => __( 'Trello', 'the-wp' ),
												'fa-tripadvisor'    => __( 'Trip Advisor', 'the-wp' ),
												'fa-tumblr'         => __( 'Tumblr', 'the-wp' ),
												'fa-twitch'         => __( 'Twitch', 'the-wp' ),
												'fa-twitter'        => __( 'Twitter', 'the-wp' ),
												'fa-vimeo-square'   => __( 'Vimeo', 'the-wp' ),
												'fa-wikipedia-w'    => __( 'Wikipedia', 'the-wp' ),
												'fa-wordpress'      => __( 'WordPress', 'the-wp' ),
												'fa-xing'           => __( 'Xing', 'the-wp' ),
												'fa-y-combinator'   => __( 'Y Combinator', 'the-wp' ),
												'fa-yelp'           => __( 'Yelp', 'the-wp' ),
												'fa-youtube'        => __( 'Youtube', 'the-wp' ),
							),
						),
						array(
							'name'		=> __( 'URL', 'the-wp' ),
							'id'		=> 'url',
							'type'		=> 'text',
							'sanitize'	=> 'url',
						),
					),
				),
			)
		);
	}

	/**
	 * Echo the widget content
	 */
	function display_widget( $instance, $before_title = '', $title='', $after_title = '' ) {
		extract( $instance, EXTR_SKIP );
		include( the_wp_locate_widget( 'social-icons' ) ); // Loads the widget/social-icons or template-parts/widget-social-icons.php template.
	}

}

/**
 * Register Widget
 */
function the_wp_social_icons_widget_register(){
	register_widget('The_WP_Social_Icons_Widget');
}
add_action('widgets_init', 'the_wp_social_icons_widget_register');