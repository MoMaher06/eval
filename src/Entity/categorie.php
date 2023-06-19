<?php

namespace App\Entity;


class categorie
{

    private string $namecategorie;
    private ?int $id = null;



    public function __construct(string $namecategorie, int $id)
    {
        $this->namecategorie = $namecategorie;
        
        $this->id = $id;
    }


	/**
	 * @return 
	 */
	public function getNamecategorie(): string {
		return $this->namecategorie;
	}
	
	/**
	 * @param  $namecategorie 
	 * @return self
	 */
	public function setNamecategorie(string $namecategorie): self {
		$this->namecategorie = $namecategorie;
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