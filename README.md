# Mans TODO lietotnes README

Šis ir Laravel Breeze tīmekļa lietotnes README fails, kas izmanto Tailwind CSS, Vue.js un FlowBite.

## Pirms sākat

Lai izveidotu šo lietotni lokāli, jums būs nepieciešams:

1. **Docker**: Lejupielādējiet un instalējiet Docker Desktop Windows operētājsistēmai..

2. **WSL (Windows Subsystem for Linux)**:
    - Atveriet PowerShell un izpildiet šīs komandas, lai iestatītu WSL 2 kā noklusējuma versiju:
        ```bash
        wsl --set-default-version 2
        ```

## Instalēšana

1. **Lejupielādējiet** projektu uz savu datoru: (rakstam komandu Linux terminala)
    ```bash
    curl -s https://laravel.build/todo-web | bash
    ```

2. **Parvietojit** un nometiet failus, kas lejupielādēti no github, projekta mape `todo-web`, kas atrodas Linux mājas direktorijā.

3. Linux terminālā pārejiet uz `todo-web` mapi:
    ```bash
    cd todo-web
    sudo chmod -R 777 storage
    ```

4. Palaidiet Docker konteinerus ar šādu komandu:
    ```bash
    ./vendor/bin/sail up
    ```

5. Atveriet Docker, izvēlieties konteineri `todo-web`, atradīsiet `todo-web-laravel.test-1` un blakus nosaukumam noklikšķiniet uz trīs punktiem, pēc tam izvēlieties "Open in Terminal".

6. Izpildiet šādas komandas:
    ```bash
    php artisan migrate
    npm install vite
    npm run dev
    ```

7. Atveriet vietni `localhost` pārlūkprogrammā, un jūsu lietotne vajadzētu atvērties.
## Reģistrācija

Lai reģistrētos, jums būs jāintegrē **Mailtrap**. `.env` failā nokopējiet šīs 5 rindiņas:

MAIL_MAILER=smtp MAIL_HOST=smtp.mailtrap.io MAIL_PORT=2525 MAIL_USERNAME=your_mailtrap_username MAIL_PASSWORD=your_mailtrap_password


1. Izveidojiet pastkasti Mailtrap (Mail Testing -> New Inbox).
2. SMTP iestatījumos izvēlieties **Laravel 9.x**.
3. Aizstājiet attiecīgās rindiņas `.env` failā.

Veiksmi ar jūsu lietotni! 🚀

Neaizmirstiet aizstāt your_mailtrap_username un your_mailtrap_password ar reāliem datiem no Mailtrap. Veiksmi izstrādē! 😊.
