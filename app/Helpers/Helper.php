<?php

namespace App\Helpers;

use Intervention\Image\Facades\Image;

class Helper
{
    public static function processBase64Images($body)
    {
        $pattern = '/<img.*?src=["\'](data:image\/.*?;base64,.*?)["\'].*?>/i';
        $processedBody = preg_replace_callback($pattern, function ($matches) {
            $base64Image = $matches[1];
            $compressedImage = self::compressBase64Image($base64Image);
            $imgSrc = 'data:image/jpeg;base64,' . base64_encode($compressedImage);

            return '<img src="' . $imgSrc . '" width="400">';
        }, $body);

        return $processedBody;
    }

    private static function compressBase64Image($base64Image, $maxWidth = 700, $quality = 80)
    {
        $image = Image::make($base64Image);
        $image->resize($maxWidth, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        return $image->encode('jpg', $quality);
    }
}
