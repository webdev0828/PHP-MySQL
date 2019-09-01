{*
--------------------------------------------------------------------------------------------------------------
iDevAffiliate HTML Front-End Template
--------------------------------------------------------------------------------------------------------------
Theme Name: Default Theme
--------------------------------------------------------------------------------------------------------------
*}

{include file='file:header.tpl'}

{if isset($logout_msg)}
<div class="row">
    <div class="col-md-12" style="margin-top:15px;">
        <div class="alert alert-success">
            {$logout_msg}
        </div>
    </div>
</div>
{/if}

<div class="row">
    <div class="col-md-{if !isset($affiliateUsername)}7{else}12{/if}"{if !isset($logout_msg)} style="margin-top:15px;"{/if}>
        <div class="portlet portlet-basic">
            <div class="portlet-body">

                {if (isset($show_seal))}
                <div class="row">
                    <div class="col-md-{if !isset($affiliateUsername)}9{else}10{/if}">
                        <p>
                            <h4>
                                {$index_heading_1}
                            </h4>
                        </p>
                        
                        <p>
                            {$index_paragraph_1}
                        </p>
                    </div>

                    <div class="col-md-{if !isset($affiliateUsername)}3{else}2{/if}" align="center">
                        <a href="#modal-1" data-target="#modal-1" data-toggle="modal">
                            <img class="img-responsive" style="width: 142px; height: 142px; border: none;" src="{$seal_image}"/>
                        </a>
                    </div>
                </div>
                
                <div class="modal fade" id="modal-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="{$modal_close}">
                                    <span aria-hidden="true">×</span>
                                </button>

                                <h4 class="modal-title" style="color:{$heading_text};">
                                    {$accountability_title}
                                </h4>
                            </div>

                            <div class="modal-body">
                                <p>
                                    {$accountability_text}
                                </p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    {$modal_close}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {else}
                <h4>
                    {$index_heading_1}
                </h4>

                <p>
                    {$index_paragraph_1}
                </p>
                {/if}

                <h4>
                    {$index_heading_2}
                </h4>
                <p>
                    {$index_paragraph_2}
                </p>
                <h4>
                    {$index_heading_3}
                </h4>
                <p>
                    {$index_paragraph_3}
                </p>

                {if isset($cp_page_width)}
                <p>
                    <a href="signup.php" class="btn btn-success">
                        {$header_signupLink}
                    </a>
                </p>
                {/if}

            </div>
        </div>
    </div>

    {if !isset($affiliateUsername)}
    <div class="col-md-5"{if !isset($logout_msg)} style="margin-top:15px;"{/if}>
        <div class="portlet portlet-basic">
            <div class="portlet-heading">
                <div class="portlet-title">
                    <h4>
                        {$index_login_title}
                    </h4>
                </div>
            </div>

            <div class="portlet-body">
                <form method="post" action="login.php">
                    <input name="csrf_token" value="{$csrf_token}" type="hidden" />
                    <div class="form-group">
                        <label for="userid">
                            {$index_login_username}
                        </label>

                        <input class="form-control" placeholder="{$index_login_username}" type="text" id="userid" name="userid" value="{$index_login_username_field}"/>
                    </div>

                    <div class="form-group">
                        <label for="password">
                            {$index_login_password}
                        </label>

                        <input class="form-control" placeholder="{$index_login_password}" type="password" name="password" id="password" value="{$index_login_password_field}" autocomplete="off" />
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-inverse">
                            {$index_login_button}
                        </button>
                        
                        {if isset($idev_facebook_enabled)}
                        <span class="pull-right">
                            <a href="{$fb_login_url}" class="btn btn-social btn-facebook">
                                <i class="fa fa-facebook"></i>
                                {$fb_login}
                            </a>
                        </span>
                        {/if}

                    </div>

                    <input name="token_affiliate_login" value="{$login_token}" type="hidden" />
                </form>
            </div>
        </div>

        {if !isset($cp_page_width)}
        <p style="margin-top: 15px !important;">
            <a href="signup.php" class="btn btn-block btn-danger">
                {$header_signupLink}
            </a>
        </p>
        {/if}

    </div>
    {/if}
</div>

