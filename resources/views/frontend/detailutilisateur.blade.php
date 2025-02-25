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
                @php
                    $currentUser = App\Models\Compte::findOrFail($compteId);
                @endphp
                <div class="content">
                    <!--  carousel--> 
                    <!--  carousel  end-->  
                    <div class="breadcrumbs fw-breadcrumbs smpar fl-wrap">
                        <div class="container">
                            <div class="breadcrumbs-list">
                                <a href="#">Menu</a><a href="#">Détails</a><a href="#">Utilisateur</a><span>{{$currentUser->nom_compte}} {{$currentUser->prenom_compte}}</span>
                            </div>
                        </div>
                    </div>
                    <section class="gray-bg small-padding ">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card-info smpar fl-wrap">
                                        <!-- <div class="box-widget-menu-btn smact">
                                            <i class="far fa-ellipsis-h"></i>
                                        </div>
                                        <div class="show-more-snopt-tooltip bxwt">
                                            <a href="#">
                                                <i class="fas fa-comment-alt"></i>
                                                Write a review
                                            </a>
                                            <a href="#">
                                                <i class="fas fa-exclamation-triangle"></i>
                                                Report 
                                            </a>
                                        </div> -->
                                        <div class="bg-wrap bg-parallax-wrap-gradien">
                                            <div class="bg" data-bg="{{ asset('storage/'.str_replace('public/', '', $currentUser->logo_entreprise)) }}"></div>
                                        </div>
                                        <div class="card-info-media">
                                            <div class="bg" data-bg="{{ asset('storage/'.str_replace('public/', '', $currentUser->photo)) }}"></div>
                                        </div>
                                        <div class="card-info-content">
                                            <div class="agent_card-title fl-wrap">
                                                <h4 class="put-bg-ontext-back">{{ $currentUser->nom_compte." ".$currentUser->prenom_compte }}</h4>
                                                <div class="geodir-category-location fl-wrap">
                                                    <h5>
                                                        <a href="#">{{ $currentUser->salles->count() }} Annonce(s)</a>
                                                    </h5>
                                                    <!-- <div class="listing-rating card-popup-rainingvis" data-starrating2="4">
                                                        <span class="re_stars-title">Good</span>
                                                    </div> -->
                                                </div>
                                            </div>
                                            <div class="list-single-stats">
                                                <ul class="no-list-style">
                                                    <li>
                                                        <span class="viewed-counter">
                                                            <i class="fas fa-eye"></i>
                                                            Visites -  {{ $currentUser->salles()->with("visites")->get()->flatMap->visites->sum('counter') }} 
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="bookmark-counter">
                                                            <i class="fas fa-comment-alt"></i>
                                                            Propose -  {{ $currentUser->salles()->with("comodites")->get()->flatMap->comodites->unique('id')->count() }} comodité(s) 
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="bookmark-counter">
                                                            <i class="fas fa-sitemap"></i>
                                                            {{ $currentUser->salles()->with("typeSalles")->get()->flatMap->typesalles->unique('id')->count() }} genre de salle(s)
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-verified tolt" data-microtip-position="left" data-tooltip="Verified">
                                                <i class="fal fa-user-check"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-single-main-container fl-wrap">
                                        <!-- list-single-main-item -->
                                        <div class="list-single-main-item fl-wrap">
                                            <div class="list-single-main-item-title">
                                                <h3>Présentation</h3>
                                            </div>
                                            <div class="list-single-main-item_content fl-wrap">
                                                <p>{{$currentUser->description_compte}}</p>
                                                
                                                <div class="list-single-tags fl-wrap tags-stylwrap" style="margin-top: 20px;">
                                                    <span>Je propose:</span>
                                                    @php
                                                    $uniquetypesSalles = $currentUser->with('salles.typeSalles')->get()
                                                                ->pluck('salles.*.typeSalles.*')
                                                                ->flatten()
                                                                ->unique('id');
                                                    @endphp
                                                    @foreach($uniquetypesSalles as $typesSalle)
                                                        <a href="#">{{$typesSalle->libelle}}</a>
                                                    @endforeach
                                                </div>
                                                <div class="list-single-tags fl-wrap tags-stylwrap" style="margin-top: 20px;">
                                                    <span>commodités:</span>
                                                    @foreach($currentUser->salles()->with("comodites")->get()->flatMap->comodites->unique('id') as $comodite)
                                                    <a href="#"> <i class="{{$comodite->comodite_icon}} fontawe-icon-size"></i> {{ $comodite->libel }}</a>
                                                    @endforeach
                                                </div>
                                                <div class="list-single-tags fl-wrap tags-stylwrap" style="margin-top: 20px;">
                                                    <span style="display: flex;">Mon activité: &nbsp;&nbsp;&nbsp; <h3>{{$currentUser->activite_compte}}</h3></span>
                                                </div>
                                                <div class="list-single-tags fl-wrap tags-stylwrap" style="margin-top: 20px;">
                                                    <span style="display: flex;">Adresse: &nbsp;&nbsp;&nbsp; <h3>{{$currentUser->adresse_compte}}</h3></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- list-single-main-item end -->
                                    </div>
                                    <!-- content-tabs-wrap -->
                                    @php
                                        $currentuserSalles = $currentUser->salles()->latest()->paginate(5)->withQueryString();
                                    @endphp
                                    <div class="content-tabs-wrap tabs-act fl-wrap">
                                        <!--tabs -->
                                        <div class="tabs-container">
                                            <!--tab -->
                                            <div class="tab">
                                                <div id="tab-listing" class="tab-content first-tab">
                                                    <!-- listing-item-wrap-->
                                                    @foreach($currentuserSalles as $userSalle)
                                                    <div class="listing-item-container one-column-grid-wrap  box-list_ic fl-wrap">
                                                        <!-- listing-item -->
                                                        <div class="listing-item">
                                                            <article class="geodir-category-listing fl-wrap">
                                                                <div class="geodir-category-img fl-wrap">
                                                                    <a href="/voir/detail/{{$userSalle->id}}/annonce" class="geodir-category-img_item">
                                                                        <img src="{{asset('storage/'.str_replace('public/', '', $userSalle->photo))}}" alt="image type de salle" style="height: 220px;">
                                                                        <div class="overlay"></div>
                                                                    </a>
                                                                    <div class="geodir-category-location">
                                                                        <a href="/voir/detail/{{$userSalle->id}}/annonce" class="single-map-item tolt" data-newlatitude="40.72956781" data-newlongitude="-73.99726866" data-microtip-position="top-left" data-tooltip="Adresse de l'annonce">
                                                                            <i class="fas fa-map-marker-alt"></i>
                                                                            <span>{{$userSalle->adresse_salle}}</span>
                                                                        </a>
                                                                    </div>
                                                                    <ul class="list-single-opt_header_cat">
                                                                        @foreach($userSalle->typeSalles as $typSalle)
                                                                        <li>
                                                                            <a href="#" class="cat-opt blue-bg">{{$typSalle->libelle}}</a>
                                                                        </li>
                                                                        @php if($loop->first) break; @endphp
                                                                        @endforeach
                                                                    </ul>
                                                                    <div class="geodir-category-listing_media-list">
                                                                        <span>
                                                                            <i class="fas fa-camera"></i>
                                                                            {{ $userSalle->photosSalles->count() }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="geodir-category-content fl-wrap">
                                                                    <h3 class="title-sin_item">
                                                                        <a href="/voir/detail/{{$userSalle->id}}/annonce">{{$userSalle->nom_salle}}</a>
                                                                    </h3>
                                                                    <div class="geodir-category-content_price">{{$userSalle->tarif_salle}},OO FCFA</div>
                                                                    <h5 style="font-size: 13px; text-align: left; color: #878C9F;">{{$userSalle->presentation_salle}}</h5>
                                                                    <div class="geodir-category-content-details">
                                                                        <ul>
                                                                            @foreach($userSalle->comodites as $comoditeid)
                                                                            <li>
                                                                                <i class="{{$comoditeid->comodite_icon}} fontawe-icon-size"></i>
                                                                                <span>{{$comoditeid->libel}}</span>
                                                                            </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <!-- listing-item end-->
                                                    </div>
                                                    @endforeach
                                                    <!-- listing-item-wrap end-->
                                                    <!-- pagination-->
                                                    <div class="pagination float-pagination">
                                                        @if ($currentuserSalles->onFirstPage())
                                                            <a href="#" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
                                                        @else
                                                            <a href="{{ $annonces->previousPageUrl() }}" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
                                                        @endif

                                                        @foreach ($currentuserSalles->getUrlRange(1, $currentuserSalles->lastPage()) as $page => $url)
                                                            @if ($page == $currentuserSalles->currentPage())
                                                                <a class="current-page">{{ $page }}</a>
                                                            @else
                                                                <a href="{{ $url }}">{{ $page }}</a>
                                                            @endif
                                                        @endforeach

                                                        @if ($currentuserSalles->hasMorePages())
                                                            <a href="{{ $currentuserSalles->nextPageUrl() }}" class="nextposts-link"><i class="fa fa-caret-right"></i></a>
                                                        @else
                                                            <a href="#" class="nextposts-link"><i class="fa fa-caret-right"></i></a>
                                                        @endif
                                                    </div>
                                                    <!-- pagination end-->
                                                </div>
                                            </div>
                                            <!--tab  end-->
                                            <!--tab -->
                                            <div class="tab">
                                                <div id="tab-reviews" class="tab-content">
                                                    <div class="list-single-main-container fl-wrap" style="margin-top: 30px;">
                                                        <!-- list-single-main-item -->
                                                        <div class="list-single-main-item fl-wrap" id="sec6">
                                                            <div class="list-single-main-item-title">
                                                                <h3>
                                                                    Reviews <span>2</span>
                                                                </h3>
                                                            </div>
                                                            <div class="list-single-main-item_content fl-wrap">
                                                                <div class="reviews-comments-wrap fl-wrap">
                                                                    <div class="review-total">
                                                                        <span class="review-number blue-bg">5.0</span>
                                                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5">
                                                                            <span class="re_stars-title">Excellent</span>
                                                                        </div>
                                                                    </div>
                                                                    <!-- reviews-comments-item -->
                                                                    <div class="reviews-comments-item">
                                                                        <div class="review-comments-avatar">
                                                                            <img src="images/avatar/1.jpg" alt="">
                                                                        </div>
                                                                        <div class="reviews-comments-item-text smpar">
                                                                            <div class="box-widget-menu-btn smact">
                                                                                <i class="far fa-ellipsis-h"></i>
                                                                            </div>
                                                                            <div class="show-more-snopt-tooltip bxwt">
                                                                                <a href="#">
                                                                                    <i class="fas fa-reply"></i>
                                                                                    Reply
                                                                                </a>
                                                                                <a href="#">
                                                                                    <i class="fas fa-exclamation-triangle"></i>
                                                                                    Report 
                                                                                </a>
                                                                            </div>
                                                                            <h4>
                                                                                <a href="#">Liza Rose</a>
                                                                            </h4>
                                                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5">
                                                                                <span class="re_stars-title">Excellent</span>
                                                                            </div>
                                                                            <div class="clearfix"></div>
                                                                            <p>" Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. "</p>
                                                                            <div class="reviews-comments-item-date">
                                                                                <span class="reviews-comments-item-date-item">
                                                                                    <i class="far fa-calendar-check"></i>
                                                                                    12 April 2018
                                                                                </span>
                                                                                <a href="#" class="rate-review">
                                                                                    <i class="fal fa-thumbs-up"></i>
                                                                                    Helpful Review  <span>6</span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--reviews-comments-item end-->
                                                                    <!-- reviews-comments-item -->
                                                                    <div class="reviews-comments-item">
                                                                        <div class="review-comments-avatar">
                                                                            <img src="images/avatar/1.jpg" alt="">
                                                                        </div>
                                                                        <div class="reviews-comments-item-text smpar">
                                                                            <div class="box-widget-menu-btn smact">
                                                                                <i class="far fa-ellipsis-h"></i>
                                                                            </div>
                                                                            <div class="show-more-snopt-tooltip bxwt">
                                                                                <a href="#">
                                                                                    <i class="fas fa-reply"></i>
                                                                                    Reply
                                                                                </a>
                                                                                <a href="#">
                                                                                    <i class="fas fa-exclamation-triangle"></i>
                                                                                    Report 
                                                                                </a>
                                                                            </div>
                                                                            <h4>
                                                                                <a href="#">Adam Koncy</a>
                                                                            </h4>
                                                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5">
                                                                                <span class="re_stars-title">Excellent</span>
                                                                            </div>
                                                                            <div class="clearfix"></div>
                                                                            <p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere convallis purus non cursus. Cras metus neque, gravida sodales massa ut. "</p>
                                                                            <div class="reviews-comments-item-date">
                                                                                <span class="reviews-comments-item-date-item">
                                                                                    <i class="far fa-calendar-check"></i>
                                                                                    03 December 2017
                                                                                </span>
                                                                                <a href="#" class="rate-review">
                                                                                    <i class="fal fa-thumbs-up"></i>
                                                                                    Helpful Review  <span>2</span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--reviews-comments-item end-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- list-single-main-item end -->
                                                        <!-- list-single-main-item -->
                                                        <div class="list-single-main-item fl-wrap" id="sec5">
                                                            <div class="list-single-main-item-title fl-wrap">
                                                                <h3>Add Your Review</h3>
                                                            </div>
                                                            <!-- Add Review Box -->
                                                            <div id="add-review" class="add-review-box">
                                                                <div class="leave-rating-wrap">
                                                                    <span class="leave-rating-title">Your rating  for this listing : </span>
                                                                    <div class="leave-rating">
                                                                        <input type="radio" data-ratingtext="Excellent" name="rating" id="rating-1" value="1"/>
                                                                        <label for="rating-1" class="fal fa-star"></label>
                                                                        <input type="radio" data-ratingtext="Good" name="rating" id="rating-2" value="2"/>
                                                                        <label for="rating-2" class="fal fa-star"></label>
                                                                        <input type="radio" name="rating" data-ratingtext="Average" id="rating-3" value="3"/>
                                                                        <label for="rating-3" class="fal fa-star"></label>
                                                                        <input type="radio" data-ratingtext="Fair" name="rating" id="rating-4" value="4"/>
                                                                        <label for="rating-4" class="fal fa-star"></label>
                                                                        <input type="radio" data-ratingtext="Very Bad " name="rating" id="rating-5" value="5"/>
                                                                        <label for="rating-5" class="fal fa-star"></label>
                                                                    </div>
                                                                    <div class="count-radio-wrapper">
                                                                        <span id="count-checked-radio">Your Rating</span>
                                                                    </div>
                                                                </div>
                                                                <!-- Review Comment -->
                                                                <form class="add-comment custom-form">
                                                                    <fieldset>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <label>
                                                                                    Your name* 
                                                                                    <span class="dec-icon">
                                                                                        <i class="fas fa-user"></i>
                                                                                    </span>
                                                                                </label>
                                                                                <input name="phone" type="text" onClick="this.select()" value="">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label>
                                                                                    Yourmail* 
                                                                                    <span class="dec-icon">
                                                                                        <i class="fas fa-envelope"></i>
                                                                                    </span>
                                                                                </label>
                                                                                <input name="reviewwname" type="text" onClick="this.select()" value="">
                                                                            </div>
                                                                        </div>
                                                                        <textarea cols="40" rows="3" placeholder="Your Review:"></textarea>
                                                                    </fieldset>
                                                                    <button class="btn big-btn color-bg float-btn">
                                                                        Submit Review <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                            <!-- Add Review Box / End -->
                                                        </div>
                                                        <!-- list-single-main-item end -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!--tab end-->
                                        </div>
                                        <!--tabs end-->
                                    </div>
                                    <!-- content-tabs-wrap end -->
                                </div>
                                <!-- col-md 8 end -->
                                <!--  sidebar-->
                                <div class="col-md-4">
                                    <!--box-widget-->
                                    <div class="box-widget bwt-first fl-wrap">
                                    <div class="box-widget-title fl-wrap">Mes Contacts</div>
                                        <div class="box-widget-content fl-wrap">
                                            <div class="contats-list clm fl-wrap">
                                                <ul class="no-list-style">
                                                    <li><span>Nom entreprise :</span> <a href="#">{{$currentUser->nom_entreprise}}</a></li>
                                                    <li><span><i class="fal fa-phone"></i> Téléphone :</span> <a href="#">{{$currentUser->telephone_compte}}</a></li>
                                                    <li><span><i class="fal fa-envelope"></i> Email :</span> <a href="#">{{optional($currentUser->user)->email}}</a></li>
                                                    <li><span><i class="fal fa-map-marker"></i> Adresse :</span> <a href="#">{{$currentUser->adresse_compte}}</a></li>
                                                    <li><span><i class="fal fa-browser"></i> Website :</span> <a href="#">{{$currentUser->siteweb_compte}}</a></li>
                                                </ul>
                                            </div>
                                            <div class="profile-widget-footer fl-wrap">
                                                <div class="card-info-content_social ">
                                                    <ul>
                                                        <li><a href="https://api.whatsapp.com/send?phone={{$currentUser->whatsapp_compte}}" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--box-widget end -->
                                    <!--box-widget-->
                                    <div class="box-widget fl-wrap">
                                        <div class="box-widget-fixed-init fl-wrap" id="sec-contact">
                                            <div class="box-widget-title fl-wrap box-widget-title-color color-bg no-top-margin">Ecrivez au compte</div>
                                            <div class="box-widget-content fl-wrap">
                                                <div class="custom-form">
                                                    <form method="post" name="contact-property-form" action="/contacts/poster/annonce">
                                                        @csrf
                                                        <input type="hidden" name="compte_id" value="{{$currentUser->id}}">
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
                                <!--   sidebar end-->
                            </div>
                        </div>
                        <div class="limit-box fl-wrap"></div>
                    </section>
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
    </body>
</html>