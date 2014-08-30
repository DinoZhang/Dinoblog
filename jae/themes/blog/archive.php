<?php get_header(); ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/zdy2.css" type="text/css" />

<div class="g3">
     <div class="g3_1">
          <?php get_sidebar(); ?>
     </div>
     <div class="g3_2">
     <?php $posts = query_posts($query_string . '&orderby=date&showposts=5'); ?>
     <?php if( $posts ) : ?>
     <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
          <div class="k1">
             <h3><a href="<?php the_permalink() ?>"><?php echo mb_strimwidth(get_the_title(), 0, 40,"...") ?></a><b>Browse:<?php setPostViews(get_the_ID());?><?php echo getPostViews(get_the_ID()); ?></b></h3>
             <?php if ( has_post_thumbnail() ) { ?>
                 <div class="k1_1"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a></div>
             <?php } else {?>
                 <div class="k1_1"><a href="<?php the_permalink() ?>"><img src="<?php echo catch_that_image(); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></a></div>
             <?php } ?>
             <p><?php echo mb_strimwidth(strip_tags($post->post_content), 0,560,"..."); ?></p>
             <div class="k1_2">
                 <div class="m1">时间：20<?php the_time('y-m-d') ?></div>
                 <div class="m2">分类：<?php the_category(' , ') ?></div>
                 <div class="m3"><?php the_tags('标签：', ' , ', ''); ?></div>
                 <div class="m4">评论：<?php comments_number('0', '1', '%' );?></div>
             </div>
          </div>
     <?php endforeach; ?>
     <?php else : ?>
     <?php  endif; ?>
     <div class="pager"><?php par_pagenavi(); ?></div>
     </div>
</div>
<?php get_footer(); ?>
