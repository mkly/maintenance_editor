<?php
defined('C5_EXECUTE') or die('Access Denied.');

class DashboardMaintenanceEditorSelectPageController extends Controller {

	public function view() {
		$this->init();
	}

	public function save_settings() {
		$this->init();
		Loader::model('maintenance_editor', 'maintenance_editor');
		$me = new MaintenanceEditor();
		if($this->post('maintenance_page') == 'use_custom_maintenance_page') {
			$me->use_custom_maintenance_page = 1;
		} else {
			$me->use_custom_maintenance_page = 0;
		}
		$me->custom_maintenance_page = intval($this->post('custom_maintenance_page')) ? intval($this->post('custom_maintenance_page')) : HOME_CID;
		$me->save();
		$this->redirect('/dashboard/maintenance_editor/select_page', 'settings_updated');
	}

	public function settings_updated() {
		$this->init();
		$this->set('message', t('Settings Updated'));
	}

	protected function init() {
		$this->set('form', Loader::helper('form'));
		//$this->set('page_selector_form', Loader::helper('form/page_selector', 'maintenance_editor'));
		$this->set('page_selector_form', Loader::helper('form/page_selector'));
		Loader::model('maintenance_editor', 'maintenance_editor');
		$me = new MaintenanceEditor();
		$me->load();
		if($me->use_custom_maintenance_page) {
			$this->set('maintenance_page', 'use_custom_maintenance_page');
		} else {
			$this->set('maintenance_page', 'use_default_maintenance_page');
		}
		$this->set('custom_maintenance_page', $me->custom_maintenance_page);
	}

}
