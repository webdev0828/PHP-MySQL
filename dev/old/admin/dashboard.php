<?php

include_once '../API/config.php';
include_once 'includes/session.check.php';
$leftSubActiveMenu = 'affiliates';
include 'templates/header.php';
$button_addon_ok = true;
include '../includes/media/update_video_options.php';
include '../includes/media/update_video_library.php';
$table_total_pending = $db->query("select sum(payment) as earnings_total from idevaff_sales where bonus = '0' and approved = '0' and tracking not like '%fictive%'");
$table_total_pending = $table_total_pending->fetch();
$table_total_pending = number_format($table_total_pending['earnings_total'], $decimal_symbols);
if (1 === $cur_sym_location) {
    $table_total_pending = $cur_sym.$table_total_pending;
}

if (2 === $cur_sym_location) {
    $table_total_pending = $table_total_pending.' '.$cur_sym;
}

$table_total_pending = $table_total_pending.' '.$currency;
$table_total_app = $db->query("select sum(payment) as earnings_total from idevaff_sales where bonus = '0' and approved = '1' and tracking not like '%fictive%'");
$table_total_app = $table_total_app->fetch();
$table_total_app = number_format($table_total_app['earnings_total'], $decimal_symbols);
if (1 === $cur_sym_location) {
    $table_total_app = $cur_sym.$table_total_app;
}

if (2 === $cur_sym_location) {
    $table_total_app = $table_total_app.' '.$cur_sym;
}

$table_curr_app = $table_total_app.' '.$currency;
$table_total_tier = $db->query("select sum(payment) as earnings_total from idevaff_sales where bonus = '0' and approved = '1' and tier_id > '0' and tracking not like '%fictive%'");
$table_total_tier = $table_total_tier->fetch();
$table_total_tier = number_format($table_total_tier['earnings_total'], $decimal_symbols);
if (1 === $cur_sym_location) {
    $table_total_tier = $cur_sym.$table_total_tier;
}

if (2 === $cur_sym_location) {
    $table_total_tier = $table_total_tier.' '.$cur_sym;
}

$table_curr_tier = $table_total_tier.' '.$currency;
$table_total_over = $db->query("select sum(payment) as earnings_total from idevaff_sales where bonus = '0' and approved = '1' and override_id > '0' and tracking not like '%fictive%'");
$table_total_over = $table_total_over->fetch();
$table_total_over = number_format($table_total_over['earnings_total'], $decimal_symbols);
if (1 === $cur_sym_location) {
    $table_total_over = $cur_sym.$table_total_over;
}

if (2 === $cur_sym_location) {
    $table_total_over = $table_total_over.' '.$cur_sym;
}

$table_curr_over = $table_total_over.' '.$currency;
$table_paid = $db->query("select sum(payment) as earnings_paid from idevaff_archive where tracking not like '%fictive%'");
$table_paid = $table_paid->fetch();
$table_paid_total = $table_paid['earnings_paid'];
$table_paid = number_format($table_paid['earnings_paid'], $decimal_symbols);
if (1 === $cur_sym_location) {
    $table_paid = $cur_sym.$table_paid;
}

if (2 === $cur_sym_location) {
    $table_paid = $table_paid.' '.$cur_sym;
}

$table_paid = $table_paid.' '.$currency;
$table_total = $db->query("select sum(payment) as earnings_total from idevaff_sales where bonus = '0' and tracking not like '%fictive%'");
$table_total = $table_total->fetch();
$table_current_total = $table_total['earnings_total'];
$table_total = number_format($table_total['earnings_total'], $decimal_symbols);
if (1 === $cur_sym_location) {
    $table_total = $cur_sym.$table_total;
}

if (2 === $cur_sym_location) {
    $table_total = $table_total.' '.$cur_sym;
}

$table_total = $table_total.' '.$currency;
$table_grand = number_format($table_paid_total + $table_current_total, $decimal_symbols);
if (1 === $cur_sym_location) {
    $table_grand = $cur_sym.$table_grand;
}

if (2 === $cur_sym_location) {
    $table_grand = $table_grand.' '.$cur_sym;
}

