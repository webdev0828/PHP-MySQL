        <nav class="header-nav">

            <a href="#0" class="header-nav__close" title="close"><span>{$custom_close}</span></a>

            <h3>{$custom_navigate_to}</h3>

            <div class="header-nav__content">

<?php echo qtranxf_generateLanguageSelectCode(‘both’); ?>
                
                <ul class="header-nav__list">
                    <li><a href="/#home" title="{$header_indexLink}"><i class="fa fa-home fa-fw"></i> {$header_indexLink}</a></li>
                    <li><a href="/#about" title="{$custom_publishers}"><i class="fa fa-user-circle fa-fw"></i> {$custom_publishers}</a></li>
                    <li><a href="/#services" title="{$custom_advertisers}"><i class="fa fa-user-circle-o fa-fw"></i> {$custom_advertisers}</a></li>
                    <li><a href="/#works" title="{$custom_statistics}"><i class="fa fa-bar-chart fa-fw"></i> {$custom_statistics}</a></li>
                    <li><a href="/blog" title="{$custom_blog}"><i class="fa fa-newspaper fa-fw"></i> {$custom_blog}</a></li>
                <?php if isset($affiliateUsername) { ?>
                <? }else { ?>
                    <li><a href="/login" title="{$custom_login}"><i class="fa fa-sign-in fa-fw"></i> {$custom_login}
                        </a></li>
                <? } ?>
                {if isset($affiliateUsername)}
                    <li><a href="/dashboard" title="{$custom_dashboard}"><i
                                    class="fa fa-dashboard fa-fw"></i> {$custom_dashboard}</a></li>
                {/if}
                {if !isset($affiliateUsername)}
                    <li><a href="/signup" title="{$header_signupLink}" style="color:#532B72;"><i
                                    class="fa fa-user-plus fa-fw"></i> {$header_signupLink}</a></li>
                {/if}
                {if isset($use_faq) && ($faq_location == 1)}
                    <li><a href="/faq" title="{$menu_faq}"><i class="fa fa-question-circle fa-fw"></i> {$menu_faq}
                        </a></li>
                {/if}
                {if isset($contact_form)}
                    <li><a href="/contact" title="{$header_emailLink}"><i
                                    class="fa fa-envelope fa-fw"></i> {$header_emailLink}</a></li>
                {/if}
                {if isset($affiliateUsername)}
                    <li>
                        <a href="/logout" title="{$menu_logout}"><i
                                    class="fa fa-sign-out fa-fw"></i> {$menu_logout}</a>
                    </li>
                {/if}
                </ul>

                <ul class="header-nav__social">
                    <li>
                        <a target="_blank" href="https://www.facebook.com/sublimerevenue"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li>
                        <a target="_blank" href="https://vk.com/sublimerevenue"><i class="fab fa-vk"></i></a>
                    </li>
                    <li>
                        <a target="_blank" href="https://twitter.com/SublimeRevenue"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a target="_blank" href="https://www.instagram.com/sublime_revenue/"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="skype:live:svet0slav?chat"><i class="fab fa-skype"></i></a>
                    </li>
                    <li>
                        <a href="contact.php"><i class="fa fa-envelope"></i></a>
                    </li>
                </ul>

            </div> <!-- end header-nav__content -->

        </nav> <!-- end header-nav -->

        <a class="header-menu-toggle" href="#0">
            <span class="header-menu-icon"></span>
        </a>