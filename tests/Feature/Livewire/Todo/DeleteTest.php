<?php

namespace Tests\Feature\Livewire\Todo;

use App\Http\Livewire\Todo\Delete;
use App\Models\Todo;
use App\Models\User;
use Livewire\Livewire;
use Tests\TestCase;

class DeleteTest extends TestCase
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
        $component = Livewire::test(Delete::class);

        $component->assertStatus(200);
    }

    /** @test */
    public function it_should_be_able_to_delete()
    {
        // arrange
        $todo = Todo::factory()->createOne(['user_id' => $this->user->id]);

        // act
        Livewire::test(Delete::class, compact('todo'))
            ->call('destroy');

        // assert
        $this->assertDatabaseMissing('todos', [
            'id' => $todo->id,
        ]);
    }
}
