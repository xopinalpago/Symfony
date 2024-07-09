<?php
class Elem {
	private string $element;
	private string $content;
    private $attributes = array();

    private static $tags = ['meta', 'img', 'hr', 'br', 'html',
                            'head', 'body', 'title', 'h1', 'h2',
                            'h3', 'h4', 'h5', 'h6', 'p', 'span',
                            'div', 'table', 'tr', 'th', 'td', 'ul',
                            'ol', 'li'];
    private static $selfClosingTags = ['meta', 'img', 'hr', 'br'];

    public function __construct(string $element, string $content = '', $attributes = []) {
        if (!in_array($element, self::$tags)) {
            throw new Exception("Unsupported HTML tag: $element");
        }
        $this->element = $element;
        $this->content = $content;
        $this->attributes = $attributes;
    }
    
    public function MyException(Elem $elem) {
        throw new Exception("Cannot add child elements to this type of HTML tag: {$this->element}");
    }

    public function pushElement(Elem $element): void {
        $this->content .= $element->getHTML();
    }

    public function getHTML(): string {
        $attributeString = '';
        foreach ($this->attributes as $key => $value) {
            $attributeString .= " $key=\"$value\"";
        }
        if (in_array($this->element, self::$selfClosingTags)) {
            return "<{$this->element}{$attributeString} />";
        }
        return "<{$this->element}{$attributeString}>{$this->content}</{$this->element}>";
    }
}
?>