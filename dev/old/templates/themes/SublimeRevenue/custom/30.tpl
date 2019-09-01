{*
--------------------------------------------------------------------------------------------------------------
SR HTML Front-End Template
--------------------------------------------------------------------------------------------------------------
Theme Name: Admin Panel
--------------------------------------------------------------------------------------------------------------
*}

    <div class="page-header title col-md-12 nopad" style="background:#000;">
        <h1 style="color:#fff;">
            <i class="fa fa-sliders-h fa-fw"></i> {$custom_postback_settings}</a>
        </h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet portlet-basic">
                <div class="portlet-body">

    <div class="content-white-area">
        
        {if isset($display_edit_errors)}
        <div class="alert alert-danger">
            <h4>{$error_title}</h4>
            {$error_list}
        </div>
        {/if}
        
        {if isset($edit_success)}
        <div class="alert alert-success">
            {$edit_success}
        </div>
        {/if}                                    

        <form method="POST" action="/dashboard/postback/settings" class="form-horizontal" id="postback_edit_form" name="pform">
            
            <input name="csrf_token" value="{$csrf_token}" type="hidden"/>
            <input type="hidden" name="postback_edit" value="1">
            <input type="hidden" name="page" value="30">

            <div class="row">
                <div class="col-md-12">
                    <div class="portlet" style="border-color:{$portlet_1};">
                        <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), {$portlet_3};">
                            <div class="portlet-title" style="color:{$portlet_1_text};">
                                <h4>
                                    <i class="fa fa-link fa fw"></i> {$custom_global_action_notification}
                                </h4>
                            </div>
                        </div>

                        <div class="portlet-body">
                            <div class="form-group">
                                <label class="col-sm-1 control-label">{$custom_postback_state}</label>
                                <div class="col-sm-1">
                                    <label class="switch">
                                        <input name="e_postback_state" type="checkbox" {if isset($e_postback_state) && $e_postback_state == 1}checked{/if}>
                                        <span class="slider"></span>
                                    </label>
                                </div>
                                <label class="col-sm-1 control-label">{$custom_method}</label>
                                <div class="col-sm-1">
                                    <select name="e_method" class="method form-control" style="width:110%">
                                        <option value="0" {if isset($e_method) && $e_method == 0}selected="selected"{/if}>GET</option>
                                        <option value="1" {if isset($e_method) && $e_method == 1}selected="selected"{/if}>POST</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-1 control-label">URL</label>
                                <div class="col-sm-10">
                                    <input type="url" class="form-control" name="e_postback_url" size="60" placeholder="{$e_postback_url}" value="{$e_postback_url}" id="e_postback_url" maxlength="2048">
                                </div>
                                <div class="col-sm-1">
                                    <input class="btn btn-primary" name="save" type="submit" value="{$custom_save}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="portlet" style="border-color:{$portlet_1};">
                        <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), {$portlet_3};">
                            <div class="portlet-title" style="color:{$portlet_1_text};">
                                <h4>
                                    <i class="fa fa-hashtag fa fw"></i> {$custom_tokens}
                                </h4>
                            </div>
                        </div>
                        <div style="overflow-x:auto;">
                        <table id="dyntable_PostbackTokens" class="table table-bordered table-hover tc-table" width="100%" style="background: #121212;color:#fff;">
                            <thead>
                                <tr>
                                    <th class="token" style="text-align: left !important; width:15%">{$custom_token}</th>
                                    <th style="text-align:right !important;width:15%;">{$custom_type}</th>
                                    <th style="text-align:right !important;width:80%;">{$custom_description}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="token">[commission_id]</td>
                                    <td class="typedesc">{$custom_numeric}-16</td>
                                    <td class="typedesc">Unique order ID of the commission</td>
                                </tr>
                                <tr>
                                    <td class="token">[offer_id]</td>
                                    <td class="typedesc">{$custom_numeric}-10</td>
                                    <td class="typedesc">Unique offer ID</td>
                                </tr>
                                <tr>
                                    <td class="token">[creative_id]</td>
                                    <td class="typedesc">{$custom_numeric}-10</td>
                                    <td class="typedesc">Unique offer creative ID</td>
                                </tr>
                                <tr>
                                    <td class="token">[payout]</td>
                                    <td class="typedesc">{$custom_decimal}-20,2</td>
                                    <td class="typedesc">Amount of the commission in EUR</td>
                                </tr>
                                <tr>
                                    <td class="token">[status]</td>
                                    <td class="typedesc">{$custom_numeric}-1</td>
                                    <td class="typedesc">Status of the commission: 1 for approved and 0 for rejected</td>
                                </tr>
                                <tr>
                                    <td class="token">[timestamp]</td>
                                    <td class="typedesc">{$custom_numeric}- 20</td>
                                    <td class="typedesc">UNIX timestamp</td>
                                </tr>
                                <tr>
                                    <td class="token">[sub_id]</td>
                                    <td class="typedesc">{$custom_alphanumeric}-64</td>
                                    <td class="typedesc">Sub Account ID</td>
                                </tr>
                                <tr>
                                    <td class="token">[tid1]</td>
                                    <td class="typedesc">{$custom_alphanumeric}-64</td>
                                    <td class="typedesc">Tracking ID 1</td>
                                </tr>
                                <tr>
                                    <td class="token">[tid2]</td>
                                    <td class="typedesc">{$custom_alphanumeric}-64</td>
                                    <td class="typedesc">Tracking ID 2</td>
                                </tr>
                                <tr>
                                    <td class="token">[tid3]</td>
                                    <td class="typedesc">{$custom_alphanumeric}-64</td>
                                    <td class="typedesc">Tracking ID 3</td>
                                </tr>
                                <tr>
                                    <td class="token">[tid4]</td>
                                    <td class="typedesc">{$custom_alphanumeric}-64</td>
                                    <td class="typedesc">Tracking ID 4</td>
                                </tr>
                                <tr>
                                    <td class="token">[geo]</td>
                                    <td class="typedesc">{$custom_alpha}-2</td>
                                    <td class="typedesc">Country code</td>
                                </tr>
                                <tr>
                                    <td class="token">[click_id]</td>
                                    <td class="typedesc">{$custom_alphanumeric}-64</td>
                                    <td class="typedesc">Unique Click ID</td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
$("input").on("keyup",function() {
  var maxLength = $(this).attr("maxlength");
  if(maxLength == $(this).val().length) {
    swal("{$custom_max_length_reached}\n{$custom_limit_is} " + maxLength + "!")
  }
})
</script>
<script language="javascript" type="text/javascript">
$(function () {
    $('.token').on('click', function (event) {
        var url = $('#e_postback_url');
        var tkn = event.target
        url.val(url.val() + tkn.textContent);
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('.method').select2();
});
</script>