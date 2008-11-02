<?php

/**
* $Id: print.php,v 1.16 2007/02/10 01:41:26 malanciault Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

include_once 'header.php';
require_once ICMS_ROOT_PATH . '/class/template.php';

if ( !defined( 'ICMS_ROOT_PATH' ) ) { die( 'ICMS root path not defined' ); }

$aid = impression_cleanRequestVars( $_REQUEST, 'aid', 0 );
$aid = intval($aid);

$error_message = _MD_IMPRESSION_NOITEMSELECTED;
if ( $aid == 0 ) {
	redirect_header('javascript:history.go(-1)', 1, $error_message);
	exit();
}

global $xoopsDB, $xoopsConfig, $xoopsModuleConfig;
$result = $xoopsDB -> query( 'SELECT cid, title, submitter, published, introtext, description FROM ' . $xoopsDB -> prefix( 'impression_articles' ) . ' WHERE published > 0 AND published <= ' . time() . ' AND status=0 AND aid=' . $aid );
$myrow = $xoopsDB -> fetchArray( $result );

$result2 = $xoopsDB -> query( 'SELECT title FROM ' . $xoopsDB -> prefix('impression_cat') . ' WHERE cid=' . $myrow['cid']);
$mycat = $xoopsDB -> fetchArray( $result2 );

$xoopsTpl = new XoopsTpl();
$myts = MyTextSanitizer::getInstance();
// $item=  $itemObj->toArray();
$item = array();
$item['printtitle'] = $xoopsConfig['sitename'] . ' - ' . $myts -> displayTarea( $myrow['title'] );
//$item['printheader'] = 'Print Header';
$item['printheader'] = _MD_IMPRESSION_PUBLISHEDON . formatTimestamp( $myrow['published'], $xoopsModuleConfig['dateformat'] );
$item['who_where'] = sprintf( _MD_IMPRESSION_WHO_WHEN, $myrow['submitter'], formatTimestamp( $myrow['published'], $xoopsModuleConfig['dateformat'] ) );
$item['categoryname'] = $mycat['title'];
$item['title'] = $myrow['title'];
$item['introtext'] = $myts -> displayTarea( $myrow['introtext'], 1, 1, 1, 1, 1 );
$item['description'] = $myts -> displayTarea( $myrow['description'], 1, 1, 1, 1, 1 );

$xoopsTpl->assign('printtitle', $item['printtitle']);
$xoopsTpl->assign('printlogourl', $xoopsModuleConfig['printlogourl']);
$xoopsTpl->assign('printheader', $item['printheader']);
$xoopsTpl->assign('lang_category', _MD_IMPRESSION_CATEGORY);
$xoopsTpl->assign('lang_author_date', $item['who_where']);
$xoopsTpl->assign('item', $item);
$xoopsTpl->assign( 'itemfooter', $myts -> displayTarea( $xoopsModuleConfig['itemfooter'] ) );
$xoopsTpl->display('db:impression_print.html');

?>