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
 * Rewritten Category Module
 * 
 * @category   Rom
 * @package    Rom_CategoryH1
 * @author     André Herrn <andre.herrn@rom.fr>
 */
class Rom_CategoryH1_Model_Category extends Mage_Catalog_Model_Category
{
    public $categoryViewTemplates = array(
        'catalog/category/view.phtml'
    );

    /**
     * Get category name
     * 
     * @return string
     */
    public function getName()
    {
        $currentCategory = Mage::registry('current_category');

        //Check if current category is given and IDs are matching
        if ($currentCategory instanceof Mage_Catalog_Model_Category
            && $this->getId() == $currentCategory->getId()
            && true === $this->referrerIsCategoryViewTemplate()) {
            //If the special h1 title is given, use it. Otherwise return the normal name
            if (false === is_null($currentCategory->getCategoryH1Title()) && '' != $currentCategory->getCategoryH1Title()) {
                return $currentCategory->getCategoryH1Title();
            } else {
                return parent::getName();
            }
        } else {
            return parent::getName();
        }
    }

    /**
     * Check if the referrer is the original catalog category view template
     *
     * The replacement by the new attribute should only occur in this template
     * 
     * @return boolean
     */
    public function referrerIsCategoryViewTemplate()
    {
        //Loop though every frame of the strack trace
        foreach (debug_backtrace() as $frame) {
            foreach ($this->categoryViewTemplates as $categoryViewTemplate) {
                if (false !== strpos($frame['file'], $categoryViewTemplate)) {
                    return true;
                }
            }
        }
        return false;
    }
}