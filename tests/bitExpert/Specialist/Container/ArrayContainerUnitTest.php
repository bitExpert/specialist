<?php

/**
 * This file is part of the Specialist package.
 *
 * (c) bitExpert AG
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace bitExpert\Specialist\Container;

class ArrayContainerUnitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ArrayContainer
     */
    protected $container;
    
    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        $this->container = new ArrayContainer([
            'testId1' => 'testValue1'
        ]);
    }

    /**
     * @test
     */
    public function hasReturnsTrueIfEntryWithIdAsKeyExists()
    {
        $this->assertTrue($this->container->has('testId1'));
    }

    /**
     * @test
     */
    public function hasReturnsFalseIfEntryWithIdAsKeyDoesNotExist()
    {
        $this->assertFalse($this->container->has('nonExistent'));
    }

    /**
     * @test
     */
    public function getReturnsEntryIfExistsWithIdAsKey()
    {
        $this->assertEquals($this->container->get('testId1'), 'testValue1');
    }

    /**
     * @test
     * @expectedException \bitExpert\Specialist\Container\EntryNotFoundException
     */
    public function getThrowsEntryNotFoundExceptionIfKeyDoesNotExist()
    {
        $this->container->get('nonExistent');
    }

    /**
     * @test
     */
    public function setAddsEntry()
    {
        $this->container->set('testId2', 'testValue2');
        $this->assertTrue($this->container->has('testId2'));
        $this->assertEquals($this->container->get('testId2'), 'testValue2');
    }

    /**
     * @test
     */
    public function setReturnsContainer()
    {
        $container = $this->container->set('testId2', 'testValue2');
        $this->assertSame($container, $this->container);
    }

    /**
     * @test
     */
    public function removeRemovesEntry()
    {
        $this->container->remove('testId1');
        $this->assertFalse($this->container->has('testId1'));
    }

    /**
     * @test
     * @expectedException \bitExpert\Specialist\Container\EntryNotFoundException
     */
    public function removeThrowsEntryNotFoundExceptionIfIdDoesNotExist()
    {
        $this->container->remove('testId2');
    }

    /**
     * @test
     */
    public function removeReturnsContainer()
    {
        $container = $this->container->remove('testId1');
        $this->assertSame($container, $this->container);
    }
}
