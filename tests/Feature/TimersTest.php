<?php

namespace Tests\Feature;

use App\Timer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class TimersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_guest_cannot_start_a_timer()
    {
        $this->assertEquals(0, Timer::count());
        $response = $this->postJson(route('timer.store'));
        $response->assertStatus(401);
        $this->assertEquals(0, Timer::count());
    }

    /** @test */
    public function an_authenticated_user_can_create_a_timer()
    {
        $this->assertEquals(0, Timer::count());
        $this->signIn();
        $response = $this->postJson(route('timer.store'), [
            'name' => 'Some Timer',
        ]);
        $response->assertStatus(200);
        $data = $response->json('data');
        $this->assertEquals('Some Timer', $data['name']);

        $timer = Timer::first();
        $this->assertInstanceOf(Timer::class, $timer);
        $this->assertEquals($data['id'], $timer->id);
        $this->assertEquals($data['name'], $timer->name);
        $this->assertTrue($timer->active);
        $this->assertTrue($timer->user->is($this->user));
    }

    /** @test */
    public function a_timer_can_be_stopped()
    {
        $this->assertEquals(0, Timer::count());
        $this->signIn()->postJson(route('timer.store'), ['name' => 'timer']);

        $timer = factory(Timer::class)->create([
            'user_id'    => $this->user->id,
            'created_at' => Carbon::parse('-100 seconds'),
        ]);
        $this->assertTrue($timer->active);

        $this->patchJson(route('timer.stop', $timer));
        $timer = $timer->fresh();

        $this->assertFalse($timer->active);
        $this->assertEquals(100, $timer->time);
        $this->assertInstanceOf(Carbon::class, $timer->stopped_at);
    }
}
