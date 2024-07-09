<?php
class HotBeverage {
	protected string $nom;
	protected int $price;
	protected int $resistance;

    public function __construct(string $nom, float $price, int $resistance) {
        $this->nom = $nom;
        $this->price = $price;
        $this->resistance = $resistance;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getPrice(): int {
        return $this->price;
    }

    public function getResistance(): int {
        return $this->resistance;
    }
}
?>