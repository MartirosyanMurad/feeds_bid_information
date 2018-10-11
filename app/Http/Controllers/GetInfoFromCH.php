<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ClickHouseDB;
use Illuminate\Support\Facades\View;

class GetInfoFromCH extends Controller
{
    function __construct()
    {
        $this->config = [
            'host'     => env('CLICK_HOUSE_HOST'),
            'port'     => env('CLICK_HOUSE_PORT'),
            'username' => env('CLICK_HOUSE_USERNAME'),
            'password' => env('CLICK_HOUSE_PASSWORD'),
        ];
        $this->connection = new ClickHouseDB\Client($this->config);
        $this->connection->database('visitstats');
    }

    public function data()
    {
        $sql = "
        SELECT
           COUNT(*) as count
        FROM
          visitstats.push_notifications_swdata
          WHERE
          stats_day = today()";
        $data =  $this->connection->select($sql)->rows();
//        var_dump($data);
        return View::make("/info/statistics")->with("data", [['count' =>9]]);
    }
}
