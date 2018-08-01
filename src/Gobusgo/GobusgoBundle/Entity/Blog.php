<?php

namespace Gobusgo\GobusgoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Gobusgo\GobusgoBundle\Repository\BlogRepository")
 * @ORM\Table(name="Blog")
 * @ORM\HasLifecycleCallbacks()
 */
class Blog
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")

     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Gobusgo\GobusgoBundle\Entity\User", cascade={"persist"}, inversedBy="id")
     */
    protected $author;

    /**
     * @ORM\Column(type="text")
     */
    protected $blog;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist"})
     *
     */
    protected $image;


    /**
     * @ORM\Column(type="text")
     */
    protected $tags;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="blog")
     */
    protected $comments;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated;

    /**
     * @ORM\Column(type="string")
     */
    protected $url;

//    /**
//     * @ORM\Column(type="string")
//     */
//    protected $slug;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="blogs")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;

    public function __construct()
    {
        $this->comments = new ArrayCollection();

        $this->setCreated(new \DateTime());
        $this->setUpdated(new \DateTime());
    }

    public function __toString()
    {
        return (string) $this->getTitle();
    }

//    public function slugify($text)
//    {
//        // replace non letter or digits by -
//        $text = preg_replace('#[^\\pL\d]+#u', '-', $text);
//
//        // trim
//        $text = trim($text, '-');
//
//        // transliterate
//        if (function_exists('iconv'))
//        {
//            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
//        }
//
//        // lowercase
//        $text = strtolower($text);
//
//        // remove unwanted characters
//        $text = preg_replace('#[^-\w]+#', '', $text);
//
//        if (empty($text))
//        {
//            return 'n-a';
//        }
//
//        return $text;
//    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedValue()
    {
        $this->setUpdated(new \DateTime());
    }


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Blog
     */
    public function setTitle($title)
    {
        $this->title = $title;

        $this->setSlug($this->title);
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set author.
     *
     * @param string $author
     *
     * @return Blog
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author.
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set blog.
     *
     * @param string $blog
     *
     * @return Blog
     */
    public function setBlog($blog)
    {
        $this->blog = $blog;

        return $this;
    }

    /**
     * Get blog.
     *
     * @return string
     */
    public function getBlog($length = null)
    {
        if (false === is_null($length) && $length > 0)
            return substr($this->blog, 0, $length);
        else
            return $this->blog;
    }

    /**
     * Set image.
     *
     * @param string $image
     *
     * @return Blog
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image.
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set tags.
     *
     * @param string $tags
     *
     * @return Blog
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags.
     *
     * @return string
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set created.
     *
     * @param \DateTime $created
     *
     * @return Blog
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created.
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated.
     *
     * @param \DateTime $updated
     *
     * @return Blog
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated.
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Add comment.
     *
     * @param \Gobusgo\GobusgoBundle\Entity\Comment $comment
     *
     * @return Blog
     */
    public function addComment(\Gobusgo\GobusgoBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment.
     *
     * @param \Gobusgo\GobusgoBundle\Entity\Comment $comment
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeComment(\Gobusgo\GobusgoBundle\Entity\Comment $comment)
    {
        return $this->comments->removeElement($comment);
    }

    /**
     * Get comments.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }

//    /**
//     * Set slug.
//     *
//     * @param string $slug
//     *
//     * @return Blog
//     */
//    public function setSlug($slug)
//    {
//        $this->slug = $this->slugify($slug);
//    }
//
//    /**
//     * Get slug.
//     *
//     * @return string
//     */
//    public function getSlug()
//    {
//        return $this->slug;
//    }

    /**
     * Set category.
     *
     * @param \Gobusgo\GobusgoBundle\Entity\Category|null $category
     *
     * @return Blog
     */
    public function setCategory(\Gobusgo\GobusgoBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category.
     *
     * @return \Gobusgo\GobusgoBundle\Entity\Category|null
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set url.
     *
     * @param string $url
     *
     * @return Blog
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}
