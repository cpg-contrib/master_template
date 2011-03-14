<?php
/*************************
  Coppermine Photo Gallery
  ************************
  Copyright (c) 2003-2005 Coppermine Dev Team
  v1.1 originaly written by Gregory DEMAR

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.
  ********************************************
  Coppermine version: 1.4.1
  $Source: /cvsroot/cpg-contrib/master_template/codebase.php,v $
  $Revision: 1.3 $
  $Author: donnoman $
  $Date: 2005/12/08 05:46:49 $
**********************************************/

if (!defined('IN_COPPERMINE')) die('Not in Coppermine...');


// Add a filter
$thisplugin->add_filter('template_html','change_template_html');
// Add an action
$thisplugin->add_action('page_start','change_template');

/*
 * This function allows you to change the template vars that are created after including the theme.php
 */

function change_template()
{
    global $template_vanity;
    
    $template_vanity = <<<EOT
    <div id="vanity">
          <a id="v_php" href="http://www.php.net/" target="_blank"></a>
          <a id="v_mysql" href="http://www.mysql.com/" target="_blank"></a>
          <a id="v_xhtml" href="http://validator.w3.org/check/referer" target="_blank"></a>
          <a id="v_css" href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"></a>
          <div style="text-align:center">
          <div>
          <a href="http://coppermine.sf.net"><img src="plugins/master_template/images/mycoppermine.png" width="300" height="64" border="0" alt="Coppermine Logo" /></a>
          </div>
          </div>
    </div>
EOT;
}

/*
 * This function changes the themes template.html as it is read into memory.
 * This example adds google analytics code. (Remmed Output if you don't have a valid ID set.
 */

function change_template_html($html) 
{   
    $uacct='NN-NNNNNN-N';
    //only change the $uacct above, don't mess with the ones below
    $add_html='';
    if ($uacct=='NN-NNNNNN-N') $add_html.="\n<!--\n";     
	$add_html .= <<<EOT
	<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
	</script>
	<script type="text/javascript">
	_uacct = "$uacct";
	urchinTracker();
	</script>
	{META}
EOT;
    if ($uacct=='NN-NNNNNN-N') $add_html.="\n-->\n";
	return str_replace('{META}',$add_html,$html);
}
	
?>
