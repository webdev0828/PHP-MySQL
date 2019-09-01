<?PHP

//-------------------------------------------------------
	  $language_pack_name = "polish";
	  $language_pack_table_name = "polish";
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
$header_title = "Program Partnerski";
$header_indexLink = "Strona główna Programu Partnerskiego";
$header_signupLink = "Zapisz się teraz";
$header_accountLink = "Zarządzaj Kontem";
$header_emailLink = "Skontaktuj się z nami";
$header_greeting = "witamy";
$header_nonLogged = "gość";
$header_logout = "Wyloguj się tutaj";
$footer_tag = "Oprogramowanie programu partnerskiego dzięki iDevAffiliate";
$footer_copyright = "Prawa autorskie";
$footer_rights = "Wszystkie prawa zastrzeżone";
$index_heading_1 = "Witamy w naszym Programie Partnerskim!";
$index_paragraph_1 = "Wstąpienie do naszego programu jest darmowe, łatwo jest się do niego zapisąć i nie wymaga to żadnej wiedzy technicznej. Programy partnerskie są powszechne w internecie i oferują właścicielom stron internetowych dodatkowy sposób na zysk z ich stron internetowych. Partnerzy generują ruch na stronach komercyjnych, a w zamian otrzymuja prowizje.";
$index_heading_2 = "Jak to działa?";
$index_paragraph_2 = "Gdy dołączysz do naszego programu partnerskiego, dostarczane Ci będą różne banery i linki tekstowe, które można umieścić w witrynie. Gdy użytkownik kliknie na jeden z linków, zostanie przeniesiony na naszą stronę internetową, a ich działania będą śledzone przez oprogramowanie programu partnerskiego. Otrzymasz prowizje w zależności od Twojego typu prowizji.";
$index_heading_3 = "Statystyki w czasię rzeczywistym i raportowanie!";
$index_paragraph_3 = "Loguj się 24 godziny na dobę, aby sprawdzić swoją sprzedaż, ruch, stan konta i zobaczyć, jak radzą sobie twoje banery.";
$index_login_title = "Logowanie Partnera";
$index_login_username = "Nazwa użytkownika";
$index_login_password = "hasło";
$index_login_username_field = "nazwa użytkownika";
$index_login_password_field = "hasło";
$index_login_button = "Zaloguj się";
$index_login_signup_link = "Kliknij tutaj, aby zapisąć się";
$index_table_title = "szczegóły programu";
$index_table_commission_type = "Rodzaj prowizji";
$index_table_initial_deposit = "Depozyt początkowy";
$index_table_requirements = "Wymagania dotyczące wypłat";
$index_table_duration = "CZas trwania wypłat";
$index_table_choose = "Wybierz z nastepujacych opcji wypłat!";
$index_table_sale = "płać-za-sprzedaż";
$index_table_click = "płać-za-kliknięcie";
$index_table_sale_text = "za każdą dostarczoną sprzedaż.";
$index_table_click_text = "za każde dostarczone kliknięcie.";
$index_table_deposit_tag = "Tylko za zapisąnie się!";
$index_table_requirements_tag = "Minimalna kwota wymagana do dokonania wypłaty.";
$index_table_duration_tag = "Przez pierwszy miesiąc płatności są dokonywane raz w miesiącu.";
$signup_left_column_text = "Dołącz do naszego programu partnerskiego i zacznij zarabiać pieniądze za każdą poleconą przez Ciebie sprzedaż! Po prostu utwórz konto, umieść kod z linkiem na swojej stronie i obserwuj, jak rośnie stan twojego konta, gdy Twoi odwiedzający stają się naszymi klientami.";
$signup_left_column_title = "Witaj Partnerze!";
$signup_login_title = "Utwórz swoje konto";
$signup_login_username = "Nazwa użytkownika";
$signup_login_password = "hasło";
$signup_login_password_again = "Powtórz hasło";
$signup_login_minmax_chars = "- Nazwa użytkownika musi się składać z przynajmniej user_min_chars znaków.&lt;br /&gt;- Nazwa użytkownika może być alfanumeryczna.&lt;br /&gt;- Nazwa użytkownika może zawierać następujące znaki: _ (tylko podkreślniki)&lt;br /&gt;&lt;br /&gt;- Hasło musi się składać z przynajmniej pass_min_chars znaków.&lt;br /&gt;- Hasło może być alfanumeryczne.&lt;br /&gt;- Hasło może zawierać następujące znaki:  characters_allowed";
$signup_login_must_match = "Wprowadzone znaki muszą być zgodne ze znakami wprowadzonymi w haśle.";
$signup_standard_title = "Standardowe informacje";
$signup_standard_email = "Adres e-mail";
$signup_standard_company = "Nazwa firmy";
$signup_standard_checkspayable = "Płatnosci na";
$signup_standard_weburl = "Adres strony internetowej";
$signup_standard_taxinfo = "NIP,Numer Ubezpieczenia Społecznego lub numer VAT";
$signup_personal_title = "Dane osobowe";
$signup_personal_fname = "Imię";
$signup_personal_state = "Stan lub region";
$signup_personal_lname = "Nazwisko";
$signup_personal_phone = "Numer telefonu";
$signup_personal_addr1 = "Adres";
$signup_personal_fax = "Faks";
$signup_personal_addr2 = "Dodatkowy adres";
$signup_personal_zip = "Kod pocztowy";
$signup_personal_city = "Miasto";
$signup_personal_country = "Kraj";
$signup_commission_title = "Płatność prowizji";
$signup_commission_howtopay = "W jaki sposób będziemy Ci płacić?";
$signup_commission_style_PPS = "płać-za-sprzedaż";
$signup_commission_style_PPC = "płać-za-kliknięcie";
$signup_terms_title = "Regulamin";
$signup_terms_agree = "Zapoznalem się, zrozumiałem i zgadzam się powyższym regulaminem.";
$signup_page_button = "Utwórz konto";
$signup_success_email_comment = "Wysłaliśmy do Ciebie e-mail z Twoją nazwą użytkownika i hasłem.<BR />\r\nPowinienes zachować je w bezpiecznym miejscu dla wykorzystania w przyszłości.";
$signup_success_login_link = "Zaloguj się na swoje konto";
$custom_fields_title = "Pola zdefiniowane przez użytkownika";
$logout_msg = "<b>Jestes teraz wylogowany</b><BR />Dziękujemy za udział w naszym programie partnerskim.";
$signup_page_success = "Twoje konto zostalo utworzone";
$login_left_column_title = "Logowane do Konta";
$login_left_column_text = "Wprowadź swoją nazwę użytkownika, aby uzyskać dostęp do swoich statystyk, banerów, kodów wiazacych, FAQ i więcej.<BR/ ><BR/ >jeśli nie pamietasz swojego hasła, wprowadź swoją nazwę użytkownika, a wyślemy Ci informacje do logowania przez e-mail.<BR /><BR />";
$login_title = "Zaloguj się do swojego konta";
$login_username = "Nazwa użytkownika";
$login_password = "hasło";
$login_invalid = "Błędna nazwa użytkownika";
$login_now = "Zaloguj się do mojego konta";
$login_send_title = "Potrzebujesz swoje hasło?";
$login_send_username = "Nazwa użytkownika";
$login_send_info = "szczegóły logowania zostały przesłane na skrzynkę mailową";
$login_send_pass = "Wyslij na e-mail";
$login_send_bad = "Nie znaleziono nazwy użytkownika";
$help_new_password_heading = "Nowe hasło";
$help_new_password_info = "Twoje hasło musi się składać z przynajmniej pass_min_chars znaków. Może zawierać jedynie litery, cyfry i następujące znaki:  characters_allowed";
$help_confirm_password_heading = "Potwierdź nowe hasło";
$help_confirm_password_info = "Wprowadzone znaki hasla muszą być zgodne z nowym hasłem.";
$help_custom_links_heading = "Śledzenie słów kluczowych";
$help_custom_links_info = "Twoje słowo kluczowe nie może mieć więcej niż 30 znaków długości. może zawierac jedynie litery, cyfry i laczniki.";
$error_title = "Wykryto nastepujace bledy";
$username_invalid = "Nieprawidłowa nazwa użytkownika. Może się składać jedynie z liter, cyfr i podkreślników.";
$username_taken = "Wybrana nazwa użytkownika jest juz zajeta.";
$username_short = "Twoja nazwa użytkownika jest zbyt krótka, musi ona zawierac nie mniej niż user_min_chars znaków.";
$username_long = "Twoja nazwa użytkownika jest zbyt długa, musi ona zawierac nie więcej niż user_max_chars znaków.";
$password_invalid = "Nieprawidłowe hasło. Może się składać jedynie z liter, cyfr i następujących znaków:  characters_allowed";
$password_short = "Twoje hasło jest zbyt krótkie, musi ono zawierac nie mniej niż pass_min_chars znaków.";
$password_long = "Twoje hasło jest zbyt długie, musi ono zawierac nie więcej niż pass_max_chars znaków.";
$password_mismatch = "Twoje wpisy hasla nie pasują do siebie.";
$missing_checks = "Proszę podac nazwe odbiorcy płatności, aby umożliwić wykonanie płatności.";
$missing_tax = "Proszę wprowadzic swój NIP, Numer Ubezpieczenia Społecznego lub numer VAT.";
$missing_fname = "Proszę wpisąc imię.";
$missing_lname = "Proszę wpisąc nazwisko.";
$missing_email = "Proszę podac adres e-mail.";
$invalid_email = "Twój adres e-mail jest nieprawidlowy.";
$missing_address = "Proszę wprowadzic adres.";
$missing_city = "Proszę wprowadzic miasto.";
$missing_company = "Proszę podac nazwe firmy.";
$missing_state = "Proszę podac stan lub region.";
$missing_zip = "Proszę podac kod pocztowy.";
$missing_phone = "Proszę podac numer telefonu.";
$missing_website = "Proszę podac adres swojej strony internetowej.";
$missing_paypal = "Wybrales/as otrzymywanie płatności przez PayPal, Proszę podać konto PayPal.";
$missing_terms = "Nie zaakceptowałeś/aś naszego regulaminu.";
$paypal_required = "Konto PayPal jest wymagane dla płatności.";
$missing_custom = "Proszę uzupełnić pola nazwane:";
$account_total_transactions = "Wszystkie transakcje";
$account_standard_linking_code = "Standardowy kod łączący - Wspaniały do użycia w e-mailach!";
$account_copy_paste = "Skopiuj/Wklej powyższy kod na swoją stronę internetową lub do wiadomosci e-mail";
$account_not_approved = "Twoje konto oczekuje teraz na akceptacje";
$account_suspended = "Twoje konto jest aktualnie zawieszone";
$account_standard_earnings = "Standardowe zyski";
$account_inc_bonus = "zawiera bonus";
$account_second_tier = "Poziomuj zyski";
$account_recurring = "Cykliczne zyski";
$account_not_available = "nie dostępne";
$account_earned_todate = "Łączne zyski dotychczas";
$menu_heading_overview = "Przegląd konta";
$menu_general_stats = "Łączne statystyki";
$menu_tier_stats = "Poziomuj statystyki";
$menu_payment_history = "Historia płatności";
$menu_commission_details = "szczegóły prowizji";
$menu_recurring_commissions = "Cykliczne prowizje";
$menu_traffic_log = "Ruch przychodzący";
$menu_heading_marketing = "Materiały marketingowe";
$menu_banners = "Banery";
$menu_text_ads = "Reklamy tekstowe";
$menu_text_links = "Linki tekstowe";
$menu_email_links = "Linki mailowe";
$menu_html_links = "Reklamy HTML";
$menu_offline = "Marketing offline";
$menu_tier_linking_code = "Poziomuj kody łączące";
$menu_email_friends = "Wyślij e-mail do znajomych &amp; współpracowników";
$menu_custom_links = "Utwórz &amp; śledzenia swoich linków";
$menu_heading_management = "Zarządzanie kontem";
$menu_comalert = "Ustawienia powiadomień o prowizjach";
$menu_comstats = "Ustawienia statystyk prowizji";
$menu_edit_account = "Edytuj konto";
$menu_change_pass = "Zmień hasło";
$menu_change_commission = "Zmień mój typ prowizji";
$menu_heading_general_info = "Ogólne informacje";
$menu_browse_affiliates = "Przeglądaj innych partnerów";
$menu_faq = "Często zadawane pytania";
$suspended_title = "Powiadomienie o statusię konta";
$suspended_heading = "Twoje konto jest aktualnie zawieszone";
$suspended_notes = "Uwagi Administratora";
$pending_title = "Powiadomienie o statusię konta";
$pending_heading = "Twoje konto jest teraz w trakcie zatwierdzania";
$pending_note = "Kiedy zatwierdzimy Twoje konto, materiały marketingowe staną się dla Ciebie dostepne.";
$faq_title = "Często zadawane pytania";
$faq_none = "Nie ma jeszcze często zadawanych pytań";
$browse_title = "Przeglądaj innych partnerów";
$browse_none = "Nie ma innych partnerów do pokazania";
$change_comm_title = "Zmień typ prowizji";
$change_comm_curr_comm = "Aktualny typ prowizji";
$change_comm_curr_pay = "Obecny poziom wypłat";
$change_comm_new_comm = "Nowy typ prowizji, Twoje konto zostanie zresetowane do poziomu wypłat 1";
$change_comm_button = "Zmień typ prowizji";
$change_comm_warning = "Jesli zmienisz style prowizji, Twoje konto zostanie zresetowane do Poziomu Platnosci 1";
$change_comm_no_other = "Nie ma dostepnych innych typów prowizji";
$change_comm_level = "Poziom";
$change_comm_updated = "Typ prowizji zaktualizowany";
$password_title = "Zmien hasło";
$password_old_password = "Stare hasło";
$password_new_password = "Nowe hasło";
$password_confirm_password = "Potwierdź nowe hasło";
$password_button = "Zmieź hasło";
$password_warning_old_missing = "Stare hasło jest niepoprawne lub brakujace";
$password_warning_new_missing = "Nie wprowadzono nowego hasła";
$password_warning_mismatch = "Nowe hasło nie pasuje";
$password_warning_invalid = "hasło niepoprawne - Idź do pomocy";
$password_notice = "Hasło zostało zaktualizowane";
$edit_failed = "Aktualizacja nie powiodła się - Zobacz błędy";
$edit_success = "Konto zaktualizowane";
$edit_button = "Edytuj moje konto";
$commissionstats_title = "Ustawienia statystyk prowizji";
$commissionstats_info = "Instalując prowizjetats możesz natychmiast sprawdzić swoje statystyki, prosto z Pulpitu Windows!Aby zainstalować, pobierz CommissionStats i <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>unzip</b></a> zapisz go na dysku oraz uruchom plik <b>setup.exe</b>. Po prośbie o podanie danych logowania wpisz:";
$commissionstats_hint = "Wskazówka: Używaj opcji Kopiuj/Wklej w celu zapewnienia poprawności";
$commissionstats_profile = "Profile Name";
$commissionstats_username = "Nazwa użytkownika";
$commissionstats_password = "Hasło";
$commissionstats_id = "ID partnera";
$commissionstats_source = "URL źródła";
$commissionstats_download = "Pobierz CommissionStats";
$commissionalert_title = "Ustawienia CommissionAlert";
$commissionalert_info = "Przez instalację CommissionAlert będziemy informować Cię na bieżąco o nowych prowizjach na Twoim pulpicie Windowsa!Aby to zainstalować pobierz CommissionAlert i <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>rozpakuj</b></a> na swoim dysku, a następnie włącz plik<b>setup.exe</b>. Kiedy zostaniesz poproszony o swój login, wprowadź te informacje.";
$commissionalert_hint = "Wskazówka: Kopiuj i wklej wszystkie wprowadzenia, aby nie popełnić błędu";
$commissionalert_profile = "Nazwa profilu";
$commissionalert_username = "Nazwa użytkownika";
$commissionalert_password = "Hasło";
$commissionalert_id = "Identyfikator partnera";
$commissionalert_source = "Ścieżka źródłowa URL";
$commissionalert_download = "Pobierz CommissionAlert";
$offline_title = "Marketing offline";
$offline_paragraph_one = "Zarabiaj przez promocję naszej strony (offline) wśród swoich znajomych i współpracowników!";
$offline_send = "Wyślij klientów do";
$offline_page_link = "przegląd strony";
$offline_paragraph_two = "Twoi klienci wprowadzą twój <b>indentyfikator partnera</b> do okienka na górze strony. co zapisze Cię jako Parntera dla każdego zakupu, którego dokonają.";
$banners_title = "Banery";
$banners_size = "Rozmiar baneru";
$banners_description = "Opis baneru";
$ad_title = "Reklamy tekstowe";
$ad_info = "Używając dołączonego kodu łączącego, możesz dopasować kolor, wysokość i szerokość swojej reklamy tekstowej.";
$links_title = "Nazwa linku";
$email_title = "Linki mailowe";
$email_group = "Grupy marketingowe";
$email_button = "Wyświetl linki mailowe";
$email_no_group = "Nie wybrano grupy";
$email_choose = "Pproszę wybrać grupę marketingową tutaj";
$email_notice = "Grupy marketingowe mogą mieć różny ruch przychodzący na stronach";
$email_ascii = "<b>ASCII/WErsja tekstowa</b> - do użycia w e-mailach ze zwykłym tekstem.";
$email_html = "<b>Wersja HTML</b> - do użycia w e-mailach formatowanych HTML.";
$email_test = "Link testowy";
$email_test_info = "Tutaj zostaną przesłani Twoi klienci na naszej stronie.";
$email_source = "Kod źródłowy - Kopiuj/wklej do swojej wiadomości e-mail";
$html_title = "Nazwa reklamy HTML";
$html_view_link = "Zobacz tę reklamę HTML";
$traffic_title = "Ruch przychodzący";
$traffic_display = "Wyświetl ostatni";
$traffic_display_visitors = "Odwiedzający";
$traffic_button = "Zobacz ruch";
$traffic_title_details = "Szczegóły ruchu";
$traffic_ip = "Adres IP";
$traffic_refer = "Odnoszące się URL";
$traffic_date = "Data";
$traffic_time = "Czas";
$traffic_bottom_tag_one = "Wyświetlanie ostatniego";
$traffic_bottom_tag_two = "z";
$traffic_bottom_tag_three = "Wszyscy pojedyńczy odwiedzający";
$traffic_none = "Nie ma ruchu";
$traffic_no_url = "Nie dotyczy - Możliwe Zakładki lub Łącza e-mailowe";
$traffic_box_title = "Całe odpowiadające URL";
$traffic_box_info = "Kliknij na link, aby odwiedzić stronę internetową";
$payment_title = "Historia płatności";
$payment_date = "Data płatności";
$payment_commissions = "Prowizje";
$payment_amount = "Kwota płatności";
$payment_totals = "Łącznie";
$payment_none = "Nie ma historii płatności";
$tier_stats_title = "Statystyki poziomowania";
$tier_stats_accounts = "Poziomuj konta bezpośrednio pod Tobą";
$tier_stats_grab_link = "Chwyć swój poziomujący kod łączący";
$tier_stats_none = "Brak kont poziomowych";
$tier_stats_username = "Nazwa użytkownika";
$tier_stats_current = "Obecne prowizje";
$tier_stats_previous = "Wcześniejsze wypłaty";
$tier_stats_totals = "Łącznie";
$recurring_title = "Cykliczne prowizje";
$recurring_none = "Nie ma prowizji cyklicznych";
$recurring_date = "Data prowizji";
$recurring_status = "Stan cyklicznych";
$recurring_payout = "Następna wypłata";
$recurring_amount = "Ilość";
$recurring_every = "Każde";
$recurring_in = "W";
$recurring_days = "Dni";
$recurring_total = "Łącznie";
$tlinks_title = "Dodaj innych do swoich poziomowych i zarabiaj pieniądze również na nich!";
$tlinks_embedded_one = "Kredytowanie zapisów poziomowych jest już aktywne w twoich standardowych linkach partnerskich!";
$tlinks_embedded_two = "Używanie systemu poziomowania pozwala Ci rozpowszechnić nasz program partnerski wśród innych ludzi. Znajdziesz się na górnym poziomie wobec każdego, kto dołączy do naszego programu partnerskiego przez Twój specjalny link referencyjny poniżej. Informacje o tym, ile możesz na tym zarobić znajdują się poniżej.";
$tlinks_embedded_current = "Obecne wypłaty z poziomowania";
$tlinks_forced_two = "Używanie systemu poziomowania pozwala Ci rozpowszechnić nasz program partnerski wśród innych ludzi. Znajdziesz się na górnym poziomie wobec każdego, kto dołączy do naszego programu partnerskiego przez Twój specjalny link referencyjny poniżej. Informacje o tym, ile możesz na tym zarobić znajdują się poniżej.";
$tlinks_forced_code = "Poziomuj linki referencyjne";
$tlinks_forced_paste = "Kopiuj/Wklej poniższy kodna swoją stronę internetową";
$tlinks_forced_money = "Webmasterzy zarabiają pieniądze tutaj!";
$comdetails_title = "Szczegóły prowizji";
$comdetails_date = "Data prowizji";
$comdetails_time = "CZas prowizji";
$comdetails_type = "Typ prowizji";
$comdetails_status = "Obecny stan";
$comdetails_amount = "Wielkość prowizji";
$comdetails_additional_title = "Dodatkowe szczegóły prowizji";
$comdetails_additional_ordnum = "Numer zamówienia";
$comdetails_additional_saleamt = "Wielkość sprzedaży";
$comdetails_type_1 = "Dodatkowa prowizja";
$comdetails_type_2 = "Prowizje cykliczne";
$comdetails_type_3 = "Prowizja poziomowa";
$comdetails_type_4 = "Standardowa prowizja";
$comdetails_status_1 = "Zapłacone";
$comdetails_status_2 = "Zatwierdzone - płatność oczekująca";
$comdetails_status_3 = "Oczekujące na zatwierdzenie";
$comdetails_not_available = "Nie dotyczy";
$details_title = "Szczegóły prowizji";
$details_drop_1 = "Obecne standardowe prowizje";
$details_drop_2 = "Obecne prowizje poziomowe";
$details_drop_3 = "Prowizje oczekujące na zatwierdzenie";
$details_drop_4 = "Zapłacone standardowe prowizje";
$details_drop_5 = "Zapłacone poziomowe prowizje";
$details_button = "Zobacz prowizje";
$details_date = "Data";
$details_status = "Stan";
$details_commission = "Prowizja";
$details_details = "Zobacz szczegóły";
$details_type_1 = "Zapłacone";
$details_type_2 = "Oczekujące na zatwierdzenie";
$details_type_3 = "Zatwierdzone - płatność oczekująca";
$details_none = "Brak prowizji do wyświetlenia";
$details_no_group = "Nie wybrano grupy prowizji";
$details_choose = "Proszę wybrać grupę prowizji poniżej";
$general_title = "Obecne prowizje - Od ostatniej płatności dotychczas";
$general_transactions = "Transakcje";
$general_earnings_to_date = "Zarobione dotychczas";
$general_history_link = "Zobacz historię płatności";
$general_standard_earnings = "Standardowe zarobki";
$general_current_earnings = "Obecne zarobki";
$general_traffic_title = "Statystyki ruchu";
$general_traffic_visitors = "Odwiedzający";
$general_traffic_unique = "Pojedyńczy odwiedzający";
$general_traffic_sales = "Zatwierdzone sprzedaże";
$general_traffic_ratio = "Współczynnik sprzedaży";
$general_traffic_info = "Te statystyki nie obejmują prowizji oczekujących ani poziomowych.";
$general_traffic_pay_type = "Typ płatności";
$general_traffic_pay_level = "Obecny poziom płatności";
$general_notes_title = "Uwagi administratora";
$general_notes_date = "Data utworzenia";
$general_notes_to = "Do";
$general_notes_all = "Wszyscy Partnerzy";
$general_notes_none = "Brak uwag do wyświetlenia";
$contact_left_column_title = "Skontaktuj się z nami";
$contact_left_column_text = "Prosimy o kontakt z naszym menedżerem partnerów używając formularza z prawej strony.";
$contact_title = "Skontaktuj się z nami";
$contact_name = "Twoje imię";
$contact_email = "Twój adres e-mail";
$contact_message = "Wiadomość";
$contact_chars = "znaków pozostało";
$contact_button = "Wyślij wiadomość";
$contact_received = "Otrzymaliśmy Ywoją wiadomość, odpowiemy na nią w ciągu 24 godzin.";
$contact_invalid_name = "Błędna nazwa";
$contact_invalid_email = "Błędny adres e-mail";
$contact_invalid_message = "Błędna wiadomość";
$invoice_button = "Faktura";
$invoice_header = "FAKTURA PŁATNOŚCI PARTNERSKICH";
$invoice_aff_info = "Informacja parnterów";
$invoice_co_info = "Informacja";
$invoice_acct_info = "Informacje o koncie";
$invoice_payment_info = "Informacje o płatności";
$invoice_comm_date = "Data płatności";
$invoice_comm_amt = "Wielkość prowizji";
$invoice_comm_type = "Typ prowizji";
$invoice_admin_note = "Uwaga administratora";
$invoice_footer = "KONIEC FAKTURY";
$invoice_print = "Drukuj fakturę";
$invoice_none = "Nie dotyczy";
$invoice_aff_id = "Identyfikator Partnera";
$invoice_aff_user = "Nazwa użytkownika";
$menu_pdf_marketing = "Broszury marketingowe w PDF";
$menu_pdf_training = "Dokumenty treningowe w PDF";
$marketing_target_url = "Docelowy adres URL";
$marketing_source_code = "Kod źródłowy - Kopiuj/Wklej na swoją stronę internetową";
$marketing_group = "Grupa marketingowa";
$peels_title = "Nazwa skórki strony";
$peels_view = "Zobacz tę skórkę";
$peels_description = "Opis skórki";
$lb_head_title = "Wymagany kod GŁÓWNY dla Twojej strony HTML";
$lb_head_description = "W celu wykorzystania lighboxa na swojej stronie, musisz dodać następujące wiersze w głównej sekcji strony, jeśli chcesz, żeby był wyświetlony.";
$lb_head_source_code = "Wklej ten kod do sekcji głównej swojego dokumentu HTML.";
$lb_head_code_notes = "Musisz umieścić ten  kod tylko jeden raz, niezależnie od tego, ile lightboxów umieszczasz na stronie.";
$lb_head_tutorial = "Zobacz samouczek";
$lb_body_title = "Nazwa lightboxa";
$lb_body_description = "Opis lightboxa";
$lb_body_click = "Kliknij na poniższy obraz, aby zobaczyć lighboxa.";
$lb_body_source_code = "Wklej ten kod w sekcji TREŚCI swojego dokumentu HTML tam, gdzie chcesz, żeby obraz się pojawił.";
$pdf_title = "PDF";
$pdf_training = "Dokumenty treningowe";
$pdf_marketing = "Broszury marketingowe";
$pdf_description_1 = "Aby zobaczyć i wydrukować nasze materiały marketingowe konieczny jest Adobe Reader.";
$pdf_description_2 = "Adobe Reader można pobrać za darmno na stronie Adobe.";
$pdf_file_name = "Nazwa pliku";
$pdf_file_size = "Rozmiar pliku";
$pdf_file_description = "Opis";
$pdf_bytes = "Bajtów";
$menu_heading_training_materials = "Materiały treningowe";
$menu_videos = "Obejrzyj filmy treningowe";
$menu_custom_manual = "Instrukcja Linki Śledzące Klientów";
$menu_page_peels = "Page Peels";
$menu_lightboxes = "Lightboxy";
$menu_email_templates = "Templaty Email";
$menu_heading_custom_links = "Linki Śledzące Klientów";
$menu_custom_reports = "Raporty";
$menu_keyword_links = "Śledzenie słów kluczowych";
$menu_subid_links = "Linki śledzące podpartnerów";
$menu_alteranate_links = "Linki Alternate Incoming Page";
$menu_heading_additional = "Dodatkowe narzędzia";
$menu_drop_heading_stats = "Ogólne statystyki";
$menu_drop_heading_commissions = "Prowizje";
$menu_drop_heading_history = "Historia płatności";
$menu_drop_heading_traffic = "Log ruchu";
$menu_drop_heading_account = "Moje konto";
$menu_drop_heading_logo = "Wyślij moje logo";
$menu_drop_heading_faq = "FAQ";
$menu_drop_general_stats = "Ogólne statystyki";
$menu_drop_tier_stats = "Statystyki rzędów";
$menu_drop_current = "Aktualne prowizje";
$menu_drop_tier = "Aktualne prowizje rzędów";
$menu_drop_pending = "Oczekuje na zatwierdzenie";
$menu_drop_paid = "Zapłacone prowizje";
$menu_drop_paid_rec = "Zapłacone prowizje rzędów";
$menu_drop_recurring = "Aktywne powtarzalne prowizje";
$menu_drop_edit = "Edytuj moje konto";
$menu_drop_password = "Zmień hasło";
$menu_drop_change = "Zmień rodzaj prowizji";
$account_hidden = "ukryte";
$keyword_title = "Niestandardowe linki słów kluczowych";
$keyword_info = "Tworzenie niestandardowych słów kluczowych, zapewnia możliwość śledzenia ruchu przychodzącego z różnych źródeł. Stwórz powiązania z maksymalnie 4 słowami kluczowymi, a raport śledzenia pokaże szczegółowy raport dla każdego słowa kluczowego.";
$keyword_heading = "Dostępne zmienne w Śledzeniu słów kluczowych";
$keyword_tracking = "ID śledzące";
$keyword_build = "Aby zbudować link weź poniższy adres URL i dodaj do niego ID śledzenie i słowo kluczowe którego chcesz użyć.";
$keyword_example = "Przykład";
$keyword_tutorial = "Obejrzyj tutorial";
$sub_tracking_title = "Śledzenie podpartnerów";
$sub_tracking_info = "Tworzenie linków podpartnerskich zapewnia zdolność przesłania twojego linku partnerskiego do twoich partnerów. Będziesz wiedzieć kto generuje prowizje ponieważ będziemy zgłaszać do Ciebie, którzy z podpartnerów tworzą sprzedaż. Kolejny powód aby korzystać z linków podparnerskich to włączenie ich do systemów raportowania.";
$sub_tracking_build = "Zastąp XXX przez ID partnera w programie partnerskim. Powtórz proces dla wszystkich partnerów.";
$sub_tracking_example = "Przykład";
$sub_tracking_tutorial = "Obejrzyj tutorial";
$sub_tracking_id = "ID podpartnera";
$alternate_title = "Linki alternatywnych stron przychodzących";
$alternate_option_1 = "Opcja 1: automatyczne tworzenie linków";
$alternate_heading_1 = "Automatyczne tworzenie linków";
$alternate_info_1 = "Zdefiniować własną stronę przychodzącego ruchu wpisując adres URL do którego ma być dostarczany ruch, a my utworzymy dla Ciebie linka. Korzystanie z tej funkcji da krótszy link do użycia z wbudowanym URL za pomocą numeru ID w naszej bazie danych.";
$alternate_button = "Stwórz mój link";
$alternate_links_heading = "Moje alternatywne URL stron przychodzących";
$alternate_links_note = "Istniejące linki pozostaną działające jeżeli usuniesz link z tej strony.";
$alternate_links_remove = "usuń";
$alternate_option_2 = "Opcja 2: ręczne tworzenie linków";
$alternate_info_2 = "Jeśli wolisz sam dodać linki partnerów do URL, wykorzystaj poniższą strukturę.";
$alternate_variable = "Zmienne alternatywnych URL stron przychodzących ";
$alternate_example = "Przykład";
$alternate_build = "Aby utworzyć link weź poniższe URL i dodaj URL strony przychodzącej który chcesz wykorzystać.";
$alternate_none = "Nie utworzono alternatywnych stron przychodzących";
$alternate_tutorial = "Obejrzyj tutorial";
$cr_title = "Raport wybranych słów kluczowych";
$cr_select = "Wybierz słowo kluczowe";
$cr_button = "Generuj raport";
$cr_no_results = "Nie znaleziono wyników wyszukiwania";
$cr_no_results_info = "Spróbuj innej kombinacji słów kluczowych";
$cr_used = "Użyte słowa kluczowe";
$cr_found = "Znalezione linki";
$cr_times = "Ilość";
$cr_unique = "Znalezione unikatowe linki";
$cr_detailed = "Szczegółowy raport linków";
$cr_export = "Eksportuj raport do Excela";
$cr_none = "Nie znaleziono słów kluczowych";
$logo_title = "Wyślij logo firmy";
$logo_info = "Jeśli chcesz przesłać logo firmy to pokażemy je klientom na naszej stronie internetowej. Pozwala nam to spersonalizować wizytę klienta kiedy nas odwiedza.";
$logo_bullet_one = "Dozwolone formaty to .jpg, .gif i .png. Flash jest niedozwolony.";
$logo_bullet_two = "Nieodpowiednie zdjęcia zostaną usunięte, a konto zawieszone.";
$logo_bullet_three = "Twój obraz / logo nie będzie wyświetlane na naszej stronie internetowej, aż je zatwierdzimy.";
$logo_bullet_size_one = "Obrazy mogą mieć maksymalną szerokość";
$logo_bullet_size_two = "pikseli, a maksymalna wysokość";
$logo_bullet_req_size_one = "Obrazy muszą mieć szerokość";
$logo_bullet_req_size_two = "pikseli i wysokość";
$logo_bullet_pixels = "pikseli.";
$logo_choose = "Wybierz obraz";
$logo_file = "Wybierz plik:";
$logo_browse = "Wybierz...";
$logo_button = "Wyślij";
$logo_current = "Mój obecny obraz";
$logo_remove = "usuń";
$logo_display_status = "Status obrazu:";
$logo_pending = "Oczekuje na zatwierdzenie";
$logo_approved = "Zatwierdzony";
$logo_success = "Obraz został pomyślnie przesłany, a obecnie oczekuje na zatwierdzenie.";
$signup_security_title = "Weryfikacja konta";
$signup_security_info = "Proszę wpisać kod zabezpieczający wskazany w polu. Ten krok pozwala nam uniknąć automatycznych rejestracje.";
$signup_security_code = "Kod zabezpieczający";
$sub_tracking_none = "Brak";
$missing_security_code = "Nieprawidłowe lub brakująca weryfikacja konta/kodu zabezpieczającego";
$alternate_success_title = "Tworzenie linku pomyślne";
$alternate_success_info = "Skopiuj poniższy link i zacznij dostarczać ruch do wybranego URL.";
$alternate_failed_title = "Błąd tworzenia linku";
$alternate_failed_info = "Proszę wpisać poprawne URL.";
$logo_missing_filename = "Proszę wybrać nazwę pliku.";
$logo_required_width = "Szerokość obrazu musi być";
$logo_required_height = "Wysokość obrazu musi być";
$logo_maximum_width = "Szerokość obrazu może być tylko";
$logo_maximum_height = "Wysokość obrazu może być tylko";
$logo_size_maximum = "Rozmiar obrazu może być tylko maksymalnie";
$logo_bad_filetype = "Typ obrazu nie jest dozwolony. Dozwolone typy obrazów to .gif, .jpg and .png.";
$logo_upload_error = "Błąd przesyłania obrazu, proszę o kontakt z menadżerem partnerskim.";
$logo_error_title = "Błąd przesyłania obrazu";
$logo_error_bytes = "bajtów.";
$excel_title = "Raport listy niestandardowych słów kluczowych";
$excel_tab_report = "Raport niestandardowych słów kluczowych";
$excel_tab_logs = "Logi ruchu";
$excel_date = "Data raportu:";
$excel_affiliate = "ID partnera:";
$excel_criteria = "Kryteria linków słów kluczowych";
$excel_link = "Struktura linku";
$excel_hits = "Unikalne trafienia";
$excel_comm_stats = "Statystyki prowizji";
$excel_comm_current = "Obecne prowizje";
$excel_comm_paid = "Zapłacone prowizje";
$excel_comm_total = "Całkowite prowizje";
$excel_comm_ratio = "Wskaźnik konwersji";
$excel_earned = "Uzyskane prowizje";
$excel_earned_current = "Obecne prowizje";
$excel_earned_paid = "Zapłacone prowizje";
$excel_earned_total = "Całkowite uzyskane prowizje";
$excel_earned_tab = "Kliknij zakładkę loga ruchu (poniżej) aby zobaczyć log ruchu dla tego linka.";
$excel_log_title = "Log ruchu wybranych słów kluczowych";
$excel_log_ip = "Adres IP";
$excel_log_refer = "Referujące URL";
$excel_log_date = "Data";
$excel_log_time = "Czas";
$excel_log_target = "Docelowe URL";
$etemplates_title = "Templaty Email";
$etemplates_view_link = "Obejrzyj ten template Email";
$etemplates_name = "Nazwa Templatu";
$signup_maintenance_heading = "Informacja o konserwacji";
$signup_maintenance_info = "Zapisy są tymczasowo wyłączone. Spróbuj ponownie później.";
$marketing_group_title = "Grupa Marketingowa";
$marketing_button = "Pokaż";
$marketing_no_group = "Nie wybrano grup";
$marketing_choose = "Proszę wybrać grupę marketingową powyżej";
$marketing_notice = "Grupy marketingowe mogą mieć różne strony przychodzącego ruchu";
$canspam_heading = "Zasady i akceptacja CAN-SPAM";
$canspam_accept = "Przeczytałem, zrozumiałem i zgadzam się na powyższe zasady CAN-SPAM.";
$canspam_error = "Nie zatwierdziłeś naszych zasad CAN-SPAM.";
$signup_banned = "Wystąpił błąd podczas tworzenia konta. Aby uzyskać więcej informacji prosimy o kontakt z administratorem systemu.";
$header_testimonials = "Komentarze partnerów";
$testi_visit = "Odwiedź stronę";
$testi_description = "Wyślij nam komentarz, a zamieścimy go na &lt;a href=&quot;testimonials.php&quot;&gt;testimonials&lt;/a&gt;z linkiem do twojej strony internetowej.";
$testi_name = "Nazwa";
$testi_url = "URL strony internetowej";
$testi_content = "Testimonial";
$testi_code = "Kod Bezpieczeństwa";
$testi_submit = "Wyślij komentarz";
$testi_na = "Brak dostępnych komentarzy.";
$testi_title = "Zaoferuj komentarz";
$testi_success_title = "Komentarz wysłany pomyślnie";
$testi_success_message = "Dziękujemy za przesłanie komentarza. Nasz zespół niedługo go przeczyta.";
$testi_error_title = "Błąd komentarza";
$testi_error_name_missing = "Załącz swoją nazwę do komentarza.";
$testi_error_url_missing = "Załącz swoje URL do komentarza.";
$testi_error_missing = "Załącz tekst komentarza.";
$menu_drop_delayed = "Opóźnione prowizje";
$details_drop_6 = "Obecne opóźnione prowizje";
$details_type_6 = "Opóźnione - do zatwierdzenia";
$comdetails_status_6 = "Opóźnione - do zatwierdzenia";
$tc_reaccept_title = "Powiadomienie o zmianach warunków korzystania z usługi";
$tc_reaccept_sub_title = "Musisz zatwierdzić nowe warunki korzystania z usługi aby uzyskać dostęp do konta.";
$tc_reaccept_button = "Przeczytałem, zrozumiałem i zgadzam się na powyższe warunki korzystania z usługi.";
$tlinks_active = "Liczba aktywnych rzędów";
$tlinks_payout_structure = "Struktura wypłat rzędów";
$tlinks_level = "Poziom";
$tierText1 = "% wyliczone z prowizji referującego partnera.";
$tierText2 = "% wyliczone z prowizji wyższego rzędu.";
$tierText3 = "% wyliczone z poziomu sprzedaży.";
$tierTextflat = "płaska stawka.";
$edit_custom_button = "Edytuj odpowiedź";
$private_heading = "Prywatne logowanie";
$private_info = "Nasz program partnerski nie jest otwarty dla ogółu i wymaga kodu rejestracyjnego do przyłączenia się. Informacje o tym, jak uzyskać kod są dostępne tutaj.";
$private_required_heading = "Wymagany kod rejestracyjny";
$private_code_title = "Wpisz kod rejestracyjny";
$private_button = "Wyślij kod";
$private_error_title = "Błędy kod rejestracyjny";
$private_error_invalid = "Podano nieprawidłowy kod rejestracyjny.";
$private_error_expired = "Podany kod rejestracyjny wygasł lub jest już nieważny.";
$qr_code_title = "Kody QR";
$qr_code_size = "Rozmiar kodu QR";
$qr_code_button = "Pokaż kod QR";
$qr_code_offline_title = "Marketing Offline";
$qr_code_offline_content1 = "Dodaj ten kod QR do broszur marketingowych, ulotek, wizytówek, itp";
$qr_code_offline_content2 = "- kliknij prawym przyciskiem na tym obrazie i &lt;strong&gt;sąve-as&lt;/strong&gt; na swój komputer.";
$qr_code_online_title = "Online Marketing";
$qr_code_online_content = "Dodaj ten kod QR na swojej stronie internetowej, mediach społecznościowych, blogach, itp";
$menu_coupon = "Kody kuponowe";
$coupon_title = "Dostępne kody kuponowe";
$coupon_desc = "Rozdaj te kody kuponowe się i zarabiaj prowizję za każdym razem gdy ktoś go używa!";
$coupon_head_1 = "Kod kuponowy";
$coupon_head_2 = "Zniżka dla klienta";
$coupon_head_3 = "Poziom twojej prowizji";
$coupon_sale_amt = "z poziomu sprzedaży";
$coupon_flat_rate = "stała stawka";
$coupon_default = "Domyślny poziom wypłaty";
$cc_vanity_title = "Poproś o spersonalizowany kod kuponowy";
$cc_vanity_field = "Kod kuponowy";
$cc_vanity_button = "Poproś o kod kuponowy";
$cc_vanity_error_missing = "<strong>Błąd!</strong> Proszę wprowadzić kod kuponowy.";
$cc_vanity_error_exists = "<strong>Błąd!</strong> Poprosiłeś już o ten kod. Oczekuje on na akceptację.";
$cc_vanity_error = "<strong>Błąd!</strong> Kupon jest nieważny. Proszę używać tylko liter, cyfr i znaków podkreślenia.";
$cc_vanity_success = "<strong>Sukces!</strong> Złożono wniosek o spersonalizowany kod kuponowy.";
$coupon_none = "Brak dostępnych kuponów.";
$pic_error_title = "Błąd przesyłania obrazu";
$pic_missing = "Wybierz nazwę pliku.";
$pic_invalid = "Typ obrazu nie jest dozwolony. Dozwolone typy obrazów to .gif, .jpg i .png.";
$pic_error = "Błąd przesyłania obrazu, skontaktuj się z menedżerem partnerskim.";
$pic_success = "Twój obraz został pomyślnie przesłany.";
$pic_title = "Prześlij swój obraz";
$pic_info = "Wysłanie obrazu pomaga spersonalizować doświadczenia klientów.";
$pic_bullet_1 = "Dozwolone formaty to .jpg, .gif or .png.";
$pic_bullet_2 = "Nieodpowiednie zdjęcia zostaną usunięte, a konto zawieszone.";
$pic_bullet_3 = "Twoje zdjęcie nie będzie udostępniane publicznie. Zostanie on dołączone do konta tylko dla naszego wglądu.";
$pic_file = "Wybierz plik:";
$pic_button = "Wyślij";
$pic_current = "Mój obraz";
$pic_remove = "Usuń obraz";
$progress_title = "Dostępność do następnej wypłaty:";
$progress_complete = "zakończone.";
$progress_none = "Nie mamy minimalnego progu wypłaty.";
$progress_sentence_1 = "Zarobiłeś";
$progress_sentence_2 = "z";
$progress_sentence_3 = "wymaganych.";
$aff_lib_button = "<b>Zdobądź Darmowy Dostęp!</b><BR />www.AffiliateLibrary.com";
$menu_announcements = "Kampanie w mediach społecznościowych";
$announcements_name = "Nazwa kampanii";
$announcements_facebook_message = "Wiadomość Facebook";
$announcements_twitter_message = "Wiadomość Twitter";
$announcements_facebook_link = "Link Facebook";
$announcements_facebook_picture = "Obraz Facebook";
$general_last_30_days_activity = "Ostatnie 30 dni aktywności";
$general_last_30_days_activity_traffic = "Ruch";
$general_last_30_days_activity_commissions = "prowizje";
$accountability_title = "Odpowiedzialność i komunikacja";
$accountability_text = "<strong>Co to jest?</strong><p>Podejmujemy aktywne podejście do tworzenia zaufania u naszych partnerów afiliacyjnych. Naszym celem jest dostarczenie tylu informacji, ile to możliwe w przypadku każdej uzyskanej/odmówionej prowizji istniejącej w naszym systemie.</p><strong>Komunikacja</strong><p>Udostępniamy szczegółowe informacje na temat każdej odmówionej prowizji. Wierzymy w dokładną komunikację z naszymi partnerami i zachęcamy do wysyłania pytań i uwag.</p>";
$debit_reason_0 = "Brak";
$debit_reason_1 = "Refunduj";
$debit_reason_2 = "Chargeback";
$debit_reason_3 = "Zgłoszono oszustwo";
$debit_reason_4 = "Anulowane zamówienie";
$debit_reason_5 = "Częściowa refundacja";
$menu_drop_pending_debits = "Oczekujące obciążenia";
$debit_amount_label = "Kwota obciążenia";
$debit_date_label = "Data obciążenia";
$debit_reason_label = "Powód obciążenia";
$debit_paragraph = "Obciążenia zostaną odjęte od następnej wypłaty.";
$debit_invoice_amount = "Minus kwota obciążeń";
$debit_revised_amount = "Zrewidowana kwota wypłaty";
$mv_head_description = "Uwaga: Możesz umieścić jeden film na stronę na swojej stronie internetowej.";
$mv_head_source_code = "Wklej ten kod do sekcji HEAD dokumentu HTML.";
$mv_body_title = "Tytuł filmu";
$mv_body_description = "Opis";
$mv_body_source_code = "Wklej ten kod do sekcji BODY dokumentu HTML, w którym ma się pojawić wideo.";
$menu_marketing_videos = "Filmy";
$mv_preview_button = "Obejrzyj film";
$dt_no_data = "Brak danych w tabeli.";
$dt_showing_exists = "Pokazuje _START_ do _END_ z _TOTAL_ wpisów.";
$dt_showing_none = "Pokazuje 0 do 0 z 0 wpisów.";
$dt_filtered = "(filtrowane z _MAX_ wszystkich wpisów)";
$dt_length_choice = "Pokaż _MENU_ wpisów.";
$dt_loading = "Wczytywanie...";
$dt_processing = "Procesownaie...";
$dt_no_records = "Nie znaleziono rezultatów.";
$dt_first = "Pierwszy";
$dt_last = "Ostatni";
$dt_next = "Następny";
$dt_previous = "Poprzedni";
$dt_sort_asc = ": włączyć do sortowania kolumny rosnąco";
$dt_sort_desc = ": włączyć do sortowania kolumny malejąco";
$choose_marketing_group = "Wybierz Grupę Marketingową";
$email_already_used_1 = "Nie można utworzyć konta. Dopuszczamy jedynie";
$email_already_used_2 = "konto";
$email_already_used_3 = "dla jednego adresu email.";
$missing_fax = "Wpisz swój numer faks.";
$chart_last_6_months = "prowizje zapłacone w ostatnich 6 miesiącach";
$chart_last_6_months_paid = "prowizje zapłacone";
$chart_this_month = "Nasze Top 5 partnerów w tym miesiącu";
$chart_this_month_none = "Brak danych do wyświetlenia.";
$login_return = "Wróć do strony domowej partnera";
$login_lost_details = "Wpisz swój login, a my wyślemy e-mail z poświadczeniami logowania.";
$account_edit_general_prefs = "Ustawienia ogólne";
$account_edit_email_language = "Język Emaila";
$footer_connect = "Skotaktuj się z nami";
$modal_close = "Zamknij";
$vat_amount_heading = "Kwota VAT";
$menu_logout = "Wyloguj";
$menu_upload_picture = "Wyślij zdjęcie";
$menu_offer_testi = "Zaproponuj referencje";
$fb_login = "Zaloguj się z Facebook";
$fb_permissions = "Uprawnienia nie przyznano. Proszę pozwolić stronie internetowej do korzystania z adresu e-mail.";
$announcements_published = "Opublikowano Ogłoszenie";
$training_videos_title = "Filmy Szkoleniowe";
$training_videos_general = "Marketing Ogólny";
$commission_method = "Metody Prowizji";
$how_will_you_earn = "W jaki sposób zarobisz prowizję?";
$pm_account_credit = "Przelejemy na Twoje konto zarobioną przez Ciebie prowizję.";
$pm_check_money_order = "Wyślemy Ci czek/ przekaz pieniężny pocztą";
$pm_paypal = "Prześlemy Ci płatność PayPal.";
$pm_stripe = "Prześlemy Ci płatność Stripe.";
$pm_wire = "Wyślemy Ci przekaz bankowy.";
$add_to_signup_left_column_text = "<span style=\"color:#CC0000; font-style:italic;\">* oznacza wymagane pole.</span>";
$paypal_email = "Email Paypal";
$stripe_acct_details = "Dane Konta Stripe";
$stripe_connect = "Możesz połączyć swoje konto Stripe w ustawieniach konta po zarejestrowaniu.";
$stripe_success = "Konto Stripe Zostało Pomyślnie Powiązane";
$stripe_settings = "Ustawienia Stripe";
$stripe_connect_edit = "Połącz ze Stripe";
$stripe_delete = "Usuń Konto Stripe";
$stripe_confirm = "Na pewno chcesz usunąć konto?";
$payment_settings = "Ustawienia Płatności";
$edit_payment_settings = "Edytuj Ustawienia Płatności";
$invalid_paypal_address = "Nieprawidłowy adres email PayPal.";
$payment_method_error = "Wybierz metodę płatności.";
$payment_settings_updated = "Zaktualizowano ustawienia płatności.";
$stripe_removed = "Usunięto konto Stripe.";
$payment_settings_success = "Sukces!";
$payment_update_notice_1 = "Uwaga!";
$payment_update_notice_2 = "Wybrano opcję wypłaty przez <strong>[payment_option_here]</strong>. <a href=\"account.php?page=48\" style=\"font-weight:bold;\">Kliknij tutaj</a> by podłączyć konto <strong>[payment_option_here]</strong>.";
$pm_title_credit = "Zasilenie Konta";
$pm_title_mo = "Czek/ Przekaz Pieniężny";
$pm_title_paypal = "PayPal";
$pm_title_stripe = "Stripe";
$pm_title_wire = "Polecenie Przelewu";
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