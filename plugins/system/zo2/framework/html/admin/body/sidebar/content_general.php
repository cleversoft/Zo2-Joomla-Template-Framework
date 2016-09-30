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
); ?>
<div class="tab-content">
	<!-- Global -->
	<h2><?php echo JText::_('ZO2_ADMIN_HEADER_GENERAL'); ?></h2>

	<div class="zo2-divider"></div>
	<!-- Description -->
	<?php
	echo Zo2Html::field(
		'description', null, array(
		'text' => JText::_('ZO2_ADMIN_GENERAL_DESC'),
		'subtext' => '<a href="http://docs.zootemplate.com/category/zo2/general">Document</a>'
	));
	?>

	<!-- Site Name -->
	<?php
	echo Zo2Html::field(
		'text', array(
		'label' => JText::_('ZO2_ADMIN_GENERAL_LABEL_SITENAME'),
		'description' => JText::_('ZO2_ADMIN_GENERAL_DESC_SITENAME')
	), array(
		'name' => 'jform[params][site_name]',
		'value' => Zo2Framework::getParam('site_name'),
		'placeholder' => JFactory::getConfig()->get('sitename')
	));
	?>
	<!-- Site Slogan -->
	<?php
	echo Zo2Html::field(
		'text', array(
		'label' => JText::_('ZO2_ADMIN_GENERAL_LABEL_SLOGAN'),
		'description' => JText::_('ZO2_ADMIN_GENERAL_DESC_SLOGAN')
	), array(
		'name' => 'jform[params][site_slogan]',
		'value' => Zo2Framework::getParam('site_slogan'),
		'placeholder' => 'Zo2 Framework'
	));
	?>
	<!-- Copyright -->
	<?php
	/**
	 * @todo Use JEditor
	 */
	echo Zo2Html::field(
		'textarea', array(
		'label' => JText::_('ZO2_ADMIN_GENERAL_LABEL_COPYRIGHT'),
		'description' => JText::_('ZO2_ADMIN_GENERAL_DESC_COPYRIGHT')
	), array(
		'name' => 'jform[params][footer_copyright]',
		'rows' => 10,
		'cols' => 20,
		'value' => Zo2Framework::getParam('footer_copyright')
	));
	?>
	<!-- Standard logo -->
	<?php
	echo Zo2Html::field(
		'image', array(
		'label' => JText::_('ZO2_ADMIN_GENERAL_LABEL_STANDARD_LOGO'),
		'description' => JText::_('ZO2_ADMIN_GENERAL_DESC_STANDARD_LOGO'),
		'class_wrap' => 'logo-image',
		'class' => 'logo-path'
	), array(
		'id' => 'jform_params_standard_logo',
		'name' => 'jform[params][standard_logo]',
		'value' => Zo2Framework::getParam('standard_logo')
	));
	?>
	<!-- Retina logo -->
	<?php
	echo Zo2Html::field(
		'image', array(
		'label' => JText::_('ZO2_ADMIN_GENERAL_LABEL_RETINA_LOGO'),
		'description' => JText::_('ZO2_ADMIN_GENERAL_DESC_RETINA_LOGO'),
		'class_wrap' => 'logo-retina-image',
		'class' => 'logo-path'
	), array(
		'id' => 'jform_params_retina_logo',
		'name' => 'jform[params][retina_logo]',
		'value' => Zo2Framework::getParam('retina_logo')
	));
	?>
	<!-- Stickey logo -->
	<?php
	echo Zo2Html::field(
		'image', array(
		'label' => JText::_('ZO2_ADMIN_STICKY_LOGO_MENU'),
		'description' => JText::_('ZO2_ADMIN_STICKY_LOGO_DESC'),
		'class_wrap' => 'logo-sticky-image',
		'class' => 'logo-sticky-path'
	), array(
		'id' => 'jform_params_sticky_logo',
		'name' => 'jform[params][sticky_logo]',
		'value' => Zo2Framework::getParam('sticky_logo')
	));
	?>
	<div class="zo2-divider"></div>
	<!-- Show "Go to top" -->
	<?php
	echo Zo2Html::field(
		'radio', array(
		'label' => JText::_('ZO2_ADMIN_GENERAL_LABEL_ENABLE_GOTOTOP'),
		'description' => JText::_('ZO2_ADMIN_GENERAL_DESC_ENABLE_GOTOTOP')
	), array(
		'name' => 'jform[params][footer_gototop]',
		'value' => Zo2Framework::getParam('footer_gototop')
	));
	?>
	<div class="zo2_themes_row clearfix">

		<div class="zo2_themes_row clearfix" id="background_image_wrapper">

			<div class="zo2_themes_label">
				<?php echo JText::_('ZO2_TEMPLATE_THEME_STYLE_BACKGROUND'); ?>
			</div>
			<?php
			echo Zo2Html::field(
				'radio', array(
				'label' => JText::_('ZO2_ADMIN_GENERAL_LABEL_CHOOSE_LAYOUT'),
				'description' => JText::_('ZO2_ADMIN_GENERAL_DESC_CHOOSE_LAYOUT'),
			), array(
				'id' => 'zo2_boxed_style',
				'name' => 'zo2_boxed_style',
				'value' => $preset_data['boxed']
			));
			?>
			<div id="background_image_selector"
				 class="zo2_background_and_pattern" <?php if ($preset_data['boxed'] == 0) echo 'style="display:none"'; ?>>
				<?php
				echo Zo2Html::field(
					'image', array(
					'label' => JText::_('ZO2_ADMIN_GENERAL_LABEL_BACKGROUND_IMAGE'),
					'description' => JText::_('ZO2_ADMIN_GENERAL_DESC_BACKGROUND_IMAGE'),
					'class_wrap' => 'zo2-background-image',
					'class' => 'zo2-background-image'
				), array(
					'id' => 'zo2_background_image',
					'name' => 'zo2_background_image',
					'value' => $preset_data['bg_image']
				));
				?>
				<hr/>
				<div class="zo2_themes_label">
					<?php echo JText::_('ZO2_TEMPLATE_THEME_PATTERN_BACKGROUND'); ?>
				</div>
				<div class="zo2_themes_for">
					<ul class="options background-select">
						<?php
						$zPath = Zo2Path::getInstance();
						$backgroundsDir = Zo2Factory::getPath("templates://assets/zo2/images/background-patterns");
						$bgPatterns = glob($backgroundsDir . '/*.*');
						if (count($bgPatterns) > 0)
						{
							foreach ($bgPatterns as $pattern)
							{
								if (is_array(getimagesize($pattern)))
								{
									$selected = '';
									$pattern_src = $zPath->toUrl($pattern);
									$pattern_path = str_replace(JPATH_ROOT . DIRECTORY_SEPARATOR, '', $pattern);
									if (isset($preset_data['bg_pattern']) && ($pattern_path == $preset_data['bg_pattern']))
										$selected = 'selected';
									echo '<li class="' . $selected . '"><img rel="' . $pattern_path . '" src="' . $pattern_src . '" /></li>';
								}
							}
						}
						?>

					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
