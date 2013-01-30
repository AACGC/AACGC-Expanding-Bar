<?php

$onlineextended .= "<table style='width:100%' class=''><tr valign='top'>";

if($pref['expbar_login'] == "1")
{require(e_PLUGIN."aacgc_expbar/login.php");
$onlineextended .= "<td style='width:25%' class='".$contentclass."'>".$expbar_login."</td>";}

if(USER){
if($pref['expbar_pms'] == "1")
{require(e_PLUGIN."aacgc_expbar/private_messages.php");
$onlineextended .= "<td style='width:25%' class='".$contentclass."'>".$expbar_pms."</td>";}

if($pref['expbar_whosonline'] == "1")
{require(e_PLUGIN."aacgc_expbar/online.php");
$onlineextended .= "<td style='width:25%' class='".$contentclass."'><div style='height:150px; overflow:auto'>".$expbar_online."</div></td>";}

if($pref['expbar_lastseen'] == "1")
{require(e_PLUGIN."aacgc_expbar/lastseen.php");
$onlineextended .= "<td style='width:25%' class='".$contentclass."'><div style='height:150px; overflow:auto'>".$expbar_lastseen."</div></td>";}

$onlineextended .= "</tr><tr>";

if($pref['expbar_sitestats'] == "1")
{require(e_PLUGIN."aacgc_expbar/stats.php");
$onlineextended .= "<td style='width:25%' class='".$contentclass."' colspan='4'>".$expbar_stats."</td>";}
}
$onlineextended .= "</tr></table>";
	
?>