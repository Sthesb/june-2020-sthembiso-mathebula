<?php

use App\Functions;

    class FunctionsTest extends \PHPUnit\Framework\TestCase {

        public function testBubbleSort()
        {
            require_once './app/core/Functions.php';
            $functions = new Functions();
            $this->assertEquals('at', $functions->bubbleSort('ta'));
            
        }

      

        public function testQuickSort()
        {
            require_once './app/core/Functions.php';
            $functions = new Functions();
            $MyArray = str_split('food');

            $this->assertIsArray($functions->quickSort($MyArray));

        }

        
    }