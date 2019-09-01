{*
--------------------------------------------------------------------------------------------------------------
iDevAffiliate HTML Front-End Template
--------------------------------------------------------------------------------------------------------------
Theme Name: Default Theme
--------------------------------------------------------------------------------------------------------------
*}

    <nav class="navbar-top{if isset($cp_fixed_navbar)} fixed{/if}" role="navigation" style="background-color: {$header_background};">
        <div class="navbar-inner {if !isset($cp_page_width)} container{/if}">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".top-collapse">
                    <i class="fa fa-bars"></i>
                </button>

                <div class="navbar-brand col-md-12">

                    {if isset($main_logo)}
                    <a href="index.php" class="brand">
                        <img class="img-responsive" src="{$main_logo}" alt="{$sitename} - {$header_title}" style="border: none !important;">
                    </a>
                    {/if}
                </div>
            </div>

            <div class="nav-top">
                <form id="language_form" method="POST">
                    <input name="csrf_token" value="{$csrf_token}" type="hidden" />
                    <input type="hidden" id="idev_language" name="idev_language" value="" />
                    <input name="lang_token" value="{$language_token}" type="hidden" />
                </form>

                <ul class="nav lang navbar-right {if isset($cp_fixed_navbar)}mobileFix{/if}">
                    <li class="dropdown" style="background-color: {$top_menu_background};">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="user-info" style="color: {$top_menu_text};">
                                {$language_selected}
                            </span>

                            <b class="caret"></b>
                        </a>

                        <ul class="dropdown-menu">
                            {section name=nr loop=$language_pack}
                            <li>
                                <a href="#" onclick="document.getElementById( 'idev_language' ).value = '{$language_pack[nr].value}'; document.getElementById( 'language_form' ).submit(); return false;">
                                    {$language_pack[nr].name}
                                </a>
                            </li>

                            {if not $smarty.section.nr.last}
                            <!--<li class="divider"></li>-->
                            {/if}

                            {/section}
                        </ul>
                    </li>
                </ul>

                {if isset($affiliateUsername)}
                <ul class="nav user-information navbar-right {if isset($cp_fixed_navbar)}mobileFix{/if}">
                    <li class="dropdown" style="background-color: {$top_menu_background};">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="user-info" style="color: {$top_menu_text};">
                                {$affiliate_firstname} {$affiliate_lastname}
                            </span>

                            <b class="caret"></b>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="account.php?page=17">
                                    {$menu_drop_edit}
                                </a>
                            </li>

                            <li>
                                <a href="account.php?page=48">
                                    {$payment_settings}
                                </a>
                            </li>

                            <li>
                                <a href="account.php?page=18">
                                    {$menu_drop_password}
                                </a>
                            </li>

                            {if isset($change_commission)}
                            <!--<li class="divider"></li>-->
                            
                            <li>
                                <a href="account.php?page=19">
                                    {$menu_drop_change}
                                </a>
                            </li>
                            {/if}

                            {if isset($pic_upload)}
                            <!--<li class="divider"></li>-->

                            <li>
                                <a href="account.php?page=43">
                                    {$menu_upload_picture}
                                </a>
                            </li>
                            {/if}

                            {if isset($logos_enabled)}
                            <!--<li class="divider"></li>-->
                            
                            <li>
                                <a href="account.php?page=27">
                                    {$menu_drop_heading_logo}
                                </a>
                            </li>
                            {/if}
                            
                            {if isset($use_faq) && ($faq_location == 2)}
                            <!--<li class="divider"></li>-->
                            
                            <li>
                                <a href="account.php?page=21">
                                    {$menu_drop_heading_faq}
                                </a>
                            </li>
                            {/if}
                            
                            {if isset($testimonials)}
                            <!--<li class="divider"></li>-->

                            <li>
                                <a href="account.php?page=41">
                                    {$menu_offer_testi}
                                </a>
                            </li>
                            {/if}
                            
                            <!--<li class="divider"></li>-->
                            
                            <li>
                                <a href="index.php?logout=true">
                                    <i class="fa fa-power-off"></i> 
                                    {$menu_logout}
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                {/if}

                <div class="collapse navbar-collapse top-collapse mobileFix">
                    <ul class="nav navbar-left navbar-nav">
                        <li style="background-color: {$top_menu_background};">
                            <a href="index.php">
                                <span style="color: {$top_menu_text};">
                                    {$header_indexLink}
                                </span>
                            </a>
                        </li>

                        <li style="background-color: {$top_menu_background};">
                            <a href="account.php">
                                <span style="color: {$top_menu_text};">
                                    {$header_accountLink}
                                </span>
                            </a>
                        </li>
                        
                        {if !isset($affiliateUsername)}
                        <li style="background-color: {$top_menu_background};">
                            <a href="signup.php">
                                <span style="color: {$top_menu_text};">
                                    {$header_signupLink}
                                </span>
                            </a>
                        </li>
                        {/if}
                        
                        {if isset($contact_form)}
                        <li style="background-color: {$top_menu_background};">
                            <a href="contact.php">
                                <span style="color: {$top_menu_text};">
                                    {$header_emailLink}
                                </span>
                            </a>
                        </li>
                        {/if}
                        
                        {if isset($use_faq) && ($faq_location == 1)}
                        <li style="background-color: {$top_menu_background};">
                            <a href="faq.php">
                                <span style="color: {$top_menu_text};">
                                    {$menu_faq}
                                </span>
                            </a>
                        </li>
                        {/if}
                        
                        {if isset($testimonials) && (isset($testimonials_active))}
                        <li style="background-color: {$top_menu_background};">
                            <a href="testimonials.php">
                                <span style="color: {$top_menu_text};">
                                    {$header_testimonials}
                                </span>
                            </a>
                        </li>
                        {/if}

                    </ul>
                </div>
            </div>
        </div>
    </nav>