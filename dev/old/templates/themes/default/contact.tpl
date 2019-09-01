{*
    --------------------------------------------------------------------------------------------------------------
    iDevAffiliate HTML Front-End Template
    --------------------------------------------------------------------------------------------------------------
    Theme Name: Default Theme
    --------------------------------------------------------------------------------------------------------------
*}

    {include file='file:header.tpl'}
    
    <div class="page-header title" style="background:{$heading_back};">
        <h1 style="color:{$heading_text};">
            {$contact_title_display}
        </h1>
    </div>
    
    {if (isset($contact_form))}
    <form class="form-horizontal" role="form" method="post" action="contact.php">
        <input name="csrf_token" value="{$csrf_token}" type="hidden" />
        <input type="hidden" name="email_contact" value="1">
        
        <div class="row">
            <div class="col-md-12">
                <div class="portlet portlet-basic">
                    <div class="portlet-body">

                        {if isset($display_contact_errors)}
                        <div class="alert alert-danger">
                            <h4>
                                {$error_title}
                            </h4>

                            {$error_list}
                        </div>
                        {/if}

                        {if isset($contact_email_received)}
                        <div class="alert alert-success">
                            {$contact_received_display}
                        </div>
                        {/if}

                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                {$contact_name_display}
                            </label>
                            
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="{$contact_name_display}" value="{$contact_name}" name="name" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                {$contact_email_display}
                            </label>

                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="{$contact_email_display}" value="{$contact_email}" name="email" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                {$contact_message_display}
                            </label>

                            <div class="col-sm-6">
                                <textarea name="message" class="form-control" rows="6">{$contact_message}</textarea>
                            </div>
                        </div>

                        {if isset($security_required)}
                        {if $security_required}
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    {$signup_security_code}
                                </label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="{$signup_security_code}" name="security_code" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-offset-3 col-sm-6">
                                    {$captcha_image}
                                </div>
                            </div>
                        {/if}
                        {/if}
                    </div>

                    <div class="portlet-footer">
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-primary">
                                    {$contact_button_display}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {/if}

    {include file='file:footer.tpl'}
    