<?php

namespace App\Helpers;

class SanityImage
{
    protected $image;

    public function __construct(array $image)
    {
        $this->image = $image;
    }

    public function getUrl(): string
    {
        $url = $this->image['asset']['url'];
        $metadata = $this->image['asset']['metadata']['dimensions'];
        $width = $metadata['width'];
        $height = $metadata['height'];

        // procesar recorte (crop)
        if (!empty($this->image['crop'])) {
            $crop = $this->image['crop'];
            $left = round($crop['left'] * $width);
            $top = round($crop['top'] * $height);
            $right = round($crop['right'] * $width);
            $bottom = round($crop['bottom'] * $height);

            $rectWidth = $width - $left - $right;
            $rectHeight = $height - $top - $bottom;

            $url .= '?rect=' . implode(', ', [$left, $top, $rectWidth, $rectHeight]);
        } else {
            $url .= '';
        }

        // procesar hotspot
        if (!empty($this->image['hotspot'])) {
            $hotspot = $this->image['hotspot'];
            $url .= '&fp-x=' . $hotspot['x'] . '&fp-y=' . $hotspot['y'];
        }

        return $url;
    }
}
