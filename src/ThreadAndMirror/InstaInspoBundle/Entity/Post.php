<?php

namespace ThreadAndMirror\InstaInspoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="ThreadAndMirror\InstaInspoBundle\Repository\PostRepository")
 * @ORM\Table(name="tam_instainspo_post")
 */
class Post
{
    const STATUS_DRAFT = 'draft';

    const STATUS_PUBLISHED = 'published';

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=64)
     */
    private $status = self::STATUS_DRAFT;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $created;

    /**
     * Instagram post id
     *
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $pid;

    /**
     * Url to the instagram post
     *
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(groups={"create"})
     * @Assert\Url(groups={"create"})
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=512)
     */
    private $caption;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @var ArrayCollection
     *
     * @ORM\Column(type="array")
     */
    private $tags = [];

    /**
     * @var ArrayCollection|Post[]
     *
     * @ORM\OneToMany(targetEntity="Product", mappedBy="post")
     */
    private $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->tags = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getPid()
    {
        return $this->pid;
    }

    /**
     * @param string $pid
     */
    public function setPid($pid)
    {
        $this->pid = $pid;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @param string $caption
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return ArrayCollection|Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param ArrayCollection|Product[] $products
     */
    public function setProducts($products)
    {
        $this->products = $products;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return ArrayCollection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param ArrayCollection $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }
}