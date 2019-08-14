<?php
/**
 * DecryptWeb Reader Extension
 *
 * This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * @category    DW
 * @package     DW_Reader
 * @copyright   Copyright (c) 2014 DecryptWeb (http://www.decryptweb.com) All Rights Reserved.
 * @license     http://www.gnu.org/licenses/gpl-3.0.html  GNU/GPL
 */
 
class DW_Reader_IndexController extends Mage_Core_Controller_Front_Action
{	
	public function indexAction()
    {    	
		$this->loadLayout();     
		$this->renderLayout();
    } 
	
}