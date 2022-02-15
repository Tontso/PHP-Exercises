<?php

namespace DTO;

class NewBookForm extends BookDTO
{
    private $genreId;    

    /**
     * Get the value of genreId
     */ 
    public function getGenreId()
    {
        return $this->genreId;
    }

    /**
     * Set the value of genreId
     *
     * @return  self
     */ 
    public function setGenreId($genreId)
    {
        $this->genreId = $genreId;

        return $this;
    }
}