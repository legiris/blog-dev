<?php

namespace pds\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="comment")
 * @ORM\HasLifecycleCallbacks
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=2500)
     */
    protected $text;

    /**
     * @ORM\Column(type="string", length=32)
     */
    protected $login;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $date;
    
    /**
     * @ORM\PrePersist
     */
    function onPrePersist()
    {
        $this->date = new \DateTime('now');
    }

    /**
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumn(name="article_id", referencedColumnName="id")
     * @ORM\Column(name="article_id", type="integer")
     */
    protected $articleId;


    public function getId()
    {
        return $this->id;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getArticleId()
    {
        return $this->articleId;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setArticleId($articleId)
    {
        $this->articleId = $articleId;
    }
}