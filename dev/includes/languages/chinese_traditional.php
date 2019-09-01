<?PHP

//-------------------------------------------------------
	  $language_pack_name = "traditional chinese";
	  $language_pack_table_name = "chinese_traditional";
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
$header_title = "聯盟計劃";
$header_indexLink = "聯盟主頁";
$header_signupLink = "現在註冊";
$header_accountLink = "管理帳戶";
$header_emailLink = "聯絡我們";
$header_greeting = "歡迎";
$header_nonLogged = "訪客";
$header_logout = "這裡登出";
$footer_tag = "iDevAffiliate的聯盟軟件";
$footer_copyright = "版權";
$footer_rights = "版權所有";
$index_heading_1 = "歡迎來到我們的聯盟計劃！";
$index_paragraph_1 = "我們的計劃是免費參加的，而且註冊容易，不需要任何技術知識。聯盟計劃在互聯網上是十分常見的，並讓所有網站擁有人可以從他們的網站中得到另一種獲利方式。聯盟伙伴為商業網站產生流量和銷售，並以獲得佣金作為報酬。";
$index_heading_2 = "計劃是如何運作的？";
$index_paragraph_2 = "當你加入我們的聯盟計劃之後，你將會得到大量橫幅廣告和文字鏈結等資源，然後你可以把它們放置在你的網站當中。當有訪客點擊你的鏈結時，他們會被帶到我們的網站當中，而他們的活動會被我們的聯盟軟件所追蹤。最後，你便可以根據你的聯盟佣金類型來賺取佣金。";
$index_heading_3 = "即時統計和報告！";
$index_paragraph_3 = "每天登入24小時來檢查你的銷售、流量、帳戶結餘和看看你的橫幅廣告表現。";
$index_login_title = "聯盟伙伴登入";
$index_login_username = "用戶名";
$index_login_password = "密碼";
$index_login_username_field = "用戶名";
$index_login_password_field = "密碼";
$index_login_button = "登入";
$index_login_signup_link = "點擊這裡註冊";
$index_table_title = "計劃詳情";
$index_table_commission_type = "佣金類型";
$index_table_initial_deposit = "初始存款";
$index_table_requirements = "提款要求";
$index_table_duration = "提款時間";
$index_table_choose = "請從以下選擇提款方式！";
$index_table_sale = "按銷售數量付費";
$index_table_click = "按點擊數量付費";
$index_table_sale_text = "為你所帶來的每次銷售。";
$index_table_click_text = "為你所帶來的每次點擊。";
$index_table_deposit_tag = "只為註冊！";
$index_table_requirements_tag = "提款所需要的最低餘額。";
$index_table_duration_tag = "每月為上個月的結餘提款一次。";
$signup_left_column_text = "加入我們的聯盟計劃，並開始為你每次所帶來的銷售交易賺取佣金！輕鬆地開設你的帳戶，並把你的鏈結代碼放到你的網站當中。然後，看看當你的訪客成為我們的客戶之後，你的帳戶結餘便會急速增長。";
$signup_left_column_title = "歡迎聯盟伙伴！";
$signup_login_title = "開設你的帳戶";
$signup_login_username = "用戶名";
$signup_login_password = "密碼";
$signup_login_password_again = "再次輸入密碼";
$signup_login_minmax_chars = "- 用戶名稱至少要有 user_min_chars 個字符。&lt;br /&gt;- 用戶名稱必須為字母和數字的組合。&lt;br /&gt;- 用戶名稱可包含這些符號：_（限用底線）&lt;br /&gt;&lt;br /&gt;- 密碼必須至少有 pass_min_chars 個字符。&lt;br /&gt;- 密碼必須為字母和數字的組合。&lt;br /&gt;- 密碼可包含這些符號：characters_allowed";
$signup_login_must_match = "此項目必須與密碼相匹配。";
$signup_standard_title = "一般資料";
$signup_standard_email = "電郵地址";
$signup_standard_company = "公司名稱";
$signup_standard_checkspayable = "支票抬頭為";
$signup_standard_weburl = "網站地址";
$signup_standard_taxinfo = "稅號、社會安全號碼或增值稅號";
$signup_personal_title = "個人資料";
$signup_personal_fname = "名字";
$signup_personal_state = "州份或省份";
$signup_personal_lname = "姓氏";
$signup_personal_phone = "電話號碼";
$signup_personal_addr1 = "地址";
$signup_personal_fax = "傳真號碼";
$signup_personal_addr2 = "其他地址";
$signup_personal_zip = "郵政編碼";
$signup_personal_city = "城市";
$signup_personal_country = "國家";
$signup_commission_title = "佣金支付";
$signup_commission_howtopay = "我們應該如何支付給你呢？";
$signup_commission_style_PPS = "按銷售數量付費";
$signup_commission_style_PPC = "按點擊數量付費";
$signup_terms_title = "條款和條件";
$signup_terms_agree = "我已閱讀、理解並同意以上條款和條件。";
$signup_page_button = "開設我的帳戶";
$signup_success_email_comment = "我們已經向你發送了一封附有你的用戶名和密碼的電子郵件。<BR />\r\n你應該好好保存有關資料，以備日後使用。";
$signup_success_login_link = "登入到你的帳戶";
$custom_fields_title = "用戶定義的項目";
$logout_msg = "<b>你現在已經登出</b><BR />多謝你參與我們的聯盟計劃。";
$signup_page_success = "你的帳戶已經建立";
$login_left_column_title = "帳戶登入";
$login_left_column_text = "輸入你的用戶名和密碼來存取你的帳戶統計資料、橫幅廣告、鏈結代碼、常見問題和其他更多更多。<BR/ ><BR/ >如果你忘記了你的密碼，請輸入你的用戶名，我們便會通過電子郵件來告知你的登入資料。<BR /><BR />";
$login_title = "登入到你的帳戶";
$login_username = "用戶名";
$login_password = "密碼";
$login_invalid = "登入無效";
$login_now = "登入到我的帳戶";
$login_send_title = "需要你的密碼？";
$login_send_username = "用戶名";
$login_send_info = "把登入資料發送至電子郵箱";
$login_send_pass = "發送至電子郵箱";
$login_send_bad = "找不到用戶名";
$help_new_password_heading = "新密碼";
$help_new_password_info = "您的密碼長度必須至少有 pass_min_chars 個字，只能包含字母、數字和以下字符：characters_allowed";
$help_confirm_password_heading = "確認新密碼";
$help_confirm_password_info = "此密碼必須與新密碼相匹配。";
$help_custom_links_heading = "追蹤關鍵字";
$help_custom_links_info = "你的關鍵字不可以超過30個字符，並可以只包含字母、數字和連字符。";
$error_title = "檢測到以下錯誤";
$username_invalid = "用戶名稱無效，只能包含字母、數字和底線。";
$username_taken = "你所選的用戶名已經被佔用。";
$username_short = "你的用戶名太短了，必須至少user_min_chars個字符。";
$username_long = "你的用戶名太長了，必須最多user_max_chars個字符。";
$password_invalid = "密碼無效，只能包含字母、數字和以下字符：  characters_allowed";
$password_short = "你的密碼太短了，必須至少pass_min_chars個字符。";
$password_long = "你的密碼太長了，必須最多pass_max_chars個字符。";
$password_mismatch = "你輸入的密碼不匹配。";
$missing_checks = "請輸入支票抬頭的收款人姓名。";
$missing_tax = "請輸入你的稅號、社會安全號碼或增值稅號碼。";
$missing_fname = "請輸入你的名字。";
$missing_lname = "請輸入你的姓氏。";
$missing_email = "請輸入你的電郵地址。";
$invalid_email = "你的電郵地址無效。";
$missing_address = "請輸入你的地址。";
$missing_city = "請輸入你的城市。";
$missing_company = "請輸入你的公司名稱。";
$missing_state = "請輸入你的州份或省份。";
$missing_zip = "請輸入你的郵政編碼。";
$missing_phone = "請輸入你的電話號碼。";
$missing_website = "請輸入你的網站地址。";
$missing_paypal = "你已經選擇了接受PayPal支付，請輸入你的PayPal帳戶。";
$missing_terms = "你還沒有接受我們的條款和條件。";
$paypal_required = "需要PayPal帳戶來接受款項。";
$missing_custom = "請填寫這些項目：";
$account_total_transactions = "交易總額";
$account_standard_linking_code = "標準鏈結代碼 - 非常適合用於電子郵件！";
$account_copy_paste = "把以上的代碼複製/貼上到你的網站或電子郵件之中";
$account_not_approved = "你的帳戶目前正在等待審批";
$account_suspended = "你的帳戶目前已被暫停";
$account_standard_earnings = "標準收益";
$account_inc_bonus = "包括額外獎金";
$account_second_tier = "級別盈利";
$account_recurring = "經常性盈利";
$account_not_available = "N/A";
$account_earned_todate = "至今總計盈利";
$menu_heading_overview = "帳戶概覽";
$menu_general_stats = "一般統計";
$menu_tier_stats = "級別統計";
$menu_payment_history = "付款記錄";
$menu_commission_details = "佣金詳情";
$menu_recurring_commissions = "經常性佣金";
$menu_traffic_log = "輸入流量日誌";
$menu_heading_marketing = "市場營銷材料";
$menu_banners = "橫幅廣告";
$menu_text_ads = "文字廣告";
$menu_text_links = "文字鏈結";
$menu_email_links = "電郵鏈結";
$menu_html_links = " HTML廣告";
$menu_offline = "離線營銷";
$menu_tier_linking_code = "級別鏈結代碼";
$menu_email_friends = "電郵好友&amp;同事";
$menu_custom_links = "構建&amp;追蹤自己的鏈結";
$menu_heading_management = "帳戶管理";
$menu_comalert = "CommissionAlert設定";
$menu_comstats = "CommissionStats設定";
$menu_edit_account = "編輯我的帳戶";
$menu_change_pass = "更改我的密碼";
$menu_change_commission = "更改我的佣金方式";
$menu_heading_general_info = "一般資料";
$menu_browse_affiliates = "瀏覽其他聯盟伙伴";
$menu_faq = "常見問題";
$suspended_title = "帳戶狀態通報";
$suspended_heading = "你的帳戶目前已被暫停";
$suspended_notes = "管理員注意事項";
$pending_title = "帳戶狀態通報";
$pending_heading = "你的帳戶目前正在等待審批";
$pending_note = "我們一旦批准了你的帳戶，便會向你提供市場營銷材料。";
$faq_title = "常見問題";
$faq_none = "沒有常見問題";
$browse_title = "瀏覽其他聯盟伙伴";
$browse_none = "沒有其他聯盟伙伴可以查看";
$change_comm_title = "更改佣金方式";
$change_comm_curr_comm = "目前的佣金方式";
$change_comm_curr_pay = "目前支付等級";
$change_comm_new_comm = "新的佣金方式";
$change_comm_warning = "如果你改變佣金方式，你的帳戶會被重置為第1級付費級別";
$change_comm_button = "更改佣金方式";
$change_comm_no_other = "沒有其他可用的佣金方式";
$change_comm_level = "級別";
$change_comm_updated = "佣金方式已更新";
$password_title = "更改我的密碼";
$password_old_password = "舊密碼";
$password_new_password = "新密碼";
$password_confirm_password = "確認新密碼";
$password_button = "更改密碼";
$password_warning_old_missing = "舊密碼不正確或未輸入";
$password_warning_new_missing = "未輸入新密碼";
$password_warning_mismatch = "新密碼不匹配";
$password_warning_invalid = "密碼無效 – 點擊支援鏈結";
$password_notice = "密碼已更新";
$edit_failed = "更新失敗 - 請參閱上述錯誤";
$edit_success = "帳戶已更新";
$edit_button = "編輯我的帳戶";
$commissionstats_title = "CommissionStats設定";
$commissionstats_info = "通過安裝CommissionStats，你可以即時從你的視窗桌面上查看你的統計資料！要安裝此功能，請下載CommissionStats並<a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>解壓</b></a>文件到你的硬盤，然後執行<b>setup.exe</b>檔案。當要求你的登入資料時，請輸入以下有關資料。";
$commissionstats_hint = "提示：複製貼上每個項目，以確保準確性";
$commissionstats_profile = "檔案名稱";
$commissionstats_username = "用戶名";
$commissionstats_password = "密碼";
$commissionstats_id = "聯盟伙伴ID ";
$commissionstats_source = "來源路徑網址";
$commissionstats_download = "下載CommissionStats";
$commissionalert_title = "CommissionAlert設定";
$commissionalert_info = "通過安裝CommissionAlert，我們會即時從你的視窗桌面上通知你的最新佣金！要安裝此功能，請下載CommissionAlert並<a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>解壓</b></a>文件到你的硬盤，然後執行<b>setup.exe</b>檔案。當要求你的登入資料時，請輸入以下有關資料。";
$commissionalert_hint = "提示：複製貼上每個項目，以確保準確性";
$commissionalert_profile = "檔案名稱";
$commissionalert_username = "用戶名";
$commissionalert_password = "密碼";
$commissionalert_id = "聯盟伙伴ID ";
$commissionalert_source = "來源路徑網址";
$commissionalert_download = "下載CommissionAlert";
$offline_title = "離線營銷";
$offline_paragraph_one = "通過向你的朋友和同事(離線)宣傳我們的網站來賺錢！";
$offline_send = "發送客戶到";
$offline_page_link = "查看頁面";
$offline_paragraph_two = "你的客戶會在以上頁面輸入你的<b>聯盟伙伴ID號碼</b>，以當他們作出任何購買交易時，會把你標示為聯盟伙伴。";
$banners_title = "橫幅廣告";
$banners_size = "橫幅廣告尺寸";
$banners_description = "橫幅廣告說明";
$ad_title = "文字廣告";
$ad_info = "請使用所提供的鏈結代碼，你可以調整文字廣告的配色、高度和寬度。";
$links_title = "鏈結名稱";
$email_title = "電郵鏈結";
$email_group = "市場營銷群組";
$email_button = "顯示電郵鏈結";
$email_no_group = "沒有選擇群組";
$email_choose = "請選擇以上一個市場營銷群組";
$email_notice = "不同的市場營銷群組可能有不同的流量輸入網頁";
$email_ascii = "<b>ASCII/文字版本</b> - 適用於純文字電子郵件。";
$email_html = "<b>HTML版本</b> - 適用於HTML格式的電子郵件。";
$email_test = "測試鏈結";
$email_test_info = "這就是你的客戶將會被發送到我們網站的地方。";
$email_source = "源代碼 - 複製/貼上到你的電子郵件";
$html_title = " HTML廣告名稱";
$html_view_link = "查看此HTML廣告";
$traffic_title = "輸入流量日誌";
$traffic_display = "顯示最近";
$traffic_display_visitors = "訪客";
$traffic_button = "查看流量日誌";
$traffic_title_details = "輸入流量詳情";
$traffic_ip = "IP地址";
$traffic_refer = "參照網址";
$traffic_date = "日期";
$traffic_time = "時間";
$traffic_bottom_tag_one = "顯示最近";
$traffic_bottom_tag_two = "之";
$traffic_bottom_tag_three = "單一訪客總數";
$traffic_none = "沒有流量日誌存在";
$traffic_no_url = "N/A - 可能的書籤或電郵鏈結";
$traffic_box_title = "完整的參照網址";
$traffic_box_info = "點擊鏈結來訪問網頁";
$payment_title = "付款記錄";
$payment_date = "付款日期";
$payment_commissions = "佣金";
$payment_amount = "支付金額";
$payment_totals = "合共";
$payment_none = "沒有付款記錄存在";
$tier_stats_title = "級別統計";
$tier_stats_accounts = "直屬你的級別帳戶";
$tier_stats_grab_link = "獲取你的級別鏈結代碼";
$tier_stats_none = "沒有級別帳戶存在";
$tier_stats_username = "用戶名";
$tier_stats_current = "目前佣金";
$tier_stats_previous = "之前的支付";
$tier_stats_totals = "合共";
$recurring_title = "經常性佣金";
$recurring_none = "沒有經常性佣金存在";
$recurring_date = "佣金日期";
$recurring_status = "經常性狀態";
$recurring_payout = "下次支付";
$recurring_amount = "金額";
$recurring_every = "每";
$recurring_in = "在";
$recurring_days = "天";
$recurring_total = "合共";
$tlinks_title = "添加其他用戶到你的級別，並從他們身上賺錢！";
$tlinks_embedded_one = "級別註冊計入在你的標準聯盟鏈結中已處於生效狀態！";
$tlinks_embedded_two = "使用級別系統可以允許你向其他人推廣我們的聯盟計劃，當你透過以下特別的級別推薦鏈結，令某人加入我們聯盟計劃的話，你便會成為此人的上層，而你可以賺取多少佣金的資料如下。";
$tlinks_embedded_current = "目前級別付款";
$tlinks_forced_two = "使用級別系統可以允許你向其他人推廣我們的聯盟計劃，當你透過以下特別的級別推薦鏈結，令某人加入我們聯盟計劃的話，你便會成為此人的上層，而你可以賺取多少佣金的資料如下。";
$tlinks_forced_code = "級別推薦鏈結";
$tlinks_forced_paste = "複製/貼上以上的代碼到你的網站";
$tlinks_forced_money = "網站擁有者在這裡賺大錢！";
$comdetails_title = "佣金詳情";
$comdetails_date = "佣金日期";
$comdetails_time = "佣金時間";
$comdetails_type = "佣金類型";
$comdetails_status = "目前狀態";
$comdetails_amount = "佣金數額";
$comdetails_additional_title = "額外的佣金詳情";
$comdetails_additional_ordnum = "訂購號碼";
$comdetails_additional_saleamt = "銷售金額";
$comdetails_type_1 = "額外獎賞佣金";
$comdetails_type_2 = "經常性佣金";
$comdetails_type_3 = "級別佣金";
$comdetails_type_4 = "標準佣金";
$comdetails_status_1 = "已付";
$comdetails_status_2 = "已核准 – 有待付款";
$comdetails_status_3 = "有待核准";
$comdetails_not_available = "N/A";
$details_title = "佣金詳情";
$details_drop_1 = "目前的標準佣金";
$details_drop_2 = "目前的級別佣金";
$details_drop_3 = "佣金有待核准";
$details_drop_4 = "已付標準佣金";
$details_drop_5 = "已付級別佣金";
$details_button = "查看佣金";
$details_date = "日期";
$details_status = "狀態";
$details_commission = "佣金";
$details_details = "查看詳情";
$details_type_1 = "已付";
$details_type_2 = "有待核准";
$details_type_3 = "已核准 – 有待付款";
$details_none = "沒有佣金可以查看";
$details_no_group = "沒有選擇佣金群組";
$details_choose = "請選擇以上一個佣金群組";
$general_title = "目前佣金 - 從上次付款至今";
$general_transactions = "交易";
$general_earnings_to_date = "至今收益";
$general_history_link = "查看付款記錄";
$general_standard_earnings = "標準收益";
$general_current_earnings = "目前收益";
$general_traffic_title = "流量統計";
$general_traffic_visitors = "訪客";
$general_traffic_unique = "單一訪客";
$general_traffic_sales = "已核准銷售";
$general_traffic_ratio = "銷售比率";
$general_traffic_info = "這些統計數字並不包括經常性或級別性佣金。";
$general_traffic_pay_type = "支付類型";
$general_traffic_pay_level = "目前支付等級";
$general_notes_title = "從管理員的注意事項";
$general_notes_date = "創建日期";
$general_notes_to = "至";
$general_notes_all = "所有聯盟伙伴";
$general_notes_none = "沒有注意事項可以查看";
$contact_left_column_title = "聯絡我們";
$contact_left_column_text = "請隨時使用右邊的表格來與我們的聯盟經理聯絡。";
$contact_title = "聯絡我們";
$contact_name = "你的姓名";
$contact_email = "你的電郵地址";
$contact_message = "訊息";
$contact_chars = "剩餘字符";
$contact_button = "發送訊息";
$contact_received = "我們已經收到你的訊息，會在24小時內回應。";
$contact_invalid_name = "姓名無效";
$contact_invalid_email = "電郵地址無效";
$contact_invalid_message = "訊息無效";
$invoice_button = "發票";
$invoice_header = "聯盟伙伴支付發票";
$invoice_aff_info = "聯盟伙伴資料";
$invoice_co_info = "資料";
$invoice_acct_info = "帳戶資料";
$invoice_payment_info = "付款資料";
$invoice_comm_date = "付款日期";
$invoice_comm_amt = "佣金數額";
$invoice_comm_type = "佣金類型";
$invoice_admin_note = "管理員注意事項";
$invoice_footer = "發票完成";
$invoice_print = "列印發票";
$invoice_none = "N/A";
$invoice_aff_id = "聯盟伙伴ID";
$invoice_aff_user = "用戶名";
$menu_pdf_marketing = " PDF營銷手冊";
$menu_pdf_training = " PDF培訓文件";
$marketing_target_url = "目標網址";
$marketing_source_code = "源代碼 - 複製/貼上到你的網站";
$marketing_group = "市場營銷群組";
$peels_title = "卷頁名稱";
$peels_view = "查看此卷頁";
$peels_description = "卷頁說明";
$lb_head_title = "你的HTML頁面需要HEAD代碼";
$lb_head_description = "若要在你的網站中使用燈箱，必須在想要顯示的頁面的HEAD部份添加以下代碼。";
$lb_head_source_code = "把這段代碼貼到你的HTML文檔的HEAD部分。";
$lb_head_code_notes = "不管你在頁面上放置多少個燈箱，都只需要放置此代碼一次。";
$lb_head_tutorial = "查看教程";
$lb_body_title = "燈箱名稱";
$lb_body_description = "燈箱說明";
$lb_body_click = "點擊以上圖片來查看燈箱。";
$lb_body_source_code = "把這段代碼貼到你的HTML文檔中想要顯示圖像的BODY部分。";
$pdf_title = "PDF";
$pdf_training = "培訓文件";
$pdf_marketing = "營銷手冊";
$pdf_description_1 = "需要使用Adobe Reader來查看和打印我們的PDF營銷材料。";
$pdf_description_2 = "Adobe Reader可以從Adobe網站中免費下載。";
$pdf_file_name = "檔案名稱";
$pdf_file_size = "檔案大小";
$pdf_file_description = "說明";
$pdf_bytes = "Bytes";
$menu_heading_training_materials = "培訓材料";
$menu_videos = "觀看培訓影片";
$menu_custom_manual = "自定追蹤鏈結手冊";
$menu_page_peels = "卷頁";
$menu_lightboxes = "燈箱";
$menu_email_templates = "電郵模板";
$menu_heading_custom_links = "自定追蹤鏈結";
$menu_custom_reports = "報告";
$menu_keyword_links = "關鍵字追蹤鏈結";
$menu_subid_links = "子聯盟伙伴追蹤鏈結";
$menu_alteranate_links = "備用傳入頁面鏈結";
$menu_heading_additional = "其他工具";
$menu_drop_heading_stats = "一般統計";
$menu_drop_heading_commissions = "佣金";
$menu_drop_heading_history = "付款記錄";
$menu_drop_heading_traffic = "流量日誌";
$menu_drop_heading_account = "我的帳戶";
$menu_drop_heading_logo = "上載我的標誌";
$menu_drop_heading_faq = "常見問題";
$menu_drop_general_stats = "一般統計";
$menu_drop_tier_stats = "級別統計";
$menu_drop_current = "目前佣金";
$menu_drop_tier = "目前級別佣金";
$menu_drop_pending = "有待核准";
$menu_drop_paid = "已付佣金";
$menu_drop_paid_rec = "已付級別佣金";
$menu_drop_recurring = "生效的經常性佣金";
$menu_drop_edit = "編輯我的帳戶";
$menu_drop_password = "更改我的密碼";
$menu_drop_change = "更改我的佣金方式";
$account_hidden = "隱藏";
$keyword_title = "自定關鍵字鏈結";
$keyword_info = "創建自定關鍵字的鏈結可以為你提供追蹤由各種來源傳入流量的能力，而創建具有多達4個不同追蹤關鍵字的鏈結和自定追蹤報表，將可以按每個關鍵字來顯示詳細報告。";
$keyword_heading = "對於自定關鍵字追蹤的可用變數";
$keyword_tracking = "追蹤ID ";
$keyword_build = "要建立你的鏈結，請採取以下網址，並添加你想使用的追蹤ID和關鍵字。";
$keyword_example = "例子";
$keyword_tutorial = "查看教程";
$sub_tracking_title = "子聯盟伙伴追蹤";
$sub_tracking_info = "創建一個子聯盟伙伴鏈結可以讓你把聯盟鏈結傳遞到你自己的聯盟伙伴，並且讓他們使用。你會知道是誰為你產生佣金，因為我們會向你匯報是你的那位子聯盟伙伴產生了銷售交易。另一個使用子聯盟伙伴鏈結的原因，是你可能會有自己的追蹤系統，並想把它包括在報告之中。";
$sub_tracking_build = "在你的聯盟計劃中，把XXX替換成聯盟伙伴的ID號碼，並為你所有的聯盟伙伴重複這個步驟。";
$sub_tracking_example = "例子";
$sub_tracking_tutorial = "查看教程";
$sub_tracking_id = "子聯盟伙伴ID";
$alternate_title = "備用傳入頁面鏈結";
$alternate_option_1 = "選項1：自動創建鏈結";
$alternate_heading_1 = "自動創建鏈結";
$alternate_info_1 = "透過輸入你想流量輸送到的網址來定義你自己的傳入流量頁面，然後我們便會為你創建一個鏈結。使用此功能可以創建一個較短的鏈結來供你使用，鏈結是使用我們數據庫中的ID號碼，而網址會嵌入到鏈結之中。";
$alternate_button = "創建我的鏈結";
$alternate_links_heading = "我的備用傳入網址鏈結";
$alternate_links_note = "如果你移除頁面的自定鏈結，現有的鏈結將會保持原封和有效。";
$alternate_links_remove = "移除";
$alternate_option_2 = "選項2：手動創建鏈結";
$alternate_info_2 = "如果你寧願添加你自己的聯盟鏈結到備用傳入網址，請使用以下結構。";
$alternate_variable = "備用傳入網址變數";
$alternate_example = "例子";
$alternate_build = "要建立你的鏈結，請採取以下網址，並添加你想使用的備用傳入網址。";
$alternate_none = "沒有創建備用傳入鏈結";
$alternate_tutorial = "查看教程";
$cr_title = "自定關鍵字報告";
$cr_select = "選擇一個關鍵字";
$cr_button = "產出報告";
$cr_no_results = "沒有搜索結果";
$cr_no_results_info = "嘗試不同的關鍵字組合";
$cr_used = "已用的關鍵字";
$cr_found = "發現此鏈結";
$cr_times = "次";
$cr_unique = "找到單一鏈結";
$cr_detailed = "詳細鏈結報告";
$cr_export = "匯出報告到Excel";
$cr_none = "找不到關鍵字";
$logo_title = "上載你的公司標誌";
$logo_info = "如果你想上載你的公司標誌，我們會向你帶到我們網站的客戶顯示出來。這可以讓他們在瀏覽我們時，獲得個人化的客戶體驗。";
$logo_bullet_one = "圖像可以是jpg、gif或png格式，但Flash內容是不允許的。";
$logo_bullet_two = "任何不恰當的圖像將會被移除，而你的帳戶將會被暫停。";
$logo_bullet_three = "你的圖像/標誌不會在我們的網站中顯示出來，直至我們核准為止。";
$logo_bullet_size_one = "圖像的最大寬度為";
$logo_bullet_size_two = "像素並同時最大的高度為";
$logo_bullet_req_size_one = "圖像必須具有的寬度為";
$logo_bullet_req_size_two = "像素並同時高度為";
$logo_bullet_pixels = "像素。";
$logo_choose = "選擇圖像";
$logo_file = "選擇檔案：";
$logo_browse = "瀏覽...";
$logo_button = "上載";
$logo_current = "我目前的圖像";
$logo_remove = "移除";
$logo_display_status = "圖像狀態：";
$logo_pending = "有待核准";
$logo_approved = "已核准";
$logo_success = "圖像已上載成功，現在正等待審批。";
$signup_security_title = "帳戶驗證";
$signup_security_info = "請輸入框中顯示的安全碼，這步驟有助我們防止自動程式註冊。";
$signup_security_code = "安全碼";
$sub_tracking_none = "無";
$missing_security_code = "不正確或未輸入帳戶驗證碼/安全碼";
$alternate_success_title = "鏈結創建成功";
$alternate_success_info = "獲取以下鏈結，並開始傳送流量到你定義的網址。";
$alternate_failed_title = "鏈結創建錯誤";
$alternate_failed_info = "請輸入一個有效的網址。";
$logo_missing_filename = "請選擇一個檔案名稱。";
$logo_required_width = "圖像寬度必須為";
$logo_required_height = "圖像高度必須為";
$logo_maximum_width = "圖像寬度只能是";
$logo_maximum_height = "圖像高度只能是";
$logo_size_maximum = "圖像尺寸只能是最大";
$logo_bad_filetype = "此圖像類型是不允許的，允許的圖像類型是gif、jpg和png。";
$logo_upload_error = "圖像上載錯誤，請聯絡聯盟經理。";
$logo_error_title = "圖像上載錯誤";
$logo_error_bytes = "bytes。";
$excel_title = "自定關鍵字鏈結報告";
$excel_tab_report = "自定關鍵字報告";
$excel_tab_logs = "流量日誌";
$excel_date = "報告日期：";
$excel_affiliate = "聯盟伙伴ID：";
$excel_criteria = "關鍵字鏈結條件";
$excel_link = "鏈結結構";
$excel_hits = "單一點擊";
$excel_comm_stats = "佣金統計";
$excel_comm_current = "目前佣金";
$excel_comm_paid = "已付佣金";
$excel_comm_total = "總佣金";
$excel_comm_ratio = "轉換率";
$excel_earned = "佣金賺取";
$excel_earned_current = "目前佣金";
$excel_earned_paid = "已付佣金";
$excel_earned_total = "佣金賺取總額";
$excel_earned_tab = "點擊(以下)流量日誌選項，以查看這個自定鏈結的流量日誌。";
$excel_log_title = "自定關鍵字流量日誌";
$excel_log_ip = " IP地址";
$excel_log_refer = "參照網址";
$excel_log_date = "日期";
$excel_log_time = "時間";
$excel_log_target = "目標網址";
$etemplates_title = "電郵模板";
$etemplates_view_link = "查看此電郵模板";
$etemplates_name = "模板名稱";
$signup_maintenance_heading = "維護通知";
$signup_maintenance_info = "暫時停止註冊，請稍後再試。";
$marketing_group_title = "市場營銷群組";
$marketing_button = "顯示";
$marketing_no_group = "沒有選擇群組";
$marketing_choose = "請選擇以上一個市場營銷群組";
$marketing_notice = "不同的市場營銷群組可能有不同的流量輸入網頁";
$canspam_heading = " CAN-SPAM規則和接納";
$canspam_accept = "我已閱讀、理解並同意以上CAN-SPAM規則。";
$canspam_error = "你還沒有接受我們的CAN-SPAM規則。";
$signup_banned = "開設帳戶時發生錯誤，請與系統管理員聯絡以獲取更多訊息。";
$header_testimonials = "聯盟伙伴見證";
$testi_visit = "訪問網站";
$testi_description = "為我們的聯盟計劃提供你的推薦見證，我們會把它放在我們的&lt;a href=&quot;testimonials.php&quot;&gt;見證&lt;/a&gt;頁面，同時附設鏈結到你的網站。";
$testi_name = "姓名";
$testi_url = "網址";
$testi_content = "見證";
$testi_code = "安全碼";
$testi_submit = "提交見證";
$testi_na = "見證並不適用。";
$testi_title = "提供見證";
$testi_success_title = "見證成功";
$testi_success_message = "感謝你提交你的見證，我們的團隊會盡快審核。";
$testi_error_title = "見證錯誤";
$testi_error_name_missing = "請為你的見證註明你的姓名。";
$testi_error_url_missing = "請為你的見證註明你的網址。";
$testi_error_missing = "請為你的見證附上文字。";
$menu_drop_delayed = "延遲佣金";
$details_drop_6 = "目前延遲佣金";
$details_type_6 = "延遲 - 將會很快批核";
$comdetails_status_6 = "延遲 - 將會很快批核";
$tc_reaccept_title = "條款和條件變更通知";
$tc_reaccept_sub_title = "你必須同意我們最新的條款和條件，以能夠繼續存取你的帳戶。";
$tc_reaccept_button = "我已閱讀、理解並同意以上的條款和條件。";
$tlinks_active = "活躍的級別數目";
$tlinks_payout_structure = "級別付款結構";
$tlinks_level = "等級";
$tierText1 = "% 計算由推薦聯盟伙伴的佣金數額獲得。";
$tierText2 = "% 計算由上層的佣金數額獲得。";
$tierText3 = "% 計算由銷售金額獲得。";
$tierTextflat = "普通費率。";
$edit_custom_button = "編輯答案";
$private_heading = "私人註冊";
$private_info = "我們的聯盟計劃並不向公眾開放，並且需要一個註冊代碼才可以加入。有關如何獲得一個註冊代碼的資料可以在這裡找到。";
$private_required_heading = "所需的註冊代碼";
$private_code_title = "輸入註冊代碼";
$private_button = "提交代碼";
$private_error_title = "提供的註冊代碼無效";
$private_error_invalid = "你所提供的註冊代碼無效。";
$private_error_expired = "你所提供的註冊代碼已經過期，而且不再有效。";
$qr_code_title = "QR碼";
$qr_code_size = "QR碼大小";
$qr_code_button = "顯示QR碼";
$qr_code_offline_title = "離線營銷";
$qr_code_offline_content1 = "把這個QR碼添加到你的市場營銷宣傳冊、傳單和名片等等。";
$qr_code_offline_content2 = "- 右鍵點擊圖像，並&lt;strong&gt;儲存&lt;/strong&gt;到你的電腦之中。";
$qr_code_online_title = "網絡營銷";
$qr_code_online_content = "把這個QR碼添加到你的網站、社交媒體和博客等等。";
$menu_coupon = "優惠代碼";
$coupon_title = "你可使用的優惠代碼";
$coupon_desc = "發送這些優惠代碼出去，當每次有人使用你的代碼時，便可以賺取佣金！";
$coupon_head_1 = "優惠代碼";
$coupon_head_2 = "給客戶折扣";
$coupon_head_3 = "你的佣金金額";
$coupon_sale_amt = "的銷售金額";
$coupon_flat_rate = "普通費率";
$coupon_default = "預設付款等級";
$cc_vanity_title = "要求個人化的優惠代碼";
$cc_vanity_field = "優惠代碼";
$cc_vanity_button = "要求優惠代碼";
$cc_vanity_error_missing = "<strong>錯誤！</strong>請輸入優惠代碼。";
$cc_vanity_error_exists = "<strong>錯誤！</strong>你已經要求過這個代碼，並正在等待審批。";
$cc_vanity_error = "<strong>錯誤！</strong>優惠代碼無效，請只使用字母、數字和下劃線。";
$cc_vanity_success = "<strong>成功！</strong>你的個人化優惠代碼已被請求。";
$coupon_none = "目前沒有可用的優惠代碼。";
$pic_error_title = "圖像上載錯誤";
$pic_missing = "請選擇一個檔案名稱。";
$pic_invalid = "此圖像類型是不允許的，允許的圖像類型是gif、jpg和png。";
$pic_error = "圖像上載錯誤，請聯絡聯盟經理。";
$pic_success = "你的圖片已被成功上載。";
$pic_title = "上載你的圖片";
$pic_info = "上載你的圖片可以幫助你與我們獲得個人化的體驗。";
$pic_bullet_1 = "圖像可以是jpg、gif或png。";
$pic_bullet_2 = "任何不恰當的圖像將會被移除，而你的帳戶將會被暫停。";
$pic_bullet_3 = "你的圖片不會被公開展示，它只會附加於你的帳戶中，並讓我們看見。";
$pic_file = "選擇一個檔案：";
$pic_button = "上載";
$pic_current = "我目前的圖片";
$pic_remove = "刪除圖片";
$progress_title = "獲得下一筆款項的資格：";
$progress_complete = "完成。";
$progress_none = "我們沒有最低付款要求。";
$progress_sentence_1 = "你已賺取";
$progress_sentence_2 = "之";
$progress_sentence_3 = "要求。";
$aff_lib_button = "<b>獲取你的免費使用！</b><BR />www.AffiliateLibrary.com";
$menu_announcements = "社交媒體宣傳活動";
$announcements_name = "宣傳活動名稱";
$announcements_facebook_message = " Facebook訊息";
$announcements_twitter_message = "Twitter訊息";
$announcements_facebook_link = "Facebook鏈結";
$announcements_facebook_picture = "Facebook圖片";
$general_last_30_days_activity = "最近30天的活動";
$general_last_30_days_activity_traffic = "流量";
$general_last_30_days_activity_commissions = "佣金";
$accountability_title = "負責與溝通";
$accountability_text = "<strong>這是什麼？</strong><p>我們採取積極的態度，與我們的聯盟伙伴建立信任關係。我們的目標是確保聯盟伙伴每次在我們的系統中賺取佣金和/或被拒絕賺取佣金時，獲得盡可能多的資訊。</p><strong>溝通</strong><p>我們可以為任何拒絕賺取的佣金提供詳細資訊，我們與聯盟伙伴保持積極的溝通，並鼓勵他們提問和發表意見。</p>";
$debit_reason_0 = "無";
$debit_reason_1 = "退款";
$debit_reason_2 = "扣費";
$debit_reason_3 = "造假報告";
$debit_reason_4 = "取消訂購";
$debit_reason_5 = "部分退款";
$menu_drop_pending_debits = "有待扣款";
$debit_amount_label = "扣款金額";
$debit_date_label = "扣款日期";
$debit_reason_label = "扣款原因";
$debit_paragraph = "扣款會從你的下一筆付款中扣除。";
$debit_invoice_amount = "減去扣款金額";
$debit_revised_amount = "修訂後的付款金額";
$mv_head_description = "注意：你只能夠在你網站的每一頁中放置一個影片。";
$mv_head_source_code = "把這段代碼貼到你的HTML文檔的HEAD部分。";
$mv_body_title = "影片標題";
$mv_body_description = "說明";
$mv_body_source_code = "把這段代碼貼到你的HTML文檔中想要顯示影片的BODY部分。";
$menu_marketing_videos = "影片";
$mv_preview_button = "預覽影片";
$dt_no_data = "在表中並無可用數據。";
$dt_showing_exists = "顯示_START_至_END_之_TOTAL_項目。";
$dt_showing_none = "顯示0至0之0項目。";
$dt_filtered = "(從_MAX_合共項目篩選)";
$dt_length_choice = "顯示_MENU_項目。";
$dt_loading = "加載中...";
$dt_processing = "處理中...";
$dt_no_records = "找不到匹配的記錄。";
$dt_first = "第一";
$dt_last = "最後";
$dt_next = "下一個";
$dt_previous = "上一個";
$dt_sort_asc = "：啟動從小至大排列";
$dt_sort_desc = "：啟動從大至小排列";
$choose_marketing_group = "選擇一個市場營銷群組";
$email_already_used_1 = "帳戶無法開立，我們只允許";
$email_already_used_2 = "帳戶";
$email_already_used_3 = "按每個電郵地址開立。";
$missing_fax = "請輸入你的傳真號碼。";
$chart_last_6_months = "過去6個月的佣金支付";
$chart_last_6_months_paid = "佣金支付";
$chart_this_month = "我們本月的前5位聯盟伙伴";
$chart_this_month_none = "沒有數據顯示。";
$login_return = "返回聯盟首頁";
$login_lost_details = "請輸入你的用戶名，我們便會向你發送附有你的登入憑據的電子郵件。";
$account_edit_general_prefs = "一般偏好";
$account_edit_email_language = "電郵語言";
$footer_connect = "與我們保持聯繫";
$modal_close = "關閉";
$vat_amount_heading = "增值稅金額";
$menu_logout = "登出";
$menu_upload_picture = "上載你的圖片";
$menu_offer_testi = "提供見證";
$fb_login = "用Facebook登入";
$fb_permissions = "未授予權限，請允許網站使用你的電郵地址。";
$announcements_published = "公告已發佈";
$training_videos_title = "培訓影片";
$training_videos_general = "一般市場營銷";
$commission_method = "佣金方法";
$how_will_you_earn = "您可如何賺取佣金？";
$pm_account_credit = "我們將會把您所賺取的佣金金額存入您的帳戶內。";
$pm_check_money_order = "我們將會把支票/匯票郵寄給您。";
$pm_paypal = "我們將會以PayPal向您支付款項。";
$pm_stripe = "我們將會以Stripe向您支付款項。";
$pm_wire = "我們將會電匯給您。";
$add_to_signup_left_column_text = "<span style=\"color:#CC0000; font-style:italic;\">* 為必要填寫欄位。</span>";
$paypal_email = "Paypal電郵";
$stripe_acct_details = "Stripe帳戶詳情";
$stripe_connect = "您可於登記後由您的帳戶設定頁面連接到您的Stripe帳戶。";
$stripe_success = "成功連接Stripe帳戶";
$stripe_settings = "Stripe設定";
$stripe_connect_edit = "與Stripe連接";
$stripe_delete = "刪除Stripe帳戶 ";
$stripe_confirm = "您是否確定您要刪除此帳戶？";
$payment_settings = "付款設置";
$edit_payment_settings = "編輯付款設置";
$invalid_paypal_address = "無效的Paypal電郵地址。";
$payment_method_error = "請選擇付款方式。";
$payment_settings_updated = "付款設置已更新。";
$stripe_removed = " Stripe帳戶已刪除。";
$payment_settings_success = "成功！";
$payment_update_notice_1 = "注意！";
$payment_update_notice_2 = "你已選擇從我們收到<strong>[payment_option_here]</strong>付款。請<a href=\"account.php?page=48\" style=\"font-weight:bold;\">點擊此處</a>來連接你的<strong>[payment_option_here]</strong>帳戶。";
$pm_title_credit = "帳戶存款";
$pm_title_mo = "支票/匯票";
$pm_title_paypal = "PayPal";
$pm_title_stripe = "Stripe";
$pm_title_wire = "電匯";
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