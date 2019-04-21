
@include('layouts.header')



<div id="contact-page" class="container">
   <!-- <div class="bg">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title text-center">Contact <strong>Us</strong></h2>
                <div id="gmap" class="contact-map">

                </div>
            </div>
        </div>-->
 @if(session('status'))
                        <div class = "container">
                            <div class = "alert alert-success">{{session('status')}}</div>
                        </div>
                    @endif

        <div class="row">
            <div class="col-sm-8">
                <div class="contact-form">
                    <h2 class="title text-center">Get In Touch</h2>
                    <div class="status alert alert-success" style="display: none"></div>
                    <form action = "/contact/send" method = "post" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group col-md-6">
                            <input type="email" name="email" value="{{old('email')}}" class="form-control"  placeholder="Email">
                            @if ($errors->any())
                                @foreach ($errors->get('email') as $error)
                                    <p style="color:red;">{{ $error }}</p>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="subject" class="form-control" value="{{old('subject')}}" required="required" placeholder="Subject">
                            @if ($errors->any())
                                @foreach ($errors->get('subject') as $error)
                                    <p style="color:red;">{{ $error }}</p>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="body" id="message" required="required" value="{{old('body')}}" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                            @if ($errors->any())
                                @foreach ($errors->get('body') as $error)
                                    <p style="color:red;">{{ $error }}</p>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                    
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">Contact Info</h2>
                    <address>
                        <p>E-Shopper Inc.</p>
                        <p>935 W. Webster Ave New Streets London, IL 60614, ON</p>
                        <p>London,ON</p>
                        <p>Mobile: +2346 17 38 93</p>
                        <p>Fax: 1-714-252-0026</p>
                        <p>Email: eshopper@nayangoswami.com</p>
                    </address>
                    <div class="social-networks">
                        <h2 class="title text-center">Social Networking</h2>
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--/#contact-page-->

@include('layouts.footer')