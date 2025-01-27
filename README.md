<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
</p>

## Документація до функціоналу проєкту:
### 1. Реєстрація та авторизація
Мета:

Забезпечити доступ до функціоналу лише авторизованим користувачам.

Реалізація:

- Використано пакет Laravel Breeze для аутентифікації.
- Забезпечено:
  - Реєстрацію нового користувача.
  - Авторизацію існуючого користувача.
  - Валідацію email-адреси під час реєстрації.
- Всі waitlist’и користувача, окрім публічних посилань на waitlist, доступні лише авторизованим користувачам та окремому користувачу.
### 2. Створення та управління waitlist’ами
### 2.1 Створення waitlist’а
Мета:

Користувачі мають змогу створювати власні waitlist’и.

Функціонал:
- Форма для створення waitlist’а з наступними полями:
    - Назва Waitlist’а (обов’язкове поле).
    - Текст кнопки submit (обов’язкове поле).
    - Колір кнопки submit (обов’язкове поле з можливістю вибору кольору). 
    - Повідомлення після відправлення форми (опціональне текстове поле).
- Додатково:
    - Валідація всіх полів на етапі створення.
    - Збереження інформації в базі даних з прив’язкою до користувача, що створив waitlist.
### 2.2 Отримання script tag та container
Мета:

Надати користувачам можливість інтегрувати waitlist на інших сайтах.

Реалізація:
- Після створення waitlist’а автоматично генерується:
    - Script Tag для підключення waitlist’а на іншому сайті.
    - HTML Container, що представляє форму waitlist’а.
- Waitlist’и доступні у детальному перегляді

Приклад:

`<script src="https://example.com/waitlist/embed/a5a90b2a-016e-4a15-9151-919b220ecd4d"></script>`

`<div id="waitlist-container-a5a90b2a-016e-4a15-9151-919b220ecd4d"></div>`
### 2.3. Адмінка для waitlist’ів
Мета:

Забезпечити зручне управління waitlist’ами для користувачів.

Функціонал:
- Список waitlist’ів:
    - Відображаються назва, дата створення та кількість підписників.
    - Кнопки управління Переглянути, Включити доступ/Відключити доступ, Поділитися
- Деталі waitlist’а:
    - Інформація waitlist:
      - Назва
      - Дата створення
      - Script Tag
      - HTML Container
    - Список підписників з полями:
      - Email.
      - Дата підписки.
    - Кнопки для:
      - Включити доступ/Відключити доступ.
      - Поділитися.
      - Редагування waitlist’а.
      - Видалення waitlist’а.
      - Повернутися до списку.

Реалізація:
- Для кожного waitlist’а додається сторінка з детальною інформацією.
### Додаткові функції
### 1. Поділитися списком підписників без авторизації
Мета:

Надати можливість переглядати список підписників без авторизації.

Реалізація:
- Для кожного waitlist’а генерується унікальне посилання:
    - Формат: `https://example.com/waitlist/{link}`.
    - За посиланням доступний публічний список підписників (email, дата підписки).
- Можливість вимкнення доступу через налаштування waitlist’а.

Приклад:
- Кнопка "Поділитися" генерує посилання, яке копіюється в буфер обміну.
### Технічні деталі реалізації
Міграції:
- Таблиця users для зберігання користувачів.
- Таблиця waitlists із полями:
    - Назва, текст кнопки, колір, повідомлення, прив’язка до користувача.
- Таблиця subscribers для зберігання підписників.

Компоненти:
- Використано Livewire для створення waitlist’а.
- Всі компоненти відображаються за допомогою Blade.

Авторизація:
- Захист усіх приватних маршрутів через middleware auth.

UI:
- Використано Tailwind CSS для стилізації інтерфейсу.
## Інструкція для користувачів(тестування)
### 1. Встановлення залежностей
>npm install && npm run dev
### 2. Запуск міграцій
>php artisan migrate
### 3. Виконання реєстрації
### 4. Запуск сидів
>php artisan db:seed
### Як створити waitlist:
- Перейдіть до розділу My Waitlists.
- Натисніть кнопку Create Waitlist.
- Заповніть форму (назва, текст кнопки, колір кнопки, повідомлення).
- Збережіть waitlist.
### Як отримати script tag:
- Після створення waitlist’а перейдіть до його деталей.
- Скопіюйте згенерований script tag.
### Як поділитися списком підписників:
- У списку waitlist’ів натисніть кнопку Поділитися.
- Скопіюйте унікальне посилання.
### Як вимкнути доступ за посиланням:
- Перейдіть у налаштування waitlist’а.
- Вимкніть опцію Allow public access.

