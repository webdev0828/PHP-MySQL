<?php

$control_panel_session = true;
include_once 'includes/control_panel.php';
if (isset($_SERVER['HTTP_REFERER'])) {
    $clickref = $_SERVER['HTTP_REFERER'];
} else {
    $clickref = null;
}

$id = (int) (check_type('id'));
$tid1 = check_type('tid1');
$tid2 = check_type('tid2');
$tid3 = check_type('tid3');
$tid4 = check_type('tid4');
$page = check_type('page');
$peel = (int) (check_type('peel'));
if ($id && $peel) {
    $get_peel = $db->prepare('select * from idevaff_peels where number = ?');
    $get_peel->execute([$peel]);
    $peel_data = $get_peel->fetch();
    $group = $peel_data['grp'];
    $image500 = $base_url.'/media/pagepeels/'.$peel_data['image500'];
    if (isset($page)) {
        $page = '&page='.$page;
    } else {
        $page = null;
    }

    $urltodeliver = $base_url.'/'.$filename.'.php?id='.$id.'&clickref='.$clickref.'&set=6&link='.$peel.$page.'&tid1='.$tid1.'&tid2='.$tid2.'&tid3='.$tid3.'&tid4='.$tid4;
    echo "\r\n    \$(function() {\r\n      \$('body').peelback({\r\n        adImage  : '";
    echo $image500;
    echo "',\r\n        peelImage  : '";
    echo $base_url;
    echo "/templates/source/pagepeels/peel-image.png',\r\n        clickURL : '";
    echo $urltodeliver;
    echo "',\r\n        smallSize: 50,\r\n        bigSize: 500,\r\n        gaTrack  : true,\r\n        gaLabel  : '',\r\n        autoAnimate: true\r\n      });\r\n    });\r\n";
}

?>