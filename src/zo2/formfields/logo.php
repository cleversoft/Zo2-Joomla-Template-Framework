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
defined('_JEXEC') or die;
class JFormFieldLogo extends JFormField {
    public function getInput()
    {
        $assetField = $this->element['asset_field'] ? (string) $this->element['asset_field'] : 'asset_id';
        $authorField = $this->element['created_by_field'] ? (string) $this->element['created_by_field'] : 'created_by';
        $directory = (string) $this->element['directory'];
        $asset = $this->form->getValue($assetField) ? $this->form->getValue($assetField) : (string) $this->element['asset_id'];
        if ($asset == '')
        {
            $asset = JFactory::getApplication()->input->get('option');
        }

        if ($this->value && file_exists(JPATH_ROOT . '/' . $this->value))
        {
            $folder = explode('/', $this->value);
            $folder = array_diff_assoc($folder, explode('/', JComponentHelper::getParams('com_media')->get('image_path', 'images')));
            array_pop($folder);
            $folder = implode('/', $folder);
        }
        elseif (file_exists(JPATH_ROOT . '/' . JComponentHelper::getParams('com_media')->get('image_path', 'images') . '/' . $directory))
        {
            $folder = $directory;
        }
        else
        {
            $folder = '';
        }

        $link = 'index.php?option=com_media&amp;view=images&amp;tmpl=component&amp;asset=' . $asset . '&amp;author='
            . $this->form->getValue($authorField) . '&amp;fieldid=' . $this->id . '_path' . '&amp;folder=' . $folder;

        $data = array('type' => 'none');
        if (!empty($this->value)) {
            $data = json_decode($this->value, true);
        }

        ?>
        <div class="field-logo-container">
            <input class="logoInput" type="hidden" id="<?php echo $this->id?>" name="<?php echo $this->name?>" value="<?php echo $this->value?>" />
            <div class="radio btn-group logo-type-switcher">
                <button class="btn logo-type-none <?php echo $data['type'] == 'none' ? 'active btn-success' : ''?>">None</button>
                <button class="btn logo-type-image <?php echo $data['type'] == 'image' ? 'active btn-success' : ''?>">Image</button>
                <button class="btn logo-type-text <?php echo $data['type'] == 'text' ? 'active btn-success' : ''?>">Text</button>
            </div>
            <div class="logo-image <?php echo $data['type'] == 'image' ? 'show' : ''?>">
                <input type="hidden" class="basePath" value="<?php JUri::root(true)?>" />
                <input onchange="refreshLogoPreview(this)" type="hidden" id="<?php echo $this->id . '_path'?>" class="logo-path" value="<?php echo $data['path']?>" />
                <div class="btn-group">
                    <span class="logo-preview">
                        <?php if ($data['type'] == 'image' && !empty($data['path'])) : ?>
                        <img src="<?php echo JUri::root(true) . '/' . $data['path']?>" />
                        <?php endif; ?>
                    </span>
                    <a href="<?php echo $link?>" class="btn btn-primary btn-select-logo modal" rel="{handler: 'iframe', size: {x: 800, y: 600}}">Select</a>
                    <a href="#" class="btn btn-danger btn-remove-preview"><i class="icon-remove"></i></a>
                </div>
                <label>Width</label> <input type="text" class="logo-width input-mini" value="<?php echo $data['width']?>" />
                <label>Height</label> <input type="text" class="logo-height input-mini" value="<?php echo $data['height']?>" />
            </div>
            <div class="logo-text <?php echo $data['type'] == 'text' ? 'show' : ''?>">
                <label>Text</label> <input type="text" class="logo-text-input" value="<?php echo $data['text']?>" />
            </div>
        </div>
        <?php
    }
}