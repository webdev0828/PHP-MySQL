<?php
$query = $db->query("select count(*) as num_affs_pending from idevaff_affiliates where approved = '0'");
$aff_num_pending = $query->fetch();
$affcount_pending = $aff_num_pending['num_affs_pending'];
$query = $db->query("select count(*) as num_affs_approved from idevaff_affiliates where approved = '1'");
$aff_num_approved = $query->fetch();
$affcount_approved = $aff_num_approved['num_affs_approved'];
$query = $db->query('select count(*) as num_affs_declined from idevaff_deleted_accounts');
$aff_num_declined = $query->fetch();
$affcount_declined = $aff_num_declined['num_affs_declined'];
$query = $db->query("select count(*) as num_comms_approved from idevaff_sales where bonus != '1' and approved = '1' and tracking not like '%fictive%'");
$comm_num_approved = $query->fetch();
$commcount_approved = $comm_num_approved['num_comms_approved'];
$query = $db->query("select count(*) as num_comms_pending from idevaff_sales where bonus != '1' and approved = '0' and delay = '0' and tracking not like '%fictive%'");
$comm_num_pending = $query->fetch();
$commcount_pending = $comm_num_pending['num_comms_pending'];
$query = $db->query("select count(*) as num_comms_delayed from idevaff_sales where approved = '0' and delay > '0' and tracking not like '%fictive%'");
$comm_num_delayed = $query->fetch();
$commcount_delayed = $comm_num_delayed['num_comms_delayed'];
$query = $db->query("select count(*) as num_comms_declined from idevaff_deleted_sales where tracking not like '%fictive%'");
$comm_count_declined = $query->fetch();
$commcount_declined = $comm_count_declined['num_comms_declined'];
$query = $db->query('select count(*) as num_debs_pending from idevaff_debit');
$debs_num_pending = $query->fetch();
$debcount_pending = $debs_num_pending['num_debs_pending'];
$query = $db->query('select count(*) as num_debs_settled from idevaff_debit_archive');
$debs_num_settled = $query->fetch();
$debcount_settled = $debs_num_settled['num_debs_settled'];
$query = $db->query('select count(*) as num_affs from idevaff_affiliates');
$aff_num = $query->fetch();
$affcount = $aff_num['num_affs'];
$query = $db->query("select count(*) as num_comms from idevaff_sales where bonus != '1' and tracking not like '%fictive%'");
$comm_num = $query->fetch();
$commcount = $comm_num['num_comms'];
echo "\r\n<div id=\"sidebar\" class=\"sidebar-fixed\">\r\n<div id=\"sidebar-content\">\r\n\r\n";
if (defined('CLOUD')) {
    echo "<div style=\"margin-top:20px; text-align:center;\"><a href=\"setup.php?action=85\"><button class=\"btn btn-sm btn-blue-login\">Manage My Cloud Account</button></a></div>\r\n";
}

echo "\r\n";
if ('1' === $qsg_box) {
    echo "<div class=\"sidebar-widget align-center\" style=\"margin-right:18px; padding-bottom:5px; color:#FFFFFF; background:#144a9c; background-image:url('images/qsg_back.png'); border:#000000 solid 1px; min-height:102px; height:auto !important; height:102px;\">\r\n<div style=\"padding-top:7px;\">\r\n<span class=\"title\"><p style=\"margin-bottom:0px; font-weight:600; font-size:16px;\">Quick Setup Guide</p><span style=\"font-size:14px\">";
    echo $side_bar_progress_number;
    echo "% Complete</span></span>\r\n</div>\r\n<div class=\"progress progress-mini progress-striped active align-center\" style=\"padding:0px; width:80%;\">\r\n<span class=\"progress-bar progress-bar-";
    echo $side_bar_progress;
    echo '" style="padding:0px; width: ';
    echo $side_bar_progress_number;
    echo "%;\"></span>\r\n</div>\r\n<div style=\"padding:10px;\">\r\n<a href=\"help.php\"><button class=\"btn btn-xs btn-default\">Quick Setup Guide</button></a> \r\n</div>\r\n</div>\r\n";
} else {
    if ('1' === $video_sidebar) {
        echo "<div class=\"sidebar-widget align-center\" style=\"margin-right:18px; padding-bottom:10px; color:#FFFFFF; background:#144a9c; background-image:url('images/vid_back.png'); border:#000000 solid 1px; min-height:102px; height:auto !important; height:102px;\">\r\n<div style=\"padding-top:7px;\">\r\n<span class=\"title\"><p style=\"margin-bottom:0px; font-weight:600; font-size:16px;\">Affiliate Training Videos</p><p style=\"font-size:12px\">Status: \r\n";
        if ('50000' === $stamped_date || '60000' === $stamped_date || '100000' === $stamped_date || 0 < $days_available) {
            echo "Currently Active\r\n";
        } else {
            echo "Not Active\r\n";
        }

        echo "</p></span>\r\n</div>\r\n<div style=\"margin-top:5px\">\r\n<a href=\"setup.php?action=5\"><button class=\"btn btn-xs btn-default\">\r\n";
        if ('50000' === $stamped_date || '60000' === $stamped_date || '100000' === $stamped_date || 0 < $days_available) {
            echo "Manage Videos\r\n";
        } else {
            echo "Learn More\r\n";
        }

        echo "</button></a> \r\n</div>\r\n</div>\r\n";
    }
}

