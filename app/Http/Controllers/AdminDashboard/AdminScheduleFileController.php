<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Models\ScheduleFile;
use Illuminate\Http\Request;

class AdminScheduleFileController extends Controller
{
    public function index(){
        $scheduleFiles = ScheduleFile::all();
        return view('adminDashboard.scheduleFiles.index',
        [
            'scheduleFiles'=>$scheduleFiles
        ]);
    }
    public function create(){
        return view('adminDashboard.scheduleFiles.create');
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'course'=>'required',
            'scheduleFile'=>'required',
        ]);
        $url = $request->file('scheduleFile')->store('public/files');
        ScheduleFile::create([
            'name'=>$request->name,
            'course'=>$request->course,
            'url'=>$url,
        ]);
        //TODO: Add 'send notification' as a check box html
        //TODO: Send notification to telegram
        //TODO: Send notification to email
        return redirect()->route('admin.scheduleFiles')->with('success','The schedule file was added!');
    }
    public function edit(ScheduleFile $scheduleFile){
        return view('adminDashboard.scheduleFiles.edit',[
            'scheduleFile'=>$scheduleFile
        ]);
    }
    public function update(ScheduleFile $scheduleFile,Request $request){
        $request->validate([
            'name'=>'required',
            'course'=>'required',
        ]);
        
        if ($request->file('scheduleFile') == null){
            $scheduleFile->update([
                'name'=>$request->name,
                'course'=>$request->course,
                'url'=>$scheduleFile->url,
            ]);
        }
        else{
            $url = $request->file('scheduleFile')->store('public/files');

            $scheduleFile->update([
                'name'=>$request->name,
                'course'=>$request->course,
                'url'=>$url,
            ]);
        }
        $scheduleFile->update([
            'name'=>$request->name,
            'course'=>$request->course,
            'url'=>$url,
        ]);
        //TODO: Add 'send notification' as a check box html
        //TODO: Send notification to telegram
        //TODO: Send notification to email
        return redirect()->route('admin.scheduleFiles')->with('success','The schedule file was updated!');
    }
    public function destroy(ScheduleFile $scheduleFile){
        $scheduleFile->delete();
        return back()->with('success',"The Schedule File was deleted!");

    }
    public function download(ScheduleFile $scheduleFile){
       
        return response()->download(storage_path('app/'.$scheduleFile->url));
    }
}
