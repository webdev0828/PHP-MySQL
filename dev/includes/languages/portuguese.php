<?PHP

//-------------------------------------------------------
	  $language_pack_name = "portuguese";
	  $language_pack_table_name = "portuguese";
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
$header_title = "Programa de Afiliados";
$header_indexLink = "Início";
$header_signupLink = "Inscreva-se Agora";
$header_accountLink = "Gerenciar Conta";
$header_emailLink = "Fale Conosco";
$header_greeting = "Bem vindo";
$header_nonLogged = "Convidado";
$header_logout = "Logout Aqui";
$footer_tag = "Affiliate Software By iDevAffiliate";
$footer_copyright = "Copyright 2006";
$footer_rights = "Todos os Direitos Reservados";
$index_heading_1 = "Bem Vindo ao Nosso Programa de Afiliados!";
$index_paragraph_1 = "Nosso programa é grátis para participar, fácil de se registrar e não exige nenhum conhecimento técnico. Programas de Afiliados são comuns na Internet e oferecem aos donos de website uma forma adicional de lucrar com seus websites.Afiliados geram tráfego e vendas para websites comerciais e em troca recebem um pagamento de comissões.";
$index_heading_2 = "Como Isto Funciona?";
$index_paragraph_2 = "Quando você participa do nosso programa de afiliados, você receberá uma gama de banners e links de texto que você coloca dentro do seu site. Quando um usuário clicar em um dos seus links, eles serão trazidos ao nosso website e suas atividades serão acompanhadas por nosso software afiliado. Você receberá uma comissão baseado no seu tipo de comissão.";
$index_heading_3 = "Estatísticas e Relatórios em Tempo real!";
$index_paragraph_3 = "Login 24 horas por dia para verificar suas vendas, tráfego, saldo da conta e ver como seus banners estão desempenhando.";
$index_login_title = "Login de Afiliado";
$index_login_username = "Nome de usuário";
$index_login_password = "Senha";
$index_login_username_field = "nome de usuário";
$index_login_password_field = "senha";
$index_login_button = "Login";
$index_login_signup_link = "Clique Aqui para se Inscrever";
$index_table_title = "Detalhes do Programa";
$index_table_commission_type = "Tipo de Comissão";
$index_table_initial_deposit = "Depósito Inicial";
$index_table_requirements = "Requisitos de Pagamento";
$index_table_duration = "Duração do Pagamento";
$index_table_choose = "Selecione das seguintes opções de pagamento!";
$index_table_sale = "Pay-Per-Sale (pagamento-por-venda)";
$index_table_click = "Pay-Per-Click (pagamento-por-clique)";
$index_table_sale_text = "para cada venda que você entregar.";
$index_table_click_text = "para cada clique que você entregar.";
$index_table_deposit_tag = "Só para se inscrever!";
$index_table_requirements_tag = "Saldo mínimo necessário para pagamento.";
$index_table_duration_tag = "Pagamentos são feitos mensalmente, para o mês anteiror.";
$signup_left_column_text = "Junte-se ao nosso programa de afiliados e comece a ganhar dinheiro para cada venda que você nos mandar!Simplesmente crie sua conta, coloque seu código de ligação (linking) no seu website e veja o saldo de sua conta crescer enquanto seus visitantes se tornam nossos clientes.";
$signup_left_column_title = "Bem Vindo Afiliado!";
$signup_login_title = "Crie Sua Conta";
$signup_login_username = "Nome de usuário";
$signup_login_password = "Senha";
$signup_login_password_again = "Senha Novamente";
$signup_login_minmax_chars = "- O nome de usuário deve ter pelo menos user_min_chars caracteres.&lt;br /&gt;- O nome de usuário pode ser alfanumérico.&lt;br /&gt;- O nome de usuário pode conter os seguintes caracteres: _ (apenas underscores)&lt;br /&gt;&lt;br /&gt;- A senha deve ter pelo menos pass_min_chars caracteres.&lt;br /&gt;- A senha pode ser alfanumérica.&lt;br /&gt;- A senha pode conter os seguintes caracteres:  characters_allowed";
$signup_login_must_match = "Esta entrada precisa combinar com sua Senha.";
$signup_standard_title = "Informações Padrão";
$signup_standard_email = "Endereço de e-mail";
$signup_standard_company = "Nome da Empresa";
$signup_standard_checkspayable = "Cheques Nominais Para";
$signup_standard_weburl = "Endereço do Website";
$signup_standard_taxinfo = "CIC ou CNPJ";
$signup_personal_title = "Informações Pessoais";
$signup_personal_fname = "Primeiro Nome";
$signup_personal_state = "Estado ou Província";
$signup_personal_lname = "Sobrenome";
$signup_personal_phone = "Telefone";
$signup_personal_addr1 = "Endereço Residencial";
$signup_personal_fax = "Fax";
$signup_personal_addr2 = "Endereço Adicional";
$signup_personal_zip = "Código Postal";
$signup_personal_city = "Cidade";
$signup_personal_country = "País";
$signup_commission_title = "Pagamento de Comissão";
$signup_commission_howtopay = "Como devemos pagá-lo?";
$signup_commission_style_PPS = "Pay-Per-Sale (pagamento-por-venda)";
$signup_commission_style_PPC = "Pay-Per-Click (pagamento-por-clique)";
$signup_terms_title = "Termos e Condições";
$signup_terms_agree = "Eu li, entendi e concordo com os termos e condições acima.";
$signup_page_button = "Criar Minha Conta";
$signup_success_email_comment = "Nós lhe enviamos um e-mail com seu Nome de usuário e Senha.<BR />Guarde-os num local seguro para referências futuras.";
$signup_success_login_link = "Login Da Sua Conta";
$custom_fields_title = "Campos Definidos pelo Usuário";
$logout_msg = "<b>Você Agora Está Desconectado</b><BR />Muito obrigado por sua participação no nosso programa de afiliados.";
$signup_page_success = "Sua Conta Foi Criada";
$login_left_column_title = "Login da Conta";
$login_left_column_text = "Entre seu nome de usuário e senha para ganhar acesso às estatísticas de sua conta, banners, códigos de links, Perguntas Freqüentes e mais.<BR/ ><BR/ >Se você não puder lembrar da sua senha, entre seu nome de usuário e iremos lhe enviar as informações de login via e-mail.<BR /><BR />";
$login_title = "Login Da Sua Conta";
$login_username = "Nome de usuário";
$login_password = "Senha";
$login_invalid = "Login inválido";
$login_now = "Login Da Minha Conta";
$login_send_title = "Precisa Sua Senha?";
$login_send_username = "Entre Seu Nome de usuário";
$login_send_info = "Detalhes de Login Enviados Para o E-mail";
$login_send_pass = "Enviar Para E-mail";
$login_send_bad = "Nome de Usuário Não Encontrado";
$help_new_password_heading = "Nova Senha";
$help_new_password_info = "Sua senha deve ter pelo menos pass_min_chars caracteres. Só pode conter letras, números e os seguintes caracteres:  characters_allowed";
$help_confirm_password_heading = "Confirme a Nova Senha";
$help_confirm_password_info = "Esta entrada de senha precisa combinar com sua Nova Senha.";
$help_custom_links_heading = "Acompanhamento de Palavra-chave";
$help_custom_links_info = "Sua palavra-chave não pode ter mais de 30 dígitos. Só pode conter letras, números e hífens";
$error_title = "Os Seguintes Erros Foram Encontrados";
$username_invalid = "Nome de usuário inválido. Só pode conter letras, números e underscores.";
$username_taken = "O nome de usuário que você selecionou já está sendo utilizado.";
$username_short = "Seu nome de usuário é muito curto, precisa ter pelo menos 4 caracteres.";
$username_long = "Seu nome de usuário é muito longo, precisa ter no máximo 12 caracteres.";
$password_invalid = "Senha inválida. Só pode conter letras, números e os seguintes caracteres:  characters_allowed";
$password_short = "Sua senha é muito curta, precisa ter pelo menos 4 caracteres.";
$password_long = "Sua senha é muito longa, precisa ter no máximo 12 caracteres.";
$password_mismatch = "Suas entradas de senha não combinam.";
$missing_checks = "Favor digitar um nome para o qual emitir os cheques nominais.";
$missing_tax = "Favor entrar com suas informações de CIC ou CNPJ.";
$missing_fname = "Favor colocar seu primeiro nome.";
$missing_lname = "Favor colocar seu sobrenome.";
$missing_email = "Favor colocar seu endereço de e-mail.";
$invalid_email = "Seu endereço de e-mail é inválido.";
$missing_address = "Favor colocar seu endereço residencial.";
$missing_city = "Favor entrar o nome da sua cidade.";
$missing_company = "Favor colocar o nome da sua empresa.";
$missing_state = "Favor colocar seu estado ou província.";
$missing_zip = "Favor colocar seu código postal";
$missing_phone = "Favor colocar seu número de telefone.";
$missing_website = "Favor colocar seu endereço de website.";
$missing_paypal = "Você escolheu receber pagamentos por PayPal, entre com sua conta de PayPal.";
$missing_terms = "Você não aceitou nossos termos e condições.";
$paypal_required = "Uma conta de PayPal é necessária para o pagamento.";
$missing_custom = "Favor completar o campo chamado:";
$account_total_transactions = "Total de Transações";
$account_standard_linking_code = "Código Padrão de Link – Ótimo Para Uso em E-mails!";
$account_copy_paste = "Copiar/Colar o Código Acima no Seu Website ou E-mails";
$account_not_approved = "Sua Conta está Atualmente Pendente de Aprovação";
$account_suspended = "Sua Conta Está Atualmente Suspensa";
$account_standard_earnings = "Rendimentos-Padrão";
$account_inc_bonus = "inclui bônus";
$account_second_tier = "Rendimento de Filas";
$account_recurring = "Rendimentos Recorrentes";
$account_not_available = "N/A";
$account_earned_todate = "Total Ganho Até a Data";
$menu_heading_overview = "Vista Geral da Conta";
$menu_general_stats = "Estatísticas Gerais";
$menu_tier_stats = "Estatísticas de Filas";
$menu_payment_history = "Histórico de Pagamentos";
$menu_commission_details = "Detalhes de Comissões";
$menu_recurring_commissions = "Comissões Recorrentes";
$menu_traffic_log = "Controle de Tráfego Entrando";
$menu_heading_marketing = "Materiais de Marketing";
$menu_banners = "Banners";
$menu_text_ads = "Anúncios de texto";
$menu_text_links = "Links de texto";
$menu_email_links = "Links de e-mail";
$menu_html_links = "Anúncios HTML";
$menu_offline = "Marketing Offline";
$menu_tier_linking_code = "Código de Link de Filas";
$menu_email_friends = "E-mail Amigos & Associados";
$menu_custom_links = "Construa & Acompanhe Seus Próprios Links";
$menu_heading_management = "Gerenciamento de Conta";
$menu_comalert = "Configuração do CommissionAlert";
$menu_comstats = "Configuração do CommissionStats";
$menu_edit_account = "Editar Minha Conta";
$menu_change_pass = "Mudar Minha Senha";
$menu_change_commission = "Mudar Meu Estilo de Comissão";
$menu_heading_general_info = "Informações Gerais";
$menu_browse_affiliates = "Navegar por Outros Afiliados";
$menu_faq = "Perquntas Freqüentes";
$suspended_title = "Alerta de Status de Conta";
$suspended_heading = "Sua Conta Está Atualmente Suspensa";
$suspended_notes = "Notas do Administrador";
$pending_title = "Alerta de Status de Conta";
$pending_heading = "Sua Conta está Atualmente Pendente de Aprovação";
$pending_note = "Assim que aprovarmos sua conta, os materiais de marketing serão disponibilizados para você.";
$faq_title = "Perquntas Freqüentes";
$faq_none = "Sem Perguntas Freqüentes Ainda";
$browse_title = "Navegar por Outros Afiliados";
$browse_none = "Sem Outros Afiliados Para Ver";
$change_comm_title = "Mudar Estilo de Comissão";
$change_comm_curr_comm = "Estilo de Comissão Atual";
$change_comm_curr_pay = "Nível de Pagamento Atual";
$change_comm_new_comm = "Novo Estilo de Comissão";
$change_comm_warning = "Se Você Mudar Estilos de Comissão, Sua Conta Será Restaurada Para Nível de Pagamento 1";
$change_comm_button = "Mudar Estilos de Comissão";
$change_comm_no_other = "Nenhum Outro Estilo de Comissão Disponível";
$change_comm_level = "Nível";
$change_comm_updated = "Estilo de Comissão Atualizado";
$password_title = "Mudar Minha Senha";
$password_old_password = "Senha Antiga";
$password_new_password = "Nova Senha";
$password_confirm_password = "Confirme a Nova Senha";
$password_button = "Mudar Senha";
$password_warning_old_missing = "Senha Antiga Está Incorreta ou Faltando";
$password_warning_new_missing = "Faltando Entrada da Nova Senha";
$password_warning_mismatch = "Nova Senha Não Combina";
$password_warning_invalid = "Senha Inválida – Clique Os Links de Ajuda";
$password_notice = "Senha Atualizada";
$edit_failed = "Atualização Falhou – Ver Erros Acima";
$edit_success = "Conta Atualizada";
$edit_button = "Editar Minha Conta";
$commissionstats_title = "Configuração do CommissionStats";
$commissionstats_info = "Ao instalar o CommissionStats você pode verificar instantaneamente seu status, direto do seu Windows desktop! Para instalar esta característica, baixe (download) CommissionStats e <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>unzip</b></a> o pacote para seu disco rígido e rode o <b>setup.exe</b> arquivo. Quando for solicitado para suas informações de login, entre os seguintes detalhes.";
$commissionstats_hint = "Dica Copiar & Colar Cada Entrada Para Garantir Precisão";
$commissionstats_profile = "Nome do Perfil";
$commissionstats_username = "Nome de usuário";
$commissionstats_password = "Senha";
$commissionstats_id = "ID de Afiliado";
$commissionstats_source = "Trilha Fonte URL";
$commissionstats_download = "Baixar (Download) CommissionStats";
$commissionalert_title = "Configuração do CommissionAlert";
$commissionalert_info = "Ao instalar o CommissionAlert iremos notificá-lo instantaneamente de novas comissões direto no seu Windows desktop!Para instalar esta característica, baixe (download) CommissionAlert e <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>unzip</b></a> o pacote para seu disco rígido depois rode o <b>setup.exe</b> arquivo. Quando solicitado para suas informações de login, entre os seguintes detalhes.";
$commissionalert_hint = "Dica Copiar & Colar Cada Entrada Para Garantir Precisão";
$commissionalert_profile = "Nome do Perfil";
$commissionalert_username = "Nome de usuário";
$commissionalert_password = "Senha";
$commissionalert_id = "ID de Afiliado";
$commissionalert_source = "Trilha Fonte URL";
$commissionalert_download = "Baixar (Download) CommissionAlert";
$offline_title = "Marketing Offline";
$offline_paragraph_one = "Ganhe dinheiro promovendo nosso website (offline) para seus amigos e associados!";
$offline_send = "Enviar Clientes para";
$offline_page_link = "ver página";
$offline_paragraph_two = "Seus clientes entrarão no seu <b>número de ID de Afiliado</b> no box na página acima que irá registrar você como o afiliado em todas as compras que eles fizerem.";
$banners_title = "Banners";
$banners_size = "Tamanho do Banner";
$banners_description = "Descrição do Banner";
$ad_title = "Anúncios de texto";
$ad_info = "Usando o cógido de lilnk fornecido, você pode ajustar o <b>esquema de cor</b>, <b>altura</b> e <b>largura</b> do seu Anúncio de Texto para integrar facilmente com seu site!";
$links_title = "Links de texto";
$email_title = "Links de e-mail";
$email_group = "Grupo de Marketing";
$email_button = "Mostrar Links de E-mail";
$email_no_group = "Nenhum Grupo Selecionado";
$email_choose = "Favor Selecionar Um Grupo de Marketing Acima";
$email_notice = "Grupos de Marketing Podem Ter Diferentes Páginas de Tráfego de Entrada";
$email_ascii = "<b>ASCII/Versão Texto</b> - para uso em e-mail de Texto Simples.";
$email_html = "<b>Versão HTML</b> - para uso em e-mails em formato HTML.";
$email_test = "Link de Teste";
$email_test_info = "É para onde seus clientes serão enviados dentro do nosso website.";
$email_source = "Código da FonteCopiar/Colar Na Sua Mensagem de E-mail";
$html_title = "Anúncios HTML";
$html_view_link = "Ver Este Anúncio HTML";
$traffic_title = "Controle de Tráfego Entrando";
$traffic_display = "Mostrar Último";
$traffic_display_visitors = "Visitantes";
$traffic_button = "Ver Controle Tráfego";
$traffic_title_details = "Detalhes de Tráfego Entrando";
$traffic_ip = "Endereço de IP";
$traffic_refer = "URL Referência";
$traffic_date = "Data";
$traffic_time = "Tempo";
$traffic_bottom_tag_one = "Mostrando Último";
$traffic_bottom_tag_two = "Do";
$traffic_bottom_tag_three = "Total de Visitantes Exclusivos";
$traffic_none = "Não Existe Controle de Tráfego";
$traffic_no_url = "N/A - Possível Bookmark ou Link de E-mail";
$traffic_box_title = "URL Referência Completa";
$traffic_box_info = "Clique O Link Para Visitar A Webpage";
$payment_title = "Histórico de Pagamentos";
$payment_date = "Data de Pagamento";
$payment_commissions = "Comissões";
$payment_amount = "Valor Total do Pagamento";
$payment_totals = "Totais";
$payment_none = "Não Existe Histórico de Pagamento";
$tier_stats_title = "Estatísticas de Filas";
$tier_stats_accounts = "Contas de Filas";
$tier_stats_grab_link = "Pegue Seu Código de Link de Filas";
$tier_stats_none = "Não Existe Conta de Filas";
$tier_stats_username = "Nome de usuário";
$tier_stats_current = "Comissões Atuais";
$tier_stats_previous = "Pagamentos Anteriores";
$tier_stats_totals = "Totais";
$recurring_title = "Comissões Recorrentes";
$recurring_none = "Não Existem Comissões Recorrentes";
$recurring_date = "Data da Comissão";
$recurring_status = "Status Recorrente";
$recurring_payout = "Próximo Pagamento";
$recurring_amount = "Valor Total";
$recurring_every = "Cada";
$recurring_in = "Neste";
$recurring_days = "Dias";
$recurring_total = "Total";
$tlinks_title = "Adicione Outros A Sua Fileira E Faça Dinheiro Com Eles Também!";
$tlinks_embedded_one = "Crédito de Inscrição de Fileiras Já Está Ativo No Seu Link Padrão de Afiliados!";
$tlinks_embedded_two = "Você Se Tornará o Primeiro da Fila para qualquer um que se juntar no nosso programa de afiliados através do seu link de afiliados.";
$tlinks_embedded_current = "Pagamento Atual de Filas";
$tlinks_forced_two = "Use o seguinte código para promover nosso programa de afiliados para outros donos de website.";
$tlinks_forced_code = "Código de Linking Textual";
$tlinks_forced_paste = "Copiar/Colar o Código Acima no Seu Website";
$tlinks_forced_money = "Webmasters Ganham Dinheiro Aqui!";
$comdetails_title = "Detalhes de Comissões";
$comdetails_date = "Data da Comissão";
$comdetails_time = "Tempo da Comissão";
$comdetails_type = "Tipo de Comissão";
$comdetails_status = "Status Atual";
$comdetails_amount = "Valor Total da Comissão";
$comdetails_additional_title = "Detalhes Adicionais da Comissão";
$comdetails_additional_ordnum = "Número de Ordem";
$comdetails_additional_saleamt = "Valor Total da Venda";
$comdetails_type_1 = "Comissão de Bônus";
$comdetails_type_2 = "Comissão Recorrente";
$comdetails_type_3 = "Comissão de Filas";
$comdetails_type_4 = "Comissão Padrão";
$comdetails_status_1 = "Pago";
$comdetails_status_2 = "Aprovado – Pagamento Pendente";
$comdetails_status_3 = "Aprovação Pendente";
$comdetails_not_available = "N/A";
$details_title = "Detalhes da Comissão";
$details_drop_1 = "Comissões Padrão Atuais";
$details_drop_2 = "Comissões de Filas Atuais";
$details_drop_3 = "Comissões Pendentes de Aprovação";
$details_drop_4 = "Comissões Padrão Pagas";
$details_drop_5 = "Comissões de Filas Pagas";
$details_button = "Ver Comissões";
$details_date = "Data";
$details_status = "Status";
$details_commission = "Comissão";
$details_details = "Ver Detalhes";
$details_type_1 = "Pago";
$details_type_2 = "Aprovação Pendente";
$details_type_3 = "Aprovado – Pagamento Pendente";
$details_none = "Nenhuma Comissão Para Ver";
$details_no_group = "Nenhum Grupo de Comissão Selecionado";
$details_choose = "Favor Selecionar Um Grupo de Comissão Acima";
$general_title = "Comissões Atuais – Do Último Pagamento Até a Data";
$general_transactions = "Transações";
$general_earnings_to_date = "Ganhos Até a Data";
$general_history_link = "Ver Histórico de Pagamentos";
$general_standard_earnings = "Rendimentos-Padrão";
$general_current_earnings = "Rendimentos Atuais";
$general_traffic_title = "Estatísticas de Tráfego";
$general_traffic_visitors = "Visitantes";
$general_traffic_unique = "Visitores Exclusivos";
$general_traffic_sales = "Vendas Totais";
$general_traffic_ratio = "Taxa de Vendas";
$general_traffic_info = "<b>Vendas Totais</b> e <b>Taxa de Vendas</b><BR />Estas estatísticas não incluem comissões recorrentes ou de filas.";
$general_traffic_pay_type = "Tipo de Pagamento";
$general_traffic_pay_level = "Nível de Pagamento Atual";
$general_notes_title = "Notas Do Administrador";
$general_notes_date = "Data de Criação";
$general_notes_to = "Para";
$general_notes_all = "Todos Afiliados";
$general_notes_none = "Nenhuma Nota Para Ver";
$contact_left_column_title = "Fale Conosco";
$contact_left_column_text = "Sinta-se à vontade para contatar nosso administrador de afiliados usando o formulário da direita";
$contact_title = "Fale Conosco";
$contact_name = "Seu Nome";
$contact_email = "Seu Endereço de E-mail";
$contact_message = "Mensagem";
$contact_chars = "caracteres remanescentes";
$contact_button = "Enviar Mensagem";
$contact_received = "Nós recebemos sua mensagem, aguarde uma resposta dentro de 24 horas.";
$contact_invalid_name = "Nome Inválido";
$contact_invalid_email = "Endereço de E-mail Inválido";
$contact_invalid_message = "Mensagem Inválida";
$invoice_button = "Invoice";
$invoice_header = "INVOICE DO PAGAMENTO DA FILIAL";
$invoice_aff_info = "Informação da filial";
$invoice_co_info = "Informação";
$invoice_acct_info = "Informação do cliente";
$invoice_payment_info = "Informação do pagamento";
$invoice_comm_date = "Data de Pagamento";
$invoice_comm_amt = "Valor Total da Comissão";
$invoice_comm_type = "Tipo de Comissão";
$invoice_admin_note = "Notas Do Administrador";
$invoice_footer = "EXTREMIDADE DO INVOICE";
$invoice_print = "Invoice da cópia";
$invoice_none = "N/A";
$invoice_aff_id = "Filial ID";
$invoice_aff_user = "Nome de usuário";
$menu_pdf_marketing = "Brochuras de Marketing PDF";
$menu_pdf_training = "Documentos de Treinamento PDF ";
$marketing_target_url = "URL Alvo";
$marketing_source_code = "Código da Fonte -Copiar/Colar No Seu Website";
$marketing_group = "Grupo de Marketing";
$peels_title = "Nome do Page Peel ";
$peels_view = "Exibir Este Peel";
$peels_description = "Descrição do Page Peel ";
$lb_head_title = "Código de CABEÇALHO Obrigatório Para Sua HTML ";
$lb_head_description = "Para usar um lightbox no seu website, você precisa adicionar as seguintes linhas na seção do cabeçalho da página em que deseja exibir.";
$lb_head_source_code = "Cole este código na seção CABEÇALHO do seu documento da HTML .";
$lb_head_code_notes = "Você só precisa colocar este código uma vez, independente de quantos lightboxes vocêcolocar na página.";
$lb_head_tutorial = "Exibir Tutorial";
$lb_body_title = "Nome do Lightbox ";
$lb_body_description = "Descrição do Lightbox ";
$lb_body_click = "Clique na imagem acima para exibir o lightbox.";
$lb_body_source_code = "Cole este código na seção do CORPO do seu documento da HTML onde deseja que a imagem apareça.";
$pdf_title = "PDF";
$pdf_training = "Documentos de Treinamento";
$pdf_marketing = "Brochuras de Marketing ";
$pdf_description_1 = "O Adobe Reader é necessário para exibir e imprimir nossos materiais de marketing PDF.";
$pdf_description_2 = "Adobe Reader é um download grátis do website da Adobe.";
$pdf_file_name = "Nome do Arquivo";
$pdf_file_size = "Tamanho do Arquivo";
$pdf_file_description = "Descrição";
$pdf_bytes = "Bytes";
$menu_heading_training_materials = "Materiais de Treinamento";
$menu_videos = "Assistir Vídeos de Treinamento";
$menu_custom_manual = "Links Manuais de Rastreamento Personalizados";
$menu_page_peels = "Page Peels";
$menu_lightboxes = "Lightboxes";
$menu_email_templates = "Modelos de E-mail";
$menu_heading_custom_links = "Links de Rastreamento Personalizados";
$menu_custom_reports = "Relatórios";
$menu_keyword_links = "Palavras-chave de Links de Rastreamento ";
$menu_subid_links = "Links de Rastreamento Sub-afiliados";
$menu_alteranate_links = "Links Alternativos de Páginas Recebidas";
$menu_heading_additional = "Ferramentas Adicionais";
$menu_drop_heading_stats = "Estatística Geral ";
$menu_drop_heading_commissions = "Comissões";
$menu_drop_heading_history = "Histórico de Pagamentos";
$menu_drop_heading_traffic = "Controle de Tráfego";
$menu_drop_heading_account = "Minha Conta";
$menu_drop_heading_logo = "Carregar Meu Logo";
$menu_drop_heading_faq = "FAQ";
$menu_drop_general_stats = "Estatísticas Gerais";
$menu_drop_tier_stats = "Estatísticas de Nível";
$menu_drop_current = "Comissões Atuais";
$menu_drop_tier = "Comissões de Nível Atuais";
$menu_drop_pending = "Aprovação Pendente";
$menu_drop_paid = "Aprovação Paga";
$menu_drop_paid_rec = "Comissões de Nível Pagas";
$menu_drop_recurring = "Comissões Ativas Recorrentes";
$menu_drop_edit = "Editar Minha Conta";
$menu_drop_password = "Mudar Minha Senha";
$menu_drop_change = "Mudar Meu Estilo de Comissão";
$account_hidden = "oculto";
$keyword_title = "Links Presonalizados de Palavras-Chave";
$keyword_info = "Criar um link personalizado de palavras-chave oferece a possibilidade de rastrear o tráfego recebido para diversas fontes.Crie um link com até 4 palavras-chave de rastreamento e o relatório de rastreamento personalizado irá mostrar um relatório detalhado para cada palavra-chave que você criar.";
$keyword_heading = "Variáveis Disponíveis Para Rastreamento Personalizado de Palavras-chave";
$keyword_tracking = "ID de Rastreamento";
$keyword_build = "Para construir seu link, pegue a seguinte URL e anexe-a com a ID de Rastreamento e a palavra-chave que deseja usar.";
$keyword_example = "Exemplo";
$keyword_tutorial = "Exibir o Tutorial";
$sub_tracking_title = "Rastreamento Sub-afiliado";
$sub_tracking_info = "Criar um link sub-afiliado oferece a possibilidade de passar seu link afiliado para fora, para seus própiios afiliados possam usá-lo. Você saberá quem gerou a comissão para você porque nós iremos relatar para você qual de seus sub-afiliados gerou a venda. Uma outra razão para usar um link sub-afiliado é ter seu próprio sistema de rastreamento que deseja incluído para o relatório.";
$sub_tracking_build = "Substitua o XXX com o número de ID do afiliado no seu programa de afiliados.Repita este processo para todos os seus afiliados.";
$sub_tracking_example = "Exemplo";
$sub_tracking_tutorial = "Exibir Tutorial";
$sub_tracking_id = "Rastreamento Sub-afiliado";
$alternate_title = "Links Alternativos de Páginas Recebidas";
$alternate_option_1 = "Opção 1: Criação Automatizada de Link";
$alternate_heading_1 = "Criação Automatizada de Link";
$alternate_info_1 = "Definir suaprópria página de tráfego recebido digitando a URL para qual deseja entregar o tráfego e nós Criaremos um link para você. Usar este recurso irá criar um link menor para você usar com a URL embutida no link usando o número de ID no seu banco de dados.";
$alternate_button = "Criar Meu Link";
$alternate_links_heading = "Meus Links Alternativos da URL de Entrada";
$alternate_links_note = "Os links existentes permanecerão intactos e funcionais se você remover um link personalizado desta página.";
$alternate_links_remove = "remover";
$alternate_option_2 = "Opção 2: Criação Manual de Link ";
$alternate_info_2 = "Se você preferir anexar seus próprios links de afiliados com uma URL de entrada alternativa, use a seguinte estrutura.";
$alternate_variable = "Variável Alternativa de URL de Entrada";
$alternate_example = "Exemplo";
$alternate_build = "Para construir seu link, pegue a seguinte URL e anexe-a com a URL de Entrada Alternativa que deseja usar.";
$alternate_none = "Nenhum Link de Entrada Alternativo Criado";
$alternate_tutorial = "Exibir Tutorial";
$cr_title = "Relatório de Palavras-chave Personalizado";
$cr_select = "Selecione uma Palavra-chave";
$cr_button = "Gerar Relatório";
$cr_no_results = "Não Há Resultados da Pesquisa";
$cr_no_results_info = "Tente uma combinação diferente de Palavras-chave";
$cr_used = "Palavras-chave Usadas";
$cr_found = "Este Link Encontrou";
$cr_times = "Vezes";
$cr_unique = "Links Exclusivos Encontrados";
$cr_detailed = "Relatório de Link Detalhado";
$cr_export = "Exportar Relatório Para o Excel";
$cr_none = "Nenhuma Palavra-chave Encontrada";
$logo_title = "Carregar o Logo da Sua Empresa";
$logo_info = "Se você quiser carregar o logo de sua Empresa, nós iremos exibi-lo para os clientes que você mandar para o nosso website.Isto nos permite personalizar sua experiência com o cliente quando ele nos visitar.";
$logo_bullet_one = "Imagens podem ser .jpg, .gif or .png.Nenhum conteúdo flash é permitido.";
$logo_bullet_two = "Qualquer imagem inapropriada será descartada e sua conta suspensa.";
$logo_bullet_three = "Sua imagem/logo não será exibida em nosso website até ser aprovada.";
$logo_bullet_size_one = "As imagens podem ter uma largura máx de";
$logo_bullet_size_two = "pixels e uma altura máx de ";
$logo_bullet_req_size_one = "Imagens devem ter uma largura de";
$logo_bullet_req_size_two = "pixels e uma altura de ";
$logo_bullet_pixels = "pixels.";
$logo_choose = "Escolher Uma Imagem";
$logo_file = "Selecionar Um Arquivo:";
$logo_browse = "Procurar...";
$logo_button = "Carregar";
$logo_current = "Minha imagem Atual";
$logo_remove = "remover";
$logo_display_status = "Status da Imagem:";
$logo_pending = "Aprovação Pendente";
$logo_approved = "Aprovado";
$logo_success = "Imagem foi carregada com sucesso e está pendente de aprovação.";
$signup_security_title = "Verificação de Conta";
$signup_security_info = "Favor digitar o código de segurança mostrado no box.Isto nos ajuda e evitar entradas automatizadas.";
$signup_security_code = "Código de Segurança";
$sub_tracking_none = "Nenhum";
$missing_security_code = "Código de Segurança /Verificação de Conta Faltando ou Incorreto";
$alternate_success_title = "Sucesso Criação de Link ";
$alternate_success_info = "Pegue seu link abaixo e comece a entregar tráfego para sua URL definida.";
$alternate_failed_title = "Erro ao Criar Link ";
$alternate_failed_info = "Favor digitar uma URL válida";
$logo_missing_filename = "Favor escolher um nome de arquivo.";
$logo_required_width = "Largura da imagem deve ser";
$logo_required_height = "Altura da imagem deve ser";
$logo_maximum_width = "Largura da imagem só pode ser";
$logo_maximum_height = "Altura da imagem só pode ser";
$logo_size_maximum = "Tamanho da imagem só pode ser um máx de ";
$logo_bad_filetype = "Tipo de imagem não é permitido. Tipos permitidos de imagem são .jpeg .gif e .png";
$logo_upload_error = "Erro ao carregar imagem, favor contactar o gerente afiliado.";
$logo_error_title = "Erro ao Carregar Imagem";
$logo_error_bytes = "bytes.";
$excel_title = "Relatório de Links de Palavras-chave Personalizado";
$excel_tab_report = "Relatório de Palavras-chave Personalizado";
$excel_tab_logs = "Controle de Tráfego";
$excel_date = "Data do Relatório:";
$excel_affiliate = "ID de Filiado:";
$excel_criteria = "Critério de Link de Palavra-chave";
$excel_link = "Estrutura de Link ";
$excel_hits = "Hits Exclusivos";
$excel_comm_stats = "Estatísticas de Comissões";
$excel_comm_current = "Comissões Atuais";
$excel_comm_paid = "Comissões Pagas";
$excel_comm_total = "Total das Comissões";
$excel_comm_ratio = "Taxa de Conversão";
$excel_earned = "Comissões Ganhas";
$excel_earned_current = "Comissões Atuais";
$excel_earned_paid = "Comissões Pagas";
$excel_earned_total = "Total de Comissões Ganhas";
$excel_earned_tab = "Clique na guia de Controle de Tráfego (abaixo) para exibir o controle de tráfego para este link personalizado.";
$excel_log_title = "Controle Personalizado de Tráfego de Palavra-Chave";
$excel_log_ip = "Endereço de IP ";
$excel_log_refer = "URL Referência";
$excel_log_date = "Data";
$excel_log_time = "Hora";
$excel_log_target = "URL Alvo";
$etemplates_title = "Modelos de E-mail";
$etemplates_view_link = "Exibir Este Modelo de E-mail";
$etemplates_name = "Nome do Modelo";
$signup_maintenance_heading = "Aviso de Manutenção";
$signup_maintenance_info = "Os inícios de sessão estão temporariamente desactivados. Por favor tente outra vez mais tarde.";
$marketing_group_title = "Grupo de Marketing";
$marketing_button = "Mostrar";
$marketing_no_group = "Nenhum Grupo selecionado";
$marketing_choose = "Por favor escolha um Grupo de Marketing acima";
$marketing_notice = "Os Grupos de Marketing podem ter diferentes páginas de entrada de tráfego";
$canspam_heading = "CAN-SPAM Regras e Aprovação";
$canspam_accept = "Eu li, percebi e concordo com as regras CAN-SPAM apresentadas acima.";
$canspam_error = "Não aceitou as nossas regras CAN-SPAM.";
$signup_banned = "Ocorreu um erro durante a criação da sua conta. Por favor contacte o administrador do sistema para mais informações.";
$header_testimonials = "Testemunhos de Afiliados";
$testi_visit = "Visitar Website";
$testi_description = "Ofereça o seu testemunho do nosso programa de afiliados e nós trataremos de pô-lo na nossa página de &lt;a href=&quot;testimonials.php&quot;&gt;testemunhoss&lt;/a&gt; com um link para o seu website.";
$testi_name = "Nome";
$testi_url = "URL do Website";
$testi_content = "Testemunho";
$testi_code = "Código de Segurança";
$testi_submit = "Submeter Testemunho";
$testi_na = "Os testemunhos não estão disponíveis.";
$testi_title = "Oferecer testemunho";
$testi_success_title = "Testemunho registado com sucesso";
$testi_success_message = "Obrigado por submeter o seu testemunho. A nossa equipa irá revê-lo rapidamente.";
$testi_error_title = "Erro no Testemunho";
$testi_error_name_missing = "Por favor inclua o seu nome no testemunho.";
$testi_error_url_missing = "Por favor inclua o URL do seu website no seu testemunho.";
$testi_error_missing = "Por favor inclua texto no seu testemunho.";
$menu_drop_delayed = "Comissões atrasadas";
$details_drop_6 = "Comissões actuais atrasadas";
$details_type_6 = "Atrasada - Será aprovada em breve";
$comdetails_status_6 = "Atrasada - Será aprovada em breve";
$tc_reaccept_title = "Notificação de mudança de Termos e Condições";
$tc_reaccept_sub_title = "Tem de concordar com os nossos novos termos e condições para recuperar o acesso à sua conta.";
$tc_reaccept_button = "Eu li, percebi e concordo com os termos e condições expressos acima.";
$tlinks_active = "Número de níveis de pagamento activos";
$tlinks_payout_structure = "Estrutura dos níveis de pagamento";
$tlinks_level = "Nível";
$tierText1 = "% calculada a partir do valor da comissão do respectivo afiliado.";
$tierText2 = "% calculada a partir do valor da comissão dos níveis de pagamento superiores.";
$tierText3 = "% calculada a partir do valor da venda.";
$tierTextflat = "taxa fixa.";
$edit_custom_button = "Editar Resposta";
$private_heading = "Inscrição Privada";
$private_info = "O nosso programa de afiliados não está aberto ao público em geral e requer um código de inscrição para aderir.A informação sobre como obter um código de inscrição pode ser encontrada aqui.";
$private_required_heading = "Necessário Código de Inscrição";
$private_code_title = "Colocar Código de Inscrição";
$private_button = "Submeter Código";
$private_error_title = "Código de Inscrição inválido";
$private_error_invalid = "O código de inscrição fornecido é inválido.";
$private_error_expired = "O código de inscrição fornecido expirou e deixou de ser válido.";
$qr_code_title = "Códigos QR";
$qr_code_size = "Tamanho dos códigos QR";
$qr_code_button = "Mostrar código QR";
$qr_code_offline_title = "Marketing Offline";
$qr_code_offline_content1 = "Adicione este código QR às suas brochuras, folhetos, cartões de visita, etc.";
$qr_code_offline_content2 = "- Clique com o botão direito do rato na imagem e <strong>guardar como</strong> para o seu computador.";
$qr_code_online_title = "Marketing Online";
$qr_code_online_content = "Adicione este código QR ao seu website, rede social, blog, etc.";
$menu_coupon = "Códigos Promocionais";
$coupon_title = "Os seus códigos promocionais disponíveis";
$coupon_desc = "Distribua estes códigos promocionais e ganhe uma comissão cada vez que alguém use o seu código!";
$coupon_head_1 = "Código Promocional";
$coupon_head_2 = "Desconto para o cliente";
$coupon_head_3 = "Valor da sua Comissão";
$coupon_sale_amt = "do valor da venda";
$coupon_flat_rate = "taxa fixa";
$coupon_default = "Nível de Pagamento Padrão";
$cc_vanity_title = "Pedir um Código Promocional Personalizado";
$cc_vanity_field = "Código Promocional";
$cc_vanity_button = "Pedir Código Promocional";
$cc_vanity_error_missing = "<strong>Erro!</strong> Por favor insira um código promocional.";
$cc_vanity_error_exists = "<strong>Erro!</strong> Já pediu este código. Aguarda aprovação.";
$cc_vanity_error = "<strong>Erro!</strong> O código promocional é inválido. Por favor utilise apenas letras, números e underscores.";
$cc_vanity_success = "<strong>Successo!</strong> O seu código promocional personalizado foi pedido.";
$coupon_none = "Nenhum código promocional disponível de momento.";
$pic_error_title = "Erro no carregamento de imagem";
$pic_missing = "Por favor escolha um nome para o ficheiro.";
$pic_invalid = "O formato da imagem não é permitido. Os formatos permitidos são .gif, .jpg e .png.";
$pic_error = "Erro no carregamento de imagem, por favor contacte o gestor afiliado.";
$pic_success = "A sua imagem foi carregada com sucesso.";
$pic_title = "Carregue a sua imagem";
$pic_info = "Carregar a sua imagem ajuda-nos a personalizar a nossa experiência consigo.";
$pic_bullet_1 = "As imagens podem ser do formato .jpg, .gif ou .png.";
$pic_bullet_2 = "Qualquer imagem inapropriada será apagada e a sua conta suspensa.";
$pic_bullet_3 = "A sua imagem não será apresentada ao público. Apenas será anexada à sua conta e só nós teremos acesso.";
$pic_file = "Selecione um Ficheiro:";
$pic_button = "Carregar";
$pic_current = "A Minha Fotografia Actual";
$pic_remove = "Remover Fotografia";
$progress_title = "Eligibilidade Para o Próximo Pagamento:";
$progress_complete = "completo.";
$progress_none = "Não temos requisitos de pagamento mínimo.";
$progress_sentence_1 = "Ganhou";
$progress_sentence_2 = "do";
$progress_sentence_3 = "requisito.";
$aff_lib_button = "<b>Reivindique O Seu Acesso Grátis Ao</b><br>www.AffiliateLibrary.com";
$menu_announcements = "Campanhas na Redes Sociais";
$announcements_name = "Nome da Campanha";
$announcements_facebook_message = "Mensagem no Facebook";
$announcements_twitter_message = "Mensagem no Twitter";
$announcements_facebook_link = "Link no Facebook";
$announcements_facebook_picture = "Fotografia no Facebook";
$general_last_30_days_activity = "Atividade nos Últimos 30 Dias";
$general_last_30_days_activity_traffic = "Tráfego";
$general_last_30_days_activity_commissions = "Comissões";
$accountability_title = "Responsabilidade e Comunicação";
$accountability_text = "<strong>O Que É Isto?</strong><p>Temos uma abordagem proativa no desenvolvimento de confiança em nossos parceiros afiliados. É nosso objetivo garantir que providenciamos o máximo de informação possível relativamente a cada comissão ganha e/ou recusada em nosso sistema.</p><strong>Comunicação</strong><p>Estamos disponíveis para fornecer detalhes sobre quaisquer comissões recusadas. Temos uma comunicação forte com nossos afiliados e encorajamos questões e comentários.</p>";
$debit_reason_0 = "Nenhuma";
$debit_reason_1 = "Devolução";
$debit_reason_2 = "Estorno";
$debit_reason_3 = "Fraude Denunciada";
$debit_reason_4 = "Encomenda Cancelada";
$debit_reason_5 = "Devolução Parcial";
$menu_drop_pending_debits = "Débitos Pendentes";
$debit_amount_label = "Montante de Débito";
$debit_date_label = "Data de Débito";
$debit_reason_label = "Razão do Débito";
$debit_paragraph = "Os débitos serão deduzidos de seu próximo pagamento.";
$debit_invoice_amount = "Menos Montante de Débito";
$debit_revised_amount = "Montante do Pagamento Revisado";
$mv_head_description = "Nota: Você só pode colocar um vídeo por página em seu website.";
$mv_head_source_code = "Coles este código na seção HEAD de seu documento HTML.";
$mv_body_title = "Título do Vídeo";
$mv_body_description = "Descrição";
$mv_body_source_code = "Cole este código na seção BODY de seu documento HTML onde você deseja que o vídeo apareça.";
$menu_marketing_videos = "Vídeos";
$mv_preview_button = "Pré-visualizar Vídeo";
$dt_no_data = "Sem dados disponíveis na tabela.";
$dt_showing_exists = "Exibindo _START_ a _END_ de _TOTAL_ entradas.";
$dt_showing_none = "Exibindo 0 a 0 de 0 entradas.";
$dt_filtered = "(filtrado de _MAX_ entradas totais)";
$dt_length_choice = "Mostrar _MENU_ entradas.";
$dt_loading = "Carregando...";
$dt_processing = "Processando...";
$dt_no_records = "Sem resultados correspondentes.";
$dt_first = "Primeiro";
$dt_last = "Último";
$dt_next = "Seguinte";
$dt_previous = "Anterior";
$dt_sort_asc = ": ativar para ordenar coluna de modo ascendente";
$dt_sort_desc = ": ativar para ordenar coluna de modo descendente";
$choose_marketing_group = "Escolher Um Grupo de Marketing";
$email_already_used_1 = "A conta não pode ser criada. Apenas permitimos";
$email_already_used_2 = "conta";
$email_already_used_3 = "criada por endereço de  email.";
$missing_fax = "Por favor, introduza seu número de fax.";
$chart_last_6_months = "Comissões Pagas nos Últimos 6 Meses";
$chart_last_6_months_paid = "Comissões Pagas";
$chart_this_month = "Nosso Top 5 de Afiliados Este Mês";
$chart_this_month_none = "Sem dados para exibir.";
$login_return = "Voltar para Página Inicial de Afiliados";
$login_lost_details = "Introduza seu nome de usuário e nós enviaremos um email para você com seus dados de login.";
$account_edit_general_prefs = "Preferências Gerais";
$account_edit_email_language = "Idioma do Email";
$footer_connect = "Conete-se Conosco";
$modal_close = "Fechar";
$vat_amount_heading = "Montante de IVA";
$menu_logout = "Terminar sessão";
$menu_upload_picture = "Carregar Sua Fotografia";
$menu_offer_testi = "Deixar um Testemunho";
$fb_login = "Iniciar sessão com Facebook";
$fb_permissions = "Permissões não atribuídas. Por favor, permita que o website use seu endereço de email.";
$announcements_published = "Opublikowano Ogłoszenie";
$training_videos_title = "Filmy Szkoleniowe";
$training_videos_general = "Marketing Ogólny";
$commission_method = "Metody Prowizji";
$how_will_you_earn = "W jaki sposób zarobisz prowizję?";
$pm_account_credit = "Przelejemy na Twoje konto zarobioną przez Ciebie prowizję.";
$pm_check_money_order = "Wyślemy Ci czek/ przekaz pieniężny pocztą";
$pm_paypal = "Prześlemy Ci płatność PayPal.";
$pm_stripe = "Prześlemy Ci płatność Stripe.";
$pm_wire = "Wyślemy Ci przekaz bankowy.";
$add_to_signup_left_column_text = "<span style=\"color:#CC0000; font-style:italic;\">* oznacza wymagane pole.</span>";
$paypal_email = "Email Paypal";
$stripe_acct_details = "Dane Konta Stripe";
$stripe_connect = "Możesz połączyć swoje konto Stripe w ustawieniach konta po zarejestrowaniu.";
$stripe_success = "Konto Stripe Zostało Pomyślnie Powiązane";
$stripe_settings = "Ustawienia Stripe";
$stripe_connect_edit = "Połącz ze Stripe";
$stripe_delete = "Usuń Konto Stripe";
$stripe_confirm = "Na pewno chcesz usunąć konto?";
$payment_settings = "Definições de Pagamento";
$edit_payment_settings = "Editar Definições de Pagamento";
$invalid_paypal_address = "Endereço de email Paypal inválido.";
$payment_method_error = "Por favor, selecione um método de pagamento.";
$payment_settings_updated = "Definições de pagamento atualizadas.";
$stripe_removed = "Conta Stripe removida.";
$payment_settings_success = "Sucesso!";
$payment_update_notice_1 = "Aviso!";
$payment_update_notice_2 = "Você optou por receber um pagamento <strong>[payment_option_here]</strong> de nossa parte. Por favor, <a href=\"account.php?page=48\" style=\"font-weight:bold;\">clique aqui</a> para se conetar a sua conta <strong>[payment_option_here]</strong>.";
$pm_title_credit = "Crédito da Conta	";
$pm_title_mo = "Cheque/Vale Postal	";
$pm_title_paypal = "PayPal	";
$pm_title_stripe = "Stripe	";
$pm_title_wire = "Transferência Bancária	";
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