class UsersTest extends TestCase
{
    /**
     * @route users.index
     */
    public function test_users_index()
    {
        $this->markTestIncomplete('This test is incomplete');
        $response = $this->call('GET', '/users');
        $this->assertEquals(200, $response->status());
    }


    /**
     * @route users.create
     */
    public function test_users_create()
    {
        $this->markTestIncomplete('This test is incomplete');
        $response = $this->call('GET', '/users/create');
        $this->assertEquals(200, $response->status());
    }


    /**
     * @route users.store
     */
    public function test_users_store()
    {
        $this->markTestIncomplete('This test is incomplete');
        $data = [];
        $response = $this->call('POST', '/users', $data);
        $this->assertEquals(200, $response->status());
    }


    /**
     * @route users.show
     */
    public function test_users_show()
    {
        $this->markTestIncomplete('This test is incomplete');
        $response = $this->call('GET', '/users/{users}');
        $this->assertEquals(200, $response->status());
    }


    /**
     * @route users.edit
     */
    public function test_users_edit()
    {
        $this->markTestIncomplete('This test is incomplete');
        $response = $this->call('GET', '/users/{users}/edit');
        $this->assertEquals(200, $response->status());
    }


    /**
     * @route users.update
     */
    public function test_users_update()
    {
        $this->markTestIncomplete('This test is incomplete');
        $data = [];
        $response = $this->call('PUT', '/users/{users}', $data);
        $this->assertEquals(200, $response->status());
    }


    /**
     * @route users.destroy
     */
    public function test_users_destroy()
    {
        $this->markTestIncomplete('This test is incomplete');
        $data = [];
        $response = $this->call('DELETE', '/users/{users}', $data);
        $this->assertEquals(200, $response->status());
    }
}
