@extends('layouts.app2')
@section('content')
    <!--Inner Page Banner-->
    <section class="inner-page-banner" style="background-image:url(vitrine/images/background/bg-page-title.jpg);">
        <div class="auto-container">
            <!-- <h1>Chercher votre bien</h1>
            <div class="text">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</div> -->
            
            <div class="banner-form-box medium">
                <div class="default-form">
                    <form method="get" action="{{ url('/chercherrbien') }}">
                        <div class="row clearfix">
                            <div class="form-group col-md-9 col-sm-8 col-xs-12">
                                <input type="text" name="lieu" value="" placeholder="Entrer un lieu" required>
                            </div>
                            <div class="form-group col-md-3 col-sm-4 col-xs-12">
                                <button type="submit" class="theme-btn btn-style-one">Recherche</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </section>
    
    
    <!--Properties Search Section-->
    <section class="properties-search-section">
    	<div class="auto-container">
        	<div class="row clearfix">
            	<!--Posts Column-->
                <div class="posts-column col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="upper-filters clearfix">
                        <!--Form Column-->
                        <div class="form-column">
                            <div class="default-form">
                                <form method="get" action="{{ url('/trierannonces') }}" id="formsort">
                                	<div class="option-box sort-by">
                                        <div class="sel-label">Trier par</div>
                                        <div class="form-group">
                                            <select class="" name="sort" id="sort">
                                                <option value="par">Trier par</option>
                                                <option value="date">Par date</option>
                                                <option value="prix">Par prix</option>
                                                <option value="superficie">Par superficie</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                </form>
                            </div>
                        </div>
                        <!--Count Column-->
                        <div class="count-column">
                            <div class="count">{{ sizeof($annonces)}} annonces</div>
                        </div>
                        
                    </div>
                    
                    <div class="row clearfix">
                    	<!--Default Property Box-->
                        @foreach($annonces as $row)
                        <div class="default-property-box col-md-6 col-sm-6 col-xs-12">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><a href="property-details.html"><img src='{{URL::asset("img/m/$row->image")}}' alt=""></a></figure>
                                    @if($row->objectif == "Location")
                                    <div class="property-price">{{ $row->prix }} TND / {{ $row->louerpar }}</div>
                                    @else
                                    <div class="property-price">{{ $row->prix }} TND</div>
                                    @endif
                                </div>
                                <div class="lower-content">

                                    <div class="property-meta">
                                        <ul class="clearfix">
                                            
                                            <li><span class="icon fa fa-calendar"></span>{{ $row->date }}</li>
                                            
                                        </ul>
                                    </div>
                                    
                                    <div class="property-title">
                                        <h3><a href="property-details.html">{{ $row->nom }}</a></h3>
                                        <div class="location"><span class="fa fa-map-marker"></span>&nbsp; {{ $row->lieu }}</div>
                                    </div>
                                    <div class="prop-info clearfix">
                                        <div class="prop-for"><span class="for">{{ $row->objectif }}</span><span class="area">{{ $row->superficie }} m².</span></div>
                                        <div class="link-box"><a href="{{ url('/détail',Crypt::encryptString($row->id)) }}" class="theme-btn">Voir détail <span class="fa fa-angle-right"></span></a></div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        
                        
                        
                        
                    </div>
                    
                    <!-- Styled Pagination -->
                    
                    <div class="styled-pagination">
                    {{ $annonces->links('vendor.pagination.front-paginator') }}
                    </div>
                </div>
                
                <!--Search Form Column-->
                <div class="search-form-column col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-box">
                    	<div class="title-header">RECHERCHE AVANCÉE</div>
                        
                        <div class="default-form">
                            <form method="get" action="{{ url('/chercherrapidement') }}">
                            	<div class="row clearfix">
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Type du bien</div>
                                        <select class="custom-select-box" name="type">
                                            @foreach($type as $ty)
                                            <option value="{{ $ty->type }}">{{ $ty->type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="separator"></div>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Objectif</div>
                                        <select class="custom-select-box" name="objectif">
                                            <option>Location</option>
                                            <option>Vente</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="separator"></div>
                                    </div>
                                     <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                       <div class="range-slider-one">
                                            <div class="slider-header">
                                                <div class="clearfix">
                                                    <div class="title">Superficie (m²):</div>
                                                    <input type="hidden" value="{{ $MinSuperficie->superficie }}" id="minsuper">
                                                    <input type="hidden" value="{{ $MaxSuperficie->superficie }}" id="maxsuper">
                                                    <div class="input"><input type="text" class="area-size" name="superficie" readonly></div>
                                                </div>
                                            </div>
                                             
                                            <div class="area-range-slider"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="separator"></div>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="range-slider-one">
                                            <div class="slider-header">
                                                <div class="clearfix">
                                                    <div class="title">Prix (TND):</div>
                                                    <input type="hidden" value="{{ $Minprix->prix }}" id="minprix">
                                                    <input type="hidden" value="{{ $Maxprix->prix }}" id="maxprix">
                                                    <div class="input"><input type="text" class="property-amount" name="prix" readonly></div>
                                                </div>
                                            </div>
                                             
                                            <div class="price-range-slider"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="separator"></div>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Ville</div>
                                        <select class="custom-select-box" name="region">
                                            <option>Nabeul</option>
											<option>Hammamet</option>
											<option>Korba</option>
											<option>Klibya</option>
                                        </select>
                                    </div>
                                    <!-- <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="separator"></div>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Beds</div>
                                        <select class="custom-select-box">
                                            <option>All</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3-5</option>
                                            <option>5-10</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Baths</div>
                                        <select class="custom-select-box">
                                            <option>All</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3-5</option>
                                            <option>5-10</option>
                                        </select>
                                    </div> --> 
                                    <!-- <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="separator"></div>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Additional Features</div>
                                        <div class="check-box">
                                            <input type="checkbox" id="cbox-1">
                                            <label for="cbox-1">Swimming Pool</label>
                                        </div>
                                        <div class="check-box">
                                            <input type="checkbox" id="cbox-2">
                                            <label for="cbox-2">Air Conditioning</label>
                                        </div>
                                        <div class="check-box">
                                            <input type="checkbox" id="cbox-3">
                                            <label for="cbox-3">Laundry Room</label>
                                        </div>
                                        <div class="check-box">
                                            <input type="checkbox" id="cbox-4">
                                            <label for="cbox-4">Gym</label>
                                        </div>
                                        <div class="check-box">
                                            <input type="checkbox" id="cbox-5">
                                            <label for="cbox-5">Central Heating</label>
                                        </div>
                                        <div class="check-box">
                                            <input type="checkbox" id="cbox-6">
                                            <label for="cbox-6">Fire Safty</label>
                                        </div>
                                        <div class="check-box">
                                            <input type="checkbox" id="cbox-7">
                                            <label for="cbox-7">Window Cinvering</label>
                                        </div>
                                        <div class="check-box">
                                            <input type="checkbox" id="cbox-8">
                                            <label for="cbox-8">Alarm</label>
                                        </div>
                                        <div class="check-box">
                                            <input type="checkbox" id="cbox-9">
                                            <label for="cbox-9">Garden</label>
                                        </div>
                                        <div class="check-box">
                                            <input type="checkbox" id="cbox-10">
                                            <label for="cbox-10">Guest House</label>
                                        </div>
                                    </div> -->
                                    
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    	<button type="submit" class="theme-btn btn-style-one">Rechercher rapidement</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    
                    </div>
                </div>
                
        	</div>
        </div>
    </section>


<script>
    $("#sort").change(function(){
        sort=$("#sort").val();
        if(sort != "par"){
            $("#formsort").submit();
        }
        
    });

</script>
    
    
@endsection