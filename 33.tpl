{*
    --------------------------------------------------------------------------------------------------------------
    SublimeRevenue HTML Front-End Template
    --------------------------------------------------------------------------------------------------------------
    Theme Name: Dark
    --------------------------------------------------------------------------------------------------------------
*}
<style>
    td.details-control, tfoot th.details-control {
        background: url('/templates/themes/SublimeRevenue/images/details_open.png') no-repeat center center;
        cursor: pointer;
    }
    td.details-control.details, tfoot th.details-control.details {
        background: url('/templates/themes/SublimeRevenue/images/details_close.png') no-repeat center center;
    }
</style>

    <div class="page-header title col-md-12 nopad" style="background:#000;">
        <h1 style="color:#fff;">
            <i class="fa fa-bar-chart fa-fw"></i> {$custom_statistics}
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
                    <i class="fa fa-table fa-fw"></i> {$custom_statistics_table}

{*                     {if isset($payment_history_exists)}
                    <span> 
                        <span class="label label-primary">
                            {$custom_total}: {$payments_total} {$payment_commissions}
                        </span>

                        <span class="label label-danger">
                            {if $cur_sym_location == 1}
                                {$cur_sym}
                            {/if}
                            {$payments_archived}
                            {if $cur_sym_location == 2}
                                {$cur_sym}
                            {/if}
                            {$currency}

                        </span>
                    {/if}
                    </span> *}

                </h4>
                </div>
            </div>
            <div id="dyntable_general_Stats" class="panel-collapse collapse in">
                <!-- DataTables HTML start -->
                <table id="dyntable_Stats" class="table table-bordered table-hover tc-table" width="100%" style="background: #121212;color:#fff;">
                    <thead>
                    <tr>
                        <th style="text-align:left !important;">{$custom_date}</th>
                        <th>{$custom_raw_visits}</th>
                        <th></th>
                        <th>{$custom_unique_visits}</th>
                        <th></th>
                        <th>{$custom_transactions}</th>
                        <th></th>
                        <th>{$custom_sales_ratio}</th>
                        <th></th>
                        <th>{$custom_rpm}</th>
                        <th></th>
                        <th>{$custom_earnings}</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                    <tr id="totals">
                        <th>{$custom_total}:</th>
                        <th></th>
                        <th tabindex="0" class="details-control total"></th>
                        <th></th>
                        <th tabindex="0" class="details-control total"></th>
                        <th></th>
                        <th tabindex="0" class="details-control total"></th>
                        <th></th>
                        <th tabindex="0" class="details-control total"></th>
                        <th></th>
                        <th tabindex="0" class="details-control total"></th>
                        <th></th>
                        <th tabindex="0" class="details-control total"></th>
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
                            "custom_raw_visits": "{$custom_raw_visits}",
                            "custom_unique_visits": "{$custom_unique_visits}",
                            "custom_transactions": "{$custom_transactions}",
                            "custom_sales_ratio": "{$custom_sales_ratio}",
                            "custom_rpm": "{$custom_rpm}",
                            "custom_earnings": "{$custom_earnings}",
                            "custom_interval": "{$custom_interval}",
                            "custom_smart_tools": "{$custom_smart_tools}",
                            "custom_offer_tools": "{$custom_offer_tools}",
                            "custom_daily": "{$custom_daily}",
                            "custom_monthly": "{$custom_monthly}"
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
<!-- dynamic table end -->