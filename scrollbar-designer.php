<?php
 /*
 *Plugin Name: Scrollbar Designer
 *Plugin URI:
 *Description: Scrollbar Designer allows you to customize the appearance of default scrollbar on your website matching your theme .
 *Version: 2.1
 *Author: Zia Imtiaz
 *Author URI:
 *License: GPLv2
 */


function scrollbar_add_scripts_to_head() { ?>
        

<script type="text/javascript">
        jQuery(document).ready(function($) {
                var nice = $("html").niceScroll({
                        
                        cursorcolor:"<?php echo get_option('st_sb_color'); ?>",        
                        cursorwidth: "<?php echo get_option('st_sb_width');?>",        
                        cursorborder: "<?php echo get_option('st_sb_border_size') ?> <?php echo get_option('st_sb_border_style') ?> <?php echo get_option('st_sb_border_color') ?>",                                 
                        enablemousewheel:"<?php echo get_option('st_mouse_switch') ?>",
                        railalign:"<?php echo get_option('st_rail_align_switch') ?>",
                        background: "rgba(<?php echo get_option('st_rail_color_opacity');?>)"

                });
        });
</script>

<?php
}


function default_scrollbar_settings(){
        add_option('st_sb_color','#FF9900');
        add_option('st_sb_width','8px');
        add_option('st_sb_border_size',  '1px');
        add_option('st_sb_border_style', 'solid');
        add_option('st_sb_border_color', '#ffffff');
        add_option('st_rail_color_opacity', '0,0,0,1');
        add_option('st_mouse_switch', 'true');
        add_option('st_rail_align_switch' , 'right');

}

function delete_scrollbar_options(){
        delete_option('st_sb_color');
        delete_option('st_sb_width');
        delete_option('st_sb_border_size');
        delete_option('st_sb_border_style');
        delete_option('st_sb_border_color');
        delete_option('st_rail_color_opacity');
        delete_option('st_sb_border_radius');
        delete_option('st_onoffswitch_autohide');
        delete_option('st_rail_align_switch');
        delete_option('st_sb_speed');
        delete_option('st_sb_active_opacity');
        delete_option('st_sb_mouse_step');
        delete_option('st_smothscroll_switch');
        delete_option('st_bouncescroll_switch');
        delete_option('st_mouse_switch');
        delete_option('st_onoffswitch');
        delete_option('st_sb_z-index');
        delete_option('st_sb_delay');
}

register_deactivation_hook( __FILE__, 'delete_scrollbar_options' ); 
register_activation_hook( __FILE__, 'default_scrollbar_settings' );

if(get_option('st_onoffswitch')== 1){
 require('scrollbar-action.php');
}
else{

}

require('scrollbar-designer-settings-page.php');
?>