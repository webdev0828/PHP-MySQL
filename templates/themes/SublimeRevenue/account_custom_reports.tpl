{*
    --------------------------------------------------------------------------------------------------------------
    SublimeRevenue HTML Front-End Template
    --------------------------------------------------------------------------------------------------------------
    Theme Name: Dark
    --------------------------------------------------------------------------------------------------------------
*}


{if isset($custom_tracking_enabled)}
    <div class="page-header title" style="background:{$heading_back};">
        <h1 style="color:{$heading_text};">
            {$cr_title}
        </h1>
    </div>

    <div class="panel-group col-md-12 ">
        <div class="panel panel-default" style="border-color:{$portlet_1};">
            <div class="panel-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), {$portlet_1};">
                <h4 class="panel-title" style="color:{$portlet_1_text};" data-toggle="collapse">
                    {$cr_title}<span class="pull-right"></span>
                </h4>
            </div>

            <div i class="tid-form panel-collapse collapse in clearfix">
                <form class="form-horizontal" role="form" method="post" action="account.php">
                    
                    <input name="csrf_token" value="{$csrf_token}" type="hidden"/>
                    <input type="hidden" name="custom_report" value="1">
                    <input type="hidden" name="page" value="36">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <select name='tid1' class='form-control'>
                                
                                {if isset($tid1_set)}
                                <option value='none'>TID1: {$cr_select}</option>
                            
                                {section name=nr loop=$get1_results}
                                <option value='{$get1_results[nr].tid1_value}'>{$get1_results[nr].tid1_value}</option>
                                {/section}
                                
                                {else}
                                <option value='none'>TID1: {$cr_none}</option>
                                {/if}

                            </select>
                        </div>

                        <div class="col-md-6">
                            <select name='tid2' class='form-control'>
                                
                                {if isset($tid2_set)}
                                <option value='none'>TID2: {$cr_select}</option>
                                
                                {section name=nr loop=$get2_results}
                                <option value='{$get2_results[nr].tid2_value}'>{$get2_results[nr].tid2_value}</option>
                                {/section}
                                
                                {else}
                                <option value='none'>TID2: {$cr_none}</option>
                                {/if}

                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <select name='tid3' class='form-control'>
                                
                                {if isset($tid3_set)}
                                <option value='none'>TID3: {$cr_select}</option>
                                
                                {section name=nr loop=$get3_results}
                                <option value='{$get3_results[nr].tid3_value}'>{$get3_results[nr].tid3_value}</option>
                                {/section}
                                
                                {else}
                                <option value='none'>TID3: {$cr_none}</option>
                                {/if}

                            </select>
                        </div>

                        <div class="col-md-6">
                            <select name='tid4' class='form-control'>
                                
                                {if isset($tid4_set)}
                                <option value='none'>TID4: {$cr_select}</option>
                                
                                {section name=nr loop=$get4_results}
                                <option value='{$get4_results[nr].tid4_value}'>{$get4_results[nr].tid4_value}</option>
                                {/section}
                                
                                {else}
                                <option value='none'>TID4: {$cr_none}</option>
                                {/if}

                            </select>
                        </div>
                    </div>

                    <div>
                        <input class="btn btn-primary" type="submit" value="{$cr_button}">
                    </div>
                </form>
            </div>
        </div>
    </div>

    {if isset($custom_logs_exist)}
    <div class="panel-group col-md-12 ">
        <div class="panel panel-default" style="border-color:{$portlet_1};">
            <div class="panel-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), {$portlet_1};">
                <h4 class="panel-title" style="color:{$portlet_1_text};" data-toggle="collapse">
                    {$report_total_links} {$cr_unique}<span class="pull-right"></span>
                </h4>
            </div>

            <div i class="panel-collapse collapse in clearfix">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="60%">
                                <strong>{$cr_used}</strong>
                            </th>
                            
                            <th width="15%">
                                <strong>{$cr_found}</strong>
                            </th>
                            
                            <th width="25%">
                                <strong>{$cr_detailed}</strong>
                            </th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        {section name=nr loop=$report_results}
                        <form method="POST" action="export/export.php">
                            
                            <input name="csrf_token" value="{$csrf_token}" type="hidden"/>
                            <input type="hidden" name="export" value="1">
                            <input type="hidden" name="custom_links_report" value="1">
                            <input type="hidden" name="linkid" value="{$affiliate_id}">
                            <input type="hidden" name="tid1" value="{$report_results[nr].report_tid1}">
                            <input type="hidden" name="tid2" value="{$report_results[nr].report_tid2}">
                            <input type="hidden" name="tid3" value="{$report_results[nr].report_tid3}">
                            <input type="hidden" name="tid4" value="{$report_results[nr].report_tid4}">
                            
                            <tr>
                                <td width="60%">
                                    {$report_results[nr].report_keywords|replace:'#CC0000':'#532B72'}
                                </td>
                                
                                <td width="15%">
                                    {$report_results[nr].report_links} {$cr_times}
                                </td>
                                
                                <td width="25%">
                                    <input type="submit" value="{$cr_export}" class="btn btn-xs btn-primary">
                                </td>
                            </tr>
                        </form>
                        {/section}
                    </tbody>
                </table>
            </div>


        </div>
    </div>
    {elseif isset($no_results_found)}
        <div class="portlet-body">
            <font color="#532B72">{$cr_no_results}</font><BR/>{$cr_no_results_info}
        </div>
    {/if}

{/if}
