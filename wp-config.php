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
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações
// com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'blog');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

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
define('AUTH_KEY',         'kQjpn,{6/m xbP4S(@KK]vP/#06at;.f,16q^`;PC/Z7uMejKkea],Z-FhV,OYq[');
define('SECURE_AUTH_KEY',  'D BE! e-|XixvLDc,4_TI/IMrouQLTaq+MpU^7{)jx?b?o S%Y`c,4Y(sV|Aq|S]');
define('LOGGED_IN_KEY',    'y#5djW15{^vYKkAVz;5KAn b0SEJNCVn$K WF>S#0MS?=3O;JW)tA6}#~)P=FeLH');
define('NONCE_KEY',        'N3d0+TaZ-zeO$ky5W~G|EM5@A;G1?%d/oeJWAKd/5<}9?p`B[5L]u Li&hsz/>lq');
define('AUTH_SALT',        '/FlWvFp5P1lGQU>tC,6J%P/r!182HZJMIR7|!@k9l#;?Mo_cp}Km)c-ISWYq=RwX');
define('SECURE_AUTH_SALT', 'D}xd,YWau..[w0^(wFe-R$i-r#hO<&qEkGELjH6sqo0/c[S!1(>W)qSIS@5&<SVH');
define('LOGGED_IN_SALT',   '7Cxm}=u}s)1KvErp><V&a{Q}EGereI=1p~a~#!F{0pxee@gxk;yKAUZLNRKcN(:?');
define('NONCE_SALT',       '^nfksR=HK$IEZg?q:~` .%<|Vh#w$bL(TY#GG2DO)KGu)SaT$c#MsX{XITs=Hf;)');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

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
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
