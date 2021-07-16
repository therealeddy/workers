<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'workers' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', 'mysql' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

define('WP_MEMORY_LIMIT', '128M');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'ua~A()K@mgBzTGa<l~/ {v!BwjK2.DK_E+w99U:I0=r(7TDUz!VxMo/t<N@TvNo;' );
define( 'SECURE_AUTH_KEY',  '8v?}fs.7a?~:xykF6aujB$$;vVgN3Z^fEUaf(]iwp|q(,E22 DD&6!k8(GZYm|F=' );
define( 'LOGGED_IN_KEY',    '`~;GLyB3!3{q]4h@cn_JQVV&589r<U|<<O|Od/+dLA86cap ~MTyT4#h1ul17 g7' );
define( 'NONCE_KEY',        'Q#Xx=%/51V}FR><9pNG4(KgJJ}<MSfYHDX1cCfv6:wz}zx*u/.?a^JwgV]Z?KiSS' );
define( 'AUTH_SALT',        'EF:6af9^zj3aPQw;sd*<Xbh@)V|`R5*`7Hg6G:W_5#V*,hj5B.6HB,ZW)l>KM=n/' );
define( 'SECURE_AUTH_SALT', '8@`^1e5Nk,iVx[VumlTBo)[XqCpZONVa_R3#;e;_O^!!8PpkU}2sO6Tmm79cZnR5' );
define( 'LOGGED_IN_SALT',   '+iCmQq8|7rT#`e$zFDQLiMeu965y3uH.:?0,+yIzFuWw`tmjYj#9W3tG3$|%Cw>8' );
define( 'NONCE_SALT',       '(!,,X%?.&~Y<+Q&X#d@iS.Nx!&T!8PJxSa Q[h*@aTS[zaEe0<2GMrY@5]] #h>k' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
