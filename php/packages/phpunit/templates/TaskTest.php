<?php

class TaskTest extends \PHPUnit\Framework\TestCase
{
    protected $task;
    
    public function setUp()
    {
        $this->task = new \MichaelKaefer\PHPUnitProject\Model\Task();
    }
    
    /** @test */
    public function get_name()
    {
        $task->setName('Clean up kitchen');

        $this->assertEquals('Clean up kitchen', $this->task->getName(), 'Name of the task is returned false');
    }

    /** @test */
    public function name_is_trimmed()
    {
        $task->setName('   Cook  ');

        $this->assertEquals('Cook', $this->task->getName(), 'Name of the task does not get trimmed');
    }
}
