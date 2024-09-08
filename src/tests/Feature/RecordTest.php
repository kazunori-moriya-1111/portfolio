<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Record;
use App\Models\User;
use Tests\TestCase;

class RecordTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use DatabaseTransactions;
    
    public function test_record_create_screen_can_be_rendered()
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/manegement/create');

        $response->assertOk();
    }

    public function test_new_record_can_create()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/manegement',
        [
            'user_id' => $user->id,
            'date' => '2024-09-02',
            'bet' => 32000,
            'payout' => 5620,
            'recovery_rate' => 91.5,
            'memo' => 'こでなしずかに流な。',
        ]);
        $response->assertSessionHasNoErrors();
    }

    public function test_record_update_page_is_displayed()
    {
        $user = User::factory()->create();
        $record = Record::factory()->create();
        $response = $this
            ->actingAs($user)
            ->get("/manegement/{$record->id}");

        $response->assertOk();
    }

    public function test_record_can_be_updated()
    {
        $user = User::factory()->create();
        $record = Record::factory()->create();
        $response = $this
            ->actingAs($user)
            ->post("/manegement/{$record->id}",[
                'id' => $record->id,
                'date' => '2000-01-01',
                'bet' => 33000,
                'payout' => 6620,
                'recovery_rate' => 81.5,
                'memo' => 'こでなあああに流な。',
            ]);

        $response->assertSessionHasNoErrors()->assertRedirect('/manegement');;

        $record->refresh();

        $this->assertSame('2000-01-01', $record->date);
        $this->assertSame(6620, $record->payout);
    }

    public function test_record_can_delete(){
        $user = User::factory()->create();
        $record = Record::factory()->create();
        $response = $this
            ->actingAs($user)
            ->post("/manegement/{$record->id}/destroy",['id' => $record->id]);
        $response->assertSessionHasNoErrors()->assertRedirect('/manegement');
        
        $this->assertNull($record->fresh());
    }
}
