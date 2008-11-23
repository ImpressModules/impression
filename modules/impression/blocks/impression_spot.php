<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: /blocks/impression_spot.php
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

function checkImpressionSpotgroups( $cid = 0, $permType = 'ImpressionCatPerm', $redirect = false ) {

    global $xoopsUser;
    $mydirname = basename( dirname( dirname( __FILE__ ) ) );
    $groups = is_object( $xoopsUser ) ? $xoopsUser -> getGroups() : XOOPS_GROUP_ANONYMOUS;
    $gperm_handler = &xoops_gethandler( 'groupperm' );

    $module_handler = &xoops_gethandler( 'module' );
    $module = &$module_handler -> getByDirname( $mydirname );

    if ( !$gperm_handler -> checkRight( $permType, $cid, $groups, $module -> getVar( 'mid' ) ) ) {
        if ( $redirect == false ) {
            return false;
        } else {
            redirect_header( 'index.php', 3, _NOPERM );
            exit();
        } 
    } 
    unset( $module );
    return true;
}

function b_impression_spoticons($aid, $dirname) {

	$iconsadmin = '<a href="' . ICMS_URL . '/modules/' . $dirname . '/admin/index.php"><img src="' . ICMS_URL . '/modules/' . $dirname . '/images/icon/computer_small.png" alt="' . _MB_IMPRESSION_ADMINSECTION . '" title="' . _MB_IMPRESSION_ADMINSECTION . '" align="absmiddle"/></a>';
	$iconsadmin .= '&nbsp;<a href="' . ICMS_URL . '/modules/' . $dirname . '/admin/index.php?op=edit&amp;aid=' . $aid . '"><img src="' . ICMS_URL . '/modules/' . $dirname . '/images/icon/pageedit_small.png" alt="' . _MB_IMPRESSION_EDIT . '" title="' . _MB_IMPRESSION_EDIT . '" align="absmiddle"/></a>&nbsp;';
	$iconsadmin .= '<a href="' . ICMS_URL . '/modules/' . $dirname . '/admin/index.php?op=delete&amp;aid=' . $aid . '"><img src="' . ICMS_URL . '/modules/' . $dirname . '/images/icon/pagedelete_small.png" alt="' . _MB_IMPRESSION_DELETE . '" title="' . _MB_IMPRESSION_DELETE . '" align="absmiddle"/></a>&nbsp;';

	return $iconsadmin;
}

