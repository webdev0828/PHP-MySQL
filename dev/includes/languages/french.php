<?PHP

//-------------------------------------------------------
	  $language_pack_name = "french";
	  $language_pack_table_name = "french";
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
$header_title = "Programme d\'affiliation";
$header_indexLink = "Accueil";
$header_signupLink = "Inscrivez-vous maintenant";
$header_accountLink = "Gestion du compte";
$header_emailLink = "Contactez-nous";
$header_greeting = "Bienvenu";
$header_nonLogged = "Invité";
$header_logout = "Fermer la session ici";
$footer_tag = "Logiciel d\'affiliation d\'iDevAffiliate";
$footer_copyright = "Copyright 2006";
$footer_rights = "Tous droits réservés";
$index_heading_1 = "Bienvenu à notre programme d\'affiliation";
$index_paragraph_1 = "L\'accès à notre programme est gratuit, s\'inscrire est simple et aucun savoir-faire technique n\'est requis. Les programmes d\'affiliation sont très courant à travers l\'Internet et offrent aux propriétaires de site Web une manière additionnelle de tirer profit de leur site Web. Les affiliés génèrent un flux de clientèle et de vente pour les sites web commerciaux et reçoivent un salaire à la commission en contrepartie.";
$index_heading_2 = "Comment est-ce que ça fonctionne ?";
$index_paragraph_2 = "Lorsque vous accédez à un programme d\'affiliation, une série de bannières et de liens textuels que vous pouvez intégrer librement dans votre site, vous est fournie. Lorsqu\'un utilisateur clique sur un de ces liens, il est amené vers notre site web et son activité est suivie par notre logiciel d\'affiliation. Vous gagnerez une commission basée sur la nature de cette commission.";
$index_heading_3 = "Des statistiques et comptabilisation en temps réel !";
$index_paragraph_3 = "Ouvrer une session 24 heures sur 24 et vérifiez vos ventes, votre flux de clientèle, le statut de votre compte et la prestation de vos bannières.";
$index_login_title = "Ouverture de session en tant qu\'affilié";
$index_login_username = "Nom d\'utilisateur";
$index_login_password = "Mot de passe";
$index_login_username_field = "nom d\'utilisateur";
$index_login_password_field = "mot de passe";
$index_login_button = "Ouverture de session";
$index_login_signup_link = "Cliquez ici pour s\'inscrire";
$index_table_title = "Détails de programme";
$index_table_commission_type = "Type de commission";
$index_table_initial_deposit = "Dépôt initial";
$index_table_requirements = "Conditions de remboursement";
$index_table_duration = "Période de remboursement";
$index_table_choose = "Faites votre choix parmi les options de remboursement";
$index_table_sale = "Paiement-par-vente";
$index_table_click = "Paiement-par-clic";
$index_table_sale_text = "pour chaque vente réalisée";
$index_table_click_text = "pour chaque clic effectué";
$index_table_deposit_tag = "Simplement pour s\'inscrire !";
$index_table_requirements_tag = "Le solde minimum requis pour remboursement";
$index_table_duration_tag = "Les paiements sont effectués une fois par mois, pour le mois précédent.";
$signup_left_column_text = "Joignez notre programme d\'affiliation et gagnez de l\'argent pour chaque vente que vous envoyez ! Créez uniquement votre compte, placez le lien sur votre site web et regardez comment le solde de votre compte s\'accroît lorsque vos visiteurs deviennent nos clients.";
$signup_left_column_title = "Bienvenu affilié !";
$signup_login_title = "Créer votre compte";
$signup_login_username = "Nom d\'utilisateur";
$signup_login_password = "Mot de passe";
$signup_login_password_again = "Confirmation mot de passe";
$signup_login_minmax_chars = "- Le nom d'utilisateur doit avoir la longueur minimale suivante : user_min_chars.&lt;br /&gt;- Le nom d'utilisateur peut être alpha-numérique.&lt;br /&gt;- Le nom d'utilisateur peut contenir les caractères suivants:  _ (tirets bas uniquement)&lt;br /&gt;&lt;br /&gt;- Le mot de passe doit avoir la longueur minimale suivante pass_min_chars.&lt;br /&gt;- Le mot de passe peut être alpha-numérique.&lt;br /&gt;- Le mot de passe peut contenir ces caractères :  characters_allowed";
$signup_login_must_match = "Cette entrée doit correspondre à l\'entrée du mot de passe";
$signup_standard_title = "Information de référence";
$signup_standard_email = "Adresse électronique";
$signup_standard_company = "Nom de l\'entreprise";
$signup_standard_checkspayable = "Les chèques à l\'ordre de";
$signup_standard_weburl = "Adresse site web";
$signup_standard_taxinfo = "Numéro de CA, SSN ou TVA";
$signup_personal_title = "Information personnelle";
$signup_personal_fname = "Prénom";
$signup_personal_state = "Etat ou province";
$signup_personal_lname = "Nom";
$signup_personal_phone = "Numéro de téléphone";
$signup_personal_addr1 = "Rue";
$signup_personal_fax = "Numéro de télécopie";
$signup_personal_addr2 = "Adresse additionnelle";
$signup_personal_zip = "Code postal";
$signup_personal_city = "Ville";
$signup_personal_country = "Pays";
$signup_commission_title = "Paiement commission";
$signup_commission_howtopay = "Comment payer ?";
$signup_commission_style_PPS = "Paiement-par-vente";
$signup_commission_style_PPC = "Paiement-par-clic";
$signup_terms_title = "Conditions générales";
$signup_terms_agree = "J\'ai lu, pris conscience et consente aux conditions.";
$signup_page_button = "Créer mon compte";
$signup_success_email_comment = "Nous vous avons envoyé un courriel avec votre nom d\'utilisateur et mot de passe.<BR />Conservez-le pour une utilisation ultérieure.";
$signup_success_login_link = "Connectez-vous à votre compte";
$custom_fields_title = "Champs définis par l\'utilisateur";
$logout_msg = "<b>A présent, votre session est fermée</b><BR />Merci de votre participation à notre programme d\'affiliation.";
$signup_page_success = "Votre compte a été créé";
$login_left_column_title = "Connectez-vous à votre compte";
$login_left_column_text = "Entrer votre nom d\'utilisateur et mot de passe afin d\'accéder aux statistiques de votre compte, à vos bannières, liens, FAQ et plus encore.<BR/ ><BR/ >Si vous avez oublié votre mot de passe, entrez votre nom d\'utilisateur et nous vous ferons parvenir votre information de connexion par courriel.<BR /><BR />";
$login_title = "Connectez-vous à votre compte";
$login_username = "Nom d\'utilisateur";
$login_password = "Mot de passe";
$login_invalid = "Identification de connexion non valide";
$login_now = "Connexion à mon compte";
$login_send_title = "Vous avez besoin de votre mot de passe ?";
$login_send_username = "Introduisez votre nom d\'utilisateur";
$login_send_info = "Les détails d\'identification de connexion sont envoyés par courriel";
$login_send_pass = "Envoyez par courriel";
$login_send_bad = "Nom d\'utilisateur non trouvé";
$help_new_password_heading = "Nouveau mot de passe";
$help_new_password_info = "Votre mot de passe doit avoir la longueur minimale suivante : pass_min_chars. Il peut contenir uniquement des lettres, des nombres et les caractères suivants :  characters_allowed";
$help_confirm_password_heading = "Confirmer le nouveau mot de passe";
$help_confirm_password_info = "Cette entrée de mot de passe doit correspondre à l\'entrée du nouveau mot de passe";
$help_custom_links_heading = "Répérage mot clé";
$help_custom_links_info = "Votre mot clé ne peut contenir plus de 30 caractères. Il peut contenir uniquement des lettres, des chiffres et des traits de soulignement.";
$error_title = "Les erreurs suivantes ont été détectées";
$username_invalid = "Nom d\'utilisateur invalide. Peut contenir uniquement des lettres, des nombres et des tirets bas.";
$username_taken = "Le nom d\'utilisateur a déjà été choisi.";
$username_short = "Votre nom d\'utilisateur est trop court, il doit au moins contenir 4 caractères.";
$username_long = "Votre nom d\'utilisateur est trop long, il peut contenir que 12 caractères au maximum.";
$password_invalid = "Mot de passe invalide. Peut contenir uniquement des lettres, des nombres et les caractères suivants :  characters_allowed";
$password_short = "Votre mot de passe est trop court, il doit au moins contenir 4 caractères.";
$password_long = "Votre mot de passe est trop long, il peut contenir que 12 caractères au maximum.";
$password_mismatch = "L\'entrée de votre mot de passe ne correspond pas.";
$missing_checks = "Veuillez entrer un nom de bénéficiaire afin de rédiger les chèques à l\'ordre de ce bénéficiaire.";
$missing_tax = "Veuillez entrer votre numéro CA, SSN ou information TVA.";
$missing_fname = "Veuillez entrer votre prénom.";
$missing_lname = "Veuillez entrer votre nom.";
$missing_email = "Veuillez entrer votre adresse électronique.";
$invalid_email = "Votre adresse électronique est non valide.";
$missing_address = "Veuillez entrer votre rue.";
$missing_city = "Veuillez entrer votre ville.";
$missing_company = "Veuillez entrer le nom de votre entreprise.";
$missing_state = "Veuillez entrer votre ville ou province.";
$missing_zip = "Veuillez entrer votre code postal.";
$missing_phone = "Veuillez entrer votre numéro de téléphone.";
$missing_website = "Veuillez entrer votre adresse de site web.";
$missing_paypal = "Vous avez choisi à recevoir les paiements par PayPal, veuillez entrer votre compte PayPal.";
$missing_terms = "Vous n\'avez pas accepté les conditions générales.";
$paypal_required = "Un compte PayPal est requis pour le paiement.";
$missing_custom = "Veuillez compléter le champ dénommé :";
$account_total_transactions = "Total des transactions";
$account_standard_linking_code = "Le code des liens par défaut - Parfait pour une utilisation dans les courriels !";
$account_copy_paste = "Copier/Coller le code précédent dans votre site web ou courriels";
$account_not_approved = "Votre compte est actuellement en cours d\'approbation";
$account_suspended = "Votre compte est actuellement suspendu";
$account_standard_earnings = "Revenus standard";
$account_inc_bonus = "comprennent des bonus";
$account_second_tier = "Revenus de niveau";
$account_recurring = "Revenus récurrents";
$account_not_available = "N/D";
$account_earned_todate = "La somme des revenus à ce jour";
$menu_heading_overview = "Aperçu compte";
$menu_general_stats = "Statistiques générales";
$menu_tier_stats = "Statistiques de niveau";
$menu_payment_history = "Historique paiements";
$menu_commission_details = "Détails commissions";
$menu_recurring_commissions = "Commissions récurrentes";
$menu_traffic_log = "Journal du trafic d\'entrée";
$menu_heading_marketing = "Matériel de marketing";
$menu_banners = "Bannières";
$menu_text_ads = "Petites annonces de texte";
$menu_text_links = "Liens textuels";
$menu_email_links = "Liens courriel";
$menu_html_links = "Petites annonces HTML";
$menu_offline = "Marketing en différé";
$menu_tier_linking_code = "Code des liens de niveau";
$menu_email_friends = "Courriel amis & associés";
$menu_custom_links = "Créer & suivre vos propres liens";
$menu_heading_management = "La gestion de compte";
$menu_comalert = "Configuration CommissionAlert";
$menu_comstats = "Configuration CommissionStats";
$menu_edit_account = "Modifier mon compte";
$menu_change_pass = "Modifier mon mot de passe";
$menu_change_commission = "Modifier le modèle de mes commissions";
$menu_heading_general_info = "Information générale";
$menu_browse_affiliates = "Naviguer vers d\'autres affiliés";
$menu_faq = "Foire aux Questions";
$suspended_title = "Alerte état de compte";
$suspended_heading = "Votre compte est actuellement suspendu";
$suspended_notes = "Avis gestionnaire";
$pending_title = "Alerte état de compte";
$pending_heading = "Votre compte est actuellement en cours d\'approbation";
$pending_note = "Le matériel de marketing sera mise à votre disposition dès que votre compte sera approuvé.";
$faq_title = "Foire aux Questions";
$faq_none = "Pas de FAQ à présent";
$browse_title = "Naviguer vers d\'autres affiliés";
$browse_none = "Il n\'y a pas d\'autres affiliés à visualiser";
$change_comm_title = "Modifier le modèle de commissions";
$change_comm_curr_comm = "Le modèle de commissions actuel";
$change_comm_curr_pay = "Niveau de remboursement actuel";
$change_comm_new_comm = "Nouveau modèle de commission";
$change_comm_warning = "Lorsque vous modifier les modèles de commissions, votre compte sera réinitialisé au niveau de rembousement 1";
$change_comm_button = "Modifier les modèles de commissions";
$change_comm_no_other = "Il n\'y a pas d\'autres modèles de commissions disponible";
$change_comm_level = "Niveau ";
$change_comm_updated = "Modèle de commissions mis à jour";
$password_title = "Modifier mon mot de passe";
$password_old_password = "Ancien mot de passe";
$password_new_password = "Nouveau mot de passe";
$password_confirm_password = "Confirmer le nouveau mot de passe";
$password_button = "Modifier le mot de passe";
$password_warning_old_missing = "L\'ancien mot de passe est faux ou manquant";
$password_warning_new_missing = "L\'entrée du nouveau mot de passe est manquante";
$password_warning_mismatch = "Le nouveau mot de passe ne correspond pas";
$password_warning_invalid = "Mot de passe non valide - Cliquez sur les liens d\'assistance";
$password_notice = "Mot de passe mis à jour";
$edit_failed = "Mise à jour échouée - Voir au-dessus Erreurs";
$edit_success = "Compte mis à jour";
$edit_button = "Modifier mon compte";
$commissionstats_title = "Configuration CommissionStats";
$commissionstats_info = "L\'installation de CommissionStats vous permet de vérifier vos statistiques immédiatement à partir du bureau Windows ! Pour installer ce dispositif, télécharger CommissionStats et <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>unzip</b></a> le progiciel sur votre disque dur, ensuite exécuter le fichier <b>setup.exe</b> .Après la sollicitation de votre information de connexion, entrer les détails suivants.";
$commissionstats_hint = "Conseil : Copier & Coller chaque entrée afin d\'assurer l\'exactitude";
$commissionstats_profile = "Nom de profil";
$commissionstats_username = "Nom d\'utilisateur";
$commissionstats_password = "Mot de passe";
$commissionstats_id = "ID Affilié";
$commissionstats_source = "URL du chemin de source";
$commissionstats_download = "Télécharger CommissionStats";
$commissionalert_title = "Configuration CommissionAlert";
$commissionalert_info = "En installant CommissionAlert nous vous notifions sur les nouvelles commissions, immédiatement sur votre bureau Windows ! Pour installer ce dispositif, télécharger CommissionAlert et <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>unzip</b></a> le progiciel sur votre disque dur, ensuite exécuter le fichier <b>setup.exe</b> . Après sollicitation de votre information de connexion, entrer les détails suivants.";
$commissionalert_hint = "Conseil : Copier & Coller chaque entrée afin d\'assurer l\'exactitude";
$commissionalert_profile = "Nom de profil";
$commissionalert_username = "Nom d\'utilisateur";
$commissionalert_password = "Mot de passe";
$commissionalert_id = "ID Affilié";
$commissionalert_source = "URL du chemin de source";
$commissionalert_download = "Télécharger CommissionAlert";
$offline_title = "Marketing en différé";
$offline_paragraph_one = "Gagner de l\'argent en promouvant notre site web (en différé) à vos amis et associés !";
$offline_send = "Envoyer les clients à";
$offline_page_link = "visionner la page";
$offline_paragraph_two = "Vos clients introduiront votre <b>Numéro ID d\'affilié</b> dans la case de la page au-dessus ce qui vous enregistrera en tant qu\'affilié pour tous les achats qu\'ils effectueront.";
$banners_title = "Bannières";
$banners_size = "Taille bannières";
$banners_description = "Description bannières";
$ad_title = "Petites annonces de texte";
$ad_info = "En utilisant le code de liens fourni, vous pouvez ajuster le <b>l\'agencement de couleurs</b>, <b>hauteur</b> et <b>largeur</b> de votre petite annonce afin de l\'intégrer facilement dans votre site web !";
$links_title = "Les liens textuels";
$email_title = "Liens courriel";
$email_group = "Groupe marketing";
$email_button = "Afficher les liens courriel";
$email_no_group = "Il n\'y a aucun groupe sélectionné";
$email_choose = "Veuillez choisir un groupe marketing ci-dessus";
$email_notice = "Les groupes marketing peuvent posséder des diverses pages de trafic entrant";
$email_ascii = "<b>ASCII/Text Version</b> - Pour une utilisation dans des courriels à plein texte.";
$email_html = "<b>HTML Version</b> - Pour une utilisation dans des courriels à format HTML.";
$email_test = "Lien d\'essai";
$email_test_info = "C\'est l\'emplacement vers lequel vos clients seront acheminés dans notre site web.";
$email_source = "Code source - Copier/coller dans votre courriel";
$html_title = "Petites annonces HTML";
$html_view_link = "Visualiser cette petite annonce HTML";
$traffic_title = "Journal du trafic d\'entrée";
$traffic_display = "Afficher le dernier";
$traffic_display_visitors = "Visiteurs";
$traffic_button = "Visualiser le journal de trafic";
$traffic_title_details = "Les détails sur le trafic entrant";
$traffic_ip = "Adresse IP";
$traffic_refer = "URL de référence";
$traffic_date = "Date";
$traffic_time = "Heure";
$traffic_bottom_tag_one = "Affichant le dernier";
$traffic_bottom_tag_two = "des";
$traffic_bottom_tag_three = "visiteurs uniques";
$traffic_none = "Le journal de trafic est inexistant";
$traffic_no_url = "N/D - Eventuel signet ou lien courriel";
$traffic_box_title = "Compléter l\'URL de référence";
$traffic_box_info = "Cliquez sur le lien pour visiter le site web";
$payment_title = "Historique paiements";
$payment_date = "Date paiement";
$payment_commissions = "Commissions";
$payment_amount = "Montant du paiement";
$payment_totals = "Totals";
$payment_none = "Aucun historique de paiement n\'existe";
$tier_stats_title = "Statistiques de niveau";
$tier_stats_accounts = "Comptes de niveau";
$tier_stats_grab_link = "Saisir votre code de lien de niveau";
$tier_stats_none = "Aucun compte de niveau existe";
$tier_stats_username = "Nom d\'utilisateur";
$tier_stats_current = "Commissions actuelles";
$tier_stats_previous = "Les remboursements précédents";
$tier_stats_totals = "Totals";
$recurring_title = "Les commissions récurrentes";
$recurring_none = "Aucune commission récurrente n\'existe";
$recurring_date = "Date de la commission";
$recurring_status = "Le statut récurrent";
$recurring_payout = "Prochain remboursement";
$recurring_amount = "Montant";
$recurring_every = "Chaque";
$recurring_in = "Dans";
$recurring_days = "Jours";
$recurring_total = "Total";
$tlinks_title = "Ajouter d\'autres à votre niveau et gagnez de l\'argent avec eux également !";
$tlinks_embedded_one = "L\'enregistrement de crédit de niveau est déjà activé dans vos liens d\'affiliés standard !";
$tlinks_embedded_two = "Vous deviendrai le top de niveau pour tous ceux qui veulent joindre notre programme d\'affiliation à travers votre lien d\'affilié.";
$tlinks_embedded_current = "Remboursement actuel de niveau";
$tlinks_forced_two = "Utiliser le code suivant pour promouvoir notre programme d\'affiliation à d\'autres propriétaires de site web.";
$tlinks_forced_code = "Code de liens textuels";
$tlinks_forced_paste = "Copier/coller le code précédent dans votre site web";
$tlinks_forced_money = "Les webmasters, gagnez de l\'argent ici !";
$comdetails_title = "Détails de commission";
$comdetails_date = "Date de la commission";
$comdetails_time = "Heure de la commission";
$comdetails_type = "Type de commission";
$comdetails_status = "Statut actuel";
$comdetails_amount = "Montant de la commission";
$comdetails_additional_title = "Des détails supplémentaires de la commission";
$comdetails_additional_ordnum = "Numéro d\'ordre";
$comdetails_additional_saleamt = "Montant de la vente";
$comdetails_type_1 = "Commission de bonus";
$comdetails_type_2 = "Commission récurrente";
$comdetails_type_3 = "Commission de niveau";
$comdetails_type_4 = "Commission par défaut";
$comdetails_status_1 = "Payé";
$comdetails_status_2 = "Paiement approuvé - en suspens";
$comdetails_status_3 = "Approbation en cours";
$comdetails_not_available = "N/D";
$details_title = "Détails de la commission";
$details_drop_1 = "Les commissions standard actuelles";
$details_drop_2 = "Les commissions de niveau actuelles";
$details_drop_3 = "Les commissions en cours d\'approbation";
$details_drop_4 = "Les commissions standard payées";
$details_drop_5 = "Les commissions de niveau payées";
$details_button = "Visualiser les commissions";
$details_date = "Date";
$details_status = "Statut ";
$details_commission = "Commission";
$details_details = "Visualiser les détails";
$details_type_1 = "Payé";
$details_type_2 = "En cours d\'approbation";
$details_type_3 = "Paiement approuvé - en suspens";
$details_none = "Il n\'y a pas de commissions à visualiser";
$details_no_group = "Aucun groupe de commission a été sélectionné";
$details_choose = "Veuillez choisir un groupe de commission ci-dessus";
$general_title = "Les commissions actuelles - à partir du dernier remboursement jusqu\'à aujourd\'hui";
$general_transactions = "Transactions";
$general_earnings_to_date = "Les revenus jusqu\'à aujourd\'hui";
$general_history_link = "Visualiser l\'historique de paiements";
$general_standard_earnings = "Revenus standard";
$general_current_earnings = "Revenus actuels";
$general_traffic_title = "Les statistiques du trafic";
$general_traffic_visitors = "Visiteurs";
$general_traffic_unique = "visiteurs uniques";
$general_traffic_sales = "Total des ventes";
$general_traffic_ratio = "Ratio des ventes";
$general_traffic_info = "<b>Total des ventes</b> et <b>le ratio des ventes</b><BR />Ces statistiques n\'incluent pas les commissions récurrentes ou de niveau.";
$general_traffic_pay_type = "Modèle de remboursement";
$general_traffic_pay_level = "Niveau de remboursement actuel";
$general_notes_title = "Remarques du gestionnaire";
$general_notes_date = "Date créée";
$general_notes_to = "pour";
$general_notes_all = "tous les affiliés";
$general_notes_none = "Aucune note n\'est à visualiser";
$contact_left_column_title = "Contactez-nous";
$contact_left_column_text = "N\'hésitez pas à contacter le gestionnaire des affiliés en utilisant le formulaire sur la droite.";
$contact_title = "Contactez-nous";
$contact_name = "Votre nom";
$contact_email = "Votre adresse électronique";
$contact_message = "Message";
$contact_chars = "caractères restants";
$contact_button = "Envoyer le message";
$contact_received = "Nous avons bien reçu votre message. Veuillez nous accorder 24 heures pour y répondre.";
$contact_invalid_name = "Nom non valide";
$contact_invalid_email = "Adresse électronique non valide";
$contact_invalid_message = "Message non valide";
$invoice_button = "Facture";
$invoice_header = "FACTURE DE PAIEMENT DE FILIALE";
$invoice_aff_info = "L\'information de filiale";
$invoice_co_info = "L\'information";
$invoice_acct_info = "L\'information de compte";
$invoice_payment_info = "L\'information de paiement";
$invoice_comm_date = "Date paiement";
$invoice_comm_amt = "Montant de la commission";
$invoice_comm_type = "Type de commission";
$invoice_admin_note = "Remarques du gestionnaire";
$invoice_footer = "FIN DE FACTURE";
$invoice_print = "Facture d\'impression";
$invoice_none = "N/A";
$invoice_aff_id = "Filiale";
$invoice_aff_user = "Nom d\'utilisateur";
$menu_pdf_marketing = "Brochures marketing PDF";
$menu_pdf_training = "Documents formation PDF";
$marketing_target_url = "URL Cible";
$marketing_source_code = "Code Source – Copiez / Collez dans votre site Web";
$marketing_group = "Groupe marketing";
$peels_title = "Nom Page Peel";
$peels_view = "Voir ce Peel";
$peels_description = "Description Page Peel";
$lb_head_title = "Code HEAD nécessaire pour votre page";
$lb_head_description = "Si vous voulez utiliser une lightbox dans votre site, vous devez ajouter les lignes suivantes à la section HEAD de la page sur laquelle vous voulez l\'afficher.";
$lb_head_source_code = "Collez ce code dans la section HEAD de votre documentHTML.";
$lb_head_code_notes = "Vous ne devez coller ce code qu\'une seule fois, quel que soit le nombre de lightboxes que vous souhaitez placer sur votre page.";
$lb_head_tutorial = "Voir tutoriel";
$lb_body_title = "Nom de la lightbox";
$lb_body_description = "Description de la lightbox";
$lb_body_click = "Cliquez sur l\'image ci-dessus pour voir la lightbox";
$lb_body_source_code = "Collez ce code dans la section BODY de votre document HTML, à l\'emplacement où vous souhaitez faire apparaitre l\'image.";
$pdf_title = "PDF";
$pdf_training = "Documentsformation";
$pdf_marketing = "Brochures marketing";
$pdf_description_1 = "Vous devez avoir installé Adobe Reader pour visualiser et imprimer nos documents marketing PDF";
$pdf_description_2 = "Téléchargez gratuitement Adobe Reader depuis le site internet d\'Adobe.";
$pdf_file_name = "Nom du fichier";
$pdf_file_size = "Taille du fichier";
$pdf_file_description = "Description";
$pdf_bytes = "Bytes";
$menu_heading_training_materials = "Documents formation";
$menu_videos = "Regardez les vidéos de formation";
$menu_custom_manual = "Liens formation personnalisés";
$menu_page_peels = "Page Peels";
$menu_lightboxes = "Lightboxes";
$menu_email_templates = "Modèles email";
$menu_heading_custom_links = "Liens de traçage personnalisés";
$menu_custom_reports = "Rapports";
$menu_keyword_links = "Liens de traçage par mots-clés";
$menu_subid_links = "Liens de traçage par sous-affiliés";
$menu_alteranate_links = "Liens de page d\'entrée alternatives";
$menu_heading_additional = "Outils additionnels";
$menu_drop_heading_stats = "Statistiques générales";
$menu_drop_heading_commissions = "Commissions";
$menu_drop_heading_history = "Historique des paiements";
$menu_drop_heading_traffic = "Log trafic";
$menu_drop_heading_account = "Mon compte";
$menu_drop_heading_logo = "Téléchargement de mon logo";
$menu_drop_heading_faq = "FAQ";
$menu_drop_general_stats = "Statistiques générales";
$menu_drop_tier_stats = "Statistiques Niveaux";
$menu_drop_current = "Commissions actuelles";
$menu_drop_tier = "Commissions actuelles niveaux";
$menu_drop_pending = "Approbation en attente";
$menu_drop_paid = "Approbation payée";
$menu_drop_paid_rec = "Commissions niveaux payées";
$menu_drop_recurring = "Commissions récurrentes actives";
$menu_drop_edit = "Edition de moncompte";
$menu_drop_password = "Changer mon mot de passe";
$menu_drop_change = "Changer mon type de commission";
$account_hidden = "Caché";
$keyword_title = "Liens mots-clés personnalisés";
$keyword_info = "La création d\'un lien mots-clés personnalisévous offre la possibilité de suivre le trafic en provenance de plusieurs sources. Créer un lien avec jusqu\'à 4 mots-clés de traçage différents ainsi qu\'un rapport de traçage personnalisé vous permettra de consulter un rapport détaillé pour chaque mot-clé que vous créez.";
$keyword_heading = "Variables disponibles pour le traçage par mot-clé personnalisé";
$keyword_tracking = "Identification traçage";
$keyword_build = "Pour créer votre lien, utilisez l\'URL suivante et ajoutez-la à l\'identification de traçage et au mot-clé que vous souhaitez utiliser.";
$keyword_example = "Exemple";
$keyword_tutorial = "Voir le tutoriel";
$sub_tracking_title = "Traçage sous-affilié";
$sub_tracking_info = "Créer un lien sous-affilié vous permet de transmettre votre lien affilié à vos propres affiliés. Vous saurez ainsi qui a généré votre commission puisque vous aurez accès au rapport des ventes générées par vos sous-affiliés. Une autre raison qui rend l\'utilisation d\'un lien de sous-affiliation utile est que vous disposez de votre propre système de traçage, que vous pouvez vouloir inclure dans les rapports.";
$sub_tracking_build = "Remplacez XXX avec le numéro d\'identification de votre affilié dans votre programme d\'affiliation. Répétez ce processus pour tous vos affiliés.";
$sub_tracking_example = "Exemple";
$sub_tracking_tutorial = "Voir tutoriel";
$sub_tracking_id = "Numéro d\'identification sous-affilié";
$alternate_title = "Page de liens d\'entrée alternative";
$alternate_option_1 = "Option 1 : création de liens automatisée";
$alternate_heading_1 = "Création de liens automatisée";
$alternate_info_1 = "Définissez vous-même votre propre trafic entrant en saisissant l\'URL auprès de laquelle vous souhaitez voir le trafic délivré et nous créerons un lien pour vous. Avec cette option, vous créez un lien plus court que vous utiliserez avec l\'URL embarquée dans le lien à l\'aide d\'un numéro d\'identification présent dans notre base de données.";
$alternate_button = "Créer mon lien";
$alternate_links_heading = "Mes URL d\'entrée alternative";
$alternate_links_note = "Les liens existant resteront fonctionnels si vous retirés un lien personnalisé de cette page.";
$alternate_links_remove = "enlever";
$alternate_option_2 = "Option 2: Création manuelle de liens";
$alternate_info_2 = "Si vous préférez ajouter vos propres liens affiliés avec une URL d\'entrée alternative, utilisez la structure suivante";
$alternate_variable = "Variable d\'URL d\'entrée alternative";
$alternate_example = "Exemple";
$alternate_build = "Pour créer votre lien, utilisez l\'URL suivante et ajoutez-la à l\'URL d\'entrée alternative que vous voulez utiliser.";
$alternate_none = "Aucun lien d\'entée alternative créé";
$alternate_tutorial = "Voir le tutoriel";
$cr_title = "Rapport mot-clé personnalisé";
$cr_select = "Choisir un mot-clé";
$cr_button = "Générer un rapport";
$cr_no_results = "Aucun résultat trouvé";
$cr_no_results_info = "Essayez une autre combinaison de mots-clés";
$cr_used = "Mots-clés utilisés";
$cr_found = "Lien trouvé";
$cr_times = "Durées";
$cr_unique = "Liens uniques trouvés";
$cr_detailed = "Rapport détaillé";
$cr_export = "Exporter le rapport sous Excel";
$cr_none = "Aucun mot-clé trouvé";
$logo_title = "Téléchargez le logo de votre société";
$logo_info = "Si vous décidez de télécharger le logo de votre société, nous afficherons ce dernier auprès des clients que vous envoyez sur notre site. Cette option nous permet de proposer aux clients qui viennent sur notre site un service personnalisé.";
$logo_bullet_one = "Les images peuvent être au format .jpg, .gif ou .png.Le contenu flash n\'est pas permis.";
$logo_bullet_two = "Toute image inappropriée sera supprimée et votre compte sera suspendu.";
$logo_bullet_three = "image / logo n\'apparaitra sur notre site qu\'après avoir été approuvé.";
$logo_bullet_size_one = "La largeur maximale des images doit être de";
$logo_bullet_size_two = "pixels et la hauteur maximale de";
$logo_bullet_req_size_one = "Les images doivent avoir une largeur de";
$logo_bullet_req_size_two = "pixels et une hauteur de";
$logo_bullet_pixels = "pixels.";
$logo_choose = "Choisir une image";
$logo_file = "Sélectionner un fichier :";
$logo_browse = "Parcourir...";
$logo_button = "Envoyer";
$logo_current = "Mes images actuelles";
$logo_remove = "Supprimer";
$logo_display_status = "Statut de l\'image :";
$logo_pending = "En attente d\'approbation";
$logo_approved = "Approuvé";
$logo_success = "L\'image a bien été envoyée et est maintenant en attente d\'approbation";
$signup_security_title = "Vérification de compte";
$signup_security_info = "Veuillez saisir le code de sécurité affiché dans la case. Cette étape nous permet d\'empêcher les connexions automatiques.";
$signup_security_code = "Code de sécurité";
$sub_tracking_none = "Aucun";
$missing_security_code = "Vérification de compte / code de sécurité incorrect ou manquant";
$alternate_success_title = "Création de lien réussie";
$alternate_success_info = "Utilisez le lien ci-dessous et commencez ­à envoyer du trafic auprès des URL définies";
$alternate_failed_title = "Erreur de création de lien";
$alternate_failed_info = "Veuillez saisir une URL valide";
$logo_missing_filename = "Veuillez choisir un nom de fichier";
$logo_required_width = "La largeur des images doit être de";
$logo_required_height = "La hauteur des images doit être de";
$logo_maximum_width = "La largeur de l\'image ne peut être que de";
$logo_maximum_height = "La hauteur de l\'image ne peut être que de";
$logo_size_maximum = "La taille de l\'image ne doit pas dépasser";
$logo_bad_filetype = "Ce format d\'image n\'est pas autorisé. Les formats autorisés sont gif, .jpg et .png.";
$logo_upload_error = " Echec de l\'envoi. Veuillez contacter le responsable d\'affiliation";
$logo_error_title = "Erreur envoi de l\'image";
$logo_error_bytes = "bytes.";
$excel_title = "Rapport personnalisé liens et mots-clés";
$excel_tab_report = "Rapport mots-clés personnalisés";
$excel_tab_logs = "Logs trafic";
$excel_date = "Date du rapport :";
$excel_affiliate = "Numéro d\'identification affilié :";
$excel_criteria = "Critères lien / mot-clé";
$excel_link = "Structure du lien";
$excel_hits = "Hits uniques";
$excel_comm_stats = "Statistiques de commissions";
$excel_comm_current = "Commissions actuelles";
$excel_comm_paid = "Commissions payées";
$excel_comm_total = "Total commissions";
$excel_comm_ratio = "Ration de conversion";
$excel_earned = "Commissions touchées";
$excel_earned_current = "Commissions actuelles";
$excel_earned_paid = "Commissions payées";
$excel_earned_total = "Total des commissions gagnées";
$excel_earned_tab = "Veuillez cliquer sur l\'onglet de Log Trafic (ci-dessous) pour consulter le log lié à ce lien personnalisé.";
$excel_log_title = "Log trafic mots-clés personnalisés.";
$excel_log_ip = "Adresse IP";
$excel_log_refer = "URL de référence";
$excel_log_date = "Date";
$excel_log_time = "Heure";
$excel_log_target = "URL cible";
$etemplates_title = "Modèles email";
$etemplates_view_link = "Voir ce modèle email";
$etemplates_name = "Nom du modèle";
$signup_maintenance_heading = "Avis de maintenance";
$signup_maintenance_info = "Les inscriptions sont désactivées temporairement. Veuillez réessayer ultérieurement.";
$marketing_group_title = "Groupe de marketing";
$marketing_button = "Afficher";
$marketing_no_group = "Aucun groupe selectionné";
$marketing_choose = "Veuillez choisir un groupe de Marketing dessus";
$marketing_notice = "Les groupes de marketing peuvent avoir différentes pages de traffic entrant";
$canspam_heading = "Règles de CAN-SPAM et d\'acceptation";
$canspam_accept = "J\'ai lu, compris et accepté les règles CAN-SPAM en dessus.";
$canspam_error = "Vous n\'avez pas accepté nos règles CAN-SPAM.";
$signup_banned = "Une erreur est survenue lors de la création de votre compte. Merci de contacter l\'administrateur système pour plus d\'informations.";
$header_testimonials = "Témoignages d\'affiliés";
$testi_visit = "Visiter le site web";
$testi_description = "Offrez votre témoignage sur notre programme d\'affiliation et nous le placerons sur notre page &lt;a href=&quot;testimonials.php&quot;&gt;témoignages&lt;/a&gt;avec un lien vers votre site web.";
$testi_name = "Nom";
$testi_url = "URL du site web";
$testi_content = "Témoignage";
$testi_code = "Code de sécurité";
$testi_submit = "Envoyer le témoignage";
$testi_na = "Les témoignages ne sont pas disponibles.";
$testi_title = "Faire un témoignage";
$testi_success_title = "Réussite du témoignage";
$testi_success_message = "Merci pour votre témoignage. Notre équipe l\'examinera sous peu.";
$testi_error_title = "Erreur dans le témoignage";
$testi_error_name_missing = "Veuillez inclure votre nom dans votre témoignage.";
$testi_error_url_missing = "Veuillez inclure l\'URL de votre site web dans votre témoignage.";
$testi_error_missing = "Veuillez inclure du texte dans votre témoignage.";
$menu_drop_delayed = "Commissions différées";
$details_drop_6 = "Commisions différées en cours";
$details_type_6 = "Différée - Sera approuvée bientôt";
$comdetails_status_6 = "Différée - Sera approuvée bientôt";
$tc_reaccept_title = "Notification de changement de termes et conditions";
$tc_reaccept_sub_title = "Vous devez accepter nos termes et conditions afin de pouvoir vous connecter à votre compte.";
$tc_reaccept_button = "J\'ai lu, compris et accepté les termes et conditions en dessus.";
$tlinks_active = "Nombre de niveaux actifs";
$tlinks_payout_structure = "Niveaux de structures de paiement";
$tlinks_level = "Niveau";
$tierText1 = "% calculée à partir de la commission de l\'affilié correspondant.";
$tierText2 = "% calculée à partir du niveau supérieur de la commission.";
$tierText3 = "% calculée à partir du montant de la vente.";
$tierTextflat = "forfaitaire.";
$edit_custom_button = "Modifier la réponse";
$private_heading = "Inscription privée";
$private_info = "Notre programme d\'affiliation n\'est pas ouvert au public général et nécessite un code d\'inscription.Plus d\'informations sur la façon d\'obtenir un code d\'inscription sont ici.";
$private_required_heading = "Code d\'inscription requis";
$private_code_title = "Veuillez entrer votre code d\'inscription";
$private_button = "Envoyer le code";
$private_error_title = "Code d\'inscription invalide";
$private_error_invalid = "Le code d\'inscription que vous avez soumis est invalide.";
$private_error_expired = "Le code d\'inscription que vous avez soumis a expiré et n\'est plus valide.";
$qr_code_title = "Codes QR";
$qr_code_size = "Taille du code QR";
$qr_code_button = "Afficher le code QR";
$qr_code_offline_title = "Marketing offligne";
$qr_code_offline_content1 = "Ajoutez ce code QR à vos brochures de marketing, pliants, cartes de visite, etc.";
$qr_code_offline_content2 = "- Click droit sur l\'image et <strong>Enregistrer-sous</strong> votre ordinateur.";
$qr_code_online_title = "Marketing online";
$qr_code_online_content = "Ajoutez ce code QR sur votre site web, médias sociaux, blogs, etc.";
$menu_coupon = "Coupons de réductions";
$coupon_title = "Vos coupons de réduction disponibles";
$coupon_desc = "Partagez ce coupon de réduction et gagnez une commission chaque fois que quelqu\'un utilise votre code!";
$coupon_head_1 = "Coupon de réductions";
$coupon_head_2 = "Remise à la clientèle";
$coupon_head_3 = "Votre commission";
$coupon_sale_amt = "de vente";
$coupon_flat_rate = "forfaitaire";
$coupon_default = "Niveau de paiement par défaut";
$cc_vanity_title = "Demandez un coupon de réductions personnalisé";
$cc_vanity_field = "Coupon de réduction";
$cc_vanity_button = "Demandez un coupon de réduction";
$cc_vanity_error_missing = "<strong>Erreur!</strong> Veuillez entrer un coupon de réduction.";
$cc_vanity_error_exists = "<strong>Error!</strong> Vous avez déjà demandé ce code. Il est en attente d\'approbation.";
$cc_vanity_error = "<strong>Erreur!</strong> code invalide. Veuillez utliser uniquement des lettres, des chiffres et des traits de soulignement.";
$cc_vanity_success = "<strong>Réussi!</strong> Votre demande de code de promotion personnalisé a été envoyée.";
$coupon_none = "Pas de codes de promotions disponibles actuellement.";
$pic_error_title = "Erreur lors du chargement de l\'image";
$pic_missing = "Veuillez choisir un nom de fichiers.";
$pic_invalid = "Ce type d\'images n\'est pas permis. Les types permis sont .gif, .jpg and .png.";
$pic_error = "Erreur lors du chargement de l\'image, Veuillez contacter le manager affilié.";
$pic_success = "Votre photo a été chargée avec succès.";
$pic_title = "Veuillez charger votre photo";
$pic_info = "Le chargement de votre photo aide à personnaliser notre expérience avec vous.";
$pic_bullet_1 = "Les images peuvent être .jpg, .gif or .png.";
$pic_bullet_2 = "En cas d\'images inappropriées, celles-ci seront bannies et votre compte sera suspendu.";
$pic_bullet_3 = "Votre photo ne sera pas montrée au public. Elle sera uniquement attachée à votre compte pour que nous la voyons.";
$pic_file = "Veuillez sélectionner un fichier:";
$pic_button = "Charger";
$pic_current = "Ma photo actuelle";
$pic_remove = "Supprimer la photo";
$progress_title = "Eligibilité pour un paiement futur:";
$progress_complete = "terminé.";
$progress_none = "Nous n\'avons pas un minimum requis de paiement.";
$progress_sentence_1 = "Vous avez gagné";
$progress_sentence_2 = "de";
$progress_sentence_3 = "exigence.";
$aff_lib_button = "<b>Réclamez votre accès libre à</b><br>www.AffiliateLibrary.com";
$menu_announcements = "Campagnes de réseaux sociaux";
$announcements_name = "Nom de la Campagne";
$announcements_facebook_message = "Message Facebook";
$announcements_twitter_message = "Message Twitter";
$announcements_facebook_link = "Lien Facebook";
$announcements_facebook_picture = "Image Facebook";
$general_last_30_days_activity = "Activité des 30 derniers jours";
$general_last_30_days_activity_traffic = "Trafic";
$general_last_30_days_activity_commissions = "Commissions";
$accountability_title = "Responsabilité et Communication";
$accountability_text = "<strong>Quest-ce que cest?</strong><p>Nous prenons une approche proactive pour créer la confiance avec nos partenaires affiliés. Notre objectif est d\'assurer que nous proposons autant d\'information que possible sur chaque commission gagnée et/ou refusée dans notre système.</p><strong>Communication</strong><p>Nous\sommes disponibles pour donner des détails sur toutes les commissions refusées. Nous avons une forte communication avec nos affiliés et encourageons les questions et les commentaires.</p>";
$debit_reason_0 = "Aucun";
$debit_reason_1 = "Remboursement";
$debit_reason_2 = "Rétrofacturation";
$debit_reason_3 = "Fraude signalée";
$debit_reason_4 = "Commande annulée";
$debit_reason_5 = "Remboursement partiel";
$menu_drop_pending_debits = "Débits en attente";
$debit_amount_label = "Montant débité";
$debit_date_label = "Date de débit";
$debit_reason_label = "Raison de débit";
$debit_paragraph = "Les débits seront déduits de votre prochain paiement.";
$debit_invoice_amount = "Moins Montant Débité";
$debit_revised_amount = "Montant de paiement révisé";
$mv_head_description = "Note : Vous ne pouvez placer qu\'une vidéo par page sur votre site web.";
$mv_head_source_code = "Copiez ce code dans la section ENTETE de votre document HTML.";
$mv_body_title = "Titre Vidéo";
$mv_body_description = "Description";
$mv_body_source_code = "Copiez ce code dans la section CORPS de votre document HTML où vous voulez faire apparaitre la vidéo.";
$menu_marketing_videos = "Vidéos";
$mv_preview_button = "Prévisualisation Vidéo";
$dt_no_data = "Aucune donnée disponible dans le tableau.";
$dt_showing_exists = "Affichage d\'entrées _START_ to _END_ of _TOTAL_.";
$dt_showing_none = "Affichage 0 à 0 de 0 entrées.";
$dt_filtered = "(filtré de _MAX_ entrées totales)";
$dt_length_choice = "Afficher _MENU_ entrées.";
$dt_loading = "Chargement...";
$dt_processing = "Traitement...";
$dt_no_records = "Aucune donnée correspondante trouvée.";
$dt_first = "Première";
$dt_last = "Dernière";
$dt_next = "Suivante";
$dt_previous = "Précédente";
$dt_sort_asc = ": activer pour trier colonne ascendante";
$dt_sort_desc = ": activer pour trier colonne descendante";
$choose_marketing_group = "Choisissez un groupe marketing";
$email_already_used_1 = "Le compte ne peut pas être créé. ous ne permettons que";
$email_already_used_2 = "compte";
$email_already_used_3 = "d\'être créé par adresse email.";
$missing_fax = "Prière de donner votre numéro de fax.";
$chart_last_6_months = "Commissions payées 6 derniers mois";
$chart_last_6_months_paid = "Commissions payées";
$chart_this_month = "Nos Top 5 Affiliés ce mois";
$chart_this_month_none = "Aucune donnée à afficher.";
$login_return = "Retour à l\'accueil Affiliés";
$login_lost_details = "Entrez votre nom d\'utilisateur et nous allons vous envoyer un email avec vos coordonnées de connexion.";
$account_edit_general_prefs = "Préférences générales";
$account_edit_email_language = "Langage Email";
$footer_connect = "Nous contacter";
$modal_close = "Fermer";
$vat_amount_heading = "Montant TVA";
$menu_logout = "Déconnexion";
$menu_upload_picture = "Télécharger vos images";
$menu_offer_testi = "Proposer un témoignage";
$fb_login = "Se connecter avec Facebook";
$fb_permissions = "Permissions refusées. Prière de permettre au site web d\'utiliser votre adresse email.";
$announcements_published = "Annonces Publiées";
$training_videos_title = "Vidéos Formation";
$training_videos_general = "Marketing Général";
$commission_method = "Méthode de Commissionnement";
$how_will_you_earn = "Comment allez-vous gagner des commissions?";
$pm_account_credit = "Nous créditerons votre compte de vos commissions gagnées.";
$pm_check_money_order = "Nous vous enverrons un chèque/envoi d’argent dans le mail.";
$pm_paypal = "Nous vous enverrons un paiement PayPal.";
$pm_stripe = "Nous vous enverrons un paiement Stripe.";
$pm_wire = "Nous vous ferons un virement bancaire.";
$add_to_signup_left_column_text = "<span style=\"color:#CC0000; font-style:italic;\">* indique une case obligatoire.</span>";
$paypal_email = "Email Paypal";
$stripe_acct_details = "Détails de Compte Stripe";
$stripe_connect = "Vous pouvez vous connecter à votre compte stripe de la page réglages de compte après l’enregistrement.";
$stripe_success = "Compte Stripe Connecté avec succès";
$stripe_settings = "Réglages Stripe";
$stripe_connect_edit = "Se connecter avec Stripe";
$stripe_delete = "Effacer le Compte Stripe";
$stripe_confirm = "Etes-vous sûr(e) de vouloir effacer ce compte ?";
$payment_settings = "Paramètres de Paiement";
$edit_payment_settings = "Editer les Paramètres de Paiement";
$invalid_paypal_address = "Adresse email Paypal invalide.";
$payment_method_error = "Veuillez choisir une méthode de paiement.";
$payment_settings_updated = "Paramètres de paiement mis à jour.";
$stripe_removed = "Compte Stripe supprimé.";
$payment_settings_success = "Succès!";
$payment_update_notice_1 = "Notification!";
$payment_update_notice_2 = "Vous avez été choisi pour recevoir un paiement <strong>[payment_option_here]</strong> de notre part. Veuillez <a href=\"account.php?page=48\" style=\"font-weight:bold;\">cliquer ici</a> pour connecter votre compte <strong>[payment_option_here]</strong>.";
$pm_title_credit = "Crédit du compte";
$pm_title_mo = "Chèque/Mandat postal";
$pm_title_paypal = "PayPal";
$pm_title_stripe = "Stripe";
$pm_title_wire = "Virement bancaire";
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