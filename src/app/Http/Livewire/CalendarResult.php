<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Record;
use App\Models\User;

class CalendarResult extends Component
{
    public $str = Null;
    public $year = Null;
    public $month = Null;
    protected $listeners = ['refreshComponentWithData'];

    // 文字列から何月かを変換する関数
    private function str2month($str)
    {
        $str2month_dict = array('Jan' => 1, 'Feb' => 2, 'Mar' =>  3, 'Apr' => 4, 'May' => 5, 'Jun' => 6, 'Jul' => 7, 'Aug' => 8, 'Sep' => 9, 'Oct' => 10, 'Nov' => 11, 'Dec' => 12);
        return array_key_exists($str, $str2month_dict) ? $str2month_dict[$str] : 1;
    }

    public function refreshComponentWithData($newData)
    {
        // データを受け取り、コンポーネントのプロパティにセットする
        $this->str = $newData;

        // 再レンダリングをトリガーする
        $this->render();
    }

    public function render()
    {
        $total_bet = 0;
        $total_payout = 0;
        $recovery_rate = 0;

        // 受け取った日付からレコードを抽出して総額を計算
        if (!(is_null($this->str))) {
            $data = explode(' ', $this->str);
            $this->year = $data[3];
            $this->month = $this->str2month($data[1]);
            $user_id = User::select('id')->where('email', Auth::user()->email)->first()->id;
            $date = strtotime("{$this->year}-{$this->month}-01");
            $total_data = Record::select('id', 'date', 'bet', 'payout', 'recovery_rate')
                ->where('user_id', $user_id)->whereBetween('date', [date("Ymd",$date), date("Ymt",$date)]);
            $total_bet = $total_data->sum('bet');
            $total_payout = $total_data->sum('payout');
            $recovery_rate = $total_bet == 0 ? 0 : round(($total_payout / $total_bet) * 100, 1);
        }
        return view('livewire.calendar-result', ['total_bet' => $total_bet, 'total_payout' => $total_payout, 'recovery_rate' => $recovery_rate]);
    }
}
