<?PHP

//-------------------------------------------------------
	  $language_pack_name = "turkish";
	  $language_pack_table_name = "turkish";
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
$header_title = "Ortaklık Programı";
$header_indexLink = "Ortak Ana Sayfa";
$header_signupLink = "Şimdi Kaydolun";
$header_accountLink = "Hesap Yönetimi";
$header_emailLink = "Bize Ulaşın";
$header_greeting = "Hoş Geldiniz";
$header_nonLogged = "Misafir";
$header_logout = "Çıkış Yapın";
$footer_tag = "Ortaklık Programı Yazılım Sağlayıcı iDevAffiliate";
$footer_copyright = "Telif Hakları";
$footer_rights = "Tüm Hakları Saklıdır";
$index_heading_1 = "Ortaklık Programımıza Hoş Geldiniz!";
$index_paragraph_1 = "Programımıza katılmak ücretsizdir, kaydolmak kolaydır ve herhangi bir teknik bilgi gerektirmez. Ortaklık programları İnternette oldukça yaygın ve web sitesi sahiplerine, siteleri üzerinden ek bir gelir sağlama yolu sunar. Ortaklar ticari web siteleri için trafik ve satış yaratırlar ve karşılığında komisyon ödemesi alırlar.";
$index_heading_2 = "Nasıl Çalışır?";
$index_paragraph_2 = "Bir ortaklık programına katıldığınızda size sitenize koymanız için bazı banner ve metin bağlantıları verilir. Bir kullanıcı bağlantılarınızdan herhangi birine tıkladığında sitemize yönlendirilirler ve sitemizdeki etkinlikleri ortaklık program yazılımıyla takip edilir. Komisyon türünüze göre komisyon kazanırsınız.";
$index_heading_3 = "Gerçek Zamanlı İstatistikler ve Raporlama!";
$index_paragraph_3 = "Satışlarınızı, trafiğinizi, hesap durumunuzu kontrol etmek ve bannerlarınızın performansını görmek için günün her saati oturum açabilirsiniz.";
$index_login_title = "Ortak Oturum Açma";
$index_login_username = "Kullanıcı Adı";
$index_login_password = "Şifre";
$index_login_username_field = "kullanıcı adı";
$index_login_password_field = "şifre";
$index_login_button = "Oturum Aç";
$index_login_signup_link = "Kaydolmak İçin Buraya Tıklayın";
$index_table_title = "Program Detayları";
$index_table_commission_type = "Komisyon Türü";
$index_table_initial_deposit = "Başlangıç Yatırımı";
$index_table_requirements = "Ödeme Gereksinimleri";
$index_table_duration = "Ödeme Süresi";
$index_table_choose = "Aşağıdaki ödeme seçeneklerinden birini seçin!";
$index_table_sale = "Satış-Başı-Ödeme";
$index_table_click = "Tıklama-Başı-Ödeme";
$index_table_sale_text = "getirdiğiniz her bir satış için.";
$index_table_click_text = "getirdiğiniz her bir tıklama için.";
$index_table_deposit_tag = "Hemen şimdi kaydolun!";
$index_table_requirements_tag = "Ödeme için gerekli en düşük tutar.";
$index_table_duration_tag = "Ödemeler, ilerleyen aylar için ayda bir kez yapılır.";
$signup_left_column_text = "Ortaklık programımıza katılın ve bize yönlendirdiğiniz her bir satış için para kazanın! Sadece hesap oluşturun, Simply create your account, bağlantı kodlarınızı web sitenize yerleştirin ve ziyaretçileriniz bizim müşterilerimiz haline gelirken oturup hesabınızdaki paranın artışını izleyin.";
$signup_left_column_title = "Hoş Geldiniz Ortağımız!";
$signup_login_title = "Hesap Oluşturun";
$signup_login_username = "Kullanıcı Adı";
$signup_login_password = "Şifre";
$signup_login_password_again = "Şifre Tekrar";
$signup_login_minmax_chars = "- Kullanıcı adı en az user_min_chars karakter uzunluğunda olabilir. &lt;br /&gt;- Kullanıcı adı alfanümerik olabilir.&lt;br /&gt;- Kullanıcı adı şu karakterleri içerebilir: _ (yalnızca alt çizgi)&lt;br /&gt;&lt;br /&gt;- Şifre en az pass_min_chars karakter uzunluğunda olabilir. &lt;br /&gt;- Şifre alfanümerik olabilir.&lt;br /&gt;- Şifre şu karakterleri içerebilir:  characters_allowed";
$signup_login_must_match = "Bu girdi Şifre girdisiyle eşleşmelidir.";
$signup_standard_title = "Standart Bilgiler";
$signup_standard_email = "Eposta Adresi";
$signup_standard_company = "Şirket Adı";
$signup_standard_checkspayable = "Çeklerin Ödenebileceği Kişi";
$signup_standard_weburl = "Web sitesi Adresi";
$signup_standard_taxinfo = "Vergi ID, SSN veya VAT";
$signup_personal_title = "Kişisel Bilgiler";
$signup_personal_fname = "Adınız";
$signup_personal_state = "Eyalet veya Şehir";
$signup_personal_lname = "Soyadınız";
$signup_personal_phone = "Telefon Numarası";
$signup_personal_addr1 = "Açık Adres";
$signup_personal_fax = "Faks Numarası";
$signup_personal_addr2 = "Ek Adres";
$signup_personal_zip = "Zip Kodu";
$signup_personal_city = "İl";
$signup_personal_country = "Ülke";
$signup_commission_title = "Komisyon Ödemesi";
$signup_commission_howtopay = "Size nasıl ödeme yapmamızı istersiniz?";
$signup_commission_style_PPS = "Satış-Başı-Ödeme";
$signup_commission_style_PPC = "Tıklama-Başı-Ödeme";
$signup_terms_title = "Şartlar ve Koşullar";
$signup_terms_agree = "Yukarıdaki şartlar ve koşulları okudum, anladım ve kabul ediyorum.";
$signup_page_button = "Hesabımı Oluştur";
$signup_success_email_comment = "Size Kullanıcı Adı ve Şifrenizi içeren bir eposta gönderdik.<BR />\r\nBu bilgiyi ilerde başvurmak üzere güvenli bir yerde saklayınız.";
$signup_success_login_link = "Hesabınıza Oturum Açın";
$custom_fields_title = "Kullanıcı Tanımlı Alanlar";
$logout_msg = "<b>Oturumunuzu Kapattınız</b><BR />Ortaklık programımıza katılımınızdan ötürü teşekkür ederiz.";
$signup_page_success = "Hesabınız Oluşturuldu";
$login_left_column_title = "Hesap Giriş";
$login_left_column_text = "Hesap istatistikleriniz, bannerlarınız, bağlantı kodlarınız, SSS ve daha fazlasına erişim sağlamak için kullanıcı adı ve şifrenizi girin.<BR/ ><BR/ >Şifrenizi hatırlayamıyorsanız, kullanıcı adınızı yazın, size eposta ile giriş bilgilerinizi gönderelim.<BR /><BR />";
$login_title = "Hesabınıza Giriş Yapın";
$login_username = "Kullanıcı Adı";
$login_password = "Şifre";
$login_invalid = "Hatalı Giriş";
$login_now = "Hesabıma Giriş Yap";
$login_send_title = "Şifrenize mi İhtiyacınız Var?";
$login_send_username = "Kullanıcı Adı";
$login_send_info = "Giriş Bilgileriniz Epostanıza Gönderildi";
$login_send_pass = "Eposta ile Gönder";
$login_send_bad = "Kullanıcı Adı Bulunamadı";
$help_new_password_heading = "Yeni Şifre";
$help_new_password_info = "Şifreniz en az pass_min_chars uzunluğunda olabilir. Yalnızca harfler, sayılar ve şu karakterlerden oluşabilir:   characters_allowed";
$help_confirm_password_heading = "Yeni Şifreyi Doğrula";
$help_confirm_password_info = "Bu şifre girdisi Yeni Şifre girdisiyle eşleşmelidir.";
$help_custom_links_heading = "Takip Anahtar Kelimesi";
$help_custom_links_info = "Anahtar kelimeniz 30 karakterden uzun olamaz. Yalnızca harfler, rakamlar ve tire içerebilir.";
$error_title = "Aşağıda Hatalar Tespit Edildi";
$username_invalid = "Geçersiz kullanıcı adı. Yalnızca harfler, sayılar ve alt çizgilerden oluşabilir.";
$username_taken = "Seçtiğiniz kullanıcı adı başkası tarafından alınmış.";
$username_short = "Kullanıcı adı çok kısa, kullanıcı adı en az user_min_chars karakter uzunluğunda olmalıdır.";
$username_long = "Kullanıcı adı çok uzun. kullanıcı adı en çok user_max_chars karakter uzunluğunda olmalıdır.";
$password_invalid = "Geçersiz şifre. Yalnızca harfler, sayılar ve şu karakterlerden oluşabilir:  characters_allowed";
$password_short = "Şifreniz çok kısa, şifreniz en az pass_min_chars karakter uzunluğunda olmalıdır.";
$password_long = "Şifreniz çok uzun, şifreniz en çok pass_max_chars karakter uzunluğunda olmalıdır.";
$password_mismatch = "Girdiğiniz şifreler eşleşmiyor.";
$missing_checks = "Lütfen şifrelerin ödenebileceği kişinin adını yazın.";
$missing_tax = "Lütfen Vergi Kimlik Numaranızı, Sosyal Güvenlik Numaranız ve KDV bilgilerinizi girin.";
$missing_fname = "Lütfen adınızı yazın.";
$missing_lname = "Lütfen soyadınızı yazın.";
$missing_email = "Lütfen eposta adresinizi yazın.";
$invalid_email = "Eposta adresiniz geçersiz.";
$missing_address = "Lütfen açık adresinizi yazın.";
$missing_city = "Lütfen ilinizi yazın.";
$missing_company = "Lütfen şirket isminizi yazın.";
$missing_state = "Lütfen eyalet veya bölgenizi yazın.";
$missing_zip = "Lütfen posta kodunuzu yazın.";
$missing_phone = "Lütfen telefon numaranızı yazın.";
$missing_website = "Lütfen web sitesi adresinizi yazın.";
$missing_paypal = "PayPal ile ödemeyi seçtiniz, lütfen PayPal hesabınızı yazın.";
$missing_terms = "Şartlar ve Koşulları kabul etmediniz.";
$paypal_required = "Ödeme için bir PayPal hesabı gerekir.";
$missing_custom = "Lütfen şu ad verilmiş alanları doldurun:";
$account_total_transactions = "Bütün İşlemler";
$account_standard_linking_code = "Standart Bağlantı Kodu - Epostalarda Kullanmak İçin Harika!";
$account_copy_paste = "Yukarıdaki Kodu Web Siteniz veya Epostalarınıza Kopyalayıp/Yapıştırın";
$account_not_approved = "Hesabınız Şu Anda Onay Bekliyor";
$account_suspended = "Hesabınız Askıya Alınmış Durumda";
$account_standard_earnings = "Standart Kazanımlar";
$account_inc_bonus = "bonus içeren";
$account_second_tier = "Kademeli Kazanımlar";
$account_recurring = "Tekrar Eden Kazanımlar";
$account_not_available = "N/A";
$account_earned_todate = "Şu Tarihe Kadar Toplam Kazanımlar";
$menu_heading_overview = "Hesap Genel Bakış";
$menu_general_stats = "Genel İstatistikler";
$menu_tier_stats = "Kademe İstatistikleri";
$menu_payment_history = "Ödeme Geçmişi";
$menu_commission_details = "Komisyon Detayları";
$menu_recurring_commissions = "Tekrar Eden Komisyonlar";
$menu_traffic_log = "Gelen Trafik Kaydı";
$menu_heading_marketing = "Pazarlama Materyalleri";
$menu_banners = "Bannerlar";
$menu_text_ads = "Metin Reklamları";
$menu_text_links = "Metin Bağlantılar";
$menu_email_links = "Eposta Bağlantıları";
$menu_html_links = "HTML Reklamları";
$menu_offline = "Çevrimdışı Pazarlama";
$menu_tier_linking_code = "Kademeli Bağlantı Kodu";
$menu_email_friends = "Arkadaş ve İş Arkadaşlarınıza Eposta Gönderin";
$menu_custom_links = "Kendi Bağlantılarınızı Oluşturun ve Takip Edin";
$menu_heading_management = "Hesap Yönetimi";
$menu_comalert = "KomisyonAlarmı Kurulum";
$menu_comstats = "Komisyonİstatistikleri Kurulum";
$menu_edit_account = "Hesabımı Düzenle";
$menu_change_pass = "Şifremi Değiştir";
$menu_change_commission = "Komisyon Şeklimi Değiştir";
$menu_heading_general_info = "Genel Bilgiler";
$menu_browse_affiliates = "Diğer Ortaklara Göz At";
$menu_faq = "Sıkça Sorulan Sorular";
$suspended_title = "Hesap Durumu Alarmı";
$suspended_heading = "Hesabınız Askıya Alınmış Durumda";
$suspended_notes = "Yönetici Notları";
$pending_title = "Hesap Durumu Alarmı";
$pending_heading = "Hesabınız Şu Anda Onay Bekliyor";
$pending_note = "Hesabınızı onaylamamızın ardından pazarlama materyallerinizi kullanmaya başlayabileceksiniz.";
$faq_title = "Sıkça Sorulan Sorular";
$faq_none = "Henüz Hiç SSS Yok";
$browse_title = "Diğer Ortaklara Göz At";
$browse_none = "İncelenebilecek Başka Ortak Bulunmuyor";
$change_comm_title = "Komisyon Şeklini Değiştir";
$change_comm_curr_comm = "Mevcut Komisyon Şekli";
$change_comm_curr_pay = "Mevcut Ödeme Seviyesi";
$change_comm_new_comm = "Yeni Komisyon Şekli";
$change_comm_warning = "Komisyon Şeklinizi Değiştirirseniz, Hesabınız 1. Ödeme Seviyesine Dönecektir";
$change_comm_button = "Komisyon Şekillerini Değiştir";
$change_comm_no_other = "Başka Bir Komisyon Şekli Mevcut Değil";
$change_comm_level = "Seviye";
$change_comm_updated = "Komisyon Şekli Güncellendi";
$password_title = "Şifremi Değiştir";
$password_old_password = "Eski Şifre";
$password_new_password = "Yein Şifre";
$password_confirm_password = "Yeni Şifreyi Doğrula";
$password_button = "Şifreyi Değiştir";
$password_warning_old_missing = "Eski Şifre Eksik veya Hatalı";
$password_warning_new_missing = "Yeni Şifre Girilmedi";
$password_warning_mismatch = "Yeni Şifre Eşleşmiyor";
$password_warning_invalid = "Şifre Geçersiz - Yardım Bağlantılarına Tıklayın";
$password_notice = "Şifre Güncellendi";
$edit_failed = "Güncelleme Başarısız - Yukarıdaki Hatalara Bakın";
$edit_success = "Hesap Güncellendi";
$edit_button = "Hesabımı Düzenle";
$commissionstats_title = "Komisyonİstatistikleri Kurulum";
$commissionstats_info = "Komisyonİstatistikleri\'ni kurarak istatistiklerinizi anında, Windows masaüstünüzden kontrol edebilirsiniz! Bu özelliği yüklemek ve Komisyonİstatistikleri\'ni indirmek için paketi sabit diskinize <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>çıkarın</b></a> ve <b>setup.exe</b> dosyasını çalıştırın. Giriş bilgileriniz istendiğinde aşağıdaki bilgileri girin.";
$commissionstats_hint = "İpucu: Kesinlik Sağlamak İçin Her Bir Girdiyi Kopyalayıp Yapıştırın";
$commissionstats_profile = "Profil Adı";
$commissionstats_username = "Kullanıcı Adı";
$commissionstats_password = "Şifre";
$commissionstats_id = "Ortak Kimliği";
$commissionstats_source = "Kaynak Yolu URL\'si";
$commissionstats_download = "Komisyonİstatistikleri İndir";
$commissionalert_title = "KomisyonAlarmı Kurulum";
$commissionalert_info = "KomisyonAlarmı\'nı kurarak yeni komisyonlarınızla ilgili anında, Windows masaüstünüzden bildirim alabilirsiniz! Bu özelliği yüklemek ve KomisyonAlarmı\'nı indirmek için paketi sabit diskinize <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>çıkarın</b></a> ve <b>setup.exe</b> dosyasını çalıştırın. Giriş bilgileriniz istendiğinde aşağıdaki bilgileri girin.";
$commissionalert_hint = "İpucu: Kesinlik Sağlamak İçin Her Bir Girdiyi Kopyalayıp Yapıştırın";
$commissionalert_profile = "Profil Adı";
$commissionalert_username = "Kullanıcı Adı";
$commissionalert_password = "Şifre";
$commissionalert_id = "Ortak Kimliği";
$commissionalert_source = "Kaynak Yolu URL\'si";
$commissionalert_download = "KomisyonAlarmı İndir";
$offline_title = "Çevrimdışı Pazarlama";
$offline_paragraph_one = "Web Sitemizi (çevrimdışı) arkadaşlarınıza ve iş arkadaşlarınıza tanıtarak para kazanın!";
$offline_send = "Müşterileri Gönderin";
$offline_page_link = "sayfayı görüntüle";
$offline_paragraph_two = "Müşterileriniz sizin <b>Ortak Kimliği numaranızı</b> yukarıdaki sayfada bulunan kutuya girdiğinde, siz, yaptıkları herhangi bir alışveriş için ortak olarak kaydolacaksınız.";
$banners_title = "Bannerlar";
$banners_size = "Banner Boyutu";
$banners_description = "Banner Tanımı";
$ad_title = "Metin Reklamlar";
$ad_info = "Verilen bağlantı kodunu kullanarak Metin Reklamınızın renk düzeni, yükseklik ve genişliğini ayarlayabilirsiniz.";
$links_title = "Bağlantı Adı";
$email_title = "Eposta Bağlantıları";
$email_group = "Pazarlama Grubu";
$email_button = "Eposta Bağlantılarını Görüntüle";
$email_no_group = "Grup Seçilmedi";
$email_choose = "Lütfen Yukarıdan Bir Pazarlama Grubu Seçin";
$email_notice = "Pazarlama Gruplarının Farklı Gelen Trafiğe Sahip Sayfaları Olabilir";
$email_ascii = "<b>ASCII/Metin Sürümü</b> - Düz Metin epostalarda kullanmak için.";
$email_html = "<b>HTML Sürümü</b> - HTML ile oluşturulmuş epostalarda kullanmak için.";
$email_test = "Bağlantıyı Sına";
$email_test_info = "Müşterileriniz web sitemizde bu bölüme yönlendirilecek.";
$email_source = "Kaynak Kodu - Eposta Mesajlarınıza Kopyalayıp/Yapıştırın";
$html_title = "HTML Reklam Adı";
$html_view_link = "Bu HTML Reklamı Görüntüle";
$traffic_title = "Gelen Trafik Kaydı";
$traffic_display = "Sonuncuyu Göster";
$traffic_display_visitors = "Ziyaretçiler";
$traffic_button = "Trafik Kaydını Görüntüle";
$traffic_title_details = "Gelen Trafik Detayları";
$traffic_ip = "IP Adresi";
$traffic_refer = "Referans Gösteren URL";
$traffic_date = "Tarih";
$traffic_time = "Saat";
$traffic_bottom_tag_one = "Toplam Tekil Ziyaretçi";
$traffic_bottom_tag_two = "\'den";
$traffic_bottom_tag_three = "Sonuncusu Gösteriliyor";
$traffic_none = "Trafik Kaydı Bulunmuyor";
$traffic_no_url = "N/A - Olası Yer İmi veya Eposta Bağlantısı";
$traffic_box_title = "Referans Gösteren URL\'nin Tamamı";
$traffic_box_info = "Web Sitesine Gitmek İçin Bağlantıya Tıklayın";
$payment_title = "Ödeme Geçmişi";
$payment_date = "Ödeme Tarihi";
$payment_commissions = "Komisyonlar";
$payment_amount = "Ödeme Tutarı";
$payment_totals = "Toplamlar";
$payment_none = "Ödeme Geçmişi Bulunmuyor";
$tier_stats_title = "Kademe İstatistikleri";
$tier_stats_accounts = "Doğrudan Sizin Altınızdaki Kademe Hesapları";
$tier_stats_grab_link = "Kademe Bağlantı Kodunuzu Alın";
$tier_stats_none = "Kademe Hesabı Bulunmuyor";
$tier_stats_username = "Kullanıcı Adı";
$tier_stats_current = "Mevcut Komisyonlar";
$tier_stats_previous = "Önceki Ödemeler";
$tier_stats_totals = "Toplamlar";
$recurring_title = "Tekrar Eden Komisyonlar";
$recurring_none = "Tekrar Eden Komisyon Bulunmuyor";
$recurring_date = "Komisyon Tarihi";
$recurring_status = "Tekrar Eden Durumu";
$recurring_payout = "Bir Sonraki Ödeme";
$recurring_amount = "Tutar";
$recurring_every = "Her";
$recurring_in = "";
$recurring_days = "Günde";
$recurring_total = "Toplam";
$tlinks_title = "Başkalarını Kendi Kademelerinize Ekleyin Ve Onlar Üzerinden De Para Kazanın!";
$tlinks_embedded_one = "Kademe Kaydetme Kredilendirmesi Standart Ortaklık Bağlantılarınızda Zaten Aktif Durumda!";
$tlinks_embedded_two = "Kademe sistemini kullanmak orta programımızı başkalarına pazarlayabilmenize imkan tanır. Herhangi biri aşağıdaki size özel kademe referans bağlantısını kullanarak ortaklık programımıza katıldığında siz en üst kademe haline gelirsiniz. Ne kadar kazanabileceğinizle ilgili bilgi aşağıdadır.";
$tlinks_embedded_current = "Mevcut Kademeli Ödeme";
$tlinks_forced_two = "Kademe sistemini kullanmak orta programımızı başkalarına pazarlayabilmenize imkan tanır. Herhangi biri aşağıdaki size özel kademe referans bağlantısını kullanarak ortaklık programımıza katıldığında siz en üst kademe haline gelirsiniz. Ne kadar kazanabileceğinizle ilgili bilgi aşağıdadır.";
$tlinks_forced_code = "Kademe Referans Bağlantısıi";
$tlinks_forced_paste = "Yukarıdaki Kodu Web Sitenize Kopyalayıp/Yapıştırın";
$tlinks_forced_money = "Webmasterlar Burada Para Kazanın!";
$comdetails_title = "Komisyon Detayları";
$comdetails_date = "Komisyon Tarihi";
$comdetails_time = "Komisyon Zamanı";
$comdetails_type = "Komisyon Türü";
$comdetails_status = "Mevcut Durum";
$comdetails_amount = "Komisyon Tutarı";
$comdetails_additional_title = "Ek Komisyon Detayları";
$comdetails_additional_ordnum = "Sipariş Numarası";
$comdetails_additional_saleamt = "Satış Tutarı";
$comdetails_type_1 = "Bonus Komisyon";
$comdetails_type_2 = "Tekrar Eden Komisyon";
$comdetails_type_3 = "Kademeli Komisyon";
$comdetails_type_4 = "Standart Komisyon";
$comdetails_status_1 = "Ödendi";
$comdetails_status_2 = "Onaylandı - Ödeme Bekleniyor";
$comdetails_status_3 = "Onay Bekleniyor";
$comdetails_not_available = "N/A";
$details_title = "Komisyon Detayları";
$details_drop_1 = "Mevcut Standart Komisyonlar";
$details_drop_2 = "Mevcut Kademe Komisyonlar";
$details_drop_3 = "Komisyonlar Onay Bekliyor";
$details_drop_4 = "Ödenmiş Standart Komisyonlar";
$details_drop_5 = "Ödenmiş Kademeli Komisyonlar";
$details_button = "Komisyonları Görüntüle";
$details_date = "Tarih";
$details_status = "Durum";
$details_commission = "Komisyon";
$details_details = "Detayları Görüntüle";
$details_type_1 = "Ödendi";
$details_type_2 = "Onay Bekleniyor";
$details_type_3 = "Onaylandı - Ödeme Bekleniyor";
$details_none = "Görüntülenecek Komisyon Yok";
$details_no_group = "Komisyon Grubu Seçilmedi";
$details_choose = "Lütfen Yukarıdan Bir Komisyon Grubu Seçin";
$general_title = "Mevcut Komisyonlar - Son Ödemeden Bugüne";
$general_transactions = "Hareketler";
$general_earnings_to_date = "Bugüne Kadarki Kazanımlar";
$general_history_link = "Ödeme Geçmişini Görüntüle";
$general_standard_earnings = "Standart Kazanımlar";
$general_current_earnings = "Mevcut Kazanımlar";
$general_traffic_title = "Trafik İstatistikleri";
$general_traffic_visitors = "Ziyaretçiler";
$general_traffic_unique = "Tekil Ziyaretçiler";
$general_traffic_sales = "Onaylanan Satışlar";
$general_traffic_ratio = "Satış Oranı";
$general_traffic_info = "Bu istatistikler tekrar eden veya kademeli komisyonları içermez.";
$general_traffic_pay_type = "Ödeme Türü";
$general_traffic_pay_level = "Mevcut Ödeme Seviyesi";
$general_notes_title = "Yöneticiden Notlar";
$general_notes_date = "Oluşturulma Tarihi";
$general_notes_to = "Kime";
$general_notes_all = "Tüm Ortaklar";
$general_notes_none = "Görüntülenecek Not Yok";
$contact_left_column_title = "Bize Ulaşın";
$contact_left_column_text = "Lütfen sağdaki formu kullanarak ortak yöneticimizle iletişime geçmekten çekinmeyin.";
$contact_title = "Bize Ulaşın";
$contact_name = "Adınız";
$contact_email = "Eposta Adresiniz";
$contact_message = "Mesaj";
$contact_chars = "karakter kaldı";
$contact_button = "Mesajı Gönder";
$contact_received = "Mesajınızı aldık, cevap vermemiz için lütfen bize 24 saat verin.";
$contact_invalid_name = "Geçersiz Ad";
$contact_invalid_email = "Geçersiz Eposta Adresi";
$contact_invalid_message = "Geçersiz Mesaj";
$invoice_button = "Fatura";
$invoice_header = "ORTAKLIK ÖDEME FATURASI";
$invoice_aff_info = "Ortak Bilgileri";
$invoice_co_info = "Bilgi";
$invoice_acct_info = "Hesap Bilgileri";
$invoice_payment_info = "Ödeme Bilgileri";
$invoice_comm_date = "Ödeme Tarihi";
$invoice_comm_amt = "Komisyon Tutarı";
$invoice_comm_type = "Komisyon Türü";
$invoice_admin_note = "Yönetici Notu";
$invoice_footer = "FATURA SONU";
$invoice_print = "Faturayı Yazdır";
$invoice_none = "N/A";
$invoice_aff_id = "Ortak Kimliği";
$invoice_aff_user = "Kullanıcı Adı";
$menu_pdf_marketing = "PDF Pazarlama Broşürleri";
$menu_pdf_training = "PDF Eğitim Dokümanları";
$marketing_target_url = "Hedef URL";
$marketing_source_code = "Kaynak Kod - Web Sitenize Kopyalayıp/Yapıştırın";
$marketing_group = "Pazarlama Grubu";
$peels_title = "Açılır Reklam Adı";
$peels_view = "Bu Reklamı Görüntüle";
$peels_description = "Açılır Reklam Tanımı";
$lb_head_title = "HTML Sayfanız İçin Gerekli HEAD Kodu";
$lb_head_description = "Web sitenizde lightbox kullanmak için, lightbox\'ın görüntülenmesini istediğiniz sayfanın head bölümüne aşağıdaki satırları eklemeniz gerekir.";
$lb_head_source_code = "Bu kodu HTML dokümanınızın HEAD bölümüne yapıştırın.";
$lb_head_code_notes = "Sayfanızda kaç tane lightbox olursa olsun bu kodu bir kez yerleştirmeniz yeterlidir.";
$lb_head_tutorial = "Eğitimi Görüntüle";
$lb_body_title = "Lightbox Adı";
$lb_body_description = "Lightbox Tanımı";
$lb_body_click = "Lightbox\'ı görüntülemek için yukraıdaki resme tıklayın.";
$lb_body_source_code = "Bu kodu HTML dokümanınızın BODY bölümünde resmin görüntülenmesini istediğiniz yere yapıştırın.";
$pdf_title = "PDF";
$pdf_training = "Eğitim Dokümanları";
$pdf_marketing = "Pazarlama Broşürleri";
$pdf_description_1 = "PDF pazarlama materyallerimizi görüntülemek ve yazdırmak için Adobe Reader gerekir.";
$pdf_description_2 = "Adobe Reader Adobe web sitesinden ücretsiz indirilebilir.";
$pdf_file_name = "Dosya Adı";
$pdf_file_size = "Dosya Boyutu";
$pdf_file_description = "Tanım";
$pdf_bytes = "Byte";
$menu_heading_training_materials = "Eğitim Materyalleri";
$menu_videos = "Eğitim Videolarını İzle";
$menu_custom_manual = "Kişiselleştirilmiş Takip Bağlantısı Kılavuzu";
$menu_page_peels = "Açılır Reklamlar";
$menu_lightboxes = "Lightboxlar";
$menu_email_templates = "Eposta Şablonları";
$menu_heading_custom_links = "Kişiselleştirilmiş Takip Bağlantıları";
$menu_custom_reports = "Raporlar";
$menu_keyword_links = "Anahtar Kelime Takip Bağlantıları";
$menu_subid_links = "Alt Ortak Takip Bağlantıları";
$menu_alteranate_links = "Alternatif Gelen Sayfa Bağlantıları";
$menu_heading_additional = "Ek Araçlar";
$menu_drop_heading_stats = "Genel İstatistikler";
$menu_drop_heading_commissions = "Komisyonlar";
$menu_drop_heading_history = "Ödeme Geçmişi";
$menu_drop_heading_traffic = "Trafik Kaydı";
$menu_drop_heading_account = "Hesabım";
$menu_drop_heading_logo = "Logomu Yükle";
$menu_drop_heading_faq = "SSS";
$menu_drop_general_stats = "Genel İstatistikler";
$menu_drop_tier_stats = "Kademe İstatistikleri";
$menu_drop_current = "Mevcut Komisyonlar";
$menu_drop_tier = "Mevcut Kademeli Komisyonlar";
$menu_drop_pending = "Onay Bekleniyor";
$menu_drop_paid = "Ödenmiş Komisyonlar";
$menu_drop_paid_rec = "Ödenmiş Kademeli Komisyonlar";
$menu_drop_recurring = "Aktif Tekrar Eden Komisyonlar";
$menu_drop_edit = "Hesabımı Düzenle";
$menu_drop_password = "Şifremi Değiştir";
$menu_drop_change = "Komisyon Türümü Değiştir";
$account_hidden = "gizli";
$keyword_title = "Kişiselleştirilmiş Anahtar Kelime Bağlantıları";
$keyword_info = "Kişiselleştirilmiş anahtar kelime bağlantıları oluşturmanız farklı kaynaklardan gelen trafiği takip edebilme yeteneği sunar. Bağlantıları en fazla 4 farklı takip anahtar kelimesi ile oluşturun, kişiselleştirilmiş takip raporu oluşturduğunuz her bir anahtar kelime için detaylı rapor sunacaktır.";
$keyword_heading = "Kişiselleştirilmiş Anahtar Kelime Takibi İçin Kullanılabilir Değişkenler";
$keyword_tracking = "Takip Kimlik Numarası";
$keyword_build = "Bağlantınızı oluşturmak için aşağıdaki URL\'yi alıp kullanmak istediğiniz Takip Kimlik Numarası ve anahtar kelimeye iliştirin.";
$keyword_example = "Örnek";
$keyword_tutorial = "Eğitimi Görüntüle";
$sub_tracking_title = "Alt Ortak Takibi";
$sub_tracking_info = "Bir alt ortak bağlantısı oluşturmak size ortaklarınızın kullanabilmeleri için onlara ortaklık bağlantınızı gönderebilmenizi sağlar. Size hangi alt ortaklarınızı satış ürettiğini raporlayacağımızdan kimin size komisyon kazandırdığını bilebileceksiniz. Alt ortak bağlantısı kullanmanın bir başka nedeni de raporlamaya dahil edilmesini istediğiniz kendi takip sisteminiz bulunuyor olmasıdır.";
$sub_tracking_build = "XXX olan alanı ortaklık programınızdaki ortağın Kimlik Numarası ile değiştirin. Bu işlemi tüm ortaklarınız için tekrarlayın.";
$sub_tracking_example = "Örnek";
$sub_tracking_tutorial = "Eğitimi Görüntüle";
$sub_tracking_id = "Alt Ortak Kimliği";
$alternate_title = "Alternatif Gelen Sayfa Bağlantıları";
$alternate_option_1 = "1. Seçenek: Otomatikleştirilmiş Bağlantı Oluşturma";
$alternate_heading_1 = "Otomatikleştirilmiş Bağlantı Oluşturma";
$alternate_info_1 = "Trafiğin yönlendirilmesini istediğiniz URL\'yi girerek kendi gelen trafik sayfanızı tanımlayın, sizin için bağlantı oluşturalım. Bu özelliği kullanmak, veritabanımızdaki bir Kimlik Numarası gömülerek oluşturulmuş URL\'yi kısaltacaktır.";
$alternate_button = "Bağlantımı Oluştur";
$alternate_links_heading = "Alternatif Gelen URL Bağlantılarım";
$alternate_links_note = "Bu sayfadaki kişiselleştirilmiş bağlantılardan birini silerseniz, mevcut bağlantılar bozulmadan kalır ve çalışmaya devam eder.";
$alternate_links_remove = "sil";
$alternate_option_2 = "2. Seçenek: Elle Bağlantı Oluşturma";
$alternate_info_2 = "Kendi ortak bağlantılarınıza alternatif gelen URL iliştirmek isterseniz, aşağıdaki adımları takip edin.";
$alternate_variable = "Alternatif Gelen URL Değişkeni";
$alternate_example = "Örnek";
$alternate_build = "Bağlantınızı oluşturmak için aşağıdaki URL\'yi alıp kullanmak istediğiniz Alternatif Gelen URL\'ye iliştirin.";
$alternate_none = "Alternatif Gelen Bağlantı Oluşturulmadı";
$alternate_tutorial = "Eğitimi Görüntüle";
$cr_title = "Kişiselleştirilmiş Anahtar Kelime Raporu";
$cr_select = "Bir Anahtar Kelime Seç";
$cr_button = "Rapor Oluştur";
$cr_no_results = "Bir Arama Sonucu Bulunamadı";
$cr_no_results_info = "Farklı Bir Anahtar Kelime Kombinasyonu Deneyin";
$cr_used = "Kullanılan Anahtar Kelimeler";
$cr_found = "Bulunan Bağlantı";
$cr_times = "Süreler";
$cr_unique = "Bulunan Tekil Bağlantılar";
$cr_detailed = "Detaylı Bağlantı Raporu";
$cr_export = "Raporu Excel Dosyası Olarak Çıkart";
$cr_none = "Anahtar Kelime Bulunamadı";
$logo_title = "Şirket Logonuzu Yükleyin";
$logo_info = "Şirket logonuzu yüklemek isterseniz, bunu web sitemize yönlendirdiğiniz müşterilere gösterebiliriz. Böylece müşterileriniz bizi ziyaret ettiğinde onların deneyimlerini kişiselleştirebiliriz.";
$logo_bullet_one = "Resim formatı .jpg, .gif veya .png olabilir. Flash içeriğe izin verilmemektedir.";
$logo_bullet_two = "Uygunsuz herhangi bir resim silinecek ve hesabınız askıya alınacaktır.";
$logo_bullet_three = "Resim/logonuz bizim tarafımızdan onaylanana kadar web sitemizde gösterilmeyecektir.";
$logo_bullet_size_one = "Resimlerinizin en fazla genişliği";
$logo_bullet_size_two = "piksel ve en fazla yüksekliği";
$logo_bullet_req_size_one = "Resimlerin genişliği";
$logo_bullet_req_size_two = "piksel ve yüksekliği";
$logo_bullet_pixels = "piksel olmalıdır.";
$logo_choose = "Bir Resim Seç";
$logo_file = "Bir Dosya Seç:";
$logo_browse = "Göz at...";
$logo_button = "Yükle";
$logo_current = "Mevcut Resmim";
$logo_remove = "sil";
$logo_display_status = "Resim Durumu:";
$logo_pending = "Onay Bekleniyor";
$logo_approved = "Onaylandı";
$logo_success = "Resim başarıyla yüklendi ve onay bekliyor.";
$signup_security_title = "Hesap Doğrulama";
$signup_security_info = "Lütfen aşağıdaki kutuda bulunan güvenlik kodunu yazın. Bu adım bize otomatik kayıtları engellememizde yardımcı olur.";
$signup_security_code = "Güvenlik Kodu";
$sub_tracking_none = "Yok";
$missing_security_code = "Hatalı veya Eksik Hesap Doğrulama / Güvenlik Kodu";
$alternate_success_title = "Bağlantı Oluşturma Başarılı";
$alternate_success_info = "Aşağıdan bağlantınızı alın ve tanımlı URL\'nize trafik çekmeye başlayın.";
$alternate_failed_title = "Bağlantı Oluşturma Hatası";
$alternate_failed_info = "Lütfen Geçerli Bir URL Girin.";
$logo_missing_filename = "Lütfen bir dosya adı seçin.";
$logo_required_width = "Resin genişliği en az";
$logo_required_height = "Resim yüksekliği en az";
$logo_maximum_width = "Resim genişliği en fazla";
$logo_maximum_height = "Resim yüksekliği en fazla";
$logo_size_maximum = "Resim dosya boyutu en fazla";
$logo_bad_filetype = "Bu resim türüne izin verilmiyor. İzin verilen resim dosya türleri.gif, .jpg ve .png.";
$logo_upload_error = "Resim yükleme hatası, lütfen ortak yöneticinize ulaşın.";
$logo_error_title = "Resim Yükleme Hatası";
$logo_error_bytes = "byte.";
$excel_title = "Kişiselleştirilmiş Anahtar Kelime Bağlantı Raporu";
$excel_tab_report = "Kişiselleştirilmiş Anahtar Kelime Raporu";
$excel_tab_logs = "Trafik Kayıtları";
$excel_date = "Rapor Tarihi:";
$excel_affiliate = "Ortak Kimliği:";
$excel_criteria = "Anahtar Kelime Bağlantı Kriteri";
$excel_link = "Bağlantı Yapısı";
$excel_hits = "Tekil Ziyaretler";
$excel_comm_stats = "Komisyon İstatistikleri";
$excel_comm_current = "Mevcut Komisyonlar";
$excel_comm_paid = "Ödenmiş Komisyonlar";
$excel_comm_total = "Toplam Komisyon";
$excel_comm_ratio = "Dönüştürme Oranı";
$excel_earned = "Kazanılan Komisyonlar";
$excel_earned_current = "Mevcut Komisyonlar";
$excel_earned_paid = "Ödenmiş Komisyonlar";
$excel_earned_total = "Kazanılan Toplam Komisyon";
$excel_earned_tab = "Bu kişiselleştirilmiş bağlantının trafik kayıtlarını görmek için (aşağıdan) Trafik Kayıtları sekmesine tıklayın.";
$excel_log_title = "Kişiselleştirilmiş Anahtar Kelime Trafik Kaydı";
$excel_log_ip = "IP Adresi";
$excel_log_refer = "Referans URL";
$excel_log_date = "Tarih";
$excel_log_time = "Saat";
$excel_log_target = "Hedef URL";
$etemplates_title = "Eposta Şablonları";
$etemplates_view_link = "Bu Eposta Şablonunu Görüntüle";
$etemplates_name = "Şablon Adı";
$signup_maintenance_heading = "Bakım Bildirimi";
$signup_maintenance_info = "Kayıtlar geçici olarak devre dışı bırakıldı. Lütfen daha sonra tekrar deneyiniz.";
$marketing_group_title = "Pazarlama Grubu";
$marketing_button = "Görünüm";
$marketing_no_group = "Grup Seçilmedi";
$marketing_choose = "Lüten Yukarıdan Bir Pazarlama Grubu Seçin";
$marketing_notice = "Pazarlama Grupları Gelen Trafik Sayfalarında Farklılık Gösterebilir";
$canspam_heading = "CAN-SPAM Kurallar ve Kabuller";
$canspam_accept = "CAN-SPAM kurallarını okudum, anladım ve kabul ediyorum.";
$canspam_error = "CAN-SPAM kurallarını kabul etmediniz.";
$signup_banned = "Hesap oluşturulurken bir hata oluştu. Daha fazla bilgi için lütfen sistem yöneticisiyle iletişime geçin.";
$header_testimonials = "Ortaklardan Referanslar";
$testi_visit = "Web Sitesini Ziyaret Et";
$testi_description = "Ortaklık programımızla ilgili referans yazısı yazın, &lt;a href=&quot;referanslarphp&quot;&gt;testimonials&lt;/a&gt; sayfamızda web sitenize bir bağlantıyla birlikte yayınlayalım.";
$testi_name = "Ad";
$testi_url = "Web Sitesi URL";
$testi_content = "Referans";
$testi_code = "Güvenlik Kodu";
$testi_submit = "Referansı Gönder";
$testi_na = "Referans mevcut değil.";
$testi_title = "Bir Referans Yazın";
$testi_success_title = "Referans Başarılı";
$testi_success_message = "Referans yazınız için teşekkür ederiz. Ekibimiz kısa sürede yazınızı gözden geçirecektir.";
$testi_error_title = "Referans Hatası";
$testi_error_name_missing = "Lütfen referans yazınız için adınızı da yazınız..";
$testi_error_url_missing = "Lütfen referans yazınız için web sitesi URL\'nizi de yazınız.";
$testi_error_missing = "Lüten referans yazısı metnini giriniz.";
$menu_drop_delayed = "Ertelenmiş Komisyonlar";
$details_drop_6 = "Mevcut Ertelenmiş Komisyonlar";
$details_type_6 = "Ertelenmiş - Kısa Sürede Onaylanacak";
$comdetails_status_6 = "Ertelenmiş - Kısa Sürede Onaylanacak";
$tc_reaccept_title = "Şartlar ve Koşullar Değişiklik Bildirimi";
$tc_reaccept_sub_title = "Hesabınıza erişebilmek için yeni şartlar ve koşullarımızı kabul etmelisiniz.";
$tc_reaccept_button = "Yukarıdaki şartlar ve koşulları okudum, anladım ve kabul ediyorum.";
$tlinks_active = "Aktif Kademe Sayısı";
$tlinks_payout_structure = "Kademe Ödeme Yapısı";
$tlinks_level = "Seviye";
$tierText1 = "% yönlendiren ortağın komisyon tutarı üzerinden hesaplanmıştır.";
$tierText2 = "% üst kademelerin komisyon tutarı üzerinden hesaplanmıştır.";
$tierText3 = "% satış tutarı üzerinden hesaplanmıştır.";
$tierTextflat = "sabit fiyat.";
$edit_custom_button = "Cevabı Düzenle";
$private_heading = "Özel Kayıt";
$private_info = "Ortakklık programımız herkese açık değildir ve katılım için bir kayıt kodu gerektirir. Bir kayıt koduna nasıl sahib olabileceğinizle ilgili bilgi burada yer almaktadır.";
$private_required_heading = "Kayıt Kodu Gerekli";
$private_code_title = "Kayıt Kodunu Yazın";
$private_button = "Kodu Gönder";
$private_error_title = "Geçersiz Kayıt Kodu Girildi";
$private_error_invalid = "Girmiş olduğunuz kayıt kodu geçersiz.";
$private_error_expired = "Girmiş olduğunuz kayıt kodunun süresi dolmuş ve artık kod geçerli değil.";
$qr_code_title = "QR Kodları";
$qr_code_size = "QR Kod Boyutu";
$qr_code_button = "QR Kodunu Görüntüle";
$qr_code_offline_title = "Çevrimdışı Pazarlama";
$qr_code_offline_content1 = "Bu QR kodunu pazarlama broşürlerinize, el ilanlarınıza, kartvizitlerinize v.s. ekleyin.";
$qr_code_offline_content2 = "- Resme sağ tıklayın ve bilgisayrınıza &lt;strong&gt;farklı kaydet&lt;/strong&gt; seçeneği ile kaydedin.";
$qr_code_online_title = "Çevrimiçi Pazarlama";
$qr_code_online_content = "Bu QR kodunu web siteniz, sosyal medya hesaplarınız, bloglarınız v.b. ekleyin.";
$menu_coupon = "Kupon Kodları";
$coupon_title = "Kullanılabilir Kupon Kodlarınız";
$coupon_desc = "Bu kupon kodlarını dağıtın ve biri kodlarınızı her kullandığında komisyon kazanın!";
$coupon_head_1 = "Kupon Kodu";
$coupon_head_2 = "Müşteriye İndirim";
$coupon_head_3 = "Komisyon Tutarınız";
$coupon_sale_amt = "indirim tutarının";
$coupon_flat_rate = "sabit fiyat";
$coupon_default = "Varsayılan Ödeme Seviyesi";
$cc_vanity_title = "Kişiselleştirilmiş Bir Kupon Kodu Talep Edin";
$cc_vanity_field = "Kupon Kodu";
$cc_vanity_button = "Kupon Kodu Talep Edin";
$cc_vanity_error_missing = "<strong>Hata!</strong> Lütfen bir kupon kodu girin.";
$cc_vanity_error_exists = "<strong>Hata!</strong> Bu kodla daha önce talepte bulundunuz. Talebinizin onayı bekleniyor.";
$cc_vanity_error = "<strong>Hata!</strong> Kupon kodu geçersiz. Lütfen yalnızca harfler, rakamlar ve alt tire kullanın.";
$cc_vanity_success = "<strong>Başarılı!</strong> Kişiselleştirilmiş kupon kodunuz talep edildi.";
$coupon_none = "Mevcut herhangi bir kupon kodu bulunmuyor.";
$pic_error_title = "Resim Yükleme Hatası";
$pic_missing = "Lütfen bir dosya adı seçin.";
$pic_invalid = "Bu izin verilen bir resim dosyası türü değil. İzin verilen resim dosyası türleri .gif, .jpg ve .png.";
$pic_error = "Resim yükleme hatası, lütfen ortak yöneticisiyle iletişime geçin.";
$pic_success = "Resminiz başarıyla yüklendi.";
$pic_title = "Resminizi Yükleyin";
$pic_info = "Resminizi yüklememiz sizinle olan deneyimimizi kişiselleştirmemize yardımcı olur.";
$pic_bullet_1 = "Resim dosyaları .jpg, .gif veya .png formatında olmalıdır.";
$pic_bullet_2 = "Herhangi bir uygunsuz resim silinecek ve hesabınız askıya alınacaktır.";
$pic_bullet_3 = "Resminiz herkese açık olarak gösterilmeyecektir. Yalnızca bizim görmemiz için hesabınıza eklenecektir.";
$pic_file = "Bir Dosya Seç:";
$pic_button = "Yükle";
$pic_current = "Mevcut Resmim";
$pic_remove = "Resmi Sil";
$progress_title = "Bir Sonraki Ödeme İçin Uygunluk:";
$progress_complete = "tamamlandı.";
$progress_none = "Ödeme için bir minimum tutar zorunluluğu bulunmamaktadır.";
$progress_sentence_1 = "Gereksinimlerden";
$progress_sentence_2 = "kadarını";
$progress_sentence_3 = "kazandınız.";
$aff_lib_button = "<b>Ücretsiz Erişim Alın!</b><BR />www.AffiliateLibrary.com";
$menu_announcements = "Sosyal Medya Kampanyaları";
$announcements_name = "Kampanya Adı";
$announcements_facebook_message = "Facebook Mesajıe";
$announcements_twitter_message = "Twitter Mesajı";
$announcements_facebook_link = "Facebook Bağlantısı";
$announcements_facebook_picture = "Facebook Resmi";
$general_last_30_days_activity = "Son 30 Gündeki Etkinlikler";
$general_last_30_days_activity_traffic = "Trafik";
$general_last_30_days_activity_commissions = "Komisyonlar";
$accountability_title = "Sorumluluk ve İletişim";
$accountability_text = "<strong>Bu nedir?</strong><p>İş ortaklarımızla güven oluştururken proaktif bir yaklaşım tercih ediyoruz. Amacımız, sistemimizde kazanılan ve/veya reddedilen her bir komisyon hakkında mümkün olduğu kadar çok bilgi verdiğimizden emin olmak. </p><strong>İletişim</strong><p>Reddedilen herhangi bir komisyon hakkında detaylı bilgi verebiliriz. Ortaklarımızla güçlü bir iletişime sahibiz ve soru ve geri bildirimleri destekliyoruz.</p>";
$debit_reason_0 = "Yok";
$debit_reason_1 = "Para İadesi";
$debit_reason_2 = "Geri Ödeme Talebi";
$debit_reason_3 = "Sahtekarlık Bildirilmiş";
$debit_reason_4 = "Sİpariş İptal Edilmiş";
$debit_reason_5 = "Kısmi İade";
$menu_drop_pending_debits = "Bekleyen Borçlar";
$debit_amount_label = "Borç Tutarı";
$debit_date_label = "Borç Tarihi";
$debit_reason_label = "Borç Sebebi";
$debit_paragraph = "Borçlar bir sonraki ödemenizden düşülecektir.";
$debit_invoice_amount = "Eksi Borç Tutarı";
$debit_revised_amount = "Revize Edilmiş Ödenecek Tutar";
$mv_head_description = "Not: Web sitenizde her sayfaya yalnızca bir video yerleştirebilirsiniz.";
$mv_head_source_code = "Bu kodu HTML dokümanınızın READ bölümüne yapıştırın.";
$mv_body_title = "Video Başlığı";
$mv_body_description = "Tanımı";
$mv_body_source_code = "Bu kodu HTML dokümanınızın BODY bölümünde videonun görünmesini istediğiniz yerine yapıştırın.";
$menu_marketing_videos = "Videolar";
$mv_preview_button = "Video\"yu Ön İzle";
$dt_no_data = "Tabloda veri mevcut değil.";
$dt_showing_exists = "_TOTAL_ girdiden _START_ ile _END_ arasındakiler gösteriliyor.";
$dt_showing_none = "0 girdiden 0 ile 0 arasındakiler gösteriliyor.";
$dt_filtered = "(Toplam _MAX_ girdiden filtrelenen)";
$dt_length_choice = "_MENU_ girdilerini göster.";
$dt_loading = "Yükleniyor...";
$dt_processing = "İşleniyor...";
$dt_no_records = "Eşleşen kayıt bulunamadı.";
$dt_first = "İlk";
$dt_last = "Son";
$dt_next = "Sonraki";
$dt_previous = "Önceki";
$dt_sort_asc = ": sütunda artan sıralamayı etkinleştir";
$dt_sort_desc = ": sütunda azalan sıralamayı etkinleştir";
$choose_marketing_group = "Bir Pazarlama Grubu Seçin";
$email_already_used_1 = "Hesap oluşturulmaz. Eposta adresi başına";
$email_already_used_2 = "hesap";
$email_already_used_3 = "oluşturulmasına izin veriyoruz.";
$missing_fax = "Lütfen faks numaranızı yazınız.";
$chart_last_6_months = "Son 6 Ayda Ödemen Komisyonlar";
$chart_last_6_months_paid = "Ödenen Komisyon";
$chart_this_month = "Bu Ayki İlk 5 Ortağımız";
$chart_this_month_none = "Gösterilecek veri yok.";
$login_return = "Ortak Ana Sayfasına Dön";
$login_lost_details = "Kullanıcı adınızı girin, size oturum açma bilgilerinizi eposta ile göndereceğiz.";
$account_edit_general_prefs = "Genel Tercihler";
$account_edit_email_language = "Eposta Dili";
$footer_connect = "Bize Ulaşın";
$modal_close = "Kapat";
$vat_amount_heading = "KDV Miktarı";
$menu_logout = "Oturumu Kapat";
$menu_upload_picture = "Resminizi Yükleyin";
$menu_offer_testi = "Bir Referans Önerin";
$fb_login = "Facebook ile Oturum Açın";
$fb_permissions = "İzinler verilmemiş. Lütfen web sitesinin eposta adresinizi kullanmasına izin verin..";
$announcements_published = "Duyuru Yayınlandı";
$training_videos_title = "Eğitim Videoları";
$training_videos_general = "Genel Pazarlama";
$commission_method = "Komisyon Yöntemi";
$how_will_you_earn = "Nasıl komisyon kazanacaksınız?";
$pm_account_credit = "Kazandığınız komisyon meblağını hesabınıza yatıracağız.";
$pm_check_money_order = "Posta yoluyla bir çek/ödeme emri göndereceğiz.";
$pm_paypal = "PayPal üzerinden ödeme yapacağız.";
$pm_stripe = "Stripe üzerinden ödeme yapacağız.";
$pm_wire = "Havale yoluyla ödeme yapacağız";
$add_to_signup_left_column_text = "<span style=\"color:#CC0000; font-style:italic;\">* gerekli alanları gösterir.</span>";
$paypal_email = "Paypal E-posta";
$stripe_acct_details = "Stripe Hesap Detayları";
$stripe_connect = "Giriş yaptıktan sonra, hesap ayarlarından Stripe hesabınızı bağlayabilirsiniz.";
$stripe_success = "Stripe Hesabı Başarıyla Bağlandı";
$stripe_settings = "Stripe Ayarları";
$stripe_connect_edit = "Stripe ile Bağlan";
$stripe_delete = "Stripe Hesabını Sil";
$stripe_confirm = "Bu hesabı silmek istediğinizden emin misiniz?";
$payment_settings = "Ödeme Ayarları";
$edit_payment_settings = "Ödeme Ayarlarını Değiştir";
$invalid_paypal_address = "Geçersiz Paypal e-posta adresi.";
$payment_method_error = "Lütfen bir ödeme yöntemi seçin.";
$payment_settings_updated = "Ödeme ayarları güncellendi.";
$stripe_removed = "Stripe hesabı kaldırıldı.";
$payment_settings_success = "Başarılı!";
$payment_update_notice_1 = "Bildirim!";
$payment_update_notice_2 = "Bizden bir <strong>[payment_option_here]</strong> ödemesi almayı tercih ettiniz. <strong>[payment_option_here]</strong> hesabınızı bağlamak için lütfen <a href=\"account.php?page=48\" style=\"font-weight:bold;\">buraya  tıklayın</a>.";
$pm_title_credit = "Hesap Kredisi";
$pm_title_mo = "Çek/Ödeme Emri";
$pm_title_paypal = "PayPal";
$pm_title_stripe = "Stripe";
$pm_title_wire = "Havale";
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