{*
    --------------------------------------------------------------------------------------------------------------
    iDevAffiliate HTML Front-End Template
    --------------------------------------------------------------------------------------------------------------
    Theme Name: Default Theme
    --------------------------------------------------------------------------------------------------------------
*}

{if isset($change_commission)}
    <div class="page-header title" style="background:{$heading_back};">
        <h1 style="color:{$heading_text};">
            {$change_comm_page_title}
        </h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet portlet-basic">
                <div class="portlet-body">

                    {if isset($commission_updated)}             
                    <div class="alert alert-success">
                        {$commission_updated}
                    </div>
                    {/if}

                    <table class="table table-bordered">
                        <tr>
                            <td width="25%">
                                {$change_comm_page_curr_comm}
                            </td>
                            <td width="75%">
                                {$current_style}
                            </td>
                        </tr>

                        <tr>
                            <td width="25%">
                                {$change_comm_page_curr_pay}
                            </td>
                            <td width="75%">
                                {$current_level}
                            </td>
                        </tr>
                    </table>
                    
                    <br/>
                    <br/>

                    {if isset($available)}
                    <form method="POST" action="account.php" class="form-horizontal">
                        <input name="csrf_token" value="{$csrf_token}" type="hidden"/>
                        <input type="hidden" name="changec" value="1">
                        <input type="hidden" name="page" value="19">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                {$change_comm_page_new_comm}
                            </label>

                            <div class="col-sm-6">
                                <select name="type" class="form-control">

                                    {if isset($type_perc)}
                                    <option value="1">
                                        {$index_table_sale}: {$bot1}%
                                    </option>
                                    {/if} 

                                    {if isset($type_flat)}
                                    <option value="2">
                                        {$index_table_sale}: {if $cur_sym_location == 1}{$cur_sym}{/if}{$bot2}{if $cur_sym_location == 2} {$cur_sym}{/if} {$currency}
                                    </option>
                                    {/if}

                                    {if isset($type_clck)}
                                    <option value="3">
                                        {$index_table_click}: {if $cur_sym_location == 1}{$cur_sym}{/if}{$bot3}{if $cur_sym_location == 2} {$cur_sym}{/if} {$currency}
                                    </option>
                                    {/if}
                                
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-inverse">
                                    {$change_comm_page_button}
                                </button>
                            </div>
                        </div>
                        <br/>
                        <div class="alert alert-danger">
                            {$change_comm_page_warning}
                        </div>
                    </form>
                    {else}

                    <div class="alert alert-danger">
                        {$no_styles_available}
                    </div>
                    {/if}
                </div>
            </div>
        </div>
    </div>
{/if}