<div class="zo2-button-reddit share">
    <a href="http://www.reddit.com/submit" 
       onclick="window.location = 'http://www.reddit.com/submit?url=' + encodeURIComponent(<?php echo $this->get('url'); ?>);
               return false">
        <img src="http://www.reddit.com/static/<?php echo $this->get('icon'); ?>" alt="submit to reddit" border="0" />
    </a>
</div>