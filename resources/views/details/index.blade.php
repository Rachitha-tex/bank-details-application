@extends('layouts.app')
@section('content')
    <h1 class="text-center">Bank Details</h1>

    @if (count($bankdetails)>0)

    @foreach ($bankdetails as $item)
        <div class="jumbotron container">
            <h3><a href="/bank-details/{{$item->id}}">{{$item->bank_name}}</a></h3>
            <h5>{{$item->branch}}</h5>
            <p>{{$item->created_at}} by {{$item->user->name}}</p>
        </div>
    @endforeach
    {{$bankdetails->links('pagination::bootstrap-4')}}

    @else
<h3 class="container">No Bank Details Currently Available</h3>
    @endif
@endsection