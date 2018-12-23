<?php

namespace Tests\Unit;

use App\Timer;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class TimersTest extends TestCase
{
    /** @test */
    public function a_timer_can_be_stopped()
    {
        $timer = new Timer();

        $timer->created_at = Carbon::parse('-30 seconds');
        $timer->active     = true;

        $this->assertEmpty($timer->stopped_at);

        $timer->stop();

        $this->assertInstanceOf(Carbon::class, $timer->stopped_at);
        $this->assertFalse($timer->active);
        $this->assertEquals(30, $timer->time);
        $this->assertTrue(Carbon::now()->isSameAs($timer->stopped_at));
    }

    /** @test */
    public function a_non_active_timer_cannot_be_stopped()
    {
        $timer = new Timer();
        $this->assertNotTrue($timer->active);
        $this->assertEmpty($timer->stopped_at);

        $timer->stop();

        $this->assertEmpty($timer->stopped_at);
    }
}
