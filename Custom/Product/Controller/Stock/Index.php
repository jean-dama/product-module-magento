<?php
namespace Custom\Product\Controller\Stock;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Custom\Product\Model\Config;

class Index extends Action
{
    protected $productRepository;

    protected $config;
    public function __construct(
        Context $context,
        Config $config,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository
    ) {
        parent::__construct($context);
        $this->productRepository = $productRepository;
        $this->config = $config;
    }

    public function execute()
    {       
        try {
            $product = $this->config->getConfiguredProduct();

            if ($product->getExtensionAttributes() && $product->getExtensionAttributes()->getStockItem()) {
                $stock = $product->getExtensionAttributes()->getStockItem()->getQty();
                return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData(['stock' => $stock]);
            } else {
                return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData(['error' => 'Stock information not found']);
            }
        } catch (\Magento\Framework\Exception\NoSuchEntityException $e) {
            return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData(['error' => 'Product not found']);
        }
    }
}
