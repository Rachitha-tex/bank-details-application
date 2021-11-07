@extends('layouts.app')
@section('content')
     <h1 class="text-center">Create a Bank Detail</h1>

     <div class="container mt-4">
     {{Form::open(['action'=>'App\Http\Controllers\BankDetailsController@store','method'=>'POST'])}}

     <div class="form-group">
         {{Form::label('bank_name','Bank Name',['class'=>'font-weight-bold'])}}
         {{Form::text('bank_name','',['class'=>'form-control','placeholder'=>'Enter Bank Name','autocomplete'=>'off'])}}
     </div>
     <div class="form-group">
        {{Form::label('branch','Branch Name',['class'=>'font-weight-bold'])}}
        {{Form::text('branch','',['class'=>'form-control','placeholder'=>'Enter Branch Name','autocomplete'=>'off'])}}
    </div>
    <div class="form-group">
        {{Form::label('branch_code','Branch Code',['class'=>'font-weight-bold'])}}
        {{Form::text('branch_code','',['class'=>'form-control','placeholder'=>'Enter Branch Code Number','autocomplete'=>'off'])}}
    </div>

    <div class="form-group">
        {{Form::label('account_number','Account Number',['class'=>'font-weight-bold'])}}
        {{Form::text('account_number','',['class'=>'form-control','placeholder'=>'Enter Account Number','autocomplete'=>'off'])}}
    </div>

    {{Form::submit('Submit',['class'=>'btn btn-success'])}}
     {{Form::close()}}
</div>
@endsection