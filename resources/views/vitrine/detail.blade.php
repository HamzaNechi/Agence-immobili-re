@extends('layouts.app2')
@section('content')
<!--Inner Page Banner-->
<section class="inner-page-banner style-two" style="background-image:url({{ asset('vitrine/images/background/bg-page-title.jpg')}});">
        <div class="auto-container">
        </div>
    </section>
    
    
    <!--Sidebar Page-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
				
                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <!--Property DEtails-->
                    <section class="property-details">
                    	<div class="prop-header">
                        	<h3>{{ $article->nom }}<span class="prop-label">{{ $article->objectif }}</span></h3>
                            <div class="info clearfix">
                            	<div class="location"><span class="fa fa-map-marker"></span>&ensp; {{ $article->lieu }}.</div>
                            </div>
                        </div>
                        
                        <!--Product Carousel-->
                        <div class="product-carousel-outer">
                            
                            <!--Product image Carousel-->
                            <ul class="prod-image-carousel owl-theme owl-carousel">
                                <li><figure class="image"><a class="lightbox-image option-btn" data-fancybox-group="example-gallery" href='{{URL::asset("img/l/$article->image")}}' title="Image Title Here"><img src='{{URL::asset("img/m/$article->image")}}' alt=""></a></figure></li>
                                @foreach($ImageSimilaire as $is)
                                <li><figure class="image"><a class="lightbox-image option-btn" data-fancybox-group="example-gallery" href='{{URL::asset("img/l/$article->image")}}' title="Image Title Here"><img src='{{URL::asset("img/m/$is->image")}}' alt=""></a></figure></li>
                                @endforeach
                            </ul>
                            
                            <!--Product Thumbs Carousel-->
                            <div class="prod-thumbs-carousel owl-theme owl-carousel">
                                @foreach($ImageSimilaire as $is)
                                <div class="thumb-item"><figure class="thumb-box"><img src='{{URL::asset("img/m/$is->image")}}' alt=""></figure></div>
                                @endforeach
                            </div>
                            
                        </div><!--End Product Carousel-->
                        
                        <div class="detail-content">
                            <div class="medium-title"><h3>LA DESCRIPTION</h3></div>
                            <div class="info">
                            	<ul>
                                    @if($article->objectif == "Location")
                                	<li>Prix : &ensp;<span class="price">{{ $article->prix }} TND/{{ $article->louerpar }}</span></li>
                                    @else
                                    <li>Prix : &ensp;<span class="price">{{ $article->prix }} TND</span></li>
                                    @endif
                                    <li>Superficie : &ensp;&ensp;<span class="area">{{ $article->superficie }} m².</span></li>
                                </ul>
                            </div>
                            <div class="text-content">
                            	<p> <?php echo $article->description; ?></p>
                                
                                
                            </div>
                            <!-- <div class="property-specs">
                                <ul class="specs-list">
                                    <li><div class="icon"><span class="flaticon-double-king-size-bed"></span></div> 03 Bedrooms</li>
                                    <li><div class="icon"><span class="flaticon-vintage-bathtub"></span></div> 02 Bathrooms</li>
                                    <li><div class="icon"><span class="flaticon-private-garage"></span></div> 02 Car Parking</li>
                                    <li><div class="icon"><span class="flaticon-copy"></span></div> 1040 sq ft</li>
                                </ul>
                            </div> -->
                            
                            
                        </div>
                        
                    </section>
                </div>
                <!--Content Side-->
                
                <!--Sidebar-->
                <div class="sidebar-side col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <aside class="sidebar">

						<!-- Request Quote Form -->
                        <div class="sidebar-widget request-quote">
                            <div class="widget-inner">
                            	<!-- <div class="agent-info">
                                	<figure class="author-thumb img-circle"><img class="img-circle" src="vitrine/images/resource/author-thumb-5.jpg" alt=""></figure>
                                    <h3>Jhon Thomson</h3>
                                    <div class="designation">Agent in Los Angeles</div>
                                    <div class="phone"><span class="fa fa-phone"></span> (088) 123 456 7898</div>
                                </div> -->
                                <div class="default-form quote-form">
                                	<h4>Contactez-nous</h4>
                                	<form method="post" action="{{ url('/ajouter_contact')}}">
                                    {{ csrf_field()}}
                                    	<div class="form-group">
                                        	<input type="text" name="nom" value="" placeholder="Votre nom & prénom" required >
                                        </div>
                                        <div class="form-group">
                                        	<input type="text" name="tel" value="" placeholder="Numéro de téléphone" required >
                                        </div>
                                        <div class="form-group">
                                        	<textarea name="msg" placeholder="Message" required ></textarea>
                                        </div>
                                        <input type="hidden" name="ref" value="{{ $article->ref }}">
                                        <input type="hidden" name="id_article" value="{{ $article->id }}">
                                        <div class="button-group"><button type="submit" class="theme-btn btn-style-one">Envoyer</button></div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        
                        <!-- Recommended Properties -->
                        <div class="sidebar-widget recommended-properties">
                            <div class="sidebar-title"><h3>RECOMMANDÉ POUR VOUS</h3></div>
                               @foreach($foryou as $fy)
                                <div class="post">
                                    <figure class="post-thumb"><a href="{{ url('/détail',$fy->id) }}"><img src='{{URL::asset("img/s/$fy->image")}}' alt=""></a></figure>
                                    <h4><a href="{{ url('/détail',$fy->id) }}">{{ $fy->nom }}</a></h4>
                                    <ul class="specs clearfix">
                                        <li>{{$fy->superficie}} m²</li>
                                        <li>{{$fy->lieu }}</li>
                                    </ul>
                                    <div class="price">{{$fy->prix }} TND</div>
                                </div>
                               @endforeach

                            

                        </div>

                    </aside>


                </div>
                <!--Sidebar-->

            </div>
        </div>
    </div>
@endsection