echo "\r\n<ul id=\"nav\">\r\n\r\n";
if ('on' === $staff_print_reports || isset($_SESSION[$install_directory_name.'_idev_AdminAccount'])) {
    echo '<li';
    if (isset($leftSubActiveMenu) && 'reports' === $leftSubActiveMenu) {
        echo ' class="open"';
    }

    echo ">\r\n<a href=\"javascript:void(0);\">\r\n<i class=\"icon-plus-sign-alt\"></i> Reports</a>\r\n<ul class=\"sub-menu\"";
    if (isset($leftSubActiveMenu) && 'reports' === $leftSubActiveMenu) {
        echo ' style="display:block;"';
    }

    echo ">\r\n<li><a href=\"search.php\"><i class=\"icon-angle-right\"></i> Search Commissions</a></li>\r\n<li><a href=\"reports.php?report=6\"><i class=\"icon-angle-right\"></i> Daily Report</a></li>\r\n<li><a href=\"reports.php?report=7\"><i class=\"icon-angle-right\"></i> Trends Report</a></li>\r\n<li><a href=\"reports.php?report=4\"><i class=\"icon-angle-right\"></i> Top Affiliates</a></li>\r\n<li><a href=\"reports.php?report=5\"><i class=\"icon-angle-right\"></i> Top Referring URLs</a></li>\r\n<li><a href=\"reports.php?report=1\"><i class=\"icon-angle-right\"></i> T&amp;C Report</a></li>\r\n<li><a href=\"reports.php?report=3\"><i class=\"icon-angle-right\"></i> Commissions</a></li>\r\n<li><a href=\"reports.php?report=8\"><i class=\"icon-angle-right\"></i> Marketing Statistics</a></li>\r\n</ul>\r\n</li>\r\n";
}

echo "\r\n<li";
if (isset($leftSubActiveMenu) && 'affiliates' === $leftSubActiveMenu) {
    echo ' class="open"';
}

echo ">\r\n<a href=\"javascript:void(0);\">\r\n<i class=\"icon-plus-sign-alt\"></i> Affiliates<span class=\"label label-primary pull-right\">";
echo number_format($affcount);
echo "</span></a>\r\n<ul class=\"sub-menu\"";
if (isset($leftSubActiveMenu) && 'affiliates' === $leftSubActiveMenu) {
    echo ' style="display:block;"';
}

echo ">\r\n<li><a href=\"accounts_approved.php\"><i class=\"icon-angle-right\"></i> Approved Accounts<span class=\"label label-success pull-right\">";
echo number_format($affcount_approved);
echo "</span></a></li>\r\n<li><a href=\"accounts_pending.php\"><i class=\"icon-angle-right\"></i> Pending Accounts<span class=\"label label-warning pull-right\">";
echo number_format($affcount_pending);
echo "</span></a></li>\r\n<li><a href=\"accounts_declined.php\"><i class=\"icon-angle-right\"></i> Declined Accounts<span class=\"label label-danger pull-right\">";
echo number_format($affcount_declined);
echo "</span></a></li>\r\n<li><a href=\"manage_tiers.php\"><i class=\"icon-angle-right\"></i> Tiers</a></li>\r\n<li><a href=\"notes.php\"><i class=\"icon-angle-right\"></i> Notes</a></li>\r\n<li><a href=\"email_affiliates.php\"><i class=\"icon-angle-right\"></i> Email</a></li>\r\n<li><a href=\"user_access.php\"><i class=\"icon-angle-right\"></i> User Access</a></li>\r\n<li><a href=\"logos.php\"><i class=\"icon-angle-right\"></i> Logos</a></li>\r\n<li><a href=\"testimonials.php\"><i class=\"icon-angle-right\"></i> Testimonials</a></li>\r\n</ul>\r\n</li>\r\n\r\n<li";
if (isset($leftSubActiveMenu) && 'commissions' === $leftSubActiveMenu) {
    echo ' class="open"';
}

