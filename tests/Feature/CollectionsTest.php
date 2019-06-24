<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CollectionsTest extends TestCase
{
    use DatabaseTransactions;


    /** @test */
    /* public function guest_user_may_not_create_collection()
    {

        $this->post('/collections')->assertRedirect('/login');
    } */

    /** @test */
    public function a_user_can_create_a_collection()
    {
        $attributes = ['name' => 'Example collection'];

        //Given I am logged in
        // $this->actingAs(factory('App\User')->create());

        //When they hit the endpoint api/collections while passing the necessary data
        $this->post('api/collections', $attributes);

        //Then it should be a new collection in the database
        $this->assertDatabaseHas('collections', $attributes);
    }

    /** @test */
    /* public function a_user_can_see_his_collections()
    {

        $attributes = ['name' => 'Collection of user 1'];

        //Given someone is logged in and create a collection
        $this->actingAs(factory('App\User')->create());
        $this->post('/collections', $attributes);

        //When I am logged in
        $this->actingAs(factory('App\User')->create());

        //I can only see my collection
        $response = $this->get('/collections');

        $response->assertDontSee($attributes['name']);
    } */
}
