<?php
if (!defined('IDEV_REPORT')) {
	exit('Unauthorized Access');
}

echo "\r\n" . '<div class="widget box">' . "\r\n" . '<div class="widget-header"><h4><i class="icon-file-text-alt"></i> Marketing Statistics Report</h4></div>' . "\r\n" . '<div class="widget-content">' . "\r\n\r\n" . '<form class="form-horizontal row-border" method="post" action="reports.php">' . "\r\n" . '<input name="csrf_token" value="';
echo $_SESSION['csrf_token'];
echo '" type="hidden" />' . "\r\n" . '<div class="well">Statistics for marketing items will only show if you have the <a href="setup.php?action=47">Track Marketing Statistics</a> setting enabled.';

if ($use_keywords == 1) {
	echo 'Any traffic / sales delivered through the use of custom keyword links will not show up on this page because iDevAffiliate has no way of knowing what type of marketing tool was used with the custom keyword link.';
}

echo '</div>' . "\r\n" . '<div class="form-group">' . "\r\n" . '<label class="col-md-3 control-label">Marketing Type</label>' . "\r\n" . '<div class="col-md-3"><select name="m_type" class="form-control">' . "\r\n" . '<option value="1"';

if (isset($_POST['m_type']) && ($_POST['m_type'] == 1)) {
	echo ' selected';
}

echo '>Direct Offers Banners</option>' . "\r\n" . '<option value="2"';

if (isset($_POST['m_type']) && ($_POST['m_type'] == 2)) {
	echo ' selected';
}

echo '>Text Ads</option>' . "\r\n" . '<option value="3"';

if (isset($_POST['m_type']) && ($_POST['m_type'] == 3)) {
	echo ' selected';
}

echo '>PopUnders</option>' . "\r\n" . '<option value="4"';

if (isset($_POST['m_type']) && ($_POST['m_type'] == 4)) {
	echo ' selected';
}

echo '>SmartLinks</option>' . "\r\n" . '<option value="5"';

if (isset($_POST['m_type']) && ($_POST['m_type'] == 5)) {
	echo ' selected';
}

echo '>BackOffers</option>' . "\r\n" . '<option value="6"';

if (isset($_POST['m_type']) && ($_POST['m_type'] == 6)) {
	echo ' selected';
}

echo '>Page Peels</option>' . "\r\n" . '<option value="7"';

if (isset($_POST['m_type']) && ($_POST['m_type'] == 7)) {
	echo ' selected';
}

echo '>Lightboxes</option>' . "\r\n" . '</select></div>' . "\r\n" . '</div>' . "\r\n\r\n" . '<div class="form-actions">' . "\r\n" . '<input type="submit" value="Build Report" class="btn btn-primary">' . "\r\n" . '</div>' . "\r\n" . '<input type="hidden" name="report" value="8">' . "\r\n" . '</form>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n\r\n";

