<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\Calculator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CalculatorTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Calculator::class);

        $component->assertStatus(200);
    }
}
