<?php

if(USER){
$sql ->db_Select("user", "*", "user_id='".USERID."'");
$row = $sql ->db_Fetch();
if ($row['user_image'] == "")
{$avatar = "<img src='".e_PLUGIN."aacgc_expbar/images/default.png' width='75px' height='75px' alt='' />";}
else
{$useravatar = $row[user_image];
require_once(e_HANDLER."avatar_handler.php");
$useravatar = avatar($useravatar);
$avatar = "<img src='".$useravatar."' width='75px' height='75px' alt='' />";}
	
if ($pref['expbar_enable_goldorbs'] == "1")
{$userid = "".USERID."";
$username = $gold_obj->show_orb($userid);}
else
{$username = "".USERNAME."";}

$usermessage = "<b>".FBAR_01." ".$username."</b><br/>".$avatar."";}
else
{$usermessage = "<b>".FBAR_01." ".FBAR_02.",<br/>".FBAR_03."</b>";}

$expbar_login .= " ".$usermessage."<br/>";

if(defined("FPW_ACTIVE"))
{$expbar_login .= '';}

global $eMenuActive, $e107, $tp, $use_imagecode, $ADMIN_DIRECTORY,$bullet;
require_once(e_PLUGIN."login_menu/login_menu_shortcodes.php");
include_lan(e_PLUGIN."login_menu/languages/".e_LANGUAGE.".php");
$ip = $e107->getip();

if (defined('CORRUPT_COOKIE') && CORRUPT_COOKIE == TRUE)
{
	$expbar_login .= "<div style='text-align:center'>".LOGIN_MENU_L7."<br /><br />
	".$bullet." <a href='".e_BASE."index.php?logout'>".LOGIN_MENU_L8."</a></div>";
	$ns->tablerender(LOGIN_MENU_L9, $text, 'login');
}
$use_imagecode = ($pref['logcode'] && extension_loaded('gd'));

if ($use_imagecode)
{
	global $sec_img;
	include_once(e_HANDLER.'secure_img_handler.php');
	$sec_img = new secure_image;
}
$expbar_login .= '';
if (USER == TRUE || ADMIN == TRUE)
{
	if (!isset($LOGIN_MENU_LOGGED)) {
		if (file_exists(THEME."login_menu_template.php")){
	   		require(THEME."login_menu_template.php");
		}else{
			require(e_PLUGIN."login_menu/login_menu_template.php");
		}
	}

	if(!$LOGIN_MENU_LOGGED){ // if still doesn't exist in the user template.
    	require(e_PLUGIN."login_menu/login_menu_template.php");
	}

    $expbar_login .= $tp->parseTemplate($LOGIN_MENU_LOGGED, true, $login_menu_shortcodes);

	if ($sql->db_Select('online', 'online_ip', "`online_ip` = '{$ip}' AND `online_user_id` = '0' "))
	{	// User now logged in - delete 'guest' record (tough if several users on same IP)
		$sql->db_Delete('online', "`online_ip` = '{$ip}' AND `online_user_id` = '0' ");
	}


}
else
{
	if (!isset($LOGIN_MENU_FORM) || !isset($LOGIN_MENU_MESSAGE))
	{
		if (file_exists(THEME."login_menu_template.php"))
		{
	   	require_once(THEME."login_menu_template.php");
		}
		else
		{
			require_once(e_PLUGIN."login_menu/login_menu_template.php");
		}
	}
	if(!isset($LOGIN_MENU_FORM) || !isset($LOGIN_MENU_MESSAGE))
	{
    	require(e_PLUGIN."login_menu/login_menu_template.php");
	}

	if (strpos(e_SELF, $ADMIN_DIRECTORY) === FALSE)
	{

		if (LOGINMESSAGE != '')
		{
			$expbar_login .= $tp->parseTemplate($LOGIN_MENU_MESSAGE, true, $login_menu_shortcodes);
		}

		$expbar_login .= '<form method="post" action="'.e_SELF.(e_QUERY ? '?'.e_QUERY : '').'">';
		$expbar_login .= $tp->parseTemplate($LOGIN_MENU_FORM, true, $login_menu_shortcodes);
		$expbar_login .= '</form>';
	}
	else
	{
		$expbar_login .= $tp->parseTemplate("<div style='padding-top: 150px'>{LM_FPW_LINK}</div>", true, $login_menu_shortcodes);
	}}
	
?>