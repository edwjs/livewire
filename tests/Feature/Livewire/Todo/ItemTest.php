<?php

namespace Tests\Feature\Livewire\Todo;

use App\Http\Livewire\Todo\Create;
use App\Http\Livewire\Todo\Item;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ItemTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        
        /** @var User $user */
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }
    
    /** @test */
    public function the_component_can_render()
    {        
        $todo = Todo::factory()->create(['user_id' => $this->user->id]);
        Livewire::test(Item::class, compact('todo'))
            ->assertStatus(200);
    }

    /** @test */
    public function it_should_be_able_to_set_a_task_as_completed()
    {        
        $todo = Todo::factory()->create(['user_id' => $this->user->id, 'checked' => false]);

        Livewire::test(Item::class, compact('todo'))->set('todo.checked', true);

        $this->assertDatabaseHas('todos', [
            'id' => $todo->id,
            'checked' => true,
        ]);
    }   
}
