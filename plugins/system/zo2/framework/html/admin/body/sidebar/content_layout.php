<!------------ Layout Builder -------------->
<div class="tab-pane" id="zo2-layout">

    <!-- Sub navbar -->
    <ul id="myTabGeneral" class="nav nav-pills">
        <li class=""><a href="#layout-builder" data-toggle="tab"><?php echo JText::_('ZO2_ADMIN_LAYOUT_BUILDER'); ?></a></li>        
    </ul>
    <!-- Sub navbar content -->
    <div id="myTabFontsContent" class="tab-content">
        <!-- Options -->
        <div class="tab-pane active" id="layout-builder">
            <!-- Description -->
            <?php
            echo Zo2Html::field(
                    'description', null, array(
                'text' => 'Short description about this page',
                'subtext' => '<a href="http://www.zootemplate.com/blog">Document</a>'
            ));
            ?>
            <?php echo Zo2Html::_('admin', 'builder'); ?>           
        </div>
    </div>
</div>