echo ">\r\n<a href=\"javascript:void(0);\">\r\n<i class=\"icon-plus-sign-alt\"></i> Commissions<span class=\"label label-primary pull-right\">";
echo number_format($commcount);
echo "</span></a>\r\n<ul class=\"sub-menu\"";
if (isset($leftSubActiveMenu) && 'commissions' === $leftSubActiveMenu) {
    echo ' style="display:block;"';
}

echo ">\r\n<li><a href=\"commissions_pending.php\"><i class=\"icon-angle-right\"></i> Pending Approval<span class=\"label label-danger pull-right\">";
echo number_format($commcount_pending);
echo "</span></a></li>\r\n<li><a href=\"commissions_approved.php\"><i class=\"icon-angle-right\"></i> Currently Approved<span class=\"label label-success pull-right\">";
echo number_format($commcount_approved);
echo "</span></a></li>\r\n<li><a href=\"commissions_delayed.php\"><i class=\"icon-angle-right\"></i> Delayed<span class=\"label label-warning pull-right\">";
echo number_format($commcount_delayed);
echo "</span></a></li>\r\n<li><a href=\"commissions_declined.php\"><i class=\"icon-angle-right\"></i> Declined<span class=\"label label-default pull-right\">";
echo number_format($commcount_declined);
echo "</span></a></li>\r\n<li><a href=\"create_commission.php\"><i class=\"icon-angle-right\"></i> Add A Commission</a></li>\r\n</ul>\r\n</li>\r\n\r\n<li";
if (isset($leftSubActiveMenu) && 'debits' === $leftSubActiveMenu) {
    echo ' class="open"';
}

echo ">\r\n<a href=\"javascript:void(0);\">\r\n<i class=\"icon-plus-sign-alt\"></i> Debits</a>\r\n<ul class=\"sub-menu\"";
if (isset($leftSubActiveMenu) && 'debits' === $leftSubActiveMenu) {
    echo ' style="display:block;"';
}

echo ">\r\n<li><a href=\"debits.php\"><i class=\"icon-angle-right\"></i> Pending Debits<span class=\"label label-danger pull-right\">";
echo number_format($debcount_pending);
echo "</span></a></li>\r\n<li><a href=\"debits_settled.php\"><i class=\"icon-angle-right\"></i> Settled Debits<span class=\"label label-success pull-right\">";
echo number_format($debcount_settled);
echo "</span></a></li>\r\n<li><a href=\"add_debit.php\"><i class=\"icon-angle-right\"></i> Add A Debit</a></li>\r\n</ul>\r\n</li>\r\n\r\n<li><a href=\"traffic_logs.php\"><i class=\"icon-chevron-sign-right\"></i>Traffic Log</a></li>\r\n\r\n";
if ('on' === $staff_pay_affiliates || isset($_SESSION[$install_directory_name.'_idev_AdminAccount'])) {
    echo "<li><a href=\"payout_method.php\"><i class=\"icon-chevron-sign-right\"></i>Pay Affiliates</a></li>\r\n";
}

echo "\r\n";
if ('on' === $staff_marketing_materials || isset($_SESSION[$install_directory_name.'_idev_AdminAccount'])) {
    echo "<li><a href=\"groups.php\"><i class=\"icon-chevron-sign-right \"></i>Marketing Groups</a></li>\r\n\r\n<li";
    if (isset($leftSubActiveMenu) && 'marketing' === $leftSubActiveMenu) {
        echo ' class="open"';
    }

    echo ">\r\n<a href=\"javascript:void(0);\">\r\n<i class=\"icon-plus-sign-alt\"></i> Marketing Materials</a>\r\n<ul class=\"sub-menu\"";
    if (isset($leftSubActiveMenu) && 'marketing' === $leftSubActiveMenu) {
        echo ' style="display:block;"';
    }

    echo ">\r\n<li><a href=\"text_links.php\"><i class=\"icon-angle-right\"></i> SmartLinks / Direct Offers Links</a></li>\r\n<li><a href=\"html_templates.php\"><i class=\"icon-angle-right\"></i> PopUnders</a></li>\r\n<li><a href=\"email_templates.php\"><i class=\"icon-angle-right\"></i> BackOffer</a></li>\r\n<li><a href=\"banners.php\"><i class=\"icon-angle-right\"></i> Direct Offers Banners</a></li>\r\n<li><a href=\"social_media.php\"><i class=\"icon-angle-right\"></i> Social Media Campaigns</a></li>\r\n<li><a href=\"videos.php\"><i class=\"icon-angle-right\"></i> Videos</a></li>\r\n<li><a href=\"peels.php\"><i class=\"icon-angle-right\"></i> Page Peels</a></li>\r\n<li><a href=\"lightboxes.php\"><i class=\"icon-angle-right\"></i> Lightboxes</a></li>\r\n<li><a href=\"textads.php\"><i class=\"icon-angle-right\"></i> Text Ads</a></li>\r\n<li><a href=\"pdf_marketing.php\"><i class=\"icon-angle-right\"></i> PDF Documents</a></li>\r\n<li><a href=\"qr_codes.php\"><i class=\"icon-angle-right\"></i> QR Codes</a></li>\r\n</ul>\r\n</li>\r\n\r\n";
}

