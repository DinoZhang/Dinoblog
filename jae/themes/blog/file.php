<?php  
/* 
Template Name:file
*/  
?> 

<?php get_header(); ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/zdy2.css" type="text/css" />

<div class="g3">
     <div class="g3_1">
          <?php get_sidebar(); ?>
     </div>
     <div class="g3_2">
         <h3><?php wp_title(''); ?></h3>
		 <div class="g3wz_1">
            <div class="gd">
		     <?php wp_get_archives('type=monthly'); ?>
             </div>
         </div>
     </div>
</div>

<?php get_footer(); ?>