SELECT ROUND((UNIX_TIMESTAMP(MAX(date)) - UNIX_TIMESTAMP(MIN(date))) / 86400) AS 'uptime' FROM historique_membre;
