<?php
defined('C5_EXECUTE') or die('Access Denied.');

class FormGroupSelectorHelper {

	public function selectGroup($name, $selected = false, $tagAttributes = false) {
		Loader::model('groups');
		$form = Loader::helper('form');
		$gl = new GroupList(false, false, true);
		$groups = $gl->getGroupList();
		unset($gl);
		$options = array();
		foreach($groups as $group) {
			if($group->getGroupID() != 1) {
				$options[$group->getGroupID()] = $group->getGroupName();
			}
		}
		unset($groups);
		return $form->select($name, $options, $selected, $tagAttributes);
	}

}
