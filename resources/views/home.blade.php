@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center" style="font-size: 1.5rem; font-weight:bold;ssssss">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

            <a href="/bank-details/create" class="btn btn-primary">Create Bank Details</a>

                    @if (count($bankdetails)>0)
                    <table class="table table-stripped mt-5">
                        <tr>
                            <th colspan="">Bank Name</th>
                            <th colspan="">Branch Name</th>
                            <th colspan="">Branch Code</th>
                            <th colspan="">Account Number</th>
                            <th colspan="2">Actions</th>
                            
                 </tr>
                        @foreach ($bankdetails as $item)
                            <tr>
                                <td>{{$item->bank_name}}</td>
                                <td>{{$item->branch}}</td>
                                <td>{{$item->branch_code}}</td>
                                <td>{{$item->account_number}}</td>


                                <td colspan="2"><a href="/bank-details/{{$item->id}}/edit" class="btn btn-primary">Edit</a></td>
                            <td>
                                {!!Form::open(['action'=>['App\Http\Controllers\BankDetailsController@destroy',$item->id],'method'=>'POST','class'=>'float-right'])!!}
                                {{Form::hidden('_method','DELETE')}}
                                {{ Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                                {!!Form::close()!!}
                            </td>
                            </tr>
                        @endforeach
                </table>
                @else
                            <p class="mt-5"> No Bank Details Available</p>
                    @endif
                        

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
