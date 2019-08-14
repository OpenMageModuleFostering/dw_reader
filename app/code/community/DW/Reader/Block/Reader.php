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

class DW_Reader_Block_Reader extends Mage_Core_Block_Template
{
	public $active; 
	public $show_links; 
	public $show_dt;
	public $show_desc; 
	public $dtformat; 	

	/**
     * Constructor.
     */
    public function _construct()
    {  
        parent::_construct();
        $this->setTemplate('dwreader/feed.phtml');
        $this->active = Mage::getStoreConfig('dw_reader/default/active');  		
		$this->show_links = Mage::getStoreConfig('dw_reader/default/show_links'); 
		$this->show_dt = Mage::getStoreConfig('dw_reader/default/show_date'); 
		$this->show_desc = Mage::getStoreConfig('dw_reader/default/show_desc'); 
		$this->dtformat = Mage::getStoreConfig('dw_reader/default/dateformat');        
    }
    
	public function _prepareLayout()
    {
    	/*$breadcrumbs = $this->getLayout()->getBlock('breadcrumbs');
    	if ($breadcrumbs) 
    	{
			$breadcrumbs->addCrumb('home', array('label'=>Mage::helper('cms')->__('Home'), 'title'=>Mage::helper('cms')->__('Home Page'), 'link'=>Mage::getBaseUrl()));
			$breadcrumbs->addCrumb('dwreader', array('label'=>'DW Feeds', 'title'=>'DW Feeds', 'link'=>Mage::getUrl("dwreader")));
    	}*/
		return parent::_prepareLayout();
    }    
    
    public function getFeeds($feed_url)
    {
		
		$article_num = Mage::getStoreConfig('dw_reader/default/article_number');		 
		//$feed_url = Mage::getStoreConfig('dw_reader/default/feed_url'); 		
		if($this->active == 1)
		{
			if(isset($feed_url) && !empty($feed_url))
			{
				try 
				{
	    			$channel = new Zend_Feed_Rss($feed_url);
	    			$f = 1;
				} catch (Exception $e) 
				{
	    			$e->getMessage();
	    			$f =2;
				}
				
				if($f == 1):				
					$i=0; 
					$items = array();
					foreach ($channel as $item): 
						if($item->pubDate()):
							$items[$i]['dt'] = strtotime($item->pubDate); 
						else:
							$items[$i]['dt'] = '';
						endif;	
						if($item->link()):
							$items[$i]['link'] = $item->link(); 				
						else:
							$items[$i]['link'] = '';
						endif;	
						if($item->title()):
							$items[$i]['title'] = $item->title();
						else:
							$items[$i]['title'] = '';
						endif;	
						if($item->description()):														
							$items[$i]['desc'] = $item->description();
						else:
							$items[$i]['desc'] = '';							
						endif;	
						$i++;
						if(isset($article_num) && !empty($article_num))
						{
							if($i == $article_num) break;
						}					
					endforeach;
					if(!empty($items)):					
						return $items;
					endif;					
				else:
					return false;
				endif;	
			}
		}
    }    
    
	
}
