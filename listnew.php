<?php

global $sysprefs, $tp, $eArrayStorage, $list_pref, $rc;
$listplugindir = e_PLUGIN . "list_new/";
unset($contenttext);
require_once($listplugindir."list_shortcodes.php");

// get language file
include_lan($listplugindir . "languages/" . e_LANGUAGE . ".php");

if (!is_object($rc))
{
    require_once($listplugindir . "list_class.php");
    $rc = new listclass;
}

if(!isset($list_pref))
{
	$list_pref = $rc->getListPrefs();
}

$mode = "new_menu";
$sections = $rc->prepareSection($mode);
$arr = $rc->prepareSectionArray($mode, $sections);
// display the sections
$$contenttext .= "";
for($i = 0;$i < count($arr);$i++)
{
    if ($arr[$i][1] == "1")
    {
        $sectiontext = $rc->show_section_list($arr[$i], $mode);
        if ($sectiontext != "")
        {
            $contenttext .= $sectiontext;
        }
    }
}


$listnewcontent = $tp->toHtml($contenttext, TRUE, 'USER_BODY');
	
?>