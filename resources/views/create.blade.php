@extends('layouts.app')

@section('content')

<section class="create">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h2_caption text-left">OPRET DIG SOM ENGRO KUNDE</h2>
                <p class="create_text">For at blive godkendt som engroskunde hos os, <br> skal I udfylde nedestående formular. </p>
                <p class="create_text">I får besked pr. mail, når vi har behandlet ansøgningen. <br> Behandlingstid op til 5 hverdage</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="create_box">
                    <form>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="create_box_row">
                                            <label for="telephone">FIRMANAVN</label>
                                            <input type="text" id="telephone" name="telephone" class="input_form">
                                        </div>
                                        <div class="create_box_row">
                                            <label for="telephone">CVR-NUMMER</label>
                                            <input type="text" id="telephone" name="telephone" class="input_form">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="create_box_row">
                                            <label for="telephone">TELEFONNUMMER</label>
                                            <input type="text" id="telephone" name="telephone" class="input_form">
                                        </div>
                                        <div class="create_box_row">
                                            <label for="telephone">E-MAIL*</label>
                                            <input type="text" id="telephone" name="telephone" class="input_form">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="create_box_row">
                                            <label for="telephone">JERES VISION</label>
                                            <textarea></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="create_box_row long_label">
                                            <label for="telephone">HVORFOR VIL I KØBE & SÆLGE VORES PRODUKTER?</label>
                                            <textarea></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="create_box_row create_box_row_butt">
                                    <button type="submit" class="input_butt mix_count_butt butt pull-right">INDSEND</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection