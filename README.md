# Projet de Site Web pour un Chef Cuisinier Mondialement Reconnu

## Description

Ce projet consiste à développer un site web pour un chef cuisinier mondialement reconnu, offrant une expérience gastronomique unique. Les utilisateurs peuvent découvrir des menus exclusifs, réserver des expériences culinaires à domicile et interagir avec le chef.

## Objectifs du Projet

- **Site Web avec Multi-Rôles** :
  - **Utilisateurs (Clients)** : Découvrir les menus proposés par le chef, s’inscrire, se connecter, et réserver une expérience culinaire.
  - **Chefs (Administrateurs)** : Se connecter et gérer les réservations (accepter, refuser, consulter les statistiques des demandes, et gérer leur profil).

## Fonctionnalités Principales

- **Inscription et Connexion** : Authentification sécurisée avec redirection vers des pages spécifiques en fonction du rôle.
- **Page Utilisateur (Client)** :
  - Consultation des menus du chef et réservation d'une expérience culinaire.
  - Gestion des réservations : consulter l’historique, modifier ou annuler des réservations.
- **Page Chef (Dashboard)** :
  - Gestion des réservations : accepter ou refuser les demandes en fonction de la disponibilité.
  - Affichage des statistiques détaillées pour le chef.
- **Responsive Design** : Compatibilité avec toutes les tailles d’écrans (mobile, tablette, desktop).
- **Sécurité des Données** :
  - Hashage sécurisé des mots de passe.
  - Protection contre les XSS et injections SQL.
  - Token CSRF pour sécuriser les actions sensibles.
- **Fonctionnalités Bonus** :
  - Génération de documents imprimables (rapports PDF).
  - Envoi d’emails pour confirmation de réservation et réinitialisation de mot de passe.
  - Archivage des plats pour rupture de stock.
  - Page 404 personnalisée.

## Technologies Utilisées

- Frontend : HTML, CSS, JavaScript (SweetAlert, modals dynamiques).
- Backend : PHP, MySQL.
- Outils : Git, GitHub.
