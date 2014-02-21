<?PHP

/**
 *  
 * @author: Jonas Lohardt Havlykke
 *
 */

define('BASE_PATH', dirname(realpath(__FILE__)) . '/');
define('VIEW_PATH', BASE_PATH . 'views/');



// Twig
require_once BASE_PATH.'vendors/Twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem(VIEW_PATH);
$twig = new Twig_Environment($loader, array(
				'cache'	=>	BASE_PATH.'cache',
				'debug'	=>	true,
		  'auto_reload'	=>	true,
	 'strict_variables'	=>	true,
		   'autoescape'	=>	true,

));


$template = $twig->loadTemplate('main.html');


$profile = array(
    'firstname' => 'Svend',
    'lastname' => 'Hansen',
    'friends' => array(
        array(
            'firstname' => 'John',
            'lastname' => 'Smith'
        ),
        array(
            'firstname' => 'Britney',
            'lastname' => 'Spears'
        ),
        array(
            'firstname' => 'Brad',
            'lastname' => 'Pitt'
        )
    )
);

$params = json_decode(file_get_contents('config.json'),true);
$params['profile'] = $profile;

$template->display($params);

?>