<?PHP

//-------------------------------------------------------
	  $language_pack_name = "thai";
	  $language_pack_table_name = "thai";
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
$header_indexLink = "หน้าหลัก Affiliate";
$header_signupLink = "สมัครใช้งานเลย";
$header_accountLink = "จัดการบัญชี";
$header_emailLink = "ติดต่อเรา";
$header_greeting = "ยินดีต้อนรับ";
$header_nonLogged = "ผู้มาเยือน";
$header_logout = "ลงชื่อออกตรงนี้";
$footer_tag = "Affiliate Software By iDevAffiliate";
$footer_copyright = "Copyright"; // or ลิขสิทธิ์ but we normally use English version
$footer_rights = "All Rights Reserved"; // or สงวนลิขสิทธิ์ but we normally use English version
$index_heading_1 = "ยินดีต้อนรับเข้าสู่ Affiliate Program ของพวกเรา!";
$index_paragraph_1 = "คุณสามารถเข้าร่วมโปรแกรมของพวกเราโดยไม่ต้องเสียค่าใช้จ่ายใดๆ และยังสามารถลงทะเบียนได้อย่างง่ายๆแถมยังไม่จำเป็นต้องมีความรู้ทางเทคนิคใดๆอีกด้วย   Affiliate programs นั้นมีอยู่ทุกหนแห่งบนโลกอินเตอร์เนตและมันเป็นอีกหนทางหนึ่งในการหากำไรบนเว็บไซต์  Affiliate นั้นช่วยเพิ่มจำนวนคนเข้าชมและเพิ่มยอดขายให้กับเว็บไซต์เชิงพาณิชย์ และคุณจะได้รับค่าคอมมิชชั่นเป็นการตอบแทน";
$index_heading_2 = "มันทำงานอย่างไร?";
$index_paragraph_2 = "เมื่อคุณเข้าร่วม Affiliate Program ของเรา  คุณจะได้รับลิ้งค์มากมายทั้งแบบที่เป็นแบนเนอร์หรือตัวหนังสือ คุณสามารถนำลิงคฺ์เหล่านี้ไปวางบนเว็บไซต์ของคุณ  เมื่อผู้ใช้งานคลิ้กลิ้งค์ใดลิ้งค์หนึ่งของคุณ เขาก็จะถูกนำมายังเว็บไซต์ของเราและความเคลื่อนไหวของเขาก็จะถูกติดตามด้วยซอฟต์แวร์ Affiliate ของเรา และคุณจะได้รับค่าคอมมิชชั่นซึ่งขึ้นอยู่กับประเภทคอมมิชชั่นของคุณเป็นการตอบแทน";
$index_heading_3 = "สถิติและรายงานแบบเรียลไทม์!";
$index_paragraph_3 = "ล็อคอินตลอด 24 ชั่วโมงเพื่อเช็คยอดขาย จำนวนผู้เข้าชม และยอดเงินในบัญชีของคุณ  รวมทั้งดูว่าแบนเนอร์ของคุณนั้นทำงานดีแค่ไหน";
$index_login_title = "เข้าสู่ระบบ Affiliate";
$index_login_username = "ชื่อผู้ใช้";
$index_login_password = "รหัสผ่าน";
$index_login_username_field = "ชื่อเข้าใช้งาน";
$index_login_password_field = "รหัสผ่าน";
$index_login_button = "เข้าใช้งาน";
$index_login_signup_link = "คลิ้กตรงนี้เพื่อลงทะเบียน";
$index_table_title = "ข้อมูลโปรแกรม";
$index_table_commission_type = "ประเภทคอมมิชชั่น";
$index_table_initial_deposit = "มัดจำเริ่มต้น";
$index_table_requirements = "เงื่อนไขการจ่ายเงิน";
$index_table_duration = "ระยะเวลาการจ่ายเงิน";
$index_table_choose = "กรุณาเลือกประเภทการจ่ายเงิน!";
$index_table_sale = "Pay-Per-Sale";
$index_table_click = "Pay-Per-Click";
$index_table_sale_text = "ตามจำนวนการซื้อขายที่มาจากเว็บไซต์ของคุณ";
$index_table_click_text = "ตามจำนวนการคลิ้กที่มาจากเว็บไซต์ของคุณ";
$index_table_deposit_tag = "สำหรับการลงทะเบียน!";
$index_table_requirements_tag = "การจ่ายเงินจะทำได้ก็ต่อเมื่อมียอดเงินรวมขั้นต่ำ";
$index_table_duration_tag = "จ่ายเงินแบบรายเดือน สำหรับเดือนก่อน";
$signup_left_column_text = "เข้าร่วม Affiliate Program กับเราและเริ่มรับเงินกับทุกๆการขายที่คุณส่งมาให้เรา  ง่ายๆเพียงแค่สร้างบัญชี นำโค้ดลิ้งค์ไปใส่ในเว็บไซต์ของคุณ และก็เริ่มดูตัวเลขในบัญชีของคุณพุ่งขึ้นได้เลยเมื่อผู้เยี่ยมชมของคุณกลายเป็นลูกค้าของเรา";
$signup_left_column_title = "ยินดีต้อนรับ Affiliate!";
$signup_login_title = "สร้างบัญชี";
$signup_login_username = "ชื่อผู้ใช้";
$signup_login_password = "รหัสผ่าน";
$signup_login_password_again = "รหัสผ่านอีกครั้ง";
$signup_login_minmax_chars = "- ชื่อผู้ใช้ต้องมีความยาวอย่างน้อย user_min_chars ตัวอักษร &lt;br /&gt;- ชื่อผู้ใช้อาจเป็นได้ทั้งตัวอักษรและตัวเลข &lt;br /&gt;- ชื่อผู้ใช้สามารถประกอบด้วยอักขระเหล่านี้ได้: _ (เส้นใต้อักขระเท่านั้น) &lt;br /&gt;&lt;br /&gt;-  รหัสผ่านต้องมีความยาวอย่างน้อย pass_min_chars ตัวอักษร &lt;br /&gt;- รหัสผ่านสามารถเป็นได้ทั้งตัวอักษรและตัวเลขและอักขระเหล่านี้:  characters_allowed";
$signup_login_must_match = "รายการนี้ต้องตรงกับรายการรหัสผ่าน";
$signup_standard_title = "ข้อมูลพื้นฐาน";
$signup_standard_email = "ที่อยู่อีเมล";
$signup_standard_company = "ชื่อบริษัท";
$signup_standard_checkspayable = "สั่งจ่ายเช็คให้";
$signup_standard_weburl = "ที่อยู่เว็บไซต์";
$signup_standard_taxinfo = "Tax ID, SSN หรือ VAT";
$signup_personal_title = "ข้อมูลส่วนบุคคล";
$signup_personal_fname = "ชื่อจริง";
$signup_personal_state = "เมืองหรือจังหวัด";
$signup_personal_lname = "นามสกุล";
$signup_personal_phone = "เบอร์โทรศัทพ์";
$signup_personal_addr1 = "บ้านเลขที่และชื่อถนน";
$signup_personal_fax = "เบอร์แฟกซ์";
$signup_personal_addr2 = "ตำบล อำเภอ หรือข้อมูลที่อยู่เพิ่มเติม";
$signup_personal_zip = "รหัสไปรษณีย์";
$signup_personal_city = "จังหวัด";
$signup_personal_country = "ประเทศ";
$signup_commission_title = "การจ่ายค่าคอมมิชชั่น";
$signup_commission_howtopay = "เราควรจะจ่ายคุณอย่างไรดี?";
$signup_commission_style_PPS = "Pay-Per-Sale";
$signup_commission_style_PPC = "Pay-Per-Click";
$signup_terms_title = "ข้อตกลงและเงื่อนไข";
$signup_terms_agree = "ฉันได้อ่าน ทำความเข้าใจ และยอมรับข้อตกลงและเงื่อนไขข้างบนแล้ว";
$signup_page_button = "สร้างบัญชีของฉัน";
$signup_success_email_comment = "เราได้ส่งชื่อผู้ใช้และรหัสผ่านไปยังอีเมลของคุณแล้ว<BR />\r\nคุณควรเก็บหรือจดมันไว้ในที่ที่ปลอดภัยเพื่อการใช้งานในอนาคต";
$signup_success_login_link = "ลงชื่อเข้าสู่บัญชีของคุณ";
$custom_fields_title = "ช่องที่ผู้ใช้กำหนด";
$logout_msg = "<b>คุณได้ออกจากระบบแล้ว</b><BR />ขอขอบพระคุณที่เข้าร่วม Affiliate Program กับพวกเรา";
$signup_page_success = "บัญชีของคุณได้ถูกสร้างขึ้นแล้ว";
$login_left_column_title = "เข้าสู่บัญชี";
$login_left_column_text = "กรอกชื่อผู้ใช้และรหัสผ่านเพื่อเข้าใช้งานสถิติบัญชี แบนเนอร์ต่างๆ โค้ดลิ้งค์ คำถามที่พบบ่อย และอื่นๆอีกมากมาย<BR/ ><BR/ >ถ้าคุณไม่สามารถจำรหัสผ่านของคุณได้ เพียงแค่กรอกชื่อผู้ใช้ของคุณและเราจะส่งข้อมูลการเข้าสู่ระบบให้คุณทางอีเมล<BR /><BR />";
$login_title = "ลงชื่อเข้าใช้สู่บัญชีของคุณ";
$login_username = "ชื่อผู้ใช้";
$login_password = "รหัสผ่าน";
$login_invalid = "ข้อมูลไม่ถูกต้อง";
$login_now = "ลงชื่อเข้าใช้สู่บัญชีของฉัน";
$login_send_title = "ต้องการรหัสผ่านไหม?";
$login_send_username = "ชื่อผู้ใช้";
$login_send_info = "ข้อมูลการเข้าสู่ระบบได้ถูกส่งไปยังอีเมลของคุณแล้ว";
$login_send_pass = "ส่งไปยังอีเมล";
$login_send_bad = "ไม่พบชื่อผู้ใช้ชื่อนี้";
$help_new_password_heading = "รหัสผ่านใหม่";
$help_new_password_info = "รหัสผ่านต้องมีความยาวอย่างน้อย pass_min_chars อักษร อาจจะต้องมีส่วนประกอบของตัวอักษร, ตัวเลขและอักขระดังต่อไปนี้:  characters_allowed";
$help_confirm_password_heading = "ยืนยันรหัสผ่านใหม่";
$help_confirm_password_info = "รหัสผ่านนี้ต้องตรงกับรหัสผ่านใหม่";
$help_custom_links_heading = "Tracking Keyword";
$help_custom_links_info = "Keywordไม่ควรมีความยาวเกิน 30 ตัวอักษร  Keywordสามารถประกอบได้ด้วยพยัญชนะ ตัวเลข และตัวเครื่องหมายลบเพียงเท่านั้น    ";
$error_title = "เราได้ตรวจจับการ Error ดังนี้";
$username_invalid = "ชื่อผู้ใช้ไม่ถูกต้อง อาจจะต้องมีส่วนประกอบของตัวอักษร, ตัวเลขและอักขระ";
$username_taken = "ชื่อผู้ใช้ที่คุณเลือกได้ถูกใช้ไปแล้ว";
$username_short = "ชื่อผู้ใช้ของคุณสั้นเกินไป มันต้องมีความยาวอย่างต่ำ user_min_chars ตัวอักษร";
$username_long = "ชื่อผู้ใช้ของคุณยาวเกินไป คุณสามารถตั้งชื่อได้ยาวที่สุดเพียง user_max_chars ตัวอักษร";
$password_invalid = "รหัสผ่านไม่ถูกต้อง อาจจะต้องมีส่วนประกอบของตัวอักษร, ตัวเลขและอักขระดังต่อไปนี้:  characters_allowed";
$password_short = "รหัสผ่านของคุณสั้นเกินไป มันต้องมีความยาวอย่างต่ำ pass_min_chars ตัวอักษร";
$password_long = "รหัสผ่านของคุณยาวเกินไป คุณสามารถตั้งรหัสได้ยาวที่สุดเพียง pass_max_chars ตัวอักษร";
$password_mismatch = "รหัสผ่านไม่ตรงกัน";
$missing_checks = "กรุณากรอกชื่อผู้รับจ่ายเพื่อที่จะสามารถทำการจ่ายเช็คให้ได้";
$missing_tax = "กรุณากรอกข้อมูล Tax ID, SSN หรือ VAT ของคุณ";
$missing_fname = "กรุณากรอกชื่อจริงของคุณ";
$missing_lname = "กรุณากรอกนามสกุลของคุณ";
$missing_email = "กรุณากรอกที่อยู่อีเมลของคุณ";
$invalid_email = "ที่อยู่อีเมลของคุณไม่ถูกต้อง";
$missing_address = "กรุณากรอกบ้านเลขที่และ/หรือชื่อถนน";
$missing_city = "กรุณากรอกชื่อจังหวัดของคุณ";
$missing_company = "กรุณากรอกชื่อบริษัทของคุณ";
$missing_state = "กรุณากรอกชื่อเมืองหรือจังหวัดของคุณ";
$missing_zip = "กรุณากรอกรหัสไปรษณีย์ของคุณ";
$missing_phone = "กรุณากรอกเบอร์โทรศัทพ์ของคุณ";
$missing_website = "กรุณากรอกที่อยู่เว็บไซต์ของคุณ";
$missing_paypal = "คุณได้เลือกที่จะรับเงินด้วย PayPal กรุณากรอกบัญชี PayPal ของคุณ";
$missing_terms = "คุณได้ยอมรับข้อตกลงและเงื่อนไขของเราแล้ว";
$paypal_required = "บัญชี PayPal เป็นสิ่งจำเป็น เพื่อที่เราจะสามารถทำการจ่ายเงินให้คุณได้";
$missing_custom = "กรุณากรอกข้อมูล:";
$account_total_transactions = "รายการทั้งหมด";
$account_standard_linking_code = "โค้ดลิงค์แบบพื้นฐาน มันเหมาะสำหรับการใช้ในอีเมลมากๆเลยนะ!";
$account_copy_paste = "คัดลอกและวางโค้ดข้างบนนี้บนเว็บไซต์หรืออีเมลของคุณ";
$account_not_approved = "ตอนนี้บัญชีของคุณกำลังอยู่ในสถานะรอการอนุมัติ";
$account_suspended = "ตอนนี้บัญชีของคุณกำลังถูกระงับ";
$account_standard_earnings = "รายได้พื้นฐาน";
$account_inc_bonus = "รวมโบนัส";
$account_second_tier = "รายได้ Tier";
$account_recurring = "รายได้ประจำ";
$account_not_available = "N/A";
$account_earned_todate = "รวมรายได้ถึงวันนี้";
$menu_heading_overview = "ภาพรวมของบัญชี";
$menu_general_stats = "สถิติทั่วไป";
$menu_tier_stats = "สถิติ Tier";
$menu_payment_history = "ประวัติการจ่ายเงิน";
$menu_commission_details = "ข้อมูลคอมมิชชั่น";
$menu_recurring_commissions = "คอมมิชชั่นประจำ";
$menu_traffic_log = "บันทึกจำนวนผู้เข้าชม";
$menu_heading_marketing = "อุปกรณ์การตลาด";
$menu_banners = "แบรเนอร์";
$menu_text_ads = "โฆษณาแบบเป็นตัวหนังสือ";
$menu_text_links = "ลิ้งค์แบบเป็นตัวหนังสือ";
$menu_email_links = "ลิ้งค์อีเมล";
$menu_html_links = "โฆษณาแบบ HTML";
$menu_offline = "การตลาดแบบออฟไลน์";
$menu_tier_linking_code = "โค้ดการลิงค์ Tier";
$menu_email_friends = "อีเมลเพื่อนๆและสมาคม";
$menu_custom_links = "สร้างและติดตามลิงค์ของคุณเอง";
$menu_heading_management = "การจัดการบัญชี";
$menu_comalert = "การติดตั้ง CommissionAlert";
$menu_comstats = "การติดตั้ง CommissionStats";
$menu_edit_account = "แก้ไขบัญชี";
$menu_change_pass = "เปลี่ยนรหัสผ่าน";
$menu_change_commission = "เปลี่ยนรูปแบบคอมมิชชั่นของฉัน";
$menu_heading_general_info = "ข้อมูลทั่วไป";
$menu_browse_affiliates = "ค้นหา Affiliates อื่นๆ";
$menu_faq = "คำถามที่พบบ่อย";
$suspended_title = "การแจ้งเตือนสถานะของบัญชี";
$suspended_heading = "ขณะนี้บัญชีของคุณได้ถูกระงับ";
$suspended_notes = "บันทึกจากผู้ดูแลระบบ";
$pending_title = "การแจ้งเตือนสถานะของบัญชี";
$pending_heading = "ขณะนี้บัญชีของคุณอยู่ในการรออนุมัติ";
$pending_note = "เมื่อเราทำการอนุมัติบัญชีของคุณแล้ว คุณจะสามารถเข้าถึงอุปกรณ์การตลาดต่างๆได้";
$faq_title = "คำถามที่พบบ่อย";
$faq_none = "ยังไม่มีคำถามที่พบบ่อย";
$browse_title = "ค้นหา Affiliates อื่นๆ";
$browse_none = "ยังไม่มี Affiliates ให้แสดง";
$change_comm_title = "เปลี่ยนรูปแบบคอมมิชชั่นของฉัน";
$change_comm_curr_comm = "รูปแบบคอมมิชชั่นของฉันตอนนี้";
$change_comm_curr_pay = "ระดับการจ่ายเงินขณะนี้";
$change_comm_new_comm = "รูปแบบคอมมิชชั่นใหม่";
$change_comm_warning = "ถ้าคุณเปลี่ยนรูปแบบคอมมิชชั่น บัญชีของคุณจะถูกรีเซ็ตใหม่เป็นระดับการจ่ายเงินระดับ 1";
$change_comm_button = "เปลี่ยนรูปแบบคอมมิชชั่น";
$change_comm_no_other = "ไม่มีรูปแบบคอมมิชชั่นอื่นๆแล้ว";
$change_comm_level = "ระดับ";
$change_comm_updated = "อัพเดทรูปแบบคอมมิชชั่นเรียบร้อยแล้ว";
$password_title = "เปลี่ยนรหัสผ่าน";
$password_old_password = "รหัสผ่านเก่า";
$password_new_password = "รหัสผ่านใหม่";;
$password_confirm_password = "ยืนยันรหัสผ่านใหม่";
$password_button = "เปลี่ยนรหัสผ่าน";
$password_warning_old_missing = "รหัสผ่านเก่าไม่ถูกต้องหรือไม่ถูกกรอก";
$password_warning_new_missing = "รหัสผ่านใหม่ไม่ถูกกรอก";
$password_warning_mismatch = "รหัสผ่านใหม่ไม่ตรงกัน";
$password_warning_invalid = "รหัสผ่านไม่ถูกต้อง คลิ้กลิ้งค์สำหรับความช่วยเหลือ";
$password_notice = "อัพเดทรหัสผ่านเรียบร้อยแล้ว";
$edit_failed = "ไม่สามารถทำการอัพเดทได้ ดูด้านบนสำหรับข้อผิดพลาด";
$edit_success = "อัพเดทบัญชีเรียบร้อยแล้ว";
$edit_button = "แก้ไขบัญชีของฉัน";
$commissionstats_title = "การติดตั้ง CommissionStats";
$commissionstats_info = "การติดตั้ง CommissionStats จะทำให้คุณเช็คสถิติของคุณได้แบบทันทีบนคอมพิวเตอร์ Windows ของคุณ! คุณสามารถใช้ฟีตเจอร์โดยการดาวน์โหลด CommissionStats ได้ที่ และ <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>แตกไฟล์</b></a> ลงบนฮาร์ดไดรฟ์ของคุณและรันมันด้วยไฟล์ <b>setup.exe</b> เมื่อคุณถูกถามถึงข้อมูลในการล็อคอิน ให้คุณใส่ข้อมูลดังต่อไปนี้";
$commissionstats_hint = "คำแนะนำ: คัดลอกและวางข้อมูลแต่ละตัวเพื่อป้องกันความผิดพลาด";
$commissionstats_profile = "ชื่อโปรไฟล์";
$commissionstats_username = "ชื่อผู้ใช้";
$commissionstats_password = "รหัสผ่าน";
$commissionstats_id = "Affiliate ID";
$commissionstats_source = "URL ที่มา";
$commissionstats_download = "ดาวน์โหลด CommissionStats";
$commissionalert_title = "การติดตั้ง CommissionAlert";
$commissionalert_info = "การติดตั้ง CommissionAlert จะทำให้คุณได้รับการแจ้งเตือนจากเราบนคอมพิวเตอร์ Windows ของคุณแบบทันทีเมื่อมีคอมมิชชั่นเข้ามา  คุณสามารถใช้ฟีตเจอร์โดยการดาวน์โหลด CommissionAlert ได้ที่ และ <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>แตกไฟล์</b></a> ลงบนฮาร์ดไดรฟ์ของคุณและรันมันด้วยไฟล์ <b>setup.exe</b> เมื่อคุณถูกถามถึงข้อมูลในการล็อคอิน ให้คุณใส่ข้อมูลดังต่อไปนี้";
$commissionalert_hint = "คำแนะนำ: คัดลอกและวางข้อมูลแต่ละตัวเพื่อป้องกันความผิดพลาด";
$commissionalert_profile = "ชื่อโปรไฟล์";
$commissionalert_username = "ชื่อผู้ใช้";
$commissionalert_password = "รหัสผ่าน";
$commissionalert_id = "Affiliate ID";
$commissionalert_source = "URL ที่มา";
$commissionalert_download = "ดาวน์โหลด CommissionAlert";
$offline_title = "การตลาดแบบออฟไลน์";
$offline_paragraph_one = "สร้างรายได้ด้วยการโปรโมตเว็บไซต์ของเรา (ออฟไลน์) กับเพื่อนๆและสมาคมของคุณ!";
$offline_send = "ส่งลูกค้าไปยัง";
$offline_page_link = "แสดงหน้า";
$offline_paragraph_two = "ลูกค้าของคุณจะกรอก<b>หมายเลข Affiliate ID</b> ของคุณลงในกล่องในหน้าข้างบนนี้  ซึ่งจะเป็นการลงชื่อคุณในการเป็น Affiliate สำหรับสินค้าหรือบริการทุกชิ้นที่เขาได้ซื้อหรือใช้บริการ";
$banners_title = "แบนเนอร์ต่างๆ";
$banners_size = "ขนาดของแบนเนอร์";
$banners_description = "คำอธิบายของแบนเนอร์";
$ad_title = "โฆษณาแบบเป็นตัวหนังสือ";
$ad_info = "คุณสามารถปรับสกีมสี ความสูง และความกว้างของโฆษณาของคุณได้ด้วยโค้ดลิงค์ที่เราให้ไป";
$links_title = "ชื่อลิ้งค์";
$email_title = "ลิ้งค์อีเมล";
$email_group = "กลุ่มการตลาด";
$email_button = "แสดงลิ้งค์อีเมล";
$email_no_group = "ไม่มีกลุ่มที่ถูกเลือก";
$email_choose = "กรุณาเลือกกลุ่มการตลาดข้างบนนี้";
$email_notice = "กลุ่มการตลาดต่างๆอาจจะมีจำนวนผู้เข้าชมหน้าเว็บเพจไม่เท่ากัน";
$email_ascii = "<b>เวอร์ชั่น ASCII/Text</b> - สำหรับการใช้งานในอีเมลรูปแบบตัวหนังสือล้วน";
$email_html = "<b>เวอร์ชั่น HTML</b> - สำหรับใช้ในอีเมลรูปแบบ HTML";
$email_test = "ทดสอบลิ้งค์";
$email_test_info = "นี่คือที่ที่ลูกค้าของคุณจะถูกส่งมายังเว็บไซต์ของเรา";
$email_source = "Source Code - คัดลอกและวางในข้อความของอีเมลของคุณ";
$html_title = "ชื่อโฆษณา HTML";
$html_view_link = "ดูโฆษณา HTML นี้";
$traffic_title = "บันทึกจำนวนผู้เข้าชม";
$traffic_display = "แสดงล่าสุด";
$traffic_display_visitors = "ผู้เข้าชม";
$traffic_button = "ดูบันทึกจำนวนผู้เข้าชม";
$traffic_title_details = "ข้อมูลจำนวนผู้เข้าชม";
$traffic_ip = "IP Address";
$traffic_refer = "URL อ้างอิง";
$traffic_date = "วัน";
$traffic_time = "เวลา";
$traffic_bottom_tag_one = "แสดงล่าสุด";
$traffic_bottom_tag_two = "ของ";
$traffic_bottom_tag_three = "จำนวนผู้เยี่ยมชมแบบไม่ซ้ำกันทั้งหมด";
$traffic_none = "ไม่มีบันทึกจำนวนผู้เข้าชม";
$traffic_no_url = "N/A - Bookmark หรือลิงค์ Email";
$traffic_box_title = "ใส่ URL อ้างอิง";
$traffic_box_info = "คลิ้กลิ้งค์เพื่อเข้าเว็บเพจ";
$payment_title = "ประวัติการจ่ายเงิน";
$payment_date = "วันที่จ่ายเงิน";
$payment_commissions = "คอมมิชชั่น";
$payment_amount = "จำนวนการจ่ายเงิน";
$payment_totals = "ทั้งหมด";
$payment_none = "ไม่มีประวัติการจ่ายเงิน";
$tier_stats_title = "สถิติ Tier";
$tier_stats_accounts = "บัญชี Tier ที่อยู่ภายใต้คุณโดยตรง";
$tier_stats_grab_link = "เอาโค้ดลิ้งค์ Tierของคุณไปได้เลย";
$tier_stats_none = "ไม่มีบัญชี Tier อยู่ในระบบ";
$tier_stats_username = "ชื่อผู้ใช้";
$tier_stats_current = "คอมมิชชั่นในขณะนี้";
$tier_stats_previous = "การจ่ายเงินก่อนหน้านี้";
$tier_stats_totals = "ทั้งหมด";
$recurring_title = "คอมมิชชั่นประจำ";
$recurring_none = "ไม่มีคอมมิชชั่นประจำในระบบ";
$recurring_date = "วันที่คอมมิชชั่น";
$recurring_status = "สถานะประจำ";
$recurring_payout = "การจ่ายรอบต่อไป";
$recurring_amount = "จำนวน";
$recurring_every = "ทุกๆ";
$recurring_in = "ใน";
$recurring_days = "วัน";
$recurring_total = "ทั้งหมด";
$tlinks_title = "เพิ่มคนอื่นๆเข้าสู่ Tier ของคุณ และเริ่มทำรายได้จากพวกเขาได้เลย!";
$tlinks_embedded_one = "เครดิตการสมัคร Tier ได้แอคทีฟแล้วในลิ้งค์ Affiliate พื้นฐานของคุณ!";
$tlinks_embedded_two = "การใช้ระบบอ้างอิง Tier ทำให้คุณสามารถเผยแพร่ Affiliate program ของเราสู่คนอื่นๆได้  คุณจะกลายมาเป็น Tier ระดับท้อปๆเมื่อมีคนมาเข้าร่วม Affiliate program ของเราผ่านลิ้งค์อ้างอิงพิเศษของคุณข้างล่างนี้  ข้อมูลต่างๆเกี่ยวกับจำนวนเงินที่คุณอาจได้รับสามารถหาอ่านได้ข้างล่างนี้";
$tlinks_embedded_current = "การจ่ายเงิน Tier ในขณะนี้";
$tlinks_forced_two = "การใช้ระบบอ้างอิง Tier ทำให้คุณสามารถเผยแพร่ Affiliate program ของเราสู่คนอื่นๆได้  คุณจะกลายมาเป็น Tier ระดับท้อปๆเมื่อมีคนมาเข้าร่วม Affiliate program ของเราผ่านลิ้งค์อ้างอิงพิเศษของคุณข้างล่างนี้  ข้อมูลต่างๆเกี่ยวกับจำนวนเงินที่คุณอาจได้รับสามารถหาอ่านได้ข้างล่างนี้";
$tlinks_forced_code = "ลิ้งค์อ้างอิง Tier";
$tlinks_forced_paste = "คัดลอกและวางโค้ดข้างบนนี้ลงบนเว็บไซต์ของคุณ";
$tlinks_forced_money = "เว็บมาสเตอร์สามารถทำรายได้ได้จากตรงนี้!";
$comdetails_title = "รายละเอียดเกี่ยวกับคอมมิชชั่น";
$comdetails_date = "วันที่คอมมิชชั่น";
$comdetails_time = "เวลาคอมมิชชั่น";
$comdetails_type = "ประเภทของคอมมิชชั่น";
$comdetails_status = "สถานะปัจจุบัน";
$comdetails_amount = "จำนวนเงินค่าคอมมิชชั่น";
$comdetails_additional_title = "รายละเอียดเพิ่มเติมเกี่ยวกับคอมมิชชั่น";
$comdetails_additional_ordnum = "หมายเลขการสั่งซื้อ";
$comdetails_additional_saleamt = "จำนวนการขาย";
$comdetails_type_1 = "โบนัสคอมมิชชั่น";
$comdetails_type_2 = "คอมมิชชั่นแบบประจำ";
$comdetails_type_3 = "คอมมิชชั่นแบบ Tier";
$comdetails_type_4 = "คอมมิชชั่นแบบพื้นฐาน";
$comdetails_status_1 = "จ่ายแล้ว";
$comdetails_status_2 = "ได้รับการอนุมัติแล้ว - กำลังรอการชำระเงิน";
$comdetails_status_3 = "กำลังรอการอนุมัติ";
$comdetails_not_available = "N/A";
$details_title = "รายละเอียดเกี่ยวกับคอมมิชชั่น";
$details_drop_1 = "คอมมิชชั่นแบบพื้นฐานในขณะนี้";
$details_drop_2 = "คอมมิชชั่นแบบ Tier ในขณะนี้";
$details_drop_3 = "กำลังรอการอนุมัติคอมมิชชั่น";
$details_drop_4 = "จ่ายคอมมิชชั่นแบบพื้นฐานแล้ว";
$details_drop_5 = "จ่ายคอมมิชชั่นแบบ Tier แล้ว";
$details_button = "ดูคอมมิชชั่นต่างๆ";
$details_date = "วันที่";
$details_status = "สถานะ";
$details_commission = "คอมมิชชั่น";
$details_details = "ดูรายละเอียด";
$details_type_1 = "จ่ายแล้ว";
$details_type_2 = "กำลังรอการอนุมัติ";
$details_type_3 = "ได้รับการอนุมัติแล้ว - กำลังรอการชำระเงิน";
$details_none = "ไม่มีคอมมิชชั่นสำหรับแสดง";
$details_no_group = "ไม่มีการเลือกกลุ่มคอมมิชชั่น";
$details_choose = "กรุณาเลือกกลุ่มคอมมิชชั่นกลุ่มหนึ่งจากข้างบนนี้";
$general_title = "ค่าคอมมิชชั่นในขณะนี้ - นับตั้งแต่การจ่ายเงินรอบสุดท้ายจนถึงปัจจุบัน";
$general_transactions = "รายการ";
$general_earnings_to_date = "รายได้ทั้งหมดจนถึงปัจจุบัน";
$general_history_link = "ดูประวัติการจ่ายเงิน";
$general_standard_earnings = "รายได้แบบพื้นฐาน";
$general_current_earnings = "รายได้ปัจจุบัน";
$general_traffic_title = "สถิติผู้เข้าชม";
$general_traffic_visitors = "ผู้เข้าชม";
$general_traffic_unique = "ผู้เข้าชมแบบ unique";
$general_traffic_sales = "การขายที่ถูกอนุมัติแล้ว";
$general_traffic_ratio = "สัดส่วนการขาย";
$general_traffic_info = "สถิตินี้ไม่รวมค่าคอมมิชชั่นแบบประจำหรือแบบ Tier";
$general_traffic_pay_type = "ประเภทการจ่ายเงิน";
$general_traffic_pay_level = "ระดับการจ่ายเงินในขณะนี้";
$general_notes_title = "บันทึกจากผู้ดูแลระบบ";
$general_notes_date = "วันที่ที่สร้าง";
$general_notes_to = "ถึง";
$general_notes_all = "Affiliates ทั้งหมด";
$general_notes_none = "ไม่มีบันทึกให้แสดง";
$contact_left_column_title = "ติดต่อเรา";
$contact_left_column_text = "คุณสามารถติดต่อผู้จัดการ Affiliates ของเราได้โดยใช้แบบฟอร์มทางด้านขวามือนี้";
$contact_title = "ติดต่อเรา";
$contact_name = "ชื่อของคุณ";
$contact_email = "ที่อยู่อีเมลของคุณ";
$contact_message = "ข้อความ";
$contact_chars = "ตัวอักษรคงเหลือ";
$contact_button = "ส่งข้อความ";
$contact_received = "เราได้รับข้อความของคุณแล้ว กรุณาให้เวลาเรา 24 ชั่วโมงในการตอบกลับนะคะ";
$contact_invalid_name = "ชื่อไม่ถูกต้อง";
$contact_invalid_email = "ที่อยู่อีเมลไม่ถูกต้อง";
$contact_invalid_message = "ข้อความไม่ถูกต้อง";
$invoice_button = "ใบแจ้งหนี้";
$invoice_header = "ใบแจ้งหนี้การจ่ายเงิน AFFILIATE";
$invoice_aff_info = "ข้อมูล Affiliate";
$invoice_co_info = "ข้อมูล";
$invoice_acct_info = "ข้อมูลบัญชี";
$invoice_payment_info = "ข้อมูลการจ่ายเงิน";
$invoice_comm_date = "วันที่จ่ายเงิน";
$invoice_comm_amt = "จำนวนค่าคอมมิชชั่น";
$invoice_comm_type = "ประเภทคอมมิชชั่น";
$invoice_admin_note = "บันทึกจากผู้ดูแลระบบ";
$invoice_footer = "สิ้นสุดใบแจ้งหนี้";
$invoice_print = "ปริ้นท์ใบแจ้งหนี้";
$invoice_none = "N/A";
$invoice_aff_id = "Affiliate ID";
$invoice_aff_user = "ชื่อผู้ใช้";
$menu_pdf_marketing = "โบรชัวการตลาดแบบ PDF";
$menu_pdf_training = "เอกสารการฝึกสอนแบบ PDF";
$marketing_target_url = "URL เป้าหมาย";
$marketing_source_code = "Source Code - คัดลอกและวางบนเว็บไซต์ของคุณ";
$marketing_group = "กลุ่มการตลาด";
$peels_title = "ชื่อแบนเนอร์ Page Peel";
$peels_view = "ดูแบนเนอร์ Page Peel นี้";
$peels_description = "คำอธิบายเกี่ยวกับแบนเนอร์เพจพีลนี้";
$lb_head_title = "ต้องการโค้ดในส่วน HEAD สำหรับหน้า HTML ของคุณ";
$lb_head_description = "ถ้าคุณต้องการที่จะใช้ Lightbox บนเว็บไซต์ของคุณ คุณต้องเพิ่มโค้ดดังต่อไปนี้ลงในส่วน HEAD บนหน้าที่คุณตัองการที่จะแสดงฟังชั่นนี้";
$lb_head_source_code = "วางโค้ดนี้ลงในส่วน HEAD บนหน้า HTML ของคุณ";
$lb_head_code_notes = "คุณจำเป็นที่จะต้องใส่โค้ดนี้ลงไปเพียงแค่ครั้งเดียวเท่านั้น ไม่ว่าคุณจะใช้ Lightbox เยอะเท่าไหร่ก็ตาม";
$lb_head_tutorial = "ดู Tutorial";
$lb_body_title = "ชื่อ Lightbox";
$lb_body_description = "คำอธิบายเกี่ยวกับ Lightbox";
$lb_body_click = "คลิ้กรูปข้างบนนี้เพื่อดู lightbox";
$lb_body_source_code = "วางโค้ดนี้ลงในส่วน Body บนหน้า HTML ของคุณในตำแหน่งที่คุณต้องการแสดงรูปนี้";
$pdf_title = "PDF";
$pdf_training = "เอกสารการฝึกสอน";
$pdf_marketing = "โบรชัวการตลาด";
$pdf_description_1 = "คุณจำเป็นต้องมีโปรแกรม Adobe Reader เพื่อที่จะดูและปริ้นท์เอกสารทางการตลาดแบบ PDF ของเรา";
$pdf_description_2 = "คุณสามารถดาวน์โหลดโปรแกรม Adobe Reader ได้ฟรีจากเว็บไซต์ของ Adobe";
$pdf_file_name = "ชื่อไฟล์";
$pdf_file_size = "ขนาดไฟล์";
$pdf_file_description = "คำอธิบาย";
$pdf_bytes = "Bytes";
$menu_heading_training_materials = "เอกสารการฝึกสอน";
$menu_videos = "ดูวิดิโอการฝึกสอน";
$menu_custom_manual = "คู่มือการสร้าง Custom Tracking Links";
$menu_page_peels = "แบนเนอร์ Page Peels";
$menu_lightboxes = "Lightboxes";
$menu_email_templates = "แม่แบบอีเมล";
$menu_heading_custom_links = "ลิ้งค์ Custom Tracking";
$menu_custom_reports = "รายงาน";
$menu_keyword_links = "ลิ้งค์ Keyword Tracking";
$menu_subid_links = "ล้งค์ Sub-Affiliate Tracking";
$menu_alteranate_links = "ลิ้งค์การแบ่งหน้า Incoming";
$menu_heading_additional = "เครื่องมืออื่นๆ";
$menu_drop_heading_stats = "สถิติทั่วไป";
$menu_drop_heading_commissions = "คอมมิชชั่น";
$menu_drop_heading_history = "ประวัติการจ่ายเงิน";
$menu_drop_heading_traffic = "บันทึกจำนวนผู้เข้าชม";
$menu_drop_heading_account = "บัญชีของฉัน";
$menu_drop_heading_logo = "อัพโหลดโลโก้ของฉัน";
$menu_drop_heading_faq = "FAQ";
$menu_drop_general_stats = "สถิติทั่วไป";
$menu_drop_tier_stats = "สถิติ Tier";
$menu_drop_current = "คอมมิชชั่นในขณะนี้";
$menu_drop_tier = "คอมมิชชั่นTierในขณะนี้";
$menu_drop_pending = "กำลังรอการอนุมัติ";
$menu_drop_paid = "คอมมิชชั่นที่จ่ายไปแล้ว";
$menu_drop_paid_rec = "คอมมิชชั่นแบบTierที่จ่ายไปแล้ว";
$menu_drop_recurring = "คอมมิชชั่นแบบประจำที่ active อยู่";
$menu_drop_edit = "แก้ไขบัญชีของฉัน";
$menu_drop_password = "แก้ไขรหัสผ่านของฉัน";
$menu_drop_change = "แก้ไขรูปแบบคอมมิชชั่นของฉัน";
$account_hidden = "ถูกซ่อนไว้";
$keyword_title = "ลิ้งค์ Custom Keyword";
$keyword_info = "การสร้างลิ้งค์ custom keyword จะช่วยให้คุณสามารถติดตามจำนวนผู้เข้าชมที่เข้ามาจากหลายๆแหล่ง คุณสามารถสร้างลิ้งค์ได้ถึง 4 ลิ้งค์ และรายงาน custom tracking จะแสดงรายละเอียดต่างๆเกี่ยวกับแต่ละ keyword ที่คุณสร้างขึ้นมา";
$keyword_heading = "Variables ที่ใช้ได้สำหรับ Custom Keyword Tracking";
$keyword_tracking = "Tracking ID";
$keyword_build = "คุณสามารถสร้างลิ้งค์เองด้วยการนำ URL ดังต่อไปนี้ไปวาง และต่อท้ายมันด้วย Tracking ID และ keyword ที่คุณต้องการใช้";
$keyword_example = "ตัวอย่าง";
$keyword_tutorial = "ดู Tutorial";
$sub_tracking_title = "Sub-Affiliate Tracking";
$sub_tracking_info = "การสร้างลิ้งค์ sub-affiliate จะช่วยให้คุณสามารถส่งต่อลิ้งค์ affiliate ของคุณไปให้ affiliates ของคุณใช้งานได้ คุณจะสามารถรับรู้ได้ว่าใครเป็นคนสร้างคอมมิชชั่นให้กับคุณบ้าง เพราะว่าทางเราจะรายงานคุณว่า sub-affiliates ของคุณคนไหนบ้างที่ได้ทำการขายให้กับคุณ และอีกเหตุผลหนึ่งในการใช้งานลิ้งค์ sub-affiliates นั่นก็คือการให้คุณสามารถลงบันทึกรายงานเหล่านี้ลงไปในระบบการติดตามของคุณเองได้";
$sub_tracking_build = "แทนที่ XXX ด้วยหมายเลข affiliate ID ของคุณใน affiliate program  ทำอย่างนี้ซ้ำๆกับทุก affiliates ของคุณ";
$sub_tracking_example = "ตัวอย่าง";
$sub_tracking_tutorial = "ดู Tutorial";
$sub_tracking_id = "Sub-Affiliate ID";
$alternate_title = "ลิ้งค์หน้า Alternate Incoming Page";
$alternate_option_1 = "ตัวเลือกที่ 1: การสร้างลิ้งค์แบบอัติโนมัติ";
$alternate_heading_1 = "การสร้างลิ้งค์แบบอัติโนมัติ";
$alternate_info_1 = "ระบุหน้า incoming traffic ของคุณเองด้วยการกรอก URL ของเว็บไซต์ที่คุณต้องการให้เราส่งจำนวนผู้เข้าชมเข้าไป และเราจะสร้างลิ้งค์ให้กับคุณ  การใช้ฟีตเจอร์นี้จะทำให้คุณได้รับลิ้งค์ที่มีความยาวสั้นกว่าเดิมเพื่อในการใช้งานกับ URL ที่ฝังอยู่ในลิ้งค์ที่ใช้เลข ID จากฐานข้อมูลของเรา";
$alternate_button = "สร้างลิ้งค์ของฉัน";
$alternate_links_heading = "ลิ้งค์ Alternate Incoming URL ของฉัน";
$alternate_links_note = "ลิ้งค์ที่มีอยู่แล้วจะคงอยู่ครบถ้วนและยังทำงานได้อยู่ถ้าคุณลบลิ้งค์แบบ custom ออกจากหน้านี้";
$alternate_links_remove = "ลบ";
$alternate_option_2 = "ตัวเลือกที่ 2: การสร้างลิ้งค์เมนวล";
$alternate_info_2 = "ถ้าคุณชอบที่จะสร้างลิ้งค์ affiliate ของคุณกับ alternate incoming URL ขึ้นมาเองมากกว่า คุณสามารถใช้โครงสร้างดังต่อไปนี้ได้";
$alternate_variable = "Alternate Incoming URL Variable";
$alternate_example = "ตัวอย่าง";
$alternate_build = "คุณสามารถสร้างลิ้งค์ของคุณขึ้นมาได้เองโดยการนำ Alternate Incoming URL ที่คุณต้องการใช้ไปต่อหลัง URL ดังต่อไปนี้ได้";
$alternate_none = "ไม่มี Alternate Incoming Links ที่ถูกสร้าง";
$alternate_tutorial = "ดู Tutorial";
$cr_title = "รายงาน Custom Keyword";
$cr_select = "เลือก keyword";
$cr_button = "สร้างรายงาน";
$cr_no_results = "ไม่พบผลลัพธ์ใดๆ";
$cr_no_results_info = "ลองผสม keyword ใหม่";
$cr_used = "Keywords ได้ถูกใช้ไปแล้ว";
$cr_found = "ลิ้งค์นี้ได้ถูกค้นพบแล้ว";
$cr_times = "ครั้ง";
$cr_unique = "ลิ้งค์แบบ unique ได้ถูกค้นพบแล้ว";
$cr_detailed = "รายงานรายละเอียดลิ้งค์";
$cr_export = "Export รายงานไปยัง Excel";
$cr_none = "ไม่พบ keywords ใดๆ";
$logo_title = "อัพโหลดโลโก้บริษัทของคุณ";
$logo_info = "ถ้าคุณอยากจะอัพโหลดโลโก้บริษัทของคุณ เราจะแสดงมันให้กับลูกค้าของคุณที่เข้ามายังเว็บเรา มันสามารถทำให้เราปรับแต่งประสบการณ์ของลูกค้าเมื่อพวกเขาเข้ามาเยี่ยมชมเรา";
$logo_bullet_one = "รูปภาพต้องเป็น .jpg, .gif หรือ .png เท่านั้น และไม่สามารถใช้ไฟล์ flash ได้";
$logo_bullet_two = "รูปภาพที่ใหม่เหมาะสมจะถูกลบออกและบัญชีของคุณจะถูกระงับ";
$logo_bullet_three = "รูปหรือโลโก้ของคุณจะไม่ถูกแสดงบนเว็บไซต์ของเราจนกว่าเราจะทำการอนุมัติ";
$logo_bullet_size_one = "รูปสามารถมีความกว้างมากสุดที่";
$logo_bullet_size_two = "pixels และความสูงมากสุดที่";
$logo_bullet_req_size_one = "รูปต้องมีความกว้าง";
$logo_bullet_req_size_two = "pixels และสูง";
$logo_bullet_pixels = "pixels";
$logo_choose = "เลือกรูป";
$logo_file = "เลือกไฟล์:";
$logo_browse = "Browse...";
$logo_button = "อัพโหลด";
$logo_current = "รูปปัจจุบันของฉัน";
$logo_remove = "ลบ";
$logo_display_status = "สถานะของรูป:";
$logo_pending = "กำลังรอการอนุมัติ";
$logo_approved = "ได้รับการอนุมัติแล้ว";
$logo_success = "รูปของคุณได้ถูกอัพโหลดเรียบร้อยแล้ว และกำลังอยู่ในสถานะรอการอนุมัติ";
$signup_security_title = "การยืนยันบัญชี";
$signup_security_info = "กรุณากรอก security code ที่อยู่ในกล่องนี้ เพื่อเป็นการช่วยพวกเราป้องกันการลงทะเบียนแบบอัติโนมัติ";
$signup_security_code = "Security Code";
$sub_tracking_none = "ไม่มี";
$missing_security_code = "การยืนยันบัญชีหรือ security code ไม่ถูกต้องหรือไม่ถูกกรอก";
$alternate_success_title = "สร้างลิ้งค์เรียบร้อยแล้ว";
$alternate_success_info = "นำลิ้งค์ข้างล่างไปวางลงบนเว็บไซต์แล้วเริ่มส่งต่อจำนวนคนเข้าชมไปยัง URL ที่คุณระบุได้เลย";
$alternate_failed_title = "เกิดความผิดพลาดกับการสร้างลิ้งค์";
$alternate_failed_info = "กรุณาใส่ URL ที่ถูกต้อง";
$logo_missing_filename = "กรุณาเลือกชื่อไฟล์";
$logo_required_width = "รูปต้องกว้าง";
$logo_required_height = "รูปต้องสูง";
$logo_maximum_width = "รูปสามารถมีความกว้างได้เพียง";
$logo_maximum_height = "รูปสามารถมีความสูงได้เพียง";
$logo_size_maximum = "รูปสามารถมีขนาดได้เพียง";
$logo_bad_filetype = "เราไม่อนุญาตให้ใช้รูปสกุลนี้ สกุลรูปภาพที่เรารับคือ .gif, .jpg และ .png";
$logo_upload_error = "เกิดความผิดพลาดกับการอัพโหลดรูปภาพ กรุณาติดต่อผู้จัดการ affiliate";
$logo_error_title = "เกิดความผิดพลาดกับการอัพโหลดรูปภาพ";
$logo_error_bytes = "bytes";
$excel_title = "รายงานลิ้งค์ Custom Keyword";
$excel_tab_report = "รายงาย Custom Keyword";
$excel_tab_logs = "บันทึกจำนวนผู้เข้าชม";
$excel_date = "วันที่รายงาน:";
$excel_affiliate = "Affiliate ID:";
$excel_criteria = "เกณฑ์ Keyword Link";
$excel_link = "โครงสร้างลิ้งค์";
$excel_hits = "การกดแบบ unique";
$excel_comm_stats = "สถิติคอมมิชชั่น";
$excel_comm_current = "คอมมิชชั่นในขณะนี้";
$excel_comm_paid = "คอมมิชชั่นที่ถูกจ่ายไปแล้ว";
$excel_comm_total = "คอมมิชชั่นทั้งหมด";
$excel_comm_ratio = "อัตราส่วน";
$excel_earned = "คอมมิชชั่นที่ได้รับ";
$excel_earned_current = "คอมมิชชั่นในขณะนี้";
$excel_earned_paid = "คอมมิชชั่นที่ถูกจ่ายไปแล้ว";
$excel_earned_total = "คอมมิชชั่นที่ได้รับทั้งหมด";
$excel_earned_tab = "คลิ้กแถบบันทึกจำนวนผู้เข้าชม(ข้างล่างนี้) เพื่อดูการบันทึก custom traffic นี้";
$excel_log_title = "บันทึก Custom Keywords Traffic";
$excel_log_ip = "IP Address";
$excel_log_refer = "URL อ้างอิง";
$excel_log_date = "วันที่";
$excel_log_time = "เวลา";
$excel_log_target = "URL เป้าหมาย";
$etemplates_title = "แม่แบบอีเมล";
$etemplates_view_link = "ดูแม่แบบอีเมลนี้";
$etemplates_name = "ชื่อแม่แบบ";
$signup_maintenance_heading = "หมายเหตุการซ่อมปรับปรุง";
$signup_maintenance_info = "การลงทะเบียนไม่สามารถใช้งานได้ชั่วคราว กรุณาลองใหม่ในภายหลัง";
$marketing_group_title = "กลุ่มการตลาด";
$marketing_button = "แสดง";
$marketing_no_group = "ไม่มีการเลือกกลุ่ม";
$marketing_choose = "กรุณาเลือกกลุ่มการตลาดด้านบนนี้";
$marketing_notice = "กลุ่มการตลาดแต่ละกลุ่มอาจจะมีหน้า Incoming Traffic ที่แตกต่างกัน";
$canspam_heading = "กฎระเบียบ CAN-SPAM และการยอมรับ";
$canspam_accept = "ฉันได้อ่าน ทำความเข้าใจ และเห็นด้วยกับกฎระเบียบของ CAN-SPAM ดังกล่าวข้างต้น";
$canspam_error = "คุณยังไม่ได้ยอมรับกฎระเบียบ CAN-SPAM ของเรา";
$signup_banned = "มีความผิดพลาดเกิดขึ้นระหว่างการสร้างบัญชี กรุณาติดต่อผู้ดูแลระบบสำหรับข้อมูลเพิ่มเติม";
$header_testimonials = "Affiliate Testimonials";
$testi_visit = "เข้าชมเว็บไซต์";
$testi_description = "ความเห็น testimonial เกี่ยวกับ affiliate program ที่คุณส่งให้เรา จะถูกแสดงบนหน้า &lt;a href=&quot;testimonials.php&quot;&gt;testimonials&lt;/a&gt; ซึ่งจะมีลิ้งค์ไปยังเว็บไซต์ของคุณด้วย";
$testi_name = "ชื่อ";
$testi_url = "URL เว็บไซต์";
$testi_content = "Testimonial";
$testi_code = "Security Code";
$testi_submit = "ส่งความเห็น Testimonial";
$testi_na = "ไม่มีความเห็น Testimonials ในขณะนี้";
$testi_title = "เสนอ Testimonial";
$testi_success_title = "ส่ง Testimonial สำเร็จแล้ว";
$testi_success_message = "ขอบคุณที่ส่งความเห็น testimonial ของคุณให้กับเรา  ทีมของเราจะทำการพิจารณาในเร็วๆนี้";
$testi_error_title = "เกิดความผิดพลาดกับ Testimonial";
$testi_error_name_missing = "กรุณากรอกชื่อของคุณสำหรับ testimonial ด้วยค่ะ";
$testi_error_url_missing = "กรุณากรอก URL เว็บไซต์ของคุณสำหรับ testimonial ด้วยค่ะ";
$testi_error_missing = "กรุณากรอกข้อความสำหรับ testimonial ด้วยค่ะ";
$menu_drop_delayed = "คอมมิชชั่นล่าช้า";
$details_drop_6 = "คอมมิชชั่นล่าช้าในขณะนี้";
$details_type_6 = "ล่าช้า - จะทำการอนุมัติในเร็วๆนี้";
$comdetails_status_6 = "ล่าช้า - จะทำการอนุมัติในเร็วๆนี้";
$tc_reaccept_title = "การแจ้งเตือนการเปลี่ยนแปลงของข้อตกลงและเงื่อนไข";
$tc_reaccept_sub_title = "คุณต้องตกลงกับข้อตกลงและเงื่อนไขใหม่ของเราเพื่อที่จะสามารถเข้าสู่บัญชีของคุณได้";
$tc_reaccept_button = "ฉันได้อ่าน ทำความเข้าใจ และยอมรับข้อตกลงและเงื่อนไขข้างต้น";
$tlinks_active = "จำนวน Tiers ที่ active อยู่";
$tlinks_payout_structure = "โครงสร้างการจ่ายเงิน Tier";
$tlinks_level = "ระดับ";
$tierText1 = "% คิดจากจำนวนคอมมิชชั่นอ้างอิงของ affiliate";
$tierText2 = "% คิดจากจำนวนคอมมิชชั่นของ tier ที่สูงกว่า";
$tierText3 = "% คิดจากจำนวนการขาย";
$tierTextflat = "อัตราดอกเบี้ยแบบคงที่";
$edit_custom_button = "แก้ไขคำตอบ";
$private_heading = "การลงทะเบียนแบบส่วนตัว";
$private_info = "Affiliate program ของเราไม่เป็นแบบสาธารณะและจำเป็นต้องมี Signup Code สำหรับการเข้าร่วม ข้อมูลเกี่ยวกับการรับ Signup Code จะอยู่ตรงนี้";
$private_required_heading = "จำเป็นต้องมี Signup Code";
$private_code_title = "กรอก Signup Code";
$private_button = "ส่ง Code";
$private_error_title = "Signup Code ที่ให้มาไม่ถูกต้อง";
$private_error_invalid = "Signup code ที่คุณให้มาไม่ถูกต้อง";
$private_error_expired = "Signup code ที่คุณให้มาได้หมดอายุลงแล้วและไม่สามารถใช้ได้แล้ว";
$qr_code_title = "โค้ด QR";
$qr_code_size = "ขนาดของโค้ด QR";
$qr_code_button = "แสดงโค้ด QR";
$qr_code_offline_title = "การตลาดแบบออฟไลน์";
$qr_code_offline_content1 = "ใส่โค้ด QR นี้ลงไปในสื่อการตลาดของคุณเช่น โบรชัวร์ ใบปลิว นามบัตร และอื่นๆ";
$qr_code_offline_content2 = "- คลิ้กขวาบนรูปและ &lt;strong&gt;บันทึก&lt;/strong&gt; บันทึกลงในคอมพิวเตอร์ของคุณ";
$qr_code_online_title = "การตลาดแบบออนไลน์";
$qr_code_online_content = "ใส่โค้ด QR นี้ลงไปบนเว็บไซต์, social media, บล็อก และอื่นๆ";
$menu_coupon = "โค้ดคูปอง";
$coupon_title = "โค้ดคูปองที่คุณสามารถใช้ได้";
$coupon_desc = "แจกโค้ดคูปองนี้และรับค่าคอมมิชชั่นทุกครั้งที่มีคนใช้โค้ดคูปองของคุณ";
$coupon_head_1 = "โค้ดคูปอง";
$coupon_head_2 = "ส่วนลดสำหรับลูกค้า";
$coupon_head_3 = "ค่าคอมมิชชั่นของคุณ";
$coupon_sale_amt = "ของจำนวนการขาย";
$coupon_flat_rate = "อัตราดอกเบี้ยแบบคงที่";
$coupon_default = "ระดับการจ่ายเงินแบบเริ่มต้น";
$cc_vanity_title = "ขอโค้ดคูปองแบบ personalized";
$cc_vanity_field = "โค้ดคูปอง";
$cc_vanity_button = "ขอโค้ดคูปอง";
$cc_vanity_error_missing = "<strong>Error!</strong> กรุณากรอกโค้ดคูปอง";
$cc_vanity_error_exists = "<strong>Error!</strong> คุณได้ขอโค้ดคูปองนี้แล้ว และมันกำลังอยู่ระหว่างการอนุมัติ";
$cc_vanity_error = "<strong>Error!</strong> โค้ดคูปองไม่ถูกต้อง กรุณาใช้ตัวพยัญชนะ ตัวเลข หรืออันเดอร์สกอร์";
$cc_vanity_success = "<strong>สำเร็จแล้ว!</strong> คำขอโค้ดคูปองแบบ personalized ได้ถูกส่งไปแล้ว";
$coupon_none = "ไม่มีโค้ดคูปองใดๆในขณะนี้";
$pic_error_title = "เกิดข้อผิดพลาดในการอัพโหลดรูป";
$pic_missing = "กรุณาเลือกชื่อไฟล์";
$pic_invalid = "เราไม่อนุญาตให้ใช้รูปสกุลนี้ สกุลรูปภาพที่เรารับคือ .gif, .jpg และ .png";
$pic_error = "เกิดความผิดพลาดกับการอัพโหลดรูปภาพ กรุณาติดต่อผู้จัดการ affiliate";
$pic_success = "รูปภาพของคุณได้ถูกอัพโหลดเรียบร้อยแล้ว";
$pic_title = "อัพโหลดรูปภาพของคุณ";
$pic_info = "อัพโหลดรูปของคุณเพื่อช่วยให้เราปรับแต่งประสบการณ์ของเรากับคุณให้ดียิ่งขึ้น";
$pic_bullet_1 = "รูปต้องมีสกุล .jpg, .gif หรือ .png เท่านั้น";
$pic_bullet_2 = "รูปภาพที่ไม่เหมาะสมจะถูกลบและบัญชีของคุณจะถูกระงับ";
$pic_bullet_3 = "รูปภาพของคุณจะไม่ถูกแสดงแก่สาธารณะ มันจะอยู่แค่ในบัญชีของคุณและมีเพียงพวกเราเท่านั้นที่เห็น";
$pic_file = "เลือกไฟล์:";
$pic_button = "อัพโหลด";
$pic_current = "รูปภาพปัจจุบัน";
$pic_remove = "ลบรูปภาพ";
$progress_title = "การจ่ายเงินครั้งต่อไปสามารถทำได้ก็ต่อเมื่อ:";
$progress_complete = "สำเร็จ";
$progress_none = "คุณไม่จำเป็นต้องมีจำนวนเงินขั้นต่ำเพื่อทำการรับเงิน";
$progress_sentence_1 = "คุณได้รับ";
$progress_sentence_2 = "ของ";
$progress_sentence_3 = "ความจำเป็น";
$aff_lib_button = "<font style=\"font-size:16px; font-weight:bold;\">รับสิทธิ์เข้าใช้งานเว็บไซต์</font><BR />www.AffiliateLibrary.com";
$menu_announcements = "แคมเปญ Social Media";
$announcements_name = "ชื่อแคมเปญ";
$announcements_facebook_message = "ข้อความ Facebook";
$announcements_twitter_message = "ข้อความ Twitter";
$announcements_facebook_link = "ลิ้งค์ Facebook";
$announcements_facebook_picture = "รูปภาพ Facebook";
$general_last_30_days_activity = "การเคลื่อนไหวใน 30 วันที่ผ่านมา";
$general_last_30_days_activity_traffic = "ผู้เข้าชมเว็บไซต์";
$general_last_30_days_activity_commissions = "คอมมิชชั่น";
$accountability_title = "การรับผิดชอบและการสื่อสาร";
$accountability_text = "<strong>มันคืออะไร?</strong><p>เราใช้วิธีการเชิงรุกเพื่อสร้างความน่าเชื่อถือกับพาร์ทเนอร์ affiliate ของเรา  มันเป็นเป้าหมายของเราเพื่อที่จะทำให้มั่นใจว่าเราได้ให้ข้อมูลกับคุณมากที่สุดเท่าที่จะทำได้เกี่ยวกับคอมมิชชั่นที่คุณได้รับและ/หรือถูกปฏิเสธในระบบของเรา</p><strong>การสื่อสาร</strong><p>เราสามารถให้รายละเอียดเกี่ยวกับค่าคอมมิชชั่นที่ถูกปฏิเสธได้ เรามีการใช้การสื่อสารที่ดีเยี่ยมกับaffiliatesของเรา และเราก็ส่งเสริมการตั้งคำถามและการให้ข้อเสนอแนะ</p>";
$debit_reason_0 = 'ไม่มี';
$debit_reason_1 = 'การคืนเงินให้';
$debit_reason_2 = 'การเรียกเก็บเงิน';
$debit_reason_3 = 'การทุจริตได้ถูกรายงาน';
$debit_reason_4 = 'ใบสั่งซื้อได้ถูกยกเลิก';
$debit_reason_5 = 'การคืนเงินให้เป็นบางส่วน';
$menu_drop_pending_debits = 'รอการอนุมัติเดบิต';
$debit_amount_label = 'จำนวนเดบิต';
$debit_date_label = 'วันที่เดบิต';
$debit_reason_label = 'เหตุผลที่เดบิต';
$debit_paragraph = 'เดบิตจะถูกหักจากการจ่ายเงินครั้งหน้า';
$debit_invoice_amount = 'จำนวนเดบิตติดลบ';
$debit_revised_amount = 'จำนวนการจ่ายที่ถูกแก้ไขใหม่แล้ว';
$mv_head_description = 'หมายเหตุ: คุณสามารถลงวิดิโอเพียงหนึ่งวิดิโอต่อหนึ่งหน้าเว็บเพจเท่านั้น';
$mv_head_source_code = 'วางโค้ดนี้ลงในส่วน HEAD ของโค้ด HTML ของคุณ';
$mv_body_title = 'ชื่อวิดิโอ';
$mv_body_description = 'รายละเอียด';
$mv_body_source_code = 'วางโค้ดนี้ลงในส่วน BODY ของโค้ด HTML ของคุณในที่ที่คุณอยากให้วิดิโอแสดง';
$menu_marketing_videos = 'วิดิโอ';
$mv_preview_button = 'ดูตัวอย่างวิดิโอ';
$dt_no_data = 'ไม่มีข้อมูลในตารางในขณะนี้';
$dt_showing_exists = 'แสดง _START_ ถึง _END_ ของ _TOTAL_ รายการ';
$dt_showing_none = 'แสดง 0 ถึง 0 ของ 0 รายการ';
$dt_filtered = '(คัดกรองจากทั้งหมด _MAX_ รายการ)';
$dt_length_choice = 'แสดง _MENU_ รายการ';
$dt_loading = 'Loading...';
$dt_processing = 'Processing...';
$dt_no_records = 'ไม่พบบันทึกใดๆ';
$dt_first = 'แรกสุด';
$dt_last = 'ท้ายสุด';
$dt_next = 'ถัดไป';
$dt_previous = 'ก่อนหน้า';
$dt_sort_asc = ': activate เพื่อจัดประเภทจากน้อยไปมาก';
$dt_sort_desc = ': activate เพื่อจัดประเภทจากมากไปน้อย';
$choose_marketing_group = 'เลือกกลุ่มการตลาด';
$email_already_used_1 = 'ไม่สามารถสร้างบัญชีได้ เราอนุญาตเพียง';
$email_already_used_2 = 'บัญชี';
$email_already_used_3 = 'ที่สามารถถูกสร้างด้วยบัญชีอีเมลหนึ่งบัญชี';
$missing_fax = 'กรุณาใส่เบอร์แฟกซ์';
$chart_last_6_months = 'ค่าคอมมิชชั่นที่ถูกจ่ายใน 6 เดือนที่แล้ว';
$chart_last_6_months_paid = 'ค่าคอมมิชชั่นถูกจ่ายแล้ว';
$chart_this_month = 'Top 5 Affiliates ของเรา';
$chart_this_month_none = 'ไม่มีข้อมูลให้แสดง';
$login_return = 'กลับไปยังหน้าหลัก Affiliate';
$login_lost_details = 'ใส่ชื่อผู้ใช้ของคุณและเราจะส่งข้อมูลสิทธิเข้าสู่ระบบไปยังอีเมลของคุณ';
$account_edit_general_prefs = 'การตั้งค่าทั่วไป';
$account_edit_email_language = 'ภาษาของอีเมล';
$footer_connect = 'เชื่อมต่อกับเรา';
$modal_close = 'ปิด';
$vat_amount_heading = 'จำนวน VAT';
$menu_logout = 'ลงชื่อออก';
$menu_upload_picture = 'อัพโหลดรูปของคุณ';
$menu_offer_testi = 'เสนอความเห็น Testimonial';
$fb_login = 'ลงชื่อเข้าใช้ด้วย Facebook';
$fb_permissions = 'ไม่ได้รับการอนุญาต กรุณาอนุญาตให้เว็บไซต์ของเราใช้ที่อยู่อีเมลของคุณ';
$announcements_published = "การประกาศได้ถูกประกาศแล้ว";
$training_videos_title = "วิดิโอการฝึกหัด";
$training_videos_general = "การตลาดทั่วไป";
$commission_method = "วิธีการให้เปอร์เซ็นต์";
$how_will_you_earn = "คุณจะได้รับค่าคอมมิชชั่นอย่างไร?";
$pm_account_credit = "เราจะเครดิตบัญชีของคุณด้วยจำนวนค่าคอมมิชชั่นที่คุณได้รับ";
$pm_check_money_order = "เราจะส่งเช็ค/เงินไปในอีเมล";
$pm_paypal = "เราจะส่งเงินให้คุณโดย PayPal";
$pm_stripe = "เราจะส่งเงินให้คุณโดย Stripe";
$pm_wire = "เราจะส่งเงินให้คุณโดยการโอนเงินเข้าบัญชีธนาคารของคุณ";
$add_to_signup_left_column_text = "<span style=\"color:#CC0000; font-style:italic;\">* หมายถึงช่องที่จำเป็นต้องกรอก.</span>";
$paypal_email = "อีเมล PayPal";
$stripe_acct_details = "ข้อมูลบัญชี Stripe";
$stripe_connect = "คุณสามารถเชื่อมต่อกับบัญชี Stripe ด้วยหน้าการตั้งค่าบัญชีหลังจากการลงทะเบียน";
$stripe_success = "เชื่อมต่อกับบัญชี Stripe สำเร็จแล้ว";
$stripe_settings = "การตั้งค่า Stripe";
$stripe_connect_edit = "เชื่อมต่อกับ Stripe";
$stripe_delete = "ลบบัญชี Stripe";
$stripe_confirm = "คุณแน่ใจแล้วหรือว่าจะลบบัญชีนี้?";
$payment_settings = "การตั้งค่าการชำระเงิน";
$edit_payment_settings = "แก้ไขการตั้งค่าการชำระเงิน";
$invalid_paypal_address = "อีเมล PayPal ไม่ถูกต้อง";
$payment_method_error = "กรุณาเลือกวิธีการจ่ายเงิน";
$payment_settings_updated = "อัพเดทการตั้งค่าการจ่ายเงินเรียบร้อยแล้ว";
$stripe_removed = "ลบบัญชี Stripe เรียบร้อยแล้ว";
$payment_settings_success = "สำเร็จ!";
$payment_update_notice_1 = "ประกาศ!";
$payment_update_notice_2 = "คุณได้เลือกที่จะรับการจ่ายเงิน<strong>[payment_option_here]</strong>จากเรา กรุณา<a href=\"account.php?page=48\" style=\"font-weight:bold;\">คลิ้กตรงนี้</a>เพื่อเชื่อมต่อกับบัญชี<strong>[payment_option_here]</strong>";
$pm_title_credit = "เครดิตบัญชี";
$pm_title_mo = "เช็ค/ธนาณัติ";
$pm_title_paypal = "PayPal";
$pm_title_stripe = "Stripe";
$pm_title_wire = "โอนเงินผ่านธนาคาร";
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