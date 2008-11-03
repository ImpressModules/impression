<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: icms_version.php
*
* @copyright		http://www.xoops.org/ The XOOPS Project
* @copyright		XOOPS_copyrights.txt
* @copyright		http://www.impresscms.org/ The ImpressCMS Project
* @license		GNU General Public License (GPL)
*				a copy of the GNU license is enclosed.
* ----------------------------------------------------------------------------------------------------------
* @package		WF-Links 
* @since			1.03
* @author		John N
* ----------------------------------------------------------------------------------------------------------
* 				WF-Links 
* @since			1.03b and 1.03c
* @author		McDonald
* ----------------------------------------------------------------------------------------------------------
* 				Impression
* @since			1.00
* @author		McDonald
* @version		$Id$
*/
 
$impressiondir = basename( dirname( __FILE__ ) );

global $xoopsUser, $xoopsDB, $xoopsModule, $xoopsConfig;

if ( file_exists( ICMS_ROOT_PATH . '/language/'. $xoopsConfig['language'] . '/moduleabout.php' ) ) {
	include_once ICMS_ROOT_PATH . '/language/'. $xoopsConfig['language'] . '/moduleabout.php';
} else { include_once ICMS_ROOT_PATH . '/language/english/moduleabout.php'; }

$modversion['name'] 			= _MI_IMPRESSION_NAME;
$modversion['version'] 			= '1.00';
$modversion['date'] 			= 'August 18, 2008';
$modversion['status'] 			= 'RC-2';
$modversion['status_version'] 	= 'RC-2';
$modversion['description'] 		= _MI_IMPRESSION_DESC;
$modversion['license'] 			= _MI_IMPRESSION_ABOUTLICENSE;
$modversion['dirname'] 			= $impressiondir;
$modversion['image'] 			= 'images/impression_ilogo.png';
$modversion['iconsmall'] 		= 'images/impression_iconsmall.png';
$modversion['iconbig'] 			= 'images/impression_iconbig.png';


$modversion['author'] 					= 'Version developer: John N';
$modversion['credits'] 					= 'WF-Projects Team. Based on the module WF-Links, thanks to the dream-team for some code snippits.';
$modversion['author_credits'] 			= _MI_IMPRESSION_AUTHOR_CREDITSTEXT;
$modversion['developer_website_url'] 	= 'http://members.lycos.nl/mcdonaldsstore/';
$modversion['developer_website_name'] 	= 'McDonalds Store';
$modversion['support_site_url'] 		= 'http://community.impresscms.org/modules/newbb/viewforum.php?forum=9';
$modversion['support_site_name']		= 'ImpressCMS Community Forum - Modules Support';
$modversion['submit_bug'] 				= 'http://sourceforge.net/tracker/?group_id=205633&atid=1064496';

// 	** Contributors **
$modversion['people']['developers'] [] = '[url=http://community.impresscms.org/userinfo.php?uid=179]McDonald[/url]&nbsp;&nbsp;<span style="font-size: smaller;">( pietjebell31 [at] hotmail [dot] com )</span>';
$modversion['people']['testers']    [] = '[url=http://community.impresscms.org/userinfo.php?uid=14]GibaPhp[/url]';
$modversion['people']['translators'][] = '&middot; [url=http://community.impresscms.org/userinfo.php?uid=10]sato-san[/url] (German)';
$modversion['people']['translators'][] = '&middot; [url=http://community.impresscms.org/userinfo.php?uid=14]GibaPhp[/url] (Portuguese-Brazil)';
$modversion['people']['translators'][] = '&middot; [url=http://community.impresscms.org/userinfo.php?uid=179]McDonald[/url] (Dutch)';
$modversion['people']['other']		[] = '&middot; WF-Projects Team: amayer, bender, david, dqflyer, draven, frankblack, gladiac, hervet, jackj, mercibe, John N, phppp, predator, reliableSol, tom, xpider, xtheme';
$modversion['people']['other']      [] = '&middot; <a href="http://www.famfamfam.com" target="_blank">famfamfam.com</a> (icons)';
$modversion['people']['other']      [] = '&middot; <a href="http://www.fixicon.com" target="_blank">FixIcon</a> (module icon)';

