<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>Atito, 1er site ivoirien de location de salles</title>
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <!--=============== css  ===============-->	
        <link type="text/css" rel="stylesheet" href="/css/plugins.css">
        <link type="text/css" rel="stylesheet" href="/css/style.css">
        <link type="text/css" rel="stylesheet" href="/css/color.css">
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="/images/icone.png">
        
    </head>
    <body>
        <!--loader-->
        <div class="loader-wrap">
            <div class="loader-inner">
                <svg>
                    <defs>
                        <filter id="goo">
                            <fegaussianblur in="SourceGraphic" stdDeviation="2" result="blur" />
                            <fecolormatrix in="blur"   values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 5 -2" result="gooey" />
                            <fecomposite in="SourceGraphic" in2="gooey" operator="atop"/>
                        </filter>
                    </defs>
                </svg>
            </div>
        </div>
        <!--loader end-->
        <!-- main -->
        <div id="main">
            <!-- header -->
            <header class="main-header">
                <!--  logo  -->
                <div class="logo-holder"><a href="/"><img src="/images/logo-atito.png" alt=""></a></div>
                <!-- logo end  -->
                <!-- nav-button-wrap--> 
                <div class="nav-button-wrap color-bg nvminit">
                    <div class="nav-button">
                        <span></span><span></span><span></span>
                    </div>
                </div>
                <!-- nav-button-wrap end-->	
                <!-- header-search button  -->
                <!-- <div class="header-search-button">
                    <i class="fal fa-search"></i>
                    <span>Search...</span>
                </div> -->
                <!-- header-search button end  -->
                <!--  add new  btn -->
                @if(auth()->user())
                <div class="add-list_wrap">
                    <a href="#" class="add-list color-bg" style="background-color: white;color: black;border: 1px solid;padding: 0px 3px;">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <i onclick="event.preventDefault(); document.querySelector('#logout-form').submit();" class="far fa-power-off" style="margin: 0;"></i>
                    </a>
                </div>
                <div class="add-list_wrap">
                    <a href="/user-dashboard-add-annonce" class="add-list color-bg"><i class="fal fa-plus"></i> <span>Ajouter une annnonce</span></a>
                </div>
                <div class="add-list_wrap">
                    <a href="/user-dashboard-profil" class="add-list color-bg" style="background-color: white;color: black;border: 1px solid;">
                        <i class="far fa-user"></i>
                        <span>{{auth()->user()->name}}</span>
                    </a>
                </div>
                @else
                <div class="show-reg-form modal-open" style="border-left: none;">
                    <a class="add-list color-bg"><i class="fal fa-plus"></i> <span>Ajouter une annnonce</span></a>
                </div>
                <div class="show-reg-form modal-open"><i class="fas fa-user"></i><span>Connexion</span></div>
                @endif
                <!--  add new  btn end -->
                <!--  header-opt_btn -->
                
                <!--  header-opt_btn end -->
                <!--  cart-btn   -->
                
                <!--  cart-btn end -->
                <!--  login btn -->
                
                <!--  login btn  end -->
                <!--  navigation --> 
                <div class="nav-holder main-menu">
                    <nav>
                        <ul class="no-list-style">
                            <li>
                                <a href="/" class="act-link">Accueil</a>
                                <!--second level -->   
                                
                            </li>
                            <li>
                                <a href="/recherche/promotions">Promotions </a>
                                
                            </li>
                            <li>
                                <a href="/nouvelles/annonces">Nouveautés</a>

                            </li>

                            <li>
                                <a href="/voir/bureauxcowork">Bureaux & Coworking</a>

                            </li>
                            
                            
                        </ul>
                    </nav>
                </div>
                <!-- navigation  end -->
                <!-- header-search-wrapper -->
                <!-- <div class="header-search-wrapper novis_search">
                    <div class="header-serach-menu">
                        <div class="custom-switcher fl-wrap">
                            <div class="fieldset fl-wrap">
                                <input type="radio" name="duration-1"  id="buy_sw" class="tariff-toggle" checked>
                                <label for="buy_sw">Buy</label>
                                <input type="radio" name="duration-1" class="tariff-toggle"  id="rent_sw">
                                <label for="rent_sw" class="lss_lb">Rent</label>
                                <span class="switch color-bg"></span>
                            </div>
                        </div>
                    </div>
                    <div class="custom-form">
                        <form method="post"  name="registerform" action="/recherche/annonce">
                            @csrf
                            <label>Keywords </label>
                            <input type="text" placeholder="Address , Street , State..." value=""/>
                            <label >Categories</label>
                            <select data-placeholder="Categories" class="chosen-select on-radius no-search-select" >
                                <option>All Categories</option>
                                <option>House</option>
                                <option>Apartment</option>
                                <option>Hotel</option>
                                <option>Villa</option>
                                <option>Office</option>
                            </select>
                            <label style="margin-top:10px;" >Price Range</label>
                            <div class="price-rage-item fl-wrap">
                                <input type="text" class="price-range" data-min="100" data-max="100000"  name="price-range1"  data-step="1" value="1" data-prefix="$">
                            </div>
                            <button onclick="location.href='listing.html'" type="button"  class="btn float-btn color-bg"><i class="fal fa-search"></i> Search</button>
                        </form>
                    </div>
                </div> -->
                <!-- header-search-wrapper end  -->				
                <!-- wishlist-wrap--> 
                
                <!--wishlist-wrap end -->                            
                <!--header-opt-modal-->  
                
                <!--header-opt-modal end -->  
            </header>
            <!-- header end  -->	
            <!-- wrapper  -->	
            <div id="wrapper">
                <!-- content -->	
                <div class="content">
                    <!--  section  -->
                    <section class="hero-section gray-bg">
                        <div class="bg-wrap">
                            <div class="half-hero-bg-media full-height">
                                <div class="slider-progress-bar">
                                    <span>
                                        <svg class="circ" width="30" height="30">
                                            <circle class="circ2" cx="15" cy="15" r="13" stroke="rgba(255,255,255,0.4)" stroke-width="1" fill="none"/>
                                            <circle class="circ1" cx="15" cy="15" r="13" stroke="#fff" stroke-width="2" fill="none"/>
                                        </svg>
                                    </span>
                                </div>
                                <div class="slideshow-container" >
                                    <!-- slideshow-item -->
                                   <div class="slideshow-item">
                                        <div class="bg"  data-bg="images/bg/highlight1.jpg"></div>
                                    </div>
                                    <!--  slideshow-item end  -->
                                    <!-- slideshow-item -->
                                   <div class="slideshow-item">
                                        <div class="bg"  data-bg="images/bg/highlight2.jpg"></div>
                                    </div>
                                    <!--  slideshow-item end  -->
                                    <!-- slideshow-item -->
                                    <div class="slideshow-item">
                                        <div class="bg"  data-bg="images/bg/highlight3.jpg"></div>
                                    </div>
                                    <!--  slideshow-item end  -->
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="hero-title hero-title_small">
                                <h4>Le Repertoire evenementiel</h4>
                                <h2>Trouver une salle pour votre &eacute;v&egrave;nement<br>
                                Utiliser notre portail</h2>
                                
                            </div>
                            <form id="searchFormer" action="/recherche/salles" method="get">
                                @csrf
                                <div class="main-search-input-wrap shadow_msiw">
                                    <div class="main-search-input fl-wrap">
                                        <div class="main-search-input-item">
                                            <select name="typesalle" data-placeholder="Tous types de salles"  class="chosen-select" >
                                                <option value="0">Tous types de salles</option>
                                                @foreach(App\Models\TypeSalle::get() as $typesalle)
                                                <option value="{{ $typesalle->libelle }}">{{ $typesalle->libelle }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="main-search-input-item">
                                            <select name="ville" data-placeholder="Tous les villes"  class="chosen-select" >
                                                    <option value="0">Tous les villes</option>
                                                    @foreach(App\Models\Ville::get() as $villeIt)
                                                    <option value="{{ $villeIt->nom_ville }}">{{ $villeIt->nom_ville }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                        <button class="main-search-button color-bg" >  Recherche <i class="far fa-search"></i> </button>
                                    </div>
                                </div>
                            </form>
                            <div class="hero-notifer fl-wrap">Voulez-vous plus d'options? <div class="show-reg-form modal-open" data-modalid="recherche-plus" data-backmodalid="back-recherche-plus" data-overmodalid="over-recherche-plus" style="border-left: none;padding: 0;display: contents;"> <a data-modalid="recherche-plus" data-backmodalid="back-recherche-plus" data-overmodalid="over-recherche-plus">Recherche Avancée</a> </div> </div>
                            <!--<div class="scroll-down-wrap">
                                <div class="mousey">
                                    onclick="(function(){document.querySelector('#searchFormer').submit()})();"
                                    <div class="scroller"></div>
                                </div>
                                <span>Scroll Down To Discover</span>
                            </div>-->
                        </div>
                    </section>
                    <!--  section  end-->
                    <!-- breadcrumbs-->
                    <div class="breadcrumbs fw-breadcrumbs sp-brd fl-wrap">
                        <div class="container">
                            <div class="breadcrumbs-list">
                                <a href="#">Accueil</a>  <span>Bienvenue</span>
                            </div>
                            <div class="share-holder hid-share">
                                <a href="#" class="share-btn showshare sfcs">  <i class="fas fa-share-alt"></i>  Partager   </a>
                                <div class="share-container  isShare"></div>
                            </div>
                        </div>
                    </div>
                    <!-- breadcrumbs end -->
                    <!-- section -->
                    <section class="gray-bg small-padding">
                        <div class="container">

                            @php
                            
                                //$salles = App\Models\Salle::with("typeSalles")->promote()->get();
                                $typeSalles = App\Models\TypeSalle::where(function($query) {
                                        $query->where("libelle", "like", "%séminaire%")
                                            ->orWhere("libelle", "like", "%mariage%")
                                            ->orWhere("libelle", "like", "%cowork%");
                                    })->with("salles")->get();
                                //dd($salles->count());
                            @endphp

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="section-title fl-wrap">
                                        <h4>Nos meilleures offres</h4>
                                        <h2>Nos suggestions</h2>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="listing-filters gallery-filters">
                                        @foreach($typeSalles as $typeSalle)
                                        @php if($loop->index == 0) $typFirst = sizeof(explode(' ', $typeSalle->libelle)) > 1?explode(' ', $typeSalle->libelle)[sizeof(explode(' ', $typeSalle->libelle))-1]:explode(' ', $typeSalle->libelle)[0]; @endphp
                                        <a href="#" class="gallery-filter {{ $loop->index == 0?'gallery-filter-active':'' }}" data-filter=".{{sizeof(explode(' ', $typeSalle->libelle)) > 1?explode(' ', $typeSalle->libelle)[sizeof(explode(' ', $typeSalle->libelle))-1]:explode(' ', $typeSalle->libelle)[0]}}"> <span>{{$typeSalle->libelle}}</span></a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <!-- grid-item-holder-->	
                            <div class="grid-item-holder gallery-items gisp fl-wrap">
                                
                                
                                <!-- gallery-item-->
                                @foreach($typeSalles as $typSalle)

                                    @foreach($typSalle->salles()->promote()->limit(3)->get() as $salle)
                                        @php $currentCat = sizeof(explode(' ', $typSalle->libelle)) > 1?explode(' ', $typSalle->libelle)[sizeof(explode(' ', $typSalle->libelle))-1]:explode(' ', $typSalle->libelle)[0]; @endphp
                                        <div class="gallery-item {{ $currentCat }} {{ $typFirst != $currentCat?'hid-input':'' }}" >
                                            <!-- listing-item -->
                                            <div class="listing-item">
                                                <article class="geodir-category-listing fl-wrap">
                                                    <div class="geodir-category-img fl-wrap">
                                                        <a href="/voir/detail/{{$salle->id}}/annonce" class="geodir-category-img_item">
                                                            <img src="{{asset('storage/'.str_replace('public/', '', $salle->photo))}}" alt="image type de salle" style="height: 250px;width: 390px;">
                                                            <div class="overlay"></div>
                                                        </a>
                                                        <div class="geodir-category-location">
                                                        <a href="/voir/detail/{{$salle->id}}/annonce" class="single-map-item tolt" data-newlatitude="40.72956781" data-newlongitude="-73.99726866"   data-microtip-position="top-left" data-tooltip="Localisation">
                                                            @if($salle->commune) <i class="fas fa-map-marker-alt fontawe-icon-size"></i> @endif <span>{{ optional($salle->commune)->nom_commune??'' }}</span>
                                                            @if($salle->ville) <i class="far fa-angle-right fontawe-icon-size"></i> @endif <span>{{ optional($salle->ville)->nom_ville }}</span>
                                                        </a>
                                                        </div>
                                                        <ul class="list-single-opt_header_cat">
                                                            @forelse($salle->typeSalles as $typeSalleId)
                                                            <li><a href="#" class="cat-opt blue-bg">{{$typeSalleId->libelle}}</a></li>
                                                            @php if($loop->first) break; @endphp
                                                            @empty
                                                            <li>N/A</li>
                                                            @endforelse
                                                        </ul>
                                                    
                                                        <div class="geodir-category-listing_media-list">
                                                            <span><i class="fas fa-camera"></i> {{ $salle->photosSalles->count() }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="geodir-category-content fl-wrap">
                                                        <h3 class="title-sin_item"><a href="/voir/detail/{{$salle->id}}/annonce">{{$salle->nom_salle}}</a></h3>
                                                        
                                                        <p>{{$salle->presentation_salle}}</p>
                                                        
                                                        
                                                    </div>
                                                </article>
                                            </div>
                                            <!-- listing-item end-->															
                                        </div>
                                    
                                    @endforeach

                                @endforeach
                               
                                
                                <!-- gallery-item end-->
                                <!-- gallery-item-->
                                <!--<div class="gallery-item for_sale">
                                    
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img fl-wrap">
                                                <a href="listing-single.html" class="geodir-category-img_item">
                                                    <img src="fichiers/Room_3_800_530.jpg" alt="">
                                                    <div class="overlay"></div>
                                                </a>
                                                <div class="geodir-category-location">
                                                    <a href="#" class="single-map-item tolt" data-newlatitude="40.88496706" data-newlongitude="-73.88191222" data-microtip-position="top-left" data-tooltip="Adresse de l'annonce"><i class="fas fa-map-marker-alt"></i> <span>  40 Journal Square  , NJ, USA</span></a>												
                                                </div>
                                                <ul class="list-single-opt_header_cat">
                                                    <li><a href="#" class="cat-opt color-bg">Salle de Mariage</a></li>
                                                </ul>
                                               
                                                <div class="geodir-category-listing_media-list">
                                                    <span><i class="fas fa-camera"></i> 47</span>
                                                </div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap">
                                                <h3 class="title-sin_item"><a href="listing-single.html">Luxury Family Home</a></h3>
                                                <div class="geodir-category-content_price">$ 320,000</div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla.</p>
                                                
                                                
                                            </div>
                                        </article>
                                    </div>
                                    															
                                </div>-->
                                <!-- gallery-item end-->																
                                
                                <!--<div class="gallery-item for_rent">
                                    
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img fl-wrap">
                                                <a href="listing-single.html" class="geodir-category-img_item">
                                                    <img src="fichiers/Room_800_530.jpg" alt="">
                                                    <div class="overlay"></div>
                                                </a>
                                                <div class="geodir-category-location">
                                                    <a href="#" class="single-map-item tolt" data-newlatitude="40.94982541" data-newlongitude="-73.84357452" data-microtip-position="top-left" data-tooltip="Adresse de l'annonce"><i class="fas fa-map-marker-alt"></i> <span> 34-42 Montgomery St , NY, USA</span></a>													
                                                </div>
                                                <ul class="list-single-opt_header_cat">
                                                    <li><a href="#" class="cat-opt color-bg">House</a></li>
                                                </ul>
                                                
                                                <div class="geodir-category-listing_media-list">
                                                    <span><i class="fas fa-camera"></i> 4</span>
                                                </div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap">
                                                <h3 class="title-sin_item"><a href="listing-single.html">Family House for Rent</a></h3>
                                                <div class="geodir-category-content_price">$ 700 / per month</div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla.</p>
                                                
                                                
                                            </div>
                                        </article>
                                    </div>
                                  																			
                                </div>-->
                                <!-- gallery-item end-->															
                                <!-- gallery-item-->
                                
                                <!-- gallery-item end-->															
                                <!-- gallery-item-->
                                
                                <!-- gallery-item end-->															
                                <!-- gallery-item-->
                                
                                <!-- gallery-item end-->																
                            </div>
                            <!-- grid-item-holder-->	
                            <!--<a href="listing.html" class="btn float-btn small-btn color-bg">View All Properties</a>-->
                        </div>
                    </section>
                    <!-- section end-->	
                    <!-- section -->
                    <section>
                        <div class="container">
                            <!--about-wrap -->
                            <div class="about-wrap">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="about-title ab-hero fl-wrap">
                                            <h2>Comment &ccedil;a marche? </h2>
                                            <h4>Trouver une salle en Trois &eacute;tapes</h4>
                                        </div>
                                        <div class="services-opions fl-wrap">
                                            <ul>
                                                <li>
                                                    <i class="far fa-search-location"></i>
                                                    <h4>Recherchez le lieu idéal  </h4>
                                                    <p>Faites votre recherche d'espace en renseignant le type type événement, le lieu, le nombre de personnes... etc</p>
                                                </li>
                                                <li>
                                                    <i class="fas fa-users"></i>
                                                    <h4>Echangez et réservez avec l'annonceur</h4>
                                                    <p>Par mail, appel ou whatsapp, discuter et finaliser la réservation de la salle avec l’annonceur.</p>
                                                </li>
                                                <li>
                                                    <i class="far fa-glass-cheers"></i>
                                                    <h4>Vous êtes prêt !</h4>
                                                    <p>Célébrez votre événement en toute sérénité</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                    
                                    @php
                                        $texts = App\Models\TexteJour::get();
                                    @endphp
                                    
                                    @foreach( $texts as $text )
                                        <div class="col-md-6">
                                            <div class="about-img fl-wrap">
                                                <img src="{{asset('storage/'.str_replace('public/', '', $text->photo))}}" class="respimg" alt="">
                                                <div class="about-img-hotifer color-bg">
                                                    <p>{{$text->texte}}</p>
                                                    <h4>{{$text->libelle}}</h4>
                                                    <h5>{{$text->fonction_texte}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                        @php if($loop->index == 0) break; @endphp
                                    @endforeach   
                                </div>
                            </div>
                            <!-- about-wrap end  -->							
                        </div>
                    </section>
                    <!-- section end-->	
                    <section class="hidden-section no-padding-section">
                        <div class="half-carousel-wrap">
                            <div class="half-carousel-title color-bg">
                                <div class="half-carousel-title-item fl-wrap">
                                    <h2>Quelles salles recherchez-vous?</h2>
                                    <h5>Pour chaque &eacute;v&egrave;nement, une salle.</h5>
                                </div>
                                <div class="pwh_bg"></div>
                            </div>
                            <div class="half-carousel-conatiner">
                            
                                <div class="half-carousel fl-wrap full-height">
                                    @php

                                        $typeSalles = App\Models\TypeSalle::get();

                                    @endphp

                                  
                                    <!--slick-item -->
                                    @foreach($typeSalles as $typeSalle)
                                    <div class="slick-item">
                                        <div class="half-carousel-item fl-wrap">
                                            <div class="bg-wrap bg-parallax-wrap-gradien" onclick="window.location.href = '/recherche/salles?typesalle={{$typeSalle->libelle}}'" >
                                                <div class="bg"  data-bg="{{asset('storage/'.str_replace('public/', '', $typeSalle->photo))}}"></div>
                                            </div>
                                            <div class="half-carousel-content">
                                                <div class="hc-counter color-bg">{{ sizeof($typeSalles)>0?$typeSalle->count:"0" }} Annonce Espaces enregistr&aacute;s</div>
                                                <h3><a href="/recherche/salles?typesalle={{$typeSalle->libelle}}">{{ $typeSalle->libelle }}</a></h3>
                                                <p>{{ $typeSalle->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach									
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--section end-->  					
                    <!-- section -->
                    
                    <!-- section end-->					
                    <!-- section -->
                    
                    <!-- section end-->	 
                    <!-- section -->
                    <section class="gray-bg" style="padding: 10px 0;">
                        
                        <div class="clearfix"></div>
                        <div class="testimonials-slider-wrap">
                            
                        </div>
                    </section>
                    <!-- section end-->
                    <section class="gray-bg small-padding" style="padding: 10px 0;">
                    <div class="container">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="section-title fl-wrap" style="margin-bottom: 0px;">
                                    <!-- <h4>Nos meilleures offres</h4> -->
                                    <h2>Dernières annonces</h2>
                                </div>
                            </div>
                            <div class="col-md-8">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <!-- grid-item-holder-->	
                        <div class="listing-item-container three-columns-grid  box-list_ic fl-wrap">
                            <!-- listing-item -->
                            @forelse(App\Models\Salle::latest()->get()->take(3) as $annonce)

                            <div class="listing-item">
                                <article class="geodir-category-listing fl-wrap">
                                    <div class="geodir-category-img fl-wrap">
                                        <a href="/voir/detail/{{$annonce->id}}/annonce" class="geodir-category-img_item">
                                            <img src="{{ asset('storage/'.str_replace('public/', '', $annonce->photo)) }}" alt="image de salle" style="width: 392px; height:259px; " />
                                            <div class="overlay"></div>
                                        </a>
                                        <div class="geodir-category-location">
                                            <a href="#" class="single-map-item tolt" data-microtip-position="top-left" data-tooltip="Adresse de l'annonce">
                                                @if($annonce->commune) <i class="fas fa-map-marker-alt fontawe-icon-size"></i> @endif <span>{{ optional($annonce->commune)->nom_commune??'' }}</span>
                                                @if($annonce->ville) <i class="far fa-angle-right fontawe-icon-size"></i> @endif <span>{{ optional($annonce->ville)->nom_ville }}</span>
                                            </a>
                                        </div>
                                        <ul class="list-single-opt_header_cat">
                                            @forelse($annonce->typeSalles as $typeSalleId)
                                            <li><a href="#" class="cat-opt blue-bg">{{$typeSalleId->libelle}}</a></li>
                                            @php if($loop->first) break; @endphp
                                            @empty
                                            <li>N/A</li>
                                            @endforelse
                                        </ul>
                                        <div class="geodir-category-listing_media-list">
                                            <span><i class="fas fa-camera"></i> {{ $annonce->photosSalles->count() }} </span>
                                        </div>
                                    </div>
                                    <div class="geodir-category-content fl-wrap">
                                        <h3 class="title-sin_item"><a href="/voir/detail/{{$annonce->id}}/annonce">{{$annonce->nom_salle}}</a></h3>
                                        <p>{{substr($annonce->presentation_salle, 0, 150)}}</p>
                                        
                                        <div class="geodir-category-footer fl-wrap">
                                            <?php

                                            $compte = optional($annonce->comptes())->with('user')->first() ?? null;
                                            $user = optional($compte)->user ?? null;

                                            ?>
                                            <a href="/voir/detail/{{optional($compte)->id}}/utilisateur" class="gcf-company make-space-between-item"><img src="{{asset('storage/'.str_replace('public/', '', optional($compte)->photo??'' ))}}" alt=""> <span class="modal-open" onclick="document.querySelector('#hid_compte_id').value = {{optional($compte)->id??null}};" data-modalid="message-box" data-backmodalid="back-message-box" data-overmodalid="over-message-box"> <i class="fas fa-mailbox fontawe-icon-size"></i> Envoyer un message</span> </a> 

                                        </div>
                                    </div>
                                </article>
                            </div>
                            @empty
                            <h1>AUCUNE ANNONNCE DE DISPONIBLE !!</h1>
                            @endforelse
                            <!-- listing-item end-->
                        </div>
                        <!-- grid-item-holder-->	
                        <!--<a href="listing.html" class="btn float-btn small-btn color-bg">View All Properties</a>-->
                    </div>
                </section>
                <!-- section end-->	
                </div>
                <!-- content end -->
                
                <!-- subscribe-wrap -->	
                @include("layouts.footer")
            <!--map-modal end --> 			
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script src="/js/jquery.min.js"></script>
        <script src="/js/jquery.chained.min.js"></script>
        <script src="/js/jquery.chained.remote.js"></script>
        <!-- <script src="/js/owl.carousel.js"></script> -->
        <script src="/js/plugins.js"></script>
        <script src="/js/scripts.js"></script>
<!--       <script src="https://maps.googleapis.com/maps/api/js?key=YOU_API_KEY_HERE&libraries=places"></script>
-->      
        <script>
            $(document).ready(function() {
                $("#selcommune").chained("#selville");
                $("#selquartier").chained("#selcommune");

                $("#seltypesalle").remoteChained({
                    parents : "#selquartier",
                    url : "/api/typesalle"
                });
            });
            
        </script>

        <script>
            $(document).ready(function(){
                $("div.listing-filters.gallery-filters > a.gallery-filter").on("click", function(event){
                    $("div.grid-item-holder.gallery-items > div.gallery-item").removeClass("hid-input");
                })
            })
        </script>
    </body>
</html>