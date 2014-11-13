<!-- Tab Fonts -->
<div class="tab-pane" id="zo2-fonts">
    <h2><?php echo JText::_('ZO2_ADMIN_FONT_OPTION'); ?></h2>
    <div class="zo2-divider"></div>
    <!-- Description -->
    <?php
    echo Zo2Html::field(
        'description', null, array(
            'text' => 'These are the options for fonts used within the template',
            'subtext' => '<a href="http://www.zootemplate.com/blog">Document</a>'
        ));
    ?>
    <!-- Body font-->
    <?php
    echo Zo2Html::field(
        'font', array(
        'label' => JText::_('ZO2_ADMIN_FONT_BODY'),
    ), array(
        'name' => 'body_font',
        'id' => 'body_font',
        'value' => Zo2Factory::get('body_font')
    ));
    ?>

    <!-- Body font-->
    <?php
    echo Zo2Html::field(
        'font', array(
        'label' => JText::_('ZO2_ADMIN_FONT_H1'),
    ), array(
        'name' => 'h1_font',
        'id' => 'h1_font',
        'value' => Zo2Factory::get('h1_font')
    ));
    ?>

    <!-- Body font-->
    <?php
    echo Zo2Html::field(
        'font', array(
        'label' => JText::_('ZO2_ADMIN_FONT_H2'),
    ), array(
        'name' => 'h2_font',
        'id' => 'h2_font',
        'value' => Zo2Factory::get('h2_font')
    ));
    ?>

    <!-- Body font-->
    <?php
    echo Zo2Html::field(
        'font', array(
        'label' => JText::_('ZO2_ADMIN_FONT_H3'),
    ), array(
        'name' => 'h3_font',
        'id' => 'h3_font',
        'value' => Zo2Factory::get('h3_font')
    ));
    ?>

    <!-- Body font-->
    <?php
    echo Zo2Html::field(
        'font', array(
        'label' => JText::_('ZO2_ADMIN_FONT_H4'),
    ), array(
        'name' => 'h4_font',
        'id' => 'h4_font',
        'value' => Zo2Factory::get('h4_font')
    ));
    ?>

    <!-- Body font-->
    <?php
    echo Zo2Html::field(
        'font', array(
        'label' => JText::_('ZO2_ADMIN_FONT_H5'),
    ), array(
        'name' => 'h5_font',
        'id' => 'h5_font',
        'value' => Zo2Factory::get('h5_font')
    ));
    ?>

    <!-- Body font-->
    <?php
    echo Zo2Html::field(
        'font', array(
        'label' => JText::_('ZO2_ADMIN_FONT_H6'),
    ), array(
        'name' => 'h6_font',
        'id' => 'h6_font',
        'value' => Zo2Factory::get('h6_font')
    ));
    ?>
    <div class="font-container">
        <div class="control-group font-deck-code" style="margin-top:20px">
            <?php
            echo Zo2Html::field(
            'textarea', array(
            'label' => JText::_('ZO2_ADMIN_FONT_FONTDESK_CODE'),
            ), array(
            'name' => 'jform[params][fontdeck_code]',
            'rows' => 10,
            'cols' => 20,
            'value' => Zo2Factory::get('fontdeck_code')
            ));
            ?>
        </div>
    </div>
</div>
