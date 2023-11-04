laravel-admin Multi Language
======

## Install

```
composer require uretral/multi-language
```

## Config


First, add extension config

In `config/admin.php`

```
        'multi-language' => [
            'enable' => true,

            'cookie-locale' => 'locale',
            'default_locale' => 'ru',
            'languages' => [
                'en' => 'English',
                'ru' => 'Русский',
            ],

            'cookie-country' => 'country',
            'default_country' => 'ru',
            'countries' => [
                'ru' => [
                    'title_ru' => 'Россия',
                    'title_en' => 'Russia',
                    'flag' => 'assets/admin/img/flags/ru.svg'
                ],
                'ae' => [
                    'title_ru' => 'Эмираты',
                    'title_en' => 'Emirates',
                    'flag' => 'assets/admin/img/flags/ae.svg'
                ],
                'tr' => [
                    'title_ru' => 'Турция',
                    'title_en' => 'Turkey',
                    'flag' => 'assets/admin/img/flags/tr.svg'
                ],
            ],

            'cookie-module' => 'module',
            'default_module' => 'tenant',
            'modules' => [
                'tenant' => [
                    'ru' => 'Жилец',
                    'en' => 'Tenant',
                ],
                'my' => [
                    'ru' => 'Собственник',
                    'en' => 'Landlord',
                ]
            ],

            'show-navbar' => true,
            'show-login-page' => true,


        ],
```

Then, add except route to auth

In `config/admin.php`, add `locale` to `auth.excepts`

```
    'auth' => [
        ...
        // The URIs that should be excluded from authorization.
        'excepts' => [
            'auth/login',
            'auth/logout',
            // add this line !
            'locale',
        ],
    ],

```
