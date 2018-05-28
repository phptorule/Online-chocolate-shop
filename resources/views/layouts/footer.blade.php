<!-- FOOTER -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <h3 class="footer_caption">{{ __("footer.address") }} </h3>
                <p class="footer_text">
                    <span>Rosenkæret 15c </span>
                    <span>2826 Søborg</span>
                    <span>Danmark</span>
                </p>
            </div>
            <div class="col-md-2">
                <h3 class="footer_caption">{{ __("footer.contact") }}</h3>
                <p class="footer_text">
                    <span>info@mhchocolate.dk</span>
                    <span>Tel: +45 30 24 22 49</span>
                </p>
            </div>
            <div class="col-md-3">
                <h3 class="footer_caption">{{ __("footer.opening_hours") }}</h3>
                <p class="footer_text">
                    <span>{{ __("footer.hours") }}</span>
                    <span>09.00 -18.00</span>
                </p>
            </div>
            <div class="col-md-5">
                <!-- <h3 class="footer_caption">{{ __("footer.singup_for_newsletter") }}</h3>
                
                @if(session()->exists('message'))
                <div class="alert alert-{{ session()->get('status') }}" role="alert">
                    {{ session()->get('message') }}
                </div>    
                @endif -->
                
                <!-- <form class="footer_form" method="get" action="/subscribe">
                    <input type="text" name="email" class="email" placeholder="{{ __("footer.enter_email_address") }} ">
                    <button type="submit">{{ __("footer.register") }} </button>
                </form> -->
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->