<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>Atito</title>
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
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
                                <input type="radio" name="duration-1"  id="buy_sw" class="tariff-toggle" checked>
                                <label for="buy_sw">Buy</label>
                                <input type="radio" name="duration-1" class="tariff-toggle"  id="rent_sw">
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
                        <li class="current"><a href="#tab-wish">  Wishlist <span>- 3</span></a></li>
                        <li><a href="#tab-compare">  Compare <span>- 2</span></a></li>
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
                                                    <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> 40 Journal Square  , NJ, USA</a></div>
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
                                                        <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i>  70 Bright St New York, USA </a></div>
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
                                <li><a href="/user-dashboard-profil"><i class="fal fa-user-edit"></i> Votre profil</a></li>
                                <li><a href="/user-dashboard-message" ><i class="fal fa-envelope"></i> Messages</a></li>
                                <li><a href="/user-dashboard-annonce" class="user-profile-act"><i class="fal fa-users"></i>Mes annonces</a></li>
                                <li>
                                    <a href="/user-dashboard-add-annonce"><i class="fal fa-plus"></i>Ajouter une annonce</a>
                                </li>
                            </ul>
                        </div>
                        <!-- user-profile-menu end-->
                        <!-- user-profile-menu-->
                        <div class="user-profile-menu">
                            <h3>MES DONNÉES</h3>
                            <ul  class="no-list-style">
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
                    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Menu</div>
                    <div class="container dasboard-container">
                        <!-- dashboard-title -->	
                        <div class="dashboard-title fl-wrap">
                            <div class="dashboard-title-item"><span>Liste des annonces</span></div>
                            <div class="dashbard-menu-header">
                                <div class="dashbard-menu-avatar fl-wrap">
                                    <img src="{{asset('storage/'.str_replace('public/', '', auth()->user()->compte->photo))}}" alt="">
                                    <h4>Bienvenue, <span>{{auth()->user()->name}}</span></h4>
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="log-out-btn   tolt" data-microtip-position="bottom"  data-tooltip="Déconnexion"><i class="far fa-power-off"></i></a>
                            </div>
                            <!--Tariff Plan menu-->
                            <div class="tfp-det-container">
                                <div   class="tfp-btn"><span>Votre status : </span> <strong>Gratuit</strong></div>
                                <!-- <div class="tfp-det">
                                    <p>You Are on <a href="#">Extended</a> . Use link bellow to view details or upgrade. </p>
                                    <a href="#" class="tfp-det-btn color-bg">Details</a>
                                </div> -->
                            </div>
                            <!--Tariff Plan menu end-->						
                        </div>

                        <!-- dashboard-title end -->		
                        <div class="dasboard-wrapper fl-wrap">
                            <div class="dasboard-listing-box fl-wrap">
                                <div class="dasboard-opt sl-opt fl-wrap">
                                    <div class="dashboard-search-listing">
                                        <form>
                                            <input type="text" onclick="this.select()" name="search" placeholder="Rechercher" value="">
                                            <button type="submit"><i class="far fa-search"></i></button>
                                        </form>
                                    </div>
                                    <a href="/user-dashboard-add-annonce" class="gradient-bg dashboard-addnew_btn show-popup-form">Nouveau <i class="fal fa-plus"></i></a>	
                                    <!-- price-opt-->
                                    <!-- <div class="price-opt">
                                        <span class="price-opt-title">Sort   by:</span>
                                        <div class="listsearch-input-item">
                                            <select data-placeholder="Lastes" class="chosen-select no-search-select" >
                                                <option>Lastes</option>
                                                <option>Oldes</option>
                                                <option>Average rating</option>
                                                <option>Name: A-Z</option>
                                                <option>Name: Z-A</option>
                                            </select>
                                        </div>
                                    </div> -->
                                    <!-- price-opt end-->
                                    <!-- <div class="popup-form">
                                        <div class="custom-form">
                                            <label>Name <span class="dec-icon"><i class="fas fa-user"></i></span></label>
                                            <input type="text" placeholder="Alica Noory" value=""/>
                                            <label>Email Address <span class="dec-icon"><i class="far fa-envelope"></i></span></label>
                                            <input type="text" placeholder="AlicaNoory@domain.com" value=""/>
                                            <label>Agent Link<span class="dec-icon"><i class="fal fa-link"></i></span></label>
                                            <input type="text" placeholder="homeradar.net/agent-alicanoory/" value=""/>	
                                            <button type="submit" class="btn float-btn color-bg fw-btn"> Send</button>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- dashboard-listings-wrap-->
                                <?php
                                    $search = request()->get('search', '');

                                    if(!empty($search))
                                        $annonces = auth()->user()->compte->salles()->search($search)->paginate(6);
                                    else $annonces = auth()->user()->compte->salles()->with('comodites')->paginate(6);
                                    
                                    
                                    $annoncesHtml = $annonces->links();
                                    
                                ?>
                                <div class="dashboard-listings-wrap fl-wrap">
                                    <div class="row">
                                        <!-- dashboard-listings-item-->
                                        @forelse($annonces as $annonce)
                                        <div class="col-md-4">
                                            <!--  agent card item -->
                                            <div class="listing-item">
                                                <article class="geodir-category-listing fl-wrap">
                                                    <div class="geodir-category-img fl-wrap  agent_card">
                                                        <a href="agent-single.html" class="geodir-category-img_item">
                                                            <img src="{{ asset('storage/'.str_replace('public/', '', $annonce->photo)) }}" alt="">
                                                        </a>
                                                        <!-- <div class="listing-rating card-popup-rainingvis" data-starrating2="5"><span class="re_stars-title">Excellent</span></div> -->
                                                    </div>
                                                    <div class="geodir-category-content fl-wrap">
                                                        <div class="card-verified tolt" data-microtip-position="left" data-tooltip="Verified"></div>
                                                        <div class="agent_card-title fl-wrap">
                                                            <h4><a href="#" >{{$annonce->nom_salle}}</a></h4>
                                                            <br>
                                                            <h4>TARIF: <span>{{$annonce->tarif_salle}} Fcfa</span></h4>
                                                            <h5><a href="#">{{optional($annonce->ville)->nom_ville!=""?$annonce->ville->nom_ville." > ":""  }}{{optional($annonce->commune)->nom_commune!=""?$annonce->commune->nom_commune." > ":"" }}{{optional($annonce->quartier)->nom_quartier!=""?$annonce->quartier->nom_quartier:""}} | {{$annonce->type}}</a></h5>
                                                            <br>
                                                            <h5><a href="#">{{substr($annonce->presentation_salle, 0, 150).'…'}}</a></h5>
                                                        </div>
                                                        <div class="agent-card-facts fl-wrap">
                                                            <ul>
                                                                @forelse($annonce->comodites as $comodite)
                                                                <li>{{$comodite->libel}}</li>
                                                                @empty
                                                                <li>N/A</li>
                                                                @endforelse
                                                            </ul>
                                                        </div>
                                                        <div class="geodir-category-footer fl-wrap">
                                                            <a href="/user-annonce-detail/{{$annonce->id}}" class="btn float-btn color-bg small-btn">Dérouler</a>
                                                            <form action="/salles/{{$annonce->id}}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimé?')" style="text-align: center;box-sizing: border-box;border: 0;outline: 0;font-weight: inherit;font-style: inherit;font-family: inherit;vertical-align: baseline;padding: 0;text-decoration: none;position: relative;float: right;margin: 3px 0 0 0px;font-size: 16px;color: #878C9F;">
                                                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                                                <input type="hidden" name="_method" value="DELETE" /> 
                                                                <button type="submit" class="tolt ftr-btn" data-microtip-position="left" data-tooltip="Supprimer" style="border: none;color: #9ca0b0;background: transparent;font-size: medium;">
                                                                    <i class="fal fa-trash"></i> 
                                                                </button>
                                                            </form>
                                                            <a href="/user-annonce-detail/{{$annonce->id}}/edit" class="tolt ftr-btn" data-microtip-position="left" data-tooltip="Editer"><i class="fal fa-edit"></i></a>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                            <!--  agent card item end -->										
                                        </div>
                                        @empty
                                        <h2 style="padding: 20px 0px;">PAS D'ANNONCE DISPONIBLE / SI VOUS AVEZ UNE ANNONCE ENREGISTRÉE, ELLE EST EN COUR DE VALIDATION</h2>
                                        @endforelse
                                        <!-- dashboard-listings-item end-->												
                                    </div>
                                </div>
                                <!-- dashboard-listings-wrap end-->
                            </div>
                            <!-- pagination-->
                            <!-- <div class="pagination float-pagination">
                                <a href="#" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
                                <a href="#" >1</a>
                                <a href="#" class="current-page">2</a>
                                <a href="#">3</a>
                                <a href="#">4</a>
                                <a href="#" class="nextposts-link"><i class="fa fa-caret-right"></i></a>
                            </div> -->
                            <div class="pagination float-pagination">
                                @if ($annonces->onFirstPage())
                                    <a href="#" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
                                @else
                                    <a href="{{ $annonces->previousPageUrl() }}" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
                                @endif

                                @foreach ($annonces->getUrlRange(1, $annonces->lastPage()) as $page => $url)
                                    @if ($page == $annonces->currentPage())
                                        <a class="current-page">{{ $page }}</a>
                                    @else
                                        <a href="{{ $url }}">{{ $page }}</a>
                                    @endif
                                @endforeach

                                @if ($annonces->hasMorePages())
                                    <a href="{{ $annonces->nextPageUrl() }}" class="nextposts-link"><i class="fa fa-caret-right"></i></a>
                                @else
                                    <a href="#" class="nextposts-link"><i class="fa fa-caret-right"></i></a>
                                @endif
                            </div>

                            <!-- pagination end-->	
                        </div>
                    </div>
                    <!-- dashboard-footer -->
                    <!-- <div class="dashboard-footer">
                        <div class="dashboard-footer-links fl-wrap">
                            <span>Helpfull Links:</span>
                            <ul>
                                <li><a href="about.html">About  </a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="pricing.html">Pricing Plans</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="help.html">Help Center</a></li>
                            </ul>
                        </div>
                        <a href="#main" class="dashbord-totop  custom-scroll-link"><i class="fas fa-caret-up"></i></a>
                    </div> -->
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