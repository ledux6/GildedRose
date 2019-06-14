<?php

namespace App;

class GildedRoseTest extends \PHPUnit\Framework\TestCase {

    public function testQualityDegradationAfterSellInDatePasses(){
        $items      = [new Item("Generic item", 0, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(8, $items[0]->quality);
    }

    public function testThatQualityDoesntBecomeNegative(){
        $items      = [new Item("Generic item", 0, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(0, $items[0]->quality);
    }

    public function testAgedBrieQualityIncreasesWithTime(){
        $items      = [new Item("Aged Brie", 30, 5)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(6, $items[0]->quality);
    }

    public function testItemQualityDoesntExceed50(){
        $items      = [new Item("Aged Brie", 30, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(50, $items[0]->quality);
    }

    public function testIfSulfurasQuality(){
        $items      = [new Item("Sulfuras, Hand of Ragnaros", 5, 80)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(80, $items[0]->quality);
    }

    public function testBackstagePassQualityIncrease(){
        $items      = [new Item("Backstage passes to a TAFKAL80ETC concert", 20, 20)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(21, $items[0]->quality);
    }
    public function testBackstagePassQualityIncreaseBy2(){
        $items      = [new Item("Backstage passes to a TAFKAL80ETC concert", 10, 20)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(22, $items[0]->quality);
    }
    public function testBackstagePassQualityIncreaseBy3(){
        $items      = [new Item("Backstage passes to a TAFKAL80ETC concert", 5, 20)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(23, $items[0]->quality);
    }

    public function testBackstagePassQualityDropsToZeroAfterConcert(){
        $items      = [new Item("Backstage passes to a TAFKAL80ETC concert", 0, 20)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(0, $items[0]->quality);
    }

    public function testConjuredItemQualityDecreseBy2(){
        $items      = [new Item("Conjured Mana Cake", 20, 20)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(18, $items[0]->quality);
    }
    public function testConjuredItemQualityDecreseBy4(){
        $items      = [new Item("Conjured Mana Cake", 0, 20)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(16, $items[0]->quality);
    }
}
