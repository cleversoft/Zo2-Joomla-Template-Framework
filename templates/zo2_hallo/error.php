<?php
/**
 * @package     Joomla.Site
 * @subpackage  Template.system
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
if (!isset($this->error))
{
    $this->error = JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
    $this->debug = false;
}
//get language and direction
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;
$templateName = $this->template;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <title><?php echo $this->error->getCode(); ?> - <?php echo $this->title; ?></title>
    <link rel="stylesheet" href="<?php echo $this->baseurl . '/templates/zo2_hallo/assets/zo2/css/error.css'?>" type="text/css" />
    <?php if ($this->direction == 'rtl') : ?>
        <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/zo2_hallo/assets/zo2/css/error_rtl.css" type="text/css" />
    <?php endif; ?>
    <?php
    $debug = JFactory::getConfig()->get('debug_lang');
    if (JDEBUG || $debug)
    {
        ?>
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/media/cms/css/debug.css" type="text/css" />
    <?php
    }
    ?>
</head>
<body class="zo2-error">
<div>

    <div id="outline">
        <div id="errorboxoutline">
            <h1 id="errorboxheader"><?php echo $this->error->getCode(); ?></h1>
            <div id="errorboxbody">
                <h3>Oops, This Page Could Not Be Found!</h3>
      
                <a class="btn btn-success" href="<?php echo $this->baseurl; ?>/index.php" title="<?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>">back to homepage</a>

                
            </div>
        </div>
    </div>
</div>
</body>
</html>
