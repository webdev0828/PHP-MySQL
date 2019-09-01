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
{*if isset($postback_logs)*}
<!-- dynamic table start -->
<div class="panel-group col-md-12 ">
    <div class="panel panel-default" style="border-color:{$portlet_3};">
        <div class="panel-heading"
             style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), {$portlet_3};">
            <h4 class="panel-title" style="color:{$portlet_3_text};">
                <i class="fa fa-file-signature fa-fw"></i> {$custom_records}</a>
            </h4>
        </div>
        <div id="dyntable_postbacks_Logs" class="panel-collapse collapse in">

            <div class="table-scroll">
                <div class="dateFiltersContainer">
                    <!-- daterangepicker start -->
                    <input type="text" id="postback-range" class="form-control dateranger"/>
                    <!-- daterangepicker end -->
                </div>
                <!-- DataTables HTML start -->
                <table id="dyntable_Postbacks_Logs" class="table table-bordered table-hover tc-table" width="100%" style="background: #121212;color:#fff;">
                    <thead>
                    <tr>
                        <th style="text-align:left!important;width:13%;">{$custom_date}</th>
                        <th style="width:5%;">{$custom_status}</th>
                        <th style="width:5%;">{$custom_offer}</th>
                        <th style="width:5%;">{$custom_commission_id}</th>
                        <th style="width:5%;">{$custom_method}</th>
                        <th style="width:5%;">{$custom_result}</th>
                        <th style="width:5%;">HTTP</th>
                        <th style="text-align:left!important;width:47%;">URL</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                    <tr id="filters">
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </tfoot>
                </table>
                <!-- DataTables HTML end -->
            </div>
        </div>
    </div>
</div>

{$trans = [
"custom_this_year" => $custom_this_year,
"custom_last_year" => $custom_last_year
]
}
{*/if*}
TODO:
<br>- daterangepicker - select date range, for which we check postback (translate from UNIX timestamp from database and check only records between 2 values of 00:00 and 23:59:59 of both dates)
<br>- footer filters - select option + search for all columns, except date
<br>