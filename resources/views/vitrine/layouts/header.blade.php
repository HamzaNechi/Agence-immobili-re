<header class="main-header">
        
        <div class="main-box">
            <div class="outer-container clearfix">
                
                <!--Logo Box-->
                <div class="logo-box">
                    <div class="logo"><a href="{{ url('/') }}" title="Jood immobilier"><img src="{{URL::asset('vitrine/images/logotest.png')}}" alt="Lirive" title="Lirive"></a></div>
                </div>
                <?php $current = Request::route()->getName(); ?>
                <!--Other Links-->
                <div class="other-links clearfix">
                    @if($current == "/")
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <div class="link-box"><a href="{{ LaravelLocalization::getLocalizedURL($localeCode,null, [], true)}}">{{ $properties['native']}}</a></div>
                    @endforeach
                    @endif
                    <div class="link-box"><a class="add-property-btn theme-btn" href="{{ url('/ajouter_annonces') }}">{{__('messages.Publier votre annonce')}}</a></div>
                </div>
                
                <!--Nav Outer-->
                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->    	
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                        </div>
                        
                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                @if($current == "/")
                                <li class="current"><a href="#">{{ __('messages.Accueil')}}</a>
                                    
                                </li>
                                <li><a href="#about">{{ __('messages.À propos')}}</a>
                                    
                                </li>
                                <li><a href="#service">{{ __('messages.Services')}}</a>
                                    
                                </li>
                                <li><a href="{{ url('/annonces')}}">{{ __('messages.Annonces')}}</a>
                                    
                                </li>
                                <li><a href="#contact">{{ __('messages.Contact')}}</a></li>
                                @else
                                <li><a href="{{ url('/')}}">Accueil</a>
                                    
                                </li>
                                <li><a href="{{ url('/')}}#about">À propos</a>
                                    
                                </li>
                                <li><a href="{{ url('/')}}#service">Services</a>
                                    
                                </li>
                                <li class="current"><a href="{{ url('/annonces')}}">Annonces</a>
                                    
                                </li>
                                <li><a href="{{ url('/')}}#contact">Contact</a></li>
                                @endif
                             </ul>
                        </div>
                    </nav><!-- Main Menu End-->
                    
                </div>
                <!--Nav Outer End-->
                
            </div>
        </div>
    
    </header>