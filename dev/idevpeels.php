<?php

$control_panel_session = true;
include_once 'includes/control_panel.php';
if (isset($_SERVER['HTTP_REFERER'])) {
    $clickref = $_SERVER['HTTP_REFERER'];
} else {
    $clickref = null;
}

$id = check_type('id');
$tid1 = check_type('tid1');
$tid2 = check_type('tid2');
$tid3 = check_type('tid3');
$tid4 = check_type('tid4');
$page = check_type('page');
echo "\r\nvar esel = new Object();\r\n\r\n";
$peel = check_type('peel');
$get_peel = $db->prepare('select * from idevaff_peels where number = ?');
$get_peel->execute([$peel]);
if ($get_peel->rowCount()) {
    $peel_data = $get_peel->fetch();
    $group = $peel_data['grp'];
    $image75 = $base_url.'/media/pagepeels/'.$peel_data['image75'];
    $image500 = $base_url.'/media/pagepeels/'.$peel_data['image500'];
    if ($page) {
        $page = '&page='.$page;
    } else {
        $page = null;
    }

    $urltodeliver = $base_url.'/'.$filename.'.php?id='.$id.'&clickref='.$clickref.'&set=6&link='.$peel.$page.'&tid1='.$tid1.'&tid2='.$tid2.'&tid3='.$tid3.'&tid4='.$tid4;
}

$path_small = $base_url.'/templates/source/pagepeels/cornersmall.swf';
$path_big = $base_url.'/templates/source/pagepeels/cornerbig.swf';
echo "\r\nesel.ad_url = escape('";
echo $urltodeliver;
echo "');\r\n\r\nesel.small_path = '";
echo $path_small;
echo "';\r\nesel.small_image = escape('";
echo $image75;
echo "');\r\n\r\nesel.big_path = '";
echo $path_big;
echo "';\r\nesel.big_image = escape('";
echo $image500;
echo "');\r\n\r\n// Do not Change anything under this line-----------------------------------------------------------------------------------------\r\n\r\nesel.small_width = '100';\r\nesel.small_height = '100';\r\nesel.small_params = 'ico=' + esel.small_image;\r\nesel.big_width = '650';\r\nesel.big_height = '650';\r\nesel.big_params = 'big=' + esel.big_image + '&ad_url=' + esel.ad_url;\r\nfunction sizeup987(){\r\n\tdocument.getElementById('eselcornerBig').style.top = '0px';\r\n\tdocument.getElementById('eselcornerSmall').style.top = '-1000px';\r\n}\r\nfunction sizedown987(){\r\n\tdocument.getElementById(\"eselcornerSmall\").style.top = \"0px\";\r\n\tdocument.getElementById(\"eselcornerBig\").style.top = \"-1000px\";\r\n}\r\nesel.putObjects = function () {\r\ndocument.write('<div id=\"eselcornerSmall\" style=\"position:absolute;width:'+ esel.small_width +'px;height:'+ esel.small_height +'px;z-index:9999;right:0px;top:0px;\">');\r\ndocument.write('<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\"');\r\ndocument.write('codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0\"');\r\ndocument.write(' id=\"eselcornerSmallObject\" width=\"'+esel.small_width+'\" height=\"'+esel.small_height+'\">');\r\ndocument.write(' <param name=\"allowScriptAccess\" value=\"always\"/> ');\r\ndocument.write(' <param name=\"movie\" value=\"'+ esel.small_path +'?'+ esel.small_params +'\"/>');\r\ndocument.write(' <param name=\"wmode\" value=\"transparent\" />');\r\ndocument.write(' <param name=\"quality\" value=\"high\" /> ');\r\ndocument.write(' <param name=\"FlashVars\" value=\"'+esel.small_params+'\"/>');\r\ndocument.write('<embed src=\"'+ esel.small_path + '?' + esel.small_params +'\" name=\"eselcornerSmallObject\" wmode=\"transparent\" quality=\"high\" width=\"'+ esel.small_width +'\" height=\"'+ esel.small_height +'\" flashvars=\"'+ esel.small_params +'\" allowscriptaccess=\"always\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\"></embed>');\r\ndocument.write('</object></div></script>');\r\ndocument.write('<div id=\"eselcornerBig\" style=\"position:absolute;width:'+ esel.big_width +'px;height:'+ esel.big_height +'px;z-index:9999;right:0px;top:0px;\">');\r\ndocument.write('<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\"');\r\ndocument.write('codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0\"');\r\ndocument.write(' id=\"eselcornerBigObject\" width=\"'+ esel.big_width +'\" height=\"'+ esel.big_height +'\">');\r\ndocument.write(' <param name=\"allowScriptAccess\" value=\"always\"/> ');\r\ndocument.write(' <param name=\"movie\" value=\"'+ esel.big_path +'?'+ esel.big_params +'\"/>');\r\ndocument.write(' <param name=\"wmode\" value=\"transparent\"/>');\r\ndocument.write(' <param name=\"quality\" value=\"high\" /> ');\r\ndocument.write(' <param name=\"FlashVars\" value=\"'+ esel.big_params +'\"/>');\r\ndocument.write('<embed src=\"'+ esel.big_path + '?' + esel.big_params +'\" id=\"eselcornerBigEmbed\" name=\"eselcornerBigObject\" wmode=\"transparent\" quality=\"high\" width=\"'+ esel.big_width +'\" height=\"'+ esel.big_height +'\" flashvars=\"'+ esel.big_params +'\" swliveconnect=\"true\" allowscriptaccess=\"always\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\"></embed>');\r\ndocument.write('</object></div>');\r\nsetTimeout('document.getElementById(\"eselcornerBig\").style.top = \"-1000px\";',1000);\r\n}\r\nesel.putObjects();";

?>