<?php 

add_action('admin_menu','scrollbar_designer_menu');

function scrollbar_designer_menu(){
	add_menu_page('Scrollbar Designer','Scrollbar Designer','administrator','st_option','scrollbar_designer_settings_form','', 16);
	add_action('admin_init', 'scrollbar_designer_register_settings');
}

function scrollbar_designer_register_settings(){

    register_setting('scrollbar-settings-group' , 'st_onoffswitch');
    register_setting('scrollbar-settings-group' , 'st_sb_color');
    register_setting('scrollbar-settings-group' , 'st_sb_width');
    register_setting('scrollbar-settings-group' , 'st_sb_border_size');
    register_setting('scrollbar-settings-group' , 'st_sb_border_style');
    register_setting('scrollbar-settings-group' , 'st_sb_border_color');
    register_setting('scrollbar-settings-group' , 'st_sb_border_radius');
    register_setting('scrollbar-settings-group' , 'st_rail_color_opacity');
    register_setting('scrollbar-settings-group' , 'st_onoffswitch_autohide');
    register_setting('scrollbar-settings-group' , 'st_sb_speed');
    register_setting('scrollbar-settings-group' , 'st_rail_align_switch');
    register_setting('scrollbar-settings-group' , 'st_sb_active_opacity');
    register_setting('scrollbar-settings-group' , 'st_sb_mouse_step');
    register_setting('scrollbar-settings-group' , 'st_smothscroll_switch');
    register_setting('scrollbar-settings-group' , 'st_bouncescroll_switch');
    register_setting('scrollbar-settings-group' , 'st_mouse_switch');
    register_setting('scrollbar-settings-group' , 'st_sb_z-index');
    register_setting('scrollbar-settings-group' , 'st_sb_delay');
    

}

function scrollbar_custom_script() { 
    wp_enqueue_script('jquery');
    wp_register_script( 'script', plugins_url('js/jquery.nicescroll.min.js', __FILE__) );
    wp_enqueue_script( 'script', array('jquery') );
}add_action('wp_enqueue_scripts','scrollbar_custom_script');


function add_color_picker( $hook_suffix ) { //add colorpicker to options page
	wp_enqueue_script( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker-scripts', plugins_url( 'js/color-picker.js', __FILE__ ), array( 'jquery', 'wp-color-picker' ), false, true );
	wp_enqueue_style( 'wp-color-picker' );
}
add_action( 'admin_enqueue_scripts', 'add_color_picker' );

function scrollbar_designer_settings_form(){

 $lps = 'login-page-styler';
 $lps_install_link = '<a href="' . esc_url( network_admin_url('plugin-install.php?tab=plugin-information&plugin=' . $lps . '&TB_iframe=true&width=600&height=550' ) ) . '" class="thickbox" title="More info about ' . $lps . '">Install Now' . '</a>';

  ?>

<style>

    .onoffswitch {
        position: relative; width: 90px;
        -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
    }
   td .onoffswitch-checkbox {
        display: none;
    }
    .onoffswitch-label {
        display: block; overflow: hidden; cursor: pointer;
        border: 2px solid #999999; border-radius: 20px;
    }
    .onoffswitch-inner {
        display: block; width: 200%; margin-left: -100%;
        transition: margin 0.1s ease-in 0s;
    }
    .onoffswitch-inner:before, .onoffswitch-inner:after {
        display: block; float: left; width: 50%; height: 30px; padding: 0; line-height: 30px;
        font-size: 14px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
        box-sizing: border-box;
    }
    .onoffswitch-inner:before {
        content: "Yes";
        padding-left: 10px;
        background-color: #34A7C1; color: #FFFFFF;
    }
    .onoffswitch-inner:after {
        content: "No";
        padding-right: 10px;
        background-color: #EEEEEE; color: #999999;
        text-align: right;
    }
    .onoffswitch-switch {
        display: block; width: 18px; margin: 6px;
        background: #FFFFFF;
        position: absolute; top: 0; bottom: 0;
        right: 56px;
        border: 2px solid #999999; border-radius: 20px;
        transition: all 0.1s ease-in 0s; 
    }
    .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
        margin-left: 0;
    }
    .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
        right: 0px; 
    }


