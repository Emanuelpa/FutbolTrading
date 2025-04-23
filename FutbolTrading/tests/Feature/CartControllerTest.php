<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class CartControllerTest extends TestCase
{
    public function test_add_card_to_cart_authenticated()
    {

        // Este test verifica que un usuario autenticado puede agregar una tarjeta al carrito con una cantidad específica, 
        // y que luego es redirigido al índice del carrito, almacenando correctamente la cantidad en la sesión.

        $user = User::factory()->create([
            'phone' => '1234567890',
            'city' => 'Bogotá',
            'address' => 'Calle 123',
        ]);

        $response = $this->actingAs($user)->post(route('cart.add', ['id' => 1]), [
            'quantity' => 3,
        ]);

        $response->assertRedirect(route('cart.index'));
        $this->assertEquals(3, session('cards')[1]);
    }
}
