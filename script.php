<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class plgsystemzo2InstallerScript
{
	function update($parent) 
	{	
		$db 	= JFactory::getDBO();
		$installer = JInstaller::getInstance();
        $path = $installer->getPath('source');
		$installer->install($path . '/templates/zo2_hallo');
		$query = 'UPDATE #__extensions SET enabled=1 WHERE type="plugin" AND element="zo2" AND folder="system"';
		$db->setQuery($query);
		$db->query();
	}
	
	public function install($parent)
	{
		$db 	= JFactory::getDBO();
		$installer = JInstaller::getInstance();
        $path = $installer->getPath('source');
		$installer->install($path . '/templates/zo2_hallo');
		$query = 'UPDATE #__extensions SET enabled=1 WHERE type="plugin" AND element="zo2" AND folder="system"';
		$db->setQuery($query);
		$db->query();
	}
}