<?php
if (!isset($themes)) $themes = array();
?>
<div id="zo2_themes_container">
    <input type="hidden" value="<?php echo htmlspecialchars($this->value)?>" name="<?php echo $this->name?>" id="<?php echo $this->id?>" />
    <ul id="zo2_themes">
        <?php foreach ($themes as $theme) : ?>
        <li class="<?php echo $theme == $this->value ? 'active' : ''?>" data-zo2-theme="<?php echo $theme?>">
            <div class="theme_title"><?php echo ucfirst($theme)?></div>
            <div class="theme_thumbnail">
                <img src="<?php echo $imgUri . $theme . '.jpg'?>">
            </div>
        </li>
        <?php endforeach ?>
    </ul>
</div>