<?php

/**
 * Plugin Name: Plugin for Jake By Kamrul Hasan
 * Description: Simple widget for Jake.
 * Version:     1.0.0
 * Author:      Kamrul Hasan
 * Author URI:  www.bengalcoder.com
 * Text Domain: jake
 */

function jake_widget_style_script()
{
  // Enqueue the styles
  wp_enqueue_style('jake-widget-style', plugin_dir_url(__FILE__) . 'assets/css/style.css', array(), '1.0', 'all');

  // Enqueue your script.js file
  wp_enqueue_script('custom-script', plugin_dir_url(__FILE__) . 'assets/js/script.js', array('jquery'), '1.0', true);
}

// Hook the function to the wp_enqueue_scripts action
add_action('wp_enqueue_scripts', 'jake_widget_style_script');







// the function for register wodgets 

function register_jake_kh_widget($widgets_manager)
{
  require_once(__DIR__ . '/widgets/jake_custom_widget.php');


  $widgets_manager->register(new \Jake_Custom_Widget());
}
add_action('elementor/widgets/register', 'register_jake_kh_widget');





// register new categories                
function jake_kh_add_elementor_widget_categories($elements_manager)
{


  $elements_manager->add_category(
    'custom-theme-agency',
    [
      'title' => esc_html__('Theme Section', 'jake'),
      'icon' => 'fa fa-plug',
    ]
  );

  $elements_manager->add_category(
    'custom-theme-category',
    [
      'title' => esc_html__('Custom Theme', 'jake'),
      'icon' => 'fa fa-plug',
    ]
  );
}
add_action('elementor/elements/categories_registered', 'jake_kh_add_elementor_widget_categories');


