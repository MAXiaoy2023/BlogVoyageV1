<?php

namespace App\Entity;

class Categorie {
    private int $id;
    private string $label;

public function __construct(?int $id = null, string $label)
    {
        $this->id = $id;
        $this->label = $label;
    }

	/**
	 * @return 
	 */
	public function getId(): int {
		return $this->id;
	}
	
	/**
	 * @param  $id 
	 * @return self
	 */
	public function setId(int $id): self {
		$this->id = $id;
		return $this;
	}

	/**
	 * @return 
	 */
	public function getLabel(): string {
		return $this->label;
	}
	
	/**
	 * @param  $label 
	 * @return self
	 */
	public function setLabel(string $label): self {
		$this->label = $label;
		return $this;
	}
}

