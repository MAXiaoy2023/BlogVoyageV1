<?php

namespace App\Entity;

class Article {
    private ?int $id;
    private string $auteur;
    private string $datePublication;
    private string $titre;
    private string $content;
    private string $image;
    private int $id_categorie;

    public function __construct(int $id, string $auteur, string $datePublication, string $titre, string $content, string $image, int $id_categorie)
    {
        $this->id = $id;
        $this->auteur = $auteur;
        $this->datePublication = $datePublication;
        $this->titre = $titre;
        $this->content = $content;
        $this->image = $image;
        $this->id_categorie = $id_categorie;
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
	public function getDatePublication(): string {
		return $this->datePublication;
	}
	
	/**
	 * @param  $datePublication 
	 * @return self
	 */
	public function setDatePublication(string $datePublication): self {
		$this->datePublication = $datePublication;
		return $this;
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
	public function getContent(): string {
		return $this->content;
	}
	
	/**
	 * @param  $content 
	 * @return self
	 */
	public function setContent(string $content): self {
		$this->content = $content;
		return $this;
	}
}