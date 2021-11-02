<?php

namespace Astrio\Module6\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;

class AddAttribute implements DataPatchInterface, PatchRevertableInterface
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
        $eavSetup->addAttribute(\Magento\Catalog\Model\Product::ENTITY, 'aatest',
            [
                'label' => 'AaTest',
                'input' => 'text',
                'source' => '',
                'frontend' => '',
                'required' => false,
                'backend' => '',
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                'default' => null,
                'visible' => true,
                'user_defined' => true,
                'visible_on_front' => true,
                'unique' => false,
                'apply_to' => '',
                'used_in_product_listing' => true
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