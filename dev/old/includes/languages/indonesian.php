<?PHP

//-------------------------------------------------------
	  $language_pack_name = "indonesian";
	  $language_pack_table_name = "indonesian";
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
$header_title = "Program Afiliasi";
$header_indexLink = "Home Afiliasi";
$header_signupLink = "Daftar Sekarang";
$header_accountLink = "Kelola Akun";
$header_emailLink = "Hubungi Kami";
$header_greeting = "Selamat Datang";
$header_nonLogged = "Tamu";
$header_logout = "Keluar Di Sini";
$footer_tag = "Software Afiliasi Oleh iDevAffiliate";
$footer_copyright = "Hak Cipta";
$footer_rights = "Seluruh Hak Cipta Dilindungi Undang-Undang";
$index_heading_1 = "Selamat Datang di Program Afiliasi Kami!";
$index_paragraph_1 = "Gratis untuk bergabung di program kami, mudah untuk mendaftar, dan tidak perlu pengetahuan teknis. Program afiliasi lazim di Internet dan menawarkan cara lain kepada pemilik website untuk mendapatkan keuntungan dari website mereka. Afiliasi menghasilkan lalu lintas dan penjualan untuk website komersial dan sebagai imbalannya menerima pembayaran komisi.";
$index_heading_2 = "Bagaimana cara kerjanya?";
$index_paragraph_2 = "Ketika Anda bergabung dengan program afiliasi kami, Anda akan diberikan berbagai banner dan link dalam bentuk teks yang akan Anda tempatkan di website Anda. Ketika pengguna mengklik salah satu link Anda, mereka akan dibawa ke website kami dan aktivitas mereka akan dilacak oleh software afiliasi kami. Anda akan mendapat komisi berdasarkan jenis komisi Anda.";
$index_heading_3 = "Statistik dan Pelaporan Real-Time!";
$index_paragraph_3 = "Masuk bisa 24 jam sehari untuk mengecek penjualan, lalu lintas, saldo rekening Anda dan melihat bagaimana kinerja banner Anda.";
$index_login_title = "Masuk Afiliasi";
$index_login_username = "Username";
$index_login_password = "Password";
$index_login_username_field = "username";
$index_login_password_field = "password";
$index_login_button = "Masuk";
$index_login_signup_link = "Klik di sini untuk mendaftar";
$index_table_title = "Rincian Program";
$index_table_commission_type = "Jenis Komisi";
$index_table_initial_deposit = "Deposit Awal";
$index_table_requirements = "Persyaratan Pembayaran";
$index_table_duration = "Waktu Pembayaran";
$index_table_choose = "Pilih opsi pembayaran berikut!";
$index_table_sale = "Bayaran Per Penjualan";
$index_table_click = "Bayaran Per Klik";
$index_table_sale_text = "untuk setiap penjualan yang Anda kirim.";
$index_table_click_text = "untuk setiap klik yang Anda kirim.";
$index_table_deposit_tag = "Hanya untuk mendaftar!";
$index_table_requirements_tag = "Saldo minimum diperlukan untuk pembayaran.";
$index_table_duration_tag = "Pembayaran dilakukan setiap bulan, untuk bulan sebelumnya.";
$signup_left_column_text = "Bergabunglah dengan program afiliasi kami dan mulailah mendapatkan uang untuk setiap penjualan yang Anda kirimkan dengan cara kami! Cukup dengan membuat akun Anda, tempatkan kode penghubung Anda ke website Anda dan lihat saldo rekening Anda bertambah ketika pengunjung Anda menjadi pelanggan kami.";
$signup_left_column_title = "Selamat Datang di Afiliasi!";
$signup_login_title = "Buat Akun Anda";
$signup_login_username = "Username";
$signup_login_password = "Password";
$signup_login_password_again = "Password Sekali Lagi";
$signup_login_minmax_chars = "- Nama pengguna minimal harus user_min_chars karakter.&lt;br /&gt;- Nama pengguna bisa berupa kombinasi angka dan huruf.&lt;br /&gt;- Nama pengguna bisa berisi karakter ini: _ (hanya garis bawah)&lt;br /&gt;&lt;br /&gt;- Kata sandi minimal harus pass_min_chars karakter.&lt;br /&gt;- Kata sandi bisa berupa kombinasi angka dan huruf.&lt;br /&gt;- Kata sandi bisa berisi karakter berikut:  characters_allowed";
$signup_login_must_match = "Entri ini harus cocok dengan entri Password.";
$signup_standard_title = "Informasi Standar";
$signup_standard_email = "Alamat Email";
$signup_standard_company = "Nama Perusahaan";
$signup_standard_checkspayable = "Cek Dibayarkan Kepada";
$signup_standard_weburl = "Alamat Website";
$signup_standard_taxinfo = "NPWP";
$signup_personal_title = "Informasi Pribadi";
$signup_personal_fname = "Nama Depan";
$signup_personal_state = "Propinsi";
$signup_personal_lname = "Nama Belakang";
$signup_personal_phone = "Nomor Telepon";
$signup_personal_addr1 = "Alamat";
$signup_personal_fax = "Nomor Fax";
$signup_personal_addr2 = "Alamat Tambahan";
$signup_personal_zip = "Kode Pos";
$signup_personal_city = "Kota";
$signup_personal_country = "Negara";
$signup_commission_title = "Pembayaran Komisi";
$signup_commission_howtopay = "Bagaimana kami membayar Anda?";
$signup_commission_style_PPS = "Bayaran Per Penjualan";
$signup_commission_style_PPC = "Bayaran Per Klik";
$signup_terms_title = "Syarat dan Ketentuan";
$signup_terms_agree = "Saya telah membaca, mengerti, dan setuju dengan syarat dan ketentuan di atas.";
$signup_page_button = "Buat Akun Saya";
$signup_success_email_comment = "Kami telah mengirim Username and Password ke email Anda.<BR />\r\nAnda harus menyimpannya di tempat yang aman untuk referensi di kemudian hari.";
$signup_success_login_link = "Masuk ke Akun Anda";
$custom_fields_title = "Kolom yang Ditentukan Pengguna";
$logout_msg = "<b>Sekarang Anda telah keluar.</b><BR />Terima kasih atas partisipasi Anda di program afiliasi kami.";
$signup_page_success = "Akun Anda Telah Dibuat";
$login_left_column_title = "Masuk Akun";
$login_left_column_text = "Masukkan username dan password Anda untuk mendapat akses ke statistik akun Anda, banner, kode penghubung, FAQ dan banyak lagi.<BR /> <BR />Jika Anda tidak dapat mengingat password Anda, masukkan username dan kami akan kirimkan informasi login Anda ke email Anda.<BR /><BR />";
$login_title = "Masuk ke Akun Anda";
$login_username = "Username";
$login_password = "Password";
$login_invalid = "Masuk Tidak Sah";
$login_now = "Masuk ke Akun Saya";
$login_send_title = "Perlu Password Anda?";
$login_send_username = "Username";
$login_send_info = "Rincian Masuk Dikirim ke Email";
$login_send_pass = "Kirim Ke Email";
$login_send_bad = "Username Tidak Ditemukan";
$help_new_password_heading = "Password Baru";
$help_new_password_info = "Kata sandi Anda sedikitnya harus pass_min_chars karakter. Hanya bisa berisi huruf, angka dan karakter berikut:  characters_allowed";
$help_confirm_password_heading = "Konfirmasi Password Baru";
$help_confirm_password_info = "Entri password ini harus cocok dengan entri Password baru.";
$help_custom_links_heading = "Melacak Kata Kunci";
$help_custom_links_info = "Kata kunci Anda tidak boleh lebih dari 30 karakter. Hanya boleh berisi huruf, angka dan tanda hubung.";
$error_title = "Kesalahan berikut terdeteksi";
$username_invalid = "Nama pengguna salah. Hanya bisa berisi huruf, angka dan garis bawah.";
$username_taken = "Username yang Anda pilih telah dipakai orang.";
$username_short = "Username Anda terlalu pendek, sedikitnya harus user_min_chars karakter.";
$username_long = "Username Anda terlalu panjang, maksimum harus user_max_chars karakter.";
$password_invalid = "Kata sandi salah. Hanya bisa berisi huruf, angka dan karakter berikut:  characters_allowed";
$password_short = "Password Anda terlalu pendek, sedikitnya harus pass_min_chars karakter.";
$password_long = "Password Anda terlalu panjang, maksimum harus pass_max_chars karakter.";
$password_mismatch = "Entri password Anda tidak cocok.";
$missing_checks = "Masukkan nama penerima uang untuk membuat cek.";
$missing_tax = "Masukkan informasi NPWP Anda.";
$missing_fname = "Masukkan nama depan Anda.";
$missing_lname = "Masukkan nama belakang Anda.";
$missing_email = "Masukkan alamat email Anda.";
$invalid_email = "Alamat email Anda salah.";
$missing_address = "Masukkan alamat Anda.";
$missing_city = "Masukkan nama kota Anda.";
$missing_company = "Masukkan nama perusahaan Anda.";
$missing_state = "Masukkan nama propinsi Anda.";
$missing_zip = "Masukkan kode pos Anda.";
$missing_phone = "Masukkan nomor telepon Anda.";
$missing_website = "Masukkan alamat website Anda.";
$missing_paypal = "Anda telah memilih menerima pembayaran dengan PayPal, silakan masukkan akun PayPal Anda.";
$missing_terms = "Anda belum menyetujui syarat dan ketentuan dari kami.";
$paypal_required = "Akun PayPal diperlukan untuk pembayaran.";
$missing_custom = "Isi kolom yang dinamai:";
$account_total_transactions = "Total Transaksi";
$account_standard_linking_code = "Kode Penghubung Standar - Bagus Digunakan di Email!";
$account_copy_paste = "Salin/Tempel Kode Di Atas Ke Website atau Email Anda";
$account_not_approved = "Akun Anda Saat Ini Sedang Menunggu Persetujuan";
$account_suspended = "Akun Anda saat ini dinonaktifkan";
$account_standard_earnings = "Pendapatan Standar";
$account_inc_bonus = "termasuk bonus";
$account_second_tier = "Pendapatan Bertingkat";
$account_recurring = "Pendapatan Periodik";
$account_not_available = "Tidak Tersedia";
$account_earned_todate = "Total Diperoleh Hingga Saat ini";
$menu_heading_overview = "Ikhtisar Akun";
$menu_general_stats = "Statistik Umum";
$menu_tier_stats = "Statistik Bertingkat";
$menu_payment_history = "Riwayat Pembayaran";
$menu_commission_details = "Rincian Komisi";
$menu_recurring_commissions = "Komisi Periodik";
$menu_traffic_log = "Buku Log Lalu lintas Masuk";
$menu_heading_marketing = "Materi Marketing";
$menu_banners = "Banner";
$menu_text_ads = "Iklan Teks";
$menu_text_links = "Link Teks";
$menu_email_links = "Link Email";
$menu_html_links = "Iklan HTML";
$menu_offline = "Marketing Offline";
$menu_tier_linking_code = "Kode Penghubung Bertingkat";
$menu_email_friends = "Email Teman &amp; Rekan";
$menu_custom_links = "Bangun &amp; Lacak Link Anda Sendiri";
$menu_heading_management = "Manajemen Akun";
$menu_comalert = "Setup CommissionAlert";
$menu_comstats = "Setup CommissionStats";
$menu_edit_account = "Edit Akun Saya";
$menu_change_pass = "Ubah Password Saya";
$menu_change_commission = "Ubah Jenis Komisi Saya";
$menu_heading_general_info = "Informasi Umum";
$menu_browse_affiliates = "Browsing Afiliasi Lain";
$menu_faq = "Pertanyaan yang Sering Diajukan (FAQ)";
$suspended_title = "Pemberitahuan Status Akun";
$suspended_heading = "Akun Anda Saat Ini Dinonaktifkan";
$suspended_notes = "Catatan Administrator";
$pending_title = "Pemberitahuan Status Akun";
$pending_heading = "Akun Anda Saat ini Menunggu Persetujuan";
$pending_note = "Setelah kami setujui akun Anda, materi marketing akan diberikan kepada Anda.";
$faq_title = "Pertanyaan yang Sering Diajukan (FAQ)";
$faq_none = "Belum Ada FAQ";
$browse_title = "Browsing Afiliasi Lain";
$browse_none = "Tidak Ada Afiliasi Lain Untuk Dilihat";
$change_comm_title = "Ubah Jenis Komisi";
$change_comm_curr_comm = "Jenis Komisi Saat Ini";
$change_comm_curr_pay = "Level Pembayaran Saat ini";
$change_comm_new_comm = "Jenis Komisi Baru";
$change_comm_warning = "Jika Anda Ubah Jenis Komisi, Akun Anda Akan Disetel Ulang ke Level 1 Pembayaran";
$change_comm_button = "Ubah Jenis Komisi";
$change_comm_no_other = "Tidak Ada Jenis Komisi Lain yang Tersedia";
$change_comm_level = "Level";
$change_comm_updated = "Jenis Komisi Diperbaharui";
$password_title = "Ubah Password Saya";
$password_old_password = "Password Lama";
$password_new_password = "Password Baru";
$password_confirm_password = "Konfirmasi Password Baru";
$password_button = "Ubah Password";
$password_warning_old_missing = "Password Lama Salah atau Hilang";
$password_warning_new_missing = "Entri Password Baru Hilang";
$password_warning_mismatch = "Password Baru Tidak Cocok";
$password_warning_invalid = "Password Salah - Klik Link Bantuan";
$password_notice = "Password Diperbaharui";
$edit_failed = "Update Gagal - Lihat Kesalahan Diatas";
$edit_success = "Akun Diperbaharui";
$edit_button = "Edit Akun Saya";
$commissionstats_title = "Setup CommissionStats";
$commissionstats_info = "Dengan menginstal CommissionStats, Anda dapat mengecek status Anda dengan cepat dari desktop Windows Anda!Untuk menginstal fitur ini, download CommissionStats dan paket <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>unzip</b></a> ke hard drive Anda lalu jalankan file  <b>setup.exe</b>. Ketika diminta informasi login Anda, masukkan rincian berikut.";
$commissionstats_hint = "Petunjuk: Salin & Tempel Setiap Entri Untuk Memastikan Keakuratan";
$commissionstats_profile = "Nama Profil";
$commissionstats_username = "Username";
$commissionstats_password = "Password";
$commissionstats_id = "ID Afiliasi";
$commissionstats_source = "Source Path URL";
$commissionstats_download = "Download CommissionStats";
$commissionalert_title = "Setup CommissionAlert";
$commissionalert_info = "Dengan menginstal CommissionAlert kami akan segera memberitahukan Anda tentang komisi yang baru, di desktop Windows Anda!Untuk menginstal fitur ini, download CommissionAlert dan paket <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>unzip</b></a> ke hard drive Anda lalu jalankan file <b>setup.exe</b>. Ketika diminta informasi login Anda, masukkan rincian berikut.";
$commissionalert_hint = "Petunjuk: Salin & Tempel Setiap Entri Untuk Memastikan keakuratan";
$commissionalert_profile = "Nama Profil";
$commissionalert_username = "Username";
$commissionalert_password = "Password";
$commissionalert_id = "ID Afiliasi";
$commissionalert_source = "Source Path URL";
$commissionalert_download = "Download CommissionAlert";
$offline_title = "Marketing Offline";
$offline_paragraph_one = "Dapatkan uang dengan mempromosikan website kami (offline) ke teman dan rekan Anda!";
$offline_send = "Kirim Pelanggan Ke";
$offline_page_link = "lihat halaman";
$offline_paragraph_two = "Pelanggan Anda akan memasukkan <b>Nomor ID Afiliasi</b> Anda ke box di halaman atas  yang akan mendaftarkan Anda sebagai afiliasi untuk pembelian yang mereka lakukan.";
$banners_title = "Banner";
$banners_size = "Ukuran Banner";
$banners_description = "Deskripsi Banner";
$ad_title = "Iklan Teks";
$ad_info = "Menggunakan kode penghubung yang disediakan, Anda dapat menyesuaikan skema warna, tinggi dan lebar Iklan Teks Anda.";
$links_title = "Nama Link";
$email_title = "Link Email";
$email_group = "Grup Marketing";
$email_button = "Tampilkan Link Email";
$email_no_group = "Tidak Ada Grup yang Dipilih";
$email_choose = "Pilih Grup Marketing Di Atas";
$email_notice = "Grup Marketing Bisa Mempunyai Halaman Lalu lintas Masuk yang Berbeda";
$email_ascii = "<b>Versi ASCII/Teks</b> - Digunakan dalam Email Teks Polos.";
$email_html = "<b>Versi HTML</b> - Digunakan dalam email format HTML.";
$email_test = "Tes Link";
$email_test_info = "Ini adalah dimana pelanggan Anda akan dikirim ke website kami.";
$email_source = "Kode Sumber - Salin/Tempel ke Pesan Email Anda";
$html_title = "Nama Iklan HTML";
$html_view_link = "Lihat Iklan HTML Ini";
$traffic_title = "Buku Log Lalu lintas Masuk";
$traffic_display = "Tampilkan yang Terakhir";
$traffic_display_visitors = "Pengunjung";
$traffic_button = "Lihat Buku Log Lalu lintas";
$traffic_title_details = "Rincian Lalu lintas Masuk";
$traffic_ip = "Alamat IP";
$traffic_refer = "URL Perujuk ";
$traffic_date = "Tanggal";
$traffic_time = "Waktu";
$traffic_bottom_tag_one = "Menampilkan yang Terakhir";
$traffic_bottom_tag_two = "dari";
$traffic_bottom_tag_three = "Total Pengunjung Unik";
$traffic_none = "Tidak ada Buku Log Lalu lintas";
$traffic_no_url = "Tidak Tersedia - Bookmark atau Link Email yang mungkin";
$traffic_box_title = "URL Perujuk Lengkap";
$traffic_box_info = "Klik Link Untuk Mengunjungi Halaman Situs";
$payment_title = "Riwayat Pembayaran";
$payment_date = "Tanggal Pembayaran";
$payment_commissions = "Komisi";
$payment_amount = "Jumlah Pembayaran";
$payment_totals = "Total";
$payment_none = "Tidak ada Riwayat Pembayaran";
$tier_stats_title = "Statistik Bertingkat"; 
$tier_stats_accounts = "Akun Bertingkat Langsung Di Bawah Anda";
$tier_stats_grab_link = "Dapatkan Kode Penghubung Bertingkat Anda";
$tier_stats_none = "Tidak Ada Akun Bertingkat";
$tier_stats_username = "Username";
$tier_stats_current = "Komisi Saat Ini";
$tier_stats_previous = "Pembayaran Sebelumnya";
$tier_stats_totals = "Total";
$recurring_title = "Komisi Periodik";
$recurring_none = "Tidak Ada Komisi Periodik";
$recurring_date = "Tanggal Komisi";
$recurring_status = "Status Periodik";
$recurring_payout = "Pembayaran Berikutnya";
$recurring_amount = "Jumlah";
$recurring_every = "Setiap";
$recurring_in = "Dalam";
$recurring_days = "Hari";
$recurring_total = "Total";
$tlinks_title = "Tambahkan Yang Lain ke Tingkatan Anda Dan Dapatkan Keuntungan Dari Mereka Juga!";
$tlinks_embedded_one = "Kredit Pendaftaran Bertingkat Sudah Aktif Pada Link Afiliasi Standar Anda!";
$tlinks_embedded_two = "Menggunakan sistem bertingkat memungkinkan Anda memasarkan program afiliasi kami ke orang lain. Anda akan menjadi peringkat atas bagi siapa saja yang bergabung di program afiliasi kami melalui link rujukan bertingkat khusus Anda di bawah ini. Informasi tentang seberapa banyak Anda bisa mendapatkannya ada di bawah ini.";
$tlinks_embedded_current = "Pembayaran Bertingkat Saat ini";
$tlinks_forced_two = "Menggunakan sistem bertingkat memungkinkan Anda memasarkan program afiliasi kami ke orang lain. Anda akan menjadi peringkat atas bagi siapa saja yang bergabung di program afiliasi kami melalui link rujukan bertingkat khusus Anda di bawah ini. Informasi tentang seberapa banyak Anda bisa mendapatkannya ada di bawah ini.";
$tlinks_forced_code = "Link Rujukan Bertingkat";
$tlinks_forced_paste = "Salin/Tempel Kode Di Bawah ini ke Website Anda";
$tlinks_forced_money = "Webmaster Mendapatkan Keuntungan Di Sini!";
$comdetails_title = "Rincian Komisi";
$comdetails_date = "Tanggal Komisi";
$comdetails_time = "Waktu Komisi";
$comdetails_type = "Jenis Komisi";
$comdetails_status = "Status Saat ini";
$comdetails_amount = "Jumlah Komisi";
$comdetails_additional_title = "Rincian Komisi Tambahan";
$comdetails_additional_ordnum = "Jumlah Pesanan";
$comdetails_additional_saleamt = "Nilai Penjualan";
$comdetails_type_1 = "Komisi Bonus";
$comdetails_type_2 = "Komisi Periodik";
$comdetails_type_3 = "Komisi Bertingkat";
$comdetails_type_4 = "Komisi Standar";
$comdetails_status_1 = "Dibayar";
$comdetails_status_2 = "Disetujui - Menunggu Pembayaran";
$comdetails_status_3 = "Menunggu Persetujuan";
$comdetails_not_available = "Tidak Tersedia";
$details_title = "Rincian Komisi";
$details_drop_1 = "Komisi Standar Saat Ini";
$details_drop_2 = "Komisi Bertingkat Saat Ini";
$details_drop_3 = "Komisi Menunggu Persetujuan";
$details_drop_4 = "Komisi Standar Dibayar";
$details_drop_5 = "Komisi Bertingkat Dibayar";
$details_button = "Lihat Komisi";
$details_date = "Tanggal";
$details_status = "Status";
$details_commission = "Komisi";
$details_details = "Lihat Rincian";
$details_type_1 = "Dibayar";
$details_type_2 = "Menunggu Persetujuan";
$details_type_3 = "Disetujui - Menunggu Pembayaran";
$details_none = "Tidak Ada Komisi Untuk Dilihat";
$details_no_group = "Tidak Ada Grup Komisi yang Dipilih";
$details_choose = "Pilih Grup Komisi Di Atas";
$general_title = "Komisi Saat ini - Dari Pembayaran Terakhir Hingga Saat ini";
$general_transactions = "Transaksi";
$general_earnings_to_date = "Pendapatan Hingga Saat ini";
$general_history_link = "Lihat Riwayat Pembayaran";
$general_standard_earnings = "Pendapatan Standar";
$general_current_earnings = "Pendapatan Saat Ini";
$general_traffic_title = "Statistik Lalu lintas";
$general_traffic_visitors = "Pengunjung";
$general_traffic_unique = "Pengunjung Unik";
$general_traffic_sales = "Penjualan Disetujui";
$general_traffic_ratio = "Rasio Penjualan";
$general_traffic_info = "Statistik ini tidak mengadung komisi periodik atau bertingkat.";
$general_traffic_pay_type = "Jenis Pembayaran";
$general_traffic_pay_level = "Level Pembayaran Saat Ini";
$general_notes_title = "Catatan Administrator";
$general_notes_date = "Tanggal Dibuat";
$general_notes_to = "Untuk";
$general_notes_all = "Semua Afiliasi";
$general_notes_none = "Tidak Ada Catatan Untuk Dilihat";
$contact_left_column_title = "Hubungi Kami";
$contact_left_column_text = "Hubungi manajer afiliasi kami dengan menggunakan formulir di sebelah kanan.";
$contact_title = "Hubungi Kami";
$contact_name = "Nama Anda";
$contact_email = "Alamat Email Anda";
$contact_message = "Pesan";
$contact_chars = "karakter yang tinggal";
$contact_button = "Kirim Pesan";
$contact_received = "Kami telah menerima pesan Anda, berikan kami waktu 24 jam untuk menjawab.";
$contact_invalid_name = "Nama Salah";
$contact_invalid_email = "Alamat Email Salah";
$contact_invalid_message = "Pesan Salah";
$invoice_button = "Faktur";
$invoice_header = "FAKTUR PEMBAYARAN AFILIASI";
$invoice_aff_info = "Informasi Afiliasi";
$invoice_co_info = "Informasi";
$invoice_acct_info = "Informasi Akun";
$invoice_payment_info = "Informasi Pembayaran";
$invoice_comm_date = "Tanggal Pembayaran";
$invoice_comm_amt = "Nilai Komisi";
$invoice_comm_type = "Jenis Komisi";
$invoice_admin_note = "Catatan Administrator";
$invoice_footer = "AKHIR FAKTUR";
$invoice_print = "Cetak Faktur";
$invoice_none = "Tidak Ada";
$invoice_aff_id = "ID Afiliasi";
$invoice_aff_user = "Username";
$menu_pdf_marketing = "Brosur Marketing PDF";
$menu_pdf_training = "Dokumen Pelatihan PDF";
$marketing_target_url = "URL Target";
$marketing_source_code = "Kode Sumber - Salin/Tempel ke Website Anda";
$marketing_group = "Grup Marketing";
$peels_title = "Nama Page Peel";
$peels_view = "Lihat Peel Ini";
$peels_description = "Deskripsi Page Peel";
$lb_head_title = "HEAD Code yang Diperlukan untuk Halaman HTML Anda";
$lb_head_description = "Untuk menggunakan lightbox di website Anda, Anda harus menambahkan baris-baris berikut ke bagian atas halaman dimana Anda ingin tampilkan.";
$lb_head_source_code = "Tempel kode ini ke bagian ATAS dokumen HTML Anda.";
$lb_head_code_notes = "Anda hanya perlu meletakkan kode ini sekali, tidak  masalah berapa banyak lightbox yang Anda letakkan di halaman itu.";
$lb_head_tutorial = "Lihat Buku Petunjuk";
$lb_body_title = "Nama Lightbox";
$lb_body_description = "Deskripsi Lightbox";
$lb_body_click = "Klik gambar di atas untuk melihat lightbox.";
$lb_body_source_code = "Tempel kode ini ke bagian ISI dokumen HTML Anda dimana Anda inginkan gambar itu terlihat.";
$pdf_title = "PDF";
$pdf_training = "Dokumen Pelatihan";
$pdf_marketing = "Brosur Marketing";
$pdf_description_1 = "Adobe Reader diperlukan untuk melihat dan mencetak materi marketing PDF kami.";
$pdf_description_2 = "Adobe Reader gratis di-download dari website Adobe.";
$pdf_file_name = "Nama File";
$pdf_file_size = "Ukuran File";
$pdf_file_description = "Deskripsi";
$pdf_bytes = "Byte";
$menu_heading_training_materials = "Materi Pelatihan";
$menu_videos = "Lihat Video Pelatihan";
$menu_custom_manual = "Manual Link Pelacak Khusus";
$menu_page_peels = "Page Peel";
$menu_lightboxes = "Lightbox";
$menu_email_templates = "Template Email";
$menu_heading_custom_links = "Link Pelacak Khusus";
$menu_custom_reports = "Laporan";
$menu_keyword_links = "Link Pelacak Kata Kunci";
$menu_subid_links = "Link Pelacak Sub-Afiliasi";
$menu_alteranate_links = "Alternatif Link Halaman Masuk";
$menu_heading_additional = "Sarana Tambahan";
$menu_drop_heading_stats = "Statistik Umum";
$menu_drop_heading_commissions = "Komisi";
$menu_drop_heading_history = "Riwayat Pembayaran";
$menu_drop_heading_traffic = "Buku Log Lalu lintas";
$menu_drop_heading_account = "Akun Saya";
$menu_drop_heading_logo = "Upload Logo Saya";
$menu_drop_heading_faq = "FAQ";
$menu_drop_general_stats = "Statistik Umum";
$menu_drop_tier_stats = "Statistik Bertingkat";
$menu_drop_current = "Komisi Saat Ini";
$menu_drop_tier = "Komisi Bertingkat Saat ini";
$menu_drop_pending = "Menunggu Persetujuan";
$menu_drop_paid = "Komisi Dibayar";
$menu_drop_paid_rec = "Komisi Bertingkat Dibayar";
$menu_drop_recurring = "Komisi Periodik Aktif";
$menu_drop_edit = "Edit Akun Saya";
$menu_drop_password = "Ubah Password Saya";
$menu_drop_change = "Ubah Jenis Komisi Saya";
$account_hidden = "tersembunyi";
$keyword_title = "Link Kata Kunci Khusus";
$keyword_info = "Membuat link kata kunci khusus memberikan Anda kemampuan untuk melacak lalu lintas masuk untuk berbagai sumber. Buat link dengan maksimal 4 kata kunci pelacak yang berbeda dan laporan pelacakan khusus akan menunjukkan Anda laporan rinci untuk setiap kata kunci yang Anda buat.";
$keyword_heading = "Variabel yang tersedia Untuk Pelacakan Kata Kunci Khusus";
$keyword_tracking = "ID Pelacakan";
$keyword_build = "Untuk membangun link Anda, ambil URL berikut dan tambahkan dengan ID Pelacakan dan kata kunci yang ingin Anda gunakan.";
$keyword_example = "Contoh";
$keyword_tutorial = "Lihat Buku Petunjuk";
$sub_tracking_title = "Pelacakan Sub-Afiliasi";
$sub_tracking_info = "Membuat link sub-afiliasi memberikan Anda kemampuan untuk mengedarkan link afiliasi Anda ke afiliasi-afiliasi Anda sendiri agar mereka menggunakan. Anda akan tahu siapa yang telah menghasilkan komisi untuk Anda karena kami akan melaporkan kepada Anda sub-afiliasi Anda yang mana yang menghasilkan penjualan. Alasan lain untuk menggunakan link sub-afiliasi adalah Anda memiliki sistem pelacakan sendiri yang ingin Anda sertakan untuk pelaporan.";
$sub_tracking_build = "Ganti XXX dengan nomor ID afiliasi dalam program afiliasi Anda. Ulangi proses ini untuk semua afiliasi Anda.";
$sub_tracking_example = "Contoh";
$sub_tracking_tutorial = "Lihat Buku Petunjuk";
$sub_tracking_id = "ID Sub-Afiliasi";
$alternate_title = "Alternatif Link Halaman Masuk";
$alternate_option_1 = "Opsi 1: Pembuatan Link Otomatis";
$alternate_heading_1 = "Pembuatan Link Otomatis";
$alternate_info_1 = "Tentukan halaman lalu lintas masuk Anda dengan memasukkan URL dimana lalu lintas ingin Anda kirim dan kita akan buat link untuk Anda. Menggunakan fitur ini akan membuat link lebih pendek untuk Anda gunakan dengan URL yang tertanam di link tersebut yang menggunakan nomor ID dalam database kami.";
$alternate_button = "Buat Link Saya";
$alternate_links_heading = "Alternatif Link URL Masuk Saya";
$alternate_links_note = "Link yang ada akan tetap utuh dan berfungsi jika Anda hapus link khusus dari halaman ini.";
$alternate_links_remove = "hapus";
$alternate_option_2 = "Opsi 2: Pembuatan Link Manual";
$alternate_info_2 = "Jika Anda lebih memilih untuk menambahkan link afiliasi Anda sendiri dengan alternatif URL masuk, gunakan struktur berikut.";
$alternate_variable = "Alternatif Variabel URL Masuk";
$alternate_example = "Contoh";
$alternate_build = "Untuk membangun link Anda, ambil URL berikut dan tambahkan dengan Alternatif URL Masuk yang ingin Anda gunakan.";
$alternate_none = "Tidak Ada Alternatif Link Masuk yang Dibuat";
$alternate_tutorial = "Lihat Buku Petunjuk";
$cr_title = "Laporan Kata Kunci Khusus";
$cr_select = "Pilih Satu Kata Kunci";
$cr_button = "Buat Laporan";
$cr_no_results = "Tidak Ada Hasil Pencarian yang Ditemukan";
$cr_no_results_info = "Coba Kombinasi Kata Kunci yang Berbeda";
$cr_used = "Kata Kunci yang Digunakan";
$cr_found = "Link Ini Ditemukan";
$cr_times = "Kali";
$cr_unique = "Link Unik Ditemukan";
$cr_detailed = "Rincian Laporan Link";
$cr_export = "Laporan Ekspor ke Excel";
$cr_none = "Tidak Ada Kata Kunci yang Ditemukan";
$logo_title = "Upload Logo Perusahaan Anda";
$logo_info = "Jika Anda ingin meng-upload logo perusahaan Anda, kami akan tampilkan logo itu ke pelanggan yang Anda bawa ke website kami. Hal ini memungkinkan kami untuk mewujudkan pengalaman pelanggan Anda ketika mereka mengunjungi kami.";
$logo_bullet_one = "Gambar bisa dalam format .jpg, .gif atau .png. Format flash tidak diizinkan.";
$logo_bullet_two = "Gambar yang tidak pantas akan dibuang dan akun Anda akan ditangguhkan.";
$logo_bullet_three = "Gambar/logo Anda tidak akan ditampilkan di website kami sampai kami menyetujuinya.";
$logo_bullet_size_one = "Gambar mempunyai lebar maksimum";
$logo_bullet_size_two = "pixel dan tinggi maksimum";
$logo_bullet_req_size_one = "Lebar gambar harus";
$logo_bullet_req_size_two = "pixel dan tinggi";
$logo_bullet_pixels = "pixel.";
$logo_choose = "Pilih Gambar";
$logo_file = "Pilih File:";
$logo_browse = "Browse...";
$logo_button = "Upload";
$logo_current = "Gambar saya saat ini";
$logo_remove = "hapus";
$logo_display_status = "Status Gambar:";
$logo_pending = "Menunggu Persetujuan";
$logo_approved = "Disetujui";
$logo_success = "Gambar berhasil di-upload dan sekarang menunggu persetujuan.";
$signup_security_title = "Verifikasi Akun";
$signup_security_info = "Masukkan kode sekuriti yang ada dalam kotak. Langkah ini membantu kami untuk mencegah masuk secara otomatis.";
$signup_security_code = "Kode Sekuriti";
$sub_tracking_none = "Tidak Ada";
$missing_security_code = "Verifikasi Akun/Kode Sekuriti Salah atau Hilang";
$alternate_success_title = "Pembuatan Link Berhasil";
$alternate_success_info = "Ambil link Anda di bawah ini dan mulailah mengirim lalu lintas ke URl Anda yang telah ditentukan.";
$alternate_failed_title = "Pembuatan Link Mengalami Kesalahan";
$alternate_failed_info = "Masukkan URL yang benar.";
$logo_missing_filename = "Pilih nama file.";
$logo_required_width = "Lebar gambar harus";
$logo_required_height = "Tinggi gambar harus";
$logo_maximum_width = "Lebar gambar hanya bisa";
$logo_maximum_height = "Tinggi gambar hanya bisa";
$logo_size_maximum = "Ukuran gambar hanya bisa maksimum";
$logo_bad_filetype = "Jenis gambar tidak diizinkan. Jenis gambar yang diizinkan .gif, .jpg dan .png.";
$logo_upload_error = "Upload gambar mengalami kesalahan, hubungi manajer afiliasi.";
$logo_error_title = "Upload Gambar Salah";
$logo_error_bytes = "byte.";
$excel_title = "Laporan Link Kata Kunci Khusus";
$excel_tab_report = "Laporan Kata Kunci Khusus";
$excel_tab_logs = "Buku Log Lalu lintas";
$excel_date = "Tanggal Laporan:";
$excel_affiliate = "ID Afiliasi:";
$excel_criteria = "Kriteria Link Kata Kunci";
$excel_link = "Struktur Link";
$excel_hits = "Klik Unik";
$excel_comm_stats = "Statistik Komisi";
$excel_comm_current = "Komisi Saat Ini";
$excel_comm_paid = "Komisi Dibayar";
$excel_comm_total = "Total Komisi";
$excel_comm_ratio = "Rasio Konversi";
$excel_earned = "Komisi Didapat";
$excel_earned_current = "Komisi Saat ini";
$excel_earned_paid = "Komisi Dibayar";
$excel_earned_total = "Total Komisi Didapat";
$excel_earned_tab = "Klik Traffic Log tab (di bawah) untuk melihat buku log lalu lintas untuk link khusus.";
$excel_log_title = "Buku Log Lalu lintas Kata Kunci Khusus";
$excel_log_ip = "Alamat IP";
$excel_log_refer = "URL Perujuk";
$excel_log_date = "Tanggal";
$excel_log_time = "Waktu";
$excel_log_target = "URL Target";
$etemplates_title = "Template Email";
$etemplates_view_link = "Lihat Template Email Ini";
$etemplates_name = "Nama Template";
$signup_maintenance_heading = "Pemberitahuan Maintenance";
$signup_maintenance_info = "Pendaftaran dinonaktifkan sementara. Mohon dicoba lagi nanti.";
$marketing_group_title = "Grup Marketing";
$marketing_button = "Tampilkan";
$marketing_no_group = "Tidak Ada Grup yang Dipilih";
$marketing_choose = "Pilih Grup Marketing Di Atas";
$marketing_notice = "Grup Marketing Bisa Memiliki Halaman Lalu-lintas Masuk yang Berbeda";
$canspam_heading = "Peraturan dan Persetujuan CAN-SPAM";
$canspam_accept = "Saya telah membaca, mengerti, dan setuju dengan peraturan CAN-SPAM di atas.";
$canspam_error = "Anda belum setuju dengan peraturan CAN-SPAM kami.";
$signup_banned = "Ada kesalahan dalam pembuatan akun. Hubungi system administrator untuk keterangan lebih lanjut.";
$header_testimonials = "Testimoni Afiliasi";
$testi_visit = "Kunjungi Website";
$testi_description = "Berikan testimoni Anda untuk program afiliasi kami dan kami akan letakkan di halaman &lt;a href=&quot;testimonials.php&quot;&gt;testimonials&lt;/a&gt; kami dengan link ke website Anda.";
$testi_name = "Nama";
$testi_url = "URL Website";
$testi_content = "Testimoni";
$testi_code = "Kode Sekuriti";
$testi_submit = "Kirim Testimoni";
$testi_na = "Testimoni tidak tersedia.";
$testi_title = "Berikan Testimoni";
$testi_success_title = "Testimoni Berhasil";
$testi_success_message = "Terima kasih telah memberikan testimoni Anda. Tim kami akan segera memeriksanya.";
$testi_error_title = "Kesalahan Testimoni";
$testi_error_name_missing = "Sertakan nama Anda untuk testimoni Anda.";
$testi_error_url_missing = "Sertakan URL website untuk testimoni Anda.";
$testi_error_missing = "Sertakan teks untuk testimoni Anda.";
$menu_drop_delayed = "Komisi Tertunda";
$details_drop_6 = "Komisi Tertunda Saat Ini";
$details_type_6 = "Tertunda - Akan Segera Disetujui";
$comdetails_status_6 = "Tertunda - Akan Segera Disetujui";
$tc_reaccept_title = "Syarat dan Ketentuan Mengubah Pemberitahuan";
$tc_reaccept_sub_title = "Anda harus setuju dengan syarat dan ketentuan kami yang baru agar dapat memperoleh akses ke akun Anda.";
$tc_reaccept_button = "Saya telah membaca, mengerti, dan setuju dengan syarat dan ketentuan di atas.";
$tlinks_active = "Jumlah Tingkat yang Aktif";
$tlinks_payout_structure = "Struktur Pembayaran Bertingkat";
$tlinks_level = "Level";
$tierText1 = "% dihitung dari nilai komisi afiliasi perujuk.";
$tierText2 = "% dihitung dari nilai komisi tingkat atas.";
$tierText3 = "% dihitung dari nilai penjualan.";
$tierTextflat = "harga rata-rata.";
$edit_custom_button = "Edit Jawaban";
$private_heading = "Pendaftaran Privat";
$private_info = "Program afiliasi kami tidak terbuka untuk masyarakat umum dan memerlukan kode pendaftaran untuk bergabung. Informasi tentang cara mendapatkan kode pendaftaran ada di sini.";
$private_required_heading = "Kode Pendaftaran Diperlukan";
$private_code_title = "Masukkan Kode Pendaftaran";
$private_button = "Kirim Kode";
$private_error_title = "Kode Pendaftaran yang Diberikan Salah";
$private_error_invalid = "Kode pendaftaran yang telah Anda berikan salah.";
$private_error_expired = "Kode pendaftaran yang telah Anda berikan telah kadaluarsa dan tidak berlaku lagi.";
$qr_code_title = "Kode QR";
$qr_code_size = "Ukuran Kode QR";
$qr_code_button = "Tampilkan Kode QR";
$qr_code_offline_title = "Marketing Offline";
$qr_code_offline_content1 = "Tambahkan kode QR ini ke brosur, pamflet, kartu bisnis marketing Anda, dll.";
$qr_code_offline_content2 = "- Klik kanan gambar dan &lt;strong&gt;save-as&lt;/strong&gt; ke komputer Anda.";
$qr_code_online_title = "Marketing Online";
$qr_code_online_content = "Tambahkan kode QR ini ke website Anda, sosial media, blog, dll.";
$menu_coupon = "Kode Kupon";
$coupon_title = "Kode kupon Anda yang tersedia";
$coupon_desc = "Bagikan kode kupon ini dan dapatkan komisi setiap kali seseorang menggunakan kode Anda!";
$coupon_head_1 = "Kode Kupon";
$coupon_head_2 = "Diskon Untuk Pelanggan ";
$coupon_head_3 = "Nilai Komisi Anda";
$coupon_sale_amt = "dari nilai penjualan";
$coupon_flat_rate = "harga rata-rata";
$coupon_default = "Level Pembayaran Default";
$cc_vanity_title = "Minta Kode Kupon yang Dibuat Khusus";
$cc_vanity_field = "Kode Kupon";
$cc_vanity_button = "Minta Kode Kupon";
$cc_vanity_error_missing = "<strong>Salah!</strong> Masukkan kode kupon.";
$cc_vanity_error_exists = "<strong>Salah!</strong> Anda telah minta kode ini. Sedang menunggu persetujuan.";
$cc_vanity_error = "<strong>Salah!</strong> Kode kupon salah. Hanya gunakan huruf, angka dan garis bawah.";
$cc_vanity_success = "<strong>Berhasil!</strong> Kode Kupon Anda yang Dibuat Khusus telah diminta.";
$coupon_none = "Tidak ada kode kupon yang tersedia saat ini.";
$pic_error_title = "Kesalahan Upload Gambar";
$pic_missing = "Pilih nama file.";
$pic_invalid = "Jenis gambar tidak diizinkan. Jenis gambar yang diizinkan adalah .gif, .jpg dan .png.";
$pic_error = "Kesalahan upload gambar, hubungi manajer afiliasi.";
$pic_success = "Gambar Anda berhasil di-upload.";
$pic_title = "Upload Gambar Anda";
$pic_info = "Meng-upload gambar Anda membantu untuk mewujudkan pengalaman kami bersama Anda.";
$pic_bullet_1 = "Gambar bisa dalam bentuk .jpg, .gif atau .png.";
$pic_bullet_2 = "Gambar yang tidak pantas akan dibuang dan akun Anda dinonaktikan.";
$pic_bullet_3 = "Gambar Anda tidak akan ditunjukkan secara publik. Gambar itu hanya akan dipasangkan ke akun Anda agar kami bisa melihat.";
$pic_file = "Pilih File:";
$pic_button = "Upload";
$pic_current = "Gambar Saya Saat Ini";
$pic_remove = "Hapus Gambar";
$progress_title = "Kelayakan Untuk Pembayaran Berikutnya:";
$progress_complete = "Lengkap.";
$progress_none = "Kami tidak memiliki persyaratan pembayaran minimum.";
$progress_sentence_1 = "Anda telah mendapatkan";
$progress_sentence_2 = "dari";
$progress_sentence_3 = "yang diperlukan.";
$aff_lib_button = "<font style=\"font-size:16px; font-weight:bold;\">Klaim Akses Gratis Anda Ke</font><BR />www.AffiliateLibrary.com";
$menu_announcements = "Kampanye Sosial Media";
$announcements_name = "Nama Kampanye";
$announcements_facebook_message = "Pesan Facebook";
$announcements_twitter_message = "Pesan Twitter";
$announcements_facebook_link = "Link Facebook";
$announcements_facebook_picture = "Gambar Facebook";
$general_last_30_days_activity = "Aktifitas 30 Hari Terakhir";
$general_last_30_days_activity_traffic = "Lalu lintas";
$general_last_30_days_activity_commissions = "Komisi";
$accountability_title = "Akuntabilitas dan Komunikasi";
$accountability_text = "<strong>Apa ini?</strong><p>Kami melakukan pendekatan proaktif untuk membuat kepercayaan dengan mitra afiliasi kami. Ini adalah tujuan kami untuk memastikan bahwa kami memberikan informasi sebanyak mungkin untuk setiap komisi yang didapat dan/atau ditolak dalam sistem kami.</p><strong>Komunikasi</strong><p>Kami bersedia memberikan keterangan untuk setiap komisi yang ditolak. Kami menerapkan komunikasi yang kuat dengan afiliasi kami dan mendorong pertanyaan dan masukan.</p>";
$debit_reason_0 = 'Nihil';
$debit_reason_1 = 'Pengembalian Uang';
$debit_reason_2 = 'Tagihan';
$debit_reason_3 = 'Penipuan Dilaporkan';
$debit_reason_4 = 'Pesanan Dibatalkan';
$debit_reason_5 = 'Pengembalian Uang Sebagian';
$menu_drop_pending_debits = 'Menunggu Debet';
$debit_amount_label = 'Nilai Debet';
$debit_date_label = 'Tanggal Debet';
$debit_reason_label = 'Alasan Debet';
$debit_paragraph = 'Debets akan dikurangi dari pembayaran Anda berikutnya.';
$debit_invoice_amount = 'Minus Nilai Debet';
$debit_revised_amount = 'Nilai Pembayaran yang Direvisi';
$mv_head_description = 'Catatan: Anda hanya dapat memasukkan satu video per halaman di website Anda.';
$mv_head_source_code = 'Tempel kode ini di bagian ATAS dokumen HTML Anda.';
$mv_body_title = 'Judul Video';
$mv_body_description = 'Deskripsi';
$mv_body_source_code = 'Tempel kode ini di bagian ISI dokumen HTML Anda dimana Anda ingin video itu muncul.';
$menu_marketing_videos = 'Video';
$mv_preview_button = 'Tinjauan Awal Video';
$dt_no_data = 'Tidak ada data tersedia di tabel.';
$dt_showing_exists = 'Menampilan entri _START_ to _END_ of _TOTAL_ .';
$dt_showing_none = 'Menampilkan 0 ke 0 dari 0 entri.';
$dt_filtered = '(difilter dari total entri _MAX_ )';
$dt_length_choice = 'Tampilkan entri _MENU_ .';
$dt_loading = 'Memuat...';
$dt_processing = 'Memproses...';
$dt_no_records = 'Tidak ada record yang cocok ditemukan.';
$dt_first = 'Pertama';
$dt_last = 'Terakhir';
$dt_next = 'Berikut';
$dt_previous = 'Sebelum';
$dt_sort_asc = ': aktifkan untuk memilah kolom dalam urutan membesar';
$dt_sort_desc = ': aktifkan untuk memilah kolom dalam urutan mengecil';
$choose_marketing_group = 'Pilih Grup Marketing';
$email_already_used_1 = 'Akun tidak bisa dibuat. Kami hanya mengizinkan';
$email_already_used_2 = 'akun';
$email_already_used_3 = 'dibuat per email.';
$missing_fax = 'Masukkan nomor fax Anda.';
$chart_last_6_months = 'Komisi yang Dibayar 6 Bulan Terakhir';
$chart_last_6_months_paid = 'Komisi Dibayar';
$chart_this_month = '5 Afiliasi Teratas Kami Bulan Ini';
$chart_this_month_none = 'Tidak ada data untuk ditampilkan.';
$login_return = 'Kembali ke Home Afiliasi';
$login_lost_details = 'Masukkan username Anda dan kami akan kirimkan Anda email dengan data pribadi login.';
$account_edit_general_prefs = 'Preferensi Umum';
$account_edit_email_language = 'Bahasa Email';
$footer_connect = 'Hubungkan Dengan Kami';
$modal_close = 'Tutup';
$vat_amount_heading = 'Nilai Pajak PPN';
$menu_logout = 'Keluar';
$menu_upload_picture = 'Upload Gambar Anda';
$menu_offer_testi = 'Berikan Testimoni';
$fb_login = 'Masuk dengan Facebook';
$fb_permissions = 'Izin tidak diberikan. Izinkan website menggunakan alamat email Anda.';
$announcements_published = "Pengumuman Dipublikasikan";
$training_videos_title = "Video Pelatihan";
$training_videos_general = "Marketing Umum";
$commission_method = "Metode Komisi";
$how_will_you_earn = "Bagaimana Anda memperoleh komisi?";
$pm_account_credit = "Kami akan memberi akun Anda kredit sejumlah komisi yang Anda dapatkan.";
$pm_check_money_order = "Kami akan kirimkan Anda cek/money order dengan pos.";
$pm_paypal = "Kami akan kirimkan Anda pembayaran dengan PayPal.";
$pm_stripe = "Kami akan kirimkan Anda pembayaran dengan Stripe.";
$pm_wire = "Kami akan kirimkan Anda transfer bank.";
$add_to_signup_left_column_text = "<span style=\"color:#CC0000; font-style:italic;\">* mengindikasikan kolom yang diperlukan.</span>";
$paypal_email = "Email Paypal";
$stripe_acct_details = "Keterangan Rinci Akun Stripe";
$stripe_connect = "Anda dapat menghubungkan akun stripe Anda dari halaman pengaturan akun setelah mendaftar.";
$stripe_success = "Akun Stripe Berhasil Terhubung";
$stripe_settings = "Pengaturan Stripe";
$stripe_connect_edit = "Hubungkan dengan Stripe";
$stripe_delete = "Hapus Akun Stripe";
$stripe_confirm = "Anda yakin mau menghapus akun ini?";
$payment_settings = "Pengaturan Pembayaran";
$edit_payment_settings = "Edit Pangaturan Pembayaran";
$invalid_paypal_address = "Alamat Email Paypal Salah.";
$payment_method_error = "Pilih metode pembayaran.";
$payment_settings_updated = "Pengaturan pembayaran di-update.";
$stripe_removed = "Akun Stripe dihapus.";
$payment_settings_success = "Berhasil!";
$payment_update_notice_1 = "Pemberitahuan!";
$payment_update_notice_2 = "Anda telah memilih untuk menerima pembayaran <strong>[payment_option_here]</strong> dari kami. <a href=\"account.php?page=48\" style=\"font-weight:bold;\">Klik di sini</a> untuk menghubungkan akun <strong>[payment_option_here]</strong> Anda.";
$pm_title_credit = "Akun Kredit";
$pm_title_mo = "Surat perintah bayar/cek";
$pm_title_paypal = "PayPal";
$pm_title_stripe = "Stripe";
$pm_title_wire = "Transfer bank";
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