{*
    --------------------------------------------------------------------------------------------------------------
    iDevAffiliate HTML Front-End Template
    --------------------------------------------------------------------------------------------------------------
    Theme Name: Default Theme
    --------------------------------------------------------------------------------------------------------------
*}


    <div class="page-header title" style="background:{$heading_back};">
        <h1 style="color:{$heading_text};">
            {$qr_code_title}
        </h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet portlet-basic">
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet" style="border-color:{$portlet_3};">
                                <div class="portlet-heading" style="background:{$portlet_3};">
                                    <div class="portlet-title" style="color:{$portlet_3_text};">
                                        <h4>
                                            {$choose_marketing_group}
                                        </h4>
                                    </div>
                                </div>

                                <div class="portlet-body">
                                    <form class="form-horizontal" role="form" method="post" action="account.php">
                                        <input name="csrf_token" value="{$csrf_token}" type="hidden"/>
                                        <input type="hidden" name="page" value="42">
                                        
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">
                                                {$marketing_group_title}
                                            </label>

                                            <div class="col-sm-6">
                                                <select name="qr_picked" class="form-control selectpicker">

                                                    {section name=nr loop=$qr_results}
                                                    <option value="{$qr_results[nr].qr_group_id}">
                                                        {$qr_results[nr].qr_group_name}
                                                    </option>
                                                    {/section}

                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">
                                                {$qr_code_size}
                                            </label>

                                            <div class="col-sm-6">
                                                <select id="select-search-hide" name="qr_code_size" class="form-control width300">
                                                    <option value="58"{if ($size_only) == '58'} selected{/if}>58 X 58</option>
                                                    <option value="87"{if ($size_only) == '87'} selected{/if}>87 X 87</option>
                                                    <option value="116"{if ($size_only) == '116'} selected{/if}>116 X 116</option>
                                                    <option value="174"{if ($size_only) == '174'} selected{/if}>174 X 174</option>
                                                    <option value="232"{if ($size_only) == '232'} selected{/if}>232 X 232</option>
                                                    <option value="290"{if ($size_only) == '290'} selected{/if}>290 X 290</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-6">
                                                <button type="submit" class="btn btn-primary">
                                                    {$qr_code_button}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {if isset($qr_group_chosen)}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet" style="border-color:{$portlet_4};">
                                <div class="portlet-heading" style="background:{$portlet_4};">
                                    <div class="portlet-title" style="color:{$portlet_4_text};">
                                        <h4>
                                            {$marketing_group_title}: {$qr_chosen_group_name}
                                        </h4>
                                    </div>
                                </div>

                                <div class="portlet-body">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <label>
                                                {$marketing_target_url}:
                                            </label>

                                            <a href="{$target_url}" target="_blank">
                                                {$target_url}
                                            </a>
                                        </li>
                                        
                                        <li class="list-group-item">
                                            <label>
                                                {$qr_image}
                                            </label>
                                        </li>

                                        <li class="list-group-item">
                                            <label>
                                                {$qr_code_offline_title}
                                            </label>

                                            <br/>

                                            {$qr_code_offline_content1}
                                            
                                            <br/>

                                            {$qr_code_offline_content2}
                                        </li>
                                        
                                        <li class="list-group-item">
                                            <label style="width: 100% !important;">
                                                {$qr_code_online_title}
                                            </label>

                                            <br/>

                                            {$qr_code_online_content}
                                            
                                            <br/>
                                            <br/>

                                            <textarea rows="4" class="form-control"><a href="{$url_only}" target="_blank"><img src="{$base_url}{$image_only}" style="border: none !important;" height="{$size_only}" width="{$size_only}"/></a></textarea>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    {/if}

                </div>
            </div>
        </div>
    </div>