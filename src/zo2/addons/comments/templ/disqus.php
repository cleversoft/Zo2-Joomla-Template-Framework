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