{if isset($details_show)}
<div class="row">
    <div class="col-md-12">
        <div class="portlet" style="border-color:{$portlet_3};">
            <div class="portlet-heading" style="background:{$portlet_3};">
                <div class="portlet-title" style="color:{$portlet_3_text};">
                    <h4>
                        {$index_table_title}
                    </h4>
                </div>
            </div>

            <div class="portlet-body">
                <table class="table table-bordered table-striped" {if isset($text_color)} style="color:{$text_color};" {/if}>
                    <tbody>
                        
                        {if isset($details_show_type)}
                        <tr>
                            <td>
                                {$index_table_commission_type}
                            </td>
                            <td>
                                {$commission_type_info}
                            </td>
                        </tr>
                        
                        {* The following IF statements are only used if allowing affiliates to choose commission type. *}
                        
                        {if isset($choose_percentage_payout)}
                        <tr>
                            <td>
                                {$index_table_sale}:
                            </td>
                            <td>
                                <div class="label label-danger">
                                    {$bot1}%
                                </div>

                                {$index_table_sale_text}
                            </td>
                        </tr>
                        {/if}

                        {if isset($choose_flatrate_payout)}
                        <tr>
                            <td>
                                {$index_table_sale}:
                            </td>
                            <td>
                                <div class="label label-danger">
                                    {if $cur_sym_location == 1}{$cur_sym}{/if}{$bot2}{if $cur_sym_location == 2} {$cur_sym}{/if} {$currency}
                                </div>
                                
                                {$index_table_sale_text}
                            </td>
                        </tr>
                        {/if}

                        {if isset($choose_perclick_payout)}
                        <tr>
                            <td>
                                {$index_table_click}:
                            </td>
                            <td>
                                <div class="label label-danger">
                                    {if $cur_sym_location == 1}{$cur_sym}{/if}{$bot3}{if $cur_sym_location == 2} {$cur_sym}{/if} {$currency}
                                </div>

                                {$index_table_click_text}
                            </td>
                        </tr>
                        {/if}
                        {/if}

                        {if isset($details_show_signup)}
                        {if isset($add_balance_row)}
                        <tr>
                            <td>
                                {$index_table_initial_deposit}
                            </td>
                            <td>
                                {if $cur_sym_location == 1}{$cur_sym}{/if}{$init_deposit}{if $cur_sym_location == 2} {$cur_sym}{/if} {$currency} - 
                                <font style="color: #CC0000;">
                                    <b>{$index_table_deposit_tag}</b>
                                </font>
                            </td>
                        </tr>
                        {/if}
                        {/if}

                        {if isset($details_show_requirements)}
                        {if isset($add_requirements_row)}
                        <tr>
                            <td>
                                {$index_table_requirements}
                            </td>
                            <td>
                                {if $cur_sym_location == 1}{$cur_sym}{/if}{$init_req}{if $cur_sym_location == 2} {$cur_sym}{/if} {$currency} - {$index_table_requirements_tag}
                            </td>
                        </tr>
                        {/if}
                        {/if}

                        {if isset($details_show_duration)}
                        <tr>
                            <td>
                                {$index_table_duration}
                            </td>
                            <td>
                                {$index_table_duration_tag}
                            </td>
                        </tr>
                        {/if}

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{/if}

{if isset($bar_comms_last_6) || isset($pie_top_5_month)}
<div class="row">
    
    {if isset($bar_comms_last_6)}
    <div class="col-md-{if isset($pie_top_5_month)}8{else}12{/if}">
        <div class="portlet" style="border-color:{$portlet_3};">
            <div class="portlet-heading" style="background:{$portlet_3};">
                <div class="portlet-title" style="color:{$portlet_3_text};">
                    <h4>
                        {$chart_last_6_months}
                    </h4>
                </div>
            </div>

            <div class="portlet-body">
                <div id="bar-example-index"></div>
                
                {literal}
                <script type="text/javascript">
                    Morris.Bar({
                        element: 'bar-example-index',
                        data: [
                            {x: '{/literal}{$monthly_commissions[0].name}{literal}', y: '{/literal}{$monthly_commissions[0].commissions}{literal}'},
                            {x: '{/literal}{$monthly_commissions[1].name}{literal}', y: '{/literal}{$monthly_commissions[1].commissions}{literal}'},
                            {x: '{/literal}{$monthly_commissions[2].name}{literal}', y: '{/literal}{$monthly_commissions[2].commissions}{literal}'},
                            {x: '{/literal}{$monthly_commissions[3].name}{literal}', y: '{/literal}{$monthly_commissions[3].commissions}{literal}'},
                            {x: '{/literal}{$monthly_commissions[4].name}{literal}', y: '{/literal}{$monthly_commissions[4].commissions}{literal}'},
                            {x: '{/literal}{$monthly_commissions[5].name}{literal}', y: '{/literal}{$monthly_commissions[5].commissions}{literal}'},
                        ],
                        xkey: 'x',
                        ykeys: ['y'],
                        labels: ['{/literal}{$chart_last_6_months_paid}{literal}'],
                        barColors: function (row, series, type) {
                            if (type === 'bar') {
                                var red = Math.ceil(255 * row.y / this.ymax);
                                return 'rgb(' + red + ',0,0)';
                            }
                            else {
                                return '#000';
                            }
                        }
                    });
                </script>
                {/literal}

            </div>
        </div>
    </div>
    {/if}

    {if isset($pie_top_5_month)}
    <div class="col-md-{if isset($bar_comms_last_6)}4{else}12{/if}">
        <div class="portlet" style="border-color:{$portlet_3};">
            <div class="portlet-heading" style="background:{$portlet_3};">
                <div class="portlet-title" style="color:{$portlet_3_text};">
                    <h4>
                        {$chart_this_month}
                    </h4>
                </div>
            </div>

            <div class="portlet-body">
                <div id="donut-example-index"></div>

                {if !empty($top_affiliates)}
                {literal}
                <script type="text/javascript">
                    Morris.Donut({
                        element: 'donut-example-index',
                        resize: true,
                        data: [
                            {/literal}{$top_affiliates}{literal}
                        ],
                        formatter: function (x, data) { return data.formatted; }
                    });
                </script>
                {/literal}
                
                {else}
                {$chart_this_month_none}
                {/if}
            </div>
        </div>
    </div>
    {/if}
</div>
{/if}

{include file='file:footer.tpl'}
