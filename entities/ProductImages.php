<?php
namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * ProductImages
 *
 * @ORM\Table(name="product_images")
 * @ORM\Entity
 */
class ProductImages
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="file", type="string", length=50, nullable=false)
     */
    private $file = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="productId", type="string", length=50, nullable=false)
     */
    private $productid = '0';


}
