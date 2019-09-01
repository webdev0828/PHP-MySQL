{*
    --------------------------------------------------------------------------------------------------------------
    iDevAffiliate HTML Front-End Template
    --------------------------------------------------------------------------------------------------------------
    Theme Name: Default Theme
    --------------------------------------------------------------------------------------------------------------
*}

<div class="page-header title" style="background:{$heading_back};">
    <h1 style="color:{$heading_text};">
        {$password_title}
    </h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="portlet portlet-basic">
            <div class="portlet-body">

                {if isset($password_notice)}
                <div class="alert alert-success">
                    {$password_notice}
                </div>

                {elseif isset($password_warning)}
                <div class="alert alert-danger">
                    {$password_warning}
                </div>
                {/if}

                <form method="POST" action="account.php" class="form-horizontal">
                    <input name="csrf_token" value="{$csrf_token}" type="hidden"/>
                    <input type="hidden" name="change_password" value="1">
                    <input type="hidden" name="page" value="18">
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label" style="font-weight: normal !important;">
                            {$password_new_password}
                        </label>

                        <div class="col-sm-6">
                            <div class="input-group">
                                <input class="form-control" type="password" name="pass2">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" data-target="#modal-1" data-toggle="modal">
                                        <i class="fa fa-question-circle"></i>
                                    </button>
                                </span>

                                <div class="modal fade" id="modal-1" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="{$modal_close}">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>

                                                <h4 class="modal-title">
                                                    {$help_new_password_heading}
                                                </h4>
                                            </div>

                                            <div class="modal-body">
                                                <p>
                                                    {$help_new_password_info}
                                                </p>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    {$modal_close}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" style="font-weight: normal !important;">
                            {$password_confirm_password}
                        </label>

                        <div class="col-sm-6">
                            <div class="input-group">
                                <input class="form-control" type="password" name="pass3">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" data-target="#modal-2" data-toggle="modal">
                                        <i class="fa fa-question-circle"></i>
                                    </button>
                                </span>

                                <div class="modal fade" id="modal-2" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="{$modal_close}">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title">
                                                    {$help_confirm_password_heading}
                                                </h4>
                                            </div>

                                            <div class="modal-body">
                                                <p>
                                                    {$help_confirm_password_info}
                                                </p>
                                            </div>
                                            
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    {$modal_close}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-inverse">
                                {$marketing_button}
                                {$password_button}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>