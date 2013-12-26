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
defined('_JEXEC') or die('Restricted access');

/**
 * Class exists checking
 */
if (!class_exists('Zo2Assets')) {

    /**
     * Provide methods to work with Zo2 Framework & Zo2 Template paths
     */
    class Zo2Assets extends Zo2Path {

        /**
         * Singleton instance
         * @var Zo2Assets 
         */
        public static $instance;

        /**
         * Array of added css files
         * @var array 
         */
        private $_stylesheets = array();

        /**
         * Array of added custom stylesheet scripts
         * @var array 
         */
        private $_stylesheetDeclarations = array();

        /**
         * Array of added js files
         * @var array
         */
        private $_javascripts = array();

        /**
         * Array of added custom javascripts
         * @var array
         */
        private $_javascriptDeclarations = array();

        /**
         * 
         * @return Zo2Assets
         */
        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }
            if (isset(self::$instance)) {
                return self::$instance;
            }
        }

        /**
         * Get asset file with relative path
         * @param type $file         
         * @return string
         */
        public function getAssetFile($file) {
            /* Template override */
            $paths[] = $this->get('siteTemplate') . '/assets/' . $file;
            /* Core assets */
            $paths[] = $this->get('zo2Root') . '/assets/' . $file;
            /* Find in array which the first exists file */
            foreach ($paths as $path) {
                $physicalPath = $this->getPath($path);
                if (JFile::exists($physicalPath)) {
                    return $path;
                }
            }
            return false;
        }

        /**
         * 
         * @param type $file
         * @return \Zo2Assets
         */
        public function addStyleSheet($file)
        {
            if (substr($file, strlen($file) - 5, 5) == '.less') {
                $newFile = str_replace('.less', '.css', $file);
                if (strpos($newFile, 'less/') === 0) $newFile = 'css/' . substr($newFile, 5);
                $newFilePath = $this->getPath($this->get('siteTemplate') . '/assets/' . $newFile);
                Zo2HelperCompiler::less($this->getAssetFile($file), $newFilePath);
                $assetFile = $this->getAssetFile($newFile);
                $this->_stylesheets[$assetFile] = $this->getPath($assetFile);
            }
            else {
                $assetFile = $this->getAssetFile($file);
                if ($assetFile != false) {
                    $this->_stylesheets[$assetFile] = $this->getPath($assetFile);
                }
            }
            return $this;
        }

        /**
         * 
         * @param type $style
         * @param bool $less
         * @return \Zo2Assets
         */
        public function addStyleSheetDeclaration($style, $less = false)
        {
            if ($less) {
                $style = Zo2HelperCompiler::lessStyle($style);
            }
            $this->_stylesheetDeclarations[] = $style;
            return $this;
        }

        /**
         * @param type $file
         *
         * @return \Zo2Assets
         */
        public function addScript($file) {
            if (strpos($file, 'http://') !== false) $this->_javascripts[$file] = $file;
            else {
                $assetFile = $this->getAssetFile($file);
                if ($assetFile != false) {
                    $this->_javascripts[$assetFile] = $this->getPath($assetFile);
                }
            }
            return $this;
        }

        /**
         * 
         * @param type $script
         * @return \Zo2Assets
         */
        public function addScriptDeclaration($script) {
            $this->_javascriptDeclarations[] = $script;
            return $this;
        }

        /**
         * Do build development script into production
         */
        public function buildFrameworkProduction() {
            /* This method only need call one time */
            static $called = false;
            if ($called === false) {
                /**
                 * @todo move these list into config file
                 */
                $lessFiles['core'][] = 'adminmegamenu';
                $lessFiles['core'][] = 'megamenu-responsive';
                $lessFiles['core'][] = 'megamenu';
                $lessFiles['core'][] = 'shortcodes';
                $lessFiles['core'][] = 'social';
                $jsFiles['core'][] = 'adminlayout';
                $jsFiles['core'][] = 'adminmegamenu';
                $jsFiles['core'][] = 'adminsocial';
                $jsFiles['core'][] = 'assets';
                $jsFiles['core'][] = 'megamenu';
                $jsFiles['core'][] = 'shortcodes';
                $jsFiles['core'][] = 'social';
                $jsFiles['core'][] = 'socialshare';

                /* Template */
                //$lessFiles['template'] = '';
                //$jsFiles['template'] = '';
                        
                $buildProduction = Zo2Framework::get('build_production', 1);


                switch ($buildProduction) {
                    case 1: /* Clear cache and rebuild everything */
                        /* Do build core less */
                        foreach ($lessFiles['core'] as $lessFile) {
                            $input = $this->getPath($this->get('zo2Root') . '/assets/zo2/development/less/' . $lessFile . '.less');
                            $output = $this->getPath($this->get('zo2Root') . '/assets/zo2/css/' . $lessFile . '.css');
                            $this->_buildLess($input, $output);
                        }
                        if (isset($lessFiles['template']) && is_array($lessFiles['template'])) {
                            /* Do build template less */
                            foreach ($lessFiles['template'] as $lessFile) {
                                $input = $this->getPath($this->get('siteTemplate') . '/assets/zo2/development/less/' . $lessFile . '.less');
                                $output = $this->getPath($this->get('siteTemplate') . '/assets/zo2/css/' . $lessFile . '.css');
                                $this->_buildLess($input, $output);
                            }
                        }
                        /* Do build core js */
                        foreach ($jsFiles['core'] as $jsFile) {
                            $input = $this->getPath($this->get('zo2Root') . '/assets/zo2/development/js/' . $jsFile . '.js');
                            $output = $this->getPath($this->get('zo2Root') . '/assets/zo2/js/' . $jsFile . '.js');
                            $this->_buildJs($input, $output);
                            //JFactory::getApplication()->enqueueMessage('Working: ' . $jsFilePath);
                        }
                        if (isset($jsFiles['template']) && is_array($jsFiles['template'])) {
                            /* Do build template js */
                            foreach ($jsFiles['template'] as $jsFile) {
                                $input = $this->getPath($this->get('siteTemplate') . '/assets/zo2/development/js/' . $jsFile . '.js');
                                $output = $this->getPath($this->get('siteTemplate') . '/assets/zo2/js/' . $jsFile . '.js');
                                $this->_buildJs($input, $output);
                                //JFactory::getApplication()->enqueueMessage('Working: ' . $jsFilePath);
                            }
                        }
                        break;
                }
                $called = true;
            }
        }

        private function _buildLess($input, $output) {
            $cleanProduction = Zo2Framework::get('clean_production', 0);
            /* Do clean old files */
            if (JFile::exists($output) && $cleanProduction)
                JFile::delete($output);
            if (!is_file($output) || filemtime($input) > filemtime($output)) {
                if (Zo2HelperCompiler::less($input, $output)) {
                    //JFactory::getApplication()->enqueueMessage('Success: ' . $cssFilePath);
                }
            } else {
                //JError::raiseNotice(100, 'File exists: ' . $cssFilePath);
            }
            /**
             * @todo css compress
             */
        }

        private function _buildJs($input, $output) {
            $cleanProduction = Zo2Framework::get('clean_production', 0);
            if (JFile::exists($output) && $cleanProduction)
                JFile::delete($output);
            if (!is_file($output) || filemtime($input) > filemtime($output)) {
                if (Zo2HelperCompiler::javascript($input, $output)) {
                    //JFactory::getApplication()->enqueueMessage('Success: ' . $jsFilePathOutput);
                }
            } else {
                //JError::raiseNotice(100, 'File exists: ' . $jsFilePathOutput);
            }
        }

        public function generateAssets($type)
        {
            $combineJs = Zo2Framework::get('combine_js');
            $combineCss = Zo2Framework::get('combine_css');
            /* For backend we'll replace $body with our adding scripts */
            if ($type == 'js') {
                $jsHtml = '';
                if ($combineJs) {
                    $jsName = 'cache/script.combined.js';
                    $jsFile = $this->get('siteTemplate') . '/assets/' . $jsName;
                    $jsFilePath = $this->getPath($jsFile);
                    $jsContent = '';
                    foreach ($this->_javascripts as $javascript => $path) {
                        $jsContent .= file_get_contents($path) . "\n";
                    }
                    file_put_contents($jsFilePath, $jsContent);
                    $jsHtml .='<script type="text/javascript" src="' . $this->get('siteUrl') . '/' . $jsFile . '"></script>';
                }
                else {
                    foreach ($this->_javascripts as $javascript => $path) {
                        $jsHtml .='<script type="text/javascript" src="' . $this->get('siteUrl') . '/' . $javascript . '"></script>';
                    }
                }
                $jsDeclarationHtml = '<script>';
                foreach ($this->_javascriptDeclarations as $javascriptDeclaration) {
                    $jsDeclarationHtml .= $javascriptDeclaration;
                }
                $jsDeclarationHtml .= '</script>';
                return $jsHtml . "\n" . $jsDeclarationHtml;
            } else {
                $cssHtml = '';
                if ($combineCss) {
                    $cssName = 'cache/style.combined.css';
                    $cssFile = $this->get('siteTemplate') . '/assets/' . $cssName;
                    $cssFilePath = $this->getPath($cssFile);
                    $cssContent = '';
                    foreach ($this->_stylesheets as $styleSheets => $path) {
                        $cssContent .= file_get_contents($path) . "\n";
                    }
                    $cssContent = Zo2HelperAssets::moveCssImportToBeginning($cssContent);
                    file_put_contents($cssFilePath, $cssContent);
                    $cssHtml .='<link rel="stylesheet" href="' . $this->get('siteUrl') . '/' . $cssFile . '"></script>';
                }
                else {
                    foreach ($this->_stylesheets as $styleSheets => $path) {
                        $cssHtml .= '<link rel="stylesheet" href="' . $this->get('siteUrl') . '/' . $styleSheets . '">';
                    }
                }
                $cssDeclarationHtml = '<style>';
                foreach ($this->_stylesheetDeclarations as $stylesheetDeclaration) {
                    $cssDeclarationHtml .= $stylesheetDeclaration;
                }
                $cssDeclarationHtml .= '</style>';
                return $cssHtml . "\n" . $cssDeclarationHtml;
            }
        }

        public function prepareLayout()
        {
            $this->prepareBootstrap();
            $this->preparePresets();
            $this->prepareCustomFonts();
            $this->prepareResponsive();
            $this->prepareStatics();
        }

        public function prepareCustomFonts()
        {
            $selectors = array('body_font' => 'body', 'h1_font' => 'h1',
                'h2_font' => 'h2', 'h3_font' => 'h3', 'h4_font' => 'h4',
                'h5_font' => 'h5', 'h6_font' => 'h6'
            );

            foreach ($selectors as $param => $selector) {
                $value = Zo2Framework::get($param);

                if (!empty($value)) {
                    $data = json_decode($value, true);
                    switch ($data['type']) {
                        case 'standard':
                            $this->buildStandardFontStyle($data, $selector);
                            break;
                        case 'googlefonts':
                            $this->buildGoogleFontsStyle($data, $selector);
                            break;
                        case 'fontdeck':
                            $this->buildFontDeckStyle($data, $selector);
                            break;
                        default:
                            break;
                    }
                }
            }
        }

        /**
         * Generate custom CSS style for Standard Font option
         *
         * @param $data
         * @param $selector
         */
        private function buildStandardFontStyle($data, $selector) {
            $style = '';
            if (!empty($data['family']))
                $style .= 'font-family:' . $data['family'] . ';';
            if (!empty($data['size']) && $data['size'] > 0)
                $style .= 'font-size:' . $data['size'] . 'px;';
            if (!empty($data['color']))
                $style .= 'color:' . $data['color'] . ';';
            if (!empty($data['style'])) {
                switch ($data['style']) {
                    case 'b': $style .= 'font-weight:bold;';
                        break;
                    case 'i': $style .= 'font-style:italic;';
                        break;
                    case 'bi':
                    case 'ib':
                        $style .= 'font-weight:bold;font-style:italic;';
                        break;
                    default:
                        break;
                }
            }

            if (!empty($style))
            {
                $style = $selector . '{' . $style . '}' . "\n";

                $this->addScriptDeclaration($style);
            }
        }

        /**
         * @param $data
         * @param $selector
         */
        private function buildGoogleFontsStyle($data, $selector) {
            $api = 'http://fonts.googleapis.com/css?family=';
            $url = '';
            $style = '';
            if (!empty($data['family'])) {
                $style .= 'font-family:' . $data['family'] . ';';
                $url = $api . urlencode($data['family']);
            }
            if (!empty($data['size']) && $data['size'] > 0)
                $style .= 'font-size:' . $data['size'] . 'px;';
            if (!empty($data['color']))
                $style .= 'color:' . $data['color'] . ';';
            if (!empty($data['style'])) {
                switch ($data['style']) {
                    case 'b':
                        $style .= 'font-weight:bold;';
                        $url .= ':700';
                        break;
                    case 'i':
                        $style .= 'font-style:italic;';
                        $url .= ':400italic';
                        break;
                    case 'bi':
                    case 'ib':
                        $style .= 'font-weight:bold;font-style:italic;';
                        $url .= ':700italic';
                        break;
                    default:
                        break;
                }
            }

            if (!empty($style)) {
                $doc = JFactory::getDocument();
                $doc->addStyleSheet($url);
                //$this->addStyleSheet($url);
                $style = $selector . '{' . $style . '}' . "\n";
                $this->addStyleSheetDeclaration($style);
            }
        }

        /**
         * Generate custom CSS style for FontDeck option
         *
         * @param $data
         * @param $selector
         */
        private function buildFontDeckStyle($data, $selector) {
            $fontdeckCode = Zo2Framework::get('fontdeck_code');

            if (!empty($fontdeckCode)) {
                $this->addScriptDeclaration($fontdeckCode);
            }

            $style = '';
            if (!empty($data['family']))
                $style .= 'font-family:' . $data['family'] . ';';
            if (!empty($data['size']) && $data['size'] > 0)
                $style .= 'font-size:' . $data['size'] . 'px;';
            if (!empty($data['color']))
                $style .= 'color:' . $data['color'] . ';';
            if (!empty($data['style'])) {
                switch ($data['style']) {
                    case 'b': $style .= 'font-weight:bold;';
                        break;
                    case 'i': $style .= 'font-style:italic;';
                        break;
                    case 'bi':
                    case 'ib':
                        $style .= 'font-weight:bold;font-style:italic;';
                        break;
                    default:
                        break;
                }
            }

            if (!empty($style))
            {
                $style = $selector . '{' . $style . '}' . "\n";
                $this->addStyleSheetDeclaration($style);
            }
        }

        public function preparePresets()
        {
            $preset = Zo2Framework::get('theme');
            $zo2 = Zo2Framework::getInstance();
            if (empty($preset)) {
                $presetPath = $zo2->getCurrentTemplateAbsolutePath() . '/layouts/presets.json';
                $presets = array();
                if (file_exists($presetPath)) {
                    $presets = json_decode(file_get_contents($presetPath), true);
                }
                $defaultData = array();
                for ($i = 0; $i < count($presets); $i++) {
                    if ($presets[$i]['default'])
                        $defaultData = $presets[$i];
                }
                if (empty($defaultData) && count($presets) > 0)
                    $presetData = $presets[0];
                else
                    $presetData = array(
                        'name' => $defaultData['name'],
                        'css' => $defaultData['css'],
                        'less' => $defaultData['less'],
                        'background' => $defaultData['variables']['background'],
                        'header' => $defaultData['variables']['header'],
                        'header_top' => $defaultData['variables']['header_top'],
                        'text' => $defaultData['variables']['text'],
                        'link' => $defaultData['variables']['link'],
                        'link_hover' => $defaultData['variables']['link_hover'],
                        'bottom1' => $defaultData['variables']['bottom1'],
                        'bottom2' => $defaultData['variables']['bottom2'],
                        'footer' => $defaultData['variables']['footer']
                    );
            }
            if (!empty($preset))
                $presetData = json_decode($preset, true);
            $style = '';
            if (!empty($presetData['background']))
                $style .= 'body{background-color:' . $presetData['background'] . '}';
            if (!empty($presetData['header']))
                $style .= '#zo2-header{background-color:' . $presetData['header'] . '}';
            if (!empty($presetData['header_top']))
                $style .= '#zo2-header-top{background-color:' . $presetData['header_top'] . '}';
            if (!empty($presetData['text']))
                $style .= 'body{color:' . $presetData['text'] . '}';
            if (!empty($presetData['link']))
                $style .= 'a{color:' . $presetData['link'] . '}';
            if (!empty($presetData['link_hover']))
                $style .= 'a:hover{color:' . $presetData['link_hover'] . '}';
            if (!empty($presetData['bottom1']))
                $style .= '#zo2-bottom1{background-color:' . $presetData['bottom1'] . '}';
            if (!empty($presetData['bottom2']))
                $style .= '#zo2-bottom2{background-color:' . $presetData['bottom2'] . '}';
            if (!empty($presetData['footer']))
                $style .= '#zo2-footer{background-color:' . $presetData['footer'] . '}';

            if (!empty($presetData['css']))
                $this->addStyleSheet($presetData['css']);

            $this->addStyleSheetDeclaration($style);
        }

        public function prepareResponsive()
        {
            $responsive = Zo2Framework::get('responsive_layout');
            if (!$responsive) $this->addStyleSheet('css/non-responsive.css');
        }

        public function prepareBootstrap()
        {
            $this->addStyleSheet('vendor/bootstrap/core/css/bootstrap.min.css');
            $this->addStyleSheet('vendor/bootstrap/addons/font-awesome/css/font-awesome.min.css');
            $this->addScript('vendor/bootstrap/core/js/bootstrap.min.js');
        }

        public function prepareStatics()
        {
            $assetsJsonPath = $this->getPath($this->get('siteTemplate') . '/layouts/assets.json');
            if (file_exists($assetsJsonPath)) {
                $assetsData = json_decode(file_get_contents($assetsJsonPath), true);
                foreach($assetsData as $data) {
                    if ($data['type'] == 'js') $this->addScript($data['path']);
                    else if ($data['type'] == 'css') $this->addStyleSheet($data['path']);
                    else if ($data['type'] == 'less') $this->addStyleSheet($data['path']);
                }
            }
        }
    }
}