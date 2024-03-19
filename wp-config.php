<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', '618-22_52866' );

/** Имя пользователя базы данных */
define( 'DB_USER', '618-22_52866' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '3b0e23f22d8e51aacd71' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'n3SitbS2Kru[.t;@/ v]fUMBnczP&T0VP=65@=t,pueb# .^%|5-c6`xdGkt~B6{' );
define( 'SECURE_AUTH_KEY',  ':P%Q{~oM?y66q?obE)h*|(g$RZO(IA*{X@w#H`!v}G_s~z0<%;q!o=_BO7FP<s.*' );
define( 'LOGGED_IN_KEY',    '()h>aL@CE;yeId-O3i]_S-TAnE/}>TLzA3ANO`[&Y6s.w~ <V`nI1.$YBrKbWsno' );
define( 'NONCE_KEY',        'YJciQ!k~Z3f-@aWd+dcQ0}7iuHTi49:j|0m%}Kr=wmzUj3DY1,P4.]rn?Z{=wI2>' );
define( 'AUTH_SALT',        '(FKA,G4u>}>^z,XK90?a@AUkfh(;=oCvj/2^Cdz]u3v1t^l22FdU<@$F]`H{m@rM' );
define( 'SECURE_AUTH_SALT', '_A#r#%dN:5yzN ]Bo0~W=itX<tqKd*~*nr-ZktI,RtAajm*^bxtT*/5WI45tu8;I' );
define( 'LOGGED_IN_SALT',   '^wRDvbwd{EnphiP?Tw`m&mCuH854qwqx078fwy~D9QPSV,#p9pS7AW0c%f#/!d}B' );
define( 'NONCE_SALT',       'PXZ.u#^{gp5_E5q*2V*MG.H7]2[hO9F-u@[0Gv+sEk9%~XK&hU0m7ZawGo+wg<)f' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'GHY7j_';


/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';