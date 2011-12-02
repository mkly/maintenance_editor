<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>

<div style="width: 680px">

<h1><span><?php echo t('Maintenance Editor') ?></span></h1>
<div class="ccm-dashboard-inner">
<form method="post" action="<?php echo $this->url('/dashboard/maintenance_editor', 'save_settings'); ?>">
	<h2><?php echo t('Enable/Disable Maintenance Editor') ?></h2>
	<p><?php echo t('When enabled this will direct all visitors of your site to the maintenance page except those who have access permissions to edit the page they are visiting') ?></p>
	<p><strong><?php echo t('NOTE')?>: </strong><?php echo t('You should not use the built in Concrete5 maintenance mode when using this.')?></p>
	<?php echo $form->checkbox('enabled', 'enabled', $enabled) ?>
	<?php echo $form->label('enabled', t('Enable Maintenance Editor?')); ?>
	<br />
	<?php echo $form->submit('update', 'Update Settings'); ?>
	
</form>
</div>
</div>
