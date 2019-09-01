    {*
        --------------------------------------------------------------------------------------------------------------
        iDevAffiliate HTML Front-End Template
        --------------------------------------------------------------------------------------------------------------
        Theme Name: Default Theme
        --------------------------------------------------------------------------------------------------------------
    *}

    {include file='file:header.tpl'}

    {if isset($maintenance_mode)}
    <div class="row">
        <div class="col-md-12" style="margin-top: 25px !important;">
            <div class="portlet" style="border-color:{$portlet_5};">
                <div class="portlet-heading" style="background:{$portlet_5};">
                    <div class="portlet-title" style="color:{$portlet_5_text};">
                        <h4>
                            {$signup_maintenance_heading}
                        </h4>
                    </div>
                </div>

                <div class="portlet-body">
                    <p>
                        {$signup_maintenance_info}
                    </p>
                </div>
            </div>
        </div>
    </div>

    {else}
    <div class="page-header title" style="background:{$heading_back};">
        <h1 style="color:{$heading_text};">
            {$signup_left_column_title}
        </h1>
    </div>

    {if isset($signup_complete)}
    <div class="row">
        <div class="col-md-12">
            <div class="portlet" style="border-color:{$portlet_6};">
                <div class="portlet-heading" style="background:{$portlet_6};">
                    <div class="portlet-title" style="color:{$portlet_6_text};">
                        <h4>
                            {$signup_page_success}
                        </h4>
                    </div>
                </div>

                <div class="portlet-body">
                    <div class="alert alert-success">
                        {$signup_success_email_comment}
                    </div>

                    <a href="account.php" class="btn btn-success">
                        {$signup_success_login_link}
                    </a>
                </div>
            </div>
        </div>
    </div>
            
    <!-- Start Google Analytics -->
    {$ga_signup}
    <!-- End Google Analytics -->
            
    {else}
    {if isset($display_signup_errors)}
    <div class="row">
        <div class="col-md-12">
            <div class="portlet" style="border-color:{$portlet_5};">
                <div class="portlet-heading" style="background:{$portlet_5};">
                    <div class="portlet-title" style="color:{$portlet_5_text};">
                        <h4>{$error_title}</h4>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="alert alert-danger">{$error_list}</div>
                </div>
            </div>
        </div>
    </div>
    {/if}

    {if !isset($signup_complete) && !isset($display_signup_errors)}
    <div class="row">
        <div class="col-md-12">
            <div class="portlet portlet-basic">
                <div class="portlet-body">
                    <p>
                        {$signup_left_column_text}
                    </p>
                </div>
            </div>
        </div>
    </div>
    {/if}

    {if isset($idev_facebook_enabled) && !isset($display_signup_errors)}
        {include file='file:signup_facebook.tpl'}
    {/if}

        {if !isset($idev_facebook_required)}
        <form class="form-horizontal" action="signup.php" method="POST" id="signup_form">
            <input name="csrf_token" value="{$csrf_token}" type="hidden" />
            <input type="hidden" value="1" name="submit1"/>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet" style="border-color:{$portlet_1};">
                        <div class="portlet-heading" style="background:{$portlet_1};">
                            <div class="portlet-title" style="color:{$portlet_1_text};">
                                <h4>
                                    {$signup_login_title}
                                </h4>
                            </div>
                        </div>

                        <div class="portlet-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">
                                    {$signup_login_username}
                                    <span style="color: #CC0000;">*</span>
                                </label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="username"  value="{if isset($postuser)}{$postuser}{/if}" tabindex="1" />
                                        
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" data-target="#modal-1" data-toggle="modal">
                                                <i class="fa fa-question-circle"></i>
                                            </button>
                                        </span>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">
                                    {$signup_login_password}
                                    <span style="color: #CC0000;">*</span>
                                </label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" value="{if isset($postpass)}{$postpass}{/if}" tabindex="2" autocomplete="off" />

                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" data-target="#modal-1" data-toggle="modal">
                                                <i class="fa fa-question-circle"></i>
                                            </button>
                                        </span>

                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="modal-1" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <button type="button" class="close" data-dismiss="modal" aria-label="{$modal_close}">
                                                <span aria-hidden="true">&times;</span>
                                            </button>

                                            <h4 class="modal-title">
                                                {$signup_login_username} & {$signup_login_password}
                                            </h4>
                                        </div>

                                        <div class="modal-body">
                                            <p>
                                                {$signup_login_minmax_chars}
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

                            <div class="form-group">
                                <label class="col-md-3 control-label">
                                    {$signup_login_password_again} 
                                    <span style="color: #CC0000;">*</span>
                                </label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password_c" value="{$postpasc}" tabindex="3" autocomplete="off" />
                                        
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" data-target="#modal-2" data-toggle="modal">
                                                <i class="fa fa-question-circle"></i>
                                            </button>
                                        </span>
                                    
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="modal-2" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="{$modal_close}">
                                                <span aria-hidden="true">&times;</span>
                                            </button>

                                            <h4 class="modal-title">
                                                {$signup_login_password_again}
                                            </h4>
                                        </div>

                                        <div class="modal-body">
                                            <p>
                                                {$signup_login_must_match}
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
                        </div>
                    </div>
                </div>
            </div>
            
            {if isset($optionals_used)}
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet" style="border-color:{$portlet_1};">
                        <div class="portlet-heading" style="background:{$portlet_1};">
                            <div class="portlet-title" style="color:{$portlet_1_text};">
                                <h4>
                                    {$signup_standard_title}
                                </h4>
                            </div>
                        </div>

                        <div class="portlet-body">

                            {if isset($row_email)}
                            <div class="form-group">
                                <label class="col-md-3 control-label">
                                    {$signup_standard_email}

                                    {if isset($required_notice_email)} 
                                    <span style="color: #CC0000;">*</span>
                                    {/if}

                                </label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="email" value="{$postemail}" tabindex="4" />
                                </div>
                            </div>
                            {/if}

                            {if isset($row_company)}
                            <div class="form-group">
                                <label class="col-md-3 control-label">
                                    {$signup_standard_company}

                                    {if isset($required_notice_company)} 
                                    <span style="color: #CC0000;">*</span>
                                    {/if}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="company" value="{$postcompany}" tabindex="5" />
                                </div>
                            </div>
                            {/if}

                            {if isset($row_checks)}
                            <div class="form-group">
                                <label class="col-md-3 control-label">
                                    {$signup_standard_checkspayable}

                                    {if isset($required_notice_checkspayable)} 
                                    <span style="color: #CC0000;">*</span>
                                    {/if}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="payable" value="{$postchecks}" tabindex="6" />
                                </div>
                            </div>
                            {/if}

                            {if isset($row_website)}
                            <div class="form-group">
                                <label class="col-md-3 control-label">
                                    {$signup_standard_weburl}

                                    {if isset($required_notice_weburl)} 
                                    <span style="color: #CC0000;">*</span>
                                    {/if}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="url" value="{$postwebsite}" tabindex="7" style="direction: ltr !important;" />
                                </div>
                            </div>
                            {/if}

                            {if isset($row_taxinfo)}
                            <div class="form-group">
                                <label class="col-md-3 control-label">
                                    {$signup_standard_taxinfo}

                                    {if isset($required_notice_taxinfo)} 
                                    <span style="color: #CC0000;">*</span>
                                    {/if}
                                </label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="tax_id_ssn" value="{$posttax}" tabindex="8" />
                                </div>
                            </div>
                            {/if}

                        </div>
                    </div>
                </div>
            </div>
            {/if}

            {if isset($standards_used)}
            <div class="row">
            <div class="col-md-12">
                <div class="portlet" style="border-color:{$portlet_1};">
                    <div class="portlet-heading" style="background:{$portlet_1};">
                        <div class="portlet-title" style="color:{$portlet_1_text};">
                            <h4>
                                {$signup_personal_title}
                            </h4>
                        </div>
                    </div>
                    <div class="portlet-body">
                        {if isset($row_fname)}
                        <div class="form-group">
                            <label class="col-md-3 control-label">
                                {$signup_personal_fname}

                                {if isset($required_notice_fname)} 
                                <span style="color: #CC0000;">*</span>
                                {/if}
                            </label>
                            
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="f_name" value="{$postfname}" tabindex="9" />
                            </div>
                        </div>
                        {/if}

                        {if isset($row_lname)}
                        <div class="form-group">
                            <label class="col-md-3 control-label">
                                {$signup_personal_lname}

                                {if isset($required_notice_lname)} 
                                <span style="color: #CC0000;">*</span>
                                {/if}
                            </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="l_name"  value="{$postlname}"  tabindex="10" />
                            </div>
                        </div>
                        {/if}

                        {if isset($row_addr1)}
                        <div class="form-group">
                            <label class="col-md-3 control-label">
                                {$signup_personal_addr1}

                                {if isset($required_notice_ad1)} 
                                <span style="color: #CC0000;">*</span>
                                {/if}
                            </label>
                            
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address_one"  value="{$postaddr1}"  tabindex="11" />
                            </div>
                        </div>
                        {/if}

                        {if isset($row_addr2)}
                        <div class="form-group">
                            <label class="col-md-3 control-label">
                                {$signup_personal_addr2}

                                {if isset($required_notice_ad2)} 
                                <span style="color: #CC0000;">*</span>
                                {/if}
                            </label>
                            
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address_two"  value="{$postaddr2}"  tabindex="12" />
                            </div>
                        </div>
                        {/if}

                        {if isset($row_city)}
                        <div class="form-group">
                            <label class="col-md-3 control-label">
                                {$signup_personal_city}

                                {if isset($required_notice_city)} 
                                <span style="color: #CC0000;">*</span>
                                {/if}
                            </label>
                            
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="city"  value="{$postcity}"  tabindex="13" />
                            </div>
                        </div>
                        {/if}

                        {if isset($row_state)}
                        <div class="form-group">
                            <label class="col-md-3 control-label">
                                {$signup_personal_state}

                                {if isset($required_notice_state)} 
                                <span style="color: #CC0000;">*</span>
                                {/if}
                            </label>
                            
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="state"  value="{$poststate}"  tabindex="14" />
                            </div>
                        </div>
                        {/if}

                        {if isset($row_phone)}
                        <div class="form-group">
                            <label class="col-md-3 control-label">
                                {$signup_personal_phone}

                                {if isset($required_notice_phone)} 
                                <span style="color: #CC0000;">*</span>
                                {/if}
                            </label>
                            
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone"  value="{$postphone}"  tabindex="15" />
                            </div>
                        </div>
                        {/if}

                        {if isset($row_fax)}
                        <div class="form-group">
                            <label class="col-md-3 control-label">
                                {$signup_personal_fax}

                                {if isset($required_notice_fax)} 
                                <span style="color: #CC0000;">*</span>
                                {/if}
                            </label>
                            
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="fax"  value="{$postfaxnm}"  tabindex="16" />
                            </div>
                        </div>
                        {/if}

                        {if isset($row_zip)}
                        <div class="form-group">
                            <label class="col-md-3 control-label">
                                {$signup_personal_zip}

                                {if isset($required_notice_zip)} 
                                <span style="color: #CC0000;">*</span>
                                {/if}
                            </label>
                            
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="zip"  value="{$postzip}"  tabindex="17" />
                            </div>
                        </div>
                        {/if}

                        {if isset($row_countries)}
                        <div class="form-group">
                            <label class="col-md-3 control-label">
                                {$signup_personal_country} 
                                
                                <span style="color: #CC0000;">*</span>
                            </label>

                            <div class="col-md-6">
                                <select class="form-control" name="country">
                                    {$c_drop}
                                </select>
                            </div>
                        {/if}
                        </div>
                    </div>
                </div>
            </div>
        {/if}

        {if isset($payment_choice_used)}
            {include file='file:signup_payment_choices.tpl'}
        {/if}

        {*
        {if isset($paypal_required)}
        {include file='file:signup_paypal_required.tpl'}
        {/if}
        {if isset($paypal_optional)}
        {include file='file:signup_paypal_optional.tpl'}
        {/if}
        *}

        {include file='file:signup_payment_methods.tpl'}
        
        {if isset($terms_conditions)}
            {include file='file:signup_terms.tpl'}
        {/if}

        {if isset($privacy_signup)}
            {include file='file:signup_privacy.tpl'}
        {/if}

        {if isset($canspam_conditions)}
            {include file='file:signup_canspam.tpl'}
        {/if}

        {if isset($insert_custom_fields)}
            {include file='file:signup_custom.tpl'}
        {/if}

        {if isset($security_required)}
            {if $security_required}
                {include file='file:signup_security_code.tpl'}
            {/if}
        {/if}
                
        <div class="row">
            <div class="col-md-offset-3 col-md-9">
                <button type="submit" class="btn btn-primary">
                    {$signup_page_button}
                </button>
            </div>
        </div>

        <div class="space-30"></div>
        
        {/if}

    </form>
    {/if}
    {/if}

    {include file='file:footer.tpl'}
