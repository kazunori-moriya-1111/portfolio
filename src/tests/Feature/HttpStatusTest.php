<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HttpStatusTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response_top_page()
    {
        $response = $this->get(route('manegement.index'));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_create_record_page()
    {
        $response = $this->get(route('manegement.create'));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_calendar_page()
    {
        $response = $this->get(route('manegement.calendar'));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_sort_bet_page()
    {
        $response = $this->get(route('manegement.sort.bet'));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_sort_date_page()
    {
        $response = $this->get(route('manegement.sort.date'));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_sort_payout_page()
    {
        $response = $this->get(route('manegement.sort.payout'));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_sort_recovery_rate_page()
    {
        $response = $this->get(route('manegement.sort.recovery_rate'));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_totalling_date_page()
    {
        $response = $this->get(route('manegement.totalling.date'));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_totalling_week_page()
    {
        $response = $this->get(route('manegement.totalling.week'));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_totalling_year_page()
    {
        $response = $this->get(route('manegement.totalling.year'));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_totalling_tag_page()
    {
        $response = $this->get(route('tag.index'));

        $response->assertStatus(200);
    }
}
