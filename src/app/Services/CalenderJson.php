<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Record;
use App\Models\User;

class CalenderJson
{
    public static function getCalenderJson()
    {
        $user_id = User::select('id')->where('email', Auth::user()->email)->first()->id;
        $record = Record::select('date')
            ->selectRaw('SUM(payout) - SUM(bet) AS day_result')
            ->where('user_id', $user_id)
            ->groupBy('date')
            ->get();
        $json_array = $record->map(function ($row) {
            return json_encode(["title" => $row->day_result, 'start' => $row->date, 'classNames' => $row->day_result > 0 ? 'plus' : 'minus'], JSON_UNESCAPED_UNICODE);
        });
        return $json_array;
    }
}
