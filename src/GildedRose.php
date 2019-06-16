<?php

namespace App;

final class GildedRose {

    private $items = [];

    public function __construct($items) {
        $this->items = $items;
    }

    public function updateQuality() {
        foreach ($this->items as $item) {
            if($item->name == 'Sulfuras, Hand of Ragnaros'){
                $item->quality = 80;
            }
            elseif  ($item->name == 'Aged Brie'){
                $this->updateAgedBrie($item);
            }
            elseif ($item->name == 'Backstage passes to a TAFKAL80ETC concert'){
                $this->updateBackstagePass($item);
            }
            elseif ($item->name == 'Conjured Mana Cake'){
                $this->updateConjuredItem($item);
            }
            else{
                $this->updateGenericItem($item);
            }
        }
    }

    public function updateAgedBrie($item){
        $this->increaseQuality($item);
        $item->sell_in = $item->sell_in - 1;
    }

    public function updateBackstagePass($item){
        $this->increaseQuality($item);
        if ($item->sell_in < 11) {
            $this->increaseQuality($item);
        }
        if ($item->sell_in < 6) {
            $this->increaseQuality($item);
        }
        $item->sell_in = $item->sell_in - 1;
        if ($item->sell_in < 0) {
            $item->quality = 0;
        }
    }

    public function updateConjuredItem($item){
        $this->decreaseQuality($item,2);
        if($item->sell_in < 1) {
            $this->decreaseQuality($item,2);
        }
        $item->sell_in = $item->sell_in - 1;
    }

    public function updateGenericItem($item){
        $this->decreaseQuality($item,1);
        if ($item->sell_in < 1) {
            $this->decreaseQuality($item,1);
        }
        $item->sell_in = $item->sell_in - 1;
    }

    public function increaseQuality($item){
        if ($item->quality < 50) {
            $item->quality = $item->quality + 1;
        }
    }
    public function decreaseQuality($item, $decreaseBy)
    {
        for ($i = 0; $i < $decreaseBy; $i++){
            if ($item->quality > 0) {
                $item->quality = $item->quality - 1;
            }
        }
    }

//    public function updateQuality() {
//        foreach ($this->items as $item) {
//
//
//            if ($item->name != 'Aged Brie' and $item->name != 'Backstage passes to a TAFKAL80ETC concert') {
//                if ($item->quality > 0) {
//                    if ($item->name != 'Sulfuras, Hand of Ragnaros') {
//                        $item->quality = $item->quality - 1;
//                    } else {
//                        $item->quality = 80;
//                    }
//                }
//            } else {
//                if ($item->quality < 50) {
//                    $item->quality = $item->quality + 1;
//                    if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
//                        if ($item->sell_in < 11) {
//                            if ($item->quality < 50) {
//                                $item->quality = $item->quality + 1;
//                            }
//                        }
//                        if ($item->sell_in < 6) {
//                            if ($item->quality < 50) {
//                                $item->quality = $item->quality + 1;
//                            }
//                        }
//                    }
//                }
//            }
//
//            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
//                $item->sell_in = $item->sell_in - 1;
//            }
//
//            if ($item->sell_in < 0) {
//                if ($item->name != 'Aged Brie') {
//                    if ($item->name != 'Backstage passes to a TAFKAL80ETC concert') {
//                        if ($item->quality > 0) {
//                            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
//                                $item->quality = $item->quality - 1;
//                            }
//                        }
//                    } else {
//                        $item->quality = $item->quality - $item->quality;
//                    }
//                } else {
//                    if ($item->quality < 50) {
//                        $item->quality = $item->quality + 1;
//                    }
//                }
//            }
//        }
//    }
}

