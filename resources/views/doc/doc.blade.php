<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Documentation</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Bootstrap 4 Template For Software Startups">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome JS-->
    <script defer src="assets/doc/fontawesome/js/all.min.js"></script>
    
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.2/styles/atom-one-dark.min.css">
    <link rel="stylesheet" href="assets/doc/plugins/simplelightbox/simple-lightbox.min.css">

    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/doc/css/theme.css">

	<style>
		.theme-icon-holder{
    
    		color: #006cd3 !important;
    
		}

		.social-list li a {
			color: #006cd3  !important;
		}

		.btn-primary {
			background:  #006cd3  !important;
			
		}

		.docs-nav .nav-item.active .nav-link .theme-icon-holder,.docs-nav .nav-link.active .theme-icon-holder {
			
			background: #ddd9d9 !important;
			color: #006cd3  !important;
		}
	</style>

</head> 

<body class="docs-page">    
    <header class="header fixed-top">	    
        <div class="branding docs-branding">
            <div class="container-fluid position-relative py-2">
                <div class="docs-logo-wrapper">
					<button id="docs-sidebar-toggler" class="docs-sidebar-toggler docs-sidebar-visible me-2 d-xl-none" type="button">
	                    <span></span>
	                    <span></span>
	                    <span></span>
	                </button>
	                <div class="site-logo"><a class="navbar-brand" href="/doc"><img style="max-height: 50px;" class="logo-icon me-2" src="assets/doc/images/logo.png" alt="logo"><span class="logo-text">ProBuySell<span class="text-alt"> Documentation</span></span></a></div>    
                </div><!--//docs-logo-wrapper-->
	            <div class="docs-top-utilities d-flex justify-content-end align-items-center">
	                <!--<div class="top-search-box d-none d-lg-flex">
		                <form class="search-form">
				            <input type="text" placeholder="Search the docs..." name="search" class="form-control search-input">
				            <button type="submit" class="btn search-btn" value="Search"><i class="fas fa-search"></i></button>
				        </form>
	                </div>-->
	
					<ul class="social-list list-inline mx-md-3 mx-lg-5 mb-0 d-none d-lg-flex">
						<li class="list-inline-item"><a href="#"><i class="fab fa-whatsapp fa-fw"></i></a></li>
			            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter fa-fw"></i></a></li>
		                <li class="list-inline-item"><a href="#"><i class="fab fa-telegram fa-fw"></i></a></li>
		                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook fa-fw"></i></a></li>
		            </ul><!--//social-list-->
		            <a href="home" class="btn btn-primary d-none d-lg-flex">Accueil</a>
	            </div><!--//docs-top-utilities-->
            </div><!--//container-->
        </div><!--//branding-->
    </header><!--//header-->
    
    
    <div class="docs-wrapper">
	    <div id="docs-sidebar" class="docs-sidebar">
		    <div class="top-search-box d-lg-none p-3">
                <form class="search-form">
		            <input type="text" placeholder="Search the docs..." name="search" class="form-control search-input">
		            <button type="submit" class="btn search-btn" value="Search"><i class="fas fa-search"></i></button>
		        </form>
            </div>
		    <nav id="docs-nav" class="docs-nav navbar">
			    <ul class="section-items list-unstyled nav flex-column pb-3">
				    <li class="nav-item section-title"><a class="nav-link scrollto active" href="#section-1"><span class="theme-icon-holder me-2"><i class="fas fa-money-bill"></i></span>Vente</a></li>
				    <li class="nav-item"><a class="nav-link scrollto" href="#item-1-1">Prérequis</a></li>
				    <li class="nav-item"><a class="nav-link scrollto" href="#item-1-2">Formulaire de vente</a></li>
				    <li class="nav-item"><a class="nav-link scrollto" href="#item-1-3">Traitement des operations</a></li>
				    <li class="nav-item"><a class="nav-link scrollto" href="#item-1-4">Gestion des erreurs</a></li>
				    
				    <li class="nav-item section-title mt-3"><a class="nav-link scrollto" href="#section-2"><span class="theme-icon-holder me-2"><i class="fas fa-cart-shopping"></i></span>Achat</a></li>
				    <li class="nav-item"><a class="nav-link scrollto" href="#item-2-1">Prérequis</a></li>
				    <li class="nav-item"><a class="nav-link scrollto" href="#item-2-2">Formulaire d'achat</a></li>
				    <li class="nav-item"><a class="nav-link scrollto" href="#item-2-3">Traitement des operations</a></li>
					<li class="nav-item"><a class="nav-link scrollto" href="#item-2-4">Gestion des erreurs</a></li>
				    <li class="nav-item section-title mt-3"><a class="nav-link scrollto" href="#section-3"><span class="theme-icon-holder me-2"><i class="fas fa-box"></i></span>Affiliation</a></li>
				    <li class="nav-item"><a class="nav-link scrollto" href="#item-3-1">Liens d'Affiliation</a></li>
				    <li class="nav-item"><a class="nav-link scrollto" href="#item-3-2">Solde d'Affiliation</a></li>
				    <li class="nav-item"><a class="nav-link scrollto" href="#item-3-3">Retrait des gains</a></li>
				    <li class="nav-item section-title mt-3"><a class="nav-link scrollto" href="#section-4"><span class="theme-icon-holder me-2"><i class="fas fa-cogs"></i></span>Applications</a></li>
				    
				    <li class="nav-item section-title mt-3"><a class="nav-link scrollto" href="#section-5"><span class="theme-icon-holder me-2"><i class="fas fa-tools"></i></span>FAQ</a></li>
				    
				   

			    </ul>

		    </nav><!--//docs-nav-->
	    </div><!--//docs-sidebar-->
	    <div class="docs-content">
		    <div class="container">

			    <article class="docs-article" id="section-1">

				    <header class="docs-header">
					    <h1 class="docs-heading">Procedure de vente <span class="docs-time">Last updated: 2023-06-01</span></h1>
					    <section class="docs-intro">
						    <p>La vente des dévises est l'une des trois principaux fonctionalités de ProBuySell. Nous avons organisé les Procedures de façon à optimser votre experience  tout en garatissant votre securité. si vous êtes un habitué des plates formes de traiding de crypto-monaie, nos formulaires et nos Procedures vous seront familié, si non la simplicité et la clarté de nos interface ainsi que le contenu de cette documentation vous aiderons a travailler avec nous sans difficulté.</p>
						</section><!--//docs-intro-->
						
				    </header>

				    <section class="docs-section" id="item-1-1">
						<h2 class="section-heading">Prérequis</h2>
						<p>Pour réussir votre opération de vente, vous avez besoin de réunir les éléments et les conditions suivants: </p>
						
                        
                        <div class="callout-block callout-block-info">
                            
                            <div class="content">
                                <h4 class="callout-title">
	                                <span class="callout-icon-holder me-1">
		                                <i class="fas fa-user"></i>
		                            </span><!--//icon-holder-->
	                                Disposer d'un compte utilisateur ProBuySell
	                            </h4>
                                <p>Le compte utilisateur est une condition obligatoire dans l'ensemble des fonctionalités de ProBuySell, il nous permet de vous authenfier, de garder une trace de vos operation, d'eviter les erreurs lors des transactions de fonds et d'assurer la securité des parties. Si vous ne disposez pas encore d'un compte, <a href="#">cliquez ici pour creer votre compte ProBuySell</a>.</p>
                            </div><!--//content-->
                        </div><!--//callout-block-->
                        
                        <div class="callout-block callout-block-warning">
                            <div class="content">
                                <h4 class="callout-title">
	                                <span class="callout-icon-holder me-1">
		                                <i class="fas fa-wallet"></i>
		                            </span><!--//icon-holder-->
	                                Moyen de paiement
	                            </h4>
                                <p>Vous devez disposer d'un porte feuille electronique fiable sur lequel l'equipe de ProBuySell transferat les font de l'operation de vente. les moyens de paiement accepté sont les suivants:. Nous recommandons d'enregistrer vos moyens de paiement a l'avance sur la <a href="#">Section de configuration de moyens de paiement</a>. </p>
                            </div><!--//content-->
                        </div><!--//callout-block-->
                        
                        <div class="callout-block callout-block-success">
                            <div class="content">
                                <h4 class="callout-title">
	                                <span class="callout-icon-holder me-1">
		                                <i class="fas fa-thumbs-up"></i>
		                            </span><!--//icon-holder-->
	                                Preuve de transaction
	                            </h4>
                                <p>Une fois que vous renseignez la monaie que vous souhaitez vendre dans le formulaire de vente, vous devez transferer les fonts à l'adresse indiqué et faire une capture d'ecran du message de validation de la transaction. Nous avons besoin de cette capture pour nous rassurer que la transaction est effectué et proceder au paiement dans votre compte. </p>
                            </div><!--//content-->
                        </div><!--//callout-block-->
                        
                       
                        
                       
					</section><!--//section-->
					
					<section class="docs-section" id="item-1-2">
						<h2 class="section-heading">Formulaire de vente</h2>
						<p>
							Le Formulaire d'achat/vente est le moyen par lequel vous communiquez avec l'equipe de ProBuySell lors d'une operation. Il vous permet de renseigner  les information dont nous avons besoin pour traiter une transaction. <br>
							La procedure de vente comprend deux etapes avec deux formulaires distincts: le formulaire principal et le formulaire de confirmation. 
						</p>

						<h5 class="mt-5">Formulaire principal:</h5>
						
						<p>le formulaire principal vous permet de renseigner les informations esentiels comme la monaie a vendre, le montant a vendre et la methode de paiement par laquelle vous souhaitez recevoir les fonds. c'est egalement sur ce formulaire que ProBuySell renseigne ses taux de change et la somme qui sera versé dans votre compte.</p>
						
						<div class="simplelightbox-gallery ">
							<div class="r">
						        <a href="assets/doc/images/formulaire_principal.PNG"><img class="figure-img img-fluid shadow rounded" src="assets/doc/images/formulaire_principal.PNG" alt="" title="Formulaire principal"/></a>
							</div>
							
							
						</div><!--//gallery-->

						<h5 class="mt-5">Formulaire de confirmation:</h5>
						
						<p>Le formulaire de confirmation fait la synthése des informations renseigné dans le formulaire principal. Vous pouvez changer ces informations si vous le souhaitez. c'est egalement ici que vous devez inserer la capture d'ecran de la preuve de transaction et choisir l'adresse a la quelle vous souhaitez recevoir le paiement.</p>
						
						<div class="simplelightbox-gallery ">
							<div class="r">
						        <a href="assets/doc/images/formulaire_confirmation.PNG"><img class="figure-img img-fluid shadow rounded" src="assets/doc/images/formulaire_confirmation.PNG" alt="" title="Formulaire de confirmation"/></a>
							</div>
							
							
						</div><!--//gallery-->
						
						
					</section><!--//section-->
					
					<section class="docs-section" id="item-1-3">
						<h2 class="section-heading">Traitement des operations</h2>
						<p>Une fois le formulaire de confirmation soumis, l'équipe de ProBuySell se charge de traiter votre demande selon les informations renseigné. la durée du traiment peut varier entre 0 et 24H et le processus se fait en 3 etapes:</p>
						
						

						<div class="callout-block callout-block-success">
							<div class="content">
								<h4 class="callout-title">
									<span class="callout-icon-holder me-1">
										<i class="fas fa-circle-check"></i>
									</span><!--//icon-holder-->
									Verification de la preuve de transaction
								</h4>
								<p>La preuve de transaction est l'element crucial dans une operation de vente, c'est elle que nous verifions en premier avant de proceder aux transfert des fonds. Vous devez veuillez a nous envoyer des captures lisible avec les informations essentiels mis en evidence. </p>
							</div><!--//content-->
						</div><!--//callout-block-->


						<div class="callout-block callout-block-info">
                            <div class="content">
                                <h4 class="callout-title">
	                                <span class="callout-icon-holder me-1">
		                                <i class="fas fa-wallet"></i>
		                            </span><!--//icon-holder-->
	                                Transfert des fonds
	                            </h4>
                                <p>Une fois que votre preuve de transaction a été verifier, nous passons a la verification du moyen de paiement que vous avez renseigné sur le formulaire. si celui est valide, nous transferons immediatement les fonds, si non, nous vous contactons pour signaler l'erreur. </p>
                            </div><!--//content-->
                        </div><!--//callout-block-->
                        
                        <div class="callout-block callout-block-warning">
                            <div class="content">
                                <h4 class="callout-title">
	                                <span class="callout-icon-holder me-1">
		                                <i class="fas fa-thumbs-up"></i>
		                            </span><!--//icon-holder-->
	                                Validation de la vente
	                            </h4>
                                <p>Apres le transfert des fonds dans votre compte, nous marquons la transaction comme terminer. Vous pouvez avoir acces à l'ensemble de vos opérations ainsi que leurs statut dans l'historique des transactions </p>
                            </div><!--//content-->
                        </div><!--//callout-block-->
                        
                        

					</section><!--//section-->
					
					<section class="docs-section" id="item-1-4">
						<h2 class="section-heading">Gestion des erreurs de vente</h2>
						<p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris, vitae facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id. Sed interdum turpis quis felis bibendum imperdiet. Mauris pellentesque urna eu leo gravida iaculis. In fringilla odio in felis ultricies porttitor. Donec at purus libero. Vestibulum libero orci, commodo nec arcu sit amet, commodo sollicitudin est. Vestibulum ultricies malesuada tempor.</p>
						
						
						
					</section><!--//section-->
					
					
			    </article>
			    
			    <article class="docs-article" id="section-2">
				    <header class="docs-header">
					    <h1 class="docs-heading">Procedure d'achat</h1>
					    <section class="docs-intro">
						    <p>Acheter des devises est tout aussi simple que la vente sur ProBuySell, La procedure suit les mêmes etapes et beneficie de la même simplicité, seul la nature de l'operation et quelques elements des formulaires changent.</p>
						</section><!--//docs-intro-->
				    </header>
					<section class="docs-section" id="item-2-1">
						<h2 class="section-heading">Prérequis</h2>
						<p>Pour réussir votre opération d'achat, vous avez besoin de réunir les éléments et les conditions suivants: </p>
						
                        
                        <div class="callout-block callout-block-info">
                            
                            <div class="content">
                                <h4 class="callout-title">
	                                <span class="callout-icon-holder me-1">
		                                <i class="fas fa-user"></i>
		                            </span><!--//icon-holder-->
	                                Disposer d'un compte utilisateur ProBuySell
	                            </h4>
                                <p>Le compte utilisateur est une condition obligatoire dans l'ensemble des fonctionalités de ProBuySell, il nous permet de vous authenfier, de garder une trace de vos operation, d'eviter les erreurs lors des transactions de fonds et d'assurer la securité des parties. Si vous ne disposez pas encore d'un compte, <a href="#">cliquez ici pour creer votre compte ProBuySell</a>.</p>
                            </div><!--//content-->
                        </div><!--//callout-block-->
                        
                        <div class="callout-block callout-block-warning">
                            <div class="content">
                                <h4 class="callout-title">
	                                <span class="callout-icon-holder me-1">
		                                <i class="fas fa-wallet"></i>
		                            </span><!--//icon-holder-->
	                                Adresse de porte feuille Crypto
	                            </h4>
                                <p>Vous devez disposer d'un porte feuille de monaie electronique fiable sur lequel l'equipe de ProBuySell transferat la crypto-monaie que vous allez acheter. les types les crypto-monaie supporté sont les suivantes:. Nous recommandons d'enregistrer vos adresses a l'avance sur la <a href="#">Section de configuration des adresses</a>. </p>
                            </div><!--//content-->
                        </div><!--//callout-block-->
                        
                        <div class="callout-block callout-block-success">
                            <div class="content">
                                <h4 class="callout-title">
	                                <span class="callout-icon-holder me-1">
		                                <i class="fas fa-thumbs-up"></i>
		                            </span><!--//icon-holder-->
	                                Preuve de transaction
	                            </h4>
                                <p>Une fois que vous renseignez la crypto-monaie que vous souhaitez Acheter dans le formulaire de d'achat, vous devez transferer les fonds à l'adresse indiqué et faire une capture d'ecran du message de validation de la transaction. Nous avons besoin de cette capture pour nous rassurer que la transaction est effectué et proceder à l'envoie de la crypto-monaie à l'adresse de votre compte. </p>
                            </div><!--//content-->
                        </div><!--//callout-block-->
                        
                       
                        
                       
					</section><!--//section-->
					
					<section class="docs-section" id="item-2-2">
						<h2 class="section-heading">Formulaire d'achat</h2>
						<p>
							
							La procedure d'achat comprend deux etapes avec deux formulaires distincts: le formulaire principal et le formulaire de confirmation. 
						</p>

						<h5 class="mt-5">Formulaire principal:</h5>
						
						<p>le formulaire principal vous permet de renseigner les informations esentiels comme la crypto-monaie a acheter, le montant  et la methode de paiement. c'est egalement sur ce formulaire que ProBuySell renseigne ses taux de change et la somme exacte qui sera versé à votre adresse crypto.</p>
						
						<div class="simplelightbox-gallery ">
							<div class="r">
						        <a href="assets/doc/images/formulaire_achat_principal.PNG"><img class="figure-img img-fluid shadow rounded" src="assets/doc/images/formulaire_achat_principal.PNG" alt="" title="Formulaire principal"/></a>
							</div>
							
							
						</div><!--//gallery-->

						<h5 class="mt-5">Formulaire de confirmation:</h5>
						
						<p>Le formulaire de confirmation fait la synthése des informations renseigné dans le formulaire principal. Vous pouvez changer ces informations si vous le souhaitez. c'est egalement ici que vous devez inserer la capture d'ecran de la preuve de transaction</p>
						
						<div class="simplelightbox-gallery ">
							<div class="r">
						        <a href="assets/doc/images/formulaire_achat_confirmation.PNG"><img class="figure-img img-fluid shadow rounded" src="assets/doc/images/formulaire_achat_confirmation.PNG" alt="" title="Formulaire de confirmation"/></a>
							</div>
							
							
						</div><!--//gallery-->
						
						
					</section><!--//section-->
					
					<section class="docs-section" id="item-2-3">
						<h2 class="section-heading">Traitement des operations</h2>
						<p>Le traitement d'une opération d'achat est simillaire a celui de l'opération de vente. <a href="#item-1-3">cliquez ici pour en savoir plus</a>.</p>
						
						

						
                        
                        

					</section><!--//section-->
					
					<section class="docs-section" id="item-2-4">
						<h2 class="section-heading">Gestion des erreurs d'achat</h2>
						<p>Vivamus efficitur fringilla ullamcorper. Cras condimentum condimentum mauris, vitae facilisis leo. Aliquam sagittis purus nisi, at commodo augue convallis id. Sed interdum turpis quis felis bibendum imperdiet. Mauris pellentesque urna eu leo gravida iaculis. In fringilla odio in felis ultricies porttitor. Donec at purus libero. Vestibulum libero orci, commodo nec arcu sit amet, commodo sollicitudin est. Vestibulum ultricies malesuada tempor.</p>
						
						
						
					</section><!--//section-->
			    </article><!--//docs-article-->
			    
			    
			    <article class="docs-article" id="section-3">
				    <header class="docs-header">
					    <h1 class="docs-heading">Affiliation</h1>
					    <section class="docs-intro">
						    <p>ProBuySell integre un systeme d'Affiliation qui permet aux utilisateurs  de generer des revenus. il est disponible pour les utilisateurs qui ont un compte valide. </p>
						</section><!--//docs-intro-->
				    </header>


				     <section class="docs-section" id="item-3-1">
						<div class="callout-block callout-block-info">
                            
                            <div class="content">
                                <h4 class="callout-title">
	                                <span class="callout-icon-holder me-1">
		                                <i class="fas fa-link"></i>
		                            </span><!--//icon-holder-->
	                                Liens d'Affiliations
	                            </h4>
                                <p>Le liens d'affiliation est l'element central de notre systeme d'affiliation. il s'agit d'une url qui pointe vers ProBuySell web et contient l'identifiant unique du compte a qui il est attribué. Pour participer au programme d'affiliation et generer des revenus, il suffit de copier votre lien d'affiliation dans le menu affiliation du tableau de bord et de le partager avec d'autres personnes à travers les reseaux. une fois ces personnes incrit atravers votre lien, vous touchez une importante commission sur l'ensemble de leurs transactions  </a>.</p>
                            </div><!--//content-->
                        </div><!--//callout-block-->
                        
                        
                        
                        
					</section><!--//section-->
					
					<section class="docs-section" id="item-3-2">
						<div class="callout-block callout-block-success">
                            <div class="content">
                                <h4 class="callout-title">
	                                <span class="callout-icon-holder me-1">
		                                <i class="fas fa-dollar"></i>
		                            </span><!--//icon-holder-->
	                                Solde affilié
	                            </h4>
                                <p>Le solde affilié est le contenue de votre porte monaie d'affiliation. il est fournis lorsque l'un de vos affilié opére une transaction sur probuysell. Vous pouvez aussi voir tout les details sur vos affiliés et la façon dont ils fournissent votre solde</p>
                            </div><!--//content-->
                        </div><!--//callout-block-->
					</section><!--//section-->
					
					<section class="docs-section" id="item-3-3">
						<div class="callout-block callout-block-warning">
                            <div class="content">
                                <h4 class="callout-title">
	                                <span class="callout-icon-holder me-1">
		                                <i class="fas fa-rotate-left"></i>
		                            </span><!--//icon-holder-->
	                                Retrait des gains d'Affiliations
	                            </h4>
                                <p>Une fois que votre solde ai commencé a être fournis, vous pouvez retirer vos gains vos gains à partir du menu "retrait des gains du tableau". l'equivalent du montant de votre retrait sera deposer dans le compte de votre choix</p>
                            </div><!--//content-->
                        </div><!--//callout-block-->
					</section><!--//section-->


			    </article><!--//docs-article-->
			    
			    <article class="docs-article" id="section-4">
				    <header class="docs-header">
					    <h1 class="docs-heading">Application</h1>
					    <section class="docs-intro">
						    <p>Notre application est disponible sur la plupart des magasins d'application en ligne.</p>
						</section><!--//docs-intro-->
				    </header>

				     <section class="docs-section" id="item-4-1">
						<div class="callout-block callout-block-info">
                            
                            <div class="content">
                                <h4 class="callout-title">
	                                <span class="callout-icon-holder me-1">
		                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#0041b3;}</style><path d="M0 93.7l183.6-25.3v177.4H0V93.7zm0 324.6l183.6 25.3V268.4H0v149.9zm203.8 28L448 480V268.4H203.8v177.9zm0-380.6v180.1H448V32L203.8 65.7z"/></svg>
		                            </span><!--//icon-holder-->
	                                Window store
	                            </h4>

								<h4 class="callout-title">
	                                <span class="callout-icon-holder me-1">
		                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"/></svg>
		                            </span><!--//icon-holder-->
	                                App store
	                            </h4>

								<h4 class="callout-title">
	                                <span class="callout-icon-holder me-1">
		                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M325.3 234.3L104.6 13l280.8 161.2-60.1 60.1zM47 0C34 6.8 25.3 19.2 25.3 35.3v441.3c0 16.1 8.7 28.5 21.7 35.3l256.6-256L47 0zm425.2 225.6l-58.9-34.1-65.7 64.5 65.7 64.5 60.1-34.1c18-14.3 18-46.5-1.2-60.8zM104.6 499l280.8-161.2-60.1-60.1L104.6 499z"/></svg>
		                            </span><!--//icon-holder-->
	                                Play store
	                            </h4>
                                <p></p>
                            </div><!--//content-->
                        </div><!--//callout-block-->

					</section><!--//section-->
					
					
			    </article><!--//docs-article-->
			    
			    
			    
			    
			    <article class="docs-article" id="section-5">
				    <header class="docs-header">
					    <h1 class="docs-heading">FAQs</h1>
					    <section class="docs-intro">
						    <p>Voici une liste des questions frequemment posé par nos utilisateurs</p>
						</section><!--//docs-intro-->
				    </header>
				     <section class="docs-section" id="item">
						
						<h5 class="pt-3"><i class="fas fa-question-circle me-1"></i>Quel pourcentage touche un utilisateur lorsque son affilié effectue une transaction?</h5>
						<p>La somme reversé aux utilisateurs apres les trasactions de leurs affiliés varie en fonction de la nature de la trasaction, en general elle tourne autour de 0,4% du volume d'achat/vente. </p>
						
						<h5 class="pt-3"><i class="fas fa-question-circle me-1"></i>Comment être sûre de la fiabilité de cette plate-forme?</h5>
						<p>Probuysell est conçu et maintenu par une equipe de traideur professionel dirigé par Mr Mimbe Théophile, connu et apprecié des plates formes de traiding de crypto-monaie sous le pseudo Mimbe237. Notre but est de faciliter aux maximun les echange de devises dans une approche gagnante-gagnante. Nous savons qu'il est difficil d'avoir votre confiance du premiers coup, alors realisez des petites transactions avec nous pour commencer et vous verrez que nous sommes serieux et professionel. nous esperons vous revoir bientot pour des echanges fructueuse. </p>
						
						<h5 class="pt-3"><i class="fas fa-question-circle me-1"></i>Sous quel delais validez vous les transactions?</h5>
						<p>Notre equipe veille a vous servir tout les jours apartir de 7H du matin. Vos requetes sont traité intantanement si nous disposons de toutes les informations necessaires. si non le delais Maximal est de 3H</p>
						
						<h5 class="pt-3"><i class="fas fa-question-circle me-1"></i>Comment vous contacter en cas de probleme?</h5>
						<p>Nous avons integreé à plusieurs niveaux de la plate forme des liens qui permetent aux utilisateur de contacter l'equipe support via les messageries instantané. vous pouvez trouver l'ensemble de nos liens de communication dans le menu support du tableau de bord.  </p>
					
						
						
					</section><!--//section-->
			    </article><!--//docs-article-->

			    <footer class="footer">
				    <div class="container text-center py-5">
				       
				        <ul class="social-list list-unstyled pt-4 mb-0">
						    <li class="list-inline-item"><a href="#"><i class="fab fa-telegram fa-fw"></i></a></li> 
							<li class="list-inline-item"><a href="#"><i class="fab fa-twitter fa-fw"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fab fa-whatsapp fa-fw"></i></a></li>
						
							<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f fa-fw"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fab fa-instagram fa-fw"></i></a></li>
				        </ul><!--//social-list-->
				    </div>
			    </footer>
		    </div> 
	    </div>
    </div><!--//docs-wrapper-->
   
       
    <!-- Javascript -->          
    <script src="assets/doc/plugins/popper.min.js"></script>
    <script src="assets/doc/plugins/bootstrap/js/bootstrap.min.js"></script>  
    
    
    <!-- Page Specific JS -->
    <script src="assets/doc/plugins/smoothscroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/highlight.min.js"></script>
    <script src="assets/doc/js/highlight-custom.js"></script> 
    <script src="assets/doc/plugins/simplelightbox/simple-lightbox.min.js"></script>      
    <script src="assets/doc/plugins/gumshoe/gumshoe.polyfills.min.js"></script> 
    <script src="assets/doc/js/docs.js"></script> 

</body>
</html> 

