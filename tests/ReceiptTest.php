<?php
namespace TDD\Test;
require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR .'autoload.php';

use PHPUnit\Framework\TestCase;
use TDD\Receipt;

class ReceiptTest extends TestCase {
    public function setUp()
    {
        //add function setUpand
        //add this arrow Receipt is equal to new Receiptinside of the setUp method
        $this->Receipt = new Receipt();
    }
    //we'll add public function tearDown
    public function tearDown() {
        // we'll add unset this arrow Receipt
        unset($this->Receipt);
    }
    //we'll add variable output is equal to this arrow Receipt arrow total, pass in our variable input, add our semicolon and we'll take output and set it on line 21
    public function testTotal() {
        $input = [0,2,5,8];
        $output = $this->Receipt->total($input);

        $this->assertEquals(
        //we will erase the Receipt arrow total
        //expectec  value
            15,
            $output,
            'When summing the total should equal 15'
        );

        public function testTax() {
            $inputAmount = 10.00;
            //add an input amount variable of equal to 10 dollars, or 10.00
            $taxInput = 0.10;
            //add taxInput and it'll be equal to 0.10
            $output = $this->Receipt->tax($inputAmount, $taxInput);
            //call a tax method on our receipt object
            $this->assertEquals(
                1.00,
                $output,
                'The tax calculation should equal 1.00'
            );
        }
    }
}
