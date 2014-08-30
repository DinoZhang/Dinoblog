<?php get_header(); ?>
<script src="<?php bloginfo('template_url'); ?>/js/cfcoda.js" language="javascript"></script>
<div class="sy1">
     <div class="sy1_1">
          <div id="toolbarwrap">
	         <ul id="toolbar" class="navigation">
		         <li id="home-tab"><a href="#" onclick="javascript:ScrollSection('home-pane', 'scroller', 'home-pane'); return false">类</a></li>
		         <li id="about-tab"><a href="#" onclick="javascript:ScrollSection('about-pane', 'scroller', 'home-pane'); return false">页</a></li>
		         <li id="scripts-tab"><a href="#" onclick="javascript:ScrollSection('scripts-pane', 'scroller', 'home-pane'); return false">签</a></li>
		         <li id="downloads-tab"><a href="#" onclick="javascript:ScrollSection('downloads-pane', 'scroller', 'home-pane'); return false">新</a></li>
		         <li id="faq-tab"><a href="#" onclick="javascript:ScrollSection('faq-pane', 'scroller', 'home-pane'); return false">档</a></li>
	         </ul>
          </div>

          <div id="frame">
	          <div id="scroller">
		           <div id="content">
			            <div class="section" id="home-pane">
			                <?php wp_list_categories('show_count=1&title_li='); ?>
			            </div>
			            <div class="section" id="about-pane">
			                <?php wp_list_pages('title_li=' ); ?>
			            </div>
			            <div class="section" id="scripts-pane">
			                <div class="sy1_2"><?php wp_tag_cloud('number=25');?></div>
			            </div>
			            <div class="section" id="downloads-pane">
			                <?php get_archives('postbypost', 10); ?>
			            </div>
			            <div class="section" id="faq-pane">
			                <?php wp_get_archives('type=monthly'); ?>
			            </div>
		            </div>
	            </div>
          </div>
     </div>
     
     <div class="sy1_3">
          <div class="b2">
               <?php if (get_option('mytheme_grms')!=""): ?>
                   <?php echo get_option('mytheme_grms'); ?>
               <?php else : ?>
                   1、任何事都没有表面看起来那么简单；<br />2、所有的事都会比你预计的时间长；<br />3、会出错的事总会出错；<br />4、如果你担心某种情况发生，那么它就更有可能发生。往。
               <?php endif; ?>
          </div>
          <div class="b3"><?php get_calendar(); ?> </div>
     </div>

</div>
<div class="sy2">
     <div class="sy2_1">
          <div class="c1"><img src="<?php bloginfo('template_url'); ?>/images/img_002.jpg" /></div>
     </div>
     <div class="sy2_2"><img src="<?php bloginfo('template_url'); ?>/images/img_003.png" /></div>
</div>
<div class="sy3">
     <div class="sy3_1"></div>
</div>
<div class="sy4">
     <div class="sy4_1">
          <div class="d1">
               <div class="d1_1"><img src="<?php bloginfo('template_url'); ?>/images/img_005.jpg" /></div>
               <div class="d1_2">
               <?php $posts = query_posts($query_string . '&orderby=date&showposts=10'); ?>
               <?php if( $posts ) : ?>
               <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
                    <div class="e1">
                         <div class="e1_1">
                              <h3><a href="<?php the_permalink() ?>"><?php echo mb_strimwidth(get_the_title(), 0, 40,"...") ?></a></h3>
                              <div class="f1">20<?php the_time('y年m月d日') ?>　分类：<?php the_category(' , ') ?>　评论：( <a href="<?php the_permalink() ?>/#respond"><?php comments_number('0', '1', '%' );?></a> )</div>
                         </div>
                         <div class="e1_2">
                              <?php echo mb_strimwidth(strip_tags($post->post_content), 0,160,"..."); ?>
                         </div>
                    </div>
               <?php endforeach; ?>
               <?php else : ?>
                    等待添加
               <?php  endif; ?>
               <div class="pager"><?php par_pagenavi(); ?></div>
               </div>
          </div>
     </div>
</div>
<?php get_footer(); ?>