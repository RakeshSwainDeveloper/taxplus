<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatWidgetController extends Controller
{
    public function reply(Request $request)
    {
        $message = $request->input('message');
        $reply = '';
        $chartData = [];

        switch ($message) {
            case 'user_chart':
                $reply = '📊 Here is the user chart data!';
                $chartData = [10, 20, 15, 30];
                break;
            case 'revenue_chart':
                $reply = '💰 Revenue has increased this month!';
                $chartData = [1000, 1500, 2000, 2500];
                break;
            case 'performance_chart':
                $reply = '🚀 Performance chart data below.';
                $chartData = [80, 85, 90, 95];
                break;
            default:
                $reply = 'Sorry, I didn’t understand that.';
        }

        return response()->json([
            'reply' => $reply,
            'chartData' => $chartData,
        ]);
    }
}
