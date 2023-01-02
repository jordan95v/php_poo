# Syllabus Projet POO electif

## 1. Creez une classe Spell qui possede
- un nom
- une description
- un cout en mana
## 2. Implementez un systeme d'elements (eau, feu, plante) en triade (comme Pokemon)
L'eau bat le feu, le feu bat la plante et la plante bat l'eau.

## 3. Declinez vos personnages pour avoir la possibilite d'en créer selon differents elements.
Les degats infliges par un personnage d'un element, a un autre personnage d'un
autre element, ont un bonus ou un malus en fonction de leur position dans la triade.
(ex: un Personnage de feu qui attaque un Personnage d'eau fera moins de degat
que si il attaquait un Personnage plante).

## 4. Creez differents Spell :

Contenant :
- Sort de defense (Bonus de defense pour le personnage qui equipe le sort)
- Sort de degats (inflige des degats physiques ou magiques au lieu d'attaquer avec son arme, **ce sort utilise 1 tour**)
- Sort de Soin (Soigne le personnage, ce sort utilise 1 tour et le personnage ne peut donc pas attaquer s'il se soigne)

Modifiez vos personnages pour qu'en plus de l'arme, ils puissent equiper 3 sorts (1
de defense, 1 d'attaque et 1 de soin) et donc aient un montant de mana donne qui
est regenere un peu a chaque fin de tour

Modifiez votre boucle de jeu pour que les personnages utilisent leurs sorts (par
exemple si il tombe sous 15% de vie il se soigne au lieu d'attaquer, ou si il possede
assez de mana pour utiliser son sort d'attaque ou de defense)

# BONUS (si vous avez le temps et l'envie)

Faites en sortes que vos personnages aient des niveaux et des points
d'experiences leur permettant de monter de niveau. Ces niveaux ont une influence
sur leurs statistiques (degats, defense, hp max, degats des sorts). L'experience est
acquise au cours des differents rounds.

# BONUS ENCORE PLUS BONUS (si vous avez encore plus de temps et encore plus l'envie)

Changez la boucle de jeu de maniere a ce que je puisse choisir mon personnage (voir: https://www.php.net/manual/en/function.readline.php).

Je souhaite donc:
- Choisir mon personnage
- Me battre aleatoirement contre 1 adversaire
- Choisir mes attaques ou mes sorts