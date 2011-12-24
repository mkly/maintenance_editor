<?php   
defined('C5_EXECUTE') or die('Access Denied.');

class MaintenanceEditor {

	public static $use_custom_maintenance_page;
	public static $custom_maintenance_page;
	public static $access_allow_with_edit_permissions;
	public static $access_allow_specific_group;
  public static $access_group;
  public static $access_allow_registration;

	public function checkForMaintenance($view) {
		$pkg = Package::getByHandle('maintenance_editor');
		if($pkg->config('MAINTENANCE_EDITOR_ENABLED')) {
			global $_maintenance_loop_run;
			$page = Page::getCurrentPage();
			$perms = new Permissions($page);
      $user = new User();
			$me = new MaintenanceEditor;
			$me->load();
			/* checks */
			if($page->isAdminArea())
				return true;
			if($page->getCollectionPath() == '/login')
        return true;
      if($me->access_allow_registration &&
        $page->getCollectionPath() == '/register')
          return true;
			if($me->access_allow_with_edit_permissions &&
        $perms->canWrite())
          return true;
      if($me->access_allow_specific_group) {
        Loader::model('group');
        $group = Group::getByID($me->access_group);
        if(is_object($user) && $user->inGroup($group))
          return true;
      }
			if(empty($_maintenance_loop_run)) {
				$_maintenance_loop_run = true;
				$page = Page::getCurrentPage();
				if($me->use_custom_maintenance_page) {
					$page = Page::getByID($me->custom_maintenance_page);
					$view->render($page);
				} else {
					$view->render('/maintenance_mode/');
				}
				exit;
			}
		}
	}

	public function save() {
		$db = Loader::db();
		foreach($this as $key => $val) {
			$db->Execute("INSERT INTO PackageMaintenanceEditor (id, $key) VALUES (1, '?') ON DUPLICATE KEY UPDATE id=1,$key='?'", array($val, $val));
		}
	}

	public function load() {
		$db = Loader::db();
		$fields = $db->GetRow("SELECT * FROM PackageMaintenanceEditor");
		foreach($fields as $key => $val) {
			$this->{$key} = $val;
		}
	}

}
?>
