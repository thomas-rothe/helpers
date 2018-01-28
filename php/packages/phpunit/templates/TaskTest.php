<?php

class TaskTest extends \PHPUnit\Framework\TestCase
{
    public function testGetName()
    {
        $task = new \MichaelKaefer\PHPUnitProject\Model\Task();
        $task->setName('Clean up kitchen');

        $this->assertEquals('Clean up kitchen', $task->getName(), 'Name of the task is returned false');
    }

    public function testNameIsTrimmed()
    {
        $task = new \MichaelKaefer\PHPUnitProject\Model\Task();
        $task->setName('   Cook  ');

        $this->assertEquals('Cook', $task->getName(), 'Name of the task does not get trimmed');
    }
}