@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 400;
  src: local('Montserrat-Regular'), url(http://fonts.gstatic.com/s/montserrat/v6/zhcz-_WihjSQC0oHJ9TCYPk_vArhqVIZ0nv9q090hN8.woff2) format('woff2'), url(http://fonts.gstatic.com/s/montserrat/v6/zhcz-_WihjSQC0oHJ9TCYBsxEYwM7FgeyaSgU71cLG0.woff) format('woff');
}

@font-face {
  font-family: 'Lato';
  font-style: normal;
  font-weight: 400;
  src: local('Lato Regular'), local('Lato-Regular'), url(http://fonts.gstatic.com/s/lato/v11/1YwB1sO8YE1Lyjf12WNiUA.woff2) format('woff2'), url(http://fonts.gstatic.com/s/lato/v11/9k-RPmcnxYEPm8CNFsH2gg.woff) format('woff');
}
@font-face {
  font-family: 'Lato';
  font-style: normal;
  font-weight: 700;
  src: local('Lato Bold'), local('Lato-Bold'), url(http://fonts.gstatic.com/s/lato/v11/H2DMvhDLycM56KNuAtbJYA.woff2) format('woff2'), url(http://fonts.gstatic.com/s/lato/v11/wkfQbvfT_02e2IWO3yYueQ.woff) format('woff');
}
@font-face {
  font-family: 'Lato';
  font-style: italic;
  font-weight: 400;
  src: local('Lato Italic'), local('Lato-Italic'), url(http://fonts.gstatic.com/s/lato/v11/PLygLKRVCQnA5fhu3qk5fQ.woff2) format('woff2'), url(http://fonts.gstatic.com/s/lato/v11/oUan5VrEkpzIazlUe5ieaA.woff) format('woff');
}


b, strong {
    color: #666;
    font-size: 18px;
    font-weight: 700;
}


.wrap {
    z-index: -3;
    background-color: #fff;
    border-radius: 3px;
    box-shadow: 0 2px 1px 0 rgba(0, 0, 0, 0.1);
    font-family: Lato;
    margin: 4% auto;
    overflow: hidden;
    padding: 40px 6%;
    width: 80%;
}

.wrap p{
  font-size: 19px;
  color:#777;
}

.wrap h1 {
    background: #ffba00 none repeat scroll 0 0;
    color: #fff;
    font-family: 'Montserrat',sans-serif;
    font-size: 42px;
    font-weight: 400;
    margin: -40px -8% 40px;
    padding: 40px;
    text-align: center;
    text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.1);
}

.wrap h3 {
    color: #666;
    font-size: 20px;
    text-align: left;
}


.wrap #hed3 {
    background-color: #0074a2;
    height: auto;
    margin: 40px -8%;
    padding: 10px;
    text-align: center;
    text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.1);
}


#hed3 h3 {
    color: #fff;
    font-family: Montserrat,sans-serif;
    font-size: 32px;
    font-weight: 400;
    text-align: center;
}

 .wrap th
 {
  color :#666;
  font-size: 1.2em;
  padding-left: 15px;

 }


 .wrap td
 {
  padding-left: 40px;
 }
.wrap h3 a ,p a
{
  text-decoration: none;
}
.wrap td p
{
  color:#666;
  font-size:1.2em;
}
.wrap p.submit
{
  text-align: center;
}


.wrap input.button-primary
.wrap input.button-primary {
    border-radius: 4px;
    height: 4em;
    width: 25%;
}


.wp-core-ui .button-primary {
    background: #00a0d2 none repeat scroll 0 0 !important;
    border: medium none !important;
    box-shadow: 0 2px 1px 0 rgba(0, 0, 0, 0.1) !important;
    color: #fff !important;
    font-family: "Montserrat",sans-serif !important;
    font-size: 18px !important;
    height: 4rem;
    text-decoration: none !important;
    text-transform: uppercase !important;
    width: 25% !important;
}

