<?php

//增强编辑器开始

function add_editor_buttons($buttons) {

$buttons[] = 'fontselect';

$buttons[] = 'fontsizeselect';

$buttons[] = 'cleanup';

$buttons[] = 'styleselect';

$buttons[] = 'hr';

$buttons[] = 'del';

$buttons[] = 'sub';

$buttons[] = 'sup';

$buttons[] = 'copy';

$buttons[] = 'paste';

$buttons[] = 'cut';

$buttons[] = 'undo';

$buttons[] = 'image';

$buttons[] = 'anchor';

$buttons[] = 'backcolor';

$buttons[] = 'wp_page';

$buttons[] = 'charmap';

return $buttons;

}

add_filter("mce_buttons_3", "add_editor_buttons");


//增强编辑器结束

  if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }

/*特色图片*/

register_nav_menus(
array(
'header-menu' => __( '导航自定义菜单' ),
'footer-menu' => __( '底部自定义菜单' )
)
);


if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}
 
if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'customized-post-thumb', 100, 120 );
}



function get_category_root_id($cat)
{
$this_category = get_category($cat);   // 取得当前分类
while($this_category->category_parent) // 若当前分类有上级分类时，循环
{
$this_category = get_category($this_category->category_parent); // 将当前分类设为上级分类（往上爬）
}
return $this_category->term_id; // 返回根分类的id号
}


//文章点击统计
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
    return "0 ";
    }
    return $count.' ';
    }
    function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
    $count = 0;
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
    }else{
    $count++;
    update_post_meta($postID, $count_key, $count);
    }
    }
//文章点击统计结束



/*截取第一张图片*/
function catch_that_image() {
global $post, $posts;
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
$first_img = $matches [1] [0];
if(empty($first_img)){ //Defines a default image
$first_img = '这里添加默认图片的路径，文章中没有图片时显示';
}
return $first_img;
}
/*截取第一张图片 over*/	



		// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load jQuery
	if ( !is_admin() ) {
	   wp_deregister_script('jquery');
	    wp_register_script( 'jquery', get_template_directory_uri() ."/js/jquery-1.4.4.min.js", false);
	   wp_enqueue_script('jquery');
	}
	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
	
	
/*分页函数*/
    add_action( 'admin_menu', 'my_page_excerpt_meta_box' );
    function my_page_excerpt_meta_box() {
        add_meta_box( 'postexcerpt', __('Excerpt'), 'post_excerpt_meta_box', 'page', 'normal', 'core' );
    }
	
	function par_pagenavi($range = 10){

global $paged, $wp_query;

if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}

