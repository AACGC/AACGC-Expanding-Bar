<?php

/*
#######################################
#     e107 website system plguin      #
#     AACGC Expanding Bar             #    
#     by M@CH!N3                      #
#     http://www.AACGC.com            #
#######################################
*/

require_once("../../class2.php");
if (!getperms("P"))
{
    header("location:" . e_HTTP . "index.php");
    exit;
} 
require_once(e_ADMIN . "auth.php");
require_once(e_HANDLER . "userclass_class.php");
include_lan(e_PLUGIN."aacgc_expbar/languages/".e_LANGUAGE.".php");

if (isset($_POST['update']))
{ 
    $pref['expbar_barclass'] = $_POST['expbar_barclass'];
    $pref['expbar_contentclass'] = $_POST['expbar_contentclass'];
    $pref['expbar_contentheight'] = $_POST['expbar_contentheight'];
    $pref['expbar_location'] = $_POST['expbar_location'];
    $pref['expbar_width'] = $_POST['expbar_width'];
    $pref['expbar_leftside'] = $_POST['expbar_leftside'];

if (isset($_POST['expbar_listnew'])) 
{$pref['expbar_listnew'] = 1;}
else
{$pref['expbar_listnew'] = 0;}

if (isset($_POST['expbar_login'])) 
{$pref['expbar_login'] = 1;}
else
{$pref['expbar_login'] = 0;}

if (isset($_POST['expbar_pms'])) 
{$pref['expbar_pms'] = 1;}
else
{$pref['expbar_pms'] = 0;}

if (isset($_POST['expbar_whosonline'])) 
{$pref['expbar_whosonline'] = 1;}
else
{$pref['expbar_whosonline'] = 0;}

if (isset($_POST['expbar_lastseen'])) 
{$pref['expbar_lastseen'] = 1;}
else
{$pref['expbar_lastseen'] = 0;}

if (isset($_POST['expbar_sitestats'])) 
{$pref['expbar_sitestats'] = 1;}
else
{$pref['expbar_sitestats'] = 0;}

if (isset($_POST['expbar_enable_goldorbs'])) 
{$pref['expbar_enable_goldorbs'] = 1;}
else
{$pref['expbar_enable_goldorbs'] = 0;}


    save_prefs();

$consl_text .= "".AEXB_04."";

}

//--------------------------------------------------------------------

$consl_text .= "<form method='post' action='".e_SELF."' id='conslform'>
<table class='fborder' width='100%'>
<tr>
<td style='width:30%' class='forumheader3' colspan=2><b>".AEXB_05."</b></td>
</tr>
<tr>
<td style='width:30%' class='forumheader3'><b>".AEXB_06.":</b><br><i>".AEXB_12."</i></td>
<td style='width:70%' class='forumheader3'><input class='tbox' type='text'  size='50' name='expbar_barclass' value='" . $pref['expbar_barclass'] . "' /></td>
</tr>
<tr>
<td style='width:30%' class='forumheader3'><b>".AEXB_07.":</b><br><i>".AEXB_12."</i></td>
<td style='width:70%' class='forumheader3'><input class='tbox' type='text'  size='50' name='expbar_contentclass' value='" . $pref['expbar_contentclass'] . "' /></td>
</tr>
<tr>
<td style='width:30%' class='forumheader3'>".AEXB_18.":</td>
<td style='width:70%' class='forumheader3'>
<select name='expbar_location' size='1' class='tbox' style='width:50%'>
<option name='expbar_location' value='".$pref['expbar_location']."'>".$pref['expbar_location']."</option>
<option name='expbar_location' value='top'>".AEXB_19."</option>
<option name='expbar_location' value='bottom'>".AEXB_20."</option>
</td>
</tr>
<tr>
<td style='width:30%' class='forumheader3'><b>".AEXB_21.":</b></td>
<td style='width:70%' class='forumheader3'><input class='tbox' type='text'  size='10' name='expbar_width' value='" . $pref['expbar_width'] . "' /></td>
</tr>
<tr>
<td style='width:30%' class='forumheader3'><b>".AEXB_08.":</b><br><i>".AEXB_13."</i></td>
<td style='width:70%' class='forumheader3'><input class='tbox' type='text'  size='10' name='expbar_contentheight' value='" . $pref['expbar_contentheight'] . "' />px</td>
</tr>
<tr>
<td style='width:30%' class='forumheader3'><b>".AEXB_22.":</b></td>
<td style='width:70%' class='forumheader3'><input class='tbox' type='text'  size='10' name='expbar_leftside' value='" . $pref['expbar_leftside'] . "' /></td>
</tr>
<tr>
<td style='width:30%' class='forumheader3'><b>".AEXB_15.":</b></td>
<td colspan=2 class='forumheader3'>".($pref['expbar_listnew'] == 1 ? "<input type='checkbox' name='expbar_listnew' value='1' checked='checked' />" : "<input type='checkbox' name='expbar_listnew' value='0' />")." (".AEXB_16.")</td>
</tr>


<tr>
<td style='width:30%' class='forumheader3'>".AFBAR_14.":</td>
<td colspan=2 class='forumheader3'>".($pref['expbar_login'] == 1 ? "<input type='checkbox' name='expbar_login' value='1' checked='checked' />" : "<input type='checkbox' name='expbar_login' value='0' />")."</td>
</tr>
<tr>
<td style='width:30%' class='forumheader3'>".AFBAR_18.":</td>
<td colspan=2 class='forumheader3'>".($pref['expbar_pms'] == 1 ? "<input type='checkbox' name='expbar_pms' value='1' checked='checked' />" : "<input type='checkbox' name='expbar_pms' value='0' />")."</td>
</tr>
<tr>
<td style='width:30%' class='forumheader3'>".AFBAR_15.":</td>
<td colspan=2 class='forumheader3'>".($pref['expbar_whosonline'] == 1 ? "<input type='checkbox' name='expbar_whosonline' value='1' checked='checked' />" : "<input type='checkbox' name='expbar_whosonline' value='0' />")."</td>
</tr>
<tr>
<td style='width:30%' class='forumheader3'>".AFBAR_16.":</td>
<td colspan=2 class='forumheader3'>".($pref['expbar_lastseen'] == 1 ? "<input type='checkbox' name='expbar_lastseen' value='1' checked='checked' />" : "<input type='checkbox' name='expbar_lastseen' value='0' />")."</td>
</tr>
<tr>
<td style='width:30%' class='forumheader3'>".AFBAR_19.":</td>
<td colspan=2 class='forumheader3'>".($pref['expbar_sitestats'] == 1 ? "<input type='checkbox' name='expbar_sitestats' value='1' checked='checked' />" : "<input type='checkbox' name='expbar_sitestats' value='0' />")."</td>
</tr>
<tr>
<td style='width:30%' class='forumheader3'>".AFBAR_17.":</td>
<td colspan=2 class='forumheader3'>".($pref['expbar_enable_goldorbs'] == 1 ? "<input type='checkbox' name='expbar_enable_goldorbs' value='1' checked='checked' />" : "<input type='checkbox' name='expbar_enable_goldorbs' value='0' />")."</td>
</tr>



</table><br/><br/>";

//------------------------------------------------------------------------------------
$consl_text .= "
<table class='fborder' width='100%'><tr>
<td colspan='2' class='fcaption' style='text-align: left;'><input type='submit' name='update' value='".AEXB_14."' class='button' />\n
</td>
</tr></table></form>";


$ns->tablerender("AACGC Expanding Bar(".AEXB_11.")", $consl_text);
require_once(e_ADMIN . "footer.php");

?>