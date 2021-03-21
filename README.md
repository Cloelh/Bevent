# MyForum

Forum en PHP par Cloé Lhenry 

> télécharger le projet :
- git clone https://github.com/Cloelh/MyForum.git
- importer la bdd dans son phpMyAdmin (appeler sa bdd myForum)
- modifier le fichier config/bdd.php pour la connexion à la bdd 

# Fonctionnalités principales 
- connexion à son compte 
- écrire un nouveau sujet
- voir un sujet 
- ajout de commentaires à un sujet 
- page catégorie avec sujets liés 
- suppression de ses sujets et de ses commentaires (suppressions des commentaires si l'on supprime un sujet) 

# Fonctionnalités admin 
> connexion à l'admin 
- pseudo : admin
- mdp : mdp 

> fonctionnalités 
- suppresion d'une catégorie (avec ses sujets et ses commentaires) 
- ajout d'une catégorie 
- suppression d'un user
- visualisation des messages envoyés par les utilisateurs 

# Fonctionnalités en + 
> fonctionnalité "Résolu" 
- possiblité à l'utilisateur de passer son sujet en résolu dans l'onglet "mes sujets" 
- dans les pages de listes de sujets, un utilisateur peut selectionner "ne voir que les sujets résolus" qui filtre les résultats 

> fonctionnalité "Recherche" 
- possiblité de rechercher sur tous les sujets une chaine de caractère dans le contenu, le titre, ou la catégorie 

> Fonctionnalité "Envoyer un message" 
- un utilisateur peut envoyer un message à l'admin
- il peut retrouver ses messages envoyés dans l'onglet mes messages (dans le menu) et consulter les réponses de l'admin

> divers
- bloquer les parties réservé à l'admin/personnes connectés (exemple espace commentaire) 
- possibilié de changer son avatar
- page 404
