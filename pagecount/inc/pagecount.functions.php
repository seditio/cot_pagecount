<?php
/**
 * @package pagecount
 * @version 1.21
 * @author Dmitri Beliavski
 * @copyright Copyright (c) seditio.by 2017-2023
 */

defined('COT_CODE') or die('Wrong URL');

function sedby_pagecount($extra = '', $mode = '', $cats = '', $subs = true, $decl = 'pages') {
  require_once cot_langfile('page', 'module');
  require_once cot_incfile('cotlib', 'plug');

  $sql_cats = (empty($mode)) ? "" : sedby_compilecats($mode, $cats, (bool)$subs);
	$sql_extra = (empty($extra)) ? "" : $extra;

  $sql_cond = sedby_build_where(array($sql_cats, $sql_extra));

	$db_pages = Cot::$db->pages;
	$totalitems = Cot::$db->query("SELECT COUNT(*) FROM $db_pages $sql_cond")->fetchColumn();

	$totalitems = (empty($decl)) ? $totalitems : cot_declension($totalitems, $decl);

	return $totalitems;
}
