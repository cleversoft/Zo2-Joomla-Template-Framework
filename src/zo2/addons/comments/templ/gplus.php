<?php
/**
 * Zo2 Framework (http://zo2framework.org)
 *
 * @link         http://github.com/aploss/zo2
 * @package      Zo2
 * @author       Hiepvu
 * @copyright    Copyright ( c ) 2008 - 2013 APL Solutions
 * @license      http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 */
 //no direct accees
defined ('_JEXEC') or die ('resticted aceess');
?>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('#gplus').html('<div class="g-comments" data-width="'+window.comment_width+'" data-href="<?php echo $url;?>" data-first_party_property="BLOGGER" data-view_type="FILTERED_POSTMOD">Loading Google+ Comments ...</div>');
    });
</script>
<script async type="text/javascript" src="//apis.google.com/js/plusone.js?callback=gpcb"></script>
