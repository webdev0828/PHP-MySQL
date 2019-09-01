{*
    --------------------------------------------------------------------------------------------------------------
    iDevAffiliate HTML Front-End Template
    --------------------------------------------------------------------------------------------------------------
    Theme Name: Default Theme
    --------------------------------------------------------------------------------------------------------------
*}

    {if isset($logos_enabled)}
    <div class="page-header title" style="background:{$heading_back};">
        <h1 style="color:{$heading_text};">
            {$logo_title}
        </h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet portlet-basic">
                <div class="portlet-body">

                    {if isset($upload_success)}
                    <div class="alert alert-success">
                        {$success_message}
                    </div>

                    {elseif isset($upload_error)}
                    <div class="alert alert-danger">
                        {$error_message}
                    </div>
                    {/if}

                    {$logo_info}

                    <br/>
                    <br/>

                    <ul>
                        <li>
                            {$logo_bullet_one}
                        </li>
                        
                        <li>
                            {$logo_bullet_two}
                        </li>
                        
                        <li>
                            {$logo_bullet_three}
                        </li>
                        
                        {if isset($logo_size_required)}
                        <li> 
                            {$logo_bullet_req_size_one} {$logo_width} {$logo_bullet_req_size_two} {$logo_height} {$logo_bullet_pixels}
                        </li>
                        
                        {else}
                        <li>
                            {$logo_bullet_size_one} {$logo_width} {$logo_bullet_size_two} {$logo_height} {$logo_bullet_pixels}
                        </li>
                        {/if}
                    </ul>

                    <div class="space-12"></div>

                    <form enctype="multipart/form-data" action="account.php" METHOD="POST" class="form-horizontal">
                        <input name="csrf_token" value="{$csrf_token}" type="hidden"/>
                        <input type="hidden" name="update_logo" value="1">
                        <input type="hidden" name="page" value="27">
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">
                                {$logo_file}
                            </label>

                            <div class="col-sm-10">
                                <input type="file" class="btn btn-default" name="logo">
                            </div>
                        </div>

                        <input class="btn btn-primary" type="submit" value="{$logo_button}"/>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {if isset($image_exists)}
        <div class="row">
            <div class="col-md-12">
                <div class="portlet" style="border-color:{$portlet_4};">
                    <div class="portlet-heading" style="background:{$portlet_4};">
                        <div class="portlet-title" style="color:{$portlet_4_text};">
                            <h4>
                                {$logo_current}
                            </h4>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <b>{$logo_display_status} {$image_status}</b>

                        <br/>

                        [<a href="account.php?page=27&remove_logo={$affiliate_id}">{$logo_remove}</a>] 

                        <br/>
                        <br/>
                        
                        <img style="border: none !important;" src="{$image}" height="{$image_height}" width="{$image_width}">
                    </div>
                </div>
            </div>
        </div>
    {/if}
    {/if}