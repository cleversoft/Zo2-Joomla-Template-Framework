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
    <div class="img">
        <img src="<?php echo $this->baseurl . '/templates/zo2_hallo/assets/zo2/images/404_page.png'?>"/>
    </div>
    <div id="outline">
        <div id="errorboxoutline">
            <h1 id="errorboxheader"><?php echo $this->error->getCode(); ?> - <?php echo $this->error->getMessage(); ?></h1>
            <div id="errorboxbody">
                <h3><?php echo JText::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?></h3>
                <ol>
                    <li><?php echo JText::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
                    <li><?php echo JText::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?></li>
                    <li><?php echo JText::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?></li>
                    <li><?php echo JText::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
                    <li><?php echo JText::_('JERROR_LAYOUT_REQUESTED_RESOURCE_WAS_NOT_FOUND'); ?></li>
                    <li><?php echo JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></li>
                </ol>
                <a class="btn btn-success" href="<?php echo $this->baseurl; ?>/index.php" title="<?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>">Go To Home</a>

                
            </div>
        </div>
    </div>
</div>
</body>
</html>
