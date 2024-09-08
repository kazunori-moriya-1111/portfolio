<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Tag;
use App\Models\User;
use App\Models\Record;
use App\Models\RecordTag;
use Tests\TestCase;

class RecordTagTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use DatabaseTransactions;

    public function test_record_tag_can_create()
    {
        $user = User::factory()->create();
        $record = Record::factory()->create();
        $tag = Tag::factory()->create([
            'user_id' => $user->id,
            'name' => 'test_tag',
        ]);

        $response = $this->actingAs($user)->post("/record-tag/{$record->id}",
        [
            'id' => $record->id,
            'updateTagIdArray' => array($tag->id),
        ]);

        $response->assertSessionHasNoErrors();
        // レコードタグテーブルにrecord_idで絞り込んでレコードが一つであること
        $record_tag_collection = RecordTag::where('record_id', $record->id)->get();
        $this->assertEquals(1, $record_tag_collection->count());
    }

    public function test_record_tag_can_delete()
    {
        $user = User::factory()->create();
        $record = Record::factory()->create();
        $tag_1 = Tag::factory()->create([
            'user_id' => $user->id,
            'name' => 'test_tag_1',
        ]);

        $tag_2 = Tag::factory()->create([
            'user_id' => $user->id,
            'name' => 'test_tag_2',
        ]);

        $response = $this->actingAs($user)->post("/record-tag/{$record->id}",
        [
            'id' => $record->id,
            'updateTagIdArray' => array($tag_1->id, $tag_2->id),
        ]);

        $response->assertSessionHasNoErrors();
        // レコードタグテーブルにrecord_idで絞り込んでレコードが二つであること
        $record_tag_collection = RecordTag::where('record_id', $record->id)->get();
        $this->assertEquals(2, $record_tag_collection->count());

        $response = $this->actingAs($user)->post("/record-tag/{$record->id}",
        [
            'id' => $record->id,
            'updateTagIdArray' => array($tag_1->id),
        ]);

        $response->assertSessionHasNoErrors();
        // レコードタグテーブルにrecord_idで絞り込んでレコードが一つであること
        $record_tag_collection = RecordTag::where('record_id', $record->id)->get();
        $this->assertEquals(1, $record_tag_collection->count());
    }

    public function test_record_tag_can_create_and_delete_same_post()
    {
        $user = User::factory()->create();
        $record = Record::factory()->create();
        $tag_1 = Tag::factory()->create([
            'user_id' => $user->id,
            'name' => 'test_tag_1',
        ]);

        $tag_2 = Tag::factory()->create([
            'user_id' => $user->id,
            'name' => 'test_tag_2',
        ]);

        $tag_3 = Tag::factory()->create([
            'user_id' => $user->id,
            'name' => 'test_tag_3',
        ]);

        $response = $this->actingAs($user)->post("/record-tag/{$record->id}",
        [
            'id' => $record->id,
            'updateTagIdArray' => array($tag_1->id, $tag_2->id),
        ]);

        $response->assertSessionHasNoErrors();
        // レコードタグテーブルにrecord_idで絞り込んでレコードが二つであること
        $record_tag_collection = RecordTag::where('record_id', $record->id)->get();
        $this->assertEquals(2, $record_tag_collection->count());

        $response = $this->actingAs($user)->post("/record-tag/{$record->id}",
        [
            'id' => $record->id,
            'updateTagIdArray' => array($tag_1->id, $tag_3->id),
        ]);

        $response->assertSessionHasNoErrors();
        // レコードタグテーブルにrecord_idで絞り込んでレコードが二つであること
        $record_tag_collection = RecordTag::where('record_id', $record->id)->get();
        $this->assertEquals(2, $record_tag_collection->count());
    }
}
