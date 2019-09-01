<?PHP
$control_panel_session = true;
include_once("includes/control_panel.php");
// -------------------------------------------------

// Renaming Pages
// You can rename this page to be anything you want.  If you rename it, change the display
// page below from newpage.tpl to whatever you've renamed this file to be.  Then go and
// rename newpage.tpl to have a matching filename as well.

// Adding More Pages
// To add more pages, simply replicate this file structure as many times as you like
// using different file/page names.

// You can define variables here and assign them to smarty variables.
// Example:
// $result = 'Sample value';
// $smarty->assign('sample_value', $result);

// Now place {$sample_value} into your .tpl file and it will output the value of $result.
// This works for querying the database as well.

// You can also just hard-code the template with text or define it yourself here like this.

$smarty->assign('sample_text', 'This is just a sample line of text.');

// Make sure this setting calls the correct template file.
$smarty->display('terms.tpl');
?>
