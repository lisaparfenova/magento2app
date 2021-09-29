<?php

namespace Astrio\Module6\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;

class AddMultiAttribute implements DataPatchInterface, PatchRevertableInterface
{
    /**
     * @var \Magento\Framework\Setup\ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * Constructor
     *
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EavSetupFactory $eavSetupFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        $this->moduleDataSetup->getConnection()->startSetup();
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);
        $eavSetup->addAttribute(\Magento\Catalog\Model\Product::ENTITY, 'amultitest',
            [
            	'type' => 'text',
                'label' => 'AMultiTest',
                'input' => 'multiselect',
                'source' => '',
                'frontend' => '',
                'required' => false,
                'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                'default' => null,
                'visible' => true,
                'user_defined' => true,
                'visible_on_front' => true,
                'unique' => false,
                'apply_to' => '',
                'used_in_product_listing' => true,
                'option' => ['value' => [
                  				'option_1'=>[ 
                                  0=>'label for adm',
                                  1=>'label for front'
                                  ],
                            	'option_2'=>[
                                  0=>'label for adm2',
                                  1=>'label for front2'
                                  ],
                            ],
                            'order'=>
                                 [
                                      'option_1'=>1,
                                      'option_2'=>2
                                 ]
                        ]                     
            ]
        );
        $this->moduleDataSetup->getConnection()->endSetup();
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {            
        return [];
    }

    public function revert()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
}
