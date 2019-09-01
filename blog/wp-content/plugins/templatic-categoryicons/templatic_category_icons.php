<?php
/*
Plugin Name: Easy Category Icons
Plugin URI: https://wordpress.org/plugins/templatic-categoryicons/
Description: A simple way to add images or font awesome icons to your categories and other custom taxonomies
Version: 1.0.1
Author: Templatic
Author URI: https://www.templatic.com/
*/

/* added .mo file for translation  */
$locale = get_locale();
load_textdomain( 'templatic_cat_icon', plugin_dir_path( __FILE__ ).'languages/'.$locale.'.mo' );

register_activation_hook(__FILE__, 'tmpl_cat_icon_activate');
/* while activation save variable to show activation message  */
function tmpl_cat_icon_activate() {
    add_option('tmpl_cat_icon_activate_msg', 'y');
}

add_action('admin_notices','tmpl_cat_icon_admin_notices',99);
/* This function display admin notice to activate templatic-badge plugin, if they first activated */
function tmpl_cat_icon_admin_notices(){
	if (get_option('tmpl_cat_icon_activate_msg') == 'y') {
		echo '<div class="updated"><p>'.  __('Templatic - Category Icons plugin is activated successfully. Icons to a category can be added from Add Category page in backend from "Category Icon" section.','templatic_cat_icon') . '</p></div>';
		delete_option('tmpl_cat_icon_activate_msg');
	}
}

/* include font awesome icon script */
add_action('wp_head','templ_load_font_icon');
add_action('admin_head','templ_load_font_icon');
function templ_load_font_icon()
{
	?>
	<script src="https://use.fontawesome.com/598b3d998a.js"></script>
	<?php
}

/* Define class for templatic Categories icon */
class templaticCategoryIcons 
{

	/* call default construtor */
	function __construct() 
	{
		/* include js file */
		add_action('admin_init',array($this,'templ_init') );
		
		/* create term icon field in terms table */
		add_action('admin_init',array($this,'templ_create_term_field'));

		$tax = sanitize_key(@$_REQUEST['taxonomy']);
		
		/* add browse and text field to upload image and add an fontawesome icon */
		add_action( $tax . "_add_form_fields", array($this,'templ_add_new_iconfield'), 10, 2 );
		add_action( $tax . "_edit_form_fields", array($this,'templ_edit_iconfield'), 10, 2 );

		/* save the image or font awesome icon*/
		add_action( "edited_" .$tax, array($this,'templ_save_iconfield'), 10, 2 );  
		add_action( "create_" . $tax, array($this,'templ_save_iconfield'), 10, 2 );

		/* show cloumn and their respective icon and images */
		add_filter( 'manage_edit-' .$tax. '_columns', array($this,'templ_category_column' )) ;
		add_filter( 'manage_' . $tax. '_custom_column', array($this,'templ_category_column_data'),10,3);
		
		/* Ajax calls for image saving */
		add_action( 'wp_ajax_templ_new_icon', array($this, 'templ_ajax_new_icon'));

		/* custom image sizes for icons */
		add_image_size('templ_icon_small',20,20,true);
		add_image_size('templ_icon_medium',40,40,true);
		add_image_size('templ_icon_large',60,60,true);

	}

	/* create term icon field in terms table */
	public function templ_create_term_field()
	{
		global $wpdb;
		$field_check = $wpdb->get_var("SHOW COLUMNS FROM $wpdb->terms LIKE 'term_type'");
		if('term_type' != $field_check){
			$wpdb->query("ALTER TABLE $wpdb->terms ADD term_type varchar(100) NOT NULL DEFAULT '0'");
		}

		$field_check = $wpdb->get_var("SHOW COLUMNS FROM $wpdb->terms LIKE 'term_font_icon'");
		if('term_font_icon' != $field_check){
			$wpdb->query("ALTER TABLE $wpdb->terms ADD term_font_icon varchar(100) NOT NULL DEFAULT '0'");
		}
	}

