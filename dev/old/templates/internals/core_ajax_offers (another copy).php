<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('TRAFFIC_EXCEEDED_EXEMPT', TRUE);
$control_panel_session = true;

try {
	include_once("../../API/config.php");
	include_once('../../includes/session.check_affiliates.php');
	// include_once('../../includes/control_panel.php');
	// TODO: Add indexes to idevaff_groups MySQL table for faster execution when done;
	// affiliate ID
	$linkid = $_SESSION[$install_directory_name.'_idev_LoggedID'];
	// affiliate percentage
	$checkaff = $db->query("select * from idevaff_affiliates where id = '" . $linkid . "'");
	$res = $checkaff->fetch();
	$lev = $res['level'];
	$levamt = $db->prepare('select amt from idevaff_paylevels where level = ?');
	$levamt->execute([$lev]);
	$lamt = $levamt->fetch();
	$levelamt = $lamt['amt'];

	//Get Param
	$paramRowPerPage = isset($_REQUEST['iDisplayLength']) ? (int)$_REQUEST['iDisplayLength'] : 10;
	$paramEcho = isset($_REQUEST['sEcho']) ? stripslashes($_REQUEST['sEcho']) : '';
	$paramStart = isset($_REQUEST['iDisplayStart']) ? (int)$_REQUEST['iDisplayStart'] : 0;

	//Get data from database
	$groups_table = 'idevaff_groups';
	$aColumns = array(  '"placeholder" as placeholder', 'name', 'niche', 'countries', 'devices', 'os', 'connection', 'carrier', 'flow_type', 'payout', 'id');
	$paramSearch = trim($_REQUEST['sSearch']);
	$sLimit = sprintf(" LIMIT %d OFFSET %d ", $paramRowPerPage,$paramStart);

	/*
	* Ordering
	*/
	$payoutSort="no";
	$payoutSortDir="desc";
	if ( isset( $_REQUEST['iSortCol_0'] ) )
	{

		$sOrder = " ORDER BY  ";
		for ( $i=0 ; $i<intval( $_REQUEST['iSortingCols'] ) ; $i++ )
		{
			if ( $_REQUEST[ 'bSortable_'.intval($_REQUEST['iSortCol_'.$i]) ] == "true" )
			{
				if (intval($_REQUEST['iSortCol_'.$i]) == 5) {
					$sOrder .= "CAST(`".$aColumns[ intval( $_REQUEST['iSortCol_'.$i] ) ]."` AS DECIMAL)".
					           ($_REQUEST['sSortDir_'.$i]=='desc' ? 'DESC' : 'ASC') .", ";
				} else {
					$sOrder .= "`".$aColumns[ intval( $_REQUEST['iSortCol_'.$i] ) ]."` ".
					           ($_REQUEST['sSortDir_'.$i]=='desc' ? 'DESC' : 'ASC') .", ";
				}
			}
			if(intval($_REQUEST['iSortCol_'.$i]) == 9){
				$payoutSort="yes";
				$payoutSortDir=$_REQUEST['sSortDir_'.$i];
			}
		}

		$sOrder = substr_replace( $sOrder, "", -2 );
		if ( $sOrder == " ORDER BY" )
		{
			$sOrder = "";
		}
	} else {
		$payoutSort="yes";
		$payoutSortDir='desc';
		$sOrder = ' ORDER BY CAST(`payout` AS DECIMAL) DESC ';
	}
	$sSearch = '';
	if ($paramSearch != '') {
		$orWhereCondList = array();
		foreach($aColumns as $idx => $column) {
			if ($idx == 0) continue;
			$orWhereCondList[] = sprintf(" %s LIKE '%%%s%%' AND show_in_table = 1", $column, $paramSearch);
		}

		$sSearch = implode(' OR ', $orWhereCondList);
		$sSearch = '(' . $sSearch . ')';
	}

	//Query
	$query = sprintf('SELECT %s FROM '.$groups_table.' ', implode(', ', $aColumns));
	if ($sSearch != '') {
		$whereCond .= (empty($whereCond)?'WHERE':' AND ') . $sSearch;
	} else {
		$whereCond = "WHERE show_in_table = 1 ";
	}
	foreach($aColumns as $idx=>$col) {
		if (!empty($_REQUEST['sSearch_' . $idx]) && $_REQUEST['bSearchable_' . $idx]) {
			if ($idx == 3 || $idx == 4 || $idx == 5 || $idx == 6 || $idx == 7) {
				$whereCond.=' AND (' . $col . ' LIKE "%' . $_REQUEST['sSearch_' . $idx].'%"';
				$whereCond.= ' OR ' .$col. '="0" OR ' .$col. '="All")';
			} else {
				$whereCond.=' AND ' . $col . ' LIKE "%' . trim($_REQUEST['sSearch_' . $idx]).'%"';
			}
		}
	}
	$result = $db->prepare($query);

	$result->execute(array());

//	 echo '<pre>';
//	 print_r($result->fetchAll());
//	 exit;
	//	if($payoutSort == "yes"){
//		if($payoutSortDir == "asc"){
//			usort($output['aaData'], function ($itema1, $itema2) {
//				$item1=$itema1['payout'];
//				$item2=$itema2['payout'];
//				if(strpos($item1, "%" ) === true){
//					if(strpos($item2, "%" ) === true){
//						$a1=str_replace("%","",str_replace(" ","",str_replace(",","",$item1)));
//						$a2=str_replace("%","",str_replace(" ","",str_replace(",","",$item2)));
//						if($a1 < $a2){
//							return -1;
//						}
//						else{
//							return 1;
//						}
//					}
//					else{
//						return 1;
//					}
//				}
//				else{
//					if(strpos($item2, "%" ) === true){
//						return -1;
//					}
//					else{
//						if(strpos($item1,"-") === true){
//							$a1=explode("-",$item1);
//							$a=str_replace(" ","",$a1[0]);
//							if(strpos($item2,"-") === true){
//								$b1=explode("-",$item2);
//								$b=str_replace(" ","",$b1[0]);
//							}
//							else{
//								$b=str_replace("€","",str_replace(" ","",str_replace(",","",$item2)));
//							}
//							if($a < $b){
//								return -1;
//							}
//							else{
//								return 1;
//							}
//						}
//						else{
//							$a=str_replace("€","",str_replace(" ","",str_replace(",","",$item1)));
//							if(strpos($item2,"-") === true){
//								$b1=explode("-",$item2);
//								$b=str_replace(" ","",$b1[0]);
//							}
//							else{
//								$b=str_replace("€","",str_replace(" ","",str_replace(",","",$item2)));
//							}
//							if($a < $b){
//								return -1;
//							}
//							else{
//								return 1;
//							}
//						}
//					}
//				}
//			});
//		}
//		else{
//			usort($output['aaData'], function ($itema1, $itema2) {
//				$item1=$itema1['payout'];
//				$item2=$itema2['payout'];
//				if(strpos($item1, "%" ) === true){
//					if(strpos($item2, "%" ) === true){
//						$a1=str_replace("%","",str_replace(" ","",str_replace(",","",$item1)));
//						$a2=str_replace("%","",str_replace(" ","",str_replace(",","",$item2)));
//						if($a1 > $a2){
//							return -1;
//						}
//						else{
//							return 1;
//						}
//					}
//					else{
//						return 1;
//					}
//				}
//				else{
//					if(strpos($item2, "%" ) === true){
//						return -1;
//					}
//					else{
//						if(strpos($item1,"-") === true){
//							$a1=explode("-",$item1);
//							$a=str_replace(" ","",$a1[1]);
//							if(strpos($item2,"-") === true){
//								$b1=explode("-",$item2);
//								$b=str_replace(" ","",$b1[1]);
//							}
//							else{
//								$b=str_replace("€","",str_replace(" ","",str_replace(",","",$item2)));
//							}
//							if($a > $b){
//								return -1;
//							}
//							else{
//								return 1;
//							}
//						}
//						else{
//							$a=str_replace("€","",str_replace(" ","",str_replace(",","",$item1)));
//							if(strpos($item2,"-") === true){
//								$b1=explode("-",$item2);
//								$b=str_replace(" ","",$b1[1]);
//							}
//							else{
//								$b=str_replace("€","",str_replace(" ","",str_replace(",","",$item2)));
//							}
//							if($a > $b){
//								return -1;
//							}
//							else{
//								return 1;
//							}
//						}
//					}
//				}
//			});
//		}
//	}
	// $output['iTotalDisplayRecords'] = count($output['aaData']);

	$query .= $whereCond . $sOrder. $sLimit;
//	echo $query ;exit;

	$result = $db->prepare($query);

	$result->execute(array());

	// echo '<pre>';
	// print_r($query);
	// print_r($result->fetchAll());
	// die;

	//Get total count
	$query = sprintf('SELECT count(*) as c FROM '.$groups_table . ' ');
	$query .= $whereCond;
	$rResultTotal = $db->prepare($query);
	$rResultTotal->execute(array());
	$totalCountObj = $rResultTotal->fetch();
	$totalCount = $totalCountObj["c"];

	$qdevices = $db->query('SELECT distinct devices FROM idevaff_groups WHERE devices != "All"');
	$qos = $db->query('SELECT distinct os FROM idevaff_groups WHERE  os != "All"');
	$qconnection = $db->query('SELECT distinct connection FROM idevaff_groups WHERE  connection != "All"');
	$qcarrier = $db->query('SELECT distinct carrier FROM idevaff_groups WHERE  carrier != "All"');
	$qNiche = $db->query('SELECT distinct niche FROM idevaff_groups');
	$qFlow = $db->query('SELECT distinct flow_type FROM idevaff_groups');
	$qHotLinks = $db->query('SELECT distinct grp FROM idevaff_links WHERE earnings / hits * 100 >= 0.005');
	$qFHotBanners = $db->query('SELECT distinct grp FROM idevaff_banners WHERE earnings / hits * 100 >= 0.005');
	$availableDevices = $qdevices->fetchAll();
	$availableOs = $qos->fetchAll();
	$availableConnection = $qconnection->fetchAll();
	$availableCarrier = $qcarrier->fetchAll();
	$availableNiche = $qNiche->fetchAll();
	$availableFlow = $qFlow->fetchAll();
	$hotlinks = $qHotLinks->fetchAll(PDO::FETCH_ASSOC);
	$hotbanners = $qFHotBanners->fetchAll(PDO::FETCH_ASSOC);

	// $qCountries = $db->query('SHOW TABLES');
	$qCountries = $db->query('SELECT * FROM idevaff_countries_geo');
	$qAvailCountries = $db->query('SELECT distinct countries FROM idevaff_groups WHERE show_in_table = 1');
	$allCountries = $qCountries->fetchAll();
	$availableCountries = $qAvailCountries->fetchAll();

	$devices=[];
	foreach ($availableDevices as $key => $device)
	{
		$dArr=explode(",",$device['devices']);
		foreach ($dArr as $d){
			if(!in_array(trim($d),$devices)){
				$devices[]=trim($d);
			}
		}
	}
	$oss=[];
	foreach ($availableOs as $key => $os)
	{
		$oArr=explode(",",$os['os']);
		foreach ($oArr as $o){
			if(!in_array(trim($o),$oss)){
				$oss[]=trim($o);
			}
		}
	}
	$cons=[];
	foreach ($availableConnection as $key => $conec)
	{
		$cnArr=explode(",",$conec['connection']);
		foreach ($cnArr as $c){
			if(!in_array(trim($c),$cons)){
				$cons[]=trim($c);
			}
		}
	}
//        $carriers=[];
//		foreach ($availableCarrier as $key => $carr)
//		{
//			$crArr=explode(",",$carr['carrier']);
//			foreach ($crArr as $c){
//				if(!in_array(trim($c),$carriers)){
//					$carriers[]=trim($c);
//				}
//			}
//		}
	$flows=[];
	foreach ($availableFlow as $key => $flow)
	{
		$fArr=explode(",",$flow['flow_type']);
		foreach ($fArr as $f){
			if(!in_array(trim($f),$flows)){
				$flows[]=trim($f);
			}
		}
	}
	$output = array();
	$output['sEcho'] = intval($paramEcho);
	$output['iTotalRecords'] = $totalCount;
	$output['iTotalDisplayRecords'] = $totalCount;
	$output['aaData'] = array();
	$output['availableNiche'] = $availableNiche;
	$output['availableOs'] = $oss;
	$output['availableConnection'] = $cons;
//        $output['availableCarrier'] = $carriers;
	$output['availableFlow'] = $flows;
	$output['availableDevices'] = $devices;
	$output['availableCountries'] = $availableCountries;
	$output['allCountries'] = $allCountries;
	$output['hotlinks'] = $hotlinks;
	$output['hotbanners'] = $hotbanners;

	$querylang = $db->query('SELECT * FROM idevaff_language_custom WHERE name = "custom_global" OR name = "custom_revenue_share" OR name = "custom_all"');
	$languageVals = $querylang->fetchAll();

	$getlanguage = array();
	foreach($languageVals as $languageVal) {
		$querylang_val = $db->query('SELECT * FROM idevaff_language_custom_values WHERE id = ' . $languageVal['id']);
		$querylang_data= $querylang_val->fetch();
		$pack = 10;
		switch($_SESSION['idev_language']) {
			case 'russian': $pack = 10; break;
			case 'english': $pack = 16; break;
		}
		$getlanguage[$languageVal['name']] = $querylang_data['pack_' . $pack];
	}

	foreach ( $result->fetchAll() as $pqry) {
		$id = $pqry['id'];
		// TODO: if ID of offer in array $hotlinks or array $hotbanners - display HOT lalbel before the id and name of offer in table and in table details, show offers, links and banners with HOT label on top of other records in talbe rows and child rows- ALWAYS | hot code: <span class="label label-success">HOT</span> | ORDER by display always HOT first
// test id = 70 start
		if ( $pqry['id'] == "70" ) {
			$name = '<span class="label label-success">HOT</span> ' . $pqry['id'] . ' - ' . $pqry['name'];
		} else {
			$name = $pqry['id'] . ' - ' . $pqry['name'];
		}
// test end
		//$niche = $pqry['niche'];
		if ( $pqry['niche'] == "Adult Cams" ) {
			$niche = "<span class='fa-stack fa-xs'><span class='far fa-circle fa-stack-2x fa-xs'></span><strong class='fa-stack-1x fa-xs'>18</strong></span><i class='fa fa-camera fa-lg fa-fw' title='Adult Cams'></i>";
		} elseif ( $pqry['niche'] == "Adult Dating" ) {
			$niche = "<span class='fa-stack fa-xs'><span class='far fa-circle fa-stack-2x fa-xs'></span><strong class='fa-stack-1x fa-xs'>18</strong></span><i class='fa fa-heart fa-lg fa-fw' title='Adult Dating'></i>";
		} elseif ( $pqry['niche'] == "Adult Nutra" ) {
			$niche = "<span class='fa-stack fa-xs'><span class='far fa-circle fa-stack-2x fa-xs'></span><strong class='fa-stack-1x fa-xs'>18</strong></span><i class='fa fa-leaf fa-lg fa-fw' title='Adult Nutra'></i>";
		} elseif ( $pqry['niche'] == "Adult Video" ) {
			$niche = "<span class='fa-stack fa-xs'><span class='far fa-circle fa-stack-2x fa-xs'></span><strong class='fa-stack-1x fa-xs'>18</strong></span><i class='fa fa-video fa-lg fa-fw' title='Adult Video'></i>";
		} elseif ( $pqry['niche'] == "Adult Apps" ) {
			$niche = "<span class='fa-stack fa-xs'><span class='far fa-circle fa-stack-2x fa-xs'></span><i class='fa fa-compact-disc fa-lg fa-fw' title='Adult Apps'></i>";
		} elseif ( $pqry['niche'] == "Mainstream Sweepstakes" ) {
			$niche = "<i class='fa fa-check-square fa-lg fa-fw' title='Mainstream Sweepstakes'></i>";
		} elseif ( $pqry['niche'] == "Mainstream Games" ) {
			$niche = "<i class='fa fa-gamepad fa-lg fa-fw' title='Mainstream Games'></i>";
		} elseif ( $pqry['niche'] == "Mainstream Utilities" ) {
			$niche = "<i class='fa fa-cogs fa-lg fa-fw' title='Mainstream Utilities'></i></i>";
		} elseif ( $pqry['niche'] == "Mainstream Gambling" ) {
			$niche = "<i class='fa fa-dice fa-lg fa-fw' title='Mainstream Gambling'></i>";
		} elseif ( $pqry['niche'] == "Mainstream Personal Care" ) {
			$niche = "<i class='fa fa-creative-commons-by fa-lg fa-fw' title='Mainstream Personal Care'></i>";
		} elseif ( $pqry['niche'] == "Mainstream Beauty and Cosmetics" ) {
			$niche = "<i class='fa fa-splotch fa-lg fa-fw' title='Mainstream Beauty and Cosmetics'></i>";
		} elseif ( $pqry['niche'] == "Mainstream Fitness" ) {
			$niche = "<i class='fa fa-dumbbell fa-lg fa-fw' title='Mainstream Fitness'></i>";
		} elseif ( $pqry['niche'] == "Mainstream Weightloss" ) {
			$niche = "<i class='fa fa-weight fa-lg fa-fw' title='Mainstream Weightloss'></i>";
		} elseif ( $pqry['niche'] == "Mainstream Nutra" ) {
			$niche = "<i class='fa fa-leaf fa-lg fa-fw' title='Mainstream Nutra'></i>";
		} elseif ( $pqry['niche'] == "Mainstream Health Products" ) {
			$niche = "<i class='fa fa-briefcase-medical fa-lg fa-fw' title='Health Products'></i>";
		} elseif ( $pqry['niche'] == "Mainstream Video" ) {
			$niche = "<i class='fa fa-video fa-lg fa-fw' title='Video'></i>";
		} elseif ( $pqry['niche'] == "Mainstream Dating" ) {
			$niche = "<i class='fa fa-heart fa-lg fa-fw' title='Mainstream Dating'></i>";
		} elseif ( $pqry['niche'] == "Mainstream Esoteric" ) {
			$niche = "<i class='fa fa-magic fa-lg fa-fw' title='Mainstream Esoteric'></i>";
		} elseif ( $pqry['niche'] == "Mainstream Home Improvement" ) {
			$niche = "<i class='fa fa-home fa-lg fa-fw' title='Mainstream Home Improvement'></i>";
		} elseif ( $pqry['niche'] == "Mainstream Education" ) {
			$niche = "<i class='fa fa-graduation-cap fa-lg fa-fw' title='Mainstream Education'></i>";
		} elseif ( $pqry['niche'] == "Mainstream Forex" ) {
			$niche = "<i class='fa fa-chart-line fa-lg fa-fw' title='Mainstream Forex'></i>";
		} elseif ( $pqry['niche'] == "Mainstream Weight Loss" ) {
			$niche = "<i class='fa fa-weight fa-lg fa-fw' title='Mainstream Weight Loss'></i>";
		} else {
			$niche = "<i class='fa fa-question-circle fa-lg fa-fw' title='Other'></i>";
		}
		if ( $pqry['countries'] == "All" ) {
			$countries = '<i class="fa fa-globe-americas fa-lg" title="' . $getlanguage['custom_global'] . '"></i>';
		} else {
			$exploded = explode( ',', $pqry['countries'] );
			$result   = array();
			foreach ( $exploded as $elem ) {
				$result[] = trim( $elem );
			}
			$countries = '';
			foreach ( $result as $idx => $country ) {
				if ( $idx > 3 ) {
					$countries .= "<i class='fa fa-plus-circle'></i>";
					break;
				}
				$flag      = '<img src="/images/geo_flags/' . strtolower( trim( $country ) ) . '.png" class="geo_flag" title="' . trim( $country ) . '" alt="' . trim( $country ) . '" border="0">';
				$countries .= $flag . ' ';
			}
		}
		$countries .= '<div class="data-tooltip">';
		if ( $pqry['countries'] == "All" ) {
			$countries = '<i class="fa fa-globe-americas fa-lg" title="' . $getlanguage['custom_global'] . '"></i>';
		} else {
			$exploded = explode( ',', $pqry['countries'] );
			$html     = '';
			if ( count( $exploded ) > 4 ) {
				foreach ( $exploded as $country ) {
					$flag = '<img src="/images/geo_flags/' . strtolower( trim( $country ) ) . '.png" class="geo_flag" title="' . trim( $country ) . '" alt="' . trim( $country ) . '" border="0">';
					$html .= $flag . ' ';
				}
			}
			$countries .= $html;
		}
		$countries .= '</div>';
		$countries = '<div class="data-tooltip-container">' . $countries . '</div>';
		if ( $pqry['devices'] == "Mobile" ) {
			$devices = "<i class='fa fa-mobile-alt fa-lg' title='Mobile'></i>";
		} elseif ( $pqry['devices'] == "Tablet" ) {
			$devices = "<i class='fa fa-tablet-alt fa-lg' title='Tablet'></i>";
		} elseif ( $pqry['devices'] == "Desktop" ) {
			$devices = "<i class='fa fa-desktop fa-lg' title='Desktop'></i>";
		} elseif ( $pqry['devices'] == "Mobile, Tablet" ) {
			$devices = "<i class='fa fa-mobile-alt fa-lg' title='Mobile'></i> <i class='fa fa-tablet-alt fa-lg' title='Tablet'></i>";
		} elseif ( $pqry['devices'] == "Mobile, Desktop" ) {
			$devices = "<i class='fa fa-mobile-alt fa-lg' title='Mobile'></i> <i class='fa fa-desktop fa-lg' title='Desktop'></i>";
		} else {
			$devices = $getlanguage['custom_all'];
		}
		if ( $pqry['os'] == "Android" ) {
			$os = "<i class='fab fa-android fa-lg' title='Android'></i>";
		} elseif ( $pqry['os'] == "iOS" ) {
			$os = "<i class='fab fa-apple fa-lg' title='iOS'></i>";
		} elseif ( $pqry['os'] == "Windows" ) {
			$os = "<i class='fab fa-windows fa-lg' title='Windows'></i>";
		} elseif ( $pqry['os'] == "Windows Mobile" ) {
			$os = "<i class='fab fa-windows fa-lg' title='Windows Mobile'></i>";
		} elseif ( $pqry['os'] == "MacOS" ) {
			$os = "<i class='fab fa-apple fa-lg' title='MacOS'></i>";
		} elseif ( $pqry['os'] == "Linux" ) {
			$os = "<i class='fab fa-linux fa-lg' title='Linux'></i>";
		} elseif ( $pqry['os'] == "BlackBerry" ) {
			$os = "<i class='fab fa-blackberry fa-lg' title='BlackBerry'></i>";
		} elseif ( $pqry['os'] == "Other" ) {
			$os = "<i class='fas fa-terminal fa-lg' title='Other'></i>";
		} elseif ( $pqry['os'] == "Windows, MacOS" ) {
			$os = "<i class='fab fa-windows fa-lg' title='Windows'></i> <i class='fab fa-apple fa-lg' title='MacOS'></i>";
		} else {
			$os = $getlanguage['custom_all'];
		}
		if ( $pqry['connection'] == "Carrier" ) {
			$connection = "<i class='fas fa-broadcast-tower fa-lg' title='Carrier'></i>";
		} elseif ( $pqry['connection'] == "Wi-Fi" ) {
			$connection = "<i class='fa fa-wifi fa-lg' title='Wi-Fi'></i>";
		} elseif ( $pqry['connection'] == "Wired" ) {
			$connection = "<i class='fas fa-network-wired fa-lg' title='Wired'></i>";
		} else {
			$connection = $getlanguage['custom_all'];
		}
		if ( $pqry['carrier'] == "All" ) {
			$carriers = $getlanguage['custom_all'];
		} else {
			$exploded = explode( ',', $pqry['carrier'] );
			$result   = array();
			foreach ( $exploded as $elem ) {
				$result[] = trim( $elem );
			}
			$carriers = '';
			foreach ( $result as $idx => $carrier ) {
				if ( $idx > 5 ) {
					$carriers .= "<i class='fa fa-plus-circle'></i>";
					break;
				}
				$carrier_logo = '<img src="/images/carriers/' . strtolower( trim( $carrier ) ) . '.png" class="carrier" title="' . trim( $carrier ) . '" alt="' . trim( $carrier ) . '" border="0">';
				$carriers     .= $carrier_logo . ' ';
			}
		}
		$carriers .= '<div class="data-tooltip">';
		if ( $pqry['carrier'] == "All" ) {
		} else {
			$exploded = explode( ',', $pqry['carrier'] );
			$html     = '';
			if ( count( $exploded ) > 5 ) {
				foreach ( $exploded as $carrier ) {
					$carrier_logo = '<img src="/images/carriers/' . strtolower( trim( $carrier ) ) . '.png" class="carrier" title="' . trim( $carrier ) . '" alt="' . trim( $carrier ) . '" border="0">';
					$html         .= $carrier_logo . ' ';
				}
			}
			$carriers .= $html;
		}
		$carriers .= '</div>';
		$carriers = '<div class="data-tooltip-container">' . $carriers . '</div>';
		//$flow_type = $pqry['flow_type'];
		if ( $pqry['flow_type'] == "COD" ) {
			$flow_type = "<i class='fa fa-money-bill fa-lg' title='COD'></i> <i class='fa fa-truck fa-lg' title='COD'></i>";
		} elseif ( $pqry['flow_type'] == "Credit/Debit Card" ) {
			$flow_type = "<i class='fa fa-credit-card fa-lg' title='Credit/Debit Card'></i>";
		} elseif ( $pqry['flow_type'] == "SEPA" ) {
			$flow_type = "<i class='fa fa-euro-sign fa-lg' title='SEPA'></i>";
		} elseif ( $pqry['flow_type'] == "Bank Wire" ) {
			$flow_type = "<i class='fa fa-bank fa-lg' title='Bank Wire'></i>";
		} elseif ( $pqry['flow_type'] == "Other" ) {
			$flow_type = "<i class='fa fa-asterisk fa-lg' title='Other'></i>";
		} elseif ( $pqry['flow_type'] == "1-click" ) {
			$flow_type = "<i class='fa fa-mouse-pointer fa-lg' title='1-click'></i>";
		} elseif ( $pqry['flow_type'] == "2-click" ) {
			$flow_type = "<strong class='fa-lg'>2</strong> <i class='fa fa-times fa-lg' title='2-click'></i> <i class='fa fa-mouse-pointer fa-lg' title='2-click'></i>";
		} elseif ( $pqry['flow_type'] == "SOI" ) {
			$flow_type = "<i class='fa fa-envelope fa-lg' title='SOI'></i>";
		} elseif ( $pqry['flow_type'] == "DOI" ) {
			$flow_type = "<i class='fa fa-envelope-open fa-lg' title='DOI'></i>";
		} elseif ( $pqry['flow_type'] == "PPL" ) {
			$flow_type = "<i class='fa fa-user-plus fa-lg' title='PPL'></i>";
		} elseif ( $pqry['flow_type'] == "SMS/MO" ) {
			$flow_type = "<i class='fas fa-sms fa-lg' title='SMS/MO'></i>";
		} elseif ( $pqry['flow_type'] == "SMS/Pin Submit" ) {
			$flow_type = "<i class='fas fa-keyboard fa-lg' title='SMS/Pin Submit'></i>";
		} elseif ( $pqry['flow_type'] == "Credit/Debit Card, SEPA, Bank Wire, Other" ) {
			$flow_type = "<i class='fa fa-credit-card fa-lg' title='Credit/Debit Card'></i> <i class='fa fa-euro-sign fa-lg' title='SEPA'></i> <i class='fa fa-bank fa-lg' title='Bank Wire'></i> <i class='fa fa-asterisk fa-lg' title='Other'></i>";
		} elseif ( $pqry['flow_type'] == "SMS/MO, Credit/Debit Card, Bank Wire, Cryptocurrency, Other" ) {
			$flow_type = "<i class='fas fa-sms fa-lg' title='SMS/MO'></i> <i class='fa fa-credit-card fa-lg' title='Credit/Debit Card'></i> <i class='fa fa-bank fa-lg' title='Bank Wire'></i> <i class='fab fa-bitcoin fa-lg' title='Cryptocurrency'></i> <i class='fa fa-asterisk fa-lg' title='Other'></i>";
		} elseif ( $pqry['flow_type'] == "Credit/Debit Card, Bank Wire, PayPal, paysafecard, Post Mail, Other" ) {
			$flow_type = "<i class='fa fa-credit-card fa-lg' title='Credit/Debit Card'></i> <i class='fa fa-bank fa-lg' title='Bank Wire'></i> <i class='fab fa-paypal fa-lg' title='PayPal'></i> <i class='fa fa-lock fa-lg' title='paysafecard'></i> <i class='fa fa-mail-bulk fa-lg' title='Post Mail'></i> <i class='fa fa-asterisk fa-lg' title='Other'></i>";
		} else {
			$flow_type = "<i class='fa fa-asterisk fa-lg' title='Other'></i>";
		}
// TODO:  simplify payout calcs without * 1
		$string    = '';
		$payoutarr = explode( '-', $pqry['payout'] );
		if ( count( $payoutarr ) > 1 ) {
			$payouts = array();
			foreach ( $payoutarr as $paydata ) {
				$measure    = preg_replace( '/[0-9\.]+/', '', trim( $paydata ) );
				$pay_out    = $paydata * 1;
				$payoutData = trim( $measure ) != "%" ? number_format( $pay_out, 2 ) . $measure : $pay_out . $measure;
				$payouts[]  = $payoutData;
			}
			$string = implode( ' - ', $payouts );
		} else {
			$measure = preg_replace( '/[0-9\.]+/', '', $pqry['payout'] );
			$pay_out = $pqry['payout'] * 1;
			$string  = trim( $measure ) != "%" ? number_format( $pay_out, 2 ) . $measure : $pay_out . $measure;
		}
		$usd_to_eur = file_get_contents( 'https://sublimerevenue.com/0_usd_to_eur.txt' );
		if ( strpos( $string, "$" ) === false ) {
			$payout = preg_replace_callback( '/(\d+(?:\.\d+)?)(\s*[€%])/i', function ( $matches ) use ( $levelamt ) {
				return number_format( round( ( $matches[1] * $levelamt ), 2 ), 2 ) . $matches[2];
			}, $string );
		} else {
			$payout = preg_replace_callback( '/(\d+(?:\.\d+)?)(\s*[$%])/i', function ( $matches ) use ( $usd_to_eur ) {
				return str_replace( "$", "€", number_format( round( ( $matches[1] * $usd_to_eur ), 2 ), 2 ) . $matches[2] );
			}, $string );
		}


		$tmpOfferList = array(
			'<a href="javascript:void(0);" class="row-details-toggle details-control"></a>',
			$name,
			$niche,
			$countries,
			$devices,
			$os,
			$connection,
			strtolower( $carriers ) == 'all' ? $getlanguage['custom_all'] : $carriers,
			strtolower( $flow_type ) == 'revenue share' ? $getlanguage['custom_revenue_share'] : $flow_type,
			$payout,
			$id
		);

		$output['aaData'][] = $tmpOfferList;
	}

	echo json_encode($output);

	exit;
} catch (Exception $e) {
	echo $e->getMessage();
}