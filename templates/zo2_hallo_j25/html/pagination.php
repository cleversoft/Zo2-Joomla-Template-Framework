<?php
//no direct accees
defined ('_JEXEC') or die ('resticted aceess');

function pagination_list_render($list) {
	// Initialize variables
	$html = '<ul class="pagination">';
	
	if ($list['start']['active']==1)   $html .= $list['start']['data'];
	if ($list['previous']['active']==1) $html .= $list['previous']['data'];

	foreach ($list['pages'] as $page) {
		$html .= $page['data'];
	}

	if ($list['next']['active']==1) $html .= $list['next']['data'];
	if ($list['end']['active']==1)  $html .= $list['end']['data'];

	$html .= "</ul>";
	
	return $html;
}

function pagination_item_active(&$item) {
	
	$cls = '';

    // Check for "Next" item
    if ($item->text == JText::_('JNEXT'))
    {
        $display = '<i class="fa fa-long-arrow-right"></i>';
    }
    // Check for "Prev" item
    if ($item->text == JText::_('JPREV'))
    {
        $display = '<i class="fa fa-long-arrow-left"></i>';
    }
    
	if ($item->text == JText::_('First')) { $cls = "first";}
    if ($item->text == JText::_('Last'))   { $cls = "last";}
    // If the display object isn't set already, just render the item with its text
    if (!isset($display))
    {
        $display = $item->text;
    }
    return "<li><a title=\"" . $item->text . "\" href=\"" . $item->link . "\" class=\"pagenav\">" . $display . "</a></li>";
}

function pagination_item_inactive(&$item) {
	return "<li class=\"active\"><span>".$item->text."</span></li>";
}
?>