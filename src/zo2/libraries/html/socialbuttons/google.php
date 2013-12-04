<?php
/**
 * Zo2 (http://www.zo2framework.org)
 * A powerful Joomla template framework
 *
 * @link        http://www.zo2framework.org
 * @link        http://github.com/aploss/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2013 APL Solutions (http://apl.vn)
 * @license     GPL v2
 */
defined('_JEXEC') or die('Restricted access');
/* Get current Url */
$defDataAttribute = array(
    'href' => JUri::getInstance()->toString()
);
/* Get attributes */
if (isset($args['attributes'])) {
    $dataAtributes = array_merge($defDataAttribute, $args['attributes']);
} else {
    $dataAtributes = $defDataAttribute;
}
/* And generate data attributes */
$dataHtml = '';
foreach ($dataAtributes as $attribute => $value) {
    $dataHtml .= $this->_htmlDataAttrib($attribute, $value);
}
?>
<!-- Google Plusone -->
<div class="g-plusone" <?php echo $dataHtml; ?>></div>