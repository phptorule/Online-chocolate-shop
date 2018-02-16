@extends('layouts.empty')
@section('content')
  @if(session()->exists('message'))
    <div class="alert alert-{{ session()->get('status') }}" role="alert">
        {{ session()->get('message') }}
    </div>    
  @endif
  
  <form action="{{ url('/subscribe') }}">
    <input name="email" type="email" placeholder="Indtast email adresse" />
    <button>tilmeed</button>
  </form>
@endsection

@push('css')
  <style>
  .box {
    width: 400px;
    box-sizing: border-box;
    margin: 0;
    max-width: 41%;
    flex: 0 0 41%;
  }

  input[name='email'] {
    width: 100%;
    border: none;
    font-size: 14px;
    padding: 10px;
    margin-bottom: 10px;
    background-color: rgba(232,232,232,1);
  }

  button {
    height: 40px;
    color: #E8E8E8;
    background-color: rgba(232, 232, 232, 0.03);
    cursor: pointer;
    display: block;
    width: 100%;
    border: 4px solid #E8E8E8;
    height: 45px;
    line-height: 45px;
    outline: none;
    margin: 0;
    font-size: 14px;
  }
  </style>
@endpush