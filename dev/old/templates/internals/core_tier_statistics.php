<?php
// TODO: add earnings for current period and total earnings per affiliate.
include_once('includes/session.check_affiliates.php');


function get_core_tier_tree($parent_id = 0, & $categories) {
    global $db, $second_contact;

    $query = "SELECT ti.child, aff.username, aff.url, aff.email FROM `idevaff_tiers`
              as ti, idevaff_affiliates as aff WHERE ti.parent = ? and aff.id = ti.child and aff.approved = '1'";

    $st = $db->prepare($query);

    $st->execute( array($parent_id) );

    if ( $st->rowCount() ) {
        $result = $st->fetchAll();
        foreach ($result as $mainCategory) {

            $temail = $mainCategory['email'];
            $tieruser = $mainCategory['username'];

            $category = array();
            $category['id'] = 'aff_' . $mainCategory['child'];
            $category['parent'] = 'aff_' . $parent_id;
            $category['icon'] = 'fa fa-child';
            $category['state'] = array('opened' => true );



            if ($second_contact == 1) {
                $category['text'] = '<a href="mailto:'.$temail.'">'.$tieruser.'</a>';
            } else {
                $category['text'] = $tieruser;
            }

            $categories[] = $category;

            get_core_tier_tree($mainCategory['child'], $categories);

        }
    }
}

$tier_tree_data = array();

//get parent data
$query = "SELECT aff.username, aff.url, aff.email FROM idevaff_affiliates as aff
          WHERE aff.id = ? and aff.approved = '1'";

$st = $db->prepare($query);
$st->execute(array($_SESSION[$install_directory_name.'_idev_LoggedID']));

if ( $st->rowCount() ) {
    $mainCategory = $st->fetch();
    $temail = $mainCategory['email'];
    $tieruser = $mainCategory['username'];

    $category = array();
    $category['id'] = 'aff_' . $_SESSION[$install_directory_name.'_idev_LoggedID'];
    $category['parent'] = '#';
    $category['icon'] = 'fa fa-users';
    $category['state'] = array('opened' => true );

    if ($second_contact == 1) {
        $category['text'] = '<a href="mailto:'.$temail.'">'.$tieruser.'</a>';
    } else {
        $category['text'] = $tieruser;
    }

    $tier_tree_data[] = $category;

    get_core_tier_tree( $_SESSION[$install_directory_name.'_idev_LoggedID'], $tier_tree_data );
}



if ( !empty($tier_tree_data) ) {
    $smarty->assign('tier_tree_data', json_encode($tier_tree_data));
} else {
    $smarty->assign('tier_tree_data_empty', '');
}



