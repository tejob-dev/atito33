<?php

if (!function_exists('adjustPresentation')) {
    function adjustPresentation($text, $maxLength = 65 * 3, $subs=true) {
        // Remove HTML tags to work with plain text length (if needed)
        // $text = strip_tags($text);
    
        // Calculate the length of the text in characters
        $currentLength = mb_strlen($text, 'UTF-8');
        
        if ($currentLength < $maxLength) {
            // Pad with &nbsp; until text reaches $maxLength characters
            $paddingNeeded = $maxLength - $currentLength;
            // Append &nbsp; multiplied by paddingNeeded
            // Note: This adds the literal string "&nbsp;" paddingNeeded times.
            // If you want actual non-breaking spaces, you can use "\u00A0" (in PHP via html_entity_decode) or simply a space.
            $text .= str_repeat('&nbsp;', $paddingNeeded);
        } elseif ($currentLength > $maxLength) {
            // Trim the text to maxLength characters and add ellipsis
            $text = mb_substr($text, 0, $maxLength, 'UTF-8') . $subs?'…':'';
        }
        
        return $text;
    }
}