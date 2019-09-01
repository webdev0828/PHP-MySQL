<?PHP

//-------------------------------------------------------
	  $language_pack_name = "spanish";
	  $language_pack_table_name = "spanish";
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
$header_title = "Programa del afiliado";
$header_indexLink = "Hogar";
$header_signupLink = "Regístrese ahora";
$header_accountLink = "Administración de cuenta";
$header_emailLink = "Contáctenos";
$header_greeting = "Bienvenido";
$header_nonLogged = "Visitante";
$header_logout = "Finalice la sesión aquí";
$footer_tag = "Software del afiliado de iDevAffiliate";
$footer_copyright = "Copyright 2006";
$footer_rights = "Todos los derechos reservados.";
$index_heading_1 = "¡Bienvenido a nuestro programa del afiliado!";
$index_paragraph_1 = "Unirse a nuestro programa es gratuito, registrarse es fácil y no requiere de ningún conocimiento técnico. Los programas del afiliado son comunes en Internet y ofrecen a los dueños de los sitios Web un modo extra de obtener ganancias. Los afiliados generan tráfico y ventas para los sitios Web comerciales y a cambio reciben una comisión.";
$index_heading_2 = "¿Cómo funciona?";
$index_paragraph_2 = "Al unirse a nuestro programa del afiliado, recibirá una serie de carteles publicitarios y enlances de texto que usted coloca dentro de su sitio. Cuando un usuario hace clic en uno de sus enlances, accederán a nuestro sitio Web y su actividad será reistrada por nuestro software del afiliado.Usted ganará una comisión en base a su tipo de comisión.";
$index_heading_3 = "¡Estadísticas e informes en tiempo real!";
$index_paragraph_3 = "Ingreso las 24 horas del día para controlar sus ventas, el tráfico, el saldo de la cuenta y observar el funcionamiento de sus carteles publicitarios.";
$index_login_title = "Registro del afiliado";
$index_login_username = "Nombre de usuario";
$index_login_password = "Contraseña";
$index_login_username_field = "nombre de usuario";
$index_login_password_field = "contraseña";
$index_login_button = "Inicio de sesión";
$index_login_signup_link = "Haga click aquí para registrarse";
$index_table_title = "Detalles del programa";
$index_table_commission_type = "Tipo de comisión";
$index_table_initial_deposit = "Depósito inicial";
$index_table_requirements = "Requisitos del pago";
$index_table_duration = "Duración del pago";
$index_table_choose = "¡Escoja una de las siguientes opciones de pago!";
$index_table_sale = "Pago por venta";
$index_table_click = "Pago por clic";
$index_table_sale_text = "por cada venta que realiza.";
$index_table_click_text = "por cada clic que realiza.";
$index_table_deposit_tag = "¡Sólo por inscribirse!";
$index_table_requirements_tag = "Saldo mínimo requerido para el pago.";
$index_table_duration_tag = "Los pagos se realizan una vez por mes, para el mes anterior.";
$signup_left_column_text = "¡Únase a nuestro programa del afiliado y comience a ganar dinero por cada venta que haga! Simplemente cree su cuenta, coloque su código de enlace en su sitio Web y observe crecer el saldo de su cuenta a medida que sus visitantes se convierten en sus clientes.";
$signup_left_column_title = "¡Bienvenido afiliado!";
$signup_login_title = "Cree su cuenta";
$signup_login_username = "Nombre de usuario";
$signup_login_password = "Contraseña";
$signup_login_password_again = "Vuelva a ingresar la contraseña";
$signup_login_minmax_chars = "- El nombre de usuario debe ser de al  menos user_min_chars caracteres.&lt;br /&gt;- El nombre de usuario puede ser alfanumérico.&lt;br /&gt;- El nombre de usuario puede contener estos caracteres: _ (solo guión bajo)&lt;br /&gt;&lt;br /&gt;- La contraseña debe ser de al menos pass_min_chars caracteres.&lt;br /&gt;- La contraseña puede ser alfanumérica.&lt;br /&gt;- La contraseña puede contener estos caracteres:  characters_allowed";
$signup_login_must_match = "Esta entrada debe coincidir con la contraseña.";
$signup_standard_title = "Información estándar";
$signup_standard_email = "Dirección de correo electrónico";
$signup_standard_company = "Nombre de la empresa";
$signup_standard_checkspayable = "Cheques pagaderos a";
$signup_standard_weburl = "Dirección del sitio Web";
$signup_standard_taxinfo = "ID de impuestos, N° de Seguro Social o IVA";
$signup_personal_title = "Información personal";
$signup_personal_fname = "Nombre";
$signup_personal_state = "Estado o provincia";
$signup_personal_lname = "Apellido";
$signup_personal_phone = "Número de teléfono";
$signup_personal_addr1 = "Domicilio";
$signup_personal_fax = "Número de fax";
$signup_personal_addr2 = "Domicilio alternativo";
$signup_personal_zip = "Código postal";
$signup_personal_city = "Ciudad";
$signup_personal_country = "País";
$signup_commission_title = "Pago de comisión";
$signup_commission_howtopay = "¿Cómo desea que le paguemos?";
$signup_commission_style_PPS = "Pago por venta";
$signup_commission_style_PPC = "Pago por clic";
$signup_terms_title = "Términos y condiciones";
$signup_terms_agree = "He leído, comprendido y estoy de acuerdo con los términos y condiciones arriba mencionados.";
$signup_page_button = "Crear mi cuenta";
$signup_success_email_comment = "Le hemos enviado un correo electrónico con su nombre de usuario y contraseña.<BR />Consérvelo en un lugar seguro para consultar en el futuro.";
$signup_success_login_link = "Ingresar a su cuenta";
$custom_fields_title = "Utilice campos definidos";
$logout_msg = "<b>Su sesión ha finalizado</b><BR />Gracias por participar en el programa del afiliado.";
$signup_page_success = "Su cuenta ha sido creada";
$login_left_column_title = "Registro a la cuenta";
$login_left_column_text = "Ingrese su nombre de usuario y contraseña para ingresar a las estadísticas de su cuenta, carteles publicitarios, código de enlace, preguntas frecuentes y más.<BR/ ><BR/ >Si no recuerda su contraseña, ingrese su nombre de usuario y le enviaremos su información de registro a su correo electrónico.<BR /><BR />";
$login_title = "Ingresar a su cuenta";
$login_username = "Nombre de usuario";
$login_password = "Contraseña";
$login_invalid = "Registro no válido";
$login_now = "Ingresar a mi cuenta";
$login_send_title = "¿Necesita su contraseña?";
$login_send_username = "Ingrese su nombre de usuario";
$login_send_info = "Detalles de registro enviados a su correo electrónico";
$login_send_pass = "Enviar al correo electrónico";
$login_send_bad = "Nombre de usuario no encontrado";
$help_new_password_heading = "Nueva contraseña";
$help_new_password_info = "Tu contraseña debe ser de al menos pass_min_chars caracteres de largo. Solo puede contener letras, números y los siguientes caracteres:  characters_allowed";
$help_confirm_password_heading = "Confirmar nueva contraseña";
$help_confirm_password_info = "Esta contraseña debe coincidir con la nueva contraseña.";
$help_custom_links_heading = "Palabra clave para seguimiento";
$help_custom_links_info = "Su palabra clave no puede contener más de 30 caracteres. Sólo puede contener letras, números y guiones.";
$error_title = "Se detectaron los siguientes errores";
$username_invalid = "Nombre de usuario inválido. Solo puede contener letras, números y guión bajo.";
$username_taken = "El nombre de usuario que eligió ya existe.";
$username_short = "Su nombre de usuario es demasiado corto, debe contener al menos 4 caracteres.";
$username_long = "Su nombre de usuario es demasiado largo, debe contener como máximo 12 caracteres.";
$password_invalid = "Contraseña inválida. Solo puede contener letras, números y los siguientes caracteres:  characters_allowed";
$password_short = "Su contraseña es demasiado corta, debe contener al menos 4 caracteres.";
$password_long = "Su contraseña es demasiado larga, debe contener como máximo 12 caracteres.";
$password_mismatch = "Su contraseña no coincide.";
$missing_checks = "Ingrese un nombre de beneficiario para emitir los cheques.";
$missing_tax = "Ingrese la información de su ID de impuestos, N° de Seguro Social o IVA.";
$missing_fname = "Ingrese su primer nombre.";
$missing_lname = "Ingrese su apellido.";
$missing_email = "Ingrese su dirección de correo electrónico.";
$invalid_email = "Su dirección de correo electrónico no es válida.";
$missing_address = "Ingrese su domicilio.";
$missing_city = "Ingrese su ciudad.";
$missing_company = "Ingrese el nombre de su empresa.";
$missing_state = "Ingrese su estado o provincia.";
$missing_zip = "Ingrese su código postal.";
$missing_phone = "Ingrese su número de teléfono.";
$missing_website = "Ingrese la dirección de su sitio Web.";
$missing_paypal = "Usted ha elegido recibir los pagos a través de PayPal, ingrese su cuenta PayPal.";
$missing_terms = "Usted no ha aceptado nuestros términos y condiciones.";
$paypal_required = "Se requiere una cuenta PayPal para el pago.";
$missing_custom = "Complete el nombre del campo:";
$account_total_transactions = "Transacciones totales";
$account_standard_linking_code = "Código de enlace estándar - ¡Excelente para usar en correos electrónicos!";
$account_copy_paste = "Copie/Pegue el código de arriba en su sitio Web o correos electrónicos";
$account_not_approved = "Su cuenta está actualmente pendiente de aprobación";
$account_suspended = "Su cuenta está actualmente suspendida";
$account_standard_earnings = "Ganancias estándar";
$account_inc_bonus = "incluye bonificación";
$account_second_tier = "Ganancias por nivel";
$account_recurring = "Ganancias recurrentes";
$account_not_available = "N/C";
$account_earned_todate = "Ingresos totales a la fecha";
$menu_heading_overview = "Resumen de la cuenta";
$menu_general_stats = "Estadísticas generales";
$menu_tier_stats = "Estadísticas por nivel";
$menu_payment_history = "Historial de pagos";
$menu_commission_details = "Detalles de comisión";
$menu_recurring_commissions = "Comisiones recurrentes";
$menu_traffic_log = "Registro de tráfico entrante";
$menu_heading_marketing = "Material de marketing";
$menu_banners = "Carteles publicitarios";
$menu_text_ads = "Anuncios publicitarios de texto";
$menu_text_links = "Enlaces de texto";
$menu_email_links = "Enlaces para correo electrónico";
$menu_html_links = "Anuncios publicitarios HTML";
$menu_offline = "Marketing fuera de línea";
$menu_tier_linking_code = "Código de enlace por nivel";
$menu_email_friends = "Envíe un correo electrónico a amigos y socios";
$menu_custom_links = "Construya y realice un seguimiento de sus propios enlaces";
$menu_heading_management = "Administración de la cuenta";
$menu_comalert = "Configuración de CommissionAlert";
$menu_comstats = "Configuración de CommissionStats";
$menu_edit_account = "Editar mi cuenta";
$menu_change_pass = "Cambiar contraseña";
$menu_change_commission = "Cambiar mi estilo de comisión";
$menu_heading_general_info = "Información general";
$menu_browse_affiliates = "Buscar otros afiliados";
$menu_faq = "Preguntas Frecuentes";
$suspended_title = "Alerta de estado de cuenta";
$suspended_heading = "Su cuenta está actualmente suspendida";
$suspended_notes = "Notas del administrador";
$pending_title = "Alerta de estado de cuenta";
$pending_heading = "Su cuenta está actualmente pendiente de aprobación";
$pending_note = "Una vez que aprobemos su cuenta, pondremos a su disposición material de marketing.";
$faq_title = "Preguntas Frecuentes";
$faq_none = "Aún no hay preguntas frecuentes";
$browse_title = "Buscar otros afiliados";
$browse_none = "No hay otros afiliacos para ver";
$change_comm_title = "Cambiar estilo de comisión";
$change_comm_curr_comm = "Estilo de comisión actual";
$change_comm_curr_pay = "Pago por nivel actual";
$change_comm_new_comm = "Nuevo estilo de comisión";
$change_comm_warning = "Si cambia su estilo de comisión, su cuenta volverá al nivel de pago 1";
$change_comm_button = "Cambiar estilos de comisión";
$change_comm_no_other = "No hay otros estilos de comisión disponibles";
$change_comm_level = "Nivel";
$change_comm_updated = "Estilo de comisión actualizado";
$password_title = "Cambiar contraseña";
$password_old_password = "Contraseña anterior";
$password_new_password = "Nueva contraseña";
$password_confirm_password = "Confirmar nueva contraseña";
$password_button = "Cambiar contraseña";
$password_warning_old_missing = "La contraseña anterior es incorrecta o no fue ingresada";
$password_warning_new_missing = "No fue ingresada la nueva contraseña";
$password_warning_mismatch = "La nueva contraseña no coincide";
$password_warning_invalid = "Contraseña no válida - Haga clic en los enlaces de ayuda";
$password_notice = "Contraseña actualizada";
$edit_failed = "La actualización falló - Más arriba encontrará los errores";
$edit_success = "Cuenta actualizada";
$edit_button = "Editar mi cuenta";
$commissionstats_title = "Configuración de CommissionStats";
$commissionstats_info = "Al instalar CommissionStats usted puede consultar sus estadísticas al instante, ¡directamente desde su escritorio de Windows!  Para instalar esta función, descargue CommissionStats y <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>unzip</b></a> el paquete a su disco rígido y luego ejecute el <b>setup.exe</b> archivo.Cuando se le indique ingresar su información de registro, ingrese los siguientes detalles.";
$commissionstats_hint = "Sugerencia: Copie y pegue cada ingreso para asegurar la exactitud";
$commissionstats_profile = "Nombre del perfil";
$commissionstats_username = "Nombre de usuario";
$commissionstats_password = "Contraseña";
$commissionstats_id = "ID del afiliado";
$commissionstats_source = "Ruta de origen de la URL";
$commissionstats_download = "Descargar CommissionStats";
$commissionalert_title = "Configuración de CommissionAlert";
$commissionalert_info = "Al instalar CommissionAlert lo notificaremos sus nuevas comisiones al instante, ¡directamente en su escritorio de Windows! Para instalar esta función, descargue CommissionAlert y <a href=\"http://www.winzip.com/downwz.htm\" target=\"_blank\"><b>unzip</b></a> el paquete en su disco rígido y luego ejecute el <b>setup.exe</b> archivo. Cuando se le indique ingresar su información de registro, ingrese los siguientes detalles.";
$commissionalert_hint = "Sugerencia: Copie y pegue cada ingreso para asegurar la exactitud";
$commissionalert_profile = "Nombre del perfil";
$commissionalert_username = "Nombre de usuario";
$commissionalert_password = "Contraseña";
$commissionalert_id = "ID del afiliado";
$commissionalert_source = "Ruta de origen de la URL";
$commissionalert_download = "Descargar CommissionAlert";
$offline_title = "Marketing fuera de línea";
$offline_paragraph_one = "¡Gane dinero promocionando nuestro sitio Web (fuera de línea) entre sus amigos y socios!";
$offline_send = "Envía clientes a";
$offline_page_link = "visualizar página";
$offline_paragraph_two = "Sus clientes ingresarán su <b>número de ID del afiliado </b> en el casillero en la página de arriba el cual lo registrará como afiliado para todas las compras que ellos realicen.";
$banners_title = "Carteles publicitarios";
$banners_size = "Tamaño del cartel publicitario";
$banners_description = "Descripción del cartel publicitario";
$ad_title = "Anuncios publicitarios de texto";
$ad_info = "¡Utilizando el código de enlace provisto, usted puede ajustar el <b>esquema de colores</b>, <b>altura</b> y <b>ancho</b> de su anuncio de texto para integrarlo fácilmente a su sitio!";
$links_title = "Enlaces de texto";
$email_title = "Enlaces para correo electrónico";
$email_group = "Grupo de marketing";
$email_button = "Visualizar enlaces para correo electrónico";
$email_no_group = "No se ha seleccionado ningún grupo";
$email_choose = "Escoja un grupo de marketing arriba";
$email_notice = "Los grupos de marketing pueden tener diferentes páginas de tráfico entrante";
$email_ascii = "<b>ASCII/Versión texto</b> - Para utilizar en mensajes de correo sin formato.";
$email_html = "<b>Versión HTML</b> - Para utilizar en mensajes de correo con formato HTML.";
$email_test = "Enlace de prueba";
$email_test_info = "Aquí es donde sus clientes serán direccionados a nuestro sitio Web.";
$email_source = "Código fuente - Copie/Pegue en su mensaje de correo electrónico";
$html_title = "Anuncios publicitarios HTML";
$html_view_link = "Visualizar este anuncio publicitario HTML";
$traffic_title = "Registro de tráfico entrante";
$traffic_display = "Visualizar el último";
$traffic_display_visitors = "Visitantes";
$traffic_button = "Visualizar registro de tráfico";
$traffic_title_details = "Detalles de tráfico entrante";
$traffic_ip = "Dirección IP";
$traffic_refer = "ULR que refiere";
$traffic_date = "Fecha";
$traffic_time = "Hora";
$traffic_bottom_tag_one = "Visualizando el último";
$traffic_bottom_tag_two = "de";
$traffic_bottom_tag_three = "Total de visitantes únicos";
$traffic_none = "No existen registros de tráfico";
$traffic_no_url = "N/C - Posible enlace a correo electronico o favorito";
$traffic_box_title = "URL que refiere completa";
$traffic_box_info = "Haga clic en el enlace para visitar la página Web";
$payment_title = "Historial de pagos";
$payment_date = "Fecha de pago";
$payment_commissions = "Comisiones";
$payment_amount = "Monto del pago";
$payment_totals = "Totales";
$payment_none = "No existe historial de pagos";
$tier_stats_title = "Estadísticas por nivel";
$tier_stats_accounts = "Cuentas por nivel";
$tier_stats_grab_link = "Tome su código de enlace por nivel";
$tier_stats_none = "No existen cuentas por nivel";
$tier_stats_username = "Nombre de usuario";
$tier_stats_current = "Comisiones actuales";
$tier_stats_previous = "Pagos anteriores";
$tier_stats_totals = "Totales";
$recurring_title = "Comisiones recurrentes";
$recurring_none = "No hay comisiones recurrentes";
$recurring_date = "Fecha de la comisión";
$recurring_status = "Estado recurrente";
$recurring_payout = "Próximo pago";
$recurring_amount = "Monto";
$recurring_every = "Cada";
$recurring_in = "En";
$recurring_days = "Días";
$recurring_total = "Total";
$tlinks_title = "¡Agregue a otros a su nivel y también obtenga dinero de ellos!";
$tlinks_embedded_one = "¡El registro a los créditos por nivel ya está activo en sus enlaces estándar del afiliado!";
$tlinks_embedded_two = "Usted será el nivel más alto para cualquier persona que se una a nuestro programas de afiliados a través de su enlace.";
$tlinks_embedded_current = "Pago por nivel actual";
$tlinks_forced_two = "Utilice el siguiente código para promocionar nuestro programa del afiliado a otros propietarios de sitios Web.";
$tlinks_forced_code = "Código de enlace de texto";
$tlinks_forced_paste = "Copie/Pegue el código de arriba en su sitio Web";
$tlinks_forced_money = "¡Los administradores de sitios Web ganan dinero aquí!";
$comdetails_title = "Detalles de comisión";
$comdetails_date = "Fecha de la comisión";
$comdetails_time = "Tiempo de la comisión";
$comdetails_type = "Tipo de comisión";
$comdetails_status = "Estado actual";
$comdetails_amount = "Monto de la comisión";
$comdetails_additional_title = "Detalles adicionales de la comisión";
$comdetails_additional_ordnum = "Número de orden";
$comdetails_additional_saleamt = "Monto de la venta";
$comdetails_type_1 = "Comisión bonificada";
$comdetails_type_2 = "Comisión recurrente";
$comdetails_type_3 = "Comisión por nivel";
$comdetails_type_4 = "Comisión estándar";
$comdetails_status_1 = "Pagada";
$comdetails_status_2 = "Aprobada - Pendiente de pago";
$comdetails_status_3 = "Pendiente de aprobación";
$comdetails_not_available = "N/C";
$details_title = "Detalles de comisión";
$details_drop_1 = "Comisiones estándar actuales";
$details_drop_2 = "Comisiones por nivel actuales";
$details_drop_3 = "Comisiones pendientes de aprobación";
$details_drop_4 = "Comisiones estándar pagas";
$details_drop_5 = "Comisiones por nivel pagas";
$details_button = "Visualizar comisiones";
$details_date = "Fecha";
$details_status = "Estado";
$details_commission = "Comisión";
$details_details = "Visualizar detalles";
$details_type_1 = "Pagada";
$details_type_2 = "Pendiente de aprobación";
$details_type_3 = "Aprobada - Pendiente de pago";
$details_none = "No hay comisiones para visualizar";
$details_no_group = "No se ha seleccionado ningún grupo de comisión";
$details_choose = "Escoja un grupo de comisión arriba";
$general_title = "Comisiones actuales - Desde el último pago hasta la fecha";
$general_transactions = "Transacciones";
$general_earnings_to_date = "Ganancias hasta la fecha";
$general_history_link = "Visualizar historial de pagos";
$general_standard_earnings = "Ganancias estándar";
$general_current_earnings = "Ganancias actuales";
$general_traffic_title = "Tráfico de estadísticas";
$general_traffic_visitors = "Visitantes";
$general_traffic_unique = "Visitantes únicos";
$general_traffic_sales = "Total de ventas";
$general_traffic_ratio = "Índice de ventas";
$general_traffic_info = "<b>Total de ventas</b> e <b>Índice de ventas</b><BR />Estas estadísticas no incluyen comisiones por nivel o recurrentes.";
$general_traffic_pay_type = "Tipo de pago";
$general_traffic_pay_level = "Pago por nivel actual";
$general_notes_title = "Notas del administrador";
$general_notes_date = "Fecha de creación";
$general_notes_to = "Para";
$general_notes_all = "Todos los afiliados";
$general_notes_none = "No hay notas para visualizar";
$contact_left_column_title = "Contáctenos";
$contact_left_column_text = "No dude en contactar a nuestro gerente de afiliados utilizando el formulario que aparece a la derecha.";
$contact_title = "Contáctenos";
$contact_name = "Su nombre";
$contact_email = "Su dirección de correo electrónico";
$contact_message = "Mensaje";
$contact_chars = "caracteres faltantes";
$contact_button = "Enviar mensaje";
$contact_received = "Hemos recibido su mensaje, en 24 horas le enviaremos una respuesta.";
$contact_invalid_name = "Nombre no válido";
$contact_invalid_email = "Dirección de correo no válida";
$contact_invalid_message = "Mensaje no válido";
$invoice_button = "Factura";
$invoice_header = "FACTURA DEL PAGO DEL AFILIADO";
$invoice_aff_info = "Información del afiliado";
$invoice_co_info = "Información";
$invoice_acct_info = "Información de lacuenta";
$invoice_payment_info = "Información del pago";
$invoice_comm_date = "Fecha de pago";
$invoice_comm_amt = "Monto de la comisión";
$invoice_comm_type = "Tipo de comisión";
$invoice_admin_note = "Notas del administrador";
$invoice_footer = "EXTREMO DE LA FACTURA";
$invoice_print = "Factura de la impresión";
$invoice_none = "N/A";
$invoice_aff_id = "Afiliado ID";
$invoice_aff_user = "Nombre de usuario";
$menu_pdf_marketing = "Folletos de Mercadotecnia en PDF";
$menu_pdf_training = "Documentos de Entrenamiento en PDF";
$marketing_target_url = "URL objetivo";
$marketing_source_code = "Código fuente - Copiar/Pegar en Su Sitio Web";
$marketing_group = "Grupo de Mercadotecnia";
$peels_title = "Nombre de Pasa Páginas";
$peels_view = "Ver Este Pasa Páginas";
$peels_description = "Descripción de Pasa Páginas";
$lb_head_title = "Código de ENCABEZADO requerido Para Su Página HTML";
$lb_head_description = "Para poder usar una caja de luz en su sitio Web, debe de agregar las siguientes líneas en la sección de encabezado de la página donde quiere mostrarla.";
$lb_head_source_code = "Pegue este código en la sección de ENCABEZADO de su documento HTML.";
$lb_head_code_notes = "Sólo necesita colocar este código una vez sin importar cuantas cajas de luz coloque en la página.";
$lb_head_tutorial = "Ver Tutorial";
$lb_body_title = "Nombre de Caja de Luz";
$lb_body_description = "Descripción de Caja de Luz";
$lb_body_click = "De clic en la imagen anterior para ver la caja de luz.";
$lb_body_source_code = "Pegue este código en la sección del CUERPO de su documento HTML donde quiere que aparezca la imagen.";
$pdf_title = "PDF";
$pdf_training = "Documentos de Entrenamiento";
$pdf_marketing = "Folletos de Mercadotecnia";
$pdf_description_1 = "Se requiere del Abode Reader para ver e imprimir nuestro material de mercadotecnia en PDF.";
$pdf_description_2 = "Se puede descargar gratuitamente el Adobe Reader del sitio Web de Adobe.";
$pdf_file_name = "Nombre de Archivo";
$pdf_file_size = "Tamaño de Archivo";
$pdf_file_description = "Descripción";
$pdf_bytes = "Bytes";
$menu_heading_training_materials = "Material de Entrenamiento";
$menu_videos = "Ver Videos de Entrenamiento";
$menu_custom_manual = "Manual de Ligas de Rastreo Personalizadas ";
$menu_page_peels = "Pasa Páginas";
$menu_lightboxes = "Cajas de Luz";
$menu_email_templates = "Plantillas para E-mail";
$menu_heading_custom_links = "Ligas de Rastreo Personalizadas";
$menu_custom_reports = "Reportes";
$menu_keyword_links = "Ligas de Rastreo de Palabra Clave";
$menu_subid_links = "Ligas de Rastreo de Sub-Afiliados";
$menu_alteranate_links = "Ligas de Página de Entradas Alternas";
$menu_heading_additional = "Herramientas Adicionales";
$menu_drop_heading_stats = "Estadísticas Generales";
$menu_drop_heading_commissions = "Comisiones";
$menu_drop_heading_history = "Historial de Pagos";
$menu_drop_heading_traffic = "Registro de Tráfico";
$menu_drop_heading_account = "Mi Cuenta";
$menu_drop_heading_logo = "Cargar Mi Logotipo";
$menu_drop_heading_faq = "Preguntas Frecuentes";
$menu_drop_general_stats = "Estadísticas Generales";
$menu_drop_tier_stats = "Estadísticas de Nivel";
$menu_drop_current = "Comisiones Actuales";
$menu_drop_tier = "Comisiones de Nivel Actuales";
$menu_drop_pending = "Pendientes de Aprobación";
$menu_drop_paid = "Aprobación Pagada";
$menu_drop_paid_rec = "Comisiones de Nivel Pagadas";
$menu_drop_recurring = "Comisiones Activas Recurrentes";
$menu_drop_edit = "Editar Mi Cuenta";
$menu_drop_password = "Cambiar Mi Contraseña";
$menu_drop_change = "Cambiar Mi Estilo de Comisión";
$account_hidden = "oculto";
$keyword_title = "Ligas de Palabra Clave Personalizadas";
$keyword_info = "Creando una liga de palabra clave personalizada le da la capacidad de registrar el tráfico entrante de diferentes fuentes. Cree una liga con hasta 4 palabras clave de rastreo diferentes y el reporte de rastreo personalizado le mostrará un reporte detallado por cada palabra clave que cree.";
$keyword_heading = "Variables Disponibles Para Rastreo de Palabra Clave Personalizada";
$keyword_tracking = "Identidad de Rastreo";
$keyword_build = "Para construir su liga, tome el URL siguiente y agréguela con la Identidad de Rastreo y la palabra clave que quiere usar. ";
$keyword_example = "Ejemplo";
$keyword_tutorial = "Ver el Tutorial";
$sub_tracking_title = "Rastreo de Sub-Afiliado";
$sub_tracking_info = "El crear una liga de sub-afiliado le da la capacidad de pasar su liga de afiliado a sus propios afiliados para que la usen. Sabrá quien generó la comisión para usted porque le reportaremos cuál de sus sub-afiliados generó la venta. Otra razón para usar un enlace de sub-afiliado es si tiene su propio sistema de rastreo que quiere incluir para reportes. ";
$sub_tracking_build = "Reemplace la XXX con el número de identidad del afiliado en su programa de afiliados. Repita este proceso para todos sus afiliados.";
$sub_tracking_example = "Ejemplo";
$sub_tracking_tutorial = "Ver Tutorial";
$sub_tracking_id = "Identidad de Sub-Afiliado";
$alternate_title = "Ligas de Página de Entradas Alternas";
$alternate_option_1 = "Opción 1: Creación Automatizada de Liga";
$alternate_heading_1 = "Creación Automatizada de Liga";
$alternate_info_1 = "Defina su página de tráfico de entrada ingresando el URL de donde quiere recibir el tráfico y crearemos una liga para usted. Usando esta característica creará una liga más corta para que usted la use con el URL insertado en la liga usando el número de identidad en nuestra base de datos. ";
$alternate_button = "Crear Mi Liga";
$alternate_links_heading = "Mis Ligas de URL de Entradas Alternas";
$alternate_links_note = "Las ligas existentes permanecerán intactas y funcionales si remueve una liga personalizada de esta página.";
$alternate_links_remove = "remover";
$alternate_option_2 = "Opción 2: Creación Manual de Liga";
$alternate_info_2 = "Si prefiere agregar sus propias ligas de afiliado con un URL de entrada alterno, use la siguiente estructura.";
$alternate_variable = "Variable de URL de Entrada Alterno";
$alternate_example = "Ejemplo";
$alternate_build = "Para construir su liga, tome el URL siguiente y agréguela con la Identidad de Rastreo y la palabra clave que quiere usar. ";
$alternate_none = "No se Crearon Ligas de Entrada Alternas";
$alternate_tutorial = "Ver Tutorial";
$cr_title = "Reporte de Palabras Claves Personalizadas";
$cr_select = "Seleccione Una Palabra Clave";
$cr_button = "Generar Reporte";
$cr_no_results = "No Se Encontraron Resultados de Búsqueda";
$cr_no_results_info = "Intente una Combinación de Palabra Clave Diferente";
$cr_used = "Palabras Clave Usadas";
$cr_found = "Se Encontró Esta Liga";
$cr_times = "Veces";
$cr_unique = "Ligas Únicas Encontradas";
$cr_detailed = "Reporte Detallado de Liga";
$cr_export = "Exportar Reporte A Excel";
$cr_none = "No Se Encontraron Palabras Claves";
$logo_title = "Cargar El Logotipo de Su Compañía";
$logo_info = "Si desea cargar el logotipo de su Compañía, la mostraremos a los clientes que lleve a nuestro sitio Web. Esto nos permite personalizar la experiencia de su cliente cuando nos visita.";
$logo_bullet_one = "Las imágenes pueden ser .jpg, .gif, o .png. No se permite contenido flash.";
$logo_bullet_two = "Cualquier imagen inapropiada será desechada y su cuenta será suspendida.";
$logo_bullet_three = "Si imagen/logo no será mostrada en nuestro sitio Web hasta que la hayamos aprobado.";
$logo_bullet_size_one = "Las imágenes pueden tener un ancho máximo de ";
$logo_bullet_size_two = "píxeles y una altura máxima de ";
$logo_bullet_req_size_one = "Las imágenes deben de tener un ancho de";
$logo_bullet_req_size_two = "píxeles y una altura de";
$logo_bullet_pixels = "píxeles.";
$logo_choose = "Escoja Una Imagen";
$logo_file = "Seleccione Un Archivo:";
$logo_browse = "Navegar…";
$logo_button = "Cargar";
$logo_current = "Mi Imagen Actual";
$logo_remove = "remover";
$logo_display_status = "Estado de Imagen:";
$logo_pending = "Pendiente de Aprobación";
$logo_approved = "Aprobada";
$logo_success = "La imagen fue cargada exitosamente y ahora está pendiente de aprobación.";
$signup_security_title = "Verificación de Cuenta";
$signup_security_info = "Por favor ingrese el código de seguridad mostrado en el recuadro. Este paso nos ayuda a prevenir registros automatizados.";
$signup_security_code = "Código de Seguridad";
$sub_tracking_none = "Ninguno";
$missing_security_code = "Código de Verificación / Seguridad de Cuenta Incorrecto o Faltante";
$alternate_success_title = "Éxito en Creación de Liga";
$alternate_success_info = "Tome su liga a continuación y comience a llevar tráfico a su URL definido.";
$alternate_failed_title = "Error en Creación de Liga";
$alternate_failed_info = "Por favor ingrese un URL válido.";
$logo_missing_filename = "Por favor escoja un nombre de archivo.";
$logo_required_width = "El ancho de imagen debe ser";
$logo_required_height = "La altura de la imagen debe ser";
$logo_maximum_width = "El ancho de imagen sólo puede ser";
$logo_maximum_height = "La altura de la imagen sólo puede ser";
$logo_size_maximum = "El tamaño de la imagen sólo puede ser un máximo de";
$logo_bad_filetype = "El tipo de imagen no es permitido. Los tipos de imagen permitidos son .gif, .jpg, y .png.";
$logo_upload_error = "Error al cargar imagen, por favor contacte al gerente de afiliación.";
$logo_error_title = "Error al cargar imagen";
$logo_error_bytes = "bytes.";
$excel_title = "Reporte de Ligas de Palabra Clave Personalizadas";
$excel_tab_report = "Reporte de Palabras Clave Personalizadas";
$excel_tab_logs = "Registros de Tráfico";
$excel_date = "Fecha de Reporte:";
$excel_affiliate = "Identidad de Afiliado:";
$excel_criteria = "Criterios para Liga de Palabra Clave";
$excel_link = "Estructura de Liga";
$excel_hits = "Visitas Únicas";
$excel_comm_stats = "Estadísticas de Comisión";
$excel_comm_current = "Comisiones Actuales";
$excel_comm_paid = "Comisiones Pagadas";
$excel_comm_total = "Comisiones Totales";
$excel_comm_ratio = "Radio de Conversión";
$excel_earned = "Comisiones Ganadas";
$excel_earned_current = "Comisiones Actuales";
$excel_earned_paid = "Comisiones Pagadas";
$excel_earned_total = "Total de Comisiones Ganadas";
$excel_earned_tab = "De clic en la pestaña de Registros de Tráfico (a continuación) para ver el registro de tráfico para esta liga personalizada.";
$excel_log_title = "Registro de Tráfico de Palabras Claves Personalizadas";
$excel_log_ip = "Dirección de IP";
$excel_log_refer = "URL referente";
$excel_log_date = "Fecha";
$excel_log_time = "Hora";
$excel_log_target = "URL objetivo";
$etemplates_title = "Plantillas para E-mail";
$etemplates_view_link = "Ver Esta Plantilla para E-mail";
$etemplates_name = "Nombre de Plantilla";
$signup_maintenance_heading = "Aviso de mantenimiento";
$signup_maintenance_info = "Las inscripciones estan temporalmente desactivadas. Por favor, inténtelo de nuevo más tarde. ";
$marketing_group_title = "Grupo de Marketing";
$marketing_button = "Display";
$marketing_no_group = "No hay un grupo seleccionado";
$marketing_choose = "Por favor, selecciona un grupo de Marketing arriba";
$marketing_notice = "Los grupos de Marketing pueden tener diferentes páginas de tráfico entrantes";
$canspam_heading = "CAN-SPAM Reglas y Aceptación";
$canspam_accept = "He leido, entendido y estoy de acuerdo con las siguientes reglas de CAN-SPAM.";
$canspam_error = "No has aceptado nuestras nuestras reglas de CAN-SPAM.";
$signup_banned = "Un error ha ocurrido durante la creación de la cuenta. Por favor contacta con el administrador del sistema para más información.";
$header_testimonials = "Testimonios de afiliados";
$testi_visit = "Visita el sitio web";
$testi_description = "Ofrecenos tu testimonio para nuestro programa de afiliación y lo pondremos en nuestra página de &lt;a href=&quot;testimonials.php&quot;&gt;testimonios&lt;/a&gt; con un enlace a tu página web.";
$testi_name = "Nombre";
$testi_url = "Pagina web";
$testi_content = "Testimonio";
$testi_code = "Código de seguridad";
$testi_submit = "Enviar el testimonio";
$testi_na = "Los testimonios no están disponibles.";
$testi_title = "Ofrecer un testimonio";
$testi_success_title = "Testimonio exitoso";
$testi_success_message = "Gracias por enviar tu testimonio. Nuestro equipo lo revisará pronto.";
$testi_error_title = "Error en el testimonio";
$testi_error_name_missing = "Por favor, incluye tu nombre para tu testimonio.";
$testi_error_url_missing = "Por favor, incluye tu página web para tu testimonio.";
$testi_error_missing = "Por favor, incluye un texto para tu testimonio.";
$menu_drop_delayed = "Comisiones retrasadas";
$details_drop_6 = "Comisiones retrasadas actualmente";
$details_type_6 = "Retrasada - Aprobaremos pronto";
$comdetails_status_6 = "Retrasada - Aprobaremos pronto";
$tc_reaccept_title = "Notificación de cambio en los términos y condiciones";
$tc_reaccept_sub_title = "Tienes que aceptar nuestros nuevos términos y condiciones para poder acceder a tu cuenta.";
$tc_reaccept_button = "He leido, entendido y estoy de acuerdo con los términos y condiciones de arriba.";
$tlinks_active = "Número de niveles activos";
$tlinks_payout_structure = "Estructura de pagos por nivel";
$tlinks_level = "Nivel";
$tierText1 = "% calculado a partir de la cantidad de comisión de los afiliados referenciados.";
$tierText2 = "% calculado a partir de la cantidad de comisión del nivel superior.";
$tierText3 = "% calculado a partir del montante de venta.";
$tierTextflat = "tarifa plana.";
$edit_custom_button = "Editar respuesta";
$private_heading = "Registrarse privadamente";
$private_info = "Nuestro programa de afiliación no esta abierto al público general y requiere un código de registro para unirse. La información sobre cómo obtener un código de registro debe hacerse aquí.";
$private_required_heading = "Código de registro requerido";
$private_code_title = "Introduzca el código de registro";
$private_button = "Enviar código";
$private_error_title = "El código de registro enviado no es válido";
$private_error_invalid = "El código de registro que nos has dado no es válido.";
$private_error_expired = "El código de registro que nos has dado ha expirado y ya no es válido.";
$qr_code_title = "Códigos QR";
$qr_code_size = "Tamaño del código QR";
$qr_code_button = "Código QR de Display";
$qr_code_offline_title = "Marketing Offline";
$qr_code_offline_content1 = "Añade este código QR en tus folletos de marketing, flyers, tarjetas de visita, etc.";
$qr_code_offline_content2 = "- Botón derecho de la imagen y <strong>salvar-como</strong> en tu ordenador.";
$qr_code_online_title = "Marketing Online";
$qr_code_online_content = "Añade este código QR en tu página web, redes sociales, blogs, etc.";
$menu_coupon = "Códigos promocionales";
$coupon_title = "Tus codigos promocionales disponibles";
$coupon_desc = "Entrega estos códigos promocionales y ¡gana una comisión cada vez que alguien use tu código!";
$coupon_head_1 = "Código promocional";
$coupon_head_2 = "Descuento al cliente";
$coupon_head_3 = "Tu cantidad de comisión";
$coupon_sale_amt = "de cantidad vendida";
$coupon_flat_rate = "tarifa plana";
$coupon_default = "Nivel de pago por defecto";
$cc_vanity_title = "Pide un cupón promocional personalizado";
$cc_vanity_field = "Código promocional";
$cc_vanity_button = "Pide un código promocional";
$cc_vanity_error_missing = "<strong>¡Error!</strong> Por favor, introduce un código promocional.";
$cc_vanity_error_exists = "<strong>¡Error!</strong> Ya has pedido este código. Esta pendiente de aprovación.";
$cc_vanity_error = "<strong>¡Error!</strong> El código promocional no es válido. Por favor use sólo letras, números y guiones.";
$cc_vanity_success = "<strong>¡Éxito!</strong> Tu cupón promocional personalizado ha sido solicitado.";
$coupon_none = "Actualmente no hay cupones promocionales disponibles.";
$pic_error_title = "Error en la subida de imágen";
$pic_missing = "Por favor, elige un nombre de archivo.";
$pic_invalid = "El tipo de imágen no esta permitido. Los tipos de imágenes permitidos son .gif, .jpg y .png.";
$pic_error = "Error en la subida de imágen, por favor contacta con el administrador de afiliación.";
$pic_success = "Tu imagen se ha subido satisfactoriamente.";
$pic_title = "Sube tu imágen";
$pic_info = "Subir tu imágen ayuda a personalizar nuestra experiencia contigo.";
$pic_bullet_1 = "Las imágenes deben ser .jpg, .gif o .png.";
$pic_bullet_2 = "Cualquier imágen inapropiada será descartada y tu cuenta suspendida.";
$pic_bullet_3 = "Tu imágen no se mostrará al público. Sólo se adjuntará a tu cuenta para poder verla nosotros.";
$pic_file = "Elige un archivo:";
$pic_button = "Subir";
$pic_current = "Mi imágen actual";
$pic_remove = "Eliminar imágen";
$progress_title = "Requisitos para el siguiente pago:";
$progress_complete = "Completo.";
$progress_none = "No tenemos un requisito de pago mínimo.";
$progress_sentence_1 = "Has ganado";
$progress_sentence_2 = "del";
$progress_sentence_3 = "requisito.";
$aff_lib_button = "<b>Reclama tu acceso gratuito a</b><br>www.AffiliateLibrary.com";
$menu_announcements = "Campañas en Redes Sociales";
$announcements_name = "Nombre de la Campaña";
$announcements_facebook_message = "Mensaje en Facebook";
$announcements_twitter_message = "Mensaje en Twitter";
$announcements_facebook_link = "Enlace de Facebook";
$announcements_facebook_picture = "Foto de Facebook";
$general_last_30_days_activity = "Últimos Treinta Días de Actividad";
$general_last_30_days_activity_traffic = "Tráfico";
$general_last_30_days_activity_commissions = "Comisiones";
$accountability_title = "Responsabilidad y Comunicación";
$accountability_text = "<strong>¿Qué es esto?</strong><p>Tomamos un enfoque proactivo para desarrollar confianza con nuestros socios afiliados. Nuestro objetivo es asegurar que ofrezcamos tanta información como sea posible en cada comisión ganada y/o rechazada en nuestro sistema.</p><strong>Comunicación</strong><p>Estamos disponibles para ofrecer detalles sobre cualquier comisión rechazada. Empleamos una fuerte comunicación con nuestros afiliados y animamos a hacer preguntas y comentarios.</p>";
$debit_reason_0 = "Ninguno";
$debit_reason_1 = "Reembolso";
$debit_reason_2 = "Devolución de cargo";
$debit_reason_3 = "Fraude Reportado";
$debit_reason_4 = "Pedido Cancelado";
$debit_reason_5 = "Reembolso Parcial";
$menu_drop_pending_debits = "Débitos Pendientes";
$debit_amount_label = "Monto del Débito";
$debit_date_label = "Fecha del Débito";
$debit_reason_label = "Razón del Débito";
$debit_paragraph = "Los débitos serán deducidos de tu próximo pago.";
$debit_invoice_amount = "Menos Monto del Débito";
$debit_revised_amount = "Importe de Pago Revisado";
$mv_head_description = "Nota: Sólo puedes colocar un video por página en tu sitio web.";
$mv_head_source_code = "Coloca este código en la sección de ENCABEZADO de tu documento HTML.";
$mv_body_title = "Título del Video";
$mv_body_description = "Descripción";
$mv_body_source_code = "Coloca este código en la sección de CUERPO de tu documento HTML en donde quieres que aparezca tu video.";
$menu_marketing_videos = "Videos";
$mv_preview_button = "Vista Previa del Video";
$dt_no_data = "No hay datos disponibles en la tabla.";
$dt_showing_exists = "Mostrando _START_ to _END_ of _TOTAL_ entradas.";
$dt_showing_none = "Mostrando 0 a 0 de 0 entradas.";
$dt_filtered = "(filtrado del _MAX_ total de entradas)";
$dt_length_choice = "Mostrar _MENU_ entradas.";
$dt_loading = "Cargando...";
$dt_processing = "Procesando...";
$dt_no_records = "No se encontraron registros coincidentes.";
$dt_first = "Primero";
$dt_last = "Último";
$dt_next = "Siguiente";
$dt_previous = "Anterior";
$dt_sort_asc = ": activar para ordenar columna ascendente";
$dt_sort_desc = ": activar para ordenar columna descendiente";
$choose_marketing_group = "Elije un Grupo de Marketing";
$email_already_used_1 = "La cuenta no puede ser creada. Sólo permitimos";
$email_already_used_2 = "cuenta";
$email_already_used_3 = "para ser creada por dirección email.";
$missing_fax = "Por favor introduce tu número de fax.";
$chart_last_6_months = "Comisiones Pagadas en los Últimos Seis Meses";
$chart_last_6_months_paid = "Comisiones Pagadas";
$chart_this_month = "Nuestro Top 5 de Afiliados Este Mes";
$chart_this_month_none = "No hay datos qué mostrar.";
$login_return = "Regresa a Inicio de Afiliado";
$login_lost_details = "Introduce tu nombre de usuario y te mandaremos un email con trus credenciales de ingreso.";
$account_edit_general_prefs = "Preferencias Generales";
$account_edit_email_language = "Idioma de Email";
$footer_connect = "Conéctate con Nosotros";
$modal_close = "Cerrar";
$vat_amount_heading = "Cantidad VAT";
$menu_logout = "Cerrar Sesión";
$menu_upload_picture = "Sube tu Foto";
$menu_offer_testi = "Ofrece un Testimonio";
$fb_login = "Ingresar con Facebook";
$fb_permissions = "Permisos no concedidos. Por favor permite que el sitio web use tu dirección email.";
$announcements_published = "Anuncio Publicado";
$training_videos_title = "Vídeos de Aprendizaje";
$training_videos_general = "Marketing General";
$commission_method = "Método de Funcionamiento";
$how_will_you_earn = "¿Cómo ganará comisiones?";
$pm_account_credit = "Acreditaremos su cuenta por la cantidad de comisiones que haya ganado.";
$pm_check_money_order = "Le enviaremos un cheque/giro postal por correo.";
$pm_paypal = "Le enviaremos un pago por PayPal.";
$pm_stripe = " Le enviaremos un pago por Stripe.";
$pm_wire = "Le realizaremos una transferencia bancaria electrónica.";
$add_to_signup_left_column_text = "<span style=\"color:#CC0000; font-style:italic;\">* indica campo obligatorio.</span>";
$paypal_email = "Email Paypall";
$stripe_acct_details = "Detalles de Cuenta Stripe";
$stripe_connect = "Puede conectarse a su cuenta Stripe desde la página de ajustes de cuenta tras registrarse.";
$stripe_success = "Conexión Exitosa a Cuenta Stripe";
$stripe_settings = "Ajustes Stripe";
$stripe_connect_edit = "Conectar con Stripe";
$stripe_delete = "Eliminar Cuenta Stripe";
$stripe_confirm = "¿Está seguro de que desea eliminar esta cuenta?";
$payment_settings = "Configuración de Pagos";
$edit_payment_settings = "Editar Configuración de Pagos";
$invalid_paypal_address = "Dirección de email de Paypal no valida.";
$payment_method_error = "Por favor seleccione un método de pago.";
$payment_settings_updated = "Configuración de pagos actualizada.";
$stripe_removed = "Cuenta Stripe removida.";
$payment_settings_success = "¡Éxito!";
$payment_update_notice_1 = "¡Notificación!";
$payment_update_notice_2 = "Usted ha elegido recibir un <strong>[payment_option_here]</strong> pago de nosotros. Por favor <a href=\"account.php?page=48\" style=\"font-weight:bold;\">haga clic aquí</a> para conectar su cuenta<strong>[payment_option_here]</strong>.";
$pm_title_credit = "Crédito de cuenta";
$pm_title_mo = "Cheque/Giro postal";
$pm_title_paypal = "PayPal";
$pm_title_stripe = "Stripe";
$pm_title_wire = "Transferencia bancaria";
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