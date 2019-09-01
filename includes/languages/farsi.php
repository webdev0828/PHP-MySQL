<?PHP

//-------------------------------------------------------
	  $language_pack_name = "farsi";
	  $language_pack_table_name = "farsi";
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
$header_title = "برنامه همکار";
$header_indexLink = "صفحه اصلی همکار";
$header_signupLink = "اکنون ثبت‌ نام کنید";
$header_accountLink = "مدیریت حساب";
$header_emailLink = "تماس با ما";
$header_greeting = "خوش آمدید";
$header_nonLogged = "مهمان";
$header_logout = "از اینجا خارج شوید";
$footer_tag = "نرم‌افزار همکاری توسط iDevAffiliate";
$footer_copyright = "کپی رایت";
$footer_rights = "تمام حقوق محفوظ است";
$index_heading_1 = "به برنامه همکاری ما خوش آمدید!";
$index_paragraph_1= "پیوستن به برنامه ما رایگان و ثبت‌نام در آن آسان است و نیازی به دانش فنی ندارد. برنامه‌های همکار روی اینترنت، رایج هستند و راهی دیگری را پیش پای صاحبان وبسایت‌ها می‌گذارد تا  درآمد بیشتری از وبسایت‌های خود بدست آورند. برنامه‌های همکار بر ترافیک و فروش وبسایت‌های تجاری می‌افزاید و در ازای آن مبلغی به عنوان کمیسیون برمی‌دارد.";
$index_heading_2 = "چگونه کار می‌کند؟";
$index_paragraph_2 = "در صورتی که به برنامه همکاری ما بپیوندید، تعدادی بنر و لینک‌های متنی به شما خواهیم داد که در وبسایت خود قرار دهید. اگر کاربری روی یکی از لینک‌های شما کلیک نماید، به وبسایت ما منتقل شده و فعالیت‌های او توسط نرم افزارهای همکاری ما رهگیری خواهد شد. شما بر اساس نوع کمیسیون خود، مبلغی را به عنوان کمیسیون دریافت خواهید کرد.";
$index_heading_3 = "آمارها و گزارش‌های بلادرنگ!";
$index_paragraph_3 = "هر روز ۲۴ ساعته لاگین کنید تا میزان فروش، ترافیک و تراز حساب خود را چک کرده و طرز کار بنرها را ببینید.";
$index_login_title = "ورود همکار";
$index_login_username = "نام کاربری";
$index_login_password = "رمز عبور";
$index_login_username_field = "نام کاربری";
$index_login_password_field = "رمز عبور";
$index_login_button = "ورود";
$index_login_signup_link = "برای ثبت نام اینجا را کلیک کنید";
$index_table_title = "جزئیات برنامه";
$index_table_commission_type = "نوع کمیسیون";
$index_table_initial_deposit = "پیش پرداخت اولیه";
$index_table_requirements = "الزامات پرداخت";
$index_table_duration = "دوره پرداخت";
$index_table_choose = "یکی از گزینه‌های  پرداخت زیر را انتخاب کنید!";
$index_table_sale = "پرداخت بر حسب فروش";
$index_table_click = "پرداخت بر حسب کلیک";
$index_table_sale_text = "برای هر فروشی که انجام می‌دهید.";
$index_table_click_text = "برای هر کلیکی که انجام می‌دهید";
$index_table_deposit_tag = "فقط برای ثبت نام!";
$index_table_requirements_tag = "حداقل تراز لازم برای پرداخت";
$index_table_duration_tag = "پرداخت‌ها یکبار در ماه و برای ماه قبل انجام می‌شود";
$signup_left_column_text = "به برنامه همکاری ما بپیوندید و برای هر فروشی که شما به مسیر ما هدایت کرده‌اید، پول بگیرید! این کار آسان است، حساب کاربری خود را بسازید، کد لینک خود را در وبسایتتان قرار دهید و سپس نگاه کنید که چطور بازدید کنندگان سایت شما که مشتریان ما می‌شوند، تراز حساب شما را افزایش خواهند داد.";
$signup_left_column_title = "برای همکاری با ما خوش آمدید!";
$signup_login_title = "حساب کاربری خود را بسازید";
$signup_login_username = "نام کاربری";
$signup_login_password = "رمز عبور";
$signup_login_password_again = "دوباره رمز عبور";
$signup_login_minmax_chars = "- باشد. user_min_chars نام کاربری باید حداقل شامل کاراکترهای &lt;br /&gt;- نام کاربری می تواند حرف-عدد باشد.&lt;br /&gt;- نام کاربری می تواند شامل این کاراکتر ها باشد: _ (کلمه خط دار)&lt;br /&gt;&lt;br /&gt;- رمز عبور باید حداقل  کاراکتر های  pass_min_charsرا داشته باشد.&lt;br /&gt;- رمز عبور می تواند به صورت حرف-عدد باشد.&lt;br /&gt;- رمز عبور می تواند شامل این کارکتر های باشد:  characters_allowed";
$signup_login_must_match = "این کلمه باید با رمز عبور مطابقت داشته باشد.";
$signup_standard_title = "اطلاعات استاندارد";
$signup_standard_email = "آدرس ایمیل";
$signup_standard_company = "نام شرکت";
$signup_standard_checkspayable = "چک در وجه";
$signup_standard_weburl = "آدرس وبسایت";
$signup_standard_taxinfo = "Tax ID, SSN یا VAT";
$signup_personal_title = "اطلاعات شخصی";
$signup_personal_fname = "نام";
$signup_personal_state = "ایالت یا استان";
$signup_personal_lname = "نام خانوادگی";
$signup_personal_phone = "شماره تلفن";
$signup_personal_addr1 = "نام خیابان";
$signup_personal_fax = "شماره فکس";
$signup_personal_addr2 = "بقیه آدرس";
$signup_personal_zip = "کد پستی";
$signup_personal_city = "شهر";
$signup_personal_country = "کشور";
$signup_commission_title = "پرداخت کمیسیون";
$signup_commission_howtopay = "ما چگونه باید به شما پرداخت کنیم؟";
$signup_commission_style_PPS = "پرداخت بر اساس فروش";
$signup_commission_style_PPC = "پرداخت بر اساس کلیک";
$signup_terms_title = "شرایط و ضوابط";
$signup_terms_agree = "اینجانب شرایط و ضوابط مندرج در بالا را خوانده، متوجه شده و با آنها موافقت می‌کنم.";
$signup_page_button = "حساب کاربری مرا ایجاد کن";
$signup_success_email_comment = "ما ایمیلی شامل نام کاربری و رمز عبور برای شما فرستاده‌ایم. .<BR />\r\n شما باید این اطلاعات را برای مراجعات بعدی، در جای امنی نگاه دارید.";
$signup_success_login_link = "به حساب کاربری خود وارد شوید";
$custom_fields_title = "فیلدهای تعریف شده توسط کاربر";
$logout_msg = "<b>اکنون از سیستم خارج شده اید</b><BR /> از شرکتتان در برنامه همکاری ما، سپاسگزاریم.";
$signup_page_success = "حساب کاربری شما ایجاد شده است";
$login_left_column_title = "ورود به حساب کاربری";
$login_left_column_text = "با استفاده از نام کاربری و رمز عبور خود، به آمارهای حساب کاربری، بنرها، کد لینک، پرسش‌ها و پاسخ‌های متداول و بیشتر از اینها، دسترسی پیدا کنید. .<BR/ ><BR/ > اگر رمز عبور خود را فراموش کرده‌اید، نام کاربری خود را وارد کنید و ما اطلاعات ورود به سیستم شما را از طریق ایمیل برایتان خواهیم فرستاد. .<BR/ ><BR/ >";
$login_title = "به حساب کاربری خود وارد شوید";
$login_username = "نام کاربری";
$login_password = "رمز عبور";
$login_invalid = "ورود معتبر نیست";
$login_now = "به حساب کاربری من وارد شو";
$login_send_title = "به رمز عبور خود نیاز دارید؟";
$login_send_username = "نام کاربری";
$login_send_info = "جزئیات ورود به ایمیل فرستاده شد";
$login_send_pass = "به ایمیل بفرست";
$login_send_bad = "نام کاربری یافت نشد";
$help_new_password_heading = "رمز عبور جدید";
$help_new_password_info = "رمزعبور باید حداقل به صورت pass_min_chars باشد. این ممکن است شامل حروف، اعداد، و کاراکترهای زیرباشد.characters_allowed";
$help_confirm_password_heading = "رمز عبور جدید را تایید کنید";
$help_confirm_password_info = "این رمز عبور باید با رمز عبور جدید یکسان باشد.";
$help_custom_links_heading = "رهگیری کلیدواژه";
$help_custom_links_info = "کلید واژه نباید بیش از ۳۰ کرکتر طول داشته باشد و فقط می‌تواند شامل حروف، اعداد و خط تیره باشد.";
$error_title = "خطاهای زیر تشخیص داده شد";
$username_invalid = "نام کاربری نامعتبر است. نام کاربری شما ممکن است شامل حروف، اعداد باشد.";
$username_taken = "نام کاربری که شما انتخاب کرده‌اید، قبلاً گرفته شده است";
$username_short = "نام کاربری شما خیلی کوتاه است. نام کاربری باید حداقل user_min_chars کرکتر طول داشته باشد.";
$username_long = "نام کاربری خیلی طولانی است. نام کاربری باید حداکثر user_max_chars کرکتر داشته باشد.";
$password_invalid = "رمزعبور نامعتبراست. رمز عبور ممکن است شامل حروف، اعداد، وکاراکتر های زیر باشد.  characters_allowed";
$password_short = "رمزعبور خیلی کوتاه است. رمز عبور باید حداقل pass_min_chars کرکتر طول داشته باشد.";
$password_long = "رمز عبور شما خیلی طولانی است. رمز عبور باید حداکثر pass_max_chars کرکتر طول داشته باشد.";
$password_mismatch = "رمزعبوری که وارد کرده‌اید با رمز عبور شما مطابقت ندارد";
$missing_checks = "لطفاً نام کسی را وارد کنید که چک باید در وجه او صادر شود";
$missing_tax = "لطفاً اطلاعات مربوط به Tax ID, SSN یا VAT را وارد کنید.";
$missing_fname = "لطفاً نام خود را وارد کنید.";
$missing_lname = "لطفاً نام خانوادگی خود را وارد کنید.";
$missing_email = "لطفاً آدرس ایمیل خود را وارد کنید";
$invalid_email = "آدرس ایمیل شما معتبر نیست.";
$missing_address = "لطفاً نام خیابان خود را وارد کنید.";
$missing_city = "لطفاً نام شهر خود را وارد کنید.";
$missing_company = "لطفاً نام شرکت خود را وارد کنید.";
$missing_state = "لطفاً نام ایالت و یا استان خود را وارد کنید.";
$missing_zip = ".لطفاً کد پستی خود را وارد کنید";
$missing_phone = ".لطفاً شماره تلفن خود را وارد کنید";
$missing_website = ".لطفاً آدرس وبسایت خود را وارد کنید";
$missing_paypal = ".شما پرداخت از طریق پی‌پل را انتخاب کرده‌اید. لطفاً نام کاربری پی‌پل خود را وارد کنید";
$missing_terms = ".شما شرایط و ضوابط ما را نپذیرفته‌اید";
$paypal_required = "داشتن حساب پی‌پل جهت پرداخت الزامی است.";
$missing_custom = "لطفاً فیلد نام را تکمیل کنید:";
$account_total_transactions = "تراکنش‌های کل";
$account_standard_linking_code = "کد لینکدهی استاندارد-برای استفاده در ایمیل‌ها عالیست!";
$account_copy_paste = "کد بالا را در وبسایت یا ایمیل‌های خود کپی/پیست کنید.";
$account_not_approved = "حساب کاربری شما در حال حاضر منتظر تایید است.";
$account_suspended = "حساب کاربری شما در حال حاضر در حالت تعلیق است";
$account_standard_earnings = "درآمدهای استاندارد";
$account_inc_bonus = "شامل پاداش";
$account_second_tier = "درآمدهای رده‌ای";
$account_recurring = "درآمدهای بازگشتی";
$account_not_available = "موجود نیست";
$account_earned_todate = "مجموع درآمد تا تاریخ";
$menu_heading_overview = "مروری بر حساب کاربری";
$menu_general_stats = "آمارهای عمومی";
$menu_tier_stats = "آمارهای رده‌ای";
$menu_payment_history = "تاریخچه پرداخت";
$menu_commission_details = "جزئیات کمیسیون";
$menu_recurring_commissions = "کمیسیون‌های بازگشتی";
$menu_traffic_log = "واقعه نگار ترافیک ورودی";
$menu_heading_marketing = "لوازم بازاریابی";
$menu_banners = "بنر";
$menu_text_ads = "آگهی‌های متنی";
$menu_text_links = "لینک‌های متنی";
$menu_email_links = "لینک‌های ایمیلی";
$menu_html_links = "آگهی‌های HTML";
$menu_offline = "بازاریابی آفلاین";
$menu_tier_linking_code = "کد لینکدهی رده‌ای";
$menu_email_friends = "ایمیل به دوستان و وابستگان";
$menu_custom_links = "لینک‌های خود را بسازید و رهگیری کنید";
$menu_heading_management = "مدیریت حساب کاربری";
$menu_comalert = "CommissionAlert تنظیم";
$menu_comstats = "CommissionStats تنظیم";
$menu_edit_account = "حساب کاربری مرا ویرایش کن";
$menu_change_pass = "رمز عبور مرا عوض کن";
$menu_change_commission = "نوع کمیسیون مرا عوض کن";
$menu_heading_general_info = "اطلاعات عمومی";
$menu_browse_affiliates = "همکاران دیگر را مرور کن";
$menu_faq = "پرسش‌های متداول";
$suspended_title = "هشدار وضعیت حساب کاربری";
$suspended_heading = "در حال حاضر حساب کاربری شما در حالت تعلیق است";
$suspended_notes = "یادداشت‌های ادمین";
$pending_title = "هشدار وضعیت حساب کاربری";
$pending_heading = "در حال حاضر حساب کاربری شما در انتظار تایید است";
$pending_note = "به محض تایید حساب کاربری، لوازم بازاریابی در اختیار شما قرار می‌گیرد.";
$faq_title = "پرسش‌های متداول";
$faq_none = "موجود نیست FAQ هنوز";
$browse_title = "همکاران دیگر را مرور کن";
$browse_none = "هیچ همکاری برای دیدن موجود نیست";
$change_comm_title = "نوع کمیسیون را عوض کن";
$change_comm_curr_comm = "نوع کمیسیون جاری";
$change_comm_curr_pay = "سطح پرداخت جاری";
$change_comm_new_comm = "نوع کمیسیون جدید";
$change_comm_warning = "اگر انواع کمیسیون خود را عوض کنید حساب کاربری شما به سطح پرداخت ۱ ریست خواهد شد";
$change_comm_button = "تغییر انواع کمیسیون";
$change_comm_no_other = "انواع دیگر کمیسیون وجود ندارد";
$change_comm_level = "سطح";
$change_comm_updated = "نوع کمیسیون بروزرسانی شد";
$password_title = "رمز عبور مرا عوض کن";
$password_old_password = "رمز عبور قدیم";
$password_new_password = "رمز عبور جدید";
$password_confirm_password = "رمز عبور جدید را تایید کن";
$password_button = "تغییر رمز عبور";
$password_warning_old_missing = "رمز عبور قدیمی نادرست و یا خالی است";
$password_warning_new_missing = "رمز عبور جدید خالی است";
$password_warning_mismatch = "رمز عبور جدید مطابقت نمی کند";
$password_warning_invalid = "رمزعبور نامعتبراست- روی لینک‌های کمک کلیک کنید";
$password_notice = "رمز عبور بروزرسانی شد";
$edit_failed = "خطا در بروزرسانی- خطاهای بالا را ببینید";
$edit_success = "حساب کاربری بروزرسانی شد";
$edit_button = "ویرایش حساب کاربری من";
$commissionstats_title = "CommissionStats تنظیم";
$commissionstats_info = "با نصب CommissionStats شما می‌توانید فوراً آمارهای خود را درست روی صفحه ویندوزتان مشاهده کنید! برای نصب این قابلیت، CommissionStats و <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>unzip</b></a> را روی هارد خود دانلود کرده و فایل <b>setup.exe</b> را اجرا نمایید. پس از مشاهده پیام جهت ورود اطلاعات لاگین خود، جزئیات زیر را وارد نمایید.";
$commissionstats_hint = "توجه: ورودی‌ها را کپی/پیست نمایید تا از درستی آنها مطمئن باشید";
$commissionstats_profile = "نام پروفایل";
$commissionstats_username = "نام کاربری";
$commissionstats_password = "رمز عبور";
$commissionstats_id = "آیدی همکاری";
$commissionstats_source = "مسیر منبع URL";
$commissionstats_download = "دانلود CommissionStats ";
$commissionalert_title = "تنظیم CommissionStats";
$commissionalert_info = "با نصب CommissionAlert شما فوراً از کمیسیون‌های جدید درست روی صفحه ویندوزتان آگاه خواهید شد! برای نصب این قابلیت، CommissionAlert و <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>unzip</b></a> را روی هارد خود دانلود کرده و فایل <b>setup.exe</b> را اجرا نمایید. پس از مشاهده پیام جهت ورود اطلاعات لاگین خود، جزئیات زیر را وارد نمایید.";
$commissionalert_hint = "توجه: ورودی‌ها را کپی/پیست نمایید تا از درستی آنها مطمئن باشید";
$commissionalert_profile = "نام پروفایل";
$commissionalert_username = "نام کاربری";
$commissionalert_password = "رمز عبور";
$commissionalert_id = "آیدی همکاری";
$commissionalert_source = "مسیر منبع URL";
$commissionalert_download = "دانلود CommissionAlert";
$offline_title = "بازاریابی آفلاین";
$offline_paragraph_one = "با تبلیغ وبسایت ما (آفلاین) به دوستان و وابستگان خود، درآمد کسب کنید!";
$offline_send = "مشتریان را بفرست به";
$offline_page_link = "بازدید از صفحه";
$offline_paragraph_two = "مشتریان شما </b>شماره همکاری<b> شما را در کادر بالای صفحه وارد خواهند کرد و به این ترتیب، هنگام خرید نام شما بعنوان معرف ثبت خواهد شد.";
$banners_title = "بنرها";
$banners_size = "اندازه بنر";
$banners_description = "توضیحات بنر";
$ad_title = "آگهی‌های متنی";
$ad_info = "با استفاده از کد لینک دهی تعبیه شده، می‌توانید رنگ و طول و عرض آگهی متنی خود را تنظیم کنید.";
$links_title = "نام لینک";
$email_title = "لینک‌های ایمیل";
$email_group = "گروه بازاریابی";
$email_button = "نمایش لینک‌های ایمیل";
$email_no_group = "هیچ گروهی انتخاب نشده است";
$email_choose = "لطفاً یک گروه بازاریابی از بالا انتخاب کنید";
$email_notice = "گروه‌های بازاریابی ممکن است صفحه‌های ترافیکی ورودی مختلف داشته باشند";
$email_ascii = "<b>ASCII/Text Version</b> - برای استفاده در ایمیل‌های متنی ساده";
$email_html = "<b>HTML Version</b> - برای استفاده در ایمیل‌های با فرمت HTML‌";
$email_test = "لینک آزمایشی";
$email_test_info = "این جایی است که مشتریان شما به وبسایت ما فرستاده می‌شوند";
$email_source = "Source Code - در پیام ایمیل خود کپی/پیست کنید";
$html_title = "HTML نام آگهی";
$html_view_link = "را ببینید HTML این آگهی";
$traffic_title = "ثبت ترافیک ورودی";
$traffic_display = "نمایش آخرین";
$traffic_display_visitors = "بازدید کنندگان";
$traffic_button = "مشاهده ثبت ترافیک";
$traffic_title_details = "جزئیات ترافیک ورودی";
$traffic_ip = "IP آدرس";
$traffic_refer = "ارجاع دهنده URL";
$traffic_date = "تاریخ";
$traffic_time = "زمان";
$traffic_bottom_tag_one = "در حال نمایش آخرین مورد";
$traffic_bottom_tag_two = "از";
$traffic_bottom_tag_three = "مجموع بازدیدکنندگان یکتا";
$traffic_none = "ترافیکی ثیت نشده است";
$traffic_no_url = "موجود نیست- لینک ایمیل و یا بوکمارک ممکن";
$traffic_box_title = "ارجاعی کامل URL";
$traffic_box_info = "روی این لینک کلیک کنید تا صفحه وب را ببینید";
$payment_title = "تاریخچه پرداخت";
$payment_date = "تاریخ پرداخت";
$payment_commissions = "کمیسیون‌ها";
$payment_amount = "مبلغ پرداخت";
$payment_totals = "جمع کل";
$payment_none = "هیچ تاریخچه پرداختی وجود ندارد";
$tier_stats_title = "آمارهای رده‌ای";
$tier_stats_accounts = "حساب‌های رده‌ای مستقیم زیر شما";
$tier_stats_grab_link = "کد لینک دهنده رده‌ای خود را بردارید";
$tier_stats_none = "هیچ حساب کاربری رده‌ای وجود ندارد";
$tier_stats_username = "نام کاربری";
$tier_stats_current = "کمیسیون‌های جاری";
$tier_stats_previous = "پرداخت‌های قبلی";
$tier_stats_totals = "جمع کل";
$recurring_title = "کمیسیون‌های بازگشتی";
$recurring_none = "هیچ کمیسیون بازگشتی وجود ندارد";
$recurring_date = "تاریخ کمیسیون";
$recurring_status = "وضعیت بازگشتی";
$recurring_payout = "پرداخت بعدی";
$recurring_amount = "مقدار";
$recurring_every = "هر";
$recurring_in = "در";
$recurring_days = "روزها";
$recurring_total = "مجموع";
$tlinks_title = "دیگران را به رده خود اضافه کنید و از طریق آنها هم پول درآورید";
$tlinks_embedded_one = "اعتباردهی ثبت نام رده‌ای قبلاُ در لینک‌های همکاری استاندارد شما، فعال شده است!";
$tlinks_embedded_two = "با استفاده از سیستم رده‌ای خواهید توانست برای برنامه همکاری ما نیز بازاریابی کنید. اگر کسی با استفاده از لینک زیر که لینک ارجاعی رده‌ای مخصوص شماست به برنامه همکاری ما بپیوندد، شما در رده بالای او قرار خواهید گرفت. در زیر اطلاعات مربوط به مقدار درآمد شما از این راه، آمده است.";
$tlinks_embedded_current = "پرداخت رده جاری";
$tlinks_forced_two = "با استفاده از سیستم رده‌ای خواهید توانست برای برنامه همکاری ما نیز بازاریابی کنید. اگر کسی با استفاده از لینک زیر که لینک ارجاعی رده‌ای مخصوص شماست به برنامه همکاری ما بپیوندد، شما در رده بالای او قرار خواهید گرفت. در زیر اطلاعات مربوط به مقدار درآمد شما از این راه، آمده است.";
$tlinks_forced_code = "لینک ارجاعی رده";
$tlinks_forced_paste = "کد بالا را در وبسایت خود کپی/پیست کنید";
$tlinks_forced_money = "وبمسترها از اینجا پول در می‌آورند";
$comdetails_title = "جزئیات کمیسیون‌ها";
$comdetails_date = "تاریخ کمیسیون";
$comdetails_time = "زمان کمیسیون";
$comdetails_type = "نوع کمیسیون";
$comdetails_status = "وضعیت جاری";
$comdetails_amount = "مقدار کمیسیون";
$comdetails_additional_title = "جزئیات کمیسیون اضافی";
$comdetails_additional_ordnum = "شماره سفارش";
$comdetails_additional_saleamt = "مقدار فروش";
$comdetails_type_1 = "کمیسیون پاداشی";
$comdetails_type_2 = "کمیسیون بازگشتی";
$comdetails_type_3 = "کمیسیون رده‌ای";
$comdetails_type_4 = "کمیسیون استاندارد";
$comdetails_status_1 = "پرداخت شد";
$comdetails_status_2 = "تایید شد- منتظر پرداخت";
$comdetails_status_3 = "در انتظار تایید";
$comdetails_not_available = "موجود نیست";
$details_title = "جزئیات کمیسیون";
$details_drop_1 = "کمیسیون‌های استاندارد جاری";
$details_drop_2 = "کمیسیون‌های رده‌ای جاری";
$details_drop_3 = "کمیسیون‌های منتظر تایید";
$details_drop_4 = "کمیسیون‌های استاندارد پرداخت شده";
$details_drop_5 = "کمیسیون‌های رده‌ای پرداخت شده";
$details_button = "مشاهده کمیسیون‌ها";
$details_date = "تاریخ";
$details_status = "وضعیت";
$details_commission = "کمیسیون";
$details_details = "مشاهده جزئیات";
$details_type_1 = "پرداخت شده";
$details_type_2 = "منتظر تایید";
$details_type_3 = "تایید شد- منتظر پرداخت";
$details_none = "کمیسیونی برای مشاهده وجود ندارد";
$details_no_group = "هیچ گروه کمیسیونی انتخاب نشده است";
$details_choose = "لطفاً یکی از گروه‌های کمیسیون بالا را انتخاب کنید";
$general_title = "کمیسیون‌های جاری- از آخرین پرداخت تا به امروز";
$general_transactions = "تراکنش‌ها";
$general_earnings_to_date = "درآمد تا به امروز";
$general_history_link = "مشاهده تاریخچه پرداخت";
$general_standard_earnings = "درآمدهای استاندارد";
$general_current_earnings = "درآمدهای جاری";
$general_traffic_title = "آمارهای ترافیکی";
$general_traffic_visitors = "بازدیدکنندگان";
$general_traffic_unique = "بازدیدکنندگان یکتا";
$general_traffic_sales = "فروش‌های تایید شده";
$general_traffic_ratio = "نسبت فروش";
$general_traffic_info = "این آمارها شامل کمیسیون‌های بازگشتی و رده‌ای نمی‌شود";
$general_traffic_pay_type = "نوع پرداخت";
$general_traffic_pay_level = "سطح پرداخت جاری";
$general_notes_title = "یادداشت‌هایی از ادمین";
$general_notes_date = "تاریخ ایجاد";
$general_notes_to = "به";
$general_notes_all = "تمام همکاران";
$general_notes_none = "یادداشتی موجود نیست";
$contact_left_column_title = "تماس با ما";
$contact_left_column_text = "لطفاً با استفاده از فرم سمت راست، با مدیر برنامه همکاری ما تماس بگیرید.";
$contact_title = "تماس با ما";
$contact_name = "نام شما";
$contact_email = "آدرس ایمیل شما";
$contact_message = "پیام";
$contact_chars = "کرکترهای باقیمانده";
$contact_button = "پیام را بفرست";
$contact_received = "پیام شما را دریافت کرده‌ایم. لطفاً به ما ۲۴ ساعت برای پاسخ‌دهی فرصت دهید.";
$contact_invalid_name = "نام معتبر نیست";
$contact_invalid_email = "آدرس ایمیل معتبر نیست";
$contact_invalid_message = "پیام معتبر نیست";
$invoice_button = "صورتحساب";
$invoice_header = "صورتحساب پرداخت همکار";
$invoice_aff_info = "اطلاعات همکار";
$invoice_co_info = "اطلاعات";
$invoice_acct_info = "اطلاعات حساب کاربری";
$invoice_payment_info = "اطلاعات پرداخت";
$invoice_comm_date = "تاریخ پرداخت";
$invoice_comm_amt = "مقدار کمیسیون";
$invoice_comm_type = "نوع کمیسیون";
$invoice_admin_note = "یادداشت ادمین";
$invoice_footer = "پایان صورتحساب";
$invoice_print = "چاپ صورتحساب";
$invoice_none = "موجود نیست";
$invoice_aff_id = "آیدی همکاری";
$invoice_aff_user = "نام کاربری";
$menu_pdf_marketing = "PDF بروشور بازاریابی";
$menu_pdf_training = "PDF مستندات آموزشی";
$marketing_target_url = "هدف URL";
$marketing_source_code = "Source Code - درون وبسایت خود کپی/پیست کنید";
$marketing_group = "گروه بازاریابی";
$peels_title = "نام پیج پیل";
$peels_view = "مشاهده این پیل";
$peels_description = "توضیحات پیج پیل";
$lb_head_title = "نیاز دارد HEAD شما به کد HTML برای صفحه";
$lb_head_description = "به منظور استفاده از لایت باکس روی وبسایت خود، باید خط‌های زیر را به قسمت سر صفحه‌ای که می‌خواهید آنرا نشان دهد، اضافه کنید.";
$lb_head_source_code = "این کد را در قسمت سر یا HEAD سند HTML‌خود بچسبانید. ";
$lb_head_code_notes = "مهم نیست چه تعداد لایت‌باکس می‌خواهید در صفحه خود بگذارید. شما فقط باید یکبار این کد را قرار دهید.";
$lb_head_tutorial = "مشاهده آموزش";
$lb_body_title = "نام لایت‌باکس";
$lb_body_description = "توضیحات لایت‌باکس";
$lb_body_click = "برای دیدن لایت‌باکس، روی تصویر بالا کلیک کنید.";
$lb_body_source_code = "این کد را در قسمت بدنه‌ی سند  HTML‌ خود، در جایی که می‌خواهید تصویر نمایان شود، بچسبانید.";
$pdf_title = "PDF";
$pdf_training = "مستندات آموزشی";
$pdf_marketing = "بروشورهای بازاریابی";
$pdf_description_1 = "برای مشاهده و چاپ فایل‌های پی دی اف بازاریابی، به ادوبی ریدر نیاز دارید.";
$pdf_description_2 = "ادوبی ریدر را می‌توانید بطور رایگان از وبسایت ادوبی، دانلود کنید.";
$pdf_file_name = "نام فایل";
$pdf_file_size = "اندازه فایل";
$pdf_file_description = "توضیحات";
$pdf_bytes = "بایت";
$menu_heading_training_materials = "مواد آموزشی";
$menu_videos = "مشاهده ویدیوهای آموزشی";
$menu_custom_manual = "دستنامه لینک‌های رهگیری سفارشی";
$menu_page_peels = "پیج پیل‌ها";
$menu_lightboxes = "لایت‌باکس‌ها";
$menu_email_templates = "قالب‌های ایمیل";
$menu_heading_custom_links = "لینک‌های رهگیری سفارشی";
$menu_custom_reports = "گزارش‌ها";
$menu_keyword_links = "لینک‌های رهگیری کلیدواژه";
$menu_subid_links = "لینک‌های رهگیری زیر-همکار";
$menu_alteranate_links = "لینک‌های صفحه ورودی جایگزین";
$menu_heading_additional = "ابزارهای اضافی";
$menu_drop_heading_stats = "آمارهای عمومی";
$menu_drop_heading_commissions = "کمیسیون‌ها";
$menu_drop_heading_history = "تاریخچه پرداخت";
$menu_drop_heading_traffic = "واقعه نگار ترافیک";
$menu_drop_heading_account = "حساب کاربری من";
$menu_drop_heading_logo = "بارگذاری لوگوی من";
$menu_drop_heading_faq = "پرسش‌های متداول";
$menu_drop_general_stats = "آمارهای عمومی";
$menu_drop_tier_stats = "آمارهای رده‌ای";
$menu_drop_current = "کمیسیون‌های جاری";
$menu_drop_tier = "کمیسیون‌های رده‌ای جاری";
$menu_drop_pending = "در انتظار تایید";
$menu_drop_paid = "کمیسیون‌های پرداخت شده";
$menu_drop_paid_rec = "کمیسیون‌های رده‌ای پرداخت شده";
$menu_drop_recurring = "کمیسیون‌های بازگشتی فعال";
$menu_drop_edit = "ویرایش حساب کاربری من";
$menu_drop_password = "تغییر رمزعبور من";
$menu_drop_change = "تغییر نوع کمیسیون من";
$account_hidden = "پنهان";
$keyword_title = "لینک‌های کلیدواژه سفارشی";
$keyword_info = "ایجاد لینک کلیدواژه سفارشی به شما امکان می‌دهد تا ترافیک ورودی از منابع مختلف را رهگیری کنید. با استفاده از حداکثر ۴ کلیدواژه رهگیری متفاوت، یک لینک بسازید و گزارش رهگیری سفارشی، برای هر کلیدواژه‌ای که ساخته‌اید، یک گزارش مفصل به شما خواهد داد.";
$keyword_heading = "متغیرهای موجود برای رهگیری کلیدواژه سفارشی";
$keyword_tracking = "آيدی رهگیری";
$keyword_build = "برای ساختن لینک خود، URL‌زیر را برداشته و آنرا به آیدی رهگیری و کلیدواژه مورد نظر خود اضافه کنید. ";
$keyword_example = "مثال";
$keyword_tutorial = "مشاهده آموزش";
$sub_tracking_title = "رهگیری زیر-همکار";
$sub_tracking_info = "ایجاد یک لینک زیر-همکار به شما امکان می‌دهد تا لینک همکاری خود را جهت استفاده به همکاران خود بدهید. شما خواهید دانست که چه کسی برای شما کمیسیون ایجاد می‌کند چون ما به شما، گزارش فروش زیر-همکارانتان را خواهیم داد. دلیل دیگر برای استفاده از لینک زیر-همکاران، گنجاندن سیستم رهگیری خودتان در گزارش‌گیری است.";
$sub_tracking_build = "در برنامه همکاری، عبارت XXX را به جای شماره آیدی همکاری خود قرار دهید. این کار را برای تمام همکارانتان تکرار کنید.";
$sub_tracking_example = "مثال";
$sub_tracking_tutorial = "مشاهده آموزش";
$sub_tracking_id = "آيدی زیر-همکار";
$alternate_title = "لینک‌های صفحه ورودی جایگزین";
$alternate_option_1 = "گزینه ۱: ایجاد لینک خودکار";
$alternate_heading_1 = "ایجاد لینک خودکار";
$alternate_info_1 = "صفحه ترافیک ورودی خود را با وارد کردن URL صفحه‌ای که می‌خواهید ترافیک به آن هدایت شود، تعریف کنید و ما لینک را برای شما خواهیم ساخت. این ویژگی، لینک کوتاهتری برای شما خواهد ساخت که می‌توانید از آن با URL ادغام شده در این لینک که بکمک یک شماره آیدی در دیتابیس ما ساخته شده است، استفاده کنید.";
$alternate_button = "لینک مرا بساز";
$alternate_links_heading = "لینک‌های URL ورودی جایگزین من";
$alternate_links_note = "با حذف یک لینک سفارشی از این صفحه لینک‌های موجود دست نخورده و عملیاتی باقی خواهند ماند.";
$alternate_links_remove = "حذف";
$alternate_option_2 = "گزینه ۲: ایجاد لینک دستی";
$alternate_info_2 = "اگر ترجیح می‌دهید لینک‌های همکاری خود را بکمک URL ورودی جایگزین اضافه کنید، از ساختار زیر استفاده نمایید.";
$alternate_variable = "متغیر URL‌ورودی جایگزین ";
$alternate_example = "مثال";
$alternate_build = "برای ساختن لینک خود، URL زیر را برداشته و آنرا به URL ‌ ورودی جایگزینی که می‌خواهید از آن استفاده کنید، اضافه نمایید.";
$alternate_none = "هیچ لینک ورودی جایگزینی ساخته نشد.";
$alternate_tutorial = "مشاهده آموزش";
$cr_title = "گزارش کلیدواژه سفارشی";
$cr_select = "یک کلیدواژه انتخاب کنید";
$cr_button = "تولید گزارش";
$cr_no_results = "نتیجه‌ای برای جستجو یافت نشد";
$cr_no_results_info = "ترکیب کلیدواژه دیگری را امتحان کنید";
$cr_used = "کلیدواژه‌های بکار رفته";
$cr_found = "این لینک یافت شد";
$cr_times = "بار";
$cr_unique = "لینک‌های یکتا یافت شد";
$cr_detailed = "گزارش مفصل لینک";
$cr_export = "ارسال گزارش به اکسل";
$cr_none = "هیچ کلیدواژه‌ای یافت نشد.";
$logo_title = "لوگوی شرکت خود را بارگذاری کنید";
$logo_info = "اگر لوگوی شرکت خود را بارگذاری کنید، ما آنرا به مشتریانی که شما به وبسایت ما می‌ُفرستید، نشان خواهیم داد. به این ترتیب می‌توانید هنگام بازدید آنها از وبسایت ما، تجربه مشتریان خود را شخصی‌سازی کنید.";
$logo_bullet_one = "تصویرها ممکن است بصورت .jpg, .gif و یا .png باشند. محتوای فلش مجاز نیست.";
$logo_bullet_two = "تصویرهای نامناسب حذف شده و حساب کاربری شما به حالت تعلیق در خواهد آمد.";
$logo_bullet_three = "تصویر/لوگوی شما تا زمانی که به تایید ما نرسیده باشد، در وبسایت ما به نمایش در نخواهد آمد.";
$logo_bullet_size_one = "حداکثر عرض تصویر می‌تواند ";
$logo_bullet_size_two = "پیکسل و حداکثر ارتفاع آن";
$logo_bullet_req_size_one = "تصویرها باید عرضی داشته باشند برابر";
$logo_bullet_req_size_two = "پیکسل و ارتفاع";
$logo_bullet_pixels = "پیکسل";
$logo_choose = "یک تصویر انتخاب کنید";
$logo_file = "یک فایل انتخاب کنید:";
$logo_browse = "مرور ...";
$logo_button = "بارگذاری";
$logo_current = "تصویر جاری من";
$logo_remove = "حذف";
$logo_display_status = "وضعیت تصویر:";
$logo_pending = "منتظر تایید";
$logo_approved = "تایید شد";
$logo_success = "تصویر با موفقیت بارگذاری شد و اکنون منتظر تایید است.";
$signup_security_title = "بررسی حساب کاربری";
$signup_security_info = "لطفاً کد امنیتی که در کادر می‌بینید را وارد کنید. این مرحله به ما کمک می‌کند از ثبت‌نام‌های اتوماتیک جلوگیری شود.";
$signup_security_code = "کد امنیتی";
$sub_tracking_none = "هیچکدام";
$missing_security_code = "بررسی حساب کاربری/ کد امنیتی نادرست یا خالی است";
$alternate_success_title = "ایجاد موفقیت‌آمیز لینک";
$alternate_success_info = "لینک زیر را بردارید و هدایت ترافیک را به URL ی که خودتان درست کرده‌اید، شروع کنید.";
$alternate_failed_title = "خطای ایجاد لینک";
$alternate_failed_info = "لطفاً یک URL معتبر را وارد کنید.";
$logo_missing_filename = "لطفاً یک نام فایل انتخاب کنید.";
$logo_required_width = "عرض تصویر باید باشد";
$logo_required_height = "ارتفاع تصویر باید باشد";
$logo_maximum_width = "عرض تصویر فقط می‌تواند باشد";
$logo_maximum_height = "ارتفاع تصویر فقط می‌تواند باشد";
$logo_size_maximum = "ماکزیمم اندازه تصویر فقط می‌تواند باشد";
$logo_bad_filetype = "نوع تصویر مجاز نیست. فقط.jpg, .gif و یا .png مجاز هستند.";
$logo_upload_error = "خطا در بارگذاری تصویر. لطفاً با مدیر همکاری تماس بگیرید.";
$logo_error_title = "خطای بارگذاری تصویر";
$logo_error_bytes = "بایت .";
$excel_title = "گزارش لینک‌های کلیدواژه سفارشی";
$excel_tab_report = "گزارش کلیدواژه سفارشی";
$excel_tab_logs = "واقعه نگارهای ترافیکی";
$excel_date = "تاریخ گزارش:";
$excel_affiliate = "آیدی همکار:";
$excel_criteria = "معیار لینک کلیدواژه";
$excel_link = "ساختار لینک";
$excel_hits = "هیت‌های یکتا";
$excel_comm_stats = "آمارهای کمیسیون";
$excel_comm_current = "کمیسیون‌های جاری";
$excel_comm_paid = "کمیسیون‌های پرداخت شده";
$excel_comm_total = "مجموع کمیسیون‌ها";
$excel_comm_ratio = "نسبت تبدیل";
$excel_earned = "درآمد کمیسیون";
$excel_earned_current = "کمیسیون‌های جاری";
$excel_earned_paid = "کمیسیون‌های پرداخت شده";
$excel_earned_total = "مجموع درآمد کمیسیون";
$excel_earned_tab = "روی تب واقعه نگار ترافیکی (زیر) کلیک کنید تا وقایع ترافیکی برای این لینک سفارشی را ببینید.";
$excel_log_title = "واقعه نگار ترافیکی کلیدواژه‌های سفارشی";
$excel_log_ip = "IP آدرس";
$excel_log_refer = "ارجاعی URL";
$excel_log_date = "تاریخ";
$excel_log_time = "زمان";
$excel_log_target = "مقصد URL";
$etemplates_title = "قالب‌های ایمیل";
$etemplates_view_link = "مشاهده این قالب ایمیل";
$etemplates_name = "نام قالب";
$signup_maintenance_heading = "اطلاعیه تعمیر";
$signup_maintenance_info = "ثبت‌نام بطور موقت غیرفعال است. لطفاً بعداً تلاش کنید.";
$marketing_group_title = "گروه بازاریابی";
$marketing_button = "نمایش";
$marketing_no_group = "هیچ گروهی انتخاب نشده است.";
$marketing_choose = "لطفاً یکی از گروه‌های بازاریابی بالا را انتخاب کنید.";
$marketing_notice = "گروه‌های بازاریابی ممکن است صفحه‌های ترافیکی ورودی مختلف داشته باشند.";
$canspam_heading = " مقررات و پذیرش CAN-SPAM";
$canspam_accept = "اینجانب مقررات CAN-SPAM را خوانده، آنرا درک کرده و با آن موافقت دارم.";
$canspam_error = "شما مقررات CAN-SPAM  ما را نپذیرفته‌اید.";
$signup_banned = "بروز خطا هنگام اینجاد حساب کاربری. لطفاً برای اطلاعات بیشتر با ادمین سیستم تماس بگیرید.";
$header_testimonials = "گواهی‌های همکاران";
$testi_visit = "بازدید از وبسایت";
$testi_description = "در مورد برنامه همکاری ما گواهی بنویسید و ما آنرا در صفحه  <a href=’ testimonials.php’> testimonials</a> خود به همراه لینکی به وبسایت شما، قرار خواهیم داد.";
$testi_name = "نام";
$testi_url = "وبسایت URL";
$testi_content = "گواهی";
$testi_code = "کد امنیتی";
$testi_submit = "ارسال گواهی";
$testi_na = "گواهی موجود نیست.";
$testi_title = "گواهی بدهید";
$testi_success_title = "گواهی موفقیت‌آمیز بود.";
$testi_success_message = "از ارسال گواهی سپاسگزاریم. تیم ما بزودی آنرا بررسی خواهد کرد.";
$testi_error_title = "خطا در گواهی";
$testi_error_name_missing = "لطفاً نامتان را به گواهی خود اضافه کنید.";
$testi_error_url_missing = "لطفاً URL سایت‌تان را به گواهی خود اضافه کنید.";
$testi_error_missing = "لطفاً به گواهی خود متن اضافه کنید.";
$menu_drop_delayed = "کمیسیون‌های به تاخیر افتاده";
$details_drop_6 = "کمیسیون‌های به تاخیرافتاده جاری";
$details_type_6 = "به تاخیرافتاده- بزودی تایید خواهد شد.";
$comdetails_status_6 = "به تاخیرافتاده- بزودی تایید خواهد شد.";
$tc_reaccept_title = "اعلان تغییر شرایط و ضوابط";
$tc_reaccept_sub_title = "به منظور دسترسی به حساب کاربری خود باید با شرایط و ضوابط جدید ما موافقت کنید.";
$tc_reaccept_button = "اینجانب شرایط و ضوابط مندرج در بالا را خوانده، درک کرده و با آن موافقت دارم.";
$tlinks_active = "تعداد رده‌های فعال";
$tlinks_payout_structure = "ساختار پرداخت رده‌ای";
$tlinks_level = "سطح";
$tierText1 = "٪ محاسبه شده از مبلغ کمیسیون بازگشتی همکار";
$tierText2 = "٪ محاسبه شده از مبلغ کمیسیون رده بالاتر";
$tierText3 = "٪ محاسبه شده از مبلغ فروش";
$tierTextflat = "نرخ ثابت";
$edit_custom_button = "ویرایش پاسخ";
$private_heading = "ثبت‌نام خصوصی";
$private_info = "ثبت‌نام در برنامه همکاری ما برای عموم باز نیست و برای پیوستن به ما، کد ثبت‌نام لازم است. اطلاعات مربوط به نحوه بدست آوردن کد ثبت نام باید در اینجا باشد.";
$private_required_heading = "کد ثبت‌نام الرامیست";
$private_code_title = "کد ثبت‌نام را وارد کنید";
$private_button = "ارسال کد";
$private_error_title = "کد ثبت‌نام معتبر نیست";
$private_error_invalid = "کد ثبت‌نام شما معتبر نیست.";
$private_error_expired = "تاریخ انقضای کد ثبت‌نام شما بسر رسیده و دیگر اعتبار ندارد.";
$qr_code_title = "QR کدهای";
$qr_code_size = " اندازه کد QR";
$qr_code_button = "نمایش کد QR";
$qr_code_offline_title = " بازاریابی آفلاین";
$qr_code_offline_content1 = "این کد QR رابه بروشورها، آگهی‌ها، کارت‌های ویزیت و دیگر ابزارهای بازاریابی خود اضافه کنید.";
$qr_code_offline_content2 = "- روی تصویر راست کلیک کنید و آنرا در کامپیوتر خود<strong> ذخیره <strong/> کنید.";
$qr_code_online_title = "بازاریابی آنلاین";
$qr_code_online_content = "این کد QR را به وبسایت، شبکه‌های اجتماعی، بلاگ و غیره خود اضافه کنید.";
$menu_coupon = "کدهای کوپن";
$coupon_title = "کدهای کوپن موجود شما";
$coupon_desc = "این کدهای کوپن را پخش کرده و هر بار که کسی با استفاده از آنها خرید می‌کند کمیسیون بگیرید!";
$coupon_head_1 = "کد کوپن";
$coupon_head_2 = "تخفیف مشتری";
$coupon_head_3 = "مقدار کمیسیون شما";
$coupon_sale_amt = "از مبلغ فروش";
$coupon_flat_rate = "نرخ ثابت";
$coupon_default = "سطح پرداخت دیفالت";
$cc_vanity_title = "درخواست کد کوپن اختصاصی";
$cc_vanity_field = "کد کوپن";
$cc_vanity_button = "درخواست کد کوپن";
$cc_vanity_error_missing = "<strong>خطا!</strong> لطفاً یک کد کوپن وارد کنید";
$cc_vanity_error_exists = "<strong>خطا!</strong>  شما قبلاً این کد را درخواست کرده‌اید. منتظر تایید است.";
$cc_vanity_error = "<strong>خطا!</strong>  کد کوپن معتبر نیست. لطفاً فقط از حروف، اعداد و خط زیر استفاده کنید.";
$cc_vanity_success = "<strong>خطا!</strong>  کد کوپن اختصاصی شما درخواست شده است.";
$coupon_none = "هم‌اکنون هیچ کد گوپنی موجود نیست.";
$pic_error_title = "خطای بارگذاری تصویر";
$pic_missing = "لطفاً نام فایل را انتخاب کنید.";
$pic_invalid = "تصویر از نوع مجاز نیست. تصویرها باید از نوع .jpg, .gif و یا .png باشند.";
$pic_error = "خطا در بارگذاری تصویر. لطفاً با مدیر همکاری تماس بگیرید.";
$pic_success = "عکس شما با موفقیت بارگذاری شد.";
$pic_title = "بارگذاری عکس شما";
$pic_info = "بارگذاری عکستان به اختصاصی کردن تجربه ما با شما کمک می‌کند.";
$pic_bullet_1 = "تصویرها ممکن است بصورت .jpg, .gif و یا .png باشند.";
$pic_bullet_2 = "تصویرهای نامناسب حذف و حساب کاربری شما به حالت تعلیق در خواهد آمد.";
$pic_bullet_3 = "عکس شما به نمایش عمومی در نخواهد آمد و فقط برای رویت ما در حساب کاربری شما قرار خواهد گرفت.";
$pic_file = "یک فایل انتخاب کنید:";
$pic_button = "بارگذاری";
$pic_current = "عکس فعلی من";
$pic_remove = "حذف عکس";
$progress_title = "واجد شرایط بودن برای پرداخت بعدی:";
$progress_complete = "کامل شد.";
$progress_none = "الزامی برای حداقل پرداخت وجود ندارد.";
$progress_sentence_1 = "شما بدست آورده‌اید";
$progress_sentence_2 = "از";
$progress_sentence_3 = "الزام.";
$aff_lib_button = "<font style=\"font-size:16px; font-weight:bold;\">درخواست دسترسی رایگان به </font><BR />www.AffiliateLibrary.com";
$menu_announcements = "کارزارهای شبکه‌های اجتماعی";
$announcements_name = "نام کارزار";
$announcements_facebook_message = "پیام فیسبوک";
$announcements_twitter_message = "پیام توییتر";
$announcements_facebook_link = "لینک فیسبوک";
$announcements_facebook_picture = "عکس فیسبوک";
$general_last_30_days_activity = "فعالیت در ۳۰ روز اخیر";
$general_last_30_days_activity_traffic = "ترافیک";
$general_last_30_days_activity_commissions = "کمیسیون‌ها";
$accountability_title = "ارتباط و پاسخگو بودن";
$accountability_text = "<strong> این چیست؟</strong><p>  ما در اعتماد سازی با شرکای همکارمان، رویکردی کنشگرایانه داریم. هدف ما اطمینان از دادن اطلاعات تا حد ممکن در مورد کمیسیون‌هایی است که در سیستم ما گرفته و یا رد شده است. </p></strong>ارتباط<strong><p> ما برای توضیح در مورد کمیسیون‌های نفی شده، در دسترس هستیم. ما با همکاران خود ارتباطات تنگاتنگی داریم و از هر پرسش و فیدبکی استقبال می‌کنیم. </p>";
$debit_reason_0 = 'هیچکدام';
$debit_reason_1 = 'استرداد وجه';
$debit_reason_2 = 'شارژبک';
$debit_reason_3 = 'گزارش تقلب';
$debit_reason_4 = 'سفارش لغو شده';
$debit_reason_5 = 'استراد بخشی از وجه';
$menu_drop_pending_debits = 'بدهی‌های معوق';
$debit_amount_label = 'مبلغ بدهی';
$debit_date_label = 'تاریخ بدهی';
$debit_reason_label = 'دلیل بدهی';
$debit_paragraph = 'بدهی‌ها از پرداخت بعدی شما کسر خواهند شد.';
$debit_invoice_amount = 'منهای مبلغ بدهی';
$debit_revised_amount = 'مبلغ پرداخت بازنگری شده';
$mv_head_description = 'توجه: شما فقط می‌توانید یک ویدیو در هر صفحه از وبسایت خود قرار دهید.';
$mv_head_source_code = 'این کد را در قسمت سر یا HEAD سند HTML‌خود بچسبانید.';
$mv_body_title = 'عنوان ویدیو';
$mv_body_description = 'توضیحات';
$mv_body_source_code = 'این کد را در قسمت بدنه یا BODY در سند HTML خود در جایی که می‌خواهید ویدیو به نمایش درآيد، بچسبانید.';
$menu_marketing_videos = 'ویدیوها';
$mv_preview_button = 'پیش نمایش ویدیو';
$dt_no_data = 'هیچ دیتایی در جدول موجود نیست.';
$dt_showing_exists = 'نشان دادن _START_ تا _END_ از _TOTAL_ ورودی';
$dt_showing_none = 'نمایش ۰ تا ۰ از ۰ ورودی.';
$dt_filtered = '(فیلتر شده از بین _MAX_ کل ورودی‌ها)';
$dt_length_choice = 'نشان دادن ورودی‌های _MENU_';
$dt_loading = 'در حال بارشدن...';
$dt_processing = 'در حال پردازش ...';
$dt_no_records = 'هیچ رکوردی مطابقت نمی‌کند.';
$dt_first = 'اولین';
$dt_last = 'آخرین';
$dt_next = 'بعدی';
$dt_previous = 'قبلی';
$dt_sort_asc = 'برای ترتیب صعودی ستون فعال کنید:';
$dt_sort_desc = 'برای ترتیب نزولی ستون فعال کنید:';
$choose_marketing_group = 'یک گروه بازاریابی انتخاب کنید.';
$email_already_used_1 = 'حساب کاربری را نمی‌توان ایجاد کرد. ما فقط اجازه می‌دهیم';
$email_already_used_2 = 'حساب کاربری';
$email_already_used_3 = 'بر اساس آدرس ایمیل ایجاد شود.';
$missing_fax = 'لطفاً شماره فکس خود را وارد کنید.';
$chart_last_6_months = 'کمیسیون‌های پرداخت شده در ۶ ماه اخیر';
$chart_last_6_months_paid = 'کمیسیون‌ها پرداخت شده‌اند.';
$chart_this_month = '۵ همکار برتر این ماه ما';
$chart_this_month_none = 'دیتایی برای نمایش وجود ندارد.';
$login_return = 'برگشت به صفحه اصلی همکار';
$login_lost_details = 'نام کاربری خود را وارد کنید و ما ایمیلی حاوی اطلاعات ورود به سیستم برای شما خواهیم فرستاد.';
$account_edit_general_prefs = 'الویت‌های کلی';
$account_edit_email_language = 'زبان ایمیل';
$footer_connect = 'با ما در ارتباط باشید';
$modal_close = 'بستن';
$vat_amount_heading = 'VAT مقدار';
$menu_logout = 'خروج';
$menu_upload_picture = 'عکس خود را بارگذاری کنید';
$menu_offer_testi = 'گواهی دهید';
$fb_login = 'با فیسبوک وارد شوید';
$fb_permissions = 'مجوزها داده نشده است. لطفاً اجازه دهید وبسایت از آدرس ایمیل شما استفاده کند.';
$announcements_published = "اطلاعیه منتشر شد";
$training_videos_title = "ویدیوهای آموزشی";
$training_videos_general = "بازاریابی عمومی";
$commission_method = "روشهای کمیسیون";
$how_will_you_earn = "چگونه کمیسیون خواهید گرفت؟";
$pm_account_credit = "ما بر اساس کمیسیونی که دریافت کرده‌اید به حساب کاربری شما اعتبار خواهیم داد.";
$pm_check_money_order = "ما یک چک/مانی اردر برای شما خواهیم فرستاد";
$pm_paypal = "ما از طریق پی‌پل به شما پرداخت خواهیم کرد.";
$pm_stripe = "ما از طریق استرایپ به شما پرداخت خواهیم کرد..";
$pm_wire = "ما یک وایر ترنسفر برای شما خواهیم فرستاد.";
$add_to_signup_left_column_text = "<span style=\"color:#CC0000; font-style:italic;\">  فیلدهای * دار الزامی هستند. </span >";
$paypal_email = "ایمیل پی‌پل";
$stripe_acct_details = "جزئیات حساب استرایپ";
$stripe_connect = "شما می‌توانید پس از ثبت‌نام از صفحه تنظیمات به حساب استرایپ خود متصل شوید.";
$stripe_success = "اتصال به حساب استرایپ با موفقیت انجام شد.";
$stripe_settings = "تنظیمات استرایپ";
$stripe_connect_edit = "با استرایپ وصل شوید";
$stripe_delete = "حذف حساب استرایپ";
$stripe_confirm = "آیا از حذف این حساب مطمئن هستید؟";
$payment_settings = "تنظیمات پرداخت";
$edit_payment_settings = "ویرایش تنظیمات پرداخت";
$invalid_paypal_address = "آدرس ایمیل پی‌پل معتبر نیست.";
$payment_method_error = "لطفاً یک روش پرداخت انتخاب کنید.";
$payment_settings_updated = "تنظیمات پرداخت بروزرسانی شد.";
$stripe_removed = "حساب استرایپ حذف شد.";
$payment_settings_success = "موفق!";
$payment_update_notice_1 = "توجه!";
$payment_update_notice_2 = "شما پرداخت از طریق </strong>[payment_option_here]< strong> را انتخاب کرده‌اید. لطفاً <a href=\"account.php?page=48\" style=\"font-weight:bold;\">  اینجا را کلیک کنید </a>  تا به حساب </strong>[payment_option_here]< strong>  خود متصل شوید.";
$pm_title_credit = "اعتبار حساب";
$pm_title_mo = "بررسی/سفارش پول";
$pm_title_paypal = "PayPal";
$pm_title_stripe = "Stripe";
$pm_title_wire = "انتقال بانکی ";
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