<?php

/*
#######################################
#     e107 website system plguin      #
#     AACGC Expanding Bar             #    
#     by M@CH!N3                      #
#     http://www.AACGC.com            #
#######################################
*/

global $tp,$list_pref;

$open = "".e_PLUGIN."aacgc_expbar/images/open.png";
$close = "".e_PLUGIN."aacgc_expbar/images/close.png";

$barclass = $pref['expbar_barclass'];
$bartext = $tp -> toHTML($pref['expbar_maintext'], TRUE);
$contentclass = $pref['expbar_contentclass'];
$contentheight = $pref['expbar_contentheight'];

if ($pref['expbar_enable_goldorbs'] == "1")
{$gold_obj = new gold();}

//----------# Online Extended Section #-----------------------+
require(e_PLUGIN."aacgc_expbar/onlineextended.php");

//----------# List New #--------------------------------------+
if($pref['expbar_listnew'] == "1")
{require(e_PLUGIN."aacgc_expbar/listnew.php");}

//----------# Bar Content #-----------------------------------+
$contenttext = $tp -> toHTML($pref['expbar_content'], TRUE);


//---------------------------------------------------------------------------------------------------+

if($pref['expbar_location'] == "top"){
	
$expbar_text .= "<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js'></script>
<script src='".e_PLUGIN."aacgc_expbar/expstickybartop.js'></script>";	
		
$expbar_text .= "
<div id='expstickybar' class='expstickybar' style='position:fixed; background:#000000; left:".$pref['expbar_leftside']."; visibility:hidden; z-index:10000; width:".$pref['expbar_width'].";'>
	<div class='".$contentclass."' style='height:".$contentheight."px; overflow:auto'>".$onlineextended."".$listnewcontent."".$contenttext."</div>
	<a href='#togglebar'><img src='".$open."' data-closeimage='".$close."' data-openimage='".$open."' style='float:right;' /></a>
	<div class='".$barclass."' style='padding-bottom:3px'><b>".$bartext."</b></div>
</div>
";}

if($pref['expbar_location'] == "bottom"){
	
$expbar_text .= "<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js'></script>
<script src='".e_PLUGIN."aacgc_expbar/expstickybarbottom.js'></script>";	
		
$expbar_text .= "
<div id='expstickybar' class='expstickybar' style='position:fixed; background:#000000; left:".$pref['expbar_leftside']."; visibility:hidden; z-index:10000; width:".$pref['expbar_width'].";'>
	<a href='#togglebar'><img src='".$open."' data-closeimage='".$close."' data-openimage='".$open."' style='float:right;' /></a>
	<div class='".$barclass."' style='padding-top:3px'><b>".$bartext."</b></div>
	<div class='".$contentclass."' style='height:".$contentheight."px; overflow:auto'>".$onlineextended."".$listnewcontent."".$contenttext."</div>
</div>
";}

//---------------------------------------------------------------------------------------------------+

print $expbar_text;


?>