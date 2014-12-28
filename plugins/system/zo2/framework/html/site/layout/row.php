<?php
$jDoc = $row->getJdoc();
$jDocName = $jDoc->get('name');
$rowName = $row->get('name');
?>


<section 
    class="<?php echo $row->getClass(); ?>" 
    id="zo2-<?php echo $rowName; ?>">

    <?php
    switch ($jDoc->get('type')) {
        /* Modules position */
        case 'modules':
            echo '<div id="position-' . $jDocName . '" class="modules-' . $row->countModules($jDocName) . '">';
            echo '<jdoc:include type="modules" name="' . $jDocName . '" />';
            echo '</div>';
            break;
        case 'module':
            echo '<div id="mod-' . $jDocName . '" >';
            echo '<jdoc:include type="module" name="' . $jDocName . '" />';
            echo '</div>';
            break;
        case 'component':
            echo '<main id="' . JFactory::getApplication()->input->getWord('option') . '">';
            echo '<jdoc:include type="component" />';
            echo '</main>';
            break;
        case 'message':
            echo '<jdoc:include type="message" />';
            break;
        /* Custom Zo2 layout */
        default:
            $html = new Zo2Html();
            $html->set('row', $row);
            echo $html->fetch('Zo2://html/site/zo2/' . $jDoc->get('type') . '.php');
            break;
    }
    ?>

    <?php if ($row->hasChildren()) : ?>      
        <!-- BEGIN children: <?php echo $rowName; ?> -->
        <?php echo $row->renderChildren(); ?>
        <!-- END children: <?php echo $rowName; ?> -->
    <?php endif; ?>

</section>
