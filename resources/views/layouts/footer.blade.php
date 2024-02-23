    <div class="subscribe-wrap fl-wrap">
        <div class="container">
            <div class="subscribe-container fl-wrap color-bg">
                <div class="pwh_bg"></div>
                <div class="mrb_dec mrb_dec3"></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="subscribe-header">
                            <h4>Newsletter</h4>
                            <h3>Restez à l'écoute</h3>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <div class="footer-widget fl-wrap">
                            <div class="subscribe-widget fl-wrap">
                                <div class="subcribe-form">
                                    <form method="post" id="subscribe" action="/contacts/newsletter">
                                        @csrf
                                        <input class="enteremail fl-wrap" name="email" id="subscribe-email" placeholder="Votre email" spellcheck="false" type="text">
                                        <button type="submit" id="subscribe-button" class="subscribe-button color-bg"> Soumettre</button>
                                        <label for="subscribe-email" class="subscribe-message"></label>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- subscribe-wrap end -->
    <!-- footer -->
    <footer class="main-footer fl-wrap">
        <hr style="color: #bdbdbf;">
        <br>
        <br>
        <div class="footer-inner fl-wrap">
            <div class="container">
                <div class="row">
                    <!-- footer widget-->
                    <div class="col-md-12">
                        <div class="footer-widget fl-wrap" style="
    display: flex;
    flex-direction: column;
    align-items: center;
">
                            <div class="footer-widget-logo fl-wrap" style="
    display: flex;
    flex-direction: column;
    align-items: center;
">
                                <img src="/images/logo-atito.png" alt="Logo ATITO">
                            </div>
                            <p>Leader de la location de salles et d'espaces pour tout type d'évènement privé ou professionnel.</p>
                            <div class="fw_hours fl-wrap" style="
    display: flex;
    flex-direction: column;
    align-items: center;