function jake_add_code_to_footer()
{

?>

  <style>
    .custom-model-main-kh {
      text-align: center;
      overflow: hidden;
      position: fixed;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      /* z-index: 1050; */
      -webkit-overflow-scrolling: touch;
      outline: 0;
      opacity: 0;
      -webkit-transition: opacity 0.15s linear, z-index 0.15;
      -o-transition: opacity 0.15s linear, z-index 0.15;
      transition: opacity 0.15s linear, z-index 0.15;
      z-index: -1;
      overflow-x: hidden;
      overflow-y: auto;
    }

    .model-open-kh {
      z-index: 99999;
      opacity: 1;
      overflow: hidden;
    }

    .custom-model-inner {
      -webkit-transform: translate(0, -25%);
      -ms-transform: translate(0, -25%);
      transform: translate(0, -25%);
      -webkit-transition: -webkit-transform 0.3s ease-out;
      -o-transition: -o-transform 0.3s ease-out;
      transition: -webkit-transform 0.3s ease-out;
      -o-transition: transform 0.3s ease-out;
      transition: transform 0.3s ease-out;
      transition: transform 0.3s ease-out, -webkit-transform 0.3s ease-out;
      display: inline-block;
      vertical-align: middle;
      width: 600px;
      margin: 30px auto;
      max-width: 97%;
    }

    .custom-model-wrap {
      display: block;
      /* width: 100%; */
      width: 80%;
      margin-left: 44px;
      position: relative;
      background-color: #fff;
      border: 1px solid #999;
      /* border: 1px solid rgba(0, 0, 0, 0.2); */
      border: 1px solid transparent !important;
      border-radius: 6px;
      /* -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5); */
      -webkit-box-shadow: 0 3px 9px transparent !important;
      /* box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5); */
      box-shadow: 0 3px 9px transparent !important;
      background-clip: padding-box;
      outline: 0;
      text-align: left;
      padding: 20px;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
      max-height: calc(100vh - 70px);
      overflow-y: auto;
    }


    .model-open-kh .custom-model-inner {
      -webkit-transform: translate(0, 0);
      -ms-transform: translate(0, 0);
      transform: translate(0, 0);
      position: relative;
      z-index: 999;
    }


    .model-open-kh .bg-overlay {
      background: transparent !important;
      /* background: #7B7F85 !important; */
      z-index: 99;
    }

    .bg-overlay {
      /* background: rgba(255, 255, 255, 0); */
      background: transparent !important;

      height: 100vh;
      width: 100%;
      position: fixed;
      left: 0;
      top: 0;
      right: 0;
      bottom: 0;
      z-index: 0;
      -webkit-transition: background 0.15s linear;
      -o-transition: background 0.15s linear;
      transition: background 0.15s linear;
    }

    .close-btn {
      position: absolute;
      right: 0;
      top: 0;

      cursor: pointer;
      z-index: 99;
      font-size: 30px;
      color: #32363b;
    }



    @media screen and (min-width:800px) {
      .custom-model-main-kh:before {
        content: "";
        display: inline-block;
        height: auto;
        vertical-align: middle;
        margin-right: -0px;
        height: 100%;
      }
    }

    @media screen and (max-width:799px) {
      .custom-model-inner {
        margin-top: 45px;
      }
    }







    * {
      box-sizing: border-box;
    }


    .column {
      float: left;
      width: 25%;
      padding: 10px;
      height: auto;
    }

    .row:after {
      content: "";
      display: table;
      clear: both;
    }


    .column .pro-block {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 10px;
    }

    .column .pro-details h2 {
      text-align: center;
      color: black;
      font-weight: bold;
      font-size: 17px;
    }

    .column .pro-details p {
      text-align: center;
      color: #0083cf;
      font-weight: bold;
      font-size: 15px
    }



    .pro-extra a {
      color: #fff !important;
    }

    .pro-addcart {
      display: block;
      margin: 0 auto;
      width: 180px;
      padding: 10px 20px;
      background-color: black;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      text-align: center;
      transition: background-color 0.3s ease;
    }

    .pro-addcart:hover {
      background-color: #0083cf;
    }


    .pro-extra a {
      display: block;
      margin: 10px auto;
      width: 150px;
      padding: 10px 20px;
      background-color: black;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      text-align: center;
    }


    .pro-extra {
      display: flex;
      justify-content: space-between;
      flex-direction: column;
    }

    .pro-extra a {
      width: auto;
      margin: 10px 0;
    }



    .pro-img img {
      height: 285px;
      width: 100%;
      object-fit: cover;
    }

    .pro-details {
      min-height: 280px;
    }


    @media only screen and (max-width : 992px) {
      .pro-img img {
        height: 180px !important;
      }

      .column .pro-details h2 {
        font-size: 11px !important;
      }


      .column .pro-details p {
        font-size: 12px !important;
      }


      .pro-details {
        min-height: 220px !important;
      }

      .pro-extra a {
        padding: 2px 6px !important;
      }

    }

    @media only screen and (max-width : 767px) {

      .column {
        width: 50%;
      }

      .column .pro-details h2 {
        font-size: 10px;
      }

      .pro-img img {
        height: 120px !important;
      }

      .column .pro-details p {
        font-size: 12px;
      }

      .pro-extra {
        display: flex;
        flex-direction: column;
      }

      .pro-extra a {
        min-width: 118px !important;
        padding: 2px 12px;
        font-size: 13px !important;
      }

      .pro-addcart {
        min-width: 118px !important;
        padding: 2px 12px;
        font-size: 13px !important;
      }

      .pro-details {
        min-height: 230px !important;
      }

    }
  </style>




  <script>
    jQuery(document).ready(function($) {
      // alert('jeeee');
      $(".my-model-kh").on('click', function() {

        // alert("kamrul");

        $(".custom-model-main-kh").addClass('model-open-kh');
      });
      $(".close-btn, .bg-overlay").click(function() {
        $(".custom-model-main-kh").removeClass('model-open-kh');
      });
    });

    jQuery(document).ready(function($) {
      document.getElementById("myLink").addEventListener("click", function(event) {
        event.preventDefault();
      });
    });
  </script>

<?php

}
add_action('wp_footer', 'jake_add_code_to_footer');