	/* include js file */
	public function templ_init()
	{

		// dirty hack to get around wp_enqueue_media bug ( http://core.trac.wordpress.org/ticket/22843 )
		global $pagenow;
		if ($pagenow != 'post.php' && $pagenow != 'post-new.php')
		{	
			wp_enqueue_media();
		}
	    wp_register_script('templ-js', plugins_url('js/templatic_category_icons.js', __FILE__), array('jquery'));
		wp_enqueue_script('jquery');
		wp_enqueue_script('templ-js');
		
		$nonce = wp_create_nonce(); 
		wp_localize_script( 'templ-js', 'ajax_object',
	           		 array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'we_value' => $nonce ) );    	
					 
		
	}

	/* show cloumn and theie respective icon and images */
	public function templ_category_column($columns)
	{
		$columns["templ_icon"] = __("Icon","templatic_cat_icon");
		return $columns;
	}	

	/* show cloumn and their respective icon and images */
	public function templ_category_column_data($deprecated, $column, $post_id)
	{	

		if ($column == 'templ_icon')
		{	
			global $wpdb;
			$term_table=$wpdb->prefix."terms";		
			$sql="select * from $term_table where term_id=".$post_id;
			$term=$wpdb->get_results($sql);	
			if($term[0]->term_font_icon) 
			{ 
				return $icon = $term[0]->term_font_icon; 
			}
			else
			{
				$icons = get_option("templtax_" .$post_id); 

				if (! is_array($icons)) return;
				foreach($icons as $size => $attach_id) 
				{
					if($attach_id > 0) 
					{ 
						$img = wp_get_attachment_image($attach_id,'templ_icon_medium');
						return $img;
					}
				}
			}
		}
	}

	/* show browse and font awesome icon option while add category */
	public function templ_add_new_iconfield() 
	{
		$fontawesome=esc_html('<i class="fa fa-car"></i>');
	?>
		<div style=" display:table; width:100%; padding-right:10px; padding-bottom:20px; " >
		<h3 for="parent"><?php _e("Category Icons","templatic_cat_icon") ?></h3>
		
		
			<label for="templ_select_icon_type_image" style="float:left; font-size:14px; margin-right:10px;" ><input type="radio" name="templ_select_icon_type" value="templ_upload_img"  id="templ_select_icon_type_image" checked="checked"> <?php _e("Upload Image","templatic_cat_icon") ?></label>
			<label for="templ_select_icon_type_awesome" style="float:left; font-size:14px; margin-right:10px;"><input type="radio" name="templ_select_icon_type" value="templ_upload_font" id="templ_select_icon_type_awesome"> <?php _e("Add Font Awesome icon","templatic_cat_icon") ?></label>
		</div>


		<div  id="templ_icon_type_image" style="margin-bottom:20px; clear:both; position:relative; float:left; width:45px; z-index:999;" >
			<div id="templ_preview_img" style="clear:both; margin:10px 0;" >
	        </div>
		    <input id="templ_icon_img" type="hidden" size="36" name="templ_icon_img" value="http://"  />
		    
		    <div style="display:none;" class="templ_remove" id='templ_remove'><a style="background:#fff; padding:4px; font-weight:bold; -webkit-border-radius: 25px;
	-moz-border-radius: 25px; border-radius: 25px; font-size:13px; padding:0 5px; position:absolute; right:-4px; top:-2px; cursor:pointer;  " ><?php _e("X","templatic_cat_icon") ?></a></div>
			<input id="img" class="templ_icon_button button" type="button" value="Upload Image" style="clear:both;" />
		</div>
		<div  id="templ_icon_type_awesome" style="display:none; margin-bottom:15px;">
			<input type="text"  size="60" value="" id="templ_font" name="templ_font_icon">
			<p><?php _e('You can get it from ','templatic_cat_icon') ?><a target="_blank" href="//fontawesome.io/icons/"><?php _e('here','templatic_cat_icon'); ?></a><?php _e(' e.g.','templatic_cat_icon'); echo $fontawesome; ?> </p>
		</div>
	    <div style="clear:both;"></div>
		
	<?php
	}

	/* show browse and font awesome icon option while add category */
	public function templ_edit_iconfield($term)
	{
		$id = $term->term_id; 
		$templ_term_type = $term->term_type; 
		$icons = get_option("templtax_" .$id);
		$fontawesome=esc_html('<i class="fa fa-car"></i>');
		
		$fontawesome_icon=array('fa-american-sign-language-interpreting','fa-asl-interpreting','fa-assistive-listening-systems','fa-audio-description','fa-braille','fa-deaf','fa-envira','fa-fa','fa-first-order','fa-gitlab','fa-glide-g','fa-google-plus-circle','fa-instagram','fa-low-vision','fa-pied-piper','fa-question-circle-o','fa-sign-language','fa-snapchat','fa-themeisle','fa-universal-access','fa-viadeo','fa-viadeo-square','fa-volume-control-phone','fa-wheelchair-alt','fa-wpbeginner','fa-wpforms','fa-yoast','fa-adjust','fa-arrows','fa-bar-chart');

		?>			
		  <table class='form-table templ-form-table'><tbody>
		  <h2><?php echo __("Category Icons","templatic_cat_icon"); ?></h2> 
		  <?php 
					
			if (isset($icons['img']))
			{
				$attach_id = $icons['img']; 
				$img = wp_get_attachment_image($attach_id,"templ_icon_medium");
			
			} 
			else  
			{
				$attach_id = 0; 
				$img = '';
			} 

		
		$templ_display = 'display:none;';
		if($templ_term_type == 'templ_upload_img' && @$img != '')
		{
			$templ_display = 'display:block;';
		}
		
		/* set term icon */
		$term_icon = '';
		if($term->term_font_icon != '0')
		{
			$term_icon = $term->term_font_icon;
		}
		
		?><tr class="form-field">
			<th>
				<label for="templ_select_icon_type_image" style="float:left; font-size:14px; margin-right:10px;"><input type="radio" name="templ_select_icon_type" value="templ_upload_img" id="templ_select_icon_type_image" <?php if(@$templ_term_type == '' || $templ_term_type == 'templ_upload_img'){?> checked="checked" <?php } ?> > <?php _e("Upload Image","templatic_cat_icon") ?></label>
			</th>
			<td>
				<label for="templ_select_icon_type_awesome" style="float:left; font-size:14px; font-weight:bold; margin-right:10px;"><input type="radio" name="templ_select_icon_type"  value="templ_upload_font"  <?php if($templ_term_type == 'templ_upload_font'){?> checked="checked" <?php } ?> id="templ_select_icon_type_awesome"> <?php _e("Add Font Awesome icon","templatic_cat_icon"); ?> </label>
			</td>
	      </tr>

	      <tr  id="templ_icon_type_image" <?php if(@$templ_term_type == '' || $templ_term_type == 'templ_upload_img'){?> style="display:block" <?php } else {?> style="display:none" <?php } ?>>
				<td>
					<div style="margin-bottom:20px; clear:both; position:relative; float:left; width:45px; z-index:999;" >
	                <div id="templ_preview_img" class="templ_icon_preview" ><?php echo $img; ?></div>
					<input id="templ_icon_img" type="hidden" name="templ_icon_img" value="<?php echo  $attach_id; ?>" />
				   	
					<div><a  class="templ_remove" id="img" style="background:#fff; padding:4px; font-weight:bold; -webkit-border-radius: 25px;
	-moz-border-radius: 25px; border-radius: 25px; font-size:13px; padding:0 5px; position:absolute; right:-4px; top:-4px; cursor:pointer;<?php echo $templ_display; ?>"><?php  _e("X","templatic_cat_icon"); ?></a></div>
	                <input id="img" class="button templ_icon_button" type="button" value="Upload Image" style="clear:both;"  />
	                </div>
	 			</td>
	 			<td>
	 			</td>
	 		</tr>
	       
	       <tr id="templ_icon_type_awesome"  <?php if($templ_term_type == 'templ_upload_font'){?> style="display:block" <?php } else {?> style="display:none" <?php } ?>>
	       		 <td colspan="2" style="clear:both;" >
					<input type="text" size="60" name="templ_font_icon" id="templ_font" value='<?php echo $term_icon; ?>'/>
					<p><?php _e('You can get more fontawesome icons from','templatic_cat_icon') ?><a target="_blank" href="//fontawesome.io/icons/"><?php _e('here','templatic_cat_icon'); ?></a><?php _e(' e.g.','templatic_cat_icon'); echo $fontawesome;  _e(' Below are the some of the classes can use with "< i >" tag','templatic_cat_icon');?></p>
				</td>
		</tr>
		<tr>
				<td colspan="2">
					<div style="overflow-y: auto; height:200px; width:70%;">
						<ul>
					<?php 
						foreach($fontawesome_icon as  $key)
						{
							echo '<li style="display: inline-block; verticle-align: top; width: 30%; margin-right: -5px;"><i aria-hidden="true" class="fa '.$key.'" ></i>&nbsp;<code>'.esc_html($key).'</code></li>';
						}
					?>
						</ul
					</div>
				</td>
	       </tr>
		 
		<?php 
		
	}

	/* save image and font awesome icon option while add/edit category */
	public function templ_save_iconfield($term_id)
	{
		$icons = array(); 
		
		if (isset($_POST["templ_icon_img"]))
		{
			$attach_id = $_POST["templ_icon_img"];
		
			if ($attach_id > 0)
			{
				$local_file = get_attached_file($attach_id);
		
				$attach_data = wp_generate_attachment_metadata($attach_id, $local_file);
				wp_update_attachment_metadata( $attach_id,  $attach_data );	
				$icons['img'] = $attach_id;
			}
		}

		/* then save the taxonomy metadata */
		update_option("templtax_" . $term_id,$icons);

		global $wpdb;
		$term_table=$wpdb->prefix."terms";		
		$cat_icon=$_POST['templ_font_icon'];
		$templ_select_icon_type=$_POST['templ_select_icon_type'];	
		/*update the service price value in terms table field*/
		if(isset($_POST['templ_select_icon_type']) ){
			$sql="update $term_table set term_font_icon='".$cat_icon."' , term_type ='".$templ_select_icon_type."' where term_id=".$term_id;
			$wpdb->query($sql);
		}

	}

	/* Ajax Functions to save image */
	public function templ_ajax_new_icon()
	{
		//retrieve image
		if (! isset($_POST["img_url"]))
			die ("Error: No URL");
		
		$attach_id = $_POST["attach_id"];
		$size = $_POST["size"]; // which size are we doing? 
					
	   $local_file = get_attached_file($attach_id);
	   
		// generate metadata on basis of sizes
		$attach_data = wp_generate_attachment_metadata($attach_id, $local_file);
		wp_update_attachment_metadata( $attach_id,  $attach_data );	

		// return new image URL
		$data = array("newimg" => image_downsize($attach_id, "templ_icon_medium"),
					  "size" => $size	
					);
		
		header('Content-Type: application/json');
		echo json_encode($data);
		exit();

	}

} /* end class */

