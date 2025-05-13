<?php
if (!function_exists('converter_slug')) {
    function converter_slug($name_lastname, $cedula = '')   {

        $text = Str::slug($name_lastname);

        if ($cedula != '') {
            $text .= '-' . $cedula;
        }

        return $text;
    }
}
?>