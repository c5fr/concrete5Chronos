<?php
/**
 * This c5 block provides historical events happened in the past the same day as the present day
 *
 *
 * @author   Fred Radeff <fradeff@akademia.ch>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.akademia.ch
 */

defined('C5_EXECUTE') or die('Access Denied. ');
class ChronologiesBlockController extends BlockController {
	
	protected $btTable = 'btChronologies';
	
	public function getBlockTypeDescription() {
		return t("Chronologies / anniversaires aléatoires sur vos pages.");
	}
	public function getBlockTypeName() {
		return t("Chronologies");
	}
	
	public function mois_texte($mois) {
	
	$mois=preg_replace("/12/","décembre",$mois);
	$mois=preg_replace("/11/","novembre",$mois);
	$mois=preg_replace("/10/","octobre",$mois);
	$mois=preg_replace("/09/","septembre",$mois);
	$mois=preg_replace("/08/","août",$mois);
	$mois=preg_replace("/07/","juillet",$mois);
	$mois=preg_replace("/06/","juin",$mois);
	$mois=preg_replace("/05/","mai",$mois);
	$mois=preg_replace("/04/","avril",$mois);
	$mois=preg_replace("/03/","mars",$mois);
	$mois=preg_replace("/02/","février",$mois);
	$mois=preg_replace("/01/","janvier",$mois);
	return $mois;
	}
	public function anniversaire() {
		//$myString = t('<blink>Hello</blink>');
		//return $myString;
		//Database::setDebug(true);
		$db = Loader::db();
		$blocks = array();
		
		$aujourdhui=date("m-d");
		$sql="SELECT * FROM btChronologies WHERE date LIKE '%".$aujourdhui."' ORDER BY Rand() LIMIT 0,1";
		$blocks = $db->Execute($sql);
		return $blocks;
	}
	
	public function view(){
			
	}

}
?>