//	** If Release Candidate **
//$modversion['warning'] = _MODABOUT_WARNING_RC;

//	** If Final  **
$modversion['warning'] = _MODABOUT_WARNING_FINAL;

// Sql file (must contain sql generated by phpMyAdmin or phpPgAdmin)
// All tables should not have any prefix!
$modversion['sqlfile']['mysql'] = 'sql/impression.sql';

// Tables created by sql file (without prefix!)
include_once 'include/config.php';
$modversion['tables'][0] = 'impression_cat';
$modversion['tables'][1] = 'impression_articles';
//$modversion['tables'][2] = 'impression_mod';
$modversion['tables'][2] = 'impression_indexpage';
$modversion['tables'][3] = 'impression_altcat';

// Launch additional install script to check
$modversion['onInstall'] = '';
$modversion['onUpdate'] = 'include/update.php';

// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/menu.php';

// Blocks
$i=0;
$i++;
$modversion['blocks'][$i]['file'] = 'impression_spot.php';
$modversion['blocks'][$i]['name'] = _MI_IMPRESSION_BSPOT;
$modversion['blocks'][$i]['description'] = 'Shows recently added news in spotlight';
$modversion['blocks'][$i]['show_func'] = 'b_impression_spot_show';
$modversion['blocks'][$i]['edit_func'] = 'b_impression_spot_edit';
$modversion['blocks'][$i]['options'] = 'spot|10|d F Y|0';
$modversion['blocks'][$i]['template'] = 'impression_block_spot.html';
$modversion['blocks'][$i]['can_clone'] = true ;
$i++;
$modversion['blocks'][$i]['file'] = 'impression_new.php';
$modversion['blocks'][$i]['name'] = _MI_IMPRESSION_BNEW;
$modversion['blocks'][$i]['description'] = 'Shows headlines of recently added articles';
$modversion['blocks'][$i]['show_func'] = 'b_impression_new_show';
$modversion['blocks'][$i]['edit_func'] = 'b_impression_new_edit';
$modversion['blocks'][$i]['options'] = 'new|25|d F Y';
$modversion['blocks'][$i]['template'] = 'impression_block_new.html';
$modversion['blocks'][$i]['can_clone'] = true ;
$i++;
$modversion['blocks'][$i]['file'] = 'impression_block_tag.php';
$modversion['blocks'][$i]['name'] = _MI_IMPRESSION_BTAGCLOUD;
$modversion['blocks'][$i]['description'] = 'Show tag cloud';
$modversion['blocks'][$i]['show_func'] = 'impression_tag_block_cloud_show';
$modversion['blocks'][$i]['edit_func'] = 'impression_tag_block_cloud_edit';
$modversion['blocks'][$i]['options'] = '100|0|150|80';
$modversion['blocks'][$i]['template'] = 'impression_tag_block_cloud.html';
$modversion['blocks'][$i]['can_clone'] = true ;
$i++;
$modversion['blocks'][$i]['file'] = 'impression_block_tag.php';
$modversion['blocks'][$i]['name'] = _MI_IMPRESSION_BTOPTAG;
$modversion['blocks'][$i]['description'] = 'Show top tag';
$modversion['blocks'][$i]['show_func'] = 'impression_tag_block_top_show';
$modversion['blocks'][$i]['edit_func'] = 'impression_tag_block_top_edit';
$modversion['blocks'][$i]['options'] = '50|30|c';
$modversion['blocks'][$i]['template'] = 'impression_tag_block_tag.html';
$modversion['blocks'][$i]['can_clone'] = true ;


// Menu
$modversion['hasMain'] = 1;

// This part inserts the selected topics as sub items in the Xoops main menu
$module_handler = &xoops_gethandler( 'module' );
$module = &$module_handler -> getByDirname( $modversion['dirname'] );
$cansubmit = 0;
if ( is_object( $module ) ) {
    global $xoopsUser;
    $groups = ( is_object( $xoopsUser ) ) ? $xoopsUser -> getGroups() : XOOPS_GROUP_ANONYMOUS;
    $gperm_handler = &xoops_gethandler( 'groupperm' );
    if ( $gperm_handler -> checkRight( 'ImpressionSubPerm', 0, $groups, $module -> getVar( 'mid' ) ) ) {
        $cansubmit = 1;
    }
} 
if ( $cansubmit == 1 ) {
    $modversion['sub'][0]['name'] = _MI_IMPRESSION_SMNAME1;
    $modversion['sub'][0]['url'] = 'submit.php';
} 
unset( $cansubmit );