">
                                <span>Tous les jours:<strong> 24h/24</strong></span>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row" style="display: flex;justify-content: center;">
                    <!-- footer widget end-->
                    <!-- footer widget-->
                    <!-- footer widget end-->
                    <!-- footer widget-->
                    <div class="col-md-3">
                        <div class="footer-widget fl-wrap">
                            <div class="footer-widget-title fl-wrap">
                                <a href="#">Contact</a>
                            </div>
                            &nbsp;
                            <div class="footer-widget-title fl-wrap">
                                <a href="#">Mentions&nbsp;légales</a>
                            </div>
                            &nbsp;
                            <div class="footer-widget-title fl-wrap">
                                <a href="#">Publicités</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--sub-footer-->
        <div class="sub-footer gray-bg fl-wrap">
            <div class="container">
                <div class="copyright"> ATITO 2022 . Tous droits réservés.</div>
                <div class="subfooter-nav">
                    <ul class="no-list-style">
                        <li><a href="#">Mentions légales</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--sub-footer end -->
    </footer>
    <!-- footer end -->
    </div>
    <!-- wrapper end -->
    <!--register form -->
    <div class="main-register-wrap modal">
        <div class="reg-overlay"></div>
        <div class="main-register-holder tabs-act">
            <div class="main-register-wrapper modal_main fl-wrap">
                <div class="main-register">
                    <div class="close-reg"><i class="fal fa-times"></i></div>
                    <ul class="tabs-menu fl-wrap no-list-style">
                        <li class="current"><a href="#tab-1"><i class="fal fa-sign-in-alt"></i> Connexion</a></li>
                        <li><a href="#tab-2"><i class="fal fa-user-plus"></i> Enregistrement</a></li>
                    </ul>
                    <!--tabs -->
                    <div class="tabs-container">
                        <div class="tab">
                            <!--tab -->
                            <div id="tab-1" class="tab-content first-tab">
                                <div class="custom-form">
                                    <form method="post" name="registerform" action="/login">
                                        @csrf
                                        <label>Votre email <span class="dec-icon"><i class="fal fa-user"></i></span></label>
                                        <input name="email" type="text" onClick="this.select()" value="">
                                        <div class="pass-input-wrap fl-wrap">
                                            <label>Mot de passe * <span class="dec-icon"><i class="fal fa-key"></i></span></label>
                                            <input name="password" type="password" autocomplete="off" onClick="this.select()" value="">
                                            <span class="eye"><i class="fal fa-eye"></i> </span>
                                        </div>
                                        <!-- <div class="lost_password">
                                            <a href="#">Lost Your Password?</a>
                                        </div> -->
                                        <div class="filter-tags">
                                            <input id="check-a3" type="checkbox" name="remember">
                                            <label for="check-a3">S'en souvenir</label>
                                        </div>
                                        <div class="clearfix"></div>
                                        <button type="submit" class="log_btn color-bg"> Connexion </button>
                                    </form>
                                </div>
                            </div>
                            <!--tab end -->
                            <!--tab -->
                            <div class="tab">
                                <div id="tab-2" class="tab-content">
                                    <div class="custom-form">
                                        <form method="post" name="registerform" class="main-register-form" id="main-register-form2" action="/register/custom">
                                            @csrf
                                            <label>Votre nom <span class="dec-icon"><i class="fal fa-user"></i></span></label>
                                            <input name="nom" type="text" onClick="this.select()" value="">
                                            <label>Votre prenom(s) <span class="dec-icon"><i class="fal fa-user"></i></span></label>
                                            <input name="prenom" type="text" onClick="this.select()" value="">
                                            <label>Votre email<span class="dec-icon"><i class="fal fa-envelope"></i></span></label>
                                            <input name="email" type="email" onClick="this.select()" value="">
                                            <label>Votre téléphone (+prefix)<span class="dec-icon"><i class="fal fa-envelope"></i></span></label>
                                            <input name="phone" type="text" onClick="this.select()" value="">
                                            <label>Votre entreprise<span class="dec-icon"><i class="fal fa-envelope"></i></span></label>
                                            <input name="nom_entreprise" type="text" onClick="this.select()" value="">
                                            <div class="pass-input-wrap fl-wrap">
                                                <label>Mot de passe (8 caractères minimum)<span class="dec-icon"><i class="fal fa-key"></i></span></label>
                                                <input name="password" type="password" autocomplete="off" onClick="this.select()" value="">
                                                <span class="eye"><i class="fal fa-eye"></i> </span>
                                            </div>
                                            <div class="pass-input-wrap fl-wrap">
                                                <label>Comfirmer <span class="dec-icon"><i class="fal fa-key"></i></span></label>
                                                <input name="password_confirmation" type="password" autocomplete="off" onClick="this.select()" value="">
                                                <span class="eye"><i class="fal fa-eye"></i> </span>
                                            </div>
                                            <div class="filter-tags ft-list">
                                                <input id="check-a2" type="checkbox" name="check">
                                                <label for="check-a2">J'accepte la <a href="#">Politique de confidentialité</a> & <a href="#">Conditions générales</a></label>
                                            </div>
                                            <div class="clearfix"></div>
                                            <button type="submit" class="log_btn color-bg"> S'enrégister </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--tab end -->
                        </div>
                        <!--tab end -->
                    </div>
                    <!--tabs end -->
                    <!-- <div class="log-separator fl-wrap"><span>or</span></div>
                    <div class="soc-log fl-wrap">
                        <p>For faster login or register use your social account.</p>
                        <a href="#" class="facebook-log"> Facebook</a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <div id="back-recherche-plus" class="main-register-wrap">
        <div id="over-recherche-plus" class=""></div>
        <div class="main-register-holder tabs-act">
            <div id="recherche-plus" class="main-register-wrapper fl-wrap">
                <div class="main-register">
                    <div class="close-reg"><i class="fal fa-times"></i></div>
                    <!-- list-searh-input-wrap-->
                    <div class="list-searh-input-wrap box_list-searh-input-wrap lws_mobile fl-wrap">
                        <div class="list-searh-input-wrap-title fl-wrap"><i class="far fa-sliders-h"></i><span>Que recherchez-vous ?</span></div>
                        <form id="searchFormerFoot" action="/recherche/salles" method="get">
                            @csrf
                            <div class="custom-form fl-wrap">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="listsearch-input-item">
                                            <select id="selville" name="ville" data-placeholder="Tous les villes" class="nice-select on-radius no-search-select">
                                                <option value="0">Tous les villes</option>
                                                @foreach(App\Models\Ville::get() as $villeIt)
                                                <option value="{{ $villeIt->nom_ville }}">{{ $villeIt->nom_ville }}</option>
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
                                                <option value="{{ $comuneIt->nom_commune }}" data-chained="{{ $comuneIt?($comuneIt->ville?$comuneIt->ville->nom_ville:''):''}}">{{ $comuneIt->nom_commune }}</option>
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
                                                <option value="{{ $quartierIt->nom_quartier }}" data-chained="{{optional(optional($quartierIt)->commune)->nom_commune}}">{{ $quartierIt->nom_quartier }}</option>
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
                                <div >
                                    <div class="listsearch-input-item clact">
                                        <label>Tous types de commodités</label>
                                        <div class=" fl-wrap filter-tags">
                                            <ul class="no-list-style">
                                            @foreach(App\Models\Comodite::get() as $comoditeIt)
                                                <li>
                                                    <input id="comodite{{ $comoditeIt->id }}" type="checkbox" name="comodite[]" value="{{ $comoditeIt->id }}">
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
                                            <a href="#" class="btn color-bg fw-btn float-btn small-btn" onclick="(function(){document.querySelector('#searchFormerFoot').submit()})();">Lancer</a>
                                        </div>
                                    </div>

                                </div>
                                
                                <!-- <br> -->
                            <!-- listsearch-input-item-->
                                <!-- <div class="row">
                                    <div class="col-sm-4"></div>
                                    
                                    <div class="col-sm-4"></div>
                                </div>
                                <div class="clearfix"></div> -->

                            </div>


                        </form>
                        <!-- <div class="more-filter-option-wrap">
                                <div class="more-filter-option-btn more-filter-option act-hiddenpanel"> <span>Advanced search</span> <i class="fas fa-caret-down"></i></div>
                                <div class="reset-form reset-btn"> <i class="far fa-sync-alt"></i> Reset Filters</div>
                            </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="back-message-box" class="main-register-wrap">
        <div id="over-message-box" class=""></div>
        <div class="main-register-holder tabs-act" style="margin: 10px auto 50px;">
            <div id="message-box" class="main-register-wrapper fl-wrap">
                <div class="main-register" style="background: none;">
                    <div class="close-reg" style="top: 6%;left: 97%;z-index: 99;"><i class="fal fa-times"></i></div>
                    <!-- list-searh-input-wrap-->
                    <div class="list-searh-input-wrap box_list-searh-input-wrap lws_mobile fl-wrap">
                        <div class="box-widget fl-wrap">
                            <div class="box-widget-fixed-init fl-wrap" id="sec-contact">
                                <div class="box-widget-title fl-wrap box-widget-title-color color-bg no-top-margin">Ecrivez au compte</div>
                                <div class="box-widget-content fl-wrap">
                                    <div class="custom-form">
                                        <form method="post" name="contact-property-form" action="/contacts/poster/annonce">
                                            @csrf
                                            <input id="hid_compte_id"  type="hidden" name="compte_id" value="">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!--register form end -->
    <!--secondary-nav -->
    <div class="secondary-nav">
        <!-- <ul>
            <li><a href="dashboard-add-listing.html" class="tolt" data-microtip-position="left"  data-tooltip="Sell Property"><i class="fal fa-truck-couch"></i> </a></li>
            <li><a href="listing.html" class="tolt" data-microtip-position="left"  data-tooltip="Buy Property"> <i class="fal fa-shopping-bag"></i></a></li>
            <li><a href="compare.html" class="tolt" data-microtip-position="left"  data-tooltip="Your Compare"><i class="fal fa-exchange"></i></a></li>
        </ul> -->
        <div class="progress-indicator">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 34 34">
                <circle cx="16" cy="16" r="15.9155" class="progress-bar__background" />
                <circle cx="16" cy="16" r="15.9155" class="progress-bar__progress 
                    js-progress-bar" />
            </svg>
        </div>
    </div>
    <!--secondary-nav end -->
    <a class="to-top color-bg"><i class="fas fa-caret-up"></i></a>
    <!--map-modal -->
    <div class="map-modal-wrap">
        <div class="map-modal-wrap-overlay"></div>
        <div class="map-modal-item">
            <div class="map-modal-container fl-wrap">
                <h3> <span>Listing Title </span></h3>
                <div class="map-modal-close"><i class="far fa-times"></i></div>
                <div class="map-modal fl-wrap">
                    <div id="singleMap" data-latitude="40.7" data-longitude="-73.1"></div>
                    <div class="scrollContorl"></div>
                </div>
            </div>
        </div>
    </div>

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
        },2000)
        @endif

    </script>