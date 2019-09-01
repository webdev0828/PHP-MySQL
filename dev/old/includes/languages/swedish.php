<?PHP

//-------------------------------------------------------
	  $language_pack_name = "swedish";
	  $language_pack_table_name = "swedish";
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
$header_title = "Affiliateprogram";
$header_indexLink = "Affiliate hem";
$header_signupLink = "Registrera dig nu";
$header_accountLink = "Hantera konto";
$header_emailLink = "Kontakta oss";
$header_greeting = "Välkommen";
$header_nonLogged = "Gäst";
$header_logout = "Logga ut här";
$footer_tag = "Affiliate mjukvara från iDevAffiliate";
$footer_copyright = "Upphovsrätt";
$footer_rights = "Alla rättigheter reserverade";
$index_heading_1 = "Välkommen till vårt affiliateprogram!";
$index_paragraph_1 = "Vårt program är gratis att delta i, det är enkelt att registrera sig och det kräver inget tekniskt kunnande. Affiliateprogram är vanliga på internet och erbjuder ägare av webbsidor en möjlighet att tjäna pengar från sin webbplats. Affiliateprogram genererar trafik och försäljningar för kommersiella webbsidor, och i gengäld belönas en affiliate med provision.";
$index_heading_2 = "Hur fungerar det?";
$index_paragraph_2 = "När du går med i vårt affiliateprogram, kommer du erhålla ett urval av banners och textlänkar som du kan använda på din webbsida. Då en besökare klickar på en av länkarna, kommer han/hon att omdirigeras till vår webbplats, där besökarens aktiviteter länkas via vår mjukvara. Du tjänar provision baserat på din provisionstyp.";
$index_heading_3 = "Statistik och rapportering i realtid!";
$index_paragraph_3 = "Logga in när som helst under en dag för att se dina försäljningar, din trafik, kontobalans, och för att se hur dina banners presterar.";
$index_login_title = "Logga in affiliate";
$index_login_username = "Användarnamn";
$index_login_password = "Lösenord";
$index_login_username_field = "användarnamn";
$index_login_password_field = "lösenord";
$index_login_button = "Logga in";
$index_login_signup_link = "Klicka här för att registrera dig";
$index_table_title = "Programinformation";
$index_table_commission_type = "Provisionstyp";
$index_table_initial_deposit = "Initial insättning";
$index_table_requirements = "Vinstutdelningskrav";
$index_table_duration = "Utbetalningstid";
$index_table_choose = "Välj mellan följande utbetalningsmetoder!";
$index_table_sale = "Betala per försäljning";
$index_table_click = "Betala per klick";
$index_table_sale_text = "för varje levererad försäljning.";
$index_table_click_text = "för varje levererat klick.";
$index_table_deposit_tag = "Bara för registrering!";
$index_table_requirements_tag = "Minimumbalans som krävs för utbetalning.";
$index_table_duration_tag = "Betalningar sker en gång om månaden, för föregående månad.";
$signup_left_column_text = "Gå med i vårt affiliateprogram och tjäna pengar per försäljning du skickar vår väg! Registrera helt enkelt ett konto, lägg till en länkningskod på din webbsida och se hur ditt kontos saldo växer då dina besökare blir våra kunder.";
$signup_left_column_title = "Välkommen affiliate!";
$signup_login_title = "Skapa ditt konto";
$signup_login_username = "Användarnamn";
$signup_login_password = "Lösenord";
$signup_login_password_again = "Lösenord igen";
$signup_login_minmax_chars = "- Användarnamn måste vara ett minimum av user_min_chars tecken.&lt;br /&gt;- Användarnamn kan vara alfanumerisk &lt;br /&gt;- Användarnamn kan innehålla följande tecken: _ (endast understreck)&lt;br /&gt;&lt;br /&gt;- Lösenord måste vara ett minimum av pass_min_chars tecken.&lt;br /&gt;- Lösenord kan vara alfanumerisk.&lt;br /&gt;- Lösenord kan innehålla dessa tecken:  characters_allowed";
$signup_login_must_match = "Fältet måste matcha fältet för ditt lösenord.";
$signup_standard_title = "Standardinformation";
$signup_standard_email = "E-postadress";
$signup_standard_company = "Företagsnamn";
$signup_standard_checkspayable = "Check betalas till";
$signup_standard_weburl = "Webbadress";
$signup_standard_taxinfo = "Skatte-registreringsnummer, SSN eller moms";
$signup_personal_title = "Personlig information";
$signup_personal_fname = "Förnamn";
$signup_personal_state = "Stat eller provins";
$signup_personal_lname = "Efternamn";
$signup_personal_phone = "Telefonnummer";
$signup_personal_addr1 = "Gatuadress";
$signup_personal_fax = "Faxnummer";
$signup_personal_addr2 = "Ytterligare adressinformation";
$signup_personal_zip = "Postnummer";
$signup_personal_city = "Stad";
$signup_personal_country = "Land";
$signup_commission_title = "Provisionsbetalning";
$signup_commission_howtopay = "Hur skall vi betala dig?";
$signup_commission_style_PPS = "Betala per försäljning";
$signup_commission_style_PPC = "Betala per klick";
$signup_terms_title = "Villkor";
$signup_terms_agree = "Jag har läst, förstått, och samtycker med ovanstående villkor.";
$signup_page_button = "Skapa mitt konto";
$signup_success_email_comment = "Vi har skickat ett e-postmeddelande till dig med ditt användarnamn och lösenord.<BR />\r\nDu bör spara meddelandet på en säker plats för framtida referens.";
$signup_success_login_link = "Logga in till ditt konto";
$custom_fields_title = "Användardefinierade fält";
$logout_msg = "<b>Du är nu utloggad</b><BR />Tack för din medverkan i vårt affiliateprogram.";
$signup_page_success = "Ditt konto har skapats";
$login_left_column_title = "Kontoinloggning";
$login_left_column_text = "Ange ditt användarnamn och lösenord för att få tillgång till ditt kontos statistik, banners, länkningskod, vanliga frågor, med mera.<BR/ ><BR/ >Om du har glömt ditt lösenord, ange ditt användarnamn för att få din inloggningsinformation skickad via e-post.<BR /><BR />";
$login_title = "Logga in till ditt konto";
$login_username = "Användarnamn";
$login_password = "Lösenord";
$login_invalid = "Ogiltig inloggning";
$login_now = "Logga in till mitt konto";
$login_send_title = "Glömt ditt lösenord?";
$login_send_username = "Användarnamn";
$login_send_info = "Inloggningsinformation har skickats till din e-post";
$login_send_pass = "Skicka till e-post";
$login_send_bad = "Användarnamn kunde inte hittas";
$help_new_password_heading = "Nytt lösenord";
$help_new_password_info = "Ditt lösenord måste vara åtminstone pass_min_chars tecken långt. Det får endast innehålla bokstäver, nummer och de följande tecknen:  characters_allowed";
$help_confirm_password_heading = "Bekräfta nytt lösenord";
$help_confirm_password_info = "Detta lösenord måste matcha det nya lösenordet.";
$help_custom_links_heading = "Spårnings nyckelord";
$help_custom_links_info = "Ditt nyckelord kan inte vara längre än 30 tecken. Det kan endast innehålla bokstäver, nummer, och bindestreck.";
$error_title = "Följande fel upptäcktes";
$username_invalid = "Ogiltigt användarnamn. Det får endast innehålla bokstäver, nummer och understreck.";
$username_taken = "Användarnamnet du valt är redan taget.";
$username_short = "Ditt användarnamn är för kort, det måste innehålla åtminstone user_min_chars tecken.";
$username_long = "Ditt användarnamn är för långt, det får inte innehålla minst user_max_chars tecken.";
$password_invalid = "Ogiltigt lösenord. Det får endast innehålla bokstäver, nummer och de följande tecknen:   characters_allowed";
$password_short = "Ditt lösenord är för kort, det måste innehålla åtminstone pass_min_chars tecken.";
$password_long = "Ditt lösenord är för långt, det måste innehålla minst pass_max_chars tecken.";
$password_mismatch = "Dina lösenord matchar inte.";
$missing_checks = "Vänligen ange en betalningsmottagare som checkar skall betalas till.";
$missing_tax = "Vänligen ange ditt skatte-registreringsnummer, SSN, eller momsinformation";
$missing_fname = "Vänligen ange ditt förnamn.";
$missing_lname = "Vänligen ange ditt efternamn.";
$missing_email = "Vänligen ange din e-postadress.";
$invalid_email = "Din e-postadress är ogiltig.";
$missing_address = "Vänligen ange din gatuadress.";
$missing_city = "Vänligen ange din stad.";
$missing_company = "Vänligen ange ditt företagsnamn.";
$missing_state = "Vänligen ange din stat eller provins.";
$missing_zip = "Vänlige ange ditt postnummer.";
$missing_phone = "Vänligen ange ditt telefonnummer.";
$missing_website = "Vänligen ange din webbadress.";
$missing_paypal = "Du har valt att motta PayPal-betalningar, vänligen ange ditt PayPal-konto.";
$missing_terms = "Du har inte godkänt våra villkor.";
$paypal_required = "Ett PayPal-konto krävs för betalningar.";
$missing_custom = "Vänligen ange information för nämnda fält:";
$account_total_transactions = "Totala transaktioner";
$account_standard_linking_code = "Standard länkningskod - Bra för användning inom e-postmeddelanden!";
$account_copy_paste = "Kopiera/Klistra in koden ovan på din webbsida eller i e-postmeddelanden";
$account_not_approved = "Ditt konto avvaktar för närvarande godkännande";
$account_suspended = "Ditt konto är för närvarande suspenderat";
$account_standard_earnings = "Standardintäkt";
$account_inc_bonus = "inklusive bonus";
$account_second_tier = "Nivåresultat";
$account_recurring = "Återkommande intäkter";
$account_not_available = "Inte tillgänglig";
$account_earned_todate = "Totalt intjänat till dagens datum";
$menu_heading_overview = "Kontoöversikt";
$menu_general_stats = "Generell statistik";
$menu_tier_stats = "Nivåstatistik";
$menu_payment_history = "Tidigare betalningar";
$menu_commission_details = "Provisionsuppgifter";
$menu_recurring_commissions = "Återkommande provision";
$menu_traffic_log = "Inkommande trafik logg";
$menu_heading_marketing = "Marknadsföringsmaterial";
$menu_banners = "Banners";
$menu_text_ads = "Textannonser";
$menu_text_links = "Textlänkar";
$menu_email_links = "E-postlänkar";
$menu_html_links = "HTML annonser";
$menu_offline = "Marknadsföring offline";
$menu_tier_linking_code = "Nivå länkningskod";
$menu_email_friends = "Skicka e-post till vänner &amp; bekanta";
$menu_custom_links = "Skapa &amp; spåra dina egna länkar";
$menu_heading_management = "Kontohantering";
$menu_comalert = "Setup för CommissionAlert";
$menu_comstats = "Setup för CommissionStats";
$menu_edit_account = "Redigera mitt konto";
$menu_change_pass = "Byt lösenord";
$menu_change_commission = "Ändra min provisionstyp";
$menu_heading_general_info = "Generell information";
$menu_browse_affiliates = "Sök andra affiliater";
$menu_faq = "Vanligt ställda frågor";
$suspended_title = "Kontostatus notifikationer";
$suspended_heading = "Ditt konto är för närvarande suspenderat";
$suspended_notes = "Administrativa notiser";
$pending_title = "Kontostatus notifikation";
$pending_heading = "Ditt konto avvaktar för närvarande godkännande";
$pending_note = "När ditt konto har godkänts, kommer marknadsföringsmaterial finnas tillgängligt för dig.";
$faq_title = "Vanligt ställda frågor";
$faq_none = "Inga vanligt ställda frågor finns ännu";
$browse_title = "Sök andra affiliater";
$browse_none = "Inga andra affiliater tillgängliga";
$change_comm_title = "Ändra provisionstyp";
$change_comm_curr_comm = "Nuvarande provisionstyp";
$change_comm_curr_pay = "Nuvarande betalningsnivå";
$change_comm_new_comm = "Ny provisionstyp";
$change_comm_warning = "Om du ändrar provisionstyp, kommer ditt konto att återställas till betalningsnivå 1";
$change_comm_button = "Ändra provisionstyp";
$change_comm_no_other = "Inga andra provisionstyper finns tillgängliga";
$change_comm_level = "Nivå";
$change_comm_updated = "Provisionstyp uppdaterad";
$password_title = "Byt lösenord";
$password_old_password = "Gammalt lösenord";
$password_new_password = "Nytt lösenord";
$password_confirm_password = "Bekräfta nytt lösenord";
$password_button = "Byt lösenord";
$password_warning_old_missing = "Gammalt lösenord felaktigt eller saknas";
$password_warning_new_missing = "Fältet för nytt lösenord är tomt";
$password_warning_mismatch = "Det nya lösenordet matchar inte";
$password_warning_invalid = "Ogiltigt lösenord - Klicka på hjälplänken";
$password_notice = "Lösenord uppdaterat";
$edit_failed = "Uppdateringen misslyckades - Se felmeddelanden ovan";
$edit_success = "Kontot uppdaterat";
$edit_button = "Redigera mitt konto";
$commissionstats_title = "Setup för CommissionStats";
$commissionstats_info = "Genom att installera CommissionStats, kan du omedelbart kontrollera din statistik från din Windows dator! För att installera funktionen, ladda ned CommissionStats och <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>lås upp</b></a> paketet till din hårddisk, kör sedan <b>setup.exe</b> filen. När du uppmanas att ange din inloggningsinformation, ange följande uppgifter.";
$commissionstats_hint = "Tips: Kopiera & klistra in varje del för att säkerställa noggrannhet";
$commissionstats_profile = "Profilnamn";
$commissionstats_username = "Användarnamn";
$commissionstats_password = "Lösenord";
$commissionstats_id = "Affiliate-ID";
$commissionstats_source = "Källsökväg URL";
$commissionstats_download = "Ladda ned CommissionStats";
$commissionalert_title = "Setup för CommissionAlert";
$commissionalert_info = "Genom att installera CommissionAlert, kommer vi notifiera dig omedelbart vid provision, direkt till din Windows dator! För att installera funktionen, ladda ned CommissionAlert och <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>lås upp</b></a> paketet till din hårddisk, kör sedan <b>setup.exe</b> filen. När du uppmanas att ange din inloggningsinformation, ange följande uppgifter.";
$commissionalert_hint = "Tips: Kopiera & klistra in varje del för att säkerställa noggrannhet";
$commissionalert_profile = "Profilnamn";
$commissionalert_username = "Användarnamn";
$commissionalert_password = "Lösenord";
$commissionalert_id = "Affiliate ID";
$commissionalert_source = "Källsökväg URL";
$commissionalert_download = "Ladda ned CommissionAlert";
$offline_title = "Marknadsföring offline";
$offline_paragraph_one = "Tjäna pengar genom att marknadsföra vår hemsida (offline) till dina vänner och bekanta!";
$offline_send = "Skicka kunder till";
$offline_page_link = "visa sida";
$offline_paragraph_two = "Dina kunder kommer att ange ditt <b>Affiliate ID-nummer</b> i rutan på sidan ovan, något som registrerar dig som en affiliate för samtliga köp de genomför.";
$banners_title = "Banners";
$banners_size = "Bannerstorlek";
$banners_description = "Banner beskrivning";
$ad_title = "Textannonser";
$ad_info = "Du kan justera färgschemat, höjden och vidden på den medföljande länkningskodens textannons.";
$links_title = "Länknamn";
$email_title = "E-post länkar";
$email_group = "Marknadsgrupp";
$email_button = "Visa e-post länkar";
$email_no_group = "Ingen grupp vald";
$email_choose = "Vänligen välj en marknadsgrupp ovan";
$email_notice = "Marknadsgrupper kan ha olika inkommande trafiksidor";
$email_ascii = "<b>ASCII/Textversion</b> - För e-postmeddelandens klartext.";
$email_html = "<b>HTML version</b> - För HTML-formaterade e-postmeddelanden.";
$email_test = "Test länk";
$email_test_info = "Det är hit dina kunder kommer att omdirigeras på vår webbsida.";
$email_source = "Källkod - Kopiera/Klistra in till ditt e-postmeddelande";
$html_title = "HTML annonsnamn";
$html_view_link = "Visa den här HTML-annonsen";
$traffic_title = "Inkommande trafik logg";
$traffic_display = "Visa senaste";
$traffic_display_visitors = "Besökare";
$traffic_button = "Visa trafik logg";
$traffic_title_details = "Inkommande trafik information";
$traffic_ip = "IP-adress";
$traffic_refer = "Referens URL";
$traffic_date = "Datum";
$traffic_time = "Tid";
$traffic_bottom_tag_one = "Visar senaste";
$traffic_bottom_tag_two = "av";
$traffic_bottom_tag_three = "Antal unika besökare";
$traffic_none = "Ingen trafik logg existerar";
$traffic_no_url = "N/A - Eventuellt bokmärke eller e-post länk";
$traffic_box_title = "Fullständig referens URL";
$traffic_box_info = "Klicka på länken för att besöka webbsidan";
$payment_title = "Betalningshistorik";
$payment_date = "Betalningsdag";
$payment_commissions = "Provisioner";
$payment_amount = "Betalningsbelopp";
$payment_totals = "Totalsumma";
$payment_none = "Ingen betalningshistorik tillgänglig";
$tier_stats_title = "Nivåstatistik";
$tier_stats_accounts = "Konton direkt under dig";
$tier_stats_grab_link = "Få din länkningskod";
$tier_stats_none = "Inga konton existerar";
$tier_stats_username = "Användarnamn";
$tier_stats_current = "Aktuella provisioner";
$tier_stats_previous = "Tidigare betalningar";
$tier_stats_totals = "Totalsumma";
$recurring_title = "Återkommande provisioner";
$recurring_none = "Inga återkommande provisioner existerar";
$recurring_date = "Provisionsdatum";
$recurring_status = "Återkommande status";
$recurring_payout = "Nästa betalning";
$recurring_amount = "Summa";
$recurring_every = "Alla";
$recurring_in = "Om";
$recurring_days = "Dagar";
$recurring_total = "Totalt";
$tlinks_title = "Lägg till andra till din lista och tjäna pengar på dem också!";
$tlinks_embedded_one = "Registrering kreditering är redan aktivt via dina standard affiliate länkar!";
$tlinks_embedded_two = "Att använda nivåsystemet låter dig marknadsföra vårt affiliateprogram till andra. Du kommer att vara högst upp på stegen om någon annan väljer att registrera sig till vårt affiliateprogram via din referenslänk nedan. Information om hur mycket du kan tjäna finns nedan.";
$tlinks_embedded_current = "Aktuell nivåbetalning";
$tlinks_forced_two = " Att använda nivåsystemet låter dig marknadsföra vårt affiliateprogram till andra. Du kommer att vara högst upp på stegen om någon annan väljer att registrera sig till vårt affiliateprogram via din referenslänk nedan. Information om hur mycket du kan tjäna finns nedan.";
$tlinks_forced_code = "Nivå referenslänk";
$tlinks_forced_paste = "Kopiera/Klistra in ovanstående kod på din webbsida";
$tlinks_forced_money = "Webmasters tjänar pengar här!";
$comdetails_title = "Provision information";
$comdetails_date = "Provision datum";
$comdetails_time = "Provision tid";
$comdetails_type = "Typ av provision";
$comdetails_status = "Aktuell status";
$comdetails_amount = "Provision belopp";
$comdetails_additional_title = "Ytterligare provision information";
$comdetails_additional_ordnum = "Beställningsnummer";
$comdetails_additional_saleamt = "Försäljningsbelopp";
$comdetails_type_1 = "Bonus provision";
$comdetails_type_2 = "Återkommande provision";
$comdetails_type_3 = "Nivå provision";
$comdetails_type_4 = "Standard provision";
$comdetails_status_1 = "Betald";
$comdetails_status_2 = "Godkänd - Avvaktar betalning";
$comdetails_status_3 = "Avvaktar godkännande";
$comdetails_not_available = "Inte tillgänglig";
$details_title = "Provision information";
$details_drop_1 = "Aktuell standard provision";
$details_drop_2 = "Aktuell nivå provision";
$details_drop_3 = "Provision avvaktar godkännande";
$details_drop_4 = "Betald standard provision";
$details_drop_5 = "Betald nivå provision";
$details_button = "Visa provision";
$details_date = "Datum";
$details_status = "Status";
$details_commission = "Provision";
$details_details = "Visa information";
$details_type_1 = "Betald";
$details_type_2 = "Avvaktar godkännande";
$details_type_3 = "Godkänd - Avvaktar betalning";
$details_none = "Ingen provision att visa";
$details_no_group = "Ingen provisionsgrupp vald";
$details_choose = "Vänligen välj en provisionsgrupp ovan";
$general_title = "Aktuella provisioner - Från senaste betalningen";
$general_transactions = "Transaktioner";
$general_earnings_to_date = "Inkomst hittills";
$general_history_link = "Visa betalningshistorik";
$general_standard_earnings = "Standard inkomster";
$general_current_earnings = "Aktuella inkomster";
$general_traffic_title = "Trafik statistik";
$general_traffic_visitors = "Besökare";
$general_traffic_unique = "Unika besökare";
$general_traffic_sales = "Godkända försäljningar";
$general_traffic_ratio = "Försäljningsandel";
$general_traffic_info = "Statistiken inkluderar inte återkommande eller nivå provision.";
$general_traffic_pay_type = "Betalningstyp";
$general_traffic_pay_level = "Aktuell betalningsnivå";
$general_notes_title = "Notiser från administratören";
$general_notes_date = "Skapades den";
$general_notes_to = "Till";
$general_notes_all = "Alla affiliater";
$general_notes_none = "Inga notiser att visa";
$contact_left_column_title = "Kontakta oss";
$contact_left_column_text = "Tveka inte att kontakta vår affiliate-chef via formuläret till höger.";
$contact_title = "Kontakta oss";
$contact_name = "Ditt namn";
$contact_email = "Din e-postadress";
$contact_message = "Meddelande";
$contact_chars = "tecken kvar";
$contact_button = "Skicka meddelande";
$contact_received = "Vi har mottagit ditt meddelande, vänligen tillåt 24 timmar för ett svar.";
$contact_invalid_name = "Ogiltigt namn";
$contact_invalid_email = "Ogiltig e-postadress";
$contact_invalid_message = "Ogiltigt meddelande";
$invoice_button = "Faktura";
$invoice_header = "AFFILIATE FAKTURABETALNING";
$invoice_aff_info = "Affiliate information";
$invoice_co_info = "Information";
$invoice_acct_info = "Kontoinformation";
$invoice_payment_info = "Betalningsinformation";
$invoice_comm_date = "Betalningsdag";
$invoice_comm_amt = "Provision summa";
$invoice_comm_type = "Provision typ";
$invoice_admin_note = "Administrator notis";
$invoice_footer = "FAKTURANS SLUT";
$invoice_print = "Skriv ut faktura";
$invoice_none = "N/A";
$invoice_aff_id = "Affiliate-ID";
$invoice_aff_user = "Användarnamn";
$menu_pdf_marketing = "PDF marknadsföringsbroschyr";
$menu_pdf_training = "PDF träningsdokument";
$marketing_target_url = "Mål URL";
$marketing_source_code = "Källkod - Kopiera/Klistra in på din webbsida";
$marketing_group = "Marknadsgrupp";
$peels_title = "Pagepeel namn";
$peels_view = "Visa pagepeel";
$peels_description = "Pagepeel beskrivning";
$lb_head_title = "Nödvändig HEAD-kod för din HTML-sida";
$lb_head_description = "För att kunna använda en ljusruta på din webbsida, måste du lägga till följande rader i HEAD-sektionen av sidan där du vill att ljusrutan visas.";
$lb_head_source_code = "Klistra in följande kod till HEAD-sektionen på ditt HTML-dokument.";
$lb_head_code_notes = "Du måste enbart använda koden en gång oavsett hur många ljusrutor du vill använda på sidan.";
$lb_head_tutorial = "Visa handledning";
$lb_body_title = "Ljusrutans namn";
$lb_body_description = "Ljusrutans beskrivning";
$lb_body_click = "Klicka på bilden ovan för att visa ljusrutan.";
$lb_body_source_code = "Klistra in koden i ditt HTML-dokument där du vill att bilden ska visas.";
$pdf_title = "PDF";
$pdf_training = "Träningsdokument";
$pdf_marketing = "Marknadsföringsbroschyrer";
$pdf_description_1 = "Adobe Reader krävs för att se och skriva ut vårt PDF marknadsföringsmaterial.";
$pdf_description_2 = "Adobe Reader kan laddas ned gratis från Adobes webbsida.";
$pdf_file_name = "Filnamn";
$pdf_file_size = "Filens storlek";
$pdf_file_description = "Beskrivning";
$pdf_bytes = "Bytes";
$menu_heading_training_materials = "Träningsmaterial";
$menu_videos = "Se träningsvideo";
$menu_custom_manual = "Manual för skräddarsydda spårningslänkar";
$menu_page_peels = "Pagepeels";
$menu_lightboxes = "Ljusrutor";
$menu_email_templates = "E-post mallar";
$menu_heading_custom_links = "Anpassade spårningslänkar";
$menu_custom_reports = "Rapporter";
$menu_keyword_links = "Nyckelord spårningslänkar";
$menu_subid_links = "Sub-affiliate spårningslänkar";
$menu_alteranate_links = "Alternativa inkommande länkar";
$menu_heading_additional = "Ytterligare verktyg";
$menu_drop_heading_stats = "Generell statistik";
$menu_drop_heading_commissions = "Provisioner";
$menu_drop_heading_history = "Betalningshistorik";
$menu_drop_heading_traffic = "Trafik logg";
$menu_drop_heading_account = "Mitt konto";
$menu_drop_heading_logo = "Ladda upp min logga";
$menu_drop_heading_faq = "Vanligt ställda frågor";
$menu_drop_general_stats = "Generell statistik";
$menu_drop_tier_stats = "Nivå statistik";
$menu_drop_current = "Aktuell provision";
$menu_drop_tier = "Aktuell nivå provision";
$menu_drop_pending = "Avvaktar godkännande";
$menu_drop_paid = "Betald provision";
$menu_drop_paid_rec = "Betald nivå provision";
$menu_drop_recurring = "Aktiv återkommande provision";
$menu_drop_edit = "Redigera mitt konto";
$menu_drop_password = "Byt lösenord";
$menu_drop_change = "Ändra min provisionstyp";
$account_hidden = "gömd";
$keyword_title = "Anpassade nyckelordlänkar";
$keyword_info = "Genom att skapa en anpassad nyckelordslänk, har du möjligheten att spåra inkommande trafik från många källor. Skapa en länk med upp till 4 olika nyckelord. Den anpassade rapporten kommer visa en detaljerad rapport för samtliga nyckelord som skapats.";
$keyword_heading = "Tillgängliga variabler för anpassad nyckelord spårning";
$keyword_tracking = "Spårnings-ID";
$keyword_build = "För att bygga din länk, använd följande webbadress och bifoga ditt spårnings-ID samt nyckelordet som du vill använda.";
$keyword_example = "Exempel";
$keyword_tutorial = "Visa handledningen";
$sub_tracking_title = "Sub-affiliate spårning";
$sub_tracking_info = " Att skapa en sub-affiliate-länk ger dig möjligheten att vidarebefordra din egen affiliate-länk till dina affiliater så att de kan använda den. Du kommer veta vem som genererar inkomst åt dig eftersom vi rapporterar vilka sub-affiliater som lett kunder till försäljningar. En annan anledning till att använda sub-affiliate-länkar är om du har din eget spårningssystem som du vill inkludera för rapportering.";
$sub_tracking_build = "Byt ut XXX med affiliatens ID-nummer i ditt affiliateprogram. Upprepa åtgärden för alla dina affiliater.";
$sub_tracking_example = "Exempel";
$sub_tracking_tutorial = "Visa handledning";
$sub_tracking_id = "Sub-affiliate-ID";
$alternate_title = "Alternativa inkommande länkar";
$alternate_option_1 = "Alternativ 1: Automatiskt skapande av länk";
$alternate_heading_1 = "Automatiskt skapande av länk";
$alternate_info_1 = "Definiera din egen inkommande trafiksida genom att ange webbadressen du vill att trafik skall levereras till och vi skapar en länk åt dig. Med funktionen skapas en kortare länk som du kan använda med webbadressen inbäddad i länken genom ett ID-nummer till vår databas.";
$alternate_button = "Skapa min länk";
$alternate_links_heading = "Mina alternativa URL-länkar för inkommande trafik";
$alternate_links_note = " Existerande länkar förblir intakta och funktionella om du tar bort en anpassad länk från sidan.";
$alternate_links_remove = "ta bort";
$alternate_option_2 = "Alternativ 2: Skapa en länk manuellt";
$alternate_info_2 = "Om du föredrar att skapa din egen affiliate-länk med en alternativ inkommande webbadress, gör följande.";
$alternate_variable = "Alternativ inkommande webbadress variabel";
$alternate_example = "Exempel";
$alternate_build = "För att skapa din egen länk, använd följande webbadress och bifoga den med den alternativa inkommande webbadressen som du vill använda.";
$alternate_none = "Inga alternativa inkommande länkar har skapats";
$alternate_tutorial = "Visa handledning";
$cr_title = "Anpassad nyckelord-rapport";
$cr_select = "Välj ett nyckelord";
$cr_button = "Generera rapport";
$cr_no_results = "Inga sökresultat funna";
$cr_no_results_info = "Försök en annan kombination med nyckelord";
$cr_used = "Nyckelord använda";
$cr_found = "Denna länk hittades";
$cr_times = "Tider";
$cr_unique = "Unik länk hittades";
$cr_detailed = "Detaljerad länk-rapport";
$cr_export = "Exportera rapport till Excel";
$cr_none = "Inga nyckelord hittades";
$logo_title = "Ladda upp ditt företags loga";
$logo_info = "Om du vill ladda upp ditt företags loga, kommer vi visa den för kunder som du dirigerar till vår webbsida. Detta låter oss anpassa din kunds erfarenhet då de besöker oss.";
$logo_bullet_one = "Bilden kan vara .jpg, .gif eller .png. Inget Flash innehåll tillåts.";
$logo_bullet_two = "Olämpliga bilder kommer kasseras och ditt konto kommer suspenderas.";
$logo_bullet_three = "Din bild/loga kommer inte visas på vår webbsida innan vi har godkänt den.";
$logo_bullet_size_one = "Bilderna kan ha en maximal bredd på";
$logo_bullet_size_two = "pixlar och en maximal höjd på";
$logo_bullet_req_size_one = "Bilderna måste ha en bredd av";
$logo_bullet_req_size_two = "pixlar och en höjd av";
$logo_bullet_pixels = "pixlar.";
$logo_choose = "Välj en bild";
$logo_file = "Välj en fil:";
$logo_browse = "Sök...";
$logo_button = "Ladda upp";
$logo_current = "Min nuvarande bild";
$logo_remove = "ta bort";
$logo_display_status = "Bildstatus:";
$logo_pending = "Avvaktar godkännande";
$logo_approved = "Godkänd";
$logo_success = "Bilden laddades upp och avvaktar nu godkännande.";
$signup_security_title = "Kontoverifikation";
$signup_security_info = "Vänligen ange säkerhetskoden från rutan. Detta hjälper oss att förhindra automatisk registrering.";
$signup_security_code = "Säkerhetskod";
$sub_tracking_none = "Ingen";
$missing_security_code = "Kontoverifikation/Säkerhetskod saknas eller är felaktig";
$alternate_success_title = "Länk har skapats";
$alternate_success_info = "Använd länken nedan och börja leverera trafik till din webbadress.";
$alternate_failed_title = "Ett fel inträffade vid skapelse av länk";
$alternate_failed_info = "Vänligen ange en giltig webbadress.";
$logo_missing_filename = "Vänligen välj ett filnamn.";
$logo_required_width = "Bildens bredd måste vara";
$logo_required_height = "Bildens höjd måste vara";
$logo_maximum_width = "Bildens bredd kan endast vara";
$logo_maximum_height = "Bildens höjd kan endast vara";
$logo_size_maximum = "Bildens maximala storlek kan endast vara";
$logo_bad_filetype = "Bildens typ tillåts inte. Godkända typer är .gif, .jpg and .png.";
$logo_upload_error = "Ett fel inträffade då din bild laddades upp, vänligen kontakta affiliate-chefen.";
$logo_error_title = "Ett fel inträffade då din bild laddades upp";
$logo_error_bytes = "bytes.";
$excel_title = "Anpassad nyckelordlänk rapport";
$excel_tab_report = "Anpassat nyckelord rapport";
$excel_tab_logs = "Trafik logg";
$excel_date = "Rapportdatum:";
$excel_affiliate = "Affiliate-ID:";
$excel_criteria = "Nyckelordlänk kriterier";
$excel_link = "Länkstruktur";
$excel_hits = "Unika träffar";
$excel_comm_stats = "Provision statistik";
$excel_comm_current = "Aktuell provision";
$excel_comm_paid = "Betald provision";
$excel_comm_total = "Total provision";
$excel_comm_ratio = "Omräkningstal";
$excel_earned = "Provision tjänad";
$excel_earned_current = "Aktuell provision";
$excel_earned_paid = "Betald provision";
$excel_earned_total = "Total provision tjänad";
$excel_earned_tab = " Klicka på trafik logg-fliken (nedan) för att visa trafik loggen för den anpassade länken.";
$excel_log_title = "Anpassad nyckelord trafik logg";
$excel_log_ip = "IP-adress";
$excel_log_refer = "Refererande webbadress";
$excel_log_date = "Datum";
$excel_log_time = "Tid";
$excel_log_target = "Måladress";
$etemplates_title = "E-post mallar";
$etemplates_view_link = "Visa e-post mallen";
$etemplates_name = "Mallnamn";
$signup_maintenance_heading = "Underhållningsmeddelande";
$signup_maintenance_info = "Registreringar är för tillfället inaktiverade. Vänligen försök igen senare.";
$marketing_group_title = "Marknadsgrupp";
$marketing_button = "Visa";
$marketing_no_group = "Ingen grupp vald";
$marketing_choose = "Vänligen välj en marknadsgrupp ovan";
$marketing_notice = "Marknadsgrupper kan ha olika trafiksidor för inkommande trafik";
$canspam_heading = "CAN-SPAM regler och godtagande";
$canspam_accept = "Jag har läst, förstått, och accepterar CAN-SPAM-reglerna.";
$canspam_error = "Du har inte accepterat våra CAN-SPAM-regler.";
$signup_banned = "Ett fel inträffade medan kontot skapades. Vänligen kontakta systemadministratören för mer information.";
$header_testimonials = "Affiliate rekommendationer";
$testi_visit = "Besök webbsidan";
$testi_description = " Dela med dig av dina rekommendationer för vårt affiliateprogram och vi kommer placera dem på vår &lt;a href=&quot;testimonials.php&quot;&gt;testimonials&lt;/a&gt; sida med en länk till din webbplats.";
$testi_name = "Namn";
$testi_url = "Webbsidans URL";
$testi_content = "Rekommendationer";
$testi_code = "Säkerhetskod";
$testi_submit = "Skicka rekommendation";
$testi_na = "Rekommendationer finns inte tillgängliga.";
$testi_title = "Skriv en rekommendation";
$testi_success_title = "Rekommendationen skickades";
$testi_success_message = "Tack för din rekommendation. Vårt lag kommer att granska rekommendationen snart.";
$testi_error_title = "Ett fel inträffade med din rekommendation";
$testi_error_name_missing = "Vänligen inkludera ditt namn tillsammans med rekommendationen.";
$testi_error_url_missing = "Vänligen inkludera din webbsidas URL tillsammans med rekommendationen";
$testi_error_missing = "Vänligen inkludera text för din rekommendation.";
$menu_drop_delayed = "Försenad provision";
$details_drop_6 = "Aktuell försenad provision";
$details_type_6 = "Försenad - Godkänns snart";
$comdetails_status_6 = "Försenad - Kommer godkännas snart";
$tc_reaccept_title = "Notifikation för förändrade villkor";
$tc_reaccept_sub_title = "Du måste acceptera våra nya villkor för att kunna nå ditt konto.";
$tc_reaccept_button = "Jag har läst, förstått, och accepterar villkoren.";
$tlinks_active = "Antal aktiva nivåer";
$tlinks_payout_structure = "Struktur för nivåbetalning";
$tlinks_level = "Nivå";
$tierText1 = "% beräknat från refererande affiliaters provision belopp.";
$tierText2 = "% beräknat från övre nivåns provision belopp.";
$tierText3 = "% beräknat från försäljningssumman.";
$tierTextflat = "schablonbelopp.";
$edit_custom_button = "Redigera svar";
$private_heading = "Privat registrering";
$private_info = "Vårt affiliateprogram är inte öppet för allmänheten och kräver en registreringskod för att delta. Information om hur du kan få en kod bör finnas här.";
$private_required_heading = "Registreringskod krävs";
$private_code_title = "Ange registreringskod";
$private_button = "Använd kod";
$private_error_title = "Ogiltig registreringskod";
$private_error_invalid = "Registreringskoden som du angett är ogiltig.";
$private_error_expired = "Registreringskoden som du angett har gått ut och är inte längre giltig.";
$qr_code_title = "QR-koder";
$qr_code_size = "QR-kodstorlek";
$qr_code_button = "Visa QR-kod";
$qr_code_offline_title = "Marknadsföring offline";
$qr_code_offline_content1 = "Lägg till QR-koden till din marknadsföringsbroschyr, flygblad, visitkort, med mera.";
$qr_code_offline_content2 = "- Högerklicka på bilden och &lt;strong&gt;save-as&lt;/strong&gt; på din dator.";
$qr_code_online_title = "Marknadsföring online";
$qr_code_online_content = "Lägg till QR-koden på din webbsida, social media, blogg, med mera.";
$menu_coupon = "Kupongkoder";
$coupon_title = "Dina tillgängliga kupongkoder";
$coupon_desc = "Dela ut kupongkoderna och tjäna provision varje gång en kod används!";
$coupon_head_1 = "Kupongkod";
$coupon_head_2 = "Rabatt för kunder";
$coupon_head_3 = "Ditt provisions belopp";
$coupon_sale_amt = "av försäljningssumman";
$coupon_flat_rate = "schablonbelopp";
$coupon_default = "Anpassad betalningsnivå";
$cc_vanity_title = "Begär en personlig kupongkod";
$cc_vanity_field = "Kupongkod";
$cc_vanity_button = "Begär kupongkod";
$cc_vanity_error_missing = "<strong>Error!</strong> vänligen ange en kupongkod.";
$cc_vanity_error_exists = "<strong>Error!</strong> du har redan begärt den här koden. Den avvaktar godkännande.";
$cc_vanity_error = "<strong>Error!</strong> kupongkoden är ogiltig. Vänligen använd endast bokstäver, nummer, och understreck.";
$cc_vanity_success = "<strong>Grattis!</strong> Din personliga kupongkod har begärts.";
$coupon_none = "Ingen kupongkod finns för närvarande tillgänglig.";
$pic_error_title = "Ett fel inträffade då din bild laddades upp";
$pic_missing = "Vänligen välj ett filnamn.";
$pic_invalid = "Bildens typ tillåts inte. Acceptabla typer är .gif, .jpg and .png.";
$pic_error = "Ett fel inträffade då din bild laddades upp, vänligen kontakta affiliate-chefen.";
$pic_success = "Din bild laddades upp.";
$pic_title = "Ladda upp din bild";
$pic_info = "Att ladda upp din bild hjälper oss att personifiera vår erfarenhet med dig.";
$pic_bullet_1 = "Bilder kan vara .jpg, .gif or .png.";
$pic_bullet_2 = "Olämpliga bilder kommer kasseras och ditt konto kommer suspenderas.";
$pic_bullet_3 = "Din bild kommer inte visas publikt. Den kommer endast fästas till ditt konto för oss att se.";
$pic_file = "Välj en fil:";
$pic_button = "Ladda upp";
$pic_current = "Min nuvarande bild";
$pic_remove = "Ta bort bild";
$progress_title = "Behörighet för nästa utbetalning:";
$progress_complete = "komplett.";
$progress_none = "Vi har minimum betalningskrav.";
$progress_sentence_1 = "Du har tjänat";
$progress_sentence_2 = "av";
$progress_sentence_3 = "kravet.";
$aff_lib_button = "<font style=\"font-size:16px; font-weight:bold;\">Lås upp din gratistillgång till</font><BR />www.AffiliateLibrary.com";
$menu_announcements = "Kampanjer för sociala medier";
$announcements_name = "Kampanjnamn";
$announcements_facebook_message = "Facebook meddelande";
$announcements_twitter_message = "Twitter meddelande";
$announcements_facebook_link = "Facebook länk";
$announcements_facebook_picture = "Facebook bild";
$general_last_30_days_activity = "Aktivitet senaste 30 dagarna";
$general_last_30_days_activity_traffic = "Trafik";
$general_last_30_days_activity_commissions = "Provision";
$accountability_title = "Ansvarighet och kommunikation";
$accountability_text = "<strong>Vad är det här?</strong><p>Vi har en aktiv strategi för att skapa förtroende med våra affiliate partners. Det är vårt mål att erbjuda så mycket information som möjligt för intjänad provision och/eller nekad provision i vårt system.</p><strong>Kommunikation</strong><p>Vi kan erbjuda detaljerad information för nekad provision. Vi kommunicerar med våra affiliater och uppmuntrar frågor och feedback.</p>";
$debit_reason_0 = 'Ingen';
$debit_reason_1 = 'Återbetalning';
$debit_reason_2 = 'Ångerköp';
$debit_reason_3 = 'Rapporterat bedrägeri';
$debit_reason_4 = 'Avbruten beställning';
$debit_reason_5 = 'Delvis återbetalning';
$menu_drop_pending_debits = 'Avvaktar debitering';
$debit_amount_label = 'Debetbelopp';
$debit_date_label = 'Debiteringsdatum';
$debit_reason_label = 'Anledning till debet';
$debit_paragraph = 'Debiteringar kommer att dras från nästa utbetalning.';
$debit_invoice_amount = 'Minus debetbelopp';
$debit_revised_amount = 'Reviderat betalningsbelopp';
$mv_head_description = 'Observera: Du kan endast ha ett videoklipp per sida på din webbsida.';
$mv_head_source_code = 'Klistra in denna kod till HEAD-sektionen på ditt HTML-dokument.';
$mv_body_title = 'Videotitel';
$mv_body_description = 'Beskrivning';
$mv_body_source_code = 'Klistra in denna kod i ditt HTML-dokument där du vill att videoklippet skall visas.';
$menu_marketing_videos = 'Videoklipp';
$mv_preview_button = 'Förhandsgranska video';
$dt_no_data = 'Ingen data tillgänglig i tabellen.';
$dt_showing_exists = 'Visar _START_ till _SLUT_ för _TOTALA_ inmatningar.';
$dt_showing_none = 'Visar 0 till 0 för 0 inmatningar.';
$dt_filtered = '(filtrerat från _MAX_ antal inmatningar)';
$dt_length_choice = 'Visar _MENY_ inmatningar.';
$dt_loading = 'Laddar...';
$dt_processing = 'Bearbetar...';
$dt_no_records = 'Inga matchande journaler kunde hittas.';
$dt_first = 'Första';
$dt_last = 'Sista';
$dt_next = 'Nästa';
$dt_previous = 'Föregående';
$dt_sort_asc = ': aktivera för att sortera kolumnen stigande';
$dt_sort_desc = ': aktivera för att sortera kolumnen nedåtgående';
$choose_marketing_group = 'Välj en marknadsgrupp';
$email_already_used_1 = 'Kontot kan inte skapas. Vi tillåter endast';
$email_already_used_2 = 'konton';
$email_already_used_3 = 'att skapas via e-postadresser.';
$missing_fax = 'Vänligen ange ditt faxnummer.';
$chart_last_6_months = 'Provision betalad senaste 6 månaderna';
$chart_last_6_months_paid = 'Provision betalad';
$chart_this_month = 'Våra 5 främsta affiliater denna månad';
$chart_this_month_none = 'Ingen data att visa.';
$login_return = 'Återvänt till affiliate hemsidan';
$login_lost_details = 'Ange ditt användarnamn för att få ett e-postmeddelande med din inloggningsinformation.';
$account_edit_general_prefs = 'Allmänna inställningar';
$account_edit_email_language = 'E-post språk';
$footer_connect = 'Anslut med oss';
$modal_close = 'Stäng';
$vat_amount_heading = 'Momssumma';
$menu_logout = 'Logga ut';
$menu_upload_picture = 'Ladda upp din bild';
$menu_offer_testi = 'Skriv en rekommendation';
$fb_login = 'Logga in med Facebook';
$fb_permissions = 'Åtkomst nekad. Vänligen tillåt webbsidan att använda din e-postadress.';
$announcements_published = "Tillkännagivandet publicerat";
$training_videos_title = "Träningsvideo";
$training_videos_general = "Generell marknadsföring";
$commission_method = "Provision metod";
$how_will_you_earn = "Hur kommer du att tjäna provision?";
$pm_account_credit = "Vi krediterar ditt konto med din intjänade provision.";
$pm_check_money_order = "Vi skickar en check till din adress.";
$pm_paypal = "Vi skickar en PayPal-betalning.";
$pm_stripe = "Vi skickar en Stripe-betalning.";
$pm_wire = "Vi skickar pengar via banköverföring.";
$add_to_signup_left_column_text = "<span style=\"color:#CC0000; font-style:italic;\">* indikerar obligatoriska fält.</span>";
$paypal_email = "Paypal e-postadress";
$stripe_acct_details = "Stripe kontoinformation";
$stripe_connect = "Du kan ansluta ditt Stripe-konto från dina kontoinställningar efter registrering.";
$stripe_success = "Ditt Stripe-konto är nu anslutet";
$stripe_settings = "Stripe-inställningar";
$stripe_connect_edit = "Anslut med Stripe";
$stripe_delete = "Radera Stripe-konto";
$stripe_confirm = "Är du säker på att du vill radera kontot?";
$payment_settings = "Betalningsinställningar";
$edit_payment_settings = "Redigera betalningsinställningar";
$invalid_paypal_address = "Ogiltig e-postadress för PayPal.";
$payment_method_error = "Vänligen välj en betalningsmetod.";
$payment_settings_updated = "Betalningsinställningar uppdaterade.";
$stripe_removed = "Stripe-konto borttaget.";
$payment_settings_success = "Lyckat!";
$payment_update_notice_1 = "Observera!";
$payment_update_notice_2 = "Du har valt att motta <strong>[payment_option_here]</strong> betalning från oss. Vänligen <a href=\"account.php?page=48\" style=\"font-weight:bold;\">klicka här</a> för att ansluta ditt <strong>[payment_option_here]</strong> konto.";
$pm_title_credit = "Konto kredit";
$pm_title_mo = "Check/money order";
$pm_title_paypal = "PayPal";
$pm_title_stripe = "Stripe";
$pm_title_wire = "Elektronisk överföring";
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