$modversion['sub'][1]['name'] = _MI_IMPRESSION_SMNAME2;
$modversion['sub'][1]['url'] = 'topten.php?list=hit';

// Search
$modversion['hasSearch'] = 1;
$modversion['search']['file'] = 'include/search.inc.php';
$modversion['search']['func'] = 'impression_search';

// Templates
$i = 0;
$i++;
$modversion['templates'][$i]['file'] = 'impression_articleload.html';
$modversion['templates'][$i]['description'] = '';
$i++;
$modversion['templates'][$i]['file'] = 'impression_index.html';
$modversion['templates'][$i]['description'] = '';
$i++;
$modversion['templates'][$i]['file'] = 'impression_singlearticle.html';
$modversion['templates'][$i]['description'] = '';
$i++;
$modversion['templates'][$i]['file'] = 'impression_catview.html';
$modversion['templates'][$i]['description'] = '';
$i++;
$modversion['templates'][$i]['file'] = 'impression_print.html';
$modversion['templates'][$i]['description'] = '';
$i++;
$modversion['templates'][$i]['file'] = 'impression_topten.html';
$modversion['templates'][$i]['description'] = '';

// Module config setting
$i = 0;
$i++;
$modversion['config'][$i]['name'] = 'popular';
$modversion['config'][$i]['title'] = '_MI_IMPRESSION_POPULAR';
$modversion['config'][$i]['description'] = '_MI_IMPRESSION_POPULARDSC';
$modversion['config'][$i]['formtype'] = 'select';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 100;
$modversion['config'][$i]['options'] = array( '5' => 5, '10' => 10, '50' => 50, '100' => 100, '200' => 200, '500' => 500, '1000' => 1000 );
$i++;
$modversion['config'][$i]['name'] = 'displayicons';
$modversion['config'][$i]['title'] = '_MI_IMPRESSION_ICONDISPLAY';
$modversion['config'][$i]['description'] = '_MI_IMPRESSION_DISPLAYICONDSC';
$modversion['config'][$i]['formtype'] = 'select';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 1;
$modversion['config'][$i]['options'] = array( '_MI_IMPRESSION_DISPLAYICON1' => 1, '_MI_IMPRESSION_DISPLAYICON2' => 2, '_MI_IMPRESSION_DISPLAYICON3' => 3 );
$i++;
$modversion['config'][$i]['name'] = 'daysnew';
$modversion['config'][$i]['title'] = '_MI_IMPRESSION_DAYSNEW';
$modversion['config'][$i]['description'] = '_MI_IMPRESSION_DAYSNEWDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 10;
//$i++;
//$modversion['config'][$i]['name'] = 'daysupdated';
//$modversion['config'][$i]['title'] = '_MI_IMPRESSION_DAYSUPDATED';
//$modversion['config'][$i]['description'] = '_MI_IMPRESSION_DAYSUPDATEDDSC';
//$modversion['config'][$i]['formtype'] = 'textbox';
//$modversion['config'][$i]['valuetype'] = 'int';
//$modversion['config'][$i]['default'] = 10;
$i++;
$modversion['config'][$i]['name'] = 'perpage';
$modversion['config'][$i]['title'] = '_MI_IMPRESSION_PERPAGE';
$modversion['config'][$i]['description'] = '_MI_IMPRESSION_PERPAGEDSC';
$modversion['config'][$i]['formtype'] = 'select';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 10;
$modversion['config'][$i]['options'] = array( '5' => 5, '10' => 10, '15' => 15, '20' => 20, '25' => 25, '30' => 30, '50' => 50 );
$i++;
$modversion['config'][$i]['name'] = 'admin_perpage';
$modversion['config'][$i]['title'] = '_MI_IMPRESSION_ADMINPAGE';
$modversion['config'][$i]['description'] = '_MI_IMPRESSION_AMDMINPAGEDSC';
$modversion['config'][$i]['formtype'] = 'select';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 10;
$modversion['config'][$i]['options'] = array( '5' => 5, '10' => 10, '15' => 15, '20' => 20, '25' => 25, '30' => 30, '50' => 50, '75' => 75, '100' => 100 );
$i++;
$qa = ' (A)';
$qd = ' (D)';
$modversion['config'][$i]['name'] = 'articlexorder';
$modversion['config'][$i]['title'] = '_MI_IMPRESSION_ARTICLESSORT';
$modversion['config'][$i]['description'] = '_MI_IMPRESSION_ARTICLESSORTDSC';
$modversion['config'][$i]['formtype'] = 'select';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 'published DESC';
$modversion['config'][$i]['options'] = array( _MI_IMPRESSION_TITLE . $qa => 'title ASC',
                                              _MI_IMPRESSION_TITLE . $qd => 'title DESC',
                                              _MI_IMPRESSION_SUBMITTED2 . $qa => 'published ASC' ,
                                              _MI_IMPRESSION_SUBMITTED2 . $qd => 'published DESC',
                                              _MI_IMPRESSION_POPULARITY . $qa => 'hits ASC',
                                              _MI_IMPRESSION_POPULARITY . $qd => 'hits DESC'
                                             );
