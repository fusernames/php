SELECT COUNT(*) AS 'nb_abo', ROUND(AVG(prix) - 0.5) AS 'moy_abo', SUM(duree_abo) % 42 AS 'ft' FROM abonnement;
