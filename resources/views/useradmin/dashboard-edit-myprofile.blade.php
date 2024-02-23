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
                                <li><a href="/user-dashboard" ><i class="fal fa-chart-line"></i>Accueil</a></li>
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
                <?php
                    if (auth()->user()) {
                        $userconnect = auth()->user();
                        $editing = isset($userconnect);
                    } else $editing = null;
                ?>	
                <!-- content -->	
                <div class="dashboard-content">
                    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Menu</div>
                    <div class="container dasboard-container">
                        <!-- dashboard-title -->	
                            <div class="dashboard-title fl-wrap">
                            <div class="dashboard-title-item"><span>Edition du profile</span></div>
                            <div class="dashbard-menu-header">
                                <div class="dashbard-menu-avatar fl-wrap">
                                    <img src="{{asset('storage/'.str_replace('public/', '', auth()->user()->compte->photo))}}" alt="">
                                    <h4>Bienvenue, <span>{{auth()->user()->name}}</span></h4>
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('#logout-form').submit();" class="log-out-btn   tolt" data-microtip-position="bottom"  data-tooltip="Deconnexion"><i class="far fa-power-off"></i></a>
                            </div>
                            <!--Tariff Plan menu-->
                            <!-- <div class="tfp-det-container">
                                <div   class="tfp-btn"><span>Your Tariff Plan : </span> <strong>Extended</strong></div>
                                <div class="tfp-det">
                                    <p>You Are on <a href="#">Extended</a> . Use link bellow to view details or upgrade. </p>
                                    <a href="#" class="tfp-det-btn color-bg">Details</a>
                                </div>
                            </div> -->
                            <!--Tariff Plan menu end-->						
                        </div>
                        <!-- dashboard-title end -->
                        <!-- dasboard-wrapper-->
                        <div class="dasboard-wrapper fl-wrap no-pag">
                            <form id="register-compte" action="/comptes/user/store" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="dasboard-widget-title fl-wrap">
                                            <h5><i class="fas fa-user-circle"></i>Image de Profile</h5>
                                        </div>
                                        <div class="dasboard-widget-box nopad-dash-widget-box fl-wrap">
                                            <div class="edit-profile-photo">
                                                <img src="{{($editing ? asset('storage/'.str_replace('public/', '', $userconnect->compte->photo)) : '')}}" class="respimg" alt="">
                                                <!-- <div class="change-photo-btn">
                                                    <div class="photoUpload">
                                                        <span>Importer une image</span>
                                                        <input type="file" class="upload">
                                                    </div>
                                                </div> -->
                                            </div>
                                            <div class="bg-wrap bg-parallax-wrap-gradien">
                                                <div class="bg"  data-bg="{{ $editing ? asset('storage/'.str_replace('public/', '', $userconnect->compte->logo_entreprise)) : '' }}"></div>
                                            </div>
                                            <div class="change-photo-btn cpb-2  ">
                                                <div class="photoUpload color-bg">
                                                    <span> <i class="far fa-camera"></i> Modifier image de l'entreprise </span>
                                                    <input type="file" class="upload" name="logo_entreprise">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dasboard-widget-box fl-wrap">
                                            <div class="edit-profile-photo">
                                                <img src="{{asset('storage/'.str_replace('public/', '', auth()->user()->compte->photo))}}" class="respimg" alt="">
                                            </div>
                                            <div class="change-photo-btn cpb-2  ">
                                                <div class="photoUpload color-bg">
                                                    <span> <i class="far fa-camera"></i> Charger image profile </span>
                                                    <input type="file" class="upload" name="photo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dasboard-widget-title fl-wrap">
                                            <h5><i class="fas fa-key"></i>Information personnel</h5>
                                        </div>
                                        <div class="dasboard-widget-box fl-wrap">
                                            <div class="custom-form">

                                                <input type="hidden" name="currentid" value="{{auth()->user()->compte->id}}">
                                                <label>Nom<span class="dec-icon"><i class="far fa-user"></i></span></label>
                                                <input type="text" placeholder="Alica" value="{{ $editing ? $userconnect->compte->nom_compte : '' }}" name="nom_compte"/>
                                                <label>Prénoms<span class="dec-icon"><i class="fas fa-user"></i></span></label>
                                                <input type="text" placeholder="Noory" value="{{ $editing ? $userconnect->compte->prenom_compte : '' }}" name="prenom_compte"/>
                                                <label>Téléphone<span class="dec-icon"><i class="far fa-phone"></i> </span></label>
                                                <input type="text" placeholder="+(225)0707070707" value="{{ $editing ? $userconnect->compte->telephone_compte : '' }}" name="telephone_compte"/>									
                                                <label>Résidence<span class="dec-icon"><i class="far fa-home-lg-alt"></i> </span></label>
                                                <input type="text" placeholder="Yopougon, kenia" value="{{ $editing ? $userconnect->compte->adresse_compte : '' }}" name="adresse_compte"/>										
                                                <label>Quel est votre activité<span class="dec-icon"><i class="fas fa-typewriter"></i></span></label>
                                                <input type="text" placeholder="Demarcheur de cérémonie" value="{{ $editing ? $userconnect->compte->activite_compte : '' }}" name="activite_compte"/>
                                                <label>Description du compte</label>
                                                <textarea name="description_compte" cols="40" rows="3" style="height: 235px" placeholder="" spellcheck="false">{{ $editing ? $userconnect->compte->description_compte : '' }}</textarea>
                                                	
                                                <!-- <textarea cols="40" rows="3" placeholder="About Me" style="margin-bottom:20px;"></textarea>										 -->
                                            </div>
                                            <button class="btn color-bg float-btn" onclick="(function(){document.querySelector('#register-compte').submit()})();">Enrégistrer</button>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="dasboard-widget-title fl-wrap" style="margin-top: 30px;">
                                            <h5><i class="fas fa-share-alt"></i>Votre entreprise</h5>
                                        </div>
                                        <div class="dasboard-widget-box fl-wrap">
                                            <div class="custom-form">
                                                <label>Nom de l'entreprise  <span class="dec-icon"><i class="fas fa-building"></i></span></label>
                                                <input type="text" placeholder="" value="{{ $editing ? $userconnect->compte->nom_entreprise : '' }}" name="nom_entreprise"/>
                                                <label>Lien Siteweb  <span class="dec-icon"><i class="fas fa-link"></i></span></label>
                                                <input type="text" placeholder="" value="{{ $editing ? $userconnect->compte->siteweb_compte : '' }}" name="siteweb_compte"/>
                                                <label>Lien Whatsapp <span class="dec-icon"><i class="fas fa-phone"></i></span></label>
                                                <input type="text" placeholder="" value="{{ $editing ? $userconnect->compte->whatsapp_compte : '' }}" name="whatsapp_compte"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <form id="register-user" action="/userdata/user/store" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="dasboard-widget-title dbt-mm fl-wrap">
                                            <h5><i class="fas fa-key"></i>Editer Mot de passe</h5>
                                        </div>
                                        <div class="dasboard-widget-box fl-wrap">
                                            <div class="custom-form">
                                                <!-- <div class="pass-input-wrap fl-wrap">
                                                    <label>Current Password<span class="dec-icon"><i class="far fa-lock-open-alt"></i></span></label>
                                                    <input type="password" class="pass-input" placeholder="" value=""/>
                                                    <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                                                </div> -->
                                                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                                <div class="pass-input-wrap fl-wrap">
                                                    <label>Adresse Email<span class="dec-icon"><i class="fas fa-envelope"></i></span></label>
                                                    <input type="text" placeholder="alicaNoory@gmail.com" value="{{ $editing ? $userconnect->email : '' }}" name="email"/>	
                                                    
                                                </div>
                                                <div class="pass-input-wrap fl-wrap">
                                                    <label>Mot de passe<span class="dec-icon"><i class="far fa-lock-alt"></i></span></label>
                                                    <input type="password" class="pass-input" placeholder="" value="" name="password"/>
                                                    <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                                                </div>
                                                <div class="pass-input-wrap fl-wrap">
                                                    <label>Confirmer Mot de passe<span class="dec-icon"><i class="far fa-shield-check"></i> </span></label>
                                                    <input type="password" class="pass-input" placeholder="" value="" name="password_confirm"/>
                                                    <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                                                </div>
                                                <!-- <button class="btn    color-bg  float-btn">Save Changes</button> -->
                                            </div>
                                            <button class="btn color-bg float-btn" onclick="(function(){document.querySelector('#register-user').submit()})();">Enrégistrer</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- dasboard-wrapper end -->	
                    </div>
                    <!-- dashboard-footer -->
                    <div class="dashboard-footer">
                        <div class="dashboard-footer-links fl-wrap">
                            <!-- <span>Helpfull Links:</span>
                            <ul>
                                <li><a href="about.html">About  </a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="pricing.html">Pricing Plans</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="help.html">Help Center</a></li>
                            </ul> -->
                        </div>
                        <a href="#main" class="dashbord-totop  custom-scroll-link"><i class="fas fa-caret-up"></i></a>
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