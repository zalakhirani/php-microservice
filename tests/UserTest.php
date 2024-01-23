<?php

use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * users [GET]
     */
    public function testWithUnauthorized(){

        $this->get("api/users", []);
        $this->seeStatusCode(401);
    }

    /**
     * users [GET]
     */
    public function testShouldReturnAllUsers(){


        $this->withoutMiddleware()->get('api/users');

        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' => ['*' =>
                [
                    'id',
                    'name',
                    'email'
                ]
            ]
        ]);
    }

    /**
     * /users/id [GET]
     */
    public function testShouldReturnUser(){
        $this->withoutMiddleware()->get("api/users/2", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' =>
                [
                    'id',
                    'name',
                    'email'
                ]
            ]
        );
    }

    /**
     * /users/id [GET]
     */
    public function testShouldReturnUserNotFound(){
        $this->withoutMiddleware()->get("api/users/8", []);
        $this->seeStatusCode(404);
    }
}