<?php get_header(); ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/zdy2.css" type="text/css" />

<div class="g3">
     <div class="g3_1">
          <?php get_sidebar(); ?>
     </div>
     <div class="g3_2">
         <h3><?php wp_title(''); ?></h3>
         <?php if ( has_post_thumbnail() ) { ?>
             <div class="k1_1"><a><?php the_post_thumbnail(); ?></a></div>
         <?php } else {?>
         <?php } ?>
         <div class="g3wz_1">
         <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		     <?php the_content(); ?>
         <?php endwhile; endif; ?>
         </div>
         <div class="n1">
              <div class="n1_1">时间：20<?php the_time('y-m-d') ?></div>
              <div class="n1_2">分类：<?php the_category(' , ') ?></div>
              <div class="n1_3"><?php the_tags('标签：', ' , ', ''); ?></div>
              <div id="ckepop">
	             <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt" target="_blank">
                     <img src="http://v3.jiathis.com/code_mini/images/btn/v1/jiathis1.gif" border="0" />
                 </a>
                 <a class="jiathis_counter_style_margin:3px 0 0 2px"></a>
              </div>
              <script type="text/javascript" src="http://v3.jiathis.com/code_mini/jia.js?uid=1336540570341423" charset="utf-8"></script>
         </div>
         <div class="liuy"><?php comments_template(); ?></div>
         <div class="n2">
		     <?php
             $rand_posts = get_posts('numberposts=5&orderby=rand');
             foreach( $rand_posts as $post ) :
             ?>
             <li>
                 <?php if ( has_post_thumbnail() ) { ?>
                     <div class="pir"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
                 <?php } else {?>
                     <div class="pir"><a href="<?php the_permalink() ?>"><img src="<?php echo catch_that_image(); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></a></div>
                 <?php } ?>
                 <h4><a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth(get_the_title(), 0, 22,"...") ?></a></h4>
             </li>
             <?php endforeach; ?>
         </div>
     </div>
</div>
<?php get_footer(); ?>
