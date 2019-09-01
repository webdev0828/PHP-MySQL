<?PHP

//-------------------------------------------------------
	  $language_pack_name = "hungarian";
	  $language_pack_table_name = "hungarian";
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
$header_indexLink = "Partneri kezdõlap";
$header_signupLink = "Feliratkozás Most";
$header_accountLink = "Fiókbeállítások";
$header_emailLink = "Kapcsolat";
$header_greeting = "Üdvözöljük";
$header_nonLogged = "Vendég";
$header_logout = "Kijelentkezés itt";
$footer_tag = "Partner-Szoftver készítõje: iDevAffiliate";
$footer_copyright = "Copyright";
$footer_rights = "Minden jog fenntartva";
$index_heading_1 = "Köszöntjük a Partnerprogramban!";
$index_paragraph_1 = "A programunkba ingyenesen csatlakozhat, a feliratkozás könnyû és hozzáértést nem igénylõ folyamat. Az affiliate programok, avagy partnerprogramk sok helyen megtalálhatók az interneten. Segítségükkel a weboldal-tulajdonosoknak plusz egy módjuk van arra, hogy oldalukból profitálhassanak. Az affiliate-partnerek forgalmat és eladásokat hoznak különféle kereskedelmi weboldalaknak, cserébe jutalékot kapnak fizetségül.";
$index_heading_2 = "Hogyan mûködik?";
$index_paragraph_2 = "Miután csatlakozott partnerprogramunkba, különbözõ bannereket és szöveges linkeket fog látni, melyeket a weboldalán belül kell elhelyezzen. Amikor egy látogató rákattint egy ilyen linkre, a mi weboldalunkra kerülnek, és tevékenységüket figyelemmel követi a partner-szoftverünk. Ön pedig jutalékot kap a jutaléktípustól függõen.";
$index_heading_3 = "Valós idejû jelentések és statisztikák!";
$index_paragraph_3 = "Jelentkezzen be a nap 24 órájában az eladások, a forgalom, az egyenlege, valamint a bannerek teljesítményének megtekintéséhez.";
$index_login_title = "Partner Bejelentkezés";
$index_login_username = "Felhasználónév";
$index_login_password = "Jelszó";
$index_login_username_field = "felhasználónév";
$index_login_password_field = "jelszó";
$index_login_button = "Bejelentkezés";
$index_login_signup_link = "Kattintson ide a regisztrációhoz";
$index_table_title = "Program részletei";
$index_table_commission_type = "Jutalék típusok";
$index_table_initial_deposit = "Kezdeti befektetés";
$index_table_requirements = "Fizetési feltételek";
$index_table_duration = "Fizetés idõtartama";
$index_table_choose = "Válasszon a következõ kifizetési típusokból!";
$index_table_sale = "Fizetés eladások után";
$index_table_click = "Fizetés átkattintások után";
$index_table_sale_text = "minden Ön által hivatkozott eladás után.";
$index_table_click_text = "minden Ön által hivatkozott kattintás után.";
$index_table_deposit_tag = "Csak feliratkozásért!";
$index_table_requirements_tag = "A kifizetéshez szükséges minimum egyenleg.";
$index_table_duration_tag = "A kifizetések havonta történnek meg, ekkor az elõzõ havit kapja meg..";
$signup_left_column_text = "Csatlakozzon a partnerprogramunkhoz és keressen pénzt minden felénk irányított vásárlóért! Csak regisztráljon egy fiókot, helyezze el a hivatkozásokat a weboldalán és nézze, ahogy emelkedik az egyenlege, miközben látogatói a mi ügyfeleinkké válnak.";
$signup_left_column_title = "Üdvözöljük, partner!";
$signup_login_title = "Fiók elkészítése";
$signup_login_username = "Felhasználónév";
$signup_login_password = "Jelszó";
$signup_login_password_again = "Jelszó ismét";
$signup_login_minmax_chars = "- A felhasználónevének legalább user_min_chars karakterből kell állnia.&lt;br /&gt;- A felhasználónév lehet alfanumerikus.<br/>- A felhasználónév az alábbi karaktereket tartalmazhatja: _( csak alsóvonás)<br/><br/>- A jelszónak minimum pass_min_chars hosszúnak kell lennie.<br/>- A jelszó az alábbi karaktereket tartalmazhatja:   characters_allowed";
$signup_login_must_match = "Ennek a mezõnek meg kell egyeznie a Jelszó mezõvel.";
$signup_standard_title = "Szokásos adatok";
$signup_standard_email = "E-mail cím";
$signup_standard_company = "Cégnév";
$signup_standard_checkspayable = "Csekkek kedvezményezettje";
$signup_standard_weburl = "Weboldal címe";
$signup_standard_taxinfo = "Adózási szám vagy személyi azonosító";
$signup_personal_title = "Személyes adatok";
$signup_personal_fname = "Keresztnév";
$signup_personal_state = "Állam vagy megye";
$signup_personal_lname = "Vezetéknév";
$signup_personal_phone = "Telefonszám";
$signup_personal_addr1 = "Lakcím";
$signup_personal_fax = "Fax-szám";
$signup_personal_addr2 = "További cím";
$signup_personal_zip = "Irányítószám";
$signup_personal_city = "Város";
$signup_personal_country = "Ország";
$signup_commission_title = "Jutalékfizetés módja";
$signup_commission_howtopay = "Hogyan kéri a fizetségét?";
$signup_commission_style_PPS = "Fizetés eladások után";
$signup_commission_style_PPC = "Fizetés átkattintások után";
$signup_terms_title = "Felhasználási feltételek";
$signup_terms_agree = "Elolvastam és megértettem a fenti feltételeket, és beleegyezek.";
$signup_page_button = "Fiók létrehozása";
$signup_success_email_comment = "Küldtünk egy e-mailt a megadott címre. Ebben találja a felhasználónevét és jelszavát. <BR />\r\nKérjük, õrizze meg biztonságos helyen arra az esetre, ha elfelejtené ezeket.";
$signup_success_login_link = "Bejelentkezés a fiókjába";
$custom_fields_title = "Egyéni adatmezõk";
$logout_msg = "<b>Sikeresen kijelentkezett</b><BR />Köszönjük a partnerprogramban való részvételét.";
$signup_page_success = "A fiókja elkészült";
$login_left_column_title = "Bejelentkezés";
$login_left_column_text = "Írja be a felhasználónevét és jelszavát, hogy hozzáférjen a statisztikáihoz, bannerjeihez, linkelõ-kódjához, a GYIK-hez és továbbiakhoz.<BR/ ><BR/ >Ha elfelejtette a jelszavát, adja meg felhasználónevét és e-mailben elküldjük a bejelentkezési adatait.<BR /><BR />";
$login_title = "Bejelentkezés a fiókjába";
$login_username = "Felhasználónév";
$login_password = "Jelszó";
$login_invalid = "Sikertelen bejelentkezés";
$login_now = "Bejelentkezés a fiókba";
$login_send_title = "Elfelejtette a jelszavát?";
$login_send_username = "Felhasználónév";
$login_send_info = "Bejelentkezési adatok elküldve az e-mail címére";
$login_send_pass = "Küldés e-mailre";
$login_send_bad = "Felhasználónév nem létezik";
$help_new_password_heading = "Új jelszó";
$help_new_password_info = "A jelszava legalább pass_min_chars karakter hosszú kell legyen, valamint csak számokat, betűket és az alábbi speciális karaktereket tartalmazhatja: characters_allowed";
$help_confirm_password_heading = "Új jelszó megerõsítése";
$help_confirm_password_info = "Ennek a jelszónak meg kell egyeznie az Új jelszó mezõben megadottal.";
$help_custom_links_heading = "Kulcsszó";
$help_custom_links_info = "A kulcsszava legfeljebb 30 karakter hosszú lehet. Csak számokat, betûket és központozási jeleket tartalmazhat.";
$error_title = "Az alábbi hibáakt találtuk:";
$username_invalid = "Érvénytelen felhasználónév: csak számokból, betűkből és alsóvonásból állhat.";
$username_taken = "A választott fehasználónév már foglalt.";
$username_short = "A felhasználónév túl rövid, legalább user_min_chars kaakter hosszú kell, hogy legyen.";
$username_long = "A felhasználónév túl hosszú, legfeljebb user_max_chars karakter hosszú lehet.";
$password_invalid = "Érvénytelen jelszó: csak számokból, betűkből és az alábbi karakterekből állhat:  characters_allowed";
$password_short = "A jelszava túl rövid, legalább pass_min_chars karakterbõl kell hogy álljon.";
$password_long = "A jelszava túl hosszú, legfeljebb pass_max_chars karakterbõl állhat.";
$password_mismatch = "A jelszavak nem egyeznek meg..";
$missing_checks = "Kérjük adja meg a kedvezményezett nevét, hogy tudjunk csekkekkel fizetni.";
$missing_tax = "Kérjük adja meg az adószámát, vagy SSN számát (USA esetében.).";
$missing_fname = "Kérjük adja meg a keresztenvét.";
$missing_lname = "Kérjük adja meg a vezetéknevét.";
$missing_email = "Kérjük adja meg az e-mail címét.";
$invalid_email = "Az e-mail címe érvénytelen.";
$missing_address = "Kérjük adja meg a lakcímét.";
$missing_city = "Kérjük adja meg a várost, ahol lakik.";
$missing_company = "Kérjük adja meg a cégnevét.";
$missing_state = "Kérjük adja meg az államot vagy megyét.";
$missing_zip = "Kérjük adja meg az irányítószámát.";
$missing_phone = "Kérjük adja meg a telefonszámát.";
$missing_website = "Kérjük adja meg a weboldalának címét.";
$missing_paypal = "A PayPal-t választotta fizetési módnak, kérjük adja meg a PayPal-címét.";
$missing_terms = "Nem fogadta el a felhasználási feltételeket.";
$paypal_required = "Egy PayPal-fiókra van szüksége kifizetéshez.";
$missing_custom = "Kérjük, tötlse ki az alábbi mezõt:";
$account_total_transactions = "Összes tranzakció";
$account_standard_linking_code = "Hagyományos linkelõ kód - E-mailekhez kiválóan használható!";
$account_copy_paste = "Illessze be a fenti kódot weboldalára vagy e-mailjeibe";
$account_not_approved = "A fiókja jelenleg elbírálásra vár";
$account_suspended = "A fdiókját felfüggesztették";
$account_standard_earnings = "Alap kereset";
$account_inc_bonus = "bónusszal együtt";
$account_second_tier = "Másodszintû nyereség";
$account_recurring = "Ismétlõdõ nyereségek";
$account_not_available = "N/A";
$account_earned_todate = "Dátumig megkeresett összes";
$menu_heading_overview = "Fiók áttekintés";
$menu_general_stats = "Általános statisztika";
$menu_tier_stats = "Szint statisztikái";
$menu_payment_history = "Kifizetési elõzmények";
$menu_commission_details = "Járulékok részletei";
$menu_recurring_commissions = "Ismétlõdõ járulékok";
$menu_traffic_log = "Bejövõ forgalom elõzményei";
$menu_heading_marketing = "Marketing-anyagok";
$menu_banners = "Bannerek";
$menu_text_ads = "Szöveges hirdetések";
$menu_text_links = "Szöveges linkek";
$menu_email_links = "E-mail linkek";
$menu_html_links = "HTML hirdetések";
$menu_offline = "Offline Marketing";
$menu_tier_linking_code = "Kétszintû linkelõ kód";
$menu_email_friends = "Küldjön e-mailt barátainak és munkatársainak";
$menu_custom_links = "Készítse el saját linkjeit és kövesse azokat";
$menu_heading_management = "Fiók kezelése";
$menu_comalert = "CommissionAlert beállítása";
$menu_comstats = "CommissionStats beállítása";
$menu_edit_account = "Fiókadatok szerkesztése";
$menu_change_pass = "Jelszóváltoztatás";
$menu_change_commission = "Járulékos stílus megváltoztatása";
$menu_heading_general_info = "Alapadatok";
$menu_browse_affiliates = "Más partnerek böngészése";
$menu_faq = "Gyakran Ismételt Kérdések";
$suspended_title = "Értesítõ fiókjának állapotáról";
$suspended_heading = "A fiókja jelenleg fel van függesztve";
$suspended_notes = "Rendszergazdai megjegyzések";
$pending_title = "Értesítõ fiókjának állapotáról";
$pending_heading = "A fiókja jelenleg elbírálás alatt.";
$pending_note = "Miután elfogadtuk fiókját, a marketing-anyagok elérhetõvé válnak Önnek.";
$faq_title = "Gyakran Ismételt Kérdések";
$faq_none = "Még nincsen GYIK.";
$browse_title = "Más partnerek böngészése";
$browse_none = "Nincs más megtekinthetõ partner.";
$change_comm_title = "Járulékos stílus megváltoztatása";
$change_comm_curr_comm = "Jelenlegi járulékos stílus";
$change_comm_curr_pay = "Jelenlegi kifizetési szint";
$change_comm_new_comm = "Új járulékos stílus";
$change_comm_warning = "Ha járulékos stílust változtat, a fiókja visszaáll 1-es kifizetési szintre.";
$change_comm_button = "Járulékos stílus változtatása";
$change_comm_no_other = "Nincs más elérhetõ járulékos stílus";
$change_comm_level = "Szint";
$change_comm_updated = "Járulékos stílus frissítve";
$password_title = "Jelszóváltoztatás";
$password_old_password = "Régi jelszó";
$password_new_password = "Új jelszó";
$password_confirm_password = "Új jelszó megerõsítése";
$password_button = "Jelszó megváltoztatása";
$password_warning_old_missing = "A régi jelszó hiányzik vagy hibás";
$password_warning_new_missing = "Üres az új jelszó mezõ";
$password_warning_mismatch = "Az új jelszavak nem egyeznek meg";
$password_warning_invalid = "Érvénytelen jelszó - kattintson a Súgó megtekintéséhez";
$password_notice = "Jelszó cserélve";
$edit_failed = "Sikertelen jelszócsere - lássa a hibákat fentebb";
$edit_success = "Fiók frissítve";
$edit_button = "Fiókom szerkesztése";
$commissionstats_title = "CommissionStats beállítása";
$commissionstats_info = "A CommissionStats telepítése után azonnal megtekintheti statisztikát, közvetlenül a Windows asztalról! A szolgáltatás igénybevételéhez töltse le a CommissionStats-ot, <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>csomagolja ki</b></a> a tömörített állomáyyt a merevlemezre, majd futtassa a <b>setup.exe</b> fájlt. Amikor a bejelentkezési adatokat kéri, írja be az alábbiakat.";
$commissionstats_hint = "Tipp: A pontosság érdekében másolja és illessze be az adatokat";
$commissionstats_profile = "Profilnév";
$commissionstats_username = "Felhasználónév";
$commissionstats_password = "Jelszó";
$commissionstats_id = "Affiliate ID";
$commissionstats_source = "Forrás URL-je";
$commissionstats_download = " CommissionStats letöltése";
$commissionalert_title = "CommissionAlert beállítása";
$commissionalert_info = "A CommissionAlert telepítését követõen azonnali értesítéseket küldünk új járulékokról, közvetlenül a Windows asztalára! A szolgáltatás igénybe vételéhez töltse le a CommissionAlert-et és <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>csomagolja ki</b></a> az állomnáyt a merevlemezére, majd futtassa a <b>setup.exe</b> fájlt. Amikor a bejelentkezési adatokat kéri, írja be az alábbiakat.";
$commissionalert_hint = "Tipp: A pontosság érdekében másolja és illessze be az adatokat";
$commissionalert_profile = "Profilnév";
$commissionalert_username = "Felhasználónév";
$commissionalert_password = "Jelszó";
$commissionalert_id = "Affiliate ID";
$commissionalert_source = "Forrás URL-je";
$commissionalert_download = "CommissionAlert letöltése";
$offline_title = "Offline Marketing";
$offline_paragraph_one = "Keressen pénzt azzal is, hogy offline ajánlja barátainak és munkatársainak oldalunkat!";
$offline_send = "Küldje az ügyfeleket ide";
$offline_page_link = "oldal megtekintése";
$offline_paragraph_two = "Az ügyfele beírják az <b>Affiliate ID számát</b> a fenti oldalon lévõ dobozba, melynek köszönhetõen az Ön partnerei lesznek minden egyes vásárlásuk során.";
$banners_title = "Bannerek";
$banners_size = "Banner méret";
$banners_description = "Banner leírása";
$ad_title = "Szöveges hirdetések";
$ad_info = "A megadott linkelõ kód használatával módosíthatja a szöveges hirdetésének magasságát, szélességét és színsémáját.";
$links_title = "Link neve";
$email_title = "E-mail Linkek";
$email_group = "Marketing csoport";
$email_button = "E-mail linkek mutatása";
$email_no_group = "Nincs kiválasztott csoport";
$email_choose = "Kérjük, válasszon fentebb egy marketingcsoportot";
$email_notice = "Az egyes marketingcsoportoknak eltérõ forgalmú oldalaik lehetnek";
$email_ascii = "<b>ASCII/Szöveg változat</b> - Egyszerû szöveges e-mailekhez.";
$email_html = "<b>HTML változat</b> - HTML-lel formázott e-mailekhez.";
$email_test = "Próbalink";
$email_test_info = "Innen fognak az Ön vásárlói az oldalunkra érkezni.";
$email_source = "Forráskód - Másolja be az e-mail üzenetébe";
$html_title = "HTML hird. neve";
$html_view_link = "Ezen HTML hirdetés megtekintése";
$traffic_title = "Bejövõ forgalom naplója";
$traffic_display = "Utolsó megjelenítése";
$traffic_display_visitors = "Látogatók";
$traffic_button = "Forgalmi napló";
$traffic_title_details = "Bejöbõ forgalom részletei";
$traffic_ip = "IP cím";
$traffic_refer = "Hivatkozó URL";
$traffic_date = "Dátum";
$traffic_time = "Idõ";
$traffic_bottom_tag_one = "Utolsókat mutatja";
$traffic_bottom_tag_two = "ebbõl";
$traffic_bottom_tag_three = "Összes egyedi látogató";
$traffic_none = "Nincsenek forgalmi adatok";
$traffic_no_url = "Nem elérhetõ - lehetséges könyvjelzõ vagy e-mail link";
$traffic_box_title = "Teljes hivatkozó URl";
$traffic_box_info = "Kattintson a linkre a weboldal meglátogatásához";
$payment_title = "Fizetési elõzmények";
$payment_date = "Fizetés dátuma";
$payment_commissions = "Járulékok";
$payment_amount = "Fizetett mennyiség";
$payment_totals = "Összes";
$payment_none = "Nincs fizetési elõzmény";
$tier_stats_title = "Szintek statisztikái";
$tier_stats_accounts = "Ön alatt lévõ szintes fiókok";
$tier_stats_grab_link = "Itt találja a szintes hivatkozó kódját";
$tier_stats_none = "Nincsenek szintes fiókok";
$tier_stats_username = "Felhasználónév";
$tier_stats_current = "Jelenlegi járulékok";
$tier_stats_previous = "Korábbi kifizetések";
$tier_stats_totals = "Összes";
$recurring_title = "Ismétlõdõ járulékok";
$recurring_none = "Nincsenek ismétlõdõ járulékok";
$recurring_date = "Járulék dátuma";
$recurring_status = "Ismétlõdés állapota";
$recurring_payout = "Következõ kifizetés";
$recurring_amount = "Mennyiség";
$recurring_every = "Minden";
$recurring_in = "-ban/-ben";
$recurring_days = "Napok";
$recurring_total = "Összes";
$tlinks_title = "Adjon másokat is a szintjéhez és profitáljon belõlük is!";
$tlinks_embedded_one = "A szintes feliratkozás már aktív az Ön linkjeiben!";
$tlinks_embedded_two = "A szintes rendszer használatával másoknak is reklámozhatja a partnerprogramunkat. Ön lesz a legfelsõ szinten azok közül, akik az Ön speciális szintes referáló linkjét alkalmazzák. Arról hogy mennyit kereshet ezzel, alant olvashat.";
$tlinks_embedded_current = "Jelenlegi szintes kifizetés";
$tlinks_forced_two = "A szintes rendszer használatával másoknak is reklámozhatja a partnerprogramunkat. Ön lesz a legfelsõ szinten azok közül, akik az Ön speciális szintes referáló linkjét alkalmazzák. Arról hogy mennyit kereshet ezzel, alant olvashat.";
$tlinks_forced_code = "Szintes referáló link";
$tlinks_forced_paste = "Illessze be a fenti kódot weboldalára";
$tlinks_forced_money = "Webmesterek, itt kereshetnek pénzt!";
$comdetails_title = "Járulék részletei";
$comdetails_date = "Járulék dátuma";
$comdetails_time = "Járulék ideje";
$comdetails_type = "Járulék típusa";
$comdetails_status = "Jelenlegi állapot";
$comdetails_amount = "Járulék mennyisége";
$comdetails_additional_title = "További részletek a járulékról";
$comdetails_additional_ordnum = "Rendelés száma";
$comdetails_additional_saleamt = "Eladások mennyisége";
$comdetails_type_1 = "Bónusz Járulék";
$comdetails_type_2 = "Ismétlõdõ Járulék";
$comdetails_type_3 = "Szintes Járulék";
$comdetails_type_4 = "Alap Járulék";
$comdetails_status_1 = "Fizetve";
$comdetails_status_2 = "Engedélyezve - fizetés alatt";
$comdetails_status_3 = "Engedélyre várakozó";
$comdetails_not_available = "N/A";
$details_title = "Járulék részletei";
$details_drop_1 = "Jelenlegi alap járulékok";
$details_drop_2 = "Jelenlegi szintes járulékok";
$details_drop_3 = "Engedélyezésre váró járulékok";
$details_drop_4 = "Fizetett alap járulékok";
$details_drop_5 = "Fizetett szintes járulékok";
$details_button = "Járulékok megtekintése";
$details_date = "Dátum";
$details_status = "Állapot";
$details_commission = "Járulék";
$details_details = "Részletek megtekintése";
$details_type_1 = "Fizetve";
$details_type_2 = "Engedélyre várakozó";
$details_type_3 = "Engedélyezve - fizetés alatt";
$details_none = "Nincs megtekinthetõ járulék";
$details_no_group = "Nincs kiválasztva járulék-csoport";
$details_choose = "Kérjük, fentebb válasszon egy járulék-csoportot";
$general_title = "Jelenlegi járulékok - Utolsó kifizetéstõl dátumig";
$general_transactions = "Tranzakciók";
$general_earnings_to_date = "Dátumig szerzett nyereség";
$general_history_link = "Fizetési elõzmények megtekintése";
$general_standard_earnings = "Alap nyereségek";
$general_current_earnings = "Jelenlegi nyereség";
$general_traffic_title = "Forgalmi statisztikák";
$general_traffic_visitors = "Látogatók";
$general_traffic_unique = "Egyedi látogatók";
$general_traffic_sales = "Érvényesített eladások";
$general_traffic_ratio = "Eladási ráta";
$general_traffic_info = "Ezekben a statisztikákban nincsenek benne az ismétlõdõ vagy szintes adatok.";
$general_traffic_pay_type = "Kifizetés típusa";
$general_traffic_pay_level = "Jelenlegi kifizetési szint";
$general_notes_title = "Értesítések a rendszergazdáktól";
$general_notes_date = "Létrehozás dátuma";
$general_notes_to = "Címzett";
$general_notes_all = "Minden partner";
$general_notes_none = "Nincs megtekinthetõ értesítés";
$contact_left_column_title = "Kapcsolat";
$contact_left_column_text = "Probléma esetén nyugodtan vegye fel a kapcsolatot partnerprogramunk menedzserével a bal oldali ûrlapon.";
$contact_title = "Kapcsolat";
$contact_name = "Az Ön neve";
$contact_email = "E-mail címe";
$contact_message = "üzenet";
$contact_chars = "karakter helye van még";
$contact_button = "Üzenet elküldése";
$contact_received = "Megkaptuk az üzenetét, kérjük, várjon 24 órát a válaszig..";
$contact_invalid_name = "Érvénytelen név";
$contact_invalid_email = "Érvénytelen e-mail cím";
$contact_invalid_message = "Érvénytelen üzenet";
$invoice_button = "Számla";
$invoice_header = "PARTNER SZÁMLA";
$invoice_aff_info = "PARTNER INFORMÁCIÓ";
$invoice_co_info = "Információ";
$invoice_acct_info = "Fiókinformáció";
$invoice_payment_info = "Fizetési információ";
$invoice_comm_date = "Fizetés dátuma";
$invoice_comm_amt = "Járulék mennyisége";
$invoice_comm_type = "Járulék típusa";
$invoice_admin_note = "Rendszergazdai megjegyzés";
$invoice_footer = "SZÁMLA VÉGE";
$invoice_print = "Számla nyomtatása";
$invoice_none = "N/A";
$invoice_aff_id = "Affiliate ID";
$invoice_aff_user = "Felhasználónév";
$menu_pdf_marketing = "PDF marketing brosúrák";
$menu_pdf_training = "PDF oktató dokumentumok";
$marketing_target_url = "Cél URL";
$marketing_source_code = "Forráskód - Másolja ki és illessze be weboldalára";
$marketing_group = "Marketing csoport";
$peels_title = "Oldal-sarok neve";
$peels_view = "Oldal-sarok megtekintése";
$peels_description = "Oldal-sarok leírása";
$lb_head_title = "Szükséges HEAD kód a HTML-oldalhoz";
$lb_head_description = "Ahhoz, hogy lightbox-ot helyezzen el weboldalán, az alábbi sorokat kell hozzáadnia az azt megjeleníteni kívánt oldalak HEAD részében.";
$lb_head_source_code = "Másolja be ezt a kódot a HTML dokumentumának HEAD részébe.";
$lb_head_code_notes = "A lightbox-ok számától függetlenül elegendõ egyszer elhelyezni a kódot.";
$lb_head_tutorial = "Oktatóvideó megnézése";
$lb_body_title = "Lightbox neve";
$lb_body_description = "Lightbox leírása";
$lb_body_click = "A lightbox megtekintéséhez kattintson a fenti képre.";
$lb_body_source_code = "Másolja be az alábbi kódot HTML dokumentumán belül a BODY részlegben oda, ahol a képet szeretné látni..";
$pdf_title = "PDF";
$pdf_training = "Oktató dokumentumok";
$pdf_marketing = "Marketing brosúrák";
$pdf_description_1 = "A PDF formátumú marketing-anyagaink megtekintéséhez vagy nyomtatásához Adobe Reader-re van szüksége.";
$pdf_description_2 = "Az Adobe Reader ingyenesen letölthetõ az Adobe weboldalról.";
$pdf_file_name = "Fájlnév";
$pdf_file_size = "Fájl mérete";
$pdf_file_description = "Leírás";
$pdf_bytes = "Bájtok";
$menu_heading_training_materials = "Oktatóanyagok";
$menu_videos = "Oktatóvideók megtekintése";
$menu_custom_manual = "Kézikönyv az Egyéni követõ linkekhez";
$menu_page_peels = "Oldalsarkok";
$menu_lightboxes = "Lightbox-ok";
$menu_email_templates = "E-mail sablonok";
$menu_heading_custom_links = "Egyéni követõ linkek";
$menu_custom_reports = "Jelentések";
$menu_keyword_links = "Kulcsszó-követõ linkek";
$menu_subid_links = "Al-partner követõ linkek";
$menu_alteranate_links = "Alternatív bejövõ oldal-linkek";
$menu_heading_additional = "További eszközök";
$menu_drop_heading_stats = "Általános statisztikák";
$menu_drop_heading_commissions = "Járulékok";
$menu_drop_heading_history = "Fizetési elõzmények";
$menu_drop_heading_traffic = "Forgalmi napló";
$menu_drop_heading_account = "Fiókom";
$menu_drop_heading_logo = "Saját logó feltöltése";
$menu_drop_heading_faq = "GYIK";
$menu_drop_general_stats = "Általános statisztikák";
$menu_drop_tier_stats = "Szint statisztikák";
$menu_drop_current = "Jelenlegi járulékok";
$menu_drop_tier = "Jelenlegi szintes járulékok";
$menu_drop_pending = "Engedélyezésre várók";
$menu_drop_paid = "Fizetett járulékok";
$menu_drop_paid_rec = "Fizetett szintes járulékok";
$menu_drop_recurring = "Aktív ismétlõdõ járulékok";
$menu_drop_edit = "Fiók szerkesztése";
$menu_drop_password = "Jelszóváltoztatás";
$menu_drop_change = "Járulékos stílus megváltoztatása";
$account_hidden = "rejtett";
$keyword_title = "Egyéni kulcsszó-linkek";
$keyword_info = "Egyéni link létrehozásával Ön képes lesz követni a különbözõ forrásokból bejövõ forgalmat. Akár 4 különbözõ követési kulcsszóval készíthet linket, és az egyéni követési jelentésben részletesen kifejtve látha mindegyik kulcsszó adatait.";
$keyword_heading = "Elérhetõ változók az egyéni kulcsszavas követéshez";
$keyword_tracking = "Követési azonosító";
$keyword_build = "A linkjének elkészítéséhez vegye a következõ URL-t és a végét egészítse ki a Követési azonosítóval és a használni kívánt kulcsszóval..";
$keyword_example = "Példa";
$keyword_tutorial = "Oktatóvideó megtekintése";
$sub_tracking_title = "Al-partnerek követése";
$sub_tracking_info = "Egy alpartner-követõ linkkel a saját partnereinek adhatja tovább a linkjét. Tudni fogja, hogy ki generált járulékokat, mert jelentjük Önnek, hogy melyik al-partnere generálta az eladást. Egy további ok az alpartner-linkek használatára, ha Önnek van egy saját követõrendszere melyet a jelentésben látni akar.";
$sub_tracking_build = "Cserélje ki a  részt a partnerének ID számával. Ismételje ezt meg minden partnerével.";
$sub_tracking_example = "Példa";
$sub_tracking_tutorial = "Oktatóvideó megtekintése";
$sub_tracking_id = "Al-partner ID";
$alternate_title = "Alternatív bejövõ oldal-linkek";
$alternate_option_1 = "1. lehetõség: Automatikus link-lérehozás";
$alternate_heading_1 = "Automatikus link-lérehozás";
$alternate_info_1 = "Határozza meg a saját bejövõ forgalmát annak a weboldalnak az URL-jének megadásával, ahova a forgalmat szeretné irányítani. Mi készítünk Önnek egy linket. Ezzel a szolgáltatással egy rövidebb linket kap, melyben egy, az adatbázisunkban szereplõ azonosítószámmal van beágyazva az URL.";
$alternate_button = "Linkem elkészítése";
$alternate_links_heading = "Saját alternatív átirányító linkjeim";
$alternate_links_note = "A meglévõ linkek mûködõképesek maradnak, ha eltávolít innen egy saját linket.";
$alternate_links_remove = "eltávolítás";
$alternate_option_2 = "2. lehetõség: Kézi linkkészítés";
$alternate_info_2 = "Ha egyedi partner-linkeket használna az átirányítási linkjeihez, használja az alábbi formátumot..";
$alternate_variable = "Alternatív átirányító linkek változói";
$alternate_example = "Példa";
$alternate_build = "A linkjének elkészítéséhez vegye az alábbi URLt- és egészítse ki az Alternatív átirányítási linkkel, melyet használni kíván.";
$alternate_none = "Nem készített alternatív linkeket.";
$alternate_tutorial = "Oktatóvideó megtekintése";
$cr_title = "Egyedi kuclsszavak jelentései";
$cr_select = "Válasszon egy kulcsszót";
$cr_button = "Jelentés generálása";
$cr_no_results = "Nincsenek találatok a keresésre.";
$cr_no_results_info = "Próbálkozzon más kulcsszó-kombinációval";
$cr_used = "Használt kulcsszavak";
$cr_found = "Ezt a linket megtaláltuk";
$cr_times = "Ennyiszer";
$cr_unique = "Egyedi linkek megtalálva";
$cr_detailed = "Részletes Link-jelentés";
$cr_export = "Jelentés exportálása Excelbe";
$cr_none = "Nem találtunk kulcsszavakat";
$logo_title = "Töltse fel cégének logóját";
$logo_info = "Ha feltölti cégének logoját, az Ön által hozzánk irányított vásárlóknak megmutatjuk oldalunkon, ezzel személyesebbé téve ügyfeleinek élményét, amikor minket látogatnak.";
$logo_bullet_one = "A képek .jpg, .gif vagy .png formátumúak lehetnek. A Flash tartalom nem engedélyezett.";
$logo_bullet_two = "Az ízléstelen vagy szabályszegõ képeket töröljük, fiókját pedig felfüggesztjük.";
$logo_bullet_three = "A logóját vagy képét csak elõzetes elbírálás után jelenítjük meg.";
$logo_bullet_size_one = "A képek max szélessége ennyi lehet:";
$logo_bullet_size_two = "pixel, a max magasságuk pedig:";
$logo_bullet_req_size_one = "A képek max szélessége:";
$logo_bullet_req_size_two = "pixel, magassága pedig:";
$logo_bullet_pixels = "pixel.";
$logo_choose = "Válasszon képet";
$logo_file = "Válasszon fájlt:";
$logo_browse = "Böngészés...";
$logo_button = "Feltöltés";
$logo_current = "Jelenlegi képem";
$logo_remove = "eltávolítás";
$logo_display_status = "Kép állapota:";
$logo_pending = "Elbírálásra vár";
$logo_approved = "Engedélyezve";
$logo_success = "Sikeresen feltöltötte a képet, és elbírálásra vár.";
$signup_security_title = "Fiók ellenõrzése";
$signup_security_info = "Kérjük, írja be a dobozban látható biztonsági kódot. Ezzel akadályozzuk meg az automatikus feliratkozásokat.";
$signup_security_code = "Biztonsági kód";
$sub_tracking_none = "Nincs";
$missing_security_code = "Érvénytelen vagy hiányzó fiókkészítési/biztonsági kód";
$alternate_success_title = "Sikeres linkkészítés";
$alternate_success_info = "Fogja az alant lévõ linkjét és vigyen forgalmat a megadott URL-re.";
$alternate_failed_title = "Sikertelen linkkészítés";
$alternate_failed_info = "Kérjük, adjon meg egy érvényes URL-t.";
$logo_missing_filename = "Kérjük, válasszon egy fájlnevet.";
$logo_required_width = "A képszélesség ennyi kell legyen:";
$logo_required_height = "A képmagasság ennyi kell legyen:";
$logo_maximum_width = "A képszélesség csak ennyi lehet:";
$logo_maximum_height = "A képmagasság csak ennyi lehet:";
$logo_size_maximum = "A kép fájlmérete max ennyi lehet:";
$logo_bad_filetype = "Nem engedett képtípus. Csak a  .gif, .jpg és .png képek engedélyezettek.";
$logo_upload_error = "Sikertelen képfeltöltés, kérjük, lépjen kapcsolatba a partner-menedzserrel.";
$logo_error_title = "Sikertelen képfeltöltés";
$logo_error_bytes = "bájt.";
$excel_title = "Egyedi kulcsszó-linkek jelentése";
$excel_tab_report = "Egyedi kulcsszó-jelentés";
$excel_tab_logs = "Forgalmi naplók";
$excel_date = "Jelentés dátuma:";
$excel_affiliate = "Partner ID:";
$excel_criteria = "kulcsszó-link kritériuma";
$excel_link = "Link struktúrája";
$excel_hits = "Egyedi találatok";
$excel_comm_stats = "Járulékok statisztikái";
$excel_comm_current = "Jelenlegi járulékok";
$excel_comm_paid = "Fizetett járulékok";
$excel_comm_total = "Összes járulék";
$excel_comm_ratio = "Konverziós ráta";
$excel_earned = "Megkeresett járulékok";
$excel_earned_current = "Jelenlegi járulékok";
$excel_earned_paid = "Fizetett járulékok";
$excel_earned_total = "Összes megkeresett járulék";
$excel_earned_tab = "Kattintson a Forgalmi Napló fülre (alant), hogy megtekintse ennek az egyéni linknek az adatait.";
$excel_log_title = "Custom Keywords Traffic Log";
$excel_log_ip = "IP cím";
$excel_log_refer = "Referáló URL";
$excel_log_date = "Dátum";
$excel_log_time = "Idõ";
$excel_log_target = "Cél URL";
$etemplates_title = "E-mail sablonok";
$etemplates_view_link = "E-mail sablon megtekintése";
$etemplates_name = "Sablon neve";
$signup_maintenance_heading = "Karbantartási értesítõ";
$signup_maintenance_info = "Ideiglenesen szünetel a feliratkozás. Kérjük próbálja újra késõbb.";
$marketing_group_title = "Marketing csoport";
$marketing_button = "Megjelenítés";
$marketing_no_group = "Nincs kiválasztott csoport";
$marketing_choose = "Kérjük, válasszon egy marketing csoportot fentebb";
$marketing_notice = "Az egyes marketingcsoportoknak eltérõ forgalmú oldalaik lehetnek";
$canspam_heading = "CAN-SPAM szabályok";
$canspam_accept = "Elolvastam és megértettem a fenti CAN-SPAM szabályokat és feltételeket, és beleegyezek.";
$canspam_error = "Nem fogadta el a CAN-SPAM szabályokat.";
$signup_banned = "Hiba történt a fiók létrehozása során. Kérjük, lépjen kapcsolatba a rendszergazdával további tudnivalókért.";
$header_testimonials = "Partnereink ajánlásai";
$testi_visit = "Weboldal meglátogatása";
$testi_description = "Kínáljon fel egy hiteles ajánlást a partnerprogramunkra vonatkozóan, és mi elhelyezzük azt az Ajánlások oldalon &lt;a href=&quot;testimonials.php&quot;&gt;testimonials&lt;/a&gt; az Ön weboldalára mutató linkkel együtt.";
$testi_name = "Név";
$testi_url = "Weboldal URL-je";
$testi_content = "Ajánlás";
$testi_code = "Biztonsági kód";
$testi_submit = "Ajánlás beküldése";
$testi_na = "Az ajánlások épp nem érhetõk el.";
$testi_title = "Ajánlás kínálása";
$testi_success_title = "Sikeres ajánlás";
$testi_success_message = "Köszönjük, hogy beküldött egy ajánlást. Hamarosan megvizsgálja csapatunk.";
$testi_error_title = "Sikertelen ajánlás";
$testi_error_name_missing = "Kérjük, adja meg nevét az ajánláshoz.";
$testi_error_url_missing = "Kérjük, adja meg weboldalának URL-jét az ajánláshoz.";
$testi_error_missing = "Kérjük, szöveget is írjon az ajánláshoz.";
$menu_drop_delayed = "Késlekedõ járulékok";
$details_drop_6 = "Jelenleg késlekedõ járulékok";
$details_type_6 = "Késésben - hamarosan engedélyezve";
$comdetails_status_6 = "Késésben - hamarosan engedélyezve";
$tc_reaccept_title = "Értesítés a felhasználási feltételek változásáról";
$tc_reaccept_sub_title = "El kell fogadnia az új felhasználási feltételeket, hogy hozzáférjen fiókjához.";
$tc_reaccept_button = "Elolvastam és megértettem a felhasználási szabályokat, és beleegyezek.";
$tlinks_active = "Aktív szintek száma";
$tlinks_payout_structure = "Szintek kifizetési struktúrája";
$tlinks_level = "Szint";
$tierText1 = "% kiszámítva a hivatkozó partner járulékaiból.";
$tierText2 = "% kiszámítva a felsõbb szintûek járulékaiból.";
$tierText3 = "% kiszámítva az eladási mennyiségbõl.";
$tierTextflat = "alap ár.";
$edit_custom_button = "Válasz szerkesztése";
$private_heading = "Magánjelentkezés";
$private_info = "A partnerprogramunk nem nyitott a nagyközönség számára. Csak regisztrációs kóddal regisztrálhat. Itt találhat információt, hogyan szerezzen regisztrációs kódot.";
$private_required_heading = "Regisztrációs kód szükséges";
$private_code_title = "Regisztrációs kód beírása";
$private_button = "Kód beküldése";
$private_error_title = "Érvénytelen regisztrációs kódot használt";
$private_error_invalid = "A megadott regisztrációs kód érvénytelen..";
$private_error_expired = "A megadott regisztrációs kód már érvénytelen, mert lejárt.";
$qr_code_title = "QR kódok";
$qr_code_size = "QR kód mérete";
$qr_code_button = " QR kód megjelenítése";
$qr_code_offline_title = "Offline Marketing";
$qr_code_offline_content1 = "Helyezze el ezt a QR kódot a marketing brosúráin, röplapjain, névjegykártyáján stb.";
$qr_code_offline_content2 = "- Jobb kattintás a képre és  &lt;strong&gt;mentés másként-al küldje a&lt;/strong&gt; számítógépére.";
$qr_code_online_title = "Online Marketing";
$qr_code_online_content = "Helyezze el ezt a QR kódot a weboldalán, közösségi médián, blogján stb.";
$menu_coupon = "Kuponkódok";
$coupon_title = "Az elérhetõ kuponkódjai";
$coupon_desc = "Ossza szét ezeket a kuponkódokat, és jutalékot kap minden alkalommal, amikor valaki használja õket!!";
$coupon_head_1 = "Kuponkód";
$coupon_head_2 = "Kedvezmény a vásárlónak";
$coupon_head_3 = "Járulék mennyisége";
$coupon_sale_amt = "az eladások számából";
$coupon_flat_rate = "átalánydíj";
$coupon_default = "Alap kifizetési szint";
$cc_vanity_title = "Személyre szabott kuponkód igénylése";
$cc_vanity_field = "Kuponkód";
$cc_vanity_button = "Kuponkód igénylése";
$cc_vanity_error_missing = "<strong>Hiba!</strong> Kérjük írjon be egy kuponkódot.";
$cc_vanity_error_exists = "<strong>Hiba!</strong> Már igényelte ezt a kódot, és elbírálás alatt áll.";
$cc_vanity_error = "<strong>Hiba!</strong> Érvénytelen kuponkód. Csak betûket, számokat és alsóvonást használjon.";
$cc_vanity_success = "<strong>Siker!</strong> A személyre szabott kuponkódját megigényelte.";
$coupon_none = "Jelenleg nincsenek elérhetõ kuponkódok.";
$pic_error_title = "Sikertelen képfeltöltés";
$pic_missing = "Kérjük válasszon egy fájlnevet.";
$pic_invalid = "Nem engedélyezett képtípus. A képek .jpg, .gif vagy .png formátumúak lehetnek.";
$pic_error = "Sikertelen képfeltöltés, kérjük, lépjen kapcsolatba a partner-menedzserrel.";
$pic_success = "A képet sikeresen feltöltötte.";
$pic_title = "Kép feltöltése";
$pic_info = "Kép feltöltésével minket segít, hogy személyesebre szabjuk az Ön élményét nálunk.";
$pic_bullet_1 = "A képek .jpg, .gif vagy .png formátumúak lehetnek.";
$pic_bullet_2 = "Az ízléstelen vagy szabályszegõ képeket töröljük, fiókját pedig felfüggesztjük.";
$pic_bullet_3 = "A képet nem mutatjuk nyilvánosan. Csak mi látjuk a fiókjának adataihoz csatolva.";
$pic_file = "Válasszon fájlt:";
$pic_button = "Feltöltés";
$pic_current = "Jelenlegi képem";
$pic_remove = "Kép eltávolítása";
$progress_title = "Jogosultság a következõ kifizetésre:";
$progress_complete = "teljesítve.";
$progress_none = "Nincs nálunk minimum kifizetési összeg.";
$progress_sentence_1 = "Keresett";
$progress_sentence_2 = "ennyit";
$progress_sentence_3 = "követelménybõl.";
$aff_lib_button = "<b>Szerezzen ingyenes hozzáférést!</b><BR />www.AffiliateLibrary.com";
$menu_announcements = "Közösségi média kampányok";
$announcements_name = "Kampány neve";
$announcements_facebook_message = "Facebook üzenet";
$announcements_twitter_message = "Twitter üzenet";
$announcements_facebook_link = "Facebook Link";
$announcements_facebook_picture = "Facebook kép";
$general_last_30_days_activity = "Utolsó 30 napi tevékenységek";
$general_last_30_days_activity_traffic = "Forgalom";
$general_last_30_days_activity_commissions = "Járulékok";
$accountability_title = "Felelõsség és kommunikáció";
$accountability_text = "<strong>Mi ez?</strong><p>proaktívan igyekszünk bizalmat építeni partnereinkkel. Célunk, hogy minden megadott vagy megtagadott járulékról a lehetõ legtöbb információt biztosítsuk.</p><strong>Kommunikáció</strong><p>Minden megtagadott járulékról tudunk részleteket szolgáltatni. Komolyan vesszük a partnereinkkel való kommunikációt, és bátorítjuk kérdéseiket, visszajelzéseiket.</p>";
$debit_reason_0 = "Nincs";
$debit_reason_1 = "Visszatérítés";
$debit_reason_2 = "Elszámolás";
$debit_reason_3 = "Jelentett csalás";
$debit_reason_4 = "Visszavont rendelés";
$debit_reason_5 = "Részleges visszatérítés";
$menu_drop_pending_debits = "Folyamatban lévõ tartozások";
$debit_amount_label = "Tartozás mennyisége";
$debit_date_label = "Tartozás dátuma";
$debit_reason_label = "Tartozás oka";
$debit_paragraph = "A tartozásait a következõ kifizetésébõl vonjuk le.";
$debit_invoice_amount = "Tartozások nélküli összeg";
$debit_revised_amount = "Összeg a tartozás levonása után";
$mv_head_description = "Megj.: Oldalanként csak egy videót helyezhet el a weboldalán.";
$mv_head_source_code = "Másolja be az alábbi kódot a HTML dokumentumának HEAD részébe.";
$mv_body_title = "Videó címe";
$mv_body_description = "leírás";
$mv_body_source_code = "Másolja be az alábbi kódot a HTML dokumentumának BODY részén belül oda, ahol a videót kívánja megjeleníteni.";
$menu_marketing_videos = "Videók";
$mv_preview_button = "Videó elõnézete";
$dt_no_data = "A táblában nincs elérhetõ adat.";
$dt_showing_exists = "Ezeket a bejegyzéseket mutatjuk _START_ - _END_ a _TOTAL_ bejegyzésbõl.";
$dt_showing_none = "Ezeket a bejegyzéseket mutatjuk 0 - 0 a 0 bejegyzésbõl.";
$dt_filtered = "(szûrve a _MAX_ összes bejegyzésbõl)";
$dt_length_choice = "Mutassa a _MENU_ bejegyzéseket.";
$dt_loading = "Betöltés...";
$dt_processing = "Feldolgozás...";
$dt_no_records = "Nincsenek egyezõ találatok.";
$dt_first = "Elsõ";
$dt_last = "Utolsó";
$dt_next = "Következõ";
$dt_previous = "Elõzõ";
$dt_sort_asc = ": aktiválja az oszlop emelkedõ sorrendbe helyezéséhez";
$dt_sort_desc = ": aktiválja az oszlop csökkenõ sorrendbe helyezéséhez";
$choose_marketing_group = "Válasszon egy marketing-csoportot";
$email_already_used_1 = "Fiók nem készíthetõ el. Csak";
$email_already_used_2 = "fiókot lehet";
$email_already_used_3 = "készíteni egy e-mail címmel.";
$missing_fax = "Kérjük adja meg a fax-számát.";
$chart_last_6_months = "Utolsó 6 hónap kifizetett járulékai";
$chart_last_6_months_paid = "Kifizetett járulékok";
$chart_this_month = "A top 5 partnerünk jelen hónapban";
$chart_this_month_none = "Nincs megjeleníthetõ adat.";
$login_return = "Vissza a Partner kezdõlapra";
$login_lost_details = "Adja meg a felhasználónevét és e-mailben elküldjük a bejelentkezési adatait.";
$account_edit_general_prefs = "Általános preferenciák";
$account_edit_email_language = "E-mailek nyelve";
$footer_connect = "Kapcsolat velünk";
$modal_close = "Bezárás";
$vat_amount_heading = "ÁFA mennyiség";
$menu_logout = "Kijelentkezés";
$menu_upload_picture = "Kép feltöltése";
$menu_offer_testi = "Ajánlat beküldése";
$fb_login = "Bejelentkezés Facebook-kal";
$fb_permissions = "Engedélyek megtagadva. Kérjük, engedélyezze, hogy a weboldal használja az e-mail címét.";
$announcements_published = "Bejelentés közzétéve";
$training_videos_title = "Oktatóvideók";
$training_videos_general = "Általános Marketing";
$commission_method = "Jutalékolási módszer";
$how_will_you_earn = "Hogyan kapja meg jutalékát?";
$pm_account_credit = "Fiókját kedvezményezzük a megkeresett jutalékokkal.";
$pm_check_money_order = "Csekket vagy pénzutalványt postázunk.";
$pm_paypal = "PayPal-on keresztül fizetünk.";
$pm_stripe = "Stripe-on keresztül fizetünk.";
$pm_wire = "Banki utalással fizetünk.";
$add_to_signup_left_column_text = "<span style=\"color:#CC0000; font-style:italic;\">* a kötelező mezőket jelöli.</span>";
$paypal_email = "Paypal E-mail";
$stripe_acct_details = "Stripe fiók részletei";
$stripe_connect = "Regisztráció után csatlakoztathatja Stripe fiókját a Fiókbeállítások menüben.";
$stripe_success = "Stripe fiók sikeresen csatlakoztatva";
$stripe_settings = "Stripe beállítások";
$stripe_connect_edit = "Csatlakoztatás Stripe-hoz";
$stripe_delete = " Stripe fiók eltávolítása";
$stripe_confirm = "Biztosan eltávolítja ezt a fiókot?";
$payment_settings = "Fizetési beállítások";
$edit_payment_settings = " Fizetési beállítások szerkesztése";
$invalid_paypal_address = "Érvénytelen PayPal e-mail cím.";
$payment_method_error = "Kérjük, válasszon fizetési módot.";
$payment_settings_updated = "Fizetési mód beállítva.";
$stripe_removed = "Stripe fiók eltávolítva.";
$payment_settings_success = "Siker!";
$payment_update_notice_1 = "Figyelem!";
$payment_update_notice_2 = "Úgy döntött, hogy <strong>[payment_option_here]</strong> fizetséget venne fel tőlünk. Kérjük <a href=\"account.php?page=48\" style=\"font-weight:bold;\">kattintson ide</a>, hogy összekapcsolja velünk a <strong>[payment_option_here]</strong> fiókját.";
$pm_title_credit = "Számlaegyenleg";
$pm_title_mo = "Csekk/Készpénzes fizetés";
$pm_title_paypal = "PayPal";
$pm_title_stripe = "Stripe";
$pm_title_wire = "Banki átutalás";
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