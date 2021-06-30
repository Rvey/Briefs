<?php

/**
 * @package Hfooter
 * @author RedONe
 */

/*
Plugin Name: SUSfooter Plugin
Plugin URI: https://github.com/rvey
Description: add simple footer to your page.
Version: 0.1
Author: Redone 
Author URI: https://github.com/rvey
License: GPLv2 or later
Text Domain: SUSfooter hmmm
*/




defined('ABSPATH') or die('kill.');

class SfooterPlugin
{
  function __construct()
  {
    add_action('wp_footer', [$this, 'inject_content']);
    add_action('admin_menu', [$this, 'menu']);
  }


  // inject content
  function inject_content()
  {
    $opt_website_name = get_option('sf_opt_wesite' , 'rvey');
    $opt_home_link  = get_option('sf_opt_text', 'home');
    $opt_contact = get_option('sf_opt_contact', 'susfooter');
    $opt_github = get_option('sf_opt_github' , 'rvey');
    $opt_desc = get_option('sf_opt_desc' , 'desc');




    $date = date("Y");

    echo "
      <footer style='display:flex;flex-direction: column;background:#1f1f1f;justify-content:baseline; align-items:center;padding:1rem 2rem;'>
      <div style='justify-content:baseline;width:100%;'> 
          <h1 style='color: azure;'>$opt_website_name</h1>
          <ul style='list-style: none; color: aliceblue; font-weight: 400; font-family: monospace; font-size: x-large;'>
              <li><a href='$opt_home_link'>Home</a></li>
              <li><a href='$opt_contact'>contact me</a></li>
          </ul>
      </div>
         <div style='font-weight: 400; font-family: monospace; font-size: 15px; display: flex; flex-direction: row; gap: 23px;'> 
              <a style='color:#ccc;font-family:monospace;' href='https://github.com/$opt_github'>$opt_github</a>
              <div style='height:23px;'></div>
              <div style='color:#ccc;font-family:monospace;'>Copyright &copy; $date $opt_website_name | All Rights Rerserved</div>
      </div>
        </footer>
    ";
    
  }


  // setttings page
  function settings()
  {
    echo "<h2>" . __('SusFooter Settings Config') . "</h2>";
    include_once('Sfooter_settings_page.php');
  }

  function menu()
  {
    add_menu_page(
      'SFooter Config',
      'SFooter',
      'manage_options',
      'SF_config',
      [$this, 'settings'],
      'dashicons-buddicons-activity'
    );
  }
}

if (class_exists('SFooterPLugin')) {
  $Sf = new SFooterPlugin();
}
