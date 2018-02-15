@extends('layouts.app')

@section('content')
    <section class="signup">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <h1 class="signup_caption">{{ __('signup.engros_shop') }}</h1>
                    <div class="signup_form_wrapper">
                        <form>
                            <label for="name">{{ __('signup.username') }}</label>
                                <input type="text" id="name" name="name" class="input_form">
                            <label for="name">{{ __('signup.password') }}</label>
                                <input type="password" id="password" name="password" class="input_form">
                            <button type="submit" class="input_butt mix_count_butt butt">{{ __('signup.submit') }}</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="signup_img">
                        <img src="/storage/image/pic_1.png" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection