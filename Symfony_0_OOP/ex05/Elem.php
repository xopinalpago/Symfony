<?php
require_once 'MyException.php';
class Elem {
	private string $element;
	private string $content;
    private array $attributes = [];

    private static $tags = ['meta', 'img', 'hr', 'br', 'html',
                            'head', 'body', 'title', 'h1', 'h2',
                            'h3', 'h4', 'h5', 'h6', 'p', 'span',
                            'div', 'table', 'tr', 'th', 'td', 'ul',
                            'ol', 'li'];
    private static $selfClosingTags = ['meta', 'img', 'hr', 'br'];

    public function __construct(string $element, string $content = '', $attributes = []) {
        if (!in_array($element, self::$tags)) {
            throw new MyException("Cannot add child elements to this type of HTML tag: {$element}");
        }
        $this->element = $element;
        $this->content = $content;
        $this->attributes = $attributes;
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

    public function validPage(): bool {
        $html = $this->getHTML();
        
        $dom = new DOMDocument();
        libxml_use_internal_errors(true); // Pour ignorer les erreurs de syntaxe HTML
        $dom->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();

        $valid = true;
        $htmlTag = $dom->getElementsByTagName('html');
        if ($htmlTag->length !== 1) {
            $valid = false;
        } else {
            $headTags = $dom->getElementsByTagName('head');
            if ($headTags->length !== 1) {
                $valid = false;
            }
            $bodyTags = $dom->getElementsByTagName('body');
            if ($bodyTags->length !== 1) {
                $valid = false;
            }
        }

        $headTags = $dom->getElementsByTagName('head');
        if ($headTags->length === 1) {
            $titleTags = $headTags->item(0)->getElementsByTagName('title');
            if ($titleTags->length !== 1) {
                $valid = false;
            }
            $metaTags = $headTags->item(0)->getElementsByTagName('meta');
            $charsetCount = 0;
            foreach ($metaTags as $meta) {
                if ($meta->hasAttribute('charset') && strtolower($meta->getAttribute('charset')) === 'utf-8') {
                    $charsetCount++;
                }
            }
            if ($charsetCount !== 1) {
                $valid = false;
            }
        } else {
            $valid = false;
        }

        if (preg_match('/<p>(<[^>]+>)+.*<\/p>/s', $html)) {
            $valid = false;
        }

        $tableTags = $dom->getElementsByTagName('table');
        foreach ($tableTags as $table) {
            $trTags = $table->getElementsByTagName('tr');
            foreach ($trTags as $tr) {
                $children = $tr->childNodes;
                foreach ($children as $child) {
                    if ($child->nodeType === XML_ELEMENT_NODE && !in_array($child->nodeName, ['th', 'td'])) {
                        $valid = false;
                        break 3;
                    }
                }
            }
        }

        $ulTags = $dom->getElementsByTagName('ul');
        $olTags = $dom->getElementsByTagName('ol');
        foreach ([$ulTags, $olTags] as $tags) {
            foreach ($tags as $ul) {
                foreach ($ul->childNodes as $children) {
                    if ($children->nodeType === XML_ELEMENT_NODE && $children->tagName !== 'li') {
                        $valid = false;
                        break 3;
                    }
                }
            }
        }
        return $valid;
    }



}
?>