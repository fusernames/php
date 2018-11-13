INSERT INTO ft_table (login, groupe, date_de_creation) SELECT nom, 'other', DATE(date_naissance) AS DATE FROM fiche_personne WHERE nom LIKE 'A%' AND CHAR_LENGTH(nom) < 9 ORDER BY nom LIMIT 10;
