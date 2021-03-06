<?php

namespace MageNet\MagicApi\Block\Adminhtml\PaymentTransaction\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;;

class SaveButton extends GenericButton implements ButtonProviderInterface
{
    /** {@inheritdoc} */
    public function getButtonData()
    {
        return [
            'label' => __('Save Payment Transaction'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }
}
