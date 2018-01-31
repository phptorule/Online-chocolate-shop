@extends('layouts.app')

@section('content')


    <!-- CONTENT -->
    <section class="shop line_shadow">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="shop_caption text-center">SHOP</h1>
                    <p class="shop_caption_description text-center">Alle vores lækre produkter</p>
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
                        <div class="mix_content text-center">
                            @foreach($product['mebfc']['product'] as $row)
                                <div class="mix_content_item_box d-sm-flex justify-content-sm-between">
                                    @foreach($row as $p)
                                        <div class="mix_content_part">
                                            <a href="javascript:void(0);" class="mix_content_item item_hover  hover_brown item white candi_item" data-title="{{ $p->name }}">
                                                <img src="{{ ! empty($p->image) ? '/storage/' . str_replace('public', '', $p->image) : 'img/pic/cont.png' }}" alt="img">
                                                <div class="overlay">
                                                    <div class="overlay_text">
                                                        {{ $p->short_description }}
                                                    </div>
                                                </div>
                                            </a>
                                            <h4 class="mix_content_item_caption">{{ $p->name }}</h4>
                                        </div>
                                    @endforeach                                
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mix_count">
                            <h3 class="mix_count_caption">STYKKER</h3>
                            <p class="mix_count_caption_description">I din box</p>
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
                            <a href="#" class="mix_count_butt butt">LÆG I KURV</a>
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
                        <div class="mix_content text-center">
                            @foreach($product['mebfc2']['product'] as $row)
                                <div class="mix_content_item_box d-sm-flex justify-content-sm-between">
                                    @if( ! empty($row->first()))
                                        <div class="small_mix_content_part">
                                            <a href="javascript:void(0);" class="small_mix_item item_hover item white candi_item" data-title="{{ $row->first()->name }}">
                                                <img src="{{ ! empty($row->first()->image) ? '/storage/' . str_replace('public', '', $row->first()->image) : 'img/pic/cont6.png' }}" alt="img">
                                                <div class="overlay">
                                                    <div class="overlay_text">
                                                        {{ $row->first()->short_description }}
                                                    </div>
                                                </div>
                                            </a>
                                            <h4 class="small_mix_item_caption">{{ $row->first()->name }}</h4>
                                        </div>
                                    @endif
                                    @if( count($row) >= 2 && ! empty($row->last()))
                                        <div class="mix_content_part">
                                            <a href="javascript:void(0);" class="small_mix_item item item_hover white candi_item" data-title="{{ $row->last()->name }}">
                                                <img src="{{ ! empty($row->last()->image) ? '/storage/' . str_replace('public', '', $row->last()->image) : 'img/pic/cont6.png' }}" alt="img">
                                                <div class="overlay">
                                                    <div class="overlay_text">
                                                        {{ $row->last()->short_description }}
                                                    </div>
                                                </div>
                                            </a>
                                            <h4 class="small_mix_item_caption">{{ $row->last()->name }}</h4>
                                        </div>
                                    @endif    
                                </div>                       
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mix_count">
                            <h3 class="mix_count_caption">STYKKER</h3>
                            <p class="mix_count_caption_description">I din box</p>
                            <div class="mix_count_list">
                                <p>1.   <span></span></p>
                                <p>2.   <span></span></p>
                                <p>3    <span></span></p>
                                <p>4.   <span></span></p>
                                <p>5.   <span></span></p>
                                <p>6.   <span></span></p>
                            </div>
                            <a href="#" class="mix_count_butt butt">LÆG I KURV</a>
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
                        <div class="overlay">
                            <div class="overlay_text">
                                {{ $category['vc']->short_description }}
                            </div>
                        </div>
                    </label>
                </div>
                <div class="col-md-6 text-center">
                    <div class="candies_count_add">
                        <button type="button" class="plus">+</button>
                        <input type="text" value="1" readonly>
                        <button type="button" class="minus">-</button>
                    </div>
                    <div class="candies_count_price">120 DKK</div>
                    <a href="#" class="butt">LÆG I KURV</a>
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
                    
                    @foreach($product['70g']['product'] as $row)
                    <div class="row">
                        @foreach($row as $p)
                            <div class="col-md-4">
                                <div class="original_box_wrap text-center">
                                    <label class="original_box_item white item">
                                        <input type="text">
                                        <img src="{{ ! empty($p->image) ? '/storage/' . str_replace('public', '', $p->image) : 'img/pic/position.png' }}" alt="img" />
                                        <div class="overlay">
                                            <div class="overlay_text">
                                            {{ $p->short_description }}
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
                    @endforeach
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
                    @foreach($product['12g']['product'] as $row)
                        <div class="row">
                            @foreach($row as $p)
                                <div class="col-md-4">
                                    <div class="original_box_wrap text-center">
                                        <label class="original_box_item white item">
                                            <input type="text">
                                            <img src="{{ ! empty($p->image) ? '/storage/' . str_replace('public', '', $p->image) : 'img/pic/position.png' }}" alt="img" />
                                            <div class="overlay">
                                                <div class="overlay_text">
                                                {{ $p->short_description }}
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
                    @endforeach
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
                            @foreach($product['200g']['product'] as $row)
                                <div class="row">    
                                    @foreach($row as $p)
                                        <div class="col-md-6">
                                            <div class="packaging_box_wrap text-center">
                                                <label class="packaging_box_item white item">
                                                    <input type="text" />
                                                    <img src="{{ ! empty($p->image) ? '/storage/' . str_replace('public', '', $p->image) : 'img/pic/position4.png' }}" alt="img" />
                                                    <div class="overlay">
                                                        <div class="overlay_text">
                                                        {{ $p->short_description }}
                                                        </div>
                                                    </div>
                                                </label>
                                                <div class="packaging_box_text">
                                                    <span>{{ $p->short_name }}</span>
                                                    <p>{{ $p->short_description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
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

                                @foreach($product['2000g']['product'] as $row)
                                    <div class="row">
                                        @foreach($row as $p)
                                            <div class="col-md-4">
                                                <div class="original_box_wrap text-center">
                                                    <label class="original_box_item original_box_down white  item">
                                                        <input type="text">
                                                        <img src="{{ ! empty($p->image) ? '/storage/' . str_replace('public', '', $p->image) : 'img/pic/position3.png' }}" alt="img">
                                                        <div class="overlay">
                                                            <div class="overlay_text">
                                                                {{ $p->short_description }} 
                                                            </div>
                                                        </div>
                                                    </label>
                                                    <div class="original_box_text">
                                                        <span>{{ $p->name }} </span>
                                                        <p>{{ $p->short_description }} </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                               
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </section>
    <!-- END CONTENT -->


@endsection