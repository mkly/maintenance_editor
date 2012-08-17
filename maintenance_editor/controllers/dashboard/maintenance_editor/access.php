<?php
defined('C5_EXECUTE') or die('Access Denied.');

class DashboardMaintenanceEditorAccessController extends Controller {

	public function view() {
		$this->init();
	}

	public function save_settings() {
		$this->init();
		Loader::model('maintenance_editor', 'maintenance_editor');
		$me = new MaintenanceEditor();
		$me->access_allow_with_edit_permissions = intval($this->post('access_allow_with_edit_permissions'));
		$me->access_allow_specific_group = intval($this->post('access_allow_specific_group'));
		$me->access_group = intval($this->post('access_group'));
		$me->save();
		$this->redirect('/dashboard/maintenance_editor/access', 'settings_updated');
	}

	public function settings_updated() {
		$this->init();
		$this->set('message', t('Settings Updated'));
	}

	protected function init() {
		$this->set('form', Loader::helper('form'));
		$this->set('group_selector_form', Loader::helper('form/group_selector', 'maintenance_editor'));
		Loader::model('maintenance_editor', 'maintenance_editor');
		$me = new MaintenanceEditor();
		$me->load();
		$this->set('access_allow_with_edit_permissions', $me->access_allow_with_edit_permissions);
		$this->set('access_allow_specific_group', $me->access_allow_specific_group);
		$this->set('access_group', $me->access_group);
	}

}
