<?PHP

//-------------------------------------------------------
	  $language_pack_name = "hebrew";
	  $language_pack_table_name = "hebrew";
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
$header_title = "תכנית שותפים";
$header_indexLink = "דף בית שותפים";
$header_signupLink = "הירשם עכשיו";
$header_accountLink = "ניהול חשבון";
$header_emailLink = "צור קשר";
$header_greeting = "ברוך הבא";
$header_nonLogged = "ארוח";
$header_logout = "התנתק כאן";
$footer_tag = "תוכנת שותפים מבית iDevAffiliate";
$footer_copyright = "זכויות יוצרים";
$footer_rights = "כל הזכויות שמורות";
$index_heading_1 = "ברוך הבא לתכנית השותפים שלנו!";
$index_paragraph_1 = "ההצטרפות לתכנית חינם, ההרשמה קלה וינה דורשת ידע טכני. תכניות שותפים הן דבר נפוץ מאוד ברחבי האינטרנט, והן מציעות לבעלי אתרים דרך נוספת להפיק רווח מאתר האינטרנט שלהם. שותפים מגבירים תנועה ומכירות עבור אתרים מסחריים, ומקבלים בתמורה תשלום עמלות.";
$index_heading_2 = "איך זה עובד?";
$index_paragraph_2 = "בעת הצטרפותך לתכנית השותפים שלנו, יימסר לך מגוון באנרים וקישורי טקסט לפרסום באתר שלך. כאשר משתמש לוחץ על אחד הקישורים שלך, הוא יופנה לאתר שלנו ותוכנת השותפים שלנו תבצע מעקב אחר פעילותו. העמלה שתרוויח מכך מבוססת על סוג העמלה הרלוונטי אליך.";
$index_heading_3 = "עדכונים וססטיסטיקות בזמן-אמת!";
$index_paragraph_3 = "התחבר 24 שעות ביממה להתעדכן במכירות, תנועה, יתרת החשבון וביצועי הבאנרים שלך.";
$index_login_title = "התחברות לשותפים";
$index_login_username = "שם משתמש";
$index_login_password = "סיסמה";
$index_login_username_field = "שם משתמש";
$index_login_password_field = "סיסמה";
$index_login_button = "התחבר";
$index_login_signup_link = "לחץ כאן להרשמה";
$index_table_title = "פרטי התכנית";
$index_table_commission_type = "סוג עמלה";
$index_table_initial_deposit = "הפקדה ראשונית";
$index_table_requirements = "דרישות תשלום";
$index_table_duration = "משך תשלום";
$index_table_choose = "בחר מבין אפשרויות התשלום הבאות!";
$index_table_sale = "תשלום לפי מכירה";
$index_table_click = "תשלום לפי קליק";
$index_table_sale_text = "עבור כל מכירה שתספק.";
$index_table_click_text = "עבור כל קליק שתספק.";
$index_table_deposit_tag = "עבור הרשמתך בלבד!";
$index_table_requirements_tag = "היתרה המינימלית הנדרשת לתשלום.";
$index_table_duration_tag = "התשלומים מועברים אחת לחודש, עבור החודש הקודם.";
$signup_left_column_text = "הצטרף לתכנית השותפים שלנו והתחל להרוויח כסף עבור כל מכירה שתגיע בזכותך! פשוט צור חשבון, הכנס את קוד הקישור שלך באתר שלך, וצפה ביתרת החשבון שלך גדלה כאשר המבקרים באתר לך הופכים ללקוחות שלנו.";
$signup_left_column_title = "ברוך הבא שותף!";
$signup_login_title = "צור חשבון";
$signup_login_username = "שם משתמש";
$signup_login_password = "סיסמה";
$signup_login_password_again = "הזן את הסיסמה שנית";
$signup_login_minmax_chars = "- שם משתמש חייב להיות מינימום של תווי user_min_chars. &lt;br /&gt;- שם משתמש יכול להיות אלפא-נומרי &lt;br /&gt;- שם משתמש יכול להכיל את התווים הבאים:. _ (קווים תחתיים בלבד) &lt;br /&gt; &lt;br /&gt;- הסיסמה צריכה להיות באורך של לפחות pass_min_chars &lt;br /&gt; -  תווים  סיסמה יכולה להיות אלפא. . -numeric &lt;br /&gt; - סיסמה יכול להכיל את התווים הבאים: characters_allowed";
$signup_login_must_match = "שדה זה חייב להיות שווב בדיוק לשדה הסיסמה.";
$signup_standard_title = "מידע סטנדרטי";
$signup_standard_email = "כתובת מייל";
$signup_standard_company = "שם חברה";
$signup_standard_checkspayable = "שיקים ישולמו ל";
$signup_standard_weburl = "כתובת אתר אינטרנט";
$signup_standard_taxinfo = "זיהוי מס";
$signup_personal_title = "מידע אישי";
$signup_personal_fname = "שם פרטי";
$signup_personal_state = "מחוז";
$signup_personal_lname = "שם משפחה";
$signup_personal_phone = "מספר טלפון";
$signup_personal_addr1 = "כתובת";
$signup_personal_fax = "מספר פקס";
$signup_personal_addr2 = "כתובת נוספת";
$signup_personal_zip = "מיקוד";
$signup_personal_city = "עיר";
$signup_personal_country = "ארץ";
$signup_commission_title = "תשלום עמלה";
$signup_commission_howtopay = "כיצד לשלם לך?";
$signup_commission_style_PPS = "תשלום לפי מכירה";
$signup_commission_style_PPC = "תשלום לפי קליק";
$signup_terms_title = "תנאי שימוש";
$signup_terms_agree = "קראתי, הבנתי ואני מסכים לתנאי השימוש.";
$signup_page_button = "צור חשבון";
$signup_success_email_comment = "שלחנו לך מייל עם שם המשתמש והסיסמה שלך.<BR />\r\nמומלץ לשמור את המידע במקום בטוח לעת הצורך.";
$signup_success_login_link = "התחבר לחשבונך";
$custom_fields_title = "שדות מותאמים אישית";
$logout_msg = "<b>הנך מנותק כעת</b><BR />תודה לך על השתתפותך בתכנית השותפים.";
$signup_page_success = "חשבונך נוצר בהצלחה";
$login_left_column_title = "התחברות לחשבון";
$login_left_column_text = "הזן את שם המשתמש ואת הסיסמה שלך כדי לצפות בסטטיסטיקות, באנרים, קוד קישור, שאלות נפוצות, ועוד.<BR/ ><BR/ >אם שכחת את הסיסמה שלך, הזן את שם המשתמש שלך ואנו נשלח לך את פרטי ההתחברות למייל שלך.<BR /><BR />";
$login_title = "התחבר לחשבון שלך";
$login_username = "שם משתמש";
$login_password = "סיסמה";
$login_invalid = "שגיאה בפרטי ההתחברות";
$login_now = "התחבר לחשבון שלי";
$login_send_title = "צריך תזכורת עבור הסיסמה שלך?";
$login_send_username = "שם משתמש";
$login_send_info = "פרטי ההתחברות נשלחו למייל שלך";
$login_send_pass = "שלח למייל שלי";
$login_send_bad = "שם משתמש לא קיים";
$help_new_password_heading = "סיסמה חדשה";
$help_new_password_info = "הסיסמה שלך חייבת להיות לפחות pass_min_chars תווים. היא רשאית להכיל רק אותיות, מספרים את התווים הבאים:  characters_allowed";
$help_confirm_password_heading = "אמת סיסמה חדשה";
$help_confirm_password_info = "שדה הסיסמה הזה חייב להיות שווה בדיוק לשדה הסיסמה החדשה.";
$help_custom_links_heading = "מילת מפתח למעקב";
$help_custom_links_info = "על מילת המפתח להכיל לכל היותר 30 תווים. כמו כן עליה להכיל אותיות, מספרים ומקפים בלבד.";
$error_title = "התקבלו השגיאות הבאות";
$username_invalid = "שם משתמש לא חוקי. הוא רשאי להכיל רק אותיות, מספרים וקו תחתי.";
$username_taken = "שם המשתמש שבחרת תפוס.";
$username_short = "שם המשתמש שלך קצר מדי, עליו להכיל לפחות user_min_chars תווים.";
$username_long = "שם המשתמש שלך ארוך מדי, עליו להכיל לכל היותר user_max_chars תווים.";
$password_invalid = "סיסמא לא חוקית הוא רשאית להכיל רק אותיות, מספרים,קו תחתי ואת התווים הבאים:  characters_allowed";
$password_short = "סיסמתך קצרה מדי, עליה להכיל לפחות pass_min_chars תווים.";
$password_long = "סיסמתך ארוכה מדי, עליה להכיל לכל היותר pass_max_chars תווים.";
$password_mismatch = "שדות הסיסמה שהזנת אינם תואמים.";
$missing_checks = "אנא הזן את השם שברצונך שיופיע על השיקים שיישלחו אליך.";
$missing_tax = "אנא הזן את פרטי זיהוי המס שלך.";
$missing_fname = "אנא הזן שם פרטי.";
$missing_lname = "אנא הזן שם משפחה.";
$missing_email = "אנא הזן כתובת מייל.";
$invalid_email = "כתובת המייל שהזנת אינה תקינה.";
$missing_address = "אנא הזן את כתובתך.";
$missing_city = "אנא הזן את עירך.";
$missing_company = "אנא הזן את שם החברה שלך.";
$missing_state = "אנא הזן את המחוז שלך.";
$missing_zip = "אנא הזן מיקוד.";
$missing_phone = "אנא הזן את מספר הטלפון שלך.";
$missing_website = "אנא הזן את כתובת אתר האינטרנט שלך.";
$missing_paypal = "בחרת לקבל תשלום באמצעות PayPal, אנא הזן את חשבון ה-PayPal שלך.";
$missing_terms = "לא הסכמת לתנאי השימוש שלנו.";
$paypal_required = "חשבון PayPal דרוש עבור ביצוע תשלום.";
$missing_custom = "אנא השלם את השדה:";
$account_total_transactions = "סה\"כ עסקות";
$account_standard_linking_code = "קוד קישור סטנדרטי - מעולה לשימוש במיילים!";
$account_copy_paste = "העתק/הדבק את הקוד הנ\"ל לאתר האינטרנט ולמיילים שלך";
$account_not_approved = "חשבונך ממתין לאישור";
$account_suspended = "חשובנך מושהה";
$account_standard_earnings = "רווחים סטנדרטיים";
$account_inc_bonus = "כולל בונוס";
$account_second_tier = "רווחי Tier";
$account_recurring = "רווחים חוזרים";
$account_not_available = "לא זמין";
$account_earned_todate = "סה\"כ רווחים עד היום";
$menu_heading_overview = "סקירת חשבון";
$menu_general_stats = "סטטיסטיקה כללית";
$menu_tier_stats = "סטטיסטיקת Tier";
$menu_payment_history = "היסטוריית תשלומים";
$menu_commission_details = "פרטי עמלה";
$menu_recurring_commissions = "עמלות חוזרות";
$menu_traffic_log = "דו\"ח תנועה נכנסת";
$menu_heading_marketing = "חומרי שיווק";
$menu_banners = "באנרים";
$menu_text_ads = "פרסומות טקסט";
$menu_text_links = "קישורי טקסט";
$menu_email_links = "קישורי מייל";
$menu_html_links = "פרסומות HTML";
$menu_offline = "שיווק לא מקוון";
$menu_tier_linking_code = "קוד קישור Tier";
$menu_email_friends = "שלח מייל לחברים ולעמיתים";
$menu_custom_links = "צור קישורים משלך ועקוב אחריהם";
$menu_heading_management = "ניהול חשבון";
$menu_comalert = "הגדרות CommissionAlert";
$menu_comstats = "הגדרות CommissionStats";
$menu_edit_account = "עריכת חשבון";
$menu_change_pass = "שינוי סיסמה";
$menu_change_commission = "שינוי סגנון עמלה";
$menu_heading_general_info = "מידע כללי";
$menu_browse_affiliates = "קרא אודות שותפים אחרים";
$menu_faq = "שאלות נפוצות";
$suspended_title = "התרעת מצב חשבון";
$suspended_heading = "חשבונך מושהה";
$suspended_notes = "הערות מנהל";
$pending_title = "התרעת מצב חשבון";
$pending_heading = "חשבונך ממתין לאישור";
$pending_note = "לאחר אישור חשבונך, חומרים שיווק יהיו זמינים לשימושך.";
$faq_title = "שאלות נפוצות";
$faq_none = "לא קיימות שאלות נפוצות כעת";
$browse_title = "קרא אודות שותפים אחרים";
$browse_none = "לא קיימים שותפים אחרים";
$change_comm_title = "שינוי סגנון עמלה";
$change_comm_curr_comm = "סגנון עמלה נוכחי";
$change_comm_curr_pay = "רמת תשלום נוכחית";
$change_comm_new_comm = "סגנון עמלה חדש";
$change_comm_warning = "אם תשנה את סגנון העמלה, חשבונך יאופס לרמת תשלום 1";
$change_comm_button = "שנה סגנון עמלה";
$change_comm_no_other = "לא קיימים סגנונות עמלה אחרים";
$change_comm_level = "רמה";
$change_comm_updated = "סגנון עמלה עודכן";
$password_title = "שינוי סיסמה";
$password_old_password = "סיסמה ישנה";
$password_new_password = "סיסמה חדשה";
$password_confirm_password = "אשר סיסמה חדשה";
$password_button = "שנה סיסמה";
$password_warning_old_missing = "הסיסמה הישנה חסרה או שאינה תקינה";
$password_warning_new_missing = "לא הזנת סיסמה חדשה";
$password_warning_mismatch = "הסיסמה החדשה אינה תואמת";
$password_warning_invalid = "סיסמה לא תקינה - לחץ על קישורי העזרה";
$password_notice = "סיסמה עודכנה";
$edit_failed = "העדכון נכשל - ראה הודעות שגיאה";
$edit_success = "חשבון עודכן";
$edit_button = "ערוך חשבון";
$commissionstats_title = "הגדרות CommissionStats";
$commissionstats_info = "באמצעות התקנת CommissionStats יהיה באפשרותך לבדוק את הסטטיסטיקות שלך באופן מיידי, ישירות משולחן העבודה שלך! להתקנת תוכנה זו, הורד את CommissionStats ואז <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>חלץ</b></a> את הקובץ לדיסק הקשיח, והפעל את <b>setup.exe</b>. כאשר תתבקש להזין את פרטי ההתחברות שלך, הזן את הפרטים הבאים.";
$commissionstats_hint = "רמז: העתק והדבק כל שדה לדיוק מירבי";
$commissionstats_profile = "שם פרופיל";
$commissionstats_username = "שם משתמש";
$commissionstats_password = "סיסמה";
$commissionstats_id = "מזהה שותף";
$commissionstats_source = "קישור לנתיב מקור";
$commissionstats_download = "הורד את CommissionStats";
$commissionalert_title = "הגדרות CommissionAlert";
$commissionalert_info = "לאחר התקנת CommissionAlert אנו נעדכן אותך באופן מיידי אודות עמלות חדשות, ישירות לשולחן העבודה שלך! כדי להתקין תוכנה זו, הורד את CommissionAlert ואז <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>חלץ</b></a> את הקובץ לדיסק הקשיח, והפעל את <b>setup.exe</b>. כאשר תתבקש להזין את פרטי ההתחברות שלך, הזן את הפרטיםפ הבאים.";
$commissionalert_hint = "רמז: העתק והדבק כל שדה לדיוק מירבי";
$commissionalert_profile = "שם פרופיל";
$commissionalert_username = "שם משתמש";
$commissionalert_password = "סיסמה";
$commissionalert_id = "מזהה שותף";
$commissionalert_source = "קישור לנתיב מקור";
$commissionalert_download = "הורד את CommissionAlert";
$offline_title = "שיווק לא מקוון";
$offline_paragraph_one = "הרווח כסף באמצעות קידום האתר שלנו (באופן לא מקוון) אצל חבריך ועמיתיך!";
$offline_send = "שלח לקוחות ל";
$offline_page_link = "צפה בעמוד";
$offline_paragraph_two = "הלקוחות שלך יזינו את <b>מזהה השותף שלך</b> לתיבה שבעמוד המופיע לעיל. תהליך זה ירשום אותך כשותף לכל רכישה שהם יבצעו.";
$banners_title = "באנרים";
$banners_size = "גודל באנר";
$banners_description = "תיאור באנר";
$ad_title = "פרסומות טקסט";
$ad_info = "על ידי שימוש בקוד הקישור שסופק לך, באפשרותך לערוך את ערכת הצבעים, האורך והרוחב של פרסומת הטקסט שלך.";
$links_title = "שם קישור";
$email_title = "קישורי מייל";
$email_group = "קבוצת שיווק";
$email_button = "הצג קישורי מייל";
$email_no_group = "לא נבחרה קבוצה";
$email_choose = "אנא בחר קבוצת שיווק מהמופיעות לעיל";
$email_notice = "לקבוצות שיווק שונות עשויים להיות דפים שונים של תנועה נכנסת";
$email_ascii = "<b>גירסת טקסט/ASCII</b> - לשימוש במיילים טקסטואליים.";
$email_html = "<b>גירסת HTML</b> - לשימוש במיילים מבוססים HTML.";
$email_test = "קישור מבחן";
$email_test_info = "לכאן יופנו לקוחותיך באתר שלנו.";
$email_source = "קוד מקור - העתק/הדבק לתוכן המייל שלך";
$html_title = "שם פרסומת HTML";
$html_view_link = "צפה בפרסומת HTML זו";
$traffic_title = "דו\"ח תנועה נכנסת";
$traffic_display = "הצג אחרונים";
$traffic_display_visitors = "מבקרים";
$traffic_button = "הצג דו\"ח תנועה";
$traffic_title_details = "פרטי תנועה נכנסת";
$traffic_ip = "כתובת IP";
$traffic_refer = "קישור הפניה";
$traffic_date = "תאריך";
$traffic_time = "זמן";
$traffic_bottom_tag_one = "מציג אחרונים";
$traffic_bottom_tag_two = "מתוך";
$traffic_bottom_tag_three = "סך המבקרים הייחודיים";
$traffic_none = "לא קיימים דו\"חות תנועה";
$traffic_no_url = "לא זמין - ייתכן ומדובר בסימניה או קישור מייל";
$traffic_box_title = "קישור הפניה";
$traffic_box_info = "לחץ על הקישור לביקור באתר";
$payment_title = "היסטוריית תשלומים";
$payment_date = "תאריך תשלום";
$payment_commissions = "עמלות";
$payment_amount = "סכום תשלום";
$payment_totals = "סך הכל";
$payment_none = "לא קיימת היסטוריית תשלומים";
$tier_stats_title = "סטטיסטיקות Tier";
$tier_stats_accounts = "חשבונות Tier הנמצאים ישירות תחתיך";
$tier_stats_grab_link = "קבל את קוד קישור ה-Tier שלך";
$tier_stats_none = "לא קיימים חשבונות Tier";
$tier_stats_username = "שם משתמש";
$tier_stats_current = "עמלות נוכחיות";
$tier_stats_previous = "תשלומי עבר";
$tier_stats_totals = "סך הכל";
$recurring_title = "עמלות חוזרות";
$recurring_none = "לא קיימות עמלות חוזרות";
$recurring_date = "תאריך עמלה";
$recurring_status = "מצב עמלות חוזרות";
$recurring_payout = "התשלום הבא";
$recurring_amount = "סכום";
$recurring_every = "כל";
$recurring_in = "ב";
$recurring_days = "ימים";
$recurring_total = "סך הכל";
$tlinks_title = "הוסף אחרים ל-Tier שלך והרווח כסף גם באמצעותם!";
$tlinks_embedded_one = "אפשרות התשלום באמצעות הרשמה ל-Tier כבר פעילה בקישורי השותף הסטנדרטיים שלך!";
$tlinks_embedded_two = "השימוש במערכת ה-tier מאפשרות לך לשווק את תכנית השותפים שלנו בפני אחרים. ה-tier שלך יהיה ה-tier העליון, מעל כל אדם שיצטרף לתכנית השותפים שלנו באמצעות קישור ההפניה המיוחד שלך המופיע מטה. מידע נוסף בנוגע לרווחיך האפשריים תוכל למצוא למטה.";
$tlinks_embedded_current = "תשלום Tier נוכחי";
$tlinks_forced_two = "השימוש במערכת ה-tier מאפשרות לך לשווק את תכנית השותפים שלנו בפני אחרים. ה-tier שלך יהיה ה-tier העליון, מעל כל אדם שיצטרף לתכנית השותפים שלנו באמצעות קישור ההפניה המיוחד שלך המופיע מטה. מידע נוסף בנוגע לרווחיך האפשריים תוכל למצוא למטה.";
$tlinks_forced_code = "קישור הפניה Tier";
$tlinks_forced_paste = "העתק/הדבק את הקוד הנ\"ל באתרך";
$tlinks_forced_money = "מנהלי אתר מרוויחים כאן כסף!";
$comdetails_title = "פרטי עמלה";
$comdetails_date = "תאריך עמלה";
$comdetails_time = "זמן עמלה";
$comdetails_type = "סוג עמלה";
$comdetails_status = "מצב עדכני";
$comdetails_amount = "סכום עמלה";
$comdetails_additional_title = "פרטי עמלה נוספים";
$comdetails_additional_ordnum = "מספר הזמנה";
$comdetails_additional_saleamt = "כמות מכירות";
$comdetails_type_1 = "עמלת בונוס";
$comdetails_type_2 = "עמלה חוזרת";
$comdetails_type_3 = "עמלת Tier";
$comdetails_type_4 = "עמלה סטנדרטית";
$comdetails_status_1 = "שולם";
$comdetails_status_2 = "אושר - ממתין לתשלום";
$comdetails_status_3 = "ממתין לאישור";
$comdetails_not_available = "לא זמין";
$details_title = "פרטי עמלה";
$details_drop_1 = "עמלות סטנדרטיות נוכחיות";
$details_drop_2 = "עמלות Tier נוכחיות";
$details_drop_3 = "עמלות הממתינות לאישור";
$details_drop_4 = "עמלות סטנדרטיות ששולמו";
$details_drop_5 = "עמלות Tier ששולמו";
$details_button = "הצג עמלות";
$details_date = "תאריך";
$details_status = "מצב";
$details_commission = "עמלה";
$details_details = "הצג פרטים";
$details_type_1 = "שולם";
$details_type_2 = "ממתין לאישור";
$details_type_3 = "אושר - ממתין לתשלום";
$details_none = "לא קיימות עמלות לצפייה";
$details_no_group = "לא נבחרה קבוצת עמלות";
$details_choose = "אנא בחר קבוצת עמלות מהמופיעות לעיל";
$general_title = "עמלות נוכחיות - מהתשלום האחרון ועד היום";
$general_transactions = "עסקות";
$general_earnings_to_date = "רווחים נכון להיום";
$general_history_link = "הצג היסטוריית תשלומים";
$general_standard_earnings = "רווחים סטנדרטיים";
$general_current_earnings = "רווחים נוכחיים";
$general_traffic_title = "סטטיסטיקות תנועה";
$general_traffic_visitors = "מבקרים";
$general_traffic_unique = "מבקרים ייחודיים";
$general_traffic_sales = "מכירות מאושרות";
$general_traffic_ratio = "יחס מכירות";
$general_traffic_info = "סטטיסטיקות אלו אינם כוללים עמלות tier או עמלות חוזרות.";
$general_traffic_pay_type = "סוג תשלום";
$general_traffic_pay_level = "רמת תשלום נוכחית";
$general_notes_title = "הערות מהמנהל";
$general_notes_date = "תאריך יצירה";
$general_notes_to = "עבור";
$general_notes_all = "כל השותפים";
$general_notes_none = "לא קיימות הערות לצפייה";
$contact_left_column_title = "צור קשר";
$contact_left_column_text = "אנא אל תהסס ליצור קשר עם מנהל השותפים שלנו באמצעות הטופס מימין.";
$contact_title = "צור קשר";
$contact_name = "שם";
$contact_email = "כתובת מייל";
$contact_message = "הודעה";
$contact_chars = "תווים נשארו";
$contact_button = "שלח הודעה";
$contact_received = "קיבלנו את הודעתך, אנא המתן עד ל-24 שעות עבור קבלת מענה.";
$contact_invalid_name = "שם לא תקין";
$contact_invalid_email = "כתובת מייל לא תקינה";
$contact_invalid_message = "הודעה לא תקינה";
$invoice_button = "חשבונית";
$invoice_header = "חשבונית תשלום שותף";
$invoice_aff_info = "פרטי שותף";
$invoice_co_info = "מידע";
$invoice_acct_info = "פרטי חשבון";
$invoice_payment_info = "פרטי תשלום";
$invoice_comm_date = "תאריך תשלום";
$invoice_comm_amt = "סכום עמלה";
$invoice_comm_type = "סוג עמלה";
$invoice_admin_note = "הערת מנהל";
$invoice_footer = "סוף החשבונית";
$invoice_print = "הדפס חשבונית";
$invoice_none = "לא זמין";
$invoice_aff_id = "מזהה שותף";
$invoice_aff_user = "שם משתמש";
$menu_pdf_marketing = "עלוני שיווק PDF";
$menu_pdf_training = "מסמכי הדרכה PDF";
$marketing_target_url = "קישור יעד";
$marketing_source_code = "קוד מקור - העתק/הדבק לאתר שלך";
$marketing_group = "קבוצת שיווק";
$peels_title = "שם Page Peel";
$peels_view = "צפה ב-Page Peel זה";
$peels_description = "Page Peel מקופל";
$lb_head_title = "דרוש קוד HEAD עבור דף ה-HTML שלך";
$lb_head_description = "על מנת להשתמש ב-lightbox באתר שלך, עליך להוסיף את השורות הבאות לתגית ה-head בעמוד הרלוונטי.";
$lb_head_source_code = "הדבק את הקוד הבא לתגית ה-HEAD של מסמך ה-HTML שלך.";
$lb_head_code_notes = "עליך להוסיף קוד זה פעם אחת בלבד, גם אם הנך משתמש במספר רב של lightboxes בעמוד.";
$lb_head_tutorial = "צפה במדריך";
$lb_body_title = "שם Lightbox";
$lb_body_description = "תיאור Lightbox";
$lb_body_click = "לחץ על התמונה המופיעה לעיל כדי לצפות ב-lightbox.";
$lb_body_source_code = "הדבק את הקוד הבא לתגית ה-BODY של מסמך ה-HTML שבו תרצה שהתמונה תופיע.";
$pdf_title = "PDF";
$pdf_training = "מסמכי הדרכה";
$pdf_marketing = "עלוני שיווק";
$pdf_description_1 = "כדי לצפות ולהדפיס בחומרי השיווק שלנו, עליך להשתמש בתוכנה Adobe Reader.";
$pdf_description_2 = "התוכנה Adobe Reader ניתנת להורדה בחינם מהאתר של Adobe.";
$pdf_file_name = "שם קובץ";
$pdf_file_size = "גודל קובץ";
$pdf_file_description = "תיאור";
$pdf_bytes = "Bytes";
$menu_heading_training_materials = "חומרי הדרכה";
$menu_videos = "צפה בסרטוני הדרכה";
$menu_custom_manual = "מדריך לקישורי מעקב מותאמים אישית";
$menu_page_peels = "Page Peels";
$menu_lightboxes = "Lightboxes";
$menu_email_templates = "תבניות מייל";
$menu_heading_custom_links = "קישורי מעקב מותאמים אישית";
$menu_custom_reports = "דו\"חות";
$menu_keyword_links = "קישורי מעקב אחר מילות מפתח";
$menu_subid_links = "קישורי מעקב אחר תת-שותפים";
$menu_alteranate_links = "קישורים אלטרנטיביים לעמוד תנועה נכנסת";
$menu_heading_additional = "כלים נוספים";
$menu_drop_heading_stats = "סטטיסטיקה כללית";
$menu_drop_heading_commissions = "עמלות";
$menu_drop_heading_history = "היסטוריית תשלום";
$menu_drop_heading_traffic = "דו\"ח תנועה";
$menu_drop_heading_account = "החשבון שלי";
$menu_drop_heading_logo = "העלאת לוגו";
$menu_drop_heading_faq = "שאלות נפוצות";
$menu_drop_general_stats = "סטטיסטיקה כללית";
$menu_drop_tier_stats = "סטטיסטיקת Tier";
$menu_drop_current = "עמלות נוכחיות";
$menu_drop_tier = "עמלות Tier נוכחיות";
$menu_drop_pending = "ממתין לאישור";
$menu_drop_paid = "עמלות ששולמו";
$menu_drop_paid_rec = "עמלות Tier ששולמו";
$menu_drop_recurring = "עמלות חוזרות פעילות";
$menu_drop_edit = "ערוך חשבון";
$menu_drop_password = "שינוי סיסמה";
$menu_drop_change = "שינוי סגנון עמלה";
$account_hidden = "מוסתר";
$keyword_title = "קישורי מילות מפתח מותאמות אישית";
$keyword_info = "יצירת קישור מילת מפתח מותאמת אישית מאפשרת לך לעקוב אחר תנועה נכנסת ממקורות שונים. צור קישור עם עד 4 מילות מפתח שונות, ודו\"ח המעקב יציג בפניך דו\"ח מפורט עבור כל מילת מפתח שיצרת.";
$keyword_heading = "משתנים זמינים עבור מעקב אחר מילות מפתח מותאמות אישית";
$keyword_tracking = "מזהה מעקב";
$keyword_build = "כדי ליצור את הקישור שלך, צרף לסוף הקישור הבא את מזהה המעקב שלך ואת מילת המפתח שבה ברצונך להשתמש.";
$keyword_example = "דוגמה";
$keyword_tutorial = "צפה במדריך";
$sub_tracking_title = "מעקב אחר תת-שותפים";
$sub_tracking_info = "יצירת קישור עבור תת-שותפים מאפשרת לך למסור את קישור השותף שלך לשימוש השותפים שלך. אתה תדע באמצעות איזה שותף הרווחת עמלה כיוון שאנו נעדכן אותך איזה תת-שותף ביצע את המכירה. סיבה נוספת לשימוש בקישור תת-שותפים היא אם בבעלותך מערכת מעקב משלך, וברצונך לכלול אותה בדו\"ח.";
$sub_tracking_build = "החלף את ה-XXX עם מזהה השותף שבתכנית השותפים שלך. חזור על תהליך זה עבור כל השותפים שלך.";
$sub_tracking_example = "דוגמה";
$sub_tracking_tutorial = "צפה במדריך";
$sub_tracking_id = "מזהה תת-שותף";
$alternate_title = "קישורים אלטרנטיביים לעמוד תנועה נכנסת";
$alternate_option_1 = "אפשרות 1: יצירת קישורים אוטומטית";
$alternate_heading_1 = "יצירת קישורים אוטומטית";
$alternate_info_1 = "הגדר את דף התנועה הנכנסת שלך בעצמך על ידי הזנת הקישור שאליו אתה מעוניין להעביר תנועה, ואנו ניצור קישור עבורך. השימוש באפשרות זו יאפשר ליצור קישור קצר יותר לשימוש עם הקישור המוטמע בקישור הכללי, על ידי שימוש במזהה ייחודי השמור אצלנו.";
$alternate_button = "צור קישור";
$alternate_links_heading = "הקישורים האלטרנטיביים שלי לתנועה נכנסת";
$alternate_links_note = "בהסרת קישור מותאם אישית מעמוד זה, קישורים קיימים יישארו תקינים ופעילים.";
$alternate_links_remove = "הסר";
$alternate_option_2 = "אופציה 2: יצירת קישורים ידנית";
$alternate_info_2 = "אם אתה מעדיף לצרף קישורי שותף משלך יחד עם קישור לתנועה נכנסת, השתמש במבנה הבא.";
$alternate_variable = "משתנה לקישור לתנועה נכנסת";
$alternate_example = "דוגמה";
$alternate_build = "ליצירת הקישור שלך, קח את הקישור הבא וצרף אליו את הקישור לתנועה נכנסת הרלוונטי.";
$alternate_none = "לא נוצרו קישורים לתנועה נכנסת";
$alternate_tutorial = "צפה במדריך";
$cr_title = "דו\"ח מילות מפתח מותאמות אישית";
$cr_select = "בחר מילת מפתח";
$cr_button = "צור דו\"ח";
$cr_no_results = "לא נמצאו תוצאות חיפוש";
$cr_no_results_info = "נסה להשתמש בשילוב אחר של מילות מפתח";
$cr_used = "מילות המפתח שנעשה בהן שימוש";
$cr_found = "נמצא הקישור הבא";
$cr_times = "פעמים";
$cr_unique = "קישורים ייחודיים שנמצאו";
$cr_detailed = "דו\"ח קישורים מפורט";
$cr_export = "ייצא דו\"ח לאקסל";
$cr_none = "לא נמצאו מילות מפתח";
$logo_title = "העלאת לוגו החברה";
$logo_info = "אם ברצונך להעלות את לוגו החברה שלך, אנו נציג אותו בפני לקוחות שיגיעו לאתר שלנו. תכונה זו מאפשרת לנו להתאים את חוויית הלקוח באופן אישי כאשר הוא מבקר באתר שלנו.";
$logo_bullet_one = "קבצים תקינים הם .jpg, .gif או .png. אין להשתמש בתוכן flash.";
$logo_bullet_two = "תמונות לא ראויות יימחקו וחשבונך יושעה.";
$logo_bullet_three = "התמונה/הלוגו שלך לא יוצגו באתר שלנו עד שיאושרו על ידנו.";
$logo_bullet_size_one = "הרוחב המקסימלי של התמונות הוא";
$logo_bullet_size_two = "פיקסלים, והגובה המקסימלי הוא";
$logo_bullet_req_size_one = "הרוחב המינימלי של התמונות הוא";
$logo_bullet_req_size_two = "פיקסלים, והגובה המינימלי הוא";
$logo_bullet_pixels = "פיקסלים.";
$logo_choose = "בחר תמונה";
$logo_file = "בחר קובץ:";
$logo_browse = "עיין...";
$logo_button = "העלה";
$logo_current = "התמונה הנוכחית שלי";
$logo_remove = "הסר";
$logo_display_status = "מצב תמונה:";
$logo_pending = "ממתין לאישור";
$logo_approved = "מאושר";
$logo_success = "התמונה הועלתה בהצלחה, והיא כעת ממתינה לאישור.";
$signup_security_title = "אימות חשבון";
$signup_security_info = "אנא הזן את הקוד המופיע בקופסה. שלב זה מסייע לנו למנוע רישומים אוטומטיים.";
$signup_security_code = "קוד ביטחון";
$sub_tracking_none = "אין";
$missing_security_code = "פרטי אימות חשבון / קוד ביטחון לא תקינים או חסרים";
$alternate_success_title = "יצירת קישור בוצעה בהצלחה";
$alternate_success_info = "השתמש בקישור המופיע למטה והתחל להעביר תנועה לקישור שהגדרת.";
$alternate_failed_title = "שגיאה ביצירת הקישור";
$alternate_failed_info = "אנא הזן קישור תקין.";
$logo_missing_filename = "אנא בחר שם קובץ.";
$logo_required_width = "רוחב התמונה חייב להיות לפחות";
$logo_required_height = "גובה התמונה חייב להיות לפחות";
$logo_maximum_width = "רוחב התמונה יכול להיות לכל היותר";
$logo_maximum_height = "גובה התמונה יכול להיות לכל היותר";
$logo_size_maximum = "גודל התמונה יכול להיות לכל היותר";
$logo_bad_filetype = "סוג תמונה זה אינו מורשה. הסוגים המורשים הם .gif, .jpg ו-.png.";
$logo_upload_error = "שגיאה בהעלאת התמונה, אנא צור קשר עם מנהל השותפים.";
$logo_error_title = "שגיאה בהעלאת התמונה";
$logo_error_bytes = "bytes.";
$excel_title = "דו\"ח קישורי מילות מפתח מותאמות אישית";
$excel_tab_report = "דו\"ח מילות מפתח מותאמות אישית";
$excel_tab_logs = "דו\"חות תנועה";
$excel_date = "תאריך דו\"ח:";
$excel_affiliate = "מזהה שותף:";
$excel_criteria = "קריטריונים לקישור מילות מפתח";
$excel_link = "מבנה קישור";
$excel_hits = "ביקורים ייחודיים";
$excel_comm_stats = "ססטיסטיקות עמלות";
$excel_comm_current = "עמלות נוכחיות";
$excel_comm_paid = "עמלות ששולמו";
$excel_comm_total = "סה\"כ עמלות";
$excel_comm_ratio = "יחס המרה";
$excel_earned = "עמלות שנצברו";
$excel_earned_current = "עמלות נוכחיות";
$excel_earned_paid = "עמלות ששולמו";
$excel_earned_total = "סה\"כ עמלות שצברו";
$excel_earned_tab = "לחץ על לשונית דו\"חות תנועה נכנסת (למטה) לצפייה בדו\"ח התנועה עבור קישור זה.";
$excel_log_title = "דו\"ח תנועה של מילות מפתח מותאמות אישית";
$excel_log_ip = "כתובת IP";
$excel_log_refer = "קישור מפנה";
$excel_log_date = "תאריך";
$excel_log_time = "זמן";
$excel_log_target = "קישור יעד";
$etemplates_title = "תבניות מייל";
$etemplates_view_link = "צפה בתבנית מייל זו";
$etemplates_name = "שם תבנית";
$signup_maintenance_heading = "הודעת תחזוקה";
$signup_maintenance_info = "תהליך הרישום כבוי כעת. אנא נסה שנית מאוחר יותר.";
$marketing_group_title = "קבוצת שיווק";
$marketing_button = "הצג";
$marketing_no_group = "לא נבחרה קבוצה";
$marketing_choose = "אנא בחר קבוצת שיווק מהמופיעות לעיל";
$marketing_notice = "לקבוצות שיווק שונות עשויים להיות דפים שונים של תנועה נכנסת";
$canspam_heading = "קבלת חוקי CAN-SPAM";
$canspam_accept = "קראתי, הבנתי ואני מסכים לחוקי CAN-SPAM המופיעים לעיל.";
$canspam_error = "לא הסכמת להישמע לחוקי CAN-SPAM.";
$signup_banned = "התרחשה שגיאה בתהליך יצירת חשבונך. אנא צור קשר עם מנהל המערכת למידע נוסף.";
$header_testimonials = "המלצות של שותפים";
$testi_visit = "בקר באתר";
$testi_description = "כתוב את המלצתך לתכנית השותפים שלנו ואנו נפרסם אותה בעמוד &lt;a href=&quot;testimonials.php&quot;&gt;ההמלצות&lt;/a&gt; יחד עם קישור לאתר שלך.";
$testi_name = "שם";
$testi_url = "קישור לאתר";
$testi_content = "המלצה";
$testi_code = "קוד";
$testi_submit = "שלח המלצה";
$testi_na = "אין המלצות זמינות.";
$testi_title = "כתוב המלצה";
$testi_success_title = "המלצה הצליחה";
$testi_success_message = "תודה לך על כתיבת ההמלצה. הצוות שלנו יעבור עליה בקרוב.";
$testi_error_title = "שגיאה בהמלצה";
$testi_error_name_missing = "אנא הזן את שמך עבור המלצתך.";
$testi_error_url_missing = "אנא הזן את הקישור לאתר שלך עבור המלצתך.";
$testi_error_missing = "אנא כתוב תוכן עבור המלצתך.";
$menu_drop_delayed = "עמלות מעוכבות";
$details_drop_6 = "עמלות מעוכבות נוכחיות";
$details_type_6 = "מעוכב - יאושר בקרוב";
$comdetails_status_6 = "מעוכב - יאושר בקרוב";
$tc_reaccept_title = "התראה על שינוי בתנאי השימוש";
$tc_reaccept_sub_title = "עליך להסכים עם תנאי השימוש החדשים שלנו כדי להיכנס לחשבונך.";
$tc_reaccept_button = "קראתי, הבנתי ואני מסכים לתנאי השימוש.";
$tlinks_active = "מספר Tiers פעילים";
$tlinks_payout_structure = "מבנה תשלום Tier";
$tlinks_level = "רמה";
$tierText1 = "% חושבו מסכום העמלה של השותף המפנה.";
$tierText2 = "% חושבו מסכום העמלה של ה-tier העליון.";
$tierText3 = "% חושבו מסכום המכירה.";
$tierTextflat = "מחיר קבוע.";
$edit_custom_button = "ערוך תשובה";
$private_heading = "הרשמה פרטית";
$private_info = "תכנית השותפים שלנו אינה פתוחה לציבור הרחב, והיא דורשת קוד רישום להצטרפות. להלן מידע בנוגע לקבלת קוד רישום.";
$private_required_heading = "נדרש קוד רישום";
$private_code_title = "הזן קוד רישום";
$private_button = "שלח קוד";
$private_error_title = "קוד רישום לא תקין";
$private_error_invalid = "קוד הרישום שהזנת אינו תקין.";
$private_error_expired = "תוקפו של קוד הרישום שהזנת פג.";
$qr_code_title = "קודי QR";
$qr_code_size = "גודל קוד QR";
$qr_code_button = "הצג קוד QR";
$qr_code_offline_title = "שיווק לא מקוון";
$qr_code_offline_content1 = "הוסף קוד QR זה לעלוני השיווק, פלאיירים, כרטיסי הביקור, ועוד.";
$qr_code_offline_content2 = "- לחץ קליק-ימני על התמונה ואז על &lt;strong&gt;save-as&lt;/strong&gt; לשמירה במחשבך.";
$qr_code_online_title = "שיווק מקוון";
$qr_code_online_content = "הוסף קוד QR זה לאתר שלך, מדיה חברתית, בלוגים, ועוד.";
$menu_coupon = "קודי קופונים";
$coupon_title = "קודי הקופונים הזמינים שלך";
$coupon_desc = "חלק את קודי קופונים אלו והרווח עמלה בכל פעם שמישהו עושה שימוש בקוד שלך!";
$coupon_head_1 = "קוד קופון";
$coupon_head_2 = "הנחה ללקוח";
$coupon_head_3 = "סכום העמלה שלך";
$coupon_sale_amt = "מתוך סכום המכירה";
$coupon_flat_rate = "מחיר קבוע";
$coupon_default = "רמת תשלום ברירת מחדל";
$cc_vanity_title = "בקש קוד קופון מותאם אישית";
$cc_vanity_field = "קוד קופון";
$cc_vanity_button = "בקש קוד קופון";
$cc_vanity_error_missing = "<strong>שגיאה!</strong> אנא הזן קוד קופון.";
$cc_vanity_error_exists = "<strong>שגיאה!</strong> כבר ביקשת קוד זה. הקוד ממתין לאישור.";
$cc_vanity_error = "<strong>שגיאה!</strong> קוד קופון לא תקין. אנא הזן אותיות, מספרים ומקף-תחתון בלבד.";
$cc_vanity_success = "<strong>בוצע!</strong> נשלחה בקשה לקוד קופון מותאם אישית.";
$coupon_none = "לא קיימים קודי קופונים זמינים כעת.";
$pic_error_title = "שגיאה בהעלאת תמונה";
$pic_missing = "אנא בחר שם קובץ.";
$pic_invalid = "סוג תמונה זה אינו מורשה. הסוגים המורשים הינם .gif, .jpg ו-.png.";
$pic_error = "שגיאה בהעלאת התמונה, אנא צור קשר עם מנהל השותפים.";
$pic_success = "תמונתך הועלתה בהצלחה.";
$pic_title = "העלה תמונה שלך";
$pic_info = "העלאת תמונה שלך מסייעת בהתאמה אישית של התקשורת איתך.";
$pic_bullet_1 = "סוגי תמונות תקינות הכוללים .jpg, .gif או .png.";
$pic_bullet_2 = "תמונות לא ראויות יימחקו וחשבונך יושעה.";
$pic_bullet_3 = "התמונה שלך לא תוצג בפומבי. היא תצורף לחשבונך כך לצפייה על ידנו בלבד.";
$pic_file = "בחר קובץ:";
$pic_button = "העלה";
$pic_current = "התמונה הנוכחית שלי";
$pic_remove = "הסר תמונה";
$progress_title = "זכאות לתשלום הבא:";
$progress_complete = "הושלם.";
$progress_none = "אין לנו דרישות מינימום לביצוע תשלום.";
$progress_sentence_1 = "הרווחת";
$progress_sentence_2 = "מתוך";
$progress_sentence_3 = "הדרישות.";
$aff_lib_button = "<b>קבל את הגישה החופשית המגיעה לך!</b><BR />www.AffiliateLibrary.com";
$menu_announcements = "קמפיינים למדיה חברתית";
$announcements_name = "שם קמפיין";
$announcements_facebook_message = "הודעת פייסבוק";
$announcements_twitter_message = "הודעת טוויטר";
$announcements_facebook_link = "קישור פייסבוק";
$announcements_facebook_picture = "תמונת פייסבוק";
$general_last_30_days_activity = "פעילות ב-30 הימים האחרוניםLast 30 Days Activity";
$general_last_30_days_activity_traffic = "תנועה";
$general_last_30_days_activity_commissions = "עמלות";
$accountability_title = "אחריות ותקשורת";
$accountability_text = "<strong>במה מדובר?</strong><p>אנו נוקטים בגישה פעילה ליצירת אמון בינינו ובין השותפים שלנו. מטרתנו הינה לתת את המידע הרב ביותר אודות כל רווח ו/או סירוב של עמלה במערכת שלנו.</p><strong>תקשורת</strong><p>אנו זמינים עבור כל בקשת פירוט בנוגע לעמלה שסורבה. אנו עומדים בקשר קרוב עם השותפים שלנו, ואנו מעודדים שאלות, הערות והארות.</p>";
$debit_reason_0 = "אין";
$debit_reason_1 = "החזר כספי";
$debit_reason_2 = "החזר חיוב";
$debit_reason_3 = "דיווח הונאה";
$debit_reason_4 = "הזמנה שבוטלה";
$debit_reason_5 = "החזר כספי חלקי";
$menu_drop_pending_debits = "חיובים ממתינים";
$debit_amount_label = "סכום חיוב";
$debit_date_label = "תאריך חיוב";
$debit_reason_label = "סיבת חיוב";
$debit_paragraph = "החיובים ינוכו מהתשלום הבא שלך.";
$debit_invoice_amount = "פחות סכום החיוב";
$debit_revised_amount = "סכום תשלום מתוקן";
$mv_head_description = "הערה: באפשרותך לשים סרטון אחד בלבד בכל עמוד באתר שלך.";
$mv_head_source_code = "הדבק קוד זה לתוך תגית ה-HEAD במסמך ה-HTML שלך.";
$mv_body_title = "כותרת סרטון";
$mv_body_description = "תיאור";
$mv_body_source_code = "הדבק קוד זה לתוך תגית ה-BODY של מסמך ה-HTML שלך במיקום ברצוי עבור הסרטון.";
$menu_marketing_videos = "סרטונים";
$mv_preview_button = "תצוגה מקדימה";
$dt_no_data = "לא קיים מידע זמין בטבלה.";
$dt_showing_exists = "מציג _START_ עד _END_ מתוך _TOTAL_ רשומות.";
$dt_showing_none = "מציג 0 עד 0 מתוך 0 רשומות.";
$dt_filtered = "(מסונן מתוך סה\"כ _MAX_ רשומות)";
$dt_length_choice = "הצג _MENU_ רשומות.";
$dt_loading = "טוען...";
$dt_processing = "מעבד...";
$dt_no_records = "לא נמצאו רשומות תואמות.";
$dt_first = "ראשון";
$dt_last = "אחרון";
$dt_next = "הבא";
$dt_previous = "הקודם";
$dt_sort_asc = ": הפעל כדי לסדר את העמודה בסדר עולה";
$dt_sort_desc = ": הפעל כדי לסדר את העמודה בסדר יורד";
$choose_marketing_group = "בחר קבוצת שיווק";
$email_already_used_1 = "לא ניתן ליצור את החשבון. אנו מרשים רק";
$email_already_used_2 = "חשבון";
$email_already_used_3 = "עבור כל כתובת מייל.";
$missing_fax = "אנא הזן מספר פקס.";
$chart_last_6_months = "עמלות ששולמו ב-6 החודשים האחרונים";
$chart_last_6_months_paid = "עמלות ששולמו";
$chart_this_month = "5 השותפים המובילים החודש";
$chart_this_month_none = "אין נתונים להצגה.";
$login_return = "חזרה לדף הבית של השותפים";
$login_lost_details = "הזן את שם המשתמש שלך ואנו נשלח לך מייל עם פרטי ההתחברות שלך.";
$account_edit_general_prefs = "הגדרות כלליות";
$account_edit_email_language = "שפת מייל";
$footer_connect = "צור עימנו קשר";
$modal_close = "סגור";
$vat_amount_heading = "סכום מע\"מ";
$menu_logout = "התנתק";
$menu_upload_picture = "העלה תמונה";
$menu_offer_testi = "כתוב המלצה";
$fb_login = "התחבר באמצעות פייסבוק";
$fb_permissions = "שגיאת הרשאות. אנא הענק לאתר הרשאה להשתמש בכתובת המייל שלך.";
$announcements_published = "הודעה פורסמה";
$training_videos_title = "סרטוני הדרכה";
$training_videos_general = "שיווק כללי";
$commission_method = "שיטת עמלה";
$how_will_you_earn = "כיצד תוכל להרוויח עמלות?";
$pm_account_credit = "אנו נזכה את חשבונך בסכום העמלות שהרווחת.";
$pm_check_money_order = "נשלח לך המחאה בדואר.";
$pm_paypal = "נשלח לך תשלום ב-PayPal.";
$pm_stripe = "נשלח לך תשלום ב-Stripe.";
$pm_wire = "נעביר לך את התשלום באמצעות העברה בנקאית.";
$add_to_signup_left_column_text = "<span style=\"color:#CC0000; font-style:italic;\">* מסמן שדה חובה.</span>";
$paypal_email = "כתובת מייל PayPal";
$stripe_acct_details = "פרטי חשבון Stripe";
$stripe_connect = "באפשרותך להתחבר לחשבון ה-Stripe שלך מעמוד הגדרות החשבון שלך לאחר ההרשמה.";
$stripe_success = "החיבור לחשבון ה-Stripe שלך בוצע בהצלחה";
$stripe_settings = "הגדרות Stripe";
$stripe_connect_edit = "התחבר ל-Stripe";
$stripe_delete = "מחיקת חשבון Stripe";
$stripe_confirm = "האם אתה בטוח שברצונך למחוק חשבון זה?";
$payment_settings = "הגדרות תשלום";
$edit_payment_settings = "ערוך הגדרות תשלום";
$invalid_paypal_address = "כתובת מייל PayPal לא תקינה.";
$payment_method_error = "אנא בחר שיטת תשלום.";
$payment_settings_updated = "הגדרות תשלום עודכנו.";
$stripe_removed = "חשבון Stripe הוסר.";
$payment_settings_success = "בוצע!";
$payment_update_notice_1 = "התראה!";
$payment_update_notice_2 = "בחרת לקבל תשלום <strong>[payment_option_here]</strong> מאיתנו. אנא <a href=\"account.php?page=48\" style=\"font-weight:bold;\">לחץ כאן</a> לחיבור <strong>[payment_option_here]</strong> חשבונך.";
$pm_title_credit = "חשבון אשראי";
$pm_title_mo = "בדוק/הזמנת כסף";
$pm_title_paypal = "PayPal";
$pm_title_stripe = "Stripe";
$pm_title_wire = "העברה בנקאית";
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
        $st = $db->prepare("insert into idevaff_language_packs (name, status, def, table_name, user_created, direction) VALUES (?, 1, 0, ?, 0, 1)");
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