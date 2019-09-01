{*
    --------------------------------------------------------------------------------------------------------------
    iDevAffiliate HTML Front-End Template
    --------------------------------------------------------------------------------------------------------------
    Theme Name: Admin Panel
    --------------------------------------------------------------------------------------------------------------
*}


    {if isset($fields_custom_array)}
    <div class="row">
        <div class="col-md-12">
            <div class="portlet" style="border-color:{$portlet_1};">
                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), {$portlet_1};">
                    <div class="portlet-title" style="color:{$portlet_1_text};">
                        <h4>
                            {$custom_fields_title}
                        </h4>
                    </div>
                </div>

                <div class="portlet-body">
                    
                    {foreach from=$fields_custom_array item=fields}
                    <form class="form-horizontal" role="form" method="post" action="account.php">
                        
                        <input name="csrf_token" value="{$csrf_token}" type="hidden"/>
                        <input type="hidden" name="custom_id" value="{$fields.group_id}">
                        <input type="hidden" name="page" value="17">
                        <input type="hidden" name="id" value="{$fields.linkid}">
                        <input type="hidden" name="id_update" value="{$fields.entry_id}">
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="font-weight:normal;">{$fields.custom_title}</label>

                            <div class="col-sm-5">
                                <input class="form-control" type="text" name="custom_value" value="{$fields.custom_value}">
                            </div>
                            
                            <div class="col-sm-4">
                                <input class="btn btn-sm btn-primary" type="submit" value="{$edit_custom_button}">
                            </div>
                        </div>
                    </form>
                    {/foreach}

                </div>
            </div>
        </div>
    </div>
    {/if}