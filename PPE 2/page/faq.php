<?php session_start(); 
session_destroy();
?>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body >
<center>

<div class="haut">
<p>
<img src="image/logo_ipssi.png" alt="logo Ipssi" />
<img src="image/logo2.png" alt="logo Ip-Formation" />
</p>
</div>
<br/>

<div class="faq">
<h2>FAQ</h2>
<h3> <a href="#objectif">Quel est l'objetif de ce site?</a></h3>
<h3><a href="#inscription">Comment s'inscrire ? Combien de temps cela prend-t-il ?</a></h3>
<h3><a href="#rang">Je ne suis pas Formateur, Admin. Comment puis-je demandez de me mettre dans ce rang ?</a></h3>
<h3><a href="#navigation">Comment naviguer sur le site?</a></h3>
<h3><a href="#credit">Qui se cache derrière ce site ?</a></h3>
<h3><a href="#contact">J'ai une autre question, ou puis-je la posez?</a></h3>

<h3 id="objectif"> Quel est l'objetif de ce site?</h3>
<p> Le site est le fruit d'un projet colloboratifs entre étudiant. Le contexte était d'offrir à la formation IPSSI un outil web permmettant de gérer, modifier et voir les différent module du BTS SIO. 
Il permet notamment aussi la recherche par formateur, module, date ou mot clé dans la base de donné du module chercher.
Le site s'inscrit dans le cadre destiné aux apprenant de Paris et dans l'étude de la sécurisation des donné, autant que sur le site que matériel.
Le site est en effet héberger sur un serveur de l'entreprise cliente, IPSSI.
</p>

<h3 id="inscription">Comment s'inscrire ? Combien de temps cela prend-t-il ?</h3>
Quelques minutes suffisent ! Rendez-vous sur la page d'acceuil
Cependant,  pour l'identification des compte, nous avons choisi de prendre comme login le mail de l'utilisateur, car nous avons considérer qu'il avait qu'un mail par personne.

Choisissez un nom d'utilisateur, un mot de passe puis renseignez votre adresse mail (valide) et les quelques informations demandées. 

<h3 id="rang">Je ne suis pas Formateur, Admin. Comment puis-je demandez de me mettre dans ce rang ?</h3>
<p>
Le rang est géréer manuellement par l'administrateur,
vous pouvez envoyer un mail à :
<p class="couleur">d.bangoura@ip-formation.net</p> 
<p class="couleur">u.perret@ip-formation.net</p>  
<p class="couleur">m.chinnapha@ip-formation.net</p> 
<p class="couleur">b.emilie@ip-formation.net</p> <p>

Ceux ci vous répondron à votre requête. veuillez indiquez dans l'objet qu'il s'agit d'une mise a jour de votre rang.
</p>


<h3 id="navigation" >Comment naviguer sur le site?</h3>
<p>
Il vous faudra forcement vous connecter pour nabiguer sur toute les pages du site
La barre du haut indique les pages principaux.<br/>
L'<a href="cahierdetexte.php">Accueil</a> montre tous les  modules enseigné en BTS SIO, sous forme de tableau.<br/>
Il permet de modifier et supprimer les modules si vous êtes formateur ou admin.<br/>
La page <a href="recherche.php">Recherche</a>  permet de chercher dans la tables de toutes les modules (affiché par défault)  par la date, le module ou par le nom ou prénom de formateur.<br/>
La recherche de mot clé recherche dans toute la base données si un élement est correspondant.<br/>
La <a href="mentionlegal.php"> Mention légale </a>permet de dire toutes la juridicition du site, permet d'indiquer toutes les information importantes ci<br/>
La <a href="faq.php" > FAQ</a> permet de répondre aux questions les plus fréquemment demandée <br/>
<a href="deconnexion.php">Deconnexion</a> permet de se déconnecter du site<br/>

 Le <a href ="plandusite.php " > Plan du site</a> liste toutes les pages disponibles et  accessible en navigation <br/>
 </p>
<h3 id="credit">Qui se cache derrière ce site ?</h3>
<p>Ce site est édité par  quatre personne , 
Ulysse PERRET, David BANGOURA, Maetis CHINAPHA, Emilie BRIOLAND, une équipe d'étudiante en 1ére année à Ip-Formation, à Paris en France.</p>


<h3 id="contact">J'ai une autre question, ou puis-je la posez?</h3>
Vous pouvez nous adressez un mail aux adresse suivante : 
<p class="couleur">u.perret@ip-formation.net</p> 
<p class="couleur">d.bangoura@ip-formation.net</p>  
<p class="couleur">m.chinnapha@ip-formation.net</p> 
<p class="couleur">b.emilie@ip-formation.net</p> <p>
</div>

<br/><br/>
<div class="bas">
<a href="formulairesimple.php" >Acceuil</a> |
<a href="mentionlegal.php">Mention legal</a> 
</br>

© 1998-2013 groupe ip-formation | PARIS : 01 55 43 26 65 | LYON : 0811 692 888 | Tous droits réservés
</div>
</body>
</html>