if (isset($_POST['m_type'])) {
	echo "\r\n";

	if ($_POST['m_type'] == 1) {
		echo "\r\n" . '<div class="widget box">' . "\r\n" . '<div class="widget-header"><h4><i class="icon-file-text-alt"></i> Banner Statistics</h4></div>' . "\r\n" . '<div class="widget-content">' . "\r\n\r\n" . '<table class="table valign table-striped table-bordered table-highlight-head">' . "\r\n" . '<thead>' . "\r\n" . '<tr>' . "\r\n" . '<th>Banner</th>' . "\r\n" . '<th>Marketing Group</th>' . "\r\n" . '<th>Size</th>' . "\r\n" . '<th>Unique Hits</th>' . "\r\n" . '<th>Commissions Delivered</th>' . "\r\n" . '<th>Conversion Rate</th>' . "\r\n" . '</tr>' . "\r\n" . '</thead>' . "\r\n" . '<tbody>' . "\r\n\r\n";
		$acct = $db->query('select * from idevaff_banners ORDER BY number');

		if ($acct->rowCount()) {
			while ($qry = $acct->fetch()) {
				$number = $qry['number'];
				$grp = $qry['grp'];
				$size1 = $qry['size1'];
				$size2 = $qry['size2'];
				$image = $qry['image'];
				$hits = $qry['hits'];
				$conv = $qry['conv'];
				$local = $qry['local'];

				if ($conv) {
					$perc = $conv / $hits;
					$perc = $perc * 100;
					$perc = number_format($perc, 3);
				}
				else {
					$perc = '0.000';
				}

				$gname = $db->prepare('select name from idevaff_groups where id = ?');
				$gname->execute(array($grp));
				$gname = $gname->fetch();
				$gname = $gname['name'];

				if ($local == 1) {
					$url_help = $image;
				}
				else {
					$url_help = $base_url . '/media/banners/' . $image;
				}

				echo '<tr>';
				echo '<td><a href="' . $url_help . '" class="fancy-image btn btn-sm btn-warning">View Banner</a></td>';
				echo '<td>' . $gname . '</td>';
				echo '<td>' . $size1 . ' x ' . $size2 . '</td>';
				echo '<td>' . number_format($hits, 0) . '</td>';
				echo '<td>' . number_format($conv, 0) . '</td>';
				echo '<td>' . $perc . '%</td>';
				echo '</tr>';
			}
		}
		else {
			echo '<tr><td>No Statistics To Report</td></tr>';
		}

		echo '</tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n\r\n";
	}
	else if ($_POST['m_type'] == 2) {
		echo "\r\n" . '<div class="widget box">' . "\r\n" . '<div class="widget-header"><h4><i class="icon-file-text-alt"></i> Text Ad Statistics</h4></div>' . "\r\n" . '<div class="widget-content">' . "\r\n\r\n" . '<table class="table valign table-striped table-bordered table-highlight-head">' . "\r\n" . '<thead>' . "\r\n" . '<tr>' . "\r\n" . '<th>Text Ad</th>' . "\r\n" . '<th>Marketing Group</th>' . "\r\n" . '<th>Unique Hits</th>' . "\r\n" . '<th>Commissions Delivered</th>' . "\r\n" . '<th>Conversion Rate</th>' . "\r\n" . '</tr>' . "\r\n" . '</thead>' . "\r\n" . '<tbody>' . "\r\n\r\n";
		$acct = $db->query('select * from idevaff_ads ORDER BY id');

		if ($acct->rowCount()) {
			while ($qry = $acct->fetch()) {
				$number = $qry['id'];
				$grp = $qry['grp'];
				$title = $qry['title'];

				if ($title == '') {
					$title = 'None';
				}

				$hits = $qry['hits'];
				$conv = $qry['conv'];

				if ($conv) {
					$perc = $conv / $hits;
					$perc = $perc * 100;
					$perc = number_format($perc, 3);
				}
				else {
					$perc = '0.000';
				}

				$gname = $db->prepare('select name from idevaff_groups where id = ?');
				$gname->execute(array($grp));
				$gname = $gname->fetch();
				$gname = $gname['name'];
				echo '<tr>';
				echo '<td>' . $title . '</td>';
				echo '<td>' . $gname . '</td>';
				echo '<td>' . number_format($hits, 0) . '</td>';
				echo '<td>' . number_format($conv, 0) . '</td>';
				echo '<td>' . $perc . '%</td>';
				echo '</tr>';
			}
		}
		else {
			echo '<tr><td>No Statistics To Report</td></tr>';
		}

		echo '</tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n\r\n";
	}
	else if ($_POST['m_type'] == 3) {
		echo "\r\n" . '<div class="widget box">' . "\r\n" . '<div class="widget-header"><h4><i class="icon-file-text-alt"></i> HTML Template Statistics</h4></div>' . "\r\n" . '<div class="widget-content">' . "\r\n\r\n" . '<table class="table valign table-striped table-bordered table-highlight-head">' . "\r\n" . '<thead>' . "\r\n" . '<tr>' . "\r\n" . '<th>HTML Template</th>' . "\r\n" . '<th>Marketing Group</th>' . "\r\n" . '<th>Unique Hits</th>' . "\r\n" . '<th>Commissions Delivered</th>' . "\r\n" . '<th>Conversion Rate</th>' . "\r\n" . '</tr>' . "\r\n" . '</thead>' . "\r\n" . '<tbody>' . "\r\n\r\n";
		$acct = $db->query('select * from idevaff_htmlads ORDER BY id');

		if ($acct->rowCount()) {
			while ($qry = $acct->fetch()) {
				$number = $qry['id'];
				$grp = $qry['grp'];
				$title = $qry['name'];

				if ($title == '') {
					$title = 'None';
				}

				$hits = $qry['hits'];
				$conv = $qry['conv'];

				if ($conv) {
					$perc = $conv / $hits;
					$perc = $perc * 100;
					$perc = number_format($perc, 3);
				}
				else {
					$perc = '0.000';
				}

				$gname = $db->prepare('select name from idevaff_groups where id = ?');
				$gname->execute(array($grp));
				$gname = $gname->fetch();
				$gname = $gname['name'];
				echo '<tr>';
				echo '<td>' . $title . '</td>';
				echo '<td>' . $gname . '</td>';
				echo '<td>' . number_format($hits, 0) . '</td>';
				echo '<td>' . number_format($conv, 0) . '</td>';
				echo '<td>' . $perc . '%</td>';
				echo '</tr>';
			}
		}
		else {
			echo '<tr><td>No Statistics To Report</td></tr>';
		}

		echo '</tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n\r\n";
	}
	else if ($_POST['m_type'] == 4) {
		echo "\r\n" . '<div class="widget box">' . "\r\n" . '<div class="widget-header"><h4><i class="icon-file-text-alt"></i> Text Link Statistics</h4></div>' . "\r\n" . '<div class="widget-content">' . "\r\n\r\n" . '<table class="table valign table-striped table-bordered table-highlight-head">' . "\r\n" . '<thead>' . "\r\n" . '<tr>' . "\r\n" . '<th>Text Link</th>' . "\r\n" . '<th>Marketing Group</th>' . "\r\n" . '<th>Unique Hits</th>' . "\r\n" . '<th>Commissions Delivered</th>' . "\r\n" . '<th>Conversion Rate</th>' . "\r\n" . '</tr>' . "\r\n" . '</thead>' . "\r\n" . '<tbody>' . "\r\n\r\n\r\n";
		$acct = $db->query('select * from idevaff_links ORDER BY id');

		if ($acct->rowCount()) {
			while ($qry = $acct->fetch()) {
				$number = $qry['id'];
				$grp = $qry['grp'];
				$linktext = $qry['linktext'];

				if ($linktext == '') {
					$linktext = 'None';
				}

				$hits = $qry['hits'];
				$conv = $qry['conv'];

				if ($conv) {
					$perc = $conv / $hits;
					$perc = $perc * 100;
					$perc = number_format($perc, 3);
				}
				else {
					$perc = '0.000';
				}

				$gname = $db->prepare('select name from idevaff_groups where id = ?');
				$gname->execute(array($grp));
				$gname = $gname->fetch();
				$gname = $gname['name'];
				echo '<tr>';
				echo '<td>' . $linktext . '</td>';
				echo '<td>' . $gname . '</td>';
				echo '<td>' . number_format($hits, 0) . '</td>';
				echo '<td>' . number_format($conv, 0) . '</td>';
				echo '<td>' . $perc . '%</td>';
				echo '</tr>';
			}
		}
		else {
			echo '<tr><td>No Statistics To Report</td></tr>';
		}

		echo '</tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n\r\n";
	}
	else if ($_POST['m_type'] == 5) {
		echo "\r\n" . '<div class="widget box">' . "\r\n" . '<div class="widget-header"><h4><i class="icon-file-text-alt"></i> Email Template Statistics</h4></div>' . "\r\n" . '<div class="widget-content">' . "\r\n\r\n" . '<table class="table valign table-striped table-bordered table-highlight-head">' . "\r\n" . '<thead>' . "\r\n" . '<tr>' . "\r\n" . '<th>Email Template</th>' . "\r\n" . '<th>Marketing Group</th>' . "\r\n" . '<th>Unique Hits</th>' . "\r\n" . '<th>Commissions Delivered</th>' . "\r\n" . '<th>Conversion Rate</th>' . "\r\n" . '</tr>' . "\r\n" . '</thead>' . "\r\n" . '<tbody>' . "\r\n\r\n";
		$acct = $db->query('select * from idevaff_email_templates ORDER BY id');

		if ($acct->rowCount()) {
			while ($qry = $acct->fetch()) {
				$number = $qry['id'];
				$grp = $qry['grp'];
				$title = $qry['name'];

				if ($title == '') {
					$title = 'None';
				}

				$hits = $qry['hits'];
				$conv = $qry['conv'];

				if ($conv) {
					$perc = $conv / $hits;
					$perc = $perc * 100;
					$perc = number_format($perc, 3);
				}
				else {
					$perc = '0.000';
				}

				$gname = $db->prepare('select name from idevaff_groups where id = ?');
				$gname->execute(array($grp));
				$gname = $gname->fetch();
				$gname = $gname['name'];
				echo '<tr>';
				echo '<td>' . $title . '</td>';
				echo '<td>' . $gname . '</td>';
				echo '<td>' . number_format($hits, 0) . '</td>';
				echo '<td>' . number_format($conv, 0) . '</td>';
				echo '<td>' . $perc . '%</td>';
				echo '</tr>';
			}
		}
		else {
			echo '<tr><td>No Statistics To Report</td></tr>';
		}

		echo '</tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n\r\n";
	}
	else if ($_POST['m_type'] == 6) {
		echo "\r\n" . '<div class="widget box">' . "\r\n" . '<div class="widget-header"><h4><i class="icon-file-text-alt"></i> Page Peel Statistics</h4></div>' . "\r\n" . '<div class="widget-content">' . "\r\n\r\n" . '<table class="table valign table-striped table-bordered table-highlight-head">' . "\r\n" . '<thead>' . "\r\n" . '<tr>' . "\r\n" . '<th>Page Peel</th>' . "\r\n" . '<th>Marketing Group</th>' . "\r\n" . '<th>Unique Hits</th>' . "\r\n" . '<th>Commissions Delivered</th>' . "\r\n" . '<th>Conversion Rate</th>' . "\r\n" . '</tr>' . "\r\n" . '</thead>' . "\r\n" . '<tbody>' . "\r\n\r\n";
		$acct = $db->query('select * from idevaff_peels ORDER BY number');

		if ($acct->rowCount()) {
			while ($qry = $acct->fetch()) {
				$number = $qry['number'];
				$grp = $qry['grp'];
				$title = $qry['name'];

				if ($title == '') {
					$title = 'None';
				}

				$hits = $qry['hits'];
				$conv = $qry['conv'];

				if ($conv) {
					$perc = $conv / $hits;
					$perc = $perc * 100;
					$perc = number_format($perc, 3);
				}
				else {
					$perc = '0.000';
				}

				$gname = $db->prepare('select name from idevaff_groups where id = ?');
				$gname->execute(array($grp));
				$gname = $gname->fetch();
				$gname = $gname['name'];
				echo '<tr>';
				echo '<td>' . $title . '</td>';
				echo '<td>' . $gname . '</td>';
				echo '<td>' . number_format($hits, 0) . '</td>';
				echo '<td>' . number_format($conv, 0) . '</td>';
				echo '<td>' . $perc . '%</td>';
				echo '</tr>';
			}
		}
		else {
			echo '<tr><td>No Statistics To Report</td></tr>';
		}

		echo '</tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n\r\n";
	}
	else if ($_POST['m_type'] == 7) {
		echo '<div class="widget box">' . "\r\n" . '<div class="widget-header"><h4><i class="icon-file-text-alt"></i> Lightbox Statistics</h4></div>' . "\r\n" . '<div class="widget-content">' . "\r\n\r\n" . '<table class="table valign table-striped table-bordered table-highlight-head">' . "\r\n" . '<thead>' . "\r\n" . '<tr>' . "\r\n" . '<th>Lightbox</th>' . "\r\n" . '<th>Marketing Group</th>' . "\r\n" . '<th>Unique Hits</th>' . "\r\n" . '<th>Commissions Delivered</th>' . "\r\n" . '<th>Conversion Rate</th>' . "\r\n" . '</tr>' . "\r\n" . '</thead>' . "\r\n" . '<tbody>' . "\r\n\r\n";
		$acct = $db->query('select * from idevaff_lightboxes ORDER BY number');

		if ($acct->rowCount()) {
			while ($qry = $acct->fetch()) {
				$number = $qry['number'];
				$grp = $qry['grp'];
				$title = $qry['name'];
				$hits = $qry['hits'];
				$conv = $qry['conv'];

				if ($conv) {
					$perc = $conv / $hits;
					$perc = $perc * 100;
					$perc = number_format($perc, 3);
				}
				else {
					$perc = '0.000';
				}

				$image500 = $qry['image500'];
				$gname = $db->prepare('select name from idevaff_groups where id = ?');
				$gname->execute(array($grp));
				$gname = $gname->fetch();
				$gname = $gname['name'];
				echo '<tr>';
				echo '<td><a href="../media/lightboxes/' . $image500 . '" class="fancy-image btn btn-sm btn-warning">View Lightbox</a></td>';
				echo '<td>' . $gname . '</td>';
				echo '<td>' . number_format($hits, 0) . '</td>';
				echo '<td>' . number_format($conv, 0) . '</td>';
				echo '<td>' . $perc . '%</td>';
				echo '</tr>';
			}
		}
		else {
			echo '<tr><td>No Statistics To Report</td></tr>';
		}

		echo '</tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n\r\n";
	}
}

echo "\r\n\r\n";

?>
