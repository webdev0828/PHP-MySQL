<?PHP

//-------------------------------------------------------
	  $language_pack_name = "norwegian";
	  $language_pack_table_name = "norwegian";
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
$header_title = "Affiliate-program";
$header_indexLink = "Affiliate hjem";
$header_signupLink = "Registrer deg nå";
$header_accountLink = "Administrer konto";
$header_emailLink = "Kontakt oss";
$header_greeting = "Velkommen";
$header_nonLogged = "Gjest";
$header_logout = "Logg ut her";
$footer_tag = "Affiliate-program fra iDevAffiliate";
$footer_copyright = "Opphavsrett";
$footer_rights = "Alle rettigheter reserveres";
$index_heading_1 = "Velkommen til vårt affilateprogram!";
$index_paragraph_1 = "Programmet vårt er gratis, det er enkelt å registrere seg og det kreves ingen teknisk kunnskap. Affiliateprogrammer er vanlige på nettet og tilbyr eiere en ekstra måte for å tjene på nettsidene sine. Affiliater genererer trafikk og salg for kommersielle nettsider og mottar betaling i form av kommisjon for dette. ";
$index_heading_2 = "Hvordan fungerer det?";
$index_paragraph_2 = "Når du registrerer deg som bruker i vårt affiliateprogram blir du tilbudt en rekke bannere og tekstlenker som du kan plassere på nettsiden din. Når en bruker klikker på en av lenkene dine blir de omdirigert til nettsiden vår og aktiviteten deres blir sporet av vår programvare. Du tjener en kommisjon basert på din kommisjonstype.";
$index_heading_3 = "Statistikk og rapportering i sanntid!";
$index_paragraph_3 = "Logg inn 24 timer i døgnet for å sjekke salgene dine, trafikk, saldo og se hvordan bannerene dine gjør det.";
$index_login_title = "Affiliate-innlogging";
$index_login_username = "Brukernavn";
$index_login_password = "Passord";
$index_login_username_field = "brukernavn";
$index_login_password_field = "passord";
$index_login_button = "Logg inn";
$index_login_signup_link = "Klikk her for å registrere deg";
$index_table_title = "Programdetaljer";
$index_table_commission_type = "Kommisjonstype";
$index_table_initial_deposit = "Førsteinnskudd";
$index_table_requirements = "Krav til utbetaling";
$index_table_duration = "Varighet på utbetaling";
$index_table_choose = "Velg blant følgende utbetalingsalternativer!";
$index_table_sale = "Pay-Per-Sale";
$index_table_click = "Pay-Per-Click";
$index_table_sale_text = "for hvert salg du leverer.";
$index_table_click_text = "for hvert klikk du leverer.";
$index_table_deposit_tag = "Kun for å registrere deg!";
$index_table_requirements_tag = "Minstebeløp som kreves for utbetaling.";
$index_table_duration_tag = "Utbetalinger utføres en gang i måneden, for foregående måned.";
$signup_left_column_text = "Bli med i vårt affiliateprogram og begynn å tjene penger for hvert salg du leverer! Opprett en konto, plasser lenkene i form av koder på nettsiden vår og se at saldoen din øker etter hvert som dine besøkende blir våre kunder.";
$signup_left_column_title = "Velkommen affiliert!";
$signup_login_title = "Opprett kontoen din";
$signup_login_username = "Brukernavn";
$signup_login_password = "Passord";
$signup_login_password_again = "Gjenta passord";
$signup_login_minmax_chars = "- Brukernavn må bestå av minimum user_min_chars tegn.&lt;br /&gt;- Brukernavn kan være alfanumerisk.&lt;br /&gt;- Brukernavnet kan inneholde disse tegnene:  _ (kun understrek)&lt;br /&gt;&lt;br /&gt;- Passordet må bestå av minimum pass_min_chars tegn.&lt;br /&gt;- Passordet kan være alfanumerisk.&lt;br /&gt;- Passordet kan inneholde disse tegnene:  characters_allowed";
$signup_login_must_match = "Disse inndataene må samsvare med inndataene for passord.";
$signup_standard_title = "Standardopplysninger";
$signup_standard_email = "E-postadresse";
$signup_standard_company = "Firmanavn";
$signup_standard_checkspayable = "Sjekker utbetales til";
$signup_standard_weburl = "Nettsideadresse";
$signup_standard_taxinfo = "Skatte-ID, SSN eller MVA";
$signup_personal_title = "Personlige opplysninger";
$signup_personal_fname = "Fornavn";
$signup_personal_state = "Stat eller provins";
$signup_personal_lname = "Etternavn";
$signup_personal_phone = "Telefonnummer";
$signup_personal_addr1 = "Gateadresse";
$signup_personal_fax = "Faksnummer";
$signup_personal_addr2 = "Ytterligere adresse";
$signup_personal_zip = "Postnummer";
$signup_personal_city = "By";
$signup_personal_country = "Land";
$signup_commission_title = "Betaling av kommisjon";
$signup_commission_howtopay = "Hvordan vil du bli betalt?";
$signup_commission_style_PPS = "Pay-Per-Sale";
$signup_commission_style_PPC = "Pay-Per-Click";
$signup_terms_title = "Vilkår og betingelser";
$signup_terms_agree = "Jeg har lest, forstått og godtar vilkårene og betingelsene ovenfor.";
$signup_page_button = "Opprett kontoen min";
$signup_success_email_comment = "Vi har sendt en e-post til deg med brukernavn og passord.<BR />\r\nDu bør oppbevare dette på et trygt sted for fremtidig referanse.";
$signup_success_login_link = "Logg inn på kontoen din";
$custom_fields_title = "Brukerdefinerte felter";
$logout_msg = "<b>Du er nå logget ut</b><BR />Takk for din deltagelse i vårt affiliateprogram.";
$signup_page_success = "Kontoen din er opprettet";
$login_left_column_title = "Kontoinnlogging";
$login_left_column_text = "Angi brukernavn og passord for å få tilgang til din kontostatistikk, bannere, lenkekoder, FAQ og mer.<BR/ ><BR/ >Hvis du har glemt passordet ditt kan du angi brukernavnet ditt og vi sender deg innloggingsopplysningene dine via e-post.<BR /><BR />";
$login_title = "Logg inn på kontoen din";
$login_username = "Brukernavn";
$login_password = "Passord";
$login_invalid = "Ugyldig innlogging";
$login_now = "Logg inn på kontoen min";
$login_send_title = "Trenger du passordet ditt?";
$login_send_username = "Brukernavn";
$login_send_info = "Innloggingsopplysninger sendt via e-post";
$login_send_pass = "Sendt via e-post";
$login_send_bad = "Brukernavnet finnes ikke";
$help_new_password_heading = "Nytt passord";
$help_new_password_info = "Ditt passord må være minimum pass_min_chars tegn i langt. Det kan kun inneholder bokstaver, tall og følgende tegn:  characters_allowed";
$help_confirm_password_heading = "Bekreft nytt passord";
$help_confirm_password_info = "Inndata for passord må samsvare med inndata for nytt passord.";
$help_custom_links_heading = "Sporende nøkkelord";
$help_custom_links_info = "Nøkkelordet ditt kan ikke være på mer enn 30 tegn. Det kan kun inneholde bokstaver, tall og bindestrek.";
$error_title = "Følgende feil ble oppdaget";
$username_invalid = "Ugyldig brukernavn. Det kan kun inneholde bokstaver, tall og understrek.";
$username_taken = "Brukernavnet du har valgt er allerede i bruk.";
$username_short = "Brukernavnet ditt er for kort. Det må være på minst user_min_chars tegn.";
$username_long = "Brukernavnet ditt er for langt. Det kan være på maksimalt user_max_chars tegn.";
$password_invalid = "Ugyldig passord. Det kan kun inneholde bokstaver, tall og følgende tegn:  characters_allowed";
$password_short = "Passordet ditt er for kort. De må være på minst pass_min_chars tegn.";
$password_long = "Passordet ditt er for langt. Det kan være på maksimalt pass_max_chars tegn.";
$password_mismatch = "Passordene du har angitt samsvarer ikke.";
$missing_checks = "Vennligst angi navnet på personen som sjekkene skal utbetales til.";
$missing_tax = "Vennligst angi skatte-ID, SSN eller MVA-informasjon.";
$missing_fname = "Vennligst angi fornavn.";
$missing_lname = "Vennligst angi etternavn.";
$missing_email = "Vennligst angi e-postadresse.";
$invalid_email = "E-postadressen din er ugyldig.";
$missing_address = "Vennligst angi gateadresse.";
$missing_city = "Vennligst angi by.";
$missing_company = "Vennligst angi firmanavn.";
$missing_state = "Vennligst angi stat eller provins.";
$missing_zip = "Vennligst angi postnummer.";
$missing_phone = "Vennligst angi telefonnummer.";
$missing_website = "Vennligst angi nettsideadresse.";
$missing_paypal = "Du har valgt å motta betaling via PayPal, vennligst angi PayPal-konto.";
$missing_terms = "Du har ikke godtatt våre vilkår og betingelser.";
$paypal_required = "En PayPal-konto er påkrevd for å motta betaling.";
$missing_custom = "Vennligst fyll inn feltet:";
$account_total_transactions = "Antall transaksjoner";
$account_standard_linking_code = "Standard lenkekode - flott for bruk i e-poster!";
$account_copy_paste = "Kopier/lim inn koden ovenfor på nettsiden eller i e-poster";
$account_not_approved = "Kontoen din avventer godkjenning";
$account_suspended = "Kontoen din er for øyeblikket suspendert";
$account_standard_earnings = "Standardinntjening";
$account_inc_bonus = "inkluderer bonuser";
$account_second_tier = "Nivåinntjening";
$account_recurring = "Gjentagende inntjening";
$account_not_available = "N/A";
$account_earned_todate = "Totalt inntjent per dags dato";
$menu_heading_overview = "Kontooversikt";
$menu_general_stats = "Generell statistikk";
$menu_tier_stats = "Nivåstatistikk";
$menu_payment_history = "Betalingshistorikk";
$menu_commission_details = "Kommisjonsdetaljer";
$menu_recurring_commissions = "Gjentagende kommisjoner";
$menu_traffic_log = "Innkommende trafikklogg";
$menu_heading_marketing = "Markedsføringsmateriale";
$menu_banners = "Bannere";
$menu_text_ads = "Tekstannonser";
$menu_text_links = "Tekstlenker";
$menu_email_links = "E-postlenker";
$menu_html_links = "HTML-annonser";
$menu_offline = "Offline markedsføring";
$menu_tier_linking_code = "Nivåbasert lenkekode";
$menu_email_friends = "E-post til venner &amp; partnere";
$menu_custom_links = "Bygg &amp; spor dine egne lenker";
$menu_heading_management = "Kontoadministrasjon";
$menu_comalert = "Oppsett av CommissionAlert";
$menu_comstats = "Oppsett av CommissionStats";
$menu_edit_account = "Rediger kontoen min";
$menu_change_pass = "Endre passordet mitt";
$menu_change_commission = "Endre kommisjonstypen min";
$menu_heading_general_info = "Generell informasjon";
$menu_browse_affiliates = "Bla gjennom andre affiliater";
$menu_faq = "Ofte stilte spørsmål";
$suspended_title = "Varsel om kontostatus";
$suspended_heading = "Kontoen din er for øyeblikket suspendert";
$suspended_notes = "Administratormeldinger";
$pending_title = "Vasel om kontostatus";
$pending_heading = "Kontoen din avventer for øyeblikket godkjenning";
$pending_note = "Så snart vi har godkjent kontoen din blir markedsføringsmateriale gjort tilgjengelig for deg.";
$faq_title = "Ofte stilte spørsmål";
$faq_none = "Ingen FAQ ennå";
$browse_title = "Bla gjennom andre affiliater";
$browse_none = "Ingen andre affiliater å vise";
$change_comm_title = "Endre kommisjonstype";
$change_comm_curr_comm = "Gjeldende kommisjonstype";
$change_comm_curr_pay = "Gjeldende utbetalingsnivå";
$change_comm_new_comm = "Ny kommisjonstype";
$change_comm_warning = "Hvis du endrer kommisjonstype blir kontoen din tilbakestilt til utbetalingsnivå 1";
$change_comm_button = "Endre kommisjonstype";
$change_comm_no_other = "Ingen andre kommisjonstyper er tilgjengelig";
$change_comm_level = "Nivå";
$change_comm_updated = "Kommisjonsstil oppdatert";
$password_title = "Endre passordet mitt";
$password_old_password = "Gammelt passord";
$password_new_password = "Nytt passord";
$password_confirm_password = "Bekreft nytt passord";
$password_button = "Endre passord";
$password_warning_old_missing = "Gammelt passord er feil eller mangler";
$password_warning_new_missing = "Nytt passord mangler";
$password_warning_mismatch = "Passordene samsvarer ikke";
$password_warning_invalid = "Passordet er ugyldig - klikk på hjelpelenkene";
$password_notice = "Passordet er oppdatert";
$edit_failed = "Oppdatering mislyktes - se feilmeldingene ovenfor";
$edit_success = "Kontoen er oppdatert";
$edit_button = "Rediger kontoen min";
$commissionstats_title = "Oppsett av CommissionStats";
$commissionstats_info = "Ved å installere CommissionStats kan du sjekke statistikken din øyeblikkelig, direkte fra skrivebordet! For å installere denne funksjonen laster du ned CommissionStats og <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>pakker opp</b></a> zip-filen på harddisken for deretter å kjøre <b>setup.exe</b>-filen. Når du blir bedt om innloggingsopplysninger angir du følgende informasjon.";
$commissionstats_hint = "Hint: Kopier og lim inn oppføringene for å sikre at det blir riktig";
$commissionstats_profile = "Profilnavn";
$commissionstats_username = "Brukernavn";
$commissionstats_password = "Passord";
$commissionstats_id = "Affiliate-ID";
$commissionstats_source = "Kildesti URL";
$commissionstats_download = "Last ned CommissionStats";
$commissionalert_title = "Oppsett av CommissionAlert";
$commissionalert_info = "Ved å installere CommissionAlert varsler vi deg øyeblikkelig ved nye kommisjoner, direkte på skrivebordet! For å installere denne funksjonen laster du ned CommissionAlert og <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>pakker opp</b></a> zip-filen på harddisken for deretter å kjøre <b>setup.exe</b>-filen. Når du blir bedt om innloggingsopplysninger angir du følgende informasjon.";
$commissionalert_hint = "Hint: Kopier og lim inn oppføringene for å sikre at det blir riktig";
$commissionalert_profile = "Profilnavn";
$commissionalert_username = "Brukernavn";
$commissionalert_password = "Passord";
$commissionalert_id = "Affiliate-ID";
$commissionalert_source = "Kildesti URL";
$commissionalert_download = "Last ned CommissionAlert";
$offline_title = "Offline markedsføring";
$offline_paragraph_one = "Tjen penger på å promotere nettsiden din (offline) til venner og partnere!";
$offline_send = "Send kunder til";
$offline_page_link = "vis side";
$offline_paragraph_two = "Kundene dine angir ditt <b>affiliate ID-nummer</b> i feltet på ovennevnte side, og du blir registrert som affiliate for alle kjøp de foretar.";
$banners_title = "Bannere";
$banners_size = "Bannerstørrelse";
$banners_description = "Bannerbeskrivelse";
$ad_title = "Tekstannonser";
$ad_info = "Ved å bruke lenkekoden som angis kan du justere fargevalg, høyde og bredde på tekstannonsene dine.";
$links_title = "Lenkenavn";
$email_title = "E-postlenker";
$email_group = "Markedføringsgrupper";
$email_button = "Vis e-postlenker";
$email_no_group = "Ingen gruppe er valgt";
$email_choose = "Vennligst velg en markedsføringsgruppe ovenfor";
$email_notice = "Markedføringsgrupper kan ha ulike innkommende trafikksider";
$email_ascii = "<b>ASCII/tekstversjon</b> - for bruk i e-poster med ren tekst.";
$email_html = "<b>HTML-versjon</b> - for bruk i HTML-formaterte e-poster.";
$email_test = "Testlenke";
$email_test_info = "Dette er hvor kundene blir sendt til nettsiden vår.";
$email_source = "Kildekode - kopier/lim inn i e-postmeldingen din";
$html_title = "HTML annonsenavn";
$html_view_link = "Vis denne HTML-annonsen";
$traffic_title = "Innkommende trafikklogg";
$traffic_display = "Vis forrige";
$traffic_display_visitors = "Besøkende";
$traffic_button = "Vis trafikklogg";
$traffic_title_details = "Innkommende trafikkdetaljer";
$traffic_ip = "IP-adresse";
$traffic_refer = "Refererende URL";
$traffic_date = "Dato";
$traffic_time = "Tid";
$traffic_bottom_tag_one = "Viser siste";
$traffic_bottom_tag_two = "av";
$traffic_bottom_tag_three = "Totalt unike besøkende";
$traffic_none = "Ingen trafikklogger eksisterer";
$traffic_no_url = "N/A - mulig bokmerke eller e-postlenke";
$traffic_box_title = "Komplett refererende URL";
$traffic_box_info = "Klikk på lenken for å besøke nettsiden";
$payment_title = "Betalingshistorikk";
$payment_date = "Betalingsdato";
$payment_commissions = "Kommisjoner";
$payment_amount = "Betalingsbeløp";
$payment_totals = "Totalt";
$payment_none = "Ingen betalingshistorikk eksisterer";
$tier_stats_title = "Nivåstatistikk";
$tier_stats_accounts = "Nivåkontoer direkte under deg";
$tier_stats_grab_link = "Få din nivå lenkekode";
$tier_stats_none = "Ingen nivåkontoer eksisterer";
$tier_stats_username = "Brukernavn";
$tier_stats_current = "Gjeldende kommisjoner";
$tier_stats_previous = "Tidligere utbetalinger";
$tier_stats_totals = "Totalt";
$recurring_title = "Gjentagende kommisjoner";
$recurring_none = "Ingen gjentagende kommisjoner eksisterer";
$recurring_date = "Kommisjonsdato";
$recurring_status = "Gjentagende status";
$recurring_payout = "Neste utbetaling";
$recurring_amount = "Beløp";
$recurring_every = "Hver";
$recurring_in = "Om";
$recurring_days = "Dager";
$recurring_total = "Totalt";
$tlinks_title = "Legg til andre til nivået ditt og tjen penger fra dem også!";
$tlinks_embedded_one = "Registrering av nivåkreditering er allerede aktivt i dine standard affiliatelenker!";
$tlinks_embedded_two = "Ved å bruke nivåsystemet kan du markedsføre affiliateprogrammet vårt til andre. Du kommer på øverste nivå for alle som registrerer seg i vårt affiliateprogram via din spesielle vervelenke nedenfor. Informasjon om hvor mye du kan tjene vises nedenfor.";
$tlinks_embedded_current = "Gjeldende nivåutbetaling";
$tlinks_forced_two = "Ved å bruke nivåsystemet kan du markedsføre affiliateprogrammet vårt til andre. Du kommer på øverste nivå for alle som registrerer seg i vårt affiliateprogram via din spesielle vervelenke nedenfor. Informasjon om hvor mye du kan tjene vises nedenfor.";
$tlinks_forced_code = "Vervelenke";
$tlinks_forced_paste = "Kopier/lim inn koden ovenfor på nettsiden din";
$tlinks_forced_money = "Webmastere tjen penger her!";
$comdetails_title = "Kommisjonsdetaljer";
$comdetails_date = "Kommisjonsdato";
$comdetails_time = "Kommisjonstid";
$comdetails_type = "Kommisjonstype";
$comdetails_status = "Gjeldende status";
$comdetails_amount = "Kommisjonsbeløp";
$comdetails_additional_title = "Ytterligere kommisjonsdetaljer";
$comdetails_additional_ordnum = "Ordrenummer";
$comdetails_additional_saleamt = "Salgsbeløp";
$comdetails_type_1 = "Bonuskommisjon";
$comdetails_type_2 = "Gjentagende kommisjon";
$comdetails_type_3 = "Nivåkommisjon";
$comdetails_type_4 = "Standardkommisjon";
$comdetails_status_1 = "Utbetalt";
$comdetails_status_2 = "Godkjent - ventende betaling";
$comdetails_status_3 = "Ventende betaling";
$comdetails_not_available = "N/A";
$details_title = "Kommisjonsdetaljer";
$details_drop_1 = "Gjeldende standardkommisjon";
$details_drop_2 = "Gjeldende nivåkommisjon";
$details_drop_3 = "Kommisjon som avventer godkjenning";
$details_drop_4 = "Utbetalt standardkommisjon";
$details_drop_5 = "Utbetalt nivåkommisjon";
$details_button = "Vis kommisjon";
$details_date = "Dato";
$details_status = "Status";
$details_commission = "Kommisjon";
$details_details = "Vis detaljer";
$details_type_1 = "Utbetalt";
$details_type_2 = "Avventer godkjenning";
$details_type_3 = "Godkjent - avventer betaling";
$details_none = "Ingen kommisjon å vise";
$details_no_group = "Ingen kommisjonsgruppe valgt";
$details_choose = "Vennligst velg en kommisjonsgruppe ovenfor";
$general_title = "Gjeldende kommisjon - fra siste utbetaling til dato";
$general_transactions = "Transaksjoner";
$general_earnings_to_date = "Inntjening til dato";
$general_history_link = "Vis betalingshistorikk";
$general_standard_earnings = "Standardinntjening";
$general_current_earnings = "Gjeldende inntjening";
$general_traffic_title = "Trafikkstatistikk";
$general_traffic_visitors = "Besøkende";
$general_traffic_unique = "Unike besøkende";
$general_traffic_sales = "Godkjente salg";
$general_traffic_ratio = "Salgsrate";
$general_traffic_info = "Denne statistikken inkluderer ikke gjentagende eller nivåkommisjon.";
$general_traffic_pay_type = "Utbetalingstype";
$general_traffic_pay_level = "Gjeldende utbetalingsnivå";
$general_notes_title = "Meldinger fra administrator";
$general_notes_date = "Dato opprettet";
$general_notes_to = "Til";
$general_notes_all = "Alle affilierte";
$general_notes_none = "Ingen meldinger å vise";
$contact_left_column_title = "Kontakt oss";
$contact_left_column_text = "Du er velkommen til å kontakte affiliateadministratoren via skjemaet til høyre.";
$contact_title = "Kontakt oss";
$contact_name = "Navnet ditt";
$contact_email = "Din e-postadresse";
$contact_message = "Melding";
$contact_chars = "tegn igjen";
$contact_button = "Send melding";
$contact_received = "Vi har mottatt meldingen din, vennligst gir oss 24 timer på å svare.";
$contact_invalid_name = "Ugyldig navn";
$contact_invalid_email = "Ugyldig e-postadresse";
$contact_invalid_message = "Ugyldig melding";
$invoice_button = "Faktura";
$invoice_header = "AFFILIATE BETALINGSFAKTURA";
$invoice_aff_info = "Affiliateinformasjon";
$invoice_co_info = "Informasjon";
$invoice_acct_info = "Kontoinformasjon";
$invoice_payment_info = "Betalingsinformasjon";
$invoice_comm_date = "Betalingsdato";
$invoice_comm_amt = "Kommisjonsbeløp";
$invoice_comm_type = "Kommisjonstype";
$invoice_admin_note = "Administratormelding";
$invoice_footer = "SLUTT PÅ FAKTURA";
$invoice_print = "Skriv ut faktura";
$invoice_none = "N/A";
$invoice_aff_id = "Affiliate-ID";
$invoice_aff_user = "Brukernavn";
$menu_pdf_marketing = "PDF markedsføringsbrosjyre";
$menu_pdf_training = "PDF opplæringsdokumenter";
$marketing_target_url = "Mål-URL";
$marketing_source_code = "Kildekode - kopier/lim inn på nettsiden din";
$marketing_group = "Markedsførindsgruppe";
$peels_title = "Sidebanner navn";
$peels_view = "Vis dette sidebanneret";
$peels_description = "Sidebanner beskrivelse";
$lb_head_title = "Påkrevd HEAD-kode for din HTML-side";
$lb_head_description = "For å bruke en lightbox på nettsiden din må du legge til følgende linjer i hovedseksjonen av den aktuelle nettsiden.";
$lb_head_source_code = "Lim inn denne koden i HEAD-seksjonen av HTML-dokumentet ditt.";
$lb_head_code_notes = "Du trenger bare å plassere denne koden én gang uansett hvor mange lightboxer du plasserer på nettsiden.";
$lb_head_tutorial = "Vis tutorial";
$lb_body_title = "Lightbox navn";
$lb_body_description = "Lightbox beskrivelse";
$lb_body_click = "Klikk på bildet ovenfor for å vise lightboxen.";
$lb_body_source_code = "Lim inn denne koden i BODY-delen av HTML-dokumentet ditt der du vil at bildet skal vises.";
$pdf_title = "PDF";
$pdf_training = "Opplæringsdokumenter";
$pdf_marketing = "Markedsføringsbrosjyrer";
$pdf_description_1 = "Adobe Reader er påkrevd for å vise og skrive ut vårt markedsføringsmateriell i PDF.";
$pdf_description_2 = "Adobe Reader kan lastes ned gratis fra Adobe sin nettside.";
$pdf_file_name = "Filnavn";
$pdf_file_size = "Filstørrelse";
$pdf_file_description = "Beskrivelse";
$pdf_bytes = "Bytes";
$menu_heading_training_materials = "Opplæringsmateriale";
$menu_videos = "Se opplæringsvideoer";
$menu_custom_manual = "Manual for tilpassede sporingslenker";
$menu_page_peels = "Sidebannere";
$menu_lightboxes = "Lightboxer";
$menu_email_templates = "E-postmaler";
$menu_heading_custom_links = "Tilpassete sporingslenker";
$menu_custom_reports = "Rapporter";
$menu_keyword_links = "Sporingslenker med nøkkelord";
$menu_subid_links = "Sub-affiliate sporingslenker";
$menu_alteranate_links = "Vekslende innkommende sidelenker";
$menu_heading_additional = "Ytterligere verktøy";
$menu_drop_heading_stats = "Generell statistikk";
$menu_drop_heading_commissions = "Kommisjon";
$menu_drop_heading_history = "Betalingshistorikk";
$menu_drop_heading_traffic = "Trafikklogg";
$menu_drop_heading_account = "Min konto";
$menu_drop_heading_logo = "Last opp min logo";
$menu_drop_heading_faq = "FAQ";
$menu_drop_general_stats = "Generell statistikk";
$menu_drop_tier_stats = "Nivåstatistikk";
$menu_drop_current = "Gjeldende kommisjon";
$menu_drop_tier = "Gjeldende nivåkommisjon";
$menu_drop_pending = "Avventer godkjenning";
$menu_drop_paid = "Betalt kommisjon";
$menu_drop_paid_rec = "Betalt nivåkommisjon";
$menu_drop_recurring = "Aktiv gjentagende kommisjon";
$menu_drop_edit = "Rediger min konto";
$menu_drop_password = "Endre passord";
$menu_drop_change = "Endre kommisjonstype";
$account_hidden = "skjult";
$keyword_title = "Tilpassede nøkkelordlenker";
$keyword_info = "Opprettelse av tilpassede nøkkelordlenker gir deg muligheten til å spore innkommente trafikk for ulike kilder. Opprett en lenke med opptil 4 ulike sporingsnøkkelord og den tilpassede sporingsrapporten viser deg en detaljert rapport for hvert nøkkelord du bruker.";
$keyword_heading = "Tilgjengelige variabler for tilpasset nøkkelordsporing";
$keyword_tracking = "Sporings-ID";
$keyword_build = "For å lage lenken din bruker du følgende URL og tilføyer sporings-IDen og nøkkelordet du ønsker å bruke.";
$keyword_example = "Eksempel";
$keyword_tutorial = "Vis tutorial";
$sub_tracking_title = "Sub-affiliate sporing";
$sub_tracking_info = "Opprettelse av sub-affiliatelenker gir deg muligheten til å dele ut die affiliatelenker slik at dine egne affiliater kan bruke dem. Du vil vite hvem som har generert kommisjonen for deg fordi vi rapporterer til deg hvilken av dine sub-affiliater som har generert salget. En annen grunn til å bruke sub-affiliatelenker er hvis du ønsker ditt eget sporingssystem inkludert i rapporter.";
$sub_tracking_build = "Erstatt XXX med den affiliates ID-nummer i affiliateprogrammet ditt. Repeter denne prosessen for alle dine affiliater.";
$sub_tracking_example = "Eksempel";
$sub_tracking_tutorial = "Vis tutorial";
$sub_tracking_id = "Sub-affiliate ID";
$alternate_title = "Vekslende innkommende sidelenker";
$alternate_option_1 = "Alternativ 1: Automatisk lenkeopprettelse";
$alternate_heading_1 = "Automatisk lenkeopprettelse";
$alternate_info_1 = "Definer din egen innkommende trafikk ved å taste inn URL-en du ønsker trafikken levert til og vi oppretter en lenke for deg. Ved å bruke denne funksjonen får du en kortere lenke som du kan bruke med den innebygde URL-lenken ved hjelp av et ID-nummer i databasen vår.";
$alternate_button = "Opprett lenken min";
$alternate_links_heading = "Mine vekslende innkommende URL-lenker";
$alternate_links_note = "Eksisterende lenker forblir funksjonelle hvis du fjerner en tilpasset lenke fra denne siden.";
$alternate_links_remove = "fjern";
$alternate_option_2 = "Alternativ 2: Manuell lenkeopprettelse";
$alternate_info_2 = "Hvis du foretrekker å tilføye dine egne affiliatelenker med en vekslende, innkommende URL kan du bruke følgende struktur.";
$alternate_variable = "Vekslende innkommende URL-variabel";
$alternate_example = "Eksempel";
$alternate_build = "For å lage lenken din bør du ta følgende URL og tilføy den vekslende innkommende URL-en du ønsker å bruke.";
$alternate_none = "Ingen vekslende innkommende lenker opprettet";
$alternate_tutorial = "Vis tutorial";
$cr_title = "Tilpasset nøkkelordrapport";
$cr_select = "Velg et nøkkelord";
$cr_button = "Generer rapport";
$cr_no_results = "Ingen søkeresultater funnet";
$cr_no_results_info = "Prøv en annen kombinasjon av nøkkelord";
$cr_used = "Nøkkelord brukt";
$cr_found = "Denne lenken er funnet";
$cr_times = "ganger";
$cr_unique = "Unike lenker funnet";
$cr_detailed = "Detaljert lenkerapport";
$cr_export = "Eksporter rapport til Excel";
$cr_none = "Ingen nøkkelord funnet";
$logo_title = "Last opp din firmalogo";
$logo_info = "Hvis du ønsker å laste opp firmalogoen din viser vi den til kunder du omdirigerer til nettsiden vår. Dette gjør det mulig å personliggjøre kundens opplevelse når de besøker oss..";
$logo_bullet_one = "Bilder kan være .jpg, .gif eller .png. Flash-innhold er ikke tillatt.";
$logo_bullet_two = "Upassende bilder blir forkastet og kontoen din blir suspendert..";
$logo_bullet_three = "Ditt bilde/logo blir ikke vist på nettsiden vår før vi har godkjent det.";
$logo_bullet_size_one = "Bilder kan ha en maksbredde på";
$logo_bullet_size_two = "piksler og en makshøyde på";
$logo_bullet_req_size_one = "Bilder må ha en bredde på";
$logo_bullet_req_size_two = "piksler og en høyde på";
$logo_bullet_pixels = "piksler.";
$logo_choose = "Velg et bilde";
$logo_file = "Velg en fil:";
$logo_browse = "Bla gjennom...";
$logo_button = "Last opp";
$logo_current = "Mitt gjeldende bilde";
$logo_remove = "fjern";
$logo_display_status = "Bildestatus:";
$logo_pending = "Avventer godkjenning";
$logo_approved = "Godkjent";
$logo_success = "Bildet ble lastet opp og avventer nå godkjenning.";
$signup_security_title = "Kontoverifisering";
$signup_security_info = "Vennligst angi sikkerhetskoden som vises i feltet. Dette steget hjelper oss med å unngå automatiske registreringer.";
$signup_security_code = "Sikkerhetskode";
$sub_tracking_none = "Ingen";
$missing_security_code = "Feil eller manglende kontoverifikasjon/sikkerhetskode";
$alternate_success_title = "Lenkeopprettelse fullført";
$alternate_success_info = "Hent lenken din nedenfor og begynn å levere trafikk til din definerte URL.";
$alternate_failed_title = "Feil ved lenkeopprettelse";
$alternate_failed_info = "Vennligst angi en gyldig URL.";
$logo_missing_filename = "Vennligst velg et filnavn.";
$logo_required_width = "Bildebredde må være";
$logo_required_height = "Bildehøyde må være";
$logo_maximum_width = "Bildebredde kan kun være";
$logo_maximum_height = "Bildehøyde kan kun være";
$logo_size_maximum = "Bildestørrelse kan være maks";
$logo_bad_filetype = "Bildetypen er ikke tillatt. Tillatte typer er .gif, .jpg og .png.";
$logo_upload_error = "Feil ved opplasting av bilde, vennligst kontakt affiliatemanageren.";
$logo_error_title = "Feil ved opplasting av bilder";
$logo_error_bytes = "bytes.";
$excel_title = "Tilpasset rapport for nøkkelordlenker";
$excel_tab_report = "Tilpasset nøkkelordrapport";
$excel_tab_logs = "Trafikklogger";
$excel_date = "Rapportdato:";
$excel_affiliate = "Affiliate-ID:";
$excel_criteria = "Kriterier for nøkkelordlenke";
$excel_link = "Lenkestruktur";
$excel_hits = "Unike treff";
$excel_comm_stats = "Kommisjonsstatistikk";
$excel_comm_current = "Gjeldende kommisjon";
$excel_comm_paid = "Utbetalt kommisjon";
$excel_comm_total = "Total kommisjon";
$excel_comm_ratio = "Konverteringssats";
$excel_earned = "Kommisjon tjent";
$excel_earned_current = "Gjeldende kommisjon";
$excel_earned_paid = "Utbetalt kommisjon";
$excel_earned_total = "Total kommisjon tjent";
$excel_earned_tab = "Klikk på trafikklogg-fanen (nedenfor) for å vise trafikkloggen for denne tilpassede lenken.";
$excel_log_title = "Tilpasset logg for nøkkelordtrafikk";
$excel_log_ip = "IP-adresse";
$excel_log_refer = "Refererende URL";
$excel_log_date = "Dato";
$excel_log_time = "Tid";
$excel_log_target = "Mål-URL";
$etemplates_title = "E-postmaler";
$etemplates_view_link = "Vis denne e-postmalen";
$etemplates_name = "Navn på mal";
$signup_maintenance_heading = "Varsel om vedlikehold";
$signup_maintenance_info = "Registreringer er for øyeblikket ikke tilgjengelig. Vennligst prøv igjen senere.";
$marketing_group_title = "Markedsføringsgruppe";
$marketing_button = "Vis";
$marketing_no_group = "Ingen gruppe er valgt";
$marketing_choose = "Vennligst velg en markedsføringsgruppe ovenfor";
$marketing_notice = "Markedsføringsgrupper kan ha ulike innkommende trafikksider";
$canspam_heading = "CAN-SPAM regler og aksept";
$canspam_accept = "Jeg har lest, forstått og godtar CAN-SPAM-reglene ovenfor.";
$canspam_error = "Du har ikke godtatt våre CAN-SPAM-regler.";
$signup_banned = "En feil oppstod ved opprettelse av konto. Vennligst kontakt systemadministratoren for mer informasjon.";
$header_testimonials = "Affiliateanmeldelser";
$testi_visit = "Besøk nettside";
$testi_description = "Send inn din anmeldelse av vårt affiliateprogram og vi plasserer den på vår &lt;a href=&quot;testimonials.php&quot;&gt;anmeldelser&lt;/a&gt;-side med lenke til din nettside.";
$testi_name = "Navn";
$testi_url = "Nettside-URL";
$testi_content = "Anmeldelser";
$testi_code = "Sikkerhetskode";
$testi_submit = "Send inn anmeldelse";
$testi_na = "Anmeldelser er ikke tilgjengelig.";
$testi_title = "Send inn en anmeldelse";
$testi_success_title = "Anmeldelse send inn";
$testi_success_message = "Takk for at du sende inn anmeldelsen din. Teamet vårt vil gjennomgå den snarest.";
$testi_error_title = "Feil ved innsending av anmeldelse";
$testi_error_name_missing = "Vennligst inkluder navnet ditt i anmeldelsen.";
$testi_error_url_missing = "Vennligst inkluder din nettside-URL i anmeldelsen.";
$testi_error_missing = "Vennligst inkluder tekst i din anmeldelse.";
$menu_drop_delayed = "Forsinket kommisjon";
$details_drop_6 = "Gjeldende forsinket kommisjon";
$details_type_6 = "Forsinket - blir godkjent snart";
$comdetails_status_6 = "Forsinket - blir godkjent snart";
$tc_reaccept_title = "Vilkår og betingelser endringsvarsel";
$tc_reaccept_sub_title = "Du må godta våre nye vilkår og betingelser for å få tilgang til kontoen din.";
$tc_reaccept_button = "Jeg har lest, forstår og godtar ovennevnte vilkår og betingelser.";
$tlinks_active = "Antall aktive nivåer";
$tlinks_payout_structure = "Utbetalingsstruktur for nivåer";
$tlinks_level = "Nivåer";
$tierText1 = "% beregnet fra den refererende affiliates kommisjonsbeløp.";
$tierText2 = "% beregnet fra kommisjonsbeløp på øveste nivå.";
$tierText3 = "% beregnet fra salgsbeløp.";
$tierTextflat = "fast sats";
$edit_custom_button = "Rediger svar";
$private_heading = "Privat registrering";
$private_info = "Vår affiliateprogram er ikke åpent for offentligheten og krever en registreringskode. Informasjon om hvordan du skaffer en registreringskode er tilgjengelig her.";
$private_required_heading = "Registreringskode påkrevd";
$private_code_title = "Angi registreringskode";
$private_button = "Send inn kode";
$private_error_title = "Ugyldig registreringskode er angitt";
$private_error_invalid = "Registreringskoden du har angitt er ugyldig.";
$private_error_expired = "Registreringskoden du har angitt er utløpt og er ikke lenger gyldig.";
$qr_code_title = "QR-koder";
$qr_code_size = "QR kodestørrelse";
$qr_code_button = "Vis QR-kode";
$qr_code_offline_title = "Offline markedsføring";
$qr_code_offline_content1 = "Legg til denne QR-koden til markedsføringsbrosjyren din, flygeblad, firmakort osv.";
$qr_code_offline_content2 = "- Høyreklikk på bildet og &lt;strong&gt;lagre det&lt;/strong&gt; på datamaskinen din.";
$qr_code_online_title = "Online markedsføring";
$qr_code_online_content = "Legg til denne QR-koden til din nettside, sosiale media, blogger, etc.";
$menu_coupon = "Kupongkoder";
$coupon_title = "Dine tilgjengelige kupongkoder";
$coupon_desc = "Del ut disse kupongkodene og tjen kommisjon hver gang noen bruker koden din!";
$coupon_head_1 = "Kupongkode";
$coupon_head_2 = "Rabatt til kunde";
$coupon_head_3 = "Ditt kommisjonsbeløp";
$coupon_sale_amt = "av salgsbeløp";
$coupon_flat_rate = "fast sats";
$coupon_default = "Standard utbetalingsnivå";
$cc_vanity_title = "Be om en personlig kupongkode";
$cc_vanity_field = "Kupongkode";
$cc_vanity_button = "Be om en kupongkode";
$cc_vanity_error_missing = "<strong>Feil!</strong> Vennligst angi en kupongkode.";
$cc_vanity_error_exists = "<strong>Feil!</strong> Du har allerede bedt om denne koden. Den avventer godkjenning.";
$cc_vanity_error = "<strong>Feil!</strong> Kupongkoden er ugyldig. Vennligst bruk kun bokstaver, tall eller understreker.";
$cc_vanity_success = "<strong>Vellykket!</strong> Dine personlige kupongkoder er forespurt.";
$coupon_none = "Ingen kupongkoder er tilgjengelig for øyeblikket.";
$pic_error_title = "Feil ved opplasting av bilder";
$pic_missing = "Vennligst velg et filnavn.";
$pic_invalid = "Bildetypen er ikke tillatt. Tillatte bildetyper er .gif, .jpg og .png.";
$pic_error = "Feil ved opplasting av bilde, vennligst kontakt affiliatemanageren.";
$pic_success = "Bildet ditt ble lastet opp.";
$pic_title = "Last opp bildet ditt";
$pic_info = "Opplasting av bilde bidrar til å personliggjøre vår opplevelse med deg.";
$pic_bullet_1 = "Bilder kan være .jpg, .gif eller .png.";
$pic_bullet_2 = "Upassende bilder blir forkastet og kontoen din blir suspendert.";
$pic_bullet_3 = "Bildet ditt blir ikke vist offentlig. Det blir kun lagt til kontoen din slik at det er synlig for oss.";
$pic_file = "Velg en fil:";
$pic_button = "Last opp";
$pic_current = "Mitt gjeldende bilde";
$pic_remove = "Fjern bilde";
$progress_title = "Berettighet for neste utbetaling:";
$progress_complete = "fullført.";
$progress_none = "Vi har ikke noe minstekrav for utbetaling.";
$progress_sentence_1 = "Du har tjent";
$progress_sentence_2 = "av";
$progress_sentence_3 = "kravet.";
$aff_lib_button = "<font style=\"font-size:16px; font-weight:bold;\">Få din gratistilgang til</font><BR />www.AffiliateLibrary.com";
$menu_announcements = "Sociale media-kampanjer";
$announcements_name = "Kampanjenavn";
$announcements_facebook_message = "Facebook-melding";
$announcements_twitter_message = "Twitter-melding";
$announcements_facebook_link = "Facebook-lenke";
$announcements_facebook_picture = "Facebook-bilde";
$general_last_30_days_activity = "Siste 30 dagers aktivitet";
$general_last_30_days_activity_traffic = "Trafikk";
$general_last_30_days_activity_commissions = "Kommisjon";
$accountability_title = "Regnskapsplikt og kommunikasjon";
$accountability_text = "<strong>Hva er dette?</strong><p>Vi tar proaktive steg for å skape tillitt med våre affiliatepartnere. Det er vårt mål å sikre at vi tilbyr så mye informasjon som mulig for hver kommisjon som er opptjent og/eller avslått i systemet vårt.</p><strong>Kommunikasjon</strong><p>Vi er tilgjengelige for å tilby detaljer for alle avslåtte kommisjoner. Vi tilbyr kommunikasjon med våre affiliater og oppfordrer til spørsmål og tilbakemeldinger.</p>";
$debit_reason_0 = 'Ingen';
$debit_reason_1 = 'Refusjon';
$debit_reason_2 = 'Tilbaketrekking';
$debit_reason_3 = 'Svindel rapporter';
$debit_reason_4 = 'Kansellert ordre';
$debit_reason_5 = 'Delvis refusjon';
$menu_drop_pending_debits = 'Avvendende debiteringer';
$debit_amount_label = 'Debiteringsbeløp';
$debit_date_label = 'Debiteringsdato';
$debit_reason_label = 'Debitering årsak';
$debit_paragraph = 'Debiteringer blir trukket fra din neste utbetaling.';
$debit_invoice_amount = 'Minus debiteringsbeløp';
$debit_revised_amount = 'Revidert utbetalingsbeløp';
$mv_head_description = 'Merk: Du kan kun plassere én vide per nettside.';
$mv_head_source_code = 'Lim inn denne koden i HEAD-delen av HTML-dokumentet ditt.';
$mv_body_title = 'Videotittel';
$mv_body_description = 'Beskrivelse';
$mv_body_source_code = 'Lim inn denne koden i BODY-delen av HTML-dokumentet ditt der du vil at videoen skal vises.';
$menu_marketing_videos = 'Videoer';
$mv_preview_button = 'Forhåndsvis video';
$dt_no_data = 'Ingen data tilgjengelig i tabell.';
$dt_showing_exists = 'Viser _START_ to _END_ av _TOTAL_ oppføringer.';
$dt_showing_none = 'Viser 0 til 0 av 0 oppføringer.';
$dt_filtered = '(filtrert fra totalt _MAX_ oppføringer)';
$dt_length_choice = 'Vis _MENU_ oppføringer.';
$dt_loading = 'Laster inn...';
$dt_processing = 'Behandler...';
$dt_no_records = 'Ingen matchende oppføringer funnet.';
$dt_first = 'Først';
$dt_last = 'Sist';
$dt_next = 'Neste';
$dt_previous = 'Forrige';
$dt_sort_asc = ': aktiver for å sortere kolonne i stigende rekkefølge';
$dt_sort_desc = ': aktiver for å sortere kolonne i synkende rekkefølge';
$choose_marketing_group = 'Velg en markedsføringsgruppe';
$email_already_used_1 = 'Konto kan ikke opprettes. Vi tillater kun';
$email_already_used_2 = 'konto';
$email_already_used_3 = 'opprettet per e-postadresse.';
$missing_fax = 'Vennligst angi faksnummeret ditt.';
$chart_last_6_months = 'Kommisjon utbetalt foregående 6 måneder';
$chart_last_6_months_paid = 'Kommisjoner utbetalt';
$chart_this_month = 'Våre topp 5 affiliater denne måneden';
$chart_this_month_none = 'Ingen data å vise.';
$login_return = 'Returner til affiliate hjem';
$login_lost_details = 'Angi brukernavnet ditt og vi sender deg en e-post med innloggingsopplysningene dine.';
$account_edit_general_prefs = 'Generelle preferanser';
$account_edit_email_language = 'E-postspråk';
$footer_connect = 'Assosier deg med oss';
$modal_close = 'Lukk';
$vat_amount_heading = 'MVA-beløp';
$menu_logout = 'Logg ut';
$menu_upload_picture = 'Last opp bildet ditt';
$menu_offer_testi = 'Send inn en anmeldelse';
$fb_login = 'Logg inn med Facebook';
$fb_permissions = 'Tillatelser er ikke gitt. Vennligst la nettsiden benytte e-postadressen din.';
$announcements_published = "Annonseringer publisert";
$training_videos_title = "Opplæringsvideoer";
$training_videos_general = "Generell markedsføring";
$commission_method = "Kommisjonsmetode";
$how_will_you_earn = "Hvordan tjener du kommisjon?";
$pm_account_credit = "Vi krediterer kontoen din for opptjent kommisjon.";
$pm_check_money_order = "Vi sender deg en sjekk/postanvisning i posten.";
$pm_paypal = "Vi sender deg betaling via PayPal.";
$pm_stripe = "Vi sender deg betaling via Stripe.";
$pm_wire = "Vi sender deg penger via bankoverføring.";
$add_to_signup_left_column_text = "<span style=\"color:#CC0000; font-style:italic;\">* indikerer påkrevd felt.</span>";
$paypal_email = "Paypal e-post";
$stripe_acct_details = "Stripe kontoopplysninger";
$stripe_connect = "Du kan koble til din Stripe-konto fra kontoinnstillinger etter registrering.";
$stripe_success = "Stripe-konto tilknyttet";
$stripe_settings = "Stripe innstillinger";
$stripe_connect_edit = "Tilknytt Stripe";
$stripe_delete = "Slett Stripe-konto";
$stripe_confirm = "Er du sikker på at du vil slette denne kontoen?";
$payment_settings = "Betalingsinnstillinger";
$edit_payment_settings = "Rediger betalingsinnstillinger";
$invalid_paypal_address = "Ugyldig Paypal e-postadresse.";
$payment_method_error = "Vennligst velg en betalingsmetode.";
$payment_settings_updated = "Betalingsmetode oppdatert.";
$stripe_removed = "Stripe-konto fjernet.";
$payment_settings_success = "Vellykket!";
$payment_update_notice_1 = "Merk!";
$payment_update_notice_2 = "Du har valgt å motta betaling via <strong>[payment_option_here]</strong> fra oss. Vennligst <a href=\"account.php?page=48\" style=\"font-weight:bold;\">klikk her</a> for å tilknytte din <strong>[payment_option_here]</strong>-konto.";
$pm_title_credit = "Kontokreditt";
$pm_title_mo = "Sjekk/postanvisning";
$pm_title_paypal = "PayPal";
$pm_title_stripe = "Stripe";
$pm_title_wire = "Elektronisk overføring";
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