$i++;
$modversion['config'][$i]['name'] = 'sortcats';
$modversion['config'][$i]['title'] = '_MI_IMPRESSION_SORTCATS';
$modversion['config'][$i]['description'] = '_MI_IMPRESSION_SORTCATSDSC';
$modversion['config'][$i]['formtype'] = 'select';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 'title';
$modversion['config'][$i]['options'] = array( 'Weight' => 'weight',
                                              'Title' => 'title'
                                              );
$i++;
$modversion['config'][$i]['name'] = 'subcats';
$modversion['config'][$i]['title'] = '_MI_IMPRESSION_SUBCATS';
$modversion['config'][$i]['description'] = '_MI_IMPRESSION_SUBCATSDSC';
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 0;
$i++;
$modversion['config'][$i]['name'] = 'form_options';
$modversion['config'][$i]['title'] = '_MI_IMPRESSION_EDITOR';
$modversion['config'][$i]['description'] = '_MI_IMPRESSION_EDITORCHOICE';
$modversion['config'][$i]['formtype'] = 'select';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 'dhtml';
$modversion['config'][$i]['options'] =  array(  _MI_IMPRESSION_FORM_DHTML => 'dhtml',
                                                _MI_IMPRESSION_FORM_DHTMLEXT => 'dhtmlext',
						//_MI_IMPRESSION_FORM_COMPACT => 'textarea',
						//_MI_IMPRESSION_FORM_HTMLAREA => 'htmlarea',
						//_MI_IMPRESSION_FORM_KOIVI => 'koivi',
						_MI_IMPRESSION_FORM_FCK => 'fck',
						_MI_IMPRESSION_FORM_TINYEDITOR => 'tinyeditor',
						_MI_IMPRESSION_FORM_TINYMCE => 'tinymce'
                                              );
$i++;
$modversion['config'][$i]['name'] = 'form_optionsuser';
$modversion['config'][$i]['title'] = '_MI_IMPRESSION_EDITORUSER';
$modversion['config'][$i]['description'] = '_MI_IMPRESSION_EDITORCHOICEUSER';
$modversion['config'][$i]['formtype'] = 'select';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 'dhtml';
$modversion['config'][$i]['options'] =  array(  _MI_IMPRESSION_FORM_DHTML => 'dhtml',
                                                _MI_IMPRESSION_FORM_DHTMLEXT => 'dhtmlext',
					        //_MI_IMPRESSION_FORM_COMPACT => 'textarea',
						//_MI_IMPRESSION_FORM_HTMLAREA => 'htmlarea',
						//_MI_IMPRESSION_FORM_KOIVI => 'koivi',
						_MI_IMPRESSION_FORM_FCK => 'fck',
						_MI_IMPRESSION_FORM_TINYEDITOR => 'tinyeditor',
						_MI_IMPRESSION_FORM_TINYMCE => 'tinymce'
                                              );
