# Advertisement board

Сайт объявлений на базе фреймворка Laravel.

- [Требования](#требования)
- [Установка и запуск](#установка-и-запуск)
- [Возможности и особенности](#возможности-и-особенности)

## Требования

- PHP >=8.3
- Composer
- PostgreSQL >=16.2
- Веб-сервер Nginx
- Redis

## Установка и запуск

Для установки и запуска приложения можно использовать собственную среду, либо воспользоваться [моей докер-средой](https://github.com/bcchicr/docker-php-env)

Клонировать репозиторий на локальную машину:

```bash
git clone https://github.com/bcchicr/ad-board.git
```

Зайти в папку проекта и установить зависимости:

```bash
composer install
```

Копировать файл `.env.example` в `.env`:

```bash
cp .env.example .env
```

Заполнить поля `ADMIN_*` и `DB_*` в файле `.env`

Сгенерировать новый ключ шифрования:

```bash
php artisan key:generate
```

Запустить миграции:

```bash
php artisan migrate
```

Привязать директорию `public/storage` к директории `storage/app/public/`:

```bash
php artisan storage:link
```

## Возможности и особенности

- Регистрация пользователей
- Возможность для зарегистрированных пользователей предлагать объявления
- Возможность для администратора публиковать или отклонять предложенные объявления
- Загрузка аватарок в профиль и картинок для объявлений
- Возможность для авторизованных пользователей редактировать данные в своем профиле
- Возможность для администратора банить и разбанивать пользователей
- Возможность для администратора удалять опубликованные объявления
- Адаптивный дизайн реализован при помощи Bootstrap 5

## Некоторые скриншоты
![image](https://github.com/bcchicr/ad-board/assets/160070250/6b561fee-619d-4b5b-80b4-629541b20b2b)
![image](https://github.com/bcchicr/ad-board/assets/160070250/fb0baa1a-5bce-4581-95c0-f51c260c256f)
![image](https://github.com/bcchicr/ad-board/assets/160070250/5a64d634-8d43-4f55-949d-7a3788d12196)


