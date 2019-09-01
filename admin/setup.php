<?php

if ($_REQUEST["action"] == 85) {
    define("TRAFFIC_EXCEEDED_EXEMPT", true);
}
include_once "../API/config.php";
include_once "includes/session.check.php";
if (!defined("SITE_KEY")) {
    require_once "../API/keys.php";
}
if (!isset($_REQUEST["action"])) {
    header("Location: dashboard.php");
}
if (isset($_REQUEST["action"])) {
    if ($_REQUEST["action"] == "11" && !isset($_SESSION[$install_directory_name . "_idev_AdminAccount"])) {
        /*
        header("Location: staff_notice.php");
        exit;
        */
    }
    if ($_REQUEST["action"] == "71" && $staff_import_data == "off" && !isset($_SESSION[$install_directory_name . "_idev_AdminAccount"])) {
        header("Location: staff_notice.php");
        exit;
    }
    if ($_REQUEST["action"] == "5" && !isset($_POST["videos_update"])) {
        include "../includes/media/update_video_options.php";
        include "../includes/media/update_video_library.php";
        $get_current_retro_status = $db->query("select stamp, retro from idevaff_video_settings");
        $retro_results = $get_current_retro_status->fetch();
        if ($retro_results["retro"] == "" || $retro_results["retro"] == "active" && $retro_results["stamp"] == "50000") {
            include "../includes/media/check_retro_video_subscription.php";
        }
    }
}
require "templates/header.php";
if (isset($_REQUEST["action"]) && $_REQUEST["action"] == 33) {
    $cp_language = 1;
}
if (isset($_REQUEST["action"])) {
    if ($_REQUEST["action"] == 1) {
        include "includes/general_settings.php";
    } else {
        if ($_REQUEST["action"] == 2) {
            include "includes/integration_profiles.php";
        } else {
            if ($_REQUEST["action"] == 3) {
                include "includes/ip_settings.php";
            } else {
                if ($_REQUEST["action"] == 4) {
                    include "includes/commission_settings.php";
                } else {
                    if ($_REQUEST["action"] == 5) {
                        include "includes/affiliate_videos.php";
                    } else {
                        if ($_REQUEST["action"] == 6) {
                            include "includes/email_templates.php";
                        } else {
                            if ($_REQUEST["action"] == 9) {
                                include "includes/affiliate_panel.php";
                            } else {
                                if ($_REQUEST["action"] == 10) {
                                    include "includes/cart_integration.php";
                                } else {
                                    if ($_REQUEST["action"] == 11) {
                                        include "includes/manage_admins.php";
                                    } else {
                                        if ($_REQUEST["action"] == 14) {
                                            include "includes/config_menu.php";
                                        } else {
                                            if ($_REQUEST["action"] == 15) {
                                                include "includes/terms_conditions.php";
                                            } else {
                                                if ($_REQUEST["action"] == 16) {
                                                    include "includes/customer_tracking.php";
                                                } else {
                                                    if ($_REQUEST["action"] == 17) {
                                                        include "includes/offline_marketing.php";
                                                    } else {
                                                        if ($_REQUEST["action"] == 18) {
                                                            include "includes/performance_rewards.php";
                                                        } else {
                                                            if ($_REQUEST["action"] == 19) {
                                                                include "includes/affiliate_links.php";
                                                            } else {
                                                                if ($_REQUEST["action"] == 21) {
                                                                    include "includes/faq.php";
                                                                } else {
                                                                    if ($_REQUEST["action"] == 30) {
                                                                        include "includes/custom.php";
                                                                    } else {
                                                                        if ($_REQUEST["action"] == 31) {
                                                                            include "includes/email_settings.php";
                                                                        } else {
                                                                            if ($_REQUEST["action"] == 33) {
                                                                                include "includes/language_templates.php";
                                                                            } else {
                                                                                if ($_REQUEST["action"] == 34) {
                                                                                    include "includes/form_fields.php";
                                                                                } else {
                                                                                    if ($_REQUEST["action"] == 35) {
                                                                                        include "includes/affiliate_payment.php";
                                                                                    } else {
                                                                                        if ($_REQUEST["action"] == 36) {
                                                                                            include "includes/tier_settings.php";
                                                                                        } else {
                                                                                            if ($_REQUEST["action"] == 37) {
                                                                                                include "includes/optional_vars.php";
                                                                                            } else {
                                                                                                if ($_REQUEST["action"] == 39) {
                                                                                                    include "includes/config_tracking.php";
                                                                                                } else {
                                                                                                    if ($_REQUEST["action"] == 40) {
                                                                                                        include "includes/ipnlog.php";
                                                                                                    } else {
                                                                                                        if ($_REQUEST["action"] == 41) {
                                                                                                            include "includes/tokens.php";
                                                                                                        } else {
                                                                                                            if ($_REQUEST["action"] == 42) {
                                                                                                                include "includes/delayed_commissions.php";
                                                                                                            } else {
                                                                                                                if ($_REQUEST["action"] == 43) {
                                                                                                                    include "includes/co_branding.php";
                                                                                                                } else {
                                                                                                                    if ($_REQUEST["action"] == 44) {
                                                                                                                        include "includes/api_scripts.php";
                                                                                                                    } else {
                                                                                                                        if ($_REQUEST["action"] == 45) {
                                                                                                                            include "includes/config_idevdirect.php";
                                                                                                                        } else {
                                                                                                                            if ($_REQUEST["action"] == 46) {
                                                                                                                                include "includes/config_adv_functions.php";
                                                                                                                            } else {
                                                                                                                                if ($_REQUEST["action"] == 47) {
                                                                                                                                    include "includes/advanced_tracking.php";
                                                                                                                                } else {
                                                                                                                                    if ($_REQUEST["action"] == 48) {
                                                                                                                                        include "includes/config_var_links.php";
                                                                                                                                    } else {
                                                                                                                                        if ($_REQUEST["action"] == 49) {
                                                                                                                                            include "includes/config_keyword_links.php";
                                                                                                                                        } else {
                                                                                                                                            if ($_REQUEST["action"] == 50) {
                                                                                                                                                include "includes/config_alt_pages.php";
                                                                                                                                            } else {
                                                                                                                                                if ($_REQUEST["action"] == 51) {
                                                                                                                                                    include "includes/fraud_control.php";
                                                                                                                                                } else {
                                                                                                                                                    if ($_REQUEST["action"] == 52) {
                                                                                                                                                        include "includes/external.php";
                                                                                                                                                    } else {
                                                                                                                                                        if ($_REQUEST["action"] == 53) {
                                                                                                                                                            include "includes/fraud_control.php";
                                                                                                                                                        } else {
                                                                                                                                                            if ($_REQUEST["action"] == 54) {
                                                                                                                                                                include "includes/localization.php";
                                                                                                                                                            } else {
                                                                                                                                                                if ($_REQUEST["action"] == 55) {
                                                                                                                                                                    include "includes/override_commissions.php";
                                                                                                                                                                } else {
                                                                                                                                                                    if ($_REQUEST["action"] == 56) {
                                                                                                                                                                        include "includes/can_spam.php";
                                                                                                                                                                    } else {
                                                                                                                                                                        if ($_REQUEST["action"] == 57) {
                                                                                                                                                                            include "includes/config_commission_blocking.php";
                                                                                                                                                                        } else {
                                                                                                                                                                            if ($_REQUEST["action"] == 58) {
                                                                                                                                                                                include "includes/config_user_blocks.php";
                                                                                                                                                                            } else {
                                                                                                                                                                                if ($_REQUEST["action"] == 59) {
                                                                                                                                                                                    include "includes/promo_bonuses.php";
                                                                                                                                                                                } else {
                                                                                                                                                                                    if ($_REQUEST["action"] == 61) {
                                                                                                                                                                                        include "includes/config_email_attachments.php";
                                                                                                                                                                                    } else {
                                                                                                                                                                                        if ($_REQUEST["action"] == 62) {
                                                                                                                                                                                            include "includes/mailing_list.php";
                                                                                                                                                                                        } else {
                                                                                                                                                                                            if ($_REQUEST["action"] == 63) {
                                                                                                                                                                                                include "includes/newsletter_generic.php";
                                                                                                                                                                                            } else {
                                                                                                                                                                                                if ($_REQUEST["action"] == 64) {
                                                                                                                                                                                                    include "includes/coupon_codes.php";
                                                                                                                                                                                                } else {
                                                                                                                                                                                                    if ($_REQUEST["action"] == 65) {
                                                                                                                                                                                                        include "includes/per_product_commissions.php";
                                                                                                                                                                                                    } else {
                                                                                                                                                                                                        if ($_REQUEST["action"] == 66) {
                                                                                                                                                                                                            include "includes/general_sales.php";
                                                                                                                                                                                                        } else {
                                                                                                                                                                                                            if ($_REQUEST["action"] == 67) {
                                                                                                                                                                                                                include "includes/commission_assign.php";
                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                if ($_REQUEST["action"] == 68) {
                                                                                                                                                                                                                    include "includes/network.php";
                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                    if ($_REQUEST["action"] == 69) {
                                                                                                                                                                                                                        include "includes/seo_order_service.php";
                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                        if ($_REQUEST["action"] == 70) {
                                                                                                                                                                                                                            include "includes/tc_report.php";
                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                            if ($_REQUEST["action"] == 71) {
                                                                                                                                                                                                                                include "includes/import_accounts.php";
                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                if ($_REQUEST["action"] == 72) {
                                                                                                                                                                                                                                    include "includes/import_coupons.php";
                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                    if ($_REQUEST["action"] == 73) {
                                                                                                                                                                                                                                        include "includes/form_fields_custom.php";
                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                        if ($_REQUEST["action"] == 75) {
                                                                                                                                                                                                                                            include "includes/system_logs.php";
                                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                                            if ($_REQUEST["action"] == 76) {
                                                                                                                                                                                                                                                include "includes/qr_codes.php";
                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                if ($_REQUEST["action"] == 77) {
                                                                                                                                                                                                                                                    include "includes/custom_functions.php";
                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                    if ($_REQUEST["action"] == 78) {
                                                                                                                                                                                                                                                        include "includes/affiliate_library.php";
                                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                                        if ($_REQUEST["action"] == 79) {
                                                                                                                                                                                                                                                            include "includes/dashboard_content.php";
                                                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                                                            if ($_REQUEST["action"] == 80) {
                                                                                                                                                                                                                                                                include "includes/postback.php";
                                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                                if ($_REQUEST["action"] == 81) {
                                                                                                                                                                                                                                                                    include "includes/social_media_settings.php";
                                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                                    if ($_REQUEST["action"] == 82) {
                                                                                                                                                                                                                                                                        include "includes/custom_pages.php";
                                                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                                                        if ($_REQUEST["action"] == 83) {
                                                                                                                                                                                                                                                                            include "includes/commission_protection.php";
                                                                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                                                                            if ($_REQUEST["action"] == 84) {
                                                                                                                                                                                                                                                                                include "includes/import_coupons.php";
                                                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                                                if ($_REQUEST["action"] == 85) {
                                                                                                                                                                                                                                                                                    include "includes/cloud.php";
                                                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                                                    if ($_REQUEST["action"] == 86) {
                                                                                                                                                                                                                                                                                        include "includes/webhooks.php";
                                                                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                                                                        if ($_REQUEST["action"] == 87) {
                                                                                                                                                                                                                                                                                            include "includes/geo_targeting.php";
                                                                                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                                                                                            if ($_REQUEST["action"] == 88) {
                                                                                                                                                                                                                                                                                                include "includes/manage_plugins.php";
                                                                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                                                                if ($_REQUEST["action"] == 89) {
                                                                                                                                                                                                                                                                                                    include "includes/ga.php";
                                                                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                                                                    if ($_REQUEST["action"] == 90) {
                                                                                                                                                                                                                                                                                                        include "includes/privacy.php";
                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                }
                                                                                                                                                                                                                            }
                                                                                                                                                                                                                        }
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                }
                                                                                                                                                                                                            }
                                                                                                                                                                                                        }
                                                                                                                                                                                                    }
                                                                                                                                                                                                }
                                                                                                                                                                                            }
                                                                                                                                                                                        }
                                                                                                                                                                                    }
                                                                                                                                                                                }
                                                                                                                                                                            }
                                                                                                                                                                        }
                                                                                                                                                                    }
                                                                                                                                                                }
                                                                                                                                                            }
                                                                                                                                                        }
                                                                                                                                                    }
                                                                                                                                                }
                                                                                                                                            }
                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                }
                                                                                                                            }
                                                                                                                        }
                                                                                                                    }
                                                                                                                }
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
include "templates/footer.php";

?>