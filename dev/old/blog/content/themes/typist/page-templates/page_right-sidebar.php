<?php
/*
Template Name: Page with right sidebar
*/
get_header(); 
?>

<div id="column" class="right-sidebar">
<div id="bloglist">

		<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					
					//post
					get_template_part( 'content', 'page' );
					//comments
					if ( comments_open() || get_comments_number() ) :
						comments_template( '', true );
					endif;	

				endwhile;
				       
			else :

				get_template_part( 'content', 'none' );

			endif;
	
?>

</div><!--bloglist end-->
 
<div id="sidewrap">
<?php get_sidebar(); ?>
</div>
  
</div><!-- column end -->

<?php get_footer(); ?>