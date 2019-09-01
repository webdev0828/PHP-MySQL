<?PHP

//-------------------------------------------------------
	  $language_pack_name = "italian";
	  $language_pack_table_name = "italian";
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
$header_title = "Programma affiliato";
$header_indexLink = "Home";
$header_signupLink = "Registrati adesso";
$header_accountLink = "Gestire l\'account";
$header_emailLink = "Contattateci";
$header_greeting = "Benvenuto";
$header_nonLogged = "Ospite";
$header_logout = "Fare qui il log out";
$footer_tag = "Software affiliato da iDevAffiliate";
$footer_copyright = "Copyright 2006";
$footer_rights = "Tutti i diritti riservati";
$index_heading_1 = "Benvenuto al nostro Programma affiliato!";
$index_paragraph_1 = "È facile partecipare al nostro programma, è semplice registrarsi e non è necessario possedere della conoscenza tecnica. I programmi affiliati sono normali in tutto l\'Internet e offrono ai proprietari dei siti web un ulteriore modo per trarre dei vantaggi dai loro siti web.Gli Affiliati creano traffico e vendite per i siti web commerciali e in ritorno essi ricevono il pagamento della commissione.";
$index_heading_2 = "Come funziona?";
$index_paragraph_2 = "Quando partecipi al nostro programma affiliato, ti saranno dati una serie di striscioni e links testuali che potrai inserire nel tuo sito. Quando un utente clicca su uno dei tuoi links, sarà indirizzato al nostro sito web e la sua attività sarà seguita dal nostro software affiliato. Guadagnerai una commissione in base al tuo tipo di commissione.";
$index_heading_3 = "Statistiche e Rapporti in tempo reale!";
$index_paragraph_3 = "Login 24 ore al giorno per verificare le tue vendite, il traffico, il bilancio del tuo conto e osservare come funzionano gli striscioni.";
$index_login_title = "Login Affiliato";
$index_login_username = "Nome utente";
$index_login_password = "Password";
$index_login_username_field = "nome utente";
$index_login_password_field = "password";
$index_login_button = "Login";
$index_login_signup_link = "Fare clic qui per registrarsi";
$index_table_title = "Dettagli del programma";
$index_table_commission_type = "Tipo di commissione";
$index_table_initial_deposit = "Deposito iniziale";
$index_table_requirements = "Requisiti di pagamento";
$index_table_duration = "Durata del pagamento";
$index_table_choose = "Scegliere tra le seguenti opzioni di pagamento!";
$index_table_sale = "Pagare-Per-Vendita";
$index_table_click = "Pagare-Per-Clic";
$index_table_sale_text = "per ogni vendita che porti a termine.";
$index_table_click_text = "per ogni clic che porti a termine.";
$index_table_deposit_tag = "Solo per registrarsi!";
$index_table_requirements_tag = "Saldo minimo necessario al pagamento.";
$index_table_duration_tag = "Il pagamento viene effettuato una volta al mese per il mese precedente.";
$signup_left_column_text = "Partecipa al nostro programma affiliato e inizia a guadagnare soldi per ogni vendita assegnata a noi! Crea semplicemente il tuo account, inserisci il codice di collegamento nel nostro sito web e osserva il saldo del tuo conto crescere mentre i tuoi visitatori diventano i nostri clienti.";
$signup_left_column_title = "Benvenuto Affiliato!";
$signup_login_title = "Crea il tuo Account";
$signup_login_username = "Nome utente";
$signup_login_password = "Password";
$signup_login_password_again = "Ancora una volta la Password";
$signup_login_minmax_chars = "- Il nome utente deve essere almeno di user_min_chars caratteri.&lt;br /&gt;-  Il nome utente può essere alfanumerico.&lt;br /&gt;- Il nome utente può contenere questi caratteri: _ (solo trattini bassi)&lt;br /&gt;&lt;br /&gt;- La password deve essere almeno di pass_min_chars caratteri.&lt;br /&gt;- La password può essere alfanumerica.&lt;br /&gt;- La password può contenere questi caratteri:  characters_allowed";
$signup_login_must_match = "La voce inserita deve corrispondere alla password inserita.";
$signup_standard_title = "Informazione standard";
$signup_standard_email = "Indirizzo email";
$signup_standard_company = "Nome della società";
$signup_standard_checkspayable = "Assegni intestati a";
$signup_standard_weburl = "Indirizzo del sito web";
$signup_standard_taxinfo = "Partita IVA, SSN o IVA";
$signup_personal_title = "Dati personali";
$signup_personal_fname = "Nome";
$signup_personal_state = "Stato o Provincia";
$signup_personal_lname = "Cognome";
$signup_personal_phone = "Numero di telefono";
$signup_personal_addr1 = "Indirizzo";
$signup_personal_fax = "Numero di fax";
$signup_personal_addr2 = "Altro Indirizzo";
$signup_personal_zip = "CAP";
$signup_personal_city = "Città";
$signup_personal_country = "Nazione";
$signup_commission_title = "Pagamento della commissione";
$signup_commission_howtopay = "Come ti paghiamo ?";
$signup_commission_style_PPS = "Pagamento-Per-Vendita";
$signup_commission_style_PPC = "Pagamento-Per-Clic";
$signup_terms_title = "Termini e Condizioni";
$signup_terms_agree = "Ho letto, compreso e concordo con i termini e le condizioni sopracitati.";
$signup_page_button = "Creare il mio Account";
$signup_success_email_comment = "Ti abbiamo inviato una email con il tuo nome di utente e la password.<BR />Ti consigliamo di conservarla al sicuro come futura referenza.";
$signup_success_login_link = "Fare il login al mio Account";
$custom_fields_title = "Campi definiti dall\'utente";
$logout_msg = "<b>Adesso non sei connesso</b><BR />Grazie per la tua partecipazione al nostro programma affiliato.";
$signup_page_success = "È stato creato il tuoAccount";
$login_left_column_title = "Login nell\'Account";
$login_left_column_text = "Inserisci il tuo nome di utente e la password per avere accesso alle statistiche del tuo account, agli striscioni e ai codici del collegamento, alle Domande Frequenti e ad altro.<BR/ ><BR/ >Se non ricordi la tua password, inserisci il tuo nome di utente e invieremo le tue informazioni di login tramite email.<BR /><BR />";
$login_title = "Entrare nel mio Account";
$login_username = "Nome dell\'utente";
$login_password = "Password";
$login_invalid = "Login non valido";
$login_now = "Entrare nel mio Account";
$login_send_title = "Ti serve la tua password?";
$login_send_username = "inserire il tuo nome di utente";
$login_send_info = "Dettagli del login inviatiper email";
$login_send_pass = "Inviareper email";
$login_send_bad = "Nome dell\'utente non trovato";
$help_new_password_heading = "Nuova password";
$help_new_password_info = "La tua password deve essere lunga almeno pass_min_chars caratteri. Può contenere solo lettere, numeri e i seguenti caratteri:  characters_allowed";
$help_confirm_password_heading = "Confermare la nuova password";
$help_confirm_password_info = "Questa password deve corrispondere alla nuova password.";
$help_custom_links_heading = "Gestione delle Parole chiave";
$help_custom_links_info = "La tua parola chiave non deve superare i 30 caratteri di lunghezza. Può contenere solo lettere, numeri e trattini.";
$error_title = "Sono stati individuati i seguenti errori";
$username_invalid = "Nome utente non valido. Può contenere solo lettere, numeri e trattino basso.";
$username_taken = "Il nome di utente che hai scelto è già stato assegnato.";
$username_short = "Il tuo nome di utente è troppo corto, deve essere lungo almeno 4 caratteri.";
$username_long = "Il tuo nome di utente è troppo lungo, non deve superare i 12 caratteri di lunghezza.";
$password_invalid = "Password non valida. Può contenere solo lettere, numeri e i seguenti caratteri:  characters_allowed";
$password_short = "La tua password è troppo corta, deve essere lungaalmeno 4 caratteri.";
$password_long = "La tua password è troppo lunga, non deve superare I 12 caratteri di lunghezza.";
$password_mismatch = "Le voci inserite non corrispondono alla tua password.";
$missing_checks = "Inserire, prego, il nome del creditore per intestargli gli assegni.";
$missing_tax = "Inserire, prego, le informazioni della tua Partita IVA, del SSN o dell\'IVA.";
$missing_fname = "Inserire, prego, il tuo nome.";
$missing_lname = "Inserire, prego, il tuo cognome.";
$missing_email = "Inserire, prego, il tuo indirizzo email.";
$invalid_email = "Il tuo indirizzo email non è valido.";
$missing_address = "Inserire, prego, il tuo indirizzo.";
$missing_city = "Inserire, prego, la tua città.";
$missing_company = "Inserire, prego, il nome della tua azienda.";
$missing_state = "Inserire, prego, il tuo stato o la tua provincia.";
$missing_zip = "Inserire, prego, il tuo CAP.";
$missing_phone = "Inserire, prego, il tuo numero di telefono.";
$missing_website = "Inserire, prego, l\'indirizzo del tuo sito web.";
$missing_paypal = "Se hai scelto di ricevere pagamenti PayPal, inserire, prego, il tuo PayPal account.";
$missing_terms = "Non hai accettato i nostri termini e le condizioni.";
$paypal_required = "È necessario un PayPal account per il pagamento.";
$missing_custom = "Completare, prego, il campo nominato:";
$account_total_transactions = "Transazioni totali";
$account_standard_linking_code = "Codice di collegamento standard - Ottimo da usare nelle email!";
$account_copy_paste = "Copia/Incolla il codice qui sopra nel tuo sito web o nei tuoi email.";
$account_not_approved = "Al momento il tuo account è in attesa dell\'approvazione";
$account_suspended = "Al momento il tuo account è sospeso.";
$account_standard_earnings = "Guadagni standard";
$account_inc_bonus = "comprende il bonus";
$account_second_tier = "Livello dei guadagni";
$account_recurring = "Guadagni ricorrenti";
$account_not_available = "N/A";
$account_earned_todate = "Totale attuale guadagnato";
$menu_heading_overview = "Sommario dell\'Account";
$menu_general_stats = "Statistiche generali";
$menu_tier_stats = "Livello statistiche";
$menu_payment_history = "Storia dei pagamenti";
$menu_commission_details = "Dettagli della commissione";
$menu_recurring_commissions = "Commissioni ricorrenti";
$menu_traffic_log = "Log del traffico d\'entrata";
$menu_heading_marketing = "Materiali di Marketing";
$menu_banners = "Striscioni";
$menu_text_ads = "Pubblicità di solo testo";
$menu_text_links = "Links di testo";
$menu_email_links = "Links delle email";
$menu_html_links = "Pubblicità HTML";
$menu_offline = "Marketing offline";
$menu_tier_linking_code = "Codice del livello di collegamento";
$menu_email_friends = "Invia email ad Amici e Affiliati";
$menu_custom_links = "Costruisci e segui i tuoi links";
$menu_heading_management = "Gestione dell\'Account";
$menu_comalert = "Impostazione di CommissionAlert";
$menu_comstats = "Impostazione di CommissionStats";
$menu_edit_account = "Modifica il mio Account";
$menu_change_pass = "Cambia la mia password";
$menu_change_commission = "Cambia lo stile della mia commissione";
$menu_heading_general_info = "Informazioni generali";
$menu_browse_affiliates = "Ricerca in altri affiliati";
$menu_faq = "Domande frequenti (FAQ)";
$suspended_title = "Avviso sullo stato dell\'Account";
$suspended_heading = "Al momento il tuo account è sospeso.";
$suspended_notes = "Note dell\'Amministratore";
$pending_title = "Avviso sullo stato dell\'Account";
$pending_heading = "Il tuo Account è al momento in sospeso per l\'approvazione";
$pending_note = "Una volta approvato il tuo account, il materiale per la commercializzazione sarà a tua disposizione.";
$faq_title = "Domande frequenti (FAQ)";
$faq_none = "Non ancoraFAQ (Domande frequenti)";
$browse_title = "Naviga in altri affiliati";
$browse_none = "Non ci sono altri affiliati da visualizzare";
$change_comm_title = "Cambiare lo stile della commissione";
$change_comm_curr_comm = "Stile attuale della commissione";
$change_comm_curr_pay = "Livello di pagamento attuale";
$change_comm_new_comm = "Stile della nuova commissione";
$change_comm_warning = "Se cambi gli stili della commissione, il tuo account sarà reimpostato al Livello 1 di Pagamento";
$change_comm_button = "Cambiare gli stili della commissione";
$change_comm_no_other = "Non ci sono altri stili di commissione disponibili";
$change_comm_level = "Livello";
$change_comm_updated = "Stile della commissione aggiornato";
$password_title = "Modifica la mia Password";
$password_old_password = "Vecchia Password";
$password_new_password = "Nuova Password";
$password_confirm_password = "Conferma la nuova Password";
$password_button = "Modifica la Password";
$password_warning_old_missing = "La vecchia password è sbagliata oppure non si trova";
$password_warning_new_missing = "Manca l\'inserimento della nuova password";
$password_warning_mismatch = "la nuova password non corrisponde";
$password_warning_invalid = "Password non valida - Fare clic sui Links di Aiuto";
$password_notice = "Password aggiornata";
$edit_failed = "Aggiornamento non riuscito - Vedere gli errori suindicati";
$edit_success = "Account aggiornato";
$edit_button = "Modifica il mio Account";
$commissionstats_title = "Impostazione di CommissionStats";
$commissionstats_info = "Installando CommissionStats puoi controllare subito le tue statistiche esattamente da Windows del tuo desktop!Per installare questa funzione, scarica CommissionStats e <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>unzip</b></a> il pacchetto sul tuo disco fisso e poi avvia il file<b>setup.exe</b>.Quando ti vengono richieste le informazioni per il tuo login, inserisci i seguenti dettagli.";
$commissionstats_hint = "Consiglio: Copia e Incolla Ogni Voce per Garantire la Precisione";
$commissionstats_profile = "Nome del profilo";
$commissionstats_username = "Nome dell\'utente";
$commissionstats_password = "Password";
$commissionstats_id = "ID dell\'Affiliato";
$commissionstats_source = "URL del percorso dei sorgenti";
$commissionstats_download = "Scaricare CommissionStats";
$commissionalert_title = "Impostare CommissionAlert";
$commissionalert_info = "Con l\'installazione di CommissionAlert ti notificheremo all\'istante le nuove commissioni, esattamente in Windows del tuo desktop!Per installare questa funzione, scarica CommissionAlert e <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>unzip</b></a> il pacchetto nel tuo disco fisso e poi avvia il file <b>setup.exe</b> .Quando ti vengono richieste le tue informazioni di login, inserisci i seguenti dettagli.";
$commissionalert_hint = "Consiglio: Copia e Incolla ogni Voce per Garantire la Precisione";
$commissionalert_profile = "Nome del Profilo";
$commissionalert_username = "Nome dell\'utente";
$commissionalert_password = "Password";
$commissionalert_id = "ID dell\'Affiliato";
$commissionalert_source = "URL del percorso dei sorgenti";
$commissionalert_download = "Scaricare CommissionAlert";
$offline_title = "Marketing offline";
$offline_paragraph_one = "Guadagnare soldi pubblicizzando il nostro sito web (off-line) tra i tuoi amici e associati!";
$offline_send = "Mandare clienti a";
$offline_page_link = "visualizza pagina";
$offline_paragraph_two = "I tuoi clienti inseriranno il tuo <b>Numero di Identificazione dell\'Affiliato</b> nella casella della pagina suindicata che ti registrerà come affiliato per ogni acquisto che essi faranno.";
$banners_title = "Striscioni";
$banners_size = "Dimensione dello striscione";
$banners_description = "Descrizione dello striscione";
$ad_title = "Pubblicità di solo testo";
$ad_info = "Usando il codice di collegamento fornito, puoi regolare il <b>colore dello schema</b>, <b>l\'altezza</b> e <b>la larghezza</b> della tua pubblicità di solo testo per integrarla facilmente nel tuo sito!";
$links_title = "Links ditesto";
$email_title = "Links dell\'email";
$email_group = "Gruppo Marketing";
$email_button = "Mostra i links dell\'email";
$email_no_group = "Nessun gruppo selezionato";
$email_choose = "Scegliere, prego, un Gruppo Marketing qui sopra";
$email_notice = "I Gruppi Marketing possono avere pagine diverse del traffico d\'entrata";
$email_ascii = "<b>ASCII/Text Version</b> - Da usare nelle emailsplain text.";
$email_html = "<b>HTML Version</b> - Da usare per le emails formattate HTML.";
$email_test = "Test Link";
$email_test_info = "Qui è dove i clienti saranno indirizzati al tuo sito web.";
$email_source = "Codice sorgente - Copia/Incolla nel Messaggio della tua email";
$html_title = "Pubblicità HTML";
$html_view_link = "Visualizza questa pubblicità HTML";
$traffic_title = "Log del traffico d\'entrata";
$traffic_display = "Mostra l\'ultimo";
$traffic_display_visitors = "Visitatori";
$traffic_button = "Visualizza il log del traffico";
$traffic_title_details = "Dettagli del traffico di entrata";
$traffic_ip = "Indirizzo IP";
$traffic_refer = "URL di rinvio";
$traffic_date = "Data";
$traffic_time = "Ora";
$traffic_bottom_tag_one = "Mostra l\'ultimo";
$traffic_bottom_tag_two = "dei";
$traffic_bottom_tag_three = "Visitatori totali e unici";
$traffic_none = "Non esistono logs del traffico";
$traffic_no_url = "N/A - Possibile segnalibro o link di email";
$traffic_box_title = "URL di rinvio completo";
$traffic_box_info = "Fare clic per visitare il sito web";
$payment_title = "Storia dei pagamenti";
$payment_date = "Data del pagamento";
$payment_commissions = "Commissioni";
$payment_amount = "Importo del pagamento";
$payment_totals = "Totali";
$payment_none = "Non esiste la Storia dei Pagamenti";
$tier_stats_title = "Livello statistiche";
$tier_stats_accounts = "Livello degli accounts";
$tier_stats_grab_link = "Afferra il tuo Codice di Livello del collegamento";
$tier_stats_none = "Non esiste il livello degli accounts";
$tier_stats_username = "Nome dell\'utente";
$tier_stats_current = "Commissioni attuali";
$tier_stats_previous = "Pagamenti precedenti";
$tier_stats_totals = "Totali";
$recurring_title = "Commissioni ricorrenti";
$recurring_none = "Non esistono commissioni ricorrenti";
$recurring_date = "Data della commissione";
$recurring_status = "Stato ricorrente";
$recurring_payout = "Prossimo pagamento";
$recurring_amount = "Ammontare";
$recurring_every = "Ogni";
$recurring_in = "In";
$recurring_days = "Giorni";
$recurring_total = "Totale";
$tlinks_title = "Aggiungere Altri al tuo livello e guadagna grazie a loro!";
$tlinks_embedded_one = "Il credito per la registrazione al livello è già attivo nei tuoi links di affiliato standard!";
$tlinks_embedded_two = "Diventerai il Top Tier per chiunque partecipa al nostro programma affiliato per mezzo di un link affiliato.";
$tlinks_embedded_current = "Pagamento per l\'attuale livello";
$tlinks_forced_two = "Usare il seguente codice per promuovere il nostro programma affiliato presso altri proprietari di siti web.";
$tlinks_forced_code = "Codice di collegamento testuale";
$tlinks_forced_paste = "Copia/Incolla il codice qui sopra nel tuo sito web";
$tlinks_forced_money = "Proprietari dei siti, guadagnate soldi qui!";
$comdetails_title = "Dettagli della commissione";
$comdetails_date = "Data della commissione";
$comdetails_time = "Ora della commissione";
$comdetails_type = "Tipo di commissione";
$comdetails_status = "Stato attuale";
$comdetails_amount = "Importo della commissione";
$comdetails_additional_title = "Ulteriori dettagli della commissione";
$comdetails_additional_ordnum = "Numero dell\'ordine";
$comdetails_additional_saleamt = "Importo della vendita";
$comdetails_type_1 = "Commissione del bonus";
$comdetails_type_2 = "Commissione ricorrente";
$comdetails_type_3 = "Commissione di livello";
$comdetails_type_4 = "Commissione standard";
$comdetails_status_1 = "Pagato";
$comdetails_status_2 = "Approvato- Pagamento in sospeso";
$comdetails_status_3 = "Approvazione in sospeso";
$comdetails_not_available = "N/A";
$details_title = "Dettagli delle Commissioni";
$details_drop_1 = "Commissioni standard correnti";
$details_drop_2 = "Commissioni di livello correnti";
$details_drop_3 = "Approvazione in sospeso delle commissioni";
$details_drop_4 = "Commissioni standard pagate";
$details_drop_5 = "Commissioni di livello pagate";
$details_button = "Visualizza Commissioni";
$details_date = "Data";
$details_status = "Stato";
$details_commission = "Commissione";
$details_details = "Visualizza dettagli";
$details_type_1 = "Pagato";
$details_type_2 = "Approvazione in sospeso";
$details_type_3 = "Approvato - Pagamento in sospeso";
$details_none = "Nessuna commissione da visualizzare";
$details_no_group = "Nessun Gruppo Commissione selezionato";
$details_choose = "Scegliere, prego, un Gruppo Commissione qui sopra";
$general_title = "Commissioni attuali - Dall\'ultimo pagamento ad oggi";
$general_transactions = "Transazioni";
$general_earnings_to_date = "Guadagni recenti";
$general_history_link = "Visualizza la Storia dei pagamenti";
$general_standard_earnings = "Guadagni standard";
$general_current_earnings = "Guadagni attuali";
$general_traffic_title = "Statistiche del traffico";
$general_traffic_visitors = "Visitatori";
$general_traffic_unique = "Visitatori unici";
$general_traffic_sales = "Vendite totali";
$general_traffic_ratio = "Rapporto delle vendite";
$general_traffic_info = "<b>Vendite totali</b> e <b>Rapporto delle vendite</b><BR />Queste statistiche non includono commissioni ricorrenti o di livello.";
$general_traffic_pay_type = "Tipo di pagamento";
$general_traffic_pay_level = "Livello dell\'attuale pagamento";
$general_notes_title = "Note dall\'Amministratore";
$general_notes_date = "Data di creazione";
$general_notes_to = "a";
$general_notes_all = "Tutti gli Affiliati";
$general_notes_none = "Nessuna nota da visualizzare";
$contact_left_column_title = "Contattaci";
$contact_left_column_text = "Contatta, se lo desideri, i nostri affiliati usando il modulo a destra.";
$contact_title = "Contattaci";
$contact_name = "Il tuo nome";
$contact_email = "Il tuo indirizzo email";
$contact_message = "Messaggio";
$contact_chars = "caratteri a sinistra";
$contact_button = "Invia messaggio";
$contact_received = "Abbiamo ricevuto il tuo messaggio, ti preghiamo di attendere 24 ore per la risposta.";
$contact_invalid_name = "Nome non valido";
$contact_invalid_email = "Indirizzo email non valido";
$contact_invalid_message = "Messaggio non valido";
$invoice_button = "Fattura";
$invoice_header = "FATTURA DI PAGAMENTO DELLA FILIALE";
$invoice_aff_info = "Le informazioni della filiale";
$invoice_co_info = "Le informazioni";
$invoice_acct_info = "Le informazioni di cliente";
$invoice_payment_info = "Le informazioni di pagamento";
$invoice_comm_date = "Data del pagamento";
$invoice_comm_amt = "Importo della commissione";
$invoice_comm_type = "Tipo di commissione";
$invoice_admin_note = "Note dall\'Amministratore";
$invoice_footer = "ESTREMITÀ DELLA FATTURA";
$invoice_print = "Fattura della stampa";
$invoice_none = "N/A";
$invoice_aff_id = "Filiale ID";
$invoice_aff_user = "Nome utente";
$menu_pdf_marketing = "Brochure di marketing in formato PDF";
$menu_pdf_training = "Documenti sulla formazione in formato PDF";
$marketing_target_url = "URL di destinazione";
$marketing_source_code = "Codice fonte - Copia/Incolla sul sito web";
$marketing_group = "Gruppo marketing";
$peels_title = "Nome pagina peel";
$peels_view = "Visualizza questo peel";
$peels_description = "Descrizione pagina peel";
$lb_head_title = "Codice HEAD (testata) necessario per la pagina HTML";
$lb_head_description = "Per utilizzare una casella sul sito web, è necessario aggiungere le linee seguenti alla sezione HEAD (testata) della pagina in cui lo si desidera visualizzato.";
$lb_head_source_code = "Incollare questo codice nella sezione HEAD (testata) del documento HTML.";
$lb_head_code_notes = "È necessario solo mettere questo codice una volta indipendentemente da quante caselle si inseriscono nella pagina.";
$lb_head_tutorial = "Visualizza Esercitazioni";
$lb_body_title = "Nome casella";
$lb_body_description = "Descrizione casella";
$lb_body_click = "Fare clic sull \'immagine superiore per visualizzare la casella.";
$lb_body_source_code = "Incollare questo codice nella sezione BODY (corpo) del documento HTMLdove si desidera far comparire l \'immagine.";
$pdf_title = "PDF";
$pdf_training = "Documenti relativi alla formazione";
$pdf_marketing = "Brochure sul marketing";
$pdf_description_1 = "Adobe Reader è necessario per visualizzare e stampare il nostro materiale di marketing in formato PDF.";
$pdf_description_2 = "Adobe Reader è un software gratuito che può essere scaricato sul sito web di Adobe.";
$pdf_file_name = "Nome file";
$pdf_file_size = "Dimensione file";
$pdf_file_description = "Descrizione";
$pdf_bytes = "Byte";
$menu_heading_training_materials = "Materiale per esercitazioni";
$menu_videos = "Vedi video per esercitazioni";
$menu_custom_manual = "Manuale dei link di controllo personalizzati";
$menu_page_peels = "Pagine peel";
$menu_lightboxes = "Caselle";
$menu_email_templates = "Modelli e-mail";
$menu_heading_custom_links = "Link di controllo personalizzati";
$menu_custom_reports = "Rapporti";
$menu_keyword_links = "Link di controllo per parole chiave";
$menu_subid_links = "Link di controllo sotto-affiliati";
$menu_alteranate_links = "Alterna link di pagine in entrata";
$menu_heading_additional = "Strumenti aggiuntivi";
$menu_drop_heading_stats = "Statistiche generali";
$menu_drop_heading_commissions = "Commissioni";
$menu_drop_heading_history = "Cronologia pagamenti";
$menu_drop_heading_traffic = "Registro traffico";
$menu_drop_heading_account = "Account";
$menu_drop_heading_logo = "Carico il mio Logo";
$menu_drop_heading_faq = "FAQ (Domande più frequenti)";
$menu_drop_general_stats = "Statistiche generali";
$menu_drop_tier_stats = "Statistiche livelli";
$menu_drop_current = "Commissioni correnti";
$menu_drop_tier = "Commissioni correnti dei livelli";
$menu_drop_pending = "In attesa di approvazione";
$menu_drop_paid = "Approvazione pagata";
$menu_drop_paid_rec = "Commissioni dei livelli pagati";
$menu_drop_recurring = "Commissioni ricorrenti attive";
$menu_drop_edit = "Modifica il mio Account";
$menu_drop_password = "Modifica la password";
$menu_drop_change = "Modifica lo Stile della mia commissione";
$account_hidden = "nascosto";
$keyword_title = "Link di parole chiave personalizzati";
$keyword_info = "Creando un link di parole chiave personalizzato permette di controllare il traffico in entrata per diverse fonti.Crea un link con un massimo di 4 parole chiave di controllo diverse e il rapporto di controllo personalizzato mostrerà un rapporto dettagliato per ogni parola chiave creata.";
$keyword_heading = "Variabili disponibili per controllo di parole chiave personalizzato";
$keyword_tracking = "ID di controllo";
$keyword_build = "Per creare il link, prendere l \'URL seguente e apporlo con l \'ID di controllo e parola chiave che si desidera utilizzare.";
$keyword_example = "Esempio";
$keyword_tutorial = "Vedi l \'esercitazione";
$sub_tracking_title = "Controllo sotto-affiliato";
$sub_tracking_info = "La creazione di un link sotto-affiliato permette di passare il link affiliato alle proprie affiliazioni al fine di utilizzarlo. È possibile sapere chi ha generato la commissione poiché vengono riportate quali sotto-affiliazioni hanno generato la vendita. Un altro motivo per utilizzare un link affiliati è se si dispone di un proprio sistema di controllo da includere per il rapporto.";
$sub_tracking_build = "Sostituire le XXX con il numero ID dell \'affiliazione nel proprio programma di affiliazione.Ripetere questo processo per tutte le affiliazioni.";
$sub_tracking_example = "Esempio";
$sub_tracking_tutorial = "Visualizza Esercitazioni";
$sub_tracking_id = "ID sotto-affiliazione ";
$alternate_title = "Alterna link di pagine in entrata";
$alternate_option_1 = "Opzione 1 : Creazione di link automatizzata";
$alternate_heading_1 = "Creazione automatizzata di un link ";
$alternate_info_1 = "Definire la propria pagina di traffico in entrata inserendo l \'URL al quale si desidera inviare il traffico e ti sarà creato un link. Utilizzando questa funzione si crea un link da utilizzare con l \'URL inserito nel link utilizzando un numero ID nel nostro database.";
$alternate_button = "Crea il mio link";
$alternate_links_heading = "Link in entrata dell \'URL alternativo";
$alternate_links_note = "I link esistenti resteranno intatti e funzionali se viene rimosso da questa pagina un link personalizzato.";
$alternate_links_remove = "rimuovi";
$alternate_option_2 = "Opzione 2 : Creazione manuale di un link";
$alternate_info_2 = "Se si desidera apporre i propri link affiliati con un URL in entrata alternativo, utilizzare la seguente struttura.";
$alternate_variable = "Variabile dell \'URL in entrata alternativa";
$alternate_example = "Esempio";
$alternate_build = "Per creare il link, prendere l \'URL seguente e apporlo con l \'URL in entrata alternativo che si desidera utilizzare.";
$alternate_none = "Nessun link in entrata alternativo creato";
$alternate_tutorial = "Visualizza Esercitazioni";
$cr_title = "Rapporto parole chiave personalizzato";
$cr_select = "Selezionare una parola chiave";
$cr_button = "Generare rapporto";
$cr_no_results = "Nessun risultato della ricerca trovato";
$cr_no_results_info = "Prova una diversa combinazione di parole chiave";
$cr_used = "Parole chiave utilizzate";
$cr_found = "Link trovato";
$cr_times = "Tempi";
$cr_unique = "Link unici trovati";
$cr_detailed = "Rapporto link dettagliato";
$cr_export = "Esporta il rapporto in file Excel";
$cr_none = "Nessuna parola chiave trovata";
$logo_title = "Carica il logo della società";
$logo_info = "Se si desidera carica il logo della propria società, lo visualizzeremo ai clienti che inviata al nostro sito web.In tal modo potremo personalizzare l \'esperienza dei vostri clienti ogni qualvolta che ci fanno visita.";
$logo_bullet_one = "Le immagini possono essere in .jpg, .gif o .png.Non è permesso alcun contenuto flash.";
$logo_bullet_two = "Qualsiasi immagine non appropriata sarà eliminata e l \'account bloccato.";
$logo_bullet_three = "L \'immagine/logo non sarà mostrata sul nostro sito web se non viene approvata.";
$logo_bullet_size_one = "Le immagini possono avere una larghezza massima di";
$logo_bullet_size_two = "pixel e un \'altezza massima di";
$logo_bullet_req_size_one = "Le immagini devono avere una larghezza massima di";
$logo_bullet_req_size_two = "pixel e un \'altezza di";
$logo_bullet_pixels = "pixel.";
$logo_choose = "Scegli un \'immagine";
$logo_file = "Seleziona un file:";
$logo_browse = "Sfoglia...";
$logo_button = "Carica";
$logo_current = "Immagine corrente";
$logo_remove = "rimuovi";
$logo_display_status = "Stato dell \'immagine:";
$logo_pending = "In attesa di approvazione";
$logo_approved = "Approvato";
$logo_success = "L \'immagine è stata caricata con successo ed è in attesa di approvazione.";
$signup_security_title = "Verifica dell \'account ";
$signup_security_info = "Inserire il codice di sicurezza mostrato nella casella.Questa fase aiuta a prevenire accessi automatizzati.";
$signup_security_code = "Codice di sicurezza";
$sub_tracking_none = "Nessuno";
$missing_security_code = "Verifica dell \'account non corretta o mancante / Codici di sicurezza";
$alternate_success_title = "Creazione del link avvenuta con successo";
$alternate_success_info = "Prendere il link di seguito e iniziare a fornire traffico all \'URL definito.";
$alternate_failed_title = "Errore nella creazione del link";
$alternate_failed_info = "Immettere un URL valido.";
$logo_missing_filename = "Scegliere un nome file.";
$logo_required_width = "La larghezza dell \'immagine deve essere";
$logo_required_height = "L \'altezza dell \'immagine deve essere";
$logo_maximum_width = "La larghezza dell \'immagine può essere solo";
$logo_maximum_height = "L \'altezza dell \'immagine può essere solo";
$logo_size_maximum = "La dimensione dell \'immagine può essere solo di massimo";
$logo_bad_filetype = "Il tipo di immagine non è consentito. Tipi di immagine permessi sono .gif, .jpg e .png.";
$logo_upload_error = "Errore nel caricamento dell \'immagine, contattare il direttore affiliato.";
$logo_error_title = "Errore nel caricamento dell \'immagine";
$logo_error_bytes = "byte.";
$excel_title = "Rapporto sui link parole chiave personalizzati";
$excel_tab_report = "Rapporto parole chiave personalizzato";
$excel_tab_logs = "Registri traffico";
$excel_date = "Data rapporto:";
$excel_affiliate = "ID affiliazione:";
$excel_criteria = "Criteri link parole chiave";
$excel_link = "Struttura dei link ";
$excel_hits = "Hit unici";
$excel_comm_stats = "Statistiche commissioni";
$excel_comm_current = "Commissioni correnti";
$excel_comm_paid = "Commissioni pagate";
$excel_comm_total = "Commissioni totali";
$excel_comm_ratio = "Rapporto conversione";
$excel_earned = "Commissioni guadagnate";
$excel_earned_current = "Commissioni correnti";
$excel_earned_paid = "Commissioni pagate";
$excel_earned_total = "Commissioni totali guadagnate";
$excel_earned_tab = "Fare clicsulla scheda Registri Traffico (di seguito) per visualizzare il registro traffico per questo link personalizzato.";
$excel_log_title = "Registro traffico per parole chiave personalizzate";
$excel_log_ip = "Indirizzo IP";
$excel_log_refer = "URL di riferimento";
$excel_log_date = "Data";
$excel_log_time = "Ora";
$excel_log_target = "URL di destinazione";
$etemplates_title = "Modelli e-mail";
$etemplates_view_link = "Visualizza questo modello di e-mail";
$etemplates_name = "Nome modello";
$signup_maintenance_heading = "Avviso di Manutenzione";
$signup_maintenance_info = "Iscrizioni temporaneamente sospese. Per favore, riprovare in seguito.";
$marketing_group_title = "Gruppo di marketing";
$marketing_button = "Mostra";
$marketing_no_group = "Nessun gruppo selezionato";
$marketing_choose = "Per favore scegliere un gruppo di marketing di cui sopra";
$marketing_notice = "I gruppi di marketing potrebbero avere diverse pagine di traffico in entrata";
$canspam_heading = "Regolamento ed accettazione di CAN-SPAM";
$canspam_accept = "Ho letto, compreso e accettato il regolamento di CAN-SPAM.";
$canspam_error = "Non hai accettato il regolamento di CAN-SPAM.";
$signup_banned = "Si è verificato un errore durante la creazione dell\’account. Per favore contattare l\’amministratore di sistema per ulteriori informazioni.";
$header_testimonials = "Referenti affiliati";
$testi_visit = "Visita il sito web";
$testi_description = "Offrite il vostro referente per il nostro programma affiliati e noi lo posizioneremo nella nostra pagina &lt;a href=&quot;testimonials.php&quot;&gt;referenti&lt;/a&gt; con un link al vostro sito web.";
$testi_name = "Nome";
$testi_url = "URL sito web";
$testi_content = "Referente";
$testi_code = "Codice di sicurezza";
$testi_submit = "Presenta referente";
$testi_na = "I referenti non sono disponibili.";
$testi_title = "Offri un referente";
$testi_success_title = "Referente riuscito";
$testi_success_message = "Grazie per aver presentato il vostro referente. A breve il nostro team lo sottoporrà ad un controllo.";
$testi_error_title = "Errore referente";
$testi_error_name_missing = "Per favore includere il vostro nome per il vostro referente.";
$testi_error_url_missing = "Per favore includere l\’URL al vostro sito web per il vostro referente.";
$testi_error_missing = "Per favore includere un testo per il vostro referente.";
$menu_drop_delayed = "Commissioni in attesa";
$details_drop_6 = "Commissioni attuali in attesa";
$details_type_6 = "In attesa - Approvazione a breve";
$comdetails_status_6 = "In attesa - Approvazione a breve";
$tc_reaccept_title = "Notifica cambiamento Termini e condizioni";
$tc_reaccept_sub_title = "È necessario accettare i nuovi Termini e condizioni per poter accedere di nuovo al proprio account.";
$tc_reaccept_button = "Ho letto, compreso e accettato i nuovi Termini e condizioni di cui sopra.";
$tlinks_active = "Numero di livelli attivi";
$tlinks_payout_structure = "Struttura di pagamento a livelli";
$tlinks_level = "Livello";
$tierText1 = "% calcolato dall\’importo delle commissioni degli affiliati di riferimento.";
$tierText2 = "% calcolato dall\’importo delle commissioni del livello superiore.";
$tierText3 = "% calcolato dall\’importo delle vendite.";
$tierTextflat = "tasso forfettario.";
$edit_custom_button = "Modifica risposta";
$private_heading = "Iscrizione privata";
$private_info = "Il nostro programma affiliati non è aperto al pubblico e richiede un codice d\’iscrizione per aderirvi.Le informazioni su come ottenere un codice d\’iscrizione sono reperibili qui.";
$private_required_heading = "Codice d\’iscrizione richiesto";
$private_code_title = "Digitare codice d\’iscrizione";
$private_button = "Verifica codice";
$private_error_title = "Codice d\’iscrizione fornito invalido";
$private_error_invalid = "Il codice d\’iscrizione da voi fornito non è valido.";
$private_error_expired = "Il codice d\’iscrizione da voi fornito è scaduto e non è più valido.";
$qr_code_title = "Codice QR";
$qr_code_size = "Dimensione Codice QR";
$qr_code_button = "Mostra Codice QR";
$qr_code_offline_title = "Commercializzazione offline";
$qr_code_offline_content1 = "Aggiungete questo codice QR ai vostri opuscoli, volantini, biglietti da visita, ecc.";
$qr_code_offline_content2 = "- Fare click con il destro sull’immagine e <strong>salvare come</strong> nel vostro computer.";
$qr_code_online_title = "Commercializzazione online";
$qr_code_online_content = "Aggiungete questo codice QR al vostro sito web, social media, blog, ecc.";
$menu_coupon = "Codici coupon";
$coupon_title = "I vostri codici coupon disponibili";
$coupon_desc = "Distribuite questi codici coupon e guadagnate una commissione ogni volta che qualcuno usa il vostro codice!";
$coupon_head_1 = "Codice Coupon";
$coupon_head_2 = "Sconto cliente";
$coupon_head_3 = "Il vostro importo commissione";
$coupon_sale_amt = "dell\’importo vendite";
$coupon_flat_rate = "tasso forfettario";
$coupon_default = "Livello pagamento di default";
$cc_vanity_title = "Richiedi un codice coupon personalizzato";
$cc_vanity_field = "Codice coupon";
$cc_vanity_button = "Richiedi un codice coupon personalizzato";
$cc_vanity_error_missing = "<strong>Errore!</strong> Per favore inserire un codice coupon.";
$cc_vanity_error_exists = "<strong>Errore!</strong> Questo codice coupon è già stato richiesto. È in corso d’approvazione.";
$cc_vanity_error = "<strong>Errore!</strong> Codice coupon non valido. Per favore utilizzare solo lettere, numeri e underscore.";
$cc_vanity_success = "<strong>Success!</strong> Il vostro codice coupon personalizzato è stato richiesto.";
$coupon_none = "Codici coupon attualmente non disponibili.";
$pic_error_title = "Errore caricamento immagine";
$pic_missing = "Per favore scegliere un nome per il file.";
$pic_invalid = "Formato immagine non consentito. I formati immagine consentiti sono .gif, .jpg and .png.";
$pic_error = "Errore caricamento immagine, per favore contattare il manager affiliato.";
$pic_success = "L’immagine è stata caricata con successo.";
$pic_title = "Carica un\’immagine";
$pic_info = "Caricare una tua foto è di aiuto alla personalizzazione della nostra esperienza con te.";
$pic_bullet_1 = "I formati file possono essere .jpg, .gif or .png.";
$pic_bullet_2 = "Ogni immagine inappropriata sarà eliminata e il vostro account sospeso.";
$pic_bullet_3 = "La tua foto non sarà mostrata pubblicamente. Sarà connessa solo al tuo account e visibile solo a noi.";
$pic_file = "Seleziona un file:";
$pic_button = "Carica";
$pic_current = "La mia foto";
$pic_remove = "Rimuovi foto";
$progress_title = "Idoneità al prossimo pagamento:";
$progress_complete = "completo.";
$progress_none = "Non richiediamo un pagamento minimo.";
$progress_sentence_1 = "Hai guadagnato";
$progress_sentence_2 = "del";
$progress_sentence_3 = "requisito.";
$aff_lib_button = "<b>Riscuoti il tuo accesso gratuito a</b><br>www.AffiliateLibrary.com";
$menu_announcements = "Campagne sui social media";
$announcements_name = "Nome campagna";
$announcements_facebook_message = "Messaggio Facebook";
$announcements_twitter_message = "Messaggio Twitter";
$announcements_facebook_link = "Collegamento Facebook";
$announcements_facebook_picture = "Immagine Facebook";
$general_last_30_days_activity = "Attività degli ultimi 30 giorni";
$general_last_30_days_activity_traffic = "Traffico";
$general_last_30_days_activity_commissions = "Commissioni";
$accountability_title = "Trasparenza e comunicazione";
$accountability_text = "<strong>Cos\'è?</strong><p>Usiamo un approccio proattivo per creare un rapporto di fiducia con i nostri affiliati. Il nostro obiettivo è assicurare la disponibilità di ogni informazione possibile su tutte le commissioni guadagnate e/o rifiutate nel nostro sistema.</p><strong>Comunicazione</strong><p>Siamo disponibili a fornire dettagli su tutte le commissioni rifiutate. Comunichiamo puntualmente con i nostri affiliati e siamo lieti di ricevere le loro domande e il loro feedback.</p>";
$debit_reason_0 = "Nessuno";
$debit_reason_1 = "Rimborso";
$debit_reason_2 = "Storno";
$debit_reason_3 = "Frode segnalata";
$debit_reason_4 = "Ordine annullato";
$debit_reason_5 = "Rimborso parziale";
$menu_drop_pending_debits = "Debiti in sospeso";
$debit_amount_label = "Importo a debito";
$debit_date_label = "Data del debito";
$debit_reason_label = "Motivo del debito";
$debit_paragraph = "I debiti saranno dedotti dal tuo prossimo pagamento.";
$debit_invoice_amount = "Meno importo a debito";
$debit_revised_amount = "Importo pagamento rivisto";
$mv_head_description = "Nota: puoi collocare solo un video per ogni pagina del tuo sito internet.";
$mv_head_source_code = "Incolla questo codice nella sezione HEAD del tuo documento HTML.";
$mv_body_title = "Titolo del video";
$mv_body_description = "Descrizione";
$mv_body_source_code = "Incolla questo codice nella sezione BODY del tuo documento HTML dove vuoi che compaia il video.";
$menu_marketing_videos = "Video";
$mv_preview_button = "Antemprima video";
$dt_no_data = "Non ci sono dati disponibili nella tabella.";
$dt_showing_exists = "Sono visualizzate da _START_ a _END_ di _TOTAL_ voci.";
$dt_showing_none = "Sono visualizzate da 0 a 0 di 0 voci.";
$dt_filtered = "(filtrato da _MAX_ voci totali)";
$dt_length_choice = "Mostra _MENU_ voci.";
$dt_loading = "Caricamento...";
$dt_processing = "Elaborazione...";
$dt_no_records = "Nessun record corrispondente trovato.";
$dt_first = "Primo";
$dt_last = "Ultimo";
$dt_next = "Successivo";
$dt_previous = "Precedente";
$dt_sort_asc = ": attiva per ordinare le colonne in ordine crescente";
$dt_sort_desc = ": attiva per ordinare le colonne in ordine decrescente";
$choose_marketing_group = "Scegli un Gruppo di Marketing";
$email_already_used_1 = "Impossibile creare l\"account. Consentiamo solo la creazione di";
$email_already_used_2 = "account";
$email_already_used_3 = "per ogni indirizzo email.";
$missing_fax = "Inserisci il tuo numero di fax.";
$chart_last_6_months = "Commissioni pagate negli ultimi 6 mesi";
$chart_last_6_months_paid = "Commissioni pagate";
$chart_this_month = "I nostri migliori 5 affiliati di questo mese";
$chart_this_month_none = "Non ci sono dati da visualizzare.";
$login_return = "Torna alla homepage Affiliati";
$login_lost_details = "Inserisci il tuo nome utente e ti invieremo un\"email con i tuoi dati di accesso.";
$account_edit_general_prefs = "Preferenze generali";
$account_edit_email_language = "Lingua email";
$footer_connect = "Connettiti con noi";
$modal_close = "Chiudi";
$vat_amount_heading = "Importo IVA";
$menu_logout = "Esci";
$menu_upload_picture = "Carica la tua foto";
$menu_offer_testi = "Offri una testimonianza";
$fb_login = "Accedi con Facebook";
$fb_permissions = "Autorizzazione non concessa. Consenti al sito internet di usare il tuo indirizzo email.";
$announcements_published = "Annuncio pubblicato";
$training_videos_title = "Video didattici";
$training_videos_general = "Marketing generale";
$commission_method = "Modalità di calcolo delle commissioni";
$how_will_you_earn = "Come riceverai le commissioni?";
$pm_account_credit = "Accrediteremo l’importo delle commissioni guadagnate sul tuo account.";
$pm_check_money_order = "Ti invieremo un assegno/trasferimento di denaro per posta.";
$pm_paypal = "Ti invieremo un pagamento con PayPal.";
$pm_stripe = "Ti invieremo un pagamento con Stripe.";
$pm_wire = "Ti invieremo un bonifico bancario.";
$add_to_signup_left_column_text = "<span style=\"color:#CC0000; font-style:italic;\">* indica un campo richiesto.</span>";
$paypal_email = "Email Paypal";
$stripe_acct_details = "Dati account Stripe";
$stripe_connect = "Puoi connetterti al tuo account Stripe dalla pagina della configurazione dell’account dopo aver effettuato l’accesso.";
$stripe_success = "Account Stripe collegato correttamente";
$stripe_settings = "Impostazioni Stripe";
$stripe_connect_edit = "Connetti con Stripe";
$stripe_delete = "Elimina account Stripe";
$stripe_confirm = "Confermi di voler eliminare questo account?";
$payment_settings = "Impostazioni di pagamento";
$edit_payment_settings = "Modifica impostazioni di pagamento";
$invalid_paypal_address = "Indirizzo email di Paypal non valido.";
$payment_method_error = "Selezionare una modalità di pagamento.";
$payment_settings_updated = "Impostazioni di pagamento aggiornate.";
$stripe_removed = "Account di Stripe eliminato.";
$payment_settings_success = "Eseguito!";
$payment_update_notice_1 = "Avviso!";
$payment_update_notice_2 = "Hai scelto di ricevere un pagamento <strong>[payment_option_here]</strong> da noi. <a href=\"account.php?page=48\" style=\"font-weight:bold;\">Clicca qui</a> per collegare il tuo account <strong>[payment_option_here]</strong>.";
$pm_title_credit = "Credito sull\'account";
$pm_title_mo = "Assegno/Vaglia postale";
$pm_title_paypal = "PayPal";
$pm_title_stripe = "Stripe";
$pm_title_wire = "Bonifico bancario";
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