<?PHP

//-------------------------------------------------------
	  $language_pack_name = "vietnamese";
	  $language_pack_table_name = "vietnamese";
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
$header_title = "Chương trình liên kết";
$header_indexLink = "Cơ sở liên kết";
$header_signupLink = "Đăng ký ngay";
$header_accountLink = "Quản lý tài khoản";
$header_emailLink = "Liên hệ với chúng tôi";
$header_greeting = "Xin chào";
$header_nonLogged = "Khách";
$header_logout = "Đăng xuất tại đây";
$footer_tag = "Phần mềm liên kết bởi iDevAffiliate";
$footer_copyright = "Bản quyền";
$footer_rights = "Bản quyền đã đăng ký";
$index_heading_1 = "Chào Mừng Đến Với Chương Trình Liên Kết Của Chúng Tôi!";
$index_paragraph_1 = "Chương trình của chúng tôi miễn phí tham gia, dễ dàng đăng ký và không cần có kiến thức về kỹ thuật. Các chương trình liên kết phổ biến trên mạng cung cấp cho các chủ website thêm một cách tạo lợi nhuận từ các website của họ. Các liên kết tạo ra lưu lượng và doanh số cho các websites thương mại và ngược lại nhận được một khoản hoa hồng.";
$index_heading_2 = "Nó hoạt động như thế nào?";
$index_paragraph_2 = "Khi tham gia chương trình liên kết của chúng tôi, bạn sẽ được cung cấp các quảng cáo và đường dẫn văn bản để đưa vào website của bạn. Khi một người dùng click chuột vào một trong những đường dẫn của bạn, họ sẽ được đưa vào website của chúng tôi và hoạt động của họ sẽ được phần mềm liên kết của chúng tôi theo dõi. Bạn sẽ kiếm được tiền hoa hồng dựa trên Kiểu kiếm tiền hoa hồng của bạn.";
$index_heading_3 = "Thống kê thời gian thực và Báo cáo!";
$index_paragraph_3 = "Đăng nhập 24 giờ hàng ngày để kiểm tra doanh số, lưu lượng, số dư tài khoản và xem các quảng cáo của bạn đang hoạt động ra sao.";
$index_login_title = "Đăng nhập liên kết";
$index_login_username = "Tên người dùng";
$index_login_password = "Mật khẩu";
$index_login_username_field = "tên người dùng";
$index_login_password_field = "mật khẩu";
$index_login_button = "Đăng nhập";
$index_login_signup_link = "Click để đăng ký";
$index_table_title = "Chi tiết chương trình";
$index_table_commission_type = "Kiểu Hoa Hồng";
$index_table_initial_deposit = "Tiền gửi ban đầu";
$index_table_requirements = "Các yêu cầu khi chi trả";
$index_table_duration = "Thời gian chi trả";
$index_table_choose = "Chọn trong số các lựa chọn chi trả sau!";
$index_table_sale = "Thanh toán cho mỗi lần bán ";
$index_table_click = " Thanh toán cho mỗi lần nhấp chuột";
$index_table_sale_text = "cho mỗi lần bán mà bạn thực hiện.";
$index_table_click_text = " cho mỗi lần nhấp chuột mà bạn thực hiện được.";
$index_table_deposit_tag = "Chỉ dành cho đăng ký!";
$index_table_requirements_tag = "Số dư tối thiểu cần có để chi trả.";
$index_table_duration_tag = "Thanh toán chi trả được thực hiện mỗi tháng một lần, cho tháng trước đó.";
$signup_left_column_text = "Hãy tham gia vào chương trình liên két của chúng tôi và bắt đầu kiếm tiền cho mỗi lần bán theo cách của chúng tôi! Đơn giản là tạo tài khoản, đưa mã kết nối của bạn và website của bạn và xem số dư tài khoản của bạn lớn dần khi những người ghé thăm website của bạn trở thành khách hàng của chúng tôi.";
$signup_left_column_title = "Chào mừng liên kết!";
$signup_login_title = "Tạo tài khoản của bạn";
$signup_login_username = "Tên người dùng";
$signup_login_password = "Mật khẩu";
$signup_login_password_again = "Nhập lại mật khẩu";
$signup_login_minmax_chars = "- Tên đăng nhập phải có ít nhất user_min_chars ký tự.&lt;br /&gt;- Tên đăng nhập có thể là bảng ký tự alphabe và số.&lt;br /&gt;- Tên đăng nhập có thể chứa các ký tự này: _(chỉ gấu gạch dưới &lt;br /&gt;&lt;br /&gt;- Mật khẩu phải có ít nhất pass_min_chars ký tự.&lt;br /&gt;- Mật khẩu có thể là bảng ký tự alphabe và số.&lt;br /&gt;- Mật khẩu có thể chứa những ký tự này:  characters_allowed";
$signup_login_must_match = "Mục nhập này phải phù hợp với mục nhập mật khẩu.";
$signup_standard_title = "Thông tin tiêu chuẩn";
$signup_standard_email = "Địa chỉ email";
$signup_standard_company = "Tên Công ty";
$signup_standard_checkspayable = "Kiểm tra khoản phải trả cho ";
$signup_standard_weburl = "Địa chỉ Website ";
$signup_standard_taxinfo = "ID thuế, SSN hoặc VAT";
$signup_personal_title = "Thông tin cá nhân";
$signup_personal_fname = "Họ";
$signup_personal_state = "Bang hoặc Tỉnh";
$signup_personal_lname = "Tên";
$signup_personal_phone = "Số điện thoại";
$signup_personal_addr1 = "Phố";
$signup_personal_fax = "Số Fax";
$signup_personal_addr2 = "Địa chỉ khác";
$signup_personal_zip = "Mã Zip";
$signup_personal_city = "Thành phố";
$signup_personal_country = "Nước";
$signup_commission_title = "Thanh toán tiền hoa hồng";
$signup_commission_howtopay = "Chúng tôi nên trả tiền cho bạn bằng cách nào?";
$signup_commission_style_PPS = "Thanh toán cho mỗi lần bán";
$signup_commission_style_PPC = "Thanh toán cho mỗi lần nhấp chuột";
$signup_terms_title = "Điều khoản và điều kiện";
$signup_terms_agree = "Tôi đã đọc, hiểu và đồng ý với các điều khoản và điều kiện nêu trên.";
$signup_page_button = "Tạo tài khoản";
$signup_success_email_comment = "Chúng tôi đã gửi cho bạn một email có Tên người dùng và Mật khẩu của bạn.<BR />\r\nBạn nên giữ email này ở vị trí an toàn để tham chiếu về sau.";
$signup_success_login_link = "Đăng nhập vào tài khoản của bạn";
$custom_fields_title = "Trường Người Dùng Định Nghĩa";
$logout_msg = "<b>Giờ bạn đã đăng xuất</b><BR />Cảm ơn bạn đã tham gia vào chương trình liên kết của chúng tôi.";
$signup_page_success = "Tài khoản của bạn đã được tạo";
$login_left_column_title = "Đăng nhập tài khoản";
$login_left_column_text = "Nhập tên người dùng và mật khẩu của bạn để vào thống kê tài khoản, quảng cáo, mã đường dẫn, FAQ (câu hỏi thường gặp) và các mục khác của bạn.<BR/ ><BR/ >Nếu bạn không thể nhớ mật khẩu, hãy nhập tên người dùng của bạn và chúng tôi sẽ gửi cho bạn thông tin qua email của bạn.<BR /><BR />";
$login_title = "Đăng nhập vào tài khoản của bạn";
$login_username = "Tên người dùng";
$login_password = "Mật khẩu";
$login_invalid = "Đăng nhập không hợp lệ";
$login_now = "Đăng nhập vào tài khoản của tôi";
$login_send_title = "Bạn cần mật khẩu?";
$login_send_username = "Tên người dùng";
$login_send_info = "Chi Tiết Đăng Nhập được gửi vào Email";
$login_send_pass = "Gửi vào Email";
$login_send_bad = "Không tìm thấy tên người dùng";
$help_new_password_heading = "Mật khẩu mới";
$help_new_password_info = "Mật khẩu của bạn phải dài ít nhất pass_min_chars ký tự. Nó chỉ có thể chứa các ký tự, số và các ký tự sau:   characters_allowed";
$help_confirm_password_heading = "Xác nhận mật khẩu mới";
$help_confirm_password_info = "Phần nhập mật khẩu này phải giống với phần nhập mật khẩu mới.";
$help_custom_links_heading = "Từ khóa theo dõi";
$help_custom_links_info = "Từ khóa của bạn không được dài quá 30 kí tự. Có thể là chữ, chữ số và dấu gạch nối.";
$error_title = "Đã tìm thấy các lỗi sau";
$username_invalid = "Tên đăng nhập không hợp lệ. Nó chỉ có thể chứa các ký tự, số và dấu gạch dưới.";
$username_taken = "Tên người dùng mà bạn chọn đã có người dùng.";
$username_short = "Tên người dùng quá ngắn, nó ít nhất phải chứa số kí tự tối thiểu quy định.";
$username_long = "Tên người dùng quá dài, nó chỉ được chứa nhiều nhất số kí tự tối đa quy định.";
$password_invalid = "Mật khẩu không hợp lệ. Nó chỉ có thể chứa các ký tự, số và các ký tự sau:  characters_allowed";
$password_short = "Mật khẩu của bạn quá ngắn, nó ít nhất phải chứa số kí tự tối thiểu quy định.";
$password_long = "Mật khẩu của bạn quá dài, nó chỉ được chứa nhiều nhất số kí tự tối đa quy định.";
$password_mismatch = "Phần nhập mật khẩu của bạn không phù hợp.";
$missing_checks = "Nhập tên người nhận tiền để kiểm tra khoản tiền phải trả.";
$missing_tax = "Nhập thông tin về mã số thuế, SSN hoặc VAT.";
$missing_fname = "Nhập họ của bạn.";
$missing_lname = "Nhập tên của bạn.";
$missing_email = "Nhập địa chỉ email của bạn.";
$invalid_email = "Địa chỉ email của bạn không hợp lệ.";
$missing_address = "Nhập địa chỉ đường phố của bạn.";
$missing_city = "Nhập thành phố của bạn.";
$missing_company = "Nhập tên công ty của bạn.";
$missing_state = "Nhập bang hoặc tỉnh của bạn.";
$missing_zip = "Nhập mã Zip của bạn.";
$missing_phone = "Nhập số điện thoại của bạn.";
$missing_website = "Nhập địa chỉ website của bạn.";
$missing_paypal = "Bạn chọn nhận thanh toán bằng PayPal, xin nhập tài khoản PayPal của bạn.";
$missing_terms = "Bạn không chấp nhận các điều khoản và điều kiện của chúng tôi.";
$paypal_required = "Cần có một tài khoản PayPal để thanh toán.";
$missing_custom = "Xin hoàn tất các trường:";
$account_total_transactions = "Tổng các giao dịch";
$account_standard_linking_code = "Mã liên kết tiêu chuẩn - Quan trọng để sử dụng trong các email!";
$account_copy_paste = "Sao chép/Dán mã trên vào Website hoặc email của bạn";
$account_not_approved = "Tài khoản của bạn đang chờ được duyệt";
$account_suspended = "Tài khoản của bạn đang bị treo";
$account_standard_earnings = "Thu nhập tiêu chuẩn";
$account_inc_bonus = "bao gồm cả tiền thưởng";
$account_second_tier = "Thu nhập đa cấp";
$account_recurring = "Thu nhập đều đặn";
$account_not_available = "N/A";
$account_earned_todate = "Tổng số tiền kiếm được đến nay";
$menu_heading_overview = "Tổng quát tài khoản";
$menu_general_stats = "Thống kê chung";
$menu_tier_stats = "Thống kê đa cấp";
$menu_payment_history = "Lịch sử thanh toán";
$menu_commission_details = "Chi tiết tiền hoa hồng";
$menu_recurring_commissions = "Các khoản Tiền hoa hồng đều đặn";
$menu_traffic_log = "Nhật ký lưu lượng truy cập đến";
$menu_heading_marketing = "Tài liệu tiếp thị";
$menu_banners = "Banner";
$menu_text_ads = "Quảng cáo bằng văn bản";
$menu_text_links = "Liên kết văn bản";
$menu_email_links = "Đường dẫn email";
$menu_html_links = "Quảng cáo HTML";
$menu_offline = "Tiếp thị ngoại tuyến";
$menu_tier_linking_code = "Mã đường dẫn đa cấp";
$menu_email_friends = "Gửi email cho bạn bè &người thân; Các đơn vị liên kết";
$menu_custom_links = "Xây dựng &amp; Theo dõi các liên kết của bạn";
$menu_heading_management = "Quản lý tài khoản";
$menu_comalert = "Cài đặt Báo có tiền hoa hồng (CommissionAlert)";
$menu_comstats = "Cài đặt Thống kê tiền hoa hồng (CommissionStats)";
$menu_edit_account = "Chỉnh sửa tài khoản của tôi";
$menu_change_pass = "Thay đổi mật khẩu của tôi";
$menu_change_commission = "Thay đổi kiểu hưởng tiền hoa hồng của tôi";
$menu_heading_general_info = "Thông tin chung";
$menu_browse_affiliates = "Xem các đối tác liên kết khác";
$menu_faq = "Những câu hỏi thường gặp";
$suspended_title = "Thông báo tình trạng tài khoản";
$suspended_heading = "Tài khoản của bạn đang bi treo";
$suspended_notes = "Lưu ý của Quản trị viên";
$pending_title = "Báo động tình trạng tài khoản";
$pending_heading = "Tài khoản của bạn hiện đang chờ duyệt";
$pending_note = "Bạn sẽ có tài liệu tiếp thị ngay sau khi chúng tôi duyệt tài khoản của bạn.";
$faq_title = "Những câu hỏi thường gặp (FAQ)";
$faq_none = "Hiện chưa có FAQ";
$browse_title = "Xem các đối tác liên kết khác";
$browse_none = "Không có đối tác liên kết khác để xem";
$change_comm_title = "Thay đổi kiểu hưởng tiền hoa hồng";
$change_comm_curr_comm = "Kiểu hưởng tiền hoa hồng hiện tại";
$change_comm_curr_pay = "Mức trả hoa hồng hiện tại";
$change_comm_new_comm = "Kiểu hưởng tiền hoa hồng mới";
$change_comm_warning = "Nếu bạn thay đổi kiểu hưởng tiền hoa hồng, tài khoản của bạn sẽ bị reset về mức chi trả 1";
$change_comm_button = "Thay đổi kiểu hưởng tiền hoa hồng";
$change_comm_no_other = "Không có kiểu hưởng tiền hoa hồng nào khác";
$change_comm_level = "Mức";
$change_comm_updated = "Đã cập nhật kiểu hưởng tiền hoa hồng";
$password_title = "Thay đổi mật khẩu của tôi";
$password_old_password = "Mật khẩu cũ";
$password_new_password = "Mật khẩu mới";
$password_confirm_password = "Xác nhận mật khẩu mới";
$password_button = "Đổi mật khẩu";
$password_warning_old_missing = "Mật khẩu cũ không đúng hoặc thiếu";
$password_warning_new_missing = "Mục nhập mật khẩu mới thiếu";
$password_warning_mismatch = "Mật khẩu mới không giống";
$password_warning_invalid = "Mật khẩu không hợp lệ - Nhấp chuột vào Đường dẫn Hỗ trợ";
$password_notice = "Đã cập nhật mật khẩu";
$edit_failed = "Cập nhật thất bại – Xem lỗi ở trên";
$edit_success = "Cập nhật tài khoản";
$edit_button = "Chỉnh sửa tài khoản";
$commissionstats_title = "Cài đặt thống kê tiền hoa hồng";
$commissionstats_info = "Bằng việc cài đặt Thống kê tiền hoa hồng bạn có thể kiểm tra ngay thống kê của mình từ màn hình Windows! Để cài đặt tính năng này, hãy tải toàn bộ Thống kê tiền hoa hồng (CommissionStats) (và <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>unzip</b></a> vào ổ cứng của bạn sau đó chạy file <b>setup.exe</b>. Khi được nhắc đăng nhập thông tin của bạn, hãy nhập các chi tiết sau.";
$commissionstats_hint = "Gợi ý: Chép và dán từng mục nhập để đảm bảo sự chính xác";
$commissionstats_profile = "Tên hồ sơ";
$commissionstats_username = "Tên người dùng";
$commissionstats_password = "Mật khẩu";
$commissionstats_id = "Nhận diện (ID) đối tác liên kết";
$commissionstats_source = "Đường dẫn nguồn URL";
$commissionstats_download = "Tải xuống Thống kê tiền hoa hồng (CommissionStats)";
$commissionalert_title = "Cài đặt Thông báo tiền hoa hồng (CommissionAlert)";
$commissionalert_info = "Bằng việc cài đặt Thông báo tiền hoa hồng chúng tôi sẽ lập tức thông báo cho bạn về các khoản tiền hoa hồng mới, ngay trên màn hình Windows của bạn!Để cài đặt tính năng này, hãy tải toàn bộ Thông báo tiền hoa hồng (CommissionAlert) và <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>unzip</b></a> vào ổ cứng của bạn sau đó chạy file<b>setup.exe</b>. Khi được nhắc đăng nhập thông tin của bạn, hãy nhập các chi tiết sau.";
$commissionalert_hint = "Gợi ý: Chép và dán từng mục nhập để đảm bảo sự chính xác";
$commissionalert_profile = "Tên hồ sơ";
$commissionalert_username = "Tên người dùng";
$commissionalert_password = "Mật khẩu";
$commissionalert_id = "Nhận diện liên kết";
$commissionalert_source = "Đường dẫn nguồn URL";
$commissionalert_download = "Tải xuống Thông báo tiền hoa hồng (CommissionAlert)";
$offline_title = "Tiếp thị ngoại tuyến";
$offline_paragraph_one = "Kiếm tiền bằng cách tuyên truyền (ngoại tuyến) website của chúng tôi cho bạn bè và các đơn vị liên kết của bạn!";
$offline_send = "Gửi khách hàng đến";
$offline_page_link = "xem trang";
$offline_paragraph_two = "Khách hàng của bạn sẽ nhập <b>Số ID đối tác liên kết </b> của bạn vào hộp ở trang trên, trang này sẽ đăng ký bạn là một liên kết cho bất kỳ việc mua bán nào mà họ thực hiện.";
$banners_title = "Banner";
$banners_size = "Kích thước Banner";
$banners_description = "Mô tả Banner";
$ad_title = "Quảng cáo văn bản";
$ad_info = "Khi dùng mã liên kết được cấp, bạn có thể điều chỉnh kiểu màu, chiều cao và chiều rộng của Quảng cáo bằng văn bản của bạn.";
$links_title = "Tên đường dẫn";
$email_title = "Đường dẫn email";
$email_group = "Nhóm tiếp thị";
$email_button = "Hiển thị đường dẫn email";
$email_no_group = "Không nhóm nào được chọn";
$email_choose = "Hãy chọn Một Nhóm tiếp thị ở trên";
$email_notice = "Các nhóm tiếp thị có thể có các trang khác nhau về lưu lượng đến";
$email_ascii = "<b>ASCII/Phiên bản dạng văn bản</b> - Để sử dụng trong các email văn bản thuần.";
$email_html = "<b>Phiên bản dạng HTML</b> - Để sử dụng trong các email định dạng HTML.";
$email_test = "Liên kết thử nghiệm";
$email_test_info = "Đây là nơi mà khách hàng của bạn sẽ được đưa vào website của chúng tôi.";
$email_source = "Mã nguồn - Chép/Dán vào Tin nhắn trong email của bạn";
$html_title = "Tên Quảng cáo HTML";
$html_view_link = "Xem Quảng cáo HTML này";
$traffic_title = "Nhật ký lưu lượng đến";
$traffic_display = "Hiển thị trước";
$traffic_display_visitors = "Người xem";
$traffic_button = "Xem Nhật ký lưu lượng";
$traffic_title_details = "Chi tiết lưu lượng đến";
$traffic_ip = "Địa chỉ IP";
$traffic_refer = "URL tham khảo";
$traffic_date = "Ngày";
$traffic_time = "Giờ";
$traffic_bottom_tag_one = "Hiển thị cuối cùng";
$traffic_bottom_tag_two = "của";
$traffic_bottom_tag_three = "Tổng Số Những Người Xem";
$traffic_none = "Không tồn tại nhật lý lưu lượng";
$traffic_no_url = "N/A - Liên kết đánh dấu hoặc đường dẫn email có thể có";
$traffic_box_title = "Hoàn tất URL tham khảo";
$traffic_box_info = "Nhấp chuột vào đường dẫn để xem trang Web";
$payment_title = "Lịch sử thanh toán";
$payment_date = "Ngày thanh toán";
$payment_commissions = "Tiền hoa hồng";
$payment_amount = "Số tiền thanh toán";
$payment_totals = "Tổng cộng";
$payment_none = "Không tồn tại lịch sử thanh toán";
$tier_stats_title = "Thống kê đa cấp";
$tier_stats_accounts = "Các tài khoản đa cấp trực tiếp thuộc về bạn";
$tier_stats_grab_link = "Nhận mã đường dẫn đa cấp của bạn";
$tier_stats_none = "Không tồn tại các tài khoản đa cấp";
$tier_stats_username = "Tên người dùng";
$tier_stats_current = "Các khoản tiền hoa hồng hiện tại";
$tier_stats_previous = "Các khoản đã trả trước đây";
$tier_stats_totals = "Tổng cộng";
$recurring_title = "Các khoản tiền hoa hồng đều đặn";
$recurring_none = "Không tồn tại các khoản tiền hoa hồng đều đặn";
$recurring_date = "Ngày có tiền hoa hồng";
$recurring_status = "Tình trạng đều đặn";
$recurring_payout = "Lần trả tiền kế tiếp";
$recurring_amount = "Số tiền";
$recurring_every = "Mỗi";
$recurring_in = "Trong";
$recurring_days = "Ngày";
$recurring_total = "Tổng cộng";
$tlinks_title = "Hãy thêm những thứ khác vào cấp bậc của bạn và cũng tạo ra tiền từ chúng!";
$tlinks_embedded_one = "Tham gia theo cấp đã được kích hoạt trong các đường dẫn tới các liên kết tiêu chuẩn của bạn!";
$tlinks_embedded_two = "Việc sử dụng hệ thống đa cấp cho phép bạn tiếp thị chương trình liên kết của chúng tôi với những người khác. Bạn sẽ trở thành cấp cao hơn với bất kỳ ai tham gia vào chương trình liên kết của chúng tôi thông qua đường dẫn đa cấp tham khảo riêng cho bạn dưới đây. Thông tin về số tiền bạn có thể kiếm được thể hiện dưới đây.";
$tlinks_embedded_current = "Chi trả đa cấp hiện tại";
$tlinks_forced_two = "Việc sử dụng hệ thống đa cấp cho phép bạn tiếp thị chương trình liên kết của chúng tôi với những người khác. Bạn sẽ trở thành cấp cao hơn với bất kỳ ai tham gia và chương trình liên kết của chúng tôi thông qua đường dẫn da cấp tham khảo riêng cho bạn dưới đây. Thông tin về số tiền bạn có thể kiếm được thể hiện dưới đây.";
$tlinks_forced_code = "Đường dẫn đa cấp tham khảo";
$tlinks_forced_paste = "Chép/Dán mã trên vào Website của bạn";
$tlinks_forced_money = "Các chủ Web kiếm tiền ở đây!";
$comdetails_title = "Chi tiết về tiền hoa hồng";
$comdetails_date = "Ngày có tiền hoa hồng";
$comdetails_time = "Giờ có tiền hoa hồng";
$comdetails_type = "Loại tiền hoa hồng";
$comdetails_status = "Tình trạng hiện tại";
$comdetails_amount = "Số tiền hoa hồng";
$comdetails_additional_title = "Chi tiết tiền hoa hồng bổ sung";
$comdetails_additional_ordnum = "Số đơn hàng";
$comdetails_additional_saleamt = "Số tiền bán được";
$comdetails_type_1 = "Tiền thưởng";
$comdetails_type_2 = "Tiền hoa hồng đều đặn";
$comdetails_type_3 = "Tiền hoa hồng đa cấp";
$comdetails_type_4 = "Tiền hoa hồng tiêu chuẩn";
$comdetails_status_1 = "Đã thanh toán";
$comdetails_status_2 = "Khoản thanh toán đã được duyệt - Treo";
$comdetails_status_3 = "Chưa duyệt";
$comdetails_not_available = "N/A";
$details_title = "Chi tiết tiền hoa hồng";
$details_drop_1 = "Tiền hoa hồng tiêu chuẩn hiện tại";
$details_drop_2 = "Tiền hoa hồng đa cấp hiện tại";
$details_drop_3 = "Tiền hoa hồng đang chờ duyệt";
$details_drop_4 = "Tiền hoa hồng tiêu chuẩn đã trả";
$details_drop_5 = "Tiền hoa hồng đa cấp đã trả";
$details_button = "Xem các khoản tiền hoa hồng";
$details_date = "Ngày";
$details_status = "Tình trạng";
$details_commission = "Tiền hoa hồng";
$details_details = "Xem chi tiết";
$details_type_1 = "Đã thanh toán";
$details_type_2 = "Chưa duyệt";
$details_type_3 = "Đã duyệt - Chưa thanh toán";
$details_none = "Không có khoản hoa hồng nào để xem";
$details_no_group = "Không có nhóm tiền hoa hồng nào được chọn";
$details_choose = "Hãy chọn Nhóm tiền hoa hồng A ở trên";
$general_title = "Các khoản tiền hoa hồng hiện tại - Từ lần chi trả trước đến nay";
$general_transactions = "Các giao dịch";
$general_earnings_to_date = "Thu nhập đến nay";
$general_history_link = "Xem lịch sử thanh toán";
$general_standard_earnings = "Thu nhập tiêu chuẩn";
$general_current_earnings = "Thu nhập hiện tại";
$general_traffic_title = "Thống kê lưu lượng";
$general_traffic_visitors = "Người xem";
$general_traffic_unique = "Người xem một lần";
$general_traffic_sales = "Doanh số được duyệt";
$general_traffic_ratio = "Tỷ suất doanh số";
$general_traffic_info = "Thống kê này không bao gồm tiền hoa hồng đều đặn hay tiền hoa hồng đa cấp.";
$general_traffic_pay_type = "Cách trả";
$general_traffic_pay_level = "Mức trả hiện tại";
$general_notes_title = "Lưu ý của Quản trị viên";
$general_notes_date = "Ngày tạo";
$general_notes_to = "Gửi cho";
$general_notes_all = "Tất cả các liên kết";
$general_notes_none = "Không có lưu ý khi xem";
$contact_left_column_title = "Liên hệ với chúng tôi";
$contact_left_column_text = "Thoải mái liên hệ với người quản lý các liên kết của chúng tôi dùng mẫu phía bên phải.";
$contact_title = "Liên hệ với chúng tôi";
$contact_name = "Tên bạn";
$contact_email = "Địa chỉ email của bạn";
$contact_message = "Tin nhắn";
$contact_chars = "để lại ký tự";
$contact_button = "Gửi tin nhắn";
$contact_received = "Chúng tôi đã nhận được tin nhắn của bạn, chúng tôi sẽ hồi âm trong 24 giờ.";
$contact_invalid_name = "Tên không hợp lệ";
$contact_invalid_email = "Địa chỉ email không hợp lệ";
$contact_invalid_message = "Tin nhắn không hợp lệ";
$invoice_button = "Hóa đơn";
$invoice_header = "HÓA ĐƠN THANH TOÁN CHO ĐỐI TÁC LIÊN KẾT";
$invoice_aff_info = "Thông tin về Đối tác liên kết";
$invoice_co_info = "Thông tin";
$invoice_acct_info = "Thông tin tài khoản";
$invoice_payment_info = "Thông tin thanh toán";
$invoice_comm_date = "Ngày thanh toán";
$invoice_comm_amt = "Số tiền hoa hồng";
$invoice_comm_type = "Kiểu hưởng tiền hoa hồng";
$invoice_admin_note = "Lưu ý của Quản trị viên";
$invoice_footer = "KẾT THÚC HOÁ ĐƠN";
$invoice_print = "In hoá đơn";
$invoice_none = "N/A";
$invoice_aff_id = "ID của đối tác liên kết";
$invoice_aff_user = "Tên người dùng";
$menu_pdf_marketing = "Sách thông tin tiếp thị bản PDF";
$menu_pdf_training = "Tài liệu tập huấn bản PDF";
$marketing_target_url = "URL mục tiêu";
$marketing_source_code = "Mã nguồn - Chép/Dán vào Website của bạn";
$marketing_group = "Nhóm tiếp thị";
$peels_title = "Tên bên ngoài trang";
$peels_view = "Xem bên ngoài trang";
$peels_description = "Mô tả bên ngoài trang";
$lb_head_title = "Cần Mã HEAD cần có cho Trang HTML của bạn";
$lb_head_description = "Để dùng một lightbox trong website của bạn, bạn phải thêm các dòng dưới đây vào phần đầu trang mà bạn muốn nó hiển thị.";
$lb_head_source_code = "Dán mã này vào phần ĐẦU tài liệu HTML của bạn.";
$lb_head_code_notes = "Bạn chỉ cần đặt mã này một lần bất kể bạn muốn đặt bao nhiêu lightbox lên trang.";
$lb_head_tutorial = "Xem hướng dẫn";
$lb_body_title = "Tên Lightbox";
$lb_body_description = "Mô tả Lightbox";
$lb_body_click = "Nhấp chuột vào hình ảnh trên để xem lightbox.";
$lb_body_source_code = "Dán mã này vào phần BODY tài liệu HTML của bạn ở vị trí mà bạn muốn hình ảnh xuất hiện.";
$pdf_title = "PDF";
$pdf_training = "Tài liệu tập huấn";
$pdf_marketing = "Brochures tiếp thị";
$pdf_description_1 = "Cần có Adobe Reader để xem và in tài liệu tiếp thị PDF của chúng tôi.";
$pdf_description_2 = "Tải Adobe Reader miễn phí từ website Adobe.";
$pdf_file_name = "Tên File";
$pdf_file_size = "Kích thước File";
$pdf_file_description = "Mô tả";
$pdf_bytes = "Bytes";
$menu_heading_training_materials = "Tài liệu tập huấn";
$menu_videos = "Xem video tập huấn";
$menu_custom_manual = "Sách hướng dẫn sử dụng đường dẫn theo dõi tuỳ chỉnh";
$menu_page_peels = "Các trang ngoài";
$menu_lightboxes = "Lightbox";
$menu_email_templates = "Các mẫu email";
$menu_heading_custom_links = "Đường dẫn theo dõi tuỳ chỉnh";
$menu_custom_reports = "Các báo cáo";
$menu_keyword_links = "Liên kết theo dõi từ khóa";
$menu_subid_links = "Liên kết theo dõi liên kết nhánh";
$menu_alteranate_links = "Liên kết đến trang khác";
$menu_heading_additional = "Công cụ bổ sung";
$menu_drop_heading_stats = "Thống kê chung";
$menu_drop_heading_commissions = "Tiền hoa hồng";
$menu_drop_heading_history = "Lịch sử thanh toán";
$menu_drop_heading_traffic = "Nhật ký lưu lượng";
$menu_drop_heading_account = "Tài khoản của tôi";
$menu_drop_heading_logo = "Tải lên Logo của tôi";
$menu_drop_heading_faq = "FAQ";
$menu_drop_general_stats = "Thống kê chung";
$menu_drop_tier_stats = "Thống kê đa cấp";
$menu_drop_current = "Tiền hoa hồng hiện tại";
$menu_drop_tier = "Tiền hoa hồng đa cấp hiện tại";
$menu_drop_pending = "Chờ phê duyệt";
$menu_drop_paid = "Tiền hoa hồng đã trả";
$menu_drop_paid_rec = "Tiền hoa hồng đa cấp đã trả";
$menu_drop_recurring = "Tiền hoa hồng đều đặn động";
$menu_drop_edit = "Biên tập tài khoản của tôi";
$menu_drop_password = "Thay đổi mật khẩu của tôi";
$menu_drop_change = "Thay đổi kiểu hưởng tiền hoa hồng của tôi";
$account_hidden = "ẩn";
$keyword_title = "Liên kết chính tuỳ chỉnh";
$keyword_info = "Việc tạo một liên kết chính tuỳ chỉnh cho bạn khả năng theo dõi lưu lượng đến đối với nhiều nguồn khác nhau. Tạo một liên kết với bốn từ khoá theo dõi khác nhau sẽ cho bạn một báo cáo chi tiết đối với mỗi từ khoá mà bạn tạo ra.";
$keyword_heading = "Các biến theo dõi từ khoá tuỳ chỉnh hiện có";
$keyword_tracking = "ID theo dõi";
$keyword_build = "Để xây dựng liên kết của bạn, lấy URL dưới đây và gắn nó với ID theo dõi và từ khoá mà bạn muốn dùng.";
$keyword_example = "Ví dụ";
$keyword_tutorial = "Xem hướng dẫn";
$sub_tracking_title = "Theo dõi liên kết nhánh";
$sub_tracking_info = "Việc tạo một liên kết phụ giúp bạn có thể cho phép đối tác liên kết của bạn kết nối với các đối tác liên kết khác của bạn để họ có thể sử dụng. Bạn sẽ biết ai tạo ra tiền hoa hồng cho bạn vì chúng tôi sẽ báo cáo cho bạn về đối tác liên kết của bạn đã tạo ra doanh thu. Lý do khác để sử dụng một đường dẫn phụ là nếu bạn có một hệ thống theo dõi của riêng bạn thì bạn cũng muốn được báo cáo.";
$sub_tracking_build = "Thay thế XXX bằng số ID của đối tác liên kết trong chương trình liên kết của bạn. Lặp lại quá trình này đối với tất cả các đối tác liên kết của bạn.";
$sub_tracking_example = "Ví dụ";
$sub_tracking_tutorial = "Xem hướng dẫn";
$sub_tracking_id = "ID phụ";
$alternate_title = "Liên kết trang đến thay thế";
$alternate_option_1 = "Lựa chọn 1: Tự động tạo liên kết";
$alternate_heading_1 = "Tạo liên kết tự động";
$alternate_info_1 = "Xác định trang lưu lượng đến của bạn bằng cách nhập URL mà bạn muốn trao lưu lượng và chúng tôi sẽ tạo cho bạn một đường dẫn. Sử dụng tính năng này sẽ tạo ra một đường dẫn ngắn hơn để bạn sử dụng với URL chèn trong đường dẫn dùng một số ID trong cơ sở dữ liệu của chúng tôi.";
$alternate_button = "Tạo liên kết của tôi";
$alternate_links_heading = "Các liên kết URL đến khác của tôi";
$alternate_links_note = "Các liên kết hiện có sẽ duy trì nhịp độ và chức năng nếu bạn rời chuyển một đường dẫn tuỳ chỉnh ra khỏi trang này.";
$alternate_links_remove = "dời chuyển";
$alternate_option_2 = "Lựa chọn 2: Tạo liên kết thủ công";
$alternate_info_2 = "Nếu bạn thích gắn các liên kết của riêng bạn với một URL đến thay thế, hãy dùng cấu trúc sau.";
$alternate_variable = "Biến URL đến thay thế";
$alternate_example = "Ví dụ";
$alternate_build = "Để xây dựng liên kết của bạn, lấy URL dưới đây và gắn nó với URL đến thay thế mà bạn muốn dùng.";
$alternate_none = "Không có liên kết đến thay thế nào được tạo ra";
$alternate_tutorial = "Xem hướng dẫn";
$cr_title = "Báo cáo từ khoá tuỳ chỉnh";
$cr_select = "Chọn một từ khoá";
$cr_button = "Lập báo cáo";
$cr_no_results = "Không tìm được kết quả nghiên cứu nào";
$cr_no_results_info = "Thử một kết hợp từ khoá khác";
$cr_used = "Từ khoá đã dùng";
$cr_found = "Tìm thấy liên kết này";
$cr_times = "Giờ";
$cr_unique = "Các liên kết duy nhất tìm được";
$cr_detailed = "Báo cáo liên kết chi tiết";
$cr_export = "Báo cáo xuất ra Excel";
$cr_none = "Không tìm thấy từ khoá";
$logo_title = "Tải lên Logo Công ty bạn";
$logo_info = "Nếu bạn định tải lên Logo Công ty, chúng tôi sẽ hiển thị nó cho các khách hàng mà bản gửi tới website của chúng tôi. Điều này cho phép chúng tôi cá nhân hoá kinh nghiệm khách hàng của bạn khi họ xem chúng tôi.";
$logo_bullet_one = "Hình ảnh có thể ở dạng .jpg, .gif hoặc .png. Không được phép để nội dung flash.";
$logo_bullet_two = "Bất kỳ hình ảnh không phù hợp nào sẽ bị loại bỏ và tài khoản của bạn sẽ bị treo.";
$logo_bullet_three = "Hình ảnh/logo của bạn sẽ không được thể hiện trên website của chúng tôi cho tới khi được chúng tôi duyệt.";
$logo_bullet_size_one = "Hình ảnh áo thể có chiều rộng tối đa là";
$logo_bullet_size_two = "pixels và chiều cao tối đa là";
$logo_bullet_req_size_one = "Hình ảnh áo thể có chiều rộng là";
$logo_bullet_req_size_two = "pixels và chiều cao là";
$logo_bullet_pixels = "pixels.";
$logo_choose = "Chọn một hình ảnh";
$logo_file = "Chọn một file:";
$logo_browse = "Duyệt...";
$logo_button = "Tải lên";
$logo_current = "Hình ảnh hiện tại của tôi";
$logo_remove = "dời di";
$logo_display_status = "Tình trạng ảnh:";
$logo_pending = "Chờ duyệt";
$logo_approved = "Đã duyệt";
$logo_success = "Hình ảnh đã được tải lên thành công và đang chờ duyệt.";
$signup_security_title = "Thẩm định tài khoản";
$signup_security_info = "Nhập mã an ninh trong hộp. Bước này giúp chúng tôi ngăn chặn các đăng nhập tự động.";
$signup_security_code = "Mã an ninh";
$sub_tracking_none = "Không";
$missing_security_code = "Thẩm định tài khoản sai hoặc đã mất / Mã an ninh";
$alternate_success_title = "Tạo liên kết thành công";
$alternate_success_info = "Lấy đường dẫn của bạn dưới đây và bắt đầu truyền lưu lượng vào URL xác định của bạn.";
$alternate_failed_title = "Lỗi tạo liên kết";
$alternate_failed_info = "Nhập URL hợp lệ.";
$logo_missing_filename = "Chọn một tên file.";
$logo_required_width = "Chiều rộng hình ảnh phải là";
$logo_required_height = "Chiều cao hình ảnh phải là";
$logo_maximum_width = "Chiều rộng hình ảnh chỉ có thể là";
$logo_maximum_height = "Chiều caohình ảnh chỉ có thể là";
$logo_size_maximum = "Kích thước hình ảnh chỉ có thể ttối đa là";
$logo_bad_filetype = "Dạng hình ảnh không được phép. Đạng hình ảnh được phép là .gif, .jpg and .png.";
$logo_upload_error = "Lỗi tải ảnh lên, liên hệ với người quản lý liên kết.";
$logo_error_title = "Lỗi tải ảnh lên";
$logo_error_bytes = "bytes.";
$excel_title = "Báo cáo liên kết chính tuỳ chỉnh";
$excel_tab_report = "Báo cáo từ khoá tuỳ chỉnh";
$excel_tab_logs = "Nhật ký lưu lượng";
$excel_date = "Ngày báo cáo:";
$excel_affiliate = "ID đối tác liên kết:";
$excel_criteria = "Chỉ tiêu liên kết chính";
$excel_link = "Kết cấu liên kết";
$excel_hits = "Truy cập duy nhất";
$excel_comm_stats = "Thống kê tiền hoa hồng";
$excel_comm_current = "Tiền hoa hồng hiện tại";
$excel_comm_paid = "Tiền hoa hồng đã trả";
$excel_comm_total = "Tổng số tiền hoa hồng";
$excel_comm_ratio = "Tỷ lệ chuyển đổi";
$excel_earned = "Tiền hoa hồng kiếm được";
$excel_earned_current = "Tiền hoa hồng hiện tại";
$excel_earned_paid = "Tiền hoa hồng đã trả";
$excel_earned_total = "Tổng số tiền hoa hồng";
$excel_earned_tab = "Nhấp chuột Nhật ký lưu lượng (bên dưới) để xem nhật ký lưu lượng đối với đường dẫn tuỳ chỉnh này.";
$excel_log_title = "Nhật ký lưu lượng từ khoá tuỳ chỉnh";
$excel_log_ip = "Địa chỉ IP";
$excel_log_refer = "URL tham khảo";
$excel_log_date = "Ngày";
$excel_log_time = "Giờ";
$excel_log_target = "URL mục tiêu";
$etemplates_title = "Mẫu email";
$etemplates_view_link = "Xem mẫu email này";
$etemplates_name = "Tên mẫu";
$signup_maintenance_heading = "Thông báo bảo trì";
$signup_maintenance_info = "Đăng ký đang tạm thời không hoạt động. Thử lại sau.";
$marketing_group_title = "Nhóm tiếp thị";
$marketing_button = "Hiển thị";
$marketing_no_group = "Không chọn nhóm nào";
$marketing_choose = "Hãy chọn một nhóm tiếp thị ở trên";
$marketing_notice = "Các nhóm tiếp thị có thể có các trang lưư lượng đến khác nhau";
$canspam_heading = "Các nguyên tắc CÓ-THỂ-SPAM và chấp nhận";
$canspam_accept = "Tôi đã đọc, hiểu và đồng ý với các nguyên tắc CÓ-THỂ-SPAM ở trên.";
$canspam_error = "Bạn không chấp nhận các nguyên tắc CÓ-THỂ-SPAM của chúng tôi.";
$signup_banned = "Xuất hiện lỗi khi tạo tài khoản. Liên hệ với quản trị hệ thống để có thêm thông tin.";
$header_testimonials = "Chứng thực đối tác liên kết";
$testi_visit = "Thăm Website";
$testi_description = "Xin cấp chứng nhận của bạn cho chương trình liên kết của chúng tôi và chúng tôi sẽ đặt nó ở trang &lt;a href=&quot;testimonials.php&quot;&gt;lời chừng thực&lt;/a&gt; kèm theo một đường dẫn tới website của bạn.";
$testi_name = "Tên";
$testi_url = "Website URL";
$testi_content = "Chứng thực";
$testi_code = "Mã an ninh";
$testi_submit = "Gửi chứng thực";
$testi_na = "Không có chứng thực.";
$testi_title = "Xin cấp chứng thực";
$testi_success_title = "Có chứng thực";
$testi_success_message = "Cảm ơn bạn đã gửi chứng thực. Đội của chúng tôi sẽ xem xét một chút.";
$testi_error_title = "Lỗi chứng thực";
$testi_error_name_missing = "Hãy kèm tên bạn cho chứng thực của bạn.";
$testi_error_url_missing = "Hãy kèm website URL cho chứng thực của bạn.";
$testi_error_missing = "Hãy kèm văn bản cho chứng thực của bạn.";
$menu_drop_delayed = "Tiền hoa hồng chậm trả";
$details_drop_6 = "Tiền hoa hồng chậm trả hiện tại";
$details_type_6 = "Chậm - Sẽ duyệt sớm";
$comdetails_status_6 = "Chậm - Sẽ duyệt sớm";
$tc_reaccept_title = "Thông báo thay đổi các điều khoản và điều kiện";
$tc_reaccept_sub_title = "Bạn phải đồng ý với các điều khoản và điều kiện mới của chúng tôi để có thể truy cập vào tài khoản của bạn.";
$tc_reaccept_button = "Tôi đã đọc, hiểu và đồng ý với các điều khoản và điều kiện trên.";
$tlinks_active = "Số lượng cấp hoạt động";
$tlinks_payout_structure = "Cấu trúc chi trả đa cấp";
$tlinks_level = "Mức";
$tierText1 = "% tính từ số tiền hoa hồng của đối tác liên kết tham khảo.";
$tierText2 = "% tính từ số tiền hoa hồng của cấp cao hơn.";
$tierText3 = "% tính từ số tiền bán hàng.";
$tierTextflat = "giá thấp nhất.";
$edit_custom_button = "Sửa câu trả lời";
$private_heading = "Đăng ký cá nhân";
$private_info = "Chương trình liên kết của chúng tôi không công khai và cần một mã đăng nhập để tham gia. Thông tin về cách thức để có mã đăng nhập có ở đây.";
$private_required_heading = "Yêu cầu mã đăng nhập";
$private_code_title = "Nhập mã đăng nhập";
$private_button = "Trình mã";
$private_error_title = "Mã đăng ký đã nhập không hợp lệ";
$private_error_invalid = "Mã đăng ký đã nhập không hợp lệ.";
$private_error_expired = "Mã đăng ký đã nhập đã hết hạn và không còn hợp lệ.";
$qr_code_title = "Mã QR";
$qr_code_size = "Kích thước mã QR";
$qr_code_button = "Hiển thị mã QR";
$qr_code_offline_title = "Tiếp thị ngoại tuyến";
$qr_code_offline_content1 = "Bổ sung mã QR này vào sách tiếp thị, tờ rơi, danh thiếp kinh doanh... của bạn.";
$qr_code_offline_content2 = "- Nhấp chuột phải vào hình ảnh &lt;strong&gt;save-as&lt;/strong&gt; trên máy tính của bạn.";
$qr_code_online_title = "Tiếp thị trực tuyến";
$qr_code_online_content = "Bổ sung mã QR này vào website, phương tiện truyền thông xã hội, nhật ký... của bạn.";
$menu_coupon = "Mã Phiếu giảm giá";
$coupon_title = "Mã Phiếu giảm giá bạn có";
$coupon_desc = "Đưa mã Phiếu giảm giá và kiếm tiền hoa hồng mỗi khi có ai đó dùng mã của bạn!";
$coupon_head_1 = "Mã Phiếu giảm giá";
$coupon_head_2 = "Chiết khấu cho khách hàng";
$coupon_head_3 = "Số tiền hoa hồng của bạn";
$coupon_sale_amt = "trong số tiền bán hàng";
$coupon_flat_rate = "giá thấp nhất";
$coupon_default = "Mức trả tiền mặc định";
$cc_vanity_title = "Yêu cầu một mã Phiếu giảm giá được cá nhân hoá";
$cc_vanity_field = "Mã Phiếu giảm giá";
$cc_vanity_button = "Yêu cầu mã Phiếu giảm giá";
$cc_vanity_error_missing = "<strong>Lỗi!</strong> Nhập mã Phiếu giảm giá.";
$cc_vanity_error_exists = "<strong>Lỗi!</strong> Bạn đã được yêu cầu mã này. Đang chờ duyệt.";
$cc_vanity_error = "<strong>Lỗi!</strong> Mã Phiếu giảm giá không hợp lệ. Chỉ dùng chữ cái, số và gạch dưới.";
$cc_vanity_success = "<strong>Thành công!</strong> Yêu cầu mã Phiếu giảm giá đã cá nhân hoá của bạn.";
$coupon_none = "Hiện không có mã Phiếu giảm giá nào.";
$pic_error_title = "Lỗi tải lên hình ảnh";
$pic_missing = "Chọn một tên file.";
$pic_invalid = "Dạng hình ảnh không được phép. Dạng hình ảnh được phép là .gif, .jpg and .png.";
$pic_error = "Lỗi tải ảnh lên, liên hệ với người quản lý liên kết.";
$pic_success = "Hình của bạn đã tải lên thành công.";
$pic_title = "Tải hình của bạn";
$pic_info = "Việc tải lên hình của bạn giúp cá nhân hoá kinh nghiệm của chúng tôi với bạn.";
$pic_bullet_1 = "Các hình ảnh có thẻ dở dạng .jpg, .gif or .png.";
$pic_bullet_2 = "Bất kỳ hình ảnh nào không phù hợp sẽ bị gỡ bỏ và tài khoản của bạn sẽ bị treo.";
$pic_bullet_3 = "Ảnh của bạn sẽ không công khai. Chỉ gắn nó vào tài khoản của bạn để chúng tôi có thể nhìn thấy.";
$pic_file = "Chọn một File:";
$pic_button = "Tải lên";
$pic_current = "Hình hiện tại của tôi";
$pic_remove = "Xóa hình";
$progress_title = "Đủ tư cách cho lần chi trả tiếp theo:";
$progress_complete = "hoàn tất.";
$progress_none = "Chúng tôi không có đòi hỏi mức chi trả tối thiểu.";
$progress_sentence_1 = "Bạn đã kiếm được";
$progress_sentence_2 = "theo";
$progress_sentence_3 = "yêu cầu.";
$aff_lib_button = "<b>Lấy quyền truy cập miễn phí của bạn!</b><BR />www.AffiliateLibrary.com";
$menu_announcements = "Các chiến dịch truyền thông mang tính xã hội";
$announcements_name = "Tên chiến dịch";
$announcements_facebook_message = "Thông điệp trên Facebook";
$announcements_twitter_message = "Thông điệp trên Twitter";
$announcements_facebook_link = "Đường dẫn trên Facebook";
$announcements_facebook_picture = "Hình ảnh trên Facebook";
$general_last_30_days_activity = "Hoạt động 30 ngày qua";
$general_last_30_days_activity_traffic = "Lưu lượng";
$general_last_30_days_activity_commissions = "Tiền hoa hồng";
$accountability_title = "Giải thích và truyền thông";
$accountability_text = "<strong>Đây là gì?</strong><p>Chúng tôi thực hiện một nghiên cứu tiên phong để tạo niềm tin với các đối tác liên kết của mình. Đó là mục đích của chúng tôi nhằm đảm bảo cung cấp càng nhiều thông tin càng tốt về mỗi khoản tiền hoa hồng kiếm được và /hoặc sụt giảm trong hệ thống của chúng tôi.</p><strong>Truyền thông</strong><p>Chúng tôi cung cấp các chi tiết về bất kỳ khoản tiền hoa hồng sụt giảm nào. Chúng tôiểtuyền thông mạnh mẽ tới các đối tác liên kết của chúng tôi và khuyến khích câu hỏi và phản hồi.</p>";
$debit_reason_0 = "không";
$debit_reason_1 = "Hoàn trả";
$debit_reason_2 = "Hoàn phí";
$debit_reason_3 = "Báo cáo gian lận";
$debit_reason_4 = "Huỷ lệnh";
$debit_reason_5 = "Hoàn trả một phần";
$menu_drop_pending_debits = "Nợ chưa trả";
$debit_amount_label = "Số tiền nợ";
$debit_date_label = "Ngày nợ";
$debit_reason_label = "Lý do nợ";
$debit_paragraph = "Các khoản nợ sẽ được trừ vào phần chi trả tiếp theo của bạn.";
$debit_invoice_amount = "Số tiền nợ âm";
$debit_revised_amount = "Số tiền thanh toán điều chỉnh";
$mv_head_description = "Lưu ý: Bạn chỉ có thể đặt một video mỗi trang trên website của bạn.";
$mv_head_source_code = "Dán mã này vào phần ĐẦU tài liệu HTML của bạn.";
$mv_body_title = "Tựa đề Video";
$mv_body_description = "Mô tả";
$mv_body_source_code = "Dán mã này vào phần BODY tài liệu HTML của bạn ở vị trí bạn muốn video xuất hiện.";
$menu_marketing_videos = "Video";
$mv_preview_button = "Xem trước Video";
$dt_no_data = "Không có số liệu trên bảng.";
$dt_showing_exists = "Đang hiện mục nhập _START_ đến _END_ trên _TOTAL_.";
$dt_showing_none = "Đang hiện 0 đến 0 của 0 mục nhập.";
$dt_filtered = "(lọc từ tổng số _MAX_ các mục nhập)";
$dt_length_choice = "Thể hiện _MENU_ mục nhập.";
$dt_loading = "Đang tải...";
$dt_processing = "Đang xử lý...";
$dt_no_records = "Không tìm thấy hồ sơ phù hợp.";
$dt_first = "Đầu tiên";
$dt_last = "Cuối cùng";
$dt_next = "Tiếp theo";
$dt_previous = "Trước";
$dt_sort_asc = ": kích hoạt sắp xếp cột giảm dần";
$dt_sort_desc = ": kích hoạt sắp xếp cột tăng dần";
$choose_marketing_group = "Chọn một nhóm tiếp thị";
$email_already_used_1 = "Không thể tạo tài khoản. Chúng tôi chỉ cho phép";
$email_already_used_2 = "tài khoản";
$email_already_used_3 = "được tạo theo mỗi địa chỉ email.";
$missing_fax = "Hãy nhập số fax của bạn.";
$chart_last_6_months = "Tiền hoa hồng đã trả 6 tháng qua";
$chart_last_6_months_paid = "Tiền hoa hồng đã trả";
$chart_this_month = "5 đối tác tác liên kết hàng đầu của chúng tôi tháng này";
$chart_this_month_none = "Không có dữ liệu hiển thị.";
$login_return = "Trở về Trang Liên Kết Chính";
$login_lost_details = "Nhập tên người dùng của bạn và chúng tôi sẽ gửi bạn một email với thông tin đăng nhập của bạn.";
$account_edit_general_prefs = "Ưu tiên chung";
$account_edit_email_language = "Ngôn ngữ email";
$footer_connect = "Liên hệ với chúng tôi";
$modal_close = "Đóng";
$vat_amount_heading = "Tiền thuế VAT";
$menu_logout = "Đăng xuất";
$menu_upload_picture = "Tải hình của bạn lên";
$menu_offer_testi = "Để lại lời nhận xét chứng thực";
$fb_login = "Đăng nhập với Facebook";
$fb_permissions = "Không được cho phép. Hãy cho phép website sử dụng địa chỉa email của bạn.";
$announcements_published = "Thông Báo Đã Được Xuất Bản";
$training_videos_title = "Video Huấn Luyện";
$training_videos_general = "Marketing Thông Thường";
$commission_method = "Phương Thức Chi Trả Tiền Hoa Hồng";
$how_will_you_earn = "Bạn sẽ kiếm tiền hoa hồng như thế nào?";
$pm_account_credit = "Chúng tôi sẽ ghi tiền vào tài khoản của bạn theo số tiền hoa hồng bạn đã kiếm được.";
$pm_check_money_order = "Chúng tôi sẽ gửi bạn một lệnh ngân phiếu/tiền trong thư.";
$pm_paypal = "Chúng tôi sẽ gửi cho bạn một thanh toán Paypal.";
$pm_stripe = "Chúng tôi sẽ gửi cho bạn một thanh toán Stripe.";
$pm_wire = "Chúng tôi sẽ gửi bạn một chuyển khoản ngân hàng (wire transfer)).";
$add_to_signup_left_column_text = "<span style=\"color:#CC0000; font-style:italic;\">* trường bắt buộc.</span>";
$paypal_email = "Paypal Email";
$stripe_acct_details = "Thông Tin Chi Tiết Tài Khoản Stripe";
$stripe_connect = "Bạn có thể kết nối đến tài khoản stripe của bạn từ trang thiết lập tài khoản sau khi đăng ký.";
$stripe_success = "Kết Nối Tài Khoản Stripe Thành Công";
$stripe_settings = "Thiết Lập Stripe";
$stripe_connect_edit = "Kết nối với Stripe";
$stripe_delete = "Xóa Tài Khoản Stripe";
$stripe_confirm = "Bạn có chắc muốn xóa tài khoản này?";
$payment_settings = "Cài Đặt Thanh Toán";
$edit_payment_settings = "Sửa Cài Đặt Thanh Toán";
$invalid_paypal_address = "Địa chỉ email Paypal không hợp lệ.";
$payment_method_error = "Xin chọn một phương thức thanh toán.";
$payment_settings_updated = "Đã cập nhật cài đặt thanh toán.";
$stripe_removed = "Đã xóa tài khoản Stripe.";
$payment_settings_success = "Thành công!";
$payment_update_notice_1 = "Chú ý!";
$payment_update_notice_2 = "Bạn đã chọn nhận một thanh toán <strong>[payment_option_here]</strong> từ chúng tôi. Xin <a href=\"account.php?page=48\" style=\"font-weight:bold;\">click vào đây</a>để kết nối đến tài khoản <strong>[payment_option_here]</strong> của bạn.";
$pm_title_credit = "Tín Dụng Tài Khoản";
$pm_title_mo = "Lệnh Ngân Phiếu/Tiền";
$pm_title_paypal = "PayPal";
$pm_title_stripe = "Stripe";
$pm_title_wire = "Chuyển Khoản Ngân Hàng";
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