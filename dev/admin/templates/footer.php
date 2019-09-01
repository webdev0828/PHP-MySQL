<?php
/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 * @ Release on : 24.03.2018
 * @ Website    : http://EasyToYou.eu
 */

echo "\r\n\r\n\r\n</div>\r\n</div>\r\n</div>\r\n\r\n\r\n";
if (isset($calc_commissions)) {
    echo "\r\n<script type=\"text/javascript\">\r\n//<![CDATA[\r\n\r\nvar commission_total = document.getElementById(\"commission_total\");\r\n\r\nvar commission_primary = document.getElementById(\"commission_primary\");\r\n\r\n";
    for ($i = 1; $i < count($print_overrides); $i++) {
        if ($print_overrides[$i]) {
            echo "var commission_override_" . $i . " = document.getElementById(\"commission_override_" . $i . "\");\n";
        }
    }
    for ($i = 1; $i < count($print_tiers); $i++) {
        if ($print_tiers[$i]) {
            echo "var commission_tier_" . $i . " = document.getElementById(\"commission_tier_" . $i . "\");\n";
        }
    }
    echo "/***********************************************************\r\nCalculate sum of the values initially - also called from re_calc\r\n************************************************************/\r\n\r\nfunction calc_sum(){\r\n\tvar my_sum = parseFloat(commission_primary.value)\r\n";
    for ($i = 1; $i < count($print_overrides); $i++) {
        if ($print_overrides[$i]) {
            echo "    + parseFloat(commission_override_" . $i . ".value) \n";
        }
    }
    for ($i = 1; $i < count($print_tiers); $i++) {
        if ($print_tiers[$i]) {
            echo "    + parseFloat(commission_tier_" . $i . ".value) \n";
        }
    }
    echo "\t;\r\n\t//alert(my_sum);\r\n\r\n\tmy_sum = Math.round(my_sum*100)/100;\r\n\tmy_sum = my_sum.toFixed(2);\r\n\tcommission_total.value = my_sum;\r\n}\r\n\r\n/***********************************************************\r\nReCalculate sum when a value changes\r\n************************************************************/\r\nfunction re_calc(field){\r\n\r\n\tvar new_val = field.value;\r\n\r\n\tif (new_val == parseFloat(new_val))\r\n\t\tcalc_sum();\r\n\telse{\r\n\t\talert(new_val + \" is invalid\");\r\n\t\tfield.focus();\r\n\t}\r\n}\r\n//]]>\r\n</script>\r\n";
}
echo "\r\n<script type=\"text/javascript\">\r\n\$(document).ready(function(){\r\n\tvar div_width = parseInt(\$('.row-bg').width());\r\n\tvar final_div_width = div_width+10;\r\n\t\$('.crumbs').css('width',final_div_width);\r\n\t\r\n\t\$(window).resize(function(){\r\n\t\tvar div_width = parseInt(\$('.row-bg').width());\r\n\t\tvar final_div_width = div_width+10;\r\n\t\t\$('.crumbs').css('width',final_div_width);\r\n\t});\r\n});\r\n\r\n  var colpick = \$('.idevcolorpicker').each( function() {\r\n    \$(this).minicolors({\r\n      control: \$(this).attr('data-control') || 'hue',\r\n      inline: \$(this).attr('data-inline') === 'true',\r\n      letterCase: 'lowercase',\r\n      opacity: false,\r\n      change: function(hex, opacity) {\r\n        if(!hex) return;\r\n        if(opacity) hex += ', ' + opacity;\r\n        try {\r\n          console.log(hex);\r\n        } catch(e) {}\r\n        \$(this).select();\r\n      },\r\n      theme: 'bootstrap'\r\n    });\r\n  });\r\n  \r\nif (window.location.href.match('/setup.php')) \r\n\t\t\r\n\t\t{ \$(\"body\").addClass(\"setup-page\");  } \r\n  \r\n</script>\r\n<script src=\"https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.4/js/utils.js\"></script>\r\n<script src=\"https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.4/js/intlTelInput.min.js\"></script>\r\n<script>\r\n    \$(\"input[name='phone'], input[name='mobile_phone'], input[name='admin_mobile']\").intlTelInput();\r\n\r\n    \$(\"form\").submit(function(e) {\r\n\r\n        var phone = \$(\"input[name='phone']\").intlTelInput(\"getNumber\");\r\n        \$(\"input[name='phone']\").val(phone);\r\n\r\n        var mobile_phone = \$(\"input[name='mobile_phone']\").intlTelInput(\"getNumber\");\r\n        \$(\"input[name='mobile_phone']\").val(mobile_phone);\r\n\r\n        var admin_mobile = \$(\"input[name='admin_mobile']\").intlTelInput(\"getNumber\");\r\n        \$(\"input[name='admin_mobile']\").val(admin_mobile);\r\n\r\n    });\r\n</script>\r\n<script>document.body.innerHTML = document.body.innerHTML.replace(/iDevAffiliate/g, 'Sublime Revenue');document.title = 'Sublime Revenue Administrative Center'</script>\r\n</body>\r\n</html>";

?>