<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TasksTest extends TestCase
{
    /**
     * @route tasks.index
     */
    public function test_tasks_index()
    {
        $response = $this->call('GET', '/tasks');
        $this->assertEquals(200, $response->status());
    }

    /**
     * @route tasks.create
     */
    public function test_tasks_create()
    {
        $response = $this->call('GET', '/tasks/create');
        $this->assertEquals(200, $response->status());
    }

    /**
     * @route tasks.store
     */
    public function test_tasks_store()
    {
        $data = [];
        $response = $this->call('POST', '/tasks', $data);
        $this->assertEquals(200, $response->status());
    }

    /**
     * @route tasks.show
     */
    public function test_tasks_show()
    {
        $response = $this->call('GET', '/tasks/{tasks}');
        $this->assertEquals(200, $response->status());
    }

    /**
     * @route tasks.edit
     */
    public function test_tasks_edit()
    {
        $response = $this->call('GET', '/tasks/{tasks}/edit');
        $this->assertEquals(200, $response->status());
    }

    /**
     * @route tasks.update
     */
    public function test_tasks_update()
    {
        $data = [];
        $response = $this->call('PUT', '/tasks/{tasks}', $data);
        $this->assertEquals(200, $response->status());
    }

    /**
     * @route tasks.destroy
     */
    public function test_tasks_destroy()
    {
        $data = [];
        $response = $this->call('DELETE', '/tasks/{tasks}', $data);
        $this->assertEquals(200, $response->status());
    }
}
