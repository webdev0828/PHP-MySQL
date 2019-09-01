<?PHP

//-------------------------------------------------------
	  $language_pack_name = "danish";
	  $language_pack_table_name = "danish";
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
$header_title = "Partnerprogram";
$header_indexLink = "Partner hjem";
$header_signupLink = "Tilmeld nu";
$header_accountLink = "Administrer konto";
$header_emailLink = "Kontakt os";
$header_greeting = "Velkommen";
$header_nonLogged = "Gæst";
$header_logout = "Log af her";
$footer_tag = "Partner software af iDevAffiliate";
$footer_copyright = "Copyright";
$footer_rights = "Alle rettigheder forbeholdt";
$index_heading_1 = "Velkommen til vores partnerprogram!";
$index_paragraph_1 = "Det er gratis at tilmelde sig vores program, det er nemt at tilmelde sig og kræver ingen teknisk viden. Partnerprogrammer er almindelige på internettet og tilbyder hjemmesideejere en ekstra måde at tjene penge på deres hjemmesider. Partnerne generere trafik og salg til kommercielle hjemmesider, som herefter udbetaler en provision til partnerne for denne tjeneste.";
$index_heading_2 = "Hvordan virker det?";
$index_paragraph_2 = "Når du tilmelder dig vores partnerprogram, vil du modtage en række bannere og tekstlinks som du placere på din hjemmeside. Når en bruger klikker på et af dine links, vil di blive bragt videre til vores hjemmeside og deres aktivitet vil blive sporet af vores partner software. Du vil optjene en provision baseret på din provisionstype.";
$index_heading_3 = "Realtid statistikker og rapporter!";
$index_paragraph_3 = "Login 24 timer om dagen for at tjekke dine salg, trafik, kontosaldo og se hvordan dine bannere præstere.";
$index_login_title = "Partner login";
$index_login_username = "Brugernavn";
$index_login_password = "Adgangskode";
$index_login_username_field = "brugernavn";
$index_login_password_field = "adgangskode";
$index_login_button = "Login";
$index_login_signup_link = "Klik her for at tilmelde dig";
$index_table_title = "Program detaljer";
$index_table_commission_type = "Provisionstype";
$index_table_initial_deposit = "Første indbetaling";
$index_table_requirements = "Udbetalingskrav";
$index_table_duration = "Udbetalingsvarighed";
$index_table_choose = "Vælg en af de følgende udbetalingsmuligheder!";
$index_table_sale = "Pay Per Sale";
$index_table_click = "Pay Per Click";
$index_table_sale_text = "for hvert salg du leverer.";
$index_table_click_text = "for hvert klik du leverer.";
$index_table_deposit_tag = "Bare for at tilmelde sig!";
$index_table_requirements_tag = "Minimum saldo krævet for udbetaling.";
$index_table_duration_tag = "Udbetales en gang om måneden, for den forrige måned.";
$signup_left_column_text = "Tilmeld dig vores partnerprogram og begynd med at tjene penge for hvert salg du sender os! Du skal blot oprette din konto, placere dine link koder på din hjemmeside og se hvordan din kontosaldo vokser, når dine besøgende bliver vores kunder.";
$signup_left_column_title = "Velkommen Partner!";
$signup_login_title = "Opret din konto";
$signup_login_username = "Brugernavn";
$signup_login_password = "Adgangskode";
$signup_login_password_again = "Gentag adgangskode";
$signup_login_minmax_chars = "- Brugernavn skal være minimum user_min_chars tegn.&lt;br /&gt;- Brugernavn kan være alfanumerisk.&lt;br /&gt;- Brugernavn kan indeholde disse tegn: _ (kun understreger)&lt;br /&gt;&lt;br /&gt;- Adgangskode skal være minimum pass_min_chars tegn.&lt;br /&gt;- Adgangskode kan være alfanumerisk.&lt;br /&gt;- Adgangskode kan indeholde disse tegn:  characters_allowed";
$signup_login_must_match = "Denne indtastning skal matche indtastning for adgangskode.";
$signup_standard_title = "Standardoplysninger";
$signup_standard_email = "E-mailadresse";
$signup_standard_company = "Virksomhedsnavn";
$signup_standard_checkspayable = "Checks udbetales til";
$signup_standard_weburl = "Hjemmesideadresse";
$signup_standard_taxinfo = "Skatte ID, SSN eller MOMS";
$signup_personal_title = "Personlige oplysninger";
$signup_personal_fname = "Fornavn";
$signup_personal_state = "Stat eller provins";
$signup_personal_lname = "Efternavn";
$signup_personal_phone = "Telefonnummer";
$signup_personal_addr1 = "Vej";
$signup_personal_fax = "Faxnummer";
$signup_personal_addr2 = "Yderligere adresse";
$signup_personal_zip = "Postnummer";
$signup_personal_city = "By";
$signup_personal_country = "Land";
$signup_commission_title = "Provisionsbetaling";
$signup_commission_howtopay = "Hvordan skal vi betale dig?";
$signup_commission_style_PPS = "Pay Per Sale";
$signup_commission_style_PPC = "Pay Per Click";
$signup_terms_title = "Vilkår og betingelser";
$signup_terms_agree = "Jeg har læst, forstået og acceptere de ovenstående vilkår og betingelser.";
$signup_page_button = "Opret min konto";
$signup_success_email_comment = "Vi har send en e-mail til dig med dit brugernavn og adgangskode.<BR />\r\nDu bør opbevare dette på et sikkert sted til fremtidig brug.";
$signup_success_login_link = "Login på din konto";
$custom_fields_title = "Brugerdefineret felter";
$logout_msg = "<b>Du er nu logget af</b><BR />Tak for din deltagelse i vores partnerprogram.";
$signup_page_success = "Din konto er blevet oprettet";
$login_left_column_title = "Konto Login";
$login_left_column_text = "Indtast dit brugernavn og adgangskode for at få adgang til dine kontostatistikker, bannere, link koder, Ofte Stillede Spørgsmål og meget mere.<BR/ ><BR/ >Hvis du ikke kan huske din adgangskode, indtast dit brugernavn og vi sender dig dine loginoplysninger via e-mail.<BR /><BR />";
$login_title = "Log på din konto";
$login_username = "Brugernavn";
$login_password = "Adgangskode";
$login_invalid = "Ugyldigt Login";
$login_now = "Log på min konto";
$login_send_title = "Brug for din adgangskode?";
$login_send_username = "Brugernavn";
$login_send_info = "Loginoplysninger sendt til e-mail";
$login_send_pass = "Send til e-mail";
$login_send_bad = "Brugernavn ikke fundet";
$help_new_password_heading = "Ny adgangskode";
$help_new_password_info = "Din adgangskode skal være på minimum pass_min_chars tegn i længden. Den må kun indeholde bogstaver, tal og de følgende tegn:  characters_allowed";
$help_confirm_password_heading = "Bekræft ny adgangskode";
$help_confirm_password_info = "Denne adgangskode skal matche den nye adgangskode.";
$help_custom_links_heading = "Spore søgeord";
$help_custom_links_info = "Dit søgeord må ikke overstige 30 tegn. Det må kun indeholde bogstaver, tal og bindestreger.";
$error_title = "De følgende fejl blev opdaget";
$username_invalid = "Ugyldigt brugernavn. Det må kun indeholde bogstaver, tal og understreg.";
$username_taken = "Det brugernavn som du har valgt er allerede taget.";
$username_short = "Dit brugernavn er for kort, det skal minimum være på user_min_chars tegn.";
$username_long = "Dit brugernavn er for langt, det skal maksimalt være på user_max_chars tegn.";
$password_invalid = "Ugyldig adgangskode. Det må kun indeholde bogstaver, tal og følgende tegn:   characters_allowed";
$password_short = "Din adgangskode er for kort, det skal minimum være på pass_min_chars tegn.";
$password_long = "Din adgangskode er for lang, det skal maksimalt være på pass_max_chars tegn.";
$password_mismatch = "Dine indtastede adgangskoder matcher ikke.";
$missing_checks = "Angiv modtagers navn som checks skal udbetales til.";
$missing_tax = "Indtast venligst dit skatte ID, SSN eller momsoplysninger.";
$missing_fname = "Indtast venligst dit fornavn.";
$missing_lname = "Indtast venligst dit efternavn.";
$missing_email = "Indtast venligst din e-mailadresse.";
$invalid_email = "Din e-mailadresse er ugyldig.";
$missing_address = "Indtast venligst din vej.";
$missing_city = "Indtast venligst din by.";
$missing_company = "Indtast venligst din virksomheds navn.";
$missing_state = "Indtast venligst din stat eller provins.";
$missing_zip = "Indtast venligst dit postnummer.";
$missing_phone = "Indtast venligst dit telefonnummer.";
$missing_website = "Indtast venligst din hjemmesides adresse.";
$missing_paypal = "Du har valgt at modtage PayPal udbetalinger, indtast venligst din PayPal konto.";
$missing_terms = "Du har ikke accepteret vores vilkår og betingelser.";
$paypal_required = "En PayPal konto er nødvendig for udbetaling.";
$missing_custom = "Udfyld venligst feltet med navnet:";
$account_total_transactions = "Total Transaktioner";
$account_standard_linking_code = "Standard Link Kode - Fantastisk til brug i e-mails!";
$account_copy_paste = "Kopier/Indsæt ovenstående kode på din hjemmeside eller i e-mails";
$account_not_approved = "Din konto afventer i øjeblikket godkendelse";
$account_suspended = "Din konto er i øjeblikket suspenderet";
$account_standard_earnings = "Standard indtjening";
$account_inc_bonus = "inklusiv bonus";
$account_second_tier = "Trin indtjening";
$account_recurring = "Tilbagevendende indtjening";
$account_not_available = "N/A";
$account_earned_todate = "Total indtjening til dato";
$menu_heading_overview = "Kontooversigt";
$menu_general_stats = "Generelle statistikker";
$menu_tier_stats = "Trin statistikker";
$menu_payment_history = "Betalingshistorik";
$menu_commission_details = "Provisionsoplysninger";
$menu_recurring_commissions = "Tilbagevendende provisioner";
$menu_traffic_log = "Indgående trafik log";
$menu_heading_marketing = "Markedsføringsmateriale";
$menu_banners = "Bannere";
$menu_text_ads = "Tekst reklamer";
$menu_text_links = "Tekst links";
$menu_email_links = "E-mail links";
$menu_html_links = "HTML reklamer";
$menu_offline = "Offline markedsføring";
$menu_tier_linking_code = "Trin like kode";
$menu_email_friends = "E-mail venner &amp; bekendte";
$menu_custom_links = "Byg &amp; spor dine egne links";
$menu_heading_management = "Kontohåndtering";
$menu_comalert = "CommissionAlert Setup";
$menu_comstats = "CommissionStats Setup";
$menu_edit_account = "Rediger min konto";
$menu_change_pass = "Ændre min adgangskode";
$menu_change_commission = "Ændre min provisionsstil";
$menu_heading_general_info = "Generelle informationer";
$menu_browse_affiliates = "Søg andre partnere";
$menu_faq = "Ofte Stillede Spørgsmål";
$suspended_title = "Kontostatus Advarsel";
$suspended_heading = "Din konto er i øjeblikket suspenderet";
$suspended_notes = "Administrator noter";
$pending_title = "Kontostatus Advarsel";
$pending_heading = "Din konto afventer i øjeblikket godkendelse";
$pending_note = "Når vi har godkendt din konto, vil markedsføringsmateriale blive gjort tilgængeligt.";
$faq_title = "Ofte Stillede Spørgsmål";
$faq_none = "Endnu ingen 'ofte stillede spørgsmål'";
$browse_title = "Søg andre partnere";
$browse_none = "Ingen andre partnere at se";
$change_comm_title = "Ændre provisionsstil";
$change_comm_curr_comm = "Nuværende provisionsstil";
$change_comm_curr_pay = "Nuværende betalingsniveau";
$change_comm_new_comm = "Ny provisionsstil";
$change_comm_warning = "Hvis du ændre provisionsstil, vil din konto blive nulstillet til betalingsniveau 1";
$change_comm_button = "Ændre provisionsstil";
$change_comm_no_other = "Ingen andre provisionsstile tilgængelige";
$change_comm_level = "Niveau";
$change_comm_updated = "Provisionsstil opdateret";
$password_title = "Ændre min adgangskode";
$password_old_password = "Gammel adgangskode";
$password_new_password = "Ny adgangskode";
$password_confirm_password = "Bekræft ny adgangskode";
$password_button = "Ændre adgangskode";
$password_warning_old_missing = "Gammel adgangskode er forkert eller mangler";
$password_warning_new_missing = "Ny adgangskode mangler";
$password_warning_mismatch = "Ny adgangskode matcher ikke";
$password_warning_invalid = "Adgangskode ugyldig - Klik på linket hjælp";
$password_notice = "Adgangskode opdateret";
$edit_failed = "Opdatering fejlede - Se ovenstående fejl";
$edit_success = "Konto opdateret";
$edit_button = "Rediger min konto";
$commissionstats_title = "CommissionStats Setup";
$commissionstats_info = "Ved at installere CommissionStats kan du øjeblikkeligt tjekke dine statistikker, lige fra din Windows computer! For at installere denne funktion, download CommissionStats og <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>udpak</b></a> filen på din harddisk, herefter kør <b>setup.exe</b> filen. Når du bliver bedt om dine loginoplysninger, indtast følgende oplysninger.";
$commissionstats_hint = "Hint: Kopier & Indsæt hver oplysning for at sikre nøjagtighed";
$commissionstats_profile = "Profilnavn";
$commissionstats_username = "Brugernavn";
$commissionstats_password = "Adgangskode";
$commissionstats_id = "Partner ID";
$commissionstats_source = "Kildesti URL";
$commissionstats_download = "Download CommissionStats";
$commissionalert_title = "CommissionAlert Setup";
$commissionalert_info = "Ved at installere CommissionAlert vil vi øjeblikkeligt informere dig om nye provisioner, direkte på din Windows computer! For at installere denne funktion, download CommissionStats og <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>udpak</b></a> filen på din harddisk, herefter kør <b>setup.exe</b> filen. Når du bliver bedt om dine loginoplysninger, indtast følgende oplysninger.";
$commissionalert_hint = "Hint: Kopier & Indsæt hver oplysning for at sikre nøjagtighed";
$commissionalert_profile = "Profilnavn";
$commissionalert_username = "Brugernavn";
$commissionalert_password = "Adgangskode";
$commissionalert_id = "Partner ID";
$commissionalert_source = "Kildesti URL";
$commissionalert_download = "Download CommissionAlert";
$offline_title = "Offline markedsføring";
$offline_paragraph_one = "Tjen penge ved at markedsføre vores hjemmeside (offline) til dine venner og bekendte!";
$offline_send = "Send kunder til";
$offline_page_link = "se side";
$offline_paragraph_two = "Dine kunder vil indtaste dit <b>Partner ID-nummer</b> i feltet på ovenstående side, hvilket vil registrere dig som partner for alle køb de foretager.";
$banners_title = "Bannere";
$banners_size = "Bannerstørrelser";
$banners_description = "Bannerbeskrivelse";
$ad_title = "Tekst reklamer";
$ad_info = "Brug den medfølgende link kode, du kan tilpasse farvetema, højde og bredde på din tekst reklame.";
$links_title = "Link navn";
$email_title = "E-mail links";
$email_group = "Markedsføringsgruppe";
$email_button = "Vis e-mail links";
$email_no_group = "Ingen gruppe valgt";
$email_choose = "Vælg venligst en markedsføringsgruppe ovenfor";
$email_notice = "Markedsføringsgrupper kan have forskellige indgående trafiksider";
$email_ascii = "<b>ASCII/Tekst version</b> - Til brug i rene tekst e-mails.";
$email_html = "<b>HTML version</b> - Til brug i HTML-formateret e-mails.";
$email_test = "Test link";
$email_test_info = "Dette er hvor dine kunder vil blive sendt hen på vores hjemmeside.";
$email_source = "Kildekode - Kopier/Indsæt i din e-mail meddelelse";
$html_title = "HTML reklame navn";
$html_view_link = "Se denne HTML reklame";
$traffic_title = "Indgående trafik log";
$traffic_display = "Vis seneste";
$traffic_display_visitors = "Besøgende";
$traffic_button = "Se trafik log";
$traffic_title_details = "Indgående trafikoplysninger";
$traffic_ip = "IP-adresse";
$traffic_refer = "Henvisende URL";
$traffic_date = "Dato";
$traffic_time = "Tid";
$traffic_bottom_tag_one = "Viser seneste";
$traffic_bottom_tag_two = "af";
$traffic_bottom_tag_three = "Totalt unikke besøgende";
$traffic_none = "Ingen trafik log eksistere";
$traffic_no_url = "N/A - Muligt bogmærke eller e-mail link";
$traffic_box_title = "Komplet henvisnings URL";
$traffic_box_info = "Klik linket for at besøge websiden";
$payment_title = "Betalingshistorik";
$payment_date = "Betalingsdato";
$payment_commissions = "Provisioner";
$payment_amount = "Betalingsbeløb";
$payment_totals = "Totalt";
$payment_none = "Ingen betalingshistorik eksistere";
$tier_stats_title = "Trin statistikker";
$tier_stats_accounts = "Trin konti direkte under dig";
$tier_stats_grab_link = "Grib din trin link kode";
$tier_stats_none = "Ingen trin konti eksistere";
$tier_stats_username = "Brugernavn";
$tier_stats_current = "Nuværende provisioner";
$tier_stats_previous = "Forrige udbetalinger";
$tier_stats_totals = "Totalt";
$recurring_title = "Tilbagevendende provisioner";
$recurring_none = "Ingen tilbagevendende provisioner eksistere";
$recurring_date = "Provision dato";
$recurring_status = "Tilbagevendende status";
$recurring_payout = "Næste udbetaling";
$recurring_amount = "Beløb";
$recurring_every = "Hver";
$recurring_in = "Om";
$recurring_days = "Dage";
$recurring_total = "Total";
$tlinks_title = "Tilføj andre til dit trin og tjen penge på dem!";
$tlinks_embedded_one = "Trin tilmeldingskreditering er allerede aktiv i dine standard partner links!";
$tlinks_embedded_two = "Brug af trinsystemet tillader dig at markedsføre vores partnerprogram til andre personer. Du vil blive det øverste trin for alle som tilmelder sig vores partnerprogram gennem dit specielle trin henvisningslink nedenfor. Informationer om hvor meget du kan tjene er nedenfor.";
$tlinks_embedded_current = "Nuværende trin betaling";
$tlinks_forced_two = "Brug af trinsystemet tillader dig at markedsføre vores partnerprogram til andre personer. Du vil blive det øverste trin for alle som tilmelder sig vores partnerprogram gennem dit specielle trin henvisningslink nedenfor. Informationer om hvor meget du kan tjene er nedenfor.";
$tlinks_forced_code = "Trin henvisningslink";
$tlinks_forced_paste = "Kopier/Indsæt den ovenstående kode på din hjemmeside";
$tlinks_forced_money = "Webmasters tjen penge her!";
$comdetails_title = "Provisionsoplysninger";
$comdetails_date = "Provisionsdato";
$comdetails_time = "Provisionstid";
$comdetails_type = "Type af provision";
$comdetails_status = "Nuværende status";
$comdetails_amount = "Provisionsbeløb";
$comdetails_additional_title = "Yderligere provisionsoplysninger";
$comdetails_additional_ordnum = "Ordrenummer";
$comdetails_additional_saleamt = "Salgsbeløb";
$comdetails_type_1 = "Bonus provision";
$comdetails_type_2 = "Tilbagevendende provision";
$comdetails_type_3 = "Trin provision";
$comdetails_type_4 = "Standard provision";
$comdetails_status_1 = "Betalt";
$comdetails_status_2 = "Godkendt - afventer betaling";
$comdetails_status_3 = "Afventer godkendelse";
$comdetails_not_available = "N/A";
$details_title = "Provisionsoplysninger";
$details_drop_1 = "Nuværende standard provisioner";
$details_drop_2 = "Nuværende tin provisioner";
$details_drop_3 = "Provisioner afventer godkendelse";
$details_drop_4 = "Betalte standard provisioner";
$details_drop_5 = "Betalte trin provisioner";
$details_button = "Se provisioner";
$details_date = "Dato";
$details_status = "Status";
$details_commission = "Provision";
$details_details = "Se detaljer";
$details_type_1 = "Betalt";
$details_type_2 = "Afventer godkendelse";
$details_type_3 = "Godkendt - Afventer betaling";
$details_none = "Ingen provisioner at se";
$details_no_group = "Ingen provisionsgruppe valgt";
$details_choose = "Vælg venligst en provisionsgruppe ovenfor";
$general_title = "Nuværende provisioner - fra sidste udbetaling til dato";
$general_transactions = "Transaktioner";
$general_earnings_to_date = "Indtjening til dato";
$general_history_link = "Se betalingshistorik";
$general_standard_earnings = "Standard indtjening";
$general_current_earnings = "Nuværende indtjening";
$general_traffic_title = "Trafikstatistikker";
$general_traffic_visitors = "Besøgende";
$general_traffic_unique = "Unikke besøgende";
$general_traffic_sales = "Godkendte salg";
$general_traffic_ratio = "Salgsfordeling";
$general_traffic_info = "Disse statistikker inkluderer ikke tilbagevendende eller trin provisioner.";
$general_traffic_pay_type = "Betalingstype";
$general_traffic_pay_level = "Nuværende betalingsniveau";
$general_notes_title = "Noter fra administratoren";
$general_notes_date = "Dato oprettet";
$general_notes_to = "Til";
$general_notes_all = "Alle partnere";
$general_notes_none = "Ingen noter at se";
$contact_left_column_title = "Kontakt os";
$contact_left_column_text = "Du er velkommen til at kontakte vores partner manager ved brug af formen til højre.";
$contact_title = "Kontakt os";
$contact_name = "Dit navn";
$contact_email = "Din e-mailadresse";
$contact_message = "Meddelelse";
$contact_chars = "tegn tilbage";
$contact_button = "Send meddelelse";
$contact_received = "Vi har modtaget din meddelelse, tillad venligst 24 timer for et svar.";
$contact_invalid_name = "Ugyldigt navn";
$contact_invalid_email = "Ugyldig e-mailadresse";
$contact_invalid_message = "Ugyldig meddelelse";
$invoice_button = "Faktura";
$invoice_header = "PARTNER BETALINGSFAKTURA";
$invoice_aff_info = "Partnerinformation";
$invoice_co_info = "Information";
$invoice_acct_info = "Kontooplysninger";
$invoice_payment_info = "Betalingsoplysninger";
$invoice_comm_date = "Udbetalingsdato";
$invoice_comm_amt = "Provisionsbeløb";
$invoice_comm_type = "Provisionstype";
$invoice_admin_note = "Administrator note";
$invoice_footer = "SLUT FAKTURA";
$invoice_print = "Print faktura";
$invoice_none = "N/A";
$invoice_aff_id = "Partner ID";
$invoice_aff_user = "Brugernavn";
$menu_pdf_marketing = "PDF Markedsføringsbrochure";
$menu_pdf_training = "PDF Træningsdokumenter";
$marketing_target_url = "Mål URL";
$marketing_source_code = "Kildekode - Kopier/Indsæt på din hjemmeside";
$marketing_group = "Markedsføringsgruppe";
$peels_title = "Side peel navn";
$peels_view = "Se dette peel";
$peels_description = "Side peel beskrivelse";
$lb_head_title = "HEAD kode nødvendig for din HTML side";
$lb_head_description = "For at kunne bruge lightbox på din hjemmeside, skal du tilføje følgende ligner til hovedsektionen på den side hvor du ønsker det vist.";
$lb_head_source_code = "Indsæt denne kode i HEAD sektionen i dit HTML dokument.";
$lb_head_code_notes = "Du behøver kun at placere denne kode en gang, uanset hvor mange lightboxes du placere på siden.";
$lb_head_tutorial = "Se tutorial";
$lb_body_title = "Lightbox navn";
$lb_body_description = "Lightbox beskrivelse";
$lb_body_click = "Klik op ovenstående billede for at se lightbox.";
$lb_body_source_code = "Indsæt denne kode i BODY sektionen i dit HTML dokument, hvor du ønsker at billede skal vises.";
$pdf_title = "PDF";
$pdf_training = "Træningsdokumenter";
$pdf_marketing = "Markedsføringsbrochure";
$pdf_description_1 = "Adobe Reader er påkrævet for at kunne se og printe vores PDF markedsføringsmaterialer.";
$pdf_description_2 = "Adobe Reader kan gratis downloades fra Adobes hjemmeside.";
$pdf_file_name = "Filnavn";
$pdf_file_size = "Filstørrelse";
$pdf_file_description = "Beskrivelse";
$pdf_bytes = "Bytes";
$menu_heading_training_materials = "Træningsmaterialer";
$menu_videos = "Se træningsvideoer";
$menu_custom_manual = "Brugerdefinerede sporingslinks manual";
$menu_page_peels = "Side peels";
$menu_lightboxes = "Lightbox";
$menu_email_templates = "E-mail skabeloner";
$menu_heading_custom_links = "Brugerdefineret sporingslinks";
$menu_custom_reports = "Rapporter";
$menu_keyword_links = "Søgeord sporingslinks";
$menu_subid_links = "Underpartner sporingslinks";
$menu_alteranate_links = "Alternative indgående sidelinks";
$menu_heading_additional = "Yderligere værktøjer";
$menu_drop_heading_stats = "Generelle statistikker";
$menu_drop_heading_commissions = "Provisioner";
$menu_drop_heading_history = "Betalingshistorik";
$menu_drop_heading_traffic = "Trafik log";
$menu_drop_heading_account = "Min konto";
$menu_drop_heading_logo = "Upload mit logo";
$menu_drop_heading_faq = "Ofte Stillede Spørgsmål";
$menu_drop_general_stats = "Generelle statistikker";
$menu_drop_tier_stats = "Trin statistikker";
$menu_drop_current = "Nuværende provisioner";
$menu_drop_tier = "Nuværende trin provisioner";
$menu_drop_pending = "Afventer godkendelse";
$menu_drop_paid = "Betalte provisioner";
$menu_drop_paid_rec = "Betalte trin provisioner";
$menu_drop_recurring = "Aktive tilbagevendende provisioner";
$menu_drop_edit = "Rediger min konto";
$menu_drop_password = "Ændre min adgangskode";
$menu_drop_change = "Ændre min provisionsstil";
$account_hidden = "gemt";
$keyword_title = "Brugerdefinerede søgeord links";
$keyword_info = "Oprettelse af et brugerdefineret søgeord link giver dig muligheden for at spore indgående trafik fra forskellige kilder.  Opret et link med op til 4 forskellige sporende søgeord, og den brugerdefinerede sporingsrapport vil vise dig en detaljeret rapport for hvert søgeord du opretter. ";$keyword_heading = "Available Variables For Custom Keyword Tracking";
$keyword_heading = "Tilgængelige variabler til brugerdefineret sporing af søgeord";
$keyword_tracking = "Sporings ID";
$keyword_build = "For at bygge dit link, tag følgende URL og vedhæft den med det sporings ID og søgeord du ønsker at bruge.";
$keyword_example = "Eksempel";
$keyword_tutorial = "Se tutorial";
$sub_tracking_title = "Underpartner sporing";
$sub_tracking_info = "Oprettelse af et underpartner link giver dig muligheden for at give dit partnerlink til dine egne partnere som kan bruge det. Du vil vide hvem som har genereret provisionen for dig, fordi vi vil rapportere hvilken af dine underpartnere som generede salget. En anden grund til at bruge underpartner link er hvis du har dit eget sporingssystem som du ønsker at bruge til rapporter.";
$sub_tracking_build = "Udskift XXX med partner ID-nummer i dit partnerprogram. Gentag denne proces for alle dine partnere.";
$sub_tracking_example = "Eksempel";
$sub_tracking_tutorial = "Se tutorial";
$sub_tracking_id = "Underpartner ID";
$alternate_title = "Alternative indgående sidelinks";
$alternate_option_1 = "Mulighed 1: Automatisk linkoprettelse";
$alternate_heading_1 = "Automatisk linkoprettelse";
$alternate_info_1 = "Definer din egen indgående trafik side ved at indtaste den URL som du vil have trafikken leveret til og vi vil oprette linket for dig. Brug af denne funktion vil oprette et kortere link til dig som du kan bruge med en URL indlejret i linket, den bruger et ID-nummer i vores database.";
$alternate_button = "Opret mit link";
$alternate_links_heading = "Mine alternative indgående URL links";
$alternate_links_note = "Eksisterende links vil forblive intakte og funktionelle hvis du fjerner et brugerdefineret link fra denne side.";
$alternate_links_remove = "fjern";
$alternate_option_2 = "Mulighed 2: Manuel linkoprettelse";
$alternate_info_2 = "Hvis du foretrækker at tilføje dine egne partnerlinks med en alternativ indgående URL, brug følgende struktur.";
$alternate_variable = "Alternativ indgående URL variabel";
$alternate_example = "Eksempel";
$alternate_build = "For at bygge dit link, brug følgende URL og tilføj den til den alternative indgående URL du ønsker at bruge.";
$alternate_none = "Ingen alternative indgående links oprettet";
$alternate_tutorial = "Se tutorial";
$cr_title = "Brugerdefineret søgeord rapport";
$cr_select = "Vælg et søgeord";
$cr_button = "Generer rapport";
$cr_no_results = "Ingen søgeresultater fundet";
$cr_no_results_info = "Prøv en anden kombination af søgeord";
$cr_used = "Søgeord brugt";
$cr_found = "Dette link fandt";
$cr_times = "Gange";
$cr_unique = "Unikke links fundet";
$cr_detailed = "Detaljeret link rapport";
$cr_export = "Eksporter rapport til Excel";
$cr_none = "Ingen søgeord fundet";
$logo_title = "Upload din virksomheds logo";
$logo_info = "Hvis du gerne vil uploade din virksomheds logo, vil vi vise det til de kunder du leverer til vores hjemmeside. Dette tillader os at personliggøre dine kunders oplevelse når de besøger os.";
$logo_bullet_one = "Billeder kan være .jpg, .gif or .png. Flash indhold er ikke tilladt.";
$logo_bullet_two = "Enhver form for upassende billeder vil blive kasseret og din konto suspenderet.";
$logo_bullet_three = "Dit billede/logo vil ikke blive vist på vores hjemmeside før vi har godkendt det.";
$logo_bullet_size_one = "Billeder må have en maksimal bredde på";
$logo_bullet_size_two = "pixels og en maksimal højde på";
$logo_bullet_req_size_one = "Billeder skal have en bredde på";
$logo_bullet_req_size_two = "pixels og en højde på";
$logo_bullet_pixels = "pixels.";
$logo_choose = "Vælg et billede";
$logo_file = "Vælg en fil:";
$logo_browse = "Gennemse...";
$logo_button = "Upload";
$logo_current = "Mit nuværende billede";
$logo_remove = "fjern";
$logo_display_status = "Billede status:";
$logo_pending = "Afventer godkendelse";
$logo_approved = "Godkendt";
$logo_success = "Billedet blev succesfuldt uploadet og afventer godkendelse.";
$signup_security_title = "Konto verifikation";
$signup_security_info = "Indtast venligst sikkerhedskoden vist i feltet. Dette trin hjælper os med at forekomme automatiske tilmeldinger.";
$signup_security_code = "Sikkerhedskode";
$sub_tracking_none = "Ingen";
$missing_security_code = "Forkert eller manglende konto verifikation / sikkerhedskode";
$alternate_success_title = "Linkoprettelse succes";
$alternate_success_info = "Grib dit link nedenfor og begynd med at levere trafik til din definerede URL.";
$alternate_failed_title = "Linkoprettelse fejl";
$alternate_failed_info = "Indtast venligst en gyldig URL.";
$logo_missing_filename = "Vælg venligst et filnavn.";
$logo_required_width = "Billedbredde skal være";
$logo_required_height = "Billedhøjde skal være";
$logo_maximum_width = "Billedbredde kan kun være";
$logo_maximum_height = "Billedbredde kan kun være";
$logo_size_maximum = "Billedstørrelse kan kun være maksimalt";
$logo_bad_filetype = "Billedtype er ikke tilladt. Tilladte billedtyper er .gif, .jpg and .png.";
$logo_upload_error = "Billedupload fejl, kontakt venligst din partner manager.";
$logo_error_title = "Billedupload fejl";
$logo_error_bytes = "bytes.";
$excel_title = "Brugerdefineret søgeord link rapport";
$excel_tab_report = "Brugerdefineret søgeord rapport";
$excel_tab_logs = "Trafik Logs";
$excel_date = "Rapport dato:";
$excel_affiliate = "Partner ID:";
$excel_criteria = "Søgeord link kriterier";
$excel_link = "Linkstruktur";
$excel_hits = "Unikke besøg";
$excel_comm_stats = "Provisionsstatistikker";
$excel_comm_current = "Nuværende provisioner";
$excel_comm_paid = "Betalte provisioner";
$excel_comm_total = "Total Provisioner";
$excel_comm_ratio = "Konverteringsrate";
$excel_earned = "Provisioner indtjent";
$excel_earned_current = "Nuværende provisioner";
$excel_earned_paid = "Betalte Provisioner";
$excel_earned_total = "Total provisioner indtjent";
$excel_earned_tab = "Klik trafik log fanen (nedenfor) for at se trafik loggen for dette brugerdefinerede link.";
$excel_log_title = "Brugerdefinerede søgeord trafik log";
$excel_log_ip = "IP-adresse";
$excel_log_refer = "Henvisnings URL";
$excel_log_date = "Dato";
$excel_log_time = "Tid";
$excel_log_target = "Mål URL";
$etemplates_title = "E-mail skabeloner";
$etemplates_view_link = "Se denne e-mail skabelon";
$etemplates_name = "Skabelonnavn";
$signup_maintenance_heading = "Vedligeholdelsesmeddelelse";
$signup_maintenance_info = "Tilmeldinger er midlertidigt deaktiveret. Prøv venligst senere.";
$marketing_group_title = "Markedsføringsgruppe";
$marketing_button = "Vis";
$marketing_no_group = "Ingen gruppe valgt";
$marketing_choose = "Vælg venligst en markedsføringsgruppe ovenfor";
$marketing_notice = "Markedsføringsgrupper kan have forskellige indgående trafiksider";
$canspam_heading = "CAN-SPAM regler og accept";
$canspam_accept = "Jeg har læst, forstået og acceptere de ovenstående CAN-SPAM regler.";
$canspam_error = "Du har ikke accepteret vores CAN-SPAM regler.";
$signup_banned = "En fejl opstod under konto oprettelsen. Kontakt venligst systemadministratoren for yderligere information.";
$header_testimonials = "Partneranmeldelser";
$testi_visit = "Besøg hjemmeside";
$testi_description = "Tilbyd din anmeldelse af vores partnerprogram og vi vil placere den på vores &lt;a href=&quot;testimonials.php&quot;&gt;anmeldelser&lt;/a&gt; side med et link til din hjemmeside.";
$testi_name = "Navn";
$testi_url = "Hjemmeside URL";
$testi_content = "Anmeldelse";
$testi_code = "Sikkerhedskode";
$testi_submit = "Tilføj anmeldelse";
$testi_na = "Anmeldelser er ikke tilgængelige.";
$testi_title = "Tilbud en anmeldelse";
$testi_success_title = "Anmeldelse succes";
$testi_success_message = "Tak fordi du tilføjede din anmeldelse. Vores team vil gennemgå den snarest.";
$testi_error_title = "Anmeldelse fejl";
$testi_error_name_missing = "Inkluder venligst dit navn i din anmeldelse.";
$testi_error_url_missing = "Inkluder venligst din hjemmeside URL i din anmeldelse.";
$testi_error_missing = "Inkluder venligst tekst i din anmeldelse.";
$menu_drop_delayed = "Forsinkede provisioner";
$details_drop_6 = "Nuværende forsinkede provisioner";
$details_type_6 = "Forsinkede - Vil godkendes snarest";
$comdetails_status_6 = "Forsinket - vil godkendes snart";
$tc_reaccept_title = "Ændring i vilkår og betingelser meddelelse";
$tc_reaccept_sub_title = "Du skal acceptere vores nyeste vilkår og betingelser for at kunne få adgang til din konto.";
$tc_reaccept_button = "Jeg har læst, forstået og acceptere ovenstående vilkår og betingelser.";
$tlinks_active = "Antal af aktive trin";
$tlinks_payout_structure = "Trin betalingsstruktur";
$tlinks_level = "Niveau";
$tierText1 = "% udregnet fra den henvisende partners provisionsbeløb.";
$tierText2 = "% udregnet fra det øverste trins provisionsbeløb.";
$tierText3 = "% udregnet fra salgsbeløb.";
$tierTextflat = "fast rate.";
$edit_custom_button = "Rediger svar";
$private_heading = "Privat tilmelding";
$private_info = "Vores partnerprogrammer er ikke åbent for offentligheden og kræver en tilmeldingskode for tilmelding. Informationer om hvordan man får en tilmeldingskode kan findes her.";
$private_required_heading = "Tilmeldingskode påkrævet";
$private_code_title = "Indtast tilmeldingskode";
$private_button = "Tilføj kode";
$private_error_title = "Ugyldig tilmeldingskode indtastet";
$private_error_invalid = "Tilmeldingskoden som du har indtastet er ugyldig.";
$private_error_expired = "Tilmeldingskoden som du har indtastet er udløbet eller ikke længere gyldig.";
$qr_code_title = "QR koder";
$qr_code_size = "QR kodestørrelse";
$qr_code_button = "Vis QR kode";
$qr_code_offline_title = "Offline markedsføring";
$qr_code_offline_content1 = "Tilføj denne QR kode til dine markedsføringsbrochure, flyers, visitkort, etc.";
$qr_code_offline_content2 = "- Højreklik på billedet og &lt;strong&gt;gem-as&lt;/strong&gt; på din computer.";
$qr_code_online_title = "Online marketing";
$qr_code_online_content = "Tilføj denne QR kode til din hjemmeside, sociale medier, blogs, etc.";
$menu_coupon = "Rabatkode";
$coupon_title = "Dine tilgængelige rabatkoder";
$coupon_desc = "Giv disse rabatkoder væk og tjen provision hver gang nogen bruger din kode!";
$coupon_head_1 = "Rabatkode";
$coupon_head_2 = "Rabat til kunden";
$coupon_head_3 = "Dit provisionsbeløb";
$coupon_sale_amt = "af salgsbeløb";
$coupon_flat_rate = "fast rate";
$coupon_default = "Standard betalingsniveau";
$cc_vanity_title = "Anmod om personlig rabatkode";
$cc_vanity_field = "Rabatkode";
$cc_vanity_button = "Anmod om rabatkode";
$cc_vanity_error_missing = "<strong>Fejl!</strong> Indtast venligst en rabatkode.";
$cc_vanity_error_exists = "<strong>Fejl!</strong> Du har allerede anmodet om denne kode. Den afventer godkendelse.";
$cc_vanity_error = "<strong>Fejl!</strong> Rabatkoden er ugyldig. Brug venligst kun bogstaver, tal og understreger.";
$cc_vanity_success = "<strong>Succes!</strong> Din personlige rabatkode er blevet anmodet.";
$coupon_none = "I øjeblikket ingen rabatkoder tilgængelige.";
$pic_error_title = "Billedupload fejl";
$pic_missing = "Vælg venligst et filnavn.";
$pic_invalid = "Billedtype er ikke tilladt. Tilladte billedtyper er .gif, .jpg and .png.";
$pic_error = "Billedupload fejl, kontakt venligst din partner manager.";
$pic_success = "Dit billede blev succesfuldt uploadet.";
$pic_title = "Upload dit billede";
$pic_info = "Upload af dit billede hjælper med at personliggøre vores oplevelse med dig.";
$pic_bullet_1 = "Billeder kan være .jpg, .gif or .png.";
$pic_bullet_2 = "Enhver form for upassende billeder vil blive kasseret og din konto suspenderet.";
$pic_bullet_3 = "Dit billede vil ikke blive vist offentligt. Det vil kun være tilknyttet din konto som vi kan se.";
$pic_file = "Vælg en fil:";
$pic_button = "Upload";
$pic_current = "Mit nuværende billede";
$pic_remove = "Fjern billede";
$progress_title = "Berettiget til næste udbetaling:";
$progress_complete = "komplet.";
$progress_none = "Vi har ingen minimumskrav for udbetaling.";
$progress_sentence_1 = "Du har tjent";
$progress_sentence_2 = "af";
$progress_sentence_3 = "krav.";
$aff_lib_button = "<font style=\"font-size:16px; font-weight:bold;\">Kræv din gratis adgang til</font><BR />www.AffiliateLibrary.com";
$menu_announcements = "Social medier kampagner";
$announcements_name = "Kampagnenavn";
$announcements_facebook_message = "Facebook meddelelse";
$announcements_twitter_message = "Twitter meddelelse";
$announcements_facebook_link = "Facebook link";
$announcements_facebook_picture = "Facebook billede";
$general_last_30_days_activity = "Seneste 30 dages aktivitet";
$general_last_30_days_activity_traffic = "Trafik";
$general_last_30_days_activity_commissions = "Provisioner";
$accountability_title = "Ansvarlighed og kommunikation";
$accountability_text = "<strong>Hvad er det?</strong><p>Vi har en proaktiv tilgang til at skabe tillid med vores partnere. Det er vores mål at sikre at vi tilbyder så mange oplysninger som muligt på hver optjent provision og/eller afviste i vores system.</p><strong>Kommunikation</strong><p>Vi er i stand til at give detaljer på alle afviste provisioner. Vi bruger stærk kommunikation med vores partnere og tilskynder spørgsmål og feedback.</p>";
$debit_reason_0 = 'Ingen';
$debit_reason_1 = 'Tilbagebetaling';
$debit_reason_2 = 'Tilbageførsel';
$debit_reason_3 = 'Svig rapporteret';
$debit_reason_4 = 'Annulleret bestilling';
$debit_reason_5 = 'Delvis tilbagebetaling';
$menu_drop_pending_debits = 'Afventende debiteringer';
$debit_amount_label = 'Debiteringsbeløb';
$debit_date_label = 'Debiteringsdato';
$debit_reason_label = 'Debiteringsgrund';
$debit_paragraph = 'Debiteringer vil blive afskrevet fra din næste udbetaling.';
$debit_invoice_amount = 'Minus debiteringsbeløb';
$debit_revised_amount = 'Revideret udbetalingsbeløb';
$mv_head_description = 'Bemærk: Du kan kun placere en video per side på din hjemmeside.';
$mv_head_source_code = 'Indsæt denne kode i HEAD sektionen i dit HTML dokument.';
$mv_body_title = 'Video titel';
$mv_body_description = 'Beskrivelse';
$mv_body_source_code = 'Indsæt denne kode i BODY sektionen i dit HTML dokument hvor du ønsker videoen skal vises.';
$menu_marketing_videos = 'Videoer';
$mv_preview_button = 'Forhåndsvis video';
$dt_no_data = 'Ingen data tilgængelige i tabellen.';
$dt_showing_exists = 'Viser _START_ til _END_ af _TOTAL_ poster.';
$dt_showing_none = 'Viser 0 til 0 af 0 poster.';
$dt_filtered = '(filtreret fra _MAX_ total poster)';
$dt_length_choice = 'Vis _MENU_ poster.';
$dt_loading = 'Henter...';
$dt_processing = 'Bearbejder...';
$dt_no_records = 'Ingen matchende data fundet.';
$dt_first = 'Første';
$dt_last = 'Sidste';
$dt_next = 'Næste';
$dt_previous = 'Forrige';
$dt_sort_asc = ': aktiver for at sortere kolonnen stigende';
$dt_sort_desc = ': aktiver for at sortere kolonnen faldende';
$choose_marketing_group = 'Vælg en markedsføringsgruppe';
$email_already_used_1 = 'Kontoen kunne ikke oprettes. Vi tillader kun';
$email_already_used_2 = 'konto';
$email_already_used_3 = 'at blive oprettet per e-mailadresse.';
$missing_fax = 'Indtast venligst dit faxnummer.';
$chart_last_6_months = 'Provisioner udbetalt seneste 6 måneder';
$chart_last_6_months_paid = 'Provisioner udbetalt';
$chart_this_month = 'Vores top 5 partnere denne måned';
$chart_this_month_none = 'Ingen data at vise.';
$login_return = 'Vend tilbage til partner hjem';
$login_lost_details = 'Indtast dit brugernavn og vi sender dig en e-mail med dine loginoplysninger.';
$account_edit_general_prefs = 'Generelle præferencer';
$account_edit_email_language = 'E-mail sprog';
$footer_connect = 'Forbind med os';
$modal_close = 'Luk';
$vat_amount_heading = 'Momsbeløb';
$menu_logout = 'Log af';
$menu_upload_picture = 'Upload dit profilbillede';
$menu_offer_testi = 'Tilbyd en anmeldelse';
$fb_login = 'Log på med Facebook';
$fb_permissions = 'Tilladelser ikke givet. Tillad venligst hjemmesiden at bruge din e-mailadresse.';
$announcements_published = "Annonce publiceret";
$training_videos_title = "Træningsvideoer";
$training_videos_general = "Generel markedsføring";
$commission_method = "Provisionsmetode";
$how_will_you_earn = "Hvordan vil du tjente provisioner?";
$pm_account_credit = "Vi vil kreditere din konto i det beløb af dine optjente provisioner.";
$pm_check_money_order = "Vi vil sende dig en check med posten.";
$pm_paypal = "Vi vil sende dig en PayPal betaling.";
$pm_stripe = "Vi vil sende dig en Stripe betaling.";
$pm_wire = "Vi vil sende dig en bankoverførsel.";
$add_to_signup_left_column_text = "<span style=\"color:#CC0000; font-style:italic;\">* indikere påkrævet felt.</span>";
$paypal_email = "PayPal E-mail";
$stripe_acct_details = "Stripe kontooplysninger";
$stripe_connect = "Du kan forbinde med dig Stripe konto fra siden kontoindstillinger efter tilmelding.";
$stripe_success = "Stripe konto succesfuldt forbundet";
$stripe_settings = "Stripe indstillinger";
$stripe_connect_edit = "Forbind med Stripe";
$stripe_delete = "Slet Stripe konto";
$stripe_confirm = "Er du sikker på at du vil slette denne konto?";
$payment_settings = "Betalingsindstillinger";
$edit_payment_settings = "Rediger betalingsindstillinger";
$invalid_paypal_address = "Ugyldig PayPal e-mailadresse.";
$payment_method_error = "Vælg venligst en betalingsmetode.";
$payment_settings_updated = "Betalingsindstillinger opdateret.";
$stripe_removed = "Stripe konto fjernet.";
$payment_settings_success = "Succes!";
$payment_update_notice_1 = "Varsel!";
$payment_update_notice_2 = "Du har valgt at modtage en <strong>[payment_option_here]</strong> betaling fra os. <a href=\"account.php?page=48\" style=\"font-weight:bold;\">Klik venligst her</a> for at forbinde <strong>[payment_option_here]</strong> konto.";
$pm_title_credit = "Konto kredit";
$pm_title_mo = "Check/Postanvisning";
$pm_title_paypal = "PayPal";
$pm_title_stripe = "Stripe";
$pm_title_wire = "Elektronisk overførsel";
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