{*
    --------------------------------------------------------------------------------------------------------------
    SublimeRevenue HTML Front-End Template
    --------------------------------------------------------------------------------------------------------------
    Theme Name: Dark
    --------------------------------------------------------------------------------------------------------------
*}


    <div class="col-md-12">
        <div class="highlight clearfix">
            <div class="page-heading-sec" style="background:{$heading_back};">
                <h1 style="color:{$heading_text};">
                    {$coupon_title}
                </h1>
            </div>
        </div>
    </div>

    {if isset($vanity_codes)}
    {*
    Enabling this HTML code without having the addon module will produce the form for the affiliate
    but processing will not work.  The addon module is required for this feature.
    *}

    <div class="panel-group col-md-12 ">
        <div class="panel panel-default" style="border-color:{$portlet_1};">
            <div class="panel-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), {$portlet_1};">
                <h4 class="panel-title" style="color:{$portlet_1_text};"data-toggle="collapse" href="#couponcode">
                    {$cc_vanity_title}<span class="pull-right"></span>
                </h4>
            </div>
        
            <div id="couponcode" class="panel-collapse collapse in">
            
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

                    <input name="csrf_token" value="{$csrf_token}" type="hidden" />
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
                            <button type="submit" class="btn btn-primary">
                                {$cc_vanity_button}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {/if}

    {if isset($coupon_query_exists)}
    <div class="panel-group col-md-12 ">
        <div class="panel panel-default" style="border-color:{$portlet_1};">
            <div id="couponcode_desc" class="panel-collapse collapse in">
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
                            <td><font color="#CC0000">{$coupon_results[nr].coupon_code}</font></td>
                            <td>{$coupon_results[nr].discount_amount}</td>
                            <td>{$coupon_results[nr].coupon_amount}</td>
                        </tr>
                        {/section}
                    </tbody>
                </table>
                {else}
                {$coupon_none}
            </div>
        </div>
    </div>
    {/if}
    </div>
</div>
</div>