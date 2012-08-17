<?php
defined('C5_EXECUTE') or die('Access Denied.');

class DashboardMaintenanceEditorController extends Controller {

	public function view() {
		$this->redirect('/dashboard/maintenance_editor/enable');
	}
}
