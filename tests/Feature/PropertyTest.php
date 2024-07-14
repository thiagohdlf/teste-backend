<?php

namespace Tests\Feature;

use App\Models\Property;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PropertyTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_index_property(): void
    {
        //Cria e autentica usuário
        $user = User::factory(1)->createOne();
        $this->actingAs($user);
        //Teste do método index
        $property = Property::factory(5)->create();
        $response = $this->getJson('/api/propiedade');

        $response->assertStatus(200);
        $response->assertJsonCount(5);

    }

    public function test_store_property():void
    {
        //Cria e autentica usuário
        $user = User::factory(1)->createOne();
        $this->actingAs($user);
        //Teste do método store
        $property = Property::factory(1)->makeOne()->toArray();

        $response = $this->postJson('/api/propiedade', $property);
        $response->assertStatus(201);
    }

    public function test_update_property():void
    {
        //Cria e autentica usuário
        $user = User::factory(1)->createOne();
        $this->actingAs($user);
        //Teste do método update
        Property::factory(1)->createOne();

        $property = [
            'nameProperty' => 'Atualizando propiedade...',
            'ruralRegistration' => '654321'
        ];

        $response = $this->putJson('/api/propiedade/1', $property);
        $response->assertStatus(200);
    }

    public function test_delete_property():void
    {
        //Cria e autentica usuário
        $user = User::factory(1)->createOne();
        $this->actingAs($user);
        //Teste do método delete
        $property = Property::factory(1)->createOne();

        $response = $this->deleteJson('/api/propiedade/'.$property->idProperty);
        $response->assertStatus(201);
    }

    public function teste_filter_property():void
    {
        //Cria e autentica usuário
        $user = User::factory(1)->createOne();
        $this->actingAs($user);
        //Teste do método filter
        $property = Property::factory(1)->createOne();

        $response = $this->postJson('/api/propiedade/' . $property->idProperty);
        $response->assertStatus(200);
    }
}
