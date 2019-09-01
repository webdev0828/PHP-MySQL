<?php
define('TRAFFIC_EXCEEDED_EXEMPT', TRUE);
$control_panel_session = true;
include_once("../../API/config.php");
include_once('../../includes/session.check_affiliates.php');

//$linkid = 106;
$linkid = $_SESSION[$install_directory_name . '_idev_LoggedID'];

$current_date = $_GET["current_date"];
$aggregate = $_GET["aggregate"];

$is_total = $_GET["is_total"];
$startD = $_GET["startD"];
$endD = $_GET["endD"];
$info = $_GET["info"];
$country = $_GET["country"];
$subId = $_GET["subId"];
$tId1 = $_GET["tId1"];
$tId2 = $_GET["tId2"];
$tId3 = $_GET["tId3"];
$tId4 = $_GET["tId4"];
$combinations = $_GET["combinations"];
$smartTools = $_GET["smartTools"];
$offerTools = $_GET["offerTools"];

if($is_total == "yes"){
	//ignore
}
else {
	if ( $aggregate == 'daily' ) {
		$startD = $endD = $current_date;
		//igonre
	} else {
		$currentSD = $current_date;
		$currentED = date( 'Y-m-t', strtotime( $current_date ) );
		if ( strtotime( $currentSD ) > strtotime( $startD ) && strtotime( $currentED ) < strtotime( $endD ) ) {
			$startD = $currentSD;
			$endD   = $currentED;
		} elseif ( strtotime( $currentSD ) < strtotime( $startD ) && strtotime( $currentED ) < strtotime( $endD ) ) {
			$endD = $currentED;
		} elseif ( strtotime( $currentSD ) > strtotime( $startD ) && strtotime( $currentED ) > strtotime( $endD ) ) {
			$startD = $currentSD;
		}
	}
}
function detailsByDateRange($startD, $endD, $current_date, $db, $id, $info,$country,$subId,$tId1,$tId2,$tId3,$tId4,$combinations,$smartTools,$offerTools)
{
	$date_where = "between '" . strtotime($startD . ' 00:00:00') . "' and '" . strtotime($endD . ' 23:59:59') . "'";
	$subIdWhereCond="";
	$tId1WhereCond="";
	$tId2WhereCond="";
	$tId3WhereCond="";
	$tId4WhereCond="";
	$combinationsWhereCond="";
	$smartToolsWhereCond="";
	$offerToolsWhereCond="";
	$whereCond="";
	if($country != "" && $country != "All"){
		$whereCond.=" AND geo='$country'";
	}
	if($subId != "" && $subId != "All"){
		$whereCond.=" AND sub_id='$subId'";
	}
	if($tId1 != "" && $tId1 != "All"){
		$whereCond.=" AND tid1='$tId1'";
	}
	if($tId2 != "" && $tId2 != "All"){
		$whereCond.=" AND tid2='$tId2'";
	}
	if($tId3 != "" && $tId3 != "All"){
		$whereCond.=" AND tId3='$tId3'";
	}
	if($tId4 != "" && $tId4 != "All"){
		$whereCond.=" AND tid4='$tId4'";
	}
	if($combinations != "" && $combinations != "All"){
		$whereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
	}
	if($smartTools != "" && $smartTools != "All" && $offerTools != "" && $offerTools != "All"){
		$whereCond.=" AND (CONCAT(src1,' ',src2) LIKE '$smartTools' OR CONCAT(src1,' ',src2) LIKE '$offerTools')";
	}
	elseif($smartTools != "" && $smartTools != "All"){
		$whereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
	}
	elseif($offerTools != "" && $offerTools != "All"){
//		$whereCond.=" AND CONCAT(src1,' ',src2) LIKE '$offerTools'";
	}
	if($country != "" && $country != "All"){
		$subIdWhereCond.=" AND geo='$country'";
		$tId1WhereCond.=" AND geo='$country'";
		$tId2WhereCond.=" AND geo='$country'";
		$tId3WhereCond.=" AND geo='$country'";
		$tId4WhereCond.=" AND geo='$country'";
		$combinationsWhereCond.=" AND geo='$country'";
		$smartToolsWhereCond.=" AND geo='$country'";
		$offerToolsWhereCond.=" AND geo='$country'";
		if($subId != "" && $subId != "All" ){
			$tId1WhereCond.=" AND sub_id='$subId'";
			$tId2WhereCond.=" AND sub_id='$subId'";
			$tId3WhereCond.=" AND sub_id='$subId'";
			$tId4WhereCond.=" AND sub_id='$subId'";
			$combinationsWhereCond.=" AND sub_id='$subId'";
			$smartToolsWhereCond.=" AND sub_id='$subId'";
			$offerToolsWhereCond.=" AND sub_id='$subId'";
			if($tId1 != "" && $tId1 != "All"){
				$tId2WhereCond.=" AND tid1='$tId1'";
				$tId3WhereCond.=" AND tid1='$tId1'";
				$tId4WhereCond.=" AND tid1='$tId1'";
				$combinationsWhereCond.=" AND tid1='$tId1'";
				$smartToolsWhereCond.=" AND tid1='$tId1'";
				$offerToolsWhereCond.=" AND tid1='$tId1'";
				if($tId2 != "" && $tId2 != "All"){
					$tId3WhereCond.=" AND tid2='$tId2'";
					$tId4WhereCond.=" AND tid2='$tId2'";
					$combinationsWhereCond.=" AND tid2='$tId2'";
					$smartToolsWhereCond.=" AND tid2='$tId2'";
					$offerToolsWhereCond.=" AND tid2='$tId2'";
					if($tId3 != "" && $tId3 != "All"){
						$tId4WhereCond.=" AND tId3='$tId3'";
						$combinationsWhereCond.=" AND tId3='$tId3'";
						$smartToolsWhereCond.=" AND tId3='$tId3'";
						$offerToolsWhereCond.=" AND tId3='$tId3'";
						if($tId4 != "" && $tId4 != "All"){
							$combinationsWhereCond.=" AND tid4='$tId4'";
							$smartToolsWhereCond.=" AND tid4='$tId4'";
							$offerToolsWhereCond.=" AND tid4='$tId4'";
							if($combinations != "" && $combinations != "All"){
								$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
								$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
								if($smartTools != "" && $smartTools != "All"){
									$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
								}
							}
							elseif($smartTools != "" && $smartTools != "All"){
								$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
							}
						}
						elseif($combinations != "" && $combinations != "All"){
							$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
							$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
							if($smartTools != "" && $smartTools != "All"){
								$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
							}
						}
						elseif($smartTools != "" && $smartTools != "All"){
							$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
						}
					}
					elseif($tId4 != "" && $tId4 != "All"){
						$combinationsWhereCond.=" AND tid4='$tId4'";
						$smartToolsWhereCond.=" AND tid4='$tId4'";
						$offerToolsWhereCond.=" AND tid4='$tId4'";
						if($combinations != "" && $combinations != "All"){
							$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
							$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
							if($smartTools != "" && $smartTools != "All"){
								$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
							}
						}
						elseif($smartTools != "" && $smartTools != "All"){
							$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
						}
					}
					elseif($combinations != "" && $combinations != "All"){
						$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						if($smartTools != "" && $smartTools != "All"){
							$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
						}
					}
					elseif($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($tId3 != "" && $tId3 != "All"){
					$tId4WhereCond.=" AND tId3='$tId3'";
					$combinationsWhereCond.=" AND tId3='$tId3'";
					$smartToolsWhereCond.=" AND tId3='$tId3'";
					$offerToolsWhereCond.=" AND tId3='$tId3'";
					if($tId4 != "" && $tId4 != "All"){
						$combinationsWhereCond.=" AND tid4='$tId4'";
						$smartToolsWhereCond.=" AND tid4='$tId4'";
						$offerToolsWhereCond.=" AND tid4='$tId4'";
						if($combinations != "" && $combinations != "All"){
							$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
							$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
							if($smartTools != "" && $smartTools != "All"){
								$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
							}
						}
						elseif($smartTools != "" && $smartTools != "All"){
							$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
						}
					}
					elseif($combinations != "" && $combinations != "All"){
						$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						if($smartTools != "" && $smartTools != "All"){
							$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
						}
					}
					elseif($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($tId4 != "" && $tId4 != "All"){
					$combinationsWhereCond.=" AND tid4='$tId4'";
					$smartToolsWhereCond.=" AND tid4='$tId4'";
					$offerToolsWhereCond.=" AND tid4='$tId4'";
					if($combinations != "" && $combinations != "All"){
						$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						if($smartTools != "" && $smartTools != "All"){
							$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
						}
					}
					elseif($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($combinations != "" && $combinations != "All"){
					$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					if($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($tId2 != "" && $tId2 != "All"){
				$tId3WhereCond.=" AND tid2='$tId2'";
				$tId4WhereCond.=" AND tid2='$tId2'";
				$combinationsWhereCond.=" AND tid2='$tId2'";
				$smartToolsWhereCond.=" AND tid2='$tId2'";
				$offerToolsWhereCond.=" AND tid2='$tId2'";
				if($tId3 != "" && $tId3 != "All"){
					$tId4WhereCond.=" AND tId3='$tId3'";
					$combinationsWhereCond.=" AND tId3='$tId3'";
					$smartToolsWhereCond.=" AND tId3='$tId3'";
					$offerToolsWhereCond.=" AND tId3='$tId3'";
					if($tId4 != "" && $tId4 != "All"){
						$combinationsWhereCond.=" AND tid4='$tId4'";
						$smartToolsWhereCond.=" AND tid4='$tId4'";
						$offerToolsWhereCond.=" AND tid4='$tId4'";
						if($combinations != "" && $combinations != "All"){
							$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
							$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
							if($smartTools != "" && $smartTools != "All"){
								$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
							}
						}
						elseif($smartTools != "" && $smartTools != "All"){
							$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
						}
					}
					elseif($combinations != "" && $combinations != "All"){
						$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						if($smartTools != "" && $smartTools != "All"){
							$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
						}
					}
					elseif($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($tId4 != "" && $tId4 != "All"){
					$combinationsWhereCond.=" AND tid4='$tId4'";
					$smartToolsWhereCond.=" AND tid4='$tId4'";
					$offerToolsWhereCond.=" AND tid4='$tId4'";
					if($combinations != "" && $combinations != "All"){
						$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						if($smartTools != "" && $smartTools != "All"){
							$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
						}
					}
					elseif($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($combinations != "" && $combinations != "All"){
					$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					if($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($tId3 != "" && $tId3 != "All"){
				$tId4WhereCond.=" AND tId3='$tId3'";
				$combinationsWhereCond.=" AND tId3='$tId3'";
				$smartToolsWhereCond.=" AND tId3='$tId3'";
				$offerToolsWhereCond.=" AND tId3='$tId3'";
				if($tId4 != "" && $tId4 != "All"){
					$combinationsWhereCond.=" AND tid4='$tId4'";
					$smartToolsWhereCond.=" AND tid4='$tId4'";
					$offerToolsWhereCond.=" AND tid4='$tId4'";
					if($combinations != "" && $combinations != "All"){
						$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						if($smartTools != "" && $smartTools != "All"){
							$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
						}
					}
					elseif($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($combinations != "" && $combinations != "All"){
					$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					if($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($tId4 != "" && $tId4 != "All"){
				$combinationsWhereCond.=" AND tid4='$tId4'";
				$smartToolsWhereCond.=" AND tid4='$tId4'";
				$offerToolsWhereCond.=" AND tid4='$tId4'";
				if($combinations != "" && $combinations != "All"){
					$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					if($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($combinations != "" && $combinations != "All"){
				$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				if($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($smartTools != "" && $smartTools != "All"){
				$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
			}
		}
		elseif($tId1 != "" && $tId1 != "All"){
			$tId2WhereCond.=" AND tid1='$tId1'";
			$tId3WhereCond.=" AND tid1='$tId1'";
			$tId4WhereCond.=" AND tid1='$tId1'";
			$combinationsWhereCond.=" AND tid1='$tId1'";
			$smartToolsWhereCond.=" AND tid1='$tId1'";
			$offerToolsWhereCond.=" AND tid1='$tId1'";
			if($tId2 != "" && $tId2 != "All"){
				$tId3WhereCond.=" AND tid2='$tId2'";
				$tId4WhereCond.=" AND tid2='$tId2'";
				$combinationsWhereCond.=" AND tid2='$tId2'";
				$smartToolsWhereCond.=" AND tid2='$tId2'";
				$offerToolsWhereCond.=" AND tid2='$tId2'";
				if($tId3 != "" && $tId3 != "All"){
					$tId4WhereCond.=" AND tId3='$tId3'";
					$combinationsWhereCond.=" AND tId3='$tId3'";
					$smartToolsWhereCond.=" AND tId3='$tId3'";
					$offerToolsWhereCond.=" AND tId3='$tId3'";
					if($tId4 != "" && $tId4 != "All"){
						$combinationsWhereCond.=" AND tid4='$tId4'";
						$smartToolsWhereCond.=" AND tid4='$tId4'";
						$offerToolsWhereCond.=" AND tid4='$tId4'";
						if($combinations != "" && $combinations != "All"){
							$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
							$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
							if($smartTools != "" && $smartTools != "All"){
								$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
							}
						}
						elseif($smartTools != "" && $smartTools != "All"){
							$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
						}
					}
					elseif($combinations != "" && $combinations != "All"){
						$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						if($smartTools != "" && $smartTools != "All"){
							$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
						}
					}
					elseif($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($tId4 != "" && $tId4 != "All"){
					$combinationsWhereCond.=" AND tid4='$tId4'";
					$smartToolsWhereCond.=" AND tid4='$tId4'";
					$offerToolsWhereCond.=" AND tid4='$tId4'";
					if($combinations != "" && $combinations != "All"){
						$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						if($smartTools != "" && $smartTools != "All"){
							$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
						}
					}
					elseif($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($combinations != "" && $combinations != "All"){
					$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					if($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($tId3 != "" && $tId3 != "All"){
				$tId4WhereCond.=" AND tId3='$tId3'";
				$combinationsWhereCond.=" AND tId3='$tId3'";
				$smartToolsWhereCond.=" AND tId3='$tId3'";
				$offerToolsWhereCond.=" AND tId3='$tId3'";
				if($tId4 != "" && $tId4 != "All"){
					$combinationsWhereCond.=" AND tid4='$tId4'";
					$smartToolsWhereCond.=" AND tid4='$tId4'";
					$offerToolsWhereCond.=" AND tid4='$tId4'";
					if($combinations != "" && $combinations != "All"){
						$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						if($smartTools != "" && $smartTools != "All"){
							$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
						}
					}
					elseif($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($combinations != "" && $combinations != "All"){
					$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					if($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($tId4 != "" && $tId4 != "All"){
				$combinationsWhereCond.=" AND tid4='$tId4'";
				$smartToolsWhereCond.=" AND tid4='$tId4'";
				$offerToolsWhereCond.=" AND tid4='$tId4'";
				if($combinations != "" && $combinations != "All"){
					$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					if($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($combinations != "" && $combinations != "All"){
				$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				if($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($smartTools != "" && $smartTools != "All"){
				$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
			}
		}
		elseif($tId2 != "" && $tId2 != "All"){
			$tId3WhereCond.=" AND tid2='$tId2'";
			$tId4WhereCond.=" AND tid2='$tId2'";
			$combinationsWhereCond.=" AND tid2='$tId2'";
			$smartToolsWhereCond.=" AND tid2='$tId2'";
			$offerToolsWhereCond.=" AND tid2='$tId2'";
			if($tId3 != "" && $tId3 != "All"){
				$tId4WhereCond.=" AND tId3='$tId3'";
				$combinationsWhereCond.=" AND tId3='$tId3'";
				$smartToolsWhereCond.=" AND tId3='$tId3'";
				$offerToolsWhereCond.=" AND tId3='$tId3'";
				if($tId4 != "" && $tId4 != "All"){
					$combinationsWhereCond.=" AND tid4='$tId4'";
					$smartToolsWhereCond.=" AND tid4='$tId4'";
					$offerToolsWhereCond.=" AND tid4='$tId4'";
					if($combinations != "" && $combinations != "All"){
						$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						if($smartTools != "" && $smartTools != "All"){
							$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
						}
					}
					elseif($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($combinations != "" && $combinations != "All"){
					$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					if($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($tId4 != "" && $tId4 != "All"){
				$combinationsWhereCond.=" AND tid4='$tId4'";
				$smartToolsWhereCond.=" AND tid4='$tId4'";
				$offerToolsWhereCond.=" AND tid4='$tId4'";
				if($combinations != "" && $combinations != "All"){
					$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					if($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($combinations != "" && $combinations != "All"){
				$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				if($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($smartTools != "" && $smartTools != "All"){
				$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
			}
		}
		elseif($tId3 != "" && $tId3 != "All"){
			$tId4WhereCond.=" AND tId3='$tId3'";
			$combinationsWhereCond.=" AND tId3='$tId3'";
			$smartToolsWhereCond.=" AND tId3='$tId3'";
			$offerToolsWhereCond.=" AND tId3='$tId3'";
			if($tId4 != "" && $tId4 != "All"){
				$combinationsWhereCond.=" AND tid4='$tId4'";
				$smartToolsWhereCond.=" AND tid4='$tId4'";
				$offerToolsWhereCond.=" AND tid4='$tId4'";
				if($combinations != "" && $combinations != "All"){
					$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					if($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($combinations != "" && $combinations != "All"){
				$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				if($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($smartTools != "" && $smartTools != "All"){
				$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
			}
		}
		elseif($tId4 != "" && $tId4 != "All"){
			$combinationsWhereCond.=" AND tid4='$tId4'";
			$smartToolsWhereCond.=" AND tid4='$tId4'";
			$offerToolsWhereCond.=" AND tid4='$tId4'";
			if($combinations != "" && $combinations != "All"){
				$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				if($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($smartTools != "" && $smartTools != "All"){
				$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
			}
		}
		elseif($combinations != "" && $combinations != "All"){
			$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
			$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
			if($smartTools != "" && $smartTools != "All"){
				$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
			}
		}
		elseif($smartTools != "" && $smartTools != "All"){
			$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
		}
	}
	elseif($subId != "" && $subId != "All" ){
		$tId1WhereCond.=" AND sub_id='$subId'";
		$tId2WhereCond.=" AND sub_id='$subId'";
		$tId3WhereCond.=" AND sub_id='$subId'";
		$tId4WhereCond.=" AND sub_id='$subId'";
		$combinationsWhereCond.=" AND sub_id='$subId'";
		$smartToolsWhereCond.=" AND sub_id='$subId'";
		$offerToolsWhereCond.=" AND sub_id='$subId'";
		if($tId1 != "" && $tId1 != "All"){
			$tId2WhereCond.=" AND tid1='$tId1'";
			$tId3WhereCond.=" AND tid1='$tId1'";
			$tId4WhereCond.=" AND tid1='$tId1'";
			$combinationsWhereCond.=" AND tid1='$tId1'";
			$smartToolsWhereCond.=" AND tid1='$tId1'";
			$offerToolsWhereCond.=" AND tid1='$tId1'";
			if($tId2 != "" && $tId2 != "All"){
				$tId3WhereCond.=" AND tid2='$tId2'";
				$tId4WhereCond.=" AND tid2='$tId2'";
				$combinationsWhereCond.=" AND tid2='$tId2'";
				$smartToolsWhereCond.=" AND tid2='$tId2'";
				$offerToolsWhereCond.=" AND tid2='$tId2'";
				if($tId3 != "" && $tId3 != "All"){
					$tId4WhereCond.=" AND tId3='$tId3'";
					$combinationsWhereCond.=" AND tId3='$tId3'";
					$smartToolsWhereCond.=" AND tId3='$tId3'";
					$offerToolsWhereCond.=" AND tId3='$tId3'";
					if($tId4 != "" && $tId4 != "All"){
						$combinationsWhereCond.=" AND tid4='$tId4'";
						$smartToolsWhereCond.=" AND tid4='$tId4'";
						$offerToolsWhereCond.=" AND tid4='$tId4'";
						if($combinations != "" && $combinations != "All"){
							$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
							$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
							if($smartTools != "" && $smartTools != "All"){
								$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
							}
						}
						elseif($smartTools != "" && $smartTools != "All"){
							$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
						}
					}
					elseif($combinations != "" && $combinations != "All"){
						$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						if($smartTools != "" && $smartTools != "All"){
							$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
						}
					}
					elseif($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($tId4 != "" && $tId4 != "All"){
					$combinationsWhereCond.=" AND tid4='$tId4'";
					$smartToolsWhereCond.=" AND tid4='$tId4'";
					$offerToolsWhereCond.=" AND tid4='$tId4'";
					if($combinations != "" && $combinations != "All"){
						$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						if($smartTools != "" && $smartTools != "All"){
							$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
						}
					}
					elseif($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($combinations != "" && $combinations != "All"){
					$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					if($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($tId3 != "" && $tId3 != "All"){
				$tId4WhereCond.=" AND tId3='$tId3'";
				$combinationsWhereCond.=" AND tId3='$tId3'";
				$smartToolsWhereCond.=" AND tId3='$tId3'";
				$offerToolsWhereCond.=" AND tId3='$tId3'";
				if($tId4 != "" && $tId4 != "All"){
					$combinationsWhereCond.=" AND tid4='$tId4'";
					$smartToolsWhereCond.=" AND tid4='$tId4'";
					$offerToolsWhereCond.=" AND tid4='$tId4'";
					if($combinations != "" && $combinations != "All"){
						$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						if($smartTools != "" && $smartTools != "All"){
							$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
						}
					}
					elseif($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($combinations != "" && $combinations != "All"){
					$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					if($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($tId4 != "" && $tId4 != "All"){
				$combinationsWhereCond.=" AND tid4='$tId4'";
				$smartToolsWhereCond.=" AND tid4='$tId4'";
				$offerToolsWhereCond.=" AND tid4='$tId4'";
				if($combinations != "" && $combinations != "All"){
					$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					if($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($combinations != "" && $combinations != "All"){
				$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				if($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($smartTools != "" && $smartTools != "All"){
				$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
			}
		}
		elseif($tId2 != "" && $tId2 != "All"){
			$tId3WhereCond.=" AND tid2='$tId2'";
			$tId4WhereCond.=" AND tid2='$tId2'";
			$combinationsWhereCond.=" AND tid2='$tId2'";
			$smartToolsWhereCond.=" AND tid2='$tId2'";
			$offerToolsWhereCond.=" AND tid2='$tId2'";
			if($tId3 != "" && $tId3 != "All"){
				$tId4WhereCond.=" AND tId3='$tId3'";
				$combinationsWhereCond.=" AND tId3='$tId3'";
				$smartToolsWhereCond.=" AND tId3='$tId3'";
				$offerToolsWhereCond.=" AND tId3='$tId3'";
				if($tId4 != "" && $tId4 != "All"){
					$combinationsWhereCond.=" AND tid4='$tId4'";
					$smartToolsWhereCond.=" AND tid4='$tId4'";
					$offerToolsWhereCond.=" AND tid4='$tId4'";
					if($combinations != "" && $combinations != "All"){
						$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						if($smartTools != "" && $smartTools != "All"){
							$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
						}
					}
					elseif($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($combinations != "" && $combinations != "All"){
					$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					if($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($tId4 != "" && $tId4 != "All"){
				$combinationsWhereCond.=" AND tid4='$tId4'";
				$smartToolsWhereCond.=" AND tid4='$tId4'";
				$offerToolsWhereCond.=" AND tid4='$tId4'";
				if($combinations != "" && $combinations != "All"){
					$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					if($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($combinations != "" && $combinations != "All"){
				$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				if($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($smartTools != "" && $smartTools != "All"){
				$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
			}
		}
		elseif($tId3 != "" && $tId3 != "All"){
			$tId4WhereCond.=" AND tId3='$tId3'";
			$combinationsWhereCond.=" AND tId3='$tId3'";
			$smartToolsWhereCond.=" AND tId3='$tId3'";
			$offerToolsWhereCond.=" AND tId3='$tId3'";
			if($tId4 != "" && $tId4 != "All"){
				$combinationsWhereCond.=" AND tid4='$tId4'";
				$smartToolsWhereCond.=" AND tid4='$tId4'";
				$offerToolsWhereCond.=" AND tid4='$tId4'";
				if($combinations != "" && $combinations != "All"){
					$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					if($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($combinations != "" && $combinations != "All"){
				$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				if($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($smartTools != "" && $smartTools != "All"){
				$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
			}
		}
		elseif($tId4 != "" && $tId4 != "All"){
			$combinationsWhereCond.=" AND tid4='$tId4'";
			$smartToolsWhereCond.=" AND tid4='$tId4'";
			$offerToolsWhereCond.=" AND tid4='$tId4'";
			if($combinations != "" && $combinations != "All"){
				$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				if($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($smartTools != "" && $smartTools != "All"){
				$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
			}
		}
		elseif($combinations != "" && $combinations != "All"){
			$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
			$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
			if($smartTools != "" && $smartTools != "All"){
				$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
			}
		}
		elseif($smartTools != "" && $smartTools != "All"){
			$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
		}
	}
	elseif($tId1 != "" && $tId1 != "All"){
		$tId2WhereCond.=" AND tid1='$tId1'";
		$tId3WhereCond.=" AND tid1='$tId1'";
		$tId4WhereCond.=" AND tid1='$tId1'";
		$combinationsWhereCond.=" AND tid1='$tId1'";
		$smartToolsWhereCond.=" AND tid1='$tId1'";
		$offerToolsWhereCond.=" AND tid1='$tId1'";
		if($tId2 != "" && $tId2 != "All"){
			$tId3WhereCond.=" AND tid2='$tId2'";
			$tId4WhereCond.=" AND tid2='$tId2'";
			$combinationsWhereCond.=" AND tid2='$tId2'";
			$smartToolsWhereCond.=" AND tid2='$tId2'";
			$offerToolsWhereCond.=" AND tid2='$tId2'";
			if($tId3 != "" && $tId3 != "All"){
				$tId4WhereCond.=" AND tId3='$tId3'";
				$combinationsWhereCond.=" AND tId3='$tId3'";
				$smartToolsWhereCond.=" AND tId3='$tId3'";
				$offerToolsWhereCond.=" AND tId3='$tId3'";
				if($tId4 != "" && $tId4 != "All"){
					$combinationsWhereCond.=" AND tid4='$tId4'";
					$smartToolsWhereCond.=" AND tid4='$tId4'";
					$offerToolsWhereCond.=" AND tid4='$tId4'";
					if($combinations != "" && $combinations != "All"){
						$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
						if($smartTools != "" && $smartTools != "All"){
							$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
						}
					}
					elseif($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($combinations != "" && $combinations != "All"){
					$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					if($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($tId4 != "" && $tId4 != "All"){
				$combinationsWhereCond.=" AND tid4='$tId4'";
				$smartToolsWhereCond.=" AND tid4='$tId4'";
				$offerToolsWhereCond.=" AND tid4='$tId4'";
				if($combinations != "" && $combinations != "All"){
					$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					if($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($combinations != "" && $combinations != "All"){
				$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				if($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($smartTools != "" && $smartTools != "All"){
				$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
			}
		}
		elseif($tId3 != "" && $tId3 != "All"){
			$tId4WhereCond.=" AND tId3='$tId3'";
			$combinationsWhereCond.=" AND tId3='$tId3'";
			$smartToolsWhereCond.=" AND tId3='$tId3'";
			$offerToolsWhereCond.=" AND tId3='$tId3'";
			if($tId4 != "" && $tId4 != "All"){
				$combinationsWhereCond.=" AND tid4='$tId4'";
				$smartToolsWhereCond.=" AND tid4='$tId4'";
				$offerToolsWhereCond.=" AND tid4='$tId4'";
				if($combinations != "" && $combinations != "All"){
					$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					if($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($combinations != "" && $combinations != "All"){
				$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				if($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($smartTools != "" && $smartTools != "All"){
				$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
			}
		}
		elseif($tId4 != "" && $tId4 != "All"){
			$combinationsWhereCond.=" AND tid4='$tId4'";
			$smartToolsWhereCond.=" AND tid4='$tId4'";
			$offerToolsWhereCond.=" AND tid4='$tId4'";
			if($combinations != "" && $combinations != "All"){
				$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				if($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($smartTools != "" && $smartTools != "All"){
				$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
			}
		}
		elseif($combinations != "" && $combinations != "All"){
			$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
			$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
			if($smartTools != "" && $smartTools != "All"){
				$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
			}
		}
		elseif($smartTools != "" && $smartTools != "All"){
			$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
		}
	}
	elseif($tId2 != "" && $tId2 != "All"){
		$tId3WhereCond.=" AND tid2='$tId2'";
		$tId4WhereCond.=" AND tid2='$tId2'";
		$combinationsWhereCond.=" AND tid2='$tId2'";
		$smartToolsWhereCond.=" AND tid2='$tId2'";
		$offerToolsWhereCond.=" AND tid2='$tId2'";
		if($tId3 != "" && $tId3 != "All"){
			$tId4WhereCond.=" AND tId3='$tId3'";
			$combinationsWhereCond.=" AND tId3='$tId3'";
			$smartToolsWhereCond.=" AND tId3='$tId3'";
			$offerToolsWhereCond.=" AND tId3='$tId3'";
			if($tId4 != "" && $tId4 != "All"){
				$combinationsWhereCond.=" AND tid4='$tId4'";
				$smartToolsWhereCond.=" AND tid4='$tId4'";
				$offerToolsWhereCond.=" AND tid4='$tId4'";
				if($combinations != "" && $combinations != "All"){
					$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
					if($smartTools != "" && $smartTools != "All"){
						$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
					}
				}
				elseif($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($combinations != "" && $combinations != "All"){
				$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				if($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($smartTools != "" && $smartTools != "All"){
				$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
			}
		}
		elseif($tId4 != "" && $tId4 != "All"){
			$combinationsWhereCond.=" AND tid4='$tId4'";
			$smartToolsWhereCond.=" AND tid4='$tId4'";
			$offerToolsWhereCond.=" AND tid4='$tId4'";
			if($combinations != "" && $combinations != "All"){
				$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				if($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($smartTools != "" && $smartTools != "All"){
				$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
			}
		}
		elseif($combinations != "" && $combinations != "All"){
			$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
			$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
			if($smartTools != "" && $smartTools != "All"){
				$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
			}
		}
		elseif($smartTools != "" && $smartTools != "All"){
			$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
		}
	}
	elseif($tId3 != "" && $tId3 != "All"){
		$tId4WhereCond.=" AND tId3='$tId3'";
		$combinationsWhereCond.=" AND tId3='$tId3'";
		$smartToolsWhereCond.=" AND tId3='$tId3'";
		$offerToolsWhereCond.=" AND tId3='$tId3'";
		if($tId4 != "" && $tId4 != "All"){
			$combinationsWhereCond.=" AND tid4='$tId4'";
			$smartToolsWhereCond.=" AND tid4='$tId4'";
			$offerToolsWhereCond.=" AND tid4='$tId4'";
			if($combinations != "" && $combinations != "All"){
				$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
				if($smartTools != "" && $smartTools != "All"){
					$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
				}
			}
			elseif($smartTools != "" && $smartTools != "All"){
				$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
			}
		}
		elseif($combinations != "" && $combinations != "All"){
			$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
			$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
			if($smartTools != "" && $smartTools != "All"){
				$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
			}
		}
		elseif($smartTools != "" && $smartTools != "All"){
			$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
		}
	}
	elseif($tId4 != "" && $tId4 != "All"){
		$combinationsWhereCond.=" AND tid4='$tId4'";
		$smartToolsWhereCond.=" AND tid4='$tId4'";
		$offerToolsWhereCond.=" AND tid4='$tId4'";
		if($combinations != "" && $combinations != "All"){
			$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
			$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
			if($smartTools != "" && $smartTools != "All"){
				$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
			}
		}
		elseif($smartTools != "" && $smartTools != "All"){
			$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
		}
	}
	elseif($combinations != "" && $combinations != "All"){
		$smartToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
		$offerToolsWhereCond.=" AND CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) LIKE '$combinations'";
		if($smartTools != "" && $smartTools != "All"){
			$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
		}
	}
	elseif($smartTools != "" && $smartTools != "All" && $offerTools != "" && $offerTools != "All"){
		$offerToolsWhereCond.=" AND (CONCAT(src1,' ',src2) LIKE '$smartTools' OR CONCAT(src1,' ',src2) LIKE '$offerTools')";
	}
	elseif($smartTools != "" && $smartTools != "All"){
		$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$smartTools'";
	}
	elseif($offerTools != "" && $offerTools != "All"){
		$offerToolsWhereCond.=" AND CONCAT(src1,' ',src2) LIKE '$offerTools'";
	}

	$q_raw_visits_country = "select COUNT(*) v,geo n from idevaff_iptracking where acct_id = $id and stamp " . $date_where . " group by geo order by v desc";
	$q_raw_visits_sub_id = "select COUNT(*) v,sub_id n from idevaff_iptracking where acct_id = $id and sub_id IS NOT NULL AND sub_id <> ''  and stamp " . $date_where .$subIdWhereCond. " group by sub_id  order by v desc";
	$q_raw_visits_tid1 = "select COUNT(*) v,tid1 n from idevaff_iptracking where acct_id = $id and tid1 IS NOT NULL AND tid1 <> ''  and stamp " . $date_where.$tId1WhereCond. " group by tid1  order by v desc";
	$q_raw_visits_tid2 = "select COUNT(*) v,tid2 n from idevaff_iptracking where acct_id = $id and tid2 IS NOT NULL AND tid2 <> '' and stamp " . $date_where .$tId2WhereCond. " group by tid2  order by v desc";
	$q_raw_visits_tid3 = "select COUNT(*) v,tid3 n from idevaff_iptracking where acct_id = $id and tid3 IS NOT NULL AND tid3 <> '' and stamp " . $date_where .$tId3WhereCond. " group by tid3  order by v desc";
	$q_raw_visits_tid4 = "select COUNT(*) v,tid4 n from idevaff_iptracking where acct_id = $id and tid4 IS NOT NULL AND tid4 <> '' and stamp " . $date_where .$tId4WhereCond. " group by tid4  order by v desc";
	$q_raw_visits_tid_combinations = "select COUNT(*) v,CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) n from idevaff_iptracking where acct_id = $id and CONCAT(tid1,tid2,tid3,tid4) IS NOT NULL AND CONCAT(tid1,tid2,tid3,tid4) <>'' and stamp " . $date_where .$combinationsWhereCond. " group by n  order by v desc";
	$q_raw_visits_src1 = "select COUNT(*) v,src1,src2 from idevaff_iptracking where acct_id = $id and src1 IS NOT NULL AND src1 <> '' and src2 IS NOT NULL AND src2 <> '' and stamp " . $date_where .$smartToolsWhereCond.$offerToolsWhereCond. " group by src1,src2  order by v desc";

	$q_unique_visits_country = "select COUNT(distinct(ip)) v,geo n from idevaff_iptracking where acct_id = $id  and stamp " . $date_where . " group by geo  order by v desc";
	$q_unique_visits_sub_id = "select COUNT(distinct(ip)) v,sub_id n from idevaff_iptracking where acct_id = $id and sub_id IS NOT NULL AND sub_id <> '' and stamp " . $date_where .$subIdWhereCond. " group by sub_id  order by v desc";
	$q_unique_visits_tid1 = "select COUNT(distinct(ip)) v,tid1 n from idevaff_iptracking where acct_id = $id and tid1 IS NOT NULL AND tid1 <> '' and stamp " . $date_where .$tId1WhereCond. " group by tid1  order by v desc";
	$q_unique_visits_tid2 = "select COUNT(distinct(ip)) v,tid2 n from idevaff_iptracking where acct_id = $id and tid2 IS NOT NULL AND tid2 <> '' and stamp " . $date_where .$tId2WhereCond. " group by tid2  order by v desc";
	$q_unique_visits_tid3 = "select COUNT(distinct(ip)) v,tid3 n from idevaff_iptracking where acct_id = $id and tid3 IS NOT NULL AND tid3 <> '' and stamp " . $date_where .$tId3WhereCond. " group by tid3  order by v desc";
	$q_unique_visits_tid4 = "select COUNT(distinct(ip)) v,tid4 n from idevaff_iptracking where acct_id = $id and tid4 IS NOT NULL AND tid4 <> '' and stamp " . $date_where .$tId4WhereCond. " group by tid4  order by v desc";
	$q_unique_visits_tid_combinations = "select COUNT(distinct(ip)) v,CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) n from idevaff_iptracking where acct_id = $id and CONCAT(tid1,tid2,tid3,tid4) IS NOT NULL AND CONCAT(tid1,tid2,tid3,tid4) <>'' and stamp " . $date_where .$combinationsWhereCond. " group by n  order by v desc";
	$q_unique_visits_src1= "select COUNT(distinct(ip)) v,src1,src2 from idevaff_iptracking where acct_id = $id and src1 IS NOT NULL AND src1 <> ''  and src2 IS NOT NULL AND src2 <> '' and stamp " . $date_where .$smartToolsWhereCond.$offerToolsWhereCond. " group by src1,src2  order by v desc";

	$q_earnings_country = "select COALESCE(SUM(payment),0)v,geo n from idevaff_sales where id = $id and approved=1 and top_tier_tag=0 and code " . $date_where . " group by geo  order by v desc";
	$q_earnings_sub_id = "select COALESCE(SUM(payment),0)v,sub_id n from idevaff_sales where id = $id and approved=1 and top_tier_tag=0 and sub_id IS NOT NULL AND sub_id <> '' and code " . $date_where .$subIdWhereCond. " group by sub_id  order by v desc";
	$q_earnings_tid1 = "select COALESCE(SUM(payment),0)v,tid1 n from idevaff_sales where id = $id and approved=1 and top_tier_tag=0 and tid1 IS NOT NULL AND tid1 <> '' and code " . $date_where .$tId1WhereCond. " group by tid1  order by v desc";
	$q_earnings_tid2 = "select COALESCE(SUM(payment),0)v,tid2 n from idevaff_sales where id = $id and approved=1 and top_tier_tag=0 and tid2 IS NOT NULL AND tid2 <> '' and code " . $date_where .$tId2WhereCond. " group by tid2  order by v desc";
	$q_earnings_tid3 = "select COALESCE(SUM(payment),0)v,tid3 n from idevaff_sales where id = $id and approved=1 and top_tier_tag=0 and tid3 IS NOT NULL AND tid3 <> '' and code " . $date_where .$tId3WhereCond. " group by tid3  order by v desc";
	$q_earnings_tid4 = "select COALESCE(SUM(payment),0)v,tid4 n from idevaff_sales where id = $id and approved=1 and top_tier_tag=0 and tid4 IS NOT NULL AND tid4 <> '' and code " . $date_where .$tId4WhereCond. " group by tid4  order by v desc";
	$q_earnings_tid_combinations = "select COALESCE(SUM(payment),0)v,CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) n from idevaff_sales where id = $id and CONCAT(tid1,tid2,tid3,tid4) IS NOT NULL AND CONCAT(tid1,tid2,tid3,tid4) <>'' and approved=1 and top_tier_tag=0 and code " . $date_where .$combinationsWhereCond. " group by n  order by v desc";
	$q_earnings_src1 = "select COALESCE(SUM(payment),0)v,src1,src2 from idevaff_sales where id = $id and approved=1 and top_tier_tag=0 and src1 IS NOT NULL AND src1 <> ''  and src2 IS NOT NULL AND src2 <> '' and code " . $date_where .$smartToolsWhereCond.$offerToolsWhereCond. " group by src1,src2 order by v desc";

	$q_paid_earnings_country = "select COALESCE(SUM(payment),0)v,geo n from idevaff_archive where id = $id and top_tier_tag=0 and code " . $date_where . " group by geo  order by v desc";
	$q_paid_earnings_sub_id = "select COALESCE(SUM(payment),0)v,sub_id n from idevaff_archive where id = $id and top_tier_tag=0 and sub_id IS NOT NULL AND sub_id <> '' and code " . $date_where .$subIdWhereCond. " group by sub_id  order by v desc";
	$q_paid_earnings_tid1 = "select COALESCE(SUM(payment),0)v,tid1 n from idevaff_archive where id = $id and top_tier_tag=0 and tid1 IS NOT NULL AND tid1 <> '' and code " . $date_where .$tId1WhereCond. " group by tid1  order by v desc";
	$q_paid_earnings_tid2 = "select COALESCE(SUM(payment),0)v,tid2 n from idevaff_archive where id = $id and top_tier_tag=0 and tid2 IS NOT NULL AND tid2 <> '' and code " . $date_where .$tId2WhereCond. " group by tid2  order by v desc";
	$q_paid_earnings_tid3 = "select COALESCE(SUM(payment),0)v,tid3 n from idevaff_archive where id = $id and top_tier_tag=0 and tid3 IS NOT NULL AND tid3 <> '' and code " . $date_where .$tId3WhereCond. " group by tid3  order by v desc";
	$q_paid_earnings_tid4 = "select COALESCE(SUM(payment),0)v,tid4 n from idevaff_archive where id = $id and top_tier_tag=0 and tid4 IS NOT NULL AND tid4 <> '' and code " . $date_where .$tId4WhereCond. " group by tid4  order by v desc";
	$q_paid_earnings_tid_combinations = "select COALESCE(SUM(payment),0)v,CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) n from idevaff_archive where id = $id and CONCAT(tid1,tid2,tid3,tid4) IS NOT NULL AND CONCAT(tid1,tid2,tid3,tid4) <>'' and top_tier_tag=0 and code " . $date_where .$combinationsWhereCond. " group by n  order by v desc";
	$q_paid_earnings_src1 = "select COALESCE(SUM(payment),0)v,src1,src2 from idevaff_archive where id = $id and top_tier_tag=0 and src1 IS NOT NULL AND src1 <> ''  and src2 IS NOT NULL AND src2 <> '' and code " . $date_where .$smartToolsWhereCond.$offerToolsWhereCond. " group by src1,src2  order by v desc";

	$q_approved_country = "select COUNT(*) v, geo n from idevaff_sales where approved=1 and id = $id and top_tier_tag=0 and code " . $date_where . " group by geo order by v desc";
	$q_paid_country = "select COUNT(*) v, geo n from idevaff_archive where id = $id and top_tier_tag=0 and code " . $date_where . " group by geo order by v desc";
	$q_approved_sub_id = "select COUNT(*) v, sub_id n from idevaff_sales where approved=1 and id = $id and sub_id IS NOT NULL AND sub_id <> ''  and top_tier_tag=0 and code " . $date_where .$subIdWhereCond. " group by sub_id order by v desc";
	$q_paid_sub_id = "select COUNT(*) v, sub_id n from idevaff_archive where id = $id and top_tier_tag=0  and sub_id IS NOT NULL AND sub_id <> '' and code " . $date_where .$subIdWhereCond. " group by sub_id order by v desc";
	$q_approved_tid1 = "select COUNT(*) v, tid1 n from idevaff_sales where approved=1 and id = $id and tid1 IS NOT NULL AND tid1 <> ''  and top_tier_tag=0 and code " . $date_where .$tId1WhereCond. " group by tid1 order by v desc";
	$q_paid_tid1 = "select COUNT(*) v, tid1 n from idevaff_archive where id = $id and top_tier_tag=0  and tid1 IS NOT NULL AND tid1 <> '' and code " . $date_where .$tId1WhereCond. " group by tid1 order by v desc";
	$q_approved_tid2 = "select COUNT(*) v, tid2 n from idevaff_sales where approved=1 and id = $id  and tid2 IS NOT NULL AND tid2 <> '' and top_tier_tag=0 and code " . $date_where .$tId2WhereCond. " group by tid2 order by v desc";
	$q_paid_tid2 = "select COUNT(*) v, tid2 n from idevaff_archive where id = $id and top_tier_tag=0  and tid2 IS NOT NULL AND tid2 <> '' and code " . $date_where .$tId2WhereCond. " group by tid2 order by v desc";
	$q_approved_tid3 = "select COUNT(*) v, tid3 n from idevaff_sales where approved=1 and id = $id  and tid3 IS NOT NULL AND tid3 <> '' and top_tier_tag=0 and code " . $date_where .$tId3WhereCond. " group by tid3 order by v desc";
	$q_paid_tid3 = "select COUNT(*) v, tid3 n from idevaff_archive where id = $id and top_tier_tag=0  and tid3 IS NOT NULL AND tid3 <> '' and code " . $date_where .$tId3WhereCond. " group by tid3 order by v desc";
	$q_approved_tid4 = "select COUNT(*) v, tid4 n from idevaff_sales where approved=1 and id = $id  and tid4 IS NOT NULL AND tid4 <> '' and top_tier_tag=0 and code " . $date_where .$tId4WhereCond. " group by tid4 order by v desc";
	$q_paid_tid4 = "select COUNT(*) v, tid4 n from idevaff_archive where id = $id and top_tier_tag=0  and tid4 IS NOT NULL AND tid4 <> '' and code " . $date_where .$tId4WhereCond. " group by tid4 order by v desc";
	$q_approved_tid_combinations = "select count(*) v,CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) n from idevaff_sales where id = $id and CONCAT(tid1,tid2,tid3,tid4) IS NOT NULL AND CONCAT(tid1,tid2,tid3,tid4) <>'' and approved=1 and top_tier_tag=0 and code " . $date_where .$combinationsWhereCond. " group by n  order by v desc";
	$q_paid_tid_combinations = "select count(*) v,CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) n from idevaff_archive where id = $id and CONCAT(tid1,tid2,tid3,tid4) IS NOT NULL AND CONCAT(tid1,tid2,tid3,tid4) <>'' and top_tier_tag=0 and code " . $date_where .$combinationsWhereCond. " group by n  order by v desc";
	$q_approved_src1 = "select COUNT(*) v, src1, src2 from idevaff_sales where approved=1 and id = $id  and src1 IS NOT NULL AND src1 <> '' and src2 IS NOT NULL AND src2 <> '' and top_tier_tag=0 and code " . $date_where .$smartToolsWhereCond.$offerToolsWhereCond. " group by src1,src2 order by v desc";
	$q_paid_src1 = "select COUNT(*) v, src1, src2 from idevaff_archive where id = $id and top_tier_tag=0  and src1 IS NOT NULL AND src1 <> '' and src2 IS NOT NULL AND src2 <> '' and code " . $date_where .$smartToolsWhereCond.$offerToolsWhereCond. " group by src1,src2 order by v desc";

	$transactions_country = [];
	$transactions_sub_id = [];
	$transactions_tid1 = [];
	$transactions_tid2 = [];
	$transactions_tid3 = [];
	$transactions_tid4 = [];
	$transactions_smart_tools=[];
	$transactions_offer_tools=[];
	$transactions_combinations = [];

	$raw_visits_country = [];
	$raw_visits_sub_id = [];
	$raw_visits_tid1 = [];
	$raw_visits_tid2 = [];
	$raw_visits_tid3 = [];
	$raw_visits_tid4 = [];
	$raw_visits_smart_tools=[];
	$raw_visits_offer_tools=[];
	$raw_visits_tid_combinations = [];

	$unique_visits_country = [];
	$unique_visits_sub_id = [];
	$unique_visits_tid1 = [];
	$unique_visits_tid2 = [];
	$unique_visits_tid3 = [];
	$unique_visits_tid4 = [];
	$unique_visits_smart_tools=[];
	$unique_visits_offer_tools=[];
	$unique_visits_combinations = [];

	$sales_ratio_country = [];
	$sales_ratio_sub_id = [];
	$sales_ratio_tid1 = [];
	$sales_ratio_tid2 = [];
	$sales_ratio_tid3 = [];
	$sales_ratio_tid4 = [];
	$sales_ratio_smart_tools=[];
	$sales_ratio_offer_tools=[];
	$sales_ratio_combinations = [];

	$earnings_country = [];
	$earnings_sub_id = [];
	$earnings_tid1 = [];
	$earnings_tid2 = [];
	$earnings_tid3 = [];
	$earnings_tid4 = [];
	$earnings_smart_tools=[];
	$earnings_offer_tools=[];
	$earnings_combinations = [];

	$epc_country = [];
	$epc_sub_id = [];
	$epc_tid1 = [];
	$epc_tid2 = [];
	$epc_tid3 = [];
	$epc_tid4 = [];
	$epc_smart_tools=[];
	$epc_offer_tools=[];
	$epc_combinations = [];

	$raw_visits_total_country = [];
	$raw_visits_total_sub_id = [];
	$raw_visits_total_tid1 = [];
	$raw_visits_total_tid2 = [];
	$raw_visits_total_tid3 = [];
	$raw_visits_total_tid4 = [];
	$raw_visits_total_smart_tools=[];
	$raw_visits_total_offer_tools=[];
	$raw_visits_total_tid_combinations = [];

	$unique_visits_total_country = [];
	$unique_visits_total_sub_id = [];
	$unique_visits_total_tid1 = [];
	$unique_visits_total_tid2 = [];
	$unique_visits_total_tid3 = [];
	$unique_visits_total_tid4 = [];
	$unique_visits_total_smart_tools=[];
	$unique_visits_total_offer_tools=[];
	$unique_visits_total_tid_combinations = [];

	$transactions_total_country = [];
	$transactions_total_sub_id = [];
	$transactions_total_tid1 = [];
	$transactions_total_tid2 = [];
	$transactions_total_tid3 = [];
	$transactions_total_tid4 = [];
	$transactions_total_smart_tools=[];
	$transactions_total_offer_tools=[];
	$transactions_total_tid_combinations = [];

	$sales_ratio_total_country = [];
	$sales_ratio_total_sub_id = [];
	$sales_ratio_total_tid1 = [];
	$sales_ratio_total_tid2 = [];
	$sales_ratio_total_tid3 = [];
	$sales_ratio_total_tid4 = [];
	$sales_ratio_total_smart_tools=[];
	$sales_ratio_total_offer_tools=[];
	$sales_ratio_total_tid_combinations = [];

	$earnings_total_country = [];
	$earnings_total_sub_id = [];
	$earnings_total_tid1 = [];
	$earnings_total_tid2 = [];
	$earnings_total_tid3 = [];
	$earnings_total_tid4 = [];
	$earnings_total_smart_tools=[];
	$earnings_total_offer_tools=[];
	$earnings_total_tid_combinations = [];

	$epc_total_country = [];
	$epc_total_sub_id = [];
	$epc_total_tid1 = [];
	$epc_total_tid2 = [];
	$epc_total_tid3 = [];
	$epc_total_tid4 = [];
	$epc_total_smart_tools=[];
	$epc_total_offer_tools=[];
	$epc_total_tid_combinations = [];
    if ($info === 'transactions' || $info === 'transactions_total' || $info === 'sales_ratio' || $info === 'sales_ratio_total') {
        // Country
        foreach ($db->query($q_paid_country) as $row) {
            array_push($transactions_country, [
                "n" => $row["n"],
                "v" => $row["v"]
            ]);
        }
        foreach ($db->query($q_approved_country) as $row) {

            $index = array_search($row["n"], array_column($transactions_country, "n"));
            if ($index !== false) {
                /*if (array_search($index = $row["n"], $transactions_country)) {*/
                $transactions_country[$index]["v"] += $row["v"];
            } else {
                array_push($transactions_country, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }

        // sub_id
        foreach ($db->query($q_paid_sub_id) as $row) {
            array_push($transactions_sub_id, [
                "n" => $row["n"],
                "v" => $row["v"]
            ]);
        }
        foreach ($db->query($q_approved_sub_id) as $row) {

            $index = array_search($row["n"], array_column($transactions_sub_id, "n"));
            if ($index !== false) {
                /*if (array_search($index = $row["n"], $transactions_tid1)) {*/
                $transactions_sub_id[$index]["v"] += $row["v"];
            } else {
                array_push($transactions_sub_id, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        // Tid 1
        foreach ($db->query($q_paid_tid1) as $row) {
            array_push($transactions_tid1, [
                "n" => $row["n"],
                "v" => $row["v"]
            ]);
        }
        foreach ($db->query($q_approved_tid1) as $row) {

            $index = array_search($row["n"], array_column($transactions_tid1, "n"));
            if ($index !== false) {
                /*if (array_search($index = $row["n"], $transactions_tid1)) {*/
                $transactions_tid1[$index]["v"] += $row["v"];
            } else {
                array_push($transactions_tid1, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }

        // Tid 2
        foreach ($db->query($q_paid_tid2) as $row) {
            array_push($transactions_tid2, [
                "n" => $row["n"],
                "v" => $row["v"]
            ]);
        }
        foreach ($db->query($q_approved_tid2) as $row) {

            $index = array_search($row["n"], array_column($transactions_tid2, "n"));
            if ($index !== false) {
                /*if (array_search($index = $row["n"], $transactions_tid2)) {*/
                $transactions_tid2[$index]["v"] += $row["v"];
            } else {
                array_push($transactions_tid2, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }

        // Tid 3
        foreach ($db->query($q_paid_tid3) as $row) {
            array_push($transactions_tid3, [
                "n" => $row["n"],
                "v" => $row["v"]
            ]);
        }
        foreach ($db->query($q_approved_tid3) as $row) {

            $index = array_search($row["n"], array_column($transactions_tid3, "n"));
            if ($index !== false) {
                /*if (array_search($index = $row["n"], $transactions_tid3)) {*/
                $transactions_tid3[$index]["v"] += $row["v"];
            } else {
                array_push($transactions_tid3, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }

        // Tid 4
        foreach ($db->query($q_paid_tid4) as $row) {
            array_push($transactions_tid4, [
                "n" => $row["n"],
                "v" => $row["v"]
            ]);
        }
        foreach ($db->query($q_approved_tid4) as $row) {

            $index = array_search($row["n"], array_column($transactions_tid4, "n"));
            if ($index !== false) {
                /*if (array_search($index = $row["n"], $transactions_tid4)) {*/
                $transactions_tid4[$index]["v"] += $row["v"];
            } else {
                array_push($transactions_tid4, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        // Tid 4
        foreach ($db->query($q_paid_src1) as $uv) {
            $src1=$uv['src1'];
            $src2=$uv['src2'];
            $smart_tool=[];
            $smart_tool['src1'] = $src1;
            $smart_tool['src2'] = $src2;
            if($src1 == 1){
                $banner_query = "SELECT t1.`number`,t1.`grp`,t1.`size1`,t1.`size2`,t1.`description`,t1.`language`,t2.name FROM idevaff_banners t1 LEFT JOIN idevaff_groups t2 ON t1.grp = t2.id WHERE t1.number = $src2 and t1.grp = t2.id";
                $banner_results = $db->query($banner_query)->fetchAll(PDO::FETCH_ASSOC);
                foreach($banner_results as $banner_result) {
                    $smart_tool['v'] = $uv['v'];
                    $smart_tool['n'] = $banner_result['name']." ".$banner_result['description']." ".$banner_result['language']." ".$banner_result['size1']."x".$banner_result['size2'];
                    $transactions_offer_tools[]=$smart_tool;
                }
            }
            if($src1 == 3){
                $link_query = "SELECT t1.`id`,t1.`grp`,t1.`linktext`,t1.`land`,t2.name FROM idevaff_links t1 LEFT JOIN idevaff_groups t2 ON t1.grp = t2.id WHERE t1.id = $src2 and t1.grp = t2.id";
                $link_results = $db->query($link_query)->fetchAll(PDO::FETCH_ASSOC);
                foreach($link_results as $link_result) {
                    if($link_result['land'] == 1){
                        $land = "Landing";
                    }
                    else{
                        $land = "Pre-landing";
                    }
                    $smart_tool['v'] = $uv['v'];
                    if (strpos($link_result['name'], 'SmartLink') !== false) {
                        $name1=explode(" ",$link_result['name'],2);
                        if (strpos($name1[0], '.') !== false) {
                            $name=$name1[1];
                        }
                        else{
                            $name=$link_result['name'];
                        }
                        $smart_tool['n'] = $name;
                        $transactions_smart_tools[]=$smart_tool;
                    }
                    else{
                        $smart_tool['n'] = $link_result['name']." ".$link_result['linktext']." ".$land;
                        $transactions_offer_tools[]=$smart_tool;
                    }
                }
            }
            if($src1 == 4){
                $html_query = "SELECT name FROM idevaff_htmlads WHERE id = $src2";
                $html_results = $db->query($html_query)->fetchAll(PDO::FETCH_ASSOC);
                foreach($html_results as $html_result) {
                    $smart_tool['v'] = $uv['v'];
                    $smart_tool['n'] = $html_result['name'];
                    $transactions_smart_tools[]=$smart_tool;
                }
            }
            if($src1 == 5){
                $html_query = "SELECT name FROM idevaff_email_templates WHERE id = $src2";
                $html_results = $db->query($html_query)->fetchAll(PDO::FETCH_ASSOC);
                foreach($html_results as $html_result) {
                    $smart_tool['v'] = $uv['v'];
                    $smart_tool['n'] = $html_result['name'];
                    $transactions_smart_tools[]=$smart_tool;
                }
            }

        }
        foreach ($db->query($q_approved_src1) as $uv) {
            $src1=$uv['src1'];
            $src2=$uv['src2'];
            $smart_tool=[];
            $smart_tool['src1'] = $src1;
            $smart_tool['src2'] = $src2;
            if($src1 == 1){
                $banner_query = "SELECT t1.`number`,t1.`grp`,t1.`size1`,t1.`size2`,t1.`description`,t1.`language`,t2.name FROM idevaff_banners t1 LEFT JOIN idevaff_groups t2 ON t1.grp = t2.id WHERE t1.number = $src2 and t1.grp = t2.id";
                $banner_results = $db->query($banner_query)->fetchAll(PDO::FETCH_ASSOC);
                foreach($banner_results as $banner_result) {
                    $smart_tool['v'] = $uv['v'];
                    $smart_tool['n'] = $banner_result['name']." ".$banner_result['description']." ".$banner_result['language']." ".$banner_result['size1']."x".$banner_result['size2'];
                    $index = array_search($smart_tool["n"], array_column($transactions_offer_tools, "n"));
                    if ($index !== false) {
                        $transactions_offer_tools[$index]["v"] += $smart_tool["v"];
                    } else {
                        $transactions_offer_tools[]=$smart_tool;
                    }
                }
            }
            if($src1 == 3){
                $link_query = "SELECT t1.`id`,t1.`grp`,t1.`linktext`,t1.`land`,t2.name FROM idevaff_links t1 LEFT JOIN idevaff_groups t2 ON t1.grp = t2.id WHERE t1.id = $src2 and t1.grp = t2.id";
                $link_results = $db->query($link_query)->fetchAll(PDO::FETCH_ASSOC);
                foreach($link_results as $link_result) {
                    if($link_result['land'] == 1){
                        $land = "Landing";
                    }
                    else{
                        $land = "Pre-landing";
                    }
                    $smart_tool['v'] = $uv['v'];
                    if (strpos($link_result['name'], 'SmartLink') !== false) {
                        $name1=explode(" ",$link_result['name'],2);
                        if (strpos($name1[0], '.') !== false) {
                            $name=$name1[1];
                        }
                        else{
                            $name=$link_result['name'];
                        }
                        $smart_tool['n'] = $name;

                        $index = array_search($smart_tool["n"], array_column($transactions_smart_tools, "n"));
                        if ($index !== false) {
                            $transactions_smart_tools[$index]["v"] += $smart_tool["v"];
                        } else {
                            $transactions_smart_tools[]=$smart_tool;
                        }
                    }
                    else{
                        $smart_tool['n'] = $link_result['name']." ".$link_result['linktext']." ".$land;
                        $index = array_search($smart_tool["n"], array_column($transactions_offer_tools, "n"));
                        if ($index !== false) {
                            $transactions_offer_tools[$index]["v"] += $smart_tool["v"];
                        } else {
                            $transactions_offer_tools[]=$smart_tool;
                        }
                    }
                }
            }
            if($src1 == 4){
                $html_query = "SELECT name FROM idevaff_htmlads WHERE id = $src2";
                $html_results = $db->query($html_query)->fetchAll(PDO::FETCH_ASSOC);
                foreach($html_results as $html_result) {
                    $smart_tool['v'] = $uv['v'];
                    $smart_tool['n'] = $html_result['name'];

                    $index = array_search($smart_tool["n"], array_column($transactions_smart_tools, "n"));
                    if ($index !== false) {
                        $transactions_smart_tools[$index]["v"] += $smart_tool["v"];
                    } else {
                        $transactions_smart_tools[]=$smart_tool;
                    }
                }
            }
            if($src1 == 5){
                $html_query = "SELECT name FROM idevaff_email_templates WHERE id = $src2";
                $html_results = $db->query($html_query)->fetchAll(PDO::FETCH_ASSOC);
                foreach($html_results as $html_result) {
                    $smart_tool['v'] = $uv['v'];
                    $smart_tool['n'] = $html_result['name'];
                    $index = array_search($smart_tool["n"], array_column($transactions_smart_tools, "n"));
                    if ($index !== false) {
                        $transactions_smart_tools[$index]["v"] += $smart_tool["v"];
                    } else {
                        $transactions_smart_tools[]=$smart_tool;
                    }
                }
            }

        }

        // Combinations
        foreach ($db->query($q_approved_tid_combinations) as $row) {

            array_push($transactions_combinations, [
                "n" => $row["n"],
                "v" => $row["v"]
            ]);
        }
        foreach ($db->query($q_paid_tid_combinations) as $row) {
            $index = array_search($row["n"], array_column($transactions_combinations, "n"));
            if ($index !== false) {
                /*if ($index = array_search($row["n"], array_column($transactions_combinations, 'n'))) {*/
                $transactions_combinations[$index]["v"] += $row["v"];
            } else {
                array_push($transactions_combinations, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
    }

    if ($info === 'raw_visits' || $info == 'raw_visits_total' || $info === 'sales_ratio' || $info === 'sales_ratio_total' || $info=='epc' || $info == 'epc_total') {
        $raw_visits_country = $db->query($q_raw_visits_country)->fetchAll(PDO::FETCH_ASSOC);
        $raw_visits_sub_id = $db->query($q_raw_visits_sub_id)->fetchAll(PDO::FETCH_ASSOC);
        $raw_visits_tid1 = $db->query($q_raw_visits_tid1)->fetchAll(PDO::FETCH_ASSOC);
        $raw_visits_tid2 = $db->query($q_raw_visits_tid2)->fetchAll(PDO::FETCH_ASSOC);
        $raw_visits_tid3 = $db->query($q_raw_visits_tid3)->fetchAll(PDO::FETCH_ASSOC);
        $raw_visits_tid4 = $db->query($q_raw_visits_tid4)->fetchAll(PDO::FETCH_ASSOC);
        $raw_visits_src1 = $db->query($q_raw_visits_src1)->fetchAll(PDO::FETCH_ASSOC);
        $raw_visits_tid_combinations = $db->query($q_raw_visits_tid_combinations)->fetchAll(PDO::FETCH_ASSOC);
        foreach ( $raw_visits_src1 as $uv ) {
            $src1               = $uv['src1'];
            $src2               = $uv['src2'];
            $smart_tool         = [];
            $smart_tool['src1'] = $src1;
            $smart_tool['src2'] = $src2;
            if ( $src1 == 1 ) {
                $banner_query   = "SELECT t1.`number`,t1.`grp`,t1.`size1`,t1.`size2`,t1.`description`,t1.`language`,t2.name FROM idevaff_banners t1 LEFT JOIN idevaff_groups t2 ON t1.grp = t2.id WHERE t1.number = $src2 and t1.grp = t2.id";
                $banner_results = $db->query( $banner_query )->fetchAll( PDO::FETCH_ASSOC );
                foreach ( $banner_results as $banner_result ) {
                    $smart_tool['v']          = $uv['v'];
                    $smart_tool['n']          = $banner_result['name'] . " " . $banner_result['description'] . " " . $banner_result['language'] . " " . $banner_result['size1'] . "x" . $banner_result['size2'];
                    $raw_visits_offer_tools[] = $smart_tool;
                }
            }
            if ( $src1 == 3 ) {
                $link_query   = "SELECT t1.`id`,t1.`grp`,t1.`linktext`,t1.`land`,t2.name FROM idevaff_links t1 LEFT JOIN idevaff_groups t2 ON t1.grp = t2.id WHERE t1.id = $src2 and t1.grp = t2.id";
                $link_results = $db->query( $link_query )->fetchAll( PDO::FETCH_ASSOC );
                foreach ( $link_results as $link_result ) {
                    if ( $link_result['land'] == 1 ) {
                        $land = "Landing";
                    } else {
                        $land = "Pre-landing";
                    }
                    $smart_tool['v'] = $uv['v'];
                    if ( strpos( $link_result['name'], 'SmartLink' ) !== false ) {
                        $name1 = explode( " ", $link_result['name'], 2 );
                        if ( strpos( $name1[0], '.' ) !== false ) {
                            $name = $name1[1];
                        } else {
                            $name = $link_result['name'];
                        }
                        $smart_tool['n']          = $name;
                        $raw_visits_smart_tools[] = $smart_tool;
                    } else {
                        $smart_tool['n']          = $link_result['name'] . " " . $link_result['linktext'] . " " . $land;
                        $raw_visits_offer_tools[] = $smart_tool;
                    }
                }
            }
            if ( $src1 == 4 ) {
                $html_query   = "SELECT name FROM idevaff_htmlads WHERE id = $src2";
                $html_results = $db->query( $html_query )->fetchAll( PDO::FETCH_ASSOC );
                foreach ( $html_results as $html_result ) {
                    $smart_tool['v']          = $uv['v'];
                    $smart_tool['n']          = $html_result['name'];
                    $raw_visits_smart_tools[] = $smart_tool;
                }
            }
            if ( $src1 == 5 ) {
                $html_query   = "SELECT name FROM idevaff_email_templates WHERE id = $src2";
                $html_results = $db->query( $html_query )->fetchAll( PDO::FETCH_ASSOC );
                foreach ( $html_results as $html_result ) {
                    $smart_tool['v']          = $uv['v'];
                    $smart_tool['n']          = $html_result['name'];
                    $raw_visits_smart_tools[] = $smart_tool;
                }
            }
        }
        if($info === 'sales_ratio' || $info === 'sales_ratio_total') {

            // unique_visits_smart_tools
            foreach ( $raw_visits_smart_tools as $row ) {
                foreach ( $transactions_smart_tools as $row_ ) {
                    if ( $row["n"] === $row_["n"] ) {
                        // If unique traffic 0
                        if ( $row["v"] == 0 ) {
                            array_push( $sales_ratio_smart_tools, [
                                "n" => $row["n"],
                                "src1" => $row["src1"],
                                "src2" => $row["src2"],
                                "v" => 0 . "%"
                            ] );
                        } else {
                            $sales_ratio = $row_["v"] / $row["v"] * 100;
                            array_push( $sales_ratio_smart_tools, [
                                "n" => $row["n"],
                                "src1" => $row["src1"],
                                "src2" => $row["src2"],
                                "v" => round( $sales_ratio, 3 ) . "%"
                            ] );
                        }
                        break;
                    }
                }
            }
            // unique_visits_offer_tools
            foreach ( $raw_visits_offer_tools as $row ) {
                foreach ( $transactions_offer_tools as $row_ ) {
                    if ( $row["n"] === $row_["n"] ) {
                        // If unique traffic 0
                        if ( $row["v"] == 0 ) {
                            array_push( $sales_ratio_offer_tools, [
                                "n" => $row["n"],
                                "src1" => $row["src1"],
                                "src2" => $row["src2"],
                                "v" => 0 . "%"
                            ] );
                        } else {
                            $sales_ratio = $row_["v"] / $row["v"] * 100;
                            array_push( $sales_ratio_offer_tools, [
                                "n" => $row["n"],
                                "src1" => $row["src1"],
                                "src2" => $row["src2"],
                                "v" => round( $sales_ratio, 3 ) . "%"
                            ] );
                        }
                        break;
                    }
                }
            }

            // unique_visits_country
            foreach ( $raw_visits_country as $row ) {
                foreach ( $transactions_country as $row_ ) {
                    if ( $row["n"] === $row_["n"] ) {
                        // If unique traffic 0
                        if ( $row["v"] == 0 ) {
                            array_push( $sales_ratio_country, [
                                "n" => $row["n"],
                                "v" => 0 . "%"
                            ] );
                        } else {
                            $sales_ratio = $row_["v"] / $row["v"] * 100;
                            array_push( $sales_ratio_country, [
                                "n" => $row["n"],
                                "v" => round( $sales_ratio, 3 ) . "%"
                            ] );
                        }
                        break;
                    }
                }
            }

            // unique_visits_sub_id
            foreach ( $raw_visits_sub_id as $row ) {
                foreach ( $transactions_sub_id as $row_ ) {
                    if ( $row["n"] === $row_["n"] ) {
                        // If unique traffic 0
                        if ( $row["v"] == 0 ) {
                            array_push( $sales_ratio_sub_id, [
                                "n" => $row["n"],
                                "v" => 0 . "%"
                            ] );
                        } else {
                            $sales_ratio = $row_["v"] / $row["v"] * 100;
                            array_push( $sales_ratio_sub_id, [
                                "n" => $row["n"],
                                "v" => round( $sales_ratio, 3 ) . "%"
                            ] );
                        }
                        break;
                    }
                }
            }

            // unique_visits_tid1
            foreach ( $raw_visits_tid1 as $row ) {
                foreach ( $transactions_tid1 as $row_ ) {
                    if ( $row["n"] === $row_["n"] ) {
                        // If unique traffic 0
                        if ( $row["v"] == 0 ) {
                            array_push( $sales_ratio_tid1, [
                                "n" => $row["n"],
                                "v" => 0 . "%"
                            ] );
                        } else {
                            $sales_ratio = $row_["v"] / $row["v"] * 100;
                            array_push( $sales_ratio_tid1, [
                                "n" => $row["n"],
                                "v" => round( $sales_ratio, 3 ) . "%"
                            ] );
                        }
                        break;
                    }
                }
            }

            // unique_visits_tid2
            foreach ( $raw_visits_tid2 as $row ) {
                foreach ( $transactions_tid2 as $row_ ) {
                    if ( $row["n"] === $row_["n"] ) {
                        // If unique traffic 0
                        if ( $row["v"] == 0 ) {
                            array_push( $sales_ratio_tid2, [
                                "n" => $row["n"],
                                "v" => 0 . "%"
                            ] );
                        } else {
                            $sales_ratio = $row_["v"] / $row["v"] * 100;
                            array_push( $sales_ratio_tid2, [
                                "n" => $row["n"],
                                "v" => round( $sales_ratio, 3 ) . "%"
                            ] );
                        }
                        break;
                    }
                }
            }

            // unique_visits_tid3
            foreach ( $raw_visits_tid3 as $row ) {
                foreach ( $transactions_tid3 as $row_ ) {
                    if ( $row["n"] === $row_["n"] ) {
                        // If unique traffic 0
                        if ( $row["v"] == 0 ) {
                            array_push( $sales_ratio_tid3, [
                                "n" => $row["n"],
                                "v" => 0 . "%"
                            ] );
                        } else {
                            $sales_ratio = $row_["v"] / $row["v"] * 100;
                            array_push( $sales_ratio_tid3, [
                                "n" => $row["n"],
                                "v" => round( $sales_ratio, 3 ) . "%"
                            ] );
                        }
                        break;
                    }
                }
            }

            // unique_visits_tid4
            foreach ( $raw_visits_tid4 as $row ) {
                foreach ( $transactions_tid4 as $row_ ) {
                    if ( $row["n"] === $row_["n"] ) {
                        // If unique traffic 0
                        if ( $row["v"] == 0 ) {
                            array_push( $sales_ratio_tid4, [
                                "n" => $row["n"],
                                "v" => 0 . "%"
                            ] );
                        } else {
                            $sales_ratio = $row_["v"] / $row["v"] * 100;
                            array_push( $sales_ratio_tid4, [
                                "n" => $row["n"],
                                "v" => round( $sales_ratio, 3 ) . "%"
                            ] );
                        }
                        break;
                    }
                }
            }

            // unique_visits_combinations
            foreach ( $raw_visits_tid_combinations as $row ) {
                foreach ( $transactions_combinations as $row_ ) {
                    if ( $row["n"] === $row_["n"] ) {
                        // If unique traffic 0
                        if ( $row["v"] == 0 ) {
                            array_push( $sales_ratio_combinations, [
                                "n" => $row["n"],
                                "v" => 0 . "%"
                            ] );
                        } else {
                            $sales_ratio = $row_["v"] / $row["v"] * 100;
                            array_push( $sales_ratio_combinations, [
                                "n" => $row["n"],
                                "v" => round( $sales_ratio, 3 ) . "%"
                            ] );
                        }
                        break;
                    }
                }
            }

            usort( $sales_ratio_smart_tools, function ( $a, $b ) {
                return $b['v'] > $a['v'] ? 1 : - 1;
            } );

            usort( $sales_ratio_offer_tools, function ( $a, $b ) {
                return $b['v'] > $a['v'] ? 1 : - 1;
            } );
            usort( $sales_ratio_country, function ( $a, $b ) {
                return $b['v'] > $a['v'] ? 1 : - 1;
            } );

            usort( $sales_ratio_sub_id, function ( $a, $b ) {
                return $b['v'] > $a['v'] ? 1 : - 1;
            } );
            usort( $sales_ratio_tid1, function ( $a, $b ) {
                return $b['v'] > $a['v'] ? 1 : - 1;
            } );

            usort( $sales_ratio_tid2, function ( $a, $b ) {
                return $b['v'] > $a['v'] ? 1 : - 1;
            } );

            usort( $sales_ratio_tid3, function ( $a, $b ) {
                return $b['v'] > $a['v'] ? 1 : - 1;
            } );

            usort( $sales_ratio_tid4, function ( $a, $b ) {
                return $b['v'] > $a['v'] ? 1 : - 1;
            } );

            usort( $sales_ratio_combinations, function ( $a, $b ) {
                return $b['v'] > $a['v'] ? 1 : - 1;
            } );
        }

    }

    if ($info === 'unique_visits' || $info === 'unique_visits_total' ) {
        $unique_visits_country = $db->query($q_unique_visits_country)->fetchAll(PDO::FETCH_ASSOC);
        $unique_visits_sub_id = $db->query($q_unique_visits_sub_id)->fetchAll(PDO::FETCH_ASSOC);
        $unique_visits_tid1 = $db->query($q_unique_visits_tid1)->fetchAll(PDO::FETCH_ASSOC);
        $unique_visits_tid2 = $db->query($q_unique_visits_tid2)->fetchAll(PDO::FETCH_ASSOC);
        $unique_visits_tid3 = $db->query($q_unique_visits_tid3)->fetchAll(PDO::FETCH_ASSOC);
        $unique_visits_tid4 = $db->query($q_unique_visits_tid4)->fetchAll(PDO::FETCH_ASSOC);
        $unique_visits_src1 = $db->query($q_unique_visits_src1)->fetchAll(PDO::FETCH_ASSOC);
        $unique_visits_combinations = $db->query($q_unique_visits_tid_combinations)->fetchAll(PDO::FETCH_ASSOC);

        foreach($unique_visits_src1 as $uv){
            $src1=$uv['src1'];
            $src2=$uv['src2'];
            $smart_tool=[];
            $smart_tool['src1'] = $src1;
            $smart_tool['src2'] = $src2;
            if($src1 == 1){
                $banner_query = "SELECT t1.`number`,t1.`grp`,t1.`size1`,t1.`size2`,t1.`description`,t1.`language`,t2.name FROM idevaff_banners t1 LEFT JOIN idevaff_groups t2 ON t1.grp = t2.id WHERE t1.number = $src2 and t1.grp = t2.id";
                $banner_results = $db->query($banner_query)->fetchAll(PDO::FETCH_ASSOC);
                foreach($banner_results as $banner_result) {
                    $smart_tool['v'] = $uv['v'];
                    $smart_tool['n'] = $banner_result['name']." ".$banner_result['description']." ".$banner_result['language']." ".$banner_result['size1']."x".$banner_result['size2'];
                    $unique_visits_offer_tools[]=$smart_tool;
                }
            }
            if($src1 == 3){
                $link_query = "SELECT t1.`id`,t1.`grp`,t1.`linktext`,t1.`land`,t2.name FROM idevaff_links t1 LEFT JOIN idevaff_groups t2 ON t1.grp = t2.id WHERE t1.id = $src2 and t1.grp = t2.id";
                $link_results = $db->query($link_query)->fetchAll(PDO::FETCH_ASSOC);
                foreach($link_results as $link_result) {
                    if($link_result['land'] == 1){
                        $land = "Landing";
                    }
                    else{
                        $land = "Pre-landing";
                    }
                    $smart_tool['v'] = $uv['v'];
                    if (strpos($link_result['name'], 'SmartLink') !== false) {
                        $name1=explode(" ",$link_result['name'],2);
                        if (strpos($name1[0], '.') !== false) {
                            $name=$name1[1];
                        }
                        else{
                            $name=$link_result['name'];
                        }
                        $smart_tool['n'] = $name;
                        $unique_visits_smart_tools[]=$smart_tool;
                    }
                    else{
                        $smart_tool['n'] = $link_result['name']." ".$link_result['linktext']." ".$land;
                        $unique_visits_offer_tools[]=$smart_tool;
                    }
                }
            }
            if($src1 == 4){
                $html_query = "SELECT name FROM idevaff_htmlads WHERE id = $src2";
                $html_results = $db->query($html_query)->fetchAll(PDO::FETCH_ASSOC);
                foreach($html_results as $html_result) {
                    $smart_tool['v'] = $uv['v'];
                    $smart_tool['n'] = $html_result['name'];
                    $unique_visits_smart_tools[]=$smart_tool;
                }
            }
            if($src1 == 5){
                $html_query = "SELECT name FROM idevaff_email_templates WHERE id = $src2";
                $html_results = $db->query($html_query)->fetchAll(PDO::FETCH_ASSOC);
                foreach($html_results as $html_result) {
                    $smart_tool['v'] = $uv['v'];
                    $smart_tool['n'] = $html_result['name'];
                    $unique_visits_smart_tools[]=$smart_tool;
                }
            }
        }

    }

    if ($info === "earnings" || $info === 'earnings_total' || $info === 'epc' || $info === 'epc_total') {
        foreach ($db->query($q_earnings_country) as $row) {
            array_push($earnings_country, [
                "n" => str_replace(" ", "", $row["n"]),
                "v" => $row["v"]
            ]);
        }

        foreach ($db->query($q_paid_earnings_country) as $row) {

            $index = array_search($row["n"], array_column($earnings_country, "n"));
            if ($index !== false) {
                /*if (array_search($index = $row["n"], $earnings_country)) {*/
                $earnings_country[$index]["v"] += $row["v"];
            } else {
                array_push($earnings_country, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($db->query($q_earnings_src1) as $uv) {
            $src1=$uv['src1'];
            $src2=$uv['src2'];
            $smart_tool=[];
            $smart_tool['src1'] = $src1;
            $smart_tool['src2'] = $src2;
            if($src1 == 1){
                $banner_query = "SELECT t1.`number`,t1.`grp`,t1.`size1`,t1.`size2`,t1.`description`,t1.`language`,t2.name FROM idevaff_banners t1 LEFT JOIN idevaff_groups t2 ON t1.grp = t2.id WHERE t1.number = $src2 and t1.grp = t2.id";
                $banner_results = $db->query($banner_query)->fetchAll(PDO::FETCH_ASSOC);
                foreach($banner_results as $banner_result) {
                    $smart_tool['v'] = $uv['v'];
                    $smart_tool['n'] = $banner_result['name']." ".$banner_result['description']." ".$banner_result['language']." ".$banner_result['size1']."x".$banner_result['size2'];
                    $earnings_offer_tools[]=$smart_tool;
                }
            }
            if($src1 == 3){
                $link_query = "SELECT t1.`id`,t1.`grp`,t1.`linktext`,t1.`land`,t2.name FROM idevaff_links t1 LEFT JOIN idevaff_groups t2 ON t1.grp = t2.id WHERE t1.id = $src2 and t1.grp = t2.id";
                $link_results = $db->query($link_query)->fetchAll(PDO::FETCH_ASSOC);
                foreach($link_results as $link_result) {
                    if($link_result['land'] == 1){
                        $land = "Landing";
                    }
                    else{
                        $land = "Pre-landing";
                    }
                    $smart_tool['v'] = $uv['v'];
                    if (strpos($link_result['name'], 'SmartLink') !== false) {
                        $name1=explode(" ",$link_result['name'],2);
                        if (strpos($name1[0], '.') !== false) {
                            $name=$name1[1];
                        }
                        else{
                            $name=$link_result['name'];
                        }
                        $smart_tool['n'] = $name;
                        $earnings_smart_tools[]=$smart_tool;
                    }
                    else{
                        $smart_tool['n'] = $link_result['name']." ".$link_result['linktext']." ".$land;
                        $earnings_offer_tools[]=$smart_tool;
                    }
                }
            }
            if($src1 == 4){
                $html_query = "SELECT name FROM idevaff_htmlads WHERE id = $src2";
                $html_results = $db->query($html_query)->fetchAll(PDO::FETCH_ASSOC);
                foreach($html_results as $html_result) {
                    $smart_tool['v'] = $uv['v'];
                    $smart_tool['n'] = $html_result['name'];
                    $earnings_smart_tools[]=$smart_tool;
                }
            }
            if($src1 == 5){
                $html_query = "SELECT name FROM idevaff_email_templates WHERE id = $src2";
                $html_results = $db->query($html_query)->fetchAll(PDO::FETCH_ASSOC);
                foreach($html_results as $html_result) {
                    $smart_tool['v'] = $uv['v'];
                    $smart_tool['n'] = $html_result['name'];
                    $earnings_smart_tools[]=$smart_tool;
                }
            }
        }

        foreach ($db->query($q_paid_earnings_src1) as $uv) {
            $src1=$uv['src1'];
            $src2=$uv['src2'];
            $smart_tool=[];
            $smart_tool['src1'] = $src1;
            $smart_tool['src2'] = $src2;
            if($src1 == 1){
                $banner_query = "SELECT t1.`number`,t1.`grp`,t1.`size1`,t1.`size2`,t1.`description`,t1.`language`,t2.name FROM idevaff_banners t1 LEFT JOIN idevaff_groups t2 ON t1.grp = t2.id WHERE t1.number = $src2 and t1.grp = t2.id";
                $banner_results = $db->query($banner_query)->fetchAll(PDO::FETCH_ASSOC);
                foreach($banner_results as $banner_result) {
                    $smart_tool['v'] = $uv['v'];
                    $smart_tool['n'] = $banner_result['name']." ".$banner_result['description']." ".$banner_result['language']." ".$banner_result['size1']."x".$banner_result['size2'];

                    $index = array_search($smart_tool["n"], array_column($earnings_offer_tools, "n"));
                    if ($index !== false) {
                        $earnings_offer_tools[$index]["v"] += $smart_tool["v"];
                    } else {
                        $earnings_offer_tools[]=$smart_tool;
                    }
                }
            }
            if($src1 == 3){
                $link_query = "SELECT t1.`id`,t1.`grp`,t1.`linktext`,t1.`land`,t2.name FROM idevaff_links t1 LEFT JOIN idevaff_groups t2 ON t1.grp = t2.id WHERE t1.id = $src2 and t1.grp = t2.id";
                $link_results = $db->query($link_query)->fetchAll(PDO::FETCH_ASSOC);
                foreach($link_results as $link_result) {
                    if($link_result['land'] == 1){
                        $land = "Landing";
                    }
                    else{
                        $land = "Pre-landing";
                    }
                    $smart_tool['v'] = $uv['v'];
                    if (strpos($link_result['name'], 'SmartLink') !== false) {
                        $name1=explode(" ",$link_result['name'],2);
                        if (strpos($name1[0], '.') !== false) {
                            $name=$name1[1];
                        }
                        else{
                            $name=$link_result['name'];
                        }
                        $smart_tool['n'] = $name;

                        $index = array_search($smart_tool["n"], array_column($earnings_smart_tools, "n"));
                        if ($index !== false) {
                            $earnings_smart_tools[$index]["v"] += $smart_tool["v"];
                        } else {
                            $earnings_smart_tools[]=$smart_tool;
                        }
                    }
                    else{
                        $smart_tool['n'] = $link_result['name']." ".$link_result['linktext']." ".$land;

                        $index = array_search($smart_tool["n"], array_column($earnings_offer_tools, "n"));
                        if ($index !== false) {
                            $earnings_offer_tools[$index]["v"] += $smart_tool["v"];
                        } else {
                            $earnings_offer_tools[]=$smart_tool;
                        }
                    }
                }
            }
            if($src1 == 4){
                $html_query = "SELECT name FROM idevaff_htmlads WHERE id = $src2";
                $html_results = $db->query($html_query)->fetchAll(PDO::FETCH_ASSOC);
                foreach($html_results as $html_result) {
                    $smart_tool['v'] = $uv['v'];
                    $smart_tool['n'] = $html_result['name'];
                    $index = array_search($smart_tool["n"], array_column($earnings_smart_tools, "n"));
                    if ($index !== false) {
                        $earnings_smart_tools[$index]["v"] += $smart_tool["v"];
                    } else {
                        $earnings_smart_tools[]=$smart_tool;
                    }
                }
            }
            if($src1 == 5){
                $html_query = "SELECT name FROM idevaff_email_templates WHERE id = $src2";
                $html_results = $db->query($html_query)->fetchAll(PDO::FETCH_ASSOC);
                foreach($html_results as $html_result) {
                    $smart_tool['v'] = $uv['v'];
                    $smart_tool['n'] = $html_result['name'];
                    $index = array_search($smart_tool["n"], array_column($earnings_smart_tools, "n"));
                    if ($index !== false) {
                        $earnings_smart_tools[$index]["v"] += $smart_tool["v"];
                    } else {
                        $earnings_smart_tools[]=$smart_tool;
                    }
                }
            }
        }

        foreach ($db->query($q_earnings_sub_id) as $row) {
            array_push($earnings_sub_id, [
                "n" => $row["n"],
                "v" => $row["v"]
            ]);
        }
        foreach ($db->query($q_paid_earnings_sub_id) as $row) {
            $index = array_search($row["n"], array_column($earnings_sub_id, "n"));
            if ($index !== false) {
                /*if (array_search($index = $row["n"], $earnings_tid1)) {*/
                $earnings_sub_id[$index]["v"] += $row["v"];
            } else {
                array_push($earnings_sub_id, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($db->query($q_earnings_tid1) as $row) {
            array_push($earnings_tid1, [
                "n" => $row["n"],
                "v" => $row["v"]
            ]);
        }
        foreach ($db->query($q_paid_earnings_tid1) as $row) {
            $index = array_search($row["n"], array_column($earnings_tid1, "n"));
            if ($index !== false) {
                /*if (array_search($index = $row["n"], $earnings_tid1)) {*/
                $earnings_tid1[$index]["v"] += $row["v"];
            } else {
                array_push($earnings_tid1, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }

        foreach ($db->query($q_earnings_tid2) as $row) {
            array_push($earnings_tid2, [
                "n" => $row["n"],
                "v" => $row["v"]
            ]);
        }
        foreach ($db->query($q_paid_earnings_tid2) as $row) {
            $index = array_search($row["n"], array_column($earnings_tid2, "n"));
            if ($index !== false) {
                /*if (array_search($index = $row["n"], $earnings_tid2)) {*/
                $earnings_tid2[$index]["v"] += $row["v"];
            } else {
                array_push($earnings_tid2, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }

        foreach ($db->query($q_earnings_tid3) as $row) {
            array_push($earnings_tid3, [
                "n" => $row["n"],
                "v" => $row["v"]
            ]);
        }
        foreach ($db->query($q_paid_earnings_tid3) as $row) {
            $index = array_search($row["n"], array_column($earnings_tid3, "n"));
            if ($index !== false) {
                /*if (array_search($index = $row["n"], $earnings_tid3)) {*/
                $earnings_tid3[$index]["v"] += $row["v"];
            } else {
                array_push($earnings_tid3, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }

        foreach ($db->query($q_earnings_tid4) as $row) {
            array_push($earnings_tid4, [
                "n" => $row["n"],
                "v" => $row["v"]
            ]);
        }
        foreach ($db->query($q_paid_earnings_tid4) as $row) {
            $index = array_search($row["n"], array_column($earnings_tid4, "n"));
            if ($index !== false) {
                $earnings_tid4[$index]["v"] += $row["v"];
            } else {
                array_push($earnings_tid4, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }

        foreach ($db->query($q_earnings_tid_combinations) as $row) {

            array_push($earnings_combinations, [
                "n" => $row["n"],
                "v" => $row["v"]
            ]);
        }
        foreach ($db->query($q_paid_earnings_tid_combinations) as $row) {
            $index = array_search($row["n"], array_column($earnings_combinations, "n"));
            if ($index !== false) {
                /*if (array_search($index = $row["n"], $earnings_combinations)) {*/
                $earnings_combinations[$index]["v"] += $row["v"];
            } else {
                array_push($earnings_combinations, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
    }

    if ($info=='epc' || $info == 'epc_total') {

        // epc_smart_tools
        foreach ($raw_visits_smart_tools as $row) {
            foreach ($earnings_smart_tools as $row_) {
                if ($row["n"] === $row_["n"]) {
                    // If unique traffic 0
                    if ($row["v"] == 0) {
                        array_push($epc_smart_tools, [
                            "n" => $row["n"],
                            "src1" => $row["src1"],
                            "src2" => $row["src2"],
                            "v" => 0
                        ]);
                    } else {
                        $epc = $row_["v"] / $row["v"] * 100;
                        array_push($epc_smart_tools, [
                            "n" => $row["n"],
                            "src1" => $row["src1"],
                            "src2" => $row["src2"],
                            "v" => round($epc, 4)
                        ]);
                    }
                    break;
                }
            }
        }
        // epc_offer_tools
        foreach ($raw_visits_offer_tools as $row) {
            foreach ($earnings_offer_tools as $row_) {
                if ($row["n"] === $row_["n"]) {
                    // If unique traffic 0
                    if ($row["v"] == 0) {
                        array_push($epc_offer_tools, [
                            "n" => $row["n"],
                            "src1" => $row["src1"],
                            "src2" => $row["src2"],
                            "v" => 0
                        ]);
                    } else {
                        $epc = $row_["v"] / $row["v"] * 100;
                        array_push($epc_offer_tools, [
                            "n" => $row["n"],
                            "src1" => $row["src1"],
                            "src2" => $row["src2"],
                            "v" => round($epc, 4)
                        ]);
                    }
                    break;
                }
            }
        }
        // epc_country
        foreach ($raw_visits_country as $row) {
            foreach ($earnings_country as $row_) {
                if ($row["n"] === $row_["n"]) {
                    // If unique traffic 0
                    if ($row["v"] == 0) {
                        array_push($epc_country, [
                            "n" => $row["n"],
                            "v" => 0
                        ]);
                    } else {
                        $epc = $row_["v"] / $row["v"] * 100;
                        array_push($epc_country, [
                            "n" => $row["n"],
                            "v" => round($epc, 4)
                        ]);
                    }
                    break;
                }
            }
        }

        // epc_sub_id
        foreach ($raw_visits_sub_id as $row) {
            foreach ($earnings_sub_id as $row_) {
                if ($row["n"] === $row_["n"]) {
                    // If unique traffic 0
                    if ($row["v"] == 0) {
                        array_push($epc_sub_id, [
                            "n" => $row["n"],
                            "v" => 0
                        ]);
                    } else {
                        $epc = $row_["v"] / $row["v"] * 100;
                        array_push($epc_sub_id, [
                            "n" => $row["n"],
                            "v" => round($epc, 4)
                        ]);
                    }
                    break;
                }
            }
        }
        // epc_tid1
        foreach ($raw_visits_tid1 as $row) {
            foreach ($earnings_tid1 as $row_) {
                if ($row["n"] === $row_["n"]) {
                    // If unique traffic 0
                    if ($row["v"] == 0) {
                        array_push($epc_tid1, [
                            "n" => $row["n"],
                            "v" => 0
                        ]);
                    } else {
                        $epc = $row_["v"] / $row["v"] * 100;
                        array_push($epc_tid1, [
                            "n" => $row["n"],
                            "v" => round($epc, 4)
                        ]);
                    }
                    break;
                }
            }
        }

        // epc_tid2
        foreach ($raw_visits_tid2 as $row) {
            foreach ($earnings_tid2 as $row_) {
                if ($row["n"] === $row_["n"]) {
                    // If unique traffic 0
                    if ($row["v"] == 0) {
                        array_push($epc_tid2, [
                            "n" => $row["n"],
                            "v" => 0
                        ]);
                    } else {
                        $epc = $row_["v"] / $row["v"] * 100;
                        array_push($epc_tid2, [
                            "n" => $row["n"],
                            "v" => round($epc, 4)
                        ]);
                    }
                    break;
                }
            }
        }

        // epc_tid3
        foreach ($raw_visits_tid3 as $row) {
            foreach ($earnings_tid3 as $row_) {
                if ($row["n"] === $row_["n"]) {
                    // If unique traffic 0
                    if ($row["v"] == 0) {
                        array_push($epc_tid3, [
                            "n" => $row["n"],
                            "v" => 0
                        ]);
                    } else {
                        $epc = $row_["v"] / $row["v"] * 100;
                        array_push($epc_tid3, [
                            "n" => $row["n"],
                            "v" => round($epc, 4)
                        ]);
                    }
                    break;
                }
            }
        }

        // epc_tid4
        foreach ($raw_visits_tid4 as $row) {
            foreach ($earnings_tid4 as $row_) {
                if ($row["n"] === $row_["n"]) {
                    // If unique traffic 0
                    if ($row["v"] == 0) {
                        array_push($epc_tid4, [
                            "n" => $row["n"],
                            "v" => 0
                        ]);
                    } else {
                        $epc = $row_["v"] / $row["v"] * 100;
                        array_push($epc_tid4, [
                            "n" => $row["n"],
                            "v" => round($epc, 4)
                        ]);
                    }
                    break;
                }
            }
        }

        // epc_combinations
        foreach ($raw_visits_tid_combinations as $row) {
            foreach ($earnings_combinations as $row_) {
                if ($row["n"] === $row_["n"]) {
                    // If unique traffic 0
                    if ($row["v"] == 0) {
                        array_push($epc_combinations, [
                            "n" => $row["n"],
                            "v" => 0
                        ]);
                    } else {
                        $epc = $row_["v"] / $row["v"] * 100;
                        array_push($epc_combinations, [
                            "n" => $row["n"],
                            "v" => round($epc, 4)
                        ]);
                    }
                    break;
                }
            }
        }

        usort($epc_smart_tools, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
        usort($epc_offer_tools, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
        usort($epc_country, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });

        usort($epc_sub_id, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
        usort($epc_tid1, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });

        usort($epc_tid2, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });

        usort($epc_tid3, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });

        usort($epc_tid4, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });

        usort($epc_combinations, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
    }

    if ($info === 'raw_visits_total') {
        foreach ($raw_visits_smart_tools as $row) {
            if (array_search($index = $row["n"], $raw_visits_total_smart_tools)) {
                $raw_visits_total_smart_tools[$index]["v"] += $row["v"];
            } else {
                array_push($raw_visits_total_smart_tools, [
                    "n" => $row["n"],
                    "src1" => $row["src1"],
                    "src2" => $row["src2"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($raw_visits_offer_tools as $row) {
            if (array_search($index = $row["n"], $raw_visits_total_offer_tools)) {
                $raw_visits_total_offer_tools[$index]["v"] += $row["v"];
            } else {
                array_push($raw_visits_total_offer_tools, [
                    "n" => $row["n"],
                    "src1" => $row["src1"],
                    "src2" => $row["src2"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($raw_visits_country as $row) {
            if (array_search($index = $row["n"], $raw_visits_total_country)) {
                $raw_visits_total_country[$index]["v"] += $row["v"];
            } else {
                array_push($raw_visits_total_country, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($raw_visits_sub_id as $row) {
            if (array_search($index = $row["n"], $raw_visits_total_sub_id)) {
                $raw_visits_total_sub_id[$index]["v"] += $row["v"];
            } else {
                array_push($raw_visits_total_sub_id, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($raw_visits_tid1 as $row) {
            if (array_search($index = $row["n"], $raw_visits_total_tid1)) {
                $raw_visits_total_tid1[$index]["v"] += $row["v"];
            } else {
                array_push($raw_visits_total_tid1, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($raw_visits_tid2 as $row) {
            if (array_search($index = $row["n"], $raw_visits_total_tid2)) {
                $raw_visits_total_tid2[$index]["v"] += $row["v"];
            } else {
                array_push($raw_visits_total_tid2, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($raw_visits_tid3 as $row) {
            if (array_search($index = $row["n"], $raw_visits_total_tid3)) {
                $raw_visits_total_tid3[$index]["v"] += $row["v"];
            } else {
                array_push($raw_visits_total_tid3, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($raw_visits_tid4 as $row) {
            if (array_search($index = $row["n"], $raw_visits_total_tid4)) {
                $raw_visits_total_tid4[$index]["v"] += $row["v"];
            } else {
                array_push($raw_visits_total_tid4, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($raw_visits_tid_combinations as $row) {
            if (array_search($index = $row["n"], $raw_visits_total_tid_combinations)) {
                $raw_visits_total_tid_combinations[$index]["v"] += $row["v"];
            } else {
                array_push($raw_visits_total_tid_combinations, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }

        usort($raw_visits_total_smart_tools, function($a,$b){
            return $b["v"] - $a["v"];
        });
        usort($raw_visits_total_offer_tools, function($a,$b){
            return $b["v"] - $a["v"];
        });
        usort($raw_visits_total_country, function($a,$b){
            return $b["v"] - $a["v"];
        });
        usort($raw_visits_total_sub_id, function($a,$b){
            return $b["v"] - $a["v"];
        });
        usort($raw_visits_total_tid1, function($a,$b){
            return $b["v"] - $a["v"];
        });
        usort($raw_visits_total_tid2, function($a,$b){
            return $b["v"] - $a["v"];
        });
        usort($raw_visits_total_tid3, function($a,$b){
            return $b["v"] - $a["v"];
        });
        usort($raw_visits_total_tid4, function($a,$b){
            return $b["v"] - $a["v"];
        });
        usort($raw_visits_total_tid_combinations, function($a,$b){
            return $b["v"] - $a["v"];
        });
    }
    if ($info === 'unique_visits_total') {
        foreach ($unique_visits_smart_tools as $row) {
            if (array_search($index = $row["n"], $unique_visits_total_smart_tools)) {
                $unique_visits_total_smart_tools[$index]["v"] += $row["v"];
            } else {
                array_push($unique_visits_total_smart_tools, [
                    "n" => $row["n"],

                    "src1" => $row["src1"],
                    "src2" => $row["src2"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($unique_visits_offer_tools as $row) {
            if (array_search($index = $row["n"], $unique_visits_total_offer_tools)) {
                $unique_visits_total_offer_tools[$index]["v"] += $row["v"];
            } else {
                array_push($unique_visits_total_offer_tools, [
                    "n" => $row["n"],
                    "src1" => $row["src1"],
                    "src2" => $row["src2"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($unique_visits_country as $row) {
            if (array_search($index = $row["n"], $unique_visits_total_country)) {
                $unique_visits_total_country[$index]["v"] += $row["v"];
            } else {
                array_push($unique_visits_total_country, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($unique_visits_sub_id as $row) {
            if (array_search($index = $row["n"], $unique_visits_total_sub_id)) {
                $unique_visits_total_sub_id[$index]["v"] += $row["v"];
            } else {
                array_push($unique_visits_total_sub_id, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($unique_visits_tid1 as $row) {
            if (array_search($index = $row["n"], $unique_visits_total_tid1)) {
                $unique_visits_total_tid1[$index]["v"] += $row["v"];
            } else {
                array_push($unique_visits_total_tid1, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($unique_visits_tid2 as $row) {
            if (array_search($index = $row["n"], $unique_visits_total_tid2)) {
                $unique_visits_total_tid2[$index]["v"] += $row["v"];
            } else {
                array_push($unique_visits_total_tid2, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($unique_visits_tid3 as $row) {
            if (array_search($index = $row["n"], $unique_visits_total_tid3)) {
                $unique_visits_total_tid3[$index]["v"] += $row["v"];
            } else {
                array_push($unique_visits_total_tid3, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($unique_visits_tid4 as $row) {
            if (array_search($index = $row["n"], $unique_visits_total_tid4)) {
                $unique_visits_total_tid4[$index]["v"] += $row["v"];
            } else {
                array_push($unique_visits_total_tid4, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($unique_visits_combinations as $row) {
            if (array_search($index = $row["n"], $unique_visits_total_tid_combinations)) {
                $unique_visits_total_tid_combinations[$index]["v"] += $row["v"];
            } else {
                array_push($unique_visits_total_tid_combinations, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        usort($unique_visits_total_smart_tools, function($a,$b){
            return $b["v"] - $a["v"];
        });
        usort($unique_visits_total_offer_tools, function($a,$b){
            return $b["v"] - $a["v"];
        });
        usort($unique_visits_total_country, function($a,$b){
            return $b["v"] - $a["v"];
        });
        usort($unique_visits_total_sub_id, function($a,$b){
            return $b["v"] - $a["v"];
        });
        usort($unique_visits_total_tid1, function($a,$b){
            return $b["v"] - $a["v"];
        });
        usort($unique_visits_total_tid2, function($a,$b){
            return $b["v"] - $a["v"];
        });
        usort($unique_visits_total_tid3, function($a,$b){
            return $b["v"] - $a["v"];
        });
        usort($unique_visits_total_tid4, function($a,$b){
            return $b["v"] - $a["v"];
        });
        usort($unique_visits_total_tid_combinations, function($a,$b){
            return $b["v"] - $a["v"];
        });
    }
    if ($info === 'transactions_total') {
        foreach ($transactions_smart_tools as $row) {
            if (array_search($index = $row["n"], $transactions_total_smart_tools)) {
                $transactions_total_smart_tools[$index]["v"] += $row["v"];
            } else {
                array_push($transactions_total_smart_tools, [
                    "n" => $row["n"],
                    "src1" => $row["src1"],
                    "src2" => $row["src2"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($transactions_offer_tools as $row) {
            if (array_search($index = $row["n"], $transactions_total_offer_tools)) {
                $transactions_total_offer_tools[$index]["v"] += $row["v"];
            } else {
                array_push($transactions_total_offer_tools, [
                    "n" => $row["n"],
                    "src1" => $row["src1"],
                    "src2" => $row["src2"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($transactions_country as $row) {
            if (array_search($index = $row["n"], $transactions_total_country)) {
                $transactions_total_country[$index]["v"] += $row["v"];
            } else {
                array_push($transactions_total_country, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($transactions_sub_id as $row) {
            if (array_search($index = $row["n"], $transactions_total_sub_id)) {
                $transactions_total_sub_id[$index]["v"] += $row["v"];
            } else {
                array_push($transactions_total_sub_id, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($transactions_tid1 as $row) {
            if (array_search($index = $row["n"], $transactions_total_tid1)) {
                $transactions_total_tid1[$index]["v"] += $row["v"];
            } else {
                array_push($transactions_total_tid1, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($transactions_tid2 as $row) {
            if (array_search($index = $row["n"], $transactions_total_tid2)) {
                $transactions_total_tid2[$index]["v"] += $row["v"];
            } else {
                array_push($transactions_total_tid2, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($transactions_tid3 as $row) {
            if (array_search($index = $row["n"], $transactions_total_tid3)) {
                $transactions_total_tid3[$index]["v"] += $row["v"];
            } else {
                array_push($transactions_total_tid3, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($transactions_tid4 as $row) {
            if (array_search($index = $row["n"], $transactions_total_tid4)) {
                $transactions_total_tid4[$index]["v"] += $row["v"];
            } else {
                array_push($transactions_total_tid4, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($transactions_combinations as $row) {
            if (array_search($index = $row["n"], $transactions_total_tid_combinations)) {
                $transactions_total_tid_combinations[$index]["v"] += $row["v"];
            } else {
                array_push($transactions_total_tid_combinations, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        usort($transactions_total_smart_tools, function($a,$b){
            return $b["v"] - $a["v"];
        });
        usort($transactions_total_offer_tools, function($a,$b){
            return $b["v"] - $a["v"];
        });
        usort($transactions_total_country, function($a,$b){
            return $b["v"] - $a["v"];
        });
        usort($transactions_total_sub_id, function($a,$b){
            return $b["v"] - $a["v"];
        });
        usort($transactions_total_tid1, function($a,$b){
            return $b["v"] - $a["v"];
        });
        usort($transactions_total_tid2, function($a,$b){
            return $b["v"] - $a["v"];
        });
        usort($transactions_total_tid3, function($a,$b){
            return $b["v"] - $a["v"];
        });
        usort($transactions_total_tid4, function($a,$b){
            return $b["v"] - $a["v"];
        });
        usort($transactions_total_tid_combinations, function($a,$b){
            return $b["v"] - $a["v"];
        });
    }
    if ($info === 'sales_ratio_total') {
        foreach ($sales_ratio_smart_tools as $row) {
            if (array_search($index = $row["n"], $sales_ratio_total_smart_tools)) {
                $sales_ratio_total_smart_tools[$index]["v"] += $row["v"];
            } else {
                array_push($sales_ratio_total_smart_tools, [
                    "n" => $row["n"],
                    "src1" => $row["src1"],
                    "src2" => $row["src2"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($sales_ratio_offer_tools as $row) {
            if (array_search($index = $row["n"], $sales_ratio_total_offer_tools)) {
                $sales_ratio_total_offer_tools[$index]["v"] += $row["v"];
            } else {
                array_push($sales_ratio_total_offer_tools, [
                    "n" => $row["n"],
                    "src1" => $row["src1"],
                    "src2" => $row["src2"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($sales_ratio_country as $row) {
            if (array_search($index = $row["n"], $sales_ratio_total_country)) {
                $sales_ratio_total_country[$index]["v"] += $row["v"];
            } else {
                array_push($sales_ratio_total_country, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($sales_ratio_sub_id as $row) {
            if (array_search($index = $row["n"], $sales_ratio_total_sub_id)) {
                $sales_ratio_total_sub_id[$index]["v"] += $row["v"];
            } else {
                array_push($sales_ratio_total_sub_id, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($sales_ratio_tid1 as $row) {
            if (array_search($index = $row["n"], $sales_ratio_total_tid1)) {
                $sales_ratio_total_tid1[$index]["v"] += $row["v"];
            } else {
                array_push($sales_ratio_total_tid1, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($sales_ratio_tid2 as $row) {
            if (array_search($index = $row["n"], $sales_ratio_total_tid2)) {
                $sales_ratio_total_tid2[$index]["v"] += $row["v"];
            } else {
                array_push($sales_ratio_total_tid2, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($sales_ratio_tid3 as $row) {
            if (array_search($index = $row["n"], $sales_ratio_total_tid3)) {
                $sales_ratio_total_tid3[$index]["v"] += $row["v"];
            } else {
                array_push($sales_ratio_total_tid3, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($sales_ratio_tid4 as $row) {
            if (array_search($index = $row["n"], $sales_ratio_total_tid4)) {
                $sales_ratio_total_tid4[$index]["v"] += $row["v"];
            } else {
                array_push($sales_ratio_total_tid4, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($sales_ratio_combinations as $row) {
            if (array_search($index = $row["n"], $sales_ratio_total_tid_combinations)) {
                $sales_ratio_total_tid_combinations[$index]["v"] += $row["v"];
            } else {
                array_push($sales_ratio_total_tid_combinations, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }

        usort($sales_ratio_total_smart_tools, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
        usort($sales_ratio_total_offer_tools, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });

        usort($sales_ratio_total_country, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
        usort($sales_ratio_total_sub_id, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
        usort($sales_ratio_total_tid1, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
        usort($sales_ratio_total_tid2, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
        usort($sales_ratio_total_tid3, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
        usort($sales_ratio_total_tid4, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
        usort($sales_ratio_total_tid_combinations, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
    }
    if ($info === 'epc_total') {
        foreach ($epc_smart_tools as $row) {
            if (array_search($index = $row["n"], $epc_total_smart_tools)) {
                $epc_total_smart_tools[$index]["v"] += $row["v"];
            } else {
                array_push($epc_total_smart_tools, [
                    "n" => $row["n"],
                    "src1" => $row["src1"],
                    "src2" => $row["src2"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($epc_offer_tools as $row) {
            if (array_search($index = $row["n"], $epc_total_offer_tools)) {
                $epc_total_offer_tools[$index]["v"] += $row["v"];
            } else {
                array_push($epc_total_offer_tools, [
                    "n" => $row["n"],
                    "src1" => $row["src1"],
                    "src2" => $row["src2"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($epc_country as $row) {
            if (array_search($index = $row["n"], $epc_total_country)) {
                $epc_total_country[$index]["v"] += $row["v"];
            } else {
                array_push($epc_total_country, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($epc_tid1 as $row) {
            if (array_search($index = $row["n"], $epc_total_sub_id)) {
                $epc_total_sub_id[$index]["v"] += $row["v"];
            } else {
                array_push($epc_total_sub_id, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($epc_sub_id as $row) {
            if (array_search($index = $row["n"], $epc_total_tid1)) {
                $epc_total_tid1[$index]["v"] += $row["v"];
            } else {
                array_push($epc_total_tid1, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($epc_tid2 as $row) {
            if (array_search($index = $row["n"], $epc_total_tid2)) {
                $epc_total_tid2[$index]["v"] += $row["v"];
            } else {
                array_push($epc_total_tid2, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($epc_tid3 as $row) {
            if (array_search($index = $row["n"], $epc_total_tid3)) {
                $epc_total_tid3[$index]["v"] += $row["v"];
            } else {
                array_push($epc_total_tid3, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($epc_tid4 as $row) {
            if (array_search($index = $row["n"], $epc_total_tid4)) {
                $epc_total_tid4[$index]["v"] += $row["v"];
            } else {
                array_push($epc_total_tid4, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($epc_combinations as $row) {
            if (array_search($index = $row["n"], $epc_total_tid_combinations)) {
                $epc_total_tid_combinations[$index]["v"] += $row["v"];
            } else {
                array_push($epc_total_tid_combinations, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }

        usort($epc_total_smart_tools, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
        usort($epc_total_offer_tools, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
        usort($epc_total_country, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
        usort($epc_total_sub_id, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
        usort($epc_total_tid1, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
        usort($epc_total_tid2, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
        usort($epc_total_tid3, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
        usort($epc_total_tid4, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
        usort($epc_total_tid_combinations, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
    }
    if ($info === 'earnings_total') {
        foreach ($earnings_smart_tools as $row) {
            if (array_search($index = $row["n"], $earnings_total_smart_tools)) {
                $earnings_total_smart_tools[$index]["v"] += $row["v"];
            } else {
                array_push($earnings_total_smart_tools, [
                    "n" => $row["n"],
                    "src1" => $row["src1"],
                    "src2" => $row["src2"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($earnings_offer_tools as $row) {
            if (array_search($index = $row["n"], $earnings_total_offer_tools)) {
                $earnings_total_offer_tools[$index]["v"] += $row["v"];
            } else {
                array_push($earnings_total_offer_tools, [
                    "n" => $row["n"],
                    "src1" => $row["src1"],
                    "src2" => $row["src2"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($earnings_country as $row) {
            if (array_search($index = $row["n"], $earnings_total_country)) {
                $earnings_total_country[$index]["v"] += $row["v"];
            } else {
                array_push($earnings_total_country, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($earnings_sub_id as $row) {
            if (array_search($index = $row["n"], $earnings_total_sub_id)) {
                $earnings_total_sub_id[$index]["v"] += $row["v"];
            } else {
                array_push($earnings_total_sub_id, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($earnings_tid1 as $row) {
            if (array_search($index = $row["n"], $earnings_total_tid1)) {
                $earnings_total_tid1[$index]["v"] += $row["v"];
            } else {
                array_push($earnings_total_tid1, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($earnings_tid2 as $row) {
            if (array_search($index = $row["n"], $earnings_total_tid2)) {
                $earnings_total_tid2[$index]["v"] += $row["v"];
            } else {
                array_push($earnings_total_tid2, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($earnings_tid3 as $row) {
            if (array_search($index = $row["n"], $earnings_total_tid3)) {
                $earnings_total_tid3[$index]["v"] += $row["v"];
            } else {
                array_push($earnings_total_tid3, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($earnings_tid4 as $row) {
            if (array_search($index = $row["n"], $earnings_total_tid4)) {
                $earnings_total_tid4[$index]["v"] += $row["v"];
            } else {
                array_push($earnings_total_tid4, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }
        foreach ($earnings_combinations as $row) {
            if (array_search($index = $row["n"], $earnings_total_tid_combinations)) {
                $earnings_total_tid_combinations[$index]["v"] += $row["v"];
            } else {
                array_push($earnings_total_tid_combinations, [
                    "n" => $row["n"],
                    "v" => $row["v"]
                ]);
            }
        }

        usort($earnings_total_smart_tools, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
        usort($earnings_total_offer_tools, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
        usort($earnings_total_country, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
        usort($earnings_total_sub_id, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
        usort($earnings_total_tid1, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
        usort($earnings_total_tid2, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
        usort($earnings_total_tid3, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
        usort($earnings_total_tid4, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
        usort($earnings_total_tid_combinations, function($a,$b){
            return $b['v'] > $a['v'] ? 1 : -1;
        });
    }
    return [
        "raw_visits_detail" => [
            "country" => $raw_visits_country,
            "sub_id" => $raw_visits_sub_id,
            "tid1" => $raw_visits_tid1,
            "tid2" => $raw_visits_tid2,
            "tid3" => $raw_visits_tid3,
            "tid4" => $raw_visits_tid4,
            "offer_tools" => $raw_visits_offer_tools,
            "smart_tools" => $raw_visits_smart_tools,
            "combinations" => $raw_visits_tid_combinations
        ],
        "raw_visits_total_detail" => [
            "country" => $raw_visits_total_country,
            "sub_id" => $raw_visits_total_sub_id,
            "tid1" => $raw_visits_total_tid1,
            "tid2" => $raw_visits_total_tid2,
            "tid3" => $raw_visits_total_tid3,
            "tid4" => $raw_visits_total_tid4,
            "offer_tools" => $raw_visits_total_offer_tools,
            "smart_tools" => $raw_visits_total_smart_tools,
            "combinations" => $raw_visits_total_tid_combinations
        ],
        "unique_visits_detail" => [
            "country" => $unique_visits_country,
            "sub_id" => $unique_visits_sub_id,
            "tid1" => $unique_visits_tid1,
            "tid2" => $unique_visits_tid2,
            "tid3" => $unique_visits_tid3,
            "tid4" => $unique_visits_tid4,
            "offer_tools" => $unique_visits_offer_tools,
            "smart_tools" => $unique_visits_smart_tools,
            "combinations" => $unique_visits_combinations
        ],
        "unique_visits_total_detail" => [
            "country" => $unique_visits_total_country,
            "sub_id" => $unique_visits_total_sub_id,
            "tid1" => $unique_visits_total_tid1,
            "tid2" => $unique_visits_total_tid2,
            "tid3" => $unique_visits_total_tid3,
            "tid4" => $unique_visits_total_tid4,
            "offer_tools" => $unique_visits_total_offer_tools,
            "smart_tools" => $unique_visits_total_smart_tools,
            "combinations" => $unique_visits_total_tid_combinations
        ],
        "transactions_detail" => [
            "country" => $transactions_country,
            "sub_id" => $transactions_sub_id,
            "tid1" => $transactions_tid1,
            "tid2" => $transactions_tid2,
            "tid3" => $transactions_tid3,
            "tid4" => $transactions_tid4,
            "offer_tools" => $transactions_offer_tools,
            "smart_tools" => $transactions_smart_tools,
            "combinations" => $transactions_combinations
        ],
        "transactions_total_detail" => [
            "country" => $transactions_total_country,
            "sub_id" => $transactions_total_sub_id,
            "tid1" => $transactions_total_tid1,
            "tid2" => $transactions_total_tid2,
            "tid3" => $transactions_total_tid3,
            "tid4" => $transactions_total_tid4,
            "offer_tools" => $transactions_total_offer_tools,
            "smart_tools" => $transactions_total_smart_tools,
            "combinations" => $transactions_total_tid_combinations
        ],
        "sales_ratio_detail" => [
            "country" => $sales_ratio_country,
            "sub_id" => $sales_ratio_sub_id,
            "tid1" => $sales_ratio_tid1,
            "tid2" => $sales_ratio_tid2,
            "tid3" => $sales_ratio_tid3,
            "tid4" => $sales_ratio_tid4,
            "offer_tools" => $sales_ratio_offer_tools,
            "smart_tools" => $sales_ratio_smart_tools,
            "combinations" => $sales_ratio_combinations
        ],
        "sales_ratio_total_detail" => [
            "country" => $sales_ratio_total_country,
            "sub_id" => $sales_ratio_total_sub_id,
            "tid1" => $sales_ratio_total_tid1,
            "tid2" => $sales_ratio_total_tid2,
            "tid3" => $sales_ratio_total_tid3,
            "tid4" => $sales_ratio_total_tid4,
            "offer_tools" => $sales_ratio_total_offer_tools,
            "smart_tools" => $sales_ratio_total_smart_tools,
            "combinations" => $sales_ratio_total_tid_combinations
        ],
        "epc_detail" => [
            "country" => $epc_country,
            "sub_id" => $epc_sub_id,
            "tid1" => $epc_tid1,
            "tid2" => $epc_tid2,
            "tid3" => $epc_tid3,
            "tid4" => $epc_tid4,
            "offer_tools" => $epc_offer_tools,
            "smart_tools" => $epc_smart_tools,
            "combinations" => $epc_combinations
        ],
        "epc_total_detail" => [
            "country" => $epc_total_country,
            "sub_id" => $epc_total_sub_id,
            "tid1" => $epc_total_tid1,
            "tid2" => $epc_total_tid2,
            "tid3" => $epc_total_tid3,
            "tid4" => $epc_total_tid4,
            "offer_tools" => $epc_total_offer_tools,
            "smart_tools" => $epc_total_smart_tools,
            "combinations" => $epc_total_tid_combinations
        ],
        "earnings_detail" => [
            "country" => $earnings_country,
            "sub_id" => $earnings_sub_id,
            "tid1" => $earnings_tid1,
            "tid2" => $earnings_tid2,
            "tid3" => $earnings_tid3,
            "tid4" => $earnings_tid4,
            "offer_tools" => $earnings_offer_tools,
            "smart_tools" => $earnings_smart_tools,
            "combinations" => $earnings_combinations
        ],
        "earnings_total_detail" => [
            "country" => $earnings_total_country,
            "sub_id" => $earnings_total_sub_id,
            "tid1" => $earnings_total_tid1,
            "tid2" => $earnings_total_tid2,
            "tid3" => $earnings_total_tid3,
            "tid4" => $earnings_total_tid4,
            "offer_tools" => $earnings_total_offer_tools,
            "smart_tools" => $earnings_total_smart_tools,
            "combinations" => $earnings_total_tid_combinations
        ]
    ];
}

try {
	$t = detailsByDateRange($startD, $endD, $current_date, $db, $linkid, $info,$country,$subId,$tId1,$tId2,$tId3,$tId4,$combinations,$smartTools,$offerTools);
	echo json_encode($t[$info . "_detail"]);
	return;
} catch (Exception $ex) {
	echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
	die;
}