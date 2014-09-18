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
				'/assets' => 'Template asset files',
				'/assets/profiles' => 'Stored profile files',
				'/assets/zo2' => 'Zo2 assets',
				'/assets/zo2/development' => 'Less & js source before compile',
				'/html' => 'Joomla! template override',
				'/includes' => 'Required core file of template'				
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
                        
                    }
                }
            }
        }
echo __DIR__ . "<br />";
getFiles(__DIR__);
?>