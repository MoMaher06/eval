<?php

namespace App\Entity;


class commentaire{
    
    private string $commentaire;
    private int $id_article;
    private ?int $id=null;
   


    public function __construct(string $commentaire, int $id_article, int $id)
    {
        $this->commentaire = $commentaire;
        $this->$id_article =$id_article;
        $this->id=$id;
}
	/**
	 * @return 
	 */
	public function getCommentaire(): string {
		return $this->commentaire;
	}
	
	/**
	 * @param  $commentaire 
	 * @return self
	 */
	public function setCommentaire(string $commentaire): self {
		$this->commentaire = $commentaire;
		return $this;
	}
	
	/**
	 * @return 
	 */
	public function getId_article(): int {
		return $this->id_article;
	}
	
	/**
	 * @param  $id_article 
	 * @return self
	 */
	public function setId_article(int $id_article): self {
		$this->id_article = $id_article;
		return $this;
	}
	
	/**
	 * @return 
	 */
	public function getId(): ?int {
		return $this->id;
	}
	
	/**
	 * @param  $id 
	 * @return self
	 */
	public function setId(?int $id): self {
		$this->id = $id;
		return $this;
	}
}