<?php
defined ('_JEXEC') or die ('resticted aceess');
//access zo2 framework
/** @var Zo2Framework $zo2 */
$zo2 = $this->zo2;
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;
/* @var $this JDocumentHTML */
if(!class_exists('Zo2Framework')) die('Zo2Framework not found');
    $zo2 = Zo2Framework::getInstance();
    $templateName = $this->template;
    $layoutName = $zo2->getCurrentPage();
    $layout = new Zo2Layout($templateName, $layoutName);
    echo $layout->compile();
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <jdoc:include type="head" />
        <?php echo $this->zo2->addHead(); ?>
    </head>
    <body>
        <div class="zo2-body">
            <div class="container">
                <!-- Header -->
                <div class="header">
                    <div class="header-inner clearfix">
                        <jdoc:include type="modules" name="top" style="xhtml"/>
                    </div>
                </div>
                <!--Navigation-->
                <div class="wrap zo2-menu navbar navbar-static" id="zo2-menu">
                    <div class="navbar-inner">
                        <div class="container">
                            <?php echo $this->zo2->displayMegaMenu('mainmenu', $this->template); ?>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <!--Begin Sidebar-->
                    <div id="z2-begin-sidebar" class="z2-begin-sidebar"></div>
                    <!--Content-->
                    <div id="zo2-content" class="z2-content">
                        <jdoc:include type="message" />
                        <jdoc:include type="component" />
                    </div>
                    <!--Right Sidebar-->
                    <div id="zo2-right-sidebar" class="z2-right-siderbar"></div>
                </div>
                <jdoc:include type="modules" name="bottom" />
            </div>

        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="container">
                <hr />
                <jdoc:include type="modules" name="footer" style="none" />
            </div>
        </div>
        <jdoc:include type="modules" name="debug" style="none" />
    </body>
</html>
