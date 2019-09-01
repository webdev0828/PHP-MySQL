<?PHP

//-------------------------------------------------------
	  $language_pack_name = "arabic";
	  $language_pack_table_name = "arabic";
//-------------------------------------------------------
	try {
		$query = $db->prepare("SELECT COUNT(*) from idevaff_language_packs where table_name = ?");
		$query->execute(array($language_pack_table_name));
	} catch ( Exception $ex ) {
		echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
		die;
	}

if (!$query->fetchColumn()) {

//-------------------------------------------------------
// LANGUAGE CONTENT
//-------------------------------------------------------
$header_title = "برامج الانتساب ";
$header_indexLink = "الرئيسية الإنتساب ";
$header_signupLink = "سجل الآن";
$header_accountLink = "إدارة الحساب ";
$header_emailLink = "اتصل بنا";
$header_greeting = "مرحبا";
$header_nonLogged = "زائر ";
$header_logout = "تسجيل خروج ";
$footer_tag = "iDevAffiliateبرمجيات الانتساب من ";
$footer_copyright = "حقوق النشر ";
$footer_rights = "جميع الحقوق محفوظة";
$index_heading_1 = "مرحبا بك في برامجنا المدمجة!";
$index_paragraph_1 = "برامجنا مجانية الاشتراك, سهلة التسجيل ولا تتطلب أية معرفة تقنية  برامج الانتساب أمر متداول عبر الإنترنت، بحيث يوفر الفرصة لأصحاب المواقع للاستفادة أكثر من مواقعهم.الانتساب  تخلق كثافة ومبيعات بالنسبة للمواقع التجارية  وتتلقى بالمقابل ربحا ماديا.";
$index_heading_2 = "كيف تعمل?";
$index_paragraph_2 = "عند انضمامك إلى برامجنا الانتسابية , سوف نزودك بعدد من اللوحات الإعلانية والروابط النصية التي تضعها في موقعك عندما ينقر المتصفح على إحدى الروابط , سوف يتم توجيهه إلى موقعنا وسيتم تعقب نشاطه من طرف برامجنا . ومن ثم ستحصل على مقابل \"إحصائيات وتقارير في الزمن الفعلى!";
$index_heading_3 = "تقارير و إحصائيات الوقت الفعلى!";
$index_paragraph_3 = ".سجل دخولك 24 ساعة في اليوم، وشاهد مبيعاتك وكثافة النشاط، ورصيد أموالك ، وأداء لوحات إعلاناتك";
$index_login_title = "الدخول إلى الانتساب";
$index_login_username = "اسم المستخدم";
$index_login_password = "كلمة السر ";
$index_login_username_field = "اسم المستخدم";
$index_login_password_field = "كلمة السر";
$index_login_button = "سجل الدخول";
$index_login_signup_link = "اضغط هنا للتسجيل";
$index_table_title = " تفاصيل البرنامج ";
$index_table_commission_type = "نوع العمولة";
$index_table_initial_deposit = "الوديعة الأولية";
$index_table_requirements = "شروط الدفع ";
$index_table_duration = "مدة الدفع";
$index_table_choose = "اختر من طرق الدفع هذه!";
$index_table_sale = " دفع عن كل بيع ";
$index_table_click = " دفع عن كل نقرة ";
$index_table_sale_text = " في كل بيع تؤديه.";
$index_table_click_text = " في كل نقرة بواسطة مستخدم.";
$index_table_deposit_tag =  "لمجرد التسجيل!";
$index_table_requirements_tag = "الحد الأدنى من الرصيد من أجل الدفع.";
$index_table_duration_tag = "الدفعات تكون مرة في الشهر وتخص الشهر الماضي";
$signup_left_column_text = "!انضم إلى برامجنا الانتسابية واحصل على المال من كل بيع يأتي عن طريقك ببساطة افتح حساب وأضف الروابط ثم شاهد رصيدك المالي يكبر وزوار موقعك يصبحون زبائننا!";
$signup_left_column_title = "!مرحبا";
$signup_login_title = "افتح حسابك ";
$signup_login_username = "اسم المستخدم";
$signup_login_password = "كلمة السر ";
$signup_login_password_again = "كلمة السر مرة أخرى ";
$signup_login_minmax_chars = "- اسم المستخدم يجب ألا يقل عن pass_min_chars أحرف.&lt;br /&gt;- من الممكن أن يحتوي اسم المستخدم على حروف وأرقام.&lt;br /&gt;- من الممكن أن يحتوي اسم المستخدم على هذه الرموز:_ (الشرطة السفلية)&lt;br /&gt;&lt;br /&gt;- كلمة المرور يجب ألا تقل عن pass_min_chars أحرف.&lt;br /&gt;- من الممكن أن تحتوي كلمة المرور على حروف وأرقام.&lt;br /&gt;- نت الممكن أن تحتوي كلمة المرور على الرموز التالية:  characters_allowed";
$signup_login_must_match = "هذا المدخل يجب أن يطابق مدخل كلمة السر.";
$signup_standard_title = "معلومات عامة";
$signup_standard_email = "البريد الالكتروني";
$signup_standard_company = " اسم الشركة";
$signup_standard_checkspayable = "سندات باي بال إلى";
$signup_standard_weburl = "عنوان الموقع";
$signup_standard_taxinfo = "الرقم الضريبي، SSN or VAT ";
$signup_personal_title = "المعلومات الشخصية";
$signup_personal_fname = "الاسم";
$signup_personal_state = "المدينة أو المقاطعة";
$signup_personal_lname = "اللقب";
$signup_personal_phone = "رقم الهاتف";
$signup_personal_addr1 = "عنوان البريدي";
$signup_personal_fax = " رقم الفاكس ";
$signup_personal_addr2 = "عنوان بريدي إضافي";
$signup_personal_zip = "الرقم البريدي zip";
$signup_personal_city = "المدينة";
$signup_personal_country = "البلد";
$signup_commission_title = "دفع العمولة";
$signup_commission_howtopay = "كيف ينبغي لنا أن ندفع لك?";
$signup_commission_style_PPS = "دفع كل بيع";
$signup_commission_style_PPC = "دفع كل نقرة";
$signup_terms_title = "الشروط والأحكام";
$signup_terms_agree = "لقد قرأت وفهمت ووافقت على الشروط والأحكام المذكورة أعلاه.";
$signup_page_button = "انشئ حسابي";
$signup_success_email_comment = "لقد أرسلنا لك إيميل باسم المستخدم الذي يخصك وكلمة السر .<BR />\r\nYou يجب أن تحفظها في مكان آمن من أجل الرجوع إليها في المستقبل.";
$signup_success_login_link = " سجل الدخول إلى حسابك";
$custom_fields_title = " حقول المستخدم المعرفة";
$logout_msg = "<b> أنت الآن خارج حسابك Out</b><BR /> شكرا لمشاركتك في برامجنا المدمجة.";
$signup_page_success = " لقد تم إنشاء حسابك";
$login_left_column_title = " سجل الدخول";
$login_left_column_text = " أدخل اسم المستخدم وكلمة السر لتتمكن من الدخول إلى احصائيات حسابك ولوحاتك الإعلانية وروابطك النصية، الأسئلة المتكررة، وأكثر .<BR/ ><BR/ > إذا لم تستطع تذكر كلمة السر اكتب اسم المستخدم وسنرسل لك معلومات الدخول على بريدك ";
$login_title = " سجل الدخول إلى حسابك ";
$login_username = "اسم المستخدم";
$login_password = "كلمة السر ";
$login_invalid = "تسجيل دخول غير صحيح";
$login_now = "سجل الدخول إلى حسابي";
$login_send_title = "هل تحتاج كلمة السر الخاصة بك?";
$login_send_username = "اسم المستخدم";
$login_send_info = "تم إرسال معلومات الدخول إلى بريدك ";
$login_send_pass = " إرسال إلى البريد الإلكترونى";
$login_send_bad = " اسم المستخدم غير موجود";
$help_new_password_heading = " كلمة سر جديدة";
$help_new_password_info = "كلمة مرورك يجب ألا تقل عن pass_min_chars أحرف. كما يجب أن تحتوي فقط على حروف، وأرقام والرموز التالية:  characters_allowed";
$help_confirm_password_heading = " تأكيد كلمة السر ";
$help_confirm_password_info = " مدخل كلمة السر يجب أن يطابق مدخل كلمة السر الجديدة.";
$help_custom_links_heading = " الكلمات المفتاحية للتعقب";
$help_custom_links_info = " الكلمات المفتاحية لا يمكن أن تتعدى 30 حرفا في الحجم، يمكن أن تتضمن حروفا,أرقاما أو شرطة.";
$error_title = " الخطأ التالي تم اكتشافه ";
$username_invalid = " اسم المستخدم غير صحيح. يسمح فقط بالحروف، والأرقام والشرطات السفلية.";
$username_taken = " اسم المستخدم الذي اخترته قد تم اختياره من قبل.";
$username_short = " اسم المستخدم قصير جدا، يجب أن يكون على الأقل بحجم user_min_chars ";
$username_long = " اسم المستخدم طويل جدا يجب أن يكون على الأكثر بحجم user_max_chars.";
$password_invalid = " كلمة المرورغير صحيحة. يسمح فقط بالحروف، والأرقام والرموز التالية:  characters_allowed";
$password_short = " كلمة السر قصيرة جدا، يجب أن تكون على الأقل بحجم pass_min_chars.";
$password_long = "كلمة السر طويل جدا يجب أن تكون على الأكثر بحجم pass_max_chars.";
$password_mismatch = "إدخالك لكلمة السر ليس مطابقا.";
$missing_checks = "من فضلك ادخل اسم المدفوع له لتكتب السندات باسمه.";
$missing_tax = "من فضلك أدخل رقمك الضريبي.";
$missing_fname = "من فضلك أدخل اسمك.";
$missing_lname = "من فضلك أدخل لقبك.";
$missing_email = " من فضلك أدخل عنوانك الإلكتروني.";
$invalid_email = " عنوانك الالكتروني خاطئ.";
$missing_address = "من فضلك أدخل عنوانك البريدي ";
$missing_city = "من فضلك أدخل اسم مدينتك.";
$missing_company = " من فضلك أدخل اسم شركتك.";
$missing_state = "من فضلك أدخل اسم ولايتك أو مقاطعتك.";
$missing_zip = " من فضلك أدخل الرقم البريدي zip.";
$missing_phone = " من فضلك أدخل رقم هاتفك.";
$missing_website = " من فضلك أدخل موقعك.";
$missing_paypal = " لقد اخترت تسلم الدفع عن طريق باي بال من فضلك أدخل حساب باي بال.";
$missing_terms = " لم توافق على أحكامنا وشروطنا.";
$paypal_required = " حساب باي بال ضروري من أجل الدفع.";
$missing_custom = " من فضلك أكمل ملئ الخانة المذكورة:";
$account_total_transactions = " مجموع التحويلات ";
$account_standard_linking_code = " رمز الرابط القياسى-رائع للاستعمال في الرسائل الإلكترونية!";
$account_copy_paste = " نسخ/لصق الرمز المذكور في الأعلى إلى موقعك الالكتروني وبريدك الإلكترونى ";
$account_not_approved = " حسابك الآن ينتظر الموافقة ";
$account_suspended = " حسابك موقوف حاليا ";
$account_standard_earnings = " الأرباح العادية ";
$account_inc_bonus = " بالإضافة إلى العلاوة ";
$account_second_tier = " فئات الأرباح ";
$account_recurring = " الأرباح المتكررة ";
$account_not_available = " لا يوجد ";
$account_earned_todate = " مجموع الأرباح إلى اليوم ";
$menu_heading_overview = " لمحة عن الحساب ";
$menu_general_stats = "الإحصائيات العامة ";
$menu_tier_stats = "احصائيات الفئات ";
$menu_payment_history = "الدفعات السابقة ";
$menu_commission_details = "تفاصيل العمولة ";
$menu_recurring_commissions = "العمولات المتكررة";
$menu_traffic_log = " كثافة تسجيل الدخول ";
$menu_heading_marketing = " مواد التسويق ";
$menu_banners = "لوحات الإعلان ";
$menu_text_ads = " إعلانات نصية ";
$menu_text_links = " الروابط النصية ";
$menu_email_links = "روابط الإيميلات ";
$menu_html_links = "إشهارات html ";
$menu_offline = " التسويق خارج الاتصال بالانترنت ";
$menu_tier_linking_code = " فئات رموز الروابط ";
$menu_email_friends = " مراسلة الأصدقاء والشركاء ";
$menu_custom_links = " أنشئ وتعقب الروابط ";
$menu_heading_management = " إدارة الحساب ";
$menu_comalert = " ضبط الإخطار بالعمولة ";
$menu_comstats = " ضبط إحصائيات العمولة ";
$menu_edit_account = " تعديل حسابي ";
$menu_change_pass = " تغيير كلمة السر ";
$menu_change_commission = " غير نوع عمولتى ";
$menu_heading_general_info = " معلومات عامة ";
$menu_browse_affiliates = " تصفح المنتسبين الأخرين ";
$menu_faq = " الأسئلة المتكررة ";
$suspended_title = " الإخطار بوضعية الحساب ";
$suspended_heading = " حسابك موقف حاليا ";
$suspended_notes = " ملاحظات الإدارة ";
$pending_title = " الإخطار بوضعية الحساب ";
$pending_heading = " حسابك الآن ينتظر الموافقة ";
$pending_note = " بمجرد أن يصادق على حسابك، ستتوفر لك أدوات التسويق ";
$faq_title = " الأسئلة المتكررة ";
$faq_none = " لا توجد أسئلة متكررة بعد ";
$browse_title = " تصفح منتسبين آخرين ";
$browse_none = "لايوجد منتسبين للمشاهدة ";
$change_comm_title = " تغيير طرق تسلم العمولة ";
$change_comm_curr_comm = " طريقة تسلم العمولة الحالية ";
$change_comm_curr_pay = " مستوى الدفع الحالي ";
$change_comm_new_comm = " طريقة العمولة الجديدة ";
$change_comm_warning = " إذا قمت بتغيير طريقة تسلم العمولة، سيعاد حسابك إلى مستوى الدفع الأول ";
$change_comm_button = " غير طريقة العمولة ";
$change_comm_no_other = " لايوجد طرق عمولة أخرى ";
$change_comm_level = " مستوى ";
$change_comm_updated = "تم تحديث طريقة العمولة";
$password_title = " تغيير كلمة السر ";
$password_old_password = " كلمة السر القديمة ";
$password_new_password = " كلمة السر الجديدة ";
$password_confirm_password = " تأكيد كلمة السر ";
$password_button = " تغيير كلمة السر ";
$password_warning_old_missing = " كلمة السر القديمة خاطئة او ناقصة ";
$password_warning_new_missing = " إدخال كلمة السر الجديدة ناقصة ";
$password_warning_mismatch = " كلمة السر الجديدة غير مطابقة ";
$password_warning_invalid = " كلمة السر خاطئة أنقر على الرابط للمساعدة ";
$password_notice = " كلمة السر مجددة ";
$edit_failed = " فشل تجديد كلمة السر أنظر الخطأ أعلاه ";
$edit_success = " الحساب مجدد ";
$edit_button = " تعديل الحساب ";
$commissionstats_title = " ضبط إحصائيات العمولة ";
$commissionstats_info = "عند تنزيل إحصائيات العمولة يمكن أن تطلع على إحصائياتك لحظة بلحظة، مباشرة من حاسوبك، من أجل تنزيل هذا الخيار، قم بتنزيل إحصائيات العمولة و <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>unzip</b></a> إلى حاسوبك ثم قم بتشغيل <b>setup.exe</b> الملف عندما تظهر أمامك معلومات الدخول قم بإدخال المعلومات التالية.";
$commissionstats_hint = " قم بنسخ/لصق كل المدخلات حتى تتأكد من المطابقة ";
$commissionstats_profile = " اسم البروفايل ";
$commissionstats_username = " اسم المستخدم ";
$commissionstats_password = " كلمة السر ";
$commissionstats_id = " رقم المنتسب ";
$commissionstats_source = " طريق مصدر URL ";
$commissionstats_download = " قم بتنزيل إحصائيات العمولة ";
$commissionalert_title = " ضبط إخطار العمولة ";
$commissionalert_info = "عند تنزيل إخطار العمولة سنقوم بإعلامك لحظة بلحظة عن العمولة الجديدة، على حاسوبك، من أجل تنزيل هذا الخيار قم بتحميل  إخطار بالأجرة و <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>unzip</b></a> إلى حاسوبك ثم قم بتشغيل <b>setup.exe</b> الملف. لما تظهر أمامك معلومات الدخول قم بإدخال المعلومات التالية.";
$commissionalert_hint = " قم بنسخ/لصق كل المدخلات حتى تتأكد من المطابقة ";
$commissionalert_profile = " اسم البروفايل ";
$commissionalert_username = " اسم المستخدم ";
$commissionalert_password = " كلمة السر ";
$commissionalert_id = " رقم المنتسب ";
$commissionalert_source = " طريق مصدر URL ";
$commissionalert_download = " تحميل إخطار العمولة ";
$offline_title = " التسويق خارج الاتصال بالانترنت ";
$offline_paragraph_one = " اربح المال بإشهارك لموقعنا (خارج الاتصال بالانترنت) إلى أصدقائك وشركائك ";
$offline_send = " ارسال الزبائن إلى ";
$offline_page_link = " أنظر الصفحة ";
$offline_paragraph_two = " زبائنك سيدخلون  رقم الانتساب الخاص بك في الخانة أعلى الصفحة وهذا سيسجلك كمدمج لأي عملية شراء يقومون بها ";
$banners_title = " لوحات الإعلان ";
$banners_size = " حجم لوحات الإعلان ";
$banners_description = " توصيف لوحة الإعلان ";
$ad_title = " نصوص الإشهار ";
$ad_info = " باستعمال رموز الروابط يمكنك أن تقوم بتعديل الشكل, الحجم، والعرض لنصك الإشهاري.";
$links_title = " اسم الرابط ";
$email_title = " رابط الإيميل ";
$email_group = " مجموعة التسويق ";
$email_button = "عرض روابط الإيميلات";
$email_no_group = "لا يوجد مجموعة مختارة";
$email_choose = " من فضلك قم باختيار مجموعة تسويق من الأعلى ";
$email_notice = " مجموعات التسويق يمكن أن يكون لديها صفحات كثافة مختلفة ";
$email_ascii = "<b>ASCII/Text Version</b> - للاستعمال في نصوص الإيميلات السطحية.";
$email_html = "<b>HTML Version</b> - للاستعمال في إيميلات ذات صيغة HTML.";
$email_test = " اختبر الرابط ";
$email_test_info = " هنا حيث سيتم إرسال زبائنك إلى موقعنا ";
$email_source = " مصدر الرمز- نسخ/لصق  إلى رسالة إيميلك ";
$html_title = " اسم الاشهار HTML ";
$html_view_link = " انظر الى هذا HTML  الإشهار ";
$traffic_title = " كثافة الدخول القادمة ";
$traffic_display = " عرض الأخير ";
$traffic_display_visitors = " الزائرون ";
$traffic_button = " أنظر إلى كثافة الدخول ";
$traffic_title_details = "تفاصيل كثافة الدخول";
$traffic_ip = " عنوان IP ";
$traffic_refer = " URL  الإشارة الى ";
$traffic_date = " التاريخ ";
$traffic_time = " الوقت ";
$traffic_bottom_tag_one = " عرض الأخير ";
$traffic_bottom_tag_two = " من ";
$traffic_bottom_tag_three = " مجموع الزائرين الحصريين ";
$traffic_none = " لا يوجد كثافة دخول ";
$traffic_no_url = " لا يوجد اشارات او روابط عبر البريد الإلكترونى ";
$traffic_box_title = " إتمام URL  الإشارة ";
$traffic_box_info = " إضغط على الرابط لزيارة الموقع ";
$payment_title = " تفاصيل الدفع السابقة ";
$payment_date = " تاريخ الدفع ";
$payment_commissions = " العمولة ";
$payment_amount = " قيمة الدفع ";
$payment_totals = " المجموع ";
$payment_none = " لا يوجد تفاصيل دفع سابقة ";
$tier_stats_title = " فئات الإحصائيات ";
$tier_stats_accounts = " فئات الحسابات الموجودة تحتك مباشرة ";
$tier_stats_grab_link = " قم بجلب رموز فئات الربط ";
$tier_stats_none = " لا يوجد فئات للحسابات ";
$tier_stats_username = " اسم المستخدم ";
$tier_stats_current = " العمولة الحالية ";
$tier_stats_previous = " الدفعات السابقة ";
$tier_stats_totals = " المجموع ";
$recurring_title = " العمولات المتكررة ";
$recurring_none = " لا يوجد عمولات متكررة ";
$recurring_date = " تاريخ العمولات ";
$recurring_status = " الحالة المتكررة ";
$recurring_payout = " الدفع القادم ";
$recurring_amount = " القيمة ";
$recurring_every = " كل ";
$recurring_in = " في ";
$recurring_days = " الأيام ";
$recurring_total = " المجموع ";
$tlinks_title = " أضف آخرين إلى فئاتك وقم بربح المال أكثر";
$tlinks_embedded_one = " التسجيل للفئات مشغل في روابط انتسابك!";
$tlinks_embedded_two = " استعمال نظام الفئات سيسمح لك بتسويق برامجنا المدمجة عن طريق رابط فئاتك الخاصة في الأسفل. المعلومات عن كيفية الربح تجدها في الأسفل.";
$tlinks_embedded_current = " دفع الفئة الحالي ";
$tlinks_forced_two = "استعمال نظام الفئات سيسمح لك بتسويق برامجنا المدمجة لأشخاص آخرين ستكون الفئة الأولى لكل شخص يقوم بالانضمام إلى برامجنا المدمجة  عن طريق رابط فئاتك الخاصة في الأسفل المعلومات عن كيفية الربح تجدها في الأسفل.";
$tlinks_forced_code = " الرابط الإشاري للفئة ";
$tlinks_forced_paste = " نسخ/لصق الرمز أعلاه إلى موقعك ";
$tlinks_forced_money = " الواب ماسترز يقومون بربح المال هنا ";
$comdetails_title = " تفاصيل العمولة ";
$comdetails_date = " تاريخ العمولة ";
$comdetails_time = " وقت العمولة ";
$comdetails_type = " نوع العمولة ";
$comdetails_status = " الوضعية الحالية ";
$comdetails_amount = " قيمة العمولة ";
$comdetails_additional_title = " تفاصيل العمولات الإضافية ";
$comdetails_additional_ordnum = " أرقام الطلبات ";
$comdetails_additional_saleamt = " قيمة المبيعات ";
$comdetails_type_1 = " علاوة العمولة ";
$comdetails_type_2 = " العمولات المتكررة ";
$comdetails_type_3 = " عمولات الفئات";
$comdetails_type_4 = " العمولات العادية ";
$comdetails_status_1 = " مدفوع ";
$comdetails_status_2 = " مصادق- دفع في الانتظار ";
$comdetails_status_3 = " في انتظار المصادقة ";
$comdetails_not_available = " لا يوجد ";
$details_title = "تفاصيل العمولة";
$details_drop_1 = " العمولات العادية الحالية ";
$details_drop_2 = " فئات العمولات الحالية ";
$details_drop_3 = " العمولات المدفوعة الحالية ";
$details_drop_4 = "العمولات المدفوعة العادية";
$details_drop_5 = " العمولات الفئات المدفوعة ";
$details_button = " أنظر العمولات ";
$details_date = " التاريخ ";
$details_status = " الوضعية ";
$details_commission = " العمولة ";
$details_details = " أنظر التفاصيل ";
$details_type_1 = " مدفوع ";
$details_type_2 = " في انتظار المصادقة ";
$details_type_3 = " مصادق- دفع في الانتظار ";
$details_none = " لا توجد عمولة للمشاهدة ";
$details_no_group = " لا يوجد مجموعة عمولة مختارة ";
$details_choose = " من فضلك قم باختيار مجموعة عمولات من الأعلى ";
$general_title = " العممولات الحالية- من آخر تسلم عمولة إلى الآن ";
$general_transactions = " التحويلات ";
$general_earnings_to_date = " الأرباح إلى اليوم ";
$general_history_link = " تفاصيل الدفعات السابقة ";
$general_standard_earnings = " الأرباح العادية ";
$general_current_earnings = " الأرباح الحالية ";
$general_traffic_title = " إحصائيات الكثافة ";
$general_traffic_visitors = " الزوار ";
$general_traffic_unique = " الزوار للمرة الواحدة ";
$general_traffic_sales = " المبيعات المصادقة ";
$general_traffic_ratio = " نسبة المبيعات ";
$general_traffic_info = " هذه الإحصائيات لا تتضمن الفئات والعمولات المتكررة.";
$general_traffic_pay_type = " طريقة تسلم الدفعات ";
$general_traffic_pay_level = " المستوى الحالي للدفعات ";
$general_notes_title = " ملاحظات من الإداري ";
$general_notes_date = " تاريخ الإنشاء ";
$general_notes_to = " إلى ";
$general_notes_all = " كل المنتسبين ";
$general_notes_none = "لايوجد ملاحظة";
$contact_left_column_title = " اتصل بنا ";
$contact_left_column_text = " من فضلك لا تتردد في الاتصال بمدير  منتسبينا باستعمال الاستمارة على اليمين.";
$contact_title = " اتصل بنا ";
$contact_name = " اسمك ";
$contact_email = " عنوانك البريدي ";
$contact_message = " الرسالة ";
$contact_chars = " الحروف الباقية ";
$contact_button = " ارسل رسالة ";
$contact_received = " لقد تلقينا رسالتك، من فضلك اسمح لنا ب24 ساعة من أجل الجواب.";
$contact_invalid_name = " اسم خاطئ ";
$contact_invalid_email = " عنوان بريد إلكتروني خاطئ ";
$contact_invalid_message = " رسالة خاطئة ";
$invoice_button = " الفاتورة ";
$invoice_header = " فاتورة دفع المنتسب ";
$invoice_aff_info = " معلومات عن المنتسب ";
$invoice_co_info = " معلومات ";
$invoice_acct_info = " معلومات الحساب ";
$invoice_payment_info = " معلومات الدفع ";
$invoice_comm_date = " تاريخ الدفع ";
$invoice_comm_amt = " قيمة العمولة ";
$invoice_comm_type = " نوع العمولة ";
$invoice_admin_note = " ملاحظة الإداري ";
$invoice_footer = " نهاية الفاتورة ";
$invoice_print = " طباعة الفاتورة ";
$invoice_none = " لا يوجد ";
$invoice_aff_id = " رقم المنتسب ";
$invoice_aff_user = " اسم المستخدم ";
$menu_pdf_marketing = " النشرة التسويقية PDF ";
$menu_pdf_training = " الملف التدريبي PDF ";
$marketing_target_url = "الرابط المستهدف URL";
$marketing_source_code = " مصدر الكود- نسخ/لصق إلى موقعك الإلكتروني ";
$marketing_group = " مجموعة التسويق ";
$peels_title = " اسم صفحة القشرة ";
$peels_view = " أنظر هذه القشرة ";
$peels_description = " توصيف صفحة القشرة ";
$lb_head_title = " HEAD كود مطلوب ل صفحتك HTML ";
$lb_head_description = " من أجل استعمال لايت بوكس على موقعك، يجب عليك  إضافةالأسطر التالية في القسم الأول من الصفحة التي تريدها أن تعرض.";
$lb_head_source_code = " قم بلصق هذا الكود في مقدمة الصفحة لملف HTML.";
$lb_head_code_notes = " ما عليك إلا أن تضع الكود مرة واحدة بغض النظر عن عدد اللايت بوكس الذي تضعه في الصفحة.";
$lb_head_tutorial = " أنظر الفيديو التطبيقي ";
$lb_body_title = " اسم اللايت بوكس ";
$lb_body_description = " توصيف اللايت بوكس ";
$lb_body_click = " انقر على الصورة في الأعلى لترى اللايت بوكس.";
$lb_body_source_code = " قم بلصق هذا الكود في وسط القسم  من ملف HTML حيث تريد أن تظهر الصورة ";
$pdf_title = "PDF";
$pdf_training = " ملف تدريبي ";
$pdf_marketing = " نشرة تسويقية ";
$pdf_description_1 = " أدوب ريدر مطلوب من أجل مشاهدة وطباعة أدواتنا التسويقية.";
$pdf_description_2 = " يمكن تحميل أدوب ريدر مجانا من موقع أدوب.";
$pdf_file_name = " اسم الملف ";
$pdf_file_size = " حجم الملف ";
$pdf_file_description = " التوصيف ";
$pdf_bytes = " عدد البايت ";
$menu_heading_training_materials = " أدوات التدريب ";
$menu_videos = " شاهد الفيديوهات التدريبية ";
$menu_custom_manual = " دليل تتبع الروابط ";
$menu_page_peels = " طبقات الصفحات ";
$menu_lightboxes = " لايت بوكس ";
$menu_email_templates = " نماذج الإيمايلات ";
$menu_heading_custom_links = " روابط التتبع ";
$menu_custom_reports = " التقارير ";
$menu_keyword_links = " روابط تتبع الكلمات المفتاحية ";
$menu_subid_links = " روابط تتبع المنتسبين الفرعيين ";
$menu_alteranate_links = "الروابط  البديلة للصفحات الداخلة";
$menu_heading_additional = " أدوات إضافية ";
$menu_drop_heading_stats = " الوضعية العامة ";
$menu_drop_heading_commissions = "العمولات";
$menu_drop_heading_history = " تفاصيل الدفعات السابقة ";
$menu_drop_heading_traffic = " كثافة الدخول ";
$menu_drop_heading_account = " حسابي ";
$menu_drop_heading_logo = " تحميل اللوغو الخاص بي ";
$menu_drop_heading_faq = " الأسئلة المتكررة ";
$menu_drop_general_stats = " الإحصائيات العامة ";
$menu_drop_tier_stats = " إحصائيات الفئات ";
$menu_drop_current = " العمولات الحالية ";
$menu_drop_tier = " عمولات الفئات الحالية ";
$menu_drop_pending = " المصادقات طور الإنتظار ";
$menu_drop_paid = " العمولات المدفوعة ";
$menu_drop_paid_rec = " فئات العمولات المدفوعة ";
$menu_drop_recurring = " العمولات المتكررة الفعالة ";
$menu_drop_edit = " تعديل الحساب ";
$menu_drop_password = " تغيير كلمة السر ";
$menu_drop_change = " تغيير نوع العمولات ";
$account_hidden = "مخفي ";
$keyword_title = "روابط الكلمات المفتاحية ";
$keyword_info = "إنشاء رابط كلمة مفتاحية يوفر القدرة على تتبع الكثافة الواردة من مصادر متعددة. أنشىء حساب إلى غاية أربع كلمات مفتاحية مختلفة للتتبع  وتقرير التتبع المخصص سيريك التقرير التفصيلي لكل كلمة مفتاحية أنشاتها.";
$keyword_heading = " المتغيرات المتوفرة  للكلمات المفتاحية للتتبع ";
$keyword_tracking = " رقم التتبع ";
$keyword_build = " لتنشئ رابطك، خذ الرابط التالي وأضفه إلى رقم التتبع والكلمة المفتاحية التي تريد استعمالها.";
$keyword_example = " مثال ";
$keyword_tutorial = " شاهد الفيديو التوضيحي ";
$sub_tracking_title = " تتبع المنتسبين الفرعيين ";
$sub_tracking_info = "إنشاء رابط المدمجات الفرعية يوفر القدرة على تمرير روابط مدمجاتك إلى مدمجاتك الشخصية ليتم استعمالها. ستعلم من الذي سينشئ الاجرة لك سنعلمك أي المدمجات الفرعية مسؤولة عن توليد المبيعات. سبب آخر لاستعمال روابط المدمجات الفرعية إذا كان لديك نظام التتبع الخاص بك  يمكن إضافته من اجل التقارير.";
$sub_tracking_build = " استبدل XXX برقم المنتسب في برنامج المدمجات. أعد هذه العملية لكل منتسبيك.";
$sub_tracking_example = " مثال ";
$sub_tracking_tutorial = " فيديو توضيحي ";
$sub_tracking_id = " رقم المنتسب الفرعي ";
$alternate_title = " الروابط البديلة للصفحات الواردة ";
$alternate_option_1 = " الخيار الأول إنشاء رابط أوتوماتيكي ";
$alternate_heading_1 = " إنشاء رابط أوتوماتيكي ";
$alternate_info_1 = "عين كثافة صفحاتك الواردة  بإدخال الرابط الذي تريد أن ترسل له الكثافة وسنقوم بإنشاء رابط لك. باستعمال هذا الخيار سينشئ رابط مصغر لك للاستعمال مع الرابط المضمن باستعمال الرقم التعريفي في قاعدة بياناتنا.";
$alternate_button = " إنشاء الرابط ";
$alternate_links_heading = " روابط ال URL  البديلة ";
$alternate_links_note = " الروابط ستظل موجودة بالفعل وفعالة، إذا قمت بإزالة الرابط المخصص من الصفحة.";
$alternate_links_remove = " إزالة ";
$alternate_option_2 = " الخيار 2 الإنشاء اليدوي للرابط ";
$alternate_info_2 = " إذا أردت أن تضيف مدمجاتك الشخصية مع URL  وارد بديل، استعمل الهيكل التالي.";
$alternate_variable = " متغيرات الURL الوارد البديل ";
$alternate_example = " مثال ";
$alternate_build = " لإنشاء رابطك خذ ال URL  التالي وأضفه إلى ال URL الوارد البديل الذي تريد استعماله.";
$alternate_none = "لم ينشأ رابط وارد بديل";
$alternate_tutorial = " شاهد الفيديو ";
$cr_title = " تقرير الكلمات المفتاحية المخصصة ";
$cr_select = " قم باختيار كلمة مفتاحية ";
$cr_button = " توليد تقرير";
$cr_no_results = " لا توجد نتائج بحث ";
$cr_no_results_info = " حاول بكلمات مفتاحية أخرى ";
$cr_used = " كلمة مفتاحية مستعملة ";
$cr_found = " تم إيجاد هذا الرابط ";
$cr_times = " الأوقات ";
$cr_unique = " الروابط الموجودة للمرة الواحدة ";
$cr_detailed = " التقرير التفصيلي للرابط ";
$cr_export = " انقل إلى الاكسل ";
$cr_none = " لا توجد كلمة مفتاحية ";
$logo_title = " حمل لوغو شركتك ";
$logo_info = " إذا أردت أن تقوم بتنزيل لوغو شركتك، سنعرضه على الزبائن الذين ترسلهم إلى موقعنا. هذه تسمح لنا بتحديد تجربة  زبائنك لما يقومون بزيارتنا.";
$logo_bullet_one = " الصور يمكن أن تكون بصيغة  JPG GIF PNG لا يسمح بمحتوى الفلاش.";
$logo_bullet_two = " أي صور غير لائقة سنضطر إلى إزالتها وإلغاء الحساب.";
$logo_bullet_three = " الصورة/اللوغو لن تظهر على الموقع حتى يتم المصادقة عليها.";
$logo_bullet_size_one = " أقصى عرض للصور يمكن أن يكون ";
$logo_bullet_size_two = " البيكسال والطول يمكن ان يكون كأقصى حد ";
$logo_bullet_req_size_one = " يجب أن يكون عرض الصورة ";
$logo_bullet_req_size_two = " البيكسال وطول الصورة يجب أن يكون ";
$logo_bullet_pixels = " البيكسال.";
$logo_choose = " اختر صورة ";
$logo_file = " اختر ملف:";
$logo_browse = " تصفح...";
$logo_button = " تنزيل ";
$logo_current = " صورتي الحالية ";
$logo_remove = " إزالة ";
$logo_display_status = " وضعية الصورة:";
$logo_pending = " في انتظار المصادقة ";
$logo_approved = " مصادقة ";
$logo_success = " تم تحميل الصورة بنجاح، في انتظار المصادقة.";
$signup_security_title = " تفقد الحساب ";
$signup_security_info = " من فضلك أدخل كود الأمان الظاهر في الخانة، هذه الخطوة تساعدنا على منع التسجيلات الأتوماتيكية.";
$signup_security_code = " كود الأمان ";
$sub_tracking_none = " لا يوجد ";
$missing_security_code = " تفقد حساب خاطئ أو ناقص/ كود الأمان ";
$alternate_success_title = " نجاح إنشاء الرابط ";
$alternate_success_info = " اجلب رابطك في الأسفل وابدأ في إرسال الكثافة إلى URL  المحدد ";
$alternate_failed_title = " خطأ في إنشاء الحساب ";
$alternate_failed_info = " من فضلك أنشأ URL  صحيح.";
$logo_missing_filename = " من فضلك اختر ملفا.";
$logo_required_width = " عرض الصورة يجب أن يكون ";
$logo_required_height = " طول الصورة يجب أن يكون ";
$logo_maximum_width = " عرض الصورة يمكن أن تكون فقط ";
$logo_maximum_height = " طول الصورة يجب أن يكون فقط ";
$logo_size_maximum = " الحجم الأقصى للصورة يمكن أن يكون ";
$logo_bad_filetype = " نوع الصورة غير مسموح. أنواع الصور المسموحة هي GIF.JPG. وPNG.";
$logo_upload_error = " خطأ في تحميل الصورة، من فضلك اتصل بمدير المدمجات.";
$logo_error_title = " خطأ في تحميل الصورة ";
$logo_error_bytes = " البايت.";
$excel_title = " تقرير رابط الكلمات المفتاحية ";
$excel_tab_report = " تقرير الكلمات المفتاحية ";
$excel_tab_logs = " كثافة الدخول ";
$excel_date = " تاريخ التقرير:";
$excel_affiliate = " رقم المنتسب ";
$excel_criteria = " معايير رابط الكلمات المفتاحية ";
$excel_link = " هيكلة الروابط ";
$excel_hits = " الزيارات الأحادية ";
$excel_comm_stats = " إحصائيات العمولات ";
$excel_comm_current = " العمولات الحالية ";
$excel_comm_paid = " العمولات المدفوعة ";
$excel_comm_total = " مجموع العمولات ";
$excel_comm_ratio = " نسبة التحويل ";
$excel_earned = " العمولات المتحصل عليها ";
$excel_earned_current = " العولات الحالية ";
$excel_earned_paid = " العمولات المدفوعة ";
$excel_earned_total = " مجموع العمولات المتحصل عليها ";
$excel_earned_tab = " أنقر على زر كثافة الدخول في الأسفل لتشاهد كثافة الدخول في هذا الرابط.";
$excel_log_title = " كثافة الدخول للكلمات المفتاحية ";
$excel_log_ip = " عنوان IP ";
$excel_log_refer = "المرجعي URL";
$excel_log_date = " التاريخ ";
$excel_log_time = " الوقت ";
$excel_log_target = " URL  المستهدف ";
$etemplates_title = " نماذج الإيميل ";
$etemplates_view_link = " شاهد نموذج الإيميل ";
$etemplates_name = " إسم النموذج ";
$signup_maintenance_heading = " ملاحظة صيانة ";
$signup_maintenance_info = " التسجيلات متوقفة حاليا، حاول فيما بعد.";
$marketing_group_title = " المجموعات التسويقية ";
$marketing_button = " عرض ";
$marketing_no_group = " لا يوجد فريق مختار ";
$marketing_choose = " من فضلك قم باختيار مجموعة تسويقية في الأعلى ";
$marketing_notice = " المجموعات التسوقية يمكن أن يكون لديها كثافة صفحات واردة مختلفة ";
$canspam_heading = " قواعد وقبول CAN-SPAM ";
$canspam_accept = " لقد قرأت ووافقت على قواعد CAN-SPAM أعلاه.";
$canspam_error = " لم توافق على قواعد CAN-SPAM.";
$signup_banned = " حدث خطأ أثناء إنشاء الحساب. من فضلك اتصل بإداري النظام لمعلومات أكثر.";
$header_testimonials = " شهادات المنتسبين ";
$testi_visit = " قم بزيارة الموقع ";
$testi_description = " بلغ شهادتك إلى برنامجنا وسنقوم بوضعه على صفحتنا مع رابط إلى موقعك.";
$testi_name = " الاسم ";
$testi_url = "الموقع URL";
$testi_content = " الشهادة ";
$testi_code = " كود الأمان ";
$testi_submit = " سلم شهادتك ";
$testi_na = " الشهادات ليست متاحة الآن.";
$testi_title = " بلغ شهادة ";
$testi_success_title = " نجاح الشهادة ";
$testi_success_message = " شكرا على تبليغ شهادتك، سوف يقوم فريقنا بفحصها قريبا.";
$testi_error_title = " خطأ في تسليم الشهادة ";
$testi_error_name_missing = " من فضلك أضف اسمك من أجل شهادتك.";
$testi_error_url_missing = " من فضلك أضف URL موقعك من أجل أن يضاف إلى شهادتك.";
$testi_error_missing = " من فضلك أضف نصا من أجل شهادتك.";
$menu_drop_delayed = " العمولات المؤجلة ";
$details_drop_6 = " العمولات المؤجلة الحالية ";
$details_type_6 = " مؤجلة- سيصادق عليها قريبا ";
$comdetails_status_6 = " مؤجلة- سيصادق عليها قريبا ";
$tc_reaccept_title = " إعلام بالتغيير في الشروط والأحكام ";
$tc_reaccept_sub_title = " ينبغي أن توافق على شروطنا الجديدة لتتمكن من الحصول على الإذن بالدخول إلى حسابك.";
$tc_reaccept_button = " لقد قرأت وفهمت ووافقت على الشروط أعلاه ";
$tlinks_active = " عدد الفئات الفعالة ";
$tlinks_payout_structure = " هيكلة دفع للفئات ";
$tlinks_level = " مستوى ";
$tierText1 = "% محسوب من بناء على قيمة العمولة للمدمج الأصلي.";
$tierText2 = "% محسوب بناء على قيمة عمولة الفئة العليا ";
$tierText3 = "% محسوب بناء على قيمة المبيعات.";
$tierTextflat = " النسبة القاعدية.";
$edit_custom_button = " تعديل الجواب ";
$private_heading = " تسجيل خاص ";
$private_info = " برنامج الانتساب ليس مفتوحا على الجمهور العام فهو يتطلب كود التسجيل من أجل الانضمام، معلومات عن كيفية الحصول على كود الانضمام موجود هنا.";
$private_required_heading = " كود تسجيل مطلوب ";
$private_code_title = " قم بإدخال كود تسجيل ";
$private_button = " قم بتسليم الكود "; 
$private_error_title = " كود تسجيل خاطئ ";
$private_error_invalid = " كود التسجيل الذي قمت بإدخاله خاطئ.";
$private_error_expired = " كود التسجيل الذي قمت بإدخاله قد انتهت صلاحيته.";
$qr_code_title = " كود QR ";
$qr_code_size = " حجم كود QR ";
$qr_code_button = " عرض كود QR ";
$qr_code_offline_title = " التسويق خارج الاتصال بالانترنت ";
$qr_code_offline_content1 = " قم بإضافة كود QR إلى نشرتك التسويقية، فلاير، بطاقات الأعمال إلخ.";
$qr_code_offline_content2 = "- قم بالنقر على الصورة وحفظها في حاسوبك.";
$qr_code_online_title = " التسويق على الأنترنت ";
$qr_code_online_content = " أضف هذا QR إلى موقعك، التواصل الاجتماعي، المدونة...إلخ ";
$menu_coupon = " كود القسيمة الكوبون ";
$coupon_title = " كود الكوبون المتاح ";
$coupon_desc = " قدم هذه الكوبونات واحصل على عمولة فى كل مرة تستعمل فيها الكود!";
$coupon_head_1 = " كود الكوبون ";
$coupon_head_2 = " تخفيض للزبون ";
$coupon_head_3 = " قيمة عمولتك ";
$coupon_sale_amt = " من قيمة المبيعات ";
$coupon_flat_rate = " النسبة القاعدية ";
$coupon_default = " مستوى الدفع الأساسي ";
$cc_vanity_title = " أطلب كود كوبون شخصي ";
$cc_vanity_field = " كود الكوبون ";
$cc_vanity_button = " اطلب كود الكوبون ";
$cc_vanity_error_missing = "<strong>خطأ!</strong> من فضلك قم بإدخال كود الكوبون.";
$cc_vanity_error_exists = "<strong>خطأ!</strong> لقد طلبت هذا الكود سابقا في انتظار المصادقة.";
$cc_vanity_error = "<strong>خطأ!</strong> كود كوبون خاطئ، من فضلك قم باستعمال الحروف والأرقام فقط.";
$cc_vanity_success = "<strong>نجاح!</strong> قد تم طلب كود كوبونك الشخصي.";
$coupon_none = " لا يوجد كود كوبون متاح حاليا.";
$pic_error_title = " خطأ في تحميل الصورة ";
$pic_missing = " من فضلك قم باختيار الملف.";
$pic_invalid = " نوع الصورة غير مسموح، أنواع الصور المسموحة هي GIF.JPG.PNG.";
$pic_error = " خطأ في تحميل الصورة من فضلك اتصل بمدير الانتساب.";
$pic_success = " قد تم تحميل الصورة بنجاح.";
$pic_title = " قم بتحميل الصورة ";
$pic_info = " تحميل الصورة يسمح بتخصيص تجربتك.";
$pic_bullet_1 = " الصور يمكن أن تكون من نوع  JPG.GIF.PNG.";
$pic_bullet_2 = " أي صور غير لائقة سنقوم بإزالتها وبإلغاء الحساب.";
$pic_bullet_3 = " لن نقوم بعرض صورتك على العموم، بل ستكون متصلة بحسابك لنراها نحن فقط.";
$pic_file = " قم باختيار الملف:";
$pic_button = " تحميل ";
$pic_current = " صورتي الحالية ";
$pic_remove = " إزالة الصورة ";
$progress_title = " أهلية القبول للدفع القادم:";
$progress_complete = " إتمام.";
$progress_none = " ليس لدينا شروط من أجل الدفع.";
$progress_sentence_1 = " لقد تحصلت على ";
$progress_sentence_2 = " من ";
$progress_sentence_3 = " شروط.";
$aff_lib_button = "<font style=\"font-size:16px; font-weight:bold;\"> طالب بدخولك المجاني To</font><BR />www.AffiliateLibrary.com";
$menu_announcements = " حملات مواقع التواصل الاجتماعي ";
$announcements_name = " اسم الحملة ";
$announcements_facebook_message = " رسالة الفايسبوك ";
$announcements_twitter_message = " رسالة التويتر ";
$announcements_facebook_link = " رابط الفايسبوك ";
$announcements_facebook_picture = "صورة الفايسبوك";
$general_last_30_days_activity = " نشاط 30 يوما الأخير ";
$general_last_30_days_activity_traffic = " الكثافة ";
$general_last_30_days_activity_commissions = " العمولات ";
$accountability_title = " الحساب والعمولات ";
$accountability_text = "<strong> ماهذا؟?</strong><p>نحن نقوم بمقاربة فعالة من أجل الحصول على ثقة مدمجينا. هدفنا أن نضمن توفير أكبر قدر من المعلومات لكل عمولة متحصل عليها و/أو ملغية في نظامنا – الاتصالات- نحن هنا لنوفر التفاصيل عن أي إلغاء عمولة. نحن نوظف اتصالات قوية مع مدمجينا ونشجع الأسئلة والانطباعات.</p>";
$debit_reason_0 = "لا يوجد";
$debit_reason_1 = "تعويض مالي ";
$debit_reason_2 = "تحميل ثمن ";
$debit_reason_3 = "إبلاغ عن تزوير";
$debit_reason_4 = "طلب ملغى";
$debit_reason_5 = "تعويض جزئي"; 
$menu_drop_pending_debits = "حساب في طور الانتظار";
$debit_amount_label = "قيمة الحساب";
$debit_date_label = "تاريخ الحساب";
$debit_reason_label = "سبب الحساب";
$debit_paragraph = ".الحساب سينقص من الدفع القادم";
$debit_invoice_amount = "قيمة الحساب المنقوص";
$debit_revised_amount = "قيمة الدفع المراجعة";
$mv_head_description = "ملاحظة: يمكنك أن تقوم بتحميل فيديو واحد على الأكثر  في كل صفحة من موقعك.";
$mv_head_source_code = ".قم بلصق هذا الكود على مقدمة الصفحة في كل صفحة من موقعك";
$mv_body_title = "عنوان الفيديو";
$mv_body_description = "التوصيف ";
$mv_body_source_code = "قم بلصق هذا الكود في وسط القسم لملف HTML أين تريد للفيديو أن يظهر ";
$menu_marketing_videos = "فيديوهات";
$mv_preview_button = "شاهد الفيديو ";
$dt_no_data = "لا توجد معلومات متوفرة على الجدول ";
$dt_showing_exists = ".عرض_مجموع_الدخول_من_البداية_إلى_النهاية";
$dt_showing_none = " عرض 0 إلى0 من 0 دخول.";
$dt_filtered = "(مصفى من المجموع الأقصى من الدخول)";
$dt_length_choice = " عرض قائمة الدخول.";
$dt_loading = " طور التحميل...";
$dt_processing = " طور المعالجة...";
$dt_no_records = " لا توجد معلومات مطابقة.";
$dt_first = " الأول ";
$dt_last = " الأخير ";
$dt_next = " القادم ";
$dt_previous = " السابق ";
$dt_sort_asc = ": قم بالتنشيط  لتخرج الخانات تصاعديا";
$dt_sort_desc = ": قم بالتنشيط لتخرج الخانات تنازليا";
$choose_marketing_group = "اختر مجموعة تسويقية";
$email_already_used_1 = "لا يمكن إنشاء الحساب نقوم بالسماح فقط";
$email_already_used_2 = " الحساب ";
$email_already_used_3 = " ;أن تنشئ من بريد إلكتروني ";
$missing_fax = " من فضلك قم بإدخال رقم الفاكس.";
$chart_last_6_months = "الأجور المدفوعة في الستة أشهر الأخيرة ";
$chart_last_6_months_paid = "الأجور المدفوعة ";
$chart_this_month = "قائمة 5 أحسن مدمجينا هذا الشهر ";
$chart_this_month_none = "لا توجد بيانات للعرض.";
$login_return = "الرجوع للرئيسية";
$login_lost_details = ".أدخل اسم المستخدم وسنرسل لك إيميل اعتماد الدخول";
$account_edit_general_prefs = "الاختيارات العامة";
$account_edit_email_language = "لغة البريد الالكتروني";
$footer_connect = "تواصل معنا";
$modal_close = "إنهاء ";
$vat_amount_heading = "قيمة VAT";
$menu_logout = "تسجيل الخروج ";
$menu_upload_picture = " قم بتحميل الصورة";
$menu_offer_testi = "بلغ شهادة";
$fb_login = "قم بالدخول عن طريق الفايسبوك ";
$fb_permissions = ".لم يسمح لك، من فضلك اسمح للموقع أن يستعمل بريدك الإلكتروني";
$announcements_published = "إعلان منشور ";
$training_videos_title = " فيديو تدريبي ";
$training_videos_general = " التسويق العام ";
$commission_method = " طريقة دفع العمولات ";
$how_will_you_earn = " كيف يمكنك أن تتحصل على العمولات?";
$pm_account_credit = " سوف نقدم لحسابك قيمة الأجر الذي تحصلت عليه.";
$pm_check_money_order = " سنرسل لك طلب الشيك/المال في بريدك الإلكتروني.";
$pm_paypal = " سنرسل لك دفعا في الباي بال.";
$pm_stripe = " سنرسل لك شارة دفع.";
$pm_wire = " سنرسل لك تحويل سلكيا.";
$add_to_signup_left_column_text = "<span style=\"color:#CC0000; font-style:italic;\">* يحدد المجالات المطلوبة.</span>";
$paypal_email = " إيميل الباي بال ";
$stripe_acct_details = " تفاصيل الحساب المعين ";
$stripe_connect = " يمكن أن تقوم بربط حسابك المعين من إعدادات الحساب بعد التسجيل.";
$stripe_success = " تم ربط الحساب المعين بنجاح ";
$stripe_settings = " إعدادات التعيين ";
$stripe_connect_edit = " اربط بالحساب المعين ";
$stripe_delete = " إزالة الحساب المعين ";
$stripe_confirm = " ?هل أنت متأكد بأنك تريد إزالة هذا الحساب";
$payment_settings = " إعدادات الدفع ";
$edit_payment_settings = " تعديل إعدادات الدفع ";
$invalid_paypal_address = " بريد باي بال خاطئ.";
$payment_method_error = " من فضلك اختر طريقة دفع.";
$payment_settings_updated = " تم تجديد طريقة الدفع.";
$stripe_removed = " تم إزالة الحساب المعين.";
$payment_settings_success = " نجاح!";
$payment_update_notice_1 = " ملاحظة!";
$payment_update_notice_2 = " لقد اخترت أن تتلقى – الدفع من طرفنا من فضلك –انقر هنا- لتتصل بالحساب href=\"account.php?page=48\" style=\"font-weight:bold;\">انقر هنا</a> لربط <strong>[payment_option_here]</strong> حسابك."; 
$pm_title_credit = "رصيد الحساب";
$pm_title_mo = "الحساب/ حوالة بريدية";
$pm_title_paypal = "PayPal";
$pm_title_stripe = "Stripe";
$pm_title_wire = "حوالة مصرفية";
$privacy_link = "Privacy Policy";
$privacy_signup_title = "Privacy Policy";
$privacy_signup_agree  = "I have read, understand and agree to the above privacy policy.";
$missing_privacy = "You have not accepted our privacy policy.";
$header_privacy = "Privacy Policy";

//-------------------------------------------------------
// CREATE TABLE
//-------------------------------------------------------
	try {
	$db->query("CREATE TABLE IF NOT EXISTS idevaff_language_" . $language_pack_table_name . " (
header_title mediumtext NOT NULL,
header_indexLink mediumtext NOT NULL,
header_signupLink mediumtext NOT NULL,
header_accountLink mediumtext NOT NULL,
header_emailLink mediumtext NOT NULL,
header_greeting mediumtext NOT NULL,
header_nonLogged mediumtext NOT NULL,
header_logout mediumtext NOT NULL,
footer_tag mediumtext NOT NULL,
footer_copyright mediumtext NOT NULL,
footer_rights mediumtext NOT NULL,
index_heading_1 mediumtext NOT NULL,
index_paragraph_1 mediumtext NOT NULL,
index_heading_2 mediumtext NOT NULL,
index_paragraph_2 mediumtext NOT NULL,
index_heading_3 mediumtext NOT NULL,
index_paragraph_3 mediumtext NOT NULL,
index_login_title mediumtext NOT NULL,
index_login_username mediumtext NOT NULL,
index_login_password mediumtext NOT NULL,
index_login_username_field mediumtext NOT NULL,
index_login_password_field mediumtext NOT NULL,
index_login_button mediumtext NOT NULL,
index_login_signup_link mediumtext NOT NULL,
index_table_title mediumtext NOT NULL,
index_table_commission_type mediumtext NOT NULL,
index_table_initial_deposit mediumtext NOT NULL,
index_table_requirements mediumtext NOT NULL,
index_table_duration mediumtext NOT NULL,
index_table_choose mediumtext NOT NULL,
index_table_sale mediumtext NOT NULL,
index_table_click mediumtext NOT NULL,
index_table_sale_text mediumtext NOT NULL,
index_table_click_text mediumtext NOT NULL,
index_table_deposit_tag mediumtext NOT NULL,
index_table_requirements_tag mediumtext NOT NULL,
index_table_duration_tag mediumtext NOT NULL,
signup_left_column_text mediumtext NOT NULL,
signup_left_column_title mediumtext NOT NULL,
signup_login_title mediumtext NOT NULL,
signup_login_username mediumtext NOT NULL,
signup_login_password mediumtext NOT NULL,
signup_login_password_again mediumtext NOT NULL,
signup_login_minmax_chars mediumtext NOT NULL,
signup_login_must_match mediumtext NOT NULL,
signup_standard_title mediumtext NOT NULL,
signup_standard_email mediumtext NOT NULL,
signup_standard_company mediumtext NOT NULL,
signup_standard_checkspayable mediumtext NOT NULL,
signup_standard_weburl mediumtext NOT NULL,
signup_standard_taxinfo mediumtext NOT NULL,
signup_personal_title mediumtext NOT NULL,
signup_personal_fname mediumtext NOT NULL,
signup_personal_state mediumtext NOT NULL,
signup_personal_lname mediumtext NOT NULL,
signup_personal_phone mediumtext NOT NULL,
signup_personal_addr1 mediumtext NOT NULL,
signup_personal_fax mediumtext NOT NULL,
signup_personal_addr2 mediumtext NOT NULL,
signup_personal_zip mediumtext NOT NULL,
signup_personal_city mediumtext NOT NULL,
signup_personal_country mediumtext NOT NULL,
signup_commission_title mediumtext NOT NULL,
signup_commission_howtopay mediumtext NOT NULL,
signup_commission_style_PPS mediumtext NOT NULL,
signup_commission_style_PPC mediumtext NOT NULL,
signup_terms_title mediumtext NOT NULL,
signup_terms_agree mediumtext NOT NULL,
signup_page_button mediumtext NOT NULL,
signup_success_email_comment mediumtext NOT NULL,
signup_success_login_link mediumtext NOT NULL,
custom_fields_title mediumtext NOT NULL,
logout_msg mediumtext NOT NULL,
signup_page_success mediumtext NOT NULL,
login_left_column_title mediumtext NOT NULL,
login_left_column_text mediumtext NOT NULL,
login_title mediumtext NOT NULL,
login_username mediumtext NOT NULL,
login_password mediumtext NOT NULL,
login_invalid mediumtext NOT NULL,
login_now mediumtext NOT NULL,
login_send_title mediumtext NOT NULL,
login_send_username mediumtext NOT NULL,
login_send_info mediumtext NOT NULL,
login_send_pass mediumtext NOT NULL,
login_send_bad mediumtext NOT NULL,
help_new_password_heading mediumtext NOT NULL,
help_new_password_info mediumtext NOT NULL,
help_confirm_password_heading mediumtext NOT NULL,
help_confirm_password_info mediumtext NOT NULL,
help_custom_links_heading mediumtext NOT NULL,
help_custom_links_info mediumtext NOT NULL,
error_title mediumtext NOT NULL,
username_invalid mediumtext NOT NULL,
username_taken mediumtext NOT NULL,
username_short mediumtext NOT NULL,
username_long mediumtext NOT NULL,
password_invalid mediumtext NOT NULL,
password_short mediumtext NOT NULL,
password_long mediumtext NOT NULL,
password_mismatch mediumtext NOT NULL,
missing_checks mediumtext NOT NULL,
missing_tax mediumtext NOT NULL,
missing_fname mediumtext NOT NULL,
missing_lname mediumtext NOT NULL,
missing_email mediumtext NOT NULL,
invalid_email mediumtext NOT NULL,
missing_address mediumtext NOT NULL,
missing_city mediumtext NOT NULL,
missing_company mediumtext NOT NULL,
missing_state mediumtext NOT NULL,
missing_zip mediumtext NOT NULL,
missing_phone mediumtext NOT NULL,
missing_website mediumtext NOT NULL,
missing_paypal mediumtext NOT NULL,
missing_terms mediumtext NOT NULL,
paypal_required mediumtext NOT NULL,
missing_custom mediumtext NOT NULL,
account_total_transactions mediumtext NOT NULL,
account_standard_linking_code mediumtext NOT NULL,
account_copy_paste mediumtext NOT NULL,
account_not_approved mediumtext NOT NULL,
account_suspended mediumtext NOT NULL,
account_standard_earnings mediumtext NOT NULL,
account_inc_bonus mediumtext NOT NULL,
account_second_tier mediumtext NOT NULL,
account_recurring mediumtext NOT NULL,
account_not_available mediumtext NOT NULL,
account_earned_todate mediumtext NOT NULL,
menu_heading_overview mediumtext NOT NULL,
menu_general_stats mediumtext NOT NULL,
menu_tier_stats mediumtext NOT NULL,
menu_payment_history mediumtext NOT NULL,
menu_commission_details mediumtext NOT NULL,
menu_recurring_commissions mediumtext NOT NULL,
menu_traffic_log mediumtext NOT NULL,
menu_heading_marketing mediumtext NOT NULL,
menu_banners mediumtext NOT NULL,
menu_text_ads mediumtext NOT NULL,
menu_text_links mediumtext NOT NULL,
menu_email_links mediumtext NOT NULL,
menu_html_links mediumtext NOT NULL,
menu_offline mediumtext NOT NULL,
menu_tier_linking_code mediumtext NOT NULL,
menu_email_friends mediumtext NOT NULL,
menu_custom_links mediumtext NOT NULL,
menu_heading_management mediumtext NOT NULL,
menu_comalert mediumtext NOT NULL,
menu_comstats mediumtext NOT NULL,
menu_edit_account mediumtext NOT NULL,
menu_change_pass mediumtext NOT NULL,
menu_change_commission mediumtext NOT NULL,
menu_heading_general_info mediumtext NOT NULL,
menu_browse_affiliates mediumtext NOT NULL,
menu_faq mediumtext NOT NULL,
suspended_title mediumtext NOT NULL,
suspended_heading mediumtext NOT NULL,
suspended_notes mediumtext NOT NULL,
pending_title mediumtext NOT NULL,
pending_heading mediumtext NOT NULL,
pending_note mediumtext NOT NULL,
faq_title mediumtext NOT NULL,
faq_none mediumtext NOT NULL,
browse_title mediumtext NOT NULL,
browse_none mediumtext NOT NULL,
change_comm_title mediumtext NOT NULL,
change_comm_curr_comm mediumtext NOT NULL,
change_comm_curr_pay mediumtext NOT NULL,
change_comm_new_comm mediumtext NOT NULL,
change_comm_warning mediumtext NOT NULL,
change_comm_button mediumtext NOT NULL,
change_comm_no_other mediumtext NOT NULL,
change_comm_level mediumtext NOT NULL,
change_comm_updated mediumtext NOT NULL,
password_title mediumtext NOT NULL,
password_old_password mediumtext NOT NULL,
password_new_password mediumtext NOT NULL,
password_confirm_password mediumtext NOT NULL,
password_button mediumtext NOT NULL,
password_warning_old_missing mediumtext NOT NULL,
password_warning_new_missing mediumtext NOT NULL,
password_warning_mismatch mediumtext NOT NULL,
password_warning_invalid mediumtext NOT NULL,
password_notice mediumtext NOT NULL,
edit_failed mediumtext NOT NULL,
edit_success mediumtext NOT NULL,
edit_button mediumtext NOT NULL,
commissionstats_title mediumtext NOT NULL,
commissionstats_info mediumtext NOT NULL,
commissionstats_hint mediumtext NOT NULL,
commissionstats_profile mediumtext NOT NULL,
commissionstats_username mediumtext NOT NULL,
commissionstats_password mediumtext NOT NULL,
commissionstats_id mediumtext NOT NULL,
commissionstats_source mediumtext NOT NULL,
commissionstats_download mediumtext NOT NULL,
commissionalert_title mediumtext NOT NULL,
commissionalert_info mediumtext NOT NULL,
commissionalert_hint mediumtext NOT NULL,
commissionalert_profile mediumtext NOT NULL,
commissionalert_username mediumtext NOT NULL,
commissionalert_password mediumtext NOT NULL,
commissionalert_id mediumtext NOT NULL,
commissionalert_source mediumtext NOT NULL,
commissionalert_download mediumtext NOT NULL,
offline_title mediumtext NOT NULL,
offline_paragraph_one mediumtext NOT NULL,
offline_send mediumtext NOT NULL,
offline_page_link mediumtext NOT NULL,
offline_paragraph_two mediumtext NOT NULL,
banners_title mediumtext NOT NULL,
banners_size mediumtext NOT NULL,
banners_description mediumtext NOT NULL,
ad_title mediumtext NOT NULL,
ad_info mediumtext NOT NULL,
links_title mediumtext NOT NULL,
email_title mediumtext NOT NULL,
email_group mediumtext NOT NULL,
email_button mediumtext NOT NULL,
email_no_group mediumtext NOT NULL,
email_choose mediumtext NOT NULL,
email_notice mediumtext NOT NULL,
email_ascii mediumtext NOT NULL,
email_html mediumtext NOT NULL,
email_test mediumtext NOT NULL,
email_test_info mediumtext NOT NULL,
email_source mediumtext NOT NULL,
html_title mediumtext NOT NULL,
html_view_link mediumtext NOT NULL,
traffic_title mediumtext NOT NULL,
traffic_display mediumtext NOT NULL,
traffic_display_visitors mediumtext NOT NULL,
traffic_button mediumtext NOT NULL,
traffic_title_details mediumtext NOT NULL,
traffic_ip mediumtext NOT NULL,
traffic_refer mediumtext NOT NULL,
traffic_date mediumtext NOT NULL,
traffic_time mediumtext NOT NULL,
traffic_bottom_tag_one mediumtext NOT NULL,
traffic_bottom_tag_two mediumtext NOT NULL,
traffic_bottom_tag_three mediumtext NOT NULL,
traffic_none mediumtext NOT NULL,
traffic_no_url mediumtext NOT NULL,
traffic_box_title mediumtext NOT NULL,
traffic_box_info mediumtext NOT NULL,
payment_title mediumtext NOT NULL,
payment_date mediumtext NOT NULL,
payment_commissions mediumtext NOT NULL,
payment_amount mediumtext NOT NULL,
payment_totals mediumtext NOT NULL,
payment_none mediumtext NOT NULL,
tier_stats_title mediumtext NOT NULL,
tier_stats_accounts mediumtext NOT NULL,
tier_stats_grab_link mediumtext NOT NULL,
tier_stats_none mediumtext NOT NULL,
tier_stats_username mediumtext NOT NULL,
tier_stats_current mediumtext NOT NULL,
tier_stats_previous mediumtext NOT NULL,
tier_stats_totals mediumtext NOT NULL,
recurring_title mediumtext NOT NULL,
recurring_none mediumtext NOT NULL,
recurring_date mediumtext NOT NULL,
recurring_status mediumtext NOT NULL,
recurring_payout mediumtext NOT NULL,
recurring_amount mediumtext NOT NULL,
recurring_every mediumtext NOT NULL,
recurring_in mediumtext NOT NULL,
recurring_days mediumtext NOT NULL,
recurring_total mediumtext NOT NULL,
tlinks_title mediumtext NOT NULL,
tlinks_embedded_one mediumtext NOT NULL,
tlinks_embedded_two mediumtext NOT NULL,
tlinks_embedded_current mediumtext NOT NULL,
tlinks_forced_two mediumtext NOT NULL,
tlinks_forced_code mediumtext NOT NULL,
tlinks_forced_paste mediumtext NOT NULL,
tlinks_forced_money mediumtext NOT NULL,
comdetails_title mediumtext NOT NULL,
comdetails_date mediumtext NOT NULL,
comdetails_time mediumtext NOT NULL,
comdetails_type mediumtext NOT NULL,
comdetails_status mediumtext NOT NULL,
comdetails_amount mediumtext NOT NULL,
comdetails_additional_title mediumtext NOT NULL,
comdetails_additional_ordnum mediumtext NOT NULL,
comdetails_additional_saleamt mediumtext NOT NULL,
comdetails_type_1 mediumtext NOT NULL,
comdetails_type_2 mediumtext NOT NULL,
comdetails_type_3 mediumtext NOT NULL,
comdetails_type_4 mediumtext NOT NULL,
comdetails_status_1 mediumtext NOT NULL,
comdetails_status_2 mediumtext NOT NULL,
comdetails_status_3 mediumtext NOT NULL,
comdetails_not_available mediumtext NOT NULL,
details_title mediumtext NOT NULL,
details_drop_1 mediumtext NOT NULL,
details_drop_2 mediumtext NOT NULL,
details_drop_3 mediumtext NOT NULL,
details_drop_4 mediumtext NOT NULL,
details_drop_5 mediumtext NOT NULL,
details_button mediumtext NOT NULL,
details_date mediumtext NOT NULL,
details_status mediumtext NOT NULL,
details_commission mediumtext NOT NULL,
details_details mediumtext NOT NULL,
details_type_1 mediumtext NOT NULL,
details_type_2 mediumtext NOT NULL,
details_type_3 mediumtext NOT NULL,
details_none mediumtext NOT NULL,
details_no_group mediumtext NOT NULL,
details_choose mediumtext NOT NULL,
general_title mediumtext NOT NULL,
general_transactions mediumtext NOT NULL,
general_earnings_to_date mediumtext NOT NULL,
general_history_link mediumtext NOT NULL,
general_standard_earnings mediumtext NOT NULL,
general_current_earnings mediumtext NOT NULL,
general_traffic_title mediumtext NOT NULL,
general_traffic_visitors mediumtext NOT NULL,
general_traffic_unique mediumtext NOT NULL,
general_traffic_sales mediumtext NOT NULL,
general_traffic_ratio mediumtext NOT NULL,
general_traffic_info mediumtext NOT NULL,
general_traffic_pay_type mediumtext NOT NULL,
general_traffic_pay_level mediumtext NOT NULL,
general_notes_title mediumtext NOT NULL,
general_notes_date mediumtext NOT NULL,
general_notes_to mediumtext NOT NULL,
general_notes_all mediumtext NOT NULL,
general_notes_none mediumtext NOT NULL,
contact_left_column_title mediumtext NOT NULL,
contact_left_column_text mediumtext NOT NULL,
contact_title mediumtext NOT NULL,
contact_name mediumtext NOT NULL,
contact_email mediumtext NOT NULL,
contact_message mediumtext NOT NULL,
contact_chars mediumtext NOT NULL,
contact_button mediumtext NOT NULL,
contact_received mediumtext NOT NULL,
contact_invalid_name mediumtext NOT NULL,
contact_invalid_email mediumtext NOT NULL,
contact_invalid_message mediumtext NOT NULL,
invoice_button mediumtext NOT NULL,
invoice_header mediumtext NOT NULL,
invoice_aff_info mediumtext NOT NULL,
invoice_co_info mediumtext NOT NULL,
invoice_acct_info mediumtext NOT NULL,
invoice_payment_info mediumtext NOT NULL,
invoice_comm_date mediumtext NOT NULL,
invoice_comm_amt mediumtext NOT NULL,
invoice_comm_type mediumtext NOT NULL,
invoice_admin_note mediumtext NOT NULL,
invoice_footer mediumtext NOT NULL,
invoice_print mediumtext NOT NULL,
invoice_none mediumtext NOT NULL,
invoice_aff_id mediumtext NOT NULL,
invoice_aff_user mediumtext NOT NULL,
menu_pdf_marketing mediumtext NOT NULL,
menu_pdf_training mediumtext NOT NULL,
marketing_target_url mediumtext NOT NULL,
marketing_source_code mediumtext NOT NULL,
marketing_group mediumtext NOT NULL,
peels_title mediumtext NOT NULL,
peels_view mediumtext NOT NULL,
peels_description mediumtext NOT NULL,
lb_head_title mediumtext NOT NULL,
lb_head_description mediumtext NOT NULL,
lb_head_source_code mediumtext NOT NULL,
lb_head_code_notes mediumtext NOT NULL,
lb_head_tutorial mediumtext NOT NULL,
lb_body_title mediumtext NOT NULL,
lb_body_description mediumtext NOT NULL,
lb_body_click mediumtext NOT NULL,
lb_body_source_code mediumtext NOT NULL,
pdf_title mediumtext NOT NULL,
pdf_training mediumtext NOT NULL,
pdf_marketing mediumtext NOT NULL,
pdf_description_1 mediumtext NOT NULL,
pdf_description_2 mediumtext NOT NULL,
pdf_file_name mediumtext NOT NULL,
pdf_file_size mediumtext NOT NULL,
pdf_file_description mediumtext NOT NULL,
pdf_bytes mediumtext NOT NULL,
menu_heading_training_materials mediumtext NOT NULL,
menu_videos mediumtext NOT NULL,
menu_custom_manual mediumtext NOT NULL,
menu_page_peels mediumtext NOT NULL,
menu_lightboxes mediumtext NOT NULL,
menu_email_templates mediumtext NOT NULL,
menu_heading_custom_links mediumtext NOT NULL,
menu_custom_reports mediumtext NOT NULL,
menu_keyword_links mediumtext NOT NULL,
menu_subid_links mediumtext NOT NULL,
menu_alteranate_links mediumtext NOT NULL,
menu_heading_additional mediumtext NOT NULL,
menu_drop_heading_stats mediumtext NOT NULL,
menu_drop_heading_commissions mediumtext NOT NULL,
menu_drop_heading_history mediumtext NOT NULL,
menu_drop_heading_traffic mediumtext NOT NULL,
menu_drop_heading_account mediumtext NOT NULL,
menu_drop_heading_logo mediumtext NOT NULL,
menu_drop_heading_faq mediumtext NOT NULL,
menu_drop_general_stats mediumtext NOT NULL,
menu_drop_tier_stats mediumtext NOT NULL,
menu_drop_current mediumtext NOT NULL,
menu_drop_tier mediumtext NOT NULL,
menu_drop_pending mediumtext NOT NULL,
menu_drop_paid mediumtext NOT NULL,
menu_drop_paid_rec mediumtext NOT NULL,
menu_drop_recurring mediumtext NOT NULL,
menu_drop_edit mediumtext NOT NULL,
menu_drop_password mediumtext NOT NULL,
menu_drop_change mediumtext NOT NULL,
account_hidden mediumtext NOT NULL,
keyword_title mediumtext NOT NULL,
keyword_info mediumtext NOT NULL,
keyword_heading mediumtext NOT NULL,
keyword_tracking mediumtext NOT NULL,
keyword_build mediumtext NOT NULL,
keyword_example mediumtext NOT NULL,
keyword_tutorial mediumtext NOT NULL,
sub_tracking_title mediumtext NOT NULL,
sub_tracking_info mediumtext NOT NULL,
sub_tracking_build mediumtext NOT NULL,
sub_tracking_example mediumtext NOT NULL,
sub_tracking_tutorial mediumtext NOT NULL,
sub_tracking_id mediumtext NOT NULL,
alternate_title mediumtext NOT NULL,
alternate_option_1 mediumtext NOT NULL,
alternate_heading_1 mediumtext NOT NULL,
alternate_info_1 mediumtext NOT NULL,
alternate_button mediumtext NOT NULL,
alternate_links_heading mediumtext NOT NULL,
alternate_links_note mediumtext NOT NULL,
alternate_links_remove mediumtext NOT NULL,
alternate_option_2 mediumtext NOT NULL,
alternate_info_2 mediumtext NOT NULL,
alternate_variable mediumtext NOT NULL,
alternate_example mediumtext NOT NULL,
alternate_build mediumtext NOT NULL,
alternate_none mediumtext NOT NULL,
alternate_tutorial mediumtext NOT NULL,
cr_title mediumtext NOT NULL,
cr_select mediumtext NOT NULL,
cr_button mediumtext NOT NULL,
cr_no_results mediumtext NOT NULL,
cr_no_results_info mediumtext NOT NULL,
cr_used mediumtext NOT NULL,
cr_found mediumtext NOT NULL,
cr_times mediumtext NOT NULL,
cr_unique mediumtext NOT NULL,
cr_detailed mediumtext NOT NULL,
cr_export mediumtext NOT NULL,
cr_none mediumtext NOT NULL,
logo_title mediumtext NOT NULL,
logo_info mediumtext NOT NULL,
logo_bullet_one mediumtext NOT NULL,
logo_bullet_two mediumtext NOT NULL,
logo_bullet_three mediumtext NOT NULL,
logo_bullet_size_one mediumtext NOT NULL,
logo_bullet_size_two mediumtext NOT NULL,
logo_bullet_req_size_one mediumtext NOT NULL,
logo_bullet_req_size_two mediumtext NOT NULL,
logo_bullet_pixels mediumtext NOT NULL,
logo_choose mediumtext NOT NULL,
logo_file mediumtext NOT NULL,
logo_browse mediumtext NOT NULL,
logo_button mediumtext NOT NULL,
logo_current mediumtext NOT NULL,
logo_remove mediumtext NOT NULL,
logo_display_status mediumtext NOT NULL,
logo_pending mediumtext NOT NULL,
logo_approved mediumtext NOT NULL,
logo_success mediumtext NOT NULL,
signup_security_title mediumtext NOT NULL,
signup_security_info mediumtext NOT NULL,
signup_security_code mediumtext NOT NULL,
sub_tracking_none mediumtext NOT NULL,
missing_security_code mediumtext NOT NULL,
alternate_success_title mediumtext NOT NULL,
alternate_success_info mediumtext NOT NULL,
alternate_failed_title mediumtext NOT NULL,
alternate_failed_info mediumtext NOT NULL,
logo_missing_filename mediumtext NOT NULL,
logo_required_width mediumtext NOT NULL,
logo_required_height mediumtext NOT NULL,
logo_maximum_width mediumtext NOT NULL,
logo_maximum_height mediumtext NOT NULL,
logo_size_maximum mediumtext NOT NULL,
logo_bad_filetype mediumtext NOT NULL,
logo_upload_error mediumtext NOT NULL,
logo_error_title mediumtext NOT NULL,
logo_error_bytes mediumtext NOT NULL,
excel_title mediumtext NOT NULL,
excel_tab_report mediumtext NOT NULL,
excel_tab_logs mediumtext NOT NULL,
excel_date mediumtext NOT NULL,
excel_affiliate mediumtext NOT NULL,
excel_criteria mediumtext NOT NULL,
excel_link mediumtext NOT NULL,
excel_hits mediumtext NOT NULL,
excel_comm_stats mediumtext NOT NULL,
excel_comm_current mediumtext NOT NULL,
excel_comm_paid mediumtext NOT NULL,
excel_comm_total mediumtext NOT NULL,
excel_comm_ratio mediumtext NOT NULL,
excel_earned mediumtext NOT NULL,
excel_earned_current mediumtext NOT NULL,
excel_earned_paid mediumtext NOT NULL,
excel_earned_total mediumtext NOT NULL,
excel_earned_tab mediumtext NOT NULL,
excel_log_title mediumtext NOT NULL,
excel_log_ip mediumtext NOT NULL,
excel_log_refer mediumtext NOT NULL,
excel_log_date mediumtext NOT NULL,
excel_log_time mediumtext NOT NULL,
excel_log_target mediumtext NOT NULL,
etemplates_title mediumtext NOT NULL,
etemplates_view_link mediumtext NOT NULL,
etemplates_name mediumtext NOT NULL,
signup_maintenance_heading mediumtext NOT NULL,
signup_maintenance_info mediumtext NOT NULL,
marketing_group_title mediumtext NOT NULL,
marketing_button mediumtext NOT NULL,
marketing_no_group mediumtext NOT NULL,
marketing_choose mediumtext NOT NULL,
marketing_notice mediumtext NOT NULL,
canspam_heading mediumtext NOT NULL,
canspam_accept mediumtext NOT NULL,
canspam_error mediumtext NOT NULL,
signup_banned mediumtext NOT NULL,
header_testimonials mediumtext NOT NULL,
testi_visit mediumtext NOT NULL,
testi_description mediumtext NOT NULL,
testi_name mediumtext NOT NULL,
testi_url mediumtext NOT NULL,
testi_content mediumtext NOT NULL,
testi_code mediumtext NOT NULL,
testi_submit mediumtext NOT NULL,
testi_na mediumtext NOT NULL,
testi_title mediumtext NOT NULL,
testi_success_title mediumtext NOT NULL,
testi_success_message mediumtext NOT NULL,
testi_error_title mediumtext NOT NULL,
testi_error_name_missing mediumtext NOT NULL,
testi_error_url_missing mediumtext NOT NULL,
testi_error_missing mediumtext NOT NULL,
menu_drop_delayed mediumtext NOT NULL,
details_drop_6 mediumtext NOT NULL,
details_type_6 mediumtext NOT NULL,
comdetails_status_6 mediumtext NOT NULL,
tc_reaccept_title mediumtext NOT NULL,
tc_reaccept_sub_title mediumtext NOT NULL,
tc_reaccept_button mediumtext NOT NULL,
tlinks_active mediumtext NOT NULL,
tlinks_payout_structure mediumtext NOT NULL,
tlinks_level mediumtext NOT NULL,
tierText1 mediumtext NOT NULL,
tierText2 mediumtext NOT NULL,
tierText3 mediumtext NOT NULL,
tierTextflat mediumtext NOT NULL,
edit_custom_button mediumtext NOT NULL,
private_heading mediumtext NOT NULL,
private_info mediumtext NOT NULL,
private_required_heading mediumtext NOT NULL,
private_code_title mediumtext NOT NULL,
private_button mediumtext NOT NULL,
private_error_title mediumtext NOT NULL,
private_error_invalid mediumtext NOT NULL,
private_error_expired mediumtext NOT NULL,
qr_code_title mediumtext NOT NULL,
qr_code_size mediumtext NOT NULL,
qr_code_button mediumtext NOT NULL,
qr_code_offline_title mediumtext NOT NULL,
qr_code_offline_content1 mediumtext NOT NULL,
qr_code_offline_content2 mediumtext NOT NULL,
qr_code_online_title mediumtext NOT NULL,
qr_code_online_content mediumtext NOT NULL,
menu_coupon mediumtext NOT NULL,
coupon_title mediumtext NOT NULL,
coupon_desc mediumtext NOT NULL,
coupon_head_1 mediumtext NOT NULL,
coupon_head_2 mediumtext NOT NULL,
coupon_head_3 mediumtext NOT NULL,
coupon_sale_amt mediumtext NOT NULL,
coupon_flat_rate mediumtext NOT NULL,
coupon_default mediumtext NOT NULL,
cc_vanity_title mediumtext NOT NULL,
cc_vanity_field mediumtext NOT NULL,
cc_vanity_button mediumtext NOT NULL,
cc_vanity_error_missing mediumtext NOT NULL,
cc_vanity_error_exists mediumtext NOT NULL,
cc_vanity_error mediumtext NOT NULL,
cc_vanity_success mediumtext NOT NULL,
coupon_none mediumtext NOT NULL,
pic_error_title mediumtext NOT NULL,
pic_missing mediumtext NOT NULL,
pic_invalid mediumtext NOT NULL,
pic_error mediumtext NOT NULL,
pic_success mediumtext NOT NULL,
pic_title mediumtext NOT NULL,
pic_info mediumtext NOT NULL,
pic_bullet_1 mediumtext NOT NULL,
pic_bullet_2 mediumtext NOT NULL,
pic_bullet_3 mediumtext NOT NULL,
pic_file mediumtext NOT NULL,
pic_button mediumtext NOT NULL,
pic_current mediumtext NOT NULL,
pic_remove mediumtext NOT NULL,
progress_title mediumtext NOT NULL,
progress_complete mediumtext NOT NULL,
progress_none mediumtext NOT NULL,
progress_sentence_1 mediumtext NOT NULL,
progress_sentence_2 mediumtext NOT NULL,
progress_sentence_3 mediumtext NOT NULL,
aff_lib_button mediumtext NOT NULL,
menu_announcements mediumtext NOT NULL,
announcements_name mediumtext NOT NULL,
announcements_facebook_message mediumtext NOT NULL,
announcements_twitter_message mediumtext NOT NULL,
announcements_facebook_link mediumtext NOT NULL,
announcements_facebook_picture mediumtext NOT NULL,
general_last_30_days_activity mediumtext NOT NULL,
general_last_30_days_activity_traffic mediumtext NOT NULL,
general_last_30_days_activity_commissions mediumtext NOT NULL,
accountability_title mediumtext NOT NULL,
accountability_text mediumtext NOT NULL,
debit_reason_0 mediumtext NOT NULL,
debit_reason_1 mediumtext NOT NULL,
debit_reason_2 mediumtext NOT NULL,
debit_reason_3 mediumtext NOT NULL,
debit_reason_4 mediumtext NOT NULL,
debit_reason_5 mediumtext NOT NULL,
menu_drop_pending_debits mediumtext NOT NULL,
debit_amount_label mediumtext NOT NULL,
debit_date_label mediumtext NOT NULL,
debit_reason_label mediumtext NOT NULL,
debit_paragraph mediumtext NOT NULL,
debit_invoice_amount mediumtext NOT NULL,
debit_revised_amount mediumtext NOT NULL,
mv_head_description mediumtext NOT NULL,
mv_head_source_code mediumtext NOT NULL,
mv_body_title mediumtext NOT NULL,
mv_body_description mediumtext NOT NULL,
mv_body_source_code mediumtext NOT NULL,
menu_marketing_videos mediumtext NOT NULL,
mv_preview_button mediumtext NOT NULL,
dt_no_data mediumtext NOT NULL,
dt_showing_exists mediumtext NOT NULL,
dt_showing_none mediumtext NOT NULL,
dt_filtered mediumtext NOT NULL,
dt_length_choice mediumtext NOT NULL,
dt_loading mediumtext NOT NULL,
dt_processing mediumtext NOT NULL,
dt_no_records mediumtext NOT NULL,
dt_first mediumtext NOT NULL,
dt_last mediumtext NOT NULL,
dt_next mediumtext NOT NULL,
dt_previous mediumtext NOT NULL,
dt_sort_asc mediumtext NOT NULL,
dt_sort_desc mediumtext NOT NULL,
choose_marketing_group mediumtext NOT NULL,
email_already_used_1 mediumtext NOT NULL,
email_already_used_2 mediumtext NOT NULL,
email_already_used_3 mediumtext NOT NULL,
missing_fax mediumtext NOT NULL,
chart_last_6_months mediumtext NOT NULL,
chart_last_6_months_paid mediumtext NOT NULL,
chart_this_month mediumtext NOT NULL,
chart_this_month_none mediumtext NOT NULL,
login_return mediumtext NOT NULL,
login_lost_details mediumtext NOT NULL,
account_edit_general_prefs mediumtext NOT NULL,
account_edit_email_language mediumtext NOT NULL,
footer_connect mediumtext NOT NULL,
modal_close mediumtext NOT NULL,
vat_amount_heading mediumtext NOT NULL,
menu_logout mediumtext NOT NULL,
menu_upload_picture mediumtext NOT NULL,
menu_offer_testi mediumtext NOT NULL,
fb_login mediumtext NOT NULL,
fb_permissions mediumtext NOT NULL,
announcements_published mediumtext NOT NULL,
training_videos_title mediumtext NOT NULL,
training_videos_general mediumtext NOT NULL,
commission_method mediumtext NOT NULL,
how_will_you_earn mediumtext NOT NULL,
pm_account_credit mediumtext NOT NULL,
pm_check_money_order mediumtext NOT NULL,
pm_paypal mediumtext NOT NULL,
pm_stripe mediumtext NOT NULL,
pm_wire mediumtext NOT NULL,
add_to_signup_left_column_text mediumtext NOT NULL,
paypal_email mediumtext NOT NULL,
stripe_acct_details mediumtext NOT NULL,
stripe_connect mediumtext NOT NULL,
stripe_success mediumtext NOT NULL,
stripe_settings mediumtext NOT NULL,
stripe_connect_edit mediumtext NOT NULL,
stripe_delete mediumtext NOT NULL,
stripe_confirm mediumtext NOT NULL,
payment_settings mediumtext NOT NULL,
edit_payment_settings mediumtext NOT NULL,
invalid_paypal_address mediumtext NOT NULL,
payment_method_error mediumtext NOT NULL,
payment_settings_updated mediumtext NOT NULL,
stripe_removed mediumtext NOT NULL,
payment_settings_success mediumtext NOT NULL,
payment_update_notice_1 mediumtext NOT NULL,
payment_update_notice_2 mediumtext NOT NULL,
pm_title_credit mediumtext NOT NULL,
pm_title_mo mediumtext NOT NULL,
pm_title_paypal mediumtext NOT NULL,
pm_title_stripe mediumtext NOT NULL,
pm_title_wire mediumtext NOT NULL,
privacy_link mediumtext NOT NULL,
privacy_signup_title mediumtext NOT NULL,
privacy_signup_agree mediumtext NOT NULL,
missing_privacy mediumtext NOT NULL,
header_privacy mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");
    } catch ( Exception $ex ) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        die;
    }

//-------------------------------------------------------
// INSERT LANGUAGE
//-------------------------------------------------------
	try {
	$st = $db->prepare("insert into idevaff_language_" . $language_pack_table_name . " (
header_title, 
header_indexLink, 
header_signupLink, 
header_accountLink, 
header_emailLink, 
header_greeting, 
header_nonLogged, 
header_logout, 
footer_tag, 
footer_copyright, 
footer_rights, 
index_heading_1, 
index_paragraph_1, 
index_heading_2, 
index_paragraph_2, 
index_heading_3, 
index_paragraph_3, 
index_login_title, 
index_login_username, 
index_login_password, 
index_login_username_field, 
index_login_password_field, 
index_login_button, 
index_login_signup_link, 
index_table_title, 
index_table_commission_type, 
index_table_initial_deposit, 
index_table_requirements, 
index_table_duration, 
index_table_choose, 
index_table_sale, 
index_table_click, 
index_table_sale_text, 
index_table_click_text, 
index_table_deposit_tag, 
index_table_requirements_tag, 
index_table_duration_tag, 
signup_left_column_text, 
signup_left_column_title, 
signup_login_title, 
signup_login_username, 
signup_login_password, 
signup_login_password_again, 
signup_login_minmax_chars, 
signup_login_must_match, 
signup_standard_title, 
signup_standard_email, 
signup_standard_company, 
signup_standard_checkspayable, 
signup_standard_weburl, 
signup_standard_taxinfo, 
signup_personal_title, 
signup_personal_fname, 
signup_personal_state, 
signup_personal_lname, 
signup_personal_phone, 
signup_personal_addr1, 
signup_personal_fax, 
signup_personal_addr2, 
signup_personal_zip, 
signup_personal_city, 
signup_personal_country, 
signup_commission_title, 
signup_commission_howtopay, 
signup_commission_style_PPS, 
signup_commission_style_PPC, 
signup_terms_title, 
signup_terms_agree, 
signup_page_button, 
signup_success_email_comment, 
signup_success_login_link, 
custom_fields_title, 
logout_msg, 
signup_page_success, 
login_left_column_title, 
login_left_column_text, 
login_title, 
login_username, 
login_password, 
login_invalid, 
login_now, 
login_send_title, 
login_send_username, 
login_send_info, 
login_send_pass, 
login_send_bad, 
help_new_password_heading, 
help_new_password_info, 
help_confirm_password_heading, 
help_confirm_password_info, 
help_custom_links_heading, 
help_custom_links_info, 
error_title, 
username_invalid, 
username_taken, 
username_short, 
username_long, 
password_invalid, 
password_short, 
password_long, 
password_mismatch, 
missing_checks, 
missing_tax, 
missing_fname, 
missing_lname, 
missing_email, 
invalid_email, 
missing_address, 
missing_city, 
missing_company, 
missing_state, 
missing_zip, 
missing_phone, 
missing_website, 
missing_paypal, 
missing_terms, 
paypal_required, 
missing_custom, 
account_total_transactions, 
account_standard_linking_code, 
account_copy_paste, 
account_not_approved, 
account_suspended, 
account_standard_earnings, 
account_inc_bonus, 
account_second_tier, 
account_recurring, 
account_not_available, 
account_earned_todate, 
menu_heading_overview, 
menu_general_stats, 
menu_tier_stats, 
menu_payment_history, 
menu_commission_details, 
menu_recurring_commissions, 
menu_traffic_log, 
menu_heading_marketing, 
menu_banners, 
menu_text_ads, 
menu_text_links, 
menu_email_links, 
menu_html_links, 
menu_offline, 
menu_tier_linking_code, 
menu_email_friends, 
menu_custom_links, 
menu_heading_management, 
menu_comalert, 
menu_comstats, 
menu_edit_account, 
menu_change_pass, 
menu_change_commission, 
menu_heading_general_info, 
menu_browse_affiliates, 
menu_faq, 
suspended_title, 
suspended_heading, 
suspended_notes, 
pending_title, 
pending_heading, 
pending_note, 
faq_title, 
faq_none, 
browse_title, 
browse_none, 
change_comm_title, 
change_comm_curr_comm, 
change_comm_curr_pay, 
change_comm_new_comm, 
change_comm_warning, 
change_comm_button, 
change_comm_no_other, 
change_comm_level, 
change_comm_updated, 
password_title, 
password_old_password, 
password_new_password, 
password_confirm_password, 
password_button, 
password_warning_old_missing, 
password_warning_new_missing, 
password_warning_mismatch, 
password_warning_invalid, 
password_notice, 
edit_failed, 
edit_success, 
edit_button, 
commissionstats_title, 
commissionstats_info, 
commissionstats_hint, 
commissionstats_profile, 
commissionstats_username, 
commissionstats_password, 
commissionstats_id, 
commissionstats_source, 
commissionstats_download, 
commissionalert_title, 
commissionalert_info, 
commissionalert_hint, 
commissionalert_profile, 
commissionalert_username, 
commissionalert_password, 
commissionalert_id, 
commissionalert_source, 
commissionalert_download, 
offline_title, 
offline_paragraph_one, 
offline_send, 
offline_page_link, 
offline_paragraph_two, 
banners_title, 
banners_size, 
banners_description, 
ad_title, 
ad_info, 
links_title, 
email_title, 
email_group, 
email_button, 
email_no_group, 
email_choose, 
email_notice, 
email_ascii, 
email_html, 
email_test, 
email_test_info, 
email_source, 
html_title, 
html_view_link, 
traffic_title, 
traffic_display, 
traffic_display_visitors, 
traffic_button, 
traffic_title_details, 
traffic_ip, 
traffic_refer, 
traffic_date, 
traffic_time, 
traffic_bottom_tag_one, 
traffic_bottom_tag_two, 
traffic_bottom_tag_three, 
traffic_none, 
traffic_no_url, 
traffic_box_title, 
traffic_box_info, 
payment_title, 
payment_date, 
payment_commissions, 
payment_amount, 
payment_totals, 
payment_none, 
tier_stats_title, 
tier_stats_accounts, 
tier_stats_grab_link, 
tier_stats_none, 
tier_stats_username, 
tier_stats_current, 
tier_stats_previous, 
tier_stats_totals, 
recurring_title, 
recurring_none, 
recurring_date, 
recurring_status, 
recurring_payout, 
recurring_amount, 
recurring_every, 
recurring_in, 
recurring_days, 
recurring_total, 
tlinks_title, 
tlinks_embedded_one, 
tlinks_embedded_two, 
tlinks_embedded_current, 
tlinks_forced_two, 
tlinks_forced_code, 
tlinks_forced_paste, 
tlinks_forced_money, 
comdetails_title, 
comdetails_date, 
comdetails_time, 
comdetails_type, 
comdetails_status, 
comdetails_amount, 
comdetails_additional_title, 
comdetails_additional_ordnum, 
comdetails_additional_saleamt, 
comdetails_type_1, 
comdetails_type_2, 
comdetails_type_3, 
comdetails_type_4, 
comdetails_status_1, 
comdetails_status_2, 
comdetails_status_3, 
comdetails_not_available, 
details_title, 
details_drop_1, 
details_drop_2, 
details_drop_3, 
details_drop_4, 
details_drop_5, 
details_button, 
details_date, 
details_status, 
details_commission, 
details_details, 
details_type_1, 
details_type_2, 
details_type_3, 
details_none, 
details_no_group, 
details_choose, 
general_title, 
general_transactions, 
general_earnings_to_date, 
general_history_link, 
general_standard_earnings, 
general_current_earnings, 
general_traffic_title, 
general_traffic_visitors, 
general_traffic_unique, 
general_traffic_sales, 
general_traffic_ratio, 
general_traffic_info, 
general_traffic_pay_type, 
general_traffic_pay_level, 
general_notes_title, 
general_notes_date, 
general_notes_to, 
general_notes_all, 
general_notes_none, 
contact_left_column_title, 
contact_left_column_text, 
contact_title, 
contact_name, 
contact_email, 
contact_message, 
contact_chars, 
contact_button, 
contact_received, 
contact_invalid_name, 
contact_invalid_email, 
contact_invalid_message, 
invoice_button, 
invoice_header, 
invoice_aff_info, 
invoice_co_info, 
invoice_acct_info, 
invoice_payment_info, 
invoice_comm_date, 
invoice_comm_amt, 
invoice_comm_type, 
invoice_admin_note, 
invoice_footer, 
invoice_print, 
invoice_none, 
invoice_aff_id, 
invoice_aff_user, 
menu_pdf_marketing, 
menu_pdf_training, 
marketing_target_url, 
marketing_source_code, 
marketing_group, 
peels_title, 
peels_view, 
peels_description, 
lb_head_title, 
lb_head_description, 
lb_head_source_code, 
lb_head_code_notes, 
lb_head_tutorial, 
lb_body_title, 
lb_body_description, 
lb_body_click, 
lb_body_source_code, 
pdf_title, 
pdf_training, 
pdf_marketing, 
pdf_description_1, 
pdf_description_2, 
pdf_file_name, 
pdf_file_size, 
pdf_file_description, 
pdf_bytes, 
menu_heading_training_materials, 
menu_videos, 
menu_custom_manual, 
menu_page_peels, 
menu_lightboxes, 
menu_email_templates, 
menu_heading_custom_links, 
menu_custom_reports, 
menu_keyword_links, 
menu_subid_links, 
menu_alteranate_links, 
menu_heading_additional, 
menu_drop_heading_stats, 
menu_drop_heading_commissions, 
menu_drop_heading_history, 
menu_drop_heading_traffic, 
menu_drop_heading_account, 
menu_drop_heading_logo, 
menu_drop_heading_faq, 
menu_drop_general_stats, 
menu_drop_tier_stats, 
menu_drop_current, 
menu_drop_tier, 
menu_drop_pending, 
menu_drop_paid, 
menu_drop_paid_rec, 
menu_drop_recurring, 
menu_drop_edit, 
menu_drop_password, 
menu_drop_change, 
account_hidden, 
keyword_title, 
keyword_info, 
keyword_heading, 
keyword_tracking, 
keyword_build, 
keyword_example, 
keyword_tutorial, 
sub_tracking_title, 
sub_tracking_info, 
sub_tracking_build, 
sub_tracking_example, 
sub_tracking_tutorial, 
sub_tracking_id, 
alternate_title, 
alternate_option_1, 
alternate_heading_1, 
alternate_info_1, 
alternate_button, 
alternate_links_heading, 
alternate_links_note, 
alternate_links_remove, 
alternate_option_2, 
alternate_info_2, 
alternate_variable, 
alternate_example, 
alternate_build, 
alternate_none, 
alternate_tutorial, 
cr_title, 
cr_select, 
cr_button, 
cr_no_results, 
cr_no_results_info, 
cr_used, 
cr_found, 
cr_times, 
cr_unique, 
cr_detailed, 
cr_export, 
cr_none, 
logo_title, 
logo_info, 
logo_bullet_one, 
logo_bullet_two, 
logo_bullet_three, 
logo_bullet_size_one, 
logo_bullet_size_two, 
logo_bullet_req_size_one, 
logo_bullet_req_size_two, 
logo_bullet_pixels, 
logo_choose, 
logo_file, 
logo_browse, 
logo_button, 
logo_current, 
logo_remove, 
logo_display_status, 
logo_pending, 
logo_approved, 
logo_success, 
signup_security_title, 
signup_security_info, 
signup_security_code, 
sub_tracking_none, 
missing_security_code, 
alternate_success_title, 
alternate_success_info, 
alternate_failed_title, 
alternate_failed_info, 
logo_missing_filename, 
logo_required_width, 
logo_required_height, 
logo_maximum_width, 
logo_maximum_height, 
logo_size_maximum, 
logo_bad_filetype, 
logo_upload_error, 
logo_error_title, 
logo_error_bytes, 
excel_title, 
excel_tab_report, 
excel_tab_logs, 
excel_date, 
excel_affiliate, 
excel_criteria, 
excel_link, 
excel_hits, 
excel_comm_stats, 
excel_comm_current, 
excel_comm_paid, 
excel_comm_total, 
excel_comm_ratio, 
excel_earned, 
excel_earned_current, 
excel_earned_paid, 
excel_earned_total, 
excel_earned_tab, 
excel_log_title, 
excel_log_ip, 
excel_log_refer, 
excel_log_date, 
excel_log_time, 
excel_log_target, 
etemplates_title, 
etemplates_view_link, 
etemplates_name, 
signup_maintenance_heading, 
signup_maintenance_info, 
marketing_group_title, 
marketing_button, 
marketing_no_group, 
marketing_choose, 
marketing_notice, 
canspam_heading, 
canspam_accept, 
canspam_error, 
signup_banned, 
header_testimonials, 
testi_visit, 
testi_description, 
testi_name, 
testi_url, 
testi_content, 
testi_code, 
testi_submit, 
testi_na, 
testi_title, 
testi_success_title, 
testi_success_message, 
testi_error_title, 
testi_error_name_missing, 
testi_error_url_missing, 
testi_error_missing, 
menu_drop_delayed, 
details_drop_6, 
details_type_6, 
comdetails_status_6, 
tc_reaccept_title, 
tc_reaccept_sub_title, 
tc_reaccept_button, 
tlinks_active, 
tlinks_payout_structure, 
tlinks_level, 
tierText1, 
tierText2, 
tierText3, 
tierTextflat, 
edit_custom_button, 
private_heading, 
private_info, 
private_required_heading, 
private_code_title, 
private_button, 
private_error_title, 
private_error_invalid, 
private_error_expired, 
qr_code_title,
qr_code_size,
qr_code_button,
qr_code_offline_title,
qr_code_offline_content1,
qr_code_offline_content2,
qr_code_online_title,
qr_code_online_content,
menu_coupon,
coupon_title,
coupon_desc,
coupon_head_1,
coupon_head_2,
coupon_head_3,
coupon_sale_amt,
coupon_flat_rate,
coupon_default,
cc_vanity_title,
cc_vanity_field,
cc_vanity_button,
cc_vanity_error_missing,
cc_vanity_error_exists,
cc_vanity_error,
cc_vanity_success,
coupon_none,
pic_error_title,
pic_missing,
pic_invalid,
pic_error,
pic_success,
pic_title,
pic_info,
pic_bullet_1,
pic_bullet_2,
pic_bullet_3,
pic_file,
pic_button,
pic_current,
pic_remove,
progress_title,
progress_complete,
progress_none,
progress_sentence_1,
progress_sentence_2,
progress_sentence_3,
aff_lib_button,
menu_announcements,
announcements_name,
announcements_facebook_message,
announcements_twitter_message,
announcements_facebook_link,
announcements_facebook_picture,
general_last_30_days_activity,
general_last_30_days_activity_traffic,
general_last_30_days_activity_commissions,
accountability_title,
accountability_text,
debit_reason_0,
debit_reason_1,
debit_reason_2,
debit_reason_3,
debit_reason_4,
debit_reason_5,
menu_drop_pending_debits,
debit_amount_label,
debit_date_label,
debit_reason_label,
debit_paragraph,
debit_invoice_amount,
debit_revised_amount,
mv_head_description,
mv_head_source_code,
mv_body_title,
mv_body_description,
mv_body_source_code,
menu_marketing_videos,
mv_preview_button,
dt_no_data,
dt_showing_exists,
dt_showing_none,
dt_filtered,
dt_length_choice,
dt_loading,
dt_processing,
dt_no_records,
dt_first,
dt_last,
dt_next,
dt_previous,
dt_sort_asc,
dt_sort_desc,
choose_marketing_group,
email_already_used_1,
email_already_used_2,
email_already_used_3,
missing_fax,
chart_last_6_months,
chart_last_6_months_paid,
chart_this_month,
chart_this_month_none,
login_return,
login_lost_details,
account_edit_general_prefs,
account_edit_email_language,
footer_connect,
modal_close,
vat_amount_heading,
menu_logout,
menu_upload_picture,
menu_offer_testi,
fb_login,
fb_permissions,
announcements_published,
training_videos_title,
training_videos_general,
commission_method,
how_will_you_earn,
pm_account_credit,
pm_check_money_order,
pm_paypal,
pm_stripe,
pm_wire,
add_to_signup_left_column_text,
paypal_email,
stripe_acct_details,
stripe_connect,
stripe_success,
stripe_settings,
stripe_connect_edit,
stripe_delete,
stripe_confirm,
payment_settings,
edit_payment_settings,
invalid_paypal_address,
payment_method_error,
payment_settings_updated,
stripe_removed,
payment_settings_success,
payment_update_notice_1,
payment_update_notice_2,
pm_title_credit,
pm_title_mo,
pm_title_paypal,
pm_title_stripe,
pm_title_wire,
privacy_link,
privacy_signup_title,
privacy_signup_agree,
missing_privacy,
header_privacy

) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $st->execute(array(
            $header_title,
            $header_indexLink,
            $header_signupLink,
            $header_accountLink,
            $header_emailLink,
            $header_greeting,
            $header_nonLogged,
            $header_logout,
            $footer_tag,
            $footer_copyright,
            $footer_rights,
            $index_heading_1,
            $index_paragraph_1,
            $index_heading_2,
            $index_paragraph_2,
            $index_heading_3,
            $index_paragraph_3,
            $index_login_title,
            $index_login_username,
            $index_login_password,
            $index_login_username_field,
            $index_login_password_field,
            $index_login_button,
            $index_login_signup_link,
            $index_table_title,
            $index_table_commission_type,
            $index_table_initial_deposit,
            $index_table_requirements,
            $index_table_duration,
            $index_table_choose,
            $index_table_sale,
            $index_table_click,
            $index_table_sale_text,
            $index_table_click_text,
            $index_table_deposit_tag,
            $index_table_requirements_tag,
            $index_table_duration_tag,
            $signup_left_column_text,
            $signup_left_column_title,
            $signup_login_title,
            $signup_login_username,
            $signup_login_password,
            $signup_login_password_again,
            $signup_login_minmax_chars,
            $signup_login_must_match,
            $signup_standard_title,
            $signup_standard_email,
            $signup_standard_company,
            $signup_standard_checkspayable,
            $signup_standard_weburl,
            $signup_standard_taxinfo,
            $signup_personal_title,
            $signup_personal_fname,
            $signup_personal_state,
            $signup_personal_lname,
            $signup_personal_phone,
            $signup_personal_addr1,
            $signup_personal_fax,
            $signup_personal_addr2,
            $signup_personal_zip,
            $signup_personal_city,
            $signup_personal_country,
            $signup_commission_title,
            $signup_commission_howtopay,
            $signup_commission_style_PPS,
            $signup_commission_style_PPC,
            $signup_terms_title,
            $signup_terms_agree,
            $signup_page_button,
            $signup_success_email_comment,
            $signup_success_login_link,
            $custom_fields_title,
            $logout_msg,
            $signup_page_success,
            $login_left_column_title,
            $login_left_column_text,
            $login_title,
            $login_username,
            $login_password,
            $login_invalid,
            $login_now,
            $login_send_title,
            $login_send_username,
            $login_send_info,
            $login_send_pass,
            $login_send_bad,
            $help_new_password_heading,
            $help_new_password_info,
            $help_confirm_password_heading,
            $help_confirm_password_info,
            $help_custom_links_heading,
            $help_custom_links_info,
            $error_title,
            $username_invalid,
            $username_taken,
            $username_short,
            $username_long,
            $password_invalid,
            $password_short,
            $password_long,
            $password_mismatch,
            $missing_checks,
            $missing_tax,
            $missing_fname,
            $missing_lname,
            $missing_email,
            $invalid_email,
            $missing_address,
            $missing_city,
            $missing_company,
            $missing_state,
            $missing_zip,
            $missing_phone,
            $missing_website,
            $missing_paypal,
            $missing_terms,
            $paypal_required,
            $missing_custom,
            $account_total_transactions,
            $account_standard_linking_code,
            $account_copy_paste,
            $account_not_approved,
            $account_suspended,
            $account_standard_earnings,
            $account_inc_bonus,
            $account_second_tier,
            $account_recurring,
            $account_not_available,
            $account_earned_todate,
            $menu_heading_overview,
            $menu_general_stats,
            $menu_tier_stats,
            $menu_payment_history,
            $menu_commission_details,
            $menu_recurring_commissions,
            $menu_traffic_log,
            $menu_heading_marketing,
            $menu_banners,
            $menu_text_ads,
            $menu_text_links,
            $menu_email_links,
            $menu_html_links,
            $menu_offline,
            $menu_tier_linking_code,
            $menu_email_friends,
            $menu_custom_links,
            $menu_heading_management,
            $menu_comalert,
            $menu_comstats,
            $menu_edit_account,
            $menu_change_pass,
            $menu_change_commission,
            $menu_heading_general_info,
            $menu_browse_affiliates,
            $menu_faq,
            $suspended_title,
            $suspended_heading,
            $suspended_notes,
            $pending_title,
            $pending_heading,
            $pending_note,
            $faq_title,
            $faq_none,
            $browse_title,
            $browse_none,
            $change_comm_title,
            $change_comm_curr_comm,
            $change_comm_curr_pay,
            $change_comm_new_comm,
            $change_comm_warning,
            $change_comm_button,
            $change_comm_no_other,
            $change_comm_level,
            $change_comm_updated,
            $password_title,
            $password_old_password,
            $password_new_password,
            $password_confirm_password,
            $password_button,
            $password_warning_old_missing,
            $password_warning_new_missing,
            $password_warning_mismatch,
            $password_warning_invalid,
            $password_notice,
            $edit_failed,
            $edit_success,
            $edit_button,
            $commissionstats_title,
            $commissionstats_info,
            $commissionstats_hint,
            $commissionstats_profile,
            $commissionstats_username,
            $commissionstats_password,
            $commissionstats_id,
            $commissionstats_source,
            $commissionstats_download,
            $commissionalert_title,
            $commissionalert_info,
            $commissionalert_hint,
            $commissionalert_profile,
            $commissionalert_username,
            $commissionalert_password,
            $commissionalert_id,
            $commissionalert_source,
            $commissionalert_download,
            $offline_title,
            $offline_paragraph_one,
            $offline_send,
            $offline_page_link,
            $offline_paragraph_two,
            $banners_title,
            $banners_size,
            $banners_description,
            $ad_title,
            $ad_info,
            $links_title,
            $email_title,
            $email_group,
            $email_button,
            $email_no_group,
            $email_choose,
            $email_notice,
            $email_ascii,
            $email_html,
            $email_test,
            $email_test_info,
            $email_source,
            $html_title,
            $html_view_link,
            $traffic_title,
            $traffic_display,
            $traffic_display_visitors,
            $traffic_button,
            $traffic_title_details,
            $traffic_ip,
            $traffic_refer,
            $traffic_date,
            $traffic_time,
            $traffic_bottom_tag_one,
            $traffic_bottom_tag_two,
            $traffic_bottom_tag_three,
            $traffic_none,
            $traffic_no_url,
            $traffic_box_title,
            $traffic_box_info,
            $payment_title,
            $payment_date,
            $payment_commissions,
            $payment_amount,
            $payment_totals,
            $payment_none,
            $tier_stats_title,
            $tier_stats_accounts,
            $tier_stats_grab_link,
            $tier_stats_none,
            $tier_stats_username,
            $tier_stats_current,
            $tier_stats_previous,
            $tier_stats_totals,
            $recurring_title,
            $recurring_none,
            $recurring_date,
            $recurring_status,
            $recurring_payout,
            $recurring_amount,
            $recurring_every,
            $recurring_in,
            $recurring_days,
            $recurring_total,
            $tlinks_title,
            $tlinks_embedded_one,
            $tlinks_embedded_two,
            $tlinks_embedded_current,
            $tlinks_forced_two,
            $tlinks_forced_code,
            $tlinks_forced_paste,
            $tlinks_forced_money,
            $comdetails_title,
            $comdetails_date,
            $comdetails_time,
            $comdetails_type,
            $comdetails_status,
            $comdetails_amount,
            $comdetails_additional_title,
            $comdetails_additional_ordnum,
            $comdetails_additional_saleamt,
            $comdetails_type_1,
            $comdetails_type_2,
            $comdetails_type_3,
            $comdetails_type_4,
            $comdetails_status_1,
            $comdetails_status_2,
            $comdetails_status_3,
            $comdetails_not_available,
            $details_title,
            $details_drop_1,
            $details_drop_2,
            $details_drop_3,
            $details_drop_4,
            $details_drop_5,
            $details_button,
            $details_date,
            $details_status,
            $details_commission,
            $details_details,
            $details_type_1,
            $details_type_2,
            $details_type_3,
            $details_none,
            $details_no_group,
            $details_choose,
            $general_title,
            $general_transactions,
            $general_earnings_to_date,
            $general_history_link,
            $general_standard_earnings,
            $general_current_earnings,
            $general_traffic_title,
            $general_traffic_visitors,
            $general_traffic_unique,
            $general_traffic_sales,
            $general_traffic_ratio,
            $general_traffic_info,
            $general_traffic_pay_type,
            $general_traffic_pay_level,
            $general_notes_title,
            $general_notes_date,
            $general_notes_to,
            $general_notes_all,
            $general_notes_none,
            $contact_left_column_title,
            $contact_left_column_text,
            $contact_title,
            $contact_name,
            $contact_email,
            $contact_message,
            $contact_chars,
            $contact_button,
            $contact_received,
            $contact_invalid_name,
            $contact_invalid_email,
            $contact_invalid_message,
            $invoice_button,
            $invoice_header,
            $invoice_aff_info,
            $invoice_co_info,
            $invoice_acct_info,
            $invoice_payment_info,
            $invoice_comm_date,
            $invoice_comm_amt,
            $invoice_comm_type,
            $invoice_admin_note,
            $invoice_footer,
            $invoice_print,
            $invoice_none,
            $invoice_aff_id,
            $invoice_aff_user,
            $menu_pdf_marketing,
            $menu_pdf_training,
            $marketing_target_url,
            $marketing_source_code,
            $marketing_group,
            $peels_title,
            $peels_view,
            $peels_description,
            $lb_head_title,
            $lb_head_description,
            $lb_head_source_code,
            $lb_head_code_notes,
            $lb_head_tutorial,
            $lb_body_title,
            $lb_body_description,
            $lb_body_click,
            $lb_body_source_code,
            $pdf_title,
            $pdf_training,
            $pdf_marketing,
            $pdf_description_1,
            $pdf_description_2,
            $pdf_file_name,
            $pdf_file_size,
            $pdf_file_description,
            $pdf_bytes,
            $menu_heading_training_materials,
            $menu_videos,
            $menu_custom_manual,
            $menu_page_peels,
            $menu_lightboxes,
            $menu_email_templates,
            $menu_heading_custom_links,
            $menu_custom_reports,
            $menu_keyword_links,
            $menu_subid_links,
            $menu_alteranate_links,
            $menu_heading_additional,
            $menu_drop_heading_stats,
            $menu_drop_heading_commissions,
            $menu_drop_heading_history,
            $menu_drop_heading_traffic,
            $menu_drop_heading_account,
            $menu_drop_heading_logo,
            $menu_drop_heading_faq,
            $menu_drop_general_stats,
            $menu_drop_tier_stats,
            $menu_drop_current,
            $menu_drop_tier,
            $menu_drop_pending,
            $menu_drop_paid,
            $menu_drop_paid_rec,
            $menu_drop_recurring,
            $menu_drop_edit,
            $menu_drop_password,
            $menu_drop_change,
            $account_hidden,
            $keyword_title,
            $keyword_info,
            $keyword_heading,
            $keyword_tracking,
            $keyword_build,
            $keyword_example,
            $keyword_tutorial,
            $sub_tracking_title,
            $sub_tracking_info,
            $sub_tracking_build,
            $sub_tracking_example,
            $sub_tracking_tutorial,
            $sub_tracking_id,
            $alternate_title,
            $alternate_option_1,
            $alternate_heading_1,
            $alternate_info_1,
            $alternate_button,
            $alternate_links_heading,
            $alternate_links_note,
            $alternate_links_remove,
            $alternate_option_2,
            $alternate_info_2,
            $alternate_variable,
            $alternate_example,
            $alternate_build,
            $alternate_none,
            $alternate_tutorial,
            $cr_title,
            $cr_select,
            $cr_button,
            $cr_no_results,
            $cr_no_results_info,
            $cr_used,
            $cr_found,
            $cr_times,
            $cr_unique,
            $cr_detailed,
            $cr_export,
            $cr_none,
            $logo_title,
            $logo_info,
            $logo_bullet_one,
            $logo_bullet_two,
            $logo_bullet_three,
            $logo_bullet_size_one,
            $logo_bullet_size_two,
            $logo_bullet_req_size_one,
            $logo_bullet_req_size_two,
            $logo_bullet_pixels,
            $logo_choose,
            $logo_file,
            $logo_browse,
            $logo_button,
            $logo_current,
            $logo_remove,
            $logo_display_status,
            $logo_pending,
            $logo_approved,
            $logo_success,
            $signup_security_title,
            $signup_security_info,
            $signup_security_code,
            $sub_tracking_none,
            $missing_security_code,
            $alternate_success_title,
            $alternate_success_info,
            $alternate_failed_title,
            $alternate_failed_info,
            $logo_missing_filename,
            $logo_required_width,
            $logo_required_height,
            $logo_maximum_width,
            $logo_maximum_height,
            $logo_size_maximum,
            $logo_bad_filetype,
            $logo_upload_error,
            $logo_error_title,
            $logo_error_bytes,
            $excel_title,
            $excel_tab_report,
            $excel_tab_logs,
            $excel_date,
            $excel_affiliate,
            $excel_criteria,
            $excel_link,
            $excel_hits,
            $excel_comm_stats,
            $excel_comm_current,
            $excel_comm_paid,
            $excel_comm_total,
            $excel_comm_ratio,
            $excel_earned,
            $excel_earned_current,
            $excel_earned_paid,
            $excel_earned_total,
            $excel_earned_tab,
            $excel_log_title,
            $excel_log_ip,
            $excel_log_refer,
            $excel_log_date,
            $excel_log_time,
            $excel_log_target,
            $etemplates_title,
            $etemplates_view_link,
            $etemplates_name,
            $signup_maintenance_heading,
            $signup_maintenance_info,
            $marketing_group_title,
            $marketing_button,
            $marketing_no_group,
            $marketing_choose,
            $marketing_notice,
            $canspam_heading,
            $canspam_accept,
            $canspam_error,
            $signup_banned,
            $header_testimonials,
            $testi_visit,
            $testi_description,
            $testi_name,
            $testi_url,
            $testi_content,
            $testi_code,
            $testi_submit,
            $testi_na,
            $testi_title,
            $testi_success_title,
            $testi_success_message,
            $testi_error_title,
            $testi_error_name_missing,
            $testi_error_url_missing,
            $testi_error_missing,
            $menu_drop_delayed,
            $details_drop_6,
            $details_type_6,
            $comdetails_status_6,
            $tc_reaccept_title,
            $tc_reaccept_sub_title,
            $tc_reaccept_button,
            $tlinks_active,
            $tlinks_payout_structure,
            $tlinks_level,
            $tierText1,
            $tierText2,
            $tierText3,
            $tierTextflat,
            $edit_custom_button,
            $private_heading,
            $private_info,
            $private_required_heading,
            $private_code_title,
            $private_button,
            $private_error_title,
            $private_error_invalid,
            $private_error_expired,
            $qr_code_title,
            $qr_code_size,
            $qr_code_button,
            $qr_code_offline_title,
            $qr_code_offline_content1,
            $qr_code_offline_content2,
            $qr_code_online_title,
            $qr_code_online_content,
            $menu_coupon,
            $coupon_title,
            $coupon_desc,
            $coupon_head_1,
            $coupon_head_2,
            $coupon_head_3,
            $coupon_sale_amt,
            $coupon_flat_rate,
            $coupon_default,
            $cc_vanity_title,
            $cc_vanity_field,
            $cc_vanity_button,
            $cc_vanity_error_missing,
            $cc_vanity_error_exists,
            $cc_vanity_error,
            $cc_vanity_success,
            $coupon_none,
            $pic_error_title,
            $pic_missing,
            $pic_invalid,
            $pic_error,
            $pic_success,
            $pic_title,
            $pic_info,
            $pic_bullet_1,
            $pic_bullet_2,
            $pic_bullet_3,
            $pic_file,
            $pic_button,
            $pic_current,
            $pic_remove,
            $progress_title,
            $progress_complete,
            $progress_none,
            $progress_sentence_1,
            $progress_sentence_2,
            $progress_sentence_3,
            $aff_lib_button,
            $menu_announcements,
            $announcements_name,
            $announcements_facebook_message,
            $announcements_twitter_message,
            $announcements_facebook_link,
            $announcements_facebook_picture,
            $general_last_30_days_activity,
            $general_last_30_days_activity_traffic,
            $general_last_30_days_activity_commissions,
            $accountability_title,
            $accountability_text,
            $debit_reason_0,
            $debit_reason_1,
            $debit_reason_2,
            $debit_reason_3,
            $debit_reason_4,
            $debit_reason_5,
            $menu_drop_pending_debits,
            $debit_amount_label,
            $debit_date_label,
            $debit_reason_label,
            $debit_paragraph,
            $debit_invoice_amount,
            $debit_revised_amount,
            $mv_head_description,
            $mv_head_source_code,
            $mv_body_title,
            $mv_body_description,
            $mv_body_source_code,
            $menu_marketing_videos,
            $mv_preview_button,
            $dt_no_data,
            $dt_showing_exists,
            $dt_showing_none,
            $dt_filtered,
            $dt_length_choice,
            $dt_loading,
            $dt_processing,
            $dt_no_records,
            $dt_first,
            $dt_last,
            $dt_next,
            $dt_previous,
            $dt_sort_asc,
            $dt_sort_desc,
            $choose_marketing_group,
            $email_already_used_1,
            $email_already_used_2,
            $email_already_used_3,
            $missing_fax,
            $chart_last_6_months,
            $chart_last_6_months_paid,
            $chart_this_month,
            $chart_this_month_none,
            $login_return,
            $login_lost_details,
            $account_edit_general_prefs,
            $account_edit_email_language,
            $footer_connect,
            $modal_close,
            $vat_amount_heading,
            $menu_logout,
            $menu_upload_picture,
            $menu_offer_testi,
            $fb_login,
            $fb_permissions,
            $announcements_published,
            $training_videos_title,
            $training_videos_general,
            $commission_method,
            $how_will_you_earn,
            $pm_account_credit,
            $pm_check_money_order,
            $pm_paypal,
            $pm_stripe,
            $pm_wire,
            $add_to_signup_left_column_text,
            $paypal_email,
            $stripe_acct_details,
            $stripe_connect,
            $stripe_success,
            $stripe_settings,
            $stripe_connect_edit,
            $stripe_delete,
            $stripe_confirm,
            $payment_settings,
            $edit_payment_settings,
            $invalid_paypal_address,
            $payment_method_error,
            $payment_settings_updated,
            $stripe_removed,
            $payment_settings_success,
            $payment_update_notice_1,
            $payment_update_notice_2,
			$pm_title_credit,
			$pm_title_mo,
			$pm_title_paypal,
			$pm_title_stripe,
			$pm_title_wire,
			$privacy_link,
			$privacy_signup_title,
			$privacy_signup_agree,
			$missing_privacy,
			$header_privacy
        ));
		
    } catch ( Exception $ex ) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        die;
    }
	
		$checkdat = $db->query("SHOW COLUMNS from idevaff_language_packs LIKE 'direction'");
		if (!$checkdat->rowCount()) {
		$add_column = $db->prepare("ALTER TABLE idevaff_language_packs ADD direction int UNSIGNED NOT NULL default '0'");
		$add_column->execute();	}

    try {
        $st = $db->prepare("insert into idevaff_language_packs (name, status, def, table_name, user_created, direction) VALUES (?, 1, 0, ?, 0, 1)");
        $st->execute(array($language_pack_name, $language_pack_table_name));
    } catch ( Exception $ex ) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        die;
    }
	
    try {
        $lang_check = $db->prepare("select id from idevaff_language_packs where table_name = ?");
        $lang_check->execute(array($language_pack_table_name));
        $lang_check->setFetchMode(PDO::FETCH_ASSOC);
        $lang_check = $lang_check->fetch();
        $lang_check = "pack_" . $lang_check['id'];

        $db->query("ALTER TABLE idevaff_language_custom_values ADD $lang_check longtext");
        $st = $db->prepare("insert into idevaff_language_custom_values ($lang_check) VALUES (?)");
        $st->execute(array("Marketing Material"));
    } catch ( Exception $ex ) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        die;
    }

    if (!isset($new_install_package)) {
        echo "<div class=\"alert alert-info\" style=\"margin-top:0px; margin-bottom:5px;\"><span style=\"font-size:120%;\">Language Pack Notice</span><br />A new language pack (<strong>" . ucwords($language_pack_name) . "</strong>) was added.</div>";
    }

}

?>