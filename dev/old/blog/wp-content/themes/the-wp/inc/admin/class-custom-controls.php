<?php 
/**
 * Customizer Custom Control Class for Disabled Dropdown
 */
if( ! class_exists('TheWP_Customize_Disabled_Select_Control')) {
	class TheWP_Customize_Disabled_Select_Control extends WP_Customize_Control {
		public $type = 'disabled-select';

		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <?php printf('<span class="ceewp-premium"><i class="fa fa-star"></i> <a target="_blank" href="%1$s">%2$s</a></span>',
				esc_url( 'http://ceewp.com/our-themes/wp-wordpress-theme#pro' ),
				__( 'Upgrade', 'the-wp' )
				);?>
				<select <?php $this->link(); ?>>
					<?php //printf( '<option value="0">%1$s</option>', __( 'Select Color Scheme', 'the-wp' ) );
						foreach ( $this->choices as $value => $label )
							printf( '<option disabled="disabled" value="%1$s" %2$s>%3$s</option>', esc_attr( $value ), selected( $this->value(), $value, false ), $label );
					?>
				</select>
			</label>
		<?php
		}
	}
}

/**
 * Customizer Custom Control Class for Disabled Text Fieald
 */
if( ! class_exists('TheWP_Customize_Disabled_Text_Control')) {
	class TheWP_Customize_Disabled_Text_Control extends WP_Customize_Control {
		public $type = 'disabled-text';

		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <?php printf('<span class="ceewp-premium"><i class="fa fa-star"></i> <a target="_blank" href="%1$s">%2$s</a></span>',
				esc_url( 'http://ceewp.com/our-themes/wp-wordpress-theme#pro' ),
				__( 'Upgrade', 'the-wp' )
				);?>
                <input type="text" readonly="readonly" <?php $this->link(); ?>
                value="<?php echo esc_attr( $value );?>" />
			</label>
		<?php
		}
	}
}

/**
 * Customizer Custom Control Class for Separator Title
 */
if( ! class_exists('TheWP_Customize_sep_title')) {
	class TheWP_Customize_sep_title extends WP_Customize_Control {
		public $type = 'title_sep';

		public function render_content() {
			?>
			<div class="customize-sep-title"><?php echo esc_html($this->label); ?></div>
			<?php
		}
	}
}

/**
 * Customizer Custom Control Class for Info
 */
if( ! class_exists('TheWP_Customize_Info')) {
	class TheWP_Customize_Info extends WP_Customize_Control {
		public $type = 'info';

		public function render_content() {?>
			<div class="ceewp-info <?php if (!empty($this->choices['class'])) echo esc_attr($this->choices['class']); ?>">
				<?php echo $this->label; ?>
            </div>
		<?php
		}
	}
}