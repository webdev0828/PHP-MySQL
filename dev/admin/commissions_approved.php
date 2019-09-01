<?php

include_once "../API/config.php";
include_once "includes/session.check.php";
if (isset($_REQUEST["unapprove"]) && 0 < $_REQUEST["unapprove"]) {
    $extra_warning = 0;
    $sales_row = $_REQUEST["unapprove"];
    $comm_details = $db->prepare("select id, code, payment, top_tier_tag, override from idevaff_sales where record = ? and tracking not like '%fictive%'");
    $comm_details->execute(array($sales_row));
    $qry = $comm_details->fetch();
    $top_tier_tag = $qry["top_tier_tag"];
    $override = $qry["override"];
    if ($top_tier_tag == 0) {
        $top_tier_tag = NULL;
    }
    $tdetails = $db->prepare("select id, code, payment, rec_id from idevaff_sales where rec_id = ? and tracking not like '%fictive%'");
    $tdetails->execute(array($sales_row));
    $tqry = $tdetails->fetch();
    $trec_id = $tqry["rec_id"];
    if (0 < $trec_id) {
        $tier_attached = 1;
    } else {
        $tier_attached = NULL;
    }
    if (!$top_tier_tag && !$tier_attached) {
        if ($affiliate_notify_unapproved == 1) {
            $sendid = $qry["id"];
            $ctype = 1;
            $camt = $qry["payment"];
            $date = date($dateformat, $qry["code"]);
            include $path . "/templates/email/affiliate.unapprove.php";
        }
        $st = $db->prepare("update idevaff_sales set approved = '0' where record = ?");
        $st->execute(array($sales_row));
        $success_message = "<strong>Success!</strong> Commission has been un-approved and sent to the <a href=\"commissions_pending.php\">Pending Approval</a> list.";
    }
    if ($top_tier_tag || $override) {
        if ($affiliate_notify_unapproved == 1) {
            $sendid = $qry["id"];
            $ctype = 2;
            $camt = $qry["payment"];
            $date = date($dateformat, $qry["code"]);
            include $path . "/templates/email/affiliate.unapprove.php";
        }
        $st = $db->prepare("delete from idevaff_sales where record = ?");
        $st->execute(array($sales_row));
        $success_message = "<strong>Success!</strong> This commission was a tier or override commission and can not be un-approved independent of the main commission. Instead it has been removed.";
    }
    if (!$top_tier_tag && $tier_attached) {
        if ($affiliate_notify_unapproved == 1) {
            $sendid = $qry["id"];
            $ctype = 1;
            $camt = $qry["payment"];
            $date = date($dateformat, $qry["code"]);
            include $path . "/templates/email/affiliate.unapprove.php";
            $sendid = $tqry["id"];
            $ctype = 2;
            $camt = $tqry["payment"];
            $date = date($dateformat, $tqry["code"]);
            include $path . "/templates/email/affiliate.unapprove.php";
        }
        $st = $db->prepare("update idevaff_sales set approved = '0' where record = ?");
        $st->execute(array($sales_row));
        $st = $db->prepare("delete from idevaff_sales where rec_id = ?");
        $st->execute(array($sales_row));
        $success_message = "<strong>Success!</strong> The commission has been un-approved and sent to the <a href=\"commissions_pending.php\">Pending Approval</a> list.";
        $warning_message = "<strong>Important!</strong> The commission you un-approved had tier or override commissions attached which have been removed as well.";
    }
}
$leftSubActiveMenu = "commissions";
include "templates/header.php";
if ($toggle_bonus_display == "1") {
    $whereCond = " WHERE idevaff_sales.approved = '1' and idevaff_sales.delay = '0' and tracking not like '%fictive%'";
} else {
    $whereCond = " WHERE idevaff_sales.approved = '1' and idevaff_sales.delay = '0' and idevaff_sales.bonus = '0' and tracking not like '%fictive%'";
}
$commissions_approved = $db->query("SELECT COUNT(*) FROM idevaff_sales " . $whereCond);
echo "<div class=\"crumbs\">\r\n<ul id=\"breadcrumbs\" class=\"breadcrumb\">\r\n<li><i class=\"icon-home\"></i> <a href=\"dashboard.php\">Dashboard</a></li>\r\n<li> Commissions</li>\r\n<li class=\"current\"> <a href=\"commissions_approved.php\">Commissions Currently Approved</a></li>\r\n</ul>\r\n";
include "templates/crumb_right.php";
echo "</div>\r\n\r\n<div class=\"page-header\">\r\n<div class=\"page-title\"><h3>Commissions Currently Approved</h3><span>Commissions that are currently approved and are pending payment.</span></div>\r\n";
include "templates/stats.php";
echo "</div>\r\n\r\n";
include "includes/notifications.php";
echo "\r\n\r\n<div class=\"widget box\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-money\"></i> Commissions Currently Approved</h4><span class=\"pull-right\">\r\n";
if ($toggle_bonus_display == 1) {
    echo "<a href=\"commissions_approved.php?toggle=0&cfg_special=true\"><button class=\"btn btn-sm btn-danger\">Hide Signup Bonuses</button></a>\r\n";
} else {
    echo "<a href=\"commissions_approved.php?toggle=1&cfg_special=true\"><button class=\"btn btn-sm btn-warning\">Show Signup Bonuses</button></a>\r\n";
}
echo "</span></div>\r\n<div class=\"widget-content\">\r\n\r\n";
if ($commissions_approved->fetchColumn()) {
    echo "\r\n<table class=\"table table-striped table-bordered table-highlight-head valign\" id=\"dyntable_commissions_approved\">\r\n<thead>\r\n<tr>\r\n<th>Affiliate ID</th>\r\n<th>Username</th>\r\n<th>Date</th>\r\n<th>Time</th>\r\n<th>Commission Amount</th>\r\n<th>Type</th>\r\n<th>Order Number</th>\r\n<th width=\"150\">Action</th>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n</tbody>\r\n</table>\r\n";
} else {
    echo "No currently approved commissions.\r\n";
}
echo "</div>\r\n</div>\r\n\r\n\r\n";
include "templates/footer.php";

?>