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
<div id="fb-root"></div>
<div id="fb-comments">Loading Facebook Comments ...</div>
<script type="text/javascript">
    jQuery(document).ready(function($)
    {
        $('#fb-comments').html('<div class="fb-comments" data-width="'+window.comment_width+'" data-href="<?php echo $url;?>" data-num-posts="20" data-colorscheme="light" data-mobile="auto"></div>');
    });
</script>
<script async type="text/javascript" src="//connect.facebook.net/en_US/all.js#xfbml=1">FB.init();</script>