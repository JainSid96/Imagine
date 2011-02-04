<?php

namespace Imagine;

class ColorTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldSetColorToWhite()
    {
        $color = new Color('fff');

        $this->assertEquals(255, $color->getRed());
        $this->assertEquals(255, $color->getGreen());
        $this->assertEquals(255, $color->getBlue());
        $this->assertEquals(100, $color->getAlpha());
    }

    /**
     * @expectedException Imagine\Exception\InvalidArgumentException
     */
    public function testShouldThrowExceptionOnAlphaMoreThan100Percent()
    {
        new Color('fff', 200);
    }

    /**
     * @expectedException Imagine\Exception\InvalidArgumentException
     */
    public function testShouldThrowExceptionOnAlphaLessThan0Percent()
    {
        new Color('fff', -1);
    }

    /**
     * @expectedException Imagine\Exception\InvalidArgumentException
     */
    public function testShouldThrowExceptionOnColorWithMoreThanThreeValues()
    {
        new Color(array(255, 255, 255, 127));
    }

    /**
     * @expectedException Imagine\Exception\InvalidArgumentException
     */
    public function testShouldThrowExceptionOnColorWithLessThanThreeValues()
    {
        new Color(array(255, 255));
    }

    /**
     * @expectedException Imagine\Exception\InvalidArgumentException
     */
    public function testShouldThrowExceptionOnColorWithMoreThanSixCharacters()
    {
        new Color('fffffff');
    }

    /**
     * @expectedException Imagine\Exception\InvalidArgumentException
     */
    public function testShouldThrowExceptionOnColorWithLessThanSixAndMoreThanThreeCharacters()
    {
        new Color('ffff');
    }

    /**
     * @expectedException Imagine\Exception\InvalidArgumentException
     */
    public function testShouldThrowExceptionOnColorWithLessThanThreeCharacters()
    {
        new Color('ff');
    }

    public function testShortColorNotationAndLongNotationProducesTheSameColor()
    {
        $this->assertEquals(new Color('fff'), new Color('ffffff'));
        $this->assertEquals(new Color('#fff'), new Color('#ffffff'));
        $this->assertEquals(new Color('#fff'), new Color('ffffff'));
        $this->assertEquals(new Color('fff'), new Color('#ffffff'));
    }
}