<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>

<?php if(version_compare(Config::get('SITE_APP_VERSION'), 5.5, 'lt')): ?>
<script type="text/javascript" charset="utf-8">
$(function() {
	function display_group_select() {
		if($('#access_allow_specific_group').is(':checked')) {
			$('#access_group').show();
		} else {
			$('#access_group').hide();
		}
	}
	display_group_select();
	$('#access_allow_specific_group').change(function() {
		display_group_select();
	});
});
</script>
<div style="width:580px">
<h1><span><?php echo t('Maintenance View Access') ?></span></h1>
<div class="ccm-dashboard-inner">
<form method="post" action="<?php echo $this->url('/dashboard/maintenance_editor/access', 'save_settings'); ?>">
	<h2><?php echo t('Set Access Permissions While in Maintenance Mode') ?></h2>
	<p><?php echo t('Specify which users can view pages while in maintenance mode') ?></p>
	<?php echo $form->checkbox('access_allow_with_edit_permissions', 1, $access_allow_with_edit_permissions) ?>
	<span><?php echo t('Users With Page Edit Permissions') ?></span><br />
	<?php echo $form->checkbox('access_allow_specific_group', 1, $access_allow_specific_group) ?>
	<span><?php echo t('Specific Group') ?></span><br />
	<?php echo $group_selector_form->selectGroup('access_group', $access_group, array('style' => 'display: block')) ?>
	<br />
	<?php echo $form->submit('update', t('Update Settings')); ?>
</form>
</div>
</div>
<?php else: ?>
<script type="text/javascript" charset="utf-8">
$(function() {
	function display_group_select() {
		if($('#access_allow_specific_group').is(':checked')) {
			$('#access_group').show();
		} else {
			$('#access_group').hide();
		}
	}
	display_group_select();
	$('#access_allow_specific_group').change(function() {
		display_group_select();
	});
});
</script>
<?php $cdn = Loader::helper('concrete/dashboard'); ?>
<?php echo $cdn->getDashboardPaneHeaderWrapper(t('Maintenance View Access'), false, 'span10 offset2', false) ?>
<form method="post" action="<?php echo $this->url('/dashboard/maintenance_editor/access', 'save_settings'); ?>">
	<div class="ccm-pane-body">
		<h3><?php echo t('Set Access Permissions While in Maintenance Mode') ?></h2>
		<p><?php echo t('Specify which users can view pages while in maintenance mode') ?></p>
		<?php echo $form->checkbox('access_allow_with_edit_permissions', 1, $access_allow_with_edit_permissions) ?>
		<span><?php echo t('Users With Page Edit Permissions') ?></span><br />
		<?php echo $form->checkbox('access_allow_specific_group', 1, $access_allow_specific_group) ?>
		<span><?php echo t('Specific Group') ?></span><br />
		<?php echo $group_selector_form->selectGroup('access_group', $access_group, array('style' => 'display: block')) ?>
	</div>
	<div class="ccm-pane-footer">
		<?php echo $form->submit('update', t('Update Settings')); ?>
	</div>
</form>
<?php echo $cdn->getDashboardPaneFooterWrapper(false); ?>
<?php endif; ?>
