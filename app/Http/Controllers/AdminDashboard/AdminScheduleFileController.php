<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Models\User;
use App\Models\ScheduleFile;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ScheduleFile as MailScheduleFile;
use App\Mail\ScheduleFileUpdated;

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

        
        if ($request->send_notification_email){
            foreach (User::all() as $user){
                if ($user->hasRole('student')){
                    
                    if ($user->course == $request->course){
                        Mail::to($user)->send(
                            new MailScheduleFile(
                                filePath:storage_path('app/'.$url),
                                fileName:$request->name
                            )
                        );
                    }
                }
            }
        }
        
        //TODO: Send notification to telegram
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
        
        $url = $scheduleFile->url;
        if ($request->file('scheduleFile') == null){
            $scheduleFile->update([
                'name'=>$request->name,
                'course'=>$request->course,
                'url'=>$url,
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
        
        if ($request->send_notification_email){
            foreach (User::all() as $user){
                if ($user->hasRole('student')){
                    
                    if ($user->course == $request->course){
                        Mail::to($user)->send(
                            new ScheduleFileUpdated(
                                filePath:storage_path('app/'.$url),
                                fileName:$request->name
                            )
                        );
                    }
                }
            }
        }
        //TODO: Send notification to telegram
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
