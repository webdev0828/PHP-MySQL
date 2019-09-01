{*
    --------------------------------------------------------------------------------------------------------------
    iDevAffiliate HTML Front-End Template
    --------------------------------------------------------------------------------------------------------------
    Theme Name: Blue Crush
    --------------------------------------------------------------------------------------------------------------
*}


    {if isset($sub_affiliates_enabled)}
    <div class="page-header title" style="background:{$heading_back};">
        <h1 style="color:{$heading_text};">
            {$sub_tracking_title}
        </h1>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="portlet portlet-basic">
                <div class="portlet-body">
                    <div class="alert alert-warning" style="color:{$gb_text_color};">
                        {$sub_tracking_info}
                    </div>
                    
                    <input class="form-control" type="text" name="sub_link" value="{$sub_affiliate_linkurl}"/>
                    
                    <br/>

                    {$sub_tracking_build}

                    <br/> 

                    {$sub_tracking_example}: {$sub_affiliate_sample_link}<font color="#CC0000">&sub_id=123</font>

                    <br/>
                    <br/>

                    <a href="http://www.idevlibrary.com/docs/Custom_Links.pdf" target="_blank" class="btn btn-primary">{$sub_tracking_tutorial}</a>
                </div>
            </div>
        </div>
    </div>
    {/if}