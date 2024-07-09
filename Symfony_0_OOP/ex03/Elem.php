<?php
class Elem {
	private string $element;
	private string $content;
    
    private static $selfClosingTags = ['meta', 'img', 'hr', 'br'];

    public function __construct(string $element, string $content = '') {
        $this->element = $element;
        $this->content = $content;
    }
	
    // Méthode pour ajouter un nouvel élément au contenu de la balise
    public function pushElement(Elem $element): void {
        $this->content .= $element->getHTML();
    }

    // Méthode pour générer le HTML complet de la balise
    public function getHTML(): string {
        if (in_array($this->element, self::$selfClosingTags)) {
            return "<{$this->element} />";
        }
        return "<{$this->element}>{$this->content}</{$this->element}>";
    }
}
?>
