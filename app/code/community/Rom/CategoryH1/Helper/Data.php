<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @category   Rom
 * @package    Rom_CategoryH1
 * @copyright  Copyright (c) 2013 ROM Agence de communication <rom@rom.fr>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author     André Herrn <andre.herrn@rom.fr>
 */

/**
 * Standard helper
 * 
 * @category   Rom
 * @package    Rom_CategoryH1
 * @author     André Herrn <andre.herrn@rom.fr>
 */
class Rom_CategoryH1_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Get category h1 title or as fallback the category name
     * 
     * @param Mage_Catalog_Model_Category $category
     * @return string
     */
    public function getCategoryTitle($category)
    {
        //Set category title
        if (true === is_null($category->getCategoryH1Title()) || '' == $category->getCategoryH1Title()) {
            return $category->getName();
        } else {
            return $category->getCategoryH1Title();
        }
    }
}