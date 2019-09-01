{*
    --------------------------------------------------------------------------------------------------------------
    iDevAffiliate HTML Front-End Template
    --------------------------------------------------------------------------------------------------------------
    Theme Name: Blue Crush
    --------------------------------------------------------------------------------------------------------------
*}


    <div class="page-header title" style="background:{$heading_back};">
        <h1 style="color:{$heading_text};">
            {$menu_text_links}
        </h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet portlet-basic">
                <div class="portlet-body">
                    
                    {if isset($one_click_delivery)}
                    {section name=nr loop=$textlink_link_results}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet" style="border-color:{$portlet_4};">
                                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), {$portlet_4};">
                                    <div class="portlet-title" style="color:{$portlet_4_text};">
                                        <h4>
                                            {$marketing_group_title}: {$textlink_link_results[nr].textlink_group_name}
                                        </h4>
                                    </div>
                                </div>

                                <div class="portlet-body">
                                    <ul class="list-group">

                                        <li class="list-group-item">
                                            <label>{$textlink_name}:</label> {$textlink_link_results[nr].textlink_link_text}
                                        </li>

                                        <li class="list-group-item">
                                            <label>{$marketing_target_url}:</label>
                                            <a href="{$textlink_link_results[nr].textlink_target_url}" target="_blank"{$tl_rel_values}>{$textlink_link_results[nr].textlink_target_url}</a>
                                        </li>

                                        <li class="list-group-item">
                                            <label style="width:100%;">{$marketing_source_code}</label>

                                            <br/>

                                            <textarea rows="2" class="form-control"><a href="{$textlink_link_results[nr].textlink_link_url}" target="_blank"{$tl_rel_values}>{$textlink_link_results[nr].textlink_link_text}</a></textarea>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    {/section}

                    {else}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet" style="border-color:{$portlet_3};">
                                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), {$portlet_3};">
                                    <div class="portlet-title" style="color:{$portlet_3_text};">
                                        <h4>
                                            {$choose_marketing_group}
                                        </h4>
                                    </div>
                                </div>

                                <div class="portlet-body">
                                    <form class="form-horizontal" role="form" method="post" action="account.php">
                                        
                                        <input name="csrf_token" value="{$csrf_token}" type="hidden"/>
                                        <input type="hidden" name="page" value="9">
                                        
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">{$marketing_group_title}</label>
                                            
                                            <div class="col-sm-6">
                                                <select name="textlinks_picked" class="form-control">
                                                    
                                                    {section name=nr loop=$textlink_results}
                                                    <option value="{$textlink_results[nr].textlink_group_id}">{$textlink_results[nr].textlink_group_name}</option>
                                                    {/section}

                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-6">
                                                <button type="submit" class="btn btn-primary">
                                                    {$marketing_button} {$menu_text_links}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {if isset($textlink_group_chosen)}
                    {section name=nr loop=$textlink_link_results}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet" style="border-color:{$portlet_4};">
                                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), {$portlet_4};">
                                    <div class="portlet-title" style="color:{$portlet_4_text};">
                                        <h4>
                                            {$marketing_group_title}: {$textlink_chosen_group_name}
                                        </h4>
                                    </div>
                                </div>

                                <div class="portlet-body">
                                    <ul class="list-group">

                                        <li class="list-group-item">
                                            <label>{$textlink_name}:</label> {$textlink_link_results[nr].textlink_link_text}
                                        </li>
                                        
                                        <li class="list-group-item">
                                            <label>{$marketing_target_url}:</label> 
                                            <a href="{$textlink_link_results[nr].textlink_target_url}" target="_blank"{$tl_rel_values}>{$textlink_link_results[nr].textlink_target_url}</a>
                                        </li>
                                        
                                        <li class="list-group-item">
                                            <label style="width:100%;">{$marketing_source_code}</label>

                                            <br/>

                                            <textarea rows="2" class="form-control"><a href="{$textlink_link_results[nr].textlink_link_url}" target="_blank"{$tl_rel_values}>{$textlink_link_results[nr].textlink_link_text}</a></textarea>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    {/section}
                    {else}
                        {* turn this text on if you want *} {* <legend style="color:{$legend};">{$marketing_no_group}</legend> *} {* <p><b>{$marketing_choose}</b><BR /><BR />{$marketing_notice}<BR /><BR /><BR /></p> *}
                    {/if}
                    {/if}
                    
                </div>
            </div>
        </div>
    </div>