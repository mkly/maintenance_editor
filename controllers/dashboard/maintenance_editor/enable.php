<?php
defined('C5_EXECUTE') or die('Access Denied.');

class DashboardMaintenanceEditorEnableController extends Controller {

	protected static $pkg;

	public function on_start() {
		$this->pkg = Package::getByHandle('maintenance_editor');
	}

	public function view() {
		$this->set('form', Loader::helper('form'));
		$this->set('enabled', $this->pkg->config('MAINTENANCE_EDITOR_ENABLED'));
	}

	public function save_settings() {
		$this->set('form', Loader::helper('form'));
		$this->set('enabled', $this->pkg->config('MAINTENANCE_EDITOR_ENABLED'));
		$enabled = $this->post('enabled');
		if($enabled == 'enabled') {
			$this->pkg->saveConfig('MAINTENANCE_EDITOR_ENABLED', '1');
			$this->redirect('/dashboard/maintenance_editor/enable', 'settings_updated');
		} else {
			$this->pkg->saveConfig('MAINTENANCE_EDITOR_ENABLED', '0');
			$this->redirect('/dashboard/maintenance_editor/enable', 'settings_updated');
		}
	}

	public function settings_updated() {
		$this->set('form', Loader::helper('form'));
		$this->set('enabled', $this->pkg->config('MAINTENANCE_EDITOR_ENABLED'));
		$this->set('message', t('Settings Updated'));
	}

}
