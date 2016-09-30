<h2><?php echo JText::_('ZO2_ADMIN_SIDEBAR_HEADER_THEMECOLOR'); ?></h2>
<div class="zo2-divider"></div>

<div class="profiles-pane">
	<!--<h3 class="title-profile">-->
	<?php //echo JText::_('ZO2_TEMPLATE_THEME_LAYOUT');                       ?><!--</h3>-->

	<?php
	echo Zo2Html::field(
		'description', null, array(
		'text' => JText::_('ZO2_ADMIN_DESCRIPTION_THEMECOLOR'),
		'subtext' => '<a href="http://docs.zootemplate.com/category/zo2/themecolor">Document</a>'
	));
	?>


	<div id="theme">
		<div id="zo2_themes_container" class="profiles-pane-inner">

			<?php
			$presetPath = Zo2Factory::getPath('templates://assets/presets.json');
			$presets = array();
			if ($presetPath)
			{
				$presets = json_decode(file_get_contents($presetPath), true);
			}
			$templatePath = Zo2Factory::getUrl('templates://');
			$profile = Zo2Factory::getProfile();
			$presetTheme = new JObject($profile->get('theme'));
			/**
			 * @todo Must use JRegistry
			 */
			$preset_data = array(
				'name' => $presetTheme->get('name'),
				'css' => $presetTheme->get('css'),
				'less' => $presetTheme->get('less'),
				'boxed' => $presetTheme->get('boxed', 0),
				'background' => $presetTheme->get('background'),
				'header' => $presetTheme->get('header'),
				'header_top' => $presetTheme->get('header_top'),
				'text' => $presetTheme->get('text'),
				'link' => $presetTheme->get('link'),
				'link_hover' => $presetTheme->get('link_hover'),
				'bottom1' => $presetTheme->get('bottom1'),
				'bottom2' => $presetTheme->get('bottom2'),
				'footer' => $presetTheme->get('footer'),
				'bg_image' => $presetTheme->get('bg_image'),
				'bg_pattern' => $presetTheme->get('bg_pattern'),
				'background' => $presetTheme->get('background'),
			);


			if (!isset($preset_data['name']))
				$preset_data['name'] = 'custom';
			if (!isset($preset_data['boxed']))
				$preset_data['boxed'] = 1;
			if (!isset($preset_data['bg_image']))
				$preset_data['bg_image'] = '';
			$themeJson = htmlspecialchars(json_encode($profile->get('theme')), ENT_QUOTES, 'UTF-8');
			?>
			<input type="hidden" name="jform[params][theme]" id="jform_params_theme" value='<?php echo $themeJson; ?>'>

			<div class="zo2_themes_row clearfix">
				<div class="zo2_themes_form">
					<ul id="zo2_themes">
						<?php foreach ($presets as $p) : ?>
							<li class="<?php echo $p['name'] == $preset_data['name'] ? 'active' : '' ?>"
								data-zo2-theme="<?php echo $p['name'] ?>"
								data-zo2-background="<?php echo $p['variables']['background'] ?>"
								data-zo2-header="<?php echo $p['variables']['header'] ?>"
								data-zo2-header-top="<?php echo $p['variables']['header_top'] ?>"
								data-zo2-link="<?php echo $p['variables']['link'] ?>"
								data-zo2-link-hover="<?php echo $p['variables']['link_hover'] ?>"
								data-zo2-text="<?php echo $p['variables']['text'] ?>"
								data-zo2-bottom1="<?php echo $p['variables']['bottom1'] ?>"
								data-zo2-bottom2="<?php echo $p['variables']['bottom2'] ?>"
								data-zo2-footer="<?php echo $p['variables']['footer'] ?>"
								data-zo2-css="<?php echo $p['css'] ?>" data-zo2-less="<?php echo $p['less'] ?>"
							>
								<div class="theme_title"><?php echo ucfirst($p['name']) ?></div>
								<div class="theme_thumbnail">
									<img src="<?php echo $templatePath . $p['thumbnail'] ?>">
								</div>
							</li>
						<?php endforeach ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>