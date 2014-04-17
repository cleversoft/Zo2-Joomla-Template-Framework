<?php
/**
 * Zo2 (http://www.zo2framework.org)
 * A powerful Joomla template framework
 *
 * @link        http://www.zo2framework.org
 * @link        http://github.com/aploss/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2013 APL Solutions (http://apl.vn)
 * @license     GPL v2
 */
defined('_JEXEC') or die;
?>
<div class="span12 overview-details">
    <div class="row-fluid">
        <div class="span3">
            <div class="control-group">
                <div class="control-label">
                    <?php echo $this->form->getLabel('title'); ?>
                </div>
                <div class="controls">
                    <?php echo $this->form->getInput('title'); ?>
                </div>
            </div>
        </div>
        <div class="span3">
            <div class="control-group">
                <div class="control-label">
                    <?php echo $this->form->getLabel('template'); ?>
                </div>
                <div class="controls">
                    <?php echo $this->form->getInput('template'); ?>
                </div>
            </div>
        </div>
        <div class="span3">
            <div class="control-group">
                <div class="control-label">
                    <strong>Select profile</strong>
                </div>
                <div class="controls">
                    <select class="form-control">
                        <option>profile 1</option>
                        <option>profile 2</option>
                        <option>profile 3</option>
                        <option>profile 4</option>
                        <option>profile 5</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="span3">
            <div class="control-group">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Profile name">
                        <span class="input-group-btn">
                            <button class="btn btn-default">Create</button>
                        </span>
                </div>
            </div>
        </div>
        <div class="span1">
            <div class="control-group">
                <div class="control-label">
                    <?php echo $this->form->getLabel('client_id'); ?>
                </div>
                <div class="controls">
                    <?php echo $this->form->getInput('client_id'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="template-preview span12">
    <div class="row-fluid">
        <div class="span4">
            <img src="http://www.zootemplate.com/wp-content/uploads/2013/12/zt_hallo_responsive-1024x437.png" style="max-width:323px;" />
            <div class="template-description">
                <h3>Zo2 Hallo</h3>
                <p>The Zo2 Hallo is a clean modern responsive design that is a great place to start when building your custom Zo2 powered template.</p>
                <h3>What is the Zo2 Framework?</h3>
                <p>Zo2 Framework is a free, open-source, highly extensible, search-engine optimized Joomla Templates Framework featuring responsive web design, bootstrap framework, Font Awesome Icons, styling for popular extensions, and a whole community behind it. Zo2 Framework comes with Drag & drop layout builder which allows you to create any number of stunning and unique layouts up to 5x faster than traditional way.</p>
            </div>
        </div>
        <div class="span4">

            <h3>Key Features</h3>
            <ul>
                <li>100% Responsive & Retina Ready</li>
                <li>Drag & Drop Layout Builder</li>
                <li>Mega & Off Canvas Menus</li>
                <li>LESS Support</li>
                <li>Tons of Short code</li>
                <li>CSS3 animations</li>
                <li>HTML5</li>
                <li>Powerful Admin Panel</li>
                <li>Search Engine Optimized</li>
                <li>Social Sharing Integration</li>
                <li>Cross-Browser Support</li>
            </ul>
            <h3>
                Credit Links
            </h3>
            <ul>
                <li>
                    <a title="Bootstrap" href="http://getbootstrap.com/">Bootstrap</a> is a front-end framework of Twitter, Inc.
                </li>
                <li><a title="FontAwesome" href="http://fontawesome.io/">FontAwesome</a> font licensed under SIL OFL 1.1.</li>
                <li>Zo2 Hallo designed by <a href="http://www.zootemplate.com" title="zootemplate">Zootemplate.com</a></li>
            </ul>
        </div>
        <div class="span4">
            <div id="updater" class="alert">
                <div id="updater-bar">Zo2 v<span><?php echo Zo2Framework::getManifest()->version; ?></span></div>
                <?php
                $update = false;
                switch (Zo2Framework::checkVersion()) {
                    case -1:
                        $update = true;
                        $message = 'Your current is out of date. Newer version is Available.';
                        break;
                    case 0:
                        $message = 'Your current updated.';
                        break;
                    case 1:
                        $message = 'You are using alien version !';
                        break;
                }
                ?>
                <strong><?php echo $message; ?></strong>.
                <?php if ($update) { ?>
                    <div id="updater-desc">
                        Please <a href="index.php?option=com_installer&amp;view=update" class="btn btn-success btn-small"><i class="icon-white icon-circle-arrow-down"></i> download</a> the latest version now.
                    </div>
                <?php } ?>
            </div>
            <div class="zo2-tip well" style="display: block;">
                <div class="zo2-tip-bar">
                    <h3>Getting More Help</h3>
                </div>
                <p>Zo2 comes with an extremely advanced admin panel allowing users to quickly and easy customize the template.  If you would like to find out more about these settings and the Zo2 Framework in general please checkout these links:</p>
                <ul>
                    <li>Official website: <a target="_blank" href="http://zo2framework.org" title="Zo2 Template Framework">http://zo2framework.org</a></li>
                    <li><a target="_blank" href="http://zo2framework.org/index.php/license-usage" title="License &amp; Usage">License &amp; Usage</a></li>
                    <li>Documents <a target="_blank" href="http://docs.zo2framework.org/" title="Zo2 Documents">http://docs.zo2framework.org/</a></li>
                    <li>Fork Zo2 on Github: <a target="_blank" href="https://github.com/aploss/zo2" title="Fork Zo2 on Github">https://github.com/aploss/zo2</a></li>
                    <li>Demo Zo2 Hallo &ndash; a Blank Template: <a target="_blank" href="http://demo.zo2framework.org/" title="Demo Zo2 Blank Template">http://demo.zo2framework.org/</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

