<?php

function seo_title_init() {
elgg_register_plugin_hook_handler('format', 'friendly:title', 'seo_friendly_url_plugin_hook');
}

function seo_friendly_url_plugin_hook($hook, $entity_type, $returnvalue, $params) {
    $separator = "dash";
    $lowercase = TRUE;

    if ($entity_type == 'friendly:title') {
        $title = $params['title'];

        $title = strip_tags($title);
        $title = preg_replace("`\[.*\]`U","",$title);
        $title = preg_replace('`&(amp;)?#?[a-z0-9]+;`i','-',$title);
		$title = str_replace("А","a",$title);
		$title = str_replace("Б","b",$title);
		$title = str_replace("В","v",$title);
		$title = str_replace("Г","g",$title);
		$title = str_replace("Д","d",$title);
		$title = str_replace("Е","e",$title);
		$title = str_replace("Ё","e",$title);
		$title = str_replace("Ж","zh",$title);
		$title = str_replace("З","z",$title);
		$title = str_replace("И","i",$title);
		$title = str_replace("Й","j",$title);
		$title = str_replace("К","k",$title);
		$title = str_replace("Л","l",$title);
		$title = str_replace("М","m",$title);
		$title = str_replace("Н","n",$title);
		$title = str_replace("О","o",$title);
		$title = str_replace("П","p",$title);
		$title = str_replace("Р","r",$title);
		$title = str_replace("С","s",$title);
		$title = str_replace("Т","t",$title);
		$title = str_replace("У","u",$title);
		$title = str_replace("Ф","f",$title);
		$title = str_replace("Х","h",$title);
		$title = str_replace("Ц","ts",$title);
		$title = str_replace("Ч","ch",$title);
		$title = str_replace("Ш","sh",$title);
		$title = str_replace("Щ","shch",$title);
		$title = str_replace("Ы","y",$title);
		$title = str_replace("Ъ","",$title);
		$title = str_replace("Ь","",$title);
		$title = str_replace("Э","e",$title);
		$title = str_replace("Ю","yu",$title);
		$title = str_replace("Я","ya",$title);
		$title = str_replace("а","a",$title);
		$title = str_replace("б","b",$title);
		$title = str_replace("в","v",$title);
		$title = str_replace("г","g",$title);
		$title = str_replace("д","d",$title);
		$title = str_replace("е","e",$title);
		$title = str_replace("ё","e",$title);
		$title = str_replace("ж","zh",$title);
		$title = str_replace("з","z",$title);
		$title = str_replace("и","i",$title);
		$title = str_replace("й","j",$title);
		$title = str_replace("к","k",$title);
		$title = str_replace("л","l",$title);
		$title = str_replace("м","m",$title);
		$title = str_replace("н","n",$title);
		$title = str_replace("о","o",$title);
		$title = str_replace("п","p",$title);
		$title = str_replace("р","r",$title);
		$title = str_replace("с","s",$title);
		$title = str_replace("т","t",$title);
		$title = str_replace("у","u",$title);
		$title = str_replace("ф","f",$title);
		$title = str_replace("х","h",$title);
		$title = str_replace("ц","ts",$title);
		$title = str_replace("ч","ch",$title);
		$title = str_replace("ш","sh",$title);
		$title = str_replace("щ","shch",$title);
		$title = str_replace("ы","y",$title);
		$title = str_replace("ъ","",$title);
		$title = str_replace("ь","",$title);
		$title = str_replace("э","e",$title);
		$title = str_replace("ю","yu",$title);
		$title = str_replace("я","ya",$title);
        $title = htmlentities($title, ENT_COMPAT, 'utf-8');
        $title = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i","\\1", $title );
        $title = preg_replace( array("`[^a-z0-9]`i","`[-]+`") , "-", $title);

        if ($lowercase === TRUE) {
                $title = strtolower($title);
        }

        if($separator != 'dash') {
                $title = preg_replace('-', '_', $title);
            $separator = '_';
        }

        else {
                $separator = '-';
        }

        return trim($title, $separator);
    }

}

elgg_register_event_handler('init', 'system', 'seo_title_init');

?>