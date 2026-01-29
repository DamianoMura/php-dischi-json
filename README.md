# EX - PHP Dischi

## Descrizione

## Nome repo: php-dischi-json

Dobbiamo creare una web-app che permetta di leggere una lista di dischi presente nel nostro server.
I dischi dovranno avere questa struttura: titolo, artista, url della cover, anno di pubblicazione, genere

## Consigli

Nello svolgere l’esercizio seguite un approccio graduale.
Prima assicuratevi che la vostra pagina index.php (riesca a comunicare correttamente con il vostro script PHP)
Solo a questo punto sarà utile passare alla lettura della lista da un file JSON.

## Bonus

Tramite un form, dai la possibilità all’utente di aggiungere un disco dall’elenco.

## added scraper to get images from google automatically 
the scraper acts at first load of the project... 
to test copy the content of the hard-library.json into library.json to start fresh
the scraper on load will go and check if the image url fields are empty, and go and scrape the first result of Google images automatically
when inserting, a different scraper will take the charge and will do exactly the same but selects 8 results on top of the list to choose from...