/* show images/icon besides category title */
add_filter('get_the_archive_title', 'templ_show_cat_icon');
add_filter('single_term_title', 'templ_show_cat_icon');

add_filter('document_title_parts', 'templ_document_title_parts');
add_filter('breadcrumb_trail_items', 'templ_document_title_parts_breadcrumb',10,2);
/* Remove html tag from page title and breadcrumb */
function templ_document_title_parts_breadcrumb($trail, $args)
{
	$trail[2] = sanitize_text_field($trail[2]);
	return $trail;
}

/* Remove html tag from page title */
function templ_document_title_parts($title)
{
	$title['title'] = sanitize_text_field($title['title']);
	return $title;
}

/* fetch the category icon on category page  */
function templ_show_cat_icon($title)
{
	global $wp_query;

	/* fetch the category icon on category page  */
	$arr = templ_get_the_icon(array('size' => apply_filters('templ_icon_size','medium')),$wp_query->tax_query->queries[0]['taxonomy'],$wp_query->queried_object->term_id);
	$cat = $arr[0];
	$icondata = $arr[1];
	$icon = $icondata[0];
	$width = $icondata[1];
	$height = $icondata[2];
	
	$id = $cat->term_id;
	$cat_title = $cat->name;
	$cat_title = apply_filters('templ_icon_title',$cat_title, $id);

	if($wp_query->queried_object->term_type == 'templ_upload_font')
	{
		$output = @$wp_query->queried_object->term_font_icon;
	}
	else
	{
		$output = " <img src='$icon' title='$title' alt='$cat_title' id='templ_icon_$id' width='$width' height='$height' /> ";
	}
	return apply_filters('templ_showcat_icon',$output.' '.$title );
}

