<?php

namespace Tests\Feature\Livewire\Todo;

use App\Http\Livewire\Todo\Create;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CreateTest extends TestCase
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
        Livewire::test(Create::class)
            ->assertStatus(200);
    }

     /** @test */
     public function it_should_be_able_to_create_a_new_task()
     {        
         Livewire::test(Create::class)
             ->set('title', 'Test todo')            
             ->call('save');
 
         $this->assertDatabaseHas('todos', [
             'title' => 'Test todo',
         ]);
     }
 
     /** @test */
     public function title_should_be_required()
     {
         Livewire::test(Create::class)
             ->set('title', '')
             ->call('save')
             ->assertHasErrors(['title' => 'required']);
         
     }
 
     /** @test */
     public function title_should_have_at_least_3_characters()
     {
        Livewire::test(Create::class)
            ->set('title', '12')
            ->call('save')
            ->assertHasErrors(['title' => 'min']);
     }
}
