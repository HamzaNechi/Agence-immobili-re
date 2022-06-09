@extends('layouts.app2')
@section('content')

<!--Home Banner-->
<section class="home-banner with-border">
    <!--Banner Slider-->
    <div class="banner-slider-container">
        <ul class="banner-slider owl-theme owl-carousel">
            <li class="slide-item" style="background-image:url(vitrine/images/main-slider/5.jpg);"></li>
            <!-- <li class="slide-item" style="background-image:url(vitrine/images/main-slider/3.jpg);"></li> -->
            <li class="slide-item" style="background-image:url(vitrine/images/main-slider/2.jpg);"></li>
            <!-- <li class="slide-item" style="background-image:url(vitrine/images/main-slider/1.jpg);"></li> -->
        </ul>
    </div>

    <!--Banner Search Form-->
    <div class="banner-search-container">
        <div class="form-outer">
            <div class="banner-search-form">
                <!-- <h1>{{ __('messages.Trouvez le biens de vos rêves')}}</h1> -->
                <div class="text">
                    <img src="{{ asset('vitrine/images/joodtext.png')}}" style="width : 35%; height : 35%;">
                </div>

                <div class="banner-form-box">
                    <div class="default-form">
                        <form method="get" action="{{ url('/chercherbien') }}">
                            <div class="row clearfix">
                                <div class="form-group col-md-3 col-sm-4 col-xs-12">
                                    <select class="custom-select-box" name="region">
                                        <option>{{__('messages.Emplacement')}}</option>
                                        @foreach($lieu as $le)
                                        <option value="{{ $le->lieu }}">{{ explode(",",$le->lieu)[1] }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-3 col-sm-4 col-xs-12">
                                    <select class="" name="objectif" id="obj">
                                        <option value="location">{{__('messages.Location')}}</option>
                                        <option value="vente">{{__('messages.Achats')}}</option>

                                    </select>
                                </div>

                                <div class="form-group col-md-3 col-sm-4 col-xs-12">
                                    <!-- <input type="text" name="field-name" value="" placeholder="Enter Location" required> -->
                                    <select class="" name="type">
                                        <option selected>{{__('messages.Type de biens')}}</option>
                                        <option value="Maison">{{__('messages.Maison')}}</option>
                                        <option value="Terrain titre bleu" id="tb" style="display:none;">{{__('messages.Terrain titre bleu')}}</option>
                                        <option value="Terrain agricole">{{__('messages.Terrain agricole')}}</option>
                                        <option value="Locaux commerciales">{{__('messages.Locaux commerciaux')}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3 col-sm-4 col-xs-12">
                                    <button type="submit" class="theme-btn btn-style-one">{{__('messages.Recherche')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<!--Testimonials Section-->
<section class="testimonials-style-one" id="about">
    <div class="auto-container">
        <!--Heading-->
        <div class="sec-title centered">
            <h2>{{ __('messages.Qui somme nous !')}}</h2>
        </div>

        <div class="carousel-outer">
            <div class="testimonial-carousel-one single-item-carousel owl-theme owl-carousel">
                <!--Slide Item-->
                <div class="slide-item">
                    <div class="slide-inner">
                        <div class="clearfix">
                            <!--Image Column-->
                            <div class="image-column col-md-3 col-sm-12 col-xs-12">
                                <figure class="image"><img
                                        src="{{URL::asset('vitrine/images/resource/featured-image-10.jpg')}}" alt="">
                                </figure>
                            </div>
                            <!--Content Column-->
                            <div class="content-column col-md-9 col-sm-12 col-xs-12">
                                <div class="inner">
                                    <!-- <div class="icon"></div> -->
                                    <div class="slide-text">
                                    <br>
                                        Notre Agence immobilière «  JOOD IMMOBILIER » est en mesure de vous apporter tout ces services pour  vous satisfaire et fort de ce constat, dans un soucis de transparence, Nous l’équipe de «  Jood Immobilier » , on a pris la décision d’être noté par nos clients vendeurs et acheteurs .
                                    </div>
                                    <div class="author-info">
                                        <h4>Barnis Bilel</h4>
                                        <div class="designation">{{__("messages.Chef d'agence, fondateur")}} @<a href="#">{{__('messages.Contact')}}</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

    </div>
</section>





<!--Team Section-->
<section class="team-section" id="service" style="padding-top:110px;">
    <div class="auto-container">
        <!--Heading-->
        <div class="sec-title centered">
            <h2>{{__('messages.Nos services')}}</h2>
        </div>

        <div class="row clearfix">





            <!--Service 4-->


            <div class="team-member col-md-6 col-sm-6 col-xs-12">
                <div class="inner-box">
                    <div class="clearfix">

                        <!-- <div class="image-column col-md-5 col-sm-12 col-xs-12">
                            	<figure class="image"><a href="agent-single.html"><img src="{{URL::asset('vitrine/images/resource/team-image-1.png')}}" alt=""></a></figure>
                            </div> -->

                        <div class="content-column col-md-12 col-sm-12 col-xs-12">
                            <div class="inner">
                                <div class="title">
                                    <h3><a href="#">{{__('messages.Vente & Location & Achats')}}</a></h3>

                                </div>
                                <div class="desc-text">{{__('messages.Vente, Location et achat un appartement ,local commercial, bureau ou entrepôt... ')}}@<a href="#annonces">{{__('messages.Voir annonces')}}</a> ou @<a href="{{ url('/ajouter_annonces') }}">{{__('messages.Publier votre annonce')}}</a></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="team-member col-md-6 col-sm-6 col-xs-12">
                <div class="inner-box">
                    <div class="clearfix">



                        <div class="content-column col-md-12 col-sm-12 col-xs-12">
                            <div class="inner">
                                <div class="title">
                                    <h3><a href="agent-single.html">{{__('messages.Guides et conseils immobiliers')}}</a></h3>

                                </div>
                                <div class="desc-text">{{__('messages.Découvrez tous nos conseils pratiques pour bien préparer votre projet immobilier.')}} @<a href="#contact">{{__('messages.Contactez-nous')}}</a></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>





        </div>


    </div>
</section>


<!--Property Listing-->
<section class="property-listing" id="annonces">
    <div class="auto-container">
        <div class="mixitup-gallery">
            <!--Heading-->
            <div class="sec-title centered">
                <h2>{{ __('messages.Nos annonces')}}</h2>
            </div>

            <!--Filter-->
            <div class="filters gallery-filters">
                <ul class="filter-tabs filter-btns clearfix">
                    <li class="active filter" data-role="button" data-filter="all">{{__('messages.Tous')}}</li>
                    <li class="active filter" data-role="button" data-filter=".for-sell">{{__('messages.Vente')}}</li>
                    <li class="filter" data-role="button" data-filter=".for-rent">{{__('messages.Location')}}</li>
                </ul>
            </div>

            <div class="filter-list row clearfix">

                <!--Default Property Box-->
                @foreach($location as $l)
                <div class="default-property-box mix all for-rent col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="property-details.html"><img
                                        src='{{URL::asset("img/m/$l->image")}}' alt=""></a></figure>
                            <div class="property-price">{{ $l->prix }} TND / {{ $l->louerpar }}</div>
                        </div>
                        <div class="lower-content">

                            <div class="property-meta">
                                <ul class="clearfix">
                                    <!-- <li><span class="icon fa fa-user"></span> Kelium Smith</li> -->
                                    <li><span class="icon fa fa-calendar"></span>{{ $l->date }}</li>

                                </ul>
                            </div>
                            <!-- <div class="rating-review">
                                    <div class="ratings"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></div>
                                    <div class="rev">(105 reviews)</div>
                                </div> -->
                            <div class="property-title">
                                <h3><a href="property-details.html">{{ $l->nom }}</a></h3>
                                <div class="location"><span class="fa fa-map-marker"></span>&nbsp; {{ $l->lieu }}</div>
                            </div>
                            <div class="prop-info clearfix">
                                <div class="prop-for"><span class="for">à louer</span><span
                                        class="area">{{ $l->superficie }} m².</span></div>
                                <div class="link-box"><a href="{{ url('/détail',$l->id) }}" class="theme-btn">{{__('messages.Voir détail')}} <span class="fa fa-angle-right"></span></a></div>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach

                <!--Default Property Box-->
                @foreach($vente as $v)
                <div class="default-property-box mix all for-sell col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="property-details.html"><img
                                        src='{{URL::asset("img/m/$v->image")}}' alt=""></a></figure>
                            <div class="property-price">{{ $v->prix }} TND</div>
                        </div>
                        <div class="lower-content">

                            <div class="property-meta">
                                <ul class="clearfix">
                                    <!-- <li><span class="icon fa fa-user"></span> Kelium Smith</li> -->
                                    <li><span class="icon fa fa-calendar"></span>{{ $v->date }}</li>

                                </ul>
                            </div>
                            <!-- <div class="rating-review">
                                    <div class="ratings"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></div>
                                    <div class="rev">(105 reviews)</div>
                                </div> -->
                            <div class="property-title">
                                <h3><a href="property-details.html">{{ $v->nom }}</a></h3>
                                <div class="location"><span class="fa fa-map-marker"></span>&nbsp; {{ $v->lieu }}</div>
                            </div>
                            <div class="prop-info clearfix">
                                <div class="prop-for"><span class="for">à vendre</span><span
                                        class="area">{{ $v->superficie }} m².</span></div>
                                <div class="link-box"><a href="{{ url('/détail',$v->id) }}" class="theme-btn">{{__('messages.Voir détail')}} <span class="fa fa-angle-right"></span></a></div>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach




            </div>
        </div>
        <div class="view-all"><a href="{{ url('/annonces') }}" class="theme-btn btn-style-two">{{__('messages.Tous les annonces')}}</a>
        </div>

    </div>
</section>







<!--Team Section-->
<section class="team-section">
    	<div class="auto-container">
        	<!--Heading-->
            <div class="sec-title centered">
                <h2>{{__('messages.Nos agents')}}</h2>
            </div>
            
            <div class="row clearfix">
            	<!--Team Member-->
                <div class="team-member col-md-6 col-sm-6 col-xs-12">
                	<div class="inner-box">
                    	<div class="clearfix">
                        	<!--Image Column-->
                            <div class="image-column col-md-5 col-sm-12 col-xs-12">
                            	<figure class="image"><a href="agent-single.html"><img src="{{URL::asset('vitrine/images/resource/team-image-3.jpg')}}" alt=""></a></figure>
                            </div>
                            <!--Content Column-->
                            <div class="content-column col-md-7 col-sm-12 col-xs-12">
                            	<div class="inner">
                                	<div class="title">
                                    	<h3><a href="agent-single.html">Miraz Kadri</a></h3>
                                        <div class="designation">Company Agent @<a href="#">Reki Housing</a></div>
                                    </div>
                                    <div class="desc-text">Duis aute irure dolor in voccaecat reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla.</div>
                                    <div class="social-links">
                                    	<ul class="clearfix">
                                        	<li><a href="#"><span class="fa fa-facebook-f"></span></a></li>
                                            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                            <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                                            <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--Team Member-->
                <div class="team-member col-md-6 col-sm-6 col-xs-12">
                	<div class="inner-box">
                    	<div class="clearfix">
                        	<!--Image Column-->
                            <div class="image-column col-md-5 col-sm-12 col-xs-12">
                            	<figure class="image"><a href="agent-single.html"><img src="{{URL::asset('vitrine/images/resource/team-image-2.jpg')}}" alt=""></a></figure>
                            </div>
                            <!--Content Column-->
                            <div class="content-column col-md-7 col-sm-12 col-xs-12">
                            	<div class="inner">
                                	<div class="title">
                                    	<h3><a href="agent-single.html">Miraz Kadri</a></h3>
                                        <div class="designation">Company Agent @<a href="#">Reki Housing</a></div>
                                    </div>
                                    <div class="desc-text">Duis aute irure dolor in voccaecat reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla.</div>
                                    <div class="social-links">
                                    	<ul class="clearfix">
                                        	<li><a href="#"><span class="fa fa-facebook-f"></span></a></li>
                                            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                            <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                                            <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
            </div>
            
            
            
        </div>
    </section>










<!--NewsLetter Section-->
<section class="newsletter-section with-negative-margin" id="contact">
    <div class="auto-container">
        <div class="outer-box">
            <!--Heading-->
            <div class="sec-title centered">
                <h2>{{__('messages.Contact')}}</h2>
            </div>

            <!--Newsletter Style One-->
            <div class="newsletter-style-one">
                <div class="desc-text">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia est
                    deserunt mollit anim laborum. Sed perspiciatis unde omnis iste natus.</div>

                <div class="default-form">
                    <form method="post" action="{{ url('/ajouter_contact')}}">
                        {{ csrf_field()}}





                        <!--Add Property Location-->
                        <div class="add-property-location">
                            <div class="auto-container">

                                <div class="row clearfix">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label"></div>
                                        <input type="text" name="nom" value="" placeholder="{{__('messages.Nom & Prénom') }}" required>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label"></div>
                                        <input type="text" name="tel" value="" placeholder="{{__('messages.Numéro de téléphone')}}"
                                            required>
                                    </div>

                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label"></div>
                                        <textarea name="msg" placeholder="" required>...</textarea>
                                    </div>
                                    <input type="hidden" name="ref" value="0000">

                                    <input type="hidden" name="id_article" value="0">
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label"></div>

                                    </div>

                                    <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                    </div>

                                    <div class="form-group col-md-4 col-sm-12 col-xs-12">

                                        <button type="submit" class="theme-btn btn-style-one">{{__('messages.Envoyer')}}</button>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="jquery-3.3.1.min.js"></script>
<script>
    $("#obj").change(function () {
        obj = $("#obj").val();
        console.log(obj);
        if (obj == "location") {
            $("#tb").hide();
        }else{
            $("#tb").show();
        }
        

    });

</script>
@endsection