$table_grand = $table_grand.' '.$currency;
echo "\r\n<div class=\"crumbs\">\r\n<ul id=\"breadcrumbs\" class=\"breadcrumb\">\r\n<li><i class=\"icon-home\"></i> <a href=\"dashboard.php\">Dashboard</a></li>\r\n</ul>\r\n";
include 'templates/crumb_right.php';
echo "</div>\r\n\r\n<div class=\"page-header\">\r\n<div class=\"page-title\"><h3>Dashboard</h3><span>Welcome to Sublime Revenue's admin center!</span></div>\r\n";
include 'templates/stats.php';
echo "</div>\r\n\r\n\r\n<!--\r\n<script type=\"text/javascript\">\r\n    \$(window).load(function(){\r\n        \$('#cloud_modal').modal('show');\r\n    });\r\n</script>\r\n\r\n<div id=\"cloud_modal\" class=\"modal fade in\" role=\"dialog\" aria-labelledby=\"Modal Label\" aria-hidden=\"false\">\r\n<div class=\"modal-dialog\" style=\"width:780px;\">\r\n<div class=\"modal-content\">\r\n    <div class=\"modal-header text-center\" style=\"background:#0562aa;\">\r\n         <h4 class=\"modal-title\" style=\"color:#ffffff; font-size:22px;\">Welcome To Sublime Revenue Administrative Center!</h4>\r\n    </div>\r\n\t<div class=\"modal-body\">\r\n<p style=\"margin-bottom:30px;\">Before you get started, please take a moment to bookmark your current URL location and write down your username and password. We have sent an email to <strong>";
echo html_output($address);
echo "</strong> with these details as well.</p>\r\n\r\n<table class=\"table\">\r\n<tbody>\r\n<tr>\r\n<td width=\"25%\"><strong>Username:</strong></td>\r\n<td width=\"25%\"></td>\r\n<td width=\"50%\"></td>\r\n</tr>\r\n<tr>\r\n<td width=\"25%\"><strong>Password:</strong></td>\r\n<td width=\"25%\"></td>\r\n<td width=\"50%\"></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n\r\n\t\t<h4 style=\"margin-top:15px; color:#CC0000;\">Let's Get Started...</h4>\r\n\t\t<p>The first thing you want to do is watch the <strong>Sublime Revenue Introduction</strong> video. This video will familiarize you with your new Sublime Revenue admin center. Once you've completed that video, have a look at the <strong>Start Here</strong> video. It will walk you through the 10 steps to configuring Sublime Revenue which includes things like your commission structure, adjusting email templates, uploading your logo, etc.</p>\r\n\t</div>\r\n    <div class=\"modal-footer\">\r\n        <button type=\"button\" class=\"btn btn-primary\" data-dismiss=\"modal\">Close</button>\r\n    </div>\r\n</div>\r\n</div>\r\n</div>\r\n-->\r\n\r\n\r\n";
if ($login_count <= '5') {
    $display_content = true;
    echo "\r\n<div class=\"row\">\r\n<div class=\"col-md-12\">\r\n<div class=\"alert alert-success\"><h4>Congratulations on completing your installation!<span class=\"pull-right\"><a href=\"help.php\"><button class=\"btn btn-sm btn-danger\">Quick Setup Guide</button></a></span></h4>Please get started by watching the videos below. When you're ready, start your configuration using the Quick Setup Guide.</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n<div class=\"widget box\">\r\n<div class=\"widget-header\">\r\n<h4><i class=\"icon-play\"></i> Admin Center Introduction</h4>\r\n</div>\r\n<div class=\"widget-content\">\r\n<p>This video will familiarize you with your new Sublime Revenue admin center.</p>\r\n<div class=\"video-container\">\r\n<iframe src=\"//player.vimeo.com/video/85589323\" frameborder=\"0\" width=\"560\" height=\"315\" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>\r\n</div>\r\n</div> \r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"widget box\">\r\n<div class=\"widget-header\">\r\n<h4><i class=\"icon-play\"></i> Let's Get Started!</h4>\r\n</div>\r\n<div class=\"widget-content\">\r\n<p>Our first step is to complete your configuration and adjust your settings.</p>\r\n<div class=\"video-container\">\r\n<iframe src=\"//player.vimeo.com/video/85588431\" frameborder=\"0\" width=\"560\" height=\"315\" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>\r\n</div>\r\n</div> \r\n</div>\r\n</div>\r\n</div>\r\n\r\n";
}

echo "\r\n";
if (!isset($display_content)) {
    include 'includes/notifications.php';
}

