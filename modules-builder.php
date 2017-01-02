<?php

kirby()->hook(['panel.page.create', 'panel.page.update'], function($page) {
  
  $templates = c::get("modules.pages", array("default"));
  
  // If the variable was not set as an array
  if (!is_array($templates)) {
    // If there are commas in the variable, split and convert to an array...
    if (strpos($templates, ',') !== false) {
      $templates = preg_split('/[\ \n\,]+/', $templates);
    }
    // ...otherwise define it as an array with one value
    else {
      $templates = array($templates);
    }
  }
  
  $uid =       c::get("modules.parent.uid", "modules");
  $template =  c::get("modules.parent.template", "modules");
  $title =     c::get("modules.parent.title", "_modules");
  $delete =    c::get("modules.parent.delete", true); 
  
  // If the template is one of the predefined and the page does not have a modules container yet...
  if (in_array($page->intendedTemplate(), $templates) AND !$page->children()->has($uid)) {
    $page->children()->create($uid, $template, array(
    	'title' => $title
    ));
  }
  // ...otherwise check if the delete variable is set to true and if there is a modules container
  elseif($delete == true AND $page->children()->find($uid)) {
    $page->children()->find($uid)->delete(true);
  }
  
});