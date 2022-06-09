<?php $c = Request::route()->getName(); ?>
@if($c == "/")
<footer class="main-footer with-padding-top">
@else
<footer class="main-footer">
@endif
    	<!--Widgets Section-->
    	<div class="widgets-section">
        	<div class="auto-container">
            	<div class="row clearfix">
                	<!--Big Column-->
                    <div class="big-column col-md-6 col-sm-12 col-xs-12">
                    	<div class="row clearfix">
                        	<!--Footer Column-->
                            <div class="footer-column col-md-7 col-sm-6 col-xs-12">
                            	<div class="footer-widget about-widget">
                                	<!-- <div class="logo"><a href="index-2.html"><img src="{{URL::asset('vitrine/images/footer-logo.png')}}" alt=""></a></div> -->
                                    <div class="logo"><a href="index-2.html"><img src="{{URL::asset('vitrine/images/logotest.png')}}" alt=""></a></div>
                                	<div class="widget-content">
                                    	<div class="text">joodimmobilier.tn est un site d'annonces immobilières destiné aux particuliers et aux professionnels.</div>
                                        <div class="copyright-text">&copy; joodimmobilier 2021.</div>
                                        
                                    </div>
                                </div>
                            </div><!--End Footer Column-->
                            
                            <!--Footer Column-->
                            <div class="footer-column col-md-5 col-sm-6 col-xs-12">
                            	<div class="footer-widget links-widget">
                                    <h2>Menu</h2>
                                    <div class="widget-content">
                                        <ul class="list">
                                            <?php $current = Request::route()->getName(); ?>
                                            @if($current == "/")
                                            <li><a href="#about">À propos</a></li>
                                            <li><a href="#service">Services</a></li>
                                            <li><a href="{{ url('/annonces')}}">Annonces</a></li>
                                            <li><a href="#contact">Contact</a></li>
                                            @else
                                            <li><a href="{{ url('/')}}">Accueil</a></li>
                                            <li><a href="{{ url('/')}}#about">À propos</a></li>
                                            <li><a href="{{ url('/')}}#service">Services</a></li>
                                            <li><a href="{{ url('/annonces')}}">Annonces</a></li>
                                            <li><a href="{{ url('/')}}#contact">Contact</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div><!--End Footer Column-->
                        </div>
                    </div><!--End Big Column-->
                    
                    <!--Big Column-->
                    <div class="big-column col-md-6 col-sm-12 col-xs-12">
                    	<div class="row clearfix">
                            
                            
                            <!--Footer Column-->
                            <div class="footer-column col-md-7 col-sm-6 col-xs-12">
                            	<div class="footer-widget contact-widget">
                                	<h2>Contact</h2>
                                	<div class="widget-content">
                                    	<!-- <div class="text">Feel free to ger in touch with us via phone or send us a message.</div> -->
                                    	<ul class="contact-info">
                                            <li><div class="icon"><span class="fa fa-envelope-o"></span></div> <a href="jood-immobilier@hotmail.com">jood-immobilier@hotmail.com</a></li>
                                            <li><div class="icon"><span class="fa fa-phone"></span></div>( +216 ) 95.558.300</li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!--End Footer Column-->
                            
                            <!--Footer Column-->
                            <div class="footer-column col-md-5 col-sm-6 col-xs-12">
                            	<div class="footer-widget social-widget">
                                	<h2>Suivez-nous</h2>
                                	<div class="widget-content">
                                        <ul class="social-links">
                                        	<li><a href="https://www.facebook.com/Jood.immobilier/" class="facebook"><span class="fa fa-facebook-f"></span></a></li>
                                            
                                            
                                            
                                            @if (Route::has('login'))
                                                @auth
                                                    <li><a href="{{ url('/home') }}" class="google-plus"><span class="icon fa fa-user"></span></a></li>
                                                @else
                                                <li><a href="{{ route('login') }}" class="google-plus"><span class="icon fa fa-user"></span></a></li>
                                                @endauth
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div><!--End Footer Column-->
                            
                        </div>
                    </div><!--End Big Column-->
                    
                </div>
            </div>
        </div>
         
    </footer>