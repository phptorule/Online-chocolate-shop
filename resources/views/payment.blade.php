@extends('layouts.app')

@section('content')
<section class="payment">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h2_caption">PAYMENT</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="{{ url('/pay?code=' . request()->code) }}" class="btn btn-primary">Pay</a>
            </div>
        </div>
    </div>
</section>
@endsection