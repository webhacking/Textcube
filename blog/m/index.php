<?
define('__TATTERTOOLS_MOBILE__', true);
define('ROOT', '../..');
require ROOT . '/lib/include.php';
list($entry, $paging) = getEntriesWithPaging($owner, 1, 1);
if(empty($entry))
	printMobileErrorPage(_t('페이지 오류'), _t('글이 하나도 없습니다.'), $blogURL);
else
	header("Location: $blogURL/{$entry[0]['id']}");
?>