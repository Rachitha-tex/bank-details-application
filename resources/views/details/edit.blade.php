@extends('layouts.app')
@section('content')
     <h1 class="text-center">Edit a Bank Detail</h1>

     <div class="container mt-4">
     {{Form::open(['action'=>['App\Http\Controllers\BankDetailsController@update',$bankdetail->id],'method'=>'POST'])}}

     <div class="form-group">
         {{Form::label('bank_name','Bank Name',['class'=>'font-weight-bold'])}}
         {{Form::text('bank_name',$bankdetail->bank_name,['class'=>'form-control','placeholder'=>'Enter Bank Name'])}}
     </div>
     <div class="form-group">
        {{Form::label('branch','Branch Name',['class'=>'font-weight-bold'])}}
        {{Form::text('branch',$bankdetail->branch,['class'=>'form-control','placeholder'=>'Enter Branch Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('branch_code','Branch Code',['class'=>'font-weight-bold'])}}
        {{Form::text('branch_code',$bankdetail->branch_code,['class'=>'form-control','placeholder'=>'Enter Branch Code Number'])}}
    </div>

    <div class="form-group">
        {{Form::label('account_number','Branch Code',['class'=>'font-weight-bold'])}}
        {{Form::text('account_number',$bankdetail->account_number,['class'=>'form-control','placeholder'=>'Enter Acount Number'])}}
    </div>

    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-success'])}}
     {{Form::close()}}
</div>
@endsection