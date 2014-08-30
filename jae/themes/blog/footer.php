<?php if (is_home()!=""): ?>
<div id="main_zzjs_net">
         <div id="float_zzjs" >
              <div class="logo_1">
                   <?php if (get_option('mytheme_logo1')!=""): ?>
                      <img src="<?php echo get_option('mytheme_logo1'); ?>"/>
                   <?php else : ?>
                      <img src="<?php bloginfo('template_url'); ?>/images/logo.jpg" />
                   <?php endif; ?>
              </div>
              <div class="dh1_1"><img src="<?php bloginfo('template_url'); ?>/images/dhb_1.jpg" /></div>
               <div id="navigation" ><?php wp_nav_menu(array( 'theme_location' => 'header-menu' ) ); ?></div>
              <div class="dh1_1"><img src="<?php bloginfo('template_url'); ?>/images/dhb_2.png" /></div>
         </div>
    </div>
    <div id="header">
        <div class="ss001">
            <div class="ss002">Search</div>
            <form action="<?php bloginfo('siteurl'); ?>" id="searchform" method="get">
                <input type="text" id="s" name="s" value="" />
                <input type="submit" value="" id="searchsubmit" />
            </form>
        </div>
        <div class="a1">
            <div class="a1_1">
                <?php if (get_option('mytheme_gz_1')!=""): ?>
                    <a href="<?php echo get_option('mytheme_gz_1'); ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/xb_001.png" /></a>
                <?php else : ?>
                    <a href="#" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/xb_001.png" /></a>
                <?php endif; ?>
                </div>
            <div class="a1_1">
                <?php if (get_option('mytheme_gz_2')!=""): ?>
                    <a href="<?php echo get_option('mytheme_gz_2'); ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/xb_002.png" /></a>
                <?php else : ?>
                    <a href="#" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/xb_002.png" /></a>
                <?php endif; ?>
            </div>
            <div class="a1_1">
               <?php if (get_option('mytheme_gz_3')!=""): ?>
                    <a href="<?php echo get_option('mytheme_gz_3'); ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/xb_003.png" /></a>
                <?php else : ?>
                    <a href="#" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/xb_003.png" /></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="a2"><a href="http://www.themepark.com.cn"><img src="<?php bloginfo('template_url'); ?>/images/xct-001.jpg" /></a></div>
    </div>
    
<div id="footer">
      <div class="footer2">
           <div class="f1">
           <SCRIPT type=text/javascript src="<?php bloginfo('template_url'); ?>/js/scrolltop.js"></SCRIPT>
           <DIV id=goTopBtn><a><img src="<?php bloginfo('template_url'); ?>/images/top.jpg" /></a></DIV>
           <SCRIPT type=text/javascript>goTopEx();</SCRIPT>
           </div>
           <div class="f2">
               <?php if (get_option('mytheme_logo2')!=""): ?>
                   <img src="<?php echo get_option('mytheme_logo2'); ?>"/>
               <?php else : ?>
                   <img src="<?php bloginfo('template_url'); ?>/images/logo2.jpg" />
               <?php endif; ?>
           </div>
           <div class="f3">Copyrigth &copy; <?php echo date("Y"); echo " "; bloginfo('name'); ?> 版权所有</div>
      </div>
</div>
    
    
    
    <script type="text/javascript">
var IO = document.getElementById('float_zzjs'), Y = IO, H = 0, IE6;
IE6 = window.ActiveXObject && !window.XMLHttpRequest;
while (Y) { H += Y.offsetTop; Y = Y.offsetParent };
if (IE6)
    IO.style.cssText = "position:absolute;top:expression(this.fix?(document"+".documentElement.scrollTop-(this.javascript||" + H + ")):0)";
    window.onscroll = function() {
    var d = document, s = Math.max(d.documentElement.scrollTop, document.body.scrollTop);
    if (s > H && IO.fix || s <= H && !IO.fix) return;
    if (!IE6) IO.style.position = IO.fix ? "" : "fixed";
	if (!IE6) IO.style.top = IO.fix ? "" : "0px";
    IO.fix = !IO.fix;
};
try { document.execCommand("BackgroundImageCache", false, true) } catch (e) { };
</script>
	
	<!-- Don't forget analytics -->