.wp-core-ui .button-primary.focus, .wp-core-ui .button-primary.hover, .wp-core-ui .button-primary:focus, .wp-core-ui .button-primary:hover {
  background:#ffba00 !important;
}
//////////////////////////////////////////new radio/////////////////////////////////////
body {
  font: 13px/20px "Lucida Grande", Tahoma, Verdana, sans-serif;
  color: #404040;
  background: #363a41;
}
 
.container {
  width: 120px;

}

.switch {
  top:-16px;
  position: relative;
  margin: 20px auto;
  height: 26px;
  width: 120px;
  background: rgba(0, 0, 0, 0.25);
  border-radius: 3px;
  -webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
}
 
.switch-label {
  position: relative;
  z-index: 2;
  float: left;
  width: 58px;
  line-height: 26px;
  font-size: 13.8px;
  color: rgba(255, 255, 255, 0.35);
  text-align: center;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.45);
  cursor: pointer;
}
 
.switch-label:active {
  font-weight: bold;
  color:blue;
}
 
.switch-label-off {
  padding-left: 2px;
  
}
 
.switch-label-on {
  padding-right: 2px;
  
}
 
td .switch-input{
  display: none;
}
 
.switch-input:checked + .switch-label {
  font-weight: bold;/*
  color: rgba(0, 0, 0, 0.65);*/
  color:white;
  text-shadow: 0 1px rgba(255, 255, 255, 0.25);
  -webkit-transition: 0.15s ease-out;
  -moz-transition: 0.15s ease-out;
  -o-transition: 0.15s ease-out;
  transition: 0.15s ease-out;
}
 
.switch-input:checked + .switch-label-on ~ .switch-selection {
  /* Note: left: 50% doesn't transition in WebKit */
  left: 60px;
}
 
