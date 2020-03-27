<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'itCerebrum_test' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '[IzwJ0.J1e#YDk#h~Gca-$)$GPqa M:|;yrr4S5C2O#H.vu_j_-ah2b4(5-?lEc;' );
define( 'SECURE_AUTH_KEY',  '_ h[O$)WI,gP(vSF(!|FeXR8tJjG+#A[Gt2]sZT VTVr+|m=2I{x06 OLDBrq)FP' );
define( 'LOGGED_IN_KEY',    'Ebq`7,<l#?&ct/qvOHmkY_Pj@_ZRe}j7iF~$MQ_1|.[4JF,m)pag01_7L,R1j;s7' );
define( 'NONCE_KEY',        'H`]dIQQ.;0w[[K&B|hSSY)r~iLr^76z(y_-&JOH2Xl@=2K@+LSI4bLh5OZL|#G#N' );
define( 'AUTH_SALT',        'Am]Kjj7Y2<un:4 #*:^~t7kPV[Tb{xz%p=@8w=2dR|[PNuN_3h8Qyi}Fi>7J5h2b' );
define( 'SECURE_AUTH_SALT', '~>uXE&k}R;:V[Y)51g9D01#B{0s Bwn<iKMy3>c,^bS{QRLH^Ht~Q6Ua{Gy`I<#f' );
define( 'LOGGED_IN_SALT',   'h; LK^;K{;Y|jn(*h<<DT$lw][9!G=^>!uJWd(L6V}>Dk`Q`Hj#v~JgC)j)dglIi' );
define( 'NONCE_SALT',       'Yq4Xb17R5{I 2!H/tkvdIpULv;6<o!Z=FiD<2F?Sac-oeeb3V8.9Pjq-A1_(gNC%' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
