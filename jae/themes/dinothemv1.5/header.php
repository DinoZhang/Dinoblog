<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php if(is_home()){ ?><title><?php bloginfo('name'); ?><?php if(get_option('blog_title_suffix')!=""){ ?>_<?php echo get_option('blog_title_suffix'); ?><?php } ?></title><?php } ?>
<?php if(is_search()){ ?><title><?php echo trim(wp_title("",0)); ?>_<?php bloginfo('name'); ?></title><?php } ?>
<?php if(is_single()){ ?><title><?php echo trim(wp_title("",0)); ?>_<?php bloginfo('name'); ?></title><?php } ?>
<?php if(is_page()){ ?><title><?php echo trim(wp_title("",0)); ?>_<?php bloginfo('name'); ?></title><?php } ?>
<?php if(is_category()){ ?><title><?php single_cat_title(); ?>_<?php bloginfo('name'); ?></title><?php } ?>
<?php if(is_tag()){ ?><title><?php single_tag_title("",true); ?>_<?php bloginfo('name'); ?></title><?php } ?>
<?php if(is_year()){ ?><title><?php the_time("Y年"); ?>发布的<?php if(get_option('blog_article_nickname')!=""){echo get_option('blog_article_nickname');}else{ ?>内容<?php } ?>_<?php bloginfo('name'); ?></title><?php } ?>
<?php if(is_month()){ ?><title><?php the_time("Y年m月"); ?>发布的<?php if(get_option('blog_article_nickname')!=""){echo get_option('blog_article_nickname');}else{ ?>内容<?php } ?>_<?php bloginfo('name'); ?></title><?php } ?>
<?php if(is_day()){ ?><title><?php the_time("Y年m月d日"); ?>发布的<?php if(get_option('blog_article_nickname')!=""){echo get_option('blog_article_nickname');}else{ ?>内容<?php } ?>_<?php bloginfo('name'); ?></title><?php } ?>
<?php if(is_author()){ ?><title><?php the_author(); ?>发布的<?php if(get_option('blog_article_nickname')!=""){echo get_option('blog_article_nickname');}else{ ?>内容<?php } ?>_<?php bloginfo('name'); ?></title><?php } ?>
<?php if(is_404()){ ?><title>404错误_<?php bloginfo('name'); ?></title><?php } ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php if(is_home()){
$description=get_option('blog_description');
$keywords=get_option('blog_keywords');}
elseif(is_page()){
$description=wp_title("",false);
$keywords=wp_title("",false);}
elseif(is_search()){
$description=wp_title("",false);
$keywords=wp_title("",false);}
elseif(is_tag()){
$description=wp_title("",false);
$keywords=wp_title("",false);}
elseif(is_year()){
$description=wp_title("",false);
$keywords=wp_title("",false);}
elseif(is_month()){
$description=wp_title("",false);
$keywords=wp_title("",false);}
elseif(is_day()){
$description=wp_title("",false);
$keywords=wp_title("",false);}
elseif(is_author()){
$description=wp_title("",false);
$keywords=wp_title("",false);}
elseif(is_404()){
$description="找不到相关页面";
$keywords="404错误";}
elseif
(is_single()){
if($post->post_excerpt){$description=$post->post_excerpt;}
elseif(function_exists('wp_thumbnails_excerpt')){
$description=wp_thumbnails_excerpt($post->post_content, true);}
else{$description=$post->post_title;}
foreach((get_the_category()) as $category){
$keywords=$category->cat_name;}
$tags=wp_get_post_tags($post->ID);
foreach($tags as $tag){
$keywords=$keywords.",".$tag->name;}}
elseif(is_category()){
$description=category_description();
$description=strip_tags($description);
$description=trim($description);
$keywords=single_cat_title("",false);
}
echo"<meta name=\"keywords\" content=\"$keywords\" />
<meta name=\"description\" content=\"$description\" />";
?>

<meta name="author" content="郑力,http://www.zlphp.com"  />
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="<?php if(get_option('blog_logo_ico')!=""){echo get_option('blog_logo_ico');}else{bloginfo('template_url'); ?>/images/link.ico<?php } ?>" type="image/x-icon" />
<link rel="bookmark" href="<?php if(get_option('blog_logo_ico')!=""){echo get_option('blog_logo_ico');}else{bloginfo('template_url'); ?>/images/link.ico<?php } ?>" type="image/x-icon" />
<link rel="icon" href="<?php if(get_option('blog_logo_ico')!=""){echo get_option('blog_logo_ico');}else{bloginfo('template_url'); ?>/images/link.ico<?php } ?>" type="image/x-icon" />
</head>
<body>
<div class="header">
  <div class="common">
    <div class="top">
      <div class="logo" style="margin-top:<?php if(get_option('blog_logo_height')!=""){ echo (115-get_option('blog_logo_height'))/2;}else{ ?>30<?php } ?>px;"><a href="<?php echo esc_url(home_url('')); ?>" title="<?php bloginfo('name'); ?>" <?php if(get_option('blog_logo_png')!=""){ ?>style="width:<?php echo get_option('blog_logo_width'); ?>px;height:<?php echo get_option('blog_logo_height'); ?>px;background:url(<?php echo get_option('blog_logo_png'); ?>) no-repeat;_background:url(<?php echo get_option('blog_logo_gif'); ?>) no-repeat;"<?php }else{ ?>style="width:255px;height:55px;background:url(<?php bloginfo('template_url'); ?>/images/fengying_logo.png) no-repeat;_background:url(<?php bloginfo('template_url'); ?>/images/fengying_logo_ie6.gif) no-repeat;"<?php } ?>></a></div>
      <div class="topright">
        <div class="regmenu"><?php global $user_ID,$user_identity,$user_level ?><?php if(is_user_logged_in()){ ?>您好，<span style="margin-right:10px;"><?php echo $user_identity; ?></span><a href="<?php echo get_option('siteurl'); ?>/wp-admin" target="_blank">后台</a><a href="<?php echo wp_logout_url(home_url()); ?>"><?php _e('退出'); ?></a><?php }else{ ?>您好，<span style="margin-right:10px;">游客</span><a href="<?php echo esc_url(home_url('/')); ?>wp-login.php?action=register" target="_blank">注册</a><a href="<?php echo esc_url(home_url('/')); ?>wp-login.php" target="_blank">登录</a><?php } ?><a style="margin-right:0;" id="translatelink">繁體</a></div>
        <div class="topmenu">
<?php $topmenu=array('container'=>false,'echo'=>false,'items_wrap'=>'%3$s','depth'=>0,'theme_location'=>'topmenu');echo strip_tags(wp_nav_menu($topmenu),'<a>');?>
        </div>
      </div>
    </div>
    <div class="navbox">
      <div id="submenu" class="nav">
        <ul>
<li<?php if(is_home()){echo' class="current-menu-item"';} ?>><a href="<?php echo esc_url(home_url('')); ?>">首页</a></li>
<?php if(function_exists('wp_nav_menu')) wp_nav_menu(array('container'=>false,'items_wrap'=>'%3$s','theme_location'=>'mainmenu')); ?>
        </ul>
      </div>
      <div class="searchbox">
        <div class="search">
          <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <input class="searchtxt" name="s" id="s" type="text" value="请输入搜索关键词..." onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
            <button class="searchbtn" id="searchsubmit" title="站内搜索"></button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="clear"></div>