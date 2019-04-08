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
    }
}
