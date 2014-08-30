<?php get_header(); ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/zdy2.css" type="text/css" />

<div class="g3">
     <div class="g3_1">
          <?php get_sidebar(); ?>
     </div>
     <div class="g3_2">
		   <h3>搜索结果</h3>
           <ul class="ssjg">
           <?php $posts = query_posts($query_string . '&orderby=date&showposts=20'); ?>
           <?php if (have_posts()) : ?>
           <?php while (have_posts()) : the_post(); ?>
                  <li>
                      <a href="<?php the_permalink() ?>">
					       <h2><?php echo mb_strimwidth(get_the_title(), 0, 34,"...") ?><b><?php the_time('20y年m月d日 H:i')?></b></h2>
                      </a>
                  </li>
        <?php endwhile; ?>
        <?php else : ?>
            <div class="ssjg_2"><img src="<?php bloginfo('template_url'); ?>/images/ssjj.png" /></div>
        <?php endif; ?>
        </ul>
     </div>
</div>

<?php get_footer(); ?>
