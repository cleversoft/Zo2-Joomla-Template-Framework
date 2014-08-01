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
//no direct accees
defined('_JEXEC') or die('resticted aceess');
$assets = Zo2Assets::getInstance();
$assets->addScript('vendor/syntaxhighlighter/scripts/shCore.js');
$assets->addScript('vendor/syntaxhighlighter/scripts/shBrush' . ucfirst($this->get('brush')) . '.js');
$assets->addStyleSheet('vendor/syntaxhighlighter/styles/shCore.js');
$assets->addStyleSheet('vendor/syntaxhighlighter/styles/shCoreDefault.js');
?>
<!-- You also need to add some content to highlight, but that is covered elsewhere. -->
<pre class="brush: <?php echo ($this->get('brush')); ?>">
    <?php echo $this->get('content'); ?>
</pre>
<!-- Finally, to actually run the highlighter, you need to include this JS on your page -->
<script type="text/javascript">
    jQuery(document).ready(function() {
        SyntaxHighlighter.all()
    })

</script>