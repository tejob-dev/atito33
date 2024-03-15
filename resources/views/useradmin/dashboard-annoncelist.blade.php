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
        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/cssc/app-limit.css">
        <link rel="stylesheet" href="/cssc/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="/cssc/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="/cssc/buttons.bootstrap4.min.css">
        <!--=============== favicons ===============-->
        <style>
            /* #table1>thead:nth-child(1) {
                display: none;
            } */

            #table1>thead>tr:nth-child(1)>th,
            #table1>thead>tr:nth-child(2)>th {
                border-right: 0.5px solid #eee !important;
            }

            #table1>tbody>tr:nth-child(1)>td,
            #table1>tbody>tr:nth-child(2)>td {
                border-right: 0.5px solid #eee !important;
                border-bottom: 0.5px solid #eee !important;
                border-top: none;
            }

            #table1>tbody>tr>td {
                text-align: center;
                padding: 8px;
                font-size: 16px;
            }

            #table1>tbody tr td:first-child {
                /* Set the width of the first cell to cover both cells */
                width: 50%;
                /* Adjust this value based on your table layout */
            }

            #table1>tbody tr td:not(:first-child) {
                /* Set the width of the first cell to cover both cells */
                width: 25%;
                /* Adjust this value based on your table layout */
            }

            #table1>tbody>tr>td>a,
            #table1>tbody>tr>td button {
                margin-top: 0;
            }
        </style>
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
                                    <div class="dashboard-search-listing" style="display: none;">
                                        <form>
                                            <input type="text" onclick="this.select()" name="search" placeholder="Rechercher" value="">
                                            <button type="submit"><i class="far fa-search"></i></button>
                                        </form>
                                    </div>
                                    <a href="/user-dashboard-add-annonce" onclick="this.preventDefault(); window.location.href = '/user-dashboard-add-annonce';" class="gradient-bg dashboard-addnew_btn">Nouveau <i class="fal fa-plus"></i></a>	
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
                                        <div class="card">
                                            <div class="">

                                                <div class="table-responsive" style="overflow-x: hidden;">
                                                    <table id="table1" class="table" style="margin: 0px 0px !important; width:100%;">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">
                                                                    LIBELLÉ ANNONCE
                                                                </th>
                                                                <th class="text-center">
                                                                    DATE D'AJOUT
                                                                </th>
                                                                <th class="text-right">
                                                                    ACTIONS
                                                                </th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                        <tfoot>

                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
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
        <div class="modal fade" id="modalGallerySalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalCenterTitle">LISTE D'IMAGE DE VOTRE ANNONCE</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="photo-atito-content" class="modal-content lightgallery">
                        
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="modalVideoSalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalCenterTitle">VIDEO D'ANNONCE</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="video-atito-content" class="modal-content">
                        
                    </div>
                </div>
            </div>
        </div>
        <!--=============== scripts  ===============-->
        <script src="/js/jquery.min.js"></script>
        <script src="/js/plugins.js"></script>
        <script src="/js/scripts.js"></script>
        <script src="/js/dashboard.js"></script>

        <script src="/js/charts.js"></script>

        <script src="/jsc/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="/jsc/jquery.dataTables.min.js"></script>
        <script src="/jsc/dataTables.bootstrap4.min.js"></script>
        <script src="/jsc/dataTables.responsive.min.js"></script>
        <script src="/jsc/responsive.bootstrap4.min.js"></script>
        <script src="/jsc/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>
        <script src="/jsc/buttons.bootstrap4.min.js"></script>
        <script src="/jsc/jszip.min.js"></script>
        <script src="/jsc/pdfmake.min.js"></script>
        <script src="/jsc/vfs_fonts.js"></script>
        <script src="/jsc/buttons.html5.min.js"></script>
        <script src="/jsc/buttons.print.min.js"></script>
        <script src="/jsc/buttons.colVis.min.js"></script>
        <script>
            $(function() {

                // $('#table1 thead tr')
                //     .clone(true)
                //     .addClass('filters')
                //     .appendTo('#table1 thead');

                var table = $('#table1').DataTable({
                    dom: 'Bfrtp',
                    info: false,
                    bInfo: false,
                    initComplete: function() {
                        $('.btnshowsallephoto').on('click', function(e) {
                            console.log(e);
                            let salleId = $(e.target).data("salleid"); // Change this to the actual salle_id value you want to pass
                            console.log(salleId);
                            $.ajax({
                                url: '/api/render/photo/salles?salle_id=' + salleId+'&u_id={{auth()->user()->id}}',
                                method: 'GET',
                                success: function(data) {
                                    // Handle successful response
                                    $("#photo-atito-content").html(data);
                                },
                                error: function(xhr, status, error) {
                                    // Handle error
                                    console.error(xhr.responseText);
                                }
                            });
                        });
                        $('.btnshowsvideo').on('click', function(e) {
                            console.log(e);
                            let salleId = $(e.target).data("salleid"); // Change this to the actual salle_id value you want to pass
                            console.log(salleId);
                            $.ajax({
                                url: '/api/render/video/salles?salle_id=' + salleId+'&u_id={{auth()->user()->id}}',
                                method: 'GET',
                                success: function(data) {
                                    // Handle successful response
                                    $("#video-atito-content").html(data);
                                },
                                error: function(xhr, status, error) {
                                    // Handle error
                                    console.error(xhr.responseText);
                                }
                            });
                        });

                        var api = this.api();

                        // For each column
                        api.columns()
                            .eq(0)
                            .each(function (colIdx) {
                                // Set the header cell to contain the input element
                                var cell = $('.filters th').eq(
                                    $(api.column(colIdx).header()).index()
                                );
                                var title = $(cell).text();
                                $(cell).html('<input type="text" placeholder="..." style="min-width: 40px;width: 100%;border: 1px solid #c1bdbd;border-radius: 7px;" />');
            
                                // On every keypress in this input
                                $(
                                    'input',
                                    $('.filters th').eq($(api.column(colIdx).header()).index())
                                )
                                    .off('keyup change')
                                    .on('change', function (e) {
                                        // Get the search value
                                        $(this).attr('title', $(this).val());
                                        var regexr = '({search})'; //$(this).parents('th').find('select').val();
            
                                        var cursorPosition = this.selectionStart;
                                        // Search the column for that value
                                        api
                                            .column(colIdx)
                                            .search(
                                                this.value != ''
                                                    ? regexr.replace('{search}', '(((' + this.value + ')))')
                                                    : '',
                                                this.value != '',
                                                this.value == ''
                                            )
                                            .draw();
                                    })
                                    .on('keyup', function (e) {
                                        e.stopPropagation();
            
                                        $(this).trigger('change');
                                        $(this)
                                            .focus()[0]
                                            .setSelectionRange(cursorPosition, cursorPosition);
                                    });
                            });
                    },
                    processing: true,
                    serverSide: true,
                    ajax: "/annonces/0/data",
                    columns: [{
                            data: 'nom_salle',
                            name: 'nom_salle'
                        },
                        {
                            data: 'createdat',
                            name: 'createdat'
                        },
                        {
                            data: 'actions',
                            name: 'actions'
                        },
                    ],
                    columnDefs: [{
                            "targets": [0],
                            "rowspan": 4
                        },
                        {
                            "targets": [1],
                            "colspan": 1
                        },
                        {
                            "targets": [2],
                            "rowspan": 1
                        }
                    ],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json',
                    },
                    buttons: [],
                    // searching: true,
                    order: [
                        [0, 'desc']
                    ],
                    responsive: true,
                }).buttons().container().enable();

            });
        </script>
    </body>
</html>