echo "\r\n<div class=\"row row-bg\">\r\n\r\n<div class=\"col-sm-6 col-md-4 hidden-xs\">\r\n<div class=\"statbox widget box box-shadow\">\r\n<div class=\"widget-content\">\r\n<div class=\"visual black\">\r\n<i class=\"icon-signal\"></i></div>\r\n<div class=\"title\">Pending Commissions</div>\r\n<div class=\"value\">";
echo html_output($table_total_pending);
echo "</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"col-sm-6 col-md-4 hidden-xs\">\r\n<div class=\"statbox widget box box-shadow\">\r\n<div class=\"widget-content\">\r\n<div class=\"visual gray\">\r\n<i class=\"icon-signal\"></i></div>\r\n<div class=\"title\">Paid Commissions</div>\r\n<div class=\"value\">";
echo html_output($table_paid);
echo "</div>\r\n</div>\r\n</div> \r\n</div> \r\n<div class=\"col-sm-6 col-md-4 hidden-xs\">\r\n<div class=\"statbox widget box box-shadow\">\r\n<div class=\"widget-content\">\r\n<div class=\"visual red\"><i class=\"icon-signal\"></i></div>\r\n<div class=\"title\">Total Commissions</div>\r\n<div class=\"value\">";
echo html_output($table_grand);
echo "</div>\r\n</div>\r\n</div> \r\n</div>\r\n\r\n<div class=\"col-sm-6 col-md-4 hidden-xs\">\r\n<div class=\"statbox widget box box-shadow\">\r\n<div class=\"widget-content\">\r\n<div class=\"visual blue\">\r\n<i class=\"icon-signal\"></i></div>\r\n<div class=\"title\">Current Approved Commissions</div>\r\n<div class=\"value\">";
echo html_output($table_curr_app);
echo "</div>\r\n</div>\r\n</div> \r\n</div> \r\n<div class=\"col-sm-6 col-md-4 hidden-xs\">\r\n<div class=\"statbox widget box box-shadow\">\r\n<div class=\"widget-content\">\r\n<div class=\"visual green\"><i class=\"icon-signal\"></i></div>\r\n<div class=\"title\">Current Override Commissions</div>\r\n<div class=\"value\">";
echo html_output($table_curr_over);
echo "</div>\r\n</div>\r\n</div> \r\n</div>\r\n<div class=\"col-sm-6 col-md-4 hidden-xs\">\r\n<div class=\"statbox widget box box-shadow\">\r\n<div class=\"widget-content\">\r\n<div class=\"visual yellow\">\r\n<i class=\"icon-signal\"></i></div>\r\n<div class=\"title\">Current Tier Commissions</div>\r\n<div class=\"value\">";
echo html_output($table_curr_tier);
echo "</div>\r\n</div>\r\n</div>\r\n</div>  \r\n\r\n</div>\r\n\r\n";
if (1 === $show_map) {
    echo "\r\n    <div class=\"row\">\r\n        <div class=\"col-md-12\">\r\n            <div class=\"widget box\">\r\n                <div class=\"widget-header\">\r\n                    <h4><i class=\"icon-globe\"></i> World Traffic Map</h4>\r\n\t\t\t\t\t<span class=\"pull-right\"><a href=\"#map_info\" data-toggle=\"modal\"><button class=\"btn btn-info btn-sm\">Map Info</button></a> <a href=\"help.php?map_status=off&cfg_special=true\"><button class=\"btn btn-primary btn-sm\">Hide Map</button></a></span>\r\n                </div>\r\n\t\t\t\t\r\n<div class=\"modal fade\" id=\"map_info\">\r\n<div class=\"modal-dialog\">\r\n<div class=\"modal-content\">\r\n<div class=\"modal-header\">\r\n<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>\r\n<h4 class=\"modal-title\">World Traffic Map Info</h4>\r\n</div>\r\n<div class=\"modal-body\">\r\nThis map represents only traffic logs that have <strong>geo</strong> data available. We did not start storing <strong>geo</strong> data in traffic logs until Sublime Revenue 1.8.0. If you have upgraded from an earlier version, this map will not be completely accurate as the <strong>geo</strong> data was not available on earlier traffic logs.\r\n</div>\r\n<div class=\"modal-footer\">\r\n<button type=\"button\" class=\"btn btn-primary\" data-dismiss=\"modal\">Close</button>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n                <div class=\"widget-content\" style=\"min-height: 350px;\">\r\n                    <div id=\"world_map\" style=\"height: 350px\"></div>\r\n                    ";
    $query = 'SELECT count(idevaff_iptracking.id) as cnt, idevaff_iptracking.geo FROM `idevaff_iptracking` group by idevaff_iptracking.geo';
    $st = $db->prepare($query);
    $st->execute();
    $ip_datas = $st->fetchAll();
    $geo_countries = [];
    $map_data = [];
    $map_count = [];
    foreach ($ip_datas as $ip_data) {
        $geo_countries[] = "'".$ip_data['geo']."'";
        $map_count[$ip_data['geo']] = $ip_data['cnt'];
    }
    if (!empty($geo_countries)) {
        $country_codes = implode(', ', $geo_countries);
        $query = 'select idevaff_country_coords.latitude, idevaff_country_coords.longitude, (select idevaff_ip2location.country_name from idevaff_ip2location where idevaff_country_coords.country_code = idevaff_ip2location.country_code limit 1) country_name, idevaff_country_coords.country_code from idevaff_country_coords where idevaff_country_coords.country_code in ( '.$country_codes.' )';
        $st = $db->prepare($query);
        $st->execute();
        if ($st->rowCount()) {
            $country_names = $st->fetchAll();
            foreach ($country_names as $country_name) {
                $map_data[] = ['latLng' => [$country_name['latitude'], $country_name['longitude']], 'name' => $country_name['country_name'].': '.$map_count[$country_name['country_code']]];
            }
        }
    }

    echo "                    <script type=\"text/javascript\">\r\n                        jQuery(function(\$){\r\n                            \$('#world_map').vectorMap({\r\n                                map: 'world_mill',\r\n                                //scaleColors: ['#C8EEFF', '#0071A4'],\r\n\t\t\t\t\t\t\t\tscaleColors: ['#1ce943', '#e9e71c'],\r\n                                normalizeFunction: 'polynomial',\r\n                                hoverOpacity: 0.7,\r\n                                hoverColor: false,\r\n                                regionLabelStyle: {\r\n                                    initial: {\r\n                                        'font-family': 'Verdana',\r\n                                        'font-size': '12',\r\n                                        'font-weight': 'bold',\r\n                                        cursor: 'default',\r\n                                        fill: 'black'\r\n                                    },\r\n                                    hover: {\r\n                                        cursor: 'pointer'\r\n                                    }\r\n                                },\r\n                                markerStyle: {\r\n                                    initial: {\r\n                                        //fill: 'grey',\r\n\t\t\t\t\t\t\t\t\t\t//fill: '#29ef1f',\r\n\t\t\t\t\t\t\t\t\t\tfill: '#cc0000',\r\n\t\t\t\t\t\t\t\t\t\t//stroke: '#505050',\r\n\t\t\t\t\t\t\t\t\t\tstroke: '#890000',\r\n                                        \"fill-opacity\": 1,\r\n                                        \"stroke-width\": 1,\r\n                                        \"stroke-opacity\": 1,\r\n                                        r: 5\r\n                                    },\r\n                                    hover: {\r\n                                        stroke: '#5e0000',\r\n                                        \"stroke-width\": 1,\r\n                                        cursor: 'pointer'\r\n                                    },\r\n                                    selected: {\r\n                                        fill: 'blue'\r\n                                    },\r\n                                    selectedHover: {\r\n                                    }\r\n                                },\r\n                                markerLabelStyle: {\r\n                                    initial: {\r\n                                        'font-family': 'Verdana',\r\n                                        'font-size': '12',\r\n                                        'font-weight': 'bold',\r\n                                        cursor: 'default',\r\n                                        fill: 'black'\r\n                                    },\r\n                                    hover: {\r\n                                        cursor: 'pointer'\r\n                                    }\r\n                                },\r\n                                //backgroundColor: '#383f47',\r\n\t\t\t\t\t\t\t\t//backgroundColor: '#54728c',\r\n\t\t\t\t\t\t\t\tbackgroundColor: '#3279b7',\r\n\t\t\t\t\t\t\t\t\r\n                                markers: ";
    echo json_encode($map_data);
    echo "                            });\r\n                        });\r\n                    </script>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n\t\r\n";
}

