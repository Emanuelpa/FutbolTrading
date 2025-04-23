<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CardControllerTest extends TestCase
{
    use RefreshDatabase;
    // Verifica que un usuario autenticado puede crear una Card y que esta se guarda en la base de datos.

    public function test_authenticated_user_can_create_card()
    {
        $user = User::factory()->create([
            'phone' => '1234567890',
            'city' => 'Bogotá',
            'address' => 'Calle 123',
        ]);

        $this->actingAs($user)
            ->post(route('card.save'), [
                'name' => 'Messi Card',
                'description' => 'A rare Messi collectible',
                'image' => 'messi.jpg',
                'price' => 199.99,
                'quantity' => 10,
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('cards', [
            'name' => 'Messi Card',
        ]);
    }
}
