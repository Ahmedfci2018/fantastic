
<!-- contact us part start-->
<a name="contacts"></a>
<section class="contact_us" id="contact_us">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact_us_iner">
                    <div class="row justify-content-around">
                        <div class="col-lg-4">
                            <div class="contact_us_left_text">
                                <h4 style="color:#FFF">Cairo</h4><span style="font-size: 15px;"> branch</span>
                                <p>2-El Nozha St., Ard El Golf, Heliopolis</p>
                                <h4 style="color:#FFF">Mansoura</h4><span style="font-size: 15px;"> branch</span>
                                <p>Front of engineers club,talkha</p>
                                <p><span class="info-title-info">Email</span><br>
                                    Info@makramarchitects.com <br>
                                    <span class="info-title-info">Phone no</span><br>
                                    +20 100 120 44 84<br>
                                    +202 26907119<br>
                                    +20 50 2 54 60 54</p>



                            </div>
                        </div>
                        <div id="contact" class="col-lg-4">
                            <div class="contact_us_right_text">
                                <h5>Call Directly</h5>
                                <h2>+20 100 120 4484</h2>
                                <h5>Brand Office</h5>
                                <span>2-El Nozha St., Ard El Golf, Heliopolis, Cairo, Egypt</span>
                                <h5>Working Hours:</h5>
                                <p>Sunday - Thursday / 9:00 AM - 10:00 PM
                                </p>



                            <form   method="POST" action="{{route('front.messageStore')}}">
                                {{csrf_field()}}
                                    @include('partials._errors')
                                    <input type="text" name="name" class="field-of-contactus" placeholder="Name" style="width: 100%"><br>


                                    <input type="email" name="email" class="field-of-contactus" placeholder="E-mail" style="width: 100%"><br>



                                    <textarea value="{{request()->message}}" name="message" cols="30" rows="10" class="field-of-contactus" placeholder="Say something about us" style="width: 100%"></textarea>

                                    <input type="submit" class="submit-the-form">
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact us part end-->

@push('script')

    <script type="text/javascript">
        $(document).ready(function () {
            @if($errors->any())
            $('html, body').animate({
                scrollTop: $('#contact').offset().top
            }, 'slow');
            @endif
        });
    </script>
@endpush
