## Organisation : Monorepo (Option a)

Ce projet utilise un **dépôt unique** `sondage-app/` contenant :
- `backend-java/` — API Java qui génère `resultats.json` en mémoire
- `frontend-php/` — Interface PHP qui lit ce JSON et l'affiche en HTML

## Justification du choix monorepo

Nous avons retenu le monorepo a été retenu car :
- L'équipe (4 membres) travaille simultanément sur les deux couches
- Backend et frontend sont fortement couplés (PHP dépend du JSON Java)
- Un seul `git clone` donne accès à l'ensemble du projet
- L'historique unifié facilite le suivi des modifications et le débogage


Membres du groupe:
Ouedraogo Moulay
Kossogonona Anioué Alban
Ilboudo Styves Junior
Kompaore Marie Jael
