LearningSymfony
===============

Installation
------------

1. Get project
```
git clone https://github.com/AnnaZaremba/LearningSymfony.git
```
2. Install dependencies
```
composer install
```
3. Permission to folders
```bash
chmod -R 0777 var/logs
chmod -R 0777 var/cache
chmod -R 0777 var/sessions
```

Git configuration
-----------------

Change git user
```bash
git config user.name "Anna Zaremba"
git config user.email "aniazarem@gmail.com"
```

Adding permissions
------------------
```bash
chmod -R 0777 foldername
```

Routing
-------
```bash
bin/console debug:router
```

Czyszczenie Cache
-----------------
```
sudo bin/console cache:clear
```

PhpStorm
--------
```bash
Alt Ins - generuje get i set controller...
Alt Enter - podpowiada np. importuje klasy
Ctrl Alt L - formatowanie
Ctrl Spacja - pokazuje dostępne metody
Ctrl B - wyswietlenie plików w których używa się danej klasy
```


# KsiazkaKucharska
