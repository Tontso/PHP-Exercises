<?php

namespace DTO;

use DTO\UserDTO;

class BookDTO
{
    private $id;
    private $title;
    private $author;
    private $description;
    private $imageURL;
    /**
     * @var GenreDTO
     */
    private $genre;

    /**
     * @var UserDTO
     */
    private $user;
    private $addedOn;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of addedOn
     */ 
    public function getAddedOn()
    {
        return $this->addedOn;
    }

    /**
     * Set the value of addedOn
     *
     * @return  self
     */ 
    public function setAddedOn($addedOn)
    {
        $this->addedOn = $addedOn;

        return $this;
    }

    /**
     * Get the value of author
     */ 
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @return  self
     */ 
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImageURL()
    {
        return $this->imageURL;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImageURL($imageURL)
    {
        $this->imageURL = $imageURL;

        return $this;
    }

    /**
     * Get the value of userId
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of userId
     *
     * @return  self
     */ 
    public function setUser(UserDTO $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of genre
     * @return GenreDTO
     */ 
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set the value of genre
     *
     * @return  self
     */ 
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }
}