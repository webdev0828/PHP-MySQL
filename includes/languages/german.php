<?PHP

//-------------------------------------------------------
	  $language_pack_name = "german";
	  $language_pack_table_name = "german";
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
$header_title = "Partnerprogramm";
$header_indexLink = "Startseite";
$header_signupLink = "Jetzt anmelden";
$header_accountLink = "Konto verwalten";
$header_emailLink = "Kontaktieren Sie uns";
$header_greeting = "Willkommen";
$header_nonLogged = "Gast";
$header_logout = "Hier ausloggen";
$footer_tag = "Partnerprogramm-Software von iDevAffiliate";
$footer_copyright = "Urheberrecht 2006";
$footer_rights = "Alle Rechte vorbehalten";
$index_heading_1 = "Willkommen zu unserem Partnerprogramm!";
$index_paragraph_1 = "Beitritt zu unserem Programm ist kostenlos, die Anmeldung ist unkompliziert und technisches Wissen wird nicht benötigt. Partnerprogramme sind im ganzen Internet sehr verbreitet und bieten den Betreibern einer Website die Möglichkeit eines zusätzlichen Einkommens von der Site. Durch die Partner erhöht sich die Anzahl der Besucher und der Absatz auf kommerziellen Websites, wofür diese Bezahlung in der Form einer Kommission erhalten.";
$index_heading_2 = "Wie funktioniert es?";
$index_paragraph_2 = "Wenn Sie unserem Partnerprogramm beitreten stellen wir Ihnen eine Reihe von Bannern und Text Links für Ihre Site zur Verfügung. Wenn ein Benutzer einen Ihrer Links anklickt, wird er auf unsere Website weiter geleitet und seine Aktivitäten werden durch unsere Partnerprogramm-Software festgehalten. Sie werden je nach der Art Ihrer Kommission die entsprechende Kommission verdienen.";
$index_heading_3 = "Realzeit Statistiken und Berichterstattung!";
$index_paragraph_3 = "Sie können 24 Stunden am Tag einloggen um Ihre Absätze, Anzahl der Besucher und den Kontostand zu prüfen und zu sehen was Ihre Banner leisten.";
$index_login_title = "Partner Anmeldung";
$index_login_username = "Benutzername";
$index_login_password = "Kennwort";
$index_login_username_field = "Benutzername";
$index_login_password_field = "Kennwort";
$index_login_button = "Anmeldung";
$index_login_signup_link = "Klicken Sie hier um sich anzumelden";
$index_table_title = "Programm Informationen";
$index_table_commission_type = "Art der Kommission";
$index_table_initial_deposit = "Anzahlung";
$index_table_requirements = "Erfordernisse zur Auszahlung";
$index_table_duration = "Dauer der Auszahlung";
$index_table_choose = "Wählen Sie von den folgenden Auszahlungs-Optionen!";
$index_table_sale = "Auszahlung-pro-Verkauf";
$index_table_click = "Auszahlung-pro-Klick";
$index_table_sale_text = "für jeden Verkauf der durch Sie zustande kommt.";
$index_table_click_text = "für jeden Klick der durch Sie zustande kommt.";
$index_table_deposit_tag = "Nur fürs Anmelden!";
$index_table_requirements_tag = "Mindestguthaben zur Auszahlung benötigt.";
$index_table_duration_tag = "Zahlungen werden einmal monatlich für den jeweilig vorangehenden Monat geleistet.";
$signup_left_column_text = "Treten Sie unserem Partnerprogramm bei und verdienen Sie für jeden Verkauf, den Sie für uns in die Wege leiten! Einfach ein Konto erstellen, Ihren Verbindungs-Code in Ihre Website einfügen und während Ihre Besucher dann zu unseren Kunden werden, können Sie das Wachstum Ihres Kontostandes beobachten.";
$signup_left_column_title = "Willkommen Partner!";
$signup_login_title = "Ihr Konto einrichten";
$signup_login_username = "Benutzername";
$signup_login_password = "Kennwort";
$signup_login_password_again = "Kennwort wiederholen";
$signup_login_minmax_chars = "- Benutzername muss mindestens user_min_chars Zeichen lang sein.&lt;br /&gt;- Benutzername kann alphanumerisch sein.&lt;br /&gt;- Benutzername kann diese Zeichen enthalten: _ (nur Unterstriche)&lt;br /&gt;&lt;br /&gt;- Passwort muss mindestens pass_min_chars characters lang sein.&lt;br /&gt;- Password kann alphanumerisch sein.&lt;br /&gt;- Passwort kann diese Zeichen enthalten:  characters_allowed";
$signup_login_must_match = "Diese Eingabe muss mit der Kennwort-Eingabe übereinstimmen.";
$signup_standard_title = "Standard Angaben";
$signup_standard_email = "E-Mail Adresse";
$signup_standard_company = "Firmenname";
$signup_standard_checkspayable = "Schecks zahlbar an";
$signup_standard_weburl = "Website Adresse";
$signup_standard_taxinfo = "Steuernummer, SSN oder VAT";
$signup_personal_title = "Persönliche Angaben";
$signup_personal_fname = "Vorname";
$signup_personal_state = "Bundesland oder Provinz";
$signup_personal_lname = "Nachname";
$signup_personal_phone = "Telefon Nummer";
$signup_personal_addr1 = "Strasse";
$signup_personal_fax = "Fax Nummer";
$signup_personal_addr2 = "Zusätzliche Adresse";
$signup_personal_zip = "Postleitzahl";
$signup_personal_city = "Stadt";
$signup_personal_country = "Land";
$signup_commission_title = "Kommissions-Zahlung";
$signup_commission_howtopay = "Wie sollen wir Sie bezahlen?";
$signup_commission_style_PPS = "Auszahlung-pro-Verkauf";
$signup_commission_style_PPC = "Auszahlung-pro-Klick";
$signup_terms_title = "Allgemeine Geschäftsbedingungen";
$signup_terms_agree = "Ich habe die oben stehenden Geschäftsbedingungen gelesen, verstanden und stimme ihnen zu.";
$signup_page_button = "Erstellen Sie mein Konto";
$signup_success_email_comment = "Wir haben Ihnen eine E-Mail gesendet, die Ihren Benutzernamen und Ihr Kennwort enhält.<BR />Bewahren Sie diese Informationen für den Fall auf, dass Sie wünschen später darauf zurück zu greifen.";
$signup_success_login_link = "In Ihr Konto einloggen";
$custom_fields_title = "Benutzerdefinierte Felder";
$logout_msg = "<b>Sie sind nun ausgeloggt</b><BR />Vielen Dank für Ihre Teilnahme an unserem Partnerprogramm.";
$signup_page_success = "Ihr Konto wurde erstellt";
$login_left_column_title = "Konto Anmeldung";
$login_left_column_text = "Geben Sie Ihren Benutzernamen und Ihr Kennwort ein um Zugang zu Ihren Kontostatistiken, Bannern, Verbindungs-Code, FAQ und mehr zu erhalten.<BR/ ><BR/ >Wenn Sie Ihr Kennwort vergessen haben geben Sie bitte Ihren Benutzernamen ein und wir werden Ihre Anmelde-Informationen per E-Mail an Sie senden.<BR /><BR />";
$login_title = "In Ihr Konto einloggen";
$login_username = "Benutzername";
$login_password = "Kennwort";
$login_invalid = "Anmeldung ungültig";
$login_now = "In Ihr Konto einloggen";
$login_send_title = "Brauchen Sie Ihr Kennwort?";
$login_send_username = "Geben Sie Ihren Benutzernamen ein";
$login_send_info = "Eine E-Mail mit Ihren Anmelde-Informationen wurde gesendet";
$login_send_pass = "An E-Mail senden";
$login_send_bad = "Benutzername nicht gefunden";
$help_new_password_heading = "Neues Kennwort";
$help_new_password_info = "Ihr Passwort muss mindestens pass_min_chars Zeichen lang sein. Es darf nur Buchstaben, Zahlen und die folgenden Zeichen enthalten:  characters_allowed";
$help_confirm_password_heading = "Neues Kennwort bestätigen";
$help_confirm_password_info = "Diese Eingabe muss mit der neuen Kennwort-Eingabe übereinstimmen.";
$help_custom_links_heading = "Tracking-Stichwort";
$help_custom_links_info = "Ihr Stichwort darf nicht länger als 30 Zeichen sein. Es darf nur Buchstaben, Zahlen und Bindestriche beinhalten.";
$error_title = "Die folgenden Fehler wurden festgestellt";
$username_invalid = "Ungültiger Benutzername. Er darf nur Buchstaben, Zahlen und Unterstriche enthalten.";
$username_taken = "Der von Ihnen gewählte Benutzername wird schon verwendet.";
$username_short = "Ihr Benutzername ist zu kurz, er muss mindestens 4 Zeichen enthalten.";
$username_long = "Ihr Benutzername ist zu lang, er darf nicht mehr als 12 Zeichen enthalten.";
$password_invalid = "Ungültiges Passwort. Es darf nur Buchstaben, Zahlen und die folgenden Zeichen enthalten:  characters_allowed";
$password_short = "Ihr Kennwort ist zu kurz, es muss mindestens 4 Zeichen enthalten.";
$password_long = "Ihr Kennwort ist zu lang, es darf nicht mehr als 12 Zeichen enthalten.";
$password_mismatch = "Ihre Kennwort-Eingaben stimmen nicht überein.";
$missing_checks = "Bitte geben Sie einen Empfänger-Namen ein, an den die Schecks zahlbar gemacht werden können.";
$missing_tax = "Bitte geben Sie Ihre Steuernummer, SSN oder VAT Information an.";
$missing_fname = "Bitte geben Sie Ihren Vornamen ein.";
$missing_lname = "Bitte geben Sie Ihren Nachnamen ein.";
$missing_email = "Bitte geben Sie Ihre E-Mail Adresse ein.";
$invalid_email = "Ihre E-Mail Adresse ist ungültig.";
$missing_address = "Bitte geben Sie Ihre Strasse ein.";
$missing_city = "Bitte geben Sie Ihren Wohnort ein.";
$missing_company = "Bitte geben Sie Ihren Firmennamen ein.";
$missing_state = "Bitte geben Sie Ihr Bundesland oder Ihre Provinz ein.";
$missing_zip = "Bitte geben Sie Ihre Postleitzahl ein.";
$missing_phone = "Bitte geben Sie Ihre Telefonnummer ein.";
$missing_website = "Bitte geben Sie die Adresse Ihrer Website ein.";
$missing_paypal = "Sie haben eine Bezahlung mit PayPal gewählt, bitte geben Sie Ihr PayPal Konto ein.";
$missing_terms = "Sie haben unsere allgemeinen Geschäftsbedingungen nicht akzeptiert.";
$paypal_required = "Zur Durchführung der Bezahlung wird ein PayPal Konto benötigt.";
$missing_custom = "Bitte füllen Sie das genannte Feld aus:";
$account_total_transactions = "Abgeschlossene Transaktionen";
$account_standard_linking_code = "Standard Verbindungs-Code – ausgezeichnet zur Verwendung in E-Mails!";
$account_copy_paste = "Kopieren/Einfügen Sie den oben genannten Code in Ihre Website oder E-Mails";
$account_not_approved = "Ihr Konto wartet auf Freischaltung";
$account_suspended = "Ihr Konto ist zur Zeit suspendiert";
$account_standard_earnings = "Standard Einnahmen";
$account_inc_bonus = "Einschliesslich Bonus";
$account_second_tier = "Gestufte Einnahmen";
$account_recurring = "Wiederkehrende Einnahmen";
$account_not_available = "Entfällt";
$account_earned_todate = "Aktueller Gesamtverdienst";
$menu_heading_overview = "Konto-Übersicht";
$menu_general_stats = "Allgemeine Statistik";
$menu_tier_stats = "gestufte Statistik";
$menu_payment_history = "Abgeschlossene Transaktionen";
$menu_commission_details = "Näheres über die Kommission";
$menu_recurring_commissions = "Wiederkehrende Kommissionen";
$menu_traffic_log = "Eingehender Traffic Log";
$menu_heading_marketing = "Marketing-Materialien";
$menu_banners = "Banner";
$menu_text_ads = "Textanzeigen";
$menu_text_links = "Textlinks";
$menu_email_links = "E-Mail Links";
$menu_html_links = "HTML Anzeigen";
$menu_offline = "Offline Marketing";
$menu_tier_linking_code = "Stufen-Verbindungscode";
$menu_email_friends = "E-Mail Freunde & Kollegen";
$menu_custom_links = "Erstellen & verfolgen Sie Ihre eigenen Links";
$menu_heading_management = "Konto-Verwaltung";
$menu_comalert = "CommissionAlert Einrichtung";
$menu_comstats = "CommissionStats Einrichtung";
$menu_edit_account = "Mein Konto bearbeiten";
$menu_change_pass = "Mein Kennwort ändern";
$menu_change_commission = "Meinen Kommissions-Typ ändern";
$menu_heading_general_info = "Allgemeine Informationen";
$menu_browse_affiliates = "Andere Partner suchen";
$menu_faq = "Häufig gestellte Fragen";
$suspended_title = "Kontostand Alarm";
$suspended_heading = "Ihr Konto ist zur Zeit suspendiert";
$suspended_notes = "Administrator Hinweise:";
$pending_title = "Kontostand Alarm";
$pending_heading = "Ihr Konto wartet derzeit auf Freischaltung";
$pending_note = "Sobald wir Ihr Konto freigeschaltet haben, bekommen Sie Zugang zu Marketing-Materialien.";
$faq_title = "Häufig gestellte Fragen";
$faq_none = "Noch keine FAQ’s";
$browse_title = "Andere Partner suchen";
$browse_none = "Keine anderen Partner zur Ansicht";
$change_comm_title = "Meinen Kommissions-Typ ändern";
$change_comm_curr_comm = "Derzeitiger Kommissionstyp";
$change_comm_curr_pay = "Derzeitige Höhe der Bezahlung";
$change_comm_new_comm = "Neuer Kommissions-Typ";
$change_comm_warning = "Wenn Sie Ihren Kommissions-Typ ändern wird Ihr Konto zur Auszahlungs-Stufe 1 zurück gesetzt";
$change_comm_button = "Kommissions-Typen ändern";
$change_comm_no_other = "Keine anderen Kommissions-Typen verfügbar";
$change_comm_level = "Stufe";
$change_comm_updated = "Kommissions-Typ aktualisiert";
$password_title = "Mein Kennwort ändern";
$password_old_password = "Altes Kennwort";
$password_new_password = "Neues Kennwort";
$password_confirm_password = "Neues Kennwort bestätigen";
$password_button = "Mein Kennwort ändern";
$password_warning_old_missing = "Altes Kennwort ist inkorrekt oder fehlt";
$password_warning_new_missing = "Die Eingabe des neuen Kennwortes fehlt";
$password_warning_mismatch = "Neues Kennwort stimmt nicht überein";
$password_warning_invalid = "Kennwort ungültig – Klicken Sie auf die Hilfe-Links";
$password_notice = "Kennwort aktualisiert";
$edit_failed = "Aktualisierung gescheitert – Siehe Fehler oben";
$edit_success = "Konto aktualisiert";
$edit_button = "Mein Konto bearbeiten";
$commissionstats_title = "CommissionStats Einrichtung";
$commissionstats_info = "Durch die Installation von CommissionStats können Sie Ihre Statistiken sofort überprüfen, direkt von Ihrem Windows Desktop!Um diese Einrichtung zu installieren, laden Sie die CommissionStats herunter und <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b><b>entpacken</b></a>Sie die Daten auf Ihre Festplatte und führen Sie dann die <b>setup.exe</b> Datei aus. Wenn Sie zur Eingabe Ihrer Anmelde-Informationen aufgefordert werden, geben Sie die folgenden Details ein.";
$commissionstats_hint = "Hinweis: Verwenden Sie Kopieren/Einfügen bei jedem Eintrag um die Exaktheit zu gewährleisten";
$commissionstats_profile = "Profilname";
$commissionstats_username = "Benutzername";
$commissionstats_password = "Kennwort";
$commissionstats_id = "Partner-Kennzeichen";
$commissionstats_source = "Quellpfad URL";
$commissionstats_download = "Kommissions-Statistiken herunterladen";
$commissionalert_title = "CommissionAlert Einrichtung";
$commissionalert_info = "Durch die Installation von CommissionAlert werden wir Sie sofort über neue Kommissionen informieren, direkt von Ihrem Windows Desktop!Um diese Einrichtung zu installieren, laden Sie die CommissionAlerts herunter und <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b><b>entpacken</b></a>Sie die Daten auf Ihre Festplatte und führen Sie dann die <b>setup.exe</b> Datei aus. Wenn Sie zur Eingabe Ihrer Anmelde-Informationen aufgefordert werden, geben Sie die folgenden Details ein.";
$commissionalert_hint = "Hinweis: Verwenden Sie Kopieren/Einfügen bei jedem Eintrag um die Exaktheit zu gewährleisten";
$commissionalert_profile = "Profilname";
$commissionalert_username = "Benutzername";
$commissionalert_password = "Kennwort";
$commissionalert_id = "Partner-Kennzeichen";
$commissionalert_source = "Quellpfad URL";
$commissionalert_download = "CommissionAlert herunterladen";
$offline_title = "Offline Marketing";
$offline_paragraph_one = "Verdienen Sie Geld durch Werbung für unsere Website (offline) bei Ihren Freunden und Kollegen!";
$offline_send = "Sende Kunden zu";
$offline_page_link = "Seite einsehen";
$offline_paragraph_two = "Ihre Kunden werden Ihr <b>Partner-Kennzeichen</b> in die Box auf der obigen Seite eintragen, wodurch Sie als Partner für jegliche von ihnen getätigten Käufe angemeldet werden.";
$banners_title = "Banner";
$banners_size = "Banner Grösse";
$banners_description = "Banner Beschreibung";
$ad_title = "Textanzeigen";
$ad_info = "Mit dem gegebenen Verbindungs-Code können Sie die<b>Farbzusammenstellung</b>, <b>Höhe</b> and <b>Breite</b> Ihrer Textanzeige problemlos in Ihre Site integrieren!";
$links_title = "Textlinks";
$email_title = "E-Mail Links";
$email_group = "Marketing-Gruppe";
$email_button = "E-Mail Links anzeigen";
$email_no_group = "Keine Gruppe gewählt";
$email_choose = "Bitte wählen Sie eine der oben stehenden Marketing-Gruppen";
$email_notice = "Marketing-Gruppen haben vielleicht andere eingehende Traffic Seiten";
$email_ascii = "<b>ASCII/Text Version</b> - Zur Verwendung in Klartext-E-Mails.";
$email_html = "<b>HTML Version</b> - Zur Verwendung in mit HTML formattierten E-Mails.";
$email_test = "Test-Verbindung";
$email_test_info = "An dieser Stelle werden Ihre Kunden an unsere Website weiter geleitet.";
$email_source = "Quellcode – in Ihre E-Mail Nachricht Kopieren/Einfügen";
$html_title = "HTML Anzeigen";
$html_view_link = "Diese HTML-Anzeige ansehen";
$traffic_title = "Eingehender Traffic Log";
$traffic_display = "Anzeigen der letzten";
$traffic_display_visitors = "Besucher";
$traffic_button = "Traffic Log einsehen";
$traffic_title_details = "Einzelheiten eingehender Traffic Log";
$traffic_ip = "IP-Adressen";
$traffic_refer = "Verweisende URL";
$traffic_date = "Datum";
$traffic_time = "Uhrzeit";
$traffic_bottom_tag_one = "Anzeigen der letzten";
$traffic_bottom_tag_two = "von";
$traffic_bottom_tag_three = "Gesamtanzahl einzelner Besucher";
$traffic_none = "Keine Traffic-Logs bestehen";
$traffic_no_url = "Entfällt – Mögliches Bookmark oder E-Mail Link";
$traffic_box_title = "Verweisende URL vervollständigen";
$traffic_box_info = "Klicken Sie auf den Link um die Webseite zu besuchen";
$payment_title = "Abgeschlossene Transaktionen";
$payment_date = "Auszahlungs-Datum";
$payment_commissions = "Kommissionen";
$payment_amount = "Auszahlungs-Summe";
$payment_totals = "Gesamt";
$payment_none = "Keine abgeschlossenen Transaktionen bestehen";
$tier_stats_title = "Gestufte Statistiken";
$tier_stats_accounts = "Gestufte Konten";
$tier_stats_grab_link = "Schnappen Sie sich Ihren Stufen-Verbindungs-Code";
$tier_stats_none = "Kein gestuftes Konto besteht";
$tier_stats_username = "Benutzername";
$tier_stats_current = "Derzeitige Kommissionen";
$tier_stats_previous = "Abgeschlossene Auszahlungen";
$tier_stats_totals = "Gesamt";
$recurring_title = "Wiederkehrende Kommissionen";
$recurring_none = "Keine wiederkehrenden Kommissionen bestehen";
$recurring_date = "Kommissions-Datum";
$recurring_status = "Wiederkehrender Status";
$recurring_payout = "Nächste Auszahlung";
$recurring_amount = "Summe";
$recurring_every = "Jede";
$recurring_in = "In";
$recurring_days = "Tagen";
$recurring_total = "Gesamt";
$tlinks_title = "Fügen Sie Andere Ihrer Stufe hinzu und verdienen Sie auch durch sie!";
$tlinks_embedded_one = "Stufen Signup-Crediting ist bereits in Ihren Standard Partner-Links aktiviert!";
$tlinks_embedded_two = "Sie werden zur höchsten Stufe für jeden werden, der unserem Partnerprogramm mit Hilfe Ihres Partner-Links beitritt.";
$tlinks_embedded_current = "Derzeitige Auszahlungs-Stufe";
$tlinks_forced_two = "Verwenden Sie den folgenden Code um bei anderen Website-Betreibern für unser Partnerprogramm zu werben.";
$tlinks_forced_code = "Text-Verbindungscode";
$tlinks_forced_paste = "Kopieren/Einfügen Sie den oben genannten Code in Ihre Website";
$tlinks_forced_money = "Webmasters, verdienen Sie hier Geld!";
$comdetails_title = "Näheres über die Kommission";
$comdetails_date = "Kommissions-Datum";
$comdetails_time = "Kommissions-Uhrzeit";
$comdetails_type = "Typ der Kommission";
$comdetails_status = "Derzeitige Status";
$comdetails_amount = "Kommissions-Summe";
$comdetails_additional_title = "Zusätzliche Details zur Kommission";
$comdetails_additional_ordnum = "Bestellungsnummer";
$comdetails_additional_saleamt = "Verkaufsumme";
$comdetails_type_1 = "Bonus-Kommission";
$comdetails_type_2 = "Wiederkehrende Kommission";
$comdetails_type_3 = "Stufen-Kommission";
$comdetails_type_4 = "Standard-Kommission";
$comdetails_status_1 = "Bezahlt";
$comdetails_status_2 = "Genehmigt – Bezahlung steht bevor";
$comdetails_status_3 = "Genehmigung steht bevor";
$comdetails_not_available = "ENTFÄLLT";
$details_title = "Näheres über die Kommission";
$details_drop_1 = "Derzeitige Standard-Kommissionen";
$details_drop_2 = "Derzeitige Stufen-Kommissionen";
$details_drop_3 = "Genehmigung für Kommissionen steht bevor";
$details_drop_4 = "Ausgezahlte Standard-Kommissionen";
$details_drop_5 = "Ausgezahlte Stufen-Kommissionen";
$details_button = "Kommissionen einsehen";
$details_date = "Datum";
$details_status = "Status";
$details_commission = "Kommission";
$details_details = "Details einsehen";
$details_type_1 = "Bezahlt";
$details_type_2 = "Genehmigung steht bevor";
$details_type_3 = "Genehmigt – Bezahlung steht bevor";
$details_none = "Keine Kommissionen zur Einsicht";
$details_no_group = "Keine Kommissions-Gruppe gewählt";
$details_choose = "Bitte wählen Sie eine der oben stehenden Marketing-Gruppen";
$general_title = "Derzeitige Kommissionen – Von der letzten Auszahlung bis jetzt";
$general_transactions = "Transaktionen";
$general_earnings_to_date = "Derzeitiger Stand der Einnahmen";
$general_history_link = "Abgeschlossene Transaktionen einsehen";
$general_standard_earnings = "Standard Einnahmen";
$general_current_earnings = "Derzeitige Einnahmen";
$general_traffic_title = "Traffic-Statistik";
$general_traffic_visitors = "Besucher";
$general_traffic_unique = "Einzelne Besucher";
$general_traffic_sales = "Gesamtumsätze";
$general_traffic_ratio = "Umsatzverhältnis";
$general_traffic_info = "<b>Gesamtumsatz</b> und <b>Umsatzverhältnis</b><BR />Diese Statistiken beinhalten keine wiederkehrenden oder gestuften Kommissionen.";
$general_traffic_pay_type = "Auszahlungs-Typ";
$general_traffic_pay_level = "Derzeitige Bezahlungsstufe";
$general_notes_title = "Hinweise vom Administrator";
$general_notes_date = "Datum erstellt";
$general_notes_to = "An";
$general_notes_all = "Alle Partner";
$general_notes_none = "Keine Mitteilungen zur Einsicht";
$contact_left_column_title = "Kontaktieren Sie uns";
$contact_left_column_text = "Mit dem Formular rechts können Sie gerne mit unseren Partner-Managern in Verbindung treten.";
$contact_title = "Kontaktieren Sie uns";
$contact_name = "Ihr Name";
$contact_email = "Ihre E-Mail Adresse";
$contact_message = "Nachricht";
$contact_chars = "Zeichen verbleiben";
$contact_button = "Nachricht senden";
$contact_received = "Wir haben Ihre Nachricht erhalten, bitte gedulden Sie sich 24 Stunden auf eine Rückantwort.";
$contact_invalid_name = "Ungültiger Name";
$contact_invalid_email = "Ungültige E-Mail Adresse";
$contact_invalid_message = "Ungültige Nachricht";
$invoice_button = "Rechnung";
$invoice_header = "TEILNEHMER-ZAHLUNG RECHNUNG";
$invoice_aff_info = "Teilnehmer-Informationen";
$invoice_co_info = "Informationen";
$invoice_acct_info = "Konto-Informationen";
$invoice_payment_info = "Zahlung Informationen";
$invoice_comm_date = "Auszahlungs-Datum";
$invoice_comm_amt = "Kommissions-Summe";
$invoice_comm_type = "Typ der Kommission";
$invoice_admin_note = "Hinweise vom Administrator";
$invoice_footer = "ENDE DER RECHNUNG";
$invoice_print = "Druck-Rechnung";
$invoice_none = "N/A";
$invoice_aff_id = "Teilnehmer ID";
$invoice_aff_user = "Benutzername";
$menu_pdf_marketing = "PDF-Marketingbroschüren";
$menu_pdf_training = "PDF-Schulungsunterlagen";
$marketing_target_url = "Ziel-URL";
$marketing_source_code = "Quellcode - In Ihre Webseite kopieren/einfügen";
$marketing_group = "Marketinggruppe";
$peels_title = "Name des Page Peels";
$peels_view = "Dieses Peel ansehen";
$peels_description = "Beschreibung des Peels";
$lb_head_title = "Erforderlicher HEAD Code für Ihre HTML-Seite";
$lb_head_description = "Um eine Lightbox auf Ihrer Webseite zu verwenden, müssen Sie dem OBEREN Abschnitt jener Seite, auf der es angezeigt werden soll, folgende Zeilen hinzufügen.";
$lb_head_source_code = "Fügen Sie diesen Code in den OBEREN Abschnitt Ihres HTML-Dokumentes.";
$lb_head_code_notes = "Sie müssen diesen Code unabhängig von der geplanten Anzahl der Lightboxen auf Ihrer Seite ein Mal eingeben.";
$lb_head_tutorial = "Anleitung ansehen";
$lb_body_title = "Name der Lightbox";
$lb_body_description = "Beschreibung der Lightbox";
$lb_body_click = "Klicken Sie aufs obere Bild, um die Lightbox zu sehen";
$lb_body_source_code = "Fügen Sie diesen Code in den HAUPTTEIL Ihres HTML-Dokuments dort ein, wo Sie das Bild platzieren möchten.";
$pdf_title = "PDF";
$pdf_training = "Schulungsunterlagen";
$pdf_marketing = "Marketingbroschüren";
$pdf_description_1 = "Um sich unser PDF-Marketingmaterial ansehen zu können, benötigen Sie Adobe Reader.";
$pdf_description_2 = "Adobe Reader kann kostenlos von der Adobe Webseite heruntergeladen werden.";
$pdf_file_name = "Dateiname";
$pdf_file_size = "Dateigröße";
$pdf_file_description = "Beschreibung";
$pdf_bytes = "Bytes";
$menu_heading_training_materials = "Schulungsunterlagen";
$menu_videos = "Schulungsvideos ansehen";
$menu_custom_manual = "Handbuch zur kundenspezifischen Verfolgung von Links";
$menu_page_peels = "Page Peels";
$menu_lightboxes = "Lightboxen";
$menu_email_templates = "E-Mail-Vorlagen";
$menu_heading_custom_links = "Kundenspezifisches Verfolgen von Links";
$menu_custom_reports = "Berichte";
$menu_keyword_links = "Schlüsselwort Links verfolgen";
$menu_subid_links = "Verfolgungs-Links von Sub-Partnern";
$menu_alteranate_links = "Einlaufende Seiten-Links abwechseln";
$menu_heading_additional = "Zusätzliche Tools";
$menu_drop_heading_stats = "Allgemeine Statistiken";
$menu_drop_heading_commissions = "Kommissionen";
$menu_drop_heading_history = "Zahlungsverhalten";
$menu_drop_heading_traffic = "Verkehrsprotokoll";
$menu_drop_heading_account = "Mein Konto";
$menu_drop_heading_logo = "Mein Logo hochladen";
$menu_drop_heading_faq = "FAQ (Häufig gestellte Fragen)";
$menu_drop_general_stats = "Allgemeine Statistiken";
$menu_drop_tier_stats = "Statistiken nach Stufe";
$menu_drop_current = "Aktuelle Kommissionen";
$menu_drop_tier = "Aktuelle Kommissionen nach Stufe";
$menu_drop_pending = "Schwebende Freigabe";
$menu_drop_paid = "Bezahlte Freigabe";
$menu_drop_paid_rec = "Bezahlte Kommissionen nach Stufe";
$menu_drop_recurring = "Aktive, wiederkehrende Kommissionen";
$menu_drop_edit = "Mein Konto bearbeiten";
$menu_drop_password = "Mein Passwort ändern";
$menu_drop_change = "Meine Kommissionsart ändern";
$account_hidden = "Versteckt";
$keyword_title = "Links zu Schlüsselwörtern";
$keyword_info = "Die Erstellung eines Links zu einem Schlüsselwort ermöglicht Ihnen das Verfolgen eingehenden Verkehrs für unterschiedliche Quellen. Sie können einen Link mit bis zu vier unterschiedlichen Schlüsselwörtern erstellen und der Verfolgungsbericht wird Ihnen einen detailierten Bericht zu jedem von Ihnen erstellten Schlüsselwort zeigen.";
$keyword_heading = "Verfügbare Variablen zur Verfolgung von Schlüsselwörtern";
$keyword_tracking = "Verfolgungsnummer";
$keyword_build = "Um Ihren Link zu erstellen, nehmen Sie den folgenden URL und verbinden Sie ihn mit der von Ihnen gewünschten Verfolgungsnummer und dem Schlüsselwort.";
$keyword_example = "Beispiel";
$keyword_tutorial = "Die Anleitung ansehen";
$sub_tracking_title = "Verfolgung von Sub-Partnern";
$sub_tracking_info = "Durch die Erstellung eines Sub-Partner-Links haben Sie die Möglichkeit, den Partner-Link zur Verwendung an Ihre Partner weiterzugeben. Sie wissen, wer eine Kommission für Sie erbracht hat, da wir Ihnen berichten, welcher Ihrer Sub-Partner den Verkauf vorgenommen hat. Ein weiterer Grund, einen Sub-Partner-Link zu verwenden ist das Vorhandensein eines eigenen Verfolgungssystems, das Sie in die Berichterstattung miteinbeziehen möchten.";
$sub_tracking_build = "Ersetzen Sie XXX mit der Partnernummer Ihres Partnerprogramms. Wiederholen Sie diesen Vorgang für alle Ihre Partner.";
$sub_tracking_example = "Beispiel";
$sub_tracking_tutorial = "Anleitung ansehen";
$sub_tracking_id = "Sub-Partnernummer";
$alternate_title = "Einlaufende Seiten-Links abwechseln";
$alternate_option_1 = "Option 1: automatisierte Link-Erstellung";
$alternate_heading_1 = "Automatisierte Link-Erstellung";
$alternate_info_1 = "Legen Sie Ihre eigene einlaufende Verkehrsseite durch Eingabe des URLs fest, an den Sie den Verkehr weiterleiten möchten und wir erstellen den Link für Sie. Durch die Benutzung der Link kürzer, den Sie mit dem im Link eingebetteten URL durch eine Nummer in unserer Datenbank verwenden müssen.";
$alternate_button = "Meinen Link erstellen";
$alternate_links_heading = "Meine periodisch einlaufenden URL Links";
$alternate_links_note = "Bestehende Links bleiben intakt und funktionell, wenn Sie einen kundenspezifischen Link von dieser Seite entfernen.";
$alternate_links_remove = "Entfernen";
$alternate_option_2 = "Option 2: Manuelle Link-Erstellung";
$alternate_info_2 = "Falls Sie es bevorzugen, Ihre eigenen Partner-Links mit einem periodisch einlaufenden URL zu verbinden, verwenden Sie dazu die folgende Struktur.";
$alternate_variable = "Periodisch einlaufende URL-Variable";
$alternate_example = "Beispiel";
$alternate_build = "Um Ihren Link zu erstellen, nehmen Sie den folgenden URL und verbinden Sie ihn mit dem von Ihnen gewünschten periodisch einlaufenden URL.";
$alternate_none = "Keine periodisch einlaufenden Links erstellt";
$alternate_tutorial = "Anleitung ansehen";
$cr_title = "Bericht über kundenspezifisches Schlüsselwort";
$cr_select = "Schlüsselwort auswählen";
$cr_button = "Report erstellen";
$cr_no_results = "Keine Suchergebnisse gefunden";
$cr_no_results_info = "Versuchen Sie eine andere Schlüsselwortkombination";
$cr_used = "Verwendete Schlüsselwörter";
$cr_found = "Dieser Link gefunden";
$cr_times = "Male";
$cr_unique = "Gefundene einmalige Links";
$cr_detailed = "Detailierte Link-Bericht";
$cr_export = "Bericht an Excel exportieren";
$cr_none = "Keine Schlüsselwörter gefunden";
$logo_title = "Laden Sie Ihr Firmenlogo hoch";
$logo_info = "Falls Sie Ihr Firmenlogo hochladen möchten, ist es von Kunden, die Ihre Webseite besuchen, sichtbar. Dadurch wird das Erlebnis der Kunden persönlicher gestaltet.";
$logo_bullet_one = "Bilder können im .jpg, .gif oder .png Format sein. Flash-Inhalt ist nicht erlaubt.";
$logo_bullet_two = "Fotos werden verworfen und Ihr Konto gesperrt.";
$logo_bullet_three = "Ihr Bild/Logo ist erst nach unserer Genehmigung auf unserer Webseite zu sehen.";
$logo_bullet_size_one = "Bilder können maximal Pixel breit sein";
$logo_bullet_size_two = "und maximal hoch sein";
$logo_bullet_req_size_one = "Bilder müssen mindestens Pixel breit sein";
$logo_bullet_req_size_two = "und Pixel";
$logo_bullet_pixels = "hoch sein.";
$logo_choose = "Bild auswählen";
$logo_file = "Datei auswählen:";
$logo_browse = "Suchen…";
$logo_button = "Hochladen";
$logo_current = "Mein aktuelles Bild";
$logo_remove = "Entfernen";
$logo_display_status = "Bildstatus:";
$logo_pending = "Schwebende Freigabe";
$logo_approved = "Freigegeben";
$logo_success = "Das Bild wurde erfolgreich hochgeladen und wartet nun auf die Freigabe.";
$signup_security_title = "Kontoprüfung";
$signup_security_info = "Bitte geben Sie den im Kästchen angegebenen Sicherheitscode ein. Dieser Schritt hilft uns, automatische Anmeldungen zu verhindern.";
$signup_security_code = "Sicherheitscode";
$sub_tracking_none = "Keiner";
$missing_security_code = "Falsch oder fehlende Kontoprüfung/Sicherheitscode";
$alternate_success_title = "Link erfolgreich erstellt";
$alternate_success_info = "Nehmen Sie den untenstehenden Link und beginnen Sie damit, Verkehr an Ihren festgelegten URL zu schicken.";
$alternate_failed_title = "Fehler bei der Erstellung des Links";
$alternate_failed_info = "Bitte geben Sie einen gültigen URL ein.";
$logo_missing_filename = "Bitte wählen Sie einen Dateinamen.";
$logo_required_width = "Die Bildbreite muss mindestens betragen";
$logo_required_height = "Die Bildhöhe muss mindestens betragen";
$logo_maximum_width = "Die Bildbreite kann maximal betragen";
$logo_maximum_height = "Die Bildhöhe kann maximal betragen";
$logo_size_maximum = "Die Bildgröße kann maximal betragen";
$logo_bad_filetype = "Diese Bilderart ist nicht erlaubt. Erlaubte Bilderarten sind .gif, .jpg und .png.";
$logo_upload_error = "Fehler beim Hochladen des Bildes, bitte setzen Sie sich mit dem Partnermanager in Kontakt.";
$logo_error_title = "Fehler beim Hochladen des Bildes";
$logo_error_bytes = "Bytes.";
$excel_title = "Schlüsselwort-Link-Bericht";
$excel_tab_report = "Schlüsselwort-Bericht";
$excel_tab_logs = "Verkehrsprotokolle";
$excel_date = "Berichtsdatum:";
$excel_affiliate = "Partnernummer:";
$excel_criteria = "Kriterium für Schlüsselwort-Link";
$excel_link = "Link-Aufbau";
$excel_hits = "Einmalige Zugriffe";
$excel_comm_stats = "Kommissionsstatistiken";
$excel_comm_current = "Aktuelle Kommissionen";
$excel_comm_paid = "Bezahlte Kommissionen";
$excel_comm_total = "Gesamte Kommissionen";
$excel_comm_ratio = "Umrechnungskurs";
$excel_earned = "Verdiente Kommissionen";
$excel_earned_current = "Aktuelle Kommissionen";
$excel_earned_paid = "Bezahlte Kommissionen";
$excel_earned_total = "Gesamte verdiente Kommissionen";
$excel_earned_tab = "Klicken Sie aufs Tab Verkehrsprotokolle (unten), um das Verkehrsprotokoll für diesen Link zu sehen.";
$excel_log_title = "Verkehrsprotokoll für Schlüsselwörter";
$excel_log_ip = "IP Adresse";
$excel_log_refer = "Verweisender URL";
$excel_log_date = "Datum";
$excel_log_time = "Uhrzeit";
$excel_log_target = "Ziel-URL";
$etemplates_title = "E-Mail-Vorlagen";
$etemplates_view_link = "Diese E-Mail-Vorlage ansehen";
$etemplates_name = "Name der Vorlage";
$signup_maintenance_heading = "In Wartung";
$signup_maintenance_info = "Derzeit ist keine Anmeldung möglich. Bitte versuchen sie es später nocheinmal.";
$marketing_group_title = "Marketing Gruppe";
$marketing_button = "Anzeige";
$marketing_no_group = "keine Gruppe ausgewählt";
$marketing_choose = "Bitte wählen Sie eine Marketing Gruppe";
$marketing_notice = "Marketing Gruppen können ein unterschiedliches Datenvolumen auf deren Seiten haben";
$canspam_heading = "CAN-SPAM Akzeptanz und Regeln";
$canspam_accept = "Die oben genannten CAN-SPAM Regeln, habe ich gelesen und verstanden.";
$canspam_error = "Du hast unsere CAN-SPAM-Regeln nicht akzeptiert.";
$signup_banned = "während der Kontoerstellung ist ein Fehler aufgetreten. Für weitere Informationen, wenden sie sich bitte an den Systemadministrator.";
$header_testimonials = "Partner-Werbung";
$testi_visit = "Besuchen Sie die Webseite";
$testi_description = "Senden Sie Ihre Referenzen für unser Partner-Programm, und wir werden diese auf unserer &lt;a href=&quot;testimonials.php&quot;&gt;Referenzen&lt;/a&gt; Seite, mit einem Link zu Ihrer Webseite platzieren.";
$testi_name = "Name";
$testi_url = "Webadresse";
$testi_content = "Referenz";
$testi_code = "Sicherheits-Code";
$testi_submit = "Referenz senden";
$testi_na = "Es sind keine Referenzen verfügbar.";
$testi_title = "Referenz absenden";
$testi_success_title = "Referenz erfolgreich hochgeladen";
$testi_success_message = "Vielen Dank für die Übermittlung Ihrer Referenz.Unser Team wird es in Kürze bearbeiten.";
$testi_error_title = "Fehler beim Hochladen der Referenz";
$testi_error_name_missing = "Bitte geben Sie einen Namen für Ihre Referenz ein.";
$testi_error_url_missing = "Bitte geben Sie eine Internetadresse für Ihre Bewertung an.";
$testi_error_missing = "Schreiben sie Bitte einen Text zu ihrer Referenz.";
$menu_drop_delayed = "Verzögerte Aufträge";
$details_drop_6 = "Aktuell Verzögerte Aufträge";
$details_type_6 = "Verzögert – in kürze bewilligt";
$comdetails_status_6 = "Verzögert – in kürze bewilligt";
$tc_reaccept_title = "AGB Änderungsmitteilung";
$tc_reaccept_sub_title = "Sie müssen unsere neuen Nutzungsbedingungen akzeptieren, um den Zugang zu Ihrem Konto zu erhalten.";
$tc_reaccept_button = "Die oben genannten Bedingungen habe ich gelesen, verstanden und akzeptiert.";
$tlinks_active = "Anzahl der aktiven Ebenen";
$tlinks_payout_structure = "Reihe für Auszahlungsfristen";
$tlinks_level = "Stufe";
$tierText1 = "Der Provisionsbetrag % wird aus dem vorgelegtem Partnerprogram berechnet.";
$tierText2 = "Der Provisionsbetrag % wird aus der oberen Klasse berechnet";
$tierText3 = "% Wird vom Verkaufsbetrag berechnet.";
$tierTextflat = "Flatrate.";
$edit_custom_button = "Antwort bearbeiten";
$private_heading = "Privat Anmelden";
$private_info = "Unser Partnerprogram ist nicht für die allgemeine Öffentlichkeit und erfordert einen Registrierungs Code. Für Informationen und den erhalt eines Registrierungscodes, klicken sie bitte hier.";
$private_required_heading = "Registrierungscode erforderlich";
$private_code_title = "Registrierungscode eingeben";
$private_button = "Code Senden";
$private_error_title = "Ungültiger Registrierungscode";
$private_error_invalid = "Die Registrierungs Code ist ungültig.";
$private_error_expired = "Der zur Verfügung gestellte Registrierungs Code ist nicht mehr gültig.";
$qr_code_title = "QR-Code";
$qr_code_size = "QR Code Grösse";
$qr_code_button = "QR Code zeigen";
$qr_code_offline_title = "Offline Vertrieb";
$qr_code_offline_content1 = "Benutzen sie diesen QR Code für ihre Marketing Broschüren und Flyer.";
$qr_code_offline_content2 = "- Mit der rechten Maustaste auf das Bild klicken <strong>Speichern unter</strong>, um es auf ihrem Computer zu speichern.";
$qr_code_online_title = "Online-Vertrieb";
$qr_code_online_content = "Benutzen Sie diesen QR Code für Ihre Webseite, Social Media, Blogs, etc.";
$menu_coupon = "Gutscheincodes";
$coupon_title = "Erhalten sie Ihren Gutscheincode";
$coupon_desc = "Mit diesem Gutscheincode verdienen sie immer dann Geld, wenn jemand darauf klickt!";
$coupon_head_1 = "Gutschein-Code";
$coupon_head_2 = "Discount Abnehmer";
$coupon_head_3 = "Ihr Kommissions Betrag";
$coupon_sale_amt = "der Verkaufsbetrag";
$coupon_flat_rate = "Flatrate";
$coupon_default = "Standardauszahlungsniveau";
$cc_vanity_title = "Einen personalisierten Gutscheincode erhalten";
$cc_vanity_field = "Gutschein-Code";
$cc_vanity_button = "Antrag für einen Gutschein-Code";
$cc_vanity_error_missing = "<strong>Fehler</strong> Bitte geben Sie einen Gutscheincode an.";
$cc_vanity_error_exists = "<strong>Fehler</strong> Sie haben diesen Code bereits angefordert.";
$cc_vanity_error = "<strong>Fehler</strong> Gutscheincode ungültig! Bitte geben sie nur Buchstaben, Zahlen und Unterstriche ein!";
$cc_vanity_success = "<strong>Erfolgreich</strong> Ihr personalisierter Gutschein-Code wurde angefordert!";
$coupon_none = "keine Gutscheincodes verfügbar.";
$pic_error_title = "Fehler beim Hochladen des Bildes";
$pic_missing = "Bitte geben Sie einen Dateinamen ein.";
$pic_invalid = "Bildtyp ist nicht erlaubt! Bildtypen müssen in gif, jpg und png sein.";
$pic_error = "Bild-Upload-Fehler! Kontaktieren Sie bitte den Webmaster.";
$pic_success = "Dein Bild wurde erfolgreich hochgeladen..";
$pic_title = "Laden Sie Ihr Bild hoch";
$pic_info = "Ihre Hochgeladenen Bilder helfen uns, Sie zu personifizieren.";
$pic_bullet_1 = "Bilder können in jpg, gif oder png sein.";
$pic_bullet_2 = "unangebrachte Bilder werden entfernt und Ihr Konto wird gelöscht.";
$pic_bullet_3 = "Ihr Bild wird nicht öffentlich gezeigt! Es wird nur eine Verknüpfung zu ihrem Account zu sehen sein.";
$pic_file = "Wählen Sie eine Datei:";
$pic_button = "Hochladen";
$pic_current = "Mein Aktuelles Bild";
$pic_remove = "Bild entfernen";
$progress_title = "Berechtigung der Auszahlung:";
$progress_complete = "abgeschlossen.";
$progress_none = "Wir haben keinen Mindestauszahlungsbetrag.";
$progress_sentence_1 = "Du hast du verdient";
$progress_sentence_2 = "der";
$progress_sentence_3 = "Anforderung.";
$aff_lib_button = "<b>Ihr kostenloser Zugang zu</b><br>www.AffiliateLibrary.com";
$menu_announcements = "Social Media-Kampagnen";
$announcements_name = "Kampagnenname";
$announcements_facebook_message = "Facebook Nachricht";
$announcements_twitter_message = "Twitter Nachricht";
$announcements_facebook_link = "Facebook Link";
$announcements_facebook_picture = "Facebook Bild";
$general_last_30_days_activity = "Aktivität der letzten 30 Tage";
$general_last_30_days_activity_traffic = "Traffic";
$general_last_30_days_activity_commissions = "Provisionen";
$accountability_title = "Verantwortlichkeit und Kommunikation";
$accountability_text = "<strong>Was ist das?</strong><p>Wir beteiligen uns einen proaktiv an der Schaffung von Vertrauen mit unseren Affiliate-Partnern. Unser Ziel ist es zu gewährleisten, dass wir so viele Informationen wie möglich über jede verdiente oder abgelehnte Provision in unserem System zur Verfügung stellen. </p><strong>Kommunikation</strong><p>Wir können Angaben zu sämtlichen abgelehnten Provisionen Machen. Wir setzen auf starke Kommunikation mit unseren Tochtergesellschaften und fördern Fragen und Feedback.</p>";
$debit_reason_0 = "Nichts";
$debit_reason_1 = "Erstattung";
$debit_reason_2 = "Auslgeichsbuchung";
$debit_reason_3 = "Gemeldete Begtrugsdelikte";
$debit_reason_4 = "Stornierte Bestellungen";
$debit_reason_5 = "Teilweise Rückerstattung";
$menu_drop_pending_debits = "Ausstehende Lastschriften";
$debit_amount_label = "Belastungsbetrag";
$debit_date_label = "Datum der Belastung";
$debit_reason_label = "Grund der Belastung";
$debit_paragraph = "Lastschriften werden von Ihrer nächsten Auszahlung abgezogen.";
$debit_invoice_amount = "Negative Belastung";
$debit_revised_amount = "Revidierter Zahlungsbetrag";
$mv_head_description = "Hinweis: Sie können nur ein Video pro Seite auf Ihrer Website posten.";
$mv_head_source_code = "Fügen Sie diesen Code in die HEAD-Abschnitt des HTML-Dokuments ein.";
$mv_body_title = "Name des Videos";
$mv_body_description = "Beschreibung";
$mv_body_source_code = "Fügen Sie diesen Code in den BODY-Abschnitt des HTML-Dokuments ein, wo das Video angezeigt werden soll.";
$menu_marketing_videos = "Videos";
$mv_preview_button = "Videovorschau";
$dt_no_data = "Keine Daten in der Tabelle vorhanden.";
$dt_showing_exists = "Zeige _START_ bis _END_ der _TOTAL_ Einträge.";
$dt_showing_none = "Zeige 0 bis 0 von 0 Einträge.";
$dt_filtered = "(gefiltet aus _MAX_ total Einträgen)";
$dt_length_choice = "Zeige _MENU_ Einträge.";
$dt_loading = "Wird geladen...";
$dt_processing = "Wird verarbeitet...";
$dt_no_records = "Keine passenden Berichte gefunden.";
$dt_first = "Erster";
$dt_last = "Letzter";
$dt_next = "Nächster";
$dt_previous = "Vorheriger";
$dt_sort_asc = ": aktivieren, um Spalte aufsteigend zu sortieren";
$dt_sort_desc = ": aktivieren, um Spalte absteigend zu sortieren";
$choose_marketing_group = "Wählen Sie eine Marketinggruppe";
$email_already_used_1 = "Konto konnte nicht erstellt werden. Wir erlauben nur";
$email_already_used_2 = "Konto";
$email_already_used_3 = "die pro E-Mail-Adresse erstellt werden dürfen.";
$missing_fax = "Bitte geben Sie Ihre Faxnummer ein.";
$chart_last_6_months = "Bezahlte Provisionen der letzten 5 Monate";
$chart_last_6_months_paid = "Bezahlte Provisionen";
$chart_this_month = "Unsere Top 5 Partner des Monats";
$chart_this_month_none = "Keine Daten zum Anzeigen.";
$login_return = "Zurück zur Partner Startseite";
$login_lost_details = "Geben Sie Ihren Benutezrnamen ein und wir senden Ihnen die Login-Daten per E-Mail zu.";
$account_edit_general_prefs = "Allgemeine Einstellungen";
$account_edit_email_language = "E-Mail Sprache";
$footer_connect = "Vernetzen Sie sich mit uns";
$modal_close = "Schließen";
$vat_amount_heading = "Mehrwertsteuerbetrag";
$menu_logout = "Ausloggen";
$menu_upload_picture = "Laden Sie Ihr Bild hoch";
$menu_offer_testi = "Bieten Sie eine Referenz an";
$fb_login = "Mit Facebook einloggen";
$fb_permissions = "Berechtigungen nicht gewährt. Bitte erlauben Sie der Website Ihre E-Mail-Adresse zu verwenden.";
$announcements_published = "Veröffentlichte Ankündigung";
$training_videos_title = "Schulungsvideos";
$training_videos_general = "Allgemeines Marketing";
$commission_method = "Provisionsverfahren";
$how_will_you_earn = "Wie werden Sie Provisionen verdienen?";
$pm_account_credit = "Wir werden Ihnen die verdienten Provisionen auf Ihrem Konto gutschreiben.";
$pm_check_money_order = " Wir werden Ihnen einen Scheck/eine Zahlungsanweisung per Post schicken.";
$pm_paypal = "Wir werden Ihnen eine PayPay-Zahlung senden.";
$pm_stripe = "Wir werden Ihnen eine Stripe-Zahlung senden.";
$pm_wire = "Wir werden eine Überweisung durchführen.";
$add_to_signup_left_column_text = "<span style=\"color:#CC0000; font-style:italic;\">* Pflichtfeld.</span>";
$paypal_email = "Paypal E-Mail";
$stripe_acct_details = "Stripe Kontodetails";
$stripe_connect = "Sie können sich mit Ihrem Stripe-Konto verbinden, indem Sie nach der Registrierung zu den Einstellungen gehen.";
$stripe_success = "Stripe-Konto erfolgreich verbunden";
$stripe_settings = "Stripe Einstellungen";
$stripe_connect_edit = "Mit Stripe verbinden";
$stripe_delete = "Stripe-Konto löschen";
$stripe_confirm = "Sind Sie sicher, dass Sie dieses Konto löschen möchten?";
$payment_settings = "Zahlungseinstellungen";
$edit_payment_settings = "Zahlungseinstellungen bearbeiten";
$invalid_paypal_address = "Ungültige PayPal E-Mail-Adresse.";
$payment_method_error = "Bitte wählen Sie eine Zahlungsbethode aus.";
$payment_settings_updated = "Zahlungseinstellungen aktualisiert.";
$stripe_removed = "Stripe-Konto wurde entfernt.";
$payment_settings_success = "Erfolgreich!";
$payment_update_notice_1 = "Benachrichtigung!";
$payment_update_notice_2 = "Sie haben sich entschieden eine <strong>[payment_option_here]</strong> Zahlung von uns zu erhalten. Bitte <a href=\"account.php?page=48\" style=\"font-weight:bold;\">klicken Sie hier</a>um Ihr <strong>[payment_option_here]</strong> Konto zu verbinden.";
$pm_title_credit = "Kontogutschrift";
$pm_title_mo = "Scheck oder Zahlungsanweisung";
$pm_title_paypal = "PayPal";
$pm_title_stripe = "Stripe";
$pm_title_wire = "Elektronische Überweisung";
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