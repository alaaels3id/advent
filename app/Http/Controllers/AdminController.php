<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Admin;
use App\Contact;
use DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        // Get the charts of the current year of buildings
        $charts = Product::select(DB::raw('COUNT(*) as count, month(created_at) as month, year(created_at) as year'))
                ->where('year', date('Y'))->groupBy('month')->orderBy('month', 'ASC')->get()->toArray();
       

        // Make sure that the is null or not if the month is null give it 0 value;
        $ar = [];

        $months = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0, 10 => 0, 11 => 0, 12 => 0];
        
        if(isset($charts)){ for($i = 0; $i < count($charts); $i++) { $ar[] = $charts[$i]['month']; } }
        
        $diff = array_diff($months, $ar);

        $dif = [];
        foreach ($diff as $key => $val) { $dif[$key] = $key; }
        foreach ($charts as $chart){ if(array_key_exists($chart['month'], $dif)) { $months[$chart['month']] = $chart['count']; } }

        $new = $months;

        // Make Sure that the comming request is from admin not a user;
        return view('admin.index', compact('new'));
    }

    public function show($id)
    {
        $user = Admin::findOrFail(intval($id));
        return view('admin.pages.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Admin::findOrFail(auth()->user()->id);
        $file = $request->file('image');
        $data = array_except($request->all(), ['image']);
        
        if($file){
            $filename = uploadimage($file, '/public/advent/uploads/users/', '750', '750', $user->image);
            if(!$filename) return back()->withFlashMessage('!!');
            $user->update(['image' => $filename]);
        }else{
            $user->update($data);
        }
        return back()->withFlashMessage('تم تعديل بيانات العضو بنجاح');
    }

    public function updatePassword(Request $request)
    {
        $user = Admin::findOrFail($request->user_id);
        $user->update(['password' => $request->password]);
        return redirect()->route('profile', $user->firstName)->withFlashMesssage('تم تغير كلمة المرور بنجاح');
    }

    // public function ShowStatisticsByYear(Request $request)
    // {
    //     $year = $request->year;
    //     $charts = Buliding::select(DB::raw('COUNT(*) as count, manth '))->where('year', $year)->groupBy('manth')->orderBy('manth', 'ASC')->get()
    //             ->toArray();
    //     $array = [];
    //     if(isset($charts[0]['manth'])){
    //         for($i = 1;$i<$charts[0]['manth'];$i++){
    //             $array [] = 0;
    //         }
    //     }
    //     $new = array_merge($array, $charts);
    //     return view('admin.inc.statistics', compact('new', 'year'));
    // }
}