echo "\r\n<div class=\"row\">\r\n<div class=\"col-md-12\">\r\n<div class=\"widget box\">\r\n<div class=\"widget-header\">\r\n<h4><i class=\"icon-bar-chart\"></i> Last 30 Days Activity</h4>\r\n</div>\r\n<div class=\"widget-content\">\r\n<div id=\"chart_dashboard\" class=\"chart\"></div>\r\n</div>\r\n</div>\r\n</div> \r\n</div> \r\n\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n<div class=\"widget box\">\r\n<div class=\"widget-header\">\r\n<h4><i class=\"icon-money\"></i> Latest 5 Pending Commissions</h4>\r\n</div>\r\n<div class=\"widget-content no-padding\">\r\n<table class=\"table table-striped table-hover\">\r\n<thead>\r\n<tr>\r\n<th>Date</th>\r\n<th>Amount</th>\r\n<th>Order #</th>\r\n<th>Status</th>\r\n<th>Details</th>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n";
$get_last_5 = $db->query("select record, code, approved, delay, payment, tracking from idevaff_sales where top_tier_tag = '0' and override = '0' and bonus = '0' and tracking not like '%fictive%' order by record DESC limit 5");
if ($get_last_5->rowCount()) {
    while ($qry_comms = $get_last_5->fetch()) {
        $listpay = number_format($qry_comms['payment'], $decimal_symbols);
        if (1 === $cur_sym_location) {
            $listpay = $cur_sym.$listpay;
        }

        if (2 === $cur_sym_location) {
            $listpay = $listpay.' '.$cur_sym;
        }

        $listpay = $listpay.' '.$currency;
        if ('0' < $qry_comms['delay']) {
            $label_color = 'primary';
            $label_content = 'Delayed';
            $link2comm = null;
        } else {
            if ('1' === $qry_comms['approved']) {
                $label_color = 'success';
                $label_content = 'Approved';
                $link2comm = '<a href="commission_details.php?sales='.$qry_comms['record'].'"><button class="btn btn-xs">View</button></a>';
            } else {
                if ('0' === $qry_comms['approved']) {
                    $label_color = 'danger';
                    $label_content = 'Pending';
                    $link2comm = '<a href="approve_commission.php?sale_id='.$qry_comms['record'].'"><button class="btn btn-xs">View</button></a>';
                }
            }
        }

        echo "<tr>\r\n<td>";
        echo date($dateformat, $qry_comms['code']);
        echo "</td>\r\n<td>";
        echo html_output($listpay);
        echo "</td>\r\n<td>";
        if ('' !== $qry_comms['tracking']) {
            echo html_output($qry_comms['tracking']);
        } else {
            echo 'N/A';
        }

        echo "</td>\r\n<td><span style=\"width:400px;\" class=\"label label-";
        echo html_output($label_color);
        echo '">';
        echo html_output($label_content);
        echo "</span></td>\r\n<td>";
        echo $link2comm;
        echo "</td>\r\n</tr>\r\n";
    }
} else {
    echo "<tr><td>No commissions to list yet.</td></tr>\r\n";
}

