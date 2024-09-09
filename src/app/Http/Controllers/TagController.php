<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\QueryException;

class TagController extends Controller
{
    //
    public function index(Request $request)
    {
        $user_id = User::select('id')->where('email', Auth::user()->email)->first()->id;
        $data = Tag::where('user_id', $user_id)->get();

        return view('tag.index', compact('data'));
    }
    public function store(Request $request)
    {
        $user_id = User::select('id')->where('email', Auth::user()->email)->first()->id;
        $duplication_message = '既に存在するタグは追加することができません';
        $data = Tag::where('user_id', $user_id)->get();

        try{
            Tag::create([
                'user_id' => $user_id,
                'name' => $request->name,
            ]);
        } catch (QueryException $e){
            return view('tag.index', compact('data', 'duplication_message'));
        }

        return to_route('tag.index');
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->save();

        return to_route('tag.index');
    }

    public function destroy($id)
    {
        $record = Tag::find($id);
        $record->delete();

        return to_route('tag.index');
    }
}
