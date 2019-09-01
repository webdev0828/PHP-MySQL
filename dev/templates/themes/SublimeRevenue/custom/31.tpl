{*
    --------------------------------------------------------------------------------------------------------------
    SublimeRevenue HTML Front-End Template
    --------------------------------------------------------------------------------------------------------------
    Theme Name: Admin Panel
    --------------------------------------------------------------------------------------------------------------
*}
    <div class="page-header title col-md-12 nopad" style="background:#000;">
        <h1 style="color:#fff;">
            <i class="fa fa-history fa-fw"></i> {$custom_postback_logs}
        </h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet portlet-basic">
                <div class="portlet-body">
<div class="row">
    <div class="col-md-12 ">
        <div class="portlet" style="border-color:{$portlet_3};">
            <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), {$portlet_3};">
                <div class="portlet-title" style="color:#ffffff;">
                    <h4 data-toggle="collapse">
                        <i class="fa fa-file-signature fa-fw"></i> {$custom_records}</a>
                    </h4>
                </div>
            </div>
                <!-- DataTables HTML start -->
                <table id="dyntable_Postbacks_Logs" class="table table-bordered table-hover tc-table" width="100%" style="background: #121212;color:#fff;">
                    <thead>
                    <tr>
                        <th style="text-align:left!important;width:20%;">{$custom_date}</th>
                        <th style="width:5%;">{$custom_status}</th>
                        <th style="width:5%;">{$custom_offer}</th>
                        <th style="width:5%;">{$custom_commission_id}</th>
                        <th style="width:5%;">{$custom_method}</th>
                        <th style="width:5%;">{$custom_result}</th>
                        <th style="width:5%;">HTTP</th>
                        <th style="text-align:left!important;width:40%;">URL</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                    <tr id="filters">
                    <tfoot>
                        <tr>
                            <td></td>
                            <td>
                                <select id="status-filter" class="form-control">
                                    <option value="">{$custom_all}</option>
                                </select>
                            </td>
                            <td>
                                <select id="offer-filter" class="form-control">
                                    <option value="">{$custom_all}</option>
                                </select>
                            </td>
                            <td>
                                <select id="record-filter" class="form-control">
                                    <option value="">{$custom_all}</option>
                                </select>
                            </td>
                            <td>
                                <select id="method-filter" class="form-control">
                                    <option value="">{$custom_all}</option>
                                </select>
                            </td>
                            <td>
                                <select id="result-filter" class="form-control">
                                    <option value="">{$custom_all}</option>
                                </select>
                            </td>
                            <td>
                                <select id="http-filter" class="form-control">
                                    <option value="">{$custom_all}</option>
                                </select>
                            </td>
                            <td>
                                <select id="url-filter" class="form-control">
                                    <option value="">{$custom_allcustom_all}</option>
                                </select>
                            </td>
                        </tr>
                    </tfoot>
                    </tr>
                    </tfoot>
                </table>
                <!-- DataTables HTML end -->
            </div>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
                <script type="text/javascript">
                    window.jstext = {
                        language : {
                            "custom_show": "{$custom_show}",
                            "custom_error": "{$custom_error}",
                            "custom_success": "{$custom_success}",
                            "custom_fail": "Failuer",
                            "custom_approved": "{$custom_approved}",
                            "custom_rejected": "{$custom_rejected}"
                        }
                    }
                </script>
{$trans = [
"custom_this_year" => $custom_this_year,
"custom_last_year" => $custom_last_year,
"custom_country" => $custom_country,
"custom_total" => $custom_total,
"custom_tracking_id" => $custom_tracking_id,
"custom_tracking_ids_combinations" => $custom_tracking_ids_combinations,
"custom_tracking_id_four" => $custom_tracking_id_four,
"custom_tracking_id_one" => $custom_tracking_id_one,
"custom_tracking_id_three" => $custom_tracking_id_three,
"custom_tracking_id_two" => $custom_tracking_id_two,

"custom_today" => $custom_today,
"custom_yesterday" => $custom_yesterday,
"custom_last_seven_days" => $custom_last_seven_days,
"custom_last_thirty_days" => $custom_last_thirty_days,
"custom_this_month" => $custom_this_month,
"custom_last_month" => $custom_last_month,
"custom_apply" => $custom_apply,
"custom_custom_cancel" => $custom_custom_cancel,
"custom_from" => $custom_from,
"custom_to" => $custom_to,
"custom_custom" => $custom_custom,
"custom_w" => $custom_w,
"custom_mo" => $custom_mo,
"custom_tu" => $custom_tu,
"custom_we" => $custom_we,
"custom_th" => $custom_th,
"custom_fr" => $custom_fr,
"custom_sa" => $custom_sa,
"custom_su" => $custom_su,
"custom_january" => $custom_january,
"custom_february" => $custom_february,
"custom_march" => $custom_march,
"custom_april" => $custom_april,
"custom_may" => $custom_may,
"custom_june" => $custom_june,
"custom_july" => $custom_july,
"custom_august" => $custom_august,
"custom_september" => $custom_september,
"custom_october" => $custom_october,
"custom_november" => $custom_november,
"custom_december" => $custom_december
]
}
<input type="hidden" id="trans" value='{json_encode($trans)}'>
