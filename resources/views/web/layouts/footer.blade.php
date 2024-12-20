    <footer class="footer">

      <div class="container">
        <div class="row">
          <div class="footer-col col-lg-3 col-md-6 col-sm-12 col-xs-12">
            <div class="footerlogo">
              <img src="{{ asset('frontend/images/Footerlogo.png') }}">
            </div>
            <div class="social-links gap-5">
              <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
              <a href="#"><i class="fa-brands fa-instagram"></i></a>
              <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
              <a href="#"><i class="fa-brands fa-youtube"></i></a>
              <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
            </div>
          </div>
          <div class="footer-col col-lg-3 col-md-6 col-sm-12 col-xs-12">
            <ul>
              <li><a href="#"><i class="fa fa-angle-right"></i> About us</a></li>
              <li><a href="#"><i class="fa fa-angle-right"></i> Products</a></li>
              <li><a href="#"><i class="fa fa-angle-right"></i> Terms & Condition</a></li>
              <li><a href="#"><i class="fa fa-angle-right"></i> Privacy Policy</a></li>
            </ul>
          </div>
          <div class="footer-col col-lg-3 col-md-6 col-sm-12 col-xs-12 thirdsecfooter">
            <h3>Contact Us</h3>
            <ul>
              <li><a href="#"><i class="fa fa-phone"></i> +91 8920 392 418</a></li>
              <li><a href="#"><i class="fa fa-envelope"></i> mail@ Fabricstree.com</a></li>
            </ul>
          </div>
          <div class="footer-col col-lg-3 col-md-6 col-sm-12 col-xs-12">
            <ul>
              <li><a href="#">Download the mobile app</a></li>
              <li><a href="#"> <img src="{{ asset('frontend/images/playstore.png') }}" alt=""> </a></li>
          </div>

        </div>
      </div>
    </footer>
     
    <script>
      productScroll();

      function productScroll() {
        let slider = document.getElementById("slider");
        let next = document.getElementsByClassName("pro-next")[0];
        let prev = document.getElementsByClassName("pro-prev")[0];
        let slide = document.getElementById("slide");
        let items = slide.getElementsByClassName("item");

        let position = 0; // Initialize position outside of event listeners

        prev.addEventListener("click", function () {
          if (position > 0) {
            position -= 1;
            translateX(position); //translate items
          }
        });

        next.addEventListener("click", function () {
          if (position < hiddenItems()) {
            position += 1;
            translateX(position); //translate items
          }
        });

        function hiddenItems() {
          // Get hidden items
          return items.length - Math.floor(slider.offsetWidth / 210);
        }

        function translateX(position) {
          // Translate items
          slide.style.transform = `translateX(${position * -210}px)`;
        }
      }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
      </script>

      
    