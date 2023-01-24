<?php
/**
 * @package pagecount
 * @version 1.20
 * @author Dmitri Beliavski
 * @copyright Copyright (c) seditio.by 2017-2023
 */

defined('COT_CODE') or die('Wrong URL');

function cot_pagecount ($condition = '', $mode = '', $cats = '', $subs = true, $decl = 'pages') {
	global $db, $db_pages, $Ls;
  require_once cot_langfile('page', 'module');
  require_once cot_incfile('pagelist', 'plug');

  $where_cat = cot_compilecats($mode, $cats, (bool)$subs);
	$condition = (empty($condition)) ? '' : 'AND '.$condition;

	$totalitems = $db->query("
		SELECT COUNT(*)
		FROM $db_pages
		WHERE page_state='0' $where_cat $condition
	")->fetchColumn();
  
	$totalitems = (empty($decl)) ? $totalitems : cot_declension($totalitems, $Ls[$decl]);

	return $totalitems;
}
