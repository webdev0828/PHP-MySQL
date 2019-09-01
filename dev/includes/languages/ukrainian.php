<?PHP

//-------------------------------------------------------
	  $language_pack_name = "ukrainian";
	  $language_pack_table_name = "ukrainian";
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
$header_title = "Партнерська програма";
$header_indexLink = "Партнерська Головна сторінка";
$header_signupLink = "Реєстрація";
$header_accountLink = "Редагувати обліковий запис";
$header_emailLink = "Зв\'яжіться з нами";
$header_greeting = "Вітаємо";
$header_nonLogged = "Гість";
$header_logout = "Вийти";
$footer_tag = "Партнерське програмне забезпечення від iDevAffiliate";
$footer_copyright = "Авторське право";
$footer_rights = "Усі права захищені";
$index_heading_1 = "Вітаємо у нашій партнерській програмі!";
$index_paragraph_1 = "Наша програма є безкоштовною, у ній легко зареєструватись і вона не вимагає додаткових технічних знань. Партнерські програми є спільними для користувачів інтернету, що створює додатковий спосіб заробітку для власників вебсайтів. Партнерські програми генерують трафік та продажі для комерційних вебсайтів, а натомість отримують комісійні платежі.";
$index_heading_2 = "Як це працює?";
$index_paragraph_2 = "Після реєстрації у нашій партнерській програмі Вам запропонують ряд банерів і текстових посилань, які можна розмістити на Вашому сайті. Коли користувач натискає на одне із посилань, його перенаправлять на наш сайт, де його діяльність буде відстежена нашими партнерськими програмами. Ви отримаєте комісійні залежно від Вашого типу комісійних виплат.";
$index_heading_3 = "Звіти і статистика в режимі реального часу!";
$index_paragraph_3 = "Заходьте 24 години на добу, щоб перевірити свої продажі, трафік, баланс рахунку і побачити ефективність розміщених банерів.";
$index_login_title = "Увійти до партнерської програми";
$index_login_username = "Ім\'я користувача";
$index_login_password = "Пароль";
$index_login_username_field = "ім\'я користувача";
$index_login_password_field = "пароль";
$index_login_button = "Увійти";
$index_login_signup_link = "Натисніть тут, щоб зареєструватись";
$index_table_title = "Детальніше про програму";
$index_table_commission_type = "Типу комісійних виплат";
$index_table_initial_deposit = "Початковий внесок";
$index_table_requirements = "Умови виплат";
$index_table_duration = "Тривалість виплат";
$index_table_choose = "Виберіть спосіб виплат!";
$index_table_sale = "Оплата за результатами продаж";
$index_table_click = "Оплата за кліки";
$index_table_sale_text = "за кожну здійснену продажу.";
$index_table_click_text = "за кожен клік.";
$index_table_deposit_tag = "Просто за реєстрацію!";
$index_table_requirements_tag = "Мінімальна сума для виплати.";
$index_table_duration_tag = "Виплати проводяться раз на місяць за результати попереднього місяця.";
$signup_left_column_text = "Долучіться до нашої партнерської програми та почніть заробляти гроші від кожної продажі, здійсненої з нашою допомогою! Просто створіть свій обліковий запис, помістіть код передачі даних на свій сайт і спостерігайте за поповненням свого рахунку завдяки Вашим відвідувачам, які стають нашими покупцями.";
$signup_left_column_title = "Вітаємо, партнере!";
$signup_login_title = "Створіть свій обліковий запис";
$signup_login_username = "Ім\'я користувача";
$signup_login_password = "Пароль";
$signup_login_password_again = "Введіть пароль ще раз";
$signup_login_minmax_chars = "- Ім\'я користувача має містити не менше user_min_chars символів. &lt;br /&gt; - Ім\'я користувача може бути буквено-цифровим. <br/> - Ім\'я користувача може містити ці символи: _ (тільки нижні підкреслення) &lt;br /&gt; <br/> - Пароль повинен містити не менше pass_min_chars символів. <br/> - Пароль може бути буквено-цифровим. &lt;br /&gt; - Пароль може містити ці символи:  characters_allowed";
$signup_login_must_match = "Це поле повинне співпадати із полем введення паролю.";
$signup_standard_title = "Стандартна інформація";
$signup_standard_email = "Електронна адреса";
$signup_standard_company = "Назва компанії";
$signup_standard_checkspayable = "Отримувач платежу";
$signup_standard_weburl = "Адреса сайту";
$signup_standard_taxinfo = "Податковий номер, номер соціального страхування або номер платника ПДВ";
$signup_personal_title = "Особиста інформація";
$signup_personal_fname = "Ім\'я";
$signup_personal_state = "Штат або область";
$signup_personal_lname = "Прізвище";
$signup_personal_phone = "Номер телефону";
$signup_personal_addr1 = "Адреса";
$signup_personal_fax = "Факс";
$signup_personal_addr2 = "Додаткова адреса";
$signup_personal_zip = "Індекс";
$signup_personal_city = "Місто";
$signup_personal_country = "Країна";
$signup_commission_title = "Виплата комісійних";
$signup_commission_howtopay = "Як Вам заплатити?";
$signup_commission_style_PPS = "Оплата за результатами продаж";
$signup_commission_style_PPC = "Оплата за кліки";
$signup_terms_title = "Положення і умови";
$signup_terms_agree = "Я прочитав(ла), зрозумів(ла) та погоджуюсь із цими положеннями і умовами.";
$signup_page_button = "Створити обліковий запис";
$signup_success_email_comment = "На Вашу пошту було надіслано лист із Логіном та Паролем.<BR />\r\nЗберігайте ці дані у надійному місці.";
$signup_success_login_link = "Увійти до свого облікового запису";
$custom_fields_title = "Поля користувача";
$logout_msg = "<b>Ви вийшли</b><BR />Дякуємо за участь у нашій партнерській програмі.";
$signup_page_success = "Обліковий запис створено";
$login_left_column_title = "Вхід в обліковий запис";
$login_left_column_text = "Уведіть ім\'я користувача та пароль, щоб отримати доступ до статистики, банерів, кодів передачі даних, питань та інших можливостей.<BR/ ><BR/ >Якщо Ви не пам\'ятаєте пароль, введіть ім\'я користувача і ми надішлемо Ваш пароль на електронну пошту.<BR /><BR />";
$login_title = "Увійти в обліковий запис";
$login_username = "Ім\'я користувача";
$login_password = "Пароль";
$login_invalid = "Неправильний логін";
$login_now = "Увійти в мій обліковий запис";
$login_send_title = "Забули пароль?";
$login_send_username = "Ім\'я користувача";
$login_send_info = "Інформація про логін та пароль надіслані на Вашу електронну пошту";
$login_send_pass = "Надіслати на електронну пошту";
$login_send_bad = "Такого імені користувача не існує";
$help_new_password_heading = "Новий пароль";
$help_new_password_info = "Ваш пароль повинен містити не менше pass_min_chars символів. Він може складатися з букв, цифр і наступних символів:  characters_allowed";
$help_confirm_password_heading = "Підтвердження нового паролю";
$help_confirm_password_info = "Це поле повинне співпадати із полем введення нового паролю.";
$help_custom_links_heading = "Пошук за ключовим словом";
$help_custom_links_info = "Ваше ключове слово повинне мати не більше, ніж 30 символів. Воно може містити тільки букви, цифри та дефіси.";
$error_title = "Знайдено такі помилки";
$username_invalid = "Неправильне ім\'я користувача. Воно може містити тільки літери, цифри і символи підкреслення.";
$username_taken = "Це ім\'я користувача вже зайняте.";
$username_short = "Ваше ім\'я користувача занадто коротке, воно повинне містити хоча б user_min_chars символів.";
$username_long = "Ваше ім\'я користувача занадто довге. Воно повинне містити не більше user_max_chars символів.";
$password_invalid = "Неправильний пароль. Він може містити тільки літери, цифри і такі символи:  characters_allowed";
$password_short = "Ваш пароль занадто короткий. Він повинен містити хоча б pass_min_chars символів.";
$password_long = "Ваш пароль занадто довгий. Він повинен містити не більше pass_max_chars символів.";
$password_mismatch = "Введені паролі не співпадають.";
$missing_checks = "Будь ласка, введіть ім\'я отримувача платежів.";
$missing_tax = "Будь ласка, введіть свій податковий номер, номер соціального страхування або номер платника ПДВ.";
$missing_fname = "Будь ласка, введіть своє ім\'я.";
$missing_lname = "Будь ласка, введіть своє прізвище.";
$missing_email = "Будь ласка, введіть свою електронну адресу.";
$invalid_email = "Неправильна електронна адреса.";
$missing_address = "Будь ласка, введіть свою поштову адресу.";
$missing_city = "Будь ласка, введіть своє місто.";
$missing_company = "Будь ласка, введіть назву компанії.";
$missing_state = "Будь ласка, введіть штат або область.";
$missing_zip = "Будь ласка, введіть індекс.";
$missing_phone = "Будь ласка, введіть номер телефону.";
$missing_website = "Будь ласка, введіть адресу сайту.";
$missing_paypal = "Ви обрали виплати через систему PayPal, будь ласка, введіть свій рахунок в PayPal.";
$missing_terms = "Ви не погодились із цими положеннями і умовами.";
$paypal_required = "Рахунок PayPal є обов\'язковим для виплат.";
$missing_custom = "Будь ласка, заповніть поле:";
$account_total_transactions = "Всього операцій";
$account_standard_linking_code = "Стандартний код передачі даних - найкращий вибір для електронних листів!";
$account_copy_paste = "Скопіюйте і вставте цей код у свій сайт чи електронний лист";
$account_not_approved = "Ваш обліковий запис очікує підтвердження";
$account_suspended = "Ваш обліковий запис тимчасово призупинений";
$account_standard_earnings = "Стандартний дохід";
$account_inc_bonus = "бонуси включено";
$account_second_tier = "Реферальний дохід";
$account_recurring = "Регулярний дохід";
$account_not_available = "Немає в наявності";
$account_earned_todate = "Всього зароблено на сьогоднішній день";
$menu_heading_overview = "Перегляд облікового запису";
$menu_general_stats = "Загальна статистикаGeneral Stats";
$menu_tier_stats = "Реферальна статистика";
$menu_payment_history = "Історія виплат";
$menu_commission_details = "Детальніше про комісійні";
$menu_recurring_commissions = "Регулярні комісійні";
$menu_traffic_log = "Дані про вхідний трафік";
$menu_heading_marketing = "Матеріали для маркетингу";
$menu_banners = "Банери";
$menu_text_ads = "Текстова реклама";
$menu_text_links = "Текстові посилання";
$menu_email_links = "Посилання на електронну пошту";
$menu_html_links = "HTML реклама";
$menu_offline = "Оффлайн маркетинг";
$menu_tier_linking_code = "Реферальний код передачі даних";
$menu_email_friends = "Друзі по електронній пошті &amp; Колеги";
$menu_custom_links = "Створити &amp; Відслідкувати власні посилання";
$menu_heading_management = "Керування обліковим записом";
$menu_comalert = "Налаштування нагадувань про комісійні CommissionAlert";
$menu_comstats = "Налаштування статистики про комісійні CommissionStats";
$menu_edit_account = "Редагувати мій обліковий запис";
$menu_change_pass = "Змінити мій пароль";
$menu_change_commission = "Змінити тип комісійних";
$menu_heading_general_info = "Загальна інформація";
$menu_browse_affiliates = "Знайти інших партнерів";
$menu_faq = "Можливі запитання та відповіді";
$suspended_title = "Нагадування про статус облікового запису";
$suspended_heading = "Ваш обліковий запис тимчасово призупинено";
$suspended_notes = "Записи адміністратора";
$pending_title = "Нагадування про статус облікового запису";
$pending_heading = "Ваш обліковий запис очікує підтвердження";
$pending_note = "Щойно ми підтвердимо Ваш обліковий запис, Ви отримаєте доступ до маркетингових матеріалів.";
$faq_title = "Можливі запитання та відповіді";
$faq_none = "Ще немає можливих запитань та відповідей";
$browse_title = "Знайти інших партнерів";
$browse_none = "Інших партнерів не знайдено";
$change_comm_title = "Змінити тип комісійних";
$change_comm_curr_comm = "Поточний тип комісійних";
$change_comm_curr_pay = "Поточний рівень виплат";
$change_comm_new_comm = "Новий тип комісійних";
$change_comm_warning = "Якщо Ви зміните тип комісійних, на Вашому обліковому записі встановиться рівень виплат 1";
$change_comm_button = "Змінити типи комісійних";
$change_comm_no_other = "Інші типи комісійних недоступні";
$change_comm_level = "Рівень";
$change_comm_updated = "Тип комісійних оновлено";
$password_title = "Змінити мій пароль";
$password_old_password = "Старий пароль";
$password_new_password = "Новий пароль";
$password_confirm_password = "Підтвердити новий пароль";
$password_button = "Змінити пароль";
$password_warning_old_missing = "Старий пароль неправильний або відсутній";
$password_warning_new_missing = "Поле введення нового паролю порожнє";
$password_warning_mismatch = "Новий пароль не співпадає";
$password_warning_invalid = "Неправильний пароль - Допомога";
$password_notice = "Пароль оновлено";
$edit_failed = "Помилка оновлення - Можливі помилки";
$edit_success = "Обліковий запис оновлено";
$edit_button = "Редагувати мій обліковий запис";
$commissionstats_title = "Налаштування статистики про комісійні CommissionStats";
$commissionstats_info = "Встановивши CommissionStats Ви зможете переглядати свою статистику одразу на робочому столі Windows!Щоб інсталювати це розширення, завантажте CommissionStats і <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>розпакуйте</b></a> пакет на свій жорсткий диск та запустіть файл <b>setup.exe</b>. При запиті даних для входу, введіть наступну інформацію.";
$commissionstats_hint = "Підказка: Скопіюйте і вставте кожне з полів, щоб уникнути помилок";
$commissionstats_profile = "Назва облікового запису";
$commissionstats_username = "Ім\'я користувача";
$commissionstats_password = "Пароль";
$commissionstats_id = "ID партнера";
$commissionstats_source = "URL шлях до джерела";
$commissionstats_download = "Завантажити CommissionStats";
$commissionalert_title = "Налаштування нагадувань про комісійні CommissionAlert";
$commissionalert_info = "Встановивши CommissionAlert, ми постійно будемо повідомляти Вас про нові комісійні, просто на робочому столі Windows!Щоб інсталювати це розширення, завантажте CommissionAlert і <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>розпакуйте</b></a> пакет на свій жорсткий диск та запустіть файл <b>setup.exe</b>. При запиті даних для входу, введіть наступну інформацію.";
$commissionalert_hint = "Підказка: Скопіюйте і вставте кожне з полів, щоб уникнути помилок";
$commissionalert_profile = "Назва облікового запису";
$commissionalert_username = "Ім\'я користувача";
$commissionalert_password = "Пароль";
$commissionalert_id = "ID партнера";
$commissionalert_source = "URL шлях до джерела";
$commissionalert_download = "Завантажити CommissionAlert";
$offline_title = "Оффлайн маркетинг";
$offline_paragraph_one = "Заробляйте гроші, рекламуючи наш сайт (оффлайн) серед своїх друзів та колег!";
$offline_send = "Відправити клієнтів до";
$offline_page_link = "переглянути сторінку";
$offline_paragraph_two = "Ваші клієнти будуть вводити Ваш <b>ID номер партнера</b> у поле на сторінці зверху, що автоматично зробить Вас партнером будь-яких покупок, які вои здійснять.";
$banners_title = "Банери";
$banners_size = "Розмір банерів";
$banners_description = "Опис банерів";
$ad_title = "Текстова реклама";
$ad_info = "Використовуючи цей код передачі даних, Ви можете налаштувати колір, висоту та ширину Вашої текстової реклами.";
$links_title = "Назва посилання";
$email_title = "Посилання на електронну адресу";
$email_group = "Маркетингова група";
$email_button = "Показати посилання на електронну адресу";
$email_no_group = "Не вибрано жодної групи";
$email_choose = "Будь ласка, оберіть одну із маркетингових груп";
$email_notice = "Маркетингові групи можуть мати різні сторінки вхідного трафіку";
$email_ascii = "<b>ASCII/Text Version</b> - Для використання у простих текстових листах.";
$email_html = "<b>HTML Version</b> - Для використання у листах формату HTML.";
$email_test = "Текстове посилання";
$email_test_info = "Сюди на нашому сайті будуть перенаправлені Ваші користувачі.";
$email_source = "Код джерела - Скопіюйте і вставте у свій лист";
$html_title = "Назва HTML реклами";
$html_view_link = "Переглянути цю HTML рекламу";
$traffic_title = "Дані про вхідний трафік";
$traffic_display = "Показати останній";
$traffic_display_visitors = "Відвідувачі";
$traffic_button = "Переглянути вхідний трафік";
$traffic_title_details = "Детальніше про вхідний трафік";
$traffic_ip = "IP адреса";
$traffic_refer = "URL посилання";
$traffic_date = "Дата";
$traffic_time = "Час";
$traffic_bottom_tag_one = "Показати останній";
$traffic_bottom_tag_two = "із";
$traffic_bottom_tag_three = "Всього унікальних відвідувачів";
$traffic_none = "Немає даних про трафік";
$traffic_no_url = "Немає в наявності - Можлива закладка або посилання на електронну пошту";
$traffic_box_title = "Повне URL посилання";
$traffic_box_info = "Натисніть на посилання, щоб перейти на вебсторінку";
$payment_title = "Історія платежів";
$payment_date = "Дата платежів";
$payment_commissions = "Комісійні";
$payment_amount = "Розмір платежів";
$payment_totals = "Всього";
$payment_none = "Немає історії платежів";
$tier_stats_title = "Статистика рефералів";
$tier_stats_accounts = "Реферальні облікові записи, щоб підпорядковуються Вам";
$tier_stats_grab_link = "Отримайте свій реферальний код передачі даних";
$tier_stats_none = "Реферального облікового запису не існує";
$tier_stats_username = "Ім\'я користувача";
$tier_stats_current = "Поточні комісійні";
$tier_stats_previous = "Попередні виплати";
$tier_stats_totals = "Всього";
$recurring_title = "Регулярні комісійні";
$recurring_none = "Немає регулярних комісійних";
$recurring_date = "Дата комісійних";
$recurring_status = "Регулярний статус";
$recurring_payout = "Наступна виплата";
$recurring_amount = "Сума";
$recurring_every = "Кожний";
$recurring_in = "в";
$recurring_days = "дні";
$recurring_total = "Всього";
$tlinks_title = "Запросіть інших людей до своєї реферальної системи та заробляйте на цьому гроші теж!";
$tlinks_embedded_one = "Реферальна реєстрація вже активна у Ваших стандартних партнерських посиланнях!";
$tlinks_embedded_two = "Використання реферальної системи дозволить Вам пропонувати нашу партнерську програму іншим. Ви будете головним у цій багаторівневій системі для усіх, хто приєднається до нашої партнерської програми через Ваше спеціальне посилання для рефералів. Інформація про те, скільки Ви можете заробити, подана нижче.";
$tlinks_embedded_current = "Поточна виплата від реферальної системи";
$tlinks_forced_two = "Використання реферальної системи дозволить Вам пропонувати нашу партнерську програму іншим. Ви будете головним у цій багаторівневій системі для усіх, хто приєднається до нашої партнерської програми через Ваше спеціальне посилання для рефералів. Інформація про те, скільки Ви можете заробити, подана нижче.";
$tlinks_forced_code = "Посилання для рефералів";
$tlinks_forced_paste = "Скопіюйте і вставте цей код у свій вебсайт";
$tlinks_forced_money = "Вебмайстри заробляють гроші тут!";
$comdetails_title = "Деталі про комісійні";
$comdetails_date = "Дата комісійних";
$comdetails_time = "Час комісійних";
$comdetails_type = "Тип комісійних";
$comdetails_status = "Поточний статус";
$comdetails_amount = "Сума комісійних";
$comdetails_additional_title = "Додаткова інформація про комісійні";
$comdetails_additional_ordnum = "Номер замовлення";
$comdetails_additional_saleamt = "Обсяг продаж";
$comdetails_type_1 = "Бонусні комісійні";
$comdetails_type_2 = "Регулярні комісійні";
$comdetails_type_3 = "Реферальні комісійні";
$comdetails_type_4 = "Стандартні комісійні";
$comdetails_status_1 = "Виплачено";
$comdetails_status_2 = "Затверджено - Очікуваний платіж";
$comdetails_status_3 = "Очікування підтвердження";
$comdetails_not_available = "Немає в наявності";
$details_title = "Деталі про комісійні";
$details_drop_1 = "Поточні стандартні комісійні";
$details_drop_2 = "Поточні реферальні комісійні";
$details_drop_3 = "Очікування підтвердження комісійних";
$details_drop_4 = "Виплачені стандартні комісійні";
$details_drop_5 = "Виплачені реферальні комісійні";
$details_button = "Переглянути комісійні";
$details_date = "Дата";
$details_status = "Статус";
$details_commission = "Комісійні";
$details_details = "Переглянути деталі";
$details_type_1 = "Виплачено";
$details_type_2 = "Очікування підтвердження";
$details_type_3 = "Затверджено - Очікуваний платіж";
$details_none = "Немає комісійних";
$details_no_group = "Не вибрана група комісійних";
$details_choose = "Будь ласка, виберіть групу комісійних";
$general_title = "Поточні комісійні - Від останньої виплати до сьогоднішнього дня";
$general_transactions = "Операції";
$general_earnings_to_date = "Заробіток на сьогоднішній день";
$general_history_link = "Переглянути історію платежів";
$general_standard_earnings = "Стандартний заробіток";
$general_current_earnings = "Поточний заробіток";
$general_traffic_title = "Статистика трафіку";
$general_traffic_visitors = "Відвідувачі";
$general_traffic_unique = "Унікальні відвідувачі";
$general_traffic_sales = "Затверджені продажі";
$general_traffic_ratio = "Коефіцієнт продаж";
$general_traffic_info = "Ця статистика не містить регулярні або реферальні комісійні.";
$general_traffic_pay_type = "Тип виплат";
$general_traffic_pay_level = "Поточний рівень виплат";
$general_notes_title = "Записи від адміністратора";
$general_notes_date = "Дата створення";
$general_notes_to = "До";
$general_notes_all = "Усі партнери";
$general_notes_none = "Записів немає";
$contact_left_column_title = "Зв\'яжіться з нами";
$contact_left_column_text = "Ви можете зв\'язатись із менеджером по партнерству за допомогою цієї форми.";
$contact_title = "Зв\'яжіться з нами";
$contact_name = "Ваше ім\'я";
$contact_email = "Ваша електронна адреса";
$contact_message = "Повідомлення";
$contact_chars = "залишилось символів";
$contact_button = "Надіслати повідомлення";
$contact_received = "Ми отримали Ваше повідомлення, відповідь буде надано впродовж 24 годин.";
$contact_invalid_name = "Неправильне ім\'я";
$contact_invalid_email = "Неправильна електронна адреса";
$contact_invalid_message = "Неправильне повідомлення";
$invoice_button = "Рахунок-фактура";
$invoice_header = "Платіж партнерів по рахунку-фактурі";
$invoice_aff_info = "Інформація про партнерів";
$invoice_co_info = "Інформація";
$invoice_acct_info = "Інформація про обліковий запис";
$invoice_payment_info = "Інформація про платежі";
$invoice_comm_date = "Дата платежу";
$invoice_comm_amt = "Розмір комісійних";
$invoice_comm_type = "Тип комісійних";
$invoice_admin_note = "Записи адміністратора";
$invoice_footer = "Кінець рахунку-фактури";
$invoice_print = "Друк рахунку-фактури";
$invoice_none = "Немає в наявності";
$invoice_aff_id = "ID партнера";
$invoice_aff_user = "Ім\'я користувача";
$menu_pdf_marketing = "Маркетингові брошури в PDF";
$menu_pdf_training = "Навчальні документи в PDF";
$marketing_target_url = "Цільова URL";
$marketing_source_code = "Код джерела - Скопіюйте і вставте у свій вебсайт";
$marketing_group = "Маркетингова група";
$peels_title = "Назва облонки сторінки Page Peel";
$peels_view = "Переглянути цю оболонку";
$peels_description = "Опис Page Peel";
$lb_head_title = "Необхідний код шапочки для Вашої HTML сторінки";
$lb_head_description = "Щоб використовувати на своєму сайті підсвітку, Вам необхідно додати наступні рядки до головної частини сторінки, на якій вона повинна з\'явитись.";
$lb_head_source_code = "Вставте цей код в шапочку Вашого HTML документу.";
$lb_head_code_notes = "Вам потрібно вставити цей код тільки раз, незалежно від того скільки підсвіток Ви розмістите на сторінці.";
$lb_head_tutorial = "Переглянути навчальний матеріал";
$lb_body_title = "Назва підсвітки";
$lb_body_description = "Опис підсвітки";
$lb_body_click = "Клацніть на картинку, щоб побачити підсвітку.";
$lb_body_source_code = "Вставте цей код в ТІЛО Вашого HTML документу туди, де повинне з\'явитись зображення.";
$pdf_title = "PDF";
$pdf_training = "Навчальні документи";
$pdf_marketing = "Брошури з маркетингу";
$pdf_description_1 = "Для перегляду та друку наших PDF матеріалів по маркетингу Вам знадобиться Adobe Reader.";
$pdf_description_2 = "Ви можете безкоштовно завантажити Adobe Reader із офіційного сайт Adobe.";
$pdf_file_name = "Ім\'я файлу";
$pdf_file_size = "Розмір файлу";
$pdf_file_description = "Опис";
$pdf_bytes = "Байти";
$menu_heading_training_materials = "Навчальні матеріали";
$menu_videos = "Переглянути навчальні відео";
$menu_custom_manual = "Інструкція по відстеженню переходів за посиланнями користувачами";
$menu_page_peels = "Оболонки сторінок Page Peels";
$menu_lightboxes = "Підсвітки";
$menu_email_templates = "Зразки електронних листів";
$menu_heading_custom_links = "Посилання для відстеження користувачів";
$menu_custom_reports = "Звіти";
$menu_keyword_links = "Посилання для відстеження ключових слів";
$menu_subid_links = "Субпартнерські посилання для відстежування";
$menu_alteranate_links = "Альтернативні посилання на сторінку";
$menu_heading_additional = "Додаткові засоби";
$menu_drop_heading_stats = "Загальна статистика";
$menu_drop_heading_commissions = "Комісійні";
$menu_drop_heading_history = "Історія платежів";
$menu_drop_heading_traffic = "Дані про трафік";
$menu_drop_heading_account = "Мій обліковий запис";
$menu_drop_heading_logo = "Завантажити мій логотип";
$menu_drop_heading_faq = "Запитання і відповіді";
$menu_drop_general_stats = "Загальна статистика";
$menu_drop_tier_stats = "Реферальна статистика";
$menu_drop_current = "Поточні комісійні";
$menu_drop_tier = "Поточні реферальні комісійні";
$menu_drop_pending = "Очікування підтвердження";
$menu_drop_paid = "Виплачені комісійні";
$menu_drop_paid_rec = "Виплачені реферальні комісійні";
$menu_drop_recurring = "Активні регулярні комісійні";
$menu_drop_edit = "Редагувати мій обліковий запис";
$menu_drop_password = "Змінити пароль";
$menu_drop_change = "Змінити тип комісійних";
$account_hidden = "приховано";
$keyword_title = "Посилання на ключові слова користувачів";
$keyword_info = "Створення посилань на ключові слова користувачів дасть Вам можливість відстежувати вхідний трафік з різих джерел. Створіть посилання із 4 різними відстежуваними ключовими словами і побачите у звіті детальну інформацію про кожне із ключових слів.";
$keyword_heading = "Можливі змінні для відстеження ключових слів користувачів";
$keyword_tracking = "Відстеження ID";
$keyword_build = "Щоб створити своє посилання, візьміть наступну URL і приєднайте її до відстежуваного ID та ключового слова.";
$keyword_example = "Приклад";
$keyword_tutorial = "Переглянути навчальний матеріал";
$sub_tracking_title = "Субпартнерське відстежування";
$sub_tracking_info = "Створення субпартнерського посилання дасть Вас можливість передавати Ваше партнерське посилання своїм партнерам для користування. Ви будете знати хто і за що отримав комісійні, оскільки ми надамо Вам звіт про здійснення продаж Вашими суб-партнерами. Іншою причиною використання суб-партнерського посилання може бути бажання включити іншу систему відстеження до звітності.";
$sub_tracking_build = "Замініть XXX на ID номер партнера у Вашій партнерській програмі. Повторіть ці дії для усіх партнерів.";
$sub_tracking_example = "Приклад";
$sub_tracking_tutorial = "Переглянути навчальний матеріал";
$sub_tracking_id = "Субпартнерський ID";
$alternate_title = "Альтернативні посилання на сторінку";
$alternate_option_1 = "Варіант 1: Автоматичне створення посилань";
$alternate_heading_1 = "Автоматичне створення посилань";
$alternate_info_1 = "Визначте Вашу власну сторінку відстеження вхідного трафіку, вказавши її  URL, а ми створимо для Вас посилання. За допогою цього варіанту Ви отримаєте коротше посилання із вбудованим URL та з використанням номеру ID в нашій базі даних.";
$alternate_button = "Створити посилання";
$alternate_links_heading = "Мої альтернативні вхідні URL посилання";
$alternate_links_note = "Наявні посилання будуть функціонаувати, навіть, якщо Ви видалите користувацькі посилання із цієї сторінки.";
$alternate_links_remove = "видалити";
$alternate_option_2 = "Варіант 2: Ручне створення посилань";
$alternate_info_2 = "Якщо Ви хочете приєднати партнерські посилання до альтернативних вхідних URL посилань, скористайтесь наступною структурою.";
$alternate_variable = "Змінна для альтернативного вхідного URL";
$alternate_example = "Приклад";
$alternate_build = "Щоб створити своє посилання, візьміть наступну URL і приєднайте її до альтернативного посилання на сторінку.";
$alternate_none = "Альтернативні посилання на сторінку не створено";
$alternate_tutorial = "Переглянути інструкції";
$cr_title = "Звіт про ключові слова користувача";
$cr_select = "Виберіть ключове слово";
$cr_button = "Згенерувати звіт";
$cr_no_results = "Немає результатів пошуку";
$cr_no_results_info = "Спробуйте іншу комбінацію ключових слів";
$cr_used = "Використані ключові слова";
$cr_found = "Знайдено це посилання";
$cr_times = "Час";
$cr_unique = "Знайдено унікальне посилання";
$cr_detailed = "Детальний звіт про посилання";
$cr_export = "Експортувати звіт в Excel";
$cr_none = "Ключові слова не знайдено";
$logo_title = "Завантажте логоти компанії";
$logo_info = "Якщо Ви хочете завантажити логтип компанії, ми виставимо його для користувачів, яких Ви направите до нас. Це дозволить персоналізувати візити користувачів на нашому сайті.";
$logo_bullet_one = "Розширення зображень може бути .jpg, .gif або .png. Флеш-зображення не дозволяються.";
$logo_bullet_two = "Будь-які недоцільні зображення будуть видалені, а Ваш обліковий запис заморожено.";
$logo_bullet_three = "Ваше зображення/логотип з\'явиться на нашому сайті тільки після затвердження.";
$logo_bullet_size_one = "Максимальна ширина зображень";
$logo_bullet_size_two = "пікселів і максимальна висота";
$logo_bullet_req_size_one = "Ширина зображень повинна бути";
$logo_bullet_req_size_two = "пікселів, а висота";
$logo_bullet_pixels = "пікселів.";
$logo_choose = "Вибрати зображення";
$logo_file = "Вибрати файл:";
$logo_browse = "Завантажити...";
$logo_button = "Завантажити";
$logo_current = "Поточне зображення";
$logo_remove = "видалити";
$logo_display_status = "Статус зображення:";
$logo_pending = "Очікування підтвердження";
$logo_approved = "Підтверджено";
$logo_success = "Зображення успішно завантажено і очікує на підтвердження.";
$signup_security_title = "Затвердження облікового запису";
$signup_security_info = "Будь ласка,введіть код безпеки, зображений на картинці. Це допоможе уникнути автоматичних реєстрацій.";
$signup_security_code = "Код безпеки";
$sub_tracking_none = "Жоден";
$missing_security_code = "Неправильне або відсутнє затвердження облікового запису / коду безпеки";
$alternate_success_title = "Посилання успішно створено";
$alternate_success_info = "Отримайте сво посилання та починайте отримувати трафік для своєї URL адреси.";
$alternate_failed_title = "Помилка створення посилання";
$alternate_failed_info = "Будь ласка, введіть дійсну URL.";
$logo_missing_filename = "Будь ласка, оберіть назву файлу.";
$logo_required_width = "Ширина зображення повинна бути";
$logo_required_height = "Висота зображення повинна бути";
$logo_maximum_width = "Ширина зображення може бути тільки";
$logo_maximum_height = "Висота зображення може бути тільки";
$logo_size_maximum = "Максимальний розмір зображення становить";
$logo_bad_filetype = "Розширення зображення неправильне. Дозволені розширення включаються .gif, .jpg та .png.";
$logo_upload_error = "Помилка завантаження зображення, будь ласка, зверніться до менеджера.";
$logo_error_title = "Помилка завантаження зображення";
$logo_error_bytes = "байтів.";
$excel_title = "Звіт по переходах користувачів за ключовими словами";
$excel_tab_report = "Звіт по ключових словах користувачів";
$excel_tab_logs = "Дані трафіку";
$excel_date = "Дата звіту:";
$excel_affiliate = "ID партнера:";
$excel_criteria = "Критерії для посилань по ключових словах";
$excel_link = "Структура посилань";
$excel_hits = "Унікальні підказки";
$excel_comm_stats = "Статистика комісійних";
$excel_comm_current = "Поточні комісійні";
$excel_comm_paid = "Виплачені комісійні";
$excel_comm_total = "Всього комісійних";
$excel_comm_ratio = "Коефіцієнт конверсії";
$excel_earned = "Зароблені комісійні";
$excel_earned_current = "Поточні комісійні";
$excel_earned_paid = "Виплачені комісійні";
$excel_earned_total = "Зароблено всього комісійних";
$excel_earned_tab = "Клацніть на таблицю даних трафіку (внизу), щоб переглянути дані трафіку для цього посилання.";
$excel_log_title = "Дані трафіку про ключові слова користувачів";
$excel_log_ip = "IP адреса";
$excel_log_refer = "URL посилання";
$excel_log_date = "Дата";
$excel_log_time = "Час";
$excel_log_target = "Цільова URL";
$etemplates_title = "Зразки листів";
$etemplates_view_link = "Переглянути цей зразок листа";
$etemplates_name = "Зразок імені";
$signup_maintenance_heading = "Maintenance Notice";
$signup_maintenance_info = "Реєстрація тимчасово недоступна. Спробуйте пізніше ще раз.";
$marketing_group_title = "Маркетингова група";
$marketing_button = "Показати";
$marketing_no_group = "Група не вибрана";
$marketing_choose = "Будь ласка, оберіть маркетингову групу";
$marketing_notice = "Маркетингові групи мають різні сторінки вхідного трафіку";
$canspam_heading = "CAN-SPAM правила";
$canspam_accept = "Я прочитав(ла), зрозумів(ла) та погоджуюсь із правилами CAN-SPAM.";
$canspam_error = "Ви не погодились із нашими правилами CAN-SPAM.";
$signup_banned = "Під час створення облікового запису виникла помилка. Для детальнішої інформації, будь ласка, зверніться до системного адміністратора.";
$header_testimonials = "Рекомендація від партнерів";
$testi_visit = "Відвідати сайт";
$testi_description = "Запропонуйте свою рекомендацію нашій партнерській програмі і ми розмістимо її на нашій сторінці &lt;a href=&quot;testimonials.php&quot;&gt;testimonials&lt;/a&gt; із посиланням на Ваш сайт.";
$testi_name = "Назва";
$testi_url = "URL сайту";
$testi_content = "Рекомендація";
$testi_code = "Код безпеки";
$testi_submit = "Надіслати рекомендацію";
$testi_na = "Рекомендації не доступні.";
$testi_title = "Запропонувати рекомендацію";
$testi_success_title = "Успіх рекомендації";
$testi_success_message = "Дякуємо за надсилання Вашої рекомендації. Наша команда незабаром її перегляне.";
$testi_error_title = "Помилка рекомендації";
$testi_error_name_missing = "Будь ласка, вкажіть своє ім\'я для публікації рекомендації.";
$testi_error_url_missing = "Будь ласка, вкажіть URL свого сайту  для публікації рекомендації.";
$testi_error_missing = "Будь ласка, додайте текст для публікації рекомендації.";
$menu_drop_delayed = "Затримані комісійні";
$details_drop_6 = "Поточні затримані комісійні";
$details_type_6 = "Затримано - Незабаром буде підтверджено";
$comdetails_status_6 = "Затримано - Незабаром буде підтверджено";
$tc_reaccept_title = "Повідомлення про зміну в положеннях та умовах";
$tc_reaccept_sub_title = "Ви повинні погодитись із нашими новими положеннями та умовами, щоб отримати доступ до свого облікового запису.";
$tc_reaccept_button = "Я прочитав(ла), зрозумів(ла) та погоджуюсь із цими положеннями і умовами.";
$tlinks_active = "Кількість активних рефералів";
$tlinks_payout_structure = "Структура виплат за рефералів";
$tlinks_level = "Рівень";
$tierText1 = "% вираховується із суми комісійних партнера реферера.";
$tierText2 = "% вираховується із суми комісійних вищого реферера.";
$tierText3 = "% вираховується із суми продажів.";
$tierTextflat = "єдина ставка.";
$edit_custom_button = "Редагувати відповідь";
$private_heading = "Приватна реєстрація";
$private_info = "Наша партнерська програма є закритою для широкого загалу і для долучення до неї необхідно мати код реєстрації. Дізнатись як отримати код реєстрації можна тут.";
$private_required_heading = "Необхідно ввести код реєстрації";
$private_code_title = "Ввести код реєстрації";
$private_button = "Надіслати код";
$private_error_title = "Неправильний код реєстрації";
$private_error_invalid = "Код реєстрації неправильний.";
$private_error_expired = "Дія коду реєстрації завершилась і він більше не є дійсним.";
$qr_code_title = "QR коди";
$qr_code_size = "Розмір QR коду";
$qr_code_button = "Показати QR код";
$qr_code_offline_title = "Оффлайн маркетинг";
$qr_code_offline_content1 = "Додайте цей QR код до своїх маркетингових брошур, флаєрів, візиток тощо.";
$qr_code_offline_content2 = "- Клацніть правою кнопкою мишки на картинці і &lt;strong&gt;збережіть як&lt;/strong&gt; на свій комп\'ютер.";
$qr_code_online_title = "Онлайн маркетинг";
$qr_code_online_content = "Додайте цей QR код до свого вебсайту, соціальних мереж, блогів тощо.";
$menu_coupon = "Коди купонів";
$coupon_title = "Наявні коди купонів";
$coupon_desc = "Роздайте ці купони з кодами і отримуйте комісійні щоразу, коли хтось робить покупку з Вашим купоном!";
$coupon_head_1 = "Код купона";
$coupon_head_2 = "Знижка для покупця";
$coupon_head_3 = "Сума комісійних";
$coupon_sale_amt = "від обсягу продаж";
$coupon_flat_rate = "єдина ставка";
$coupon_default = "Нестача рівня виплат";
$cc_vanity_title = "Запис на персональний код купона";
$cc_vanity_field = "Код купона";
$cc_vanity_button = "Запит на код купона";
$cc_vanity_error_missing = "<strong>Помилка!</strong> Будь ласка, введіть код купона.";
$cc_vanity_error_exists = "<strong>Помилка!</strong> Ви вже зробили запит на цей код. Очікується підтвердження запиту.";
$cc_vanity_error = "<strong>Помилка!</strong> Неправильний код купона. Будь ласка, використовуйте тільки букви, цифри та підкреслення.";
$cc_vanity_success = "<strong>Успіх!</strong> Запит на персональний код купона надіслано.";
$coupon_none = "Кодів купонів немає в наявності.";
$pic_error_title = "Помилка завантаження фотографії";
$pic_missing = "Будь ласка, виберіть ім\'я файлу.";
$pic_invalid = "Неправильний тип зображення. Дозволені розширення .gif, .jpg та .png.";
$pic_error = "Помилка завантаження фотографії, будь ласка, зверніться до менеджера.";
$pic_success = "Ваша фотографія успішно завантажена.";
$pic_title = "Завантажити свою фотографію";
$pic_info = "Завантаження фотографій допоможе персоналізувати наш спільний досвід.";
$pic_bullet_1 = "Зображення можуть мати розширення .jpg, .gif або .png.";
$pic_bullet_2 = "Будь-які недоцільні зображення будуть видалені, а Ваш обліковий запис заморожено.";
$pic_bullet_3 = "Ваша фотографія не буде відображатись публічно. Вона буде прикріплена до Вашого облікового запису для нас.";
$pic_file = "Вибрати файл:";
$pic_button = "Завантажити";
$pic_current = "Поточна фотографія";
$pic_remove = "Видалити фотографію";
$progress_title = "Можливість наступної виплати:";
$progress_complete = "завершено.";
$progress_none = "У нас немає мінімальної суми для виплат.";
$progress_sentence_1 = "Ви заробили";
$progress_sentence_2 = "із";
$progress_sentence_3 = "необхідної суми.";
$aff_lib_button = "<b>Заявіть про безкоштовний доступ!</b><BR />www.AffiliateLibrary.com";
$menu_announcements = "Кампанії у соціальних мережах";
$announcements_name = "Назва кампанії";
$announcements_facebook_message = "Повідомлення в Facebook";
$announcements_twitter_message = "Повідомлення в Twitter";
$announcements_facebook_link = "Посилання на Facebook";
$announcements_facebook_picture = "Фотографія з Facebook";
$general_last_30_days_activity = "Активність за останні 30 днів";
$general_last_30_days_activity_traffic = "Трафік";
$general_last_30_days_activity_commissions = "Комісійні";
$accountability_title = "Звітність та зворотній зв\'язок";
$accountability_text = "<strong>Що це?</strong><p>Ми дбаємо про підтримку довіри з нашими партнерами. Нашою метою є представлення усієї можливої інформації про усі зароблені чи відхилені комісійні.</p><strong>Зв\'язок</strong><p>Ми готові надати деталі щодо кожних відхлених комісійних. Ми підтримуємо міцний зв\'язок із нашими партнерами і вітаємо будь-які запитання та відгуки.</p>";
$debit_reason_0 = "Жоден";
$debit_reason_1 = "Відшкодування";
$debit_reason_2 = "Відмова оплати чеку";
$debit_reason_3 = "Повідомлення про шахрайство";
$debit_reason_4 = "Відмінене замовлення";
$debit_reason_5 = "Часткове відшкодування";
$menu_drop_pending_debits = "Очікуваний дебет";
$debit_amount_label = "Розмір дебету";
$debit_date_label = "Дата дебету";
$debit_reason_label = "Причина дебету";
$debit_paragraph = "Дебет буде вирахувано з Вашої наступної виплати.";
$debit_invoice_amount = "Мінус розмір дебету";
$debit_revised_amount = "Перевірений розмір платежа";
$mv_head_description = "Примітка: Ви можете помістити тільки одне відео на сторінку на своєму сайті.";
$mv_head_source_code = "Вставте цей код у шапочку Вашого HTML документу.";
$mv_body_title = "Назва відео";
$mv_body_description = "Опис";
$mv_body_source_code = "Вставте цей код у ТІЛО Вашого HTML документу там, де має міститись відео.";
$menu_marketing_videos = "Відео";
$mv_preview_button = "Попередній перегляд відео";
$dt_no_data = "Немає даних у таблиці.";
$dt_showing_exists = "Показати від _START_ до _END_ із _TOTAL_ записів.";
$dt_showing_none = "Показати від 0 до 0 із 0 записів.";
$dt_filtered = "(відфільтровано із _MAX_ усіх записів)";
$dt_length_choice = "Показати _MENU_ .";
$dt_loading = "Завантаження...";
$dt_processing = "В процесі...";
$dt_no_records = "Схожих записів не знайдено.";
$dt_first = "Перший";
$dt_last = "Останній";
$dt_next = "Наступний";
$dt_previous = "Попередній";
$dt_sort_asc = ": сортування колонки у порядку збільшення";
$dt_sort_desc = ": сортування колонки у порядку зменшення";
$choose_marketing_group = "Виберіть маркетингову групуp";
$email_already_used_1 = "Неможливо створити обліковий запис. Ми дозволяємо тільки";
$email_already_used_2 = "обліковий запис";
$email_already_used_3 = "створити за допомогою електронної адреси.";
$missing_fax = "Будь ласка, введіть номер факсу.";
$chart_last_6_months = "Виплата комісійних протягом останніх 6 місяців";
$chart_last_6_months_paid = "Виплачені комісійні";
$chart_this_month = "Топ 5 партнерів цього місяця";
$chart_this_month_none = "Даних немає.";
$login_return = "Повернутись до головної сторінки партнера";
$login_lost_details = "Введіть своє ім\"я користувача і ми налішлемо інформацію про Ваш логін на електронну пошту.";
$account_edit_general_prefs = "Загальні вимоги";
$account_edit_email_language = "Мова листів";
$footer_connect = "Звяжіться з нами";
$modal_close = "Закрити";
$vat_amount_heading = "Сума ПДВ";
$menu_logout = "Вийти";
$menu_upload_picture = "Завантажити свою фотографію";
$menu_offer_testi = "Запропонувати рекомендацію";
$fb_login = "Увійти через Facebook";
$fb_permissions = "Дозвіл відхилено. Будь ласка, дозвольте сайту використовувати Вашу електронну адресу.";
$announcements_published = "Оголошення опубліковано";
$training_videos_title = "Навчальні відео";
$training_videos_general = "Загальний маркетинг";
$commission_method = "Метод розрахунку комісійних винагород";
$how_will_you_earn = "Як ви отримуватиме комісію?";
$pm_account_credit = "Ми поповнимо ваш рахунок на суму зароблених вами.комісій.";
$pm_check_money_order = "Ми відправимо вам чек/платіжне доручення поштою.";
$pm_paypal = "Ми відправимо вам платіж через PayPal.";
$pm_stripe = "Ми відправимо вам платіж через Stripe.";
$pm_wire = "Ми відправимо вам грошовий переказ.";
$add_to_signup_left_column_text = "<span style=\"color:#CC0000; font-style:italic;\">* поле обов'язкове для заповнення.</span>";
$paypal_email = "Електронна пошта Paypal";
$stripe_acct_details = "Деталі облікового запису Stripe";
$stripe_connect = "Ви можете приєднати ваш обліковий запис Stripe в налаштуваннях облікового запису після реєстрації.";
$stripe_success = "Обліковий запис Stripe було успішно приєднано ";
$stripe_settings = "Налаштування Stripe";
$stripe_connect_edit = "Зв'язатися з Stripe";
$stripe_delete = "Видалити обліковий запис Stripe";
$stripe_confirm = "Ви впевнені, що хочете видалити цей обліковий запис?";
$payment_settings = "Налаштування платежів";
$edit_payment_settings = "Змінити налаштування платежів";
$invalid_paypal_address = "Невірна адреса електронної пошти Paypal.";
$payment_method_error = "Будь ласка, виберіть платіжну систему.";
$payment_settings_updated = "Налаштування платежів збережені.";
$stripe_removed = "Обліковий запис Stripe видалено.";
$payment_settings_success = "Готово!";
$payment_update_notice_1 = "Увага!";
$payment_update_notice_2 = "Ви вказали, що хочете отримувати платежі від нас за допомогою <strong>[payment_option_here]</strong>. Будь ласка, <a href=\"account.php?page=48\" style=\"font-weight:bold;\">натисніть тут</a>, щоб прив\'язати ваш обліковий запис <strong>[payment_option_here]</strong>.";
$pm_title_credit = "Поповнення балансу";
$pm_title_mo = "Чек/Платіжне доручення";
$pm_title_paypal = "PayPal";
$pm_title_stripe = "Stripe";
$pm_title_wire = "Банківський переказ";
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
        $st = $db->prepare("insert into idevaff_language_packs (name, status, def, table_name, user_created, direction) VALUES (?, 1, 0, ?, 0, 0)");
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