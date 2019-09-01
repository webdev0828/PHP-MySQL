{*

    --------------------------------------------------------------------------------------------------------------

    iDevAffiliate HTML Front-End Template

    --------------------------------------------------------------------------------------------------------------

    Theme Name: Admin Panel

    --------------------------------------------------------------------------------------------------------------

*}


    {include file='file:header.tpl'}

    <div class="left-area col-md-4 col-lg-2 clearfix nopad sidenav" id="mySidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa fa-close"></i></a>
        <div class="sidebar clearfix"  style="background-color: {$cp_main_menu_color}">
            <form id="language_form" method="POST" action="">
                
                <input name="csrf_token" value="{$csrf_token}" type="hidden"/>
                <input type="hidden" id="idev_language" name="idev_language" value="" />
                <input name="lang_token" value="{$language_token}" type="hidden" />

            </form>
                <ul class="header-nav__social">
                    {section name=nr loop=$language_pack}
                    <li>
                        <a href="#" onclick="document.getElementById('idev_language').value = '{$language_pack[nr].value}'; document.getElementById('language_form').submit(); return false;"><img src="/images/lang_flags/{$language_pack[nr].name}.png" alt="{$language_pack[nr].name}" class="lang_flag"/> <span class="footer_social">{$language_pack[nr].name|replace:'Russian':'Русский'}</span></a>
                    </li>
                    {/section}
                </ul>
            <div class="profile-area clearfix">
                <div class="pf-imgs">
                    <img src="{$picture_details|replace:'assets/pictures':'/assets/pictures'|replace:'images':'/images'}" />
                </div>

                <div class="pf-name">
                    <h4>
                        <i class="fa fa-user fa fw"></i> {$affiliate_username}
                    </h4>
                    <h4>
                        <i class="fa fa-link fa fw"></i> {$affiliate_id}
                    </h4>
                </div>
            </div>

            <nav>
                <ul>
                    {include file='file:menu_left_column.tpl'}
                </ul>
            </nav>
        </div>
    </div>

        {include file='file:footer.tpl'}
