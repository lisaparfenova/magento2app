<?php

namespace Astrio\Module6\Model\Config\Source;

class Priority extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource 
{        
    public function getAllOptions()
    {        
        return [
            ['value' => 'test1', 'label' => __('Priority1')],
            ['value' => 'test2', 'label' => __('Priority2')],
            ['value' => 'test3', 'label' => __('Priority3')],
            ['value' => 'test4', 'label' => __('Priority4')],
            ['value' => 'test5', 'label' => __('Priority5')],
            ['value' => 'test6', 'label' => __('Priority6')],
            ['value' => 'test7', 'label' => __('Priority7')],
            ['value' => 'test8', 'label' => __('Priority8')],
            ['value' => 'test9', 'label' => __('Priority9')],
            ['value' => 'test10', 'label' => __('Priority10')]
        ];
    }
}
