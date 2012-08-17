<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>

<?php if(version_compare(Config::get('SITE_APP_VERSION'), 5.5, 'lt')): ?>
<script type="text/javascript" charset="utf-8">
$(function() {
	//$('.ccm-sitemap-clear-selected-page').remove();
	toggle_display_page_select();
	$('input[name=maintenance_page]').change(function() {
		toggle_display_page_select();
	});
	function toggle_display_page_select() {
		if($('input[value=use_custom_maintenance_page]').is(':checked')) {
			$('.ccm-summary-selected-item').show();
		} else {
			$('.ccm-summary-selected-item').hide();
		}
	}

});
</script>
<div style="width: 580px">

<h1><span><?php echo t('Select Maintenance Page') ?></span></h1>
<div class="ccm-dashboard-inner">
<form method="post" action="<?php echo $this->url('/dashboard/maintenance_editor/select_page', 'save_settings'); ?>">
	<h2><?php echo t('Select Page to Display in Maintenance Mode')  ?></h2>
	<p><?php echo t('Use the default concrete5 maintenance page or select another page to direct visitors to.') ?></p>
	<?php echo $form->radio('maintenance_page', 'use_default_maintenance_page', $maintenance_page) ?> <?php echo t('Use default maintenance page') ?><br />
	<?php echo $form->radio('maintenance_page', 'use_custom_maintenance_page', $maintenance_page) ?> <?php echo t('Use custom maintenance page') ?><br />
	<?php echo $page_selector_form->selectPage('custom_maintenance_page', $custom_maintenance_page); ?>
	<br />
	<?php echo $form->submit('update', t('Update Settings')); ?>
</form>
</div>
<?php else: ?>
<script type="text/javascript" charset="utf-8">
$(function() {
	//$('.ccm-sitemap-clear-selected-page').remove();
	toggle_display_page_select();
	$('input[name=maintenance_page]').change(function() {
		toggle_display_page_select();
	});
	function toggle_display_page_select() {
		if($('input[value=use_custom_maintenance_page]').is(':checked')) {
			$('.ccm-summary-selected-item').show();
		} else {
			$('.ccm-summary-selected-item').hide();
		}
	}

});
</script>
<?php $cdn = Loader::helper('concrete/dashboard'); ?>
<?php echo $cdn->getDashboardPaneHeaderWrapper(t('Select Maintenance Page'), false, 'span10 offset2', false) ?>
<form method="post" action="<?php echo $this->url('/dashboard/maintenance_editor/select_page', 'save_settings'); ?>">
	<div class="ccm-pane-body">
		<h3><?php echo t('Select Page to Display in Maintenance Mode') ?></h3>
		<p><?php echo t('Use the default concrete5 maintenance page or select another page to direct visitors to.') ?></p>
		<?php echo $form->radio('maintenance_page', 'use_default_maintenance_page', $maintenance_page) ?> <?php echo t('Use default maintenance page') ?><br />
		<?php echo $form->radio('maintenance_page', 'use_custom_maintenance_page', $maintenance_page) ?> <?php echo t('Use custom maintenance page') ?><br />
		<?php echo $page_selector_form->selectPage('custom_maintenance_page', $custom_maintenance_page); ?>
	</div>
	<div class="ccm-pane-footer">
		<?php echo $form->submit('update', t('Update Settings')); ?>
	</div>
</form>
<?php echo $cdn->getDashboardPaneFooterWrapper(false); ?>
<?php endif; ?>
