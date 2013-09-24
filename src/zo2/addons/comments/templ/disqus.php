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
<?php if ($params->get('disqus_shortname')) :?>
<div class="embed-container clearfix" id="disqus_thread">Loading Disqus Comments ...</div>
<script type="text/javascript">
    var disqus_shortname = '<?php echo $params->get("disqus_shortname"); ?>';
    (function(d) {
        var dsq = d.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' +disqus_shortname+ '.disqus.com/embed.js";';
        (d.getElementsByTagName('head')[0] || d.getElementsByTagName('body')[0]).appendChild(dsq)
    })(document);
</script>
<?php else : ?>
    <h2>You must enter  your Disqus "shortname"</h2>
<?php endif;

