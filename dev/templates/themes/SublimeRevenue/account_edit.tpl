{*
    --------------------------------------------------------------------------------------------------------------
    iDevAffiliate HTML Front-End Template
    --------------------------------------------------------------------------------------------------------------
    Theme Name: Admin Panel
    --------------------------------------------------------------------------------------------------------------
*}

            {if isset($edit_success)}
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert-box hideit alert-success">
                            {$edit_success}
                            <i class="fa fa-times alert-box__close" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            {/if}
            {if isset($display_edit_errors)}
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert-box hideit alert-danger">
                            <h4>{$error_title}</h4>
                            {$error_list}
                            
                            <i class="fa fa-times alert-box__close" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            {/if}

    <div class="page-header title col-md-12 nopad" style="background:#000;">
        <h1 style="color:#fff;">
            <i class="fa fa-edit fa-fw"></i> {$edit_button}
        </h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet portlet-basic">
                <div class="portlet-body">
    <div class="content-white-area">

        {include file='file:account_edit_custom.tpl'}
        
        <form method="POST" action="/dashboard/manage-account/edit-account" class="form-horizontal" id="account_edit_form">
            
            <input name="csrf_token" value="{$csrf_token}" type="hidden"/>
            <input type="hidden" name="edit" value="1">
            <input type="hidden" name="page" value="17">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet" style="border-color:{$portlet_3};">
                        <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), {$portlet_3};">
                            <div class="portlet-title" style="color:{$portlet_1_text};">
                                <h4>
                                    <i class="fa fa-user fa-fw"></i> {$account_edit_general_prefs}
                                </h4>
                            </div>
                        </div>

                        <div class="portlet-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>

                                <div class="col-sm-6">
                                    {include file='file:account_edit_email_preferences.tpl'}
                                </div>
                            </div>

                            {if isset($optionals_used)}
                            {if isset($row_email)}
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>
                                <div class="col-sm-6">
                                	<div class="input-group input-group-bgp">
                                    	<input type="text" class="form-control" name="email" size="30" value="{$postemail}" placeholder="{$edit_standard_email}" tabindex="4">
                                    	<i style="text-shadow: none !important;" class="fa fa-at fa-fw" aria-hidden="true"></i>
                                	</div>
                                </div>
                            </div>
                            {/if}

                            {if isset($row_company)}
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>
                                <div class="col-sm-6">
                                	<div class="input-group input-group-bgp">
                                    	<input type="text" class="form-control" name="company" size="30" value="{$postcompany}" placeholder="{$edit_standard_company}" tabindex="5">
                                    	<i style="text-shadow: none !important;" class="fa fa-building fa-fw" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            {/if}

