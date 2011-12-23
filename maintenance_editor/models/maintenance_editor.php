<?php   
defined('C5_EXECUTE') or die('Access Denied.');

class MaintenanceEditor {

	public function checkForMaintenance($view) {
		$pkg = Package::getByHandle('maintenance_editor');
		if($pkg->config('MAINTENANCE_EDITOR_ENABLED')) {
			global $_maintenance_loop_run;
			$page = Page::getCurrentPage();
			$perms = new Permissions($page);
	
			if( (!$page->isAdminArea()) &&
				 ($page->getCollectionPath() != '/login') &&
					(!$perms->canWrite()) ) {
				if(empty($_maintenance_loop_run)) {
					$_maintenance_loop_run = true;
					$page = Page::getCurrentPage();
					$view->render('/maintenance_mode/');
					exit;
				}
			}
		}
	}

}

?>
