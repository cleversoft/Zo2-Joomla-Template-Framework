<div class="tab-pane" id="zo2-about">
    <div class="row-fluid">
        <div class="span12">
            <div class="row-fluid">
                <div class="span12">
                    <h2>Information Zo2 Framework</h2>
                    <div class="zo2-divider"></div>
                    <p>Zo2 Framework is a Joomla template framework, built from scratch, and heavily support Bootstrap framework and LESS.</p>
                    <p>Zo2 Framework comes with Drag & drop layout builder which allows you to create any number of stunning and unique layouts up to 5x faster than traditional way.</p>
                    <p><a class="btn btn-primary btn-large" href="http://www.zootemplate.com/zo2" target="_blank">Learn more Zo2Framework</a></p>
                    <div class="zo2-divider"></div>
                    <h3>Version</h3>
                    <p>Current version: <?php echo Zo2Framework::getInstance()->getManifest()->version; ?></p>
                    <?php
                    $version = Zo2Framework::getInstance()->checkVersion();
                    switch ($version['compare'])
                    {
                        case '-1':
                            echo '<span class="label label-important">Your Zo2 version is out of date.</span><br />';
                            break;
                        case '0':
                            echo '<span class="label label-success">Your Zo2 version is up to date.</span><br />';
                            break;
                        case '1':
                            echo '<span class="label label-info">Your Zo2 version newer than us.</span><br />';
                            break;
                    }
                    ?>
                    <p><strong>Latest version: <?php echo $version['latestVersion']; ?></strong></p>
                    <p><strong>Attention:</strong> Before you start updating, please refer to <a href="http://www.zootemplate.com/blog" target="_blank">important changes</a> to check if there are any additional instructions for the version which you want to install.</p>
                    <p>Do not omit this step: in case you have made any changes directly in the theme files, backup all your changes. You can restore those changes after upgrade.</p>
                    <div class="zo2-divider"></div>
                    <h3>Features</h3>
                    <ol class="task-list">
                        <li>Layout Profiles Manager

                            <ul class="task-list">
                                <li>Add/Rename/Delete Layout Profile</li>
                                <li>Assign a layout profile to a specific menu item</li>
                            </ul>
                        </li>
                        <li>Layout Builder

                            <ul class="task-list">
                                <li>Drag and drop component</li>
                                <li>Component</li>
                                <li>Smoother drag drop</li>
                                <li>Advanced grid and responsive settings based on Twitter Bootstrap 3</li>
                            </ul>
                        </li>
                        <li>Menu

                            <ul class="task-list">
                                <li>Menu builder from backend</li>
                                <li>Sticky Menu</li>
                                <li>Off-Canvas menu</li>
                            </ul>
                        </li>
                        <li>Support Bootstrap framework

                            <ul class="task-list">
                                <li>Integrate Bootstrap</li>
                                <li>Responsive layout</li>
                                <li>Typography</li>
                                <li>Mobile supported</li>
                            </ul>
                        </li>
                        <li>Font Awesome Icons<br>
                        </li>
                        <li>Fonts Options

                            <ul class="task-list">
                                <li>Choose from hundreds Google Web Fonts with live preview</li>
                                <li>Support FontDeck</li>
                                <li>Many options to style your font</li>
                            </ul>
                        </li>
                        <li>CSS + JS Compress &amp; Combination

                            <ul class="task-list">
                                <li>Combine CSS + JS</li>
                                <li>Compress CSS + JS </li>
                            </ul>
                        </li>
                        <li>LESS compiler
                            <ul class="task-list">
                                <li>Integrate LESS compiler</li>
                            </ul>
                        </li>
                    </ol>
                    <div class="zo2-divider"></div>
                    <h3>Contributing</h3>
                    <p>Everyone is welcome to help contribute and improve this project. There are several ways you can contribute:</p>
                    <ul class="task-list">
                        <li>Reporting issues (please read <a href="https://github.com/necolas/issue-guidelines" target="_blank">issue guidelines</a>)</li>
                        <li>Suggesting new features</li>
                        <li>Writing or refactoring code</li>
                        <li>Fixing <a href="https://github.com/cleversoft/zo2/issues" target="_blank">issues</a></li>
                        <li>Replying to questions on <a href="http://www.zootemplate.com/zo2-support" target="_blank">the forum</a></li>
                    </ul>

                    <h3>Documentation</h3>
                    <p><a class="btn btn-primary btn-large" href="http://docs.zootemplate.com/category/zo2" target="_blank">Online Documents</a></p>
                    <div class="zo2-divider"></div>
                    <h3>Supports</h3>
                    <p>Use the <a href="http://www.zootemplate.com/zo2-support" target="_blank">Zo2 Support</a> to ask questions and get support.</p>
                    <div class="zo2-divider"></div>
                    <h2>Copyright, License &amp; Usage</h2>
                    <p>Copyright (c) 2008 - 2015 <a href="http://cleversoft.co" target="_blank">CleverSoft Solutions</a></p>
                    <h3>License</h3>
                    <p>Zo2Framework is licensed under GNU General Public License (GPL), version 2 or later. <br /> <a href="http://www.gnu.org/licenses/gpl-2.0.html" target="_blank">http://www.gnu.org/licenses/gpl-2.0.html</a></p>
                    <h3>Usage</h3>
                    <p>You are free to use Zo2 Framework for your personal and commercial projects.</p>
                    <p>You do not have to keep the Zo2 or Zootemplate links and logos in the front end, however, you must ensure that all copyright notices in the code are retained. </p>
                    <p>Also, if you intend to use the Zo2 Framework in a commercial project, or a template you intend to redistribute in any form, please retain a "Powered by Zo2" logo and link in the backend administrative interface.</p>
                    <h3>Credits</h3>
                    <ul class="task-list">
                        <li><a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwesome Icons</a></li>
                        <li><a href="http://getbootstrap.com/" target="_blank">BootStrap Framework</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>