.switch-selection {
  display: block;
  position: absolute;
  z-index: 1;
  top: 2px;
  left: 2px;
  width: 58px;
  height: 22px;
  background: #65bd63;
  border-radius: 3px;
  background-image: -webkit-linear-gradient(top, #9dd993, #65bd63);
  background-image: -moz-linear-gradient(top, #9dd993, #65bd63);
  background-image: -o-linear-gradient(top, #9dd993, #65bd63);
  background-image: linear-gradient(to bottom, #9dd993, #65bd63);
  -webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.5), 0 0 2px rgba(0, 0, 0, 0.2);
  box-shadow: inset 0 1px rgba(255, 255, 255, 0.5), 0 0 2px rgba(0, 0, 0, 0.2);
  -webkit-transition: left 0.15s ease-out;
  -moz-transition: left 0.15s ease-out;
  -o-transition: left 0.15s ease-out;
  transition: left 0.15s ease-out;
}
 
.switch-blue .switch-selection {
  background: #3aa2d0;
  background-image: -webkit-linear-gradient(top, #4fc9ee, #3aa2d0);
  background-image: -moz-linear-gradient(top, #4fc9ee, #3aa2d0);
  background-image: -o-linear-gradient(top, #4fc9ee, #3aa2d0);
  background-image: linear-gradient(to bottom, #4fc9ee, #3aa2d0);
}
 
.switch-yellow .switch-selection {
  background: #c4bb61;
  background-image: -webkit-linear-gradient(top, #e0dd94, #c4bb61);
  background-image: -moz-linear-gradient(top, #e0dd94, #c4bb61);
  background-image: -o-linear-gradient(top, #e0dd94, #c4bb61);
  background-image: linear-gradient(to bottom, #e0dd94, #c4bb61);
}


.rc_plugin_thumb{
      width: 200px;
      height: 200px;
     
    }
</style>

<div class='wrap'>
 
	<h1> <?php _e('Scrollbar Designer')?></h1>
	<h3> <?php _e('Get rid of boring scrollbar and make your own Custom Scrollbar for your website.')?></h3>
  <h3>Recommended Plugin</h3>
        <img src="<?php echo plugins_url('img/lps.png',__FILE__); ?>" class="rc_plugin_thumb" >
       <p><b>Login Page Styler - <?php echo $lps_install_link; ?></b></p>
 
  
  
	<?php settings_errors(); ?>
       <form method="post" action="options.php" >
           <?php settings_fields('scrollbar-settings-group');?>
           <div id="headings-data">

           	<div id="hed3"><h3><?php _e('Scrollbar Settings') ?></h3></div>

           <table class="form-table">



		    <tr valign='top'>
				<th scope='row'><?php _e('Enable Plugin :');?></th>
				<td>
				    <div class="onoffswitch">
                     <input type="checkbox" name="st_onoffswitch" class="onoffswitch-checkbox"  id="myonoffswitch" value='1'<?php checked(1, get_option('st_onoffswitch')); ?> />
                     <label class="onoffswitch-label" for="myonoffswitch">
                     <span class="onoffswitch-inner"></span>
                     <span class="onoffswitch-switch"></span>
                     </label>
                    </div>


				</td>
			  </tr>

            <tr vlaign='top'>
                <th scope='row'><?php _e('Scrollbar Cursor Color');?></th>
                <td><label for='st_sb_color'>
                    <input type='text' class='color_picker' id='st_sb_color' name='st_sb_color' value='<?php echo get_option('st_sb_color' ); ; ?>'/>
                    <p class="description"><?php _e('Change scrollbar color'); ?></p>
                </label>
                </td>
            </tr>

            <tr valign="top">
              <th scope="row"><?php _e('Scrollbar Cursor Width'); ?></th>
              <td><label for='st_sb_width'>
                  <input type='text'  id='st_sb_width' name='st_sb_width' value='<?php echo get_option('st_sb_width') ;?> ' size='9'/>
                  <p class="description"><?php _e( 'Insert Scrollbar width. Default is 8px'); ?></p>
                 </lable>
             </td>
            </tr>

            <tr valign="top">
              <th scope="row"><?php _e('Scrollbar Cursor Border Style'); ?></th>
              <td><label for='st_sb_border_size'>
                  <input type='text'  id='st_sb_border_size' name='st_sb_border_size' value='<?php echo get_option('st_sb_border_size') ;?> ' size='4'/>
                  <p class="description"><?php _e( ' Add Scrollbar Cursor Border width, Default is 1px'); ?></p>

                  </label></br>

                  <label for='st_sb_border_style'>
                  <select name='st_sb_border_style'>
                         <option value='none'   <?php selected( get_option('st_sb_border_style'),'none'); ?>   >None</option>
                         <option value='solid'  <?php selected( get_option('st_sb_border_style'),'solid'); ?>  >Solid</option>
                         <option value='dashed' <?php selected( get_option('st_sb_border_style'),'dashed'); ?> >Dashed</option>
                         <option value='dotted' <?php selected( get_option('st_sb_border_style'),'dotted'); ?> >Dotted</option>
                         <option value='double' <?php selected( get_option('st_sb_border_style'),'double'); ?> >Double</option>
                  </select>
                  <p class="description"><?php _e( 'Select Scrollbar Cursor Boarder Style.'); ?></p>
                  </label></br>
                  
                  <label for='st_sb_border_color'>
                  <input type='text' class='color_picker' id='st_sb_border_color' name='st_sb_border_color' value='<?php echo get_option('st_sb_border_color' ); ; ?>'/>
                  <p class="description"><?php _e( 'Select Scrollbar Cursor Border Color.'); ?></p>
                 </lable></br>
             </td>
            </tr>


             <tr>
                <th scope='row'><?php _e('Rail Color with Opacity');?></th>
                <td><label for='st_rail_color_opacity'>
                    <input type='text' id='st_rail_color_opacity' name='st_rail_color_opacity' value='<?php echo get_option('st_rail_color_opacity')?>'/>
                    <p class='description'> <?php _e( 'Add RGBA color value eg: 255 , 255 , 255 ,0.5 last value in decimal is the Opacity .');?></p>
                    <p class='description'> <?php _e( 'Get RGBA color value here: <a href="http://www.css3-generator.de/rgba.html" target="_blank">RGBA Colors</a> .');?></p>
                </label>
                </td>
            </tr>


            <tr valign='top'>

                <th scope='row'><?php _e('Mouse Whele Scroll');?></th>
                <td>

                  <div class="container">
                  <div class="switch">
                   <input type="radio" class="switch-input" name="st_mouse_switch"  value='false' <?php checked('false',get_option('st_mouse_switch')) ?> id='week3' />
                   <label for="week3"   class="switch-label switch-label-off">NO</label>
                   <input type="radio" class="switch-input" name="st_mouse_switch"   value='true' <?php checked('true',get_option('st_mouse_switch')) ?> id='month3' />
                   <label for="month3"  class="switch-label switch-label-on">YES</label> 
                   <span class="switch-selection"></span>
                  </div>
                 </div>
                     
                </td>
            </tr>



            <tr valign='top'>

                <th scope='row'><?php _e(' Scrollbar Rail Position');?></th>
                <td>
                 
                 <div class="container">
                  <div class="switch">
                   <input type="radio" class="switch-input" name="st_rail_align_switch"   value='left' <?php checked('left',get_option('st_rail_align_switch')) ?> id='week1' />
                   <label for="week1"   class="switch-label switch-label-off">Left</label>
                   <input type="radio" class="switch-input" name="st_rail_align_switch"   value='right' <?php checked('right',get_option('st_rail_align_switch')) ?> id='month1' />
                   <label for="month1"  class="switch-label switch-label-on">Right</label>
                   <span class="switch-selection"></span>
                  </div>
                 </div>  

                </td>
            </tr>

            </table>
             <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e( 'Save Changes' ); ?>" />
        </p>
          </div>

         <div id="headings-data">

            <div id="hed3"><h3><?php _e('Premium Settings') ?></h3></div>
             
             <h3 style="text-align:center;"><?php _e('To use premium features , Go Premium')?></h3>
            <p class="submit">
            <input type="button" class="button-primary" onclick="location.href='http://web-settler.com/scrollbar-designer/';" value="Go Pro Now"  target='_blank'/>
        </p>

           <table class="form-table">

             <tr valign="top">
              <th scope="row"><?php _e('Scrollbar Cursor Border Radius'); ?></th>
              <td><label for='st_sb_border_radius'>
                  <input type='text'  id='st_sb_border_radius' name='' value='' size='9' disabled/>
                  <p class="description"><?php _e( 'Insert Scrollbar border-radius. Default value is 1px'); ?></p>
                  <p class="description"><?php _e( '<b>Premium Version <a href="http://web-settler.com/scrollbar-designer/">Unlock Here</a></b>'); ?></p>
                 </lable>
             </td>
            </tr>


            <tr valign="top">
              <th scope="row"><?php _e('Scrollbar Cursor Z-index'); ?></th>
              <td><label for='st_sb_z-index'>
                  <input type='text'  id='st_sb_z-index' name='' value='' size='9' disabled/>
                  <p class="description"><?php _e( 'If your scrollbar is hindden or not showing enter Z-Index, Default is -1 , Range from 1 to 9999'); ?></p>
                  <p class="description"><?php _e( '<b>Premium Version <a href="http://web-settler.com/scrollbar-designer/">Unlock Here</a></b>'); ?></p>
                 </lable>
             </td>
            </tr>


            <tr>
                <th scope='row'><?php _e('Scroll Speed');?></th>
                <td><label for='st_sb_speed'>
                    <input type='text' id='st_sb_speed' name='' value='' disabled/>
                    <p class='description'> <?php _e( 'Set scrollbar speed value , Default value is 60');?></p>
                    <p class="description"><?php _e( '<b>Premium Version <a href="http://web-settler.com/scrollbar-designer/">Unlock Here</a></b>'); ?></p>
                </label>
                </td>
            </tr>


            <tr>
                <th scope='row'><?php _e('Scrollbar Hide Delay');?></th>
                <td><label for='st_sb_delay'>
                    <input type='text' id='st_sb_delay' name='' value='' disabled/>
                    <p class='description'> <?php _e( 'Set scrollbar hide delay value ,it works when auto hide is selected "Yes"  , Default value is 400');?></p>
                    <p class="description"><?php _e( '<b>Premium Version <a href="http://web-settler.com/scrollbar-designer/">Unlock Here</a></b>'); ?></p>
                </label>
                </td>
            </tr>


             <tr>
                <th scope='row'><?php _e('Scrollbar Opacity When Active');?></th>
                <td><label for='st_sb_active_opacity'>
                    <input type='text' id='st_sb_active_opacity' name='' value='' disabled/>
                    <p class='description'> <?php _e( 'Set scrollbar opacity ,Range from 1 to 0  ,Default value is 1');?></p>
                    <p class="description"><?php _e( '<b>Premium Version <a href="http://web-settler.com/scrollbar-designer/">Unlock Here</a></b>'); ?></p>
                </label>
                </td>
            </tr>


            <tr>
                <th scope='row'><?php _e('Mouse Scroll Step');?></th>
                <td><label for='st_sb_mouse_step'>
                    <input type='text' id='st_sb_mouse_step' name='' value=''/ disabled>
                    <p class='description'> <?php _e( 'Set Mouse whele Scroll Step, Default is : 20 ');?></p>
                    <p class="description"><?php _e( '<b>Premium Version <a href="http://web-settler.com/scrollbar-designer/">Unlock Here</a></b>'); ?></p>
                </label>
                </td>
            </tr>


            

             <tr valign='top'>

                <th scope='row'><?php _e(' Auto Hide On Inactive');?></th>
               <td>
                <div class="container">
                 <div class="switch">
                   <input type="radio" class="switch-input" name="st_onoffswitch_autohide"  required checked value='false' <?php checked('false',get_option('st_onoffswitch_autohide')) ?> id='week' disabled/>
                   <label for="week"   class="switch-label switch-label-off">NO</label>
                   <input type="radio" class="switch-input" name="st_onoffswitch_autohide"  value='true' <?php checked('true',get_option('st_onoffswitch_autohide')) ?> id='month' disabled />
                   <label for="month"  class="switch-label switch-label-on">YES</label>
                   <span class="switch-selection"></span>
                 </div>
                </div>

                <p class="description"><?php _e( '<b>Premium Version <a href="http://web-settler.com/scrollbar-designer/">Unlock Here</a></b>'); ?></p>

        </td>
            </tr>


            <tr valign='top'>

                <th scope='row'><?php _e(' Smoth Scroll');?></th>
                <td>

                 <div class="container">
                  <div class="switch">
                   <input type="radio"  class="switch-input" name="st_smothscroll_switch"  required checked value='false' <?php checked('false',get_option('st_smothscroll_switch')) ?> id='week2' disabled />
                   <label for="week2"   class="switch-label switch-label-off">NO</label>
                   <input type="radio"  class="switch-input" name="st_smothscroll_switch"  value='true' <?php checked('true',get_option('st_smothscroll_switch')) ?> id='month2' disabled />
                   <label for="month2"  class="switch-label switch-label-on">Yes</label>
                   <span class="switch-selection"></span>
                  </div>
                 </div>

                 <p class="description"><?php _e( '<b>Premium Version <a href="http://web-settler.com/scrollbar-designer/">Unlock Here</a></b>'); ?></p>    
                </td>
            </tr>



           </table>
            <p class="submit">
            <input type="button" class="button-primary" onclick="location.href='http://web-settler.com/scrollbar-designer/';" value="Go Pro Now"  target='_blank'/>
        </p>
        </form>    

</div>


<?php }

function st_action_links( $links, $file ) {
  if ( $file == plugin_basename( dirname(__FILE__).'/scrollbar-designer.php' ) ) {
    $links[] = '<a href="' . get_bloginfo('url') . '/wp-admin/admin.php?page=st_option">Settings</a>';;
  }
  return $links;
}
add_filter('plugin_action_links','st_action_links' ,10,2);
 ?>