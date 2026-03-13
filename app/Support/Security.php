<?php

namespace App\Support;

use DOMDocument;
use DOMElement;
use DOMNode;

class Security
{
    /**
     * Allow a small set of formatting tags for CMS-authored rich text.
     */
    public static function sanitizeRichHtml(?string $html): string
    {
        if (!$html) {
            return '';
        }

        $allowedTags = [
            'p' => [],
            'br' => [],
            'strong' => [],
            'em' => [],
            'b' => [],
            'i' => [],
            'u' => [],
            'ul' => [],
            'ol' => [],
            'li' => [],
            'blockquote' => [],
            'h2' => [],
            'h3' => [],
            'h4' => [],
            'h5' => [],
            'h6' => [],
            'code' => [],
            'pre' => [],
            'a' => ['href', 'title', 'target', 'rel'],
        ];

        $previous = libxml_use_internal_errors(true);

        $dom = new DOMDocument('1.0', 'UTF-8');
        $wrappedHtml = '<div>'.$html.'</div>';

        if (!@$dom->loadHTML('<?xml encoding="utf-8" ?>'.$wrappedHtml, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD)) {
            libxml_clear_errors();
            libxml_use_internal_errors($previous);

            return '';
        }

        $wrapper = $dom->getElementsByTagName('div')->item(0);

        if (!$wrapper instanceof DOMElement) {
            libxml_clear_errors();
            libxml_use_internal_errors($previous);

            return '';
        }

        self::sanitizeNode($wrapper, $allowedTags);

        $sanitizedHtml = '';

        foreach ($wrapper->childNodes as $childNode) {
            $sanitizedHtml .= $dom->saveHTML($childNode);
        }

        libxml_clear_errors();
        libxml_use_internal_errors($previous);

        return $sanitizedHtml;
    }

    public static function safeExternalUrl(?string $url, string $fallback = '#', bool $allowAnchor = false): string
    {
        $url = trim((string) $url);

        if ($url === '') {
            return $fallback;
        }

        if ($allowAnchor && str_starts_with($url, '#')) {
            return $url;
        }

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return $fallback;
        }

        $scheme = strtolower((string) parse_url($url, PHP_URL_SCHEME));

        return in_array($scheme, ['http', 'https'], true) ? $url : $fallback;
    }

    public static function safeStorageAsset(?string $path, string $fallback = '#'): string
    {
        $path = trim((string) $path);

        if ($path === '' || str_contains($path, '..') || preg_match('/[^A-Za-z0-9_\-\/\.]/', $path)) {
            return $fallback;
        }

        return asset('storage/'.ltrim($path, '/'));
    }

    /**
     * @param array<string, array<int, string>> $allowedTags
     */
    private static function sanitizeNode(DOMNode $node, array $allowedTags): void
    {
        if (!$node->hasChildNodes()) {
            return;
        }

        $children = [];

        foreach ($node->childNodes as $childNode) {
            $children[] = $childNode;
        }

        foreach ($children as $childNode) {
            if ($childNode instanceof DOMElement) {
                $tag = strtolower($childNode->tagName);

                if (!array_key_exists($tag, $allowedTags)) {
                    self::unwrapElement($childNode);
                    continue;
                }

                self::sanitizeAttributes($childNode, $tag, $allowedTags[$tag]);
                self::sanitizeNode($childNode, $allowedTags);
                continue;
            }

            self::sanitizeNode($childNode, $allowedTags);
        }
    }

    /**
     * @param array<int, string> $allowedAttributes
     */
    private static function sanitizeAttributes(DOMElement $element, string $tag, array $allowedAttributes): void
    {
        $attributesToRemove = [];

        foreach ($element->attributes as $attribute) {
            $name = strtolower($attribute->name);

            if (!in_array($name, $allowedAttributes, true)) {
                $attributesToRemove[] = $attribute->name;
            }
        }

        foreach ($attributesToRemove as $attributeName) {
            $element->removeAttribute($attributeName);
        }

        if ($tag !== 'a') {
            return;
        }

        $href = trim((string) $element->getAttribute('href'));

        if ($href !== '') {
            $scheme = strtolower((string) parse_url($href, PHP_URL_SCHEME));
            $isRelative = str_starts_with($href, '/') || str_starts_with($href, '#');

            if (!$isRelative && !in_array($scheme, ['http', 'https', 'mailto', 'tel'], true)) {
                $element->removeAttribute('href');
            }
        }

        if ($element->getAttribute('target') !== '_blank') {
            $element->removeAttribute('target');
            $element->removeAttribute('rel');
            return;
        }

        $element->setAttribute('rel', 'noopener noreferrer');
    }

    private static function unwrapElement(DOMElement $element): void
    {
        $parent = $element->parentNode;

        if (!$parent) {
            return;
        }

        while ($element->firstChild) {
            $parent->insertBefore($element->firstChild, $element);
        }

        $parent->removeChild($element);
    }
}
