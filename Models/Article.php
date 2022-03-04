<?php

class Article {
    //Attributs
    private $id;
    private $title;
    private $content;

    public function __construct(array $data) {
        $this->hydrate($data);
    }

    public function hydrate(array $data): void {
        foreach ($data as $key => $value) {
            $method = 'set ' . ucfirst($key);
            method_exists($this, $method) ? $this->$method($value) : "";  
        }
        
    }    

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
    public function setId($id) {
        if (is_int($id)) {
            $this->id = $id;
        }   
        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title) {
        if (is_string($title) && strlen($title) > 1 && strlen($title) < 80) {
            $this->title = htmlspecialchars($title);
        }      
        return $this;
    }

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content) {
        if (is_string($content) && strlen($content) > 1 && strlen($content) < 500) {
            $this->content = htmlspecialchars($content);
        }      
        return $this;
    }
}