<?php else : ?>
   <div id="header_010">
        <div class="ss001">
            <div class="ss002">Search</div>
            <form action="<?php bloginfo('siteurl'); ?>" id="searchform" method="get">
                <input type="text" id="s" name="s" value="" />
                <input type="submit" value="" id="searchsubmit" />
            </form>
        </div>
        <div class="a1">
            <div class="a1_1"><a href="#" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/xb_001.png" /></a></div>
            <div class="a1_1"><a href="#" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/xb_002.png" /></a></div>
            <div class="a1_1"><a href="#" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/xb_003.png" /></a></div>
        </div>
        <div class="a2"><a href="http://www.themepark.com.cn"><img src="<?php bloginfo('template_url'); ?>/images/xct-001.jpg" /></a></div>
    </div>
    <div class="foot_010">
         <div class="footer_010">
             <div class="j1">
                 <?php if (get_option('mytheme_logo3')!=""): ?>
                   <img src="<?php echo get_option('mytheme_logo3'); ?>"/>
               <?php else : ?>
                   <img src="<?php bloginfo('template_url'); ?>/images/logo3.png" />
               <?php endif; ?>
             </div>
             <div class="j2 f_bq">Copyrigth &copy; <?php echo date("Y"); echo " "; bloginfo('name'); ?> 版权所有</div>
         </div>
         <div class="footer_011"></div>
         <div class="footer_012">
             <div class="j3">
                  <script type=text/javascript>
                        <!--	
                        var focus_width=398
                        var focus_height=137
                        var text_height=0
                        var swf_height = focus_height+text_height
                        
						var pics=<?php if (get_option('mytheme_dbgg')!=""): ?>
                                  '<?php echo get_option('mytheme_dbgg'); ?>'
                                 <?php else : ?>
                                  '<?php bloginfo('template_url'); ?>/images/t1.jpg|<?php bloginfo('template_url'); ?>/images/t2.jpg|<?php bloginfo('template_url'); ?>/images/t3.jpg'
                                 <?php endif; ?>
                        var links=<?php if (get_option('mytheme_dbgglj')!=""): ?>
                                  '<?php echo get_option('mytheme_dbgglj'); ?>'
                                 <?php else : ?>
                                  '#'
                                 <?php endif; ?>
						
                        var texts='#####'
                        document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="'+ focus_width +'" height="'+ swf_height +'">');
                        document.write('<param name="allowScriptAccess" value="sameDomain"><param name="movie" value="<?php bloginfo('template_url'); ?>/flash/focus.swf"> <param name="quality" value="high"><param name="bgcolor" value="#FF6327">');
                        document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
                        document.write('<param name="FlashVars" value="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'">');
                        document.write('<embed src="<?php bloginfo('template_url'); ?>/flash/focus.swf" wmode="opaque" FlashVars="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'" menu="false" bgcolor="#ffffff" quality="high" width="'+ focus_width +'" height="'+ swf_height +'" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />');		document.write('</object>');
                        
                        //-->
                        </script>
             </div>
             <div class="j4">
                  <div class="j4_1">
                       <form action="<?php bloginfo('siteurl'); ?>" id="searchform" method="get">
                         <input type="text" id="s" name="s" value="" />
                         <input type="submit" value="" id="searchsubmit" />
                       </form>
                  </div>
                  <div class="j4_2">
                            <li>文章总数：<?php $count_posts = wp_count_posts(); echo $published_posts = $count_posts->publish;?>篇</li>
                            <li>评论总数：<?php echo $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments");?>条</li>
                            <li>页面总数：<?php $count_pages = wp_count_posts('page'); echo $page_posts = $count_pages->publish; ?>个</li>
                            <li>分类总数：<?php echo $count_categories = wp_count_terms('category'); ?>个</li>
                            <li>标签总数：<?php echo $count_tags = wp_count_terms('post_tag'); ?>个</li>
                  </div>
             </div>
         </div>
    </div>
<?php endif; ?>	
<?php wp_footer(); ?>
</body>

</html>
