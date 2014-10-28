<label 
    class="control-label zo2-label <?php echo (isset($this->label['class'])) ? $this->label['class'] : ''; ?>"
    for="<?php echo $this->data['name']; ?>"
    >    
        <?php echo $this->label['label']; ?>
</label>
<div class="controls">
    <input 
        type="text"
        id="<?php echo $this->data['name']; ?>"        
        <?php foreach ($this->data as $key => $value) : ?>
            <?php if (!empty($value)) : ?>
                <?php echo $key . '="' . $value . '"'; ?>
            <?php endif; ?>
        <?php endforeach; ?>
        />
</div>