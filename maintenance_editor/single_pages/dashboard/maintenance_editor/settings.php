<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>

<?php if(version_compare(Config::get('SITE_APP_VERSION'), 5.5, 'lt')): ?>

<div style="width: 580px;">
<h1><span><?php echo t('Maintenance Editor Settings') ?></span></h1>
<div class="ccm-dashboard-inner">
<form method="post" action="<?php echo $this->url('/dashboard/maintenance_editor/settings', 'save_settings'); ?>">
	<h2><?php echo t('Additional Settings') ?></h2>
	<?php echo $form->checkbox('access_allow_registration', 1, $access_allow_registration) ?>
	<span><?php echo t('Allow registration while in maintenance mode') ?></span>
	<br />
	<br />
	<?php echo $form->submit('update', t('Update Settings')) ?>
</form>
</div>
</div>
<?php else: ?>
<?php $cdn = Loader::helper('concrete/dashboard'); ?>
<?php echo $cdn->getDashboardPaneHeaderWrapper(t('Maintenance Editor Settings'), false, 'span10 offset2', false) ?>
	<form method="post" action="<?php echo $this->url('/dashboard/maintenance_editor/settings', 'save_settings'); ?>">
		<div class="ccm-pane-body">
			<h3><?php echo t('Additional Settings') ?></h2>
			<?php echo $form->checkbox('access_allow_registration', 1, $access_allow_registration) ?>
			<span><?php echo t('Allow registration while in maintenance mode') ?></span>
		</div>
		<div class="ccm-pane-footer">
			<?php echo $form->submit('update', t('Update Settings')) ?>
		</div>
<?php endif; ?>
