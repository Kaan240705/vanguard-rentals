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

CREATE TABLE nutzer (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) UNIQUE NOT NULL,
  passwort VARCHAR(255) NOT NULL
);

CREATE TABLE produkte (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  beschreibung TEXT,
  preis DECIMAL(10,2)
);

CREATE TABLE bestellungen (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nutzer_id INT,
  produkt_id INT,
  datum DATETIME,
  FOREIGN KEY (nutzer_id) REFERENCES nutzer(id),
  FOREIGN KEY (produkt_id) REFERENCES produkte(id)
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
