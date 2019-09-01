{*
--------------------------------------------------------------------------------------------------------------
SR HTML Front-End Template
--------------------------------------------------------------------------------------------------------------
Theme Name: Admin Panel
--------------------------------------------------------------------------------------------------------------
*}

    <div class="page-header title col-md-12 nopad" style="background:#000;">
        <h1 style="color:#fff;">
            <i class="fa fa-server fa-fw"></i> S2S Postback NEW
        </h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet portlet-basic">
                <div class="portlet-body">

    <div class="content-white-area">
        
        {if isset($display_edit_errors)}
        <div class="alert alert-danger">
            <h4>{$error_title}</h4>

            {$error_list}
        </div>
        {/if}
        
        {if isset($edit_success)}
        <div class="alert alert-success">
            {$edit_success}
        </div>
        {/if}
       
        <form method="POST" action="/dashboard/postback/settings" class="form-horizontal" id="postback_edit_form">
            
            <input name="csrf_token" value="{$csrf_token}" type="hidden"/>
            <input type="hidden" name="postback_edit" value="1">
            <input type="hidden" name="page" value="30">

            <div class="row">
                <div class="col-md-12">
                    <div class="portlet" style="border-color:{$portlet_1};">
                        <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), {$portlet_3};">
                            <div class="portlet-title" style="color:{$portlet_1_text};">
                                <h4>
                                    <i class="fa fa-link fa fw"></i> Action Notification
                                </h4>
                            </div>
                        </div>

                        <div class="portlet-body">

                            <div class="form-group">
                                <label class="col-sm-1 control-label" style="font-weight:normal;">URL</label>
                                <!-- hide ping
                                <input class="btn btn-primary" type="submit" value="Ping">
                                -->
                                <div class="col-sm-10">
									<input type="text" class="form-control" name="e_postback_url" size="60" placeholder="{$e_postback_url}" value="{$e_postback_url}">
                            	</div>
                                <div class="col-sm-1">
                                    <input class="btn btn-primary" type="submit" value="Submit">
                                </div>
                            </div>
<!--
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                
                                <div class="col-sm-6">
                                    <input class="btn btn-primary" type="submit" value="Submit">
                                </div>
                            </div>
-->
                        </div>
                    </div>
                </div>
            </div>

        </form>

            <div class="row">
                <div class="col-md-12">
                    <div class="portlet" style="border-color:{$portlet_1};">
                        <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), {$portlet_3};">
                            <div class="portlet-title" style="color:{$portlet_1_text};">
                                <h4>
                                    <i class="fa fa-hashtag fa fw"></i> Tokens
                                </h4>
                            </div>
                        </div>

                <table class="table table-bordered table-hover tc-table" style="background: #121212;color:#fff;">
                    <thead>
                        <tr>
                            <th style="text-align:left !important;width:20%;">Token</th>
                            <th style="text-align:right !important;width:10%;">Type</th>
                            <th style="text-align:right !important;width:70%;">Description</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td style="text-align:left !important;width:20%;">[unique_id]</td>
                            <td style="text-align:right !important;">Numeric-16</td>
                            <td style="text-align:right !important;">Unique order ID of the commission</td>
                        </tr>
<!--
                        <tr>
                            <td style="text-align:left !important;width:20%;">[aff_id]</td>
                            <td style="text-align:right !important;">int(10)</td>
                            <td style="text-align:right !important;">Your unique affiliate ID</td>
                        </tr>
                        <tr>
                            <td style="text-align:left !important;width:20%;">[offer_id]</td>
                            <td style="text-align:right !important;">int(10)</td>
                            <td style="text-align:right !important;">Unique offer ID</td>
                        </tr>
                        <tr>
                            <td style="text-align:left !important;width:20%;">[set_id]</td>
                            <td style="text-align:right !important;">int(10)</td>
                            <td style="text-align:right !important;">Unique offer set ID</td>
                        </tr>
                        <tr>
                            <td style="text-align:left !important;width:20%;">[link_id]</td>
                            <td style="text-align:right !important;">int(10)</td>
                            <td style="text-align:right !important;">Unique offer link ID</td>
                        </tr>
-->
                    	<tr>
                    		<td style="text-align:left !important;width:20%;">[payout]</td>
                    		<td style="text-align:right !important;">Decimal-20,2</td>
                    		<td style="text-align:right !important;">Amount of the commission in EUR</td>
                    	</tr>
                        <tr>
                            <td style="text-align:left !important;width:20%;">[status]</td>
                            <td style="text-align:right !important;">Numeric-1</td>
                            <td style="text-align:right !important;">Status of the commission: 1 for approved and 0 for rejected</td>
                        </tr>
                        <tr>
                            <td style="text-align:left !important;width:20%;">[timestamp]</td>
                            <td style="text-align:right !important;">Numeric- 20</td>
                            <td style="text-align:right !important;">UNIX timestamp</td>
                        </tr>
                        <tr>
                            <td style="text-align:left !important;width:20%;">[sub_id]</td>
                            <td style="text-align:right !important;">Alphanumeric-64</td>
                            <td style="text-align:right !important;">Sub Account ID</td>
                        </tr>
                        <tr>
                            <td style="text-align:left !important;width:20%;">[tid1]</td>
                            <td style="text-align:right !important;">Alphanumeric-64</td>
                            <td style="text-align:right !important;">Tracking ID 1</td>
                        </tr>
                        <tr>
                            <td style="text-align:left !important;width:20%;">[tid2]</td>
                            <td style="text-align:right !important;">Alphanumeric-64</td>
                            <td style="text-align:right !important;">Tracking ID 2</td>
                        </tr>
                        <tr>
                            <td style="text-align:left !important;width:20%;">[tid3]</td>
                            <td style="text-align:right !important;">Alphanumeric-64</td>
                            <td style="text-align:right !important;">Tracking ID 3</td>
                        </tr>
                        <tr>
                            <td style="text-align:left !important;width:20%;">[tid4]</td>
                            <td style="text-align:right !important;">Alphanumeric-64</td>
                            <td style="text-align:right !important;">Tracking ID 4</td>
                        </tr>
                        <tr>
                            <td style="text-align:left !important;width:20%;">[geo]</td>
                            <td style="text-align:right !important;">Alpha-2</td>
                            <td style="text-align:right !important;">Country code</td>
                        </tr>
                    </tbody>
                </table>

<!-- 
TODO: Add this to DataTables / maybe, better use click DataTables cell click to fill url input field with JS
                        <div class="portlet-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;">Tracking Domain</label>

                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="tracking_domain" size="30" value="{$tracking_domain}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;">Unique Order Number</label>

                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="oder_number" size="30" value="{$oder_number}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;">Unique Offer ID</label>

                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="offer_id" size="30" value="{$offer_id}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;">Payout</label>

                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="payout" size="30" value="{$payout}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;">Status</label>

                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="status" size="30" value="{$status}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;">Sub ID</label>

                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="sub_id" size="30" value="{$sub_id}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;">Tracking ID 1</label>

                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="tid1" size="30" value="{$tid1}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;">Tracking ID 2</label>

                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="tid2" size="30" value="{$tid2}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;">Tracking ID 3</label>

                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="tid3" size="30" value="{$tid3}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;">Tracking ID 4</label>

                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="tid4" size="30" value="{$tid4}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;">GEO</label>

                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="geo" size="30" value="{$geo}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                
                                <div class="col-sm-6">
                                    <input class="btn btn-primary" type="submit" value="Apply"> - Apply to top url.
                                </div>
                            </div>
                        </div>
-->
                    </div>
                </div>
            </div>
    </div>
                </div>
            </div>
        </div>
    </div>