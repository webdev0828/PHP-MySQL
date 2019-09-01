<?PHP

//-------------------------------------------------------
	  $language_pack_name = "japanese";
	  $language_pack_table_name = "japanese";
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
$header_title = "アフィリエイトプログラム";
$header_indexLink = "アフィリエイト ホーム";
$header_signupLink = "今すぐサインアップ";
$header_accountLink = "アカウント管理";
$header_emailLink = "お問い合わせ";
$header_greeting = "ようこそ";
$header_nonLogged = "ゲスト";
$header_logout = "ここからログアウト";
$footer_tag = "iDevAffiliateによるアフィリエイトソフトウェア";
$footer_copyright = "著作権";
$footer_rights = "全権所有";
$index_heading_1 = "当社アフィリエイトプログラムへようこそ！";
$index_paragraph_1 = "当社プログラムへの加入は簡易かつ参加無料で、サインアップは簡単で専門知識を必要としません。アフィリエイトプログラムはインターネット上で一般的でありウェブサイト所有者にウェブサイトからさらに利益を生み出す方法を提供しています。アフィリエイトは商用ウェブサイトへトラフィックおよびセールスを呼び込み、その報酬としてコミッションが支払われます。";
$index_heading_2 = "利用方法";
$index_paragraph_2 = "当社アフィリエイトプログラムに加入されると、サイト上に掲載する為のバナーやテキストリンクが提供されます。ユーザーがリンクのひとつをクリックすると当社ウェブサイトへ移動しその活動は当社アフィリエイトソフトウェアによってトラッキングされます。コミッションタイプに従ってコミッションが支払われます。";
$index_heading_3 = "リアルタイムでの策戦や報告！";
$index_paragraph_3 = "毎日２４時間ログイン可能でセールスやトラフィック、アカウント残高、バナーのパフォーマンスをチェックすることができます。";
$index_login_title = "アフィリエイトログイン";
$index_login_username = "ユーザー名";
$index_login_password = "パスワード";
$index_login_username_field = "ユーザー名";
$index_login_password_field = "パスワード";
$index_login_button = "ログイン";
$index_login_signup_link = "ここをクリックしてサインアップ";
$index_table_title = "プログラム詳細";
$index_table_commission_type = "コミッションタイプ";
$index_table_initial_deposit = "初回入金";
$index_table_requirements = "ペイアウト条件";
$index_table_duration = "ペイアウト期間";
$index_table_choose = "下記のペイアウトオプションから選択！";
$index_table_sale = "セールスごとの支払";
$index_table_click = "クリックごとの支払";
$index_table_sale_text = "セールスを記録するごとに。";
$index_table_click_text = "クリックを記録するごとに。";
$index_table_deposit_tag = "サインアップするだけで！";
$index_table_requirements_tag = "ペイアウトに必要な最低額。";
$index_table_duration_tag = "ペイアウトは月に一回、先月分が支払われます。";
$signup_left_column_text = "当社アフィリエイトプログラムに参加してセールスを生み出すたびに報酬を獲得しましょう！アカウントを作成してウェブサイトにリンクコードを載せるだけで、ウェブサイト訪問者が当社カスタマーになる度にアカウント残高が膨らんでいきます。";
$signup_left_column_title = "アフィリエイトへようこそ！";
$signup_login_title = "アカウントを作成する";
$signup_login_username = "ユーザー名";
$signup_login_password = "パスワード";
$signup_login_password_again = "パスワードの再入力";
$signup_login_minmax_chars = "- ユーザー名は最低user_min_chars文字以上でなければなりません。&lt;br /&gt;- ユーザー名にはアルファベットと数字が使用できます。&lt;br /&gt;- ユーザー名には以下の記号が使用できます：_ （アンダースコアのみ）&lt;br /&gt;- &lt;br /&gt;- パスワードは最低pass_min_chars文字以上でなければなりません。&lt;br /&gt;- パスワードにはアルファベットと数字が使用できます。&lt;br /&gt;- パスワードには以下の記号が使用できます：characters_allowed";
$signup_login_must_match = "ここの入力はパスワードと一致しなければなりません。";
$signup_standard_title = "一般情報";
$signup_standard_email = "Eメールアドレス";
$signup_standard_company = "会社名";
$signup_standard_checkspayable = "小切手の支払先";
$signup_standard_weburl = "ウェブサイトアドレス";
$signup_standard_taxinfo = "納税者番号、SSNまたはVAT";
$signup_personal_title = "個人情報";
$signup_personal_fname = "名";
$signup_personal_state = "都道府県";
$signup_personal_lname = "姓";
$signup_personal_phone = "電話番号";
$signup_personal_addr1 = "住所";
$signup_personal_fax = "Fax番号";
$signup_personal_addr2 = "追加住所";
$signup_personal_zip = "郵便番号";
$signup_personal_city = "市町村";
$signup_personal_country = "国";
$signup_commission_title = "コミッション支払";
$signup_commission_howtopay = "支払形態";
$signup_commission_style_PPS = "セールごとの支払";
$signup_commission_style_PPC = "クリックごとの支払";
$signup_terms_title = "利用規約";
$signup_terms_agree = "私は利用規約読み理解した上で合意します。";
$signup_page_button = "マイアカウントを作成する";
$signup_success_email_comment = "ユーザー名とパスワードの記載されたEメールを送信しました。<BR />\r\n将来参照するため安全な場所に保管して下さい。";
$signup_success_login_link = "自身のアカウントにログインする";
$custom_fields_title = "ユーザー定義フィールド";
$logout_msg = "<b>ログアウトしました</b><BR />当社アフィリエイトプログラムに参加頂きありがとうございます。";
$signup_page_success = "アカウントが作成されました";
$login_left_column_title = "アカウントログイン";
$login_left_column_text = "アカウント統計やバナー、リンクコード、よくある質問などへアクセスするにはユーザー名とパスワードを入力してください。<BR/ ><BR/ >もしパスワードが思い出せない場合はユーザー名を入力してください。Eメールでログイン情報を送信致します。<BR /><BR />";
$login_title = "自身のアカウントへログインする";
$login_username = "ユーザー名";
$login_password = "パスワード";
$login_invalid = "無効なログイン";
$login_now = "マイアカウントへのログイン";
$login_send_title = "パスワードが必要ですか？";
$login_send_username = "ユーザー名";
$login_send_info = "ログイン詳細がEメールに送信されました";
$login_send_pass = "Eメールに送信する";
$login_send_bad = "ユーザー名が見つかりませんでした";
$help_new_password_heading = "新しいパスワード";
$help_new_password_info = "パスワードは最低pass_min_chars文字以上でなければなりません。アルファベットと数字および以下の記号のみが使用できます：characters_allowed";
$help_confirm_password_heading = "新しいパスワードを確認";
$help_confirm_password_info = "このパスワード入力は新しいパスワード入力と一致しなければなりません。";
$help_custom_links_heading = "トラッキングキーワード";
$help_custom_links_info = "キーワードは最低３０文字以内で、文字、数字、ハイフンのみ使用可能です。";
$error_title = "以下のエラーが見つかりました";
$username_invalid = "無効のユーザー名です。アルファベットと数字およびアンダースコアのみ使用できます。";
$username_taken = "選択したユーザー名はすでに使用されています。";
$username_short = "ユーザー名が短すぎます。最低user_min_chars文字以上必要です。";
$username_long = "ユーザー名が長過ぎます。最大user_max_chars文字以下でなければなりません。";
$password_invalid = "無効のパスワードです。アルファベットと数字およびアンダースコアのみ使用できます。  characters_allowed";
$password_short = "パスワードが短すぎます。最低pass_min_chars文字以上必要です。";
$password_long = "パスワードが長過ぎます。最大pass_max_chars文字以下でなければなりません。";
$password_mismatch = "パスワード入力が一致しません。";
$missing_checks = "小切手の支払先名を入力して下さい。";
$missing_tax = "納税者番号、SSNあるいはVAT情報を入力してください。";
$missing_fname = "名前を入力して下さい。";
$missing_lname = "姓を入力して下さい。";
$missing_email = "Eメールアドレスを入力して下さい。";
$invalid_email = "Eメールアドレスが無効です。";
$missing_address = "住所を入力して下さい。";
$missing_city = "市町村を入力して下さい。";
$missing_company = "会社名を入力して下さい。";
$missing_state = "都道府県を入力して下さい。";
$missing_zip = "郵便番号を入力して下さい";
$missing_phone = "電話番号を入力して下さい。";
$missing_website = "ウェブサイトアフォレスを入力して下さい。";
$missing_paypal = "PayPalによる支払を選択されました。PayPalアカウントを入力して下さい。";
$missing_terms = "当社利用規約に同意しました。";
$paypal_required = "お支払にはPayPalアカウントが必要になります。";
$missing_custom = "次のフィールドを完成させて下さい:";
$account_total_transactions = "取引高";
$account_standard_linking_code = "スタンダードリンクコード - Eメールに最適！";
$account_copy_paste = "上のコードをウェブサイトやEメールにコピー／ペーストして下さい";
$account_not_approved = "お客様のアカウントは現在許可申請中です";
$account_suspended = "お客様のアカウントは現在利用停止中です";
$account_standard_earnings = "一般所得";
$account_inc_bonus = "ボーナスを含む";
$account_second_tier = "段階所得";
$account_recurring = "循環所得";
$account_not_available = "何もなし";
$account_earned_todate = "現時点までの総所得";
$menu_heading_overview = "アカウント概要";
$menu_general_stats = "一般統計";
$menu_tier_stats = "段階統計";
$menu_payment_history = "支払履歴";
$menu_commission_details = "コミッション詳細";
$menu_recurring_commissions = "循環コミッション";
$menu_traffic_log = "入来トラフィックログ";
$menu_heading_marketing = "マーケティング材料";
$menu_banners = "バナー";
$menu_text_ads = "テキスト広告";
$menu_text_links = "テキストリンク";
$menu_email_links = "Eメールリンク";
$menu_html_links = "HTML広告";
$menu_offline = "オフラインマーケティング";
$menu_tier_linking_code = "段階リンクコード";
$menu_email_friends = "友人にEメール &amp; 知り合い";
$menu_custom_links = "築く &amp; 自身のリンクをトラッキングする";
$menu_heading_management = "アカウント管理";
$menu_comalert = "CommissionAlertのセットアップ";
$menu_comstats = "CommissionStatsのセットアップ";
$menu_edit_account = "マイアカウントを編集する";
$menu_change_pass = "パスワードを変更する";
$menu_change_commission = "コミッションスタイルを変更する";
$menu_heading_general_info = "一般情報";
$menu_browse_affiliates = "他のアフィリエイトを閲覧する";
$menu_faq = "よくある質問";
$suspended_title = "アカウントステータスアラート";
$suspended_heading = "お客様のアカウントは現在利用停止中です";
$suspended_notes = "管理人注意書き";
$pending_title = "アカウントステータスアラート";
$pending_heading = "お客様のアカウントは現在許可申請中です";
$pending_note = "アカウントが承認されるとマーケティング材料が利用可能になります。";
$faq_title = "よくある質問";
$faq_none = "よくある質問がありません";
$browse_title = "他のアフィリエイトを閲覧する";
$browse_none = "閲覧可能な他のアフィリエイトがありません";
$change_comm_title = "コミッションスタイルを変更する";
$change_comm_curr_comm = "現在のコミッションスタイル";
$change_comm_curr_pay = "現在のペイアウトレベル";
$change_comm_new_comm = "新しいコミッションスタイル";
$change_comm_warning = "コミッションスタイルを変更するとアカウントはペイアウトレベル１にリセットされます";
$change_comm_button = "コミッションスタイルを変更する";
$change_comm_no_other = "他のコミッションスタイルがありません";
$change_comm_level = "レベル";
$change_comm_updated = "コミッションスタイルが更新されました";
$password_title = "パスワードを変更する";
$password_old_password = "古いパスワード";
$password_new_password = "新しいパスワード";
$password_confirm_password = "新しいパスワードを確認";
$password_button = "パスワードを変更する";
$password_warning_old_missing = "古いパスワードに誤りがあるか欠けています";
$password_warning_new_missing = "新しいパスワード入力が欠けています";
$password_warning_mismatch = "新しいパスワードが一致しません";
$password_warning_invalid = "無効なパスワード - ヘルプリンクをクリック";
$password_notice = "パスワードが更新されました";
$edit_failed = "更新失敗 - 上記エラー参照";
$edit_success = "アカウントが更新されました";
$edit_button = "マイアカウントを編集する";
$commissionstats_title = "コミッション統計セットアップ";
$commissionstats_info = "CommissionStatsをインストールすることで統計をWindowsのデスクトップからすぐにチェックすることができます！この機能をインストールするにはCommissionStatsをダウンロードしてハードドライブへ<a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>アンジップ</b></a>した後<b>setup.exe</b>ファイルをランします。ログイン情報を聞かれた際は以下の詳細を入力します。";
$commissionstats_hint = "ヒント: 情報を正確に入力する為にコピー＆ペースとして下さい";
$commissionstats_profile = "プロフィール名";
$commissionstats_username = "ユーザー名";
$commissionstats_password = "パスワード";
$commissionstats_id = "アフィリエイトID";
$commissionstats_source = "ソースパスURL";
$commissionstats_download = "CommissionStatsをダウンロードする";
$commissionalert_title = "CommissionAlertのセットアップ";
$commissionalert_hint = "ヒント：コピー＆は正確さを保証するため、各エントリを貼り付けます";$commissionalert_info = "CommissionAlertをインストールすることでWindowsのデスクトップ上で新しいコミッションがすぐに通知されます！この機能をインストールするには、CommissionAlertをダウンロードしてハードドライブへ<a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>アンジップ</b></a>した後<b>setup.exe</b>ファイルをランします。ログイン情報を聞かれた際は以下の詳細を入力します。";
$commissionalert_hint = "ヒント: 情報を正確に入力する為にコピー＆ペーストして下さい";
$commissionalert_profile = "プロフィール名";
$commissionalert_username = "ユーザー名";
$commissionalert_password = "パスワード";
$commissionalert_id = "アフィリエイトID";
$commissionalert_source = "ソースパスURL";
$commissionalert_download = "CommissionAlertをダウンロードする";
$offline_title = "オフラインマーケティング";
$offline_paragraph_one = "当社ウェブサイトを友人や知人に宣伝（オフライン）して報酬を得る！";
$offline_send = "カスタマー放出先";
$offline_page_link = "ページを見る";
$offline_paragraph_two = "お客様のカスタマーはあなたの<b>アフィリエイトID番号</b>を上記ページのボックス内に入力しすべての購入があなたからのアフィリエイトであることを認識します。";
$banners_title = "バナー";
$banners_size = "バナーサイズ";
$banners_description = "バナー概要";
$ad_title = "テキスト広告";
$ad_info = "提供されたリンクコードを使用することでテキスト広告のカラーや縦横を変更することができます。";
$links_title = "リンク名";
$email_title = "Eメールリンク";
$email_group = "マーケティンググループ";
$email_button = "Eメールリンクを表示する";
$email_no_group = "グループが選択されていません";
$email_choose = "上記のマーケティンググループを選択して下さい";
$email_notice = "マーケティンググループは収入の異なるトラフィックページを持つことがあります";
$email_ascii = "<b>ASCII/Textバージョン</b> - プレーンテキストEメール用。";
$email_html = "<b>HTMLバージョン</b> - HTMLフォーマットEメール用。";
$email_test = "テストリンク";
$email_test_info = "ここがあなたのカスタマーが当社ウェブサイトに移動する場所です。";
$email_source = "ソースコード - あなたのEメールメッセージにコピー／ペーストして下さい";
$html_title = "HTML広告名";
$html_view_link = "このHTML広告を見る";
$traffic_title = "インカミングトラフィックログ";
$traffic_display = "最後を表示する";
$traffic_display_visitors = "訪問者";
$traffic_button = "トラフィックログを見る";
$traffic_title_details = "インカミングトラフィック詳細";
$traffic_ip = "IPアドレス";
$traffic_refer = "参照URL";
$traffic_date = "日付";
$traffic_time = "時刻";
$traffic_bottom_tag_one = "最後を表示";
$traffic_bottom_tag_two = "の";
$traffic_bottom_tag_three = "総個人訪問者数";
$traffic_none = "トラフィックログが存在しません";
$traffic_no_url = "なし - ブックマークまたはEメールリンクの可能性";
$traffic_box_title = "完全参照URL";
$traffic_box_info = "リンクをクリックしてウェブページを訪問";
$payment_title = "支払履歴";
$payment_date = "支払日";
$payment_commissions = "コミッション";
$payment_amount = "支払額";
$payment_totals = "合計";
$payment_none = "支払履歴が存在しません";
$tier_stats_title = "段階統計";
$tier_stats_accounts = "あなたの直接所有する段階アカウント";
$tier_stats_grab_link = "段階リンクコードを取得する";
$tier_stats_none = "段階アカウントが存在しません";
$tier_stats_username = "ユーザー名";
$tier_stats_current = "現在のコミッション";
$tier_stats_previous = "過去のペイアウト";
$tier_stats_totals = "合計";
$recurring_title = "循環コミッション";
$recurring_none = "循環コミッションが存在しません";
$recurring_date = "コミッション発生日";
$recurring_status = "循環ステータス";
$recurring_payout = "次回のペイアウト";
$recurring_amount = "金額";
$recurring_every = "毎";
$recurring_in = "期間";
$recurring_days = "日";
$recurring_total = "合計";
$tlinks_title = "あなたの段階に他の人を追加してさらに収入を得よう！";
$tlinks_embedded_one = "段階サインアップクレジットは既にあなたの一般アフィリエイトリンクで有効されています！";
$tlinks_embedded_two = "この段階システムを利用すると当社アフィリエイトプログラムを他の人に売り込むことができます。下記のスペシャル段階紹介リンクを通して当社アフィリエイトプログラムに参加する人のトップの段階に立つことができます。どのように報酬を得られるかは下記を参照して下さい。";
$tlinks_embedded_current = "現在の段階ペイアウト";
$tlinks_forced_two = "この段階システムを利用すると当社アフィリエイトプログラムを他の人に売り込むことができます。下記のスペシャル段階紹介リンクを通して当社アフィリエイトプログラムに参加する人のトップの段階に立つことができます。どのように報酬を得られるかは下記を参照して下さい。";
$tlinks_forced_code = "段階紹介リンク";
$tlinks_forced_paste = "上記のコードお客様のウェブサイト上にコピー／ペーストして下さい。";
$tlinks_forced_money = "ウェブマスターはここでお金を稼ぐ！";
$comdetails_title = "コミッション詳細";
$comdetails_date = "コミッション発生日";
$comdetails_time = "コミッション発生時刻";
$comdetails_type = "コミッションタイプ";
$comdetails_status = "現在のステータス";
$comdetails_amount = "コミッション金額";
$comdetails_additional_title = "追記コミッション詳細";
$comdetails_additional_ordnum = "オーダー番号";
$comdetails_additional_saleamt = "セール金額";
$comdetails_type_1 = "ボーナスコミッション";
$comdetails_type_2 = "循環コミッション";
$comdetails_type_3 = "段階コミッション";
$comdetails_type_4 = "一般コミッション";
$comdetails_status_1 = "支払済";
$comdetails_status_2 = "承認済 - 支払手続中";
$comdetails_status_3 = "承認手続中";
$comdetails_not_available = "何もなし";
$details_title = "コミッション詳細";
$details_drop_1 = "現在の一般コミッション";
$details_drop_2 = "現在の段階コミッション";
$details_drop_3 = "コミッション承認手続中";
$details_drop_4 = "支払済一般コミッション";
$details_drop_5 = "支払済段階コミッション";
$details_button = "コミッションを見る";
$details_date = "日付";
$details_status = "ステータス";
$details_commission = "コミッション";
$details_details = "詳細を見る";
$details_type_1 = "支払済";
$details_type_2 = "支払承認手続中";
$details_type_3 = "承認済 - 支払手続中";
$details_none = "見るコミッションが存在しません";
$details_no_group = "コミッショングループが選択されていません";
$details_choose = "上記のコミッショングループを選択して下さい";
$general_title = "現在のコミッション - 最後のペイアウト以降";
$general_transactions = "お手続き";
$general_earnings_to_date = "現在までの収入";
$general_history_link = "支払い履歴を見る";
$general_standard_earnings = "一般収入";
$general_current_earnings = "現在の収入";
$general_traffic_title = "トラフィック統計";
$general_traffic_visitors = "訪問者";
$general_traffic_unique = "個人訪問者";
$general_traffic_sales = "承認済セールス";
$general_traffic_ratio = "セールス率";
$general_traffic_info = "これら統計は循環および段階コミッションを含んでいません。";
$general_traffic_pay_type = "ペイアウトタイプ";
$general_traffic_pay_level = "現在のペイアウトレベル";
$general_notes_title = "管理人からの注意書き";
$general_notes_date = "作成日";
$general_notes_to = "へ";
$general_notes_all = "すべてのアフィリエイト";
$general_notes_none = "注意書きがありません";
$contact_left_column_title = "お問い合わせ";
$contact_left_column_text = "右のフォームから当社アフィリエイトマネージャーにお気軽にお問い合わせください。";
$contact_title = "お問い合わせ";
$contact_name = "あなたの氏名";
$contact_email = "あなたのEメールアドレス";
$contact_message = "メッセージ";
$contact_chars = "残り文字数";
$contact_button = "メッセージ送信";
$contact_received = "当社ではお客様のメッセージを受信致しました。怪盗に２４時間ほどお待ちください。";
$contact_invalid_name = "無効な氏名";
$contact_invalid_email = "無効なEメールアドレス";
$contact_invalid_message = "無効なメッセージ";
$invoice_button = "インボイス";
$invoice_header = "アフィリエイト支払インボイス";
$invoice_aff_info = "アフィリエイト情報";
$invoice_co_info = "情報";
$invoice_acct_info = "アカウント情報";
$invoice_payment_info = "支払情報";
$invoice_comm_date = "支払日";
$invoice_comm_amt = "コミッション金額";
$invoice_comm_type = "コミッションタイプ";
$invoice_admin_note = "管理人注意書き";
$invoice_footer = "インボイスの終わり";
$invoice_print = "インボイスを印刷する";
$invoice_none = "何もなし";
$invoice_aff_id = "アフィリエイトID";
$invoice_aff_user = "ユーザー名";
$menu_pdf_marketing = "PDFマーケティングブロッシュアー";
$menu_pdf_training = "PDFトレーニングドキュメント";
$marketing_target_url = "ターゲットURL";
$marketing_source_code = "ソースコード - お客様のウェブサイトにコピー／ペースとして下さい";
$marketing_group = "マーケティンググループ";
$peels_title = "ページピール名";
$peels_view = "このピールを見る";
$peels_description = "ページピール概要";
$lb_head_title = "あなたのHTMLページに必要なHEADコード";
$lb_head_description = "あなたのウェブサイトでlightboxを利用されるには、表示されたいページのヘッドセクションにに下記のラインを追加することが必要になります。";
$lb_head_source_code = "このコードをあなたのHTMLドキュメントのHEADセクションにペースとしてください。";
$lb_head_code_notes = "ページ上にlightboxをいくつ追加するかに関わらず、このコードの追加が必要なのは一度だけです。";
$lb_head_tutorial = "チュートリアルを見る";
$lb_body_title = "Lightbox名";
$lb_body_description = "Lightbox概要";
$lb_body_click = "上記の画像をクリックしてlightboxを見ることができます。";
$lb_body_source_code = "このコードをあなたのHTMLドキュメントのBODYセクションのイメージを表示したい部分にペーストしてください。";
$pdf_title = "PDF";
$pdf_training = "トレーニングドキュメント";
$pdf_marketing = "マーケティングブロッシュアー";
$pdf_description_1 = "当社PDFマーケティング材料の閲覧および印刷にはAdobe Readerが必要です。";
$pdf_description_2 = "Adobe ReaderはAdobeウェブサイトから無料でダウンロードが可能です。";
$pdf_file_name = "ファイル名";
$pdf_file_size = "ファイルサイズ";
$pdf_file_description = "概要";
$pdf_bytes = "バイト数";
$menu_heading_training_materials = "トレーニング材料";
$menu_videos = "トレーニングビデオを見る";
$menu_custom_manual = "カスタムトラッキングリンクマニュアル";
$menu_page_peels = "ページピール";
$menu_lightboxes = "Lightboxes";
$menu_email_templates = "Eメールテンプレート";
$menu_heading_custom_links = "カスタムトラッキングリンク";
$menu_custom_reports = "レポート";
$menu_keyword_links = "キーワードトラッキングリンク";
$menu_subid_links = "サブアフィリエイトとラッキングリンク";
$menu_alteranate_links = "アルタネートインカミングページリンク";
$menu_heading_additional = "追加ツール";
$menu_drop_heading_stats = "一般ステータス";
$menu_drop_heading_commissions = "コミッション";
$menu_drop_heading_history = "支払履歴";
$menu_drop_heading_traffic = "トラフィックログ";
$menu_drop_heading_account = "マイアカウント";
$menu_drop_heading_logo = "ロゴをアップロードする";
$menu_drop_heading_faq = "よくある質問";
$menu_drop_general_stats = "一般統計";
$menu_drop_tier_stats = "段階統計";
$menu_drop_current = "現在のコミッション";
$menu_drop_tier = "現在の段階コミッション";
$menu_drop_pending = "承認手続中";
$menu_drop_paid = "支払済コミッション";
$menu_drop_paid_rec = "支払済段階コミッション";
$menu_drop_recurring = "有効な循環コミッション";
$menu_drop_edit = "マイアカウントを編集する";
$menu_drop_password = "パスワードを変更する";
$menu_drop_change = "コミッションスタイルを変更する";
$account_hidden = "隠された";
$keyword_title = "カスタムキーワードリンク";
$keyword_info = "カスタムキーワードリンクを作成すると様々なソースからのインカミングトラフィックをトラッキングすることができます。最大４つの異なるトラッキングキーワードおよびカスタムトラッキングのリンクを作成することでそれぞれのキーワードの詳細レポートを見ることができます。";
$keyword_heading = "カスタムキーワードトラッキングに利用可能なもの";
$keyword_tracking = "トラッキングID";
$keyword_build = "リンクを作成するには次のURLに使用したいトラッキングIDおよびキーワードを追加します。";
$keyword_example = "例";
$keyword_tutorial = "チュートリアルを見る";
$sub_tracking_title = "サブアフィリエイトトラッキング";
$sub_tracking_info = "サブアフィリエイトリンクを作成するとあなたをアフィリエイトしている人たちへアフィリエイトリンクを提供することができるようになります。当社からどのサブアフィリエイトがセールスを発生させたかを報告するため、あなたは誰があなたのためにコミッションを作り出したかを知ることができます。サブアフィリエイトリンクを使用するもうひとつの理由はあなたのレポートに独自のトラッキングシステムが欲しい場合です。";
$sub_tracking_build = "あなたのアフィリエイトプログラム上のXXXをアフィリエイトのID番号と入れ替えてください。このプロセスをすべてのアフィリエイトに同様に繰り返し行なって下さい。";
$sub_tracking_example = "例";
$sub_tracking_tutorial = "チュートリアルを見る";
$sub_tracking_id = "サブアフィリエイトID";
$alternate_title = "アルタネートインカミングページリンク";
$alternate_option_1 = "オプション1: 自動リンク作成";
$alternate_heading_1 = "自動リンク作成";
$alternate_info_1 = "トラフィックを集めたいページURLをインカミングトラフィックページとして定義付けし、当社がリンクを作成します。この機能を利用することで当社データーベース上のID番号を使いURLが含まれるより短いリンクの作成が可能になります。";
$alternate_button = "マイリンクを作成する";
$alternate_links_heading = "マイアルタネートインカミングURLリンク";
$alternate_links_note = "このページからカスタムリンクを削除しても存在するリンクはそんまま機能します。";
$alternate_links_remove = "取り除く";
$alternate_option_2 = "オプション2: マニュアルリンク作成";
$alternate_info_2 = "もしアルタネートインカミングURLを含む独自のアフィリエイトリンクを追加したいと思われる場合は次の構造を使用して下さい。";
$alternate_variable = "アルタネートインカミングURL種類";
$alternate_example = "例";
$alternate_build = "リンクを作成するには下記のURLを利用希望のアルタネートインカミングURLに追加してください。";
$alternate_none = "アルタネートインカミングリンクが作成されていません。";
$alternate_tutorial = "チュートリアルを見る";
$cr_title = "カスタムキーワードレポート";
$cr_select = "キーワードを選択";
$cr_button = "レポートを作成";
$cr_no_results = "検索結果がありません";
$cr_no_results_info = "異なるキーワードの組み合わせを試して下さい";
$cr_used = "キーワードが使用されています";
$cr_found = "このリンクは見つかりました";
$cr_times = "タイムズ";
$cr_unique = "独自のリンクが見つかりました";
$cr_detailed = "詳細リンクレポート";
$cr_export = "レポートをエクセルにエクスポートする";
$cr_none = "キーワードが見つかりません";
$logo_title = "会社ロゴをアップロードする";
$logo_info = "もしあなたが会社ロゴをアップロードしたければ、当社ウェブサイトにあなたを通して訪問されるカスタマーにはあなたのロゴを表示致します。これにより当社へ訪問されるカスタマーのサイト訪問をカスタマイズすることができます。";
$logo_bullet_one = "画像は.jpgや.gifまたは.pngが使用可能です。フラッシュコンテンツは利用不可能となっています。";
$logo_bullet_two = "いかなるふさわしくない画像も処分されアカウントは利用停止となります。";
$logo_bullet_three = "あなたの画像やロゴは当社で承認されるまでは表示されません。";
$logo_bullet_size_one = "画像の横幅は最大";
$logo_bullet_size_two = "ピクセルおよび縦の長さは最大";
$logo_bullet_req_size_one = "画像の横幅は";
$logo_bullet_req_size_two = "ピクセルおよび高さは";
$logo_bullet_pixels = "ピクセル。";
$logo_choose = "画像を選択";
$logo_file = "ファイルを選択:";
$logo_browse = "閲覧...";
$logo_button = "アップロード";
$logo_current = "現在の画像";
$logo_remove = "取り除く";
$logo_display_status = "画像ステータス:";
$logo_pending = "承認手続中";
$logo_approved = "承認済";
$logo_success = "画像はアップロードに成功し現在承認手続中です。";
$signup_security_title = "アカウント認証";
$signup_security_info = "ボックズ内のセキュリティーコードを入力して下さい。自動サインアップを防いでいます。";
$signup_security_code = "セキュリティーコード";
$sub_tracking_none = "なし";
$missing_security_code = "アカウント認証／セキュリティーコードが誤っているか欠けています";
$alternate_success_title = "リンク作成成功";
$alternate_success_info = "下記のリンクを使い定義付けされたURLへトラフィックを誘導して下さい。";
$alternate_failed_title = "リンク作成エラー";
$alternate_failed_info = "有効なURLを入力して下さい。";
$logo_missing_filename = "ファイル名を選択して下さい。";
$logo_required_width = "画像の横幅は";
$logo_required_height = "画像の縦の長さは";
$logo_maximum_width = "画像の指定横幅は";
$logo_maximum_height = "画像の指定された縦の長さは";
$logo_size_maximum = "画像サイズは最大";
$logo_bad_filetype = "画像タイプが使用できません。利用できる画像タイプは.gifや.jpgまたは.pngです。";
$logo_upload_error = "画像アップロードエラー。アフィリエイトマネージャーにお問い合わせください。";
$logo_error_title = "画像アップロードエラー";
$logo_error_bytes = "バイト。";
$excel_title = "カスタムキーワードリンクレポート";
$excel_tab_report = "カスタムキーワードレポート";
$excel_tab_logs = "トラフィックログ";
$excel_date = "レポート日:";
$excel_affiliate = "アフィリエイトID:";
$excel_criteria = "キーワードリンク必須項目";
$excel_link = "リンク構造";
$excel_hits = "ユニークヒット";
$excel_comm_stats = "コミッション統計";
$excel_comm_current = "現在のコミッション";
$excel_comm_paid = "支払済コミッション";
$excel_comm_total = "コミッション合計";
$excel_comm_ratio = "換算率";
$excel_earned = "獲得済コミッション";
$excel_earned_current = "現在のコミッション";
$excel_earned_paid = "支払済コミッション";
$excel_earned_total = "獲得済コミッション合計";
$excel_earned_tab = "トラフィックログタブ（以下）をクリックしてこのカスタムリンクのトラフィックログを見ことができます。";
$excel_log_title = "カスタムキーワードトラフィックログ";
$excel_log_ip = "IPアドレス";
$excel_log_refer = "参照URL";
$excel_log_date = "日付";
$excel_log_time = "時刻";
$excel_log_target = "ターゲットURL";
$etemplates_title = "Eメールテンプレート";
$etemplates_view_link = "このEメールテンプレートを見る";
$etemplates_name = "テンプレート名";
$signup_maintenance_heading = "メンテナンスのお知らせ";
$signup_maintenance_info = "サインアップは一時的に無効にされています。少し待ってから再試行して下さい。";
$marketing_group_title = "マーケティンググループ";
$marketing_button = "表示";
$marketing_no_group = "グループが選択されていません";
$marketing_choose = "上記のマーケティンググループを選択して下さい";
$marketing_notice = "マーケティンググループはそれぞれ収入の異なるインカミングトラフィックページを持つ場合があります";
$canspam_heading = "スパム規制法と承諾";
$canspam_accept = "私はスパム規制法について読み、理解した上で同意します。";
$canspam_error = "あなたは当社スパム規制法に同意していません。";
$signup_banned = "アカウント作成時にエラーが発生しました。さらに情報を得たい場合はシステム管理人へお問い合わせください。";
$header_testimonials = "アフィリエイト体験談";
$testi_visit = "ウェブサイト訪問";
$testi_description = "当社アフィリエイトプログラムを利用した体験談をお寄せください。当社の &lt;a href=&quot;testimonials.php&quot;&gt;testimonials&lt;/a&gt; ページにあなたのウェブサイトへのリンク付きで掲載致します。";
$testi_name = "氏名";
$testi_url = "ウェブサイトURL";
$testi_content = "体験談";
$testi_code = "セキュリティーコード";
$testi_submit = "体験談を送信する";
$testi_na = "体験談がありません。";
$testi_title = "体験談を提供";
$testi_success_title = "体験談成功";
$testi_success_message = "体験談を送っていただきありがとうございます。当社チームがすぐに確認致します。";
$testi_error_title = "体験談エラー";
$testi_error_name_missing = "体験談には氏名を含めて下さい。";
$testi_error_url_missing = "体験談にはあなたのウェブサイトURLを含めて下さい。";
$testi_error_missing = "体験談にテキストを含めて下さい。";
$menu_drop_delayed = "待機中コミッション";
$details_drop_6 = "現在の待機中コミッション";
$details_type_6 = "待機中 - 間もなく承認されます";
$comdetails_status_6 = "待機中 - 間もなく承認されます";
$tc_reaccept_title = "利用規約変更通知";
$tc_reaccept_sub_title = "アカウントにアクセスするには当社新規利用規約に同意する必要があります。";
$tc_reaccept_button = "私は利用規約を読み、理解した上で同意します。";
$tlinks_active = "有効な段階の数";
$tlinks_payout_structure = "段階ペイアウト構造";
$tlinks_level = "レベル";
$tierText1 = "%が参照アフィリエイトのコミッション金額からの算出。";
$tierText2 = "%が上位段階のコミッション金額から算出。";
$tierText3 = "%がセール学から算出。";
$tierTextflat = "一定率。";
$edit_custom_button = "答えを編集する";
$private_heading = "プライベートサインアップ";
$private_info = "当社アフィリエイトプログラムは一般公開されておらず参加にはサインアップコードが必要です。サインアップコードを取得するための情報はこちらから。";
$private_required_heading = "サインアップコードが必要です";
$private_code_title = "サインアップコードを入力";
$private_button = "コードを送信";
$private_error_title = "無効なサインアップコードです";
$private_error_invalid = "あなたの提供したサインアップコードは無効です。";
$private_error_expired = "あなたの提供したサインアップコードは期限が切れているため無効です。";
$qr_code_title = "QRコード";
$qr_code_size = "QRコードサイズ";
$qr_code_button = "QRコードを表示";
$qr_code_offline_title = "オフラインマーケティング";
$qr_code_offline_content1 = "このQRコードをマーケティングブロッシュアーやビラ、ビジネスカードなどに追加してください。";
$qr_code_offline_content2 = "- 画像を右クリックし &lt;strong&gt;save-as&lt;/strong&gt; あなたのコンピューターに保存して下さい。";
$qr_code_online_title = "オンラインンマーケティング";
$qr_code_online_content = "このQRコードをウェブサイトやソーシャルメディア、ブログなどに追加して下さい。";
$menu_coupon = "クーポンコード";
$coupon_title = "利用可能なクーポンコード";
$coupon_desc = "これらのクーポンコードを贈与してクーポンコードを誰かが利用するたびにコミッションを獲得！";
$coupon_head_1 = "クーポンコード";
$coupon_head_2 = "カスタマー割引";
$coupon_head_3 = "コミッション金額";
$coupon_sale_amt = "セール金額の";
$coupon_flat_rate = "一定率";
$coupon_default = "デフォルトペイアウトレベル";
$cc_vanity_title = "自分だけのクーポンコードをリクエストする";
$cc_vanity_field = "クーポンコード";
$cc_vanity_button = "クーポンコードをリクエストする";
$cc_vanity_error_missing = "<strong>エラー！</strong> クーポンコードを入力して下さい。";
$cc_vanity_error_exists = "<strong>エラー！</strong> すでにこのコードをリクエストしています。承認待ちをしています。";
$cc_vanity_error = "<strong>エラー！</strong> クーポンコードが無効です。文字、数字、アンダースコアのみを使用して下さい。";
$cc_vanity_success = "<strong>成功！</strong> あなただけのクーポンコードがリクエストされました。";
$coupon_none = "現在取得可能なクーポンコードがありません。";
$pic_error_title = "画像アップロードエラー";
$pic_missing = "ファイル名を選択して下さい。";
$pic_invalid = "画像タイプが使用できません。画像タイプは.gifや.jpgまたは.pngのみが使用可能です。";
$pic_error = "画像アップロードエラー。アフィリエイト管理者へお問い合わせください。";
$pic_success = "画像のアップロードに成功しました。";
$pic_title = "画像をアップロードする";
$pic_info = "画像をアップロードすることでよりパーソナライズすることができます。";
$pic_bullet_1 = "画像には.jpgや.gifまたは.pngが使用できます。";
$pic_bullet_2 = "いかなる不適切な画像も処分されアカウントは利用停止となります。";
$pic_bullet_3 = "あなたの画像は公開されません。当社用にあなたのアカウントへ添付されます。";
$pic_file = "ファイルを選択:";
$pic_button = "アップロード";
$pic_current = "現在の画像";
$pic_remove = "画像を取り除く";
$progress_title = "次回ペイアウトの為の条件:";
$progress_complete = "完了。";
$progress_none = "ペイアウトの最低額はありません。";
$progress_sentence_1 = "獲得しました";
$progress_sentence_2 = "の";
$progress_sentence_3 = "条件。";
$aff_lib_button = "<b>無料アクセスを獲得！</b><BR />www.AffiliateLibrary.com";
$menu_announcements = "ソーシャルメディアキャンペーン";
$announcements_name = "キャンペーン名";
$announcements_facebook_message = "フェイスブックメッセージ";
$announcements_twitter_message = "ツイッターメッセージ";
$announcements_facebook_link = "フェイスブックリンク";
$announcements_facebook_picture = "フェイスブック写真";
$general_last_30_days_activity = "過去３０日の活動";
$general_last_30_days_activity_traffic = "トラフィック";
$general_last_30_days_activity_commissions = "コミッション";
$accountability_title = "責任とコミュニケーション";
$accountability_text = "<strong>これは何？</strong><p>当社はアフィリエイトパートナーとの信頼関係の構築を慎重に行なっております。当システム内で獲得または拒否されたひとつひとつのコミッションに関してできる限りの情報を提供しようと尽力しております。当社ではアフィリエイトとのコミュニケーションに重きを置き質問やフィードバックを歓迎しています。</p>";
$debit_reason_0 = "なし";
$debit_reason_1 = "返金";
$debit_reason_2 = "チャージバック";
$debit_reason_3 = "詐欺の報告";
$debit_reason_4 = "オーダーのキャンセル";
$debit_reason_5 = "一部返金";
$menu_drop_pending_debits = "デビット承認手続中";
$debit_amount_label = "デビット金額";
$debit_date_label = "デビット日付";
$debit_reason_label = "デビット理由";
$debit_paragraph = "デビットが次回のペイアウトから差し引かれます。";
$debit_invoice_amount = "マイナスデビット額";
$debit_revised_amount = "改訂支払額";
$mv_head_description = "注: ウェブサイト上には１ページにつき１動画のみ使用できます。";
$mv_head_source_code = "HTMLドキュメントのHEADセクションにこのコードをペースとして下さい。";
$mv_body_title = "ビデオタイトル";
$mv_body_description = "概要";
$mv_body_source_code = "HTMLドキュメントのBODYセクションのビデオを表示したい場所にこのコードをペーストして下さい。";
$menu_marketing_videos = "ビデオ";
$mv_preview_button = "ビデオをプレビューする";
$dt_no_data = "テーブルにデータが存在しません。";
$dt_showing_exists = "_TOTAL_エントリーの_START_から_END_を表示する。";
$dt_showing_none = "0エントリーの0から0を表示する。";
$dt_filtered = "(_MAX_総エントリーからフィルター処理)";
$dt_length_choice = "_MENU_エントリーを表示する。";
$dt_loading = "ロード中...";
$dt_processing = "処理中...";
$dt_no_records = "一致する履歴が見つかりませんでした。";
$dt_first = "最初";
$dt_last = "最後";
$dt_next = "次";
$dt_previous = "前";
$dt_sort_asc = ": コラム昇順ソートの有効化";
$dt_sort_desc = ": コラム降順ソートの有効化";
$choose_marketing_group = "マーケティンググループを選択";
$email_already_used_1 = "アカウント作成に失敗しました。当社で唯一許可しているのは";
$email_already_used_2 = "アカウント";
$email_already_used_3 = "Eメールアドレスごとによる作成。";
$missing_fax = "fax番号を入力して下さい。";
$chart_last_6_months = "過去６ヶ月の支払済コミッション";
$chart_last_6_months_paid = "コミッションが支払われました";
$chart_this_month = "今月の当社トップ５アフィリエイト";
$chart_this_month_none = "表示するデータがありません。";
$login_return = "アフィリエイトホームへ戻る";
$login_lost_details = "ユーザー名を入力して下さい。当社からログイン証明を含むEメールを送信致します。";
$account_edit_general_prefs = "一般選択";
$account_edit_email_language = "Eメール言語";
$footer_connect = "当社と繋がる";
$modal_close = "閉じる";
$vat_amount_heading = "VAT金額";
$menu_logout = "ログアウト";
$menu_upload_picture = "写真をアップロードする";
$menu_offer_testi = "体験談を提供する";
$fb_login = "フェイスブックを使ってログインする";
$fb_permissions = "許可が下りませんでした。ウェブサイトによるEメールアドレスの使用を許可して下さい。";
$announcements_published = "お知らせ公開";
$training_videos_title = "トレーニングビデオ";
$training_videos_general = "ジェネラルマーケティング";
$commission_method = "コミッションメソッド";
$how_will_you_earn = "コミッションを得るには?";
$pm_account_credit = "当社があなたの口座にコミッション額を入金します。";
$pm_check_money_order = "郵送にて小切手またはマネーオーダーをお送りします。";
$pm_paypal = "PayPalにてお支払いします。";
$pm_stripe = "Stripeにてお支払いします。";
$pm_wire = "銀行口座へ送金します。";
$add_to_signup_left_column_text = "<span style=\"color:#CC0000; font-style:italic;\">*は必須項目を指します。</span>";
$paypal_email = "Paypal Eメールアドレス";
$stripe_acct_details = "Stripeアカウント詳細";
$stripe_connect = "サインアップ後にアカウント設定からStripeアカウント設定に接続できます。";
$stripe_success = "Stripeアカウントへの接続に成功しました";
$stripe_settings = "Stripe設定";
$stripe_connect_edit = "Stripeに接続する";
$stripe_delete = "Stripeアカウントを削除する";
$stripe_confirm = "このアカウントを削除してもよろしいですか?";
$payment_settings = "お支払い設定";
$edit_payment_settings = "お支払い設定の変更";
$invalid_paypal_address = "無効なPaypalメールアドレス。";
$payment_method_error = "お支払い方法を選択してください。";
$payment_settings_updated = "お支払い方法が更新されました。";
$stripe_removed = "Stripeアカウントを削除しました。";
$payment_settings_success = "成功";
$payment_update_notice_1 = "通知";
$payment_update_notice_2 = "あなたは <strong>[payment_option_here]</strong> をお支払い方法として選択されました。どうか <a href=\"account.php?page=48\" style=\"font-weight:bold;\">ここをクリック</a> して<strong>[payment_option_here]</strong> のアカウントと接続してください。";
$pm_title_credit = "アカウントクレジット";
$pm_title_mo = "チェック/マネーオーダー";
$pm_title_paypal = "PayPal";
$pm_title_stripe = "Stripe";
$pm_title_wire = "銀行振込";
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