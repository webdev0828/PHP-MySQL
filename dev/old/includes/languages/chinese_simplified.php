<?PHP

//-------------------------------------------------------
	  $language_pack_name = "mandarin chinese";
	  $language_pack_table_name = "chinese_simplified";
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
$header_title = "分销联盟计划";
$header_indexLink = "分销主页";
$header_signupLink = "即刻注册";
$header_accountLink = "管理账户";
$header_emailLink = "联系我们";
$header_greeting = "欢迎";
$header_nonLogged = "客人";
$header_logout = "在此处登出";
$footer_tag = "由iDevAffiliate开发的分销软件";
$footer_copyright = "版权";
$footer_rights = "保留所有版权";
$index_heading_1 = "欢迎参加我们的分销联盟计划！";
$index_paragraph_1 = "我们的计划可免费加入，它\易于注册且完全不需要技术知识。分销联盟计划在互联网上很普遍，并且为网站所有者提供了额外的从网站盈利的方式。分销联盟计划为商业网站产生流量和销售额，收取佣金支付作为回报。";
$index_heading_2 = "它是如何工作的？";
$index_paragraph_2 = "当您加入我们的分销联盟计划后，我们将提供给您一系列的横幅广告和文字链接以置于自己的网站上。当一名用户点击其中的链接之一时，他们会被转向我们的网站并且他们的活动会被我们的分销联盟软件所追踪。您将基于您的佣金类型获得佣金。";
$index_heading_3 = "实时数据和报告！";
$index_paragraph_3 = "您可以全天24小时登录查看您的销售额、流量、账户余额并查看您的横幅广告表现如何。";
$index_login_title = "分销登录";
$index_login_username = "用户名";
$index_login_password = "密码";
$index_login_username_field = "用户名";
$index_login_password_field = "密码";
$index_login_button = "登录";
$index_login_signup_link = "点击这里注册";
$index_table_title = "计划详情";
$index_table_commission_type = "佣金类型";
$index_table_initial_deposit = "起始存款";
$index_table_requirements = "支付要求";
$index_table_duration = "支付期限";
$index_table_choose = "从以下的支付选项中选择一个！";
$index_table_sale = "按销售支付";
$index_table_click = "按点击支付";
$index_table_sale_text = "您提供的每一笔销售。";
$index_table_click_text = "您提供的每一次点击。";
$index_table_deposit_tag = "只是注册！";
$index_table_requirements_tag = "支付所需最低余额。";
$index_table_duration_tag = "每个月将支付上个月的盈利。";
$signup_left_column_text = "加入我们的分销联盟计划，根据您向我们提供的每一笔销售赚钱！只要创建账户并且将您的链接代码置于您的网站中，您就可以看到自己的账户余额随着您的访问者成为我们的消费者而不断增长。";
$signup_left_column_title = "欢迎加盟者！";
$signup_login_title = "创建您的账户";
$signup_login_username = "用户名";
$signup_login_password = "密码";
$signup_login_password_again = "再次输入密码";
$signup_login_minmax_chars = "- 用户名必须至少有user_min_chars 个字符。&lt;br /&gt; - 用户名可以是字母-数字的组合。&lt;br /&gt;- 用户名只能包含这些字符：_（仅用下划线）&lt;br /&gt;&lt;br /&gt;- 密码必须含有 pass_min_chars 个字符。&lt;br /&gt;- 密码必须为字母-数字的组合。&lt;br /&gt;- 密码必须含有这些字符：characters_allowed";
$signup_login_must_match = "输入内容必须符合密码输入内容。";
$signup_standard_title = "标准信息";
$signup_standard_email = "电子邮箱地址";
$signup_standard_company = "公司名称";
$signup_standard_checkspayable = "支票支付给";
$signup_standard_weburl = "网站地址";
$signup_standard_taxinfo = "报税ID，SSN 或VAT";
$signup_personal_title = "个人信息";
$signup_personal_fname = "名字";
$signup_personal_state = "州或省";
$signup_personal_lname = "姓";
$signup_personal_phone = "电话号码";
$signup_personal_addr1 = "街道地址";
$signup_personal_fax = "传真号码";
$signup_personal_addr2 = "额外地址栏";
$signup_personal_zip = "邮政编码";
$signup_personal_city = "城市";
$signup_personal_country = "国家";
$signup_commission_title = "佣金支付";
$signup_commission_howtopay = "我们应当如何向您付款？";
$signup_commission_style_PPS = "按销售支付";
$signup_commission_style_PPC = "按点击支付";
$signup_terms_title = "条款和条件";
$signup_terms_agree = "我们已经阅读完，理解并同意上述条款和条件。";
$signup_page_button = "创建我的账户";
$signup_success_email_comment = "我们已经发送给您一封包含用户名和密码的邮件。<BR />\r\n您应当将此保存在一个安全的地方供以后参考。";
$signup_success_login_link = "登录您的账户";
$custom_fields_title = "用户定义字段";
$logout_msg = "<b>您现在已登出</b><BR />感谢您参加我们的联盟计划。";
$signup_page_success = "您的账户已被创建";
$login_left_column_title = "账户登录";
$login_left_column_text = "输入您的用户名及密码以访问账户的数据、横幅广告、链接代码、常见问题及更多。<BR/ ><BR/ >如果您无法\记住您的密码，输入您的用户名，我们\将通过电子邮件发送给您登录信息。<BR /><BR />";
$login_title = "登录您的账户";
$login_username = "用户名";
$login_password = "密码";
$login_invalid = "无效的登录";
$login_now = "登录我的账户";
$login_send_title = "忘记密码？";
$login_send_username = "用户名";
$login_send_info = "登录详情已发送至邮箱";
$login_send_pass = "发送至邮箱";
$login_send_bad = "用户名未找到";
$help_new_password_heading = "新的密码";
$help_new_password_info = "你的密码必须至少有pass_min_chars个字符。只能包含字母、数字和以下字符：  characters_allowed";
$help_confirm_password_heading = "确认新密码";
$help_confirm_password_info = "这次输入的密码必须符合新的密码输入。";
$help_custom_links_heading = "追踪关键词";
$help_custom_links_info = "您的关键词长度不能超过30个字符。它只可以包含字母、数字和连字符。";
$error_title = "检测到以下错误";
$username_invalid = "用户名无效，只能包含字母、数字和下划线。";
$username_taken = "您选择的用户名已经被使用。";
$username_short = "您的用户名太短，它的长度必须至少为user_min_chars个字符。";
$username_long = "您的用户名太长，它的长度必须最大为user_max_chars个字符。";
$password_invalid = "密码无效，只能包含字母、数字和以下字符：  characters_allowed";
$password_short = "您的密码太短，它的长度必须至少为pass_min_chars个字符。";
$password_long = "您的密码太长，它的长度必须最大为pass_max_chars个字符。";
$password_mismatch = "您输入的密码不匹配。";
$missing_checks = "请输入支票抬头的收款人名字。";
$missing_tax = "请输入您的报税ID，SSN 或VAT信息。";
$missing_fname = "请输入您的名字。";
$missing_lname = "请输入您的姓。";
$missing_email = "请输入您的电子邮件地址。";
$invalid_email = "您的电子邮件地址无效。";
$missing_address = "请输入您的街道地址。";
$missing_city = "请输入您的城市。";
$missing_company = "请输入您的公司名称。";
$missing_state = "请输入您的州或省。";
$missing_zip = "请输入您的邮政编码。";
$missing_phone = "请输入您的电话号码。";
$missing_website = "请输入您的网站地址。";
$missing_paypal = "您已已经选择了接收PayPal付款，请输入您的PayPal账户。";
$missing_terms = "您尚未接受我们的条款和条件。";
$paypal_required = "必须要一个PayPal账户完成付款。";
$missing_custom = "请填写所述的空格：";
$account_total_transactions = "总交易";
$account_standard_linking_code = "标准链接代码 - 非常适合在邮件中使用！";
$account_copy_paste = "复制/粘贴以上代码到您的网站或电子邮件中";
$account_not_approved = "您的账户目前正在等候批准中";
$account_suspended = "您的账户目前被冻结";
$account_standard_earnings = "标准收益";
$account_inc_bonus = "包括奖金";
$account_second_tier = "分级收益";
$account_recurring = "经常性收益";
$account_not_available = "N/A";
$account_earned_todate = "迄今总收益";
$menu_heading_overview = "账户总览";
$menu_general_stats = "一般数据";
$menu_tier_stats = "分级数据";
$menu_payment_history = "付款历史";
$menu_commission_details = "佣金详情";
$menu_recurring_commissions = "经常性佣金";
$menu_traffic_log = "传入流量日志";
$menu_heading_marketing = "市场营销材料";
$menu_banners = "横幅广告";
$menu_text_ads = "文字广告";
$menu_text_links = "文字链接";
$menu_email_links = "电子邮件链接";
$menu_html_links = "HTML广告";
$menu_offline = "离线营销";
$menu_tier_linking_code = "分级链接代码";
$menu_email_friends = "发送邮件给朋友 &amp; 加盟者";
$menu_custom_links = "创建 &amp; 追踪您自己的链接";
$menu_heading_management = "账户管理";
$menu_comalert = "佣金提醒设置";
$menu_comstats = "佣金数据设置";
$menu_edit_account = "编辑我的账户";
$menu_change_pass = "更改我的密码";
$menu_change_commission = "更改我的佣金类型";
$menu_heading_general_info = "一般信息";
$menu_browse_affiliates = "浏览其它加盟者";
$menu_faq = "常见问题";
$suspended_title = "账户状态警告";
$suspended_heading = "您的账户目前被冻结";
$suspended_notes = "管理员注释";
$pending_title = "账户状态警告";
$pending_heading = "您的账户目前正在等候批准中";
$pending_note = "一旦我们批准了您的账户，市场营销材料将发送给您。";
$faq_title = "常见问题";
$faq_none = "尚无\常见问题";
$browse_title = "浏览其它加盟者";
$browse_none = "没有其他可查看的加盟者";
$change_comm_title = "更改佣金类型";
$change_comm_curr_comm = "当前佣金类型";
$change_comm_curr_pay = "当前付款等级";
$change_comm_new_comm = "新的佣金类型";
$change_comm_warning = "如果您更改了佣金类型。您的账户将被重置为付款等级 1";
$change_comm_button = "更改佣金类型";
$change_comm_no_other = "没有其他可选佣金类型";
$change_comm_level = "等级";
$change_comm_updated = "佣金类型已更新";
$password_title = "更改我的密码";
$password_old_password = "旧密码";
$password_new_password = "新密码";
$password_confirm_password = "确认新密码 ";
$password_button = "更改密码";
$password_warning_old_missing = "旧密码不正确或为空";
$password_warning_new_missing = "新密码输入为空";
$password_warning_mismatch = "新密码不匹配";
$password_warning_invalid = "密码无效 - 点击帮助链接";
$password_notice = "密码已更新";
$edit_failed = "更新失败 - 查看上述错误";
$edit_success = "账户已更新";
$edit_button = "编辑我的账户";
$commissionstats_title = "佣金数据设置";
$commissionstats_info = "通过安装佣金数据，您可以从自己的Windows桌面即刻查看您的数据！想要安装这一功能，下载佣金数据并 <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>解压</b></a> 文件包到您的硬盘中，然后运行 <b>setup.exe</b> 文件。当提示需要您的登录信息时，输入以下内容。";
$commissionstats_hint = "提示：复制 & 粘贴每一条内容以确保准确度";
$commissionstats_profile = "配置文件名称";
$commissionstats_username = "用户名";
$commissionstats_password = "密码";
$commissionstats_id = "加盟者ID";
$commissionstats_source = "源路径URL";
$commissionstats_download = "下载佣金数据";
$commissionalert_title = "佣金提醒设置";
$commissionalert_info = "通过安装佣金提醒，我们\将即刻在您的Windows桌面上通知您新的佣金！想要安装这一功能，下载佣金提醒并<a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>解压</b></a> 文件包到您的硬盘中，然后运行 <b>setup.exe</b> 文件。当提示需要您的登录信息时，输入以下内容。";
$commissionalert_hint = "示：复制 & 粘贴每一条内容以确保准确度";
$commissionalert_profile = "配置文件名称";
$commissionalert_username = "用户名";
$commissionalert_password = "密码";
$commissionalert_id = "加盟者ID";
$commissionalert_source = "源路径URL";
$commissionalert_download = "下载佣金提醒";
$offline_title = "离线营销";
$offline_paragraph_one = "通过向朋友和同事们推广我们的网站（离线）获得收益！";
$offline_send = "顾客转至";
$offline_page_link = "查看页面";
$offline_paragraph_two = "您的顾客将输入您的<b>加盟者ID号</b>到以上页面的框体中，他们所完成的所有消费将登记到您的名下。";
$banners_title = "横幅广告";
$banners_size = "横幅尺寸";
$banners_description = "横幅描述";
$ad_title = "文字广告";
$ad_info = "使用提供的链接代码，您可以调整文字广告的配色方案、高度和宽度。";
$links_title = "链接名称";
$email_title = "电子邮件链接";
$email_group = "市场营销小组";
$email_button = "显示电子邮件链接";
$email_no_group = "未选择小组";
$email_choose = "请从上面选择一个市场营销小组";
$email_notice = "市场营销小组可能有不同的传入流量页面";
$email_ascii = "<b>ASCII/文字版本</b> - 在纯文字电子邮件中使用。";
$email_html = "<b>HTML版本</b> - 在HTML格式的电子邮件中使用。";
$email_test = "测试链接";
$email_test_info = "您的顾客将被转至我们网站的这个位置。";
$email_source = "源代码 - 复制/粘贴到您的电子邮件信息";
$html_title = "HTML广告名称";
$html_view_link = "查看这个HTML广告";
$traffic_title = "传入流量日志";
$traffic_display = "显示上一次";
$traffic_display_visitors = "访问者";
$traffic_button = "查看浏览日志 ";
$traffic_title_details = "传入流量详情";
$traffic_ip = "IP地址";
$traffic_refer = "推荐URL";
$traffic_date = "日期";
$traffic_time = "时间";
$traffic_bottom_tag_one = "显示上一次";
$traffic_bottom_tag_two = "的";
$traffic_bottom_tag_three = "总不同访问者";
$traffic_none = "不存在流量日志";
$traffic_no_url = "N/A - 可能的书签或电子邮件链接";
$traffic_box_title = "完成推荐URL";
$traffic_box_info = "点击链接以访问网页";
$payment_title = "付款历史";
$payment_date = "付款日期";
$payment_commissions = "佣金";
$payment_amount = "付款金额";
$payment_totals = "总计";
$payment_none = "不存在付款历史";
$tier_stats_title = "分级数据";
$tier_stats_accounts = "直接隶属您的分级账户";
$tier_stats_grab_link = "获得您的分级链接代码";
$tier_stats_none = "不存在分级账户";
$tier_stats_username = "用户名";
$tier_stats_current = "当前佣金";
$tier_stats_previous = "之前付款";
$tier_stats_totals = "总计";
$recurring_title = "经常性佣金";
$recurring_none = "不存在经常性佣金";
$recurring_date = "佣金日期";
$recurring_status = "经常性状态";
$recurring_payout = "下一笔付款";
$recurring_amount = "数额";
$recurring_every = "每";
$recurring_in = "在";
$recurring_days = "天";
$recurring_total = "总计";
$tlinks_title = "添加其他人到您的分级并且从他们那赚取收益！";
$tlinks_embedded_one = "您标准加盟者链接中的分级注册计入已经开启！";
$tlinks_embedded_two = "使用分级系统能够让您将我们的分销联盟计划推销给其他人。在通过以下您特殊的分级推荐链接加入我们联盟计划的人之中，您将处于最高级别。以下提供您可以赚取收益的信息：";
$tlinks_embedded_current = "当前分级付款";
$tlinks_forced_two = "使用分级系统能够让您将我们的分销联盟计划推销给其他人。在通过以下您特殊的分级推荐链接加入我们联盟计划的人之中，您将处于最高级别。以下提供您可以赚取收益的信息：";
$tlinks_forced_code = "分级推荐链接";
$tlinks_forced_paste = "复制/粘贴以上代码到您的网站中";
$tlinks_forced_money = "网站管理员在这里赚钱！";
$comdetails_title = "佣金详情";
$comdetails_date = "佣金日期";
$comdetails_time = "佣金时间";
$comdetails_type = "佣金类型";
$comdetails_status = "当前状态";
$comdetails_amount = "佣金金额";
$comdetails_additional_title = "额外佣金详情";
$comdetails_additional_ordnum = "订单数量";
$comdetails_additional_saleamt = "销售额";
$comdetails_type_1 = "佣金奖金";
$comdetails_type_2 = "经常性佣金";
$comdetails_type_3 = "分级佣金";
$comdetails_type_4 = "标准佣金";
$comdetails_status_1 = "已付";
$comdetails_status_2 = "以批准 - 等待付款";
$comdetails_status_3 = "等待批准";
$comdetails_not_available = "N/A";
$details_title = "佣金详情";
$details_drop_1 = "当前标准佣金";
$details_drop_2 = "当前分级佣金";
$details_drop_3 = "佣金等待批准";
$details_drop_4 = "已付标准佣金";
$details_drop_5 = "已付分级佣金";
$details_button = "查看佣金";
$details_date = "日期";
$details_status = "状态";
$details_commission = "佣金";
$details_details = "查看详情";
$details_type_1 = "已付";
$details_type_2 = "等待批准";
$details_type_3 = "已批准 - 等待付款";
$details_none = "没有可查看的佣金";
$details_no_group = "未选择佣金小组";
$details_choose = "请从上方选择一个佣金小组";
$general_title = "当前佣金 - 从上一次付款至今";
$general_transactions = "交易";
$general_earnings_to_date = "迄今为止的收益";
$general_history_link = "查看付款历史";
$general_standard_earnings = "标准收益";
$general_current_earnings = "当前收益";
$general_traffic_title = "流量数据";
$general_traffic_visitors = "访问者";
$general_traffic_unique = "唯一身份访问者";
$general_traffic_sales = "已批准销售";
$general_traffic_ratio = "销售率";
$general_traffic_info = "这些数据不包含经常性或分级佣金。";
$general_traffic_pay_type = "付款类型";
$general_traffic_pay_level = "当前付款等级";
$general_notes_title = "来自管理员的注释";
$general_notes_date = "日期已创建";
$general_notes_to = "至";
$general_notes_all = "所有加盟者";
$general_notes_none = "没有可查看的注释";
$contact_left_column_title = "联系我们";
$contact_left_column_text = "请随意使用右侧的表格联系我们的加盟者经理。";
$contact_title = "联系我们";
$contact_name = "您的姓名";
$contact_email = "您的电子邮件地址";
$contact_message = "信息";
$contact_chars = "剩余字符";
$contact_button = "发送信息";
$contact_received = "我们\已经收到了您的信息，请等候24小时以取得回复。";
$contact_invalid_name = "无效的名称";
$contact_invalid_email = "无效的电子邮件地址";
$contact_invalid_message = "无效的信息";
$invoice_button = "发票";
$invoice_header = "加盟者付款发票";
$invoice_aff_info = "加盟者信息";
$invoice_co_info = "信息";
$invoice_acct_info = "账户信息";
$invoice_payment_info = "付款信息";
$invoice_comm_date = "付款日期";
$invoice_comm_amt = "佣金金额";
$invoice_comm_type = "佣金类型";
$invoice_admin_note = "管理员注释";
$invoice_footer = "发票结束";
$invoice_print = "打印发票";
$invoice_none = "N/A";
$invoice_aff_id = "加盟者ID";
$invoice_aff_user = "用户名";
$menu_pdf_marketing = "PDF市场营销册子";
$menu_pdf_training = "PDF培训文档";
$marketing_target_url = "目标URL";
$marketing_source_code = "源代码 - 复制/粘贴到您的网站";
$marketing_group = "市场营销小组";
$peels_title = "折页名称";
$peels_view = "查看折页";
$peels_description = "折页描述";
$lb_head_title = "您的HTML页面所需的标头代码";
$lb_head_description = "为了在您的网站上使用灯箱，您必须添加以下几行命令到您想要展示它的页面的标头部分。";
$lb_head_source_code = "粘贴这个代码到您HTML文档的标头部分。";
$lb_head_code_notes = "您仅需要打这个代码一次，不论您想要在页面上放几个灯箱。";
$lb_head_tutorial = "查看教程";
$lb_body_title = "灯箱名称";
$lb_body_description = "灯箱描述";
$lb_body_click = "点击上述图象以查看灯箱。";
$lb_body_source_code = "在您想要出现图像的地方粘贴这个代码到您HTML文档的主体部分。";
$pdf_title = "PDF";
$pdf_training = "培训文档";
$pdf_marketing = "市场营销册子";
$pdf_description_1 = "需要Adobe Reader查看并打印您的PDF市场营销材料。";
$pdf_description_2 = "Adobe Reader是一款可以从Adobe网站免费下载的软件。";
$pdf_file_name = "文件名称";
$pdf_file_size = "文件大小";
$pdf_file_description = "描述";
$pdf_bytes = "比特";
$menu_heading_training_materials = "培训材料";
$menu_videos = "观看培训视频";
$menu_custom_manual = "自定义追踪链接手册";
$menu_page_peels = "折页";
$menu_lightboxes = "灯箱";
$menu_email_templates = "电子邮件模板";
$menu_heading_custom_links = "自定义追踪链接";
$menu_custom_reports = "报告";
$menu_keyword_links = "关键词追踪链接";
$menu_subid_links = "子-加盟者追踪链接";
$menu_alteranate_links = "备用传入页面链接";
$menu_heading_additional = "其他工具";
$menu_drop_heading_stats = "一般数据";
$menu_drop_heading_commissions = "佣金";
$menu_drop_heading_history = "付款历史";
$menu_drop_heading_traffic = "流量记录";
$menu_drop_heading_account = "我的账户";
$menu_drop_heading_logo = "上传我的图标";
$menu_drop_heading_faq = "FAQ";
$menu_drop_general_stats = "一般数据";
$menu_drop_tier_stats = "分级数据";
$menu_drop_current = "当前佣金";
$menu_drop_tier = "当前分级佣金";
$menu_drop_pending = "等待批准";
$menu_drop_paid = "已付佣金";
$menu_drop_paid_rec = "已付分级佣金";
$menu_drop_recurring = "活跃的经常性佣金";
$menu_drop_edit = "编辑我的账户";
$menu_drop_password = "更改我的密码";
$menu_drop_change = "更改我的佣金类型";
$account_hidden = "隐藏";
$keyword_title = "自定义关键词链接";
$keyword_info = "创建一个自定义关键词链接让您能够追踪从不同来源传入的流量。创建一个最多达4个不同追踪关键词的链接，那么自定义追踪报告将会向您显示一份详细的关于每一个您创建的关键词的报告。";
$keyword_heading = "自定义关键词追踪可用变量";
$keyword_tracking = "追踪ID";
$keyword_build = "想要创建您的链接，使用下方的URL并附加到您想要使用的追踪ID和关键词。";
$keyword_example = "例子";
$keyword_tutorial = "查看教程";
$sub_tracking_title = "子-加盟者追踪链接";
$sub_tracking_info = "创建一个子-加盟者追踪链接让您能够将您的加盟者链接传递给您自己的加盟者，让他们使用。您将知道谁为您产生了佣金，因为我们将向您报告您的哪一个子加盟者创造了销售额。另外一个使用子-加盟者链接的原因是如果您想要在报告中保括自己的追踪系统。";
$sub_tracking_build = "将 XXX 替代为分销联盟计划中的加盟者\的ID号码。对于您所有的加盟者都重复这个流程。";
$sub_tracking_example = "例子";
$sub_tracking_tutorial = "参考教程";
$sub_tracking_id = "子-加盟者ID";
$alternate_title = "备用传入页面链接";
$alternate_option_1 = "选项 1: 自动链接生成";
$alternate_heading_1 = "自动链接生成";
$alternate_info_1 = "通过输入您想要产生流量的URL来定义您自己的传入流量页面，我们\将为您创建一个链接。使用这个功能将使用我们数据库中的一个ID号码为您创造一个更短的链接。";
$alternate_button = "创建我的链接";
$alternate_links_heading = "我的备用传入URL链接";
$alternate_links_note = "如果您从这个页面移除了自定义链接，现有的链接会保持完整且能够工作。";
$alternate_links_remove = "移除";
$alternate_option_2 = "选项 2: 手动链接生成";
$alternate_info_2 = "如果您\更倾向于将备用传入URL附加到您自己的附属这链接上，使用以下的结构。";
$alternate_variable = "备用传入URL变量";
$alternate_example = "例子";
$alternate_build = "想要创建您的链接，使用下方的URL并附加到您想要使用的备用传入URL。";
$alternate_none = "未创建备用传入链接";
$alternate_tutorial = "查看教程";
$cr_title = "自定义关键词报告";
$cr_select = "选择一个关键词";
$cr_button = "生成报告";
$cr_no_results = "未发现搜索结果";
$cr_no_results_info = "尝试一种不同的关键词组合";
$cr_used = "关键词已使用";
$cr_found = "已发现这个链接";
$cr_times = "次数";
$cr_unique = "已发现唯一链接";
$cr_detailed = "详细的链接报告";
$cr_export = "导出报告到Excel";
$cr_none = "未发现关键词";
$logo_title = "上传您的公司标志";
$logo_info = "如果你你想要上传您的公司标志，我们会将它展示给您转移到我们网站的顾客。这让我们可以个性化您的顾客\体验当他们访问我们的时候。 ";
$logo_bullet_one = "图像可以是.jpg， .gif 或 .png。不允许flash图片。";
$logo_bullet_two = "任何不恰当的图像会被删除而您的账户也会被冻结。";
$logo_bullet_three = "您的图像/标志将不会显示在我们的网站上直到\我们批准为止。";
$logo_bullet_size_one = "图像的最大宽度为";
$logo_bullet_size_two = "像素以及最大高度为";
$logo_bullet_req_size_one = "图像必须宽度为";
$logo_bullet_req_size_two = "像素以及高度为";
$logo_bullet_pixels = "像素。";
$logo_choose = "选择一个图像";
$logo_file = "选择一个文件:";
$logo_browse = "浏览...";
$logo_button = "上传";
$logo_current = "我的当前图像";
$logo_remove = "移除";
$logo_display_status = "图像状态:";
$logo_pending = "等待批准";
$logo_approved = "已批准";
$logo_success = "图像已成功上传并且正在等待批准。";
$signup_security_title = "账户认证";
$signup_security_info = "请输入框体中显示的安全码。这个步骤帮助我们预防自动登录。";
$signup_security_code = "安全码";
$sub_tracking_none = "无";
$missing_security_code = "不正确或未填写账户认证/安全码";
$alternate_success_title = "链接创建成功";
$alternate_success_info = "在下方获得您的链接并开始向您规定的URL传输流量。";
$alternate_failed_title = "链接创建错误";
$alternate_failed_info = "请输入一个有效的URL。";
$logo_missing_filename = "请选择一个文件名称。";
$logo_required_width = "图像宽度必须为 ";
$logo_required_height = "图像高度必须为";
$logo_maximum_width = "图像宽度仅可以为";
$logo_maximum_height = "图像高度仅可以为";
$logo_size_maximum = "图像尺寸最大仅可以为";
$logo_bad_filetype = "图像类型不允许。允许的图像类型为.gif，.jpg 和 .png。";
$logo_upload_error = "图像上传错误，请联系加盟者经理。";
$logo_error_title = "图像上传错误";
$logo_error_bytes = "比特.";
$excel_title = "自定义关键词链接报告";
$excel_tab_report = "自动以关键词报告";
$excel_tab_logs = "流量记录";
$excel_date = "报告日期：";
$excel_affiliate = "加盟者ID：";
$excel_criteria = "关键词链接标准";
$excel_link = "链接结构";
$excel_hits = "有效点击";
$excel_comm_stats = "佣金数据";
$excel_comm_current = "当前佣金";
$excel_comm_paid = "已付佣金";
$excel_comm_total = "总计佣金";
$excel_comm_ratio = "推销成功比率";
$excel_earned = "已赚佣金";
$excel_earned_current = "当前佣金";
$excel_earned_paid = "已付佣金";
$excel_earned_total = "已赚总佣金";
$excel_earned_tab = "点击流量记录标签(下方) 以查看这个自定义链接的流量记录。";
$excel_log_title = "自定义关键词流量记录";
$excel_log_ip = "IP 地址";
$excel_log_refer = "推荐 URL";
$excel_log_date = "日期";
$excel_log_time = "时间";
$excel_log_target = "目标 URL";
$etemplates_title = "电子邮件模板";
$etemplates_view_link = "查看这个电子邮件模板";
$etemplates_name = "模板名称";
$signup_maintenance_heading = "维护通知";
$signup_maintenance_info = "目前无法注册。请稍后尝试。";
$marketing_group_title = "市场营销小组";
$marketing_button = "显示";
$marketing_no_group = "未选择小组";
$marketing_choose = "请从上面选择一个市场营销小组选择";
$marketing_notice = "市场营销小组可能有不同的传入流量页面";
$canspam_heading = "反垃圾邮件规定和接受";
$canspam_accept = "我已经阅读，理解并同意上述的反垃圾邮件规定。";
$canspam_error = "您还未接受我们的反垃圾邮件规定。";
$signup_banned = "在账户创建时发生错误。请联系系统管理员了解更多信息。";
$header_testimonials = "加盟者证言";
$testi_visit = "访问网站";
$testi_description = "向我们提供您的分销联盟计划的加盟者证言，我们将把它放在我们的&lt;a href=&quot;testimonials.php&quot;&gt;证言&lt;/a&gt; 页面上，并带有转向您网站的链接。";
$testi_name = "姓名";
$testi_url = "网站 URL";
$testi_content = "证言";
$testi_code = "安全码 ";
$testi_submit = "提交证言";
$testi_na = "证言不可用。";
$testi_title = "提供一段证言";
$testi_success_title = "发表证言成功";
$testi_success_message = "感谢您提交您的证言。我们的团队会立刻进行审阅。";
$testi_error_title = "证言错误";
$testi_error_name_missing = "请在您的证言中包括您的姓名。";
$testi_error_url_missing = "请包括您证言中的网站URL。";
$testi_error_missing = "请包括您证言中的文字。";
$menu_drop_delayed = "延付佣金";
$details_drop_6 = "当前延付佣金";
$details_type_6 = "延付 - 将不久后批准";
$comdetails_status_6 = "延付 - 将不久后批准";
$tc_reaccept_title = "条款和条件更改通知";
$tc_reaccept_sub_title = "您必须同意我们新的条款和条件以访问您的账户。";
$tc_reaccept_button = "我已经阅读，理解并同意上述的条款和条件。";
$tlinks_active = "活跃级别数量";
$tlinks_payout_structure = "分级付款结构";
$tlinks_level = "等级";
$tierText1 = "% 从推荐加盟者\的佣金数量中计算出。";
$tierText2 = "% 从上级\佣金数量中计算出。";
$tierText3 = "% 从销售额中计算出。";
$tierTextflat = "固定百分比";
$edit_custom_button = "编辑答案";
$private_heading = "个人登录";
$private_info = "我们的加盟者计划不向一般大众开放，并且需要一个注册码加入。关于如何取得注册码的信息应当在这里。";
$private_required_heading = "需要注册码";
$private_code_title = "输入注册码";
$private_button = "提交代码";
$private_error_title = "提供的注册码无效";
$private_error_invalid = "您提供的注册码无效。";
$private_error_expired = "您提供的注册码已过期并且不再有效。";
$qr_code_title = "QR 代码";
$qr_code_size = "QR 代码大小";
$qr_code_button = "显示 QR 代码";
$qr_code_offline_title = "离线营销";
$qr_code_offline_content1 = "添加这个 QR 代码到您的市场营销手册、传单、商业名片等。";
$qr_code_offline_content2 = "- 右击图像并 &lt;strong&gt;保存&lt;/strong&gt; 到您的电脑。";
$qr_code_online_title = "在线营销";
$qr_code_online_content = "添加这个 QR 代码到您的网站、社交媒体、博客等。";
$menu_coupon = "优惠券代码";
$coupon_title = "您可用的优惠券代码";
$coupon_desc = "将这些优惠券代码发放出去并在每次有人使用您的代码时赚取佣金！";
$coupon_head_1 = "优惠券代码";
$coupon_head_2 = "给顾客的折扣";
$coupon_head_3 = "您的佣金金额";
$coupon_sale_amt = "销售额的";
$coupon_flat_rate = "固定百分比";
$coupon_default = "默认付款等级";
$cc_vanity_title = "要求一个个性化优惠券代码";
$cc_vanity_field = "优惠券代码";
$cc_vanity_button = "要求优惠券代码 ";
$cc_vanity_error_missing = "<strong>错误!</strong> 请输入一个优惠券代码。";
$cc_vanity_error_exists = "<strong>错误!</strong> 您\已经要求了这个代码。它正在等待批准。";
$cc_vanity_error = "<strong>错误!</strong> 优惠券代码无效。请仅使用字母、数字和下划线。";
$cc_vanity_success = "<strong>成功!</strong> 您的个性化优惠券代码已经被申请。";
$coupon_none = "目前没有可用的优惠券代码。";
$pic_error_title = "图像上传错误";
$pic_missing = "请选择一个文件名称。 ";
$pic_invalid = "图像类型不允许。允许的图像类型为.gif，.jpg 和 .png。";
$pic_error = "图像上传错误，请联系加盟者经理。";
$pic_success = "您的图片上传成功。";
$pic_title = "上传您的图片";
$pic_info = "上传您的图片有助于个性化我们与您的体验。";
$pic_bullet_1 = "图像可以是.jpg， .gif 或.png。";
$pic_bullet_2 = "任何不恰当的图像会被删除而您的账户也会被冻结。";
$pic_bullet_3 = "您的图片将不会被公开显示。它将仅。 picture will not be shown publicly. It will only be attached your account for us to see.";
$pic_file = "Select A File:";
$pic_button = "上传";
$pic_current = "我的当前图片";
$pic_remove = "移除图片";
$progress_title = "下一次付款的合格性；";
$progress_complete = "完成.";
$progress_none = "我们没有最低付款要求。";
$progress_sentence_1 = "您已经取得";
$progress_sentence_2 = "…的";
$progress_sentence_3 = "要求。";
$aff_lib_button = "<b>索取您的免费访问权限！!</b><BR />www.AffiliateLibrary.com";
$menu_announcements = "社交媒体活动";
$announcements_name = "活动名称";
$announcements_facebook_message = "Facebook信息";
$announcements_twitter_message = "Twitter信息";
$announcements_facebook_link = "Facebook链接";
$announcements_facebook_picture = "Facebook图片";
$general_last_30_days_activity = "最近 30 天活动";
$general_last_30_days_activity_traffic = "流量";
$general_last_30_days_activity_commissions = "佣金";
$accountability_title = "问责制和沟通";
$accountability_text = "<strong>这是什么？</strong><p>我们采用积极的方式与我们的加盟合伙人建立起信任。我们的目标是保证我们对于我们系统中每一笔赚取和/或拒绝的佣金提供尽可能多的信息。</p><strong>沟通</strong><p>我们\能够提供任何拒绝佣金的详细情况。我们与我们的加盟者有着良好的沟通，并且鼓励他们提问和反馈。</p>";
$debit_reason_0 = "无";
$debit_reason_1 = "退款";
$debit_reason_2 = "扣费";
$debit_reason_3 = "报告的诈骗";
$debit_reason_4 = "取消的订单";
$debit_reason_5 = "部分退款";
$menu_drop_pending_debits = "等待借记";
$debit_amount_label = "借记数额";
$debit_date_label = "借记日期";
$debit_reason_label = "借记原因";
$debit_paragraph = "借记将会从您的下一笔付款中扣除。";
$debit_invoice_amount = "减去借记数额";
$debit_revised_amount = "修正后付款数额";
$mv_head_description = "注意：您仅可以在网站的每一个页面放一个视频。";
$mv_head_source_code = "复制这个代码到您HTML文档的标头部分。";
$mv_body_title = "视频标题";
$mv_body_description = "描述";
$mv_body_source_code = "复制这个代码到HTML文档中您想要显示这段视频的主体部分。";
$menu_marketing_videos = "视频";
$mv_preview_button = "预览视频";
$dt_no_data = "表格中没有可用数据。";
$dt_showing_exists = "显示_TOTAL_中的 _START_ 到 _END_ 内容。";
$dt_showing_none = "显示 0 中的 0 到 0 内容。";
$dt_filtered = "(从_MAX_ 总条数中过滤得出)";
$dt_length_choice = "显示 _MENU_ 内容.";
$dt_loading = "加载中...";
$dt_processing = "处理中...";
$dt_no_records = "未发现符合的记录。";
$dt_first = "首先";
$dt_last = "最后";
$dt_next = "接下来";
$dt_previous = "之前";
$dt_sort_asc = ": 激活以每栏升序分类";
$dt_sort_desc = ": 激活以每栏降序分类";
$choose_marketing_group = "选择一个营销小组";
$email_already_used_1 = "账户无法被创建。我们仅允许";
$email_already_used_2 = "账户";
$email_already_used_3 = "被创建每个电子邮件地址。";
$missing_fax = "请输入您的传真号码。";
$chart_last_6_months = "近6个月支付的佣金";
$chart_last_6_months_paid = "已付佣金";
$chart_this_month = "我们本月的前 5 名加盟者";
$chart_this_month_none = "没有可显示的数据。";
$login_return = "返回加盟者主页";
$login_lost_details = "输入您的用户名然后我们\会发送您一封保护登录信息的电子邮件。";
$account_edit_general_prefs = "一般偏好";
$account_edit_email_language = "电子邮件语言";
$footer_connect = "与我们连接";
$modal_close = "关闭";
$vat_amount_heading = "VAT数额";
$menu_logout = "登出";
$menu_upload_picture = "上传您的图片";
$menu_offer_testi = "提供一段证言";
$fb_login = "通过Facebook登录";
$fb_permissions = "未提供权限。请允许网站使用您的电子邮件地址。";
$announcements_published = "已发布通告";
$training_videos_title = "培训视频";
$training_videos_general = "一般营销";
$commission_method = "佣金模式";
$how_will_you_earn = "您将如何赚取佣金？";
$pm_account_credit = "我们将把您赚取的佣金存入您的帐户 。";
$pm_check_money_order = "我们将在这封邮件中发送您支票/ 资金。";
$pm_paypal = "我们将支付您PayPal 付款。";
$pm_stripe = "我们将发送您Stripe付款。";
$pm_wire = "我们将发送您电汇转账。";
$add_to_signup_left_column_text = "<span style=\"color:#CC0000; font-style:italic;\">* 指必填项目。</span>";
$paypal_email = "Paypal 邮件";
$stripe_acct_details = "Stripe 帐户详情";
$stripe_connect = "您可以在注册后通过帐户设置连接您的stripe。";
$stripe_success = "Stripe帐户已成功连接";
$stripe_settings = "Stripe 设置";
$stripe_connect_edit = "与 Stripe相连";
$stripe_delete = "删除 Stripe 帐户";
$stripe_confirm = "您确定要删除此帐户吗？";
$payment_settings = "付款设置";
$edit_payment_settings = "编辑付款设置";
$invalid_paypal_address = "无效的Paypal 电子邮件地址。";
$payment_method_error = "请选择一种付款方式。";
$payment_settings_updated = "付款设置已更新。";
$stripe_removed = "Stripe 账户已移除。";
$payment_settings_success = "成功！";
$payment_update_notice_1 = "注意！";
$payment_update_notice_2 = "你已经选择了 <strong>[此处的付款选择]</strong> 从我们这里收取款项。 请<a href=\"account.php?page=48\" style=\"font-weight:bold;\">点击此处</a> 链接你的 <strong>[此处的付款选择]</strong> 到你的账户。.";
$pm_title_credit = "账户存款";
$pm_title_mo = "支票/汇票";
$pm_title_paypal = "PayPal";
$pm_title_stripe = "Stripe";
$pm_title_wire = "电汇";
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