// Function: b_impression_spot_show
// Input   : $options[0] = 	date for the most recent videos
// 			   			hits for the most popular videos
//           $block['content'] = The optional above content
//           $options[1] = How many videos are displayes
//           $options[2] = Set date format
//           $options[3] = Display RSS icons y/n
// Output  : Returns the latest articles
function b_impression_spot_show( $options ) {

    global $xoopsDB, $xoopsModuleConfig, $xoopsUser, $xoopsTpl;
    $mydirname = basename( dirname( dirname( __FILE__ ) ) );
    $block = array();
    $modhandler = xoops_gethandler( 'module' );
    $impressionModule = $modhandler -> getByDirname( $mydirname );
    $config_handler = xoops_gethandler( 'config' );
    $impressionModuleConfig = $config_handler -> getConfigsByCat( 0, $impressionModule -> getVar( 'mid' ) );
    $moderate = 0;
    $impressionmyts = &MyTextSanitizer :: getInstance();

    $sql = $xoopsDB -> query( "SELECT aid, cid, title, submitter, published, status, hits, introtext FROM " . $xoopsDB -> prefix( 'impression_articles' ) . " WHERE published > 0 AND published <= " . time() . " AND status=0 ORDER BY published DESC ", $options[1], 0 );
    while ( $myrow = $xoopsDB -> fetchArray( $sql ) ) {
        if ( false == checkImpressionSpotgroups( $myrow['cid'] ) || $myrow['cid'] == 0 ) {
            continue;
        }

        $articleload = array();
        $title = $impressionmyts -> htmlSpecialChars( $impressionmyts -> stripSlashesGPC( $myrow["title"] ) );
        $articleload['isadmin'] = ( ( is_object( $xoopsUser ) && !empty( $xoopsUser ) ) && $xoopsUser -> isAdmin( $impressionModule -> mid() ) ) ? true : false;
        $articleload['adminarticle'] = '';
        if ( $articleload['isadmin'] == true && $moderate == 0 ) {
			$articleload['adminarticle'] = '<a href="' . ICMS_URL . '/modules/' . $impressionModule -> getVar( 'dirname' ) . '/admin/index.php"><img src="' . ICMS_URL . '/modules/' . $mydirname . '/images/icon/computer.png" alt="' . _MB_IMPRESSION_ADMINSECTION . '" title="' . _MB_IMPRESSION_ADMINSECTION . '" align="absmiddle"/></a>&nbsp;';
			$articleload['adminarticle'] .= '<a href="' . ICMS_URL . '/modules/' . $mydirname . '/admin/index.php?op=edit&amp;aid=' . $myrow['aid'] . '"><img src="' . ICMS_URL . '/modules/' . $mydirname . '/images/icon/page_edit.png" alt="' . _MB_IMPRESSION_EDIT . '" title="' . _MB_IMPRESSION_EDIT . '" align="absmiddle"/></a>&nbsp;';
			$articleload['adminarticle'] .= '<a href="' . ICMS_URL . '/modules/' . $mydirname . '/admin/index.php?op=delete&amp;aid=' . $myrow['aid'] . '"><img src="' . ICMS_URL . '/modules/' . $mydirname . '/images/icon/page_delete.png" alt="' . _MB_IMPRESSION_DELETE . '" title="' . _MB_IMPRESSION_DELETE . '" align="absmiddle"/></a>';

        } else {
			$articleload['adminarticle'] = '[ <a href="' . ICMS_URL . '/modules/' . $mydirname . '/submit.php?op=edit&amp;aid=' . $myrow['aid'] . '&approve=1">' . _MB_IMPRESSION_APPROVE . '</a> | ';
			$articleload['adminarticle'] .= '<a href="' . ICMS_URL . '/modules/' . $mydirname . '/submit.php?op=delete&amp;aid=' . $myrow['aid'] . '">' . _MB_IMPRESSION_DELETE . '</a> ]';
        }

        $articleload['id'] 			= intval( $myrow['aid'] );
        $articleload['cid'] 		= intval( $myrow['cid'] );
        $articleload['title'] 		= $title;
        $articleload['title'] 		= '<a href="' . ICMS_URL . '/modules/' . $mydirname . '/singlearticle.php?cid=' . intval($myrow['cid']) . '&amp;aid=' . intval($myrow['aid']) . '">' . $title . ' </a>';
        $articleload['date'] 		= formatTimestamp( $myrow['published'], $options[2] );
        $articleload['hits'] 		= sprintf( _MB_IMPRESSION_ARTICLEHITS, intval( $myrow['hits'] ) );
        $articleload['submitter'] 	= xoops_getLinkedUnameFromId( $myrow['submitter'] );
        $articleload['introtext'] 	= $impressionmyts -> displayTarea( $myrow['introtext'], 1, 1, 1, 1, 1 );
        $articleload['readmore'] 	= '<a href="' . ICMS_URL . '/modules/' . $mydirname . '/singlearticle.php?cid=' . intval( $myrow['cid'] ) . '&amp;aid=' . intval( $myrow['aid'] ) . '">' . _MB_IMPRESSION_READMORE . '</a>';
		
		$rsssql = 'SELECT rssactive FROM ' . $xoopsDB -> prefix( 'impression_configs' );
		list( $rssactive ) = $xoopsDB -> fetchRow( $xoopsDB -> query( $rsssql ) );
		if ( $rssactive == 1 ) {
			$articleload['impression_feed'] = '<a href="'. ICMS_URL . '/modules/' . $mydirname . '/feed.php" target="_blank"><img src="'. ICMS_URL . '/modules/' . $mydirname . '/images/icon/feed.png" border="0" alt="' . _MB_IMPRESSION_FEED . '" title="' . _MB_IMPRESSION_FEED . '" /></a>';
			$xoopsTpl -> assign( 'xoops_module_header', '<link rel="alternate" type="application/rss+xml" title="' . _MB_IMPRESSION_FEED . '" href="'. ICMS_URL . '/modules/' . $mydirname . '/feed.php">' );
		}
		
        $xoopsTpl -> assign( 'dirname', $mydirname );
        $block['article'][] = $articleload;
    }
    unset( $_block_check_array );

    return $block;
} 

// b_impresson_top_edit()
// @param $options
// @return
function b_impression_spot_edit( $options ) {
    $form = '' . _MB_IMPRESSION_DISP . '&nbsp;';
    $form .= '<input type="hidden" name="options[]" value="';
    if ( $options[0] == 'spot' ) {
        $form .= 'spot"';
    }
    $form .= ' />';
    $form .= '<input type="text" name="options[]" value="' . $options[1] . '" />&nbsp;' . _MB_IMPRESSION_FILES . '';
    $form .= '&nbsp;<br />' . _MB_IMPRESSION_DATEFORMAT . '&nbsp;<input type="text" name="options[]" value="' . $options[2] . '" />&nbsp;' . _MB_IMPRESSION_DATEFORMATMANUAL;
	
    $chk   = '';
	if ($options[3] == 0) {
		$chk = ' checked="checked"';
	}
	$form .= '&nbsp;<br />' . _MB_IMPRESSION_SELECTFEED . '&nbsp;<input type="radio" name="options[3]" value="0"' . $chk . ' />&nbsp;' . _MB_IMPRESSION_ICMSFEED . '&nbsp;';
	
	$chk   = '';
	if ($options[3] == 1) {
		$chk = ' checked="checked"';
	}
	$form .= '&nbsp;<input type="radio" name="options[3]" value="1"' . $chk . ' />&nbsp;' . _MB_IMPRESSION_RSSFITFEED . '<br />' . _MB_IMPRESSION_SELECTFEED_DSC . '';
	
    return $form;
}
?>