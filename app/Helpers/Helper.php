<?php

namespace App\Helpers;

class Helper
{
    public static function processBase64Images($body)
    {
        $pattern = '/<img.*?src=["\'](data:image\/.*?;base64,.*?)["\'].*?>/i';
        $replacement = '<img src="$1" width="400">';
        $processedBody = preg_replace($pattern, $replacement, $body);

        return $processedBody;
    }
}
