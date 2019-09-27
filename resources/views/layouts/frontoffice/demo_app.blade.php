<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> {{ config('app.name', 'BABCasa') }} </title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/demo_app.css') }}">
    
</head>
<body>
    <div class="container">
        <nav class="navbar">
            <a href="{{ url('/')}}"><img src="{{ asset('img/logos/logo_black_400px.png') }}" alt="BABCASA logo" width="220px"></a>
            <ul class="navbar-nav nav-menu">
                <li><a href="#">Aide</a></li>
                <li><a href="#">C'est quoi BABCasa™</a></li>
                <li><a href="#">Partenaire beta</a></li>
                <li><a href="#">Pro beta</a></li>
            </ul>
        </nav>
    </div>

    <div class="container m-t-65">
        <div class="row">
            <div class="col-md-12">
                <h1>
                    Qui sommes-nous ?
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <article>
                    <p>
                        BABCasa™ cible a devenir le plus grande marché digitale au Maroc et en nord d'afrique, grace a son eco-system informatique, communication digitale et logistique.
                        BABCasa™ vous invite a devenir notre partenaire.
                    </P>
                    <p>
                        BABCasa™ compte tous les produits dont vous aurez besion dans votre vie quotidienne, professionnel et tout autre loisir.
                    </p>
                    <p>
                        Vous pouvez aussi découvrir les nouveaux produits et promotions, et rendre facile de prendre le choix correct.
                    </p>
                    <p>
                        Mettez votre vie facile avec BABCasa™, créez votre compte maintenant gratuitement.
                    </p>
                </article>

                <article>
                    <h1>
                        Support client
                    </h1>
                    <ol>
                        <li><a href="#" class="secondary">Site d'aide.</a> Consultez notre site d’aide pour trouver des réponses à vos questions et découvrir comment profiter au maximum de BABCasa™</li>
                        <li><a href="#" class="secondary">Communauté.</a> Obtenez rapidement l’aide des utilisateurs experts de BABCasa™. Si vous ne trouvez pas de réponse à votre question, postez-la et un utilisateur y répondra sans tarder. Vous pouvez aussi proposer de nouvelles idées pour l’application.<br>
                        Voter pour les idées des innovante.</li>
                        <li><a href="#" class="secondary">Formulaire de contact.</a> Si vous ne trouvez pas de solution dans les sections Aide et Communauté et que vous voulez contacter le support client BABCasa™, posez une question via le formulaire de contact.</li>
                    </ol>
                </article>

                <article>
                    <h1>
                        Ou sélectionnez un thème :
                    </h1>
                    <ul>
                        <li>Vous souhaitez diffuser votre publicité sur BABCasa™ ? <a href="#" class="secondary">Page Annonceurs</a></li>
                        <li>Vous avez une question Presse ? <a href="#" class="secondary">Page Presse</a></li>
                        <li>Vous souhaitez poser votre candidature à une offre d’emploi ? <a href="#" class="secondary">Page Offres d’emploi</a></li>
                    </ul>
                    <p>
                        Hidden Bean, SARL. fournit le service BABCasa™ aux utilisateurs localisés aux Maroc et tous les autres marchés.
                    </p>
                </article>
            </div>
            <div class="col-md-4">
                <article>
                    <h1>Siège de BABCasa™</h1>
                    <p>
                        Hidden Bean SARL<br>
                        Garden city 1 ,Immeuble A,Magasin 4, Harhora<br>
                        Maroc<br>
                        ICE no : 00211882000054<br>
                        office@babcasa.com<br>
                    </p>
                </article>

                <article>
                    <h1>BABCasa™ autour du mande</h1>
                    <p>
                        Hidden Bean SARL<br>
                        Garden city 1 ,Immeuble A,<br>
                        Magasin 4, Harhora<br>
                        Maroc<br>
                        ICE no : 00211882000054<br>
                        office@babcasa.com<br>
                    </p>
                </article>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-2 logo-footer">
                    <a href="{{ url('/')}}"><img src="{{ asset('img/logos/Logo_white_300px.png') }}" alt="BABCASA logo"></a>
                </div>
                <div class="col-md-2">
                    <ul class="footer">
                        <li class="title">La société</li>
                        <li><a href="#">A propos</a></li>
                        <li><a href="#">Presse</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <ul class="footer">
                        <li class="title">Communautés</a></li>
                        <li><a href="#">Développeurs</a></li>
                        <li><a href="#">Marques</a></li>
                        <li><a href="#">Investisseurs</a></li>
                        <li><a href="#">Fournisseurs</a></li>                        
                    </ul>
                </div>
                <div class="col-md-2">
                    <ul class="footer">
                        <li class="title">Liens utiles</a></li>
                        <li><a href="#">Aide</a></li>
                        <li><a href="#">Partenaire beta</a></li>
                        <li><a href="#">Pro beta</a></li>
                    </ul>
                </div>
                <div class="col-md-4 text-right">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-twitter-square"></i></a>
                    <a href="#"><i class="fab fa-facebook-square"></i></a>
                </div>
            </div>
            <div class="row m-t-65">
                <div class="col-md-9">
                    <ul class="copyrights">
                        <li><a href="#">Légal</a></li>
                        <li><a href="#">Centre de confidentialité </a></li>
                        <li><a href="#">Politique de confidentialité</a></li>
                        <li><a href="#">Cookies</a></li>
                        <li><a href="#">A propos des pubs</a></li>
                    </ul>
                </div>
                <div class="col-md-3 text-right copyrights">
                    <a href="#">Français (France)</a>
                    <br>
                    © 2019 Hidden Bean 
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://kit.fontawesome.com/27fca30512.js" crossorigin="anonymous"></script>

</body>
</html>