<?php

namespace ThreadAndMirror\ProductsBundle\Service\Formatter;

use ThreadAndMirror\ProductsBundle\Entity\Product;

class TheOutnetFormatter extends AbstractFormatter
{
	protected function cleanupCrawledName(Product $product)
	{
		$result = $this
			->format($product->getName())
			->trim()
			->result();

		$product->setName($result);
	}

	protected function cleanupCrawledBrand(Product $product)
	{
		$result = $this
			->format($product->getBrandName())
			->name()
			->result();

		$product->setBrandName($result);
	}

	protected function cleanupCrawledPid(Product $product)
	{
		$result = $this
			->format($product->getPid())
			->result();

		$product->setPid($result);
	}

	protected function cleanupCrawledDescription(Product $product)
	{
		$result = $this
			->format($product->getDescription())
			->trim()
			->result();

		$product->setDescription($result);
	}

	protected function cleanupCrawledImages(Product $product)
	{
		$result = $this
			->format($product->getImages())
			->prepend('http:')
			->replace('in_s', 'in_xl')
			->result();

		$product->setImages($result);
	}

	protected function cleanupCrawledPortraits(Product $product)
	{

		$result = $this
			->format($product->getPortraits())
			->prepend('http:')
			->replace('in_s', 'in_sl')
			->result();

		$product->setPortraits($result);
	}

	protected function cleanupCrawledThumbnails(Product $product)
	{
		$result = $this
			->format($product->getThumbnails())
			->prepend('http:')
			->result();

		$product->setThumbnails($result);
	}

	protected function cleanupCrawledAvailableSizes(Product $product)
	{
		$result = $this
			->format($product->getAvailableSizes())
			->trim()
			->result();

		$product->setAvailableSizes($result);
	}

	protected function cleanupCrawledStockedSizes(Product $product)
	{
		$result = $this
			->format($product->getStockedSizes())
			->trim()
			->result();

		$product->setStockedSizes($result);
	}

	protected function cleanupCrawledStyleWith(Product $product)
	{

	}
}