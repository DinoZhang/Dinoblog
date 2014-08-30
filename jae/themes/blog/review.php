<?php  
/* 
Template Name:review
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
		    <?php
    $query="SELECT COUNT(comment_ID) AS cnt, comment_author, comment_author_url, comment_author_email FROM (SELECT * FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->posts.ID=$wpdb->comments.comment_post_ID) WHERE comment_date > date_sub( NOW(), INTERVAL 1 MONTH ) AND user_id='0' AND comment_author_email != '你自己的email地址' AND post_password='' AND comment_approved='1' AND comment_type='') AS tempcmt GROUP BY comment_author_email ORDER BY cnt DESC LIMIT 60";
    $wall = $wpdb->get_results($query);
    foreach ($wall as $comment)
    {
        if( $comment->comment_author_url )
        $url = $comment->comment_author_url;
        else $url="#";
        $tmp = "<li><a href='".$url."' title='".$comment->comment_author." (".$comment->cnt.")'>".get_avatar($comment->comment_author_email, 39)."</a></li>";
        $output .= $tmp;
     }
    $output = "<div id='readerswall'><ul>".$output."</ul></div>";
    echo $output ;
?>
<div style="font: 0px/0px sans-serif;clear: both;display: block"> </div>
         </div>
         <div class="liuy"><?php comments_template(); ?></div>
     </div>
</div>

<?php get_footer(); ?>