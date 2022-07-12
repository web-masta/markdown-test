<?php

namespace WebMasta\MarkdownTest\Models;

class MarkDownModel
{
    /**
     * Regex fot bold replacement
     */
    protected const BOLD_PATTERN = [
        "/\*{2}(.*?)\*{2}/",
        "/_{2}(.*?)_{2}/"
    ];

    /**
     * Regex for italics replacement
     */
    protected const ITALICS_PATTERN = [
        "/\*(.*?)\*/",
        "/_(.*?)_/",
    ];

    /**
     * Perform filters
     * @param string $string
     * @return string
     */
    public function replace(string $string): string {
        $string = $this->bold($string);
        return $this->italics($string);
    }

    /**
     * Replace matches with bold formatting
     * @param string $string
     * @return string
     */
    public function bold(string $string): string {
        return preg_replace(self::BOLD_PATTERN, "<strong>$1</strong>", $string);
    }

    /**
     * Replace matches with italics formatting
     * @param string $string
     * @return string
     */
    public function italics(string $string): string {
        return preg_replace(self::ITALICS_PATTERN, "<i>$1</i>", $string);
    }
}