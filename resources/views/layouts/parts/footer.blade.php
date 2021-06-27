<!-- FOOTER -->
{{--
<footer class="container">
    <p class="float-end"><a href="#">Balik ke atas</a></p>
    <p>&copy; 2021 Kamar Pelajar &middot;
        <a href="#">Privacy</a> &middot; <a href="#">Terms</a> 
    </p>
</footer>
--}}
<div class="container">
    <footer>
        <div class="row justify-content-center">
          <div class="col-3">
            <img class="mb-2" src="{{ URL::to('images/umum/logo.png') }}" alt=""  height="24">
            
            <small class="d-block mb-3 text-muted">&copy; {{ date('Y') }}</small>
            <a href="https://instagram.com/kamarpelajar" target="_blank" > <img class="mb-2" src="{{ URL::to('images/icons/ig.png') }}" title="Instagram" height="24"></a>
            <a href="https://wa.me/62811158860" target="_blank" >  <img class="mb-2" src="{{ URL::to('images/icons/wa.png') }}" title="WhatsApp" height="24"></a>
            <a href="mailto:mimin@kamarpelajar.com" target="_blank" >  <img class="mb-2" src="{{ URL::to('images/icons/gmail.png') }}" title="Email" height="24"></a>
          </div>
          <div class="col-3">
            <h5>Tentang kami</h5>
            <ul class="list-unstyled text-small">
              <li><a class="link-secondary" href="{{ route('visi') }}">Visi misi</a></li>
              {{-- <li><a class="link-secondary" href="#">Tim</a></li> --}}
              <li><a class="link-secondary" href="{{ route('karier') }}">Karier</a></li>
              <li><a class="link-secondary" href="{{ route('partner') }}">Partner</a></li> 
            </ul>
          </div>
          <div class="col-3">
            <h5>Informasi</h5>
            <ul class="list-unstyled text-small">
              <li><a class="link-secondary" href="{{ route('covid19') }}">Covid-19</a></li>
              <li><a class="link-secondary" href="{{ route('ketentuan') }}">Syarat & ketentuan</a></li> 
            </ul>
          </div>
         
        </div>
      </footer>
</div>