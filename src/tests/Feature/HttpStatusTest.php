<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class HttpStatusTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response_top_page()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('manegement.index'));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_create_record_page()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('manegement.create'));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_calendar_page()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('manegement.calendar'));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_sort_bet_page()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('manegement.sort.bet'));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_sort_date_page()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('manegement.sort.date'));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_sort_payout_page()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('manegement.sort.payout'));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_sort_recovery_rate_page()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('manegement.sort.recovery_rate'));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_totalling_date_page()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('manegement.totalling.date'));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_totalling_week_page()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('manegement.totalling.week'));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_totalling_year_page()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('manegement.totalling.year'));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_totalling_tag_page()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('tag.index'));

        $response->assertStatus(200);
    }
}
