<?php

namespace App\Service;

class DatasetService
{

    private $data = array();

    public static function init(): static
    {
        return new static();
    }

    /**
     * @throws \JsonException
     */
    public function alphabetical(&$dataset): void
    {
        usort($dataset, static function($stringOne, $stringTwo) {
            return strcmp($stringOne['label'], $stringTwo['label']);
        });

        foreach ($dataset as &$item) {
            if (isset($item['children']) && is_array($item['children'])) {
                $this->alphabetical($item['children']);
            }
        }
    }

}
