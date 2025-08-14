# vanguard-rentals
Webplattform zur Produktmiete in PHP mit MySQL

Vanguard Rentals ist eine einfache Webplattform zur Produktmiete. Die Anwendung wurde mit PHP und MySQL umgesetzt und enthält grundlegende Funktionen wie Benutzerregistrierung, Login, Mietfunktion sowie eine übersichtliche Bestellverwaltung.


## Funktionen

- Benutzerregistrierung mit sicherer Passwort-Hashing-Funktion
- Benutzer-Login mit Session-Verwaltung
- Mietformular mit Datenbankanbindung
- Einsicht eigener Bestellungen
- Fehler- und Erfolgsmeldungen über Sessions
- Strukturierte Code-Organisation mit `components/`, `lib/` und `public/`

## Verzeichnisstruktur

/public/ # Alle öffentlichen Seiten (index, login, registrieren, mieten etc.)
/components/ # Wiederverwendbare Teile wie Header, Footer, Navigation, Feedback
/lib/ # Zentrale Datenbankverbindung (db.php, dbclose.php)


## Sicherheit

Dieses Projekt implementiert mehrere grundlegende Sicherheitsmaßnahmen:

- Passwörter werden mit `password_hash()` gespeichert
- Login überprüft mit `password_verify()`
- SQL-Injektionen werden verhindert durch `prepare()` und `bind_param()`
- Zugriff auf geschützte Seiten ist nur für eingeloggte Nutzer möglich
- Feedback und Fehlerhandling über `$_SESSION['message']`


## Installation und Setup

### Voraussetzungen

- PHP 8 oder höher
- MySQL 5.7 oder höher
- Webserver wie XAMPP oder Docker (optional)

### Schritt-für-Schritt

1. Projekt in dein Webverzeichnis kopieren (z. B. `htdocs/VanguardRentals`)
2. Erstelle die MySQL-Datenbank und Tabellen:

```sql
CREATE DATABASE vanguard_rentals;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL
);

CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  description TEXT,
  price DECIMAL(10,2)
);

CREATE TABLE orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  product_id INT,
  date DATETIME,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (product_id) REFERENCES products(id)
);
```

3. Öffne http://localhost/VanguardRentals/public/index.php im Browser


Erweiterungsideen

Suchfunktion oder Filter für Produkte
Admin-Oberfläche zur Produktverwaltung
E-Mail-Bestätigung bei Registrierung
Bootstrap-Design oder Tailwind CSS für professionelleres UI


Ziel
Dieses Projekt wurde vor Beginn meines Informatikstudiums erstellt, um praktische Webentwicklung mit PHP und MySQL zu lernen. Es dient sowohl als Lernplattform als auch als Bewerbungsprojekt für Werkstudentenstellen.


Lizenz
Dieses Projekt ist frei nutzbar und kann beliebig erweitert werden.


## SQL-Dateien

Im Ordner [`sql/`](sql/) findest du die SQL-Dateien zur Datenbank:

- `1_create_nutzer.sql`
- `2_create_produkte.sql`
- `3_create_bestellungen.sql`
- `4_insert_demo_daten.sql`

### Anleitung (Import in phpMyAdmin):

1. Öffne `http://localhost/phpmyadmin`
2. Neue Datenbank: `vanguard_rentals`
3. Importiere die 4 Dateien nacheinander

