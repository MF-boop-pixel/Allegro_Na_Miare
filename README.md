# Allegro_Na_Miare
Projekt strony internetowej umożliwiającej składanie zamówień mebli na wymiar. Aplikacja webowa zawiera moduł logowania, formularze zamówień, zarządzanie kontem użytkownika oraz historię zamówień.

##  Funkcjonalności

- Rejestracja i logowanie użytkownika
- Formularz zamówienia na wymiar dostosowany do typu produktu
- Historia zamówień użytkownika (z lokalnego storage )
- Edycja danych osobowych w profilu użytkownika
- System przechowywania danych w localStorage (lub przez PHP na serwerze)

## Struktura projektu

- `index.html` – Strona główna
- `logowanie.html` `rejestracja.html` – Logowanie i rejestracja użytkownika
- `konto.html` – Panel konta z historią zamówień
- `zamowienie.html` – Dynamiczny formularz zamówienia produktu na wymiar
- `img/` – Obrazy produktów
- `pobierz_dane.php`, `zapisz_dane.php`, `logowanie.php` , `rejestracja.php` – Skrypty PHP do komunikacji z bazą danych 

##  Jak uruchomić projekt lokalnie

1. Sklonuj repozytorium:

   ```bash
   git clone https://github.com/twoj-login/Allegro_Na_Miare.git
   ```
2.Rozpakuj folder IMG.

3. Otwórz `index.html` w przeglądarce.

4. Aby przetestować formularze z zapisem danych:
   - Upewnij się, że serwer (np. XAMPP, WAMP) jest uruchomiony
   - Umieść pliki projektu w folderze `htdocs/`
   - Odwiedź `http://localhost/Allegro_Na_Miare/index.html`
   - Kliknij w przycisk "Moje Allegro na miare"


##  Import bazy danych

1. Otwórz **phpMyAdmin** 
2. Utwórz nową bazę danych o nazwie: `allegro_na_miare`
3. Zaimportuj plik `users.sql`, który znajduje się w katalogu `Baza/` projektu.
   - W phpMyAdmin: kliknij w bazę → Import → wybierz plik `users.sql` → Importuj
4. Sprawdź, czy tabele `users` zostały poprawnie utworzone.


##  Wymagania

- Przeglądarka obsługująca HTML5 + JS (np. Chrome, Firefox)
- (Opcjonalnie) Serwer lokalny PHP dla zapisu danych

##  Autor Mikołaj Frankiewicz oraz Borys Bereza 

Projekt testowy wykonany na potrzeby nauki frontendu oraz przechowywania danych użytkownika.

 Projekt edukacyjny – niekomercyjny.
