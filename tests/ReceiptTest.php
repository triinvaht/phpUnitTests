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
        //add an instance named coupon that is = null
        $coupon  =  null;
        //add coupon
        $output = $this->Receipt->total($input, $coupon);

        //we will erase the Receipt arrow total
        $this->assertEquals(
        //expectec  value
            15,
            $output,
            'When summing the total should equal 15'
        );
    }

    /*public function testTotal() {
        $input = [0,2,5,8];
        // add dummy object
        $coupon = null;
        $output = $this->Receipt->total($input, $coupon);
        $this->assertEquals(
            15,
            $output,
            'When summing the total should equal 15'
        );
    }*/

        public function testTotalAndCoupon() {
            $input = [0,2,5,8];
            //pass a coupon percentage value of 0.20.
            $coupon = 0.20;
            //coupon is used and takes 20% off the total sum
            $output = $this->Receipt->total($input, $coupon);
            $this->assertEquals(
                12,
                $output,
                'When summing the total should equal 12'
            );
        }

    // build a mock instance of the Receipt class and then return the sum from the two calls
    public function testPostTaxTotal() {
        // add in items is equal to an array
        $items = [1,2,5,8];
        // add a tax amount
        $tax = 0.20;
        // add a coupon value
        $coupon = null;
        // add $this->getMockBuilder and pass in the string that we want to build

        $Receipt = $this->getMockBuilder('TDD\Receipt')
            // add >setMethods() to define the methods our stub will respond to
            ->setMethods(['tax', 'total'])
            // return the instance of the mock with a call to getMock
            ->getMock();
        // add $Receipt->method
        //pass in the string name of the method to update our stub
        // to respond for tax and total and inform them to return the data
        // add arrow to expect this once.

        $Receipt->expects($this->once())
            //add $Receipt->method and then pass in the string name
            // update our stub to respond to our two method calls for tax and total
            // inform to return the data
            ->method('total')
            // add an arrow with passing in items and coupon
            ->with($items, $coupon)
            //add ->will() to call a method to return a value equal to 10.00
            //add $Receipt->method('tax') to repeat this for tax method
            ->will($this->returnValue(10.00));

        $Receipt->expects($this->once())
            ->method('tax')
            ->with(10.00, $tax)
            ->will($this->returnValue(1.00));
        // add $result is equal to our $Receipt instance - >postTaxTotal
        $result = $Receipt->postTaxTotal([1,2,5,8], 0.20, null);
        //add $this->assertEquals(11.00) and then $result
        $this->assertEquals(11.00, $result);
    }


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
