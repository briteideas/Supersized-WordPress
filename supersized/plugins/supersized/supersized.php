<?php

/* 
 *  Adds Supersized convenience methods to WordPress 
 */

class Supersized{

    static $scripts;

    static $styles;

    static $enabled = false;

    static function init() {
        add_action('wp_enqueue_scripts', array(__CLASS__, 'register_script'));
    }

  // Example for efficiently adding jQuery plugins into project
    static function register_script() {
        if(self::$enabled){
            wp_enqueue_style( 'supersized', get_bloginfo('template_directory') . '/css/supersized.css', array(), '1.0', 'screen' );
            wp_enqueue_style( 'supersized.shutter', get_bloginfo('template_directory') . '/theme/supersized.shutter.css', array('supersized'), '1.0', 'screen' );


            wp_enqueue_script('jquery.easing', get_bloginfo('template_directory') . "/js/jquery.easing.min.js", array('jquery'), '1.0', false);

            wp_enqueue_script('supersized', get_bloginfo('template_directory') . "/js/supersized.3.2.4.min.js", array('jquery'), '3.2.4', false);        
            wp_enqueue_script('supersized.shutter.js', get_bloginfo('template_directory') . "/theme/supersized.shutter.js", array('supersized'), '1.0', false);
        }

    }

    static function get_slides($images = array()){

        foreach ( $images as $image ) {
            $slides .= "{image : '" . $image['location'] . "', title : '" . $image['name'] . "'} ,";
        }
        
        // $slides_json = "slides : [
        //     {image : 'http://i0.kym-cdn.com/photos/images/original/000/007/445/pancake_bunny.jpg?1249339142', title : 'Bunny with Pancake'} ,
        //     {image : 'http://upload.wikimedia.org/wikipedia/commons/thumb/0/0e/Oolong_the_Rabbit\'s_last_performance_(2003).jpg/220px-Oolong_the_Rabbit\'s_last_performance_(2003).jpg', title : 'Bunny with Pancake'} ,
        // ] ";

        return "slides : [$slides]";
    }

    static function get_supersized($images = array(), $options = array()){
        $slides = self::get_slides($images);

        $script = "<script type='text/javascript'>
        jQuery(function($){

                            $.supersized({
                                // Functionality
                                slide_interval          :   6000,       // Length between transitions
                                transition              :   1,          // 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
                                transition_speed        :   1500,       // Speed of transition
                                slideshow               :   1,

                                // Components                           
                                slide_links             :   'blank',    // Individual links for each slide (Options: false, 'number', 'name', 'blank')
                                thumb_links             :   '1',
                                thumb_navigation        :   '1',
                                progress_bar            :   '0', 

                                // Size & Position                         
                                min_width               :   0,          // Min width allowed (in pixels)
                                min_height              :   0,          // Min height allowed (in pixels)
                                vertical_center         :   1,          // Vertically center background
                                horizontal_center       :   1,          // Horizontally center background
                                fit_always              :   1,          // Image will never exceed browser width or height (Ignores min. dimensions)
                                fit_portrait            :   0,          // Portrait images will not exceed browser height
                                fit_landscape           :   0,          // Landscape images will not exceed browser width   

                                $slides
                            });
                        });
        </script>";

        $stylesheet_directory = get_template_directory_uri();

        $controls = <<<EOD

                    <!--Thumbnail Navigation-->
                    <div id="prevthumb"></div>
                    <div id="nextthumb"></div>
                    
                    <div id="thumb-tray" class="load-item">
                        <div id="thumb-back"></div>
                        <div id="thumb-forward"></div>
                    </div>

                    <!--Control Bar-->
                    <div id="controls-wrapper" class="load-item">
                        <div id="controls">

                            <a id="play-button"><img id="pauseplay" src="$stylesheet_directory/img/pause.png"/></a>

                            <!--Slide counter-->
                            <div id="slidecounter">
                                <span class="slidenumber"></span> / <span class="totalslides"></span>
                            </div>

                            <!--Slide captions displayed here-->
                            <div id="slidecaption"></div>

                            <!--Thumb Tray button-->
                            <a id="tray-button"><img id="tray-arrow" src="$stylesheet_directory/img/button-tray-up.png"/></a>

                            <!--Navigation-->
                            <ul id="slide-list"></ul>

                        </div>
                    </div>
EOD;

        return "$script\n$controls\n";
    }

}

Supersized::init();

function activate_supersized($state = true){
    Supersized::$enabled = $state;
}

function do_supersized($images = array(), $options = array()){
    echo Supersized::get_supersized($images, $options);
}