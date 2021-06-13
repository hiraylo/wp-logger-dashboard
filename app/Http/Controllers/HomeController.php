<?php

namespace App\Http\Controllers;
use DB;
use \App\Log;
use \Carbon\Carbon;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $website = $request->input('website_name');
        $daterange = $request->input('daterange');
        $record_count = $request->input('record_count');

        $record_count = $record_count ? : 50;

        if ($daterange) {

            $daterange = explode('-', str_replace(' ', '', $daterange));
            foreach ($daterange as $key => $value) {
                $daterange[$key] = date("Y-m-d", strtotime($value));
            }

            if ($website) {



                $log = Log::whereIn( 'website_url', $website )->whereBetween(DB::raw('DATE(created_at)'), array($daterange[0], $daterange[1]))->orderBy('created_at', 'DESC')->skip(0)->take($record_count)->get();
            } else {


                $log = Log::whereBetween(DB::raw('DATE(created_at)'), array($daterange[0], $daterange[1]))->orderBy('created_at', 'DESC')->get();
            }

        } elseif (is_array($website)) {


            $log = Log::whereIn( 'website_url', $website )->orderBy('created_at', 'DESC')->skip(0)->take($record_count)->get();

        } else {


            $log = Log::orderBy('created_at', 'DESC')->skip(0)->take($record_count)->get();
        }

        //$filtered = Log::where("created_at",">", Carbon::now()->subDays(30))->get();

        return view('dashboard', ['entries' => $log, 'websites' => $this->getWebsiteList() ]);
    }

    public function getWebsiteList()
    {
        $websites = DB::table('logs')->orderBy('website_url', 'ASC')->pluck('website_name', 'website_url')->toArray();
        return array_unique($websites);
    }
}