if(!is_admin())
{
	add_filter('list_cats','templ_show_icon_sidebar_widget',10,2);
}
/* show images/icon besides category title in widget*/
function templ_show_icon_sidebar_widget($cat_name,$category)
{
	/* fetch the category icon on category widget  */
	$arr = templ_get_the_icon(array('size' => apply_filters('templ_widget_icon_size','small')),$category->taxonomy,$category->term_id);
	$cat = $arr[0];
	$icondata = $arr[1];
	$icon = $icondata[0];
	$width = $icondata[1];
	$height = $icondata[2];
	
	$id = $cat->term_id;
	$title = $cat->name;
	$title = apply_filters('templ_widget_icon_title',$title, $id);
	

	$templ_cat_style_id = 'cat-item-'.$category->term_id;
	$result = '';
	if($category->term_type == 'templ_upload_img')
	{
		$result	.='<style>';
		$result .='		
		.widget_categories ul, .widget_categories ul li { margin:0; list-style:none; }
		.widget_categories ul li { margin:10px 0; }
		.widget_categories .'.$templ_cat_style_id.'{
					background: rgba(0, 0, 0, 0) url("'. trim( $icon ).'") no-repeat scroll 0 0;
					padding-left: 28px;
					list-style:none;
				}
			</style>';
	}
	if($category->term_type == 'templ_upload_font')
	{
		$result = @$category->term_font_icon."&nbsp;";
	}
	return $result.$cat_name;
}

/* args to fetch whole term data or image */
 function templ_get_the_icon($args, $term_type = 'category', $use_term_id = null)
{
	global $templ;
	
	$default = array(
				'size' => 'medium'
			);

	$args = wp_parse_args($args,$default);
	extract($args);

	
	if (! is_null($use_term_id)) 
	{	
		$term = get_term($use_term_id, $term_type);
		$term_id = $term->term_id;
	}
	

	$icons = get_option("templtax_" .$term_id); 

	if (isset($icons['img']))
	{
		$attach_id = $icons['img'];
		$url = wp_get_attachment_image_src($attach_id,"templ_icon_".$size);
		return array($term, $url);
	}
	else return false;

}

/* Intialize the class */
$templ = new templaticCategoryIcons();

?>