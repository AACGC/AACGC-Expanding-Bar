<?php
if(USER){

	if (((MEMBERS_ONLINE + GUESTS_ONLINE) > ($menu_pref['most_members_online'] + $menu_pref['most_guests_online'])) && (count($menu_pref) > 3))
	{
		global $sysprefs;
		$menu_pref['most_members_online'] = MEMBERS_ONLINE;
		$menu_pref['most_guests_online'] = GUESTS_ONLINE;
		$menu_pref['most_online_datestamp'] = time();
		$sysprefs->setArray('menu_pref');
	}

    global $gen;
	if (!is_object($gen)) 
	{$gen = new convert;}

	$datestamp = $gen->convert_date($menu_pref['most_online_datestamp'], "long");

	$expbar_stats .= "Most ever Online:".($menu_pref['most_members_online'] + $menu_pref['most_guests_online'])." (Members:".$menu_pref['most_members_online'].", Guests:".$menu_pref['most_guests_online'].") on ".$datestamp."";

 	$total_members = $sql->db_Count("user","(*)","where user_ban = 0");
	if ($total_members > 1) {
		$newest_member = $sql->db_Select("user", "user_id, user_name", "user_ban = 0 ORDER BY user_join DESC LIMIT 1");
		$row = $sql->db_Fetch();
		extract($row);
		$expbar_stats .= " ".FBAR_10.": ".$total_members." ".FBAR_11.": <a href='".e_BASE."user.php?id.".$user_id."'>".$user_name."</a>";
	}

}
?>