<?php
/**
 * RedUNIT_Base_Nuke
 * 
 * @file    RedUNIT/Base/Nuke.php
 * @desc    Test the nuke() function.
 * @author  Gabor de Mooij and the RedBeanPHP Community
 * @license New BSD/GPLv2
 *
 * (c) G.J.G.T. (Gabor) de Mooij and the RedBeanPHP Community.
 * This source file is subject to the New BSD/GPLv2 License that is bundled
 * with this source code in the file license.txt.
 */
class RedUNIT_Base_Nuke extends RedUNIT_Base {
	
	/**
	 * Begin testing.
	 * This method runs the actual test pack.
	 * 
	 * @return void
	 */
	public function run() {
	
		R::nuke();
		$bean = R::dispense('bean');
		R::store($bean);
		asrt(count(R::$writer->getTables()),1);
		R::nuke();
		asrt(count(R::$writer->getTables()),0);
		$bean = R::dispense('bean');
		R::store($bean);
		asrt(count(R::$writer->getTables()),1);
		R::freeze();
		R::nuke();
		asrt(count(R::$writer->getTables()),1); //no effect
		R::freeze(false);		
		
	}

}