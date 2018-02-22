@extends('layouts.app')

@section('content')


    <!-- CONTENT -->
    <section class="shop line_shadow">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="shop_caption text-center text-uppercase">{{ __('main.shop') }}</h1>
                    <p class="shop_caption_description text-center">{{ __('main.short_description') }} </p>
                    <div class="shop_item_box d-sm-flex justify-content-sm-between">
                        @foreach($category as $c)
                            @if( ! $c->parent_id)
                                <a href="#{{ $c->code }}" class="shop_item item_scrolll item light_brown" style="background-color: {{ $c->color }} ">
                                    <span>{{ $c->name }}</span>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if( ! empty($category['mebfc']))
        <section class="big_mix mix line_shadow" id="mebfc">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mix_text text-center">
                            <h2 class="h2_caption">{{ $category['mebfc']->name }}</h2>
                            <p class="mix_paragraphe">
                                {{ $category['mebfc']->short_description }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            @foreach($product['mebfc']['product'] as $p)
                            <div class="col-md-4">
                                <div class="mix_content text-center">
                                    <div class="mix_content_item_box">
                                        <div class="mix_content_part">
                                            <a href="javascript:void(0);" class="mix_content_item item_hover  hover_brown item white candi_item" data-box="candies" data-title="{{ $p->name }}" data-id="{{ $p->id }}">
                                                <img src="{{ ! empty($p->image) ? '/storage/' . str_replace('public', '', $p->image) : 'img/pic/cont.png' }}" alt="img">
                                                <div class="overlay" style="{{ $p->hover_check ? '' : 'background-color: ' . $p->hover_color }}">
                                                    <div class="overlay_text">
                                                        @if( ! $p->hover_check)
                                                            {{ $p->hover_text }}
                                                        @else
                                                            <img src="{{ ! empty($p->hover_img) ? '/storage/' . str_replace('public', '', $p->hover_img) : 'img/pic/cont.png' }}" alt="hover" />
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="overlay-active" style="background-color: {{ $p->active_effect }}">
                                                    <div class="overlay_text"></div>
                                                </div>
                                            </a>
                                            <h4 class="mix_content_item_caption">{{ $p->name }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mix_count">
                            <h3 class="mix_count_caption text-uppercase">{{ __("main.pieces") }}</h3>
                            <p class="mix_count_caption_description">{{ __("main.in_your_box") }}</p>
                            <div class="mix_count_list">
                                <p>1.   <span></span></p>
                                <p>2.   <span></span></p>
                                <p>3.   <span></span></p>
                                <p>4.   <span></span></p>
                                <p>5.   <span></span></p>
                                <p>6.   <span></span></p>
                                <p>7.   <span></span></p>
                                <p>8.   <span></span></p>
                                <p>9.   <span></span></p>
                                <p>10.  <span></span></p>
                                <p>11.  <span></span></p>
                                <p>12.  <span></span></p>
                            </div>
                            <button href="javascript:;" data-box="candies" disabled  class="mix_count_butt butt add_to_card disabled">{{ __('main.ad_to_the_basket') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ( ! empty($category['mebfc2']))
        <section class="small_mix mix line_shadow" id="mebfc2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mix_text text-center">
                            <h2 class="h2_caption">{{ $category['mebfc2']->name }}</h2>
                            <p class="h2_caption_description">{{ $category['mebfc2']->short_description }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            @foreach($product['mebfc2']['product'] as $row)
                             
                            <div class="col-md-6 float_item clearfix">
                                <div class="mix_content text-center">
                                    <div class="mix_content_item_box">
                                        <div class="small_mix_content_part">
                                            <a href="javascript:void(0);" class="small_mix_item item_hover item white candi_item" data-box="candle" data-title="{{ $row->name }}" data-id="{{ $row->id }}">
                                                <img src="{{ ! empty($row->image) ? '/storage/' . str_replace('public', '', $row->image) : 'img/pic/cont6.png' }}" alt="img">
                                                <div class="overlay" style="background-color: {{ $p->active_effect }}">
                                                    <div class="overlay_text">
                                                        {{ $row->short_description }}
                                                    </div>
                                                </div>
                                                <div class="overlay-active" style="background-color: {{ $p->active_effect }}">
                                                    <div class="overlay_text"></div>
                                                </div>
                                            </a>
                                            <h4 class="small_mix_item_caption">{{ $row->name }}</h4>
                                        </div>
                                    </div>                       
                                
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mix_count">
                            <h3 class="mix_count_caption text-uppercase">{{ __("main.chocolate_covered_meringue") }}</h3>
                            <p class="mix_count_caption_description">{{ __("main.in_your_box") }}</p>
                            <div class="mix_count_list">
                                <p>1.   <span></span></p>
                                <p>2.   <span></span></p>
                                <p>3    <span></span></p>
                                <p>4.   <span></span></p>
                                <p>5.   <span></span></p>
                                <p>6.   <span></span></p>
                            </div>
                            <button href="javascript:void(0);" data-box="candle" class="mix_count_butt butt add_to_card disabled">{{ __('main.ad_to_the_basket') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ( ! empty($category['vc']))
    <section class="candies_count line_shadow" id="vc">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center">
                    <h2 class="h2_caption">{{ $category['vc']->name }}</h2>
                    <p class="h2_caption_description">{{ $category['vc']->short_description }}</p>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6 text-center">
                    <label class="item item_hover candies_count_img">
                        <input type="text">
                        <img src="{{ ! empty($category['vc']->image) ? '/storage/' . str_replace('public', '', $category['vc']->image) : ' img/pic/pic.png' }}" alt="img" />
                    </label>
                </div>
                <div class="col-md-6 text-center">
                    <div class="candies_count_add">
                        <button type="button" class="plus">+</button>
                        <input type="text" id="hot_candy" value="1" readonly>
                        <button type="button" class="minus">-</button>
                    </div>
                    <div class="candies_count_price">{{ $product['vc']['product']->first()->price }} DKK</div>
                    <a href="javascript:void(0);" data-id="{{ $product['vc']['product']->first()->id }}" class="butt" id="add_to_hot_card">{{ __('main.ad_to_the_basket') }}</a>
                </div>
            </div>
        </div>
    </section>
    @endif
    
    <section class="original line_shadow" id="ob">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="original_caption"><img src="img/pic/caption.png" alt="caption"></div>
                </div>
            </div>
        </div>
        @if (count($product['70g']['product']))
            <div class="original_box">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3 class="original_section_caption">{{ $category['70g']->name }}</h3>
                            <p class="original_section_description">{{ $category['70g']->short_description }}</p>
                        </div>
                    </div>
                    
                    <div class="row">
                        @foreach($product['70g']['product'] as $p)
                            <div class="col-md-4">
                                <div class="original_box_wrap text-center">
                                    <label data-id="{{ $p->id }}" class="direct-product original_box_item original_box_item_active item_hover original_box_item_active white item">
                                        <input type="text" disabled />
                                        <img src="{{ ! empty($p->image) ? '/storage/' . str_replace('public', '', $p->image) : 'img/pic/position.png' }}" alt="img" />
                                        <div class="overlay" style="background-color: {{ $p->active_effect }}">
                                            <div class="overlay_text">
                                                {{ $p->short_description }}
                                            </div>
                                        </div>
                                        <div class="overlay-active">
                                            <div class="overlay_text">
                                                LÆG I KURV
                                            </div>
                                        </div>
                                    </label>
                                    <div class="original_box_text">
                                        <span>{{ $p->name }}</span>
                                        <p>{{ $p->short_description }}</p>
                                    </div>
                                </div>
                            </div>    
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if (count($product['12g']['product']))
            <div class="original_box">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3 class="original_section_caption">{{ $category['12g']->name }}</h3>
                            <p class="original_section_description">{{ $category['12g']->short_description }}</p>
                        </div>
                    </div>
                        <div class="row">
                            @foreach($product['12g']['product'] as $p)
                                <div class="col-md-4">
                                    <div class="original_box_wrap text-center">
                                        <label data-id="{{ $p->id }}" class="direct-product original_box_item original_box_item_active item_hover white item">
                                            <input type="text" disabled />
                                            <img src="{{ ! empty($p->image) ? '/storage/' . str_replace('public', '', $p->image) : 'img/pic/position.png' }}" alt="img" />
                                            <div class="overlay"  style="background-color: {{ $p->active_effect }}">
                                                <div class="overlay_text">
                                                {{ $p->short_description }}
                                                </div>
                                            </div>
                                            <div class="overlay-active">
                                                <div class="overlay_text">
                                                    LÆG I KURV
                                                </div>
                                            </div>
                                        </label>
                                        <div class="original_box_text">
                                            <span>{{ $p->name }}</span>
                                            <p>{{ $p->short_description }}</p>
                                        </div>
                                    </div>
                                </div>    
                            @endforeach
                        </div>
                </div>
            </section>
        @endif

        @if(count($product['200g']['product']))                
            <section class="packaging">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="original_box">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h3 class="original_section_caption">{{ $category['200g']->name }}</h3>
                                        <h3 class="original_section_caption">{{ $category['200g']->short_description }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <div class="row">    
                                    @foreach($product['200g']['product'] as $p)
                                        <div class="col-md-6">
                                            <div class="packaging_box_wrap text-center">
                                                <label data-id="{{ $p->id }}" class="direct-product packaging_box_item item_hover original_box_item_active white item">
                                                    <input type="text" disabled />
                                                    <img src="{{ ! empty($p->image) ? '/storage/' . str_replace('public', '', $p->image) : 'img/pic/position4.png' }}" alt="img" />
                                                    <div class="overlay"  style="background-color: {{ $p->active_effect }}">
                                                        <div class="overlay_text">
                                                        {{ $p->short_description }}
                                                        </div>
                                                    </div>
                                                    <div class="overlay-active">
                                                        <div class="overlay_text">
                                                            LÆG I KURV
                                                        </div>
                                                    </div>
                                                </label>
                                                <div class="packaging_box_text">
                                                    <span>{{ $p->name }}</span>
                                                    <p>{{ $p->short_description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        <div class="col-md-5">
                            <img src="{{ ! empty($category['200g']->image) ? '/storage/' . str_replace('public/', '', $category['200g']->image) : 'img/pic/border.png' }}" alt="img" class="packaging_img" />
                        </div>
                    </div>
                </div>
            </section>
        @endif
        
        @if(count($product['2000g']['product']))
            <section class="original">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="original_box">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h3 class="original_section_caption">{{ $product['2000g']->name }}</h3>
                                        <p class="original_section_description">{{ $product['2000g']->short_description }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                        @foreach($product['2000g']['product'] as $p)
                                            <div class="col-md-4">
                                                <div class="original_box_wrap text-center">
                                                    <label data-id="{{ $p->id }}" class="direct-product original_box_item original_box_item_active item_hover original_box_down white  item">
                                                        <input type="text" disabled />
                                                        <img src="{{ ! empty($p->image) ? '/storage/' . str_replace('public', '', $p->image) : 'img/pic/position3.png' }}" alt="img">
                                                        <div class="overlay"  style="background-color: {{ $p->active_effect }}">
                                                            <div class="overlay_text">
                                                                {{ $p->short_description }} 
                                                            </div>
                                                        </div>
                                                        <div class="overlay-active">
                                                            <div class="overlay_text">
                                                                LÆG I KURV
                                                            </div>
                                                        </div>
                                                    </label>
                                                    <div class="original_box_text">
                                                        <span>{{ $p->name }}</span>
                                                        <p>{{ $p->short_description }} </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </section>
    <!-- END CONTENT -->


@endsection

@push('js')
<script>

    var cartUrl = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), 'cart') }}";

    $(document).ready(function() {
        $(".direct-product").click(function() {
            cart.addToCart($(this).data('id')); 
            window.location.href = cartUrl;
        });
        
        $('#add_to_hot_card').click(function() {
            cart.addToCart($(this).data('id'), $("#hot_candy").val() * 1);
            window.location.href = cartUrl;
        });
    });
</script>
@endpush