<?php
/**
 * Related Posts Class
 *
 * @author   AzonBooster
 * @since    1.2.3
 * @package  AzonBooster
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'AzonBooster_Related_Posts' ) ) :
	/**
	 * AzonBooster_Related_Posts
	 *
	 * @since 1.2.3
	 * @access public
	 * @version  1.0.0
	 */
	class AzonBooster_Related_Posts {

		/**
		 * The single instance of the class.
		 *
		 * @var AzonBooster_Related_Posts
		 * @since 1.0.0
		 */
		protected static $_instance = null;

		/**
		 * Class Contructor
		 *
		 * @since 1.0.0
		 */
		public function __construct() {

			$this->hooks();

		}

		/**
		 * Main AzonBooster_Related_Posts Instance.
		 *
		 * Ensures only one instance of AzonBooster_Related_Posts is loaded or can be loaded.
		 *
		 * @since 1.0.0
		 * @static
		 * @return AzonBooster_Related_Posts - Main instance.
		 */
		public static function instance() {

			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		public function hooks() {

			add_filter('azonbooster_show_related_posts', array( $this, 'show_related_post' ) );
			add_filter( 'azonbooster_show_related_posts_style', array( $this, 'display_stle') );

			add_filter( 'azonbooster_show_related_posts_num_posts', array( $this, 'posts_per_page' ) );

			add_filter( 'azonbooster_show_related_posts_by', array( $this, 'related_by' ));

			
		}
		/**
		 * Show and Hide Related Posts
		 *
		 * @since 1.0.0
		 * @return boolean
		 */
		public function show_related_post() {

			return azonbooster_get_option( 'blog_single_post_related_posts', true );
		}

		/**
		 * Related Posts display style.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return string
		 */
		public function display_stle() {

			return azonbooster_get_option( 'blog_single_post_related_posts_style', 'grid' );
		}

		/**
		 * Number Related Posts to show.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return number
		 */
		public function posts_per_page() {
			return azonbooster_get_option( 'blog_single_post_related_posts_num', 8);
		}

		/**
		 * Number of columns of Related Posts (Only grid style.).
		 *
		 * @since 1.0.0
		 * @access public
		 * @return number
		 */
		public function num_cols() {
			return azonbooster_get_option( 'blog_single_post_related_posts_num_cols', 4 );
		}

		/**
		 * Related Posts display by.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return string
		 */
		public function related_by() {
			return azonbooster_get_option( 'blog_single_post_related_posts_by', 'cat' );
		}

		/**
		 * Related Posts Section Title.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return string
		 */
		public function section_title() {

			return azonbooster_get_option( 'blog_single_post_related_posts_title', __('See More Related', 'azonbooster' ) );
		}
		/**
		 * Render Related Posts
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		public function render_related_posts( $posts, $style ) {

			?>
			<div class="related-posts">
				<h5 class="related-posts-title"><b><?php echo esc_html( apply_filters( 'azonbooster_related_posts_title', $this->section_title() ) ) ?></b></h5>

				<?php

					if ( $style == 'grid' ) {

						$this->render_grid( $posts );

					} else {
					
						$this->render_list( $posts );
					
					}
				?>
			</div>
			<?php

		}

		/**
		 * Render List Articles
		 *
		 * @since 1.0.0
		 * @access private
		 * @return void
		 */
		private function render_list( $posts ) {

			global $post;

			?>
				<ul class="list-related-posts">
				<?php 
					foreach ($posts as $post) :
						setup_postdata($post);
						?>
						<li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
						<?php
					endforeach;
				?>
				</ul>
			<?php

			wp_reset_postdata();
		}

		/**
		 * Render Grid Related Posts
		 * 
		 * @param  array $posts
		 * @access private
		 * @since 1.0.0
		 * @return void
		 */
		private function render_grid( $posts ) {

			global $post;

			$num_col = apply_filters( 'azonbooster_related_posts_num_cols', $this->num_cols() );

			switch ( $num_col ) {
				case 1:
					$size = 'full';
					break;
				case 2:
				case 3:
					$size = 'large';
					break;
				case 4:
				case 6:
					$size = 'large';
					break;
				
				default:
					$size = 'medium';
					break;
			}
			

			$num_col_class = 'num-col-' . $num_col;
			$thumbnail_pos = apply_filters( 'azonbooster_related_posts_thumb_pos', 'top' );
			$thumbnail_size = apply_filters( 'azonbooster_related_posts_thumb_size', $size );

			?>
			<div class="grid-related-posts <?php echo esc_attr( $num_col_class . ' num-row-1' ) ?>">
				<?php 
					
					$i = 1;
					$n = 1;

					foreach ($posts as $post) :

						setup_postdata($post);

						
						?>

						<div class="related-post-block <?php echo esc_attr('azb-rpb-' . $i ) ?>">

							<?php if ( has_post_thumbnail() ) : ?>
								<div class="related-post-thumbnail">
									<a href="<?php the_permalink() ?>"> 
									<?php the_post_thumbnail( $thumbnail_size ); ?></a>
								</div>
							<?php endif; ?>

							<div class="related-post-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></div>
						</div>
						<?php
						if ( $i % $num_col == 0 && $num_col <= $i  ) :
							$n++;
						?>
							</div>	
							<div class="grid-related-posts <?php echo esc_attr( $num_col_class . ' num-row-' . $n ) ?>">
						<?php
						 endif;
						$i++;


					endforeach;
				?>
	
			</div>
			<?php

			wp_reset_postdata();
		}
	}

endif;

new AzonBooster_Related_Posts();