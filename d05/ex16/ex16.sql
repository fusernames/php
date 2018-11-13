SELECT COUNT(*) AS 'films' FROM historique_membre WHERE (date BETWEEN '2006-10-30 00:00:00' AND '2007-07-27 23:59:59') OR date LIKE '%-12-24 %';
