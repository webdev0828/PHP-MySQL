<?PHP

//-------------------------------------------------------
	  $language_pack_name = "dutch";
	  $language_pack_table_name = "dutch";
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
$header_title = "Affiliate Programma";
$header_indexLink = "Home";
$header_signupLink = "Nu inschrijven";
$header_accountLink = "Beheer Account";
$header_emailLink = "Contact Ons";
$header_greeting = "Welkom";
$header_nonLogged = "Gast";
$header_logout = "Uitloggen";
$footer_tag = "Affiliate Software By iDevAffiliate";
$footer_copyright = "Copyright 2007";
$footer_rights = "Alle Rechten Voorbehouden";
$index_heading_1 = "Welkom bij ons Webmaster Programma!";
$index_paragraph_1 = "Ons programma is gratis om aan mee te doen, het is makkelijk om je in te schrijven en u heeft er totaal geen technische kennis voor nodig. Webmaster programma\'s zijn een bekend verschijnsel op internet en bieden website eigenaars een goede manier om hun programma uit te breiden. Affiliates genereren meer verkeer voor de commerciele websites en hiervoor in ruil krijgen zij een vergoeding.";
$index_heading_2 = "Hoe werkt het?";
$index_paragraph_2 = "Wanneer u aan ons affiliate programma deelneemt, wordt u voorzien van een groot aantal banners en tekstlinks die U op uw website kunt plaatsen. Wanneer uw bezoeker op de link klikt en bij ons terecht komt, traceren wij de activiteit van deze bezoeker met onze affiliate software. U ontvangt een commissie die is gebaseerd op het door u gekozen commissie type.";
$index_heading_3 = "Real-Time Statistieken en rapportage!";
$index_paragraph_3 = "Log in 24 uur per dag om uw verkopen in te zien en om te controleren hoe goed uw banners en tekstlinks het doen.";
$index_login_title = "Affiliate Login";
$index_login_username = "Gebruikersnaam";
$index_login_password = "Wachtwoord";
$index_login_username_field = "gebruikersnaam";
$index_login_password_field = "wachtwoord";
$index_login_button = "Login";
$index_login_signup_link = "Klik hier om u aan te melden";
$index_table_title = "Programma Details";
$index_table_commission_type = "Commissie Type";
$index_table_initial_deposit = "Initiële inleg";
$index_table_requirements = "Uitbetaling vereisten";
$index_table_duration = "Betaal cyclus";
$index_table_choose = "Kies uit de volgende uitbetaling types.";
$index_table_sale = "Pay-Per-Sale";
$index_table_click = "Pay-Per-Click";
$index_table_sale_text = "Voor iedere verkoop.";
$index_table_click_text = "voor elke klik die u ons stuurt.";
$index_table_deposit_tag = "Alleen maar voor het inschrijven!";
$index_table_requirements_tag = "Minimum bedrag benodigd voor uitbetaling.";
$index_table_duration_tag = "Betalingen worden eens per maand gedaan, over de voorgaande maand.";
$signup_left_column_text = "Neem nu deel aan ons affiliate programma en begin met geld verdienen voor iedere verkoop die u onze kant op stuurt. Maak simpelweg een account aan, plaats de link codes op uw website en zie hoe uw account balans stijgt!";
$signup_left_column_title = "Welkom Affiliate!";
$signup_login_title = "Creëer Uw Account";
$signup_login_username = "Gebruikersnaam";
$signup_login_password = "Wachtwoord";
$signup_login_password_again = "Nogmaals uw wachtwoord";
$signup_login_minmax_chars = "- Gebruikersnaam moet minimaal user_min_chars tekens lang zijn.&lt;br /&gt;- Gebruikersnaam moet alfanumeriek zijn.&lt;br /&gt;- Gebruikersnaam mag deze karakters bevatten: _ (alleen underscores)&lt;br /&gt;&lt;br /&gt;- Wachtwoord moet minimaal pass_min_chars lang zijn.&lt;br /&gt;- Wachtwoord kan alfanumeriek zijn.&lt;br /&gt;- Wachtwoord mag deze karakters bevatten:  characters_allowed";
$signup_login_must_match = "Dit veld moet gelijk zijn aan het wachtwoord veld.";
$signup_standard_title = "Standaard Informatie";
$signup_standard_email = "Email Adres";
$signup_standard_company = "Bedrijfsnaam";
$signup_standard_checkspayable = "Checks uitbetalen aan";
$signup_standard_weburl = "Website Adres";
$signup_standard_taxinfo = "Sofi- of BTWnummer";
$signup_personal_title = "Persoonlijke Informatie";
$signup_personal_fname = "Voornaam";
$signup_personal_state = "Provincie";
$signup_personal_lname = "Achternaam";
$signup_personal_phone = "Telefoonnummer";
$signup_personal_addr1 = "Straatnaam";
$signup_personal_fax = "Faxnummer";
$signup_personal_addr2 = "Huisnummer";
$signup_personal_zip = "PostCode";
$signup_personal_city = "Stad";
$signup_personal_country = "Land";
$signup_commission_title = "Commissie betaling";
$signup_commission_howtopay = "Hoe wilt u betaald worden?";
$signup_commission_style_PPS = "Pay-Per-Sale";
$signup_commission_style_PPC = "Pay-Per-Click";
$signup_terms_title = "Algemene voorwaarden";
$signup_terms_agree = "Ik heb bovenstaande voorwaarden gelezen en ga hiermee akkoord.";
$signup_page_button = "Creëer mijn account";
$signup_success_email_comment = "Wij hebben u een email gestuurd met uw Gebruikersnaam en Wachtwoord.\r\nBewaar deze goed voor het geval dat u die in de toekomst nodig heeft.";
$signup_success_login_link = "Login bij uw account";
$custom_fields_title = "Extra informatie";
$logout_msg = "U bent nu uitgelogdBedankt voor uw deelname aan ons programma!";
$signup_page_success = "Uw account is gecreëerd";
$login_left_column_title = "Account Login";
$login_left_column_text = "Vul uw gebruikersnaam en wachtwoord in om toegang te krijgen tot uw Account Statistieken, banners, link codes, FAQ en meer.Indien u uw wachtwoord niet meer weet, vult u dan uw gebruikersnaam in en wij zenden uw login informatie naar u via email.";
$login_title = "Login bij uw account";
$login_username = "Gebruikersnaam";
$login_password = "Wachtwoord";
$login_invalid = "Ongeldige login";
$login_now = "Login bij mijn Account";
$login_send_title = "Heeft u uw wachtwoord nodig?";
$login_send_username = "Vul uw gebruikersnaam in";
$login_send_info = "Login gegevens zijn naar uw email adres gezonden";
$login_send_pass = "Naar email verzenden";
$login_send_bad = "Gebruikersnaam niet gevonden";
$help_new_password_heading = "Nieuw Wachtwoord";
$help_new_password_info = "Uw wachtwoord moet minimaal pass_min_chars bevatten. Dat mogen alleen letters, nummers en deze tekens zijn:  characters_allowed";
$help_confirm_password_heading = "Bevestig nieuw Wachtwoord";
$help_confirm_password_info = "Dit Wachtwoord veld moet overeen komen met het Nieuw Wachtwoord veld.";
$help_custom_links_heading = "Tracking Sleutelwoord";
$help_custom_links_info = "Uw sleutelwoord mag niet langer zijn dan 30 tekens. Het mag alleen uit cijfers, letters en koppeltekens bestaan.";
$error_title = "De volgende foutmeldingen zijn er.";
$username_invalid = "Ongeldige gebruikersaam. Die mag alleen letters, nummers en underscores bevatten.";
$username_taken = "De gebruikersnaam die u hebt gekozen is al in gebruik.";
$username_short = "Uw gebruikersnaam is te kort, deze moet minimaal 4 tekens lang zijn.";
$username_long = "Uw gebruikersnaam is te lang, maximaal aantal tekens is 12.";
$password_invalid = "Ongeldig wachtwoord. Dat mag alleen letters, nummers en deze tekens bevatten:  characters_allowed";
$password_short = "Uw wachtwoord is te kort, deze moet minimaal 4 tekens lang zijn.";
$password_long = "Uw wachtwoord is te lang, maximaal aantal tekens is 12.";
$password_mismatch = "Uw wachtwoorden komen niet overeen.";
$missing_checks = "Vul a.u.b. een geadresseerde in als ontvanger van de cheques.";
$missing_tax = "Vul a.u.b. uw sofi- of BTW-nummer in.";
$missing_fname = "Vul a.u.b. uw voornaam in.";
$missing_lname = "Vul a.u.b. uw achternaam in.";
$missing_email = "Vul a.u.b. uw emailadres in.";
$invalid_email = "Uw email adres is ongeldig.";
$missing_address = "Vul a.u.b. uw straatnaam in.";
$missing_city = "Vul a.u.b. uw stad in.";
$missing_company = "Vul a.u.b. uw bedrijfsnaam in.";
$missing_state = "Vul a.u.b. uw provincie in.";
$missing_zip = "Vul a.u.b. uw postcode in.";
$missing_phone = "Vul a.u.b. telefoonnummer in.";
$missing_website = "Vul a.u.b. uw website adres in.";
$missing_paypal = "U heeft gekozen voor PayPal betalingen, Vul a.u.b. uw PayPal account in.";
$missing_terms = "U heeft onze voorwaarden niet geaccepteerd.";
$paypal_required = "Een PayPal account is noodzakelijk voor uitbetaling.";
$missing_custom = "Vul a.u.b. het volgende veld juist in:";
$account_total_transactions = "Totaal aantal Transactie\'s";
$account_standard_linking_code = "Standaard Link Code - Perfect in emails!";
$account_copy_paste = "Kopieer en plak de bovenstaande code in uw website of emails";
$account_not_approved = "Uw account wacht op goedkeuring";
$account_suspended = "Uw account is op non-actief gesteld";
$account_standard_earnings = "Standaard verdiensten";
$account_inc_bonus = "inclusief bonus";
$account_second_tier = "Tier verdiensten";
$account_recurring = "Terugkerende verdiensten";
$account_not_available = "N/A";
$account_earned_todate = "Totaal verdiend tot vandaag";
$menu_heading_overview = "Account Overzicht";
$menu_general_stats = "Algemene Statistieken";
$menu_tier_stats = "Tier Statistieken";
$menu_payment_history = "Betalings historie";
$menu_commission_details = "Commissie Details";
$menu_recurring_commissions = "Terugkerende Commissies";
$menu_traffic_log = "Inkomend verkeer overzicht";
$menu_heading_marketing = "Marketing Materiaal";
$menu_banners = "Banners";
$menu_text_ads = "Tekst Ads";
$menu_text_links = "Tekst Links";
$menu_email_links = "Email Links";
$menu_html_links = "HTML Ads";
$menu_offline = "Offline Marketing";
$menu_tier_linking_code = "Tier Link Code";
$menu_email_friends = "Email vrienden en relaties";
$menu_custom_links = "Creëer en Traceer uw eigen links";
$menu_heading_management = "Account Management";
$menu_comalert = "CommissionAlert Setup";
$menu_comstats = "CommissionStats Setup";
$menu_edit_account = "Wijzig mijn Account";
$menu_change_pass = "Verander mijn Wachtwoord";
$menu_change_commission = "Verander mijn commissie type";
$menu_heading_general_info = "Algemene Informatie";
$menu_browse_affiliates = "Browse andere Affiliates";
$menu_faq = "Veel gestelde vragen";
$suspended_title = "Account Status Notificatie";
$suspended_heading = "Uw Account is momenteel inactief";
$suspended_notes = "Bericht van de beheerder";
$pending_title = "Account Status Notificatie";
$pending_heading = "Uw Account wacht op goedkeuring";
$pending_note = "Zodra wij uw account hebben goedgekeurd, worden onze marketing middelen beschikbaar gesteld.";
$faq_title = "Veel gestelde vragen";
$faq_none = "Nog geen veel gestelde vragen";
$browse_title = "Browse andere Affiliates";
$browse_none = "Geen andere affiliates om te bekijken";
$change_comm_title = "Verander soort commissie";
$change_comm_curr_comm = "Huidige soort commissie";
$change_comm_curr_pay = "Huidig minimum bedrag";
$change_comm_new_comm = "Nieuw soort commissie";
$change_comm_warning = "Indien u het soort commissie verandert, wordt uw account op Payout Level 1 gezet";
$change_comm_button = "Verander soort commissies";
$change_comm_no_other = "Geen ander soort commissie beschikbaar";
$change_comm_level = "Level";
$change_comm_updated = "soort commissie bijgewerkt";
$password_title = "Verander mijn wachtwoord";
$password_old_password = "Oud Wachtwoord";
$password_new_password = "Nieuw Wachtwoord";
$password_confirm_password = "Bevestig nieuw Wachtwoord";
$password_button = "Verander Wachtwoord";
$password_warning_old_missing = "Oud Wachtwoord Is Incorrect of Ontbreekt";
$password_warning_new_missing = "Nieuw wachtwoord niet ingevuld";
$password_warning_mismatch = "Nieuw wachtwoord klopt niet";
$password_warning_invalid = "Wachtwoord Ongeldig - Klik op de Help link";
$password_notice = "Wachtwoord Bijgewerkt";
$edit_failed = "Update Mislukt - Zie bovenstaande foutmeldingen";
$edit_success = "Account Bijgewerkt";
$edit_button = "Wijzig mijn Account";
$commissionstats_title = "CommissionStats Setup";
$commissionstats_info = "Indien u CommissionStats installeerd, kunt u uw stats direct zien, vanaf uw eigen desktop! Om deze functie te installeren, download u CommissionStats en unzip het pakket op uw computer. Hierna voert u het setup.exe bestand uit. Wanneer u gevraagd wordt om uw login gegevens, vult u dan de volgende gegevens in.";
$commissionstats_hint = "Hint: Kopiëer & Plak elk veld om zeer accuraat te werk te gaan";
$commissionstats_profile = "Profiel naam";
$commissionstats_username = "Gebruikersnaam";
$commissionstats_password = "Wachtwoord";
$commissionstats_id = "Affiliate ID";
$commissionstats_source = "Bron Pad URL";
$commissionstats_download = "Download CommissionStats";
$commissionalert_title = "CommissionAlert Setup";
$commissionalert_info = "Met het gebruik van CommissionAlert stellen wij u direct op de hoogte van nieuwe commissies, gewoon op uw eigen Desktop! Om dit unieke programma te installeren, download u CommissionAlert en unzip het pakket op uw computer. Hierna voert u het setup.exe bestand uit. Wanneer u gevraagd wordt om uw login gegevens, vult u dan de volgende gegevens in.";
$commissionalert_hint = "Hint: Kopieer & Plak elk veld om zeer accuraat te werk te gaan";
$commissionalert_profile = "Profiel naam";
$commissionalert_username = "Gebruikersnaam";
$commissionalert_password = "Wachtwoord";
$commissionalert_id = "Affiliate ID";
$commissionalert_source = "Bron pad URL";
$commissionalert_download = "Download CommissionAlert";
$offline_title = "Offline Marketing";
$offline_paragraph_one = "Verdien geld met de promotie van onze websites bij uw vrienden en relaties.";
$offline_send = "Zend bezoekers naar";
$offline_page_link = "bekijk pagina";
$offline_paragraph_two = "Uw klanten zullen uw Affiliate ID nummer in het blok hierboven invullen, waardoor u als de affiliate wordt geregistreerd bij iedere verkoop die zij doen.";
$banners_title = "Banners";
$banners_size = "Banner Grootte";
$banners_description = "Banner Omschrijving";
$ad_title = "Tekst Ads";
$ad_info = "Indien u de aangegeven link code gebruikt, kunt u de kleuren schema\'s, hoogte en breedte van uw tekst advertentie makkelijk integreren met uw eigen website!";
$links_title = "Tekst Links";
$email_title = "Email Links";
$email_group = "Marketing Groep";
$email_button = "Laat Email Links Zien";
$email_no_group = "Geen Groep Geselecteerd";
$email_choose = "Kies a.u.b. een marketing groep hierboven";
$email_notice = "Marketing Groepen kunnen afzonderlijke binnenkomende pagina\'s hebben";
$email_ascii = "ASCII/Tekst Versie - Om te gebruiken in Plain Tekst emails.";
$email_html = "HTML Versie - Om te gebruiken in HTML emails.";
$email_test = "Test Link";
$email_test_info = "Dit is waar uw bezoekers onze website binnenkomen";
$email_source = "Bron Code - Kopieer/Plak in uw Email bericht";
$html_title = "HTML Ads";
$html_view_link = "Bekijk deze HTML Advertentie";
$traffic_title = "Binnekomend verkeer Log";
$traffic_display = "Laat de laatste zien";
$traffic_display_visitors = "Bezoekers";
$traffic_button = "Bekijk Verkeer Log";
$traffic_title_details = "Binnenkomend Verkeer Details";
$traffic_ip = "IP Adres";
$traffic_refer = "Referring URL";
$traffic_date = "Datum";
$traffic_time = "Tijd";
$traffic_bottom_tag_one = "Laat de laatste zien";
$traffic_bottom_tag_two = "of";
$traffic_bottom_tag_three = "Totaal Aantal Unieke Bezoekers";
$traffic_none = "Er is geen Traffic Log";
$traffic_no_url = "N/A - Eventuele Bookmark of Email Link";
$traffic_box_title = "Gehele Referring URL";
$traffic_box_info = "Klik de link om de website te bezoeken";
$payment_title = "Betalings Historie";
$payment_date = "Betaal datum";
$payment_commissions = "Commissies";
$payment_amount = "Betaalhoeveelheid";
$payment_totals = "Totalen";
$payment_none = "Er is geen betalings historie";
$tier_stats_title = "Tier Statistieken";
$tier_stats_accounts = "Tier Accounts";
$tier_stats_grab_link = "Pak hier uw Tier Link Code";
$tier_stats_none = "Er is geen Tier Account";
$tier_stats_username = "Gebruikersnaam";
$tier_stats_current = "Huidige Commissies";
$tier_stats_previous = "Vorige Uitbetalingen";
$tier_stats_totals = "Totalen";
$recurring_title = "Terugkerende Commissies";
$recurring_none = "Er zijn geen terugkerende commissies";
$recurring_date = "Commissie Datum";
$recurring_status = "Terugkerende Status";
$recurring_payout = "Volgende betaling";
$recurring_amount = "Hoeveelheid";
$recurring_every = "Iedere";
$recurring_in = "In";
$recurring_days = "Dagen";
$recurring_total = "Totaal";
$tlinks_title = "Voeg anderen aan uw Tier toe en verdien ook geld aan hen!";
$tlinks_embedded_one = "Tier Signups worden reeds toegekend in uw standaard affiliate links!";
$tlinks_embedded_two = "U wordt de bovenste lijn (tier) van iedere webmaster die zich inschrijft voro ons affiliate programma via uw link.";
$tlinks_embedded_current = "Huidige Tier Uitbetaling";
$tlinks_forced_two = "Gebruik de volgende code om ons programma bij andere webmasters te promoten.";
$tlinks_forced_code = "Tekst Link Code";
$tlinks_forced_paste = "Kopieer/Plak het bovenstaande in uw website";
$tlinks_forced_money = "Webmasters Verdienen Hier Geld!";
$comdetails_title = "Commissie Details";
$comdetails_date = "Commissie Datum";
$comdetails_time = "Commissie Tijd";
$comdetails_type = "Commissie Type";
$comdetails_status = "Huidige Status";
$comdetails_amount = "Commissie Hoeveelheid";
$comdetails_additional_title = "Additionele Commissie Details";
$comdetails_additional_ordnum = "Order Nummer";
$comdetails_additional_saleamt = "Verkoop hoeveelheid";
$comdetails_type_1 = "Bonus Commissie";
$comdetails_type_2 = "Terugkerende Commissie";
$comdetails_type_3 = "Tier Commissie";
$comdetails_type_4 = "Standaard Commissie";
$comdetails_status_1 = "Betaald";
$comdetails_status_2 = "Goedgekeurd - In afwachting van Betaling";
$comdetails_status_3 = "In afwachting van goedkeuring";
$comdetails_not_available = "N/A";
$details_title = "Commissie Details";
$details_drop_1 = "Huidige standaard commissie";
$details_drop_2 = "Huidige Tier Commissie";
$details_drop_3 = "Commissies in afwachting van goedkeuring";
$details_drop_4 = "Uitbetaalde Standaard Commissies";
$details_drop_5 = "Uitbetaalde Tier Commissies";
$details_button = "Bekijk Commissies";
$details_date = "Datum";
$details_status = "Status";
$details_commission = "Commissie";
$details_details = "Bekijk Details";
$details_type_1 = "Betaald";
$details_type_2 = "In afwachting van goedkeuring";
$details_type_3 = "Goedgekeurd - in afwachting van uitbetaling";
$details_none = "Geen Commissies Om Te Bekijken";
$details_no_group = "Geen Commissie Groep Geselecteerd";
$details_choose = "Kies a.u.b. een Commissie Groep hierboven";
$general_title = "Huidige Commissies - Vanaf de laatste uitbetaling tot vandaag";
$general_transactions = "Transacties";
$general_earnings_to_date = "Verdiensten tot vandaag";
$general_history_link = "Bekijk uitbetalings historie";
$general_standard_earnings = "Standaard Verdiensten";
$general_current_earnings = "Huidige verdiensten";
$general_traffic_title = "Verkeer Statistieken";
$general_traffic_visitors = "Bezoekers";
$general_traffic_unique = "Unieke Bezoekers";
$general_traffic_sales = "Totaal Verkopen";
$general_traffic_ratio = "Verkoop Ratio";
$general_traffic_info = "Totaal Verkopen en Verkoop RatioDeze statistieken omvatten niet de terugkerende of tier commissies.";
$general_traffic_pay_type = "Betalings Type";
$general_traffic_pay_level = "Huidig betalings type";
$general_notes_title = "Bericht(en) van de beheerder";
$general_notes_date = "Creëer datum";
$general_notes_to = "Aan";
$general_notes_all = "Alle Affiliates";
$general_notes_none = "Geen berichten om te bekijken";
$contact_left_column_title = "Neem contact met ons op";
$contact_left_column_text = "Voelt u vrij om contact met onze affiliate manager op te nemen door middel van het formulier rechts.";
$contact_title = "Neem contact met ons op";
$contact_name = "Uw Naam";
$contact_email = "Uw Email Adres";
$contact_message = "Bericht";
$contact_chars = "tekens over";
$contact_button = "Verzend bericht";
$contact_received = "Wij hebben uw bericht ontvangen, het kan tot 24 uur duren voordat u een reaktie ontvangt.";
$contact_invalid_name = "Ongeldige Naam";
$contact_invalid_email = "Ongeldig Email Adres";
$contact_invalid_message = "Ongeldig Bericht";
$invoice_button = "Faktuur";
$invoice_header = "FAKTUUR AFFILIATE BETALING";
$invoice_aff_info = "Affiliate Informatie";
$invoice_co_info = "Informatie";
$invoice_acct_info = "Account Informatie";
$invoice_payment_info = "Betaling Informatie";
$invoice_comm_date = "Betalings Datum";
$invoice_comm_amt = "Hoeveelheid Commissie";
$invoice_comm_type = "Commissie Type";
$invoice_admin_note = "Bericht Van De Beheerder";
$invoice_footer = "EINDE FAKTUUR";
$invoice_print = "Print Faktuur";
$invoice_none = "N/A";
$invoice_aff_id = "Affiliate ID";
$invoice_aff_user = "Gebruikersnaam";
$menu_pdf_marketing = "PDF marketingbrochures";
$menu_pdf_training = "PDF trainingsdocumenten";
$marketing_target_url = "Doel URL";
$marketing_source_code = "Broncode ֠In uw website kopi쳥n/plakken";
$marketing_group = "Marketinggroep";
$peels_title = "Page peel naam";
$peels_view = "Deze peel bekijken";
$peels_description = "Page peel beschrijven";
$lb_head_title = "Vereiste HEAD code voor uw HTML pagina";
$lb_head_description = "Om een lightbox op uw website te gebuiken dient u de volgende regels aan de head sectie van de pagina die u weer wilt laten geven toe te voegen.";
$lb_head_source_code = "Plak deze code in de HEAD sectie van uw HTML document.";
$lb_head_code_notes = "U hoeft deze code slechts eenmaal te plaatsen, onafhankelijk van hoeveel lightboxen u op de pagina plaatst.";
$lb_head_tutorial = "Tutorial bekijken";
$lb_body_title = "Lightbox naam";
$lb_body_description = "Lightbox beschrijving";
$lb_body_click = "Klik op de bovenstaande afbeelding om de lightbox te bekijken.";
$lb_body_source_code = "Plak deze code in de BODY sectie van uw HTML document waar u wilt dat de afbeelding verschijnt.";
$pdf_title = "PDF";
$pdf_training = "Trainingsdocumenten";
$pdf_marketing = "Marketingbrochures";
$pdf_description_1 = "Adobe Reader is vereist om ons PDF marketingmateriaal te bekijken en af te drukken.";
$pdf_description_2 = "Adobe Reader is een gratis download van de Adobe website.";
$pdf_file_name = "Bestandsnaam";
$pdf_file_size = "Bestandsgrootte";
$pdf_file_description = "Omschrijving";
$pdf_bytes = "Bytes";
$menu_heading_training_materials = "Trainingmateriaal";
$menu_videos = "Trainingsvideoӳ bekijken";
$menu_custom_manual = "Handleiding Op maat gemaakte tracking links";
$menu_page_peels = "Page peels";
$menu_lightboxes = "Lightboxen";
$menu_email_templates = "E-mail sjablonen";
$menu_heading_custom_links = "Op maat gemaakte tracking links";
$menu_custom_reports = "Rapporten";
$menu_keyword_links = "Tracking links op trefwoord";
$menu_subid_links = "Tracking links op subdochteronderneming";
$menu_alteranate_links = "Binnenkomende paginalinks afwisselen";
$menu_heading_additional = "Extra hulpmiddelen";
$menu_drop_heading_stats = "Algemene stats";
$menu_drop_heading_commissions = "Commissies";
$menu_drop_heading_history = "Betalingshistorie";
$menu_drop_heading_traffic = "Verkeerslog";
$menu_drop_heading_account = "Mijn account";
$menu_drop_heading_logo = "Mijn logo uploaden";
$menu_drop_heading_faq = "FAQ";
$menu_drop_general_stats = "Algemene statistieken";
$menu_drop_tier_stats = "Tier statistieken";
$menu_drop_current = "Huidige commissies";
$menu_drop_tier = "Huidige tier commissies";
$menu_drop_pending = "In afwachting van goedkeuring";
$menu_drop_paid = "Betaalde goedkeuring";
$menu_drop_paid_rec = "Betaalde tier commissies";
$menu_drop_recurring = "Actieve periodieke commissies";
$menu_drop_edit = "Mijn account bewerken";
$menu_drop_password = "Mijn wachtwoord wijzigen";
$menu_drop_change = "Mijn commissiestijl wijzigen";
$account_hidden = "verborgen";
$keyword_title = "Op maat gemaakte trefwoordlinks";
$keyword_info = "Het aanmaken van een op maat gemaakte trefwoordlink biedt u de mogelijkheid binnenkomend verkeer op verscheidene bronnen te controleren.Maak een link aan met tot maximaal 4 verschillende trefwoorden, waarna het op maat gemaakte tracking rapport u voor elk trefwoord dat u aanmaakt een gedetailleerd rapport toont.";
$keyword_heading = "Beschikbare variabelen voor op maat gemaakte tracking op trefwoord";
$keyword_tracking = "Tracking ID";
$keyword_build = "Om uw link te bouwen, neem de volgende URL en voeg deze toe aan de Tracking ID en het trefwoord dat u wilt gebruiken.";
$keyword_example = "Voorbeeld";
$keyword_tutorial = "De tutorial bekijken";
$sub_tracking_title = "Tracking op subdochteronderneming";
$sub_tracking_info = "Het aanmaken van een link voor subdochterondernemingen biedt u de mogelijkheid uw dochterondernemingslink door te geven aan uw eigen dochterondernemingen, zodat deze ze kunnen gebruiken. U weet wie de commissie voor u gegenereerd heeft, omdat wij aan u rapporteren welke van uw subdochterondernemingen de verkoop gegenereerd heeft. Nog een reden om een subdochterondernemingslink te gebruiken is dat als u uw eigen tracking systeem heeft, wilt u dat deze opgenomen wordt in de rapportage.";
$sub_tracking_build = "Vervang de XXX door het ID-nummer van de dochteronderneming in uw dochterondernemingsprogramma.Herhaal dit proces voor al uw dochterondernemingen.";
$sub_tracking_example = "Voorbeeld";
$sub_tracking_tutorial = "Tutorial bekijken";
$sub_tracking_id = "Dochteronderneming ID";
$alternate_title = "Afwisselend binnenkomende paginalinks";
$alternate_option_1 = "Optie 1: Geautomatiseerde aanmaak van links";
$alternate_heading_1 = "Geautomatiseerde aanmaak van links";
$alternate_info_1 = "Definieer uw binnenkomende verkeerspagina door de URL in te voeren waarheen u verkeer naar afgeleverd will hebben, waarna wij een link voor u zullen aanmaken. Door gebruik te maken van dit onderdeel wordt er een kortere link voor u aangemaakt om te gebruiken met de URL ingebed in de link met behulp van een ID-nummer in onze database.";
$alternate_button = "Mijn link aanmaken";
$alternate_links_heading = "Mijn afwisselend binnenkomende URL links";
$alternate_links_note = "Bestaande links blijven intact en functioneel als u een op maat gemaakte link van deze pagina verwijdert.";
$alternate_links_remove = "verwijder";
$alternate_option_2 = "Optie 2: Manuele aanmaak van links";
$alternate_info_2 = "Als u uw eigen dochterondernemingslinks liever toevoegt met een afwisselend binnenkomende URL, gebruik dan de volgende structuur.";
$alternate_variable = "Afwisselend binnenkomende URL variabele";
$alternate_example = "Voorbeeld";
$alternate_build = "Om uw link te bouwen, neem de volgende URL en voeg deze toe aan de afwisselend binnenkomende URL die u wilt gebruiken.";
$alternate_none = "Geen afwisselend binnenkomende links aangemaakt";
$alternate_tutorial = "Tutorial bekijken";
$cr_title = "Op maat gemaakt trefwoordrapport";
$cr_select = "Een trefwoord selecteren";
$cr_button = "Rapport genereren";
$cr_no_results = "Geen zoekresultaten gevonden";
$cr_no_results_info = "Probeer een andere trefwoordcombinatie";
$cr_used = "Gebruikte trefwoorden";
$cr_found = "Deze link gevonden";
$cr_times = "Keer";
$cr_unique = "Unieke links gevonden";
$cr_detailed = "Gedetailleerd linkrapport";
$cr_export = "Rapport exporteren naar Excel";
$cr_none = "Geen trefwoorden gevonden";
$logo_title = "Uw bedrijfslogo uploaden";
$logo_info = "Als u uw bedrijfslogo graag wilt uploaden, geven wij dit weer aan klanten die u aan onze website levert.Dit stelt ons in staat de ervaring van uw klanten te personaliseren wanneer deze ons bezoeken.";
$logo_bullet_one = "Afbeeldingen kunnen in .jpg, .gif of .png zijn.Flashinhoud is niet toegestaan.";
$logo_bullet_two = "Ongeschikte afbeeldingen worden verwijderd en uw account opgeschort.";
$logo_bullet_three = "Uw afbeelding/logo wordt niet op onze website getoond totdat we deze/dit hebben goedgekeurd.";
$logo_bullet_size_one = "Afbeeldingen mogen een maximale breedte hebben van";
$logo_bullet_size_two = "pixels en een maximale hoogte van";
$logo_bullet_req_size_one = "Afbeeldingen dienen een breedte te hebben van";
$logo_bullet_req_size_two = "pixels en een hoogte van";
$logo_bullet_pixels = "pixels.";
$logo_choose = "Een afbeelding kiezen";
$logo_file = "Een bestand selecteren:";
$logo_browse = "Browsen...";
$logo_button = "Uploaden";
$logo_current = "Mijn huidige afbeelding";
$logo_remove = "verwijder";
$logo_display_status = "Afbeeldingsstatus:";
$logo_pending = "In afwachting van goedkeuring";
$logo_approved = "Goedgekeurd";
$logo_success = "De afbeelding is geupload en is nu in afwachting van goedkeuring.";
$signup_security_title = "Account verificatie";
$signup_security_info = "Voer de in het vakje getoonde veiligheidscode in.Deze stap helpt ons automatische aanmeldingen te voorkomen.";
$signup_security_code = "Veiligheidscode";
$sub_tracking_none = "Geen";
$missing_security_code = "Onjuiste of ontbrekende account verificatie / veiligheidscode";
$alternate_success_title = "Aanmaak link gelukt";
$alternate_success_info = "Grijp uw link hieronder en begin met het afleveren van verkeer naar uw gedefinieerde URL.";
$alternate_failed_title = "Fout bij het aanmaken van link";
$alternate_failed_info = "Voer een geldige URL in";
$logo_missing_filename = "Kies een bestandsnaam.";
$logo_required_width = "Breedte afbeelding moet het volgende zijn";
$logo_required_height = "Hoogte afbeelding moet het volgende zijn";
$logo_maximum_width = "Breedte afbeelding kan slechts het volgende zijn";
$logo_maximum_height = "Hoogte afbeelding kan slechts het volgende zijn";
$logo_size_maximum = "Grootte afbeelding mag slechts maximaal het volgende zijn";
$logo_bad_filetype = "Afbeeldingstype is niet toegestaan. Toegestane afbeeldingstypen zijn .gif, .jpg en .png.";
$logo_upload_error = "Fout bij uploaden afbeelding, neem contact op met de manager van de dochteronderneming.";
$logo_error_title = "Fout bij uploaden afbeelding";
$logo_error_bytes = "bytes.";
$excel_title = "Op maat gemaakt rapport met trefwoordlinks";
$excel_tab_report = "Op maat gemaakt trefwoordrapport";
$excel_tab_logs = "Verkeerslogs";
$excel_date = "Rapportdatum:";
$excel_affiliate = "Dochteronderneming ID:";
$excel_criteria = "Trefwoordlinkcriteria";
$excel_link = "Linkstructuur";
$excel_hits = "Unieke hits";
$excel_comm_stats = "Commissiestatistieken";
$excel_comm_current = "Actuele commissies";
$excel_comm_paid = "Betaalde commissies";
$excel_comm_total = "Totale commissies";
$excel_comm_ratio = "Conversieverhouding";
$excel_earned = "Verdiende commissies";
$excel_earned_current = "Actuele commissies";
$excel_earned_paid = "Betaalde commissies";
$excel_earned_total = "Totale verdiende commissies";
$excel_earned_tab = "Klik op het tabblad voor verkeerslogs (hieronder) om het verkeerslog voor deze op maat gemaakte link te bekijken.";
$excel_log_title = "Op maat gemaakt verkeerslog met trefwoorden";
$excel_log_ip = "IP-adres";
$excel_log_refer = "Verwijzings-URL";
$excel_log_date = "Datum";
$excel_log_time = "Tijd";
$excel_log_target = "Doel URL";
$etemplates_title = "E-mail sjablonen";
$etemplates_view_link = "Dit e-mail sjabloon bekijken";
$etemplates_name = "Sjabloonnaam";
$signup_maintenance_heading = "Onderhouds Berichtgeving";
$signup_maintenance_info = "Aanmeldingen tijdelijk niet mogelijk. Probeer het later nogmaals.";
$marketing_group_title = "Marketing Groep";
$marketing_button = "Weergave";
$marketing_no_group = "Geen Groep Geselecteerd";
$marketing_choose = "Gaarne Hierboven Een Marketing Groep Selecteren";
$marketing_notice = "Mogelijk Verschillend Verkeer Van Inkomende Paginas Voor Marketing Groepen";
$canspam_heading = "CAN-SPAM Regels en Acceptatie";
$canspam_accept = "Ik heb bovenstaande CAN-SPAM regels gelezen, begrepen en geaccepteert.";
$canspam_error = "U heeft de CAN-SPAM regels niet geaccepteerd.";
$signup_banned = "Er is een fout opgetreden tijdens het account aanmaken. Neemt u gaarne contact op met de systeem beheerder voor meer informatie.";
$header_testimonials = "Testimonium";
$testi_visit = "Bezoek Website";
$testi_description = "Geef uw testimonium en wij zullen deze plaatsen op onze &lt;a href=&quot;testimonials.php&quot;&gt;Testimonium&lt;/a&gt; pagina met een link naar uw website.";
$testi_name = "Naam";
$testi_url = "Website URL";
$testi_content = "Testimonium";
$testi_code = "Beveiligings Code";
$testi_submit = "Verstuur Testimonium";
$testi_na = "Testimoniums zijn niet beschikbaar.";
$testi_title = "Geef een Testimonium.";
$testi_success_title = "Testimonium Succesvol ";
$testi_success_message = "Bedankt voor het versturen van uw Testimonium. Ons team zal het spoedig herzien.";
$testi_error_title = "Testimonium foutmelding";
$testi_error_name_missing = "Plaats gaarne uw naam bij uw Testimonium.";
$testi_error_url_missing = "Plaats gaarne uw website URL bij uw Testimonium.";
$testi_error_missing = "Plaats gaarne uw text voor uw Testimonium.";
$menu_drop_delayed = "Vertraagde commissies";
$details_drop_6 = "Huidige Vertraagde commissies";
$details_type_6 = "Vertraagd - Zal snel goed gekeurd worden.";
$comdetails_status_6 = "Vertraagd - Zal snel goed gekeurd worden";
$tc_reaccept_title = "Notificatie Verandering van Algemene Voorwaarden";
$tc_reaccept_sub_title = "Om toegang te krijgen tot uw account moet u onze nieuwe algemene voorwaarden accepteren.";
$tc_reaccept_button = "Ik heb bovenstaande algemene voorwaarden gelezen, begrepen en geaccepteert.";
$tlinks_active = "Aantal Actieve Niveaus";
$tlinks_payout_structure = "Niveau Uitbetalings Structuur";
$tlinks_level = "Niveau";
$tierText1 = "% Berekent van het bedrag van geassocieerde partners commissie.";
$tierText2 = "% Berekent van hoog niveau commissie bedrag.";
$tierText3 = "% Berekent van het verkoop bedrag.";
$tierTextflat = "Vast tarief.";
$edit_custom_button = "Wijzig Antwoord";
$private_heading = "Prive Aannmelding";
$private_info = "Ons programma voor geassocieerde partners is niet publiekelijk toegangelijk en vereist een aanmeldigings code.Informatie voor het verkrijgen van een aanmeldigings code zou hier moeten staan.";
$private_required_heading = "Aanmeldigings Code Vereist";
$private_code_title = "Vul Aanmeldigings Ccode In";
$private_button = "Verstuur Code";
$private_error_title = "Incorrecte Aanmeldigings Code Ingevult";
$private_error_invalid = "De aanmeldigings code die u heeft ingevult is incorrect.";
$private_error_expired = "De aanmeldigings code die u heeft ingevult is verlopen en niet langer geldig.";
$qr_code_title = "QR Codes";
$qr_code_size = "QR Code Grootte";
$qr_code_button = "Weergave QR Code";
$qr_code_offline_title = "Offline Marketing";
$qr_code_offline_content1 = "Voeg deze QR code toe aan uw marketing brochures, flyers, visite kaartjes, etc.";
$qr_code_offline_content2 = "- Rechter muisknop klik op het afbeelding <strong>bewaar als</strong> en het word opgeslagen op uw computer.";
$qr_code_online_title = "Online Marketing";
$qr_code_online_content = "Voeg deze QR code toe aan uw website, social media, blogs, etc.";
$menu_coupon = "Coupon Codes";
$coupon_title = "Uw Beschikbare Coupon Codes";
$coupon_desc = "Verstrek deze coupon codes en verdien een commissie elke keer als iemand deze code gebruikt!";
$coupon_head_1 = "Coupon Code";
$coupon_head_2 = "Korting Aan Klant";
$coupon_head_3 = "Uw Commissie Bedrag";
$coupon_sale_amt = "van verkoop bedrag";
$coupon_flat_rate = "vast tarief";
$coupon_default = "Standaard Uitbetalings Niveau";
$cc_vanity_title = "Vraag Een Persoonlijke Coupon Code Aan";
$cc_vanity_field = "Coupon Code";
$cc_vanity_button = "Vraag Coupon Code Aan";
$cc_vanity_error_missing = "<strong>Foutmelding!</strong> Gaarne een coupon code invullen.";
$cc_vanity_error_exists = "<strong>Foutmelding!</strong> U heeft deze code al aangevraagd. Het is in afwachting van goedkeuring.";
$cc_vanity_error = "<strong>Foutmelding!</strong> Coupon code is niet correct. Gaarne alleen letters, nummers en liggende streepjes gebruiken.";
$cc_vanity_success = "<strong>Succes!</strong> Uw persoonlijke coupon code is aangevraagd.";
$coupon_none = "Momenteel geen coupon codes beschikbaar.";
$pic_error_title = "Afbeelding Upload Foutmelding";
$pic_missing = "Kies gaarne een bestandsnaam.";
$pic_invalid = "Afbeeldings type is niet toegestaan. Toegestane afbeelding types zijn .gif, .jpg en .png.";
$pic_error = "Afbeelding upload foutmelding, neem gaarne contact op met de manager van de geassocieerde partner.";
$pic_success = "Uw foto is succesvol geupload.";
$pic_title = "Upload Uw Foto";
$pic_info = "Het uploaden van uw foto maakt onze interactie met u persoonlijker.";
$pic_bullet_1 = "Afbeeldingen mogen .jpg, .gif of .png. formaat zijn";
$pic_bullet_2 = "Ongepaste afbeeldingen zullen verwijdert worden en uw account geschorst.";
$pic_bullet_3 = "Uw foto zal niet openbaar zichtbaar zijn. Het is alleen toegevoegt aan uw account voor ons overzicht.";
$pic_file = "Selecteer Een Bestand:";
$pic_button = "Upload";
$pic_current = "Mijn Huidige Foto";
$pic_remove = "Verwijder Foto";
$progress_title = "Kwalificatie voor de volgende uitbetaling:";
$progress_complete = "compleet.";
$progress_none = "Wij hebben geen minimum uitbetalings bedrag.";
$progress_sentence_1 = "U heeft verdient";
$progress_sentence_2 = "van de";
$progress_sentence_3 = "vereiste.";
$aff_lib_button = "<font style=\"font-size:16px; font-weight:bold;\">Claim Uw Gratis Toegang Tot</font><br>www.AffiliateLibrary.com";
$menu_announcements = "Social Media-campagnes";
$announcements_name = "Campagnenaam";
$announcements_facebook_message = "Facebook-bericht";
$announcements_twitter_message = "Twitter-bericht";
$announcements_facebook_link = "Facebook-link";
$announcements_facebook_picture = "Facebook-foto";
$general_last_30_days_activity = "Activiteit laatste 30 dagen";
$general_last_30_days_activity_traffic = "Traffic";
$general_last_30_days_activity_commissions = "Commissies";
$accountability_title = "Aansprakelijkheid en Communicatie";
$accountability_text = "<strong>Wat is dit?</strong><p>Wij nemen een proactieve aanpak om vertrouwen te creëren met onze partners. Het is ons doel om ervoor te zorgen dat we zoveel mogelijk informatie kunnen verstrekken over elke commissie die verdiend en/of afgekeurd is binnen ons systeem.</p><strong>Communicatie</strong><p>Wij zijn beschikbaar om details over elke geweigerde commissie te geven. Wij bedienen ons van sterke communicatie met onze partners en moedigen vragen en feedback alleen maar aan.</p>";
$debit_reason_0 = "Geen";
$debit_reason_1 = "Terugbetaling";
$debit_reason_2 = "Terugboeking";
$debit_reason_3 = "Fraude Gerapporteerd";
$debit_reason_4 = "Order Geannuleerd";
$debit_reason_5 = "Gedeeltelijke terugbetaling";
$menu_drop_pending_debits = "Openstaande Schulden";
$debit_amount_label = "Schuldhoogte";
$debit_date_label = "Schulddatum";
$debit_reason_label = "Schuldreden";
$debit_paragraph = "Schulden worden van uw volgende betaling afgehouden.";
$debit_invoice_amount = "Min Schuldbedrag";
$debit_revised_amount = "Herziene Betaling";
$mv_head_description = "Let op: U kunt slechts een video per pagina plaatsen op uw website.";
$mv_head_source_code = "Plak deze code in de HEAD-sectie van uw HTML-document.";
$mv_body_title = "Videotitel";
$mv_body_description = "Beschrijving";
$mv_body_source_code = "Plak deze code in de BODY-sectie van uw HTML-document waar u wilt dat de video verschijnt.";
$menu_marketing_videos = "Videos";
$mv_preview_button = "Preview-video";
$dt_no_data = "Geen data beschikbaar in tabel.";
$dt_showing_exists = "Weergave van _START_ tot _END_ van _TOTAL_ items.";
$dt_showing_none = "Weergave van 0 tot 0 van 0 items.";
$dt_filtered = "(gefilterd uit in totaal _MAX_ items)";
$dt_length_choice = "Laat _MENU_ items zien.";
$dt_loading = "Laden...";
$dt_processing = "Verwerken...";
$dt_no_records = "Geen overeenkomende items gevonden.";
$dt_first = "Eerste";
$dt_last = "Laatste";
$dt_next = "Volgende";
$dt_previous = "Vorige";
$dt_sort_asc = ": activeer om de kolom oplopend te sorteren";
$dt_sort_desc = ": activeer om de kolom aflopend te sorteren";
$choose_marketing_group = "Kies een Marketinggroep";
$email_already_used_1 = "Account kan niet worden aangemaakt. We staan alleen toe";
$email_already_used_2 = "account";
$email_already_used_3 = "wordt gecreëerd met e-mailadres.";
$missing_fax = "Vul alstublieft uw faxnummer in.";
$chart_last_6_months = "Commissies betaald afgelopen 6 maanden";
$chart_last_6_months_paid = "Commissies betaald";
$chart_this_month = "Onze Top 5-partners deze maand";
$chart_this_month_none = "Geen data om weer te geven.";
$login_return = "Terug naar Partner-home";
$login_lost_details = "Vul uw gebruikersnaam in en wij sturen u een e-mail met uw inloggegevens.";
$account_edit_general_prefs = "Algemene Voorkeuren";
$account_edit_email_language = "E-mailtaal";
$footer_connect = "Neem contact met ons op";
$modal_close = "Sluiten";
$vat_amount_heading = "Btw-bedrag";
$menu_logout = "Uitloggen";
$menu_upload_picture = "Upload uw foto";
$menu_offer_testi = "Schrijf een Testimonial";
$fb_login = "Inloggen met Facebook";
$fb_permissions = "Toestemming niet gegeven. Geef de website alstublieft toestemming om uw e-mailadres te gebruiken.";
$announcements_published = "Aankondiging gepubliceerd";
$training_videos_title = "Opleidingsvideo's";
$training_videos_general = "Algemene Marketing";
$commission_method = "Commissiemethode";
$how_will_you_earn = "Hoe verdien je commissies?";
$pm_account_credit = "Wij voegen de kredieten die je hebt verdiend aan je account toe.";
$pm_check_money_order = "Wij sturen je een cheque/overboeking per e-mail.";
$pm_paypal = "Wij versturen je een PayPal-betaling.";
$pm_stripe = "Wij versturen je een Stripe-betaling.";
$pm_wire = "Wij versturen je een overboeking.";
$add_to_signup_left_column_text = "<span style=\"color:#CC0000; font-style:italic;\">* geeft een verplicht veld aan.</span>";
$paypal_email = "Paypal-email";
$stripe_acct_details = "Stripe-accountgegevens";
$stripe_connect = "Je kunt je Stripe-account verbinden in de accountinstellingen nadat je je in hebt geschreven.";
$stripe_success = "Stripe-account succesvol verbonden";
$stripe_settings = "Stripe-instellingen";
$stripe_connect_edit = "Verbind met Stripe";
$stripe_delete = "Verwijder Stripe-account";
$stripe_confirm = "Weet je zeker dat je dit account wilt verwijderen?";
$payment_settings = "Betalingsinstellingen";
$edit_payment_settings = "Wijzig betalingsinstellingen";
$invalid_paypal_address = "Ongeldig Paypal-emailadres.";
$payment_method_error = "Selecteer alstublieft een betalingsmethode.";
$payment_settings_updated = "Betalingsinstellingen gewijzigd.";
$stripe_removed = "Stripe-account verwijderd.";
$payment_settings_success = "Succes!";
$payment_update_notice_1 = "Let op!";
$payment_update_notice_2 = "U heeft gekozen om een <strong>[payment_option_here]</strong>-betaling van ons te ontvangen. <a href=\"account.php?page=48\" style=\"font-weight:bold;\">Klik hier</a> om uw <strong>[payment_option_here]</strong>-account te koppelen.";
$pm_title_credit = "Accountkrediet";
$pm_title_mo = "Cheque/Overschrijving";
$pm_title_paypal = "PayPal";
$pm_title_stripe = "Stripe";
$pm_title_wire = "Elektronische Overschrijving";
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