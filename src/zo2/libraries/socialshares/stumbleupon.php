<!-- Place this tag where you want the su badge to render -->
<su:badge layout="<?php echo $this->get('layout'); ?>"></su:badge>

<!-- Place this snippet wherever appropriate -->
<script type="text/javascript">
    (function() {
        var li = document.createElement('script');
        li.type = 'text/javascript';
        li.async = true;
        li.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + '//platform.stumbleupon.com/1/widgets.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(li, s);
    })();
</script>