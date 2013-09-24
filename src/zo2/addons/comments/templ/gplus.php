<?php
/**
 * Zo2 (http://www.zo2framework.org)
 * A powerful Joomla template framework
 *
 * @link        http://www.zo2framework.org
 * @link        http://github.com/aploss/zo2
 * @author      Duc Nguyen <ducntv@gmail.com>
 * @author      Hiepvu <vqhiep2010@gmail.com>
 * @copyright   Copyright (c) 2013 APL Solutions (http://apl.vn)
 * @license     GPL v2
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
