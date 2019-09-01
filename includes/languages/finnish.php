<?PHP

//-------------------------------------------------------
	  $language_pack_name = "finnish";
	  $language_pack_table_name = "finnish";
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
$header_title = "Kumppaniohjelma";
$header_indexLink = "Kumppanikotisivu";
$header_signupLink = "Liity nyt";
$header_accountLink = "Hallinnoi tiliä";
$header_emailLink = "Ota yhteyttä";
$header_greeting = "Tervetuloa";
$header_nonLogged = "Vieras";
$header_logout = "Kirjaudu tästä ulos";
$footer_tag = "iDevAffiliate-kumppaniohjelmisto";
$footer_copyright = "Kopioikeudet";
$footer_rights = "Kaikki oikeudet varattu";
$index_heading_1 = "Tervetuloa kumppaniohjelmaamme!";
$index_paragraph_1 = "Ohjelmaamme on ilmaista ja helppoa liittyä, eikä se vaadi teknistä osaamista. Kumppaniohjelmat ovat verkossa hyvin yleisiä ja tapa tehdä lisätuloja verkkosivuston omistajille. Kumppanit tuovat sivuille kävijöitä ja lisäävät myyntiä kaupallisilla sivuilla ja saavat sitä kautta komissiopalkkion.";
$index_heading_2 = "Miten se toimii?";
$index_paragraph_2 = "Kun liityt kumppaniohjelmaamme, niin saat käyttöösi useita mainosbannereita ja tekstilinkkejä, jotka lisäät sivustollesi. Kun käyttäjä klikkaa jotakin linkeistä, hänet ohjataan sivustollemme ja toimintaa seurataan kumppaniohjelmallamme. Saat komissiopalkkion riippuen komissiotyypistäsi.";
$index_heading_3 = "Reaaliaikaisia tilastoja ja raportteja!";
$index_paragraph_3 = "Kirjaudu sisään milloin vain päivästä (24 h) ja tarkista myyntisi, kävijämääräsi, saldosi ja seuraa kuinka mainosbannerisi toimivat.";
$index_login_title = "Kumppanikirjautuminen";
$index_login_username = "Käyttäjänimi";
$index_login_password = "Salasana";
$index_login_username_field = "käyttäjänimi";
$index_login_password_field = "salasana";
$index_login_button = "Kirjaudu";
$index_login_signup_link = "Klikkaa tästä liittyäksesi";
$index_table_title = "Ohjelman tiedot";
$index_table_commission_type = "Komissiotyyppi";
$index_table_initial_deposit = "Alkutalletus";
$index_table_requirements = "Maksuehdot";
$index_table_duration = "Maksun kesto";
$index_table_choose = "Valitse seuraavista maksuvaihtoehdoista!";
$index_table_sale = "Maksu per myyntitapahtuma";
$index_table_click = "Maksu per klikkaus";
$index_table_sale_text = "jokaisesta kauttasi tulevasta ostosta.";
$index_table_click_text = "jokaisesta kauttasi tulevasta klikkauksesta.";
$index_table_deposit_tag = "Vain kirjautumisesta!";
$index_table_requirements_tag = "Minimisaldo, jolloin maksu voidaan suorittaa.";
$index_table_duration_tag = "Tienestisi maksetaan kerran kuussa ja saat silloin edellisen kuukauden tienestisi.";
$signup_left_column_text = "Liity kumppaniohjelmaamme ja tienaa jokaisesta kauttasi tehdystä ostoksesta! Luot vain tilin, laitat linkkikoodisi sivuillesi ja seuraat miten tilisi saldo kasvaa sitä mukaan kuin sivustosi vierailijoista tulee meidän asiakkaitamme.";
$signup_left_column_title = "Tervetuloa!";
$signup_login_title = "Luo tili";
$signup_login_username = "Käyttäjätunnus";
$signup_login_password = "Salasana";
$signup_login_password_again = "Salasana uudelleen";
$signup_login_minmax_chars = "- Käyttäjänimen tulee olla vähintään user_min_chars merkkiä.&lt;br /&gt;- Käyttäjänimi voi olla aakkosnumeerinen.&lt;br /&gt;- Käyttäjänimi voi sisältää seuraavia merkkejä: _ (vain alaviivoja)&lt;br /&gt;&lt;br /&gt;- Salasanan tulee olla vähintään pass_min_chars merkkiä pitkä.&lt;br /&gt;- Salasana voi olla aakkosnumeerinen.&lt;br /&gt;- Salasana voi sisältää seuraavia merkkejä:  characters_allowed";
$signup_login_must_match = "Tämän on vastattava annettua salasanaa.";
$signup_standard_title = "Perustiedot";
$signup_standard_email = "Sähköpostiosoite";
$signup_standard_company = "Yrityksen nimi";
$signup_standard_checkspayable = "Maksut maksetaan";
$signup_standard_weburl = "Verkon osoite";
$signup_standard_taxinfo = "Vero ID, SSN tai ALV";
$signup_personal_title = "Henkilötiedot";
$signup_personal_fname = "Etunimi";
$signup_personal_state = "Osavaltio tai provinssi";
$signup_personal_lname = "Sukunimi";
$signup_personal_phone = "Puhelinnumero";
$signup_personal_addr1 = "Katuosoite";
$signup_personal_fax = "Fax-numero";
$signup_personal_addr2 = "Toinen osoite";
$signup_personal_zip = "Postikoodi";
$signup_personal_city = "City";
$signup_personal_country = "Maa";
$signup_commission_title = "Komissiomaksu";
$signup_commission_howtopay = "Kuinka haluat meidän maksavan sinulle?";
$signup_commission_style_PPS = "Maksu-Per-Myyntitapahtuma";
$signup_commission_style_PPC = "Maksu-Per-Klikkaus";
$signup_terms_title = "Ehdot ja edellytykset";
$signup_terms_agree = "Olen lukenut ja ymmärtänyt ehdot ja edellykset ja hyväksyn ne.";
$signup_page_button = "Luo tili";
$signup_success_email_comment = "Olemme lähettäneet sinulle sähköpostin, joka sisältää käyttäjätunnuksesi ja salasanasi.<br />\r\nPidä se tallessa, sillä saatat tarvita tietoja tulevaisuudessa.";
$signup_success_login_link = "Kirjaudu tilille";
$custom_fields_title = "Käyttäjän määrittelemät kentät";
$logout_msg = "<b>Olet kirjautunut ulos.</b><br />Kiitos osallistumisestasi kumppaniohjelmaamme.";
$signup_page_success = "Tilisi on nyt luotu";
$login_left_column_title = "Account Login";
$login_left_column_text = "Anna käyttäjätunnuksesi ja salasanasi, niin pääset katsomaan tilisi tietoja, bannereita, linkkikoodeja, FAQ-ohjetta ja monia muita asioita.<br /><br />Jos et muista salasanaasi, niin anna käyttäjätunnuksesi ja lähetämme sinulle sähköpostitse tietosi.<br /><br />";
$login_title = "Kirjaudu tilille";
$login_username = "Käyttäjätunnus";
$login_password = "Salasana";
$login_invalid = "Väärä tunnus tai salasana";
$login_now = "Kirjaudu sisään";
$login_send_title = "Unohditko salasanan?";
$login_send_username = "Käyttäjätunnus";
$login_send_info = "Kirjautumistiedot on lähetetty sähköpostiisi";
$login_send_pass = "Lähetä sähköpostiin";
$login_send_bad = "Käyttäjänimeä ei löytynyt";
$help_new_password_heading = "Uusi salasana";
$help_new_password_info = "Salasanasi tulee olla vähintään pass_min_chars merkkiä pitkä. Se voi sisältää vain kirjaimia, numeroita ja seuraavia merkkejä:  characters_allowed";
$help_confirm_password_heading = "Vahvista uusi salasana";
$help_confirm_password_info = "Tämän salasanan on oltava sama kuin uusi salasana.";
$help_custom_links_heading = "Avainsanajäljitys";
$help_custom_links_info = "Avainsanasi ei saa olla yli 30 merkkiä. Se saa sisältää ainoastaan kirjaimia, numeroita tai yhdysviivoja.";
$error_title = "Seuraavat virheet todettu";
$username_invalid = "Käyttäjänimi ei kelpaa. Se voi sisältää vain kirjaimia, numeroita ja alaviivoja.";
$username_taken = "Valitsemasi käyttäjätunnus on jo käytössä.";
$username_short = "Käyttäjätunnus on liian lyhyt, sen on oltava vähintään user_min_chars merkkiä.";
$username_long = "Käyttäjätunnus on liian pitkä, sen on oltava enintään user_max_chars merkkiä.";
$password_invalid = "Salasana ei kelpaa. Se voi sisältää vain kirjaimia, numeroita ja seuraavia merkkejä:  characters_allowed";
$password_short = "Salasana on liian lyhyt, sen täytyy olla vähintään pass_min_chars merkkiä.";
$password_long = "Salasana on liian pitkä, sen on oltava korkeintaan pass_max_chars merkkiä.";
$password_mismatch = "Annetut salasanat eivät täsmää.";
$missing_checks = "Ole hyvä ja anna nimi, jolle sekit osoitetaan.";
$missing_tax = "Ole hyvä ja anna vero ID, SSN tai ALV-tiedot.";
$missing_fname = "Ole hyvä ja anna etunimesi.";
$missing_lname = "Ole hyvä ja anna sukunimesi.";
$missing_email = "Ole hyvä ja anna sähköpostisi.";
$invalid_email = "Sähköpostiosoite on virheellinen.";
$missing_address = "Ole hyvä ja anna katuosoite.";
$missing_city = "Ole hyvä ja anna kaupunki.";
$missing_company = "Ole hyvä ja anna yrityksen nimi.";
$missing_state = "Ole hyvä ja anna osavaltio/provinssi.";
$missing_zip = "Ole hyvä ja anna postikoodi.";
$missing_phone = "Ole hyvä ja anna puhelinnumero.";
$missing_website = "Ole hyvä ja anna sivustosi osoite.";
$missing_paypal = "Olet valinnut PayPal-maksuvaihtoehdon, ole hyvä ja anna PayPal-tili.";
$missing_terms = "Et ole hyväksynyt ehtoja ja edellytyksiä.";
$paypal_required = "PayPal-tili on pakollinen maksuja varten.";
$missing_custom = "Ole hyvä ja täydennä kenttä:";
$account_total_transactions = "Kaikki tilisiirrot";
$account_standard_linking_code = "Perus linkkikoodi - Erittäin hyvä sähköposteihin!";
$account_copy_paste = "Kopioi/Liitä ylä oleva koodi sivustoosi tai sähköposteihisi";
$account_not_approved = "Tilisi odottaa hyväksymistä";
$account_suspended = "Tilisi on jäädytetty";
$account_standard_earnings = "Perustulot";
$account_inc_bonus = "sisältää bonuksen";
$account_second_tier = "Tasoansiot";
$account_recurring = "Toistuvat ansiot";
$account_not_available = "N/A";
$account_earned_todate = "Ansiot kokonaisuudessaan";
$menu_heading_overview = "Tilikatsaus";
$menu_general_stats = "Perustiedot";
$menu_tier_stats = "Tasotilastot";
$menu_payment_history = "Maksuhistoria";
$menu_commission_details = "Komission yksityiskohdat";
$menu_recurring_commissions = "Toistuvat komissiot";
$menu_traffic_log = "Tulevan liikenteen loki";
$menu_heading_marketing = "Markkinointimateriaalit";
$menu_banners = "Bannerit";
$menu_text_ads = "Tekstimainokset";
$menu_text_links = "Tekstilinkit";
$menu_email_links = "Sähköpostilinkit";
$menu_html_links = "HTML-mainokset";
$menu_offline = "Offline-markkinointi";
$menu_tier_linking_code = "Tasolinkkikoodit";
$menu_email_friends = "Sähköpostit ystäville &amp; kumppaneille";
$menu_custom_links = "Tee &amp; seuraa omia linkkejä";
$menu_heading_management = "Hallinnoi tiliä";
$menu_comalert = "Komissiohälytysasetukset";
$menu_comstats = "Komissiotilastojen asetukset";
$menu_edit_account = "Muokkaa tiliä";
$menu_change_pass = "Vaihda salasana";
$menu_change_commission = "Vaihda komissiotapa";
$menu_heading_general_info = "Yleiset tiedot";
$menu_browse_affiliates = "Selaa muita kumppaneita";
$menu_faq = "Usein kysyttyä";
$suspended_title = "Tili-ilmoitus";
$suspended_heading = "Tilisi on tällä hetkellä jäädytetty";
$suspended_notes = "Ylläpitäjän huomautukset";
$pending_title = "Tili-ilmoitus";
$pending_heading = "Tilisi odottaa tällä hetkellä hyväksyntää";
$pending_note = "Kun olemme hyväksyneet tilisi, niin markkinointimateriaalit ovat saatavillasi.";
$faq_title = "Usein kysyttyä";
$faq_none = "FAQ ei ole vielä saatavissa";
$browse_title = "Selaa muita kumppaneja";
$browse_none = "Ei muita kumppaneja nähtävillä";
$change_comm_title = "Vaihda komissiotapaa";
$change_comm_curr_comm = "Nykyinen komissiotapa";
$change_comm_curr_pay = "Nykyinen maksutaso";
$change_comm_new_comm = "Uusi komissiotapa";
$change_comm_warning = "Jos vaihdat komissiotapaa, niin nykyinen tasosi palautetaan tasolle 1";
$change_comm_button = "Vaihda komissiotapaa";
$change_comm_no_other = "Ei muita komissiotapoja saatavilla";
$change_comm_level = "Taso";
$change_comm_updated = "Komissiotapa päivitetty";
$password_title = "Vaihda salasana";
$password_old_password = "Vanha salasana";
$password_new_password = "Uusi salasana";
$password_confirm_password = "Vahvista uusi salasana";
$password_button = "Vaihda salasana";
$password_warning_old_missing = "Vanha salasana on virheellinen tai puuttuu";
$password_warning_new_missing = "Et ole antanut uutta salasanaa";
$password_warning_mismatch = "Uusi salasana eroaa vahvistuksesta";
$password_warning_invalid = "Salasana ei kelpaa - Klikkaa Apua-linkkejä";
$password_notice = "Salasana on päivitetty";
$edit_failed = "Päivitys epäonnistui - Näet virheet yllä";
$edit_success = "Tili päivitetty";
$edit_button = "Muokkaa tiliä";
$commissionstats_title = "Komissiotilastojen asetukset";
$commissionstats_info = "Asentamalla Komissiotilastot voit tarkistaa tilastosi suoraan Windowsin työpöydältä! Asentaaksesi tämän ohjelman, lataa Komissiotilastot ja <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>pura</b></a> paketti kovalevyllesi ja käynnistä <b>setup.exe</b> -tiedosto. Kun sinulta kysytään kirjautumistietojasi, niin anna seuraavat tiedot.";
$commissionstats_hint = "Vihje: Kopioi ja liitä jokainen kohta, jotta ne täsmäisivät";
$commissionstats_profile = "Profiilinimi";
$commissionstats_username = "Käyttäjätunnus";
$commissionstats_password = "Salasana";
$commissionstats_id = "Kumppani ID";
$commissionstats_source = "Lähde URL";
$commissionstats_download = "Lataa Komissiotilastot";
$commissionalert_title = "Komissiotilaston asetukset";
$commissionalert_info = "Asentamalla Komissio-ilmoitukset me ilmoitamme sinulle aina uusista komissioista, suoraan työpöytäsi kautta! Jos haluat asentaa tämän ohjelman, niin lataa Komissio-ilmoitukset ja <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>pura</b></a> paketti kovalevyllesi ja käynnistä <b>setup.exe</b> -tiedosto. Kun sinulta kysytään kirjautumistietojasi, niin anna seuraavat tiedot.";
$commissionalert_hint = "Vihje: Kopioi ja liitä jokainen kohta, jotta ne täsmäisivät";
$commissionalert_profile = "Profiilinimi";
$commissionalert_username = "Käyttäjätunnus";
$commissionalert_password = "Salasana";
$commissionalert_id = "Kumppani ID";
$commissionalert_source = "Lähde URL";
$commissionalert_download = "Lataa Komissio-ilmoitukset";
$offline_title = "Offline-markkinointi";
$offline_paragraph_one = "Ansaitse rahaa markkinoimalla sivustoamme (offline) ystävillesi ja kumppaneillesi!";
$offline_send = "Lähetä asiakkaita";
$offline_page_link = "katso sivu";
$offline_paragraph_two = "Asiakkaasi kirjoittavat <b>Kumppani ID -numerosi</b> kenttään yllä olevalle sivulle, joka rekisteröi sinut kumppaniksi, kun he tekevät ostoksia.";
$banners_title = "Bannerit";
$banners_size = "Bannerien koot";
$banners_description = "Bannerien kuvaukset";
$ad_title = "Tekstimainokset";
$ad_info = "Käytä annettua koodia, voit itse säätää tekstimainoksen väriteemaa, korkeutta ja leveyttä.";
$links_title = "Linkin nimi";
$email_title = "Sähköpostilinkit";
$email_group = "Markkinointiryhmä";
$email_button = "Näytä sähköpostilinkit";
$email_no_group = "Ei valittua ryhmää";
$email_choose = "Ole hyvä ja valitse markkinointiryhmä";
$email_notice = "Markkinointiryhmillä saattaa olla eri sivut tulevalle liikenteelle";
$email_ascii = "<b>ASCII/Tekstiversio</b> - Käytä tekstisähköposteissa.";
$email_html = "<b>HTML-versio</b> - Käytä HTML-muotoilluissa sähköposteissa.";
$email_test = "Testilinkki";
$email_test_info = "Tästä asiakkaasi lähetetään sivustollemme.";
$email_source = "Lähdekoodi - Kopioi/liitä sähköpostiisi";
$html_title = "HTML-mainoksen nimi";
$html_view_link = "Katsele tätä HTML-mainosta";
$traffic_title = "Tulevan liikenteen loki";
$traffic_display = "Näytä uusimmat";
$traffic_display_visitors = "Vierailijat";
$traffic_button = "Katso liikennelokia";
$traffic_title_details = "Tulevan liikenteen tiedot";
$traffic_ip = "IP-osoite";
$traffic_refer = "Ohjaava URL";
$traffic_date = "Päivämäärä";
$traffic_time = "Aika";
$traffic_bottom_tag_one = "Näytä vanhimmat";
$traffic_bottom_tag_two = "/";
$traffic_bottom_tag_three = "Yksittäiset vierailijat";
$traffic_none = "Ei lokia";
$traffic_no_url = "N/A - Mahdollinen kirjanmerkki tai sähköpostilinkki";
$traffic_box_title = "Valmistele ohjaava URL";
$traffic_box_info = "Klikkaa linkkiä, niin pääset sivustolle";
$payment_title = "Maksuhistoria";
$payment_date = "Maksun päivämäärä";
$payment_commissions = "Komissiot";
$payment_amount = "Maksusummat";
$payment_totals = "Kokonaissumma";
$payment_none = "Ei maksuhistoriaa";
$tier_stats_title = "Tasotilastot";
$tier_stats_accounts = "Tasotilit sinun alaisuudessasi";
$tier_stats_grab_link = "Nappaa tasolinkkikoodisi";
$tier_stats_none = "Ei olemassa olevia tasotilejä";
$tier_stats_username = "Käyttäjätunnus";
$tier_stats_current = "Nykyiset komissiot";
$tier_stats_previous = "Edelliset maksut";
$tier_stats_totals = "Kokonaissumma";
$recurring_title = "Toistuvat komissiot";
$recurring_none = "Ei toistuvia komissioita";
$recurring_date = "Komission päivämäärä";
$recurring_status = "Toistuvatila";
$recurring_payout = "Seuraava maksu";
$recurring_amount = "Summa";
$recurring_every = "Toistuu joka";
$recurring_in = "Toistuu";
$recurring_days = "Päivä";
$recurring_total = "Kokonaissumma";
$tlinks_title = "Lisää muita tasoosi ja tienaa heidän avullaan enemmän rahaa!";
$tlinks_embedded_one = "Tasokirjautumisista annettavat hyvitykset on jo aktivoitu Peruskumppanilinkeissä!";
$tlinks_embedded_two = "Tasojärjestelmän käyttäminen antaa sinun markkinoida kumppaniohjelmaamme muille. Sinut merkitään ylätasolle jokaisen kumppaniohjelmaamme tasolinkkisi kautta liittyvän kohdalla. Tietoa siitä, kuinka paljon voit ansaita löydät alta.";
$tlinks_embedded_current = "Nykyinen tasoansio";
$tlinks_forced_two = "Tasojärjestelmän käyttäminen antaa sinun markkinoida kumppaniohjelmaamme muille. Sinut merkitään ylätasolle jokaisen kumppaniohjelmaamme tasolinkkisi kautta liittyvän kohdalla. Tietoa siitä kuinka paljon voit ansaita löydät alta.";
$tlinks_forced_code = "Tasolähetelinkki";
$tlinks_forced_paste = "Kopioi/liitä yllä oleva linkki sivustollesi";
$tlinks_forced_money = "Ylläpitäjät voivat tienata täällä rahaa!";
$comdetails_title = "Komissiotiedot";
$comdetails_date = "Komission päivämäärä";
$comdetails_time = "Komission aika";
$comdetails_type = "Komission tyyppi";
$comdetails_status = "Nykytila";
$comdetails_amount = "Komission summa";
$comdetails_additional_title = "Lisätietoja komissiosta";
$comdetails_additional_ordnum = "Tilausnumero";
$comdetails_additional_saleamt = "Myyntisumma";
$comdetails_type_1 = "Komissiobonus";
$comdetails_type_2 = "Toistuva komissio";
$comdetails_type_3 = "Komissiotaso";
$comdetails_type_4 = "Peruskomissio";
$comdetails_status_1 = "Maksettu";
$comdetails_status_2 = "Hyväksytty - Odottaa maksua";
$comdetails_status_3 = "Odottaa hyväksyntää";
$comdetails_not_available = "N/A";
$details_title = "Komission tiedot";
$details_drop_1 = "Nykyiset peruskomissiot";
$details_drop_2 = "Nykyiset tasokomissiot";
$details_drop_3 = "Hyväksyntää odottavat komissiot";
$details_drop_4 = "Maksetut peruskomissiot";
$details_drop_5 = "Maksetut tasokomissiot";
$details_button = "Näytä komissiot";
$details_date = "Päivämäärä";
$details_status = "Tila";
$details_commission = "Komissio";
$details_details = "Katso tiedot";
$details_type_1 = "Maksettu";
$details_type_2 = "Odottaa hyväksyntää";
$details_type_3 = "Hyväksytty - Odottaa maksua";
$details_none = "Ei komissioita";
$details_no_group = "Ei valittua komissioryhmää";
$details_choose = "Ole hyvä ja valitse komissioryhmä";
$general_title = "Nykyiset komissiot - Viimeisimmästä maksusta alkaen";
$general_transactions = "Tilitapahtumat";
$general_earnings_to_date = "Ansiot tähän mennessä";
$general_history_link = "Näytä maksuhistoria";
$general_standard_earnings = "Perusansiot";
$general_current_earnings = "Nykyiset ansiot";
$general_traffic_title = "Liikennetilastot";
$general_traffic_visitors = "Vierailijat";
$general_traffic_unique = "Yksittäiset vierailijat";
$general_traffic_sales = "Hyväksytyt myynnit";
$general_traffic_ratio = "Myyntisuhde";
$general_traffic_info = "Näihin tilastoihin ei lasketa mukaan toistuvia myyntejä.";
$general_traffic_pay_type = "Maksutyyppi";
$general_traffic_pay_level = "Nykyinen maksutaso";
$general_notes_title = "Ylläpitäjän huomautuksia";
$general_notes_date = "Luomispäivä";
$general_notes_to = "vastaanottaja";
$general_notes_all = "Kaikki kumppanit";
$general_notes_none = "Ei huomautuksia";
$contact_left_column_title = "Ota yhteyttä";
$contact_left_column_text = "Ole hyvä ja ota tarpeen vaatiessa yhteyttä kumppanihallinnoijaamme oikeanpuoleisella lomakkeella.";
$contact_title = "Ota yhteyttä";
$contact_name = "Nimesi";
$contact_email = "Sähköpostisi";
$contact_message = "Viesti";
$contact_chars = "merkkiä jäljellä";
$contact_button = "Lähetä viesti";
$contact_received = "Olemme vastaanottaneet viestisi, otamme yhteyttä 24h kuluessa.";
$contact_invalid_name = "Nimi ei kelpaa";
$contact_invalid_email = "Sähköpostiosoite ei kelpaa";
$contact_invalid_message = "Viesti ei kelpaa";
$invoice_button = "Lasku";
$invoice_header = "KUMPPANILASKU";
$invoice_aff_info = "Kumppanin tiedot";
$invoice_co_info = "Tiedot";
$invoice_acct_info = "Tilitiedot";
$invoice_payment_info = "Maksutiedot";
$invoice_comm_date = "Maksupäivä";
$invoice_comm_amt = "Komission summa";
$invoice_comm_type = "Komission tyyppi";
$invoice_admin_note = "Ylläpitäjän huomautus";
$invoice_footer = "LASKUN LOPPU";
$invoice_print = "Tulosta lasku";
$invoice_none = "N/A";
$invoice_aff_id = "Kumppani ID";
$invoice_aff_user = "Käyttäjätunnus";
$menu_pdf_marketing = "PDF-markkinointiesitteet";
$menu_pdf_training = "PDF-harjoitusesitteet";
$marketing_target_url = "Lähde URL";
$marketing_source_code = "Lähdekoodi - Kopioi/liitä sivustollesi";
$marketing_group = "Markkinointiryhmä";
$peels_title = "Page Peel -nimi";
$peels_view = "Katsele mainosta";
$peels_description = "Page Peel -kuvaus";
$lb_head_title = "Pakollinen HEAD-koodi HTML-sivullesi";
$lb_head_description = "Jos haluat käyttää lightboxia sivustollasi, niin sinun on lisättävä seuraavat rivit metadataan sivulle, jolla haluat sen näkyvän.";
$lb_head_source_code = "Liitä tämä koodi HTML-asiakirjasi metadataan.";
$lb_head_code_notes = "Sinun tarvitsee liittää se vain kerran riippumatta siitä kuinka monta lightbox-laatikkoa asetat sivullesi.";
$lb_head_tutorial = "Katso tutoriaali";
$lb_body_title = "Lightbox-nimi";
$lb_body_description = "Lightbox-kuvaus";
$lb_body_click = "Klikkaa yllä olevaa kuvaa ja näet lightboxin.";
$lb_body_source_code = "Liitä tämä koodi HTML-asiakirjaasi, kohtaan johon haluat kuvan.";
$pdf_title = "PDF";
$pdf_training = "Harjoitteluasiakirjat";
$pdf_marketing = "Markkinointiesitteet";
$pdf_description_1 = "Tarvitset Adobe Readerin lukeaksesi tiedostoja ja ladataksesi PDF-markkinointimateriaalejamme.";
$pdf_description_2 = "Adobe Readerin voit ladata ilmaiseksi Adoben verkkosivuilta.";
$pdf_file_name = "Tiedoston nimi";
$pdf_file_size = "Tiedoston koko";
$pdf_file_description = "Kuvaus";
$pdf_bytes = "Bitit";
$menu_heading_training_materials = "Harjoittelumateriaalit";
$menu_videos = "Katso harjoittelumateriaaleja";
$menu_custom_manual = "Kustomoidut jäljityslinkit";
$menu_page_peels = "Peel-sivut";
$menu_lightboxes = "Lightboxit";
$menu_email_templates = "Sähköpostimallit";
$menu_heading_custom_links = "Kustomoidut jäljityslinkit";
$menu_custom_reports = "Raportit";
$menu_keyword_links = "Avainsanajäljityslinkit";
$menu_subid_links = "Kumppanijäljityslinkit";
$menu_alteranate_links = "Vaihtoehtoiset laskeutumissivulinkit";
$menu_heading_additional = "Lisätyökalut";
$menu_drop_heading_stats = "Yleiset tilastot";
$menu_drop_heading_commissions = "Komissiot";
$menu_drop_heading_history = "Maksuhistoria";
$menu_drop_heading_traffic = "Liikenneloki";
$menu_drop_heading_account = "Oma tili";
$menu_drop_heading_logo = "Lataa OmaLogo";
$menu_drop_heading_faq = "FAQ";
$menu_drop_general_stats = "Yleiset tilastot";
$menu_drop_tier_stats = "Tasotilastot";
$menu_drop_current = "Nykyiset komissiot";
$menu_drop_tier = "Nykyiset tasokomissiot";
$menu_drop_pending = "Odottaa hyväksyntää";
$menu_drop_paid = "Maksetut komissiot";
$menu_drop_paid_rec = "Maksetut tasokomissiot";
$menu_drop_recurring = "Aktiiviset toistuvat komissiot";
$menu_drop_edit = "Muokkaa tiliä";
$menu_drop_password = "Vaihda salasana";
$menu_drop_change = "Vaihda komissiotapa";
$account_hidden = "piilotettu";
$keyword_title = "Kustomoitu avainsanalinkki";
$keyword_info = "Kustomoidun avainsanalinkin luominen antaa sinulle mahdollisuuden jäljittää yhteyksiä useista lähteistä. Luo linkki, jossa on jopa 4 eri avainsanaa jäljitystä varten ja josta kustomoitu jäljitysraportti näyttää sinulle yksityiskohtaiset tiedot jokaisesta luomastasi avainsanasta.";
$keyword_heading = "Saatavilla olevat eri variaabelit avainsanojen luomiseen";
$keyword_tracking = "ID:n jäjittäminen";
$keyword_build = "Kun haluat luoda linkin, niin ota seuraava URL ja liitä siihen ID-jäljitys ja haluamasi avainsana.";
$keyword_example = "Esimerkki";
$keyword_tutorial = "Katso ohje";
$sub_tracking_title = "Kumppanin jäljittäminen";
$sub_tracking_info = "Kumppanilinkkien luominen antaa sinulle mahdollisuuden antaa niitä käytettäväksi omille kumppaneillesi. Saat tietoosi keneltä sait komission, koska me raportoimme sinulle kenen kautta kumppaneistasi ostostapahtuma tapahtui. Toinen syy kumppanilinkkien käytölle on, jos sinulla on oma jäljitysjärjestelmäsi, jonka antamat tiedot haluat mukaan raportteihin.";
$sub_tracking_build = "Laita XXX:n tilalle kumppanin ID-numero, jonka saat kumppaniohjelmastasi. Toista menettely jokaisen kumppanin kohdalla.";
$sub_tracking_example = "Esimerkki";
$sub_tracking_tutorial = "Katso ohje";
$sub_tracking_id = "Kumppani ID";
$alternate_title = "Vuorottele tulevan liikenteen sivulinkkejä";
$alternate_option_1 = "Vaihtoehto 1: Automaattinen linkkien luonti";
$alternate_heading_1 = "Automaattinen linkkien luonti";
$alternate_info_1 = "Määrittele tuleva liikenne antamalla URL-osoite, johon haluat liikenteen ohjata ja me luomme sinulle linkin. Käyttämällä tätä ominaisuutta saat lyhyemmän linkin, jota voit käyttää linkkiin upotetun URL:län ja tietokannastamme löytyvän ID-numeron kanssa.";
$alternate_button = "Luo linkki";
$alternate_links_heading = "Vaihtoehtoiset tulevat URL-linkit";
$alternate_links_note = "Olemassa olevat linkit pysyvät tallessa ja toimivina, jos poistat kustomoidun linkin tältä sivulta.";
$alternate_links_remove = "remove";
$alternate_option_2 = "Vaihtoehto 2: Manuaalinen linkkien luominen";
$alternate_info_2 = "Jos teet mieluummin omat kumppanilinkkisi itse vaihtoehtoisella URL:llä, niin käytä seuraavaa rakennetta.";
$alternate_variable = "Vaihtele tulevaa URL-variaabelia.";
$alternate_example = "Esimerkki";
$alternate_build = "Rakentaaksesi linkin, ota seuraava URL ja laita siihen vaihtoehtoinen tulevan liikenteen URL.";
$alternate_none = "Ei vaihtoehtoisia linkkejä.";
$alternate_tutorial = "Katso ohje";
$cr_title = "Kustomoitu avainsanaraportti";
$cr_select = "Valitse avainsana";
$cr_button = "Luo raportti";
$cr_no_results = "Ei hakutuloksia";
$cr_no_results_info = "Kokeile toista hakusanayhdistelmää";
$cr_used = "Käytetyt hakusanat";
$cr_found = "Löydetty linkki/linkit";
$cr_times = "Kertaa";
$cr_unique = "Löydetyt uniikit linkit";
$cr_detailed = "Yksityiskohtainen linkkiraportti";
$cr_export = "Vie raportti Exceliin";
$cr_none = "Ei löydettyjä hakusanoja";
$logo_title = "Lataa yrityksesi logo";
$logo_info = "Jos haluat ladata yrityksesi logon, niin me laitamme sen sivuillemme tuomillesi asiakkaille näytille. Tämä auttaa meitä kustomoimaan asiakkaasi kokemuksen, kun he vierailevat meillä.";
$logo_bullet_one = "Kuvatiedostot, jotka kelpaavat jpg, .gif tai .png. Flash-sisältöä ei sallita.";
$logo_bullet_two = "Epäsopivat kuvat hylätään ja tilisi jäädytetään.";
$logo_bullet_three = "Logosi ei näy sivuillamme ennen kuin hyväksymme sen.";
$logo_bullet_size_one = "Kuvan maksimileveys saa olla";
$logo_bullet_size_two = "pikseli ja maksimikorkeus";
$logo_bullet_req_size_one = "Kuvan minimileveys on";
$logo_bullet_req_size_two = "pikseliä ja korkeus";
$logo_bullet_pixels = "pikseliä.";
$logo_choose = "Valitse kuva";
$logo_file = "Valitse tiedosto:";
$logo_browse = "Selaa...";
$logo_button = "Lataa";
$logo_current = "Nykyinen kuva";
$logo_remove = "poista";
$logo_display_status = "Kuvan tila:";
$logo_pending = "Odottaa hyväksyntää";
$logo_approved = "Hyväksytty";
$logo_success = "Kuva on nyt ladattu onnistuneesti ja odottaa hyväksyntää.";
$signup_security_title = "Tilin varmentaminen";
$signup_security_info = "Ole hyvä ja anna laatikossa näkyvä turvakoodi. Tämä auttaa meitä estämään automaattiset tilin luomiset.";
$signup_security_code = "Turvakoodi";
$sub_tracking_none = "Ei";
$missing_security_code = "Väärä tai puuttuva tilitietovarmenne / turvakoodi";
$alternate_success_title = "Linkin luominen onnistui";
$alternate_success_info = "Ota linkki alapuolelta ja ala ohjata liikennettä määrittelemääsi URL:lään.";
$alternate_failed_title = "Linkin luomisessa tapahtui virhe";
$alternate_failed_info = "Ole hyvä ja anna kelvollinen URL.";
$logo_missing_filename = "Valitse tiedoston nimi.";
$logo_required_width = "Kuvan on leveyden oltava";
$logo_required_height = "Kuvan korkeuden on oltava";
$logo_maximum_width = "Kuvan maksimileveys on";
$logo_maximum_height = "Kuvan maksimikorkeus on";
$logo_size_maximum = "Kuvan maksimikoko on";
$logo_bad_filetype = "Kuvatiedostotyyppiä ei tueta. Sallitut kuvatiedostotyypit ovat .gif, .jpg ja .png.";
$logo_upload_error = "Virhe kuvan latauksessa, ole hyvä ja ota yhteyttä kumppanihallintahenkilöön.";
$logo_error_title = "Virhe kuvaa ladattaessa";
$logo_error_bytes = "bittiä.";
$excel_title = "Kustomoitu avainsanaraportti";
$excel_tab_report = "Kustomoitu avainsanaraportti";
$excel_tab_logs = "Liikenneloki";
$excel_date = "Raporttipäivämäärä:";
$excel_affiliate = "Kumppani ID:";
$excel_criteria = "Kriteerit avainasanalinkille";
$excel_link = "Linkin rakenne";
$excel_hits = "Yksilölliset osumat";
$excel_comm_stats = "Komissiotilastot";
$excel_comm_current = "Nykyiset komissiot";
$excel_comm_paid = "Maksetut komissiot";
$excel_comm_total = "Kaikki komissiot";
$excel_comm_ratio = "Muuntosuhde";
$excel_earned = "Ansaitut komissiot";
$excel_earned_current = "Nykyiset komissiot";
$excel_earned_paid = "Maksetut komissiot";
$excel_earned_total = "Kaikki ansaitut komissiot";
$excel_earned_tab = "Klikkaa liikennelokilehteä (alla), jos haluat nähdä tätä linkkiä koskevan liikennelokin.";
$excel_log_title = "Kustomoitujen avainsanojen liikenneloki";
$excel_log_ip = "IP-osoite";
$excel_log_refer = "Ohjaava URL";
$excel_log_date = "Päivämäärä";
$excel_log_time = "Aika";
$excel_log_target = "Kohde URL";
$etemplates_title = "Sähköpostimallit";
$etemplates_view_link = "Katso tätä sähköpostimallia";
$etemplates_name = "Mallin nimi";
$signup_maintenance_heading = "Huoltohuomautus";
$signup_maintenance_info = "Kirjautuminen on hetkellisesti poissa käytöstä. Ole hyvä ja yritä myöhemmin uudelleen.";
$marketing_group_title = "Markkinointiryhmä";
$marketing_button = "Näytettävä";
$marketing_no_group = "Ei valittua ryhmää";
$marketing_choose = "Ole hyvä ja valitse yläpuolelta markkinointiryhmä";
$marketing_notice = "Markkinointiryhmillä voi olla erilliset tulevan liikenteen sivut";
$canspam_heading = "CAN-SPAM -säännöt ja niiden hyväksyminen";
$canspam_accept = "Olen lukenut ja ymmärtänyt säännöt ja hyväksyn yllä olevat CAN-SPAM -säännöt.";
$canspam_error = "Et ole hyväksynyt CAN-SPAM -sääntöjä.";
$signup_banned = "Tilin luomisessa on tapahtunut virhe. Ole hyvä ja ota yhteys järjestelmänvalvojaan, jos haluat lisää tietoa.";
$header_testimonials = "Kumppaneiden kokemuksia";
$testi_visit = "Vieraile verkkosivulla";
$testi_description = "Kerro kokemuksistasi meidän kumppaniohjelmastamme ja laitamme kokemuksesi näkyviin &lt;a href=&quot;testimonials.php&quot;&gt;testimonials&lt;/a&gt; sivullemme ja linkitämme sen sivustoosi.";
$testi_name = "Nimi";
$testi_url = "Sivuston URL";
$testi_content = "Kokemus";
$testi_code = "Turvakoodi";
$testi_submit = "Lähetä kokemus";
$testi_na = "Kokemuksia ei ole juuri nyt saatavissa.";
$testi_title = "Kirjoita kokemus";
$testi_success_title = "Kokemuksen jättäminen onnistui";
$testi_success_message = "Kiitos, että lähetit meille kokemuksesi. Tiimimme käsittelee sen pian.";
$testi_error_title = "Virhe kokemuksen lähettämisessä";
$testi_error_name_missing = "Ole hyvä ja sisällytä nimesi lähettämääsi kokemukseen, jota koetat lähettää.";
$testi_error_url_missing = "Ole hyvä ja sisällytä URL-osoite kokemukseen, jota koetat lähettää.";
$testi_error_missing = "Ole hyvä ja sisällytä kirjoitelma kokemukseen, jota koetat lähettää.";
$menu_drop_delayed = "Viivästyneet komissiot";
$details_drop_6 = "Nykyiset viivästyneet komissiot";
$details_type_6 = "Viivästynyt - Hyväksytään pian";
$comdetails_status_6 = "Viivästynyt - Hyväksytään pian";
$tc_reaccept_title = "Ilmoitus ehtojen ja edellytysten muutoksesta";
$tc_reaccept_sub_title = "Sinun on hyväksyttävä uudet ehdot ja edellytykset, jotta pääset taas tilillesi.";
$tc_reaccept_button = "Olen lukenut ja ymmärtänyt ehdot ja edellytykset ja hyväksyn ne.";
$tlinks_active = "Aktiivisten tasojen määrä";
$tlinks_payout_structure = "Tasojen maksujärjestelmä";
$tlinks_level = "Taso";
$tierText1 = "%, joka lasketaan ohjaavan kumppanin komission suuruudesta.";
$tierText2 = "%, joka lasketaan ylemmän tason komission suuruudesta.";
$tierText3 = "%, joka lasketaan myynnistä.";
$tierTextflat = "perusmaksu.";
$edit_custom_button = "Muokkaa vastausta";
$private_heading = "Yksityinen kirjautuminen";
$private_info = "Kumppaniohjelmamme ei ole yleisesti avoin ja se vaatii liittymiskoodin. Tietoa siitä kuinka saat koodin, löydät täältä.";
$private_required_heading = "Liittyminen pakollista";
$private_code_title = "Anna liittymiskoodi";
$private_button = "Lähetä koodi";
$private_error_title = "Epäkelpo liittymiskoodi";
$private_error_invalid = "Liittymiskoodi, jonka annoit, on väärä.";
$private_error_expired = "Liittymiskoodi, jonka annoit, on vanhentunut.";
$qr_code_title = "QR-koodit";
$qr_code_size = "QR-koodin koko";
$qr_code_button = "Näytä QR-koodi";
$qr_code_offline_title = "Offline-markkinointi";
$qr_code_offline_content1 = "Lisää tämä QR-koodi markkinointiesitteisiisi, lentolehtisiin käyntikortteihin jne.";
$qr_code_offline_content2 = "- Klikkaa oikealla napilla kuvaa ja &lt;strong&gt;talenna&lt;/strong&gt; koneellesi.";
$qr_code_online_title = "Online-markkinointi";
$qr_code_online_content = "Lisää tämä QR-koodi sivustollesi, sosiaaliseen mediaan, blogiin jne.";
$menu_coupon = "Kuponkikoodit";
$coupon_title = "Tarjolla olevat kuponkikoodit";
$coupon_desc = "Jaa nämä kuponkokoodit ja ansaitset komission joka kerta, kun joku käyttää koodiasi!";
$coupon_head_1 = "Kuponkikoodi";
$coupon_head_2 = "Asiakasalennus";
$coupon_head_3 = "Komissiosi summa on";
$coupon_sale_amt = "myyntisummasta";
$coupon_flat_rate = "perusmaksu";
$coupon_default = "Perusmaksutaso";
$cc_vanity_title = "Pyydä henkilökohtainen kuponkikoodi";
$cc_vanity_field = "Kuponkikoodi";
$cc_vanity_button = "Pyydä kuponkikoodi";
$cc_vanity_error_missing = "<strong>Virhe!</strong> Ole hyvä ja anna kupongin koodi.";
$cc_vanity_error_exists = "<strong>Virhe!</strong> Olet jo käyttänyt tämän koodin. Odottaa hyväksyntää.";
$cc_vanity_error = "<strong>Virhe!</strong> Kupongin koodi ei kelpaa. Ole hyvä ja käytä vain kirjaimia, numeroita ja alaviivoja.";
$cc_vanity_success = "<strong>Onnistui!</strong> Henkilökohtainen, kustomoitu kuponki on pyydetty.";
$coupon_none = "Ei kuponkikoodeja saatavilla juuri nyt.";
$pic_error_title = "Virhe kuvaa ladattaessa";
$pic_missing = "Ole hyvä ja valitse tiedoston nimi.";
$pic_invalid = "Kuvatyyppiä ei sallita. Sallitut kuvaformaatit ovat .gif, .jpg ja.png.";
$pic_error = "Virhe ladattaessa kuvaa, ota yhteys kumppaniasioiden hoitajaan.";
$pic_success = "Kuvasi on ladattu onnistuneesti.";
$pic_title = "Lataa kuva";
$pic_info = "Kuvan lataaminen auttaa tekemään kokemuksesta henkilökohtaisemman.";
$pic_bullet_1 = "Kuvat voivat olla formaateissa .jpg, .gif tai .png.";
$pic_bullet_2 = "Kaikki sopimattomat kuvat hylätään ja tilisi jäädytetään.";
$pic_bullet_3 = "Kuvaasi ei näytetä julkisesti. Vain me näemme kuvan, joka on liitetty tiliisi.";
$pic_file = "Valitse tiedosto:";
$pic_button = "Lataa";
$pic_current = "Nykyinen kuvani";
$pic_remove = "Poista kuva";
$progress_title = "Kelpoisuus seuraavaan maksuun:";
$progress_complete = "valmis.";
$progress_none = "Meillä ei ole minimimaksuvaatimusta.";
$progress_sentence_1 = "Olet ansainnut";
$progress_sentence_2 = "/";
$progress_sentence_3 = "vaatimuksista.";
$aff_lib_button = "<b>Lunasta ilmainen pääsy!</b><br />www.AffiliateLibrary.com";
$menu_announcements = "Sosiaalisen median kampanjat";
$announcements_name = "Kampanjan nimi";
$announcements_facebook_message = "Facebook-viesti";
$announcements_twitter_message = "Twitter-viesti";
$announcements_facebook_link = "Facebook-linkki";
$announcements_facebook_picture = "Facebook-kuva";
$general_last_30_days_activity = "Viimeisen 30 päivän toiminnat";
$general_last_30_days_activity_traffic = "Liikenne";
$general_last_30_days_activity_commissions = "Komissiot";
$accountability_title = "Vastuu ja kommunikaatio";
$accountability_text = "<strong>Mitä tämä on?</strong><p>Me olemme ottaneet proaktiivisen lähestymistavan luottamuksen luomiseen kumppaneidemme kanssa. On tavoitteemme, että kerromme niin paljon tietoa kuin mahdollista jokaisesta komissiosta, joka järjestelmämme puitteissa ansaitaan tai hylätään.</p><strong>Kommunikaatio</strong><p>Voimme toimittaa tiedot kaikista hylätyistä komissioista. Kannustamme vahvaan kommunikaatioon kumppaneidemme kesken ja kannustamme kysymään ja antamaan palautetta.</p>";
$debit_reason_0 = "Ei ole";
$debit_reason_1 = "Palautus";
$debit_reason_2 = "Takaisin veloitus";
$debit_reason_3 = "Raportoitu petos";
$debit_reason_4 = "Tilaus peruttu";
$debit_reason_5 = "Osittainen palautus";
$menu_drop_pending_debits = "Odottavat veloitukset";
$debit_amount_label = "Veloituksen summa";
$debit_date_label = "Veloituksen päivämäärä";
$debit_reason_label = "Veloituksen syy";
$debit_paragraph = "Veloituksen vähennetään seuraavasta sinulle maksettavasta maksuerästä.";
$debit_invoice_amount = "Miinus veloitus";
$debit_revised_amount = "Korjattu maksuerän summa";
$mv_head_description = "Huomio: Voit laittaa ainoastaan yhden videon per sivustosi sivu.";
$mv_head_source_code = "Liitä tämä koodi HTML-asiakirjasi ylätunnisteeseen.";
$mv_body_title = "Video-otsikko";
$mv_body_description = "Kuvaus";
$mv_body_source_code = "Liitä tämä koodi HTML-asiakirjasi kohtaan, johon haluat videon tulevan.";
$menu_marketing_videos = "Videos";
$mv_preview_button = "Esikatsele video";
$dt_no_data = "Ei saatavilla olevaa tietoa.";
$dt_showing_exists = "Näytetään_START_ - _END_ / _TOTAL_ kohdetta.";
$dt_showing_none = "Näytetään 0 - 0 / 0 kohdetta.";
$dt_filtered = "(suodatettu _MAX_ kaikista kohteista)";
$dt_length_choice = "Näytä _MENU_ kohteet.";
$dt_loading = "Lataa...";
$dt_processing = "Prosessoi...";
$dt_no_records = "Kohteita ei löytynyt.";
$dt_first = "Ensimmäinen";
$dt_last = "Viimeinen";
$dt_next = "Seuraava";
$dt_previous = "Edellinen";
$dt_sort_asc = ": aktivoi, jos haluat järjestää tulokset nousevasti";
$dt_sort_desc = ": aktivoi, jos haluat järjestää tulokset laskevasti";
$choose_marketing_group = "Valitse markkinointiryhmä";
$email_already_used_1 = "Tiliä ei voitu luoda. Sallimme ainoastaan yhden tilin";
$email_already_used_2 = "tili";
$email_already_used_3 = "luomisen per sähköposti.";
$missing_fax = "Anna faksinumerosi.";
$chart_last_6_months = "Viimeisen 6 kuukauden ajalta maksetut komissiot";
$chart_last_6_months_paid = "Maksetut komissiot";
$chart_this_month = "Top 5 kumppaniamme tässä kuussa";
$chart_this_month_none = "Ei tietoja näytettäväksi.";
$login_return = "Palaa kumppanikotisivulle";
$login_lost_details = "Anna käyttäjätunnuksesi ja lähetämme sinulle sähköpostitse kirjautumistietosi.";
$account_edit_general_prefs = "Yleisasetukset";
$account_edit_email_language = "Sähköpostin kieli";
$footer_connect = "Ota yhteyttä";
$modal_close = "Sulje";
$vat_amount_heading = "ALV-summa";
$menu_logout = "Kirjaudu ulos";
$menu_upload_picture = "Lataa kuva";
$menu_offer_testi = "Kirjoita kokemuksestasi";
$fb_login = "Kirjaudu Facebookilla";
$fb_permissions = "Pääsylupaa ei ole annettu. Ole hyvä ja anna sivustolle lupa käyttää sähköpostiasi.";
$announcements_published = "Ilmoitus julkaistu";
$training_videos_title = "Harjoitteluvideot";
$training_videos_general = "Yleismarkkinointi";
$commission_method = "Komissiotapa";
$how_will_you_earn = "Miten ansaitset komissioita?";
$pm_account_credit = "Maksamme tilillesi saamasi komissioiden arvon.";
$pm_check_money_order = "Lähetämme sinulle maksun sekkinä tai maksuosoituksena postitse.";
$pm_paypal = "Lähetämme sinulle maksun PayPalin kautta.";
$pm_stripe = "Lähetämme sinulle maksun Stripen kautta.";
$pm_wire = "Lähetämme sinulle maksun tilisiirtona.";
$add_to_signup_left_column_text = "<span style=\"color:#CC0000; font-style:italic;\">* osoittaa pakolliset kentät.</span>";
$paypal_email = "Paypal-sähköposti";
$stripe_acct_details = "Stripe-tilin tiedot";
$stripe_connect = "Voit yhdistää Stripe-tilisi Tilin asetukset -sivulta liittymisesi jälkeen.";
$stripe_success = "Stripe-tili yhdistetty onnistuneesti";
$stripe_settings = "Stripe-asetukset";
$stripe_connect_edit = "Yhdistä Stripeen";
$stripe_delete = "Poista Stripe-tili";
$stripe_confirm = "Oletko varma, että haluat poistaa tämän tilin?";
$payment_settings = "Maksuasetukset";
$edit_payment_settings = "Muokkaa maksuasetuksia";
$invalid_paypal_address = "Paypal-sähköpostiosoite ei kelpaa.";
$payment_method_error = "Ole hyvä ja valitse maksutapa.";
$payment_settings_updated = "Maksuasetukset on päivitetty.";
$stripe_removed = "Stripe-tili on poistettu.";
$payment_settings_success = "Onnistui!";
$payment_update_notice_1 = "Ilmoitus!";
$payment_update_notice_2 = "Olet valinnut saavasi meiltä maksun <strong>[payment_option_here]</strong> -maksuvaihtoehdon kautta. Ole hyvä ja klikkaa <a href=\"account.php?page=48\" style=\"font-weight:bold;\">tästä</a> yhdistääksesi <strong>[payment_option_here]</strong> tiliisi.";
$pm_title_credit = "Tilin luotto";
$pm_title_mo = "Maksuosoitus";
$pm_title_paypal = "PayPal";
$pm_title_stripe = "Stripe";
$pm_title_wire = "Pankkisiirto";
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