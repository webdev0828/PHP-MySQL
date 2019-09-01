<?php
/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 * @ Release on : 24.03.2018
 * @ Website    : http://EasyToYou.eu
 */

$isApi = false;
if (isset($isAuthorized)) {
    $isApi = true;
}
if (!$isApi) {
    include_once "../../API/config.php";
    include_once "../includes/session.check.php";
}
$paramRowPerPage = isset($_REQUEST["iDisplayLength"]) ? $_REQUEST["iDisplayLength"] : 10;
$paramEcho = isset($_REQUEST["sEcho"]) ? $_REQUEST["sEcho"] : 1;
$paramStart = isset($_REQUEST["iDisplayStart"]) ? $_REQUEST["iDisplayStart"] : 0;
$paramSearch = isset($_REQUEST["sSearch"]) ? trim($_REQUEST["sSearch"]) : "";
$paramSort = isset($_REQUEST["iSortCol_0"]) ? trim($_REQUEST["iSortCol_0"]) : "";
$paramSortDir = isset($_REQUEST["sSortDir_0"]) ? strtolower(trim($_REQUEST["sSortDir_0"])) : "";
if (!is_numeric($paramRowPerPage)) {
    $paramRowPerPage = 10;
}
if (!is_numeric($paramStart)) {
    $paramStart = 0;
}
$aColumns = array("idevaff_sales.id", "idevaff_affiliates.username", "idevaff_sales.code", "idevaff_sales.code", "idevaff_sales.payment", "idevaff_sales.record", "idevaff_sales.tracking", "idevaff_sales.top_tier_tag", "idevaff_sales.bonus", "idevaff_sales.override", "idevaff_sales.currency", "idevaff_sales.ip");
$sLimit = sprintf(" LIMIT %d, %d ", $paramStart, $paramRowPerPage);
if (isset($_REQUEST["iSortCol_0"])) {
    $sOrder = " ORDER BY  ";
    for ($i = 0; $i < intval($_REQUEST["iSortingCols"]); $i++) {
        if ($_REQUEST["bSortable_" . intval($_REQUEST["iSortCol_" . $i])] == "true") {
            $sOrder .= "" . $aColumns[intval($_REQUEST["iSortCol_" . $i])] . " " . ($_REQUEST["sSortDir_" . $i] === "asc" ? "asc" : "desc") . ", ";
        }
    }
    $sOrder = substr_replace($sOrder, "", -2);
    if ($sOrder == " ORDER BY") {
        $sOrder = "";
    }
}
$sSearch = "";
if ($paramSearch != "") {
    $orWhereCondList = array();
    foreach ($aColumns as $column) {
        $orWhereCondList[] = sprintf(" %s LIKE '%%%s%%' ", $column, $paramSearch);
    }
    $sSearch = implode(" OR ", $orWhereCondList);
    $sSearch = "(" . $sSearch . ")";
}
$query = sprintf("SELECT %s FROM idevaff_sales LEFT JOIN idevaff_affiliates ON idevaff_affiliates.id = idevaff_sales.id ", implode(",", $aColumns));
if ($toggle_bonus_display == "1") {
    $whereCond = " WHERE idevaff_sales.approved = \"1\" and idevaff_sales.delay = \"0\" and tracking not like '%fictive%'";
} else {
    $whereCond = " WHERE idevaff_sales.approved = \"1\" and idevaff_sales.delay = \"0\" and idevaff_sales.bonus = \"0\" and tracking not like '%fictive%'";
}
if ($isApi && isset($_REQUEST["id"]) && is_numeric($_REQUEST["id"])) {
    $acc_id = $_REQUEST["id"];
    $whereCond .= " AND idevaff_sales.id=" . $acc_id . " ";
}
if ($sSearch != "") {
    $whereCond .= " AND " . $sSearch;
}
$query .= $whereCond . $sOrder . $sLimit;
$result = $db->query($query);
$accountList = array();
if ($result) {
    while ($row = $result->fetch()) {
        $accountList[] = $row;
    }
}
$query = sprintf("SELECT COUNT(*) as c FROM idevaff_sales LEFT JOIN idevaff_affiliates ON idevaff_affiliates.id = idevaff_sales.id ", implode(",", $aColumns));
$query .= $whereCond;
$rResultTotal = $db->query($query);
$totalCountObj = $rResultTotal->fetch();
$totalCount = $totalCountObj["c"];
$output = array();
$output["sEcho"] = intval($paramEcho);
$output["iTotalRecords"] = $totalCount;
$output["iTotalDisplayRecords"] = $totalCount;
$output["aaData"] = array();
if (0 < $totalCount) {
    foreach ($accountList as $data) {
        $listpay = number_format($data["payment"], $decimal_symbols);
        $listpay2 = $listpay;
        if ($cur_sym_location == 1) {
            $listpay = $cur_sym . $listpay;
        }
        if ($cur_sym_location == 2) {
            $listpay = $listpay . " " . $cur_sym;
        }
        $listpay = $listpay . " " . $currency;
        if ($data["currency"] != "" && strtoupper($data["currency"]) != strtoupper($currency)) {
            $listpay = $listpay . "<font color='#CC0000'> | " . $data["currency"] . "</font>";
        }
        if ($data["bonus"] == 1) {
            $listtype = "Signup Bonus";
        } else {
            if ($data["bonus"] == 2) {
                $listtype = "Recruitment Bonus";
            } else {
                if ($data["top_tier_tag"] == 1) {
                    $listtype = "Tier";
                } else {
                    if ($data["override"] == 1) {
                        $listtype = "Override";
                    } else {
                        if ($data["top_tier_tag"] == 0) {
                            $listtype = "Standard";
                        }
                    }
                }
            }
        }
        if ($data["tracking"] != "") {
            $liston = $data["tracking"];
        } else {
            $liston = "N/A";
        }
        $unapprove_form = "<form action=\"commissions_approved.php\" method=\"post\">\r\n                                <input type=\"hidden\" name=\"remove_special\" value=\"" . $data["record"] . "\">\r\n                                <input type=\"hidden\" name=\"csrf_token\" value=\"" . $_SESSION["csrf_token"] . "\">\r\n                                <button type=\"submit\" class=\"btn btn-default btn-sm\">Un-Approve Commission</button>\r\n                            </form>";
        $tmpData = array();
        if ($isApi) {
            $tmpData["id"] = $data["id"];
            $tmpData["username"] = $data["username"];
            $tmpData["date"] = date($dateformat, $data["code"]);
            $tmpData["time"] = date($timeformat, $data["code"]);
            $tmpData["commission_amount"] = $listpay2;
            $tmpData["commission_type"] = $listtype;
            $tmpData["order_number"] = $liston;
        } else {
            $tmpData[] = $data["id"];
            $tmpData[] = "<a href=\"account_details.php?id=" . $data["id"] . "\">" . $data["username"] . "</a>";
            $tmpData[] = date($dateformat, $data["code"]);
            $tmpData[] = date($timeformat, $data["code"]);
            $tmpData[] = $listpay;
            $tmpData[] = $listtype;
            $tmpData[] = $liston;
            if ($data["bonus"] == 0) {
                $tmpData[] = "<div class=\"btn-group\">\r\n\t\t\t\t\t\t<a href=\"commission_details.php?sales=" . $data["record"] . "\"><button class=\"btn btn-sm btn-primary\">View Details</button></a>\r\n\t\t\t\t\t\t<button data-toggle=\"dropdown\" class=\"btn btn-sm btn-primary dropdown-toggle pull-right\"><span class=\"caret\"></span></button>\r\n\t\t\t\t\t\t<ul class=\"dropdown-menu pull-right\">\r\n\t\t\t\t\t\t<!--<li><a href=\"commissions_approved.php?unapprove=" . $data["record"] . "\">Un-Approve Commission</a></li>-->\r\n\t\t\t\t\t\t<li>" . $unapprove_form . "</li>\r\n                        </ul>\r\n\t\t\t\t\t  </div>";
            } else {
                if (0 < $data["bonus"]) {
                    $remove_form = "<form action=\"commissions_approved.php\" method=\"post\">\r\n                                    <input type=\"hidden\" name=\"remove_special\" value=\"" . $data["record"] . "\">\r\n                                    <input type=\"hidden\" name=\"csrf_token\" value=\"" . $_SESSION["csrf_token"] . "\">\r\n                                    <button type=\"submit\" class=\"btn btn-default btn-sm\">Remove</button>\r\n                                </form>";
                    $tmpData[] = $remove_form;
                } else {
                    $tmpData[] = "N/A";
                }
            }
        }
        $output["aaData"][] = $tmpData;
    }
}
if (!$isApi) {
    echo json_encode($output);
    exit;
}

?>