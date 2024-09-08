<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Tag;
use App\Models\User;
use Tests\TestCase;

class TagTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use DatabaseTransactions;

    public function test_tag_screen_can_be_rendered()
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/tag');

        $response->assertOk();
    }

    public function test_new_tag_can_create()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/tag',
        [
            'user_id' => $user->id,
            'name' => 'favorite_race',
        ]);
        $response->assertSessionHasNoErrors();
    }

    public function test_record_can_be_updated()
    {
        $user = User::factory()->create();
        $tag = Tag::factory()->create([
            'user_id' => $user->id,
            'name' => 'test_tag',
        ]);
        $response = $this
            ->actingAs($user)
            ->post("/tag/{$tag->id}",[
                'id' => $tag->id,
                'name' => 'updated_tag_name',
            ]);

        $response->assertSessionHasNoErrors()->assertRedirect('/tag');;

        $tag->refresh();

        $this->assertSame('updated_tag_name', $tag->name);
    }

    public function test_record_can_delete(){
        $user = User::factory()->create();
        $tag = Tag::factory()->create([
            'user_id' => $user->id,
            'name' => 'test_tag',
        ]);
        $response = $this
            ->actingAs($user)
            ->post("/tag/{$tag->id}/destroy",['id' => $tag->id]);
        $response->assertSessionHasNoErrors()->assertRedirect('/tag');
        
        $this->assertNull($tag->fresh());
    }
}
