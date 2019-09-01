<?PHP

//-------------------------------------------------------
	  $language_pack_name = "czech";
	  $language_pack_table_name = "czech";
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
$header_title = "Přidružený program";
$header_indexLink = "Domovská stránka člena";
$header_signupLink = "Založit účet";
$header_accountLink = "Správa účtu";
$header_emailLink = "Kontaktujte nás";
$header_greeting = "Vítejte";
$header_nonLogged = "Host";
$header_logout = "Odhlásit se zde";
$footer_tag = "Přidružený Software od iDevAffiliate";
$footer_copyright = "Copyright";
$footer_rights = "Všechna práva vyhrazena";
$index_heading_1 = "Vítejte v našem Přidruženém programu!";
$index_paragraph_1 = "K našemu programu se můžete přihlásit zdarma, přihlášení je jednoduché a nevyžaduje žádné technické znalosti. Přidružené programy jsou běžné na Internetu a nabízejí vlastníkům webovských stránek další způsob jak získat příjem ze svých stránek. Členství v přidružených programech zvyšuje návštěvnost a prodej komerčních webů a za to dostávají provizi.";
$index_heading_2 = "Jak to funguje?";
$index_paragraph_2 = "Poté, co se připojíte k našemu přidruženému programu, obdržíte několik bannerů a textových odkazů, které umístíte na své stránky. Pokud uživatel klikne na jeden z těchto odkazů, bude přesměrován na naše webové stránky a jejich aktivita bude registrována našimi prostředky. V závislosti na Vámi zvoleném typu provize pak získáte odpovídající provizi.";
$index_heading_3 = "Statistiky a přehledy v reálném čase!";
$index_paragraph_3 = "Připojte se ěč hodin denně a zkontrolujte si své prodeje, provoz, zůstatek účtu a jak výkonné jsou Vaše bannery.";
$index_login_title = "Přihlášení člena";
$index_login_username = "Uživatelské jméno";
$index_login_password = "Heslo";
$index_login_username_field = "uživatelské jméno";
$index_login_password_field = "heslo";
$index_login_button = "Přihlásit se";
$index_login_signup_link = "Klikněte zde a založte si účet";
$index_table_title = "Detaily programu";
$index_table_commission_type = "Typ Provize";
$index_table_initial_deposit = "Počáteční vklad";
$index_table_requirements = "Platební Náležitosti";
$index_table_duration = "Platební časový interval";
$index_table_choose = "Vyberte si z následujících platebních možností!";
$index_table_sale = "Pay-Per-Sale (Platba Za Prodej)";
$index_table_click = "Pay-Per-Click (Platba za Kliknutí)";
$index_table_sale_text = "za každý realizovaný prodej.";
$index_table_click_text = "za každý realizovaný klik.";
$index_table_deposit_tag = "Pouze  pro registrování nového účtu!";
$index_table_requirements_tag = "Minimální zůstatek nutný pro výplatu.";
$index_table_duration_tag = "Výplaty se provádí jednou měsíčně, za předchozí měsíc.";
$signup_left_column_text = "Připojte se k našemu přidruženému programu a začněte vydělávat peníze za každý prodej který díky Vám zrealizujeme! Jednoduše si založte účet, umístěte svůj html kód na své stránky a sledujte, jak zůstetek Vašeho účtu roste tím, jak se Vaši návštěvníci stávají našimi klienty.";
$signup_left_column_title = "Vítejte ve našem Přidruženém programu!";
$signup_login_title = "Založit vlastní účet";
$signup_login_username = "Uživatelské jméno";
$signup_login_password = "Heslo";
$signup_login_password_again = "Heslo ještě jednou";
$signup_login_minmax_chars = "- Minimální délka uživatelského jména je user_min_chars characters.&lt;br /&gt;- Může obsahovat čísla a písmena&lt;br /&gt;- Uživatelské jméno může obsahovat tyto znaky: _ (underscores only)&lt;br /&gt;&lt;br /&gt;- Minimální délka hesla je pass_min_chars characters.&lt;br /&gt;- Heslo může obsahovat písmena a čísla.&lt;br /&gt;- Heslo může obsahovat tyto znaky:  characters_allowed ";
$signup_login_must_match = "Toto pole se musí shodovat s polem Heslo.";
$signup_standard_title = "Standardní informace";
$signup_standard_email = "Emailová Adresa";
$signup_standard_company = "Název Společnosti";
$signup_standard_checkspayable = "Šeky splatné";
$signup_standard_weburl = "Adresa Internetových Stránek";
$signup_standard_taxinfo = "Daňové identifikační číslo, číslo sociálního pojištění nebo DPH";
$signup_personal_title = "Osobní Informace";
$signup_personal_fname = "Jméno";
$signup_personal_state = "Stát nebo Kraj";
$signup_personal_lname = "Příjmení";
$signup_personal_phone = "Telefonní číslo";
$signup_personal_addr1 = "Ulice";
$signup_personal_fax = "Faxové číslo";
$signup_personal_addr2 = "Další adresa";
$signup_personal_zip = "PSČ";
$signup_personal_city = "Město";
$signup_personal_country = "Země";
$signup_commission_title = "Platba provize";
$signup_commission_howtopay = "Jak Vám máme platit?";
$signup_commission_style_PPS = "Pay-Per-Sale (Platba za prodej)";
$signup_commission_style_PPC = "Pay-Per-Click (Platba za kliknutí)";
$signup_terms_title = "Smluvní podmínky";
$signup_terms_agree = "Přečetl-a jsem si, rozumím a souhlasím s výše uvedenými smluvními podmínkami.";
$signup_page_button = "Založit vlastní účet";
$signup_success_email_comment = "Zaslali jsme Vám email s Vaším uživatelským jménem a heslem..<BR />\r\nPečlivě si jej uschovejte na bezpečném místě pro pozdější použití.";
$signup_success_login_link = "Přihlásit se na svůj účet";
$custom_fields_title = "Uživatelem definovaná pole";
$logout_msg = "<b>Nyní jste odhlášeni</b><BR />Děkujeme Vám za Vaši účast na našem přidruženém programu.";
$signup_page_success = "Váš účet byl vytvořen";
$login_left_column_title = "Přihlásit se k účtu";
$login_left_column_text = "Vložte své uživatelské jméno a heslo pro přístup ke statistikám Vašeho účtu, bannerů, html kódu, FAQ a více.<BR/ ><BR/ >Pokud si nepamatujete své heslo, vložte své uživatelské jméno a my Vám zašleme přihlašovací informace emailem.<BR /><BR />";
$login_title = "Přihlásit se ke svému účtu";
$login_username = "Uživatelské jméno";
$login_password = "Heslo";
$login_invalid = "Neplatné přihlašovací údaje";
$login_now = "Přihlásit se ke svému účtu";
$login_send_title = "Potřebujete své heslo?";
$login_send_username = "Uživatelské jméno";
$login_send_info = "Přihlašovací údaje zaslány na email";
$login_send_pass = "Zasláno na email";
$login_send_bad = "Uživatelské jméno nenalezeno";
$help_new_password_heading = "Nové heslo";
$help_new_password_info = "Vaše heslo musí mít alespoň pass_min_chars znaků. Povolená jsou pouze písmena, čísla a následující znaky:   characters_allowed";
$help_confirm_password_heading = "Potvrďte nové heslo";
$help_confirm_password_info = "Toto heslo se musí shodovat s novým heslem.";
$help_custom_links_heading = "Sledovací klíčové slovo";
$help_custom_links_info = "Klíčové slovo nemůže mít více než 30 znaků. Může obsahovat pouze písmena, číslice a pomlčky.";
$error_title = "Byly nalezeny následující chyby";
$username_invalid = "Neplatné uživatelské jméno. Povolená jsou pouze písmena, čísla a podtržítka.";
$username_taken = "Uživatelské jméno, které jste si vybrali, je již obsazeno.";
$username_short = "Vaše uživatelské jméno je příliš krátké, musí mít minimálně user_min_chars znaků.";
$username_long = "Vaše uživatelské jméno je příliš dlouhé, musí mít maximálně user_max_chars znaků.";
$password_invalid = "Neplatné heslo. Povolená jsou pouze písmena, čísla a následující znaky:  characters_allowed";
$password_short = "Heslo je příliš krátké, musí mít alespoň pass_min_chars znaků.";
$password_long = "Heslo je příliš dlouhé, musí mít nanejvýše pass_max_chars znaků.";
$password_mismatch = "Vaše hesla se neshodují.";
$missing_checks = "Prosím vložte jméno příjemce kterému se budou zasílat platby.";
$missing_tax = "Prosím vložte své daňové identifikační číslo, číslo sociálního pojištění nebo DPH.";
$missing_fname = "Prosím vložte své jméno.";
$missing_lname = "Prosím vložte své příjmení.";
$missing_email = "Prosím vložte svoji emailovou adresu.";
$invalid_email = "Vaše emailová adresa je neplatná.";
$missing_address = "Prosím vložte název ulice.";
$missing_city = "Prosím vložte město.";
$missing_company = "Prosím vložte jméno Vaší společnosti.";
$missing_state = "Prosím vložte jméno státu nebo kraje.";
$missing_zip = "Prosím vložte své PSČ.";
$missing_phone = "Prosím vložte své telefonní číslo.";
$missing_website = "Prosím vložte svoji webovskou adresu.";
$missing_paypal = "Vybrali jste si, že budete přijímat platby pomocí účtu PayPal, prosím zadejte svůj účet PayPal.";
$missing_terms = "Nepotvrdili jste, že souhlasíte s našimi obchodními podmínkami.";
$paypal_required = "PayPal účet je nutný pro provedení platby.";
$missing_custom = "Prosím doplňte pole s názvem:";
$account_total_transactions = "Celkem transakcí";
$account_standard_linking_code = "Standardní html kód - skvělý pro použití v emailech!";
$account_copy_paste = "Zkopírujte výše uvedený kód na své stránky anebo do svých emailů";
$account_not_approved = "Váš účet nyní čeká na schválení";
$account_suspended = "Váš účet je nyní pozastaven";
$account_standard_earnings = "Standardní výdělky";
$account_inc_bonus = "zahrnuje bonus";
$account_second_tier = "Výdělky vrstev";
$account_recurring = "Opakované výdělky";
$account_not_available = "N/A";
$account_earned_todate = "Celkové příjmy do dnešního data";
$menu_heading_overview = "Přehled účtu";
$menu_general_stats = "Všeobecné statistiky";
$menu_tier_stats = "Statistiky vrstev";
$menu_payment_history = "Provedené platby";
$menu_commission_details = "Údaje o provizích";
$menu_recurring_commissions = "Opětovné provize";
$menu_traffic_log = "Záznamy o příchozích uživatelích";
$menu_heading_marketing = "Marketingové Materiály";
$menu_banners = "Bannery";
$menu_text_ads = "Textové reklamy";
$menu_text_links = "Textové odkazy";
$menu_email_links = "Emailové odkazy";
$menu_html_links = "HTML reklamy";
$menu_offline = "Offline Marketing";
$menu_tier_linking_code = "HTML kód pro vrstvy";
$menu_email_friends = "Emailoví prátelé &amp; Členové";
$menu_custom_links = "Vytvořte si &amp; sledujte své vlastní odkazy";
$menu_heading_management = "Správa účtu";
$menu_comalert = "CommissionAlert nastavení";
$menu_comstats = "CommissionStats nastavení";
$menu_edit_account = "Změnit údaje o účtu";
$menu_change_pass = "Změnit heslo";
$menu_change_commission = "Změnit styl získávání provizí";
$menu_heading_general_info = "Všeobecné informace";
$menu_browse_affiliates = "Další členové programu";
$menu_faq = "Často kladené otázky";
$suspended_title = "Upozornění ohledně stavu účtu";
$suspended_heading = "Váš účet je nyní pozastaven";
$suspended_notes = "Poznámky správce";
$pending_title = "Upozornění ohledně stavu účtu";
$pending_heading = "Váš účet nyní čeká na schválení";
$pending_note = "Po schválení Vašeho účtu Vám budou zpřístupněny propagační materiály.";
$faq_title = "Často kladené otázky";
$faq_none = "Zatím žádné často kladené otázky";
$browse_title = "Další členové programu";
$browse_none = "Žádní další členové programu";
$change_comm_title = "Změňte styl provizí";
$change_comm_curr_comm = "Současný styl provizí";
$change_comm_curr_pay = "Současná úroveň výplat";
$change_comm_new_comm = "Nový styl provizí";
$change_comm_warning = "Pokud změníte styl získávání provizí, Váš účet bude nastaven na výplatní úroveň 1";
$change_comm_button = "Změnit styl provizí";
$change_comm_no_other = "Žádné další styly provizí nejsou k dispozici";
$change_comm_level = "Úroveň";
$change_comm_updated = "Styl provizí upraven";
$password_title = "Změnit heslo";
$password_old_password = "Staré heslo";
$password_new_password = "Nové heslo";
$password_confirm_password = "Potvrďte nové heslo";
$password_button = "Změnit heslo";
$password_warning_old_missing = "Staré heslo je nepřesné nebo chybí";
$password_warning_new_missing = "Nové heslo chybí";
$password_warning_mismatch = "Nové heslo nesouhlasí";
$password_warning_invalid = "Neplatné heslo - Klikněte na nápovědu";
$password_notice = "Heslo uloženo";
$edit_failed = "Uložení se nepodařilo - podívejte se na výše uvedené chybové hlášení";
$edit_success = "Udaje účtu uloženy";
$edit_button = "Změnit údaje účtu";
$commissionstats_title = "CommissionStats nastavení";
$commissionstats_info = "Nainstalováním CommissionStats můžete konzultovat své statistiky okamžitě, přímo ze svého windows desktopu! K nainstalování této funkce si stáhněte CommissionStats a <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>rozbalte</b></a> soubor na svém pevném disku, poté spusťte soubor <b>setup.exe</b>. Jako přihlašovací údaje vložte následující údaje.";
$commissionstats_hint = "Rada: Zkopírujte (Copy a Paste) každý údaj pro přesnost";
$commissionstats_profile = "Název profilu";
$commissionstats_username = "Uživatelské jméno";
$commissionstats_password = "Heslo";
$commissionstats_id = "Členské identifikační číslo";
$commissionstats_source = "Zdrojová cesta URL";
$commissionstats_download = "Stáhněte si CommissionStats";
$commissionalert_title = "CommissionAlert nastavení";
$commissionalert_info = "Pokud si nainstalujete CommissionAlert budeme Vás okamžitě informovat o nových provizích, přímo ve Vašem Windows desktopu! Pro nainstalování této funkce si stáhněte CommissionAlert a <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>rozbalte</b></a> soubory na svém pevném disku, poté spusťte soubor <b>setup.exe</b>. Použijte následující přihlašovací údaje.";
$commissionalert_hint = "Rada: Zkopírujte (Copy a Paste) každý údaj pro přesnost";
$commissionalert_profile = "Název profilu";
$commissionalert_username = "Uživatelské jméno";
$commissionalert_password = "Heslo";
$commissionalert_id = "Členské identifikační číslo";
$commissionalert_source = "Zdrojová cesta URL";
$commissionalert_download = "Stáhnout CommissionAlert";
$offline_title = "Offline Marketing";
$offline_paragraph_one = "Vydělávejte peníze sdílením Vašich stránek (offline) s Vašimi přáteli a dalšími členy!";
$offline_send = "Poslat zákazníky";
$offline_page_link = "zobrazit stránku";
$offline_paragraph_two = "Vaši zákazníci vloží Vaše <b>Členské identifikační číslo</b> do pole na výše uvedené stránce, čímž Vás zaregistruje jako člena který se vztahuje ke všem nákupům, které učiní.";
$banners_title = "Bannery";
$banners_size = "Velikost Banneru";
$banners_description = "Popis Banneru";
$ad_title = "Textová reklama";
$ad_info = "Použitím tohoto HTML kódu můžete upravit schéma barev, výšku a šířku Vašich textových reklam.";
$links_title = "Název odkazu";
$email_title = "Emailové odkazy";
$email_group = "Marketingové skupiny";
$email_button = "Zobrazte Emailové odkazy";
$email_no_group = "Žádná skupina nebyla vybrána";
$email_choose = "Prosím vyberte výše uvedenou marketingovou skupinu";
$email_notice = "Marketingové skupiny mohou mít různé stránky vstupního provozu";
$email_ascii = "<b>ASCII/Text Verze</b> - Pro použití v Plain Text emailech.";
$email_html = "<b>HTML Verze</b> - Pro použití v HTML formátovaných emailech.";
$email_test = "Testovací odkaz";
$email_test_info = "Odtud budou Vaši zákazníci posláni na naše webovské stránky.";
$email_source = "Zdrojový kód - Copy/Paste do vaší emailové zprávy";
$html_title = "Název HTML reklamy";
$html_view_link = "Zobrazit tuto HTML reklamu";
$traffic_title = "Záznamy o frekvenci příchozích zákazníků";
$traffic_display = "Zobraz poslední";
$traffic_display_visitors = "Návštěvníci";
$traffic_button = "Zobraz záznamy o frekvenci příchozích zákazníků";
$traffic_title_details = "Detaily o frekvenci příchozích zákazníků";
$traffic_ip = "IP Adresa";
$traffic_refer = "Odkazující URL";
$traffic_date = "Datum";
$traffic_time = "Čas";
$traffic_bottom_tag_one = "Zobrazuji poslední";
$traffic_bottom_tag_two = "z";
$traffic_bottom_tag_three = "Celkem jedinečných návštěvníků";
$traffic_none = "Zádné záznamy o frekvenci příchozích zákazníků neexistují";
$traffic_no_url = "N/A - Možná záložka nebo Emailový odkaz";
$traffic_box_title = "Doplňte odkazující URL";
$traffic_box_info = "Klikněte na odkaz pokud si přejete navštívit webovskou stránku";
$payment_title = "Platby provedené v minulosti";
$payment_date = "Datum platby";
$payment_commissions = "Provize";
$payment_amount = "Vyplácená částka";
$payment_totals = "Celkem";
$payment_none = "V minulosti nebyly provedeny žádné platby";
$tier_stats_title = "Statistiky vrstev";
$tier_stats_accounts = "Vrstvové účty přímo pod Vámi";
$tier_stats_grab_link = "Vezměte si Váš vrstvový HTML kód";
$tier_stats_none = "Neexistuje žádný vrstvový účet";
$tier_stats_username = "Uživatelské jméno";
$tier_stats_current = "Součaasné provize";
$tier_stats_previous = "Předchozí výplaty";
$tier_stats_totals = "Celkem";
$recurring_title = "Opakované provize";
$recurring_none = "Žádné opakované provize neexistují";
$recurring_date = "Datum provize";
$recurring_status = "Opakovaný stav";
$recurring_payout = "Příští výplata";
$recurring_amount = "Částka";
$recurring_every = "Každý";
$recurring_in = "Za";
$recurring_days = "dnů";
$recurring_total = "Celkem";
$tlinks_title = "Přidejte další ke své vrstvě a vydělávejte peníze též díky nim!";
$tlinks_embedded_one = "Vrstvové \"Signup Crediting\" je již aktivováno ve Vašich standardních odkazech!";
$tlinks_embedded_two = "Vrstvový systém Vm umožňuje zapojit další lidi do přidruženého programu. Stanete se horní vrstvou pro každého, kdo se připojí k našemu přidruženému programu díky Vašemu speciálnímu odkazu uvedenému níže. Informace o tom, kolik můžete vydělat, je uvedena níže.";
$tlinks_embedded_current = "Současná výplata z vrstev";
$tlinks_forced_two = "Vrstvový systém Vám umožňuje zapojit další lidi do přidruženého programu. Stanete se horní vrstvou pro každého, kdo se připojí k našemu přidruženému programu díky Vašemu speciálnímu odkazu uvedenému níže. Informace o tom, kolik můžete vydělat, je uvedena níže.";
$tlinks_forced_code = "Vrstvový odkaz";
$tlinks_forced_paste = "Copy/Paste výše uvedený kód na své webovské stránky";
$tlinks_forced_money = "Správci Webů zde vydělávají peníze!";
$comdetails_title = "Detaily provizí";
$comdetails_date = "Datum provize";
$comdetails_time = "Čas provize";
$comdetails_type = "Typ provize";
$comdetails_status = "Současný stav";
$comdetails_amount = "Částka provize";
$comdetails_additional_title = "Další provizní detaily";
$comdetails_additional_ordnum = "Číslo objednavky";
$comdetails_additional_saleamt = "Prodejní cena";
$comdetails_type_1 = "Bonus provize";
$comdetails_type_2 = "Opakovaná provize";
$comdetails_type_3 = "Vrstvová provize";
$comdetails_type_4 = "Standardní provize";
$comdetails_status_1 = "Zaplaceno";
$comdetails_status_2 = "Schváleno - čeká se na provedení platby";
$comdetails_status_3 = "Čeká se na schválení";
$comdetails_not_available = "N/A";
$details_title = "Provizní detaily";
$details_drop_1 = "Současné standardní provize";
$details_drop_2 = "Současné vrstvové provize";
$details_drop_3 = "Provize, které čekají na schválení";
$details_drop_4 = "Vyplacené standardní provize";
$details_drop_5 = "Vyplacené vrstvové provize";
$details_button = "Zobrazit provize";
$details_date = "Datum";
$details_status = "Stav";
$details_commission = "Provize";
$details_details = "Zobrazit detaily";
$details_type_1 = "Zaplaceno";
$details_type_2 = "Čeká se na schválení";
$details_type_3 = "Schváleno - čeká se na výplatu";
$details_none = "Žádné provize nelze zobrazit";
$details_no_group = "Nejsou vybrány žádné provizní skupiny";
$details_choose = "Prosím vyberte provizní skupinu výše";
$general_title = "Současné provize - od poslední výplaty do dnešního dne";
$general_transactions = "Transakce";
$general_earnings_to_date = "Příjmy do dnešního dne";
$general_history_link = "Zobrazit provedené výplaty";
$general_standard_earnings = "Standardní příjmy";
$general_current_earnings = "Současné příjmy";
$general_traffic_title = "Statistiky o frekvenci příchozích zákazníků";
$general_traffic_visitors = "Návštěvníci";
$general_traffic_unique = "Jedineční návštěvníci";
$general_traffic_sales = "Schválené prodeje";
$general_traffic_ratio = "Prodejní poměr";
$general_traffic_info = "Tyto statistiky nezahrnují opakované nebo vrstvové provize.";
$general_traffic_pay_type = "Typ výplaty";
$general_traffic_pay_level = "Současná úroveň výplat";
$general_notes_title = "Poznámky od správce systému";
$general_notes_date = "Datum vytvoření";
$general_notes_to = "Komu";
$general_notes_all = "Všichni členové programu";
$general_notes_none = "Žádné poznámky nejsou k dispozici";
$contact_left_column_title = "Kontaktujte nás";
$contact_left_column_text = "Prosím kontaktujte našeho správce programu pomocí formuláře vpravo.";
$contact_title = "Kontaktujte nás";
$contact_name = "Vaše jméno";
$contact_email = "Vaše emailová adresa";
$contact_message = "Zpráva";
$contact_chars = "zbývá znaků";
$contact_button = "Poslat zprávu";
$contact_received = "Obdrželi jsme Vaši zprávu, prosíme o strpení, odpověď byste měli obdržet za 24 hodin.";
$contact_invalid_name = "Neplatné jméno";
$contact_invalid_email = "Neplatná emailová adresa";
$contact_invalid_message = "Chybná zpráva";
$invoice_button = "Faktura";
$invoice_header = "FAKTURA PLATBY ČLENA";
$invoice_aff_info = "Informace Přidruženého Programu";
$invoice_co_info = "Informace";
$invoice_acct_info = "Informace o účtu";
$invoice_payment_info = "Informace o platbě";
$invoice_comm_date = "Datum plaby";
$invoice_comm_amt = "Částka provize";
$invoice_comm_type = "Typ provize";
$invoice_admin_note = "Poznámka správce";
$invoice_footer = "KONEC FAKTURY";
$invoice_print = "Vytisknout fakturu";
$invoice_none = "N/A";
$invoice_aff_id = "Identifikační číslo člena";
$invoice_aff_user = "Uživatelské jméno";
$menu_pdf_marketing = "PDF Marketingových Brožur";
$menu_pdf_training = "PDF Výukových Dokumentů";
$marketing_target_url = "Cílové URL";
$marketing_source_code = "Zdrojový kód - Copy/Paste na Vaše webovské stránky";
$marketing_group = "Marketingová skupina";
$peels_title = "Jméno peelu stránky";
$peels_view = "Zobrazit tento peel";
$peels_description = "Popis peelu stránky";
$lb_head_title = "Požadovaný HEAD kód pro Vaše HTML stránky";
$lb_head_description = "Abyste mohli použít lightbox na Vašich stránkách, musíte přidat následující řádky do head sekce stránky, na které to chcete zobrazit.";
$lb_head_source_code = "Zkopírujte tento kód do HEAD sekce Vašeho HTML dokumentu.";
$lb_head_code_notes = "Je třeba umístit tento kód na stránku jenom jednou, nezávisle na tom kolik lightboxů chcete na stránku umístit.";
$lb_head_tutorial = "Zobrazit výukový program";
$lb_body_title = "Jméno Lightboxu";
$lb_body_description = "Popis Lightboxu";
$lb_body_click = "Klikněte na obrázek nahoře pro zobrazení lightboxu.";
$lb_body_source_code = "Zkopírujte tento kód do BODY sekce Vašeho HTML dokumentu, kde chcete, aby se obrázek zobrazil.";
$pdf_title = "PDF";
$pdf_training = "Výukové dokumenty";
$pdf_marketing = "Marketingové Brožury";
$pdf_description_1 = "Adobe Reader je nutný ke zobrazení a tisku našich PDF marketingových materiálů.";
$pdf_description_2 = "Adobe Reader je možné získat zdarma na Adobe webovských stránkách.";
$pdf_file_name = "Jméno souboru";
$pdf_file_size = "Velikost souboru";
$pdf_file_description = "Popis";
$pdf_bytes = "Bytů";
$menu_heading_training_materials = "Výukové materiály";
$menu_videos = "Podívejte se na výuková videa";
$menu_custom_manual = "Manuál uživatelských sledovacích odkazů";
$menu_page_peels = "Stránkové Peely";
$menu_lightboxes = "Lightboxy";
$menu_email_templates = "Emailové předlohy";
$menu_heading_custom_links = "Uživatelské sledovací odkazy";
$menu_custom_reports = "Záznamy";
$menu_keyword_links = "Odkazy pro sledování klíčových slov";
$menu_subid_links = "Pod-přidružené sledovací odkazy";
$menu_alteranate_links = "Alternativní odkazy příchozích stránek";
$menu_heading_additional = "Další nástroje";
$menu_drop_heading_stats = "Všeobecné statistiky";
$menu_drop_heading_commissions = "Provize";
$menu_drop_heading_history = "Platby provedené v minulosti";
$menu_drop_heading_traffic = "Záznamy o frekvenci příchozích zákazníků";
$menu_drop_heading_account = "Můj účet";
$menu_drop_heading_logo = "Nahrát vlastní logo";
$menu_drop_heading_faq = "FAQ";
$menu_drop_general_stats = "Všeobecné statistiky";
$menu_drop_tier_stats = "Vrstvové statistiky";
$menu_drop_current = "Současné provize";
$menu_drop_tier = "současné vrstvové provize";
$menu_drop_pending = "Čekají na schválení";
$menu_drop_paid = "Zaplacené provize";
$menu_drop_paid_rec = "Zaplacené vrstvové provize";
$menu_drop_recurring = "Aktivní opakující se provize";
$menu_drop_edit = "Změni údaje v účtu";
$menu_drop_password = "Změnit heslo";
$menu_drop_change = "Změnit styl získávání provizí";
$account_hidden = "skrytý";
$keyword_title = "Odkazy na vybraná klíčová slova";
$keyword_info = "Založení odkazu pro klíčová slova Vám umožní sledovat frekvenci příchozích zákazníků z různých zdrojů. Založte odkaz s max. 4 různými sledovacími klíčovými slovy a Vaše sledovací zpráva Vám podá detailní informace ke každému klíčovému slovu.";
$keyword_heading = "Dostupné proměnné pro sledování klíčových slov";
$keyword_tracking = "Sledovací ID";
$keyword_build = "K vytvoření svého odkazu, vezměte následující URL a připojte jej ke sledovacímu ID a klíčovému slovu, které chcete použít.";
$keyword_example = "Příklad";
$keyword_tutorial = "Zobrazit výukový program";
$sub_tracking_title = "Pod-přidružené sledování";
$sub_tracking_info = "Založením pod-přidruženého odkazu můžete předat váš přidružený odkaz vašim vlastním přidruženým členům. Budete vědět, kdy vám vytvořil provizi, protože Vám sdělíme, kteří pod-přidružení členové vygenerovali prodej. Další důvod pro použití pod-přidruženého odkazu je, pokud máte svůj vlastní sledovací systém, který ccete zahrnout to přehledů.";
$sub_tracking_build = "Nahraďte XXX členským identifikačním číslem ve Vašem programu. Zopakujte tento proces pro všechny Vaše členy.";
$sub_tracking_example = "Příklad";
$sub_tracking_tutorial = "Zobrazit výukový program";
$sub_tracking_id = "Identifikátor Pod-přidruženého člena";
$alternate_title = "Alternativní odkazy vstupní stránky";
$alternate_option_1 = "Možnost 1: Automatické vytvoření odkazu";
$alternate_heading_1 = "Automatické vytvoření odkazu";
$alternate_info_1 = "Definujte si vlastní stránku pro příchod zákazníků vložením URL stránky na kterou si přejete přesměrovat Vaše zákazníky a my pro Vás vytvoříme odkaz. Užitím této funkce se vytvoří kratší odkaz, který může použít v odkazu s použitím ID čísla z naší databáze.";
$alternate_button = "Založ můj odkaz";
$alternate_links_heading = "Moje alternativní příchozí URL odkazy";
$alternate_links_note = "Existující odkazy zůstanou neporušeny a funkční pokud odstraníte odkaz z této stránky.";
$alternate_links_remove = "odstranit";
$alternate_option_2 = "Možnost 2: Manuální vytvoření odkazu";
$alternate_info_2 = "Pokud dáváte přednost tomu, připojit vlastní členské odkazy s alternativními příchozími URL, použijte následující strukturu.";
$alternate_variable = "Proměnná alternativního příchozího URL";
$alternate_example = "Příklad";
$alternate_build = "Pro vytvoření svého odkazu, vezměte následující URL a připojte jej k alternativnímu příchozímu URL, který chcete použít.";
$alternate_none = "Žádné alternativní příchozí odkazy nebyly vytvořeny";
$alternate_tutorial = "Zobrazit výukový program";
$cr_title = "Zpráva o založených klíčových slovech";
$cr_select = "Vybrat klíčové slovo";
$cr_button = "Vygenerovat zprávu";
$cr_no_results = "Nebyly nalezeny žádné výsledky vyhledávání";
$cr_no_results_info = "Zkuste jinou kombinaci klíčových slov";
$cr_used = "Použitá klíčová slova";
$cr_found = "Nalezen tento odkaz";
$cr_times = "Krát";
$cr_unique = "jednoznačných odkazů nalezeno";
$cr_detailed = "Detailní zpráva o odkazech";
$cr_export = "Exportovat Zprávu do Excelu";
$cr_none = "Zádná klíčová slova nenalezena";
$logo_title = "Nahrát logo společnosti";
$logo_info = "Pokud chcete nahrát logo Vaší společnosti, zobrazíme jej zákazníkům, které pošlete na naše stránky. Toto nám umožní personalizovat uživatelský zážitek Vašich zákazníků, když nás navštíví.";
$logo_bullet_one = "Obrázky mohou být ve formátu .jpg, .gif nebo .png. Flash obsah není povolen.";
$logo_bullet_two = "Jakékoliv nevhodné obrázky budou smazány a Váš účet bude deaktivován.";
$logo_bullet_three = "Váš obrázek/logoYour nebude zobrazen na našem webu dokud nebude námi schválen.";
$logo_bullet_size_one = "Obrázky moohu mít šířku nejvýše";
$logo_bullet_size_two = "pixelů a výšku ";
$logo_bullet_req_size_one = "Obrázky musí mít šířku";
$logo_bullet_req_size_two = "pixelů a výšku";
$logo_bullet_pixels = "pixelů.";
$logo_choose = "Vyberte obrázek";
$logo_file = "Vyberte soubor:";
$logo_browse = "Prohlížet...";
$logo_button = "Nahrát";
$logo_current = "Můj současný obrázek";
$logo_remove = "odstranit";
$logo_display_status = "Status obrázku:";
$logo_pending = "Ceká se na schválení";
$logo_approved = "Schváleno";
$logo_success = "Obrázek byl úspěšně nahrán a nyní čeká na schválení.";
$signup_security_title = "Ověření účtu";
$signup_security_info = "Prosím vložte bezpečnostní kód zobrazený v rámečku. Tento krok nám pomáhá vyvarovat se automatickým přihláškám.";
$signup_security_code = "Bezpečnostní kód";
$sub_tracking_none = "Zádný";
$missing_security_code = "Nesprávné nebo chybějící ověření účtu / bezpečnostního kódu";
$alternate_success_title = "Odkaz úspěšně";
$alternate_success_info = "Vezměte odkaz zobrazený níže a začněte přesměrovávat příchozí zákazníky na Vámi vybrané URL.";
$alternate_failed_title = "Chyba při vytváření odkazu";
$alternate_failed_info = "Prosím vložte platné URL.";
$logo_missing_filename = "Prosím vyberte jméno souboru.";
$logo_required_width = "Sířka obrázku musí být";
$logo_required_height = "Výška obrázku musí být";
$logo_maximum_width = "Sířka obrázku může být jen";
$logo_maximum_height = "Výška obrázku může být jen";
$logo_size_maximum = "Rozměry obrázku mohou být maximálně";
$logo_bad_filetype = "Typ obrázku není povolen. povolené typy obrázků jsou .gif, .jpg a .png.";
$logo_upload_error = "Chyba při nahrávání obrázku, prosím kontaktujte správce členského programu.";
$logo_error_title = "Chyba při nahrávání obrázku";
$logo_error_bytes = "bytů.";
$excel_title = "Zpráva o odkazech klíčových slov";
$excel_tab_report = "Zpráva o zavedených klíčových slovech";
$excel_tab_logs = "Záznamy o příchozích uživatelích";
$excel_date = "Datum zprávy:";
$excel_affiliate = "Členské identifikační číslo:";
$excel_criteria = "Kritéria odkazů klíčových slov";
$excel_link = "Struktura odkazů";
$excel_hits = "Jedinečné návštěvy";
$excel_comm_stats = "Provizní Statistiky";
$excel_comm_current = "Současné provize";
$excel_comm_paid = "Placené provize";
$excel_comm_total = "Celkové provize";
$excel_comm_ratio = "Převáděcí poměr";
$excel_earned = "Vydělané provize";
$excel_earned_current = "Současné provize";
$excel_earned_paid = "Placené provize";
$excel_earned_total = "Celkové vydělané provize";
$excel_earned_tab = "Klikněte na Přehled (níže) ke zobrazení přehledu provozu pro tento odkaz.";
$excel_log_title = "Přehled o provozu spojeným s klíčovými slovy";
$excel_log_ip = "IP Addresa";
$excel_log_refer = "Odkazující URL";
$excel_log_date = "Datum";
$excel_log_time = "Čas";
$excel_log_target = "Cílové URL";
$etemplates_title = "Emailové předlohy";
$etemplates_view_link = "Zobrazit tuto emailovou předlohu";
$etemplates_name = "Název předlohy";
$signup_maintenance_heading = "Upozornění o údržbě";
$signup_maintenance_info = "Přihlašování je momentálně deaktivováno. Prosíme zkuste to později.";
$marketing_group_title = "Marketingová skupina";
$marketing_button = "Zobraz";
$marketing_no_group = "Žádná skupina nebyla vybrána";
$marketing_choose = "Prosím vyberte marketingovou skupinu výše";
$marketing_notice = "Marketingové skupiny mohou mít různé vstupní stránky pro zákazníky.";
$canspam_heading = "CAN-SPAM pravidla a přijatelnost";
$canspam_accept = "Přečetl-a jsem si, rozumím a souhlasím s výše uvedenými CAN-SPAM pravidly.";
$canspam_error = "Nepotvrdil-a jste souhlas s našimi CAN-SPAM pravidly.";
$signup_banned = "Nastala chyba při zakládání účtu. Prosím kontaktujte správce systému pro více informací.";
$header_testimonials = "Svědectví našich členů";
$testi_visit = "Navštívit webovské stránky";
$testi_description = "Sdělte Vaši zkušenost s naším členským programem a my ji umístíme na naše &lt;a href=&quot;testimonials.php&quot;&gt;svědectví&lt;/a&gt; stránku s odkazem na Váš web.";
$testi_name = "Jméno";
$testi_url = "URL webovských stránek";
$testi_content = "Svědectví";
$testi_code = "Bezpečnostní kód";
$testi_submit = "Zaslat svědectví";
$testi_na = "Svědectví nejsou k dispozici.";
$testi_title = "Nabídnout svědectví";
$testi_success_title = "Uspěch svědectví";
$testi_success_message = "Děkujeme Vám za poskytnutí Vašeho svědectví. Náš tým jej v krátké době ověří.";
$testi_error_title = "Chyba svědectví";
$testi_error_name_missing = "Prosím uvedte své jméno ve vašem svědectví.";
$testi_error_url_missing = "Prosím uvedte URL webovských stránek ve vašem svědectví.";
$testi_error_missing = "Prosím uvedte text ve vašem svědectví.";
$menu_drop_delayed = "Zpožděné provize";
$details_drop_6 = "Současné zpožděné provize";
$details_type_6 = "Zpožděno - bude brzy potvrzeno";
$comdetails_status_6 = "Zpožděno - bude brzy potvrzeno";
$tc_reaccept_title = "Vyrozumění o změně obchodních podmínek";
$tc_reaccept_sub_title = "Musíte souhlasit s obchodními podmínkami pro získání přístupu ke svému účtu.";
$tc_reaccept_button = "Přečetl-a jsem si, rozumím a souhlasím s výše uvedenými obchodními podmínkami.";
$tlinks_active = "Počet aktivních vrstev";
$tlinks_payout_structure = "Struktura vrstev plateb";
$tlinks_level = "Úroveň";
$tierText1 = "% vypočítána z částky odkazové členské provize.";
$tierText2 = "% vypočítána z částky provize horní vrstvy.";
$tierText3 = "% vypočítána z částky prodejů.";
$tierTextflat = "plošná sazba.";
$edit_custom_button = "Upravit odpověd";
$private_heading = "Soukromá registrace";
$private_info = "Náš členský program není otevřen veřejnosti a vyžaduje přihlašovací kód k registraci nového účtu. Informace o tom, jak je možné získat přihlašovací kód, by měli být zde.";
$private_required_heading = "Přihlašovací kód nutný";
$private_code_title = "Vložte přihlašovací kód";
$private_button = "Poslat kód";
$private_error_title = "Neplatný přihlašoací kód";
$private_error_invalid = "Přihlašovací kód, který jste uvedli, je neplatný.";
$private_error_expired = "Přihlašovací kód, který jste uvedli, vypršel, a již není platný.";
$qr_code_title = "QR kódy";
$qr_code_size = "Velikost QR kódu";
$qr_code_button = "zobraz QR kód";
$qr_code_offline_title = "Offline Marketing";
$qr_code_offline_content1 = "Přidej tento QR kód do svých marketingových brožur, letáčků, vizitek, atd.";
$qr_code_offline_content2 = "- Pravým kliknutím na obrázek a &lt;strong&gt;save-as&lt;/strong&gt; na svůj počítač.";
$qr_code_online_title = "Online Marketing";
$qr_code_online_content = "Přidat tento QR kód na svoje webovské stránky, sociální média, blogy, atd.";
$menu_coupon = "Kuponové kódy";
$coupon_title = "Vaše dostupné kuponové kódy";
$coupon_desc = "Nabídněte tyto kuponové kódy a získejte provizi pokaždé, když někdo použije Váš kód!";
$coupon_head_1 = "Kuponový kód";
$coupon_head_2 = "Zákaznická sleva";
$coupon_head_3 = "Částka Vaší provize";
$coupon_sale_amt = "z prodejní částky";
$coupon_flat_rate = "paušální sazba";
$coupon_default = "Předvolená úroven výplat";
$cc_vanity_title = "Vyžádat si personalizovaný kuponový kód.";
$cc_vanity_field = "Kuponový kód";
$cc_vanity_button = "Vyžádat si kuponový kód";
$cc_vanity_error_missing = "<strong>Chyba!</strong> Prosím vložte kupónový kód.";
$cc_vanity_error_exists = "<strong>Chyba!</strong> Tento kód jste si již vyžádal-a. Čeká na schválení.";
$cc_vanity_error = "<strong>Chyba!</strong> Kuponový kód je neplatný. prosím použijte pouze písmena, číslice a podtržítka.";
$cc_vanity_success = "<strong>Uspěch!</strong> žádost o Váš osobní kuponový kód byla zaregistrována.";
$coupon_none = "Žádné kuponové kódy nejsou v současnosti k dispozici.";
$pic_error_title = "Chyba při nahrávání obrázku";
$pic_missing = "Prosím vyberte jiný soubor.";
$pic_invalid = "Tento typ obrázku není povolen. Povolené typy obrázků jsou: .gif, .jpg a .png.";
$pic_error = "Chyba při vkládání obrázku, prosím kontaktujte správce členského programu.";
$pic_success = "Váš obrázek byl úspěšně vložen.";
$pic_title = "Vložte svoji fotografii";
$pic_info = "Vložení vlastní fotografie nám pomáhá personalizovat náš zážitek s Vámi.";
$pic_bullet_1 = "Obrázky mohou být ve formátu .jpg, .gif or .png.";
$pic_bullet_2 = "Jakékoliv nevhodné obrázky budou smazány a Váš účet bude deaktivován.";
$pic_bullet_3 = "Vaše fotografie nebude zobrazena veřejně. Bude pouze připojena k Vašemu účtu pro naši vnitřní potřebu.";
$pic_file = "Vyberte soubor:";
$pic_button = "Vložit";
$pic_current = "Moje současné fotografie";
$pic_remove = "Odstranit obrázek";
$progress_title = "Oprávnění k příští výplatě:";
$progress_complete = "hotovo.";
$progress_none = "Nemáme žádný požadavek na minimální výplatu.";
$progress_sentence_1 = "Vydělali jste";
$progress_sentence_2 = "z požadovaných";
$progress_sentence_3 = ".";
$aff_lib_button = "<font style=\"font-size:16px; font-weight:bold;\">Požádejte o volný přístup k</font><BR />www.AffiliateLibrary.com";
$menu_announcements = "Kampaně sociálních médií";
$announcements_name = "Jméno kampaně";
$announcements_facebook_message = "Facebook zpráva";
$announcements_twitter_message = "Twitter zpráva";
$announcements_facebook_link = "Facebook odkaz";
$announcements_facebook_picture = "Facebook fotografie";
$general_last_30_days_activity = "Aktivita za posledních 30 dnů";
$general_last_30_days_activity_traffic = "Příchody na stránky";
$general_last_30_days_activity_commissions = "Provize";
$accountability_title = "Odpovědnost a komunikace";
$accountability_text = "<strong>Co je toto?</strong><p>Zvolili jsme aktivní přístup k vytváření důvěry mezi námi a našimi partnery. Naším cílem je ujistit se, že poskytujeme pokud možno co nejvíce informací o každé získané a/nebo odmítnuté provizi v našem systému.</p><strong>Komunikace</strong><p>Na vyžádání poskytujeme informace o všech odmítnutých provizích. Volíme odpovědnou komunikaci s našimi členy a jsme rádi za jakékoliv dotazy a názory.</p>";
$debit_reason_0 = 'Žádný';
$debit_reason_1 = 'Vrátit peníze';
$debit_reason_2 = 'Chargeback';
$debit_reason_3 = 'Podvodné jednání oznámeno';
$debit_reason_4 = 'Zrušená objednávka';
$debit_reason_5 = 'Částečné vrácení peněz';
$menu_drop_pending_debits = 'Čekající platby';
$debit_amount_label = 'Placená částka';
$debit_date_label = 'Datum platby';
$debit_reason_label = 'Důvod platby';
$debit_paragraph = 'Platby budou odečteny z vaší příští výplaty.';
$debit_invoice_amount = 'Mínus odečítaná částka';
$debit_revised_amount = 'Revidovaná vyplácená částka';
$mv_head_description = 'Poznámka: Můžete umístit pouze jedno video na každou stránku.';
$mv_head_source_code = 'vložte tento kód do sekce HEAD Vašeho HTML dokumentu.';
$mv_body_title = 'Titulek Videa';
$mv_body_description = 'Popis';
$mv_body_source_code = 'Vložte tento kód do sekce BODY Vašeho HTML dokumentu tam, kde si přejete umístit video.';
$menu_marketing_videos = 'Videa';
$mv_preview_button = 'Ukázka Videa';
$dt_no_data = 'Žádná data nejsou k dispozici v tabulce.';
$dt_showing_exists = 'Zobrazuji _START_ do _END_ z _TOTAL_ záznamů.';
$dt_showing_none = 'Zobrazuji 0 do 0 z 0 záznamů.';
$dt_filtered = '(filtrováno z _MAX_ celkových záznamů)';
$dt_length_choice = 'Zobraz _MENU_ položky.';
$dt_loading = 'Nahrávám...';
$dt_processing = 'Zpracovávám...';
$dt_no_records = 'Žádné odpovídající záznamy nenalezeny.';
$dt_first = 'První';
$dt_last = 'Poslední';
$dt_next = 'Další';
$dt_previous = 'Predchozí';
$dt_sort_asc = ': aktivujte pro setřídění sloupečku vzestupně';
$dt_sort_desc = ': aktivujte pro setřídění sloupečku sestupně';
$choose_marketing_group = 'Vybrat marketingovou skupinu';
$email_already_used_1 = 'Účet nemůže být vytvořen. Umožňujeme pouze';
$email_already_used_2 = 'účet';
$email_already_used_3 = 'na každou emailovou adresu.';
$missing_fax = 'Prosím vložte své faxové číslo.';
$chart_last_6_months = 'Zaplacené provize během posledních 6 měsíců';
$chart_last_6_months_paid = 'Zaplacené provize';
$chart_this_month = 'Top 5 členů tento měsíc';
$chart_this_month_none = 'Žádná data k zobrazení.';
$login_return = 'Zpět na členskou domovskou stránku';
$login_lost_details = 'Vložte své uživatelské jméno a my Vám zašleme email s Vašimi přihlašovacími údaji.';
$account_edit_general_prefs = 'Všeobecná nastavení';
$account_edit_email_language = 'Jazyk emailu';
$footer_connect = 'spojte se s námi';
$modal_close = 'Zavřít';
$vat_amount_heading = 'Částka DPH';
$menu_logout = 'Odhlásit se';
$menu_upload_picture = 'Vložit vlastní fotografii';
$menu_offer_testi = 'Nabídněte svědectví';
$fb_login = 'Přihlašte se za pomocí Facebook účtu';
$fb_permissions = 'Práva nebyla přidělěna. Prosím povolte webovské stránce použít Vaši emailovou adresu.';
$announcements_published = "Oznámení publikováno";
$training_videos_title = "Výuková videa";
$training_videos_general = "Obecný Marketing";
$commission_method = "Provizní metoda";
$how_will_you_earn = "Jak budete získávat provize?";
$pm_account_credit = "Připíšeme Vám na účet částku, kterou jste získali na provizích.";
$pm_check_money_order = "Zašleme Vám šek/peněžní poukaz poštou.";
$pm_paypal = "Zašleme Vám PayPal platbu.";
$pm_stripe = "Zašleme Vám Stripe platbu.";
$pm_wire = "Zašleme Vám peníze převodem.";
$add_to_signup_left_column_text = "<span style=\"color:#CC0000; font-style:italic;\">* znamená povinný údaj.</span>";
$paypal_email = "Paypal Email";
$stripe_acct_details = "Údaje o Stripe účtu";
$stripe_connect = "Můžete se připojit ke svému stripe účtu ze stránky Nastavení po přihlášení.";
$stripe_success = "Připojení účtu Stripe proběhlo v pořádku";
$stripe_settings = "Stripe nastavení";
$stripe_connect_edit = "Připojte se se Stripe";
$stripe_delete = "Smazat Stripe účet";
$stripe_confirm = "Jste si jisti, že chcete zrušit tento účet?";
$payment_settings = "Nastavení plateb";
$edit_payment_settings = "Změnit nastavení plateb";
$invalid_paypal_address = "neplatná Paypal emailová adresa.";
$payment_method_error = "Prosím vyberte platební metodu.";
$payment_settings_updated = "nastavení plateb uloženo.";
$stripe_removed = "Stripe ůčet odstraněn.";
$payment_settings_success = "Úspěch!";
$payment_update_notice_1 = "Poznámka!";
$payment_update_notice_2 = "Zvolil-a jste si, že od nás budete dostávat <strong>[payment_option_here]</strong> platby. Prosím <a href=\"account.php?page=48\" style=\"font-weight:bold;\">klikněte zde</a> a připojte se ke svému <strong>[payment_option_here]</strong> účtu.";
$pm_title_credit = "Kreditní účet";
$pm_title_mo = "Šek/peněžní poukázka";
$pm_title_paypal = "PayPal";
$pm_title_stripe = "Stripe";
$pm_title_wire = "Bankovní převod";
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