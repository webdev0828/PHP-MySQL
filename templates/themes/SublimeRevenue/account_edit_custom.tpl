{*
    --------------------------------------------------------------------------------------------------------------
    SublimeRevenue HTML Front-End Template
    --------------------------------------------------------------------------------------------------------------
    Theme Name: Dark
    --------------------------------------------------------------------------------------------------------------
*}


    {if isset($fields_custom_array)}
    <div class="row">
        <div class="col-md-12">
            <div class="portlet" style="border-color:{$portlet_3};">
                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), {$portlet_3};">
                    <div class="portlet-title" style="color:{$portlet_1_text};">
                        <h4>
                            <i class="fa fa-euro fa fw"></i> {$custom_fields_title} - {$res_method|replace:'10':'Check'|replace:'8':'ePayService'|replace:'11':'TransferWise'|replace:'9':'WebMoney'|replace:'12':'Wire Transfer EU'|replace:'13':'WireTransfer US'}
                        </h4>
                    </div>
                </div>

                <div class="portlet-body">
                    
                    {foreach from=$fields_custom_array item=fields}
    {if empty($fields.custom_value)}
    {else}
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="font-weight:normal;">{$fields.custom_title|replace:'(Check) ':''|replace:'(ePayService) ':''|replace:'(TransferWise) ':''|replace:'(WireTransfer EU) ':''|replace:'(WireTransfer US) ':''|replace:'(WebMoney) ':''}</label>

                            <div class="col-md-7">
                                <label class="col-md-5 control-label" style="text-align: left;">{$fields.custom_value}</label>
                            </div>
                        </div>
                    </div>
    {/if}
                    {/foreach}

                </div>
            </div>
        </div>
    </div>
    {/if}