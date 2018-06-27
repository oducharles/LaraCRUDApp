<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use Auth;
use App\User;

class prodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(User::isAdmin());
        if (Auth::check()) {
            if(User::isAdmin()){
                $prodinfox = products::all()->toArray();
        
            } else {
            $prodinfox = products::all()->where('user_id', '=', Auth::user()->id)->toArray();
            }
            $prod = null;
            return view('home', compact('prodinfox','prod'));
        }
        
        // $admin_user = 3;
        // if (Auth::user()->id==$admin_user) {
        //     $prodinfox = products::all()->toArray();
        // }else{
        //     $prodinfox = products::all()->where('user_id', '=', Auth::user()->id)->toArray();
        // }
        //     $prod = null;
        //     return view('home', compact('prodinfox','prod'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'p_name'=>'required',
            'p_type'=>'required',
            'p_price'=>'required',
            'p_detail'=>'required|file',
        ]);

        $prodinfox = new products([
            'p_name' => $request->get('p_name'),
            'p_type' => $request->get('p_type'),
            'p_price' => $request->get('p_price'),
            'p_detail' => $request->file('p_detail')->store('files'),
            $request->file('p_detail')->store('files'),
            'user_id'=> auth()->user()->id
            
        ]);

        $prodinfox->save();
        return redirect()->route('home.index')->with('success', 'Product added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $filedown = products::find($id);
        return response()->download(storage_path('app/'.$filedown->p_detail));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $prod = products::find($id);
        if (Auth::check()) {
            if(User::isAdmin()){
                $prodinfox = products::all()->toArray();
        
            } else {
            $prodinfox = products::all()->where('user_id', '=', Auth::user()->id)->toArray();
            }
        }
        return view('home', compact('prod', 'id','prodinfox'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'p_name'=>'required',
            'p_type'=>'required',
            'p_price'=>'required',
            'p_detail'=>'required|file'
        ]);
        $prod = products::find($id);

        $prod->p_name = $request->get('p_name');
        $prod->p_type = $request->get('p_type');
        $prod->p_price = $request->get('p_price');
        $prod->p_detail = $request->file('p_detail')->store('files');
        //$request->file('p_detail')->store('files');

        $prod->save();
        return redirect()->route('home.index')->with('success', 'Product details Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delprod = products::find($id);
        $delprod->delete();
        return redirect()->route('home.index')->with('success', 'Product deleted successfully');
    }
}
