<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankDetail;
use Illuminate\Support\Facades\Auth;

class BankDetailsController extends Controller
{

    public function __construct(){
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
       $bankdetails=BankDetail::orderBy('created_at','desc')->paginate(3); 
       return view('details.index')->with('bankdetails',$bankdetails);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('details.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'bank_name'=>'required',
            'branch'=>'required',
            'branch_code'=>'required',
            'account_number'=>'required'
        ]);
        $bankdetail=new BankDetail();
        $bankdetail->bank_name=$request->input('bank_name');
        $bankdetail->branch=$request->input('branch');
        $bankdetail->branch_code=$request->input('branch_code');
        $bankdetail->account_number=$request->input('account_number');
        $bankdetail->user_id=Auth::user()->id;

        $bankdetail->save();
        return redirect('/bank-details')->with('success','Detail Created Successfully!!!!');
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bankdetail=BankDetail::find($id);
        return view('details.show')->with('bankdetail',$bankdetail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bankdetail=BankDetail::find($id);
        if(auth()->user()->id !== $bankdetail->user_id){
            return redirect('/bank-details')->with('error','Unauthorized Page!!!');
        }
        return view('details.edit')->with('bankdetail',$bankdetail);
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
        $this->validate($request,[
            'bank_name'=>'required',
            'branch'=>'required',
            'branch_code'=>'required',
            'account_number'=>'required'
        ]);

        $bankdetail=BankDetail::find($id);

        $bankdetail->bank_name=$request->input('bank_name');
        $bankdetail->branch=$request->input('branch');
        $bankdetail->branch_code=$request->input('branch_code');
        $bankdetail->account_number=$request->input('account_number');
        $bankdetail->save();
        return redirect('/bank-details')->with('success','Detail Updated Successfully!!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bankdetail=BankDetail::find($id);
        if(auth()->user()->id !== $bankdetail->user_id){
            return redirect('/bank-details')->with('error','Unauthorized Page!!!');
        }
        $bankdetail->delete();

        return redirect('/bank-details')->with('success','Detail Deleted Successfully!!!!');

    }
}
