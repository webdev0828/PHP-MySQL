{*
    --------------------------------------------------------------------------------------------------------------
    iDevAffiliate HTML Front-End Template
    --------------------------------------------------------------------------------------------------------------
    Theme Name: Default Theme
    --------------------------------------------------------------------------------------------------------------
*}

    <div class="page-header title" style="background:{$heading_back};">
        <h1 style="color:{$heading_text};">
            {$testi_title}
        </h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet portlet-basic">
                <div class="portlet-body">

                    {if isset($display_testimonial_success)}
                    <div class="widget-content padding">
                        <div class="alert alert-success">
                            <h4>
                                {$testimonial_success_title}
                            </h4>

                            {$testimonial_success_message}
                        </div>
                    </div>
                    {/if}

                    {if isset($testimonials) && !isset($display_testimonial_success)} {if isset($display_testimonial_errors)}
                    <div class="alert alert-danger">
                        <h4>
                            {$testimonial_error_title}
                        </h4>

                        {$testimonial_error_list}
                    </div>
                    {/if}

                    <p>
                        {$testi_description}
                    </p>
                    
                    <br/>
                    
                    <form action="account.php" class="form-horizontal" role="form" method="post">
                        <input name="csrf_token" value="{$csrf_token}" type="hidden"/>
                        <input type="hidden" name="create_testimonial" value="1">
                        <input type="hidden" name="page" value="41">
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="font-weight: normal !important;">
                                {$testi_name}
                            </label>

                            <div class="col-sm-6">
                                <input class="form-control" type="text" name="submit_name" value="{$submit_name}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="font-weight: normal !important;">
                                {$testi_url}
                            </label>

                            <div class="col-sm-6">
                                <input class="form-control" type="text" name="submit_website" value="{$submit_website}" style="direction: ltr !important;">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="font-weight: normal !important;">
                                {$testi_content}
                            </label>
                            
                            <div class="col-sm-6">
                                <textarea name="submit_testimonial" class="form-control" rows="6">{$submit_testimonial}</textarea>
                            </div>
                        </div>

                        {if isset($testimonials_security)}
                        {if $testimonials_security}
                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="font-weight: normal !important;">
                                {$testi_code}
                            </label>
                            
                            <div class="col-sm-3">
                                <input class="form-control" id="security_code" name="security_code" type="text"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="font-weight: normal !important;"></label>

                            <div class="col-sm-6">
                                {$testimonial_captcha}
                            </div>
                        </div>
                        {/if}
                        {/if}

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-primary" name="iDevAffiliate">
                                    {$testi_submit}
                                </button>
                            </div>
                        </div>
                    </form>
                    {/if}
                </div>
            </div>
        </div>
    </div>