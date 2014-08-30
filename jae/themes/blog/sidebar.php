<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/sidebar.css" type="text/css" />
<div id="sidebar">

    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Widgets')) : ?>
<!---读者墙------>
	<?php
    $query="SELECT COUNT(comment_ID) AS cnt, comment_author, comment_author_url, comment_author_email FROM (SELECT * FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->posts.ID=$wpdb->comments.comment_post_ID) WHERE comment_date > date_sub( NOW(), INTERVAL 1 MONTH ) AND user_id='0' AND comment_author_email != '你自己的email地址' AND post_password='' AND comment_approved='1' AND comment_type='') AS tempcmt GROUP BY comment_author_email ORDER BY cnt DESC LIMIT 20";
    $wall = $wpdb->get_results($query);
    foreach ($wall as $comment)
    {
        if( $comment->comment_author_url )
        $url = $comment->comment_author_url;
        else $url="#";
        $tmp = "<li><a href='".$url."' title='".$comment->comment_author." (".$comment->cnt.")'>".get_avatar($comment->comment_author_email, 34)."</a></li>";
        $output .= $tmp;
     }
    $output = "<div id='readerswall'><h2>读者墙</h2><ul>".$output."</ul></div>";
    echo $output ;
?>
<!----评论----->    
     <div class="pl_1">
        <h2>最新评论</h2>
        <ul>
     <?php global $wpdb; $sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved,comment_author_email, comment_type,comment_author_url, SUBSTRING(comment_content,1,15) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND comment_author != '郑 永' AND post_password = '' ORDER BY comment_date_gmt DESC LIMIT 5"; 
	 $comments = $wpdb->get_results($sql); $output = $pre_HTML; 
	    foreach ($comments as $comment) 
	            { 
	     $output .= "\n<li><div class='clly_1'>".get_avatar(get_comment_author_email('comment_author_email'), 31). "</div> <div class='clly_2'>". strip_tags($comment->comment_author) ." 说道：</div><div class='clly_3'><a href=\"" . get_permalink($comment->ID) . "#comment-" . $comment->comment_ID . "\" title=\"" . $comment->post_title . " 上的评论\">". strip_tags($comment->com_excerpt) ."</a></div></li>"; 
		        } 
		  $output .= $post_HTML;$output = convert_smilies($output);echo $output;?>
        </ul>
    </div>
<!----收藏----->
   <div class="sc_1">
       <h2>我的收藏</h2>
       <ul>
        <?php if (get_option('mytheme_wdsc1')!=""): ?>
              <li><a href="<?php echo get_option('mytheme_wdsclj1'); ?>" target="_blank"><img src="<?php echo get_option('mytheme_wdsc1'); ?>" /></a></li>
        <?php else : ?>
         <?php endif; ?>
         <?php if (get_option('mytheme_wdsc2')!=""): ?>
              <li><a href="<?php echo get_option('mytheme_wdsclj2'); ?>" target="_blank"><img src="<?php echo get_option('mytheme_wdsc2'); ?>" /></a></li>
        <?php else : ?>
         <?php endif; ?>
         <?php if (get_option('mytheme_wdsc3')!=""): ?>
              <li><a href="<?php echo get_option('mytheme_wdsclj3'); ?>" target="_blank"><img src="<?php echo get_option('mytheme_wdsc3'); ?>" /></a></li>
        <?php else : ?>
         <?php endif; ?>
         <?php if (get_option('mytheme_wdsc4')!=""): ?>
              <li><a href="<?php echo get_option('mytheme_wdsclj4'); ?>" target="_blank"><img src="<?php echo get_option('mytheme_wdsc4'); ?>" /></a></li>
        <?php else : ?>
         <?php endif; ?>
         <?php if (get_option('mytheme_wdsc5')!=""): ?>
              <li><a href="<?php echo get_option('mytheme_wdsclj5'); ?>" target="_blank"><img src="<?php echo get_option('mytheme_wdsc5'); ?>" /></a></li>
        <?php else : ?>
         <?php endif; ?>
         <?php if (get_option('mytheme_wdsc6')!=""): ?>
              <li><a href="<?php echo get_option('mytheme_wdsclj6'); ?>" target="_blank"><img src="<?php echo get_option('mytheme_wdsc6'); ?>" /></a></li>
        <?php else : ?>
         <?php endif; ?>
       </ul>
   </div>
<!----分类，页面，标签----->
  <?php wp_list_bookmarks('orderby=rand&limit=8'); ?>

    
    <?php else : ?>

	
	<?php endif; ?>
</div>