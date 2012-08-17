<?php
defined('C5_EXECUTE') or die('Access Denied.');

class DashboardMaintenanceEditorSettingsController extends Controller {

	public function view() {
		$this->init();
	}

	public function init() {
		$this->set('form', Loader::helper('form'));
		Loader::model('maintenance_editor', 'maintenance_editor');
		$me = new MaintenanceEditor();
		$me->load();
		$this->set('access_allow_registration', $me->access_allow_registration);
	}

	public function save_settings() {
		$this->init();
		Loader::model('maintenance_editor', 'maintenance_editor');
		$me = new MaintenanceEditor();
		$me->access_allow_registration = intval($this->post('access_allow_registration'));
		$me->save();
		$this->redirect('/dashboard/maintenance_editor/settings', 'settings_updated');
	}

	public function settings_updated() {
		$this->init();
		$this->set('message', t('Settings Updated'));
	}
}
