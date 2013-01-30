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

//-------------------------# BB Code Support #----------------------------------------------
include(e_HANDLER."ren_help.php");
//------------------------------------------------------------------------------------------

if (isset($_POST['update']))
{ 
    $pref['expbar_maintext'] = $tp->toDB($_POST['expbar_maintext']);
    $pref['expbar_content'] = $tp->toDB($_POST['expbar_content']);

    save_prefs();

$consl_text .= "".AEXB_04."";

}

//--------------------------------------------------------------------

$consl_text .= "<form method='post' action='".e_SELF."' id='conslform'>
<table class='fborder' width='100%'><tr>";

$consl_text .= "
<tr>
<td style='width:50px' class='forumheader3'><b>".AEXB_09.":</b></td>
<td style='width:' class='forumheader3'><input class='tbox' type='text'  size='100' name='expbar_maintext' value='" . $pref['expbar_maintext'] . "' /></td>
</tr>
<tr>
<td style='width:' class='forumheader3'><b>".AEXB_10.":</b></td>
<td style='width:' class='forumheader3'><textarea class='tbox' name='expbar_content' rows='50' cols='75' style='width:95%' onselect='storeCaret(this);' onclick='storeCaret(this);' onkeyup='storeCaret(this);'>".$pref['expbar_content']."</textarea><br>";

$consl_text .= display_help('helpb', 'forum');

$consl_text .= "</td>
</tr>
";

$consl_text .= "</table><br><br>";

//------------------------------------------------------------------------------------
$consl_text .= "
<table class='fborder' width='100%'><tr>
<td colspan='2' class='fcaption' style='text-align: left;'><input type='submit' name='update' value='".AEXB_14."' class='button' />\n
</td>
</tr></table></form>";


$ns->tablerender("AACGC Expanding Bar(".AEXB_11.")", $consl_text);
require_once(e_ADMIN . "footer.php");

?>