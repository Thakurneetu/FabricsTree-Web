@include('web.layouts.header')
    <div class="banneerlogo">
        <div style="flex-direction: column;">
            <h1>Contact Us</h1>
            <p><span>Home</span>/ Contact Us</p>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="container">

            <div class="row">

                <div class="col-md-6 testimonialfluid">
                    <h2 style="font-weight: bold mb-2">Get in Touch</h2>
                    <form method="POST" id="contactForm" name="contactForm" >
                        @csrf 
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="phone" id="phone"
                                        placeholder="Enter your mobile number"/>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter your email address" />
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" name="message" id="message" rows="5" placeholder="Type a message..." style="height: 120px;"></textarea>
                        </div>
                        
                        <button class="btn-outline-success maincolor" name="save_contactus" id="save_contactus" type="button">Submit</button>

                    </form>
                </div>


                <div class="col-lg-6 col-md-6 col-sm-12 ">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="icondiv">
                                <div><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                <div>
                                    <h4>Our Address</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting </p>
                                </div>
                            </div>
                            <div class="icondiv">
                                <div><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                <div>
                                    <h4>General Enquiries</h4>
                                    <p>websupport@Fabrics treee</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="icondiv">
                                <div><i class="fa fa-phone" aria-hidden="true"></i></div>
                                <div>
                                    <h4>Call us</h4>
                                    <p>+91 12345 12456</p>
                                </div>
                            </div>
                            <div class="icondiv">
                                <div><i class="fa fa-clock" aria-hidden="true"></i></div>
                                <div>
                                    <h4>Our Timing</h4>
                                    <p>Mon - Sun :10:00AM - 04:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30145.17140331232!2d72.80210472571645!3d19.188805882169866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b6914fe3a8e5%3A0x73f264109c4db9d4!2sMalad%2C%20Malad%20West%2C%20Mumbai%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1730286440157!5m2!1sen!2sin"
                            width="600" height="200" style="width: 100%;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                </div>

            </div>

        </div>
    </div>
@include('web.layouts.footer')