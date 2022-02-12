<?php

namespace App\Data;

class EditBookDTO
{
    private $bookDTO;
    private $genres;


    /**
     * Get the value of bookDTO
     */ 
    public function getBookDTO()
    {
        return $this->bookDTO;
    }

    /**
     * Set the value of bookDTO
     *
     * @return  self
     */ 
    public function setBookDTO($bookDTO)
    {
        $this->bookDTO = $bookDTO;

        return $this;
    }

    /**
     * Get the value of genres
     */ 
    public function getGenres()
    {
        return $this->genres;
    }

    /**
     * Set the value of genres
     *
     * @return  self
     */ 
    public function setGenres($genres)
    {
        $this->genres = $genres;

        return $this;
    }
}