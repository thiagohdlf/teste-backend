<?php

namespace Tests\Feature;

use App\Models\{
    Producer, User
};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProducerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_index_producer(): void
    {
        //Cria usuário e autentica
        $user = User::factory(1)->createOne();
        $this->actingAs($user);
        //Teste do método index
        $producer = Producer::factory(5)->create();
        $response = $this->getJson('/api/produtor');

        $response->assertStatus(200);
        $response->assertJsonCount(5);
    }

    public function test_store_producer():void
    {
        //Cria usuário e autentica
        $user = User::factory(1)->createOne();
        $this->actingAs($user);
        //Teste do método store
        $producer = Producer::factory(1)->makeOne()->toArray();

        $response = $this->postJson('/api/produtor', $producer);
        $response->assertStatus(201);
    }

    public function test_update_producer():void
    {
        //Cria usuário e autentica
        $user = User::factory(1)->createOne();
        $this->actingAs($user);
        //Teste do método update
        Producer::factory(1)->createOne();

        $producer = [
            'nameProducer' => 'Atualizando propiedade...',
            'cpfProducer' => '12345678910'
        ];

        $response = $this->putJson('/api/produtor/1', $producer);
        $response->assertStatus(200);
    }

    public function test_delete_producer():void
    {
        //Cria usuário e autentica
        $user = User::factory(1)->createOne();
        $this->actingAs($user);
        //Teste do método delete
        $producer = Producer::factory(1)->createOne();

        $response = $this->deleteJson('/api/produtor/'.$producer->id);
        $response->assertStatus(201);
    }

    public function test_filter_producer():void
    {
        //Cria usuário e autentica
        $user = User::factory(1)->createOne();
        $this->actingAs($user);
        //Teste do método filter
        $producer = Producer::factory(1)->createOne();

        $response = $this->postJson('/api/produtor/' . $producer->id);
        $response->assertStatus(200);
    }
}
