  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6 footer-contact">
            <h3>Contact</h3>
            <p>
              Villa 18, Elmasry Street,<br>Mogawra 9 , First Settelment,<br>New Cairo, Egypt <br><br>
              <strong>Phone:</strong> +2 23454428 / +2 01012337790 / +2 01012337750<br>
              <strong>Email:</strong> info@fantastic-eg.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('front.about')}}">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('front.services')}}">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('front.contact')}}">Contact Us</a></li>
              {{-- <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li> --}}
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>A selection of our references</h4>
            <ul>
                @foreach (App\Models\Client::limit(5)->get() as $item)
                    <li><i class="bx bx-chevron-right"></i> <a href="{{route('front.clients')}}">{{$item->name}}</a></li>
                @endforeach
            </ul>
          </div>



        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>Fantastic</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: http://www.smartsolutions-eg.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: http://www.smartsolutions-eg.com/company-free-html-bootstrap-template/ -->
          Designed by <a href="http://www.smartsolutions-eg.com/">SmartSolutions</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a target="_blank" href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a target="_blank" href="https://www.facebook.com/Fantastic.Trade/?ref=page_internal" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a target="_blank" href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a target="_blank" href="https://api.whatsapp.com/send?phone=+201012337750" class="linkedin"><i class="bx bxl-whatsapp"></i></a>

      </div>
    </div>
  </footer><!-- End Footer -->
