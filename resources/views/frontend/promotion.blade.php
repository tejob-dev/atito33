<!DOCTYPE HTML>
<html lang="en">

<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title>ATITO</title>
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
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
                            <a href="/" class="">Accueil</a>
                            <!--second level -->

                        </li>
                        <li>
                            <a href="/recherche/promotions" class="act-link">Promotions </a>

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
                <section class="hidden-section single-par2  " data-scrollax-parent="true">
                    <div class="bg-wrap bg-parallax-wrap-gradien">
                        <div class="bg par-elem " data-bg="/images/search/espace_banniere.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
                    </div>
                    <div class="container">
                        <div class="section-title center-align big-title">
                            <h2><span>Nos récommandations !</span></h2>
                            <h4>Trouvez tous nos meuilleurs offres sur ATITO</h4>
                        </div>
                        <!-- <div class="scroll-down-wrap">
                                <div class="mousey">
                                    <div class="scroller"></div>
                                </div>
                                <span>Scroll Down To Discover</span>
                            </div> -->
                    </div>
                </section>
                <!--  section  end-->
                <!-- breadcrumbs-->
                <div class="breadcrumbs fw-breadcrumbs sp-brd fl-wrap">
                    <div class="container">
                        <div class="breadcrumbs-list">
                            <a href="/">Accueil</a><span>Promotions</span>
                        </div>
                        <div class="share-holder hid-share">
                            <a href="#" class="share-btn showshare sfcs"> <i class="fas fa-share-alt"></i> Partager </a>
                            <div class="share-container  isShare"></div>
                        </div>
                    </div>
                </div>
                <!-- breadcrumbs end -->
                <!-- col-list-wrap -->
                <section class="gray-bg small-padding ">
                    <div class="container">
                        <div class="mob-nav-content-btn  color-bg show-list-wrap-search ntm fl-wrap">Trouvez nos meuilleurs salles !</div>
                        <!-- list-searh-input-wrap-->
                        <div class="list-searh-input-wrap box_list-searh-input-wrap lws_mobile fl-wrap">
                            <div class="list-searh-input-wrap-title fl-wrap"><i class="far fa-sliders-h"></i><span>Que recherchez-vous ?</span></div>
                            <form id="searchFormer" action="/recherche/promotions" method="get">
                                @csrf
                                <div class="custom-form fl-wrap">
                                    

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="listsearch-input-item">
                                                <select id="selville" name="ville" data-placeholder="Tous les villes" class="nice-select on-radius no-search-select">
                                                    <option value="0">Tous les villes</option>
                                                    @foreach(App\Models\Ville::get() as $villeIt)
                                                    <option value="{{ $villeIt->nom_ville }}" {{ $ville?($ville == $villeIt->nom_ville?"selected":""):"" }}>{{ $villeIt->nom_ville }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="listsearch-input-item">
                                                <select id="selcommune" name="commune" data-placeholder="Tous les communes" class="nice-select on-radius no-search-select">
                                                    <option value="0" data-chained="0">Tous les communes</option>
                                                    @php $lastcommune = ""; @endphp
                                                    @foreach(App\Models\Commune::get() as $comuneIt)
                                                    @if($lastcommune != $comuneIt?($comuneIt->ville?$comuneIt->ville->nom_ville:''):'')
                                                    <option value="0" data-chained="{{ $comuneIt?($comuneIt->ville?$comuneIt->ville->nom_ville:''):''}}">-  -  -</option>
                                                    @php $lastcommune = $comuneIt?($comuneIt->ville?$comuneIt->ville->nom_ville:''):''; @endphp
                                                    @endif
                                                    <option value="{{ $comuneIt->nom_commune }}" data-chained="{{ $comuneIt?($comuneIt->ville?$comuneIt->ville->nom_ville:''):''}}" {{ $commune?($commune == $comuneIt->nom_commune?"selected":""):"" }}>{{ $comuneIt->nom_commune }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="listsearch-input-item">
                                                <select id="selquartier" name="quartier" data-placeholder="Tous les quartiers" class="nice-select on-radius no-search-select">
                                                    <option value="0" data-chained="0">Tous les quartiers</option>
                                                    @php $lastquartier = ""; @endphp
                                                    @foreach(App\Models\Quartier::get() as $quartierIt)
                                                    @if($lastquartier != optional(optional($quartierIt)->commune)->nom_commune)
                                                    <option value="0" data-chained="{{optional(optional($quartierIt)->commune)->nom_commune}}">-  -  -</option>
                                                    @php $lastquartier = optional(optional($quartierIt)->commune)->nom_commune; @endphp
                                                    @endif
                                                    <option value="{{ $quartierIt->nom_quartier }}" data-chained="{{optional(optional($quartierIt)->commune)->nom_commune}}" {{ $quartier?($quartier == $quartierIt->nom_quartier?"selected":""):"" }}>{{ $quartierIt->nom_quartier }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        
                                        <!-- listsearch-input-item -->

                                        <div class="col-sm-3">
                                            <div class="listsearch-input-item  ">
                                                <input name="nbrinvite" type="text" placeholder="Nombre d'invité(s), 50" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div>
                                        <div class="listsearch-input-item clact">
                                            <label>Tous types de commodités</label>
                                            <div class=" fl-wrap filter-tags">
                                                <ul class="no-list-style">
                                                @foreach(App\Models\Comodite::get() as $comoditeIt)
                                                    <li>
                                                        <input id="comodite{{ $comoditeIt->id }}" type="checkbox" name="comodite[]" {{ in_array($comoditeIt->id, $comodite )?'checked="checked"':'' }} value="{{ $comoditeIt->id }}">
                                                        <label for="comodite{{ $comoditeIt->id }}">{{ $comoditeIt->libel }}</label>
                                                    </li>
                                                @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <br>
                                    <div class="row">
                                        <!-- listsearch-input-item -->
                                        <!-- listsearch-input-item -->
                                        <!-- listsearch-input-item -->
                                        <div class="col-sm-6">
                                            <div class="listsearch-input-item">
                                                <select id="seltypesalle" name="typesalle" data-placeholder="Tous types de salles" class="nice-select on-radius no-search-select">
                                                    <option value="0">Tous types de salles</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="listsearch-input-item">
                                                <a href="#" class="btn color-bg fw-btn float-btn small-btn" onclick="(function(){document.querySelector('#searchFormer').submit()})();">Lancer</a>
                                            </div>
                                        </div>

                                    </div>

                                </div>


                            </form>
                            <!-- <div class="more-filter-option-wrap">
                                    <div class="more-filter-option-btn more-filter-option act-hiddenpanel"> <span>Advanced search</span> <i class="fas fa-caret-down"></i></div>
                                    <div class="reset-form reset-btn"> <i class="far fa-sync-alt"></i> Reset Filters</div>
                                </div> -->
                        </div>
                        <!-- list-searh-input-wrap end-->
                        <!-- list-main-wrap-header-->
                        <div class="list-main-wrap-header box-list-header fl-wrap">
                            <!-- list-main-wrap-title-->
                            <div class="list-main-wrap-title">
                                <h2>Resultat pour : <span> {{ $search?$search:"Salles et espaces en promotions" }} | {{ $typesalle != "0"?$typesalle:"" }} </span><strong> {{ $annonces->count() }} </strong></h2>
                            </div>
                            <!-- list-main-wrap-title end-->
                            <!-- list-main-wrap-opt-->
                            <div class="list-main-wrap-opt">
                                <!-- price-opt-->
                                <!-- <div class="price-opt">
                                        <span class="price-opt-title">Sort   by:</span>
                                        <div class="listsearch-input-item">
                                            <select data-placeholder="Popularity" class="chosen-select no-search-select" >
                                                <option>Popularity</option>
                                                <option>Average rating</option>
                                                <option>Price: low to high</option>
                                                <option>Price: high to low</option>
                                            </select>
                                        </div>
                                    </div> -->
                                <!-- price-opt end-->
                                <!-- price-opt-->
                                <div class="grid-opt">
                                    <ul class="no-list-style">
                                        <li class="grid-opt_act"><span class="two-col-grid act-grid-opt tolt" data-microtip-position="bottom" data-tooltip="Grid View"><i class="far fa-th"></i></span></li>

                                    </ul>
                                </div>
                                <!-- price-opt end-->
                            </div>
                            <!-- list-main-wrap-opt end-->
                        </div>
                        <!-- list-main-wrap-header end-->
                        <!-- listing-item-wrap-->
                        <div class="listing-item-container three-columns-grid  box-list_ic fl-wrap">
                            <!-- listing-item -->
                            @forelse($annonces as $annonce)

                            <div class="listing-item">
                                <article class="geodir-category-listing fl-wrap">
                                    <div class="geodir-category-img fl-wrap">
                                        <a href="/voir/detail/{{$annonce->id}}/annonce" class="geodir-category-img_item">
                                            <img src="{{ asset('storage/'.str_replace('public/', '', $annonce->photo)) }}" alt="image de salle" style="width: 392px; height:259px; " />
                                            <div class="overlay"></div>
                                        </a>
                                        <div class="geodir-category-location">
                                            <a href="#" class="single-map-item tolt" data-microtip-position="top-left" data-tooltip="Adresse de l'annonce"><i class="fas fa-map-marker-alt"></i> <span> {{ $annonce->adresse_salle }} </span></a>
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
                                        <h3 class="title-sin_item"><a href="/voir/detail/{{$annonce->id}}/annonce">{!!adjustpresentation2($annonce->nom_salle, 33, 33 , 1)!!}</a></h3>
                                        <div class="geodir-category-content_price">{{empty($annonce->tarif_salle)?"NOUS CONSULTEZ !":$annonce->tarif_salle." FCFA"}}</div>
                                        <h5 style="font-size: 13px; text-align: left; color: #878C9F;">{!!adjustpresentation2($annonce->presentation_salle)!!}</h5>
                                        <div class="geodir-category-content-details">
                                            <ul>
                                                @forelse($annonce->comodites as $comoditeId)
                                                <li><i class="{{$comoditeId->comodite_icon}} fontawe-icon-size" style="font-size: 13px;"></i><span>{{$comoditeId->libel}}</span></li>
                                                @empty
                                                <li>N/A</li>
                                                @endforelse
                                            </ul>
                                            @if($annonce->visites->count() > 100)
                                            <ul>
                                                <li><i class="far fa-user fontawe-icon-size"></i><span>{{ $annonce->visites->count() }} vue(s)</span></li>
                                            </ul>
                                            @endif
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <div class="geodir-category-content-details">
                                            <ul>
                                                <li> @if($annonce->commune) <i class="fas fa-map-marker-alt fontawe-icon-size"></i> @endif <span>{{ optional($annonce->commune)->nom_commune??'' }}</span></li>
                                                <li> @if($annonce->ville) <i class="far fa-angle-right fontawe-icon-size"></i> @endif <span>{{ optional($annonce->ville)->nom_ville }}</span></li>
                                                <li> @if($annonce->quartier) <i class="far fa-angle-right fontawe-icon-size"></i> @endif <span>{{ optional($annonce->quartier)->nom_quartier }}</span></li>
                                            </ul>
                                        </div>
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
                            <h1>AUCUNE ANNONNCE DISPONIBLE EST RECOMMANDÉE !!</h1>
                            @endforelse
                            <!-- listing-item end-->
                        </div>
                        <!-- listing-item-wrap end-->
                        <!-- pagination-->

                        <div class="pagination">
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
                </section>
                <div class="limit-box fl-wrap"></div>
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
    <script src="/js/plugins.js"></script>
    <script src="/js/scripts.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOU_API_KEY_HERE&libraries=places"></script>
    <script src="/js/map-single.js"></script>

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
</body>

</html>