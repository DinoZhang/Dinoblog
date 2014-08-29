<?php get_header(); ?>

<?php setPostViews(get_the_ID()); ?>
<div class="bodybox">
  <div class="main">
    <div class="common">
      <?php if(have_posts()):while(have_posts()):the_post(); ?>
	  <div class="list">
        <div class="position">
          <div class="positiontxt"><?php if(function_exists('wp_breadcrumbs')){wp_breadcrumbs();} ?></div>
        </div>
		<div class="contentbox">
          <div class="contenttitle">
            <h1><?php the_title(); ?></h1>
            <span class="category"><?php the_category('') ?></span>
            <span class="author"><?php the_author_posts_link(); ?></span>
            <span class="date"><?php the_time('Y-m-d') ?></span>
            <span class="comment"><?php comments_number('0','1','%');?></span>
		  </div>
          <div class="contentview">浏览次数<span><?php echo getPostViews(get_the_ID()); ?></span></div>
		  <div class="clear"></div>
          <div class="contenttxt">
            <?php the_content(); ?>
          </div>
        </div>
        <div class="contenttagbox">
          <div class="contenttaglist"><span>标签</span><?php the_tags('','',''); ?></div>
          <div class="contentbdshare">
            <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare">
		      <a class="bds_sqq"></a>
			  <a class="bds_qzone"></a>
			  <a class="bds_tqq"></a>
			  <a class="bds_tsina"></a>
			  <a class="bds_mshare"></a>
			  <span class="bds_more"></span>
			  <a class="shareCount"></a>
	        </div>
          </div>
        </div>
        <div class="contentprevnextbox">
          <div class="contentprev"><?php if(get_option('blog_article_unit')!=""){ ?><?php previous_post_link('上一'.get_option("blog_article_unit").'：%link'); ?><?php }else{ ?><?php previous_post_link('上一篇：%link'); ?><?php } ?></div>
          <div class="contentnext"><?php if(get_option('blog_article_unit')!=""){ ?><?php next_post_link('下一'.get_option("blog_article_unit").'：%link'); ?><?php }else{ ?><?php next_post_link('下一篇：%link'); ?><?php } ?></div>
        </div>
        <div class="commentsbox">
	      <div class="commentsnum">全部评论：<?php comments_number('<span>0</span>条','<span>1</span>条','<span>%</span>条','','评论已关闭'); ?></div>
	      <?php comments_template('',true); ?>
        </div>
      </div>
	  <?php endwhile; endif;?>
      <div class="sidebar">
		<?php if(is_dynamic_sidebar())dynamic_sidebar('right_sidebar'); ?>
      </div>
    </div>
  </div>
  <div class="clear"></div>
<?php get_footer(); ?>