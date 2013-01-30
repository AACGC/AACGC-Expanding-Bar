<?php

/*
#######################################
#     e107 website system plguin      #
#     AACGC Expanding Bar             #    
#     by M@CH!N3                      #
#     http://www.AACGC.com            #
#######################################
*/


$eplug_name = "AACGC Expanding Bar";
$eplug_version = "1.4";
$eplug_author = "M@CH!N3";
$eplug_url = "http://www.aacgc.com";
$eplug_email = "admin@aacgc.com";
$eplug_description = "Shows floating Bar at the bottom that expands when users click or mouse there mouse over it and show content of your choice, BBcode supported. Code sorce from Dynamic Drive";
$eplug_compatible = "e107 v7+";
$eplug_readme = "";
$eplug_compliant = true;
$eplug_status = false;
$eplug_latest = false;

$eplug_folder = "aacgc_expbar";

$eplug_menu_name = "Expanding Bar";

$eplug_conffile = "admin_main.php";

$eplug_icon = $eplug_folder . "/images/icon_32.png";
$eplug_icon_small = $eplug_folder . "/images/icon_16.png";
$eplug_icon_large = "".e_PLUGIN."aacgc_expbar/images/icon_64.png";

$eplug_caption = "AACGC Expanding Bar";

$eplug_prefs = array(
"expbar_maintext" => "AACGC Expanding Bar",
"expbar_content" => "Shows Details of your choice, supports BBcode",
"expbar_contentclass" => "forumheader3",
"expbar_barclass" => "forumheader3",
"expbar_listnew" => "0",
"expbar_location" => "bottom",
"expbar_width" => "95%",
"expbar_leftside" => "5px",
);

$eplug_table_names = "";
$eplug_tables = "";

$eplug_link = false;
$eplug_link_name = "";
$eplug_link_url = "";

$eplug_done = "The plugin is now installed.";

$upgrade_add_prefs = array(
"expbar_location" => "bottom",
"expbar_width" => "95%",
"expbar_leftside" => "5px",
);
$upgrade_remove_prefs = "";

$upgrade_alter_tables = "";
$eplug_upgrade_done = "Upgrade Complete";

?>	

