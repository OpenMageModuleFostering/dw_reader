<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * @category    DW
 * @package     Dw_Reader
 * @copyright   Copyright (c) 2012 DecryptWeb (http://www.decryptweb.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class DW_Reader_Model_System_Config_Source_Dateformat
{
     /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => 'd-m-Y H:i:s', 'label'=>Mage::helper('adminhtml')->__('d-m-Y H:i:s')),
            array('value' => 'd.m.Y H:i:s', 'label'=>Mage::helper('adminhtml')->__('d.m.Y H:i:s')),
        );
    }

}