echo "\r\n<li";
if (isset($leftSubActiveMenu) && 'training' === $leftSubActiveMenu) {
    echo ' class="open"';
}

echo ">\r\n<a href=\"javascript:void(0);\">\r\n<i class=\"icon-plus-sign-alt\"></i> Training Materials</a>\r\n<ul class=\"sub-menu\"";
if (isset($leftSubActiveMenu) && 'training' === $leftSubActiveMenu) {
    echo ' style="display:block;"';
}

echo ">\r\n<li><a href=\"pdf_training.php\"><i class=\"icon-angle-right\"></i> PDF Documents</a></li>\r\n<li><a href=\"video_tutorials.php\"><i class=\"icon-angle-right\"></i> YouTube &amp; Vimeo Videos</a></li>\r\n</ul>\r\n</li>\r\n\r\n\r\n\r\n\r\n\r\n</ul>\r\n\r\n";
if ('1' === $video_sidebar && '1' === $qsg_box) {
    echo "<div class=\"sidebar-widget align-center\" style=\"margin-right:18px; padding-bottom:10px; color:#FFFFFF; background:#144a9c; background-image:url('images/vid_back.png'); border:#000000 solid 1px; min-height:102px; height:auto !important; height:102px;\">\r\n<div style=\"padding-top:7px;\">\r\n<span class=\"title\"><p style=\"margin-bottom:0px; font-weight:600; font-size:16px;\">Affiliate Training Videos</p><p style=\"font-size:12px\">Status: \r\n";
    if ('50000' === $stamped_date || '60000' === $stamped_date || '100000' === $stamped_date || 0 < $days_available) {
        echo "Currently Active\r\n";
    } else {
        echo "Not Active\r\n";
    }

    echo "</p></span>\r\n</div>\r\n<div style=\"margin-top:5px\">\r\n<a href=\"setup.php?action=5\"><button class=\"btn btn-xs btn-default\">\r\n";
    if ('50000' === $stamped_date || '60000' === $stamped_date || '100000' === $stamped_date || 0 < $days_available) {
        echo "Manage Videos\r\n";
    } else {
        echo "Learn More\r\n";
    }

    echo "</button></a> \r\n</div>\r\n</div>\r\n";
}

echo "\r\n";
$query = $db->query("SHOW COLUMNS from idevaff_config LIKE 'admin_theme'");
if ($query->rowCount()) {
    echo "  \r\n<div class=\"sidebar-widget align-center\">\r\n<div class=\"btn-group\">\r\n<a href=\"";
    echo html_output($_SERVER['PHP_SELF']);
    echo "?admin_theme=light\" class=\"btn btn-sm btn-default\"><i class=\"icon-sun\"></i> Light</a>\r\n<a href=\"";
    echo html_output($_SERVER['PHP_SELF']);
    echo "?admin_theme=dark\" class=\"btn btn-sm btn-default\"><i class=\"icon-moon\"></i> Dark</a>\r\n</div>\r\n</div>\r\n";
}

echo "\t\t\t\t\r\n<div class=\"sidebar-widget align-center ";
echo $theme_added;
echo "\">\r\n<div style=\"padding-top:8px;\"><span class=\"title\"><p style=\"margin-bottom:0px; font-size:14px\"><a href=\"https://www.idevdirect.com/\" target=\"_blank\">Affiliate Software</a></p></span></div>\r\n<div style=\"padding-top:0px;\">Version ";
echo $version;
echo "</div>\r\n<div style=\"padding-top:7px;\">Copyright &copy; 1999-";
echo date('Y');
echo "<br />iDevAffiliate Inc.</div>\r\n</div>\r\n\r\n</div>\r\n<div id=\"divider\"></div>\r\n</div>\r\n\r\n\r\n<div id=\"content\">\r\n<div class=\"container crumbFix\">";

?>