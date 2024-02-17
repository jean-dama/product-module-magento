<?php
namespace Custom\Product\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Catalog\Helper\Image;
use Custom\Product\Model\Config;

class CustomProduct extends Template
{
    /**
     * @var Image $imageHelper
     */
    protected $imageHelper;

    protected $config;

    /**
     * @param Context $context
     * @param Image $imageHelper
     * @param array $data
     */
    
    public function __construct(
        Context $context,
        Config $config,
        Image $imageHelper,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->imageHelper = $imageHelper;
        $this->config = $config;
    }
    /**
     * @param $product
     * @return int
     */
    public function getProductStock($product)
    {
        if ($product) {
            return $product->getExtensionAttributes()->getStockItem()->getQty();
        }
        return 0;
    }

    /**
     * @param $product
     * @return string
     */
    public function getProductUrl($product)
    {
        if ($product) {
            return $this->getUrl('catalog/product/view', ['id' => $product->getId()]);
        }
        return '#';
    }

    /**
     * @param $product
     * @return string
     */
    public function getImage($product)
    {
        return $this->imageHelper->init($product, 'product_base_image')->getUrl();
    }
    /**
     * @return bool
     */
    public function canShowBlock()
    {
        return $this->config->canShowBlock();
    }

    /**
     * @return string
     */
    public function getProductSku()
    {
        return $this->config->getProductSku();
    }

    /**
     * @return \Magento\Catalog\Api\Data\ProductInterface|\Magento\Catalog\Model\Product|null
     */
    public function getConfiguredProduct()
    {
        return $this->config->getConfiguredProduct();
    }
}
