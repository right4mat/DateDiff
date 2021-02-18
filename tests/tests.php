<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../calculator/calculator.php';

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestSuite;




final class DateCalculatorTest extends TestCase
{
    public function testSetBegdaExist(): void
    {

        $this->assertTrue(
            method_exists(new DateCalculator(), 'setBegda')
        );
    }

    public function testSetEnddaExist(): void
    {

        $this->assertTrue(
            method_exists(new DateCalculator(), 'setEndda')
        );
    }


    public function testGetBegdaExist(): void
    {

        $this->assertTrue(
            method_exists(new DateCalculator(), 'getBegda')
        );
    }


    public function testGetEnddaExist(): void
    {

        $this->assertTrue(
            method_exists(new DateCalculator(), 'getEndda')
        );
    }

    public function testDiffExist(): void
    {

        $this->assertTrue(
            method_exists(new DateCalculator(), 'diff')
        );
    }

    public function testCheckDateExist(): void
    {

        $this->assertTrue(
            method_exists(new DateCalculator(), 'checkDate')
        );
    }


    public function testOneDay(): void
    {

        $test1 = new DateCalculator();
        $test1->setBegda('07/11/1972');
        $test1->setEndda('08/11/1972');

        $this->assertEquals(
            0,
            $test1->diff()
        );
    }

    public function testSmallGap(): void
    {

        $test3 = new DateCalculator();
        $test3->setBegda('02/06/1983');
        $test3->setEndda('22/06/1983');

        $this->assertEquals(
            19,
            $test3->diff()
        );
    }

    public function testMediumGap(): void
    {

        $test2 = new DateCalculator();
        $test2->setBegda('04/07/1984');
        $test2->setEndda('25/12/1984');

        $this->assertEquals(
            173,
            $test2->diff()
        );
    }

    public function testLargeGap(): void
    {

        $test3 = new DateCalculator();
        $test3->setBegda('03/08/1983');
        $test3->setEndda('03/01/1989');

        $this->assertEquals(
            1979,
            $test3->diff()
        );
    }

    public function testExtraLargeGap(): void
    {

        $test3 = new DateCalculator();
        $test3->setBegda('01/01/1901');
        $test3->setEndda('31/12/2999');

        $this->assertEquals(
            401400,
            $test3->diff()
        );
    }

    public function testReverseDate(): void
    {

        $test3 = new DateCalculator();
        $test3->setBegda('03/01/1989');
        $test3->setEndda('03/08/1983');

        $this->assertEquals(
            1979,
            $test3->diff()
        );
    }
}


class RunTests
{
    private $_test, $_results;

    public function __construct() // set defualt format incase user doesnt
    {
        $this->_test = new TestSuite('DateCalculatorTest');
        $this->_results = $this->_test->run();
    }

    public function getResults()
    {
        return $this->_results;
    }

    public function hasPassed()
    {
        return $this->_results->wasSuccessful();
    }
};


