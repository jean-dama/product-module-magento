<?php

namespace Custom\Product\Model;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @param ScopeConfigInterface $scopeConfig
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        ProductRepositoryInterface $productRepository
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->productRepository = $productRepository;
    }
    /**
     * @return bool
     */
    public function canShowBlock()
    {
        return $this->scopeConfig->isSetFlag('catalog/custom_product/enabled');
    }
    /**
     * @return string
     */
    public function getProductSku()
    {
        return $this->scopeConfig->getValue('catalog/custom_product/sku');
    }
    /**
     * @return ProductInterface|Product|null
     */
    public function getConfiguredProduct()
    {
        $sku = $this->getProductSku();

        try {
            return $this->productRepository->get($sku);
        } catch (\Exception $e) {
            return null;
        }
    }
}
