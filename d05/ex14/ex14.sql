SELECT etage_salle AS 'etage', SUM(nbr_siege) as 'nb_sieges' FROM salle GROUP BY etage_salle ORDER BY nb_sieges DESC;
