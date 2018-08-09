<?php

namespace MageNet\MagicApi\Ui\Components\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;

use MageNet\MagicApi\Api\Schema\PaymentTransactionSchemaInterface as SchemaInterface;

class Actions extends Column
{
    const URL_PATH_VIEW     = 'magenet_magicapi/payment/view';
    const URL_PATH_EDIT     = 'magenet_magicapi/payment/edit';
    const URL_PATH_DELETE   = 'magenet_magicapi/payment/delete';

    /** @var UrlInterface */
    protected $urlBuilder;

    /** @var string  */
    private $editUrl;

    /**
     * @param ContextInterface      $context
     * @param UiComponentFactory    $uiComponentFactory
     * @param UrlInterface          $urlBuilder
     * @param array                 $components
     * @param array                 $data
     * @param string                $editUrl
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = [],
        $editUrl = self::URL_PATH_EDIT
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->editUrl = $editUrl;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /** {@inheritdoc} */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $name = $this->getData('name');
                if (isset($item[SchemaInterface::ID_COLUMN_NAME])) {
                    $item[$name]['view'] = [
                        'href' => $this->urlBuilder->getUrl(
                            self::URL_PATH_VIEW, ['id' => $item[SchemaInterface::ID_COLUMN_NAME]]
                        ),
                        'label' => __('View')
                    ];
                    $item[$name]['edit'] = [
                        'href' => $this->urlBuilder->getUrl(
                            $this->editUrl, ['id' => $item[SchemaInterface::ID_COLUMN_NAME]]
                        ),
                        'label' => __('Edit')
                    ];
                    $item[$name]['delete'] = [
                        'href' => $this->urlBuilder->getUrl(
                            self::URL_PATH_DELETE, ['id' => $item[SchemaInterface::ID_COLUMN_NAME]]
                        ),
                        'label' => __('Delete'),
                        'confirm' => [
                            'title' => __('Delete "${ $.$data.title }"'),
                            'message' => __('Are you sure you wan\'t to delete a "${ $.$data.title }" record?')
                        ]
                    ];
                }
            }
        }

        return $dataSource;
    }
}
