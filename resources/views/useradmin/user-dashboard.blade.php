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
    <link rel="stylesheet" href="/cssc/app.css">
    <link rel="stylesheet" href="/cssc/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/cssc/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/cssc/buttons.bootstrap4.min.css">

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
                            <li><a href="/user-dashboard-profil"><i class="fal fa-user-edit"></i> Votre profil</a></li>
                            <li><a href="/user-dashboard-message"><i class="fal fa-envelope"></i> Messages</a></li>
                            <li><a href="/user-dashboard-annonce"><i class="fal fa-users"></i>Mes annonces</a></li>
                            <li>
                                <a href="/user-dashboard-add-annonce" class="user-profile-act"><i class="fal fa-plus"></i>Ajouter une annonce</a>
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
                <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Menu</div>
                <div class="container dasboard-container">
                    <!-- dashboard-title -->
                    <div class="dashboard-title fl-wrap">
                        <div class="dashboard-title-item"><span>Composé une annonce</span></div>
                        <div class="dashbard-menu-header">
                            <div class="dashbard-menu-avatar fl-wrap">
                                <img src="{{asset('storage/'.str_replace('public/', '', auth()->user()->compte->photo))}}" alt="">
                                <h4>Bienvenue, <span>{{auth()->user()->name}}</span></h4>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="log-out-btn   tolt" data-microtip-position="bottom" data-tooltip="Déconnexion"><i class="far fa-power-off"></i></a>
                        </div>
                        <!--Tariff Plan menu-->
                        <div class="tfp-det-container">
                            <div class="tfp-btn"><span>Votre status : </span> <strong>Gratuit</strong></div>
                            <!-- <div class="tfp-det">
                                    <p>You Are on <a href="#">Extended</a> . Use link bellow to view details or upgrade. </p>
                                    <a href="#" class="tfp-det-btn color-bg">Details</a>
                                </div> -->
                        </div>
                        <!--Tariff Plan menu end-->
                    </div>
                    <!-- dashboard-title end -->
                    <div class="dasboard-wrapper fl-wrap no-pag">

                        <?php
                        $typeSalle = [];
                        if (request()->salleid) {
                        
                            $salle = $salleid;
                            $editing = isset($salle);
                            $typeSalle = $salleid->typeSalles()->get()->pluck("id")->toArray();
                            $salleSave = $salle;
                        } else $editing = null;
                        ?>

                        <!-- dasboard-widget-title -->
                        <div class="dasboard-widget-title fl-wrap" id="sec1">
                            <h5><i class="fas fa-info"></i>Enregistrement d'une annonce</h5>
                        </div>
                        <!-- dasboard-widget-title end -->
                        <!-- dasboard-widget-box  -->
                        <div class="dasboard-widget-box fl-wrap">
                            <form id="salle-register" action="/send/salle/register" method="post" enctype="multipart/form-data">
                                @csrf
                                @if($editing)
                                    <input type="hidden" name="forupdated" value="{{$salleSave->id}}">
                                @endif
                                <div class="custom-form">
                                    <input type="hidden" name="user_id" value="{{optional(auth()->user()->compte)->id}}">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Liste des type de salles</label>
                                            <div class="listsearch-input-item">
                                                <select name="typesalle_id" data-placeholder="Les type de salles" class="chosen-select no-search-select">
                                                    <!--  -->
                                                    @foreach(App\Models\TypeSalle::get() as $typesalleIt)
                                                    <option value="{{$typesalleIt->id}}" {{in_array($typesalleIt->id, array_filter($typeSalle))?'selected':''}}>{{$typesalleIt->libelle}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Nom de la salle<span class="dec-icon"><i class="far fa-briefcase"></i></span></label>
                                            <input name="nom_salle" type="text" placeholder="Nom de la salle" value="{{old('nom_salle', ($editing ? $salle->nom_salle : ''))}}" />
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Adresse<span class="dec-icon"><i class="far fa-map-pin"></i></span></label>
                                            <input name="adresse_salle" type="text" placeholder="Adresse" value="{{old('adresse_salle', ($editing ? $salle->adresse_salle : ''))}}" />
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Presentation de la salle</label>
                                            <div class="listsearch-input-item">
                                                <textarea name="presentation_salle" cols="40" rows="3" style="height: 235px" placeholder="" spellcheck="false">{{old('presentation_salle', ($editing ? $salle->presentation_salle : ''))}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Capacité de la salle <span class="dec-icon"><i class="far fa-th"></i></span></label>
                                            <input name="capacite_salle" type="number" min="2" placeholder="" value="{{old('capacite_salle', ($editing ? $salle->capacite_salle : ''))}}" />
                                            <label>Téléphone<span class="dec-icon"><i class="fas fa-phone-alt"></i></span></label>
                                            <input name="telephone" type="text" placeholder="" value="{{old('telephone', ($editing ? $salle->telephone : ''))}}" />
                                            <label>Email<span class="dec-icon"><i class="fas fa-envelope"></i></span></label>
                                            <input name="email_salle" type="text" placeholder="" value="{{old('email_salle', ($editing ? $salle->email_salle : ''))}}" />
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Tarif de la salle(FCFA)<span class="dec-icon"><i class="far fa-money-bill-wave"></i></span></label>
                                            <input name="tarif_salle" type="number" min="5000" placeholder="" value="{{old('tarif_salle', ($editing ? $salle->tarif_salle : ''))}}" />
                                            <label>Tel Whatsapp<span class="dec-icon"><i class="fas fa-mobile"></i></span></label>
                                            <input name="tel_whatsapp" type="text" placeholder="" value="{{old('tel_whatsapp', ($editing ? $salle->tel_whatsapp : ''))}}" />
                                            <label>Compte Facebook<span class="dec-icon"><i class="far fa-browser"></i></span></label>
                                            <input name="facebook_salle" type="text" placeholder="" value="{{old('facebook_salle', ($editing ? $salle->facebook_salle : ''))}}" />
                                            
                                        </div>
                                        <!-- <div class="col-sm-4">
                                            <label>Les accès à la salle<span class="dec-icon"><i class="far fa-money-bill-wave"></i></span></label>
                                            <input name="acces_salle" type="text" placeholder="{{old('acces_salle', ($editing ? $salle->acces_salle : ''))}}" value="" />
                                        </div> -->
                                        <!-- <div class="col-sm-4">
                                            <label>Quelles sont les logistiques<span class="dec-icon"><i class="far fa-money-bill-wave"></i></span></label>
                                            <input name="logistique_salle" type="text" placeholder="{{old('logistique_salle', ($editing ? $salle->logistique_salle : ''))}}" value="" />
                                        </div> -->
                                        <div class="col-sm-4">
                                            <label>Site internet<span class="dec-icon"><i class="far fa-browser"></i></span></label>
                                            <input name="site_internet" type="text" placeholder="" value="{{old('site_internet', ($editing ? $salle->site_internet : ''))}}" />
                                        </div>
                                        <!-- <div class="col-sm-4">
                                            <label>Date de disponibilité<span class="dec-icon"><i class="far fa-money-bill-wave"></i></span></label>
                                            <input name="date_salle" type="date" placeholder="" value="{{old('date_salle', ($editing ? Carbon\Carbon::parse($salle->date_salle)->format('Y-m-d') : ''))}}" />
                                        </div> -->
                                        
                                        <div class="col-sm-4">
                                            <label>Photo de la salle</label>
                                            <div class="listsearch-input-item">
                                                <!-- <form class="fuzone">
                                                        <div class="fu-text">
                                                            <span><i class="far fa-cloud-upload-alt"></i>Charger une image</span>
                                                            <div class="photoUpload-files fl-wrap"></div>
                                                        </div>
                                                    </form> -->
                                                <input name="photo" type="file" class="upload" multiple>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="listsearch-input-item">
                                                @if($editing)
                                                <div style="border-radius: 25px;" >
    
                                                    <img style="border-radius: 25px; width: 100px; height: 100px;" class="object-cover rounded border border-gray-200" src="{{ $editing && $salle->photo ? \Storage::url($salle->photo) : '' }}">
    
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Ville</label>
                                            <div class="listsearch-input-item">
                                                <select id="selville" name="ville_id" data-placeholder="Apartments" class="nice-select on-radius no-search-select">
                                                    <option value="0">Tous les villes</option>
                                                    @foreach(App\Models\Ville::get() as $ville)
                                                    <option value="{{$ville->id}}" {{  $editing ? (($salle->ville_id == $ville->id) ? 'selected' : ''): ""  }}>{{$ville->nom_ville}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Commune</label>
                                            <div class="listsearch-input-item">
                                                <select id="selcommune" name="commune_id" data-placeholder="Apartments" class="nice-select on-radius no-search-select">
                                                    <option value="0" data-chained="0">Tous les communes</option>
                                                    @php $lastcommune = ""; @endphp
                                                    @foreach(App\Models\Commune::get() as $comuneIt)
                                                    @if($lastcommune != isset($comuneIt)?(isset($comuneIt->ville)?$comuneIt->ville->nom_ville:''):'')
                                                    <option value="0" data-chained="{{ $comuneIt?($comuneIt->ville?$comuneIt->ville->id:''):''}}">-  -  -</option>
                                                    @php $lastcommune = $comuneIt?($comuneIt->ville?$comuneIt->ville->nom_ville:''):''; @endphp
                                                    @endif
                                                    <option value="{{ $comuneIt->id }}" {{ $editing ? (($salle->commune_id == $comuneIt->id) ? 'selected' : ''): "" }} data-chained="{{ $comuneIt?($comuneIt->ville?$comuneIt->ville->id:''):''}}">{{ $comuneIt->nom_commune }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-4">
                                            <label>Quartier</label>
                                            <div class="listsearch-input-item">
                                                <select id="selquartier" name="quartier_id" data-placeholder="Apartments" class="nice-select on-radius no-search-select">
                                                    <option value="0" data-chained="0">Tous les quartiers</option>
                                                    @php $lastquartier = ""; @endphp
                                                    @foreach(App\Models\Quartier::get() as $quartierIt)
                                                        @if($lastquartier != optional(optional($quartierIt)->commune)->nom_commune)
                                                        <option value="0" data-chained="{{optional(optional($quartierIt)->commune)->id}}">-  -  -</option>
                                                        @php $lastquartier = optional(optional($quartierIt)->commune)->nom_commune; @endphp
                                                        @endif
                                                    <option value="{{ $quartierIt->id }}" {{  $editing ? (($salle->quartier_id == $quartierIt->id) ? 'selected' : ''): ""  }} data-chained="{{optional(optional($quartierIt)->commune)->id}}">{{ $quartierIt->nom_quartier }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="listsearch-input-item clact">
                                                <label>Tous types de commodités</label>
                                                <div class=" fl-wrap filter-tags">
                                                    @php
                                                        if($editing){
                                                            $comoditeli = $salle->comodites->pluck('id')->toArray();
                                                        }
                                                    @endphp
                                                    <ul class="no-list-style">
                                                    @foreach(App\Models\Comodite::get() as $comoditeIt)
                                                        <li>
                                                            <input id="comodite{{ $comoditeIt->id }}" type="checkbox" name="comodite[]" {{  $editing ? (in_array($comoditeIt->id, $comoditeli)? 'checked=true' : ''): ""  }} value="{{ $comoditeIt->id }}">
                                                            <label for="comodite{{ $comoditeIt->id }}">{{ $comoditeIt->libel }}</label>
                                                        </li>
                                                    @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a style="cursor: pointer;" class="btn color-bg float-btn" onclick="(function(){document.querySelector('#salle-register').submit()})();">Soumettre</a>
                                </div>
                            </form>
                        </div>
                        <!-- dasboard-widget-box  end-->
                        <!-- dasboard-widget-title -->
                        
                        <!-- dasboard-widget-box  end-->
                        <!-- dasboard-widget-title -->

                    </div>
                </div>
                <div class="limit-box fl-wrap"></div>
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
    <script src="/js/jquery.chained.min.js"></script>
    <script src="/js/plugins.js"></script>
    <script src="/js/scripts.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOU_API_KEY_HERE&libraries=places"></script>
    <script src="/js/map-add.js"></script>
    <script src="/js/dashboard.js"></script>

    <script>
        $(document).ready(function() {
            $("#selcommune").chained("#selville");
            $("#selquartier").chained("#selcommune");
        });
        
    </script>

    <script>
        function confirmDelete(event) {
            // Prevent the default behavior of the link
            event.preventDefault();
            console.log(event.target.parentNode.getAttribute("href"));

            // Ask for confirmation
            const confirmDelete = confirm("Etes vous sur de vouloir supprimer ?");

            // If the user confirms
            if (confirmDelete) {
                // Send the GET request
                fetch(event.target.parentNode.getAttribute("href"), {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({ _token: "{{csrf_token()}}",  })
                })
                .then(response => {
                    if (response.ok) {
                        // Handle success if needed
                        window.location.reload();
                        console.log("Delete request sent successfully");
                    } else {
                        // Handle error if needed
                        console.error("Failed to send delete request");
                    }
                })
                .catch(error => {
                    console.error("An error occurred:", error);
                });
            }
        }

    </script>

    <script type="text/javascript">

        @if ($errors->any())
        @php $alertmessage = "";
            $loop = sizeof($errors->all());
            $index = 0;
            foreach ($errors->all() as $error){
                $alertmessage.=$error.(($index >= $loop - 1)?"":"\\n");
            }
        @endphp
        setTimeout(function(){
            window.alert("{!!$alertmessage!!}");
        },1500)
        @endif

    </script>

</body>

</html>