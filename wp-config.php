<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define('DB_NAME', 'vietnamexpo_comvn');

/** Username của database */
define('DB_USER', 'root');

/** Mật khẩu của database */
define('DB_PASSWORD', '123456789aA@');

/** Hostname của database */
define('DB_HOST', 'localhost');

/** Database charset sử dụng để tạo bảng database. */
define('DB_CHARSET', 'utf8mb4');

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '$NnVITT4jmMk7-vt~oyOP~4};E)xtU*r<%woB-(0>2zn{k5=/1mGL>?i6%#^Xl[i');
define('SECURE_AUTH_KEY',  '8FT=!X6Wt/<<=<4uJ!M&cjKI#PI h#lor1pk>l~5j4!Poi+1H$lYJQF(qw!`.,~$');
define('LOGGED_IN_KEY',    '?@?=*=_J8%1eP,^J{nD<GY;g&5FP1I?%0>VIM(mZmvZ:J._~0HZ)00:!t!CJO/Nc');
define('NONCE_KEY',        'K9 DKPzF{^up3xjd54LE|*<`*PH[d.2)_s,f<cNa?(@88Oq)kwF`=LLj0k/0cD@-');
define('AUTH_SALT',        'tbqUoU&2mD)G_]G#k=uTzCD&YlcEfh82$b|!.{Gy:#7!BY3v005jIw0anI))XZSq');
define('SECURE_AUTH_SALT', '$ -:h4mQ2WXX^$6Nl,Zu[}:*j;.[ hxQQwxjP~DFNPst7ITZToS?zDry[{@{NV7g');
define('LOGGED_IN_SALT',   '4pRW#^[j-c1Qu53=2/qEA+2B%Kns~&BTGFE(63VBiqA&K #%:jb}}{d}#rRuD!`M');
define('NONCE_SALT',       'U(*z-s3e9po.qXG2F)PX@ib/rW6T,^Cos-Y%N2(mz02p I2xwA=|ob&1Hf#=5e(#');

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix  = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
