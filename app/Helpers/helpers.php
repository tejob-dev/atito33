<?php

if (!function_exists('adjustpresentation')) {
    function adjustpresentation($text, $maxLength = 65 * 3, $subs = true) {
        // Remove HTML tags to work with plain text length (if needed)
        // $text = strip_tags($text);
        if($maxLength) $maxLengthD = $maxLength; else $maxLengthD = 65 * 3;
        if($subs) $subsD = $subs; else $subsD = true;
    
        // Calculate the length of the text in characters
        $currentLength = mb_strlen($text, 'UTF-8');
        
        if ($currentLength < $maxLengthD) {
            // Pad with &nbsp; until text reaches $maxLength characters
            $paddingNeeded = $maxLengthD - $currentLength;
            // Append l non-breaking spaces, you can use "\u00A0"&nbsp; multiplied by paddingNeeded
            // Note: This adds the literal string "&nbsp;" paddingNeeded times.
            // If you want actua (in PHP via html_entity_decode) or simply a space.
            $text .= str_repeat('&nbsp;', $paddingNeeded);
        } elseif ($currentLength > $maxLengthD) {
            // Trim the text to maxLength characters and add ellipsis
            $text = mb_substr($text, 0, $maxLengthD, 'UTF-8') . $subsD?'…':'';
        }
        
        return $text;
    }
}

if (!function_exists('adjustpresentation2')) {
    function adjustpresentation2($text, $maxLength = 150, $lineLength = 50, $maxLines = 4, $subs = true) {
         // Longueur d'une ligne
         // Nombre maximum de lignes
        $currentLength = mb_strlen($text, 'UTF-8');
        $text = preg_replace('/\s+/', ' ', $text);
    
        if ($currentLength < $maxLength) {
            // Calcul du nombre de lignes actuelles
            $lines = ceil($currentLength / $lineLength);
    
            // Ajout de <br> pour atteindre 3 lignes si nécessaire
            $brNeeded = $maxLines - $lines;
            if ($brNeeded > 0) {
                $text .= str_repeat('<br>', $brNeeded);
                $text .= str_repeat('<br>', $brNeeded);
            }
        } elseif ($currentLength > $maxLength) {
            // Tronquer à 192 caractères et ajouter "…"
            $text = iconv_substr($text, 0, $maxLength - 3, 'UTF-8') . (($subs)?'…':'');
            // $text = mb_substr($text, 0, $maxLength - 3, 'UTF-8') . $subs?'…':'';
            // print($text); exit();
        }
    
        return $text;
    }
    
}

if (!function_exists('getcarddata')) {

    function getcarddata()
    {
        $data = [
            [
                "title" => "Mariagas Hotel, Abidjan",
                "text" => "Mariages, anniversaires, séminaires... Organisez un événement à la hauteur de vos attentes dans nos espaces adaptés à vos besoins. Réservez vite et faites la fête comme jamais.",
                "image" => "image_de_salle",
                "badge" => "Mariages",
            ],
            [
                "title" => "Réunions (Robert's Hotel)",
                "text" => "Découvrez notre salle de réunion ultra moderne, offrant un cadre professionnel et confortable.",
                "image" => "image_de_salle",
                "badge" => "Réunions",
            ],
            [
                "title" => "Réunions NAISSANCE (My Address Abidjan)",
                "text" => "Un espace à votre mesure | Notre Salle Renaissance peut accueillir jusqu'à 20 personnes en configuration U, idéale pour vos formations, ateliers ou réunions.",
                "image" => "image_de_salle",
                "badge" => "Réunions",
            ],
        ];

        return array_map(function ($item) {
            $object = new \stdClass();
            foreach ($item as $key => $value) {
                $object->$key = $value;
            }
            return $object;
        }, $data);
    }
    
}

