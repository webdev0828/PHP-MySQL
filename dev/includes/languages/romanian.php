<?PHP

//-------------------------------------------------------
	  $language_pack_name = "romanian";
	  $language_pack_table_name = "romanian";
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
$header_title = "Program afiliat";
$header_indexLink = "Casă afiliată";
$header_signupLink = "Înregistează-te acum";
$header_accountLink = "Administrare cont";
$header_emailLink = "Contactează-ne";
$header_greeting = "Bun venit";
$header_nonLogged = "Invitat";
$header_logout = "Deconectare aici";
$footer_tag = "Software afiliat de către iDevAffiliate";
$footer_copyright = "Copyright";
$footer_rights = "Toate drepturile rezervate";
$index_heading_1 = "Bun venit la Programul nostru de Afilieri!";
$index_paragraph_1 = "Înscrierea la programul nostru este gratuită, este ușor să te înregistrezi și nu sunt necesare cunoștințe tehnice. Programele de afiliere sunt ceva obișnuit pe internet și oferă proprietarilor de website-uri o cale suplimentară pentru a avea profit de pe urma website-urilor. Afiliațiile generează trafic și vânzări pentru website-uri comerciale și, în schimb, se primește un comision.";
$index_heading_2 = "Cum funcționează?";
$index_paragraph_2 = "Atunci când te alături programului nostru de afilieri, ți se va oferi o gamă de bannere și link-uri cu text pe care le poți pune pe website-ul tău. Atunci când un utilizator dă click pe unul din link-urile tale, wi vor fi trimiși către website-ul nostru, iar activitatea lor va fi urmărită de către softwareul nostru de afiliere. Iar tu vei câștiga un comision în funcție de tipul tău de comision.";
$index_heading_3 = "Statistici și raportări în timp real!";
$index_paragraph_3 = "Conectează-te 24 de ore pe zi pentru a verifica vânzările, traficul, soldul contului și pentru a vedea performanța bannerelor tale.";
$index_login_title = "Înregistrare afiliat";
$index_login_username = "Nume de utilizator";
$index_login_password = "Parola";
$index_login_username_field = "nume de utilizator";
$index_login_password_field = "parola";
$index_login_button = "Înregistrare";
$index_login_signup_link = "Click Aici pentru Înscriere";
$index_table_title = "Detalii Program";
$index_table_commission_type = "Tip de comision";
$index_table_initial_deposit = "Sold inițial";
$index_table_requirements = "Cerințe de plată";
$index_table_duration = "Durată plată";
$index_table_choose = "Alege din următoarele opțiuni de plată!";
$index_table_sale = "Plată-Pe-Vânzare";
$index_table_click = "Plată-Pe-Click";
$index_table_sale_text = "pentru fiecare vânzare pe care o aduci.";
$index_table_click_text = "pentru fiecare click pe care îl aduci.";
$index_table_deposit_tag = "Numai pentru înregistrare!";
$index_table_requirements_tag = "Sold minim necesar pentru plată.";
$index_table_duration_tag = "Plățile sunt făcute o dată pe lună, pentru luna anterioară.";
$signup_left_column_text = "Alătură-te programului nostru de afilieri și începe să câștigi bani pentru fiecare vânzare pe care o trimiți către noi! Creați-vă un profil, plasați codul link-ului de afiliat în website și observă cum crește soldul contului pe parcurs ce vizitatorii tăi devin clienții noștri.";
$signup_left_column_title = "Bun venit, Afiliat!";
$signup_login_title = "Creează cont";
$signup_login_username = "Nume de utilizator";
$signup_login_password = "Parola";
$signup_login_password_again = "Parola din nou";
$signup_login_minmax_chars = "- Numele de utilizator trebuie să aibă minim user_min_chars caractere.&lt;br /&gt;- Numele de utilizator poate fi alfa-numeric.&lt;br /&gt;- Numele de utilizator poate conține aceste caractere: _ (numai liniuțe de subliniere)&lt;br /&gt;&lt;br /&gt;- Parola trebuie să aibă minim pass_min_chars caractere.&lt;br /&gt;- Parola poate fi alfa-numerică.&lt;br /&gt;- Parola poate conține aceste caractere:  characters_allowed";
$signup_login_must_match = "Câmpul Parolă trebuie să se potrivească cu acest câmp.";
$signup_standard_title = "Informație standard";
$signup_standard_email = "Adresă e-mail";
$signup_standard_company = "Nume Companie";
$signup_standard_checkspayable = "Adresați plățile către";
$signup_standard_weburl = "Adresă website";
$signup_standard_taxinfo = "ID taxă, SSN sau TVA";
$signup_personal_title = "Informații personale";
$signup_personal_fname = "Prenume";
$signup_personal_state = "Stat sau provincie";
$signup_personal_lname = "Nume";
$signup_personal_phone = "Număr de telefon";
$signup_personal_addr1 = "Adresă";
$signup_personal_fax = "Număr fax";
$signup_personal_addr2 = "Adresă adițională";
$signup_personal_zip = "Cod poștal";
$signup_personal_city = "Oraș";
$signup_personal_country = "Țară";
$signup_commission_title = "Plată comision";
$signup_commission_howtopay = "Cum să te plătim?";
$signup_commission_style_PPS = "Plată-Pe-Vânzare";
$signup_commission_style_PPC = "Plată-Pe-Click";
$signup_terms_title = "Termeni și Condiții";
$signup_terms_agree = "Am citit, am înțeles și sunt de acord cu termenii și condițiile de mai sus.";
$signup_page_button = "Creare Cont";
$signup_success_email_comment = "Ți-am trimis un e-mail cu numele de utilizator și parola.<BR />\r\nAr trebui să îl păstrezi la loc sigur pentru viitoare referințe.";
$signup_success_login_link = "Conectare cont";
$custom_fields_title = "Câmpuri definite de utilizator";
$logout_msg = "<b>Acum ești deconectat</b><BR />Îți mulțumim pentru participarea la programul nostru de afilieri.";
$signup_page_success = "Contul tău a fost creat";
$login_left_column_title = "Conectare Cont";
$login_left_column_text = "Introdu numele de utilizator și parola pentru a avea acces la statisticile, bannerele, link-ul codului contului tău, întrebări frecvente și multe altele.<BR/ ><BR/ >Dacă nu îți amintești parola, introdu numele de utilizator și îți vom trimite informațiile de conectare pe e-mail.<BR /><BR />";
$login_title = "Conectare Cont";
$login_username = "Nume de utilizator";
$login_password = "Parolă";
$login_invalid = "Conectare invalidă";
$login_now = "Conectare la cont";
$login_send_title = "Ai nevoie de o nouă parolă?";
$login_send_username = "Nume de utilizator";
$login_send_info = "Detalii de conectare trimise prin e-mail";
$login_send_pass = "Trimis prin e-mail";
$login_send_bad = "Nu s-a găsit numele de utilizator";
$help_new_password_heading = "Parolă nouă";
$help_new_password_info = "Parola trebuie să aibă cel puțin pass_min_chars caractere în lungime. Poate conține numai litere, numere și următoarele caractere:  characters_allowed";
$help_confirm_password_heading = "Confirmă noua parolă";
$help_confirm_password_info = "Această parolă trebuie să fie la fel cu intrarea Parolă nouă.";
$help_custom_links_heading = "Urmărire parolă";
$help_custom_links_info = "Cuvântul cheie nu trebuie să aibă mai mult de 30 de caractere în lungime. Poate conține numai litere, cifre și cratime.";
$error_title = "Următoarele erori au fost detectate";
$username_invalid = "Nume de utilizator invalid. Poate să conțină numai litere, numere și liniuță de subliniere.";
$username_taken = "Numele de utilizator ales a fost deja repartizat.";
$username_short = "Numele de utilizator este prea scurt, trebuie să aibă minim user_min_chars caractere în lungime.";
$username_long = "Numele de utilizator este prea lung, trebuie să aibă maxim user_max_chars caractere în lungime.";
$password_invalid = "Parolă invalidă. Poate să conțină numai litere, numere și următoarele caractere:  characters_allowed";
$password_short = "Parola ta este prea scurtă, trebuie să aibă cel puțin pass_min_chars caractere în lungime.";
$password_long = "Parola ta este prea lungă, trebuie să aibă maxim pass_max_chars caractere în lungime.";
$password_mismatch = "Parolele nu se potrivesc.";
$missing_checks = "Te rugăm, introdu un nume de beneficiar pentru a putea încasa câștigurile.";
$missing_tax = "Te rugăm, introdu informațiile legate de ID taxă, SSN sau TVA.";
$missing_fname = "Te rugăm, introdu prenumele.";
$missing_lname = "Te rugăm, introdu numele de familie.";
$missing_email = "Te rugăm, introdu adresa de e-mail.";
$invalid_email = "Adresa ta de e-mail este invalidă.";
$missing_address = "Te rugăm, introdu adresa străzii.";
$missing_city = "Te rugăm, introdu orașul.";
$missing_company = "Te rugăm, introdu numele companiei.";
$missing_state = "Te rugăm, introdu statul sau provincia.";
$missing_zip = "Te rugăm, introdu codul poștal.";
$missing_phone = "Te rugăm, introdu numărul de telefon.";
$missing_website = "Te rugăm, introdu adresa website-ului tău.";
$missing_paypal = "Ai ales să primești plăți prin PayPal, te rugăm, introdu contul tău PayPal.";
$missing_terms = "Nu ai acceptat termenii și condițiile.";
$paypal_required = "E necesar un cont PayPal pentru plată.";
$missing_custom = "Te rugăm, completează câmpul numit:";
$account_total_transactions = "Tranzacții totale";
$account_standard_linking_code = "Cod Standard de Afiliere - ușor de utilizat în e-mailuri!";
$account_copy_paste = "Copiază/Lipește codul de mai sus în website-ul sau e-mailurile tale";
$account_not_approved = "Contul tău așteaptă aprobarea";
$account_suspended = "Contul tău este momentan suspendat";
$account_standard_earnings = "Câștiguri standard";
$account_inc_bonus = "include bonus";
$account_second_tier = "Câștiguri pe niveluri";
$account_recurring = "Câștiguri recurente";
$account_not_available = "N/A";
$account_earned_todate = "Total câștigat până la data";
$menu_heading_overview = "Sumar cont";
$menu_general_stats = "Statistici generale";
$menu_tier_stats = "Statistici niveluri";
$menu_payment_history = "Istoric plăți";
$menu_commission_details = "Detalii comision";
$menu_recurring_commissions = "Comisioane recurente";
$menu_traffic_log = "Jurnal al traficului de intrare";
$menu_heading_marketing = "Materiale marketing";
$menu_banners = "Bannere";
$menu_text_ads = "Text Anunțuri";
$menu_text_links = "Link-uri Text";
$menu_email_links = "Link-uri e-mail";
$menu_html_links = "HTML Anunțuri";
$menu_offline = "Marketing offline";
$menu_tier_linking_code = "Cod de afiliere pe niveluri";
$menu_email_friends = "E-mail prieteni &amp; asociați";
$menu_custom_links = "Construiește &amp; Urmărește-ți propriile link-uri";
$menu_heading_management = "Administrare cont";
$menu_comalert = "Setare ComisioaneAlertă";
$menu_comstats = "Setare ComisioaneStatistici";
$menu_edit_account = "Editare cont";
$menu_change_pass = "Schimbă parola";
$menu_change_commission = "Schimbă tipul de comision";
$menu_heading_general_info = "Informații generale";
$menu_browse_affiliates = "Caută alți afiliați";
$menu_faq = "Întrebări frecvente";
$suspended_title = "Status alertă cont";
$suspended_heading = "Contul tău este în prezent suspendat";
$suspended_notes = "Notițe administrator";
$pending_title = "Status alertă cont";
$pending_heading = "Contul tău așteaptă în prezent aprobarea";
$pending_note = "Odată ce v-am aprobat contul, materialele de marketing vor fi disponibile.";
$faq_title = "Întrebări frecvente";
$faq_none = "Nicio întrebare frecventă încă";
$browse_title = "Caută alți afiliați";
$browse_none = "Niciun alt afiliat de văzut";
$change_comm_title = "Schimbă tipul de comision";
$change_comm_curr_comm = "Tip de comision actual";
$change_comm_curr_pay = "Nivel de plăți curente";
$change_comm_new_comm = "Tip de comision nou";
$change_comm_warning = "Dacă schimbi tipul de comision, contul tău se va reseta la nivelul 1 de plăți";
$change_comm_button = "Schimbă tipul de comision";
$change_comm_no_other = "Nu există alte tipuri de comisioane disponibile";
$change_comm_level = "Nivel";
$change_comm_updated = "Tip de comision actualizat";
$password_title = "Schimbare parolă";
$password_old_password = "Parolă veche";
$password_new_password = "Parolă nouă";
$password_confirm_password = "Confirmă parola nouă";
$password_button = "Schimbă parola";
$password_warning_old_missing = "Parola veche este incorectă sau lipsește";
$password_warning_new_missing = "Parola nouă lipsește";
$password_warning_mismatch = "Parola nouă nu se potrivește";
$password_warning_invalid = "Parolă invalidă - click pe link-ul de ajutor";
$password_notice = "Parolă actualizată";
$edit_failed = "Actualizare eșuată - vezi erorile de mai sus";
$edit_success = "Cont actualizat";
$edit_button = "Editare cont";
$commissionstats_title = "Setare Statistici Comisioane";
$commissionstats_info = "Instalând Statisticile Comisioanelor, îți poți verifica statisticile instant, direct de pe ecranul Windows al calculatorului! Pentru a instala această caracteristică, descarcă pachetul de Statistici Comisioane <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>unzip</b></a> pe calculator și apoi rulează fișierul <b>setup.exe</b>. Când vi se solicită informațiile de conectare, introduceți următoarele detalii.";
$commissionstats_hint = "Sugestie: Copiază & lipește fiecare intrare, pentru a asigura acuratețea";
$commissionstats_profile = "Nume Profil";
$commissionstats_username = "Nume de utilizator";
$commissionstats_password = "Parolă";
$commissionstats_id = "ID afiliat";
$commissionstats_source = "Sursă URL";
$commissionstats_download = "Descarcă Statistici Comisioane";
$commissionalert_title = "Setare Alertă Comisioane";
$commissionalert_info = "Instalând Alertă Comisioane, îți vom trimite o notificare instantă a comisioanelor tale, direct pe ecranul tău Windows! Pentru a instala această caracteristică, descarcă pachetul de Alertă Comisioane <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>unzip</b></a> pe calculator și apoi rulează fișierul <b>setup.exe</b>. Când vi se solicită informațiile de conectare, introduceți următoarele detalii.";
$commissionalert_hint = "Sugestie: Copiază & lipește fiecare intrare, pentru a asigura acuratețea";
$commissionalert_profile = "Nume Profil";
$commissionalert_username = "Nume de utilizator";
$commissionalert_password = "Parolă";
$commissionalert_id = "ID afiliat";
$commissionalert_source = "Sursă URL";
$commissionalert_download = "Descarcă Alertă Comisioane";
$offline_title = "Marketing offline";
$offline_paragraph_one = "Câștigă bani promovându-ne (offline) website-ul prietenilor și asociaților tăi!";
$offline_send = "Trimite clienți către";
$offline_page_link = "vizualizare pagină";
$offline_paragraph_two = "Clienții tăi vor introduce <b>numărul tău ID afiliat</b> în căsuța din susul paginii, care te va înregistra ca afiliat pentru fiecare achiziție pe care aceștia o fac.";
$banners_title = "Bannere";
$banners_size = "Dimensiune banner";
$banners_description = "Descriere banner";
$ad_title = "Text Anunțuri";
$ad_info = "Utilizând codul de afiliere oferit, poți ajusta schema de culori, înălțimea și lățimea textului anunțului.";
$links_title = "Nume Link-uri";
$email_title = "E-mail Link-uri";
$email_group = "Grup marketing";
$email_button = "Afișează e-mail Link-uri";
$email_no_group = "Niciun grup selectat";
$email_choose = "Te rugăm, alege un grup de marketing de mai sus";
$email_notice = "Grupurile de marketing pot avea pagini cu trafic de intrare diferit";
$email_ascii = "<b>ASCII/Versiune Text</b> - de folosit în texte simple pentru e-mail.";
$email_html = "<b>Versiune HTML</b> - de folosit în e-mailurile HTML formatate.";
$email_test = "Link Test";
$email_test_info = "Aici vor fi trimiși clienții tăi către website-ul nostru.";
$email_source = "Cod sursă - Copiază/Lipește în mesajul de e-mail";
$html_title = "Nume Anunț HTML";
$html_view_link = "Vizualizează acest anunț HTML";
$traffic_title = "Jurnal trafic de intrare";
$traffic_display = "Afișează ultimul";
$traffic_display_visitors = "Vizitatori";
$traffic_button = "Vizualizează jurnal trafic";
$traffic_title_details = "Detalii trafic de intrare";
$traffic_ip = "Adresă IP";
$traffic_refer = "URL de referire";
$traffic_date = "Data";
$traffic_time = "Ora";
$traffic_bottom_tag_one = "Afișează ultimul";
$traffic_bottom_tag_two = "din";
$traffic_bottom_tag_three = "Total vizitatori unici";
$traffic_none = "Nu există jurnale de trafic";
$traffic_no_url = "N/A - Posibil marcaj sau link e-mail";
$traffic_box_title = "Completează URL de referire";
$traffic_box_info = "Click pe link pentru a vizita pagina";
$payment_title = "Istoric plăți";
$payment_date = "Dată plată";
$payment_commissions = "Comisioane";
$payment_amount = "Sumă plată";
$payment_totals = "Total";
$payment_none = "Nu există istoric al plăților";
$tier_stats_title = "Statistici nivel";
$tier_stats_accounts = "Nivel conturi direct sub tine";
$tier_stats_grab_link = "Ia-ți codul de afiliere pe nivel";
$tier_stats_none = "Nu există conturi de afiliere";
$tier_stats_username = "Nume de utilizator";
$tier_stats_current = "Comisioane actuale";
$tier_stats_previous = "Plăți anterioare";
$tier_stats_totals = "Total";
$recurring_title = "Comisioane recurente";
$recurring_none = "Nu există comisioane recurente";
$recurring_date = "Dată comision";
$recurring_status = "Status recurent";
$recurring_payout = "Următoarea plată";
$recurring_amount = "Sumă";
$recurring_every = "Fiecare";
$recurring_in = "în";
$recurring_days = "zile";
$recurring_total = "total";
$tlinks_title = "Adaugă pe alții la nivelul tău și câștigă bani și prin ei!";
$tlinks_embedded_one = "Înregistrarea la nivelul de creditare este deja activă în link-ul standard de afiliat!";
$tlinks_embedded_two = "Folosind sistemul de niveluri ți se oferă posibilitatea să promovezi programul nostru de afiliere către alți oameni. Vei deveni nivelul de sus pentru fiecare persoană care se alătură programului nostru de afilieri prin link-ul tău special de recomandare de mai jos. Poți găsi mai jos informații despre cât poți câștiga.";
$tlinks_embedded_current = "Plată nivel actual";
$tlinks_forced_two = "Folosind sistemul de niveluri ți se oferă posibilitatea să promovezi programul nostru de afiliere către alți oameni. Vei deveni nivelul de sus pentru fiecare persoană care se alătură programului nostru de afilieri prin link-ul tău special de recomandare de mai jos. Poți găsi mai jos informații despre cât poți câștiga.";
$tlinks_forced_code = "Link de recomandare nivel";
$tlinks_forced_paste = "Copiază/Lipește codul de mai sus pe website-ul tău";
$tlinks_forced_money = "Administratorii website-urilor câștigă bani aici!";
$comdetails_title = "Detalii comision";
$comdetails_date = "Dată comision";
$comdetails_time = "Oră comision";
$comdetails_type = "Tip de comision";
$comdetails_status = "Status actual";
$comdetails_amount = "Sumă comision";
$comdetails_additional_title = "Detalii suplimentare comision";
$comdetails_additional_ordnum = "Număr de ordine";
$comdetails_additional_saleamt = "Sumă vânzare";
$comdetails_type_1 = "Bonus comision";
$comdetails_type_2 = "Comision recurent";
$comdetails_type_3 = "Comision de nivel";
$comdetails_type_4 = "Comision standard";
$comdetails_status_1 = "Plătit";
$comdetails_status_2 = "Aprobat - Plată în așteptare";
$comdetails_status_3 = "Aprobare în așteptare";
$comdetails_not_available = "N/A";
$details_title = "Detalii comision";
$details_drop_1 = "Comisioane standard actuale";
$details_drop_2 = "Comisioane de nivel actuale";
$details_drop_3 = "Comisioane care așteaptă aprobarea";
$details_drop_4 = "Comisioane de plată standard";
$details_drop_5 = "Comisioane de nivel plătite";
$details_button = "Vizualizare comisioane";
$details_date = "Data";
$details_status = "Status";
$details_commission = "Comision";
$details_details = "Vizualizare detalii";
$details_type_1 = "Plătit";
$details_type_2 = "Așteaptă aprobare";
$details_type_3 = "Aprobat - Plată în așteptare";
$details_none = "Niciun comision de vizualizat";
$details_no_group = "Niciun grup de comisioane selectat";
$details_choose = "Te rugăm, alege un grup de comision de mai sus";
$general_title = "Comisioane actuale - de la ultima plată până la zi";
$general_transactions = "Tranzacții";
$general_earnings_to_date = "Câștiguri la zi";
$general_history_link = "Vizualizare istoric plăți";
$general_standard_earnings = "Câștiguri standard";
$general_current_earnings = "Câștiguri actuale";
$general_traffic_title = "Statistici trafic";
$general_traffic_visitors = "Vizitatori";
$general_traffic_unique = "Vizitatori unici";
$general_traffic_sales = "Vânzări aprobate";
$general_traffic_ratio = "Raport vânzări";
$general_traffic_info = "Aceste statistici nu includ comisioane recurente sau de nivel.";
$general_traffic_pay_type = "Tip de plată";
$general_traffic_pay_level = "Nivel actual de plată";
$general_notes_title = "Notițe de la administrator";
$general_notes_date = "Creare la data";
$general_notes_to = "la";
$general_notes_all = "Toți afiliații";
$general_notes_none = "Nicio notiță de vizualizat";
$contact_left_column_title = "Contactează-ne";
$contact_left_column_text = "Te rugăm să contactezi administratorul nostru afiliat folosind formularul din dreapta.";
$contact_title = "Contactează-ne";
$contact_name = "Numele tău";
$contact_email = "Adresa ta de e-mail";
$contact_message = "Mesaj";
$contact_chars = "caractere rămase";
$contact_button = "Trimite mesaj";
$contact_received = "Am primit mesajul, te rugăm, așteaptă 24 de ore pentru un răspuns.";
$contact_invalid_name = "Nume invalid";
$contact_invalid_email = "Adresă e-mail invalidă";
$contact_invalid_message = "Mesaj invalid";
$invoice_button = "Factură";
$invoice_header = "FACTURĂ PLATĂ AFILIAT";
$invoice_aff_info = "Informație afiliat";
$invoice_co_info = "Informație";
$invoice_acct_info = "Informație cont";
$invoice_payment_info = "Informație plată";
$invoice_comm_date = "Dată plată";
$invoice_comm_amt = "Sumă comision";
$invoice_comm_type = "Tip comision";
$invoice_admin_note = "Notiță administrator";
$invoice_footer = "SFÂRȘIT FACTURĂ";
$invoice_print = "Printează factură";
$invoice_none = "N/A";
$invoice_aff_id = "ID afiliere";
$invoice_aff_user = "Nume de utilizator";
$menu_pdf_marketing = "PDF Broșuri marketing";
$menu_pdf_training = "PDF Documente training";
$marketing_target_url = "URL țintă";
$marketing_source_code = "Cod sursă - Copiază/Lipește în website-ul tău";
$marketing_group = "Grup marketing";
$peels_title = "Nume pagină peel";
$peels_view = "Vizualizează această pagină peel";
$peels_description = "Descriere pagină peel";
$lb_head_title = "E necesar codul DE ÎNCEPUT pentru pagina ta HTML";
$lb_head_description = "Pentru a folosi o casetă luminoască pe website-ul nostru, trebuie să adaugi următoarele linii în secțiunea de început a paginii ce vrei să fie plasată.";
$lb_head_source_code = "Lipește acest cod în secțiunea DE ÎNCEPUT a documentului tău HTML.";
$lb_head_code_notes = "E suficient să plasezi o singură dată acest cod, indiferent de câte casete luminoase vei plasa în pagină.";
$lb_head_tutorial = "Vizualizare tutorial";
$lb_body_title = "Nume casetă luminoasă";
$lb_body_description = "Descriere casetă luminoasă";
$lb_body_click = "Click pe imaginea de mai sus pentru a vizualiza caseta luminoasă.";
$lb_body_source_code = "Lipește acest cod în secțiunea de CONȚINUT a documentului HTML, unde vrei să apară imaginea.";
$pdf_title = "PDF";
$pdf_training = "Documente training";
$pdf_marketing = "Broșuri marketing";
$pdf_description_1 = "Este necesar Adobe Reader pentru a vizualiza și printa materialele de marketing în format PDF.";
$pdf_description_2 = "Adobe Reader se poate descărca gratuit de pe website-ul Adobe.";
$pdf_file_name = "Nume fișier";
$pdf_file_size = "Dimensiune fișier";
$pdf_file_description = "Descriere";
$pdf_bytes = "Biți";
$menu_heading_training_materials = "Materiale de training";
$menu_videos = "Vizualizează videoclipuri training";
$menu_custom_manual = "Manual de urmărire personalizată a link-urilor";
$menu_page_peels = "Pagină peel";
$menu_lightboxes = "Casete luminoase";
$menu_email_templates = "Șabloane e-mail";
$menu_heading_custom_links = "Link-uri de urmărire personalizată";
$menu_custom_reports = "Rapoarte";
$menu_keyword_links = "Link-uri urmărire cuvinte cheie";
$menu_subid_links = "Link-uri urmărire sub-afiliați";
$menu_alteranate_links = "Link-uri pagină de intrare alternativă";
$menu_heading_additional = "Unelte suplimentare";
$menu_drop_heading_stats = "Statistici generale";
$menu_drop_heading_commissions = "Comisioane";
$menu_drop_heading_history = "Istoric plăți";
$menu_drop_heading_traffic = "Jurnal trafic";
$menu_drop_heading_account = "Contul meu";
$menu_drop_heading_logo = "Încarcă logo-ul";
$menu_drop_heading_faq = "Întrebări frecvente";
$menu_drop_general_stats = "Statistici generale";
$menu_drop_tier_stats = "Comisioane de nivel";
$menu_drop_current = "Comisioane actuale";
$menu_drop_tier = "Comisioane actuale de nivel";
$menu_drop_pending = "Aprobări în așteptare";
$menu_drop_paid = "Comisioane plătite";
$menu_drop_paid_rec = "Comisioane de nivel plătite";
$menu_drop_recurring = "Comisioane recurente active";
$menu_drop_edit = "Editare cont";
$menu_drop_password = "Schimbare parolă";
$menu_drop_change = "Schimbă tipul de comision";
$account_hidden = "ascuns";
$keyword_title = "Link-uri cuvânt cheie personalizabil";
$keyword_info = "Crează un link la un cuvânt cheie ce îți oferă posibilitatea de a urmări traficul de intrare pentru diferite surse. Creează un link cu până la 4 cuvinte de urmărire diferite, iar raportul de urmărire personalizat îți va arăta un raport detaliat pentru fiecare cuvânt cheie creat.";
$keyword_heading = "Variabile disponibile pentru urmărirea personalizată a cuvintelor cheie";
$keyword_tracking = "ID urmărire";
$keyword_build = "Pentru a construi un link, ia următoarea adresă URL și adaugă ID-ul de urmărire și cuvântul cheie pe care vrei să îl urmărești.";
$keyword_example = "Exemplu";
$keyword_tutorial = "Vizualizare tutorial";
$sub_tracking_title = "Urmărire sub-afiliați";
$sub_tracking_info = "Creează un link de sub-afiliere care îți oferă posibilitatea de a trimite link-ul tău de afiliere către proprii tăi afiliați, pentru ca aceștia să îl folosească. Vei ști cine ți-a generat comisionul, pentru că te vom informa care din sub-afiliații tăi ți-a genera vânzarea. Un alt motiv de a folosi link-uri de sub-afiliere este dacă ai propriul sistem de urmărire pe care vrei să îl incluzi în raportare.";
$sub_tracking_build = "Înlocuiește XXX cu numărul ID de afiliat din programul tău de afiliere. Repetă acest proces pentru toți afiliații tăi.";
$sub_tracking_example = "Exemplu";
$sub_tracking_tutorial = "Vizualizare tutorial";
$sub_tracking_id = "ID sub-afiliați";
$alternate_title = "Link-uri pagină alternativă de intrare";
$alternate_option_1 = "Opțiunea 1: Creare automată link";
$alternate_heading_1 = "Creare automată link";
$alternate_info_1 = "Definește-ți propria pagină a traficului de intrare, introducând URL-ul spre care vrei să fie trimis traficul și noi vom crea un link pentru tine. Folosind această caracteristică se va crea un link mai scurt pe care îl poți folosi cu adresa URL incorporată în link, utilizând un număr ID din baza noastră de date.";
$alternate_button = "Creează link";
$alternate_links_heading = "URL link-uri alternative de intrare";
$alternate_links_note = "Link-urile existente vor rămâne intacte și funcționale dacă elimini un link personalizat de pe această pagină.";
$alternate_links_remove = "eliminare";
$alternate_option_2 = "Opțiunea 2: Creare manuală link";
$alternate_info_2 = "Dacă dorești să adaugi propriile link-uri afiliate cu un URL de intrare alternativ, folosește următoarea structură.";
$alternate_variable = "Variabilă alternativă URL intrare";
$alternate_example = "Exemplu";
$alternate_build = "Pentru a construi un link, ia următoarea adresă URL și adaug-o URL-ului alternativ de intrare pe care vrei să îl folosești.";
$alternate_none = "Niciun link alternativ de intrare creat";
$alternate_tutorial = "Vizualizare tutorial";
$cr_title = "Raport personalizat cuvinte cheie";
$cr_select = "Selectează un cuvânt cheie";
$cr_button = "Generează raport";
$cr_no_results = "Niciun rezultat găsit";
$cr_no_results_info = "Încearcă o combinație diferită de cuvinte cheie";
$cr_used = "Cuvinte cheie folosite";
$cr_found = "Acest link găsit";
$cr_times = "ori";
$cr_unique = "Link unic găsit";
$cr_detailed = "Raport link detaliat";
$cr_export = "Exportează raportul în Excel";
$cr_none = "Niciun cuvânt cheie găsit";
$logo_title = "Încarcă logo-ul companiei tale";
$logo_info = "Dacă vrei să încarci logo-ul companiei tale, îl vom afișa clienților pe care îi aduci pe website-ul nostru. Acest lucru ne permite să personalizăm experiența clientului tău atunci când ne vizitează.";
$logo_bullet_one = "Imaginile pot fi de forma .jpg, .gif sau .png. Nu este permis conținut flash.";
$logo_bullet_two = "Orice imagine necorespunzătoare va fi eliminată, iar contul tău va fi suspendat.";
$logo_bullet_three = "Imaginea/Logo-ul tău nu vor fi arătate pe website-ul nostru până când nu vom oferi aprobarea.";
$logo_bullet_size_one = "Imaginile pot avea o lățime maximă de";
$logo_bullet_size_two = "pixeli și o înălțime maximă de";
$logo_bullet_req_size_one = "Imaginile trebuie să aibă o lățime de";
$logo_bullet_req_size_two = "pixeli și o înălțime de";
$logo_bullet_pixels = "pixeli.";
$logo_choose = "Alege o imagine";
$logo_file = "Selectează un fișier:";
$logo_browse = "Căutare...";
$logo_button = "Încarcă";
$logo_current = "Imaginea actuală";
$logo_remove = "eliminare";
$logo_display_status = "Status imagine:";
$logo_pending = "Așteaptă aprobarea";
$logo_approved = "Aprobată";
$logo_success = "Imaginea a fost încărcată cu succes și acum așteaptă aprobarea.";
$signup_security_title = "Verificare cont";
$signup_security_info = "Te rugăm, introdu codul de securitate de mai jos în căsuță. Acest pas ajută la prevenirea înregistrărilor automate.";
$signup_security_code = "Cod de securitate";
$sub_tracking_none = "Nimic";
$missing_security_code = "Verificare cont / Cod de securitate incorect sau lipsă";
$alternate_success_title = "Link creat cu succes";
$alternate_success_info = "Ia link-ul de mai jos și începe să aduci trafic URL-ului definit.";
$alternate_failed_title = "Eroare creare link";
$alternate_failed_info = "Te rugăm, introdu un URL valid.";
$logo_missing_filename = "Te rugăm, alege un nume de fișier.";
$logo_required_width = "Lățimea imaginii trebuie să fie";
$logo_required_height = "Înălțimea imaginii trebuie să fie";
$logo_maximum_width = "Lățimea imaginii poate să fie numai";
$logo_maximum_height = "Înălțimea imaginii poate să fie numai";
$logo_size_maximum = "Dimensiunea imaginii poate să aibă numai un maxim de";
$logo_bad_filetype = "Acest tip de imagine nu este permis. Tipurile de imagine permise sunt .gif, .jpg și .png.";
$logo_upload_error = "Eroare încărcare imagine, te rugăm să contactezi administratorul afiliat.";
$logo_error_title = "Eroare încărcare imagine";
$logo_error_bytes = "biți.";
$excel_title = "Raport personalizat link-uri cuvinte cheie";
$excel_tab_report = "Raport personalizat cuvinte cheie";
$excel_tab_logs = "Jurnale de trafic";
$excel_date = "Dată raport:";
$excel_affiliate = "ID afiliat:";
$excel_criteria = "Criteriu link cuvinte cheie";
$excel_link = "Structură link";
$excel_hits = "Reușite unice";
$excel_comm_stats = "Statistici comision";
$excel_comm_current = "Comisioane curente";
$excel_comm_paid = "Comisioane plătite";
$excel_comm_total = "Total comisioane";
$excel_comm_ratio = "Rata de conversie";
$excel_earned = "Comisioane câștigate";
$excel_earned_current = "Comisioane curente";
$excel_earned_paid = "Comisioane plătite";
$excel_earned_total = "Total comisioane câștigate";
$excel_earned_tab = "Click pe fereastra cu Jurnale de trafic (de mai jos) pentru a vizualiza jurnalul de trafic pentru acest link anume.";
$excel_log_title = "Jurnal personaliat trafic cuvinte cheie";
$excel_log_ip = "Adresă IP";
$excel_log_refer = "URL de referire";
$excel_log_date = "Data";
$excel_log_time = "Ora";
$excel_log_target = "URL țintă";
$etemplates_title = "Șabloane e-mail";
$etemplates_view_link = "Vizualizează acest șablon de e-mail";
$etemplates_name = "Nume șablon";
$signup_maintenance_heading = "Notificare de întreținere";
$signup_maintenance_info = "Înregistrările sunt temporar dezactivate. Te rugăm, încearcă din nou mai târziu.";
$marketing_group_title = "Grup marketing";
$marketing_button = "Afișează";
$marketing_no_group = "Niciun grup selectat";
$marketing_choose = "Te rugăm, alege un grup de marketing de mai sus";
$marketing_notice = "Grupurile de marketing pot avea pagini cu trafic de intrare diferit";
$canspam_heading = "Reguli și acceptare CAN-SPAM";
$canspam_accept = "Am citit, am înțeles și sunt de acord cu regulile CAN-SPAM de mai sus.";
$canspam_error = "Nu ai acceptat regulile noastre CAN-SPAM.";
$signup_banned = "S-a petrecut o eroare la crearea contului. Te rugăm, contactează administratorul de sistem pentru mai multe informații.";
$header_testimonials = "Testimoniale afiliate";
$testi_visit = "Vizitează website";
$testi_description = "Oferă un testimonial pentru programul nostru de afilieri, iar noi îl vom plasa pe pagina &lt;a href=&quot;testimonials.php&quot;&gt;testimoniale&lt;/a&gt; cu un link către website-ul tău.";
$testi_name = "Nume";
$testi_url = "URL website";
$testi_content = "Testimoniale";
$testi_code = "Cod securitate";
$testi_submit = "Trimite testimonial";
$testi_na = "Testimonialele nu sunt disponibile.";
$testi_title = "Oferă un testimonial";
$testi_success_title = "Succes testimonial";
$testi_success_message = "Îți mulțumim pentru trimiterea testimonialului. Echipa noastră îl va verifica în curând.";
$testi_error_title = "Eroare testimonial";
$testi_error_name_missing = "Te rugăm, include numele pentru testimonial.";
$testi_error_url_missing = "Te rugăm, include URL-ul website-ului tău pentru testimonial.";
$testi_error_missing = "Te rugăm, include un text pentru testimonial.";
$menu_drop_delayed = "Comisioane întârziate";
$details_drop_6 = "Comisioane actuale întârziate";
$details_type_6 = "Întârziat - de aprobat în curând";
$comdetails_status_6 = "Întârziat - de aprobat în curând";
$tc_reaccept_title = "Notificare schimbare Termeni și Condiții";
$tc_reaccept_sub_title = "Trebuie să fiți de acord cu noile termeni și condiții pentru a primi accesul către cont.";
$tc_reaccept_button = "Am citit, am înțeles și sunt de acord cu termenii și condițiile de mai sus.";
$tlinks_active = "Numărul de niveluri active";
$tlinks_payout_structure = "Structură plată niveluri";
$tlinks_level = "Nivel";
$tierText1 = "% calculat din suma comisioanelor de referință ale afiliaților.";
$tierText2 = "% calculat din suma comisionului de nivel de sus.";
$tierText3 = "% calculat din suma de vânzări.";
$tierTextflat = "rată fixă.";
$edit_custom_button = "Editează răspuns";
$private_heading = "Înregistrare privată";
$private_info = "Programul nostru de afilieri nu este deschis către publicul general și necesită un cod de înregistrare. Informații legate de cum puteți obține acest cod de înregistrare puteți găsi aici.";
$private_required_heading = "Cod de înregistrare necesar";
$private_code_title = "Introdu cod de înregistrare";
$private_button = "Trimite cod";
$private_error_title = "Cod înregistrare introdus invalid";
$private_error_invalid = "Codul de înregistrare pe care l-ați oferit este invalid.";
$private_error_expired = "Codul de înregistrare pe care l-ați oferit a expirat și nu mai este valid.";
$qr_code_title = "Coduri QR";
$qr_code_size = "Dimensiune cod QR";
$qr_code_button = "Afișează cod QR";
$qr_code_offline_title = "Marketing offline";
$qr_code_offline_content1 = "Adaugă acest cod QR materialelor de marketing: broșurilor, posterelor, cărților de vizită, etc.";
$qr_code_offline_content2 = "- Click dreapta pe imagine și &lt;strong&gt;salvează-as&lt;/strong&gt; pe calculator.";
$qr_code_online_title = "Marketing online";
$qr_code_online_content = "Adaugă acest cod QR website-ului, rețelelor de socializare, blogurilor, etc.";
$menu_coupon = "Coduri promoționale";
$coupon_title = "Codurile promoționale disponibile";
$coupon_desc = "Dă mai departe aceste coduri promoționale și câștigă un comision de fiecare dată când cineva folosește codul!";
$coupon_head_1 = "Cod promoțional";
$coupon_head_2 = "Reducere acordată clientului";
$coupon_head_3 = "Comisionul tău";
$coupon_sale_amt = "din suma vânzării";
$coupon_flat_rate = "rată fixă";
$coupon_default = "Nivel de plată implicit";
$cc_vanity_title = "Cere un cod promoțional personalizat";
$cc_vanity_field = "Cod promoțional";
$cc_vanity_button = "Cere un cod promoțional";
$cc_vanity_error_missing = "<strong>Eroaare!</strong> Te rugăm, introdu un cod promoțional.";
$cc_vanity_error_exists = "<strong>Eroare!</strong> Ai cerut deja acest cod. Acesta așteaptă aprobarea.";
$cc_vanity_error = "<strong>Eroare!</strong> Codul promoțional este invalid. Te rugăm, introdu numai litere, cifre și liniuțe de subliniere.";
$cc_vanity_success = "<strong>Succes!</strong> Codul tău promoțional personalizat a fost cerut.";
$coupon_none = "Niciun cod promoțional disponibil în prezent.";
$pic_error_title = "Eroare încărcare imagine";
$pic_missing = "Te rugăm, alege un nume de fișier.";
$pic_invalid = "Tipul de imagine nu este permis. Tipurile de imagini permise sunt .gif, .jpg și .png.";
$pic_error = "Eroare încărcare imagine, te rugăm să contactezi administratorul afiliat.";
$pic_success = "Fotografia ta a fost încărcată cu succes.";
$pic_title = "Încarcă o fotografie";
$pic_info = "Încărcarea acestei fotografii te ajută să îți personalizezi experiența cu noi.";
$pic_bullet_1 = "Imaginile pot fi .jpg, .gif sau .png.";
$pic_bullet_2 = "Orice imagini necorespunzătoare vor fi eliminate, iar contul va fi suspendat.";
$pic_bullet_3 = "Fotografia ta nu va fi afișată public. Va fi atașată contului tău, dar numai noi putem să o vedem.";
$pic_file = "Selectează un fișier:";
$pic_button = "Încarcă";
$pic_current = "Fotografia mea actuală";
$pic_remove = "Elimină fotografie";
$progress_title = "Eligibilitate pentru următoarea plată:";
$progress_complete = "finalizată.";
$progress_none = "Nu avem cereri de plată minime.";
$progress_sentence_1 = "Ai câștigat";
$progress_sentence_2 = "din";
$progress_sentence_3 = "cereri.";
$aff_lib_button = "<font style=\"font-size:16px; font-weight:bold;\">Cere acces liber către</font><BR />www.AffiliateLibrary.com";
$menu_announcements = "Campanii pe rețele de socializare";
$announcements_name = "Nume campanie";
$announcements_facebook_message = "Mesaj Facebook";
$announcements_twitter_message = "Mesaj Twitter";
$announcements_facebook_link = "Link Facebook";
$announcements_facebook_picture = "Fotografie Facebook";
$general_last_30_days_activity = "Ultimele 30 de zile de activitate";
$general_last_30_days_activity_traffic = "Trafic";
$general_last_30_days_activity_commissions = "Comisioane";
$accountability_title = "Responsabilitate și Comunicare";
$accountability_text = "<strong>Ce sunt acestea?</strong><p>Avem o abordare proactivă atunci când vine vorba de a crea încredere cu partenerii noștri afiliați. Scopul nostru este să oferim cât mai multă informație posibilă din fiecare comision câștigat și/sau respins din sistemul nostru.</p><strong>Comunicare</strong><p>Putem să oferim detalii despre orice comision respins. Avem o comunicare puternică cu afiliații noștri și încurajăm întrebările și feedback-ul.</p>";
$debit_reason_0 = 'Nimic';
$debit_reason_1 = 'Restituire';
$debit_reason_2 = 'Plată returnată';
$debit_reason_3 = 'Fraudă raportată';
$debit_reason_4 = 'Comandă anulată';
$debit_reason_5 = 'Restituire parțială';
$menu_drop_pending_debits = 'Debit în așteptare';
$debit_amount_label = 'Sumă debit';
$debit_date_label = 'Dată debit';
$debit_reason_label = 'Motiv debit';
$debit_paragraph = 'Debitele vor fi deduse din următoarea ta plată.';
$debit_invoice_amount = 'Minus sumă debit';
$debit_revised_amount = 'Sumă de plată revizuită';
$mv_head_description = 'Notă: Poți pune numai un videoclip pe pagină pe website-ul tău.';
$mv_head_source_code = 'Lipește acest cod în partea de ÎNCEPUT a documentului tău HTML.';
$mv_body_title = 'Titlu videoclip';
$mv_body_description = 'Descriere';
$mv_body_source_code = 'Lipește acest cod în partea de CONȚINUT a documentului tău HTML, unde vrei să apară videoclipul.';
$menu_marketing_videos = 'Videoclipuri';
$mv_preview_button = 'Previzualizare videoclip';
$dt_no_data = 'Nicio informație disponibilă în tabel.';
$dt_showing_exists = 'Arată de la _ÎNCEPUT_ până la _SFÂRȘIT_ din _TOTALUL_ de intrări.';
$dt_showing_none = 'Arată de la 0 la 0 din 0 intrări.';
$dt_filtered = '(filtrat din intrările _MAXIM_ totale)';
$dt_length_choice = 'Arată _MENIU_ intrări.';
$dt_loading = 'Încărcare...';
$dt_processing = 'Procesare...';
$dt_no_records = 'Nu s-a găsit nicio înregistrare care să se potrivească.';
$dt_first = 'Primul';
$dt_last = 'Ultimul';
$dt_next = 'Următorul';
$dt_previous = 'Anteriorul';
$dt_sort_asc = ': activează pentru a sorta crescător coloana';
$dt_sort_desc = ': activează pentru a sorta descrescător coloana';
$choose_marketing_group = 'Alege un grup de marketing';
$email_already_used_1 = 'Contul nu poate fi creat. Permitem crearea a numai';
$email_already_used_2 = 'cont';
$email_already_used_3 = 'pentru fiecare adresă de e-mail.';
$missing_fax = 'Te rugăm, introdu numărul tău de fax.';
$chart_last_6_months = 'Comisioane plătite în ultimele 6 luni';
$chart_last_6_months_paid = 'Comisioane plătite';
$chart_this_month = 'Top 5 afiliați din această lună';
$chart_this_month_none = 'Nicio informație de afișat.';
$login_return = 'Întoarcere la Origine afiliați';
$login_lost_details = 'Introdu numele de utilizator și îți vom trimite un e-mail cu informațiile de conectare.';
$account_edit_general_prefs = 'Preferințe generale';
$account_edit_email_language = 'Limbă e-mail';
$footer_connect = 'Conectează-te cu noi';
$modal_close = 'Închide';
$vat_amount_heading = 'Sumă TVA';
$menu_logout = 'Deconectare';
$menu_upload_picture = 'Încarcă fotografia';
$menu_offer_testi = 'Oferă un testimonial';
$fb_login = 'Conectare prin Facebook';
$fb_permissions = 'Nu s-au acordat permisiunile. Te rugăm, permite website-ului să folosească adresa ta de e-mail.';
$announcements_published = "Anunțuri publicate";
$training_videos_title = "Videoclipuri training";
$training_videos_general = "Marketing general";
$commission_method = "Metodă de comision";
$how_will_you_earn = "Cum vei câștiga comisionul?";
$pm_account_credit = "Vom credita contul în suma comisioanelor câștigate.";
$pm_check_money_order = "Îți vom trimite ordinul de plată prin e-mail.";
$pm_paypal = "Îți vom trimite o plată prin PayPal.";
$pm_stripe = "Îți vom trimite o plată prin Stripe.";
$pm_wire = "Îți vom trimite o plată prin transfer bancar.";
$add_to_signup_left_column_text = "<span style=\"color:#CC0000; font-style:italic;\">* câmpuri obligatorii.</span>";
$paypal_email = "E-mail Paypal";
$stripe_acct_details = "Detalii cont Stripe";
$stripe_connect = "Te poți conecta contului tău Stripe din pagina de setări ale contului, după înregistrare.";
$stripe_success = "Cont Stripe conectat cu succes";
$stripe_settings = "Setări Stripe";
$stripe_connect_edit = "Conectare prin Stripe";
$stripe_delete = "Șterge contul Stripe";
$stripe_confirm = "Sigur vrei să ștergi acest cont?";
$payment_settings = "Setări de plată";
$edit_payment_settings = "Editează setările de plată";
$invalid_paypal_address = "Adresă e-mail Paypal invalidă.";
$payment_method_error = "Te rugăm, alege o metodă de plată.";
$payment_settings_updated = "Setări de plată actualizate.";
$stripe_removed = "Cont Stripe eliminat.";
$payment_settings_success = "Succes!";
$payment_update_notice_1 = "Anunț!";
$payment_update_notice_2 = "Ai ales să primești o plată <strong>[payment_option_here]</strong> de la noi. Te rugăm, <a href=\"account.php?page=48\" style=\"font-weight:bold;\">click aici</a> pentru a conecta <strong>[payment_option_here]</strong> cu contul.";
$pm_title_credit = "Credit Cont";
$pm_title_mo = "Verificare / Ordin de plată";
$pm_title_paypal = "PayPal";
$pm_title_stripe = "Stripe";
$pm_title_wire = "Transfer bancar";
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