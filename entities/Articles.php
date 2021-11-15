<?php
namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * Articles
 *
 * @ORM\Table(name="articles")
 * @ORM\Entity
 */
class Articles
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
     * @ORM\Column(name="name", type="string", length=250, nullable=false)
     */
    private $name = '0';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=2500, nullable=false)
     */
    private $keywords;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="text", length=255, nullable=true)
     */
    private $title;

    /**
     * @var int|null
     *
     * @ORM\Column(name="category_id", type="integer", nullable=true)
     */
    private $categoryId;

    /**
     * @ORM\ManyToOne(targetEntity=Categories::class, inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity=Images::class, mappedBy="article", orphanRemoval=true)
     */
    private $images;

    /**
     * @ORM\ManyToOne(targetEntity=Usenrs::class, inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;



    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var int|null
     *
     * @ORM\Column(name="user_id", type="integer", nullable=true)
     */
    private $userId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="text", type="text", length=16777215, nullable=true)
     */
    private $text;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return int|null
     */
    public function getCategoryid(): int
    {
        return $this->categoryid;
    }

    /**
     * @param int|null $categoryid
     */
    public function setCategoryid(int $categoryid)
    {
        $this->categoryid = $categoryid;
    }

    /**
     * @return \DateTime|null
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @param \DateTime|null $date
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * @return int|null
     */
    public function getUserid(): int
    {
        return $this->userId;
    }

    /**
     * @param int|null $userid
     */
    public function setUserid(int $userid)
    {
        $this->userId = $userid;
    }

    /**
     * @return string|null
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     */
    public function setText(string $text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getKeywords(): string
    {
        return $this->keywords;
    }

    /**
     * @param string $keywords
     * @return Articles
     */
    public function setKeywords(string $keywords): Articles
    {
        $this->keywords = $keywords;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     * @return Articles
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param mixed $images
     * @return Articles
     */
    public function setImages($images)
    {
        $this->images = $images;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     * @return Articles
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }


}