{*                             {if isset($row_checks)}
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>
                                <div class="col-sm-6">
                                	<div class="input-group input-group-bgp">
                                    	<input type="text" class="form-control" name="payable" size="30" value="{$postchecks}" placeholder="{$edit_standard_checkspayable}" tabindex="6">
                                    	<i style="text-shadow: none !important;" class="fa fa-link fa-fw" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            {/if} *}

                            {if isset($row_website)}
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>
                                <div class="col-sm-6">
                                	<div class="input-group input-group-bgp">
                                    	<input type="text" class="form-control" name="url" size="30" value="{$postwebsite}" placeholder="{$edit_standard_weburl}" tabindex="7">
                                    	<i style="text-shadow: none !important;" class="fa fa-link fa-fw" aria-hidden="true"></i>
                                	</div>
                                </div>
                            </div>
                            {/if}

                            {if isset($row_taxinfo)}
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>
                                <div class="col-sm-6">
                                	<div class="input-group input-group-bgp">
                                    	<input type="text" class="form-control" name="tax_id_ssn" size="30" value="{$posttax}" placeholder="{$edit_standard_taxinfo}" tabindex="8">
                                    	<i style="text-shadow: none !important;" class="fa fa-id-card fa-fw" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            {/if}
                            {/if}

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="portlet" style="border-color:{$portlet_3};">
                        <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), {$portlet_3};">
                            <div class="portlet-title" style="color:{$portlet_1_text};">
                                <h4>
                                    <i class="fa fa-user fa-fw"></i> {$edit_personal_title}
                                </h4>
                            </div>
                        </div>

                        <div class="portlet-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>
                                <div class="col-sm-6">
                                	<div class="input-group input-group-bgp">
	                                    <input type="text" class="form-control" name="f_name" value="{$postfname}" placeholder="{$edit_personal_fname}" tabindex="9">
    	                                <i style="text-shadow: none !important;" class="fa fa-address-card fa-fw" aria-hidden="true"></i>
    	                            </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>
                                <div class="col-sm-6">
                                	<div class="input-group input-group-bgp">
                                    	<input type="text" class="form-control" name="l_name" value="{$postlname}" placeholder="{$edit_personal_lname}" tabindex="10">
                                    	<i style="text-shadow: none !important;" class="fa fa-address-card fa-fw" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>
                                <div class="col-sm-6">
                                	<div class="input-group input-group-bgp">
                                    	<input type="text" class="form-control" name="phone" value="{$postphone}" placeholder="{$edit_personal_phone}" tabindex="15">
                                    	<i style="text-shadow: none !important;" class="fa fa-address-card fa-fw" aria-hidden="true"></i>
                                	</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>
                                <div class="col-sm-6">
                                	<div class="input-group input-group-bgp">
                                    	<input type="text" class="form-control" name="fax" value="{$postfaxnm}" placeholder="{$edit_personal_fax}" tabindex="16">
                                    	<i style="text-shadow: none !important;" class="fa fa-address-card fa-fw" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>

                                <div class="col-sm-6">
                                	<div class="input-group input-group-bgp">
                                    	<input type="text" class="form-control" name="address_one" value="{$postaddr1}" placeholder="{$edit_personal_addr1}" tabindex="11">
                                    	<i style="text-shadow: none !important;" class="fa fa-address-card fa-fw" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>

                                <div class="col-sm-6">
                                	<div class="input-group input-group-bgp">
                                    	<input type="text" class="form-control" name="address_two" value="{$postaddr2}" placeholder="{$edit_personal_addr2}" tabindex="12">
                                    	<i style="text-shadow: none !important;" class="fa fa-address-card fa-fw" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>

                                <div class="col-sm-6">
                                	<div class="input-group input-group-bgp">
                                    	<input type="text" class="form-control" name="city" value="{$postcity}" placeholder="{$edit_personal_city}" tabindex="13">
                                    	<i style="text-shadow: none !important;" class="fa fa-address-card fa-fw" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>

                                <div class="col-sm-6">
                                	<div class="input-group input-group-bgp">
                                    	<input type="text" class="form-control" name="state" value="{$poststate}" placeholder="{$edit_personal_state}" tabindex="14">
                                    	<i style="text-shadow: none !important;" class="fa fa-address-card fa-fw" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>

                                <div class="col-sm-6">
                                	<div class="input-group input-group-bgp">
                                    	<input type="text" class="form-control" name="zip" value="{$postzip}" placeholder="{$edit_personal_zip}" tabindex="17">
                                    	<i style="text-shadow: none !important;" class="fa fa-address-card fa-fw" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>

                                <div class="col-sm-6">
                                    <select name="country" id="country" class="form-control">
                                    	<option></option>
                                        {$c_drop}
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                
                                <div class="col-sm-6">
                                    <button class="btn btn-primary" type="submit" value="{$edit_button}">{$edit_button}</button>
                                </div>
                            </div>
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
{literal}
<script type="text/javascript">
$(document).ready(function() {
    $('#email_language').select2({minimumResultsForSearch: Infinity, placeholder: "{/literal}{$account_edit_email_language}{literal}",allowClear: true});
    $('#country').select2({placeholder: "{/literal}{$edit_personal_country}{literal}",allowClear: true});
});
</script>
{/literal}