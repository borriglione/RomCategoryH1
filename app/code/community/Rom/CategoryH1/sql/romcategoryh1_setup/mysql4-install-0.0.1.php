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

$installer = $this;
$setup = new Mage_Eav_Model_Entity_Setup('core_setup');
$installer->startSetup();
$helper = Mage::helper("romcategoryh1/data");

$setup->addAttribute(
    'catalog_category',
    'category_h1_title',
        array(
        'group'              => 'General',
        'input'              => 'text',
        'type'               => 'varchar',
        'label'              => $helper->__('Titre H1'),
        'backend'            => '',
        'visible'            => true,
        'required'           => false,
        'visible_on_front'   => true,
        'user_defined'       => true,
        'global'          => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE
    )
);
$installer->endSetup();
