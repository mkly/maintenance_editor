<?php      

defined('C5_EXECUTE') or die(_("Access Denied."));

class MaintenanceEditorPackage extends Package {

	protected $pkgHandle = 'maintenance_editor';
	protected $appVersionRequired = '5.4.1';
	protected $pkgVersion = '1.0.6';

	public function getPackageDescription() {
		return t("Allow users with edit permissions to view and edit pages while in maintenance mode.");
	}
	
	public function getPackageName() {
		return t("Maintenance Editor");
	}
	
	public function install() {
		$pkg = parent::install();

		Loader::model('single_page');
		$sp = SinglePage::add('/dashboard/maintenance_editor', $pkg);
		$sp->update(array('cName' => t('Maintenance Editor'), 'cDescription' => t('Allow editing while in maintenance mode')));
		$sp = SinglePage::add('/dashboard/maintenance_editor/enable', $pkg);
		$sp->update(array('cName' => t('Enable/Disable')));
		$pkg->saveConfig('MAINTENANCE_EDITOR_ENABLED', '0');	
	}

	public function uninstall() {
		parent::uninstall();

	}

	public function on_start() {
		Events::extend('on_before_render', 'MaintenanceEditor', 'checkForMaintenance', DIR_BASE . '/packages/maintenance_editor/models/maintenance_editor.php');
	}

}
