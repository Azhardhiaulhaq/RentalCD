<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get('/');

        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );
    }

    public function testAddUser(){
        $response = $this->call('POST','/user',['username' => 'Dhiaulhaq','password'=>'12345','role'=>'customer']);

        $this->assertEquals($response->content(),200);
    }

    public function testGetUser() {
        $this->get('/user', ['username' => 'azhar'])
            ->seeJsonEquals([
                'user' => [
                    'id' => 1,
                    'username' => 'AzharDhiaulhaq',
                    'password' => 'Azhar@tantowi.com',
                    'role' => 'owner'
                ]
            ]);
    }

    public function testGetAllCD(){
        $this->get('/cd')->seeJsonEquals([
            [
                'id' => 1,
                'title' => 'Harry Potter',
                'rate' => 10000,
                'category' => 'Fiction',
                'quantity' => 40
            ],
            [
                'id' => 2,
                'title' => 'Teletubbies',
                'rate' => 'Kids',
                'quantity' => 10
            ]
        ]);
    }

    public function testGetCD(){
        $this->get('/cd',['title' => 'Teletubbies'])
            ->seeJsonEquals(
                [
                    'id' => 1,
                    'title' => 'Harry Potter',
                    'rate' => 50000,
                    'category' => 'Kids',
                    'quantity' => 10
                ]
                );
    }

    public function testAddCD(){
        $response = $this->call('POST','/cd',['username' => 'AzharDhiaulhaq','title'=>'Spiderman','rate'=>1000,'category'=>'superhero','quantity'=>10]);

        $this->assertEquals($response->content(),200);
    }

    public function testUpdateCD(){
        $response = $this->call('PUT','/cd',['username' => 'AzharDhiaulhaq','title'=>'Harry Potter','quantity'=>15]);

        $this->assertEquals($response->content(),200);
    }

    public function testGetRent(){
        $this->get('/cd')->seeJsonEquals([]);
    }

    public function testRentCD(){
        $response = $this->call('POST','/rent',['username' => 'AzharDhiaulhaq','title'=>'Harry Potter']);

        $this->assertEquals($response->content(),200);
    }

    public function testReturnCD(){
        $response = $this->call('PUT','/rent',['username' => 'AzharDhiaulhaq','title'=>'Harry Potter']);

        $this->assertEquals($response->content(),200);
    }

    
}