echo "</tbody>\r\n</table>\r\n<div class=\"row\">\r\n<div class=\"table-footer\">\r\n<div class=\"col-md-12\">\r\nNote: Showing primary referred commission only.\r\n</div>\r\n</div> \r\n</div>\r\n</div> \r\n</div> \r\n</div> \r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"widget box\">\r\n<div class=\"widget-header\">\r\n<h4><i class=\"icon-user\"></i> Latest 5 Affiliates</h4>\r\n</div>\r\n<div class=\"widget-content no-padding\">\r\n<table class=\"table table-striped table-hover\">\r\n<thead>\r\n<tr>\r\n<th>Signup Date</th>\r\n<th>Username</th>\r\n<th>Status</th>\r\n<th>Details</th>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n";
$get_last_5_affs = $db->query("select id, signup_date, username, approved from idevaff_affiliates where suspended = '0' order by id DESC limit 5");
if ($get_last_5_affs->rowCount()) {
    while ($qry_affs = $get_last_5_affs->fetch()) {
        if ('1' === $qry_affs['approved']) {
            $label_color = 'success';
            $label_content = 'Approved';
        } else {
            if ('0' === $qry_affs['approved']) {
                $label_color = 'danger';
                $label_content = 'Pending';
            }
        }

        echo "<tr>\r\n<td>";
        if ('0' !== $qry_affs['signup_date']) {
            echo date($dateformat, $qry_affs['signup_date']);
        } else {
            echo 'N/A';
        }

        echo "</td>\r\n<td>";
        echo html_output($qry_affs['username']);
        echo "</td>\r\n<td><span style=\"width:400px;\" class=\"label label-";
        echo html_output($label_color);
        echo '">';
        echo html_output($label_content);
        echo "</span></td>\r\n<td><a href=\"account_details.php?id=";
        echo html_output($qry_affs['id']);
        echo "\"><button class=\"btn btn-default btn-xs\">View</button></a></td>\r\n</tr>\r\n";
    }
} else {
    echo "<tr><td>No affiliates to list yet.</td></tr>\r\n";
}

echo "</tbody>\r\n</table>\r\n<div class=\"row\">\r\n<div class=\"table-footer\">\r\n<div class=\"col-md-12\">\r\nNote: Suspended accounts are excluded.\r\n</div>\r\n</div> \r\n</div>\r\n</div> \r\n</div> \r\n</div> \r\n</div> \r\n\r\n";
include 'templates/footer.php';

?>