$i++;
$modversion['config'][$i]['name'] = 'mainimagedir';
$modversion['config'][$i]['title'] = '_MI_IMPRESSION_MAINIMGDIR';
$modversion['config'][$i]['description'] = '_MI_IMPRESSION_MAINIMGDIRDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 'modules/' . $impressiondir . '/images';
$i++;
$modversion['config'][$i]['name'] = 'catimage';
$modversion['config'][$i]['title'] = '_MI_IMPRESSION_CATEGORYIMG';
$modversion['config'][$i]['description'] = '_MI_IMPRESSION_CATEGORYIMGDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 'modules/' . $impressiondir . '/images/category';
$i++;
$modversion['config'][$i]['name'] = 'dateformat';
$modversion['config'][$i]['title'] = '_MI_IMPRESSION_DATEFORMAT';
$modversion['config'][$i]['description'] = '_MI_IMPRESSION_DATEFORMATDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 'd F Y';
$i++;
$modversion['config'][$i]['name'] = 'dateformatadmin';
$modversion['config'][$i]['title'] = '_MI_IMPRESSION_DATEFORMATADMIN';
$modversion['config'][$i]['description'] = '_MI_IMPRESSION_DATEFORMATADMINDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 'l, d F Y - G:i';
$i++;
$modversion['config'][$i]['name'] = 'showartcount';
$modversion['config'][$i]['title'] = '_MI_IMPRESSION_SHOWARTCOUNT';
$modversion['config'][$i]['description'] = '_MI_IMPRESSION_SHOWARTCOUNTDSC';
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 1;
$i++;
$modversion['config'][$i]['name'] = 'otherarticles';
$modversion['config'][$i]['title'] = '_MI_IMPRESSION_OTHERARTICLES';
$modversion['config'][$i]['description'] = '_MI_IMPRESSION_OTHERARTICLESDSC';
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 1;
$i++;
$modversion['config'][$i]['name'] = 'showsbookmarks';
$modversion['config'][$i]['title'] = '_MI_IMPRESSION_SHOWSBOOKMARKS';
$modversion['config'][$i]['description'] = '_MI_IMPRESSION_SHOWSBOOKMARKSDSC';
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 1;
$i++;
$modversion['config'][$i]['name'] = 'usemetadescr';
$modversion['config'][$i]['title'] = '_MI_IMPRESSION_USEMETADESCR';
$modversion['config'][$i]['description'] = '_MI_IMPRESSION_USEMETADSC';
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 1;
$i++;
$modversion['config'][$i]['name'] = 'rssfeed';
$modversion['config'][$i]['title'] = '_MI_IMPRESSION_SELECTFEED';
$modversion['config'][$i]['description'] = '_MI_IMPRESSION_SELECTFEED_DSC';
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 1;
$i++;
$modversion['config'][$i]['name'] = 'rssfeedtotal';
$modversion['config'][$i]['title'] = '_MI_IMPRESSION_FEEDSTOTAL';
$modversion['config'][$i]['description'] = '_MI_IMPRESSION_FEEDSTOTALDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '15';
$i++;
$modversion['config'][$i]['name'] = 'linkedterms';
$modversion['config'][$i]['title'] = '_MI_IMPRESSION_LINKEDTERMS';
$modversion['config'][$i]['description'] = '_MI_IMPRESSION_LINKEDTERMSDSC';
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 0;
$i++;
$modversion['config'][$i]['name'] = 'imglossarydir';
$modversion['config'][$i]['title'] = '_MI_IMPRESSION_IMGLOSSARYDIR';
$modversion['config'][$i]['description'] = '_MI_IMPRESSION_IMGLOSSARYDIRDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 'imglossary';
$i++;
$modversion['config'][$i]['name'] = 'headerprint';
$modversion['config'][$i]['title'] = '_MI_IMPRESSION_HEADERPRINT';
$modversion['config'][$i]['description'] = '_MI_IMPRESSION_HEADERPRINTDSC';
$modversion['config'][$i]['formtype'] = 'textarea';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '';
$i++;
$modversion['config'][$i]['name'] = 'printlogourl';
$modversion['config'][$i]['title'] = '_MI_IMPRESSION_PRINTLOGOURL';
$modversion['config'][$i]['description'] = '_MI_IMPRESSION_PRINTLOGOURLDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = ICMS_URL . '/images/logo.gif';
$i++;
$modversion['config'][$i]['name'] = 'itemfooter';
$modversion['config'][$i]['title'] = '_MI_IMPRESSION_ITEMFOOTER';
$modversion['config'][$i]['description'] = '_MI_IMPRESSION_ITEMFOOTERDSC';
$modversion['config'][$i]['formtype'] = 'textarea';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = ICMS_URL;
//$i++;
//$modversion['config'][$i]['name'] = 'footerprint';
//$modversion['config'][$i]['title'] = '_MI_IMPRESSION_FOOTERPRINT';
//$modversion['config'][$i]['description'] = '_MI_IMPRESSION_FOOTERPRINTDSC';
//$modversion['config'][$i]['formtype'] = 'select';
//$modversion['config'][$i]['valuetype'] = 'text';
//$modversion['config'][$i]['default'] = 'item footer';
//$modversion['config'][$i]['options'] = array( _MI_IMPRESSION_ITEMFOOTER_SEL  => 'item footer',
//                                   	      _MI_IMPRESSION_INDEXFOOTER_SEL   => 'index footer',
//                                              _MI_IMPRESSION_BOTH_FOOTERS => 'both',
//                                  	      _MI_IMPRESSION_NO_FOOTERS => 'none');
$i++;
$modversion['config'][$i]['name'] = 'showdisclaimer';
$modversion['config'][$i]['title'] = '_MI_IMPRESSION_SHOWDISCLAIMER';
$modversion['config'][$i]['description'] = '_MI_IMPRESSION_SHOWDISCLAIMERDSC';
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 0;
$i++;
$modversion['config'][$i]['name'] = 'disclaimer';
$modversion['config'][$i]['title'] = '_MI_IMPRESSION_DISCLAIMER';
$modversion['config'][$i]['description'] = '_MI_IMPRESSION_DISCLAIMERDSC';
$modversion['config'][$i]['formtype'] = 'textarea';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 'We have the right, but not the obligation to monitor and review submissions submitted by users, to this website. We shall not be responsible for any of the content of these messages. We further reserve the right, to delete, move or edit submissions that we, in its exclusive discretion, deems abusive, defamatory, obscene or in violation of any Copyright or Trademark laws or otherwise objectionable.';
//$i++;
//$modversion['config'][$i]['name'] = 'showarticledisclaimer';
//$modversion['config'][$i]['title'] = '_MI_IMPRESSION_SHOWARTICLEDISCL';
//$modversion['config'][$i]['description'] = '_MI_IMPRESSION_SHOWARTICLEDISCLDSC';
//$modversion['config'][$i]['formtype'] = 'yesno';
//$modversion['config'][$i]['valuetype'] = 'int';
//$modversion['config'][$i]['default'] = 0;
//$i++;
//$modversion['config'][$i]['name'] = 'articledisclaimer';
//$modversion['config'][$i]['title'] = '_MI_IMPRESSION_ARTICLEDISCLAIMER';
//$modversion['config'][$i]['description'] = '_MI_IMPRESSION_ARTICLEDISCLAIMERDSC';
//$modversion['config'][$i]['formtype'] = 'textarea';
//$modversion['config'][$i]['valuetype'] = 'text';
//$modversion['config'][$i]['default'] = 'The articles on this site are provided as is without warranty either expressed or implied. If you have a question concerning a particular piece article, feel free to contact the administrator of this website.<br /><br />Contact us if you have questions concerning this disclaimer.';
//$i++;
//$modversion['config'][$i]['name'] = 'copyright';
//$modversion['config'][$i]['title'] = '_MI_IMPRESSION_COPYRIGHT';
//$modversion['config'][$i]['description'] = '_MI_IMPRESSION_COPYRIGHTDSC';
//$modversion['config'][$i]['formtype'] = 'yesno';
//$modversion['config'][$i]['valuetype'] = 'int';
//$modversion['config'][$i]['default'] = 1;
//$i++;

// On Update
if ( ! empty( $_POST['fct'] ) && ! empty( $_POST['op'] ) && $_POST['fct'] == 'modulesadmin' && $_POST['op'] == 'update_ok' && $_POST['dirname'] == $modversion['dirname'] )
{
    include dirname( __FILE__ ) . "/include/onupdate.inc.php" ;
} 

?>