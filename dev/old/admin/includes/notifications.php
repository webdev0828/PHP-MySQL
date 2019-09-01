<?PHP
if (!defined('admin_includes')) { die(); }
?>


<?PHP if (isset($success_message) && $success_message != '') { ?>
<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>
<?PHP echo $success_message; ?></div><?PHP } ?>

<?PHP if (isset($fail_message) && $fail_message != '') { ?>
<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>
<?PHP echo $fail_message; ?></div><?PHP } ?>

<?PHP if (isset($warning_message) && $warning_message != '') { ?>
<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">&times;</button>
<?PHP echo $warning_message; ?></div><?PHP } ?>

<?PHP if (isset($info_message) && $info_message != '') { ?>
<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button>
<?PHP echo $info_message; ?></div><?PHP } ?>
