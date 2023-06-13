<?php

namespace App\Entity;

class Commentaire {
    private ?int $id;
    private string $commentaire;
    private string $userName;
    private string $dateInsertion;
    private int $id_article;

    public function __construct(int $id, string $userName, string $commentaire, string $dateInsertion, int $id_article)
    {
        $this->id = $id;
        $this->userName = $userName;
        $this->commentaire = $commentaire;
        $this->dateInsertion = $dateInsertion;
        $this->id_article = $id_article;
    }
	/**
	 * @return 
	 */
	public function getDateInsertion(): string {
		return $this->dateInsertion;
	}
	
	/**
	 * @param  $dateInsertion 
	 * @return self
	 */
	public function setDateInsertion(string $dateInsertion): self {
		$this->dateInsertion = $dateInsertion;
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
	public function getUserName(): string {
		return $this->userName;
	}
	
	/**
	 * @param  $userName 
	 * @return self
	 */
	public function setUserName(string $userName): self {
		$this->userName = $userName;
		return $this;
	}
}