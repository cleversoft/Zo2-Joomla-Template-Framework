<?php

/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 *
 * @link        http://www.zootemplate.com/zo2
 * @link        https://github.com/cleversoft/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2014 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */
defined('_JEXEC') or die('Restricted access');

/**
 * Class exists checking
 */
if (!class_exists('Zo2EnvironmentBrowser'))
{
    Zo2Framework::importVendor('browser');

    /**
     * Environment browser class
     */
    class Zo2EnvironmentBrowser extends Browser
    {

        /**
         *
         * @var type 
         */
        protected $_majorVersion = 0;

        /**
         *
         * @var type 
         */
        protected $_minorVersion = 0;

        /**
         * @var    array  Known robots.       
         */
        protected $_robots = array(
            /* The most common ones. */
            'Googlebot',
            'msnbot',
            'Slurp',
            'Yahoo',
            'bingbot',
            /* The rest alphabetically. */
            'Arachnoidea',
            'ArchitextSpider',
            'Ask Jeeves',
            'B-l-i-t-z-Bot',
            'Baiduspider',
            'BecomeBot',
            'cfetch',
            'ConveraCrawler',
            'ExtractorPro',
            'FAST-WebCrawler',
            'FDSE robot',
            'fido',
            'geckobot',
            'Gigabot',
            'Girafabot',
            'grub-client',
            'Gulliver',
            'HTTrack',
            'ia_archiver',
            'InfoSeek',
            'kinjabot',
            'KIT-Fireball',
            'larbin',
            'LEIA',
            'lmspider',
            'Lycos_Spider',
            'Mediapartners-Google',
            'MuscatFerret',
            'NaverBot',
            'OmniExplorer_Bot',
            'polybot',
            'Pompos',
            'Scooter',
            'Teoma',
            'TheSuBot',
            'TurnitinBot',
            'Ultraseek',
            'ViolaBot',
            'webbandit',
            'www.almaden.ibm.com/cs/crawler',
            'ZyBorg');
        protected static $instances = array();

        public function __construct($userAgent = null, $accept = null)
        {
            $this->_agent = $userAgent;
            $this->_identify();
            parent::Browser($userAgent);
        }

        public static function getInstance($userAgent = null, $accept = null)
        {
            if ($userAgent === null)
                $userAgent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : "";
            if ($accept === null)
                $accept = isset($_SERVER['HTTP_ACCEPT']) ? $_SERVER['HTTP_ACCEPT'] : "";
            $signature = serialize(array($userAgent, $accept));

            if (empty(self::$instances[$signature]))
            {
                self::$instances[$signature] = new Zo2EnvironmentBrowser($userAgent, $accept);
            }

            return self::$instances[$signature];
        }

        protected function _identify()
        {
            $lowerAgent = strtolower($this->_agent);


            if (strpos($lowerAgent, 'mobileexplorer') !== false || strpos($lowerAgent, 'openwave') !== false || strpos($lowerAgent, 'opera mini') !== false || strpos($lowerAgent, 'opera mobi') !== false || strpos($lowerAgent, 'operamini') !== false)
            {
                $this->setMobile(true);
            } elseif (preg_match('|Opera[/ ]([0-9.]+)|', $this->_agent, $version))
            {
                $this->setBrowser('opera');
                list ($this->_majorVersion, $this->_minorVersion) = explode('.', $version[1]);

                /* Due to changes in Opera UA, we need to check Version/xx.yy,
                 * but only if version is > 9.80. See: http://dev.opera.com/articles/view/opera-ua-string-changes/ */
                if ($this->_majorVersion == 9 && $this->_minorVersion >= 80)
                {
                    $this->_identifyBrowserVersion();
                }
            } elseif (preg_match('|Chrome[/ ]([0-9.]+)|', $this->_agent, $version))
            {
                $this->setBrowser('chrome');
                list ($this->_majorVersion, $this->_minorVersion) = explode('.', $version[1]);
            } elseif (preg_match('|CrMo[/ ]([0-9.]+)|', $this->_agent, $version))
            {
                $this->setBrowser('chrome');
                list ($this->_majorVersion, $this->_minorVersion) = explode('.', $version[1]);
            } elseif (preg_match('|CriOS[/ ]([0-9.]+)|', $this->_agent, $version))
            {
                $this->setBrowser('chrome');
                list ($this->_majorVersion, $this->_minorVersion) = explode('.', $version[1]);
                $this->setMobile(true);
            } elseif (strpos($lowerAgent, 'elaine/') !== false || strpos($lowerAgent, 'palmsource') !== false || strpos($lowerAgent, 'digital paths') !== false)
            {
                $this->setBrowser('palm');
                $this->setMobile(true);
            } elseif ((preg_match('|MSIE ([0-9.]+)|', $this->_agent, $version)) || (preg_match('|Internet Explorer/([0-9.]+)|', $this->_agent, $version)))
            {
                $this->setBrowser('msie');

                if (strpos($version[1], '.') !== false)
                {
                    list ($this->_majorVersion, $this->_minorVersion) = explode('.', $version[1]);
                } else
                {
                    $this->_majorVersion = $version[1];
                    $this->_minorVersion = 0;
                }

                /* Some Handhelds have their screen resolution in the
                 * user agent string, which we can use to look for
                 * mobile agents.
                 */
                if (preg_match('/; (120x160|240x280|240x320|320x320)\)/', $this->_agent))
                {
                    $this->setMobile(true);
                }
            } elseif (preg_match('|amaya/([0-9.]+)|', $this->_agent, $version))
            {
                $this->setBrowser('amaya');
                $this->_majorVersion = $version[1];

                if (isset($version[2]))
                {
                    $this->_minorVersion = $version[2];
                }
            } elseif (preg_match('|ANTFresco/([0-9]+)|', $this->_agent, $version))
            {
                $this->setBrowser('fresco');
            } elseif (strpos($lowerAgent, 'avantgo') !== false)
            {
                $this->setBrowser('avantgo');
                $this->setMobile(true);
            } elseif (preg_match('|[Kk]onqueror/([0-9]+)|', $this->_agent, $version) || preg_match('|Safari/([0-9]+)\.?([0-9]+)?|', $this->_agent, $version))
            {
                // Konqueror and Apple's Safari both use the KHTML
                // rendering engine.
                $this->setBrowser('konqueror');
                $this->_majorVersion = $version[1];

                if (isset($version[2]))
                {
                    $this->_minorVersion = $version[2];
                }

                if (strpos($this->_agent, 'Safari') !== false && $this->_majorVersion >= 60)
                {
                    // Safari.
                    $this->setBrowser('safari');
                    $this->_identifyBrowserVersion();
                }
            } elseif (preg_match('|Mozilla/([0-9.]+)|', $this->_agent, $version))
            {
                $this->setBrowser('mozilla');

                list ($this->_majorVersion, $this->_minorVersion) = explode('.', $version[1]);
            } elseif (preg_match('|Lynx/([0-9]+)|', $this->_agent, $version))
            {
                $this->setBrowser('lynx');
            } elseif (preg_match('|Links \(([0-9]+)|', $this->_agent, $version))
            {
                $this->setBrowser('links');
            } elseif (preg_match('|HotJava/([0-9]+)|', $this->_agent, $version))
            {
                $this->setBrowser('hotjava');
            } elseif (strpos($this->_agent, 'UP/') !== false || strpos($this->_agent, 'UP.B') !== false || strpos($this->_agent, 'UP.L') !== false)
            {
                $this->setBrowser('up');
                $this->setMobile(true);
            } elseif (strpos($this->_agent, 'Xiino/') !== false)
            {
                $this->setBrowser('xiino');
                $this->setMobile(true);
            } elseif (strpos($this->_agent, 'Palmscape/') !== false)
            {
                $this->setBrowser('palmscape');
                $this->setMobile(true);
            } elseif (strpos($this->_agent, 'Nokia') !== false)
            {
                $this->setBrowser('nokia');
                $this->setMobile(true);
            } elseif (strpos($this->_agent, 'Ericsson') !== false)
            {
                $this->setBrowser('ericsson');
                $this->setMobile(true);
            } elseif (strpos($lowerAgent, 'wap') !== false)
            {
                $this->setBrowser('wap');
                $this->setMobile(true);
            } elseif (strpos($lowerAgent, 'docomo') !== false || strpos($lowerAgent, 'portalmmm') !== false)
            {
                $this->setBrowser('imode');
                $this->setMobile(true);
            } elseif (strpos($this->_agent, 'BlackBerry') !== false)
            {
                $this->setBrowser('blackberry');
                $this->setMobile(true);
            } elseif (strpos($this->_agent, 'MOT-') !== false)
            {
                $this->setBrowser('motorola');
                $this->setMobile(true);
            } elseif (strpos($lowerAgent, 'j-') !== false)
            {
                $this->setBrowser('mml');
                $this->setMobile(true);
            }
        }

        /**
         * 
         */
        protected function _identifyBrowserVersion()
        {
            if (preg_match('|Version[/ ]([0-9.]+)|', $this->_agent, $version))
            {
                list ($this->_majorVersion, $this->_minorVersion) = explode('.', $version[1]);
            }
        }

        public function getMajor()
        {
            return $this->_majorVersion;
        }

        public function getMinor()
        {
            return $this->_minorVersion;
        }

        /**
         * 
         * @return boolean
         */
        public function isRobot()
        {
            $isRobot = parent::isRobot();
            foreach ($this->_robots as $robot)
            {
                if (strpos($this->_agent, $robot) !== false)
                {
                    return true;
                }
            }
            return $isRobot;
        }

    }

}
?>
