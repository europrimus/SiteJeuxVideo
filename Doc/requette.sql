-- les jeux
-- liste des jeux avec consoles et éditeurs
SELECT Jeux.nom as nom,
Jeux.id as jeuxid,
Support.nom as support,
Support.id as supportid,
COUNT(Jeux_has_Support.DLC_id) as nbdlc,
Editeur.nom as editeur,
Editeur.id as editeurid,
DATE_FORMAT(Jeux_has_Support.DateSortie, '%d/%m/%Y') as dateSortie
FROM Jeux
JOIN Jeux_has_Support ON Jeux.id = Jeux_has_Support.Jeux_id
JOIN Support ON Jeux_has_Support.Support_id = Support.id
JOIN Editeur ON Jeux.Editeur_id=Editeur.id
LIMIT 0, 10

--	nom 	jeuxid 	support 	supportid 	nbdlc 	editeur 	editeurid 	dateSortie 	
--	Mario kart 	1 	Play station 4 	2 	6 	Infogrames 	1 	09/04/2018
-- le COUNT() ne renvois pas tous les jeux

SELECT Jeux.nom as nom,
Jeux.id as jeuxid,
Support.nom as support,
Support.id as supportid,
COUNT(Jeux_has_Support.DLC_id) as nbdlc,
Editeur.nom as editeur,
Editeur.id as editeurid,
DATE_FORMAT(Jeux_has_Support.DateSortie, '%d/%m/%Y') as dateSortie
FROM Jeux_has_Support
JOIN Jeux ON Jeux_has_Support.Jeux_id = Jeux.id
JOIN Support ON Jeux_has_Support.Support_id = Support.id
JOIN Editeur ON Jeux.Editeur_id=Editeur.id
LIMIT 0, 10

--	nom 	jeuxid 	support 	supportid 	nbdlc 	editeur 	editeurid 	dateSortie 	
--	Mario kart 	1 	Play station 4 	2 	6 	Infogrames 	1 	09/04/2018


-- liste des jeux avec le nombre de support et de DLC et l'éditeur
SELECT
Jeux.nom as nom,
Jeux.id as jeuxid,
COUNT(Support.id) as supportNB,
COUNT(Jeux_has_Support.DLC_id) as dlcNB,
DATE_FORMAT(Jeux_has_Support.DateSortie, '%d/%m/%Y') as dateSortie
FROM Jeux_has_Support
JOIN Jeux  ON Jeux.id = Jeux_has_Support.Jeux_id
JOIN Support ON Jeux_has_Support.Support_id = Support.id
GROUP BY Jeux.id
LIMIT 0, 10

--	nom 	jeuxid 	supportNB 	dlcNB 	dateSortie 	
--	Mario kart 	1 	6 	4 	09/04/2018
--	Wii sport 	2 	2 	1 	08/04/2018


SELECT Jeux.nom as nom,
Jeux.id as jeuxid,
COUNT(Support.id) as supportnb,
COUNT(Jeux_has_Support.DLC_id) as dlcnb,
Editeur.nom as editeur,
Editeur.id as editeurid,
DATE_FORMAT(Jeux_has_Support.DateSortie, '%d/%m/%Y') as dateSortie
FROM Jeux_has_Support
JOIN Jeux ON Jeux_has_Support.Jeux_id = Jeux.id
JOIN Support ON Jeux_has_Support.Support_id = Support.id
JOIN Editeur ON Jeux.Editeur_id=Editeur.id
GROUP BY Jeux.id
LIMIT 0, 10

--	 nom 	jeuxid 	supportnb 	dlcnb 	editeur 	editeurid 	dateSortie 	
--	Mario kart 	1 	6 	4 	Infogrames 	1 	09/04/2018
--	Wii sport 	2 	2 	1 	3D Realms 	2 	08/04/2018


SELECT
Jeux.nom as nom,
Jeux.id as jeuxid,
Editeur.nom as editeur,
Editeur.id as editeurid,
COUNT(Support.id) as supportNB,
COUNT(Jeux_has_Support.DLC_id) as dlcNB,
DATE_FORMAT(Jeux_has_Support.DateSortie, '%d/%m/%Y') as dateSortie
FROM Jeux_has_Support
JOIN Jeux  ON Jeux.id = Jeux_has_Support.Jeux_id
JOIN Support ON Jeux_has_Support.Support_id = Support.id
JOIN Editeur ON Jeux.Editeur_id=Editeur.id
GROUP BY Jeux.id
ORDER BY Jeux.nom
LIMIT 0, 10

--	nom Croissant 1 	jeuxid 	editeur 	editeurid 	supportNB 	dlcNB 	dateSortie 	
--	Mario kart 	1 	Infogrames 	1 	6 	4 	09/04/2018
--	Wii sport 	2 	3D Realms 	2 	2 	1 	08/04/2018
