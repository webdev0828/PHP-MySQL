<?PHP

//-------------------------------------------------------
	  $language_pack_name = "russian";
	  $language_pack_table_name = "russian";
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
$header_title = "Партнерская программа";	
$header_indexLink = "Партнерская главная страница";	
$header_signupLink = "Зарегистрироваться сейчас";	
$header_accountLink = "Управлять счетом";	
$header_emailLink = "Связаться с нами";	
$header_greeting = "Добро пожаловать";	
$header_nonLogged = "Гость";	
$header_logout = "Выход здесь";	
$footer_tag = "Партнерская программа  iDevAffiliate";	
$footer_copyright = "Авторское право";	
$footer_rights = "Все права защищены";	
$index_heading_1 = "Добро пожаловать в нашу партнерскую программу!";	
$index_paragraph_1 = "Наша программа имеет право свободно присоединиться, на нее легко подписаться и это не требует никаких технических знаний. Партнерские программы являются общими для всего Интернета и предлагают владельцам веб-сайтов дополнительный способ получить прибыль от своих сайтов. Партнерские программы генерируют трафик и продажи для коммерческих веб-сайтов и в ответ получают комиссионные выплаты ";	
$index_heading_2 = "Как это работает?";	
$index_paragraph_2 = "Когда вы присоединитесь к нашей партнерской программе, вам будет поставляться целый ряд баннеров и текстовых ссылок, которые вы размещаете на своем сайте. Когда пользователь нажимает на одну из ваших связей, они будут привлечены на наш сайт, и их деятельность будет отслеживаться нашей партнерской программного обеспечения. Вы будете получать комиссию на основе вашего типа комиссии ".	
$index_heading_3 = "Статистика и отчетность в реальном времени!";	
$index_paragraph_3 = "Входите в течение 24 часов в день, чтобы проверить продажи, трафик, баланс вашего счета и посмотреть, как работают ваши баннеры.";	
$index_login_title = "Партнерский логин";	
$index_login_username = "Имя пользователя";	
$index_login_password = "Пароль";	
$index_login_username_field = "Имя пользователя";	
$index_login_password_field = "Пароль";	
$index_login_button = "Авторизоваться";	
$index_login_signup_link = "Нажмите здесь, чтобы зарегистрироваться";	
$index_table_title = "Подробности программы";	
$index_table_commission_type = "Тип комиссии";	
$index_table_initial_deposit = "Начальный депозит";	
$index_table_requirements = "Требования выплаты";	
$index_table_duration = "Продолжительность выплаты";	
$index_table_choose = "Выберите один из следующих вариантов выплаты!";	
$index_table_sale = "Оплата по продаже";	
$index_table_click = "Оплата по клику";	
$index_table_sale_text = "по каждой продаже вы доставляете.";	
$index_table_click_text = "по каждому клику вы доставляете.";	
$index_table_deposit_tag = "Только для подписания!";	
$index_table_requirements_tag = "Минимальный необходимый баланс для выплат.";	
$index_table_duration_tag = "Выплаты производятся один раз в месяц, за предыдущий месяц.";	
$signup_left_column_text = "Присоединяйтесь к нашей партнерской программе и начинайте зарабатывать деньги за каждую продажу, которую вы посылаете по нашему пути! Просто создайте учетную запись, поместите код связывания в свой ​​веб-сайт и смотрите, как растет ваш баланс, как ваши посетители становятся нашими клиентами!.";	
$signup_left_column_title = "Добро пожаловать в партнерскую программу!";	
$signup_login_title = "Создать аккаунт";	
$signup_login_username = "Имя пользователя";	
$signup_login_password = "Пароль";	
$signup_login_password_again = "Повторите пароль";	
$signup_login_minmax_chars = "- Имя пользователя должно содержать не менее user_min_chars символов.&lt;br /&gt;- Имя пользователя может быть буквенно-цифровым.&lt;br /&gt;- Имя пользователя может содержать эти символы: _ (только нижние подчеркивания)&lt;br /&gt;&lt;br /&gt;- Пароль должен содержать не менее pass_min_chars символов.&lt;br /&gt;- Пароль может быть буквенно-цифровым.&lt;br /&gt;- Пароль может содержать эти символы:  characters_allowed";	
$signup_login_must_match = "Эта запись должна соответствовать вводу пароля.";	
$signup_standard_title = "Стандартные данные";	
$signup_standard_email = "Адрес электронной почты";	
$signup_standard_company = "Название компании";	
$signup_standard_checkspayable = "Чеки для оплаты в";	
$signup_standard_weburl = "Адрес веб-сайта";	
$signup_standard_taxinfo = "Tax ID, SSN или VAT";	
$signup_personal_title = "Личная информация";	
$signup_personal_fname = "Имя";	
$signup_personal_state = "Штат или провинция";	
$signup_personal_lname = "Фамилия";	
$signup_personal_phone = "Номер телефона";	
$signup_personal_addr1 = "Улица";	
$signup_personal_fax = "Номер факса";	
$signup_personal_addr2 = "Дополнительный адрес";	
$signup_personal_zip = "Почтовый индекс";	
$signup_personal_city = "Город";	
$signup_personal_country = "Страна";	
$signup_commission_title = "Оплата комиссионных";	
$signup_commission_howtopay = "Как мы должны вам платить?";	
$signup_commission_style_PPS = "Оплата по продаже";	
$signup_commission_style_PPC = "Оплата по клику";	
$signup_terms_title = "Сроки и условия";	
$signup_terms_agree = "Я прочитал, понимаю и согласен с вышеуказанными условиями.";	
$signup_page_button = "Создать мой аккаунт";	
$signup_success_email_comment = "Мы отправили вам письмо с вашим именем пользователя и паролем.<BR />\r\nВы должны держать это в безопасном месте для будущих справок.";	
$signup_success_login_link = "Войдите в свою учетную запись";	
$custom_fields_title = "Пользовательские поля";	
$logout_msg = "<b> Вы вышли. </b><BR /> Спасибо за ваше участие в нашей партнерской программе.";	
$signup_page_success = "Ваш аккаунт был создан";	
$login_left_column_title = "Логин в аккаунт";	
$login_left_column_text = "Введите имя пользователя и пароль, чтобы получить доступ к вашей учетной записи статистики, баннеры, соединяющими кодами, FAQ и многому другому.<BR/ ><BR/ >Если вы  забыли свой ​​пароль, введите ваш логин и мы пошлем вашу логин информацию вам по электронной почте.<BR /><BR />";	
$login_title = "Войдите в свою учетную запись";	
$login_username = "Имя пользователя";	
$login_password = "Пароль";	
$login_invalid = "Неверный логин";	
$login_now = "Вход в мой аккаунт";	
$login_send_title = "Нужен ваш пароль?";	
$login_send_username = "Имя пользователя";	
$login_send_info = "Детали логина отправлены по электронной почте";	
$login_send_pass = "Отправить по электронной почте";	
$login_send_bad = "Имя пользователя не найдено";	
$help_new_password_heading = "Новый пароль";	
$help_new_password_info = "Ваш пароль должен содержать не менее pass_min_chars символов. Он может состоять из букв, цифр и следующих символов:  characters_allowed";	
$help_confirm_password_heading = "Подтвердите новый пароль";	
$help_confirm_password_info = "Этот пароль должен соответствовать новой записи пароля.";	
$help_custom_links_heading = "Отслеживание ключевых слов";	
$help_custom_links_info = "Ключевое слово не может быть более 30 символов в длину может содержать только буквы, цифры и дефис.";	
$error_title = "Были обнаружены эти ошибки";	
$username_invalid = "Неверное имя пользователя. Оно может содержать только буквы, цифры и нижние подчеркивания.";	
$username_taken = "Имя пользователя, которое вы выбрали, уже было принято.";	
$username_short = "Ваше имя пользователя является слишком коротким, оно должно быть, по крайней мере, user_min_chars символов в длину.";	
$username_long = "Ваше имя пользователя слишком длинное, оно должно иметь максимально user_max_chars символов.";	
$password_invalid = "Неверный пароль. Он может содержать только буквы, цифры и следующие символы:  characters_allowed";	
$password_short = "Ваш пароль слишком короткий, он должен быть, по крайней мере pass_min_chars символов в длину.";	
$password_long = "Ваш пароль слишком длинный, он должен быть максимально pass_max_chars символов.";	
$password_mismatch = "Ваш пароль не совпадает.";	
$missing_checks = "Пожалуйста, введите имя получателя, чтобы сделать чеки платежеспособными.";	
$missing_tax = "Пожалуйста, введите вашу информацию Tax ID, SSN или VAT.";	
$missing_fname = "Пожалуйста, введите ваше имя.";	
$missing_lname = "Пожалуйста, введите свою фамилию.";	
$missing_email = "Пожалуйста, введите ваш адрес электронной почты.";	
$invalid_email = "Ваш адрес электронной почты недействителен.";	
$missing_address = "Пожалуйста, введите почтовый адрес.";	
$missing_city = "Пожалуйста, введите ваш город.";	
$missing_company = "Пожалуйста, введите название вашей компании.";	
$missing_state = "Пожалуйста, введите штат или провинцию.";	
$missing_zip = "Пожалуйста, введите свой ​​почтовый индекс.";	
$missing_phone = "Пожалуйста, введите свой ​​номер телефона.";	
$missing_website = "Пожалуйста, введите адрес веб-сайта.";	
$missing_paypal = "Вы выбрали для получения платежей PayPal, пожалуйста, введите учетную запись PayPal.";	
$missing_terms = "Вы не приняли наши условия.";	
$paypal_required = "Счет PayPal необходим для оплаты.";	
$missing_custom = "Пожалуйста, заполните поле с именем:";	
$account_total_transactions = "Сумма трансакций";	
$account_standard_linking_code = "Стандартный код ссылок - Отлично подходит для использования в электронных письмах!";	
$account_copy_paste = "Скопируйте / Вставьте код на свой ​​сайт или в электронную почту";	
$account_not_approved = "Ваш аккаунт в настоящее время ожидает подтверждения";	
$account_suspended = "Ваш аккаунт в настоящее время приостановлен";	
$account_standard_earnings = "Стандартный зароботок";	
$account_inc_bonus = "включает в себя бонус";	
$account_second_tier = "Дополнительный зароботок";	
$account_recurring = "Повторяющаяся прибыль";	
$account_not_available = "Нет информации";	
$account_earned_todate = "Всего заработано к дате";	
$menu_heading_overview = "Обзор аккаунта";	
$menu_general_stats = "Общая статистика";	
$menu_tier_stats = "Дополнительная статистика";	
$menu_payment_history = "История платежей";	
$menu_commission_details = "Детали комиссии";	
$menu_recurring_commissions = "Повторяющиеся комиссии";	
$menu_traffic_log = "Записи входящего трафика";	
$menu_heading_marketing = "Маркетинговые материалы";	
$menu_banners = "Баннеры";	
$menu_text_ads = "Текстовые объявления";	
$menu_text_links = "Текстовые ссылки";	
$menu_email_links = "Ссылки на электронную почту";	
$menu_html_links = "HTML объявления";	
$menu_offline = "Оффлайн маркетинг";	
$menu_tier_linking_code = "Связанный код ссылок";	
$menu_email_friends = "Электронная почта друзей &amp; партнеров";	
$menu_custom_links = "Постройте &amp; Отслеживайте свои ​​собственные ссылки";	
$menu_heading_management = "Управление аккаунтом";	
$menu_comalert = "Настройка CommissionAlert";	
$menu_comstats = "Настройка CommissionStats";	
$menu_edit_account = "Редактировать мой счет";	
$menu_change_pass = "Изменить пароль";	
$menu_change_commission = "Изменить мой стиль комиссии";	
$menu_heading_general_info = "Общая информация";	
$menu_browse_affiliates = "Другие филиалы";	
$menu_faq = "Часто задаваемые вопросы";	
$suspended_title = "Оповещение о статусе аккаунта ";	
$suspended_heading = "Ваш аккаунт в настоящее время приостановлен";	
$suspended_notes = "Примечания администратора";	
$pending_title = "Оповещение о статусе аккаунта";	
$pending_heading = "Ваш аккаунт в настоящее время ожидает одобрения";	
$pending_note = "Как только мы одобрим ваш аккаунт, маркетинговые материалы будут доступны для вас.";	
$faq_title = "Часто задаваемые вопросы";	
$faq_none = "Нет еще часто задаваемых вопросов";	
$browse_title = "Другие филиалы";	
$browse_none = "Нет других филиалов для просмотра";	
$change_comm_title = "Изменить стил комиссии";	
$change_comm_curr_comm = "Текущий стиль комиссии";	
$change_comm_curr_pay = "Текущий уровень выплат";	
$change_comm_new_comm = "Новый стиль комиссии";	
$change_comm_warning = "Если вы измените стиль комиссии, ваш аккаунт будет сброшен до выплат 1-го уровня";	
$change_comm_button = "Изменить стиль комиссии";	
$change_comm_no_other = "Другие стили комиссии недоступны";	
$change_comm_level = "Уровень";	
$change_comm_updated = "Стиль комиссии обновлен";	
$password_title = "Изменить пароль";	
$password_old_password = "Старый пароль";	
$password_new_password = "Новый пароль";	
$password_confirm_password = "Подтвердите новый пароль";	
$password_button = "Изменить пароль";	
$password_warning_old_missing = "Старый пароль неверный или отсутствует";	
$password_warning_new_missing = "Новый пароль отсутствует";	
$password_warning_mismatch = "Новый пароль не соответствует";	
$password_warning_invalid = "Пароль неверен - Нажмите ссылки на помощь";	
$password_notice = "Пароль обновлен";	
$edit_failed = "Не удалось обновить - смотрите ошибки выше ";	
$edit_success = "Счет обновлен";	
$edit_button = "Редактировать мой счет";	
$commissionstats_title = "Настройка CommissionStats";	
$commissionstats_info = "Установив CommissionStats, вы можете проверить свою статистику мгновенно, прямо на рабочем столе Windows! Для установки этой функции скачайте CommissionStats и <a href \"_blank\"><b>unzip</b></a> пакет на диск и запустите файл <b>setup.exe</b>. По запросу информации логина введите следующие детали.";
$commissionstats_hint = "Подсказка: Копируйте каждую запись, чтобы обеспечить точность";	
$commissionstats_profile = "Имя профиля";	
$commissionstats_username = "Имя пользователя";	
$commissionstats_password = "Пароль";	
$commissionstats_id = "Партнерская ИД";	
$commissionstats_source = "URL Источника";	
$commissionstats_download = "Скачать CommissionStats";	
$commissionalert_title = "Настройка CommissionAlert";	
$commissionalert_info = "Установив CommissionAlert мы \ уведомить вас мгновенно новых комиссий, прямо на рабочем столе Windows! Для установки этой функции, скачать CommissionAlert и <a href \"_blank\"><b>unzip</b></a> пакет на диск и запустите файл <b>setup.exe</b>. По запросу информации логина введите следующие детали.";
$commissionalert_hint = "Подсказка: Копируйте каждую запись, чтобы обеспечить точность";	
$commissionalert_profile = "Имя Профиля";	
$commissionalert_username = "Имя пользователя";	
$commissionalert_password = "Пароль";	
$commissionalert_id = "Партнерская ИД";	
$commissionalert_source = "URL Источника";	
$commissionalert_download = "Скачать CommissionAlert";	
$offline_title = "Оффлайн маркетинг";	
$offline_paragraph_one = "Заработайте деньги, продвигая наш сайт (в автономном режиме), чтобы знали ваши друзья и коллеги!";	
$offline_send = "Направьте клиентов";	
$offline_page_link = "Просмотр страницы";	
$offline_paragraph_two = "Ваши клиенты будут вводить <B> Партнерский идентификационный номер </ B> в поле на странице выше, который будет регистрировать вас как партнера для любых покупок, которые они делают.";	
$banners_title = "Баннеры";	
$banners_size = "Размер баннера";	
$banners_description = "Описание баннера";	
$ad_title = "Текстовые объявления";	
$ad_info = "Используя связывающий код, вы можете настроить цветовую схему, высоту и ширину вашего текстового объявления.";	
$links_title = "Имя ссылки";	
$email_title = "Ссылки на электронную почту ";	
$email_group = "Маркетинговая группа";	
$email_button = "Показать ссылки на электронную почту ";	
$email_no_group = "Нет выбранной группы";	
$email_choose = "Пожалуйста, выберите маркетинговую группу сверху";	
$email_notice = "Маркетинговые группы могут иметь различные страницы входящего трафика";	
$email_ascii = "<b>ASCII/ Текстовая версия</b> - Для использования текстовых писем";	
$email_html = "<b>HTML -версия </b>  - Для использования HTML-форматированных сообщений электронной почты.";	
$email_test = "Тестовая ссылка";	
$email_test_info = "Это куда ваши клиенты будут отправлены в нашем веб-сайте.";	
$email_source = "Исходный код - Копировать / Вставить в сообщение электронной почты";	
$html_title = "HTML Название объявления";	
$html_view_link = "Открыть это HTML объявление";	
$traffic_title = "Журнал входящего трафика";	
$traffic_display = "Отображать последнее";	
$traffic_display_visitors = "Посетители";	
$traffic_button = "Посмотреть журнал трафика";	
$traffic_title_details = "Подробности входящего трафика";	
$traffic_ip = "IP адрес";	
$traffic_refer = "URL для справок";	
$traffic_date = "Дата";	
$traffic_time = "Время";	
$traffic_bottom_tag_one = "Отображать последнее";	
$traffic_bottom_tag_two = "Из";	
$traffic_bottom_tag_three = "Всего уникальных посетителей";	
$traffic_none = "Журнала трафика не существует";	
$traffic_no_url = "Недоступны возможные закладки или E-mail ссылки";	
$traffic_box_title = "Завершить ссылку URL";	
$traffic_box_info = "Нажмите на ссылку, чтобы посетить веб-страницу";	
$payment_title = "История платежей";	
$payment_date = "Дата расчета";	
$payment_commissions = "Комиссионные";	
$payment_amount = "Сумма платежа";	
$payment_totals = "Итоги";	
$payment_none = "История платежа не существует";	
$tier_stats_title = "Дополнительная статистика";	
$tier_stats_accounts = "Связанные аккаунты непосредственно под вами";	
$tier_stats_grab_link = "Воспользуйтесь вашим связанным кодом ссылок";	
$tier_stats_none = "Связанного счета не существует";	
$tier_stats_username = "Имя пользователя";	
$tier_stats_current = "Актуальные комиссии";	
$tier_stats_previous = "Предыдущие выплаты";	
$tier_stats_totals = "Итоги";	
$recurring_title = "Повторяющиеся комиссии";	
$recurring_none = "Повторяющейся комиссии не существует";	
$recurring_date = "Дата комиссии";	
$recurring_status = "Повторяющийся статус";	
$recurring_payout = "Следующая выплата";	
$recurring_amount = "Сумма";	
$recurring_every = "Каждый";	
$recurring_in = "В";	
$recurring_days = "Дни";	
$recurring_total = "Всего";	
$tlinks_title = "Добавьте других на ваш уровень, а делайте деньги от них тоже!";	
$tlinks_embedded_one = "Связанная регистрация кредитования уже активно работает в вашей стандартной партнерской ссылке!";	
$tlinks_embedded_two = "Использование системы связей позволяет продвигать на рынок нашу партнерскую программу другим людям. Вы станете верхним ярусом для тех, кто присоединяется к нашей партнерской программе через специальную реферальную ссылку ниже. Информация о том, сколько вы можете заработать, ниже.";	
$tlinks_embedded_current = "Текущий уровень выплат";	
$tlinks_forced_two = "Использование системы связей позволяет продвигать на рынок нашу партнерскую программу другим людям. Вы станете верхним ярусом для тех, кто присоединяется к нашей партнерской программе через специальную реферальнуюссылку ниже. Информация о том, сколько вы можете заработать, ниже.";	
$tlinks_forced_code = "Реферальная ссылка на уровень ";	
$tlinks_forced_paste = "Копировать / Вставить выше код на свой ​​сайт";	
$tlinks_forced_money = "Веб-мастеры, заработайте здесь!";	
$comdetails_title = "Подробности комиссии";	
$comdetails_date = "Дата комиссии";	
$comdetails_time = "Время комиссии";	
$comdetails_type = "Тип комиссии";	
$comdetails_status = "Текущий статус";	
$comdetails_amount = "Сумма комиссии";	
$comdetails_additional_title = "Дополнительная информация  о комиссии";	
$comdetails_additional_ordnum = "Номер заказа";	
$comdetails_additional_saleamt = "Сумма продажи";	
$comdetails_type_1 = "Бонус комиссии";	
$comdetails_type_2 = "Повторяющиеся комиссии";	
$comdetails_type_3 = "Уровень комиссии";	
$comdetails_type_4 = "Стандартная комиссия";	
$comdetails_status_1 = "Оплачено";	
$comdetails_status_2 = "Утверждено - В ожидании оплаты";	
$comdetails_status_3 = "В ожидании утверждения";	
$comdetails_not_available = "Недоступно";	
$details_title = "Подробности комиссии";	
$details_drop_1 = "Текущие стандартные комиссии";	
$details_drop_2 = "Текущие связанные комиссии";	
$details_drop_3 = "Комиссионные ожидаемые утверждения";	
$details_drop_4 = "Платные стандартные комиссии";	
$details_drop_5 = "Платные связанные комиссии";	
$details_button = "Посмотреть комиссии";	
$details_date = "Дата";	
$details_status = "Статус";	
$details_commission = "Комиссия";	
$details_details = "Посмотреть детали";	
$details_type_1 = "Оплачено";	
$details_type_2 = "В ожидании утверждения";	
$details_type_3 = "Утверждено - В ожидании оплаты";	
$details_none = "Нет комиссий для просмотра";	
$details_no_group = "Не выбрана группа комиссии";	
$details_choose = "Пожалуйста, выберите группу комиссии выше";	
$general_title = "Текущие комиссии - От последней выплаты на сегодняшний день";	
$general_transactions = "Сделки";	
$general_earnings_to_date = "Прибыль на сегодняшний день";	
$general_history_link = "Посмотреть историю платежей";	
$general_standard_earnings = "Стандартная прибыль ";	
$general_current_earnings = "Текущие доходы";	
$general_traffic_title = "Статистика трафика";	
$general_traffic_visitors = "Посетители";	
$general_traffic_unique = "Уникальные посетители";	
$general_traffic_sales = "Утверждено продаж";	
$general_traffic_ratio = "Доля продаж";	
$general_traffic_info = "Эти данные не включают в себя повторяющиеся или связанные комиссии.";	
$general_traffic_pay_type = "Тип выплат";	
$general_traffic_pay_level = "Текущий уровень выплат";	
$general_notes_title = "Заметки администратора";	
$general_notes_date = "Дата создания";	
$general_notes_to = "Для";	
$general_notes_all = "Все партнеры";	
$general_notes_none = "Нет примечания для просмотра";	
$contact_left_column_title = "Связаться с нами";	
$contact_left_column_text = "Пожалуйста, не стесняйтесь связаться с нашим менеджером компаньонов, используя форму справа.";	
$contact_title = "Связаться с нами";	
$contact_name = "Ваше имя";	
$contact_email = "Ваш электронный адрес";	
$contact_message = "Сообщение";	
$contact_chars = "Осталось символов";	
$contact_button = "Отправить сообщение";	
$contact_received = "Мы получили ваше сообщение, пожалуйста, дайте 24 часа для ответа.";	
$contact_invalid_name = "Неправильное имя";	
$contact_invalid_email = "Неверный адрес электронной почты";	
$contact_invalid_message = "Неверное сообщение";	
$invoice_button = "Счет";	
$invoice_header = "СЧЕТ ПАРТНЕРСКОЙ ОПЛАТЫ ";	
$invoice_aff_info = "Партнерская информация";	
$invoice_co_info = "Информация";	
$invoice_acct_info = "Информация об аакаунте";	
$invoice_payment_info = "Платежная информация";	
$invoice_comm_date = "Дата расчета";	
$invoice_comm_amt = "Сумма комиссии";	
$invoice_comm_type = "Тип комиссии";	
$invoice_admin_note = "Заметки администратора";	
$invoice_footer = "КОНЕЦ СЧЕТА";	
$invoice_print = "Печать счета";	
$invoice_none = "Недоступно";	
$invoice_aff_id = "Партнерская ID";	
$invoice_aff_user = "Имя пользователя";	
$menu_pdf_marketing = "PDF маркетинговых брошюр";	
$menu_pdf_training = "PDF Учебных документов";	
$marketing_target_url = "Целевой URL";	
$marketing_source_code = "Исходный код - Копировать / Вставить на свой ​​сайт";	
$marketing_group = "Маркетинговая группа";	
$peels_title = "Страница по фамилии";	
$peels_view = "Открыть эту фамилию";	
$peels_description = "Страница описания фамилии";	
$lb_head_title = "Требуется код заголовка для HTML страницы";	
$lb_head_description = "Для того, чтобы использовать лайтбокс на вашем сайте, вы должны добавить следующие строки в головной части страницы, где вы хотите отображать.";	
$lb_head_source_code = "Вставить этот код в разделе заголовка вашего HTML документа.";	
$lb_head_code_notes = "Вам нужно разместить этот код только один раз, независимо от того, сколько лайтбоксов вы поместите на странице.";	
$lb_head_tutorial = "Посмотреть учебник";	
$lb_body_title = "Лайтбокс Имя";	
$lb_body_description = "Лайтбокс Описание";	
$lb_body_click = "Нажмите на картинку для просмотра лайтбокса.";	
$lb_body_source_code = "Вставить этот код в разделе BODY вашего HTML документа, где вы хотите, чтобы появилось изображение.";	
$pdf_title = "PDF";	
$pdf_training = "Обучающие документы";	
$pdf_marketing = "Маркетинговые брошюры";	
$pdf_description_1 = "Adobe Reader требуется для просмотра и печати PDF наших маркетинговых материалов.";	
$pdf_description_2 = "Adobe Reader можно бесплатно загрузить с веб-сайта Adobe.";	
$pdf_file_name = "Имя файла";	
$pdf_file_size = "Размер файла";	
$pdf_file_description = "Описание";	
$pdf_bytes = "Байтов";	
$menu_heading_training_materials = "Учебные материалы";	
$menu_videos = "Смотрите видео обучение";	
$menu_custom_manual = "Руководство по отслеживанию пользовательских  ссылок ";	
$menu_page_peels = "Страница фамилий";	
$menu_lightboxes = "Лайтбоксы";	
$menu_email_templates = "Отправить шаблоны";	
$menu_heading_custom_links = "Ссылки отслеживания заказа";	
$menu_custom_reports = "Отчеты";	
$menu_keyword_links = "Отслеживание ключевых слов ссылки";	
$menu_subid_links = "Ссылки субпартнерского отслеживания";	
$menu_alteranate_links = "Альтернативные ссылки входящей страницы";	
$menu_heading_additional = "Дополнительные инструменты";	
$menu_drop_heading_stats = "Общие статистика";	
$menu_drop_heading_commissions = "Комиссионные";	
$menu_drop_heading_history = "История платежей";	
$menu_drop_heading_traffic = "Журнал трафика";	
$menu_drop_heading_account = "Мой счет";	
$menu_drop_heading_logo = "Загружать мое лого";	
$menu_drop_heading_faq = "ЧАСТО ЗАДАВАЕМЫЕ ВОПРОСЫ";	
$menu_drop_general_stats = "Общая информация";	
$menu_drop_tier_stats = "Связанная статистика";	
$menu_drop_current = "Актуальные комиссии";	
$menu_drop_tier = "Актуальные связанные комиссии";	
$menu_drop_pending = "В ожидании утверждения";	
$menu_drop_paid = "Оплаченные комиссии";	
$menu_drop_paid_rec = "Оплаченные связанные  комиссии";	
$menu_drop_recurring = "Активные повторяющиеся комиссии";	
$menu_drop_edit = "Редактировать мой счет";	
$menu_drop_password = "Изменить пароль";	
$menu_drop_change = "Изменить мой стиль комиссии";	
$account_hidden = "Скрытый";	
$keyword_title = "Пользовательские ссылки по ключевой фразе";	
$keyword_info = "Создание пользовательских ссылку ключевое слово предоставляет Вам возможность отслеживать входящий трафик для различных источников Создать связь с до 4 различных ключевых слов слежения и отчет о пользовательских отслеживания покажет вам подробный отчет по каждому ключевому слову вы создаете..";	
$keyword_heading = "Доступные переменные для отслеживания пользовательских ключевое слово";	
$keyword_tracking = "ID отслеживания ";	
$keyword_build = "Чтобы построить связь, возьмите следующий URL и добавьте ID его отслеживания и ключевое слово, которое  вы хотите использовать.";	
$keyword_example = "Пример";	
$keyword_tutorial = "Просмотр учебника";	
$sub_tracking_title = "Субпартнерское отслеживание";	
$sub_tracking_info = "Создание субпартнерской ссылки предоставляет вам возможность пройти на вашу партнерскую ссылку в ваши собственные филиалы для их использования. Вы узнаете, кто сформировал комиссию для вас, потому что мы будем сообщать вам, кто из ваших суб-филиалов генерирует продажи . Еще одна причина, чтобы использовать суб-партнерской ссылке - если у вас есть собственная система отслеживания и вы хотите включить для отчетности ".	
$sub_tracking_build = "Замените XXX партнерской ID в вашей партнерской программе. Повторите эту процедуру для всех ваших партнеров.";	
$sub_tracking_example = "Пример";	
$sub_tracking_tutorial = "Посмотреть учебник";	
$sub_tracking_id = "Субпартнерская ID";	
$alternate_title = "Альтернативные ссылки входящей страницы";	
$alternate_option_1 = "Вариант 1: Автоматическое создание ссылки";	
$alternate_heading_1 = "Автоматизированное создание ссылки";	
$alternate_info_1 = "Определите страницу своего ​​собственного входящего трафика, введя URL, на который вы хотите доставить трафик, и мы создадим ссылку для вас. С помощью этой функции создастся более короткий коридор для того, чтобы использовать с  встроенного в связи URL с использованием идентификационного номера в нашей базе данных. ";	
$alternate_button = "Создать мою ссылку";	
$alternate_links_heading = "Мои альтернативные входящие URL ссылки";	
$alternate_links_note = "Существующие ссылки будут оставаться рабочими и функциональными, если вы удалите пользовательскую ссылку с этой страницы.";	
$alternate_links_remove = "удалить";	
$alternate_option_2 = "Вариант 2: Ручное создание ссылки";	
$alternate_info_2 = "Если вы предпочитаете добавлять свои собственные партнерские ссылки с альтернативного входящего URL, используйте следующую структуру.";	
$alternate_variable = "Альтернативная переменная входящей URL ";	
$alternate_example = "Пример";	
$alternate_build = "Чтобы построить связь, возьмите следующий URL и добавьте его к альтернативному входящему URL, который вы хотите использовать.";	
$alternate_none = "Не создано альтернативной входящей ссылки";	
$alternate_tutorial = "Посмотреть учебник";	
$cr_title = "Пользовательский отчет по ключевой фразе";	
$cr_select = "Выберите ключевое слово";	
$cr_button = "Создать отчет";	
$cr_no_results = "Результата поиска не найдено";	
$cr_no_results_info = "Попробуйте другое ключевое словосочетание";	
$cr_used = "Используемые ключевые слова";	
$cr_found = "Эта ссылка найдена";	
$cr_times = "Раз";	
$cr_unique = "Уникальные ссылки найдены";	
$cr_detailed = "Подробный отчет по ссылкам";	
$cr_export = "Экспортировать отчет в Excel";	
$cr_none = "Ключевые слова не найдены";	
$logo_title = "Загрузить логотип вашей компании";	
$logo_info = "Если вы хотите загрузить свой ​​логотип компании, мы будем показывать его клиентам, которых вы доставите на наш сайт. Это позволяет персонализировать опыт ваших клиентов, когда они посещают нас.";	
$logo_bullet_one = "Изображения могут быть .jpg, .gif или PNG. Flash контент не разрешается.";	
$logo_bullet_two = "Любые неуместные изображения будут отброшены, и ваш аккаунт приостановлен.";	
$logo_bullet_three = "Ваше изображение / логотип не будет показан на нашем сайте, пока мы не одобрим его.";	
$logo_bullet_size_one = "Изображения могут иметь максимальную ширину";	
$logo_bullet_size_two = "пикселей и максимальная высота";	
$logo_bullet_req_size_one = "Изображения должны иметь ширину";	
$logo_bullet_req_size_two = "пикселей и высота";	
$logo_bullet_pixels = "пикселей.";	
$logo_choose = "Выберите изображение";	
$logo_file = "Выберите файл:";	
$logo_browse = "Обзор ...";	
$logo_button = "Загрузить";	
$logo_current = "Мой текущий образ";	
$logo_remove = "Удалить";	
$logo_display_status = "Статус изображения:";	
$logo_pending = "В ожидании утверждения";	
$logo_approved = "Утверждено";	
$logo_success = "Изображение было успешно загружено и теперь в ожидании утверждения.";	
$signup_security_title = "Верификация учетной записи";	
$signup_security_info = "Пожалуйста, введите код, указанный на коробке. Этот шаг поможет нам предотвратить автоматизированные регистрации.";	
$signup_security_code = "Код безопасности";	
$sub_tracking_none = "Нет";	
$missing_security_code = "Неправильная или пропавшая проверка счета / кода безопасности";	
$alternate_success_title = "Создание ссылки успешно";	
$alternate_success_info = "Возьмите ссылку и начинайте создавать трафик на определенный вами URL.";	
$alternate_failed_title = "Ошибка создания ссылки";	
$alternate_failed_info = "Пожалуйста, введите корректный адрес.";	
$logo_missing_filename = "Пожалуйста, выберите имя файла.";	
$logo_required_width = "Ширина изображения должна быть";	
$logo_required_height = "Высота изображения должны быть";	
$logo_maximum_width = "Ширина изображения может быть только";	
$logo_maximum_height = "Высота изображения может быть только";	
$logo_size_maximum = "Размер изображения может быть только максимум";	
$logo_bad_filetype = "Тип изображения не допускается. Возможные типы изображений .gif, .jpg и PNG.";	
$logo_upload_error = "Ошибка загрузки изображения, свяжитесь с менеджером филиала.";	
$logo_error_title = "Ошибка загрузки изображения ";	
$logo_error_bytes = "байт.";	
$excel_title = "Пользовательские ключевое слово ссылок отчета";	
$excel_tab_report = "Пользовательский отчет по ключевой фразе";	
$excel_tab_logs = "Журналы трафика";	
$excel_date = "Дата отчета:";	
$excel_affiliate = "Партнерская ID:";	
$excel_criteria = "Критерии по ключевой фразе в ссылке";	
$excel_link = "Структура ссылки";	
$excel_hits = "Уникальные хиты";	
$excel_comm_stats = "Статистика комиссии";
$excel_comm_current = "Актуальные комиссии";	
$excel_comm_paid = "Оплаченные комиссии";	
$excel_comm_total = "Всего комиссий";	
$excel_comm_ratio = "Преобразование в коэффициент";	
$excel_earned = "Заработанные комиссионные ";	
$excel_earned_current = "Актуальные комиссии";	
$excel_earned_paid = "Оплаченные комиссии";	
$excel_earned_total = "Всего комиссий заработано";	
$excel_earned_tab = "Щелкните вкладку журнал трафика (ниже), чтобы просмотреть журнал трафика для этой пользовательской ссылки.";	
$excel_log_title = "Пользовательские ключевые слова журнала трафика";	
$excel_log_ip = "IP адрес";	
$excel_log_refer = "Ссылочная URL";	
$excel_log_date = "Дата";	
$excel_log_time = "Время";	
$excel_log_target = "Целевой URL";	
$etemplates_title = "Шаблоны электронной почты";	
$etemplates_view_link = "Открыть этот шаблон электронной почты";	
$etemplates_name = "Имя шаблона";	
$signup_maintenance_heading = "Оповещение о техническом обслуживании";	
$signup_maintenance_info = "Регистрации временно отключена. Пожалуйста, попробуйте позже.";	
$marketing_group_title = "Маркетинговая группа";	
$marketing_button = "Дисплей";	
$marketing_no_group = "Нет выбранной группы";	
$marketing_choose = "Пожалуйста, выберите маркетинговую группу сверху";	
$marketing_notice = "Маркетинговые группы могут иметь различные страницы входящего трафика ";	
$canspam_heading = "CAN-SPAM Правила и принятие";	
$canspam_accept = "Я прочитал, понимаю и согласен с вышеуказанными правилами CAN-SPAM.";	
$canspam_error = "Вы не приняли наши правила CAN-SPAM.";	
$signup_banned = "Произошла ошибка при создании учетной записи, пожалуйста, свяжитесь с системным администратором для получения более подробной информации.";	
$header_testimonials = "Партнерские отзывы";	
$testi_visit = "Посетить веб-сайт";	
$testi_description = "Предложите свой ​​отзыв о нашей партнерской программе, и мы разместим его на нашем  &lt;a href";	
$testi_name = "Название";	
$testi_url = "Ссылка на сайт";	
$testi_content = "Отзыв";	
$testi_code = "Код безопасности";	
$testi_submit = "Отправить отзыв";	
$testi_na = "Отзывы недоступны.";	
$testi_title = "Предложение свидетельства";	
$testi_success_title = "Отзыв об успехе";	
$testi_success_message = "Спасибо за отправку вашего ​​отзыва. Наша команда рассмотрит его в ближайшее время.";	
$testi_error_title = "Отзыв об ошибке";	
$testi_error_name_missing = "Пожалуйста, укажите ваше имя для вашей характеристики.";	
$testi_error_url_missing = "Пожалуйста, укажите свой ​​адрес веб-сайта для вашей характеристики.";	
$testi_error_missing = "Пожалуйста, включите текст вашей характеристики.";	
$menu_drop_delayed = "Задержка комиссии";	
$details_drop_6 = "Текущие задержки комиссии";	
$details_type_6 = "Задержка - Вскоре утвердится";	
$comdetails_status_6 = "Задержка - Вскоре утвердится";	
$tc_reaccept_title = "Сообщение об изменении условий";	
$tc_reaccept_sub_title = "Вы должны согласиться с нашими новыми условиями для того, чтобы получить доступ к вашей учетной записи.";	
$tc_reaccept_button = "Я прочитал, понимаю и согласен с вышеуказанными условиями.";	
$tlinks_active = "Число активных уровней";	
$tlinks_payout_structure = "Структура уровня выплат";	
$tlinks_level = "Уровень";	
$tierText1 = "% Рассчитывается от ссылающейся партнерской суммы комиссии.";	
$tierText2 = "% Рассчитывается от верхнего уровня суммы комиссии.";	
$tierText3 = "% Рассчитывается по количеству продаж.";	
$tierTextflat = "Единая ставка.";	
$edit_custom_button = "Редактировать ответ";	
$private_heading = "Частная регистрация";	
$private_info = "Наша партнерская программа не является открытой для широкой общественности и требует код регистрации, чтобы присоединиться. Информация о том, как получить код-регистрации, должна быть здесь.";	
$private_required_heading = "Требуется код регистрации";	
$private_code_title = "Введите код регистрации";	
$private_button = "Отправить код";	
$private_error_title = "Неверный код регистрации";	
$private_error_invalid = "Код регистрации, который вы ввели, является недействительным.";	
$private_error_expired = "Код регистрации, который вы предоставили, истек и больше не действует.";	
$qr_code_title = "QR-коды";	
$qr_code_size = "QR-код Размер";	
$qr_code_button = "Показать QR-код";	
$qr_code_offline_title = "Оффлайн маркетинг";	
$qr_code_offline_content1 = "Добавить QR-код для ваших маркетинговых брошюр, листовок, визиток и т.д.";	
$qr_code_offline_content2 = "- Щелкните правой кнопкой мыши на изображение и &lt;strong&gt;save-as&lt;/strong&gt;  на ваш компьютер.";	
$qr_code_online_title = "Интернет-маркетинг";	
$qr_code_online_content = "Добавить QR-код на ваш сайт, социальные медиа, блоги и т.д.";	
$menu_coupon = "Скидочные коды";	
$coupon_title = "Ваши доступные купоны";	
$coupon_desc = "Дайте эти коды купона, и заработайте комиссию каждый раз, когда кто-то использует ваш код!";	
$coupon_head_1 = "Код купона";	
$coupon_head_2 = "Скидка клиенту";	
$coupon_head_3 = "Ваша сумма комиссии";	
$coupon_sale_amt = "из продажи суммы";	
$coupon_flat_rate = "единая ставка";	
$coupon_default = "Уровень выплат по умолчанию";	
$cc_vanity_title = "Запрос персонализированного кода купона";	
$cc_vanity_field = "Код купона";	
$cc_vanity_button = "Запрос кода купона";	
$cc_vanity_error_missing = "<STRONG> Ошибка </ STRONG> Пожалуйста, введите код купона.";	
$cc_vanity_error_exists = "<STRONG> Ошибка </ STRONG> вы уже просили, этот код ожидает одобрения.";	
$cc_vanity_error = "<STRONG> Ошибка </ STRONG> Код купона является недействительным. Пожалуйста, используйте только буквы, цифры и подчеркивания.";	
$cc_vanity_success = "<STRONG> Успех </ STRONG> Ваш персонализированный код купона был запрошен.";	
$coupon_none = "Нет валидных купонов в настоящее время.";	
$pic_error_title = " Ошибка загрузки изображения";	
$pic_missing = "Пожалуйста, выберите имя файла.";	
$pic_invalid = "Тип изображения не допускается. Разрешаются типы изображений .gif, .jpg и PNG.";	
$pic_error = "Ошибка загрузки изображения, свяжитесь с менеджером филиала.";	
$pic_success = "Ваша фотография была успешно загружена.";	
$pic_title = "Закачать изображение";	
$pic_info = "Загрузка вашей фотографии помогает персонализировать наш ​​опыт с вами.";	
$pic_bullet_1 = "Изображения могут быть .jpg, .gif или PNG..";	
$pic_bullet_2 = "Любые несоответствующие изображения будут отброшены, и ваш аккаунт приостановлен.";	
$pic_bullet_3 = "Ваша фотография не будет отображаться публично. Она будет прикреплена только к вашему ​​аккаунту для нас.";	
$pic_file = "Выберите файл:";	
$pic_button = "Загрузить";	
$pic_current = "Моя текущая фотография";	
$pic_remove = "Удалить рисунок";	
$progress_title = "Право для следующей выплаты:";	
$progress_complete = "завершено.";	
$progress_none = "У нас нет минимального требования выплат.";	
$progress_sentence_1 = "Вы заработали";	
$progress_sentence_2 = "из";	
$progress_sentence_3 = "требование.";	
$aff_lib_button = "<b> Требуйте ваш бесплатный доступ!</b><BR />www.AffiliateLibrary.com";	
$menu_announcements = "Социальные медиа кампании";	
$announcements_name = "Название кампании";	
$announcements_facebook_message = "Сообщение Facebook";	
$announcements_twitter_message = "Сообщение Twitter";	
$announcements_facebook_link = "Ссылка на Facebook";	
$announcements_facebook_picture = "Facebook фото";	
$general_last_30_days_activity = "За последние 30 дней активность";	
$general_last_30_days_activity_traffic = "Трафик";	
$general_last_30_days_activity_commissions = "Комиссионные";	
$accountability_title = "Подотчетность и связи";	
$accountability_text =  "<strong> Что это такое? </strong><p> Мы занимаем активную позицию в создании доверия с нашими партнерами. Это наша цель, чтобы убедиться, что мы предлагаем как можно больше информации о каждой заработаной комиссии  и / или отклоненной нашей системой. </p><strong> Связь </strong><p>Мы вновь готовы предоставить подробную информацию о любом отказе комиссий. Мы используем сильную связь с нашими филиалами и поощряем вопросы и обратную связь </ P> ";	
$debit_reason_0 = "Ни один";	
$debit_reason_1 = "Возврат";	
$debit_reason_2 = "Платежам";	
$debit_reason_3 = "Сообщается мошенничество ";	
$debit_reason_4 = "Отмененный заказ";	
$debit_reason_5 = "Частичное возмещение";	
$menu_drop_pending_debits = "Отложенный дебет";	
$debit_amount_label = "Сумма дебета";	
$debit_date_label = "Дата дебета";	
$debit_reason_label = "Причина дебета";	
$debit_paragraph = "Дебет будет вычтен из вашей следующей выплаты. ";	
$debit_invoice_amount = "Минус сумма дебета";	
$debit_revised_amount = "Пересмотренная сумма платежа";	
$mv_head_description = "Примечание: Вы можете разместить только одно видео на странице на вашем сайте.";	
$mv_head_source_code = "Вставьте этот код в разделе HEAD вашего HTML документа.";	
$mv_body_title = "Название видео ";	
$mv_body_description = "Описание";	
$mv_body_source_code = "Вставить этот код в разделе BODY вашего HTML документа, где вы хотите, чтобы появилось видео. ";	
$menu_marketing_videos = "Видео";	
$mv_preview_button = "Предварительный просмотр видео";	
$dt_no_data = "Данные отсутствуют в таблице.";	
$dt_showing_exists = "Отображение _START_ в _END_ записей _TOTAL_. ";	
$dt_showing_none = "Отображение  с 0 по 0 из 0 записей. ";	
$dt_filtered = "(отфильтровано от _MAX_ Всего записей)";	
$dt_length_choice = "Показать _MENU_.";	
$dt_loading = "Загрузка ...";	
$dt_processing = "Обработка ...";	
$dt_no_records = "Не найдено записей. ";	
$dt_first = "Первый";	
$dt_last = "Последний";	
$dt_next = "Следующий";	
$dt_previous = "Назад";	
$dt_sort_asc = ": Активировать для сортировки столбца по возрастанию";	
$dt_sort_desc = ": Активировать для сортировки столбца по убыванию ";	
$choose_marketing_group = "Выбрать маркетинговую группу ";	
$email_already_used_1 = "Счет не может быть создан. Мы только позволяем ";	
$email_already_used_2 = "учетная запись";	
$email_already_used_3 = "должна быть создана на один адрес электронной почты.";	
$missing_fax = "Пожалуйста, введите ваш номер факса. ";	
$chart_last_6_months = "Комиссионные, оплаченные за последние 6 месяцев";	
$chart_last_6_months_paid = "Комиссионные, уплаченные";	
$chart_this_month = "Топ 5 партнеров в этом месяце";	
$chart_this_month_none = "Нет данных для отображения.";	
$login_return = "Возвратиться на партнерскую домашнюю страницу";	
$login_lost_details = "Введите имя пользователя, и мы вышлем вам электронное письмо с вашими учетными данными для входа.";	
$account_edit_general_prefs = "Общие предпочтения ";	
$account_edit_email_language = "Язык электронной почты";	
$footer_connect = "Свяжитесь с нами";	
$modal_close = "Закрыть";	
$vat_amount_heading = "Сумма НДС";	
$menu_logout = "Выйти";	
$menu_upload_picture = "Загрузить свою фотографию";	
$menu_offer_testi = "Предложение свидетельства";	
$fb_login = "Войти с Facebook";	
$fb_permissions = "Разрешение не предоставляется. Пожалуйста, позвольте сайту использовать ваш адрес электронной почты.";
$announcements_published = "Объявление опубликовано";
$training_videos_title = "Обучающие видео";
$training_videos_general = "Общий маркетинг";
$commission_method = "Метод получения комиссии";
$how_will_you_earn = "Как получить комиссию?";
$pm_account_credit = "Сумма заработанной комиссии будет начислена на ваш счет.";
$pm_check_money_order = "Вам будет отправлен чек/денежный перевод по почте.";
$pm_paypal = "Вам будет отправлен платеж через PayPal.";
$pm_stripe = "Вам будет отправлен платеж через Stripe.";
$pm_wire = "Вам будет отправлен банковский перевод.";
$add_to_signup_left_column_text = "<span style=\"color:#CC0000; font-style:italic;\">* поле обязательно для заполнения.</span>";
$paypal_email = "Эл. почта в Paypal";
$stripe_acct_details = "Подробная информация аккаунта Stripe";
$stripe_connect = "После регистрации можно подключиться к своему аккаунту в Stripe на странице настроек аккаунта.";
$stripe_success = "Подключение к аккаунту Stripe прошло успешно";
$stripe_settings = "Настройки Stripe";
$stripe_connect_edit = "Подключиться к Stripe";
$stripe_delete = "Удалить аккаунт Stripe";
$stripe_confirm = "Действительно удалить этот аккаунт?";
$payment_settings = "Настройки оплаты";
$edit_payment_settings = "Изменить настройки оплаты";
$invalid_paypal_address = "Неверный адрес эл. почты Paypal.";
$payment_method_error = "Выберите метод оплаты.";
$payment_settings_updated = "Настройки оплаты обновлены.";
$stripe_removed = "Учетная запись Stripe удалена.";
$payment_settings_success = "Успешно!";
$payment_update_notice_1 = "Внимание!";
$payment_update_notice_2 = "Вы выбрали получить <strong>[payment_option_here]</strong> платеж от нас. Пожалуйста, <a href=\"account.php?page=48\" style=\"font-weight:bold;\">нажмите здесь,</a> чтобы подключиться к своей <strong>[payment_option_here]</strong> учетной записи.";
$pm_title_credit = "Пополнение баланса";
$pm_title_mo = "Чек/платежное поручение";
$pm_title_paypal = "PayPal";
$pm_title_stripe = "Stripe";
$pm_title_wire = "Банковский перевод";
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