<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Setting;
use Carbon\Carbon;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    private $setting;

    public function __construct()
    {
        $this->setting = Setting::orderBy('id')->get()->first();
    }

    public function index()
    {
//        dd($this->setting->toArray());
        $products = Product::all();
        return view('admin.setting.index' , compact([
            'products'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $user = auth()->guard('admin')->user();
        $data = $request->only(['twitter' ,'logo','instagram','facebook' , 'email','address','phone','subject' ,'contact_us']);
        $userData = ['name' => $request->get('name') , 'email' => $request->get('user_email')];
        try {

            if ($request->has('logo') && $request->file('logo')){
                $data['logo'] = 'uploads/'.Storage::disk('public')->putFile('setting',$request->file('logo'));
            }else{
               unset($data['logo']);
            }

            $user->update();
            $this->setting->update($data);
            return back()->with('success', 'Profile updated!');
        }catch (\Exception $e){
            dd($e->getMessage() , $e->getLine() , $e->getFile());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deal(Request $request){
        $data = $request->only(['status','title','description','price','until','product_id']);
        if ($request->has('cover') && $request->cover){
            $data['cover'] = 'uploads/'.Storage::disk('public')->putFile('deal',$request->file('cover'));
        }else{
            $data['cover'] = null;
        }

        try {
            $this->setting->update(['deal' => $data]);
            return back()->with('success', 'Profile updated!');
        }catch (\Exception $e){
            dd($e->getMessage() , $e->getLine() , $e->getFile());
        }
    }

    public function header(Request $request){
        $data = $request->get('headers');
        $files = $request->allFiles();
        foreach ($data as $index => $header){
            $file = $files['headers'][$index]['cover'] ?? null;
            if ($file){
                $data[$index]['cover'] = 'uploads/'.Storage::disk('public')->putFile('header',$file);
            }else{
                $data[$index]['cover'] = null;
            }
        }

        try {
            $this->setting->update(['header' => $data]);
            return back()->with('success', 'Profile updated!');
        }catch (\Exception $e){
            dd($e->getMessage() , $e->getLine() , $e->getFile());
        }
    }

    public function faqs(Request $request){

        $data = $request->only(['faqs']);
        try {
            $this->setting->update($data);
            return back()->with('success', 'Profile updated!');
        }catch (\Exception $e){
            dd($e->getMessage() , $e->getLine() , $e->getFile());
        }
    }

    public function insta(Request $request){
        $data['instagrambar'] = null;
        foreach ($request->file('images') as $image) {
            if ($image){
                $data['instagrambar'][] = 'uploads/'.Storage::disk('public')->putFile('instagrambar',$image);
            }
        }
        try {
            $this->setting->update($data);
            return back()->with('success', 'Profile updated!');
        }catch (\Exception $e){
            dd($e->getMessage() , $e->getLine() , $e->getFile());
        }
    }

    public function partner(Request $request){
        foreach ($request->file('images') as $image) {
            if ($image){
                $data['partnerbar'][] = 'uploads/'.Storage::disk('public')->putFile('partnerbar',$image);
            }
        }
        try {
            $this->setting->update($data);
            return back()->with('success', 'Profile updated!');
        }catch (\Exception $e){
            dd($e->getMessage() , $e->getLine() , $e->getFile());
        }
    }


    public function changepass(Request $request){

        $user = auth()->guard('admin')->user();
        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
            'old_password' => 'required',
        ]);
        $data= [
            'email' => $user->email,
            'password' => $request->get('old_password')
        ];
        if (Auth::guard('admin')->attempt($data)){
            $user->update(['password' => $request->get('password')]);
            Auth::guard('admin')->logout();
        }
        return redirect()->back();
    }
}
