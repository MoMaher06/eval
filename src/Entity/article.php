<?php

namespace App\Entity;

/**
 * Une entité (ou entity) est une classe dont l'objectif est de représentant sous forme d'objet
 * une table de notre base de données. On se servira de cette classe pour faire transiter les données entre
 * les différentes couches de l'application
 */
class article{
    
    private string $titre;
    private string $contenu;
    private string $auteur;
    private int $id_categorie;
  
	private string $image;
	private int $id;
   


    public function __construct(string $titre,string $contenu ,string $auteur,int $id_categorie,string $image,int $id=null)
    {
        $this->titre = $titre;
		$this->contenu = $contenu;
        $this->auteur = $auteur;
        $this->id_categorie =$id_categorie;
		$this->image=$image;
		$this->id=$id;
}



	/**
	 * @return 
	 */
	public function getTitre(): string {
		return $this->titre;
	}
	
	/**
	 * @param  $titre 
	 * @return self
	 */
	public function setTitre(string $titre): self {
		$this->titre = $titre;
		return $this;
	}
	
	/**
	 * @return 
	 */
	public function getContenu(): string {
		return $this->contenu;
	}
	
	/**
	 * @param  $contenu 
	 * @return self
	 */
	public function setContenu(string $contenu): self {
		$this->contenu = $contenu;
		return $this;
	}
	
	/**
	 * @return 
	 */
	public function getAuteur(): string {
		return $this->auteur;
	}
	
	/**
	 * @param  $auteur 
	 * @return self
	 */
	public function setAuteur(string $auteur): self {
		$this->auteur = $auteur;
		return $this;
	}
	
	/**
	 * @return 
	 */
	public function getId_categorie(): int {
		return $this->id_categorie;
	}
	
	/**
	 * @param  $id_categorie 
	 * @return self
	 */
	public function setId_categorie(int $id_categorie): self {
		$this->id_categorie = $id_categorie;
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

	/**
	 * @return 
	 */
	public function getImage(): string {
		return $this->image;
	}
	
	/**
	 * @param  $image 
	 * @return self
	 */
	public function setImage(string $image): self {
		$this->image = $image;
		return $this;
	}
}