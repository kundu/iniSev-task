<?php

namespace App\Http\Controllers;

use App\Jobs\EmailJobs;
use App\Models\Notice;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class NoticeController extends Controller
{
    public function manage(Request $request){
        $data['title'] = "Notice Manage";
        $notices = Notice::with('createdBy', 'statusUpdatedBy');

        $request->title ? $notices->where('title', 'LIKE', "%$request->title%") : null;
        $request->status ? $notices->where('status', $request->status) : null;

        $data['notices'] = $notices->orderBy('id', 'desc')->paginate($request->pagination ?? 10);
        return view('admin-panel.pages.notice-manage', $data);
    }

    public function create(){
        $data['title'] = "Write New Notice";
        return view('admin-panel.pages.notice-create', $data);
    }

    public function store(Request $request){
        $request->validate([
            'title'       => 'required|string|max:150|unique:notices,title',
            'description' => 'required|string'
        ]);

        try{
            $notice              = new Notice();
            $notice->title       = $request->title;
            $notice->description = $request->description;
            $notice->created_by  = auth()->user()->id;
            $url                 = str_replace(" ", "-", $request->title);
            $notice->url         = strtolower($url);
            $notice->save();

            EmailJobs::dispatch("new-notice", auth()->user());

            return redirect()->route('admin.notices.manage')->with('success', 'Successfully Created');
        } catch (Exception $ex) {
            Log::error($ex);
            dd($ex);
            return redirect()->route('admin.notices.manage')->with('error', 'Internal Server Error');
        }
    }

    public function edit($id){
        $data['title'] = "Notice Edit";
        $data['notice'] = Notice::findOrFail($id);
        return view('admin-panel.pages.notice-edit', $data);
    }

    public function update(Request $request){
        $request->validate([
            'id'          => 'required|exists:notices,id',
            'status'      => 'required|string|in:Pending,Approved,Denied',
            'title'       => 'required|string|max:150|unique:notices,title,'.$request->id,
            'description' => 'required|string'
        ]);

        try{
            $notice              = Notice::find($request->id);
            $notice->title       = $request->title;
            $notice->description = $request->description;
            $url                 = str_replace(" ", "-", $request->title);
            $notice->url         = strtolower($url);
            if($request->status != $notice->status){
                $notice->status            = $request->status;
                $notice->status_updated_by = auth()->user()->id;
                $notice->status_updated_at = Carbon::now();
            }
            $notice->save();

            return redirect()->route('admin.notices.manage')->with('success', 'Successfully Updated');
        } catch (Exception $ex) {
            Log::error($ex);
            return redirect()->route('admin.notices.manage')->with('error', 'Internal Server Error');
        }
    }

}
