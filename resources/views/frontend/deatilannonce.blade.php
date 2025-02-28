<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="ISO-8859-15">
        <title>ATITO</title>
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
                            <fecolormatrix in="blur"  values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 5 -2" result="gooey" />
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
                    <!--  carousel--> 
                    @php
                         $currentSalle = App\Models\Salle::findOrFail($salleid);
                         $onlyphoto = $currentSalle->photosSalles->first();
                    @endphp
                    @if($currentSalle->photosSalles->count() > 0)
                    <div class="list-single-carousel-wrap carousel-wrap fl-wrap" id="sec1">
                        <div class="fw-carousel single-carousel carousel fl-wrap full-height lightgallery">
                                                      
                            <!-- slick-slide-item -->

                            @foreach($currentSalle->photosSalles as $sallephoto)
                            <div class="slick-slide-item">
                                <div class="box-item">
                                    <img  src="{{ asset('storage/'.str_replace('public/', '', $sallephoto->photo)) }}" alt="photos de la salles">
                                    <a style="background: none;" href="{{ asset('storage/'.str_replace('public/', '', $sallephoto->photo)) }}" class="gal-link popup-image popup-corou-info ">
                                        <!-- <i class="far fa-search-plus"  ></i> -->
                                    </a>
                                    
                                </div>
                            </div>
                            @endforeach

                            <div class="slick-slide-item">
                                <div class="box-item">
                                    @if(isset($onlyphoto))
                                    <img  src="{{ asset('storage/'.str_replace('public/', '', $onlyphoto->photo)) }}"   alt="Bella salle">
                                    <a style="background: none;" href="{{ asset('storage/'.str_replace('public/', '', $onlyphoto->photo)) }}" class="gal-link popup-image">
                                        <!-- <i class="fal fa-search"  ></i> -->
                                    </a>
                                    @else
                                    <img  src="/fichiers/Image_haut_accueil.jpg"   alt="Bella salle">
                                    <a style="background: none;" href="/fichiers/Image_haut_accueil.jpg" class="gal-link popup-image">
                                        <!-- <i class="fal fa-search"  ></i> -->
                                    </a>
                                    @endif
                                    <!-- <div class="show-info">
                                        <span><i class="fas fa-info"></i></span>
                                        <div class="tooltip-info">
                                            <h5>Bella salle</h5>
                                            <p>Différentiel de durabilité</p>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <!-- slick-slide-item end -->
                           
                        </div>
                        <div class="swiper-button-prev sw-btn"><i class="fal fa-angle-left"></i></div>
                        <div class="swiper-button-next sw-btn"><i class="fal fa-angle-right"></i></div>
                    </div>
                    @endif
                    <!--  carousel  end-->  
                    <div class="breadcrumbs fw-breadcrumbs smpar fl-wrap">
                        <div class="container">
                            <div class="breadcrumbs-list">
                                <a href="#">Menu</a><a href="#">Détails</a><span>{{$currentSalle->nom_salle}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="gray-bg small-padding fl-wrap">
                        <div class="container">
                            <div class="row">
                                <!--  listing-single content -->
                                <div class="col-md-8">
                                    <div class="list-single-main-wrapper fl-wrap">
                                        <!--  scroll-nav-wrap -->
                                        <div class="scroll-nav-wrap">
                                            <nav class="scroll-nav scroll-init fixed-column_menu-init">
                                                <ul class="no-list-style">
                                                    <li><a href="#sec1"><i class="fal fa-info"></i> </a><span>Détails</span></li>
                                                    <li><a href="#sec2"><i class="fal fa-stars"></i></a><span>Commodités</span></li>
                                                    <li><a href="#sec3"><i class="fal fa-comment-alt-lines"></i></a><span>Descriptions</span></li>
                                                    <li><a href="#sec4"><i class="fal fa-video"></i></a><span>Vidéos</span></li>
                                                </ul>
                                                <div class="progress-indicator">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="-1 -1 34 34">
                                                        <circle cx="16" cy="16" r="15.9155"
                                                            class="progress-bar__background" />
                                                        <circle cx="16" cy="16" r="15.9155"
                                                            class="progress-bar__progress 
                                                            js-progress-bar" />
                                                    </svg>
                                                </div>
                                            </nav>
                                        </div>                              
                                        <!--  scroll-nav-wrap end-->   
                                        <!--  list-single-opt_header-->
                                        <div class="list-single-opt_header fl-wrap">
                                            <ul class="list-single-opt_header_cat">
                                                @foreach($currentSalle->typeSalles as $typeSalle)
                                                <li><a href="#" class="cat-opt color-bg">{{$typeSalle->libelle}}</a></li>
                                                @php if($loop->first) break; @endphp
                                                @endforeach
                                            </ul>
                                            <div class="share-holder hid-share">
                                                <a href="#" class="share-btn showshare sfcs">  <i class="fas fa-share-alt"></i>  Partager   </a>
                                                <div class="share-container  isShare"></div>
                                            </div>
                                        </div>
                                        <!--  list-single-opt_header end -->
                                        <!--  list-single-header-item-->
                                        <div class="list-single-header-item  fl-wrap" id="sec1">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h1> {{ $currentSalle->nom_salle }} <span class="verified-badge tolt" data-microtip-position="bottom"  data-tooltip="Verified"><i class="fas fa-check"></i></span></h1>
                                                    <div class="geodir-category-location fl-wrap">
                                                        <a href="https://www.google.com/maps/place/{{ $currentSalle->adresse_salle }} "><i class="fas fa-map-marker-alt"></i>  {{ $currentSalle->adresse_salle }} </a><br><br><br>
                                                        <a href="tel:{{ $currentSalle->telephone }}"><i class="fas fa-phone"></i>{{ $currentSalle->telephone }}</a> <br>
                                                        <a href="https://web.whatsapp.com/send?phone={{ $currentSalle->tel_whatsapp }}&text=Bonjour, je vous contacte depuis ATITO.NET !"><i class="fab fa-whatsapp"></i>{{ $currentSalle->tel_whatsapp }}</a><br>
                                                        <a href="mailto:{{ $currentSalle->email_salle }}"><i class="fas fa-envelope"></i>{{ $currentSalle->email_salle }} </a><br>
                                                        <a target="_blank" href="{{ $currentSalle->facebook_salle }}"><i class="fab fa-facebook"></i>{{ $currentSalle->facebook_salle }}</a><br>
                                                        <a target="_blank" href="{{ $currentSalle->site_internet }}"><i class="fas fa-globe"></i>{{ $currentSalle->site_internet }}</a><br>
                                                        
                                                        <!-- <div class="listing-rating card-popup-rainingvis" data-starrating2="4"><span class="re_stars-title">Good</span></div> -->
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                </div>
                                            </div>
                                            <div class="list-single-header-footer fl-wrap">
                                                <div class="list-single-header-price" data-propertyprise=""><strong>Forfait dès:</strong>{{empty($currentSalle->tarif_salle)?"NOUS CONSULTEZ !":$currentSalle->tarif_salle." FCFA"}}</div>
                                                <div class="list-single-header-date"><span>Mise en ligne:</span>{{ Carbon\Carbon::parse($currentSalle->created_date)->format("d/m/Y") }}</div>
                                                <div class="list-single-stats">
                                                    <ul class="no-list-style">
                                                        @if( (optional(optional($currentSalle->visites)->first())->counter??0) > 50 ) <li><span class="viewed-counter"><i class="fas fa-eye"></i> Visites :  {{ optional(optional($currentSalle->visites)->first())->counter??'0' }} </span></li> @endif
                                                        <!-- <li><span class="bookmark-counter"><i class="fas fa-heart"></i> Bookmark -  24 </span></li> -->
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="list-single-main-item fl-wrap" id="sec2">
                                            <div class="list-single-main-item-title">
                                                <h3>Commodités</h3>
                                            </div>
                                            <div class="list-single-main-item_content fl-wrap">
                                                <div class="listing-features ">
                                                    <ul>
                                                        @foreach($currentSalle->comodites->unique('id') as $comodite)
                                                        <li><a href="#"> <i class="{{$comodite->comodite_icon}}"></i> {{ $comodite->libel }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <div class="list-single-main-container fl-wrap" id="sec3">
                                            <!-- list-single-main-item -->
                                            <div class="list-single-main-item fl-wrap">
                                                <div class="list-single-main-item-title">
                                                    <h3>Description</h3>
                                                </div>
                                                <div class="list-single-main-item_content fl-wrap">
                                                    <h5 style="font-size: 13px; text-align: left; color: #878C9F;"> {{ $currentSalle->presentation_salle }} </h5>
                                                    @if(!empty($currentSalle->site_internet))
                                                    <a target="_blank" href="{{$currentSalle->site_internet}}" class="btn float-btn color-bg">Voir le site web</a>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- list-single-main-item end -->                                          
                                            <!-- list-single-main-item -->
                                            
                                            
                                           

                                            
                                            
                                            <!-- list-single-main-item end -->  
                                            <!-- list-single-main-item -->
                                            
                                            <!-- list-single-main-item end -->                                             
                                            <!-- list-single-main-item -->
                                            <div class="list-single-main-item fl-wrap" id="sec4">
                                                <div class="list-single-main-item-title">
                                                    <h3>Vidéo</h3>
                                                </div>
                                                
                                                <div class="list-single-main-item_content fl-wrap">
                                                    @forelse($currentSalle->videoSalles()->limit(1)->get() as $videoIt)
                                                    <div class="video-box fl-wrap" style="margin: 10px;">
                                                        <img src="{{ asset('storage/'.str_replace('public/', '', $videoIt->photo)) }}"  height="240" class="respimg" alt="">
                                                        <a class="video-box-btn image-popup color-bg" href="{{ $videoIt->lien_video }}"><i class="fas fa-play"></i></a>
                                                    </div>
                                                    @empty
                                                    <div class="video-box fl-wrap" style="margin: 10px;">PAS DE VIDEO</div>
                                                    @endforelse
                                                </div>

                                            </div>
                                            <!-- list-single-main-item end -->                                             
                                            <!-- list-single-main-item -->
                                            <!--<div class="list-single-main-item fl-wrap">
                                                <div class="list-single-main-item-title">
                                                    <h3>Features</h3>
                                                </div>
                                                <div class="list-single-main-item_content fl-wrap">
                                                    <div class="listing-features ">
                                                        <ul>
                                                            <li><a href="#"><i class="fal fa-dumbbell"></i> Gym</a></li>
                                                            <li><a href="#"><i class="fal fa-wifi"></i> Wi Fi</a></li>
                                                            <li><a href="#"><i class="fal fa-parking"></i> Parking</a></li>
                                                            <li><a href="#"><i class="fal fa-cloud"></i> Air Conditioned</a></li>
                                                            <li><a href="#"><i class="fal fa-swimmer"></i> Pool</a></li>
                                                            <li><a href="#"><i class="fal fa-cctv"></i>  Security</a></li>
                                                            <li><a href="#"><i class="fal fa-washer"></i> Laundry Room</a></li>
                                                            <li><a href="#"><i class="fal fa-utensils"></i> Equipped Kitchen</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>-->
                                            <!-- list-single-main-item end -->
                                            <!-- list-single-main-item -->

                                            <!-- list-single-main-item end -->                                            
                                            <!-- list-single-main-item -->
                                            <!--
                                            <div class="list-single-main-item fl-wrap" id="sec6">
                                                <div class="list-single-main-item-title">
                                                    <h3>Les avis des visiteurs</h3>
                                                </div>
                                                <div class="list-single-main-item_content fl-wrap">
                                                    <div class="reviews-comments-wrap fl-wrap">
                                                        <div class="review-total">
                                                            <span class="review-number blue-bg">4.0</span>
                                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="4"><span class="re_stars-title">Good</span></div>
                                                        </div>
                                                        --> 
                                                        <!-- reviews-comments-item -->  
                                                        
                                                        <!-- 
                                                            
                                                        <div class="reviews-comments-item">
                                                            <div class="review-comments-avatar">
                                                                <img src="images/avatar/1.jpg" alt=""> 
                                                            </div>
                                                            <div class="reviews-comments-item-text smpar">
                                                                <div class="box-widget-menu-btn smact"><i class="far fa-ellipsis-h"></i></div>
                                                                <div class="show-more-snopt-tooltip bxwt">
                                                                    <a href="#"> <i class="fas fa-reply"></i> Reply</a>
                                                                    <a href="#"> <i class="fas fa-exclamation-triangle"></i> Report </a>
                                                                </div>
                                                                <h4><a href="#">Liza Rose</a></h4>
                                                                <div class="listing-rating card-popup-rainingvis" data-starrating2="3"><span class="re_stars-title">Average</span></div>
                                                                <div class="clearfix"></div>
                                                                <p>" Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. "</p>
                                                                <div class="reviews-comments-item-date"><span class="reviews-comments-item-date-item"><i class="far fa-calendar-check"></i>12 April 2018</span><a href="#" class="rate-review"><i class="fal fa-thumbs-up"></i>  Helpful Review  <span>6</span> </a></div>
                                                            </div>
                                                        </div>
                                                        -->
                                                        <!--reviews-comments-item end--> 
                                                        <!-- reviews-comments-item -->  
                                                        
                                                        <!--
                                                        <div class="reviews-comments-item">
                                                            <div class="review-comments-avatar">
                                                                <img src="images/avatar/1.jpg" alt=""> 
                                                            </div>
                                                            <div class="reviews-comments-item-text smpar">
                                                                <div class="box-widget-menu-btn smact"><i class="far fa-ellipsis-h"></i></div>
                                                                <div class="show-more-snopt-tooltip bxwt">
                                                                    <a href="#"> <i class="fas fa-reply"></i> Reply</a>
                                                                    <a href="#"> <i class="fas fa-exclamation-triangle"></i> Report </a>
                                                                </div>
                                                                <h4><a href="#">Adam Koncy</a></h4>
                                                                <div class="listing-rating card-popup-rainingvis" data-starrating2="5"><span class="re_stars-title">Excellent</span></div>
                                                                <div class="clearfix"></div>
                                                                <p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere convallis purus non cursus. Cras metus neque, gravida sodales massa ut. "</p>
                                                                <div class="reviews-comments-item-date"><span class="reviews-comments-item-date-item"><i class="far fa-calendar-check"></i>03 December 2017</span><a href="#" class="rate-review"><i class="fal fa-thumbs-up"></i>  Helpful Review  <span>2</span> </a></div>
                                                            </div>
                                                        </div>

                                                        -->
                                                        <!--reviews-comments-item end-->                                                                  
                                                    <!--
                                                    </div>
                                                </div>
                                            </div>-->

                                            <!-- list-single-main-item end -->                                             
                                            <!-- list-single-main-item -->
                                            
                                            <!-- list-single-main-item end -->                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- listing-single content end-->
                                <!-- sidebar -->
                                <div class="col-md-4">
                                    <!--box-widget-->
                                    <div class="box-widget fl-wrap">
                                        <div class="profile-widget">
                                            <div class="profile-widget-header color-bg smpar fl-wrap">
                                                <div class="pwh_bg"><img src="{{ asset('storage/'.str_replace('public/', '', optional(optional($currentSalle->comptes)->first())->logo_entreprise)) }}" alt="{{ $currentSalle->nom_salle }}"></div>
                                                <div class="call-btn">
                                                    
                                                </div>
                                                <div class="box-widget-menu-btn smact"><i class="far fa-ellipsis-h"></i></div>
                                                <!-- <div class="show-more-snopt-tooltip bxwt">
                                                    <a href="#"> <i class="fas fa-comment-alt"></i> Write a review</a>
                                                    <a href="#"> <i class="fas fa-exclamation-triangle"></i> Report </a>
                                                </div> -->
                                                <div class="profile-widget-card">
                                                    <div class="profile-widget-image">
                                                        <img src="{{ asset('storage/'.str_replace('public/', '', optional(optional($currentSalle->comptes)->first())->photo)) }}" alt="{{ $currentSalle->nom_salle }}">
                                                    </div>
                                                    <div class="profile-widget-header-title">
                                                        <h4><a href="/voir/detail/{{optional(optional($currentSalle->comptes)->first())->id}}/utilisateur">{{ optional(optional($currentSalle->comptes)->first())->nom_compte  }} {{ optional(optional($currentSalle->comptes)->first())->prenom_compte  }}</a></h4>
                                                        <div class="clearfix"></div>
                                                        <div class="pwh_counter"><span>{{optional(optional($currentSalle->comptes)->first())->salles->count()}}</span>Annonce(s)</div>
                                                        <div class="clearfix"></div>
                                                        <!-- <div class="listing-rating card-popup-rainingvis" data-starrating2="4"></div> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="profile-widget-content fl-wrap">
                                                <div class="contats-list fl-wrap">
                                                    <ul class="no-list-style">
                                                        <li><span><i class="fal fa-phone"></i> Téléphone :</span> <a href="tel:{{ optional(optional($currentSalle->comptes)->first())->telephone_compte }}">{{ optional(optional($currentSalle->comptes)->first())->telephone_compte  }}</a></li>
                                                        <li><span><i class="fab fa-whatsapp"></i> Whatsapp :</span> <a href="https://web.whatsapp.com/send?phone={{ optional(optional($currentSalle->comptes)->first())->whatsapp_compte }}&text=Bonjour, je vous contacte depuis ATITO.NET !">{{ optional(optional($currentSalle->comptes)->first())->whatsapp_compte  }}</a></li>
                                                        <li><span><i class="fal fa-envelope"></i> Email :</span> <a href="mailto:{{ optional(optional(optional($currentSalle->comptes)->first())->user)->email }}">{{ optional(optional(optional($currentSalle->comptes)->first())->user)->email  }}</a></li>
                                                        <li><span><i class="fal fa-browser"></i> Site Web :</span> <a target="_blank" style="font-size: 12px;" href="{{ optional(optional($currentSalle->comptes)->first())->siteweb_compte  }}">{{ optional(optional($currentSalle->comptes)->first())->siteweb_compte  }}</a></li>
                                                    </ul>
                                                </div>
                                                <div class="profile-widget-footer fl-wrap">
                                                    <a href="/voir/detail/{{optional(optional($currentSalle->comptes)->first())->id}}/utilisateur" class="btn float-btn color-bg small-btn">Voir le profil</a>
                                                    <!-- <a href="#sec-contact" class="custom-scroll-link tolt" data-microtip-position="left"  data-tooltip="Viewing Property"><i class="fal fa-paper-plane"></i></a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--box-widget end -->
                                    <!--box-widget-->
                                    
                                    <!--box-widget end --> 
                                    <!--box-widget-->
                                                                        <!--box-widget end -->                                   
                                    <!--box-widget-->
                                    <!-- <div class="box-widget fl-wrap">
                                        <div class="box-widget-title fl-wrap">Documentation</div>
                                        <div class="box-widget-content fl-wrap">
                                            <div class="bwc_download-list">
                                                <a href="#" download><span><i class="fal fa-file-pdf"></i></span>Property Présentation</a>
                                                <a href="#" download><span><i class="fal fa-file-word"></i></span>Energetic Certificate</a>
                                                <a href="#" download><span><i class="fal fa-file-pdf"></i></span>Property Plans</a>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!--box-widget end -->                                
                                    <!--box-widget-->
                                    <div class="box-widget fl-wrap" style="margin-top: 15px;">
                                        <div class="box-widget-fixed-init fl-wrap" id="sec-contact">
                                            <div class="box-widget-title fl-wrap box-widget-title-color color-bg no-top-margin">Ecrivez au compte</div>
                                            <div class="box-widget-content fl-wrap">
                                                <div class="custom-form">
                                                    <form method="post" name="contact-property-form" action="/contacts/poster/annonce">
                                                        @csrf
                                                        <input type="hidden" name="compte_id" value="{{optional(optional($currentSalle->comptes)->first())->id}}">
                                                        <label>
                                                            Votre nom & prenom(s) 
                                                            <span class="dec-icon">
                                                                <i class="fas fa-user"></i>
                                                            </span>
                                                        </label>
                                                        <input name="nom_prenom_c" type="text" onClick="this.select()" value="">
                                                        <label>
                                                            Votre téléphone 
                                                            <span class="dec-icon">
                                                                <i class="fas fa-phone"></i>
                                                            </span>
                                                        </label>
                                                        <input name="phone" type="text" onClick="this.select()" value="">
                                                        <label>
                                                            Votre email
                                                            <span class="dec-icon">
                                                                <i class="fas fa-envelope"></i>
                                                            </span>
                                                        </label>
                                                        <input name="email" type="text" onClick="this.select()" value="">
                                                        <textarea name="message" cols="40" rows="3" placeholder="Votre message:" style="height: 150px"></textarea>
                                                        <button type="submit" class="btn float-btn color-bg fw-btn">Envoyez</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--box-widget end -->                                   
                                </div>
                                <!--  sidebar end-->                            
                            </div>
                            <div class="fl-wrap limit-box"></div>
                            <div class="listing-carousel-wrapper carousel-wrap fl-wrap">
                                <div class="list-single-main-item-title">
                                    <h3>Espaces Similaires</h3>
                                </div>
                                @php

                                    
                                    $curSallTypeSalles = collect();
                                    foreach($currentSalle->typeSalles()->with("salles")->limit(2)->get() as $itema){
                                        foreach($itema->salles()->limit(3)->get() as $itemaa){
                                            $curSallTypeSalles->push($itemaa);
                                        }
                                    }
                                    $curSallTComodites = collect();
                                    foreach($currentSalle->comodites()->with("salles")->limit(2)->get() as $itemb){
                                        foreach($itemb->salles()->limit(3)->get() as $itemba){
                                            $curSallTComodites->push($itemba);
                                        }
                                    }

                                    $curSallCollectEnd = $curSallTypeSalles->concat($curSallTComodites)->unique('id');


                                @endphp

                                @if($curSallCollectEnd->count() > 0)
                                <div class="listing-carousel carousel ">
                                    <!-- slick-slide-item -->
                                    @foreach($curSallCollectEnd as $itemsc )
                                    <div class="slick-slide-item">
                                        <!-- listing-item -->
                                        <div class="listing-item">
                                            <article class="geodir-category-listing fl-wrap">
                                                <div class="geodir-category-img fl-wrap">
                                                    <a href="/voir/detail/{{$itemsc->id}}/annonce" class="geodir-category-img_item">
                                                        <img src="{{asset('storage/'.str_replace('public/', '', $itemsc->photo))}}" alt="image type de salle" style="height: 250px;width: 390px;">
                                                        <div class="overlay"></div>
                                                    </a>
                                                    <div class="geodir-category-location">
                                                    <a href="/voir/detail/{{$itemsc->id}}/annonce" class="single-map-item tolt" data-newlatitude="40.72956781" data-newlongitude="-73.99726866"   data-microtip-position="top-left" data-tooltip="Localisation"><i class="fas fa-map-marker-alt"></i> <span>{{$itemsc->adresse_salle}}</span></a>
                                                    </div>
                                                    <ul class="list-single-opt_header_cat">
    <!--                                                    <li><a href="#" class="cat-opt blue-bg">Sale</a></li>
    -->                                                    
                                                        @foreach($itemsc->typeSalles as $typeSalleId)
                                                        <li><a href="#" class="cat-opt color-bg">{{$typeSalleId->libelle}}</a></li>
                                                        @php if($loop->first) break; @endphp
                                                        @endforeach
                                                    </ul>
                                                
                                                    <div class="geodir-category-listing_media-list">
                                                        <span><i class="fas fa-camera"></i> {{ $itemsc->photosSalles->count() }}</span>
                                                    </div>
                                                </div>
                                                <div class="geodir-category-content fl-wrap">
                                                    <h3 class="title-sin_item"><a href="/voir/detail/{{$itemsc->id}}/annonce">{{$itemsc->nom_salle}}</a></h3>
                                                    <div class="geodir-category-content_price">{{empty($itemsc->tarif_salle)?"NOUS CONSULTEZ !":$itemsc->tarif_salle." FCFA"}}</div>
                                                    <h5 style="font-size: 13px; text-align: left; color: #878C9F;">{{$itemsc->presentation_salle}}</h5>
                                                    
                                                    
                                                </div>
                                            </article>
                                        </div>
                                        <!-- listing-item end-->							
                                    </div>
                                    @endforeach
                                    
                                    <!-- slick-slide-item end-->								
                                </div>
                                <div class="swiper-button-prev lc-wbtn lc-wbtn_prev"><i class="far fa-angle-left"></i></div>
                                <div class="swiper-button-next lc-wbtn lc-wbtn_next"><i class="far fa-angle-right"></i></div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- content end -->	
                <!-- subscribe-wrap -->	
                @include("layouts.footer")
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script   src="/js/jquery.min.js"></script>
        <script   src="/js/plugins.js"></script>
        <script   src="/js/scripts.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=YOU_API_KEY_HERE&libraries=places"></script>
        <script src="/js/map-single.js"></script>

        <script>
            $(document).ready(function(){
                setTimeout(function(){
                    // Define the data to be sent in the AJAX request

                    // Make the AJAX request
                    $.ajax({
                        url: '/api/make/view/annonce',
                        method: 'POST', // Change method if needed
                        data: {
                            "_token": "{{csrf_token()}}",
                            "cid": {{optional(optional($currentSalle->comptes)->first())->id}},
                            "aid": {{$currentSalle->id}},
                        },
                        success: function(response) {
                            // Handle success response here
                            console.log('Success:', response);
                        },
                        error: function(xhr, status, error) {
                            // Handle error response here
                            console.error('Error:', xhr.responseText);
                        }
                    });

                },8000);
            })
        </script>
    </body>
</html>