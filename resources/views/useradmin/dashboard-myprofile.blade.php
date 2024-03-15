<!DOCTYPE HTML>
<html lang="en">

<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title>Atito</title>
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="/css/plugins.css">
    <link type="text/css" rel="stylesheet" href="/css/style.css">
    <link type="text/css" rel="stylesheet" href="/css/dashboard-style.css">
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
                        <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 5 -2" result="gooey" />
                        <fecomposite in="SourceGraphic" in2="gooey" operator="atop" />
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
            <div class="show-reg-form dasbdord-submenu-open"><img src="{{asset('storage/'.str_replace('public/', '', auth()->user()->compte->photo))}}" alt=""></div>
            <!--  login btn  end -->
            <!--  dashboard-submenu-->
            <div class="dashboard-submenu">
                <div class="dashboard-submenu-title fl-wrap">Bienvenue , <span>{{auth()->user()->name}}</span></div>
                <ul>
                    <li><a href="/user-dashboard"><i class="fal fa-chart-line"></i>Accueil</a></li>
                    <li><a href="/user-dashboard-profil"> <i class="fal fa-user-edit"></i>Votre profil</a></li>
                    <li><a href="/user-dashboard-message"> <i class="fal fa-message"></i>Messages</a></li>
                    <li><a href="/user-dashboard-annonce"> <i class="fal fa-user-edit"></i>Mes annonces</a></li>
                    <li><a href="/user-dashboard-add-annonce"><i class="fal fa-plus"></i>Ajouter une annonce</a></li>
                </ul>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('#logout-form').submit();" class="color-bg db_log-out"><i class="far fa-power-off"></i>Déconnexion</a>
            </div>
            <!--  dashboard-submenu  end -->
            <!--  navigation -->
            <div class="nav-holder main-menu">
                <nav>
                </nav>
            </div>
            <!-- navigation  end -->
            <!-- header-search-wrapper -->
            <div class="header-search-wrapper novis_search">
                <div class="header-serach-menu">
                    <div class="custom-switcher fl-wrap">
                        <div class="fieldset fl-wrap">
                            <input type="radio" name="duration-1" id="buy_sw" class="tariff-toggle" checked>
                            <label for="buy_sw">Buy</label>
                            <input type="radio" name="duration-1" class="tariff-toggle" id="rent_sw">
                            <label for="rent_sw" class="lss_lb">Rent</label>
                            <span class="switch color-bg"></span>
                        </div>
                    </div>
                </div>
                <div class="custom-form">
                </div>
            </div>
            <!-- header-search-wrapper end  -->
            <!-- wishlist-wrap-->
            <div class="header-modal novis_wishlist tabs-act">
                <ul class="tabs-menu fl-wrap no-list-style">
                    <li class="current"><a href="#tab-wish"> Wishlist <span>- 3</span></a></li>
                    <li><a href="#tab-compare"> Compare <span>- 2</span></a></li>
                </ul>
                <!--tabs -->
                <div class="tabs-container">
                    <div class="tab">
                        <!--tab -->
                        <div id="tab-wish" class="tab-content first-tab">
                            <!-- header-modal-container-->
                            <div class="header-modal-container scrollbar-inner fl-wrap" data-simplebar>
                                <!--widget-posts-->
                                <div class="widget-posts  fl-wrap">
                                    <ul class="no-list-style">
                                        <li>
                                            <div class="widget-posts-img"><a href="listing-single.html"><img src="/images/all/small/1.jpg" alt=""></a>
                                            </div>
                                            <div class="widget-posts-descr">
                                                <h4><a href="listing-single.html">Affordable Urban Room</a></h4>
                                                <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> 40 Journal Square , NJ, USA</a></div>
                                                <div class="widget-posts-descr-price"><span>Price: </span> $ 1500 / per month</div>
                                                <div class="clear-wishlist"><i class="fal fa-trash-alt"></i></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="widget-posts-img"><a href="listing-single.html"><img src="/images/all/small/1.jpg" alt=""></a>
                                            </div>
                                            <div class="widget-posts-descr">
                                                <h4><a href="listing-single.html">Family House</a></h4>
                                                <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> 34-42 Montgomery St , NY, USA</a></div>
                                                <div class="widget-posts-descr-price"><span>Price: </span> $ 50.000</div>
                                                <div class="clear-wishlist"><i class="fal fa-trash-alt"></i></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="widget-posts-img"><a href="listing-single.html"><img src="/images/all/small/1.jpg" alt=""></a>
                                            </div>
                                            <div class="widget-posts-descr">
                                                <h4><a href="listing-single.html">Apartment to Rent</a></h4>
                                                <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i>75 Prince St, NY, USA</a></div>
                                                <div class="widget-posts-descr-price"><span>Price: </span> $100 / per night</div>
                                                <div class="clear-wishlist"><i class="fal fa-trash-alt"></i></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- widget-posts end-->
                            </div>
                            <!-- header-modal-container end-->
                            <div class="header-modal-top fl-wrap">
                                <div class="clear_wishlist color-bg"><i class="fal fa-trash-alt"></i> Clear all</div>
                            </div>
                        </div>
                        <!--tab end -->
                        <!--tab -->
                        <div class="tab">
                            <div id="tab-compare" class="tab-content">
                                <!-- header-modal-container-->
                                <div class="header-modal-container scrollbar-inner fl-wrap" data-simplebar>
                                    <!--widget-posts-->
                                    <div class="widget-posts  fl-wrap">
                                        <ul class="no-list-style">
                                            <li>
                                                <div class="widget-posts-img"><a href="listing-single.html"><img src="/images/all/small/1.jpg" alt=""></a>
                                                </div>
                                                <div class="widget-posts-descr">
                                                    <h4><a href="listing-single.html">Gorgeous house for sale</a></h4>
                                                    <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> 70 Bright St New York, USA </a></div>
                                                    <div class="widget-posts-descr-price"><span>Price: </span> $ 52.100</div>
                                                    <div class="clear-wishlist"><i class="fal fa-trash-alt"></i></div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="widget-posts-img"><a href="listing-single.html"><img src="/images/all/small/1.jpg" alt=""></a>
                                                </div>
                                                <div class="widget-posts-descr">
                                                    <h4><a href="listing-single.html">Family Apartments</a></h4>
                                                    <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> W 85th St, New York, USA </a></div>
                                                    <div class="widget-posts-descr-price"><span>Price: </span> $ 72.400</div>
                                                    <div class="clear-wishlist"><i class="fal fa-trash-alt"></i></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- widget-posts end-->
                                </div>
                                <!-- header-modal-container end-->
                                <div class="header-modal-top fl-wrap">
                                    <a class="clear_wishlist color-bg" href="compare.html"><i class="fal fa-random"></i> Compare</a>
                                </div>
                            </div>
                        </div>
                        <!--tab end -->
                    </div>
                    <!--tabs end -->
                </div>
            </div>
            <!--wishlist-wrap end -->
            <!--header-opt-modal-->
            <div class="header-opt-modal novis_header-mod">
                <!-- <div class="header-opt-modal-container hopmc_init">
                        <div class="header-opt-modal-item lang-item fl-wrap">
                            <h4>Language: <span>EN</span></h4>
                            <div class="header-opt-modal-list fl-wrap">
                                <ul>
                                    <li><a href="#" class="current-lan" data-lantext="EN">English</a></li>
                                    <li><a href="#" data-lantext="FR">Franais</a></li>
                                    <li><a href="#" data-lantext="ES">Espaol</a></li>
                                    <li><a href="#" data-lantext="DE">Deutsch</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="header-opt-modal-item currency-item fl-wrap">
                            <h4>Currency: <span>USD</span></h4>
                            <div class="header-opt-modal-list fl-wrap">
                                <ul>
                                    <li><a href="#" class="current-lan" data-lantext="USD">USD</a></li>
                                    <li><a href="#" data-lantext="EUR">EUR</a></li>
                                    <li><a href="#" data-lantext="GBP">GBP</a></li>
                                    <li><a href="#" data-lantext="RUR">RUR</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
            </div>
            <!--header-opt-modal end -->
        </header>
        <!-- header end  -->
        <!-- wrapper  -->
        <div id="wrapper">
            <!-- dashbard-menu-wrap -->
            <div class="dashbard-menu-overlay"></div>
            <div class="dashbard-menu-wrap">
                <div class="dashbard-menu-close"><i class="fal fa-times"></i></div>
                <div class="dashbard-menu-container">
                    <!-- user-profile-menu-->
                    <div class="user-profile-menu">
                        <h3>MENU</h3>
                        <ul class="no-list-style">
                            <li><a href="/user-dashboard"><i class="fal fa-chart-line"></i>Accueil</a></li>
                            <li><a href="/user-dashboard-profil" class="user-profile-act"><i class="fal fa-user-edit"></i> Votre profil</a></li>
                            <li><a href="/user-dashboard-message"><i class="fal fa-envelope"></i> Messages</a></li>
                            <li><a href="/user-dashboard-annonce"><i class="fal fa-users"></i>Mes annonces</a></li>
                            <li>
                                <a href="/user-dashboard-add-annonce"><i class="fal fa-plus"></i>Ajouter une annonce</a>
                            </li>
                        </ul>
                    </div>
                    <!-- user-profile-menu end-->
                    <!-- user-profile-menu-->
                    <div class="user-profile-menu">
                        <h3>MES DONNÉES</h3>
                        <ul class="no-list-style">
                            <li><a href="/user-dashboard-annonce"><i class="fal fa-th-list"></i> Annonce <span>{{auth()->user()->compte->salles->count()}}</span></a></li>
                            <li><a href="/user-dashboard-message"> <i class="fal fa-th-list"></i> Message <span>{{App\Models\Contact::where("compte_id", auth()->user()->compte->id)->count()}}</span></a></li>
                            <li><a href="/user-dashboard-annonce-photo"><i class="fal fa-th-list"></i> Photo <span>{{auth()->user()->compte->salles()->withCount("photosSalles")->get()->sum("photos_salles_count")}}</span></a></li>
                            <li><a href="/user-dashboard-annonce-video"><i class="fal fa-th-list"></i> Video <span>{{auth()->user()->compte->salles()->withCount("videoSalles")->get()->sum("video_salles_count")}}</span></a></li>
                        </ul>
                    </div>
                    <!-- user-profile-menu end-->
                </div>
                <div class="dashbard-menu-footer">© Atito 2024 Tous droits réservés!</div>
            </div>
            <!-- dashbard-menu-wrap end  -->
            <!-- content -->
            <div class="dashboard-content">
                <div class="content">
                    <!-- breadcrumbs-->
                    <!-- breadcrumbs end -->
                    <!-- col-list-wrap -->
                    <section class="gray-bg small-padding ">
                        <div class="container">
                            <div class="card-info smpar fl-wrap">
                                <!-- <div class="box-widget-menu-btn smact"><i class="far fa-ellipsis-h"></i></div>
                                <div class="show-more-snopt-tooltip bxwt">
                                    <a href="#"> <i class="fas fa-comment-alt"></i> Write a review</a>
                                    <a href="#"> <i class="fas fa-exclamation-triangle"></i> Report </a>
                                </div> -->
                                <div class="bg-wrap bg-parallax-wrap-gradien">
                                    <div class="bg" data-bg="{{asset('storage/'.str_replace('public/', '', auth()->user()->compte->logo_entreprise))}}"></div>
                                </div>
                                <div class="card-info-media">
                                    <div class="bg" data-bg="{{asset('storage/'.str_replace('public/', '', auth()->user()->compte->photo))}}"></div>
                                </div>
                                <div class="card-info-content">
                                    <div class="agent_card-title fl-wrap">
                                        <h4>{{auth()->user()->compte->nom_compte}} {{auth()->user()->compte->prenom_compte}}</h4>
                                        <div class="geodir-category-location fl-wrap">
                                            <!-- <a href="#"><i class="fas fa-map-marker-alt"></i> {{auth()->user()->compte->nom_compte}} {{auth()->user()->compte->prenom_compte}} </a>
                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="4"><span class="re_stars-title">Good</span></div> -->
                                        </div>
                                    </div>
                                    <div class="list-single-stats">
                                        <ul class="no-list-style">
                                            <li><span class="viewed-counter"> Annonces - {{auth()->user()->compte->salles->count()}} </span>
                                            </li>
                                            <li><span class="bookmark-counter"> Video - {{auth()->user()->compte->salles()->withCount('videoSalles')->get()->sum("video_salles_count")}}</span></li>
                                            <li><span class="bookmark-counter"> Photo - {{auth()->user()->compte->salles()->withCount('photosSalles')->get()->sum("photos_salles_count")}}</span></li>
                                            <li><span class="bookmark-counter"> Visites - {{auth()->user()->compte->salles()->withCount('visites')->get()->sum("visites_count")}}</span></li>
                                        </ul>
                                    </div>
                                    <!-- <div class="card-verified tolt" data-microtip-position="left" data-tooltip="Verified"><i class="fal fa-user-check"></i></div> -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="box-widget-title fl-wrap">Description</div>
                                    <div class="list-single-main-container fl-wrap">
                                        <!-- list-single-main-item -->
                                        <div class="list-single-main-item fl-wrap">
                                            <!-- <div class="list-single-main-item-title">
                                                <h3>Description</h3>
                                            </div> -->
                                            <div class="list-single-main-item_content fl-wrap">
                                                <p style="font-size: large;">{{auth()->user()->compte->description_compte}}</p>
                                                <!-- <div class="list-single-tags fl-wrap tags-stylwrap" style="margin-top: 20px;">
                                                    <span style="display: flex;">Description: &nbsp;&nbsp;&nbsp; <h3>{{auth()->user()->compte->description_compte}}</h3></span>
                                                </div> -->
                                                <div class="list-single-tags fl-wrap tags-stylwrap" style="margin-top: 20px;">
                                                    <span>Je propose:</span>
                                                    @php
                                                    $uniquetypesSalles = auth()->user()->compte()->with('salles.typeSalles')->get()
                                                                ->pluck('salles.*.typeSalles.*')
                                                                ->flatten()
                                                                ->unique('id');
                                                    @endphp
                                                    @foreach($uniquetypesSalles as $typesSalle)
                                                        <a href="#">{{$typesSalle->libelle}}</a>
                                                    @endforeach
                                                </div>
                                                <div class="list-single-tags fl-wrap tags-stylwrap" style="margin-top: 20px;">
                                                    <span style="display: flex;">Mon activité: &nbsp;&nbsp;&nbsp; <h3>{{auth()->user()->compte->activite_compte}}</h3></span>
                                                </div>
                                                <div class="list-single-tags fl-wrap tags-stylwrap" style="margin-top: 20px;">
                                                    <span style="display: flex;">Adresse: &nbsp;&nbsp;&nbsp; <h3>{{auth()->user()->compte->adresse_compte}}</h3></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- list-single-main-item end -->
                                    </div>
                                    <!-- content-tabs-wrap -->
                                    <!-- content-tabs-wrap end -->
                                </div>
                                <!-- col-md 8 end -->
                                <!--  sidebar-->
                                <div class="col-md-4">
                                    <!--box-widget-->
                                    <div class="box-widget fl-wrap" >
                                        <div class="box-widget-title fl-wrap">Mes Contacts</div>
                                        <div class="box-widget-content fl-wrap">
                                            <div class="contats-list clm fl-wrap">
                                                <ul class="no-list-style">
                                                    <li><span>Nom entreprise :</span> <a href="#">{{auth()->user()->compte->nom_entreprise}}</a></li>
                                                    <li><span><i class="fal fa-phone"></i> Téléphone :</span> <a href="#">{{auth()->user()->compte->telephone_compte}}</a></li>
                                                    <li><span><i class="fal fa-envelope"></i> Email :</span> <a href="#">{{auth()->user()->email}}</a></li>
                                                    <li><span><i class="fal fa-map-marker"></i> Adresse :</span> <a href="#">{{auth()->user()->compte->adresse_compte}}</a></li>
                                                    <li><span><i class="fal fa-browser"></i> Website :</span> <a href="#">{{auth()->user()->compte->siteweb_compte}}</a></li>
                                                </ul>
                                            </div>
                                            <div class="profile-widget-footer fl-wrap">
                                                <div class="card-info-content_social ">
                                                    <ul>
                                                        <li><a href="https://api.whatsapp.com/send?phone={{auth()->user()->compte->whatsapp_compte}}" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                                                    </ul>
                                                </div>
                                                <a href="/user-dashboard-edit-profil" class="custom-scroll-link tolt csls" data-microtip-position="left" data-tooltip="Editer le compte"><i class="fal fa-edit"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--box-widget end -->
                                    <!--box-widget-->
                                    <!-- <div class="box-widget fl-wrap">
                                        <div class="box-widget-title fl-wrap">Agensy Location</div>
                                        <div class="map-widget fl-wrap">
                                            <div class="map-container mapC_vis">
                                                <div id="singleMap" data-latitude="40.7427837" data-longitude="-73.11445617675781" data-mapTitle="Our Location" data-infotitle="Mavers RealEstate Agency" data-infotext="70 Bright St New York, USA"></div>
                                                <div class="scrollContorl"></div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!--box-widget end -->
                                    <!--box-widget-->
                                    <!-- <div class="box-widget fl-wrap">
                                        <div class="banner-widget fl-wrap">
                                            <div class="bg-wrap bg-parallax-wrap-gradien">
                                                <div class="bg  " data-bg="images/all/blog/1.jpg"></div>
                                            </div>
                                            <div class="banner-widget_content">
                                                <h5>Do you want to join our real estate network?</h5>
                                                <a href="#" class="btn float-btn color-bg small-btn">Become an Agent</a>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!--box-widget end -->
                                    <!--box-widget-->
                                    <!-- <div class="box-widget fl-wrap" id="sec-contact">
                                        <div class="box-widget-title fl-wrap box-widget-title-color color-bg">Contact Agensy
                                        </div>
                                        <div class="box-widget-content fl-wrap">
                                            <div class="custom-form">
                                                <form method="post" name="contact-property-form">
                                                    <label>Your name* <span class="dec-icon"><i class="fas fa-user"></i></span></label>
                                                    <input name="phone" type="text" onClick="this.select()" value="">
                                                    <label>Your mail * <span class="dec-icon"><i class="fas fa-envelope"></i></span></label>
                                                    <input name="mail" type="text" onClick="this.select()" value="">
                                                    <textarea cols="40" rows="3" placeholder="Your Message:" style="height: 150px"></textarea>
                                                    <button type="submit" class="btn float-btn color-bg fw-btn">
                                                        Send</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!--box-widget end -->
                                </div>
                                <!--   sidebar end-->
                            </div>
                        </div>
                        <div class="limit-box fl-wrap"></div>
                    </section>
                </div>
                <!-- dashboard-footer end -->
            </div>
            <!-- content end -->
            <div class="dashbard-bg gray-bg"></div>
        </div>
        <!-- wrapper end -->
    </div>
    <!-- Main end -->
    <!--=============== scripts  ===============-->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/plugins.js"></script>
    <script src="/js/scripts.js"></script>
    <script src="/js/dashboard.js"></script>
</body>

</html>