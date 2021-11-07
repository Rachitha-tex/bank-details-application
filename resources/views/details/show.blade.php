@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/bank-details" class="btn btn-primary mb-4">Go Back</a>
   <p class="">Bank Name : <span class="font-weight-bold">{{$bankdetail->bank_name}}</span></p>
    <div>
       <p>Branch Name : <span class="font-weight-bold"> {{$bankdetail->branch}}</span></p>
        <p> Bank Code : <span class="font-weight-bold">{{$bankdetail->branch_code}}</span></p> 
        <p>Account Number :<span class="font-weight-bold">{{$bankdetail->account_number}}</span></p> 
    </div>
    <small>Created in : <span class="font-weight-bold">{{$bankdetail->created_at}} by {{$bankdetail->user->name}}</span></small>
    <hr>
    @if (!Auth::user()->id == $bankdetail->user_id)
    <a href="/bank-details/{{$bankdetail->id}}/edit" class="btn btn-info">Edit</a>
 
    {!!Form::open(['action'=>['App\Http\Controllers\BankDetailsController@destroy',$bankdetail->id],'method'=>'POST','class'=>'float-right'])!!}
       {{Form::hidden('_method','DELETE')}}
       {{ Form::submit('Delete', ['class'=>'btn btn-danger'])}}
       {!!Form::close()!!}
     
    @endif

    </div>
@endsection