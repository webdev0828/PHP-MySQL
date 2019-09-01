<?PHP

//-------------------------------------------------------
	  $language_pack_name = "english";
	  $language_pack_table_name = "english";
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
$header_title = "Affiliate Program";
$header_indexLink = "Affiliate Home";
$header_signupLink = "Signup Now";
$header_accountLink = "Manage Account";
$header_emailLink = "Contact Us";
$header_greeting = "Welcome";
$header_nonLogged = "Guest";
$header_logout = "Logout Here";
$footer_tag = "Affiliate Software By iDevAffiliate";
$footer_copyright = "Copyright";
$footer_rights = "All Rights Reserved";
$index_heading_1 = "Welcome To Our Affiliate Program!";
$index_paragraph_1 = "Our program is free to join, it\'s easy to sign-up and requires no technical knowledge. Affiliate programs are common throughout the Internet and offer website owners an additional way to profit from their websites. Affiliates generate traffic and sales for commercial websites and in return receive a commission payment.";
$index_heading_2 = "How Does It Work?";
$index_paragraph_2 = "When you join our affiliate program, you will be supplied with a range of banners and textual links that you place within your site. When a user clicks on one of your links, they will be brought to our website and their activity will be tracked by our affiliate software. You will earn a commission based on your commission type.";
$index_heading_3 = "Real-Time Statistics and Reporting!";
$index_paragraph_3 = "Login 24 hours a day to check your sales, traffic, account balance and see how your banners are performing.";
$index_login_title = "Affiliate Login";
$index_login_username = "Username";
$index_login_password = "Password";
$index_login_username_field = "username";
$index_login_password_field = "password";
$index_login_button = "Login";
$index_login_signup_link = "Click Here To Signup";
$index_table_title = "Program Details";
$index_table_commission_type = "Commission Type";
$index_table_initial_deposit = "Initial Deposit";
$index_table_requirements = "Payout Requirements";
$index_table_duration = "Payout Duration";
$index_table_choose = "Choose from the following payout options!";
$index_table_sale = "Pay-Per-Sale";
$index_table_click = "Pay-Per-Click";
$index_table_sale_text = "for each sale you deliver.";
$index_table_click_text = "for each click you deliver.";
$index_table_deposit_tag = "Just for signing up!";
$index_table_requirements_tag = "Minimum balance required for payout.";
$index_table_duration_tag = "Payments are made once per month, for the previous month.";
$signup_left_column_text = "Join our affiliate program and start earning money for every sale you send our way!Simply create your account, place your linking code into your website and watch your account balance grow as your visitors become our customers.";
$signup_left_column_title = "Welcome Affiliate!";
$signup_login_title = "Create Your Account";
$signup_login_username = "Username";
$signup_login_password = "Password";
$signup_login_password_again = "Password Again";
$signup_login_minmax_chars = "- Username must be a minimum of user_min_chars characters.&lt;br /&gt;- Username can be alpha-numeric.&lt;br /&gt;- Username can contain these characters: _ (underscores only)&lt;br /&gt;&lt;br /&gt;- Password must be a minimum of pass_min_chars characters.&lt;br /&gt;- Password can be alpha-numeric.&lt;br /&gt;- Password can contain these characters: characters_allowed";
$signup_login_must_match = "This entry must match the Password entry.";
$signup_standard_title = "Standard Information";
$signup_standard_email = "Email Address";
$signup_standard_company = "Company Name";
$signup_standard_checkspayable = "Checks Payable To";
$signup_standard_weburl = "Website Address";
$signup_standard_taxinfo = "Tax ID, SSN or VAT";
$signup_personal_title = "Personal Information";
$signup_personal_fname = "First Name";
$signup_personal_state = "State or Province";
$signup_personal_lname = "Last Name";
$signup_personal_phone = "Phone Number";
$signup_personal_addr1 = "Street Address";
$signup_personal_fax = "Fax Number";
$signup_personal_addr2 = "Additional Address";
$signup_personal_zip = "Zip Code";
$signup_personal_city = "City";
$signup_personal_country = "Country";
$signup_commission_title = "Commission Payment";
$signup_commission_howtopay = "How should we pay you?";
$signup_commission_style_PPS = "Pay-Per-Sale";
$signup_commission_style_PPC = "Pay-Per-Click";
$signup_terms_title = "Terms and Conditions";
$signup_terms_agree = "I have read, understand and agree to the above terms and conditions.";
$signup_page_button = "Create My Account";
$signup_success_email_comment = "We have sent an email to you with your Username and Password.<BR />\r\nYou should keep this in a safe place for future reference.";
$signup_success_login_link = "Login To Your Account";
$custom_fields_title = "User Defined Fields";
$logout_msg = "<b>You Are Now Logged Out</b><BR />Thank you for your participation in our affiliate program.";
$signup_page_success = "Your Account Has Been Created";
$login_left_column_title = "Account Login";
$login_left_column_text = "Enter your username and password to gain access to your account statistics, banners, linking code, FAQ and more.<BR/ ><BR/ >If you can\'t remember your password, enter your username and we\'ll send your login information to you via email.<BR /><BR />";
$login_title = "Login To Your Account";
$login_username = "Username";
$login_password = "Password";
$login_invalid = "Invalid Login";
$login_now = "Login To My Account";
$login_send_title = "Need Your Password?";
$login_send_username = "Username";
$login_send_info = "Login Details Sent To Email";
$login_send_pass = "Send To Email";
$login_send_bad = "Username Not Found";
$help_new_password_heading = "New Password";
$help_new_password_info = "Your password must be at least pass_min_chars characters in length. It may only contain letters, numbers and the following characters: characters_allowed";
$help_confirm_password_heading = "Confirm New Password";
$help_confirm_password_info = "This password entry must match the New Password entry.";
$help_custom_links_heading = "Tracking Keyword";
$help_custom_links_info = "Your keyword may not be more than 30 characters in length. It may only contain letters, numbers and hyphens.";
$error_title = "The Following Errors Were Detected";
$username_invalid = "Invalid username. It may only contain letters, numbers and underscores.";
$username_taken = "The username you have chosen has already been taken.";
$username_short = "Your username is too short, it must be at least user_min_chars characters in length.";
$username_long = "Your username is too long, it must be a maximum of user_max_chars characters in length.";
$password_invalid = "Invalid password. It may only contain letters, numbers and the following characters: characters_allowed";
$password_short = "Your password is too short, it must be at least pass_min_chars characters in length.";
$password_long = "Your password is too long, it must be a maximum of pass_max_chars characters in length.";
$password_mismatch = "Your password entries do not match.";
$missing_checks = "Please enter a payee name to make checks payable to.";
$missing_tax = "Please enter your Tax ID, SSN or VAT information.";
$missing_fname = "Please enter your first name.";
$missing_lname = "Please enter your last name.";
$missing_email = "Please enter your email address.";
$invalid_email = "Your email address is invalid.";
$missing_address = "Please enter your street address.";
$missing_city = "Please enter your city.";
$missing_company = "Please enter your company name.";
$missing_state = "Please enter your state or province.";
$missing_zip = "Please enter your zip code.";
$missing_phone = "Please enter your phone number.";
$missing_website = "Please enter your website address.";
$missing_paypal = "You have chosen to receive PayPal payments, please enter your PayPal account.";
$missing_terms = "You have not accepted our terms and conditions.";
$paypal_required = "A PayPal account is required for payment.";
$missing_custom = "Please complete the field named:";
$account_total_transactions = "Total Transactions";
$account_standard_linking_code = "Standard Linking Code - Great For Use In Emails!";
$account_copy_paste = "Copy/Paste The Above Code Into Your Website or Emails";
$account_not_approved = "Your Account Is Currently Pending Approval";
$account_suspended = "Your Account Is Currently Suspended";
$account_standard_earnings = "Standard Earnings";
$account_inc_bonus = "includes bonus";
$account_second_tier = "Tier Earnings";
$account_recurring = "Recurring Earnings";
$account_not_available = "N/A";
$account_earned_todate = "Total Earned To Date";
$menu_heading_overview = "Account Overview";
$menu_general_stats = "General Stats";
$menu_tier_stats = "Tier Statistics";
$menu_payment_history = "Payment History";
$menu_commission_details = "Commission Details";
$menu_recurring_commissions = "Recurring Commissions";
$menu_traffic_log = "Incoming Traffic Log";
$menu_heading_marketing = "Marketing Materials";
$menu_banners = "Banners";
$menu_text_ads = "Text Ads";
$menu_text_links = "Text Links";
$menu_email_links = "Email Links";
$menu_html_links = "HTML Ads";
$menu_offline = "Offline Marketing";
$menu_tier_linking_code = "Tier Linking Code";
$menu_email_friends = "Email Friends &amp; Associates";
$menu_custom_links = "Build &amp; Track Your Own Links";
$menu_heading_management = "Account Management";
$menu_comalert = "CommissionAlert Setup";
$menu_comstats = "CommissionStats Setup";
$menu_edit_account = "Edit My Account";
$menu_change_pass = "Change My Password";
$menu_change_commission = "Change My Commission Style";
$menu_heading_general_info = "General Information";
$menu_browse_affiliates = "Browse Other Affiliates";
$menu_faq = "Frequently Asked Questions";
$suspended_title = "Account Status Alert";
$suspended_heading = "Your Account Is Currently Suspended";
$suspended_notes = "Administrator Notes";
$pending_title = "Account Status Alert";
$pending_heading = "Your Account Is Currently Pending Approval";
$pending_note = "Once we have approved your account, marketing materials will be made available to you.";
$faq_title = "Frequently Asked Questions";
$faq_none = "No FAQ\'s Yet";
$browse_title = "Browse Other Affiliates";
$browse_none = "No Other Affiliates To View";
$change_comm_title = "Change Commission Style";
$change_comm_curr_comm = "Current Commission Style";
$change_comm_curr_pay = "Current Payout Level";
$change_comm_new_comm = "New Commission Style";
$change_comm_warning = "If You Change Commission Styles, Your Account Will Be Reset To Payout Level 1";
$change_comm_button = "Change Commission Styles";
$change_comm_no_other = "No Other Commission Styles Available";
$change_comm_level = "Level";
$change_comm_updated = "Commission Style Updated";
$password_title = "Change My Password";
$password_old_password = "Old Password";
$password_new_password = "New Password";
$password_confirm_password = "Confirm New Password";
$password_button = "Change Password";
$password_warning_old_missing = "Old Password Is Incorrect or Missing";
$password_warning_new_missing = "New Password Entry Missing";
$password_warning_mismatch = "New Password Does Not Match";
$password_warning_invalid = "Password Invalid - Click The Help Links";
$password_notice = "Password Updated";
$edit_failed = "Update Failed - See Above Errors";
$edit_success = "Account Updated";
$edit_button = "Edit My Account";
$commissionstats_title = "CommissionStats Setup";
$commissionstats_info = "By installing CommissionStats you can check your stats instantly, right from your Windows desktop!To install this feature, download CommissionStats and <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>unzip</b></a> the package to your hard drive then run the <b>setup.exe</b> file. When prompted for your login information, enter the following details.";
$commissionstats_hint = "Hint: Copy & Paste Each Entry To Ensure Accuracy";
$commissionstats_profile = "Profile Name";
$commissionstats_username = "Username";
$commissionstats_password = "Password";
$commissionstats_id = "Affiliate ID";
$commissionstats_source = "Source Path URL";
$commissionstats_download = "Download CommissionStats";
$commissionalert_title = "CommissionAlert Setup";
$commissionalert_info = "By installing CommissionAlert we\'ll notify you instantly of new commissions, right on your Windows desktop!To install this feature, download CommissionAlert and <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>unzip</b></a> the package to your hard drive then run the <b>setup.exe</b> file. When prompted for your login information, enter the following details.";
$commissionalert_hint = "Hint: Copy & Paste Each Entry To Ensure Accuracy";
$commissionalert_profile = "Profile Name";
$commissionalert_username = "Username";
$commissionalert_password = "Password";
$commissionalert_id = "Affiliate ID";
$commissionalert_source = "Source Path URL";
$commissionalert_download = "Download CommissionAlert";
$offline_title = "Offline Marketing";
$offline_paragraph_one = "Earn money by promoting our website (offline) to your friends and associates!";
$offline_send = "Send Customers To";
$offline_page_link = "view page";
$offline_paragraph_two = "Your customers will enter your <b>Affiliate ID number</b> into the box on the above page which will register you as the affiliate for any purchases they make.";
$banners_title = "Banners";
$banners_size = "Banner Size";
$banners_description = "Banner Description";
$ad_title = "Text Ads";
$ad_info = "Using the provided linking code, you can adjust the color scheme, height and width of your Text Ad.";
$links_title = "Link Name";
$email_title = "Email Links";
$email_group = "Marketing Group";
$email_button = "Display Email Links";
$email_no_group = "No Group Selected";
$email_choose = "Please Choose A Marketing Group Above";
$email_notice = "Marketing Groups May Have Different Incoming Traffic Pages";
$email_ascii = "<b>ASCII/Text Version</b> - For use in Plain Text emails.";
$email_html = "<b>HTML Version</b> - For use in HTML formatted emails.";
$email_test = "Test Link";
$email_test_info = "This is where your customers will be sent into our website.";
$email_source = "Source Code - Copy/Paste Into Your Email Message";
$html_title = "HTML Ad Name";
$html_view_link = "View This HTML Ad";
$traffic_title = "Incoming Traffic Log";
$traffic_display = "Display Last";
$traffic_display_visitors = "Visitors";
$traffic_button = "View Traffic Log";
$traffic_title_details = "Incoming Traffic Details";
$traffic_ip = "IP Address";
$traffic_refer = "Referring URL";
$traffic_date = "Date";
$traffic_time = "Time";
$traffic_bottom_tag_one = "Displaying Last";
$traffic_bottom_tag_two = "of";
$traffic_bottom_tag_three = "Total Unique Visitors";
$traffic_none = "No Traffic Logs Exist";
$traffic_no_url = "N/A - Possible Bookmark or Email Link";
$traffic_box_title = "Complete Referring URL";
$traffic_box_info = "Click The Link To Visit Webpage";
$payment_title = "Payment History";
$payment_date = "Payment Date";
$payment_commissions = "Commissions";
$payment_amount = "Payment Amount";
$payment_totals = "Totals";
$payment_none = "No Payment History Exists";
$tier_stats_title = "Tier Statistics";
$tier_stats_accounts = "Tier Accounts Directly Under You";
$tier_stats_grab_link = "Grab Your Tier Linking Code";
$tier_stats_none = "No Tier Accounts Exist";
$tier_stats_username = "Username";
$tier_stats_current = "Current Commissions";
$tier_stats_previous = "Previous Payouts";
$tier_stats_totals = "Totals";
$recurring_title = "Recurring Commissions";
$recurring_none = "No Recurring Commissions Exists";
$recurring_date = "Commission Date";
$recurring_status = "Recurring Status";
$recurring_payout = "Next Payout";
$recurring_amount = "Amount";
$recurring_every = "Every";
$recurring_in = "In";
$recurring_days = "Days";
$recurring_total = "Total";
$tlinks_title = "Add Others To Your Tier And Make Money From Them Too!";
$tlinks_embedded_one = "Tier Signup Crediting Is Already Active In Your Standard Affiliate Links!";
$tlinks_embedded_two = "Using the tier system allows you to market our affiliate program to other people. You will become the top tier for anyone who joins our affiliate program through your special tier referral link below. Information on how much you can earn is below.";
$tlinks_embedded_current = "Current Tier Payout";
$tlinks_forced_two = "Using the tier system allows you to market our affiliate program to other people. You will become the top tier for anyone who joins our affiliate program through your special tier referral link below. Information on how much you can earn is below.";
$tlinks_forced_code = "Tier Referral Link";
$tlinks_forced_paste = "Copy/Paste The Above Code Into Your Website";
$tlinks_forced_money = "Webmasters Earn Money Here!";
$comdetails_title = "Commission Details";
$comdetails_date = "Commission Date";
$comdetails_time = "Commission Time";
$comdetails_type = "Type of Commission";
$comdetails_status = "Current Status";
$comdetails_amount = "Commission Amount";
$comdetails_additional_title = "Additional Commission Details";
$comdetails_additional_ordnum = "Order Number";
$comdetails_additional_saleamt = "Sale Amount";
$comdetails_type_1 = "Bonus Commission";
$comdetails_type_2 = "Recurring Commission";
$comdetails_type_3 = "Tier Commission";
$comdetails_type_4 = "Standard Commission";
$comdetails_status_1 = "Paid";
$comdetails_status_2 = "Approved - Pending Payment";
$comdetails_status_3 = "Pending Approval";
$comdetails_not_available = "N/A";
$details_title = "Commission Details";
$details_drop_1 = "Current Standard Commissions";
$details_drop_2 = "Current Tier Commissions";
$details_drop_3 = "Commissions Pending Approval";
$details_drop_4 = "Paid Standard Commissions";
$details_drop_5 = "Paid Tier Commissions";
$details_button = "View Commissions";
$details_date = "Date";
$details_status = "Status";
$details_commission = "Commission";
$details_details = "View Details";
$details_type_1 = "Paid";
$details_type_2 = "Pending Approval";
$details_type_3 = "Approved - Pending Payment";
$details_none = "No Commissions To View";
$details_no_group = "No Commission Group Selected";
$details_choose = "Please Choose A Commission Group Above";
$general_title = "Current Commissions - From Last Payout To Date";
$general_transactions = "Transactions";
$general_earnings_to_date = "Earnings To Date";
$general_history_link = "View Payment History";
$general_standard_earnings = "Standard Earnings";
$general_current_earnings = "Current Earnings";
$general_traffic_title = "Traffic Statistics";
$general_traffic_visitors = "Visitors";
$general_traffic_unique = "Unique Visitors";
$general_traffic_sales = "Approved Sales";
$general_traffic_ratio = "Sales Ratio";
$general_traffic_info = "These statistics do not include recurring or tier commissions.";
$general_traffic_pay_type = "Payout Type";
$general_traffic_pay_level = "Current Payout Level";
$general_notes_title = "Notes From The Administrator";
$general_notes_date = "Date Created";
$general_notes_to = "To";
$general_notes_all = "All Affiliates";
$general_notes_none = "No Notes To View";
$contact_left_column_title = "Contact Us";
$contact_left_column_text = "Please feel free to contact our affiliates manager using the form to the right.";
$contact_title = "Contact Us";
$contact_name = "Your Name";
$contact_email = "Your Email Address";
$contact_message = "Message";
$contact_chars = "characters left";
$contact_button = "Send Message";
$contact_received = "We\'ve received your message, please allow 24 hours for a response.";
$contact_invalid_name = "Invalid Name";
$contact_invalid_email = "Invalid Email Address";
$contact_invalid_message = "Invalid Message";
$invoice_button = "Invoice";
$invoice_header = "AFFILIATE PAYMENT INVOICE";
$invoice_aff_info = "Affiliate Information";
$invoice_co_info = "Information";
$invoice_acct_info = "Account Information";
$invoice_payment_info = "Payment Information";
$invoice_comm_date = "Payment Date";
$invoice_comm_amt = "Commission Amount";
$invoice_comm_type = "Commission Type";
$invoice_admin_note = "Administrator Note";
$invoice_footer = "END OF INVOICE";
$invoice_print = "Print Invoice";
$invoice_none = "N/A";
$invoice_aff_id = "Affiliate ID";
$invoice_aff_user = "Username";
$menu_pdf_marketing = "PDF Marketing Brochures";
$menu_pdf_training = "PDF Training Documents";
$marketing_target_url = "Target URL";
$marketing_source_code = "Source Code - Copy/Paste Into Your Website";
$marketing_group = "Marketing Group";
$peels_title = "Page Peel Name";
$peels_view = "View This Peel";
$peels_description = "Page Peel Description";
$lb_head_title = "Required HEAD Code For Your HTML Page";
$lb_head_description = "In order to use a lightbox on your website, you must add the following lines to the head section of the page you want it displayed.";
$lb_head_source_code = "Paste this code into the HEAD section of your HTML document.";
$lb_head_code_notes = "You only need to place this code one time no matter how many lightboxes you place on the page.";
$lb_head_tutorial = "View Tutorial";
$lb_body_title = "Lightbox Name";
$lb_body_description = "Lightbox Description";
$lb_body_click = "Click the above image to view the lightbox.";
$lb_body_source_code = "Paste this code into the BODY section of your HTML document where you want the image to appear.";
$pdf_title = "PDF";
$pdf_training = "Training Documents";
$pdf_marketing = "Marketing Brochures";
$pdf_description_1 = "Adobe Reader is required to view and print our PDF marketing materials.";
$pdf_description_2 = "Adobe Reader is a free download from the Adobe website.";
$pdf_file_name = "File Name";
$pdf_file_size = "File Size";
$pdf_file_description = "Description";
$pdf_bytes = "Bytes";
$menu_heading_training_materials = "Training Materials";
$menu_videos = "Watch Training Videos";
$menu_custom_manual = "Custom Tracking Links Manual";
$menu_page_peels = "Page Peels";
$menu_lightboxes = "Lightboxes";
$menu_email_templates = "Email Templates";
$menu_heading_custom_links = "Custom Tracking Links";
$menu_custom_reports = "Reports";
$menu_keyword_links = "Keyword Tracking Links";
$menu_subid_links = "Sub-Affiliate Tracking Links";
$menu_alteranate_links = "Alternate Incoming Page Links";
$menu_heading_additional = "Additional Tools";
$menu_drop_heading_stats = "General Stats";
$menu_drop_heading_commissions = "Commissions";
$menu_drop_heading_history = "Payment History";
$menu_drop_heading_traffic = "Traffic Log";
$menu_drop_heading_account = "My Account";
$menu_drop_heading_logo = "Upload My Logo";
$menu_drop_heading_faq = "FAQ";
$menu_drop_general_stats = "General Statistic";
$menu_drop_tier_stats = "Tier Statistics";
$menu_drop_current = "Current Commissions";
$menu_drop_tier = "Current Tier Commissions";
$menu_drop_pending = "Pending Approval";
$menu_drop_paid = "Paid Commissions";
$menu_drop_paid_rec = "Paid Tier Commissions";
$menu_drop_recurring = "Active Recurring Commissions";
$menu_drop_edit = "Edit My Account";
$menu_drop_password = "Change My Password";
$menu_drop_change = "Change My Commission Style";
$account_hidden = "hidden";
$keyword_title = "Custom Keyword Links";
$keyword_info = "Creating a custom keyword link provides you the ability to track incoming traffic for various sources. Create a link with up to 4 different tracking keywords and the custom tracking report will show you a detailed report for each keyword you create.";
$keyword_heading = "Available Variables For Custom Keyword Tracking";
$keyword_tracking = "Tracking ID";
$keyword_build = "To build your link, take the following URL and append it with the Tracking ID and keyword you want to use.";
$keyword_example = "Example";
$keyword_tutorial = "View The Tutorial";
$sub_tracking_title = "Sub-Affiliate Tracking";
$sub_tracking_info = "Creating a sub-affiliate link provides you the ability to pass your affiliate link out to your own affiliates for them to use. You will know who generated the commission for you because we will report to you which of your sub-affiliates generated the sale. Another reason to use a sub-affiliate link is if you have your own tracking system you want included for reporting.";
$sub_tracking_build = "Replace the XXX with the affiliate\'s ID number in your affiliate program. Repeat this process for all your affiliates.";
$sub_tracking_example = "Example";
$sub_tracking_tutorial = "View Tutorial";
$sub_tracking_id = "Sub-Affiliate ID";
$alternate_title = "Alternate Incoming Page Links";
$alternate_option_1 = "Option 1: Automated Link Creation";
$alternate_heading_1 = "Automated Link Creation";
$alternate_info_1 = "Define your own incoming traffic page by entering the URL you want traffic delivered to and we\'ll create a link for you. Using this feature will create a shorter link for you to use with the URL embedded in the link using an ID number in our database.";
$alternate_button = "Create My Link";
$alternate_links_heading = "My Alternate Incoming URL Links";
$alternate_links_note = "Existing links will remain in tact and functional if you remove a custom link from this page.";
$alternate_links_remove = "remove";
$alternate_option_2 = "Option 2: Manual Link Creation";
$alternate_info_2 = "If you\'d prefer to append your own affiliate links with an alternate incoming URL, use the following structure.";
$alternate_variable = "Alternate Incoming URL Variable";
$alternate_example = "Example";
$alternate_build = "To build your link, take the following URL and append it with the Alternate Incoming URL you want to use.";
$alternate_none = "No Alternate Incoming Links Created";
$alternate_tutorial = "View Tutorial";
$cr_title = "Custom Keyword Report";
$cr_select = "Select A Keyword";
$cr_button = "Generate Report";
$cr_no_results = "No Search Results Found";
$cr_no_results_info = "Try A Different Keyword Combination";
$cr_used = "Keywords Used";
$cr_found = "This Link Found";
$cr_times = "Times";
$cr_unique = "Unique Links Found";
$cr_detailed = "Detailed Link Report";
$cr_export = "Export Report To Excel";
$cr_none = "No Keywords Found";
$logo_title = "Upload Your Company Logo";
$logo_info = "If you would like to upload your Company logo, we will display it to customers you deliver to our website. This allows us to personalize your customer\'s experience when they visit us.";
$logo_bullet_one = "Images may be .jpg, .gif or .png. No flash content is allowed.";
$logo_bullet_two = "Any inappropriate images will be discarded and your account suspended.";
$logo_bullet_three = "Your image/logo will not be shown on our website until we\'ve approved it.";
$logo_bullet_size_one = "Images may have a maximum width of";
$logo_bullet_size_two = "pixels and a maximum height of";
$logo_bullet_req_size_one = "Images must have a width of";
$logo_bullet_req_size_two = "pixels and a height of";
$logo_bullet_pixels = "pixels.";
$logo_choose = "Choose An Image";
$logo_file = "Select A File:";
$logo_browse = "Browse...";
$logo_button = "Upload";
$logo_current = "My Current Image";
$logo_remove = "remove";
$logo_display_status = "Image Status:";
$logo_pending = "Pending Approval";
$logo_approved = "Approved";
$logo_success = "Image was successfully uploaded and is now pending approval.";
$signup_security_title = "Account Verification";
$signup_security_info = "Please enter the security code shown in the box. This step helps us to prevent automated signups.";
$signup_security_code = "Security Code";
$sub_tracking_none = "None";
$missing_security_code = "Incorrect or Missing Account Verification / Security Code";
$alternate_success_title = "Link Creation Success";
$alternate_success_info = "Grab your link below and start delivering traffic to your defined URL.";
$alternate_failed_title = "Link Creation Error";
$alternate_failed_info = "Please enter a valid URL.";
$logo_missing_filename = "Please choose a filename.";
$logo_required_width = "Image width must be";
$logo_required_height = "Image height must be";
$logo_maximum_width = "Image width can only be";
$logo_maximum_height = "Image height can only be";
$logo_size_maximum = "Image size can only be a maximum of";
$logo_bad_filetype = "Image type is not allowed. Allowed image types are .gif, .jpg and .png.";
$logo_upload_error = "Image upload error, please contact the affiliate manager.";
$logo_error_title = "Image Upload Error";
$logo_error_bytes = "bytes.";
$excel_title = "Custom Keyword Links Report";
$excel_tab_report = "Custom Keyword Report";
$excel_tab_logs = "Traffic Logs";
$excel_date = "Report Date:";
$excel_affiliate = "Affiliate ID:";
$excel_criteria = "Keyword Link Criteria";
$excel_link = "Link Structure";
$excel_hits = "Unique Hits";
$excel_comm_stats = "Commission Statistics";
$excel_comm_current = "Current Commissions";
$excel_comm_paid = "Paid Commissions";
$excel_comm_total = "Total Commissions";
$excel_comm_ratio = "Conversion Ratio";
$excel_earned = "Commissions Earned";
$excel_earned_current = "Current Commissions";
$excel_earned_paid = "Paid Commissions";
$excel_earned_total = "Total Commissions Earned";
$excel_earned_tab = "Click the Traffic Logs tab (below) to view the traffic log for this custom link.";
$excel_log_title = "Custom Keywords Traffic Log";
$excel_log_ip = "IP Address";
$excel_log_refer = "Referring URL";
$excel_log_date = "Date";
$excel_log_time = "Time";
$excel_log_target = "Target URL";
$etemplates_title = "Email Templates";
$etemplates_view_link = "View This Email Template";
$etemplates_name = "Template Name";
$signup_maintenance_heading = "Maintenance Notice";
$signup_maintenance_info = "Signups are temporarily disabled. Please try back later.";
$marketing_group_title = "Marketing Group";
$marketing_button = "Display";
$marketing_no_group = "No Group Selected";
$marketing_choose = "Please Choose A Marketing Group Above";
$marketing_notice = "Marketing Groups May Have Different Incoming Traffic Pages";
$canspam_heading = "CAN-SPAM Rules and Acceptance";
$canspam_accept = "I have read, understand and agree to the above CAN-SPAM rules.";
$canspam_error = "You have not accepted our CAN-SPAM rules.";
$signup_banned = "An error occured during account creation. Please contact the system administrator for more information.";
$header_testimonials = "Affiliate Testimonials";
$testi_visit = "Visit Website";
$testi_description = "Offer your testimonial for our affiliate program and we will place it on our &lt;a href=&quot;testimonials.php&quot;&gt;testimonials&lt;/a&gt; page with a link to your website.";
$testi_name = "Name";
$testi_url = "Website URL";
$testi_content = "Testimonial";
$testi_code = "Security Code";
$testi_submit = "Submit Testimonial";
$testi_na = "Testimonials are not available.";
$testi_title = "Offer A Testimonial";
$testi_success_title = "Testimonial Success";
$testi_success_message = "Thank you for submitting your testimonial. Our team will review it shortly.";
$testi_error_title = "Testimonial Error";
$testi_error_name_missing = "Please include your name for your testimonial.";
$testi_error_url_missing = "Please include your website URL for your testimonial.";
$testi_error_missing = "Please include text for your testimonial.";
$menu_drop_delayed = "Delayed Commissions";
$details_drop_6 = "Current Delayed Commissions";
$details_type_6 = "Delayed - Will Approve Soon";
$comdetails_status_6 = "Delayed - Will Approve Soon";
$tc_reaccept_title = "Terms and Conditions Change Notification";
$tc_reaccept_sub_title = "You must agree to our new terms and conditions in order to gain access to your account.";
$tc_reaccept_button = "I have read, understand and agree to the above terms and conditions.";
$tlinks_active = "Number of Active Tiers";
$tlinks_payout_structure = "Tier Payout Structure";
$tlinks_level = "Level";
$tierText1 = "% calculated from the referring affiliate\'s commission amount.";
$tierText2 = "% calculated from upper tier\'s commission amount.";
$tierText3 = "% calculated from the sale amount.";
$tierTextflat = "flat rate.";
$edit_custom_button = "Edit Answer";
$private_heading = "Private Signup";
$private_info = "Our affiliate program is not open to the general public and requires a signup code to join. Information about how to obtain a signup code should be here.";
$private_required_heading = "Signup Code Required";
$private_code_title = "Enter Signup Code";
$private_button = "Submit Code";
$private_error_title = "Invalid Signup Code Provided";
$private_error_invalid = "The signup code you have provided is invalid.";
$private_error_expired = "The signup code you have provided has expired and is no longer valid.";
$qr_code_title = "QR Codes";
$qr_code_size = "QR Code Size";
$qr_code_button = "Display QR Code";
$qr_code_offline_title = "Offline Marketing";
$qr_code_offline_content1 = "Add this QR code to your marketing brochures, flyers, business cards, etc.";
$qr_code_offline_content2 = "- Right click the image and &lt;strong&gt;save-as&lt;/strong&gt; to your computer.";
$qr_code_online_title = "Online Marketing";
$qr_code_online_content = "Add this QR code to your website, social media, blogs, etc.";
$menu_coupon = "Coupon Codes";
$coupon_title = "Your Available Coupon Codes";
$coupon_desc = "Give these coupon codes out and earn a commission each time someone uses your code!";
$coupon_head_1 = "Coupon Code";
$coupon_head_2 = "Discount To Customer";
$coupon_head_3 = "Your Commission Amount";
$coupon_sale_amt = "of sale amount";
$coupon_flat_rate = "flat rate";
$coupon_default = "Default Payout Level";
$cc_vanity_title = "Request A Personalized Coupon Code";
$cc_vanity_field = "Coupon Code";
$cc_vanity_button = "Request Coupon Code";
$cc_vanity_error_missing = "<strong>Error!</strong> Please enter a coupon code.";
$cc_vanity_error_exists = "<strong>Error!</strong> You\'ve already requested this code. It is pending approval.";
$cc_vanity_error = "<strong>Error!</strong> Coupon code is invalid. Please use only letters, numbers and underscores.";
$cc_vanity_success = "<strong>Success!</strong> Your personalized coupon code has been requested.";
$coupon_none = "No coupon codes currently available.";
$pic_error_title = "Image Upload Error";
$pic_missing = "Please choose a filename.";
$pic_invalid = "Image type is not allowed. Allowed image types are .gif, .jpg and .png.";
$pic_error = "Image upload error, please contact the affiliate manager.";
$pic_success = "Your picture was successfully uploaded.";
$pic_title = "Upload Your Picture";
$pic_info = "Uploading your picture helps to personalize our experience with you.";
$pic_bullet_1 = "Images may be .jpg, .gif or .png.";
$pic_bullet_2 = "Any inappropriate images will be discarded and your account suspended.";
$pic_bullet_3 = "Your picture will not be shown publicly. It will only be attached your account for us to see.";
$pic_file = "Select A File:";
$pic_button = "Upload";
$pic_current = "My Current Picture";
$pic_remove = "Remove Picture";
$progress_title = "Eligibility For Next Payout:";
$progress_complete = "complete.";
$progress_none = "We have no minimum payout requirement.";
$progress_sentence_1 = "You have earned";
$progress_sentence_2 = "of the";
$progress_sentence_3 = "requirement.";
$aff_lib_button = "<font style=\"font-size:16px; font-weight:bold;\">Claim Your Free Access To</font><BR />www.AffiliateLibrary.com";
$menu_announcements = "Social Media Campaigns";
$announcements_name = "Campaign Name";
$announcements_facebook_message = "Facebook Message";
$announcements_twitter_message = "Twitter Message";
$announcements_facebook_link = "Facebook Link";
$announcements_facebook_picture = "Facebook Picture";
$general_last_30_days_activity = "Last 30 Days Activity";
$general_last_30_days_activity_traffic = "Traffic";
$general_last_30_days_activity_commissions = "Commissions";
$accountability_title = "Accountability and Communication";
$accountability_text = "<strong>What Is This?</strong><p>We take a proactive approach to creating trust with our affiliate partners. It is our goal to ensure we offer as much information as possible on each commission earned and/or declined in our system.</p><strong>Communication</strong><p>We\'re available to provide details on any declined commissions. We employ strong communication with our affiliates and encourage questions and feedback.</p>";
$debit_reason_0 = 'None';
$debit_reason_1 = 'Refund';
$debit_reason_2 = 'Chargeback';
$debit_reason_3 = 'Fraud Reported';
$debit_reason_4 = 'Cancelled Order';
$debit_reason_5 = 'Partial Refund';
$menu_drop_pending_debits = 'Pending Debits';
$debit_amount_label = 'Debit Amount';
$debit_date_label = 'Debit Date';
$debit_reason_label = 'Debit Reason';
$debit_paragraph = 'Debits will be deducted from your next payout.';
$debit_invoice_amount = 'Minus Debit Amount';
$debit_revised_amount = 'Revised Payment Amount';
$mv_head_description = 'Note: You can only place one video per page on your website.';
$mv_head_source_code = 'Paste this code into the HEAD section of your HTML document.';
$mv_body_title = 'Video Title';
$mv_body_description = 'Description';
$mv_body_source_code = 'Paste this code into the BODY section of your HTML document where you want the video to appear.';
$menu_marketing_videos = 'Videos';
$mv_preview_button = 'Preview Video';
$dt_no_data = 'No data available in table.';
$dt_showing_exists = 'Showing _START_ to _END_ of _TOTAL_ entries.';
$dt_showing_none = 'Showing 0 to 0 of 0 entries.';
$dt_filtered = '(filtered from _MAX_ total entries)';
$dt_length_choice = 'Show _MENU_ entries.';
$dt_loading = 'Loading...';
$dt_processing = 'Processing...';
$dt_no_records = 'No matching records found.';
$dt_first = 'First';
$dt_last = 'Last';
$dt_next = 'Next';
$dt_previous = 'Previous';
$dt_sort_asc = ': activate to sort column ascending';
$dt_sort_desc = ': activate to sort column descending';
$choose_marketing_group = 'Choose A Marketing Group';
$email_already_used_1 = 'Account cannot be created. We only allow';
$email_already_used_2 = 'account';
$email_already_used_3 = 'to be created per email address.';
$missing_fax = 'Please enter your fax number.';
$chart_last_6_months = 'Commissions Paid Last 6 Months';
$chart_last_6_months_paid = 'Commissions Paid';
$chart_this_month = 'Our Top 5 Affiliates This Month';
$chart_this_month_none = 'No data to display.';
$login_return = 'Return To Affiliate Home';
$login_lost_details = 'Enter your username and we\'ll send you an email with your login credentials.';
$account_edit_general_prefs = 'General Preferences';
$account_edit_email_language = 'Email Language';
$footer_connect = 'Connect With Us';
$modal_close = 'Close';
$vat_amount_heading = 'VAT Amount';
$menu_logout = 'Logout';
$menu_upload_picture = 'Upload Your Picture';
$menu_offer_testi = 'Offer A Testimonial';
$fb_login = 'Log in with Facebook';
$fb_permissions = 'Permissions not granted. Please allow the website to use your email address.';
$announcements_published = "Announcement Published";
$training_videos_title = "Training Videos";
$training_videos_general = "General Marketing";
$commission_method = "Commissioning Method";
$how_will_you_earn = "How will you earn commissions?";
$pm_account_credit = "We will credit your account in the amount of your commissions earned.";
$pm_check_money_order = "We will send you a check/money order in the mail.";
$pm_paypal = "We will send you a PayPal payment.";
$pm_stripe = "We will send you a Stripe payment.";
$pm_wire = "We will send you a wire transfer.";
$add_to_signup_left_column_text = "<span style=\"color:#CC0000; font-style:italic;\">* indicates required field.</span>";
$paypal_email = "Paypal Email";
$stripe_acct_details = "Stripe Account Details";
$stripe_connect = "You can connect to your stripe account from account settings page after signup.";
$stripe_success = "Stripe Account Connected Successfully";
$stripe_settings = "Stripe Settings";
$stripe_connect_edit = "Connect with Stripe";
$stripe_delete = "Delete Stripe Account";
$stripe_confirm = "Are you sure you want to delete this account?";
$payment_settings = "Payment Settings";
$edit_payment_settings = "Edit Payment Settings";
$invalid_paypal_address = "Invalid Paypal email address.";
$payment_method_error = "Please select a payment method.";
$payment_settings_updated = "Payment settings updated.";
$stripe_removed = "Stripe account removed.";
$payment_settings_success = "Success!";
$payment_update_notice_1 = "Notice!";
$payment_update_notice_2 = "You have chosen to receive a <strong>[payment_option_here]</strong> payment from us. Please <a href=\"account.php?page=48\" style=\"font-weight:bold;\">click here</a> to connect your <strong>[payment_option_here]</strong> account.";
$pm_title_credit = "Account Credit";
$pm_title_mo = "Check/Money Order";
$pm_title_paypal = "PayPal";
$pm_title_stripe = "Stripe";
$pm_title_wire = "Wire Transfer";
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
        $st = $db->prepare("insert into idevaff_language_packs (name, status, def, table_name, user_created, direction) VALUES (?, 1, 1, ?, 0, 0)");
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