if($max_page > 1){if(!$paged){$paged = 1;}

if($paged != 1){echo "<a href='" . get_pagenum_link(1) . "' class='extend'

title='跳转到首页'> 返回首页 </a>";}

previous_posts_link(' 上一页 ');

if($max_page > $range){

if($paged < $range){for($i = 1; $i <= ($range + 1); $i++)

{echo "<a href='" . get_pagenum_link($i) ."'";

if($i==$paged)echo " class='current'";echo ">$i</a>";}}

elseif($paged >= ($max_page - ceil(($range/2)))){

for($i = $max_page - $range; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";

if($i==$paged)echo " class='current'";echo ">$i</a>";}}

elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){

for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++)

{echo "<a href='" . get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";}}}

else{for($i = 1; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";

if($i==$paged)echo " class='current'";echo ">$i</a>";}}

next_posts_link(' 下一页 ');

if($paged != $max_page){echo "<a href='" . get_pagenum_link($max_page) . "' class='extend'

title='跳转到最后一页'> 最后一页 </a>";}}

}
/*分页函数*/

function remove_open_sans() {
wp_deregister_style( 'open-sans' );
wp_register_style( 'open-sans', false );
wp_enqueue_style('open-sans','');
}
add_action( 'init', 'remove_open_sans' );

/*添加主题选项*/
add_action('admin_menu', 'mytheme_page');
 
function mytheme_page (){
 
	if ( count($_POST) > 0 && isset($_POST['mytheme_settings']) ){
 
		$options = array (
		        'keywords',
				'description',
				
				'logo1',
				'logo2',
				'logo3',
				
				'gxqm',
				'bkym',
				
				'gz_1',
				'gz_2',
				'gz_3',
				'grms',
				
				'wdsc1',
				'wdsc2',
				'wdsc3',
				'wdsc4',
				'wdsc5',
				'wdsc6',
				'wdsclj1',
				'wdsclj2',
				'wdsclj3',
				'wdsclj4',
				'wdsclj5',
				'wdsclj6',
				
				'dbgg',
				'dbgglj',
				
				);
 
		foreach ( $options as $opt ){
 
			delete_option ( 'mytheme_'.$opt, $_POST[$opt] );
 
			add_option ( 'mytheme_'.$opt, $_POST[$opt] );	
 
		}
 
	}
 
	add_theme_page(__('主题选项'), __('主题选项'), 'edit_themes', basename(__FILE__), 'mytheme_settings');
 
}
 
function mytheme_settings(){?>
 
<style>
 
.wrap,textarea,em{font-family:'Century Gothic','Microsoft YaHei',Verdana;}
em{
	float:left;
	width:45%;
	margin-left:15px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 22px;
	color: #666666;
	text-decoration: none;
}
.submit { padding:10px;}
.bbt {
	width:100%;
	height:30px;
	font-size: 12px;
	line-height: 30px;
	color: #0066CC;
	float:left;
	padding-left:10px;
	text-decoration: none;
}
 
fieldset{width:100%;border:1px solid #aaa;padding-bottom:10px;margin-top:10px;-webkit-box-shadow:rgba(0,0,0,.2) 0px 0px 5px;-moz-box-shadow:rgba(0,0,0,.2) 0px 0px 5px;box-shadow:rgba(0,0,0,.2) 0px 0px 5px;}
 
legend{margin-left:5px;padding:0 5px;color:#2481C6;background:#F9F9F9;cursor:pointer;}

textarea{width:45%;font-size:11px; float:left; padding:0; border:1px solid #aaa;background:none;-webkit-box-shadow:rgba(0,0,0,.2) 1px 1px 2px inset;-moz-box-shadow:rgba(0,0,0,.2) 1px 1px 2px inset;box-shadow:rgba(0,0,0,.2) 1px 1px 2px inset;-webkit-transition:all .4s ease-out;-moz-transition:all .4s ease-out;}
 
textarea:focus{-webkit-box-shadow:rgba(0,0,0,.2) 0px 0px 8px;-moz-box-shadow:rgba(0,0,0,.2) 0px 0px 8px;box-shadow:rgba(0,0,0,.2) 0px 0px 8px;outline:none;}
.wrap .box h1{height:35px;background:#ebebeb;font-size: 18px;line-height: 35px; padding-left:15px;
}
 
</style>


<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.3.1.js"></script> 
<script type="text/javascript">
// 收缩展开效果
$(document).ready(function(){

	$(".box h1").click(function(){
		$(this).next(".text").slideToggle("slow");
	})

	
});
</script>
<div class="wrap">

<h2>主题选项</h2>

<ul>
 
<li class="box"> <h1>SEO统计代码添加</h1>
<div class="text" style="display:none">
<form method="post" action="">
 
	<fieldset>
 
	<legend><strong>SEO 代码添加</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
            
                <div class="bbt">关键词:</div>
 
				<textarea name="keywords" id="keywords" rows="1" cols="70"><?php echo get_option('mytheme_keywords'); ?></textarea>
 
				<em>网站关键词（Meta Keywords），中间用半角逗号隔开。如：WordPress,禁止设计工作室,独立博客</em>
 
			</td></tr>
 
			<tr><td>
 
				<div class="bbt">网站描述:</div>
                <textarea name="description" id="description" rows="3" cols="70"><?php echo get_option('mytheme_description'); ?></textarea>
 
				<em>网站描述（Meta Description），针对搜索引擎设置的网页描述。<br />如： 这儿是某某设计公司官方网站</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>
 
 
 
	<p class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
 
	</p>
 
 
 
</form>
</div>
</li>


<li class="box"> <h1>网站logo设置</h1>
<div class="text" style="display:none">
<form method="post" action="">
    <fieldset>
 
	<legend><strong>头部logo图片</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<textarea name="logo1" id="logo1" rows="1" cols="70"><?php echo get_option('mytheme_logo1'); ?></textarea>
 
				<em>输入网站头部logo图片地址。（宽240px 高46px ） 如：http://localhost/wordpress/logo.jpg</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>
    
    <fieldset>
 
	<legend><strong>首页右下角logo</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<textarea name="logo2" id="logo2" rows="1" cols="70"><?php echo get_option('mytheme_logo2'); ?></textarea>
 
				<em>输入网站头部logo图片地址。（宽160px 高50px ） 如：http://localhost/wordpress/logo.jpg</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>
    
    <fieldset>
    <legend><strong>内页底部logo</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<textarea name="logo3" id="logo3" rows="1" cols="70"><?php echo get_option('mytheme_logo3'); ?></textarea>
 
				<em>输入网站头部logo图片地址。（宽155px 高32px ） 如：http://localhost/wordpress/logo.jpg</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>
 
	<p class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
 
	</p>
    
 
 
 
</form>
</div>
</li>

<li class="box"> <h1>博客设置</h1>
<div class="text" style="display:none">
<form method="post" action="">
    <fieldset>
 
	<legend><strong>博客个性签名</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<textarea name="gxqm" id="gxqm" rows="1" cols="70"><?php echo get_option('mytheme_gxqm'); ?></textarea>
 
				<em>输入文字信息 如：那一抹温暖的阳光，是我们永恒的向往。</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>
    
    <fieldset>
 
	<legend><strong>博客域名</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<textarea name="bkym" id="bkym" rows="1" cols="70"><?php echo get_option('mytheme_bkym'); ?></textarea>
 
				<em>输入博客域名 如：THEMEPARK.COM.CN</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>
 
	<p class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
 
	</p>
    <fieldset>
 
	<legend><strong>新浪微博</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<textarea name="gz_1" id="gz_1" rows="1" cols="70"><?php echo get_option('mytheme_gz_1'); ?></textarea>
 
				<em>输入新浪微博</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>
    
    <fieldset>
 
	<legend><strong>腾讯微博</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<textarea name="gz_2" id="gz_2" rows="1" cols="70"><?php echo get_option('mytheme_gz_2'); ?></textarea>
 
				<em>输入腾讯微博</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>
    
    <fieldset>
 
	<legend><strong>人人网</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<textarea name="gz_3" id="gz_3" rows="1" cols="70"><?php echo get_option('mytheme_gz_3'); ?></textarea>
 
				<em>输入人人地址</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>
    <p class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
 
	</p>
    <fieldset>
 
	<legend><strong>博客个人描述信息</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<textarea name="grms" id="grms" rows="3" cols="70"><?php echo get_option('mytheme_grms'); ?></textarea>
 
				<em>这里可以输入个人的一些描述、心情、介绍等文字。注意文字字数不要太多</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>
    <p class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
 
	</p>
    
 
 
 
</form>
</div>
</li>

<li class="box"> <h1>我的收藏</h1>
<div class="text" style="display:none">
<form method="post" action="">
    <fieldset>
 
	<legend><strong>收藏1</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<textarea name="wdsc1" id="wdsc1" rows="1" cols="70"><?php echo get_option('mytheme_wdsc1'); ?></textarea>
 
				<em>输入收藏图片 宽70px 高86px</em>
 
			</td></tr>
            <tr><td>
 
				<textarea name="wdsclj1" id="wdsclj1" rows="1" cols="70"><?php echo get_option('mytheme_wdsclj1'); ?></textarea>
 
				<em>输入收藏链接地址</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>
    <fieldset>
 
	<legend><strong>收藏2</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<textarea name="wdsc2" id="wdsc2" rows="1" cols="70"><?php echo get_option('mytheme_wdsc2'); ?></textarea>
 
				<em>输入收藏图片 宽70px 高86px</em>
 
			</td></tr>
            <tr><td>
 
				<textarea name="wdsclj2" id="wdsclj2" rows="1" cols="70"><?php echo get_option('mytheme_wdsclj2'); ?></textarea>
 
				<em>输入收藏链接地址</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>
    <fieldset>
 
	<legend><strong>收藏3</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<textarea name="wdsc3" id="wdsc3" rows="1" cols="70"><?php echo get_option('mytheme_wdsc3'); ?></textarea>
 
				<em>输入收藏图片 宽70px 高86px</em>
 
			</td></tr>
            <tr><td>
 
				<textarea name="wdsclj3" id="wdsclj3" rows="1" cols="70"><?php echo get_option('mytheme_wdsclj3'); ?></textarea>
 
				<em>输入收藏链接地址</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>
    <fieldset>
 
	<legend><strong>收藏4</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<textarea name="wdsc4" id="wdsc4" rows="1" cols="70"><?php echo get_option('mytheme_wdsc4'); ?></textarea>
 
				<em>输入收藏图片 宽70px 高86px</em>
 
			</td></tr>
            <tr><td>
 
				<textarea name="wdsclj4" id="wdsclj4" rows="1" cols="70"><?php echo get_option('mytheme_wdsclj4'); ?></textarea>
 
				<em>输入收藏链接地址</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>
    <fieldset>
 
	<legend><strong>收藏5</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<textarea name="wdsc5" id="wdsc5" rows="1" cols="70"><?php echo get_option('mytheme_wdsc5'); ?></textarea>
 
				<em>输入收藏图片 宽70px 高86px</em>
 
			</td></tr>
            <tr><td>
 
				<textarea name="wdsclj5" id="wdsclj5" rows="1" cols="70"><?php echo get_option('mytheme_wdsclj5'); ?></textarea>
 
				<em>输入收藏链接地址</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>
    <fieldset>
 
	<legend><strong>收藏6</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<textarea name="wdsc6" id="wdsc6" rows="1" cols="70"><?php echo get_option('mytheme_wdsc6'); ?></textarea>
 
				<em>输入收藏图片 宽70px 高86px</em>
 
			</td></tr>
            <tr><td>
 
				<textarea name="wdsclj6" id="wdsclj6" rows="1" cols="70"><?php echo get_option('mytheme_wdsclj6'); ?></textarea>
 
				<em>输入收藏链接地址</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>
 
	<p class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
 
	</p>
    
 
 
 
</form>
</div>
</li>

<li class="box"> <h1>内页底部广告</h1>
<div class="text" style="display:none">
<form method="post" action="">
    <fieldset>
 
	<legend><strong>广告图片</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<textarea name="dbgg" id="dbgg" rows="3" cols="70"><?php echo get_option('mytheme_dbgg'); ?></textarea>
 
				<em>输入底部广告图片，宽：398px 高137px  注意：可输入多张图片，图片与图片之间请用“ | ”隔开。如：http://www.xxx.com/images/t1.jpg|http://www.xxx.com/images/t1.jpg</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>
    <legend><strong>广告链接</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<textarea name="dbgglj" id="dbgglj" rows="3" cols="70"><?php echo get_option('mytheme_dbgglj'); ?></textarea>
 
				<em>输入底部广告链接  注意：可输入多张图片链接，链接与链接之间请用“ | ”隔开。如：http://www.xxx.com|http://www.xxx.com</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>
   
 
	<p class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
 
	</p>
    
 
 
 
</form>
</div>
</li>

</ul> 


</div>



<?php }

/*添加主题选项over*/
?>