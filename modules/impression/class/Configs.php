<?php
/**
* Impression - a 'light' article management module for ImpressCMS
*
* Based upon WF-Links 1.06
*
* File: class/Configs.php
*
* @copyright	http://www.xoops.org/ The XOOPS Project
* @copyright	XOOPS_copyrights.txt
* @copyright	http://www.impresscms.org/ The ImpressCMS Project
* @license		GNU General Public License (GPL)
*				a copy of the GNU license is enclosed.
* ----------------------------------------------------------------------------------------------------------
* 				Impression
* @since		1.1
* @author		McDonald
* @version		$Id$
*/

defined( 'ICMS_ROOT_PATH' ) or die( 'ICMS root path not defined' );

class mod_impression_Configs extends icms_ipf_seo_Object {

	public function __construct( &$handler ) {
		icms_ipf_object::__construct( $handler );

		$this -> quickInitVar( 'dummy_key', XOBJ_DTYPE_INT, false );
		$this -> quickInitVar( 'rssactive', XOBJ_DTYPE_INT, false, '', '', 1 );
		$this -> quickInitVar( 'rsstitle', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'rsslink', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'rssdsc', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'rssimgurl', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'rsswidth', XOBJ_DTYPE_INT, false, '', '', 0 );
		$this -> quickInitVar( 'rssheight', XOBJ_DTYPE_INT, false, '', '', 0 );
		$this -> quickInitVar( 'rssimgtitle', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'rssimglink', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'rssttl', XOBJ_DTYPE_INT, false, '', '', 0 );
		$this -> quickInitVar( 'rsswebmaster', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'rsseditor', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'rsscategory', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'rssgenerator', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'rsscopyright', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'rsstotal', XOBJ_DTYPE_INT, false, '', '', 0 );
		$this -> quickInitVar( 'rssofftitle', XOBJ_DTYPE_TXTBOX, false );
		$this -> quickInitVar( 'rssoffdsc', XOBJ_DTYPE_TXTBOX, false );
	}
}