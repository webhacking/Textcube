<?php 
updateVisitorStatistics($owner);
$stats = getStatistics($owner);
if (!empty($entries) && (count($entries) == 1))
	$pageTitle = $entries[0]['title'];
else
	$pageTitle = '';
$skin = new Skin($skinSetting['skin']);
$view = str_replace('[##_t3_##]', getUpperView(isset($paging) ? $paging : null) . $skin->skin . getLowerView() . getScriptsOnFoot(), $skin->outter);

if ($suri['directive'] == '/') {
	dress('body_id',"tt-body-page",$view);
} else if (!empty($category)) {
	dress('body_id',getCategoryBodyIdById($owner,$category) ? getCategoryBodyIdById($owner,$category) : 'tt-body-category',$view);
} else if (!empty($search)) {
	dress('body_id',"tt-body-search",$view);
} else if (!empty($period)) {
	dress('body_id',"tt-body-archive",$view);
//} else if (isset($list)) {
//	dress('body_id',$suri['value'],$view);
} else {
	dress('body_id',"tt-body-".ltrim($suri['directive'],'/'),$view);
}
?>
