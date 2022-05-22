<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class AjaxFrontendController extends Controller
{
    private $baseController;

    function __construct() {
        $this->baseController = new BaseController();
    }

    public function getNotices(Request $request){
        if($request->id){
            $notices = Notice::select('id', 'title', 'url', 'status_updated_at')->where('status', 'Approved')->whereNotIn('id', $request->id)->orderby('status_updated_at', 'desc')->get();
        }
        else{
            $notices = Notice::select('id', 'title', 'url', 'status_updated_at')->where('status', 'Approved')->orderby('status_updated_at', 'desc')->get();
        }
        return $this->baseController->sendResponse($notices, 'Approved Notices');
    }

}
