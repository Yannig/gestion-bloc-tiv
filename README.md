Application TIV
===============

A propos
--------

L'application de TIV a pour but de r�pertorier les blocs (ainsi que quelques petits mat�riels annexes comme les stabs ou les d�tendeurs) d'un club de plong�e et de proposer d'aider le responsable du mat�riel dans le suivi de son mat�riel (date de TIV/pr�paration des TIVs mais �galement date des prochaines r��preuves etc.).

L'application a �t� d�velopp� sur un serveur Apache PHP avec une base MySQL.

La cr�ation de la base se fait � l'aide du fichier schema.sql et la d�claration de la connexion se fait en modifiant le fichier connect_db.inc.php (un fichier template connect_db.inc.php.template d'exemple est pr�sent dans l'application).

Il faut �galement renseigner le fichier configuration.inc.php afin de rajouter les informations concernant votre club de plong�e.

Il vous faudra �galement la version 1.7 de FPDF (elle est t�l�chargeable � l'adresse suivante : http://www.fpdf.org/). Il faudra ensuite la d�compresser dans le sous-r�pertoire fpdf17 � la racine du r�pertoire de l'application.

Enfin, il faut placer le logo de votre club dans le fichier logo_club.png.

A noter que si jamais un de ces fichiers devait manquer, l'application vous donnera une notification sur le fichier manquant.

Cette application est soumise � la licence GPL. Enfin, � souligner, le logiciel est fourni "en l'�tat" sans garantie d'aucune sorte, expresse ou implicite. En dehors de �a bon TIV !

Cr�dits
-------

Les images sont extraites des ic�nes oxygen de KDE4. Vous pouvez les r�cup�rer � l'adresse suivante : http://www.oxygen-icons.org/

A noter �galement que l'application s'appuie sur les librairies suivantes pour fonctionner :

- jQuery      http://jquery.com/
- DataTables  http://datatables.net/ (s'appuie sur jQuery pour fonctionner)
- FPDF        http://www.fpdf.org/

Elle a �t� d�velopp� sur une Kubuntu 12.04 (version AMD64) avec PHP en version 5.3.10, apache 2.2.22 et MySQL 5.5.24 mais devrait pouvoir fonctionner sans probl�me sur une plateforme PHP 5 (y compris un Windows m�me si je ne l'ai jamais test� personnellement).
