<?php
/**
         * Get files list
         * @param string $root Root path
         * @param integer $level Level of current dir
         * @param boolean $recursive Seek to it or not
         * @param array $options Callback array
         */
        function getFiles($root, $level = 1, $recursive = true, $options = array()) {                             
            $di = new DirectoryIterator($root);
			$doc = array(
				'/assets' => 'Zo2 core assets directory',
				'/assets/vendor' => '3rd parties assets',
				'/assets/zo2' => 'Zo2 core assets',
				'/assets/zo2/development' => 'Less and js will be compile',
				'/core' => 'joomla! core hacking. Will be removed soon',
				'/helper' => 'Helper classes. Prefix Zo2Helper to follow up PSR-2',
				'/html' => 'Template layout files',
				'/imager' => 'Subclasses of Zo2Imager to work with GD & another libraries',
				'/includes' => 'Core required files. These files are none override-able',
				'/joomla' => 'Libraries to override Joomla! process. Will be moved soon',
				'/service' => 'Some 3rd service classes. Will be moved soon',
				'/shortcodes' => 'Shortcode classes. Will be moved soon',
				'/utilities' => 'Will be moved soon',
				'/vendor' => '3rd party classes',
				'/controller.php' => 'Ajax execute class. Will be removed soon'
			);
            foreach ($di as $child) {
                if (!$child->isDot()) {
                    $fileName = $child->getBasename();
					$relPath = str_replace (__DIR__,'',$child->getPathname());
						$relPath = str_replace (DIRECTORY_SEPARATOR ,'/',$relPath);
						$note = (isset($doc[$relPath])) ? $doc[$relPath] : '';												
                    if ($child->isDir()) { 										
						if ( $level == 1 ) {
							if ( $note != '' ) 
								echo '+--' . $child . ' /* ' . $note . ' */ '  . "\n\r<br />";
							else
								echo '+--' . $child . "/\n\r<br />";
						} else {
							if ( $note != '' ) 
								echo '|' . str_repeat ('&nbsp', $level * 4 ) . '+--' . $child . ' /* ' . $note . ' */ ' . "\n\r<br />";
							else 
								echo '|' . str_repeat ('&nbsp', $level * 4 ) . '+--' . $child . "\n\r<br />";
						}												
						getFiles($child->getPathname(), $level+1, $recursive, $options);
                    } elseif ($child->isFile()) {
                        if ( $level == 1 ) {
							if ( $note != '' ) 
								echo '+--' . $child . ' /* ' . $note . ' */ '  . "\n\r<br />";
							else
								echo '+--' . $child . "/\n\r<br />";
						} else {
							if ( $note != '' ) 
								echo '|' . str_repeat ('&nbsp', $level * 4 ) . '+--' . $child . ' /* ' . $note . ' */ ' . "\n\r<br />";
							else 
								echo '|' . str_repeat ('&nbsp', $level * 4 ) . '+--' . $child . "\n\r<br />";
						}
                    }
                }
            }
        }
echo __DIR__ . "<br />";
getFiles(__DIR__);
?>