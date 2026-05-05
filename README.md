# Sklep ze słodyczami na wagę (E-commerce Project)

Projekt aplikacji webowej typu e-commerce stworzony w ramach nauki frameworka Laravel oraz zarządzania relacyjnymi bazami danych. Aplikacja symuluje proces zakupowy w sklepie ze słodyczami, kładąc nacisk na logikę obliczeniową produktów sprzedawanych na wagę.

## Technologie
*   **Backend:** PHP 8.x, Laravel
*   **Frontend:** JavaScript (ES6+), Bootstrap 5, Blade Templates
*   **Baza danych:** MariaDB / PostgreSQL
*   **Narzędzia:** Composer, npm, Git

## Główne funkcjonalności
*   **System CRUD:** Pełne zarządzanie asortymentem sklepu (dodawanie, edycja, usuwanie produktów).
*   **Logika wagowa:** Implementacja przeliczników cenowych w zależności od masy produktu.
*   **Katalog produktów:** Dynamiczne wyświetlanie dostępnych słodyczy z podziałem na kategorie.
*   **Responsywny Interfejs:** UI dostosowany do urządzeń mobilnych dzięki wykorzystaniu Bootstrapa.

## Cel projektu
Głównym celem było opanowanie architektury **MVC (Model-View-Controller)** oraz przećwiczenie komunikacji między frontendem a backendem. Projekt pozwolił mi na praktyczne zastosowanie wiedzy zdobytej podczas studiów na **Uniwersytecie Rzeszowskim**.

## Instalacja i uruchomienie
1. Zainstaluj **XAMPP** na dysku systemowym i dodaj PHP do zmiennych środowiskowych.
2. Zainstaluj **Composer**.
3. W panelu XAMPP uruchom moduły **Apache** oraz **MySQL**.
4. Sklonuj repozytorium:
   ```bash
   git clone [https://github.com/ewelinakaniewska/slodycze-na-wage.git](https://github.com/ewelinakaniewska/slodycze-na-wage.git)
   ```
5. Przejdź do katalogu projektu i uruchom przygotowany skrypt automatyzujący:
```bash
start.bat
```
Skrypt ten automatycznie przygotuje bazę danych i zależności do działania aplikacji.
6. Uruchom serwer deweloperski Laravela:
```bash
php artisan serve
```
7. W pasku adresu przeglądarki wpisz: http://127.0.0.1:8000

---
*Projekt zrealizowany w celach edukacyjnych (*
