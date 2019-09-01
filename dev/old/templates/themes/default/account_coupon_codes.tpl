{*
    --------------------------------------------------------------------------------------------------------------
    iDevAffiliate HTML Front-End Template
    --------------------------------------------------------------------------------------------------------------
    Theme Name: Default Theme
    --------------------------------------------------------------------------------------------------------------
*}
    <div class="page-header title" style="background:{$heading_back};">
        <h1 style="color:{$heading_text};">
            {$coupon_title}
        </h1>
    </div> 
    {if isset($vanity_codes)}
    {* Enabling this HTML code without having the addon module will produce the form for the affiliate but processing will not work.  The addon module is required for this feature. *}

    <div class="row">
        <div class="col-md-12">
            <div class="portlet" style="border-color:{$portlet_1};">
                <div class="portlet-heading" style="background:{$portlet_1};">
                    <div class="portlet-title" style="color:{$portlet_1_text};">
                        <h4>
                            {$cc_vanity_title}
                        </h4>
                    </div>
                </div>

                <div class="portlet-body">
                    {if isset($cc_display_edit_errors)}
                    <div class="alert alert-danger">
                        {$cc_error_list}
                    </div>
                    {/if}

                    {if isset($cc_creation_success)}
                    <div class="alert alert-success">
                        {$cc_creation_success}
                    </div>
                    {/if}

                    <form class="form-horizontal" role="form" method="post" action="account.php">
                        <input name="csrf_token" value="{$csrf_token}" type="hidden"/>
                        <input type="hidden" name="page" value="44">
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                {$cc_vanity_field}
                            </label>

                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="coupon_code_request" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-inverse">
                                    {$cc_vanity_button}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {/if}
    <div class="row">
        <div class="col-md-12">
            <div class="portlet portlet-basic">
                <div class="portlet-body">
                    {if isset($coupon_query_exists)}
                    <p>
                        {$coupon_desc}
                    </p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <b>{$coupon_head_1}</b>
                                </th>
                                <th>
                                    <b>{$coupon_head_2}</b>
                                </th>
                                <th>
                                    <b>{$coupon_head_3}</b>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            {section name=nr loop=$coupon_results}
                            <tr>
                                <td>
                                    <font color="#CC0000">{$coupon_results[nr].coupon_code}</font>
                                </td>
                                <td>
                                    {$coupon_results[nr].discount_amount}
                                </td>
                                <td>
                                    {$coupon_results[nr].coupon_amount}
                                </td>
                            </tr>
                            {/section}
                        </tbody>
                    </table>
                    {else}
                        {$coupon_none}
                    {/if}
                </div>
            </div>
        </div>
    </div>