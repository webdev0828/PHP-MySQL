<?PHP

//-------------------------------------------------------
	  $language_pack_name = "korean";
	  $language_pack_table_name = "korean";
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
$header_title = "제휴 프로그램";
$header_indexLink = "제휴 홈페이지";
$header_signupLink = "지금 등록";
$header_accountLink = "계정 관리";
$header_emailLink = "연락처";
$header_greeting = "환영합니다";
$header_nonLogged = "손님";
$header_logout = "여기서 로그아웃";
$footer_tag = "iDevAffiliate에 의한 제휴 프로그램";
$footer_copyright = "저작권";
$footer_rights = "판권 소유";
$index_heading_1 = "우리 제휴 소프트웨어에 오신 것을 환영합니다!";
$index_paragraph_1 = "저희 프로그램은 무료로 참여하실 수 있습니다. 등록하기도 쉽고 기술적 지식도 요구하지 않습니다. 제휴 프로그램은 인터넷에 일반적으로 퍼져 있으며, 웹사이트 주인이 웹사이트를 통하여 추가적인 수익을 만들 방법을 제시합니다. 제휴는 상업 웹사이트에 트래픽과 판매를 생성함으로써 그 대가로 수수료를 받는 구조입니다.";
$index_heading_2 = "어떤 원리죠?";
$index_paragraph_2 = "우리 제휴 프로그램에 참여하시면, 홈페이지에 올릴 배너와 텍스트 링크를 받게 됩니다. 웹사이트 사용자가 그 링크들을 클릭할때 마다 사용자들은 우리의 웹사이트로 이동하게 되며 이 활동이 우리 제휴 프로그램에 의해 관리됩니다. 귀하는 수수료 유형에 따른 수수료를 받게 됩니다.";
$index_heading_3 = "실시간 통계 및 보고!";
$index_paragraph_3 = "하루 24시간 언제나 로그인 하여 귀하의 판매 실적, 트래픽, 계정 잔고를 확인하시고, 귀하의 배너가 잘 통용되고 있는지 보십시오";
$index_login_title = "제휴 로그인";
$index_login_username = "사용자 이름";
$index_login_password = "비밀번호";
$index_login_username_field = "사용자 이름";
$index_login_password_field = "비밀번호";
$index_login_button = "로그인";
$index_login_signup_link = "초기 등록 하시려면 여기를 클릭 하십시오";
$index_table_title = "프로그램 세부사항";
$index_table_commission_type = "수수료 유형";
$index_table_initial_deposit = "초기 보증금";
$index_table_requirements = "지급 요구사항";
$index_table_duration = "지급 기간";
$index_table_choose = "다음과 같은 지급 옵션 선택!";
$index_table_sale = "판매당 지급";
$index_table_click = "클릭당 지급";
$index_table_sale_text = "귀하가 담당한 판매당.";
$index_table_click_text = "귀하가 담당한 클릭당.";
$index_table_deposit_tag = "그냥 가입하기!";
$index_table_requirements_tag = "지급에 필요한 최소 잔액.";
$index_table_duration_tag = "지급금은 한달에 한번, 전월 판매 금액이 지급됩니다.";
$signup_left_column_text = "저희 제휴 프로그램에 참여하시고 귀하의 판매 실적에 따라 돈을 벌어 보십시오. 단순히 계정을 만들고 귀하의 웹사이트에 링크 코드를 배치해 놓고, 귀하의 방문자들이 우리의 손님이 될 때마다 늘어나는 귀하의 잔고를 지켜 보십시오. ";
$signup_left_column_title = "제휴를 환영합니다!";
$signup_login_title = "계정을 생성하세요";
$signup_login_username = "사용자 이름";
$signup_login_password = "비밀번호";
$signup_login_password_again = "비밀번호 재입력";
$signup_login_minmax_chars = "- 사용자 이름은 최소  user_min_chars 글자여야 합니다.&lt;br /&gt;- 사용자 이름은 알파벳과 숫자를 사용할 수 있습니다&lt;br /&gt;- 사용자 이름에는 다음 특수문자를 사용할 수 있습니다:_ (밑줄만 사용 가능)&lt;br /&gt;&lt;br /&gt;- 비밀번호는 최소 pass_min_chars 글자여야 합니다.&lt;br /&gt;- 비밀번호는 알파벳과 숫자를 사용할 수 있습니다&lt;br /&gt;- 비밀번호는 다음 특수문자를 사용할 수 있습니다:  characters_allowed";
$signup_login_must_match = "이 입력란은 비밀번호와 같아야 합니다. ";
$signup_standard_title = "기본 정보";
$signup_standard_email = "이메일 주소";
$signup_standard_company = "회사 이름";
$signup_standard_checkspayable = "수표 명의 이름";
$signup_standard_weburl = "웹사이트 주소";
$signup_standard_taxinfo = "세금 등록 번호, 사회보장 번호 혹은 부가가치세";
$signup_personal_title = "개인 정보";
$signup_personal_fname = "이름";
$signup_personal_state = "도/시";
$signup_personal_lname = "성";
$signup_personal_phone = "전화번호";
$signup_personal_addr1 = "주소";
$signup_personal_fax = "팩스 번호";
$signup_personal_addr2 = "추가 주소 기입란";
$signup_personal_zip = "우편번호";
$signup_personal_city = "시";
$signup_personal_country = "국가";
$signup_commission_title = "수수료 지급 방법";
$signup_commission_howtopay = "수수료는 어떻게 지급하면 될까요?";
$signup_commission_style_PPS = "판매당 지급";
$signup_commission_style_PPC = "클릭당 지급";
$signup_terms_title = "이용 약관";
$signup_terms_agree = "나는 위의 이용 약관을 읽고 이해 하며 동의 합니다. ";
$signup_page_button = "계정 생성하기";
$signup_success_email_comment = "저희는 사용자 이름과 비밀번호를 귀하의 이메일로 보냈습니다.<BR />\r\n 추후 참고를 위하여 안전한 곳에 보관하십시오. ";
$signup_success_login_link = "귀하의 계정으로 로그인 하기";
$custom_fields_title = "사용자 정의 필드";
$logout_msg = "<b>이제 로그아웃 하였습니다. </b><BR />우리의 제휴 프로그램에 참여해 주셔서 감사합니다. ";
$signup_page_success = "귀하의 계정이 생성되었습니다.";
$login_left_column_title = "계정 로그인";
$login_left_column_text = "사용자 이름과 비밀번호로 계정에 로그 인하여 계정 통계, 배너, 링크 코드, FAQ  및 더 많은 사항들을 확인할 수 있습니다.<BR/ ><BR/ > 비밀번호가\  기억나지 않는다면, 사용자 이름을 입력하신다면 \ 이메일을 통하여 로그인 정보를 보내 드리겠습니다. <BR /><BR />";
$login_title = "귀하의 계정으로 로그인 하기";
$login_username = "사용자 이름";
$login_password = "비밀번호";
$login_invalid = "유효하지 않은 사용자 이름";
$login_now = "나의 계정으로 로그인 하기";
$login_send_title = "귀하의 비밀번호가 필요하신가요??";
$login_send_username = "사용자 이름";
$login_send_info = "로그인 정보가 이메일로 발송되었습니다 ";
$login_send_pass = "이메일로 보내기";
$login_send_bad = "사용자 이름을 찾을 수 없습니다";
$help_new_password_heading = "새로운 비밀 번호";
$help_new_password_info = "비밀번호는 최소  pass_min_chars 글자가 되어야 합니다. 비밀번호는 알파벳, 숫자,그리고 다음 특수 문자만 사용가능합니다:  characters_allowed";
$help_confirm_password_heading = "새 비밀번호를 확인하십시오";
$help_confirm_password_info = "비밀번호가 새 비밀번호와 일치해야 합니다. ";
$help_custom_links_heading = "키워드 추적";
$help_custom_links_info = "키워드는 30자를 초과할 수 없습니다. 키워드는 문자,숫자, 하이픈만 사용할 수 있습니다. ";
$error_title = "다음 오류가 발견되었습니다.";
$username_invalid = "유효한 사용자 이름이 아닙니다. 알파벳, 숫자,밑줄만 사용가능합니다.";
$username_taken = "이 사용자 이름은 이미 사용 중입니다. ";
$username_short = "귀하의 사용자 이름은 너무 짧습니다. 최소 user_min_chars 글자여야 합니다. ";
$username_long = "귀하의 사용자 이름은 너무 깁니다. 최대 user_max_chars 글자여야 합니다.";
$password_invalid = "유효한 비밀번호가 아닙니다. 알파벳, 숫자,그리고 다음 특수 문자만 사용가능합니다:  characters_allowed";
$password_short = "비밀 번호가 너무 짧습니다, 최소 pass_min_chars 글자여야 합니다. ";
$password_long = "비밀 번호가 너무 짧습니다, 최대 pass_max_chars글자여야 합니다.";
$password_mismatch = "비밀번호가 일치하지 않습니다.";
$missing_checks = "수표가 지급되어야 할 사람 이름을 입력하십시오.";
$missing_tax = "귀하의 세금 등록 번호, 사회보장 번호, 부가가치세 정보를 입력하십시오.";
$missing_fname = "이름을 입력하십시오.";
$missing_lname = "성을 입력하십시오.";
$missing_email = "이메일 주소를 입력하십시오.";
$invalid_email = "귀하의 이메일 주소는 올바르지 않습니다.";
$missing_address = "주소를 입력하십시오.";
$missing_city = "도시를 입력하십시오.";
$missing_company = "사업체 명을 입력하십시오.";
$missing_state = "주 / 도 를 입력하십시오.";
$missing_zip = "우편번호를 입력하십시오.";
$missing_phone = "전화번호를 입력하십시오.";
$missing_website = "귀하의 웹사이트 주소를 입력하십시오.";
$missing_paypal = "페이팔 지급 방식을 선택하셨습니다. 귀하의 페이팔 계정을 입력하십시오.";
$missing_terms = "이용 약관에 동의하지 않으셨습니다.";
$paypal_required = "수수료 지급을 위하여 페이팔 계정이 필요합니다. ";
$missing_custom = "다음 입력란을 완료하십시오:";
$account_total_transactions = "총 거래";
$account_standard_linking_code = "기본 링크 코드- 이메일 사용에 적합합니다! ";
$account_copy_paste = "위의 코드를 귀하의 웹사이트나 이메일에 복사/붙여 넣기 하십시오. ";
$account_not_approved = "귀하의 계정은 현재 승인 대기중입니다.";
$account_suspended = "귀하의 계정은 현재 사용 중지 되었습니다 ";
$account_standard_earnings = "기본 소득";
$account_inc_bonus = "보너스 포함";
$account_second_tier = "단계 소득";
$account_recurring = "반복 소득";
$account_not_available = "N/A";
$account_earned_todate = "현재까지의 총 수입";
$menu_heading_overview = "계정 개요";
$menu_general_stats = "일반 통계";
$menu_tier_stats = "티어 통계";
$menu_payment_history = "지급 내역";
$menu_commission_details = "수수료 정보";
$menu_recurring_commissions = "반복 수수료";
$menu_traffic_log = "방문 트래픽 로그";
$menu_heading_marketing = "마케팅 자료";
$menu_banners = "배너";
$menu_text_ads = "문자 광고";
$menu_text_links = "문자 링크";
$menu_email_links = "이메일 링크";
$menu_html_links = "HTML 광고";
$menu_offline = "오프라인 광고";
$menu_tier_linking_code = "티어 링크 코드";
$menu_email_friends = "친구 &amp; 및 동료에게 이메일 보내기";
$menu_custom_links = "귀하의 링크를&amp; 직접 관리하세요";
$menu_heading_management = "계정 관리";
$menu_comalert = "CommissionAlert 설정";
$menu_comstats = "CommissionStats 설정";
$menu_edit_account = "내 계정 변경";
$menu_change_pass = "비밀번호 변경";
$menu_change_commission = "내 수수료 유형 변경";
$menu_heading_general_info = "일반 정보";
$menu_browse_affiliates = "다른 동료 찾아보기";
$menu_faq = "자주 묻는 질문들";
$suspended_title = "계정 상태 알림";
$suspended_heading = "귀하의 계정은 현재 정지 중입니다";
$suspended_notes = "관리자 노트";
$pending_title = "계정 상태 알림";
$pending_heading = "귀하의 계정은 현재 승인 대기중 입니다";
$pending_note = "귀하의 계정이 승인되면, 마케팅 자료가 귀하에게 제공될 것입니다.";
$faq_title = "자주 묻는 질문들";
$faq_none = "아직 자주 묻는 질문이 없습니다";
$browse_title = "다른 동료 찾아보기";
$browse_none = "볼 수 있는 다른 동료가 없습니다";
$change_comm_title = "내 수수료 유형 변경";
$change_comm_curr_comm = "현재 수수료 유형";
$change_comm_curr_pay = "현재 지급 레벨";
$change_comm_new_comm = "새로운 수수료 유형";
$change_comm_warning = "새로운 수수료 유형으로 변경한다면 귀하의 계정은 지급 레벨 1으로 다시 설정 됩니다";
$change_comm_button = "내 수수료 유형 변경";
$change_comm_no_other = "가능한 다른 지급 유형이 없습니다 ";
$change_comm_level = "레벨";
$change_comm_updated = "지급 유형이 업데이트 되었습니다";
$password_title = "비밀번호 변경";
$password_old_password = "이전 비밀번호";
$password_new_password = "새 비밀번호";
$password_confirm_password = "새 비밀번호 확인";
$password_button = "비밀번호 변경";
$password_warning_old_missing = "이전 비밀번호가 없거나 틀렸습니다";
$password_warning_new_missing = "새 비밀번호가 없습니다";
$password_warning_mismatch = "새 비밀번호가 일치하지 않습니다";
$password_warning_invalid = "비밀번호가 유효하지 않습니다 - 도움말을 클릭해 보십시오";
$password_notice = "비밀번호가 업데이트 되었습니다";
$edit_failed = "업데이트가 실패하였습니다. - 상단의 오류를 확인하십시오";
$edit_success = "계정이 업데이트 되었습니다";
$edit_button = "내 계정 수정";
$commissionstats_title = "CommissionStats 설정";
$commissionstats_info = "By installing CommissionStats을 설치하면,윈도우 컴퓨터에서 귀하의 상태를 즉시 확인할 수 있습니다. 이 기능을 설치하기 위해서는 CommissionStats를 다운로드하여<a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>압축을 풀고</b></a> <b>setup.exe </b>파일을 실행하십시오. 로그인 정보를 요구하면, 다음 정보를 입력하십시오.";
$commissionstats_hint = "힌트: 정확도를 보장하기 위하여 각 입력란을 복사 및 붙여넣기 하십시오";
$commissionstats_profile = "프로필 이름";
$commissionstats_username = "사용자 이름";
$commissionstats_password = "비밀번호";
$commissionstats_id = "동료 ID ";
$commissionstats_source = "소스 경로의 URL";
$commissionstats_download = "CommissionStats 다운로드하기";
$commissionalert_title = "CommissionAlert 설정";
$commissionalert_info = "CommissionAlert을 설치하면 귀하의 컴퓨터에서 새 수수료를 즉시 알려 드립니다! 이 기능을 설치하기 위해서는CommissionAlert을 다운로드하고 <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>압축을 풀고</b></a> 하드 드라이브에서  <b>setup.exe</b> 을 실행하십시오. 로그인 정보를 요구하면 다음 정보를 입력하십시오. ";
$commissionalert_hint = "힌트: 정확도를 보장하기 위하여 각 입력란을 복사 및 붙여넣기 하십시오";
$commissionalert_profile = "프로필 이름";
$commissionalert_username = "사용자 이름";
$commissionalert_password = "비밀번호";
$commissionalert_id = "동료 ID";
$commissionalert_source = "소스 경로의 URL ";
$commissionalert_download = "CommissionAlert 다운로드 하기";
$offline_title = "오프라인 마케팅";
$offline_paragraph_one = "저희 웹사이트를 귀하의 친구와 동료들에게 (오프 라인으로) 알림으로써 돈을 버십시오!";
$offline_send = "고객을 이곳으로 보내십시오.";
$offline_page_link = "페이지 보기";
$offline_paragraph_two = "귀하의 고객이 위 페이지의 상자에<b>동료 ID 번호를</b> 입력하면 그들의 모든 구매 활동이 당신을 통하여 등록될 것입니다.";
$banners_title = "배너";
$banners_size = "배너 크기";
$banners_description = "배너 설명";
$ad_title = "문자 광고";
$ad_info = "제공된 링크 코드를 사용하여 문자 광고의 색상 높이 및 너비를 조정할 수 있습니다. ";
$links_title = "링크 이름";
$email_title = "이메일 링크";
$email_group = "마케팅 그룹";
$email_button = "이메일 링크 표시하기";
$email_no_group = "그룹이 선택되지 않았습니다. ";
$email_choose = "위의 마케팅 그룹을 선택하십시오";
$email_notice = "마케팅 그룹은 다른 접근 트래픽 페이지를 가질 수 있습니다. ";
$email_ascii = "<b>ASCII/텍스트 버전</b> - 일반 텍스트 이메일용.";
$email_html = "<b>HTML 버전</b> - HTML 포맷 이메일용.";
$email_test = "테스트 링크";
$email_test_info = "이것이 귀하의 고객이 우리의 웹사이트로 방문하게 될 곳입니다. ";
$email_source = "소스 코드 - 귀하의 이메일 메시지에 복사/붙여넣기 하십시오";
$html_title = "HTML 광고 이름";
$html_view_link = "이HTML 광고 보기";
$traffic_title = "방문 트래픽 로그";
$traffic_display = "마지막 화면 보기";
$traffic_display_visitors = "방문자들";
$traffic_button = "트래픽 로그 보기";
$traffic_title_details = "방문 트래픽 정보";
$traffic_ip = "IP 주소";
$traffic_refer = "참조 URL";
$traffic_date = "날짜";
$traffic_time = "시간";
$traffic_bottom_tag_one = "모든 독특한";
$traffic_bottom_tag_two = "방문자들";
$traffic_bottom_tag_three = " 마지막 페이지 보기";
$traffic_none = "트래픽 로그가 존재하지 않습니다";
$traffic_no_url = "N/A - 북마크 혹은 이메일 링크";
$traffic_box_title = "참조 URL 완료";
$traffic_box_info = "클릭하여 웹사이트를 방문하세요. ";
$payment_title = "지급 내역";
$payment_date = "지급 날짜";
$payment_commissions = "수수료";
$payment_amount = "지급 금액";
$payment_totals = "총액";
$payment_none = "지급 내역이 존재하지 않습니다";
$tier_stats_title = "티어 통계";
$tier_stats_accounts = "귀하에게 직접 속한 티어 계정";
$tier_stats_grab_link = "귀하의 링크 코드 찾기";
$tier_stats_none = "티어 계정이 없습니다.";
$tier_stats_username = "사용자 이름";
$tier_stats_current = "현재 수수료";
$tier_stats_previous = "이전 지급금";
$tier_stats_totals = "총";
$recurring_title = "반복 수수료";
$recurring_none = "반복 수수료가 존재하지 않습니다";
$recurring_date = "수수료 날짜";
$recurring_status = "반복 상태";
$recurring_payout = "다음 지급";
$recurring_amount = "금액";
$recurring_every = "모두";
$recurring_in = "In";
$recurring_days = "날들";
$recurring_total = "총";
$tlinks_title = "다른 사람들을 귀하의 티어에 더해서 그들한테서도 돈을 벌어 보세요!";
$tlinks_embedded_one = "티어 등록은 귀하의 일반 동료 링크에서 이미 활성화 되어 있습니다!";
$tlinks_embedded_two = "티어 시스템을 사용하면 다른 사람에게 우리의 제휴 프로그램을 판매할 수 있습니다. 귀하는 아래의 특별 티어 추천 링크를 통하여 가입하는 사람들의 상위 티어가 될 수 있습니다. 얼마나 벌 수 있는지는 아래에 나와 있습니다. ";
$tlinks_embedded_current = "현재 티어 지급 금액";
$tlinks_forced_two = "티어 시스템을 사용하면 다른 사람에게 우리의 제휴 프로그램을 판매할 수 있습니다. 귀하는 아래의 특별 티어 추천 링크를 통하여 가입하는 사람들의 상위 티어가 될 수 있습니다. 얼마나 벌 수 있는지는 아래에 나와 있습니다.";
$tlinks_forced_code = "티어 추천 링크";
$tlinks_forced_paste = "귀하의 웹사이트에 위 코드를 복사/붙여넣기 하세요";
$tlinks_forced_money = "웹마스터는 여기서 돈을 법니다!";
$comdetails_title = "수수료 정보";
$comdetails_date = "수수료 날짜";
$comdetails_time = "수수료 시간";
$comdetails_type = "수수료 정보";
$comdetails_status = "현재 상태";
$comdetails_amount = "수수료 금액";
$comdetails_additional_title = "수수료 관련 추가 정보";
$comdetails_additional_ordnum = "오더 번호";
$comdetails_additional_saleamt = "판매 금액";
$comdetails_type_1 = "보너스 수수료";
$comdetails_type_2 = "반복 수수료";
$comdetails_type_3 = "티어 수수료";
$comdetails_type_4 = "일반 수수료";
$comdetails_status_1 = "지불 완료";
$comdetails_status_2 = "승인됨 - 지급 대기중";
$comdetails_status_3 = "승인 대기중";
$comdetails_not_available = "N/A";
$details_title = "수수료 정보";
$details_drop_1 = "현재 기본 수수료";
$details_drop_2 = "현재 티어 수수료";
$details_drop_3 = "수수료 승인 대기중";
$details_drop_4 = "지불 완료된 기본 수수료";
$details_drop_5 = "지불 완료된 티어 수수료";
$details_button = "수수료 보기";
$details_date = "날짜";
$details_status = "상태";
$details_commission = "수수료";
$details_details = "자세한 정보 보기";
$details_type_1 = "지불 완료";
$details_type_2 = "승인 대기중";
$details_type_3 = "승인됨 - 지급 대기중";
$details_none = "볼 수 있는 수수료가 없습니다";
$details_no_group = "선택된 수수료 그룹이 없습니다";
$details_choose = "위의 수수료 그룹을 선택하십시오";
$general_title = "현재 수수료 - 지난 지급부터 누적 금액";
$general_transactions = "거래";
$general_earnings_to_date = "현재까지 누적 수익";
$general_history_link = "지급 내역 보기 ";
$general_standard_earnings = "일반 수익";
$general_current_earnings = "현재 수익";
$general_traffic_title = "트래픽 통계";
$general_traffic_visitors = "방문객들";
$general_traffic_unique = "특별한 방문객들";
$general_traffic_sales = "승인된 판매";
$general_traffic_ratio = "판매율";
$general_traffic_info = "이 통계는 반복 혹은 티어 수수료를 포함하지 않습니다.";
$general_traffic_pay_type = "지급 방법";
$general_traffic_pay_level = "현재 지급 레벨";
$general_notes_title = "관리자로부터의 메세지";
$general_notes_date = "생성된 날짜";
$general_notes_to = "에게";
$general_notes_all = "모든 제휴 파트너";
$general_notes_none = "아무 메세지가 없습니다. ";
$contact_left_column_title = "연락처";
$contact_left_column_text = "오른쪽에 있는 양식으로 우리의 제휴 매니저에게 언제든지 연락해 주시기 바랍니다.";
$contact_title = "연락처";
$contact_name = "이름";
$contact_email = "이메일 주소";
$contact_message = "메세지";
$contact_chars = "남은 글자수";
$contact_button = "메시지 보내기 ";
$contact_received = "메시지를 접수했습니다. 24시간 안에 답변을 보내 드리도록 하겠습니다. ";
$contact_invalid_name = "유효하지 않은 이름";
$contact_invalid_email = "유효하지 않은 이메일 주소";
$contact_invalid_message = "유효하지 않은 메세지";
$invoice_button = "인보이스";
$invoice_header = "제휴 파트너 지급 인보이스";
$invoice_aff_info = "제휴 정보";
$invoice_co_info = "정보";
$invoice_acct_info = "계정 정보";
$invoice_payment_info = "지급 정보";
$invoice_comm_date = "지급 날짜";
$invoice_comm_amt = "수수료 금액";
$invoice_comm_type = "수수료 유형";
$invoice_admin_note = "관리자 노트";
$invoice_footer = "인보이스 끝";
$invoice_print = "인보이스 출력하기";
$invoice_none = "N/A";
$invoice_aff_id = "제휴 ID ";
$invoice_aff_user = "사용자 이름";
$menu_pdf_marketing = "PDF 마케팅 브로셔";
$menu_pdf_training = "PDF 트레이닝 문서";
$marketing_target_url = "대상 URL";
$marketing_source_code = "소스 코드- 귀하의 웹사이트에 복사/붙여넣기 하십시오";
$marketing_group = "마케팅 그룹";
$peels_title = "페이지 필 이름";
$peels_view = "이 페이지 보기";
$peels_description = "페이지 필 설명";
$lb_head_title = "귀하의 HTML페이지에는 HEAD코드가 필요합니다";
$lb_head_description = "웹사이트에 라이트 박스를 사용하기 위해서는 보이고자 하는 페이지의 헤드 섹션에 다음 라인을 추가해야 합니다. ";
$lb_head_source_code = "HTML 문서의 헤드 섹션에 이 코드를 붙여 넣기 하십시오.";
$lb_head_code_notes = "귀하의 몇 개의 라이트 박스를 설치하든지 간에 이 코드는 한번만 설치하면 됩니다. ";
$lb_head_tutorial = "튜토리얼 보기";
$lb_body_title = "라이트 박스 이름";
$lb_body_description = "라이트 박스 설명";
$lb_body_click = "위 그림을 클릭하여 라이트 박스를 볼 수 있습니다.";
$lb_body_source_code = "이 코드를 이 그림이 보이고자 하는 귀하의 HTML 문서의 바디 섹션에 붙여 넣으십시오.";
$pdf_title = "PDF";
$pdf_training = "트레이닝 문서";
$pdf_marketing = "마케팅 브로셔";
$pdf_description_1 = "PDF 트레이닝 문서를 보고 출력하기 위해서는 Adobe Reader 가 필요합니다.";
$pdf_description_2 = "Adobe Reader 는 Adobe 웹사이트에서 무료로 다운로드 할 수 있습니다. ";
$pdf_file_name = "파일 이름";
$pdf_file_size = "파일 크기";
$pdf_file_description = "설명";
$pdf_bytes = "바이트";
$menu_heading_training_materials = "트레이닝 교재";
$menu_videos = "트레이닝 비디오 보기";
$menu_custom_manual = "맞춤 추적 링크 매뉴얼";
$menu_page_peels = "페이지 필";
$menu_lightboxes = "라이트박스";
$menu_email_templates = "이메일 템플릿";
$menu_heading_custom_links = "맞춤 추적 링크";
$menu_custom_reports = "보고서";
$menu_keyword_links = "추적 링크 키워드";
$menu_subid_links = "서브-제휴 추적 링크";
$menu_alteranate_links = "다른 방문 페이지 링크";
$menu_heading_additional = "추가적인 툴";
$menu_drop_heading_stats = "일반 통계";
$menu_drop_heading_commissions = "수수료";
$menu_drop_heading_history = "지급 내역";
$menu_drop_heading_traffic = "트래픽 로그";
$menu_drop_heading_account = "내 계정";
$menu_drop_heading_logo = "내 로고 업로드";
$menu_drop_heading_faq = "FAQ";
$menu_drop_general_stats = "일반 통계";
$menu_drop_tier_stats = "티어 통계";
$menu_drop_current = "현재 수수료";
$menu_drop_tier = "현재 티어 수수료";
$menu_drop_pending = "승인 대기중";
$menu_drop_paid = "지급 완료된 수수료";
$menu_drop_paid_rec = "지급 완료된 티어 수수료";
$menu_drop_recurring = "활동 중인 반복 수수료";
$menu_drop_edit = "내 계정 수정";
$menu_drop_password = "비밀번호 변경";
$menu_drop_change = "내 수수료 유형 변경";
$account_hidden = "감춰진";
$keyword_title = "맞춤 키워드 링크";
$keyword_info = "맞춤 키워드 링크를 생성하면 여러 소스로부터 트래픽을 가져올 수 있는 기능이 생깁니다. 최대 4개의 다른 추적 키워드를 생성할 수 잇으며, 맞춤 추적 보고서는 귀하가 생성한 키워드마다 자세한 보고서를 보여줄 것입니다. ";
$keyword_heading = "맞춤 추적 키워드에 가능한 변수";
$keyword_tracking = "추적 ID";
$keyword_build = "링크를 생성하기 위해서, 다음의 URL을 추적 ID와 사용하고자 하는 키워드와 함께 붙여 넣으십시오.";
$keyword_example = "예시";
$keyword_tutorial = "튜토리얼 보기";
$sub_tracking_title = "서브 제휴 추적";
$sub_tracking_info = " 서브 제휴 링크를 생성하면 귀하의 제휴 파트너가 사용할 수 있는 링크를 전달할 수 있게 됩니다. 저희는 어떤 서브 제휴 파트너가 수수료를 벌고 있는지 보고서를 작성하여 귀하에게  알려 드립니다. 서브 제휴 링크를 사용할 다른 이유는 귀하가 본인만의 추적 시스템을 가지고 보고서에 첨부할 수 있기 때문입니다.";
$sub_tracking_build = "XXX를 귀하의 제휴 프로그램에 있는 제휴 파트너의 ID번호로 교체하십시오. 이 과정을 귀하의 제휴 파트너들에게 되풀이합니다.";
$sub_tracking_example = "예시";
$sub_tracking_tutorial = "튜토리얼 보기";
$sub_tracking_id = "서브 제휴 파트너 ID ";
$alternate_title = "다른 방문 페이지 링크";
$alternate_option_1 = "옵션 1 : 자동 링크 생성";
$alternate_heading_1 = "자동 링크 생성";
$alternate_info_1 = "트래픽이 방문하길 원하는 URL주소를 입력하시어  자신의 방문 트래픽 페이지를 규정하면 저희가 링크를 생성할 것입니다. 이 기능을 사용하여 데이터베이스에 있는  ID번호가 포함된 더 짧은 URL을 만들어 드립니다.";
$alternate_button = "내 링크 생성";
$alternate_links_heading = "내 다른 방문 URL 링크";
$alternate_links_note = "맞춤 링크를 이 페이지에서 제거하더라도 기존 링크는 그대로 남아 기능을 할 것입니다.";
$alternate_links_remove = "제거";
$alternate_option_2 = "옵션 2:  수동 링크 생성";
$alternate_info_2 = "만약 대체 방문 URL이 있는 제휴 링크를 직접 붙여넣기를 선호한다면, 다음 구조를 사용하십시오.";
$alternate_variable = "대체 방문 URL 변수";
$alternate_example = "예시";
$alternate_build = "직접 링크를 생성하기 위해서는 다음 URL을 복사하여 사용하고자 하는 대체 방문 URL에 붙여넣기 하십시오. ";
$alternate_none = "대체 방문 링크가 생성되지 않았습니다";
$alternate_tutorial = "튜토리얼 보기";
$cr_title = "맞춤 키워드 보고서";
$cr_select = "키워드 선택";
$cr_button = "보고서 생성";
$cr_no_results = "발견된 검색 결과가 없습니다.";
$cr_no_results_info = "다른 키워드 조합을 사용하십시오";
$cr_used = "사용한 키워드";
$cr_found = "이 링크가 발견되었습니다";
$cr_times = "회수";
$cr_unique = "독특한 링크가 발견되었습니다";
$cr_detailed = "링크 관련 자세한 보고서";
$cr_export = "보고서 엑셀 포맷으로 발송하기";
$cr_none = "발견된 키워드가 없습니다";
$logo_title = "회사 로고 업로드";
$logo_info = "귀하의 회사 로고를 업로드 하고자 한다면, 저희는 귀하가 저희 웹사이트로 보내 주는 손님에게 보여 지도록 합니다. 이럼으로써 고객들이 저희를 방문한 경험을 개인화 할 수 있도록 합니다.";
$logo_bullet_one = "이미지는.jpg, .gif, .png 형태 이어야 합니다. 플래시 기능은 허용되지 않습니다.";
$logo_bullet_two = "모든 부적절한 이미지는 폐기되고 귀하의 계정은 정지 될 것입니다. ";
$logo_bullet_three = "귀하의 이미지/로고는 우리측 승인이 완료되기까지 보여 지지 않습니다. ";
$logo_bullet_size_one = "이미지의 최대 폭은 다음과 같습니다.";
$logo_bullet_size_two = "픽셀.  최대 높이는 다음과 같습니다.";
$logo_bullet_req_size_one = "이미지의 폭은 다음과 같습니다. ";
$logo_bullet_req_size_two = "픽셀. 최대 높이는 다음과 같습니다. ";
$logo_bullet_pixels = "픽셀.";
$logo_choose = "이미지 선택";
$logo_file = "파일 선택:";
$logo_browse = "살펴보기...";
$logo_button = "업로드";
$logo_current = "내 현재 이미지";
$logo_remove = "제거";
$logo_display_status = "이미지 상태:";
$logo_pending = "승인 대기중";
$logo_approved = "승인 완료";
$logo_success = "이미지가 성공적으로 업로드 되었고 현재 승인 대기중 입니다.";
$signup_security_title = "계정 확인";
$signup_security_info = "상자 안에 보안 코드를 입력하십시오. 이 과정을 통해 자동 등록을 방지할 수 있습니다. ";
$signup_security_code = "보안 코드";
$sub_tracking_none = "없음";
$missing_security_code = "계정 검증/보안 코드가 틀리거나 없습니다. ";
$alternate_success_title = "링크 생성 성공";
$alternate_success_info = "하단의 귀하의 링크를 사용하여 사전 정의한 URL로 트래픽을 끌어 오길 시작합니다. ";
$alternate_failed_title = "링크 생성 오류";
$alternate_failed_info = "유효한 URL 입력";
$logo_missing_filename = "파일 이름 선택";
$logo_required_width = "이미지 너비는 다음 이상이어야 합니다. ";
$logo_required_height = "이미지 높이는 다음 이상이어야 합니다";
$logo_maximum_width = "이미지 너비는 다음 미만이어야 합니다";
$logo_maximum_height = "이미지 높이는 다음 미만이어야 합니다";
$logo_size_maximum = "이미지 크기는 다음 미만이어야 합니다";
$logo_bad_filetype = "허용되지 않는 이미지 타입 입니다. 가능한 이미지 타입은 .gif, .jpg, .png 입니다.";
$logo_upload_error = "이미지 업로드 오류. 제휴 매니저에게 문의 하시기 바랍니다.";
$logo_error_title = "이미지 업로드 오류";
$logo_error_bytes = "바이트.";
$excel_title = "맞춤 키워드 링크 보고서";
$excel_tab_report = "맞춤 키워드 보고서";
$excel_tab_logs = "트래픽 로그";
$excel_date = "보고 날짜:";
$excel_affiliate = "제휴 ID:";
$excel_criteria = "키워드 링크 기준";
$excel_link = "링크 구조";
$excel_hits = "특별한 방문자 숫자";
$excel_comm_stats = "수수료 통계";
$excel_comm_current = "현재 수수료";
$excel_comm_paid = "지급 완료된 수수료";
$excel_comm_total = "총 수수료";
$excel_comm_ratio = "변환 비율";
$excel_earned = "취득한 수수료";
$excel_earned_current = "현재 수수료";
$excel_earned_paid = "지급 완료된 수수료";
$excel_earned_total = "총 취득한 수수료";
$excel_earned_tab = "(하단의) 트래픽 로그 탭을 클릭하여 이 맞춤 링크에 대한 트래픽 로그를 볼 수 있습니다.";
$excel_log_title = "맞춤 키워드 트래픽 로그";
$excel_log_ip = "IP 주소";
$excel_log_refer = "참조URL";
$excel_log_date = "날짜";
$excel_log_time = "시간";
$excel_log_target = "대상URL";
$etemplates_title = "이메일 템플릿";
$etemplates_view_link = "이 이메일 템플릿 보기";
$etemplates_name = "템플릿 이름";
$signup_maintenance_heading = "유지 보수 알림";
$signup_maintenance_info = "신규 등록은 일시적으로 불가능합니다. 나중에 다시 시도해 주시기 바랍니다.";
$marketing_group_title = "마케팅 그룹";
$marketing_button = "보이기";
$marketing_no_group = "아무 그룹도 선택되지 않았습니다.";
$marketing_choose = "위의 마케팅 그룹을 선택하십시오";
$marketing_notice = "마케팅 그룹은 다른 방문 트래픽 페이지를 가지고 있을 수 있습니다. ";
$canspam_heading = "CAN-SPAM 규정 및 수락";
$canspam_accept = "본인은 위의CAN-SPAM 규정을 읽고 이해했으며 동의합니다. ";
$canspam_error = " CAN-SPAM 규정에 동의하지 않았습니다.";
$signup_banned = "계정 생성시 오류가 발생했습니다. 시스템 관리자에게 문의해 주시기 바랍니다.";
$header_testimonials = "제휴 성공 사례";
$testi_visit = "웹사이트 방문";
$testi_description = "우리 제휴 프로그램에 대한 귀하의 성공 사례를 제공하며, 이를&lt;a href=&quot;testimonials.php&quot;&gt;testimonials&lt;/a&gt; 페이지에 위치해 놓고 귀하의 웹사이트에 링크를 걸어 놓을 것입니다. ";
$testi_name = "이름";
$testi_url = "웹사이트 URL";
$testi_content = "성공 사례";
$testi_code = "보안 코드";
$testi_submit = "성공 사례 제출하기";
$testi_na = "성공 사례가 가능하지 않습니다.";
$testi_title = "성공 사례 제공하기";
$testi_success_title = "성공 사례";
$testi_success_message = "귀하의 성공 사례를 제출해 주셔서 감사합니다. 저희 팀이 빠른 시일 내에 검토하겠습니다.";
$testi_error_title = "성공 사례 오류";
$testi_error_name_missing = "귀하의 성공 사례에 이름을 적어 주십시오. ";
$testi_error_url_missing = "귀하의 성공 사례에 귀하의 웹사이트 URL을 적어 주십시오.";
$testi_error_missing = "귀하의 성공 사례에 내용을 적어 주십시오.";
$menu_drop_delayed = "지연되고 있는 수수료";
$details_drop_6 = "현재 지연되고 있는 수수료";
$details_type_6 = "지연중 - 곧 승인 예정";
$comdetails_status_6 = "지연중 - 곧 승인 예정";
$tc_reaccept_title = "이용 약관 변경 알림";
$tc_reaccept_sub_title = "새로운 이용 약관에 동의하셔야 귀하의 계정에 접속할 수 있습니다. ";
$tc_reaccept_button = "위의 이용 약관을 읽고 이해하고 동의합니다.";
$tlinks_active = "활동중인 티어 수";
$tlinks_payout_structure = "티어 지급 구조";
$tlinks_level = "레벨";
$tierText1 = "% : 제휴 파트너의 반복 수수료 금액 비율.";
$tierText2 = "% : 상위 제휴 파트너의 수수료 금액 비율.";
$tierText3 = "% : 판매 금액으로 계산된 비율.";
$tierTextflat = "균일 비율.";
$edit_custom_button = "답변 수정";
$private_heading = "개인 신규 등록";
$private_info = "저희의 제휴 프로그램은 일반 대중에게 오픈 되어 있지 않으며 참여를 위한 신규 등록 코드가 필요합니다. 신규 등록 코드를 받는 방법은 여기에서 찾을 수 있습니다.";
$private_required_heading = "신규 등록 코드 필요";
$private_code_title = "신규 등록 코드 입력";
$private_button = "코드 제출";
$private_error_title = "유효하지 않은 신규 등록 코드입니다. ";
$private_error_invalid = "귀하가 입력하신 신규 등록 코드는 유효하지 않습니다. ";
$private_error_expired = "귀하가 입력하신 신규 등록 코드는 만료되었으며 더 이상 유효하지 않습니다. ";
$qr_code_title = "QR 코드";
$qr_code_size = "QR 코드 크기";
$qr_code_button = " QR 코드 보이기";
$qr_code_offline_title = "오프 라인 마케팅";
$qr_code_offline_content1 = "이 QR 코드를 귀하의 마케팅 브로셔, 광고 전단, 명함에 추가하십시오.";
$qr_code_offline_content2 = "- 이미지를 오른쪽 클릭하시고 귀하의 컴퓨터에 &lt;strong&gt;다른 이름으로 저장&lt;/strong&gt; 하십시오.";
$qr_code_online_title = "온라인 마케팅";
$qr_code_online_content = "이 QR코드를 귀하의 웹사이트, 소셜 미디어, 블로그 등등에 추가하십시오.";
$menu_coupon = "쿠폰 코드";
$coupon_title = "귀하가 사용 가능한 쿠폰 코드";
$coupon_desc = "쿠폰 코드를 배포하여 누군가 귀하의 코드를 사용할 때 마다 수수료를 받으십시오!";
$coupon_head_1 = "쿠폰 코드";
$coupon_head_2 = "소비자 가격 할인";
$coupon_head_3 = "귀하의 수수료 금액";
$coupon_sale_amt = "세일 금액 중";
$coupon_flat_rate = "균일 비율";
$coupon_default = "기본 지급 레벨";
$cc_vanity_title = "개인 쿠폰 코드 요청하기";
$cc_vanity_field = "쿠폰 코드";
$cc_vanity_button = "쿠폰 코드 요청하기";
$cc_vanity_error_missing = "<strong>오류!</strong> 쿠폰 코드를 입력하십시오.";
$cc_vanity_error_exists = "<strong>오류!</strong> 귀하는 이미 이 코드를 요청하셨습니다. 현재 승인 대기중 입니다..";
$cc_vanity_error = "<strong>오류!</strong> 쿠폰 코드가 유효하지 않습니다. 문자와 숫자, 밑줄만 사용하십시오.";
$cc_vanity_success = "<strong>성공!</strong> 귀하의 개인 쿠폰 코드가 요청되었습니다.";
$coupon_none = "현재 사용 가능한 쿠폰 코드가 없습니다. ";
$pic_error_title = "이미지 업로드 오류";
$pic_missing = "파일 이름을 선택하십시오.";
$pic_invalid = "허용되지 않는 이미지 타입 입니다. 가능한 이미지 타입은 .gif, .jpg, .png 입니다.";
$pic_error = "이미지 업로드 오류. 제휴 매니저에게 문의 하시기 바랍니다.";
$pic_success = "사진이 성공적으로 업로드 되었습니다.";
$pic_title = "사진 업로드 하기";
$pic_info = "귀하의 사진을 업로드 하면 귀하와의 경험이 더욱 개인적이 될 수 있도록 도와 줍니다.";
$pic_bullet_1 = "이미지는 .jpg, .gif, .png 종류만 허용됩니다.";
$pic_bullet_2 = "모든 부적절한 이미지는 폐기되고 귀하의 계정은 정지 될 것입니다.";
$pic_bullet_3 = "귀하의 사진은 공개적으로 보여 지지 않을 것입니다. 귀하의 계정에 첨부되어 저희만 볼 수 있습니다. ";
$pic_file = "파일 선택:";
$pic_button = "업로드";
$pic_current = "내 현재 사진";
$pic_remove = "사진 제거";
$progress_title = "다음 지급 자격:";
$progress_complete = "완료.";
$progress_none = "저희는 최소 지급 요건을 가지고 있지 않습니다.";
$progress_sentence_1 = "귀하는 현재";
$progress_sentence_2 = "의 수익을 취득하셨습니다";
$progress_sentence_3 = "는 총 자격 요건입니다. ";
$aff_lib_button = "<b>무료 접속을 요청하십시오!</b><BR />www.AffiliateLibrary.com";
$menu_announcements = "소셜 미디어 캠페인";
$announcements_name = "캠페인 이름";
$announcements_facebook_message = "페이스 북 메세지";
$announcements_twitter_message = "트위터 메세지";
$announcements_facebook_link = "페이스북 링크";
$announcements_facebook_picture = "페이스북 사진";
$general_last_30_days_activity = "마지막 30일간의 활동 내역";
$general_last_30_days_activity_traffic = "트래픽";
$general_last_30_days_activity_commissions = "수수료";
$accountability_title = "책임 및 소통";
$accountability_text = "<strong>이것이 뭐죠? 저희는 저희 제휴 파트너들과 신뢰를 구축하기 위하여 적극적인 접근 방법을 사용합니다. 저희의 목표는 취득하신/취소된 수수료 항목마다 가능한 한 많은 정보를 제공하는 것 입니다.  .</p><strong>의사 소통</strong><p> 저희는 모든 취소된 수수료에 대하여 자세한 정보를 제공해 드립니다. 저희는 저희의 제휴 파트너들과 강력한 의사 소통을 구축하고 있으며, 질문과 답변을 장려하고 있습니다.";
$debit_reason_0 = "없음";
$debit_reason_1 = "환불";
$debit_reason_2 = "카드로 환불";
$debit_reason_3 = "신고된 사기";
$debit_reason_4 = "취소된 주문";
$debit_reason_5 = "부분 환불";
$menu_drop_pending_debits = "차변 대기중";
$debit_amount_label = "차변 금액";
$debit_date_label = "차변 날짜";
$debit_reason_label = "차변 사유";
$debit_paragraph = "차변은 귀하의 다음 지급에서 제해질 것입니다.";
$debit_invoice_amount = "차변 제외 금액";
$debit_revised_amount = "수정된 지급 금액";
$mv_head_description = "주: 귀하는 웹사이트 페이지마다 하나의 동영상만 올릴 수 있습니다.";
$mv_head_source_code = "이 코드를 귀하의 HTML 문서의 헤드 섹션에 붙여 넣으십시오.";
$mv_body_title = "비디오 제목";
$mv_body_description = "설명";
$mv_body_source_code = "이 코드를 비디오를 위치시키고자 하는 HTML 문서의 바디 섹션에 붙여 넣으십시오.";
$menu_marketing_videos = "비디오";
$mv_preview_button = "비디오 미리보기";
$dt_no_data = "사용 가능한 데이터가 없습니다.";
$dt_showing_exists = "총_TOTAL_ 항목중_START_ 에서 _END_까지 보이기.";
$dt_showing_none = "총 0 항목중 0에서 0까지 보이기.";
$dt_filtered = "(최대_MAX_  항목에서 선별하기)";
$dt_length_choice = "_MENU_ 항목 보이기.";
$dt_loading = "로딩중...";
$dt_processing = "처리중...";
$dt_no_records = "일치하는 결과를 찾을 수 없습니다.";
$dt_first = "처음";
$dt_last = "마지막";
$dt_next = "다음";
$dt_previous = "이전";
$dt_sort_asc = ": 오름 차순으로 정리 활성화";
$dt_sort_desc = ": 내림 차순으로 정리 활성화";
$choose_marketing_group = "마케팅 그룹 선택하기";
$email_already_used_1 = "계정이 생성될 수 없습니다.";
$email_already_used_2 = "개의 계정이";
$email_already_used_3 = "한 개 이메일 주소마다 생성할 수 있도록 허용합니다.";
$missing_fax = "팩스 번호 입력";
$chart_last_6_months = "지난 6개월간 지급된 수수료";
$chart_last_6_months_paid = "지급된 수수료";
$chart_this_month = "이달의 최고 제휴 파트너 5명";
$chart_this_month_none = "보여줄 정보가 없습니다.";
$login_return = "제휴 홈으로 돌아가기";
$login_lost_details = "사용자 이름을 입력하면 이메일로 귀하의 로그인 정보를 보내 드리겠습니다.";
$account_edit_general_prefs = "일반 환경 설정";
$account_edit_email_language = "이메일 언어";
$footer_connect = "저희와 연결하기";
$modal_close = "닫기";
$vat_amount_heading = "부가가치세 금액";
$menu_logout = "로그아웃";
$menu_upload_picture = "사진 업로드";
$menu_offer_testi = "추천 사례 제공하기";
$fb_login = "페이스북으로 로그인 하기";
$fb_permissions = "허용되지 않았습니다. 이 웹사이트가 귀하의 이메일을 사용하도록 허용 하십시오.";
$announcements_published = "공지사항 게시";
$training_videos_title = "트레이닝 동영상";
$training_videos_general = "일반 마케팅";
$commission_method = "커미셔닝 방법";
$how_will_you_earn = "커미션을 어떻게 벌어야 할까요?";
$pm_account_credit = "우리가 당신이 적립한 커미션만큼 계정에 크레딧을 드리겠습니다.";
$pm_check_money_order = "우편으로 수표 / 머니오더를 보내드립니다.";
$pm_paypal = "Paypal을 통하여 보내드립니다.";
$pm_stripe = "Stripe를 통하여 보내드립니다.";
$pm_wire = "계좌로 송금해 드립니다.";
$add_to_signup_left_column_text = "<span style=\"color:#CC0000; font-style:italic;\">*표시된 곳은 필수 입력.</span>";
$paypal_email = "Paypal 이메일";
$stripe_acct_details = "Stripe계정 정보";
$stripe_connect = "등록한 이후에 계정 설정 화면에서 Stripe 계정으로 연동할 수 있습니다.";
$stripe_success = "Stripe 계정이 성공적으로 연동되었습니다.";
$stripe_settings = "Stripe 설정";
$stripe_connect_edit = "Stripe에 연동";
$stripe_delete = "Stripe 계정 삭제";
$stripe_confirm = "이 계정을 정말로 삭제하시겠습니까??";
$payment_settings = "지불 방법 설정";
$edit_payment_settings = "지불 방법 설정 변경";
$invalid_paypal_address = "유효하지 않은 PayPal 이메일 주소입니다. ";
$payment_method_error = "지불 방법을 선택하여 주십시오";
$payment_settings_updated = "지불 방법 설정이 업데이트 되었습니다. ";
$stripe_removed = "Stripe 계정이 삭제되었습니다. ";
$payment_settings_success = "성공!";
$payment_update_notice_1 = "알림!";
$payment_update_notice_2 = "저희에게서 대금을 지급받을  계정을 <strong>[payment_option_here]</strong>으로 설정하였습니다. <a href=\"account.php?page=48\" style=\"font-weight:bold;\"> 이곳을 클릭</a>하여 당신의  <strong>[payment_option_here]</strong> 계정으로 연결하십시오.";
$pm_title_credit = "계좌 크레딧";
$pm_title_mo = "수표/우편환";
$pm_title_paypal = "PayPal";
$pm_title_stripe = "Stripe";
$pm_title_wire = "계좌 이체";
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