<?php

namespace App\Http\Controllers;

use App\Models\Notice;

class FrontendController extends Controller
{
    public function home(){
        $data['title']            = "Home";

        return view('frontend.pages.home', $data);
    }

    public function noticeBoard(){
        $data['title'] = "Notice Board";
        return view('frontend.pages.notice-board', $data);
    }

    public function noticeBoardDetails($url){
        $data['title'] = "Notice Board Details";
        $data['notice'] = Notice::where('url', $url)->where('status', 'Approved')->first();
        if(!$data['notice']){
            return redirect()->route('frontend.notice')->with('warning', 'No notice found');
        }
        return view('frontend.pages.notice-details', $data);
    }

}
