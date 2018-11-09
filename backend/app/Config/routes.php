<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */

// Router::resourceMap(array(
//     array('action' => 'index', 'method' => 'GET', 'id' => false),
//     array('action' => 'view', 'method' => 'GET', 'id' => true),
//     array('action' => 'add', 'method' => 'POST', 'id' => false),
// ));
// Router::scope('/', function (RouteBuilder $routes) {
// 	$routes->connect('/', ['controller' => 'EmpSalarys', 'action' => 'index']);
// 	$routes->connect('/addData', ['controller' => 'EmpSalarys', 'action' => 'add']);
// 	$routes->connect('/view', ['controller' => 'EmpSalarys', 'action' => 'view']);
//  });

// Router::connect('/', array('controller' => 'EmpSalarys', 'action' => 'index', 'ext' => 'json'));
Router::connect('/addData', array('controller' => 'EmpSalarys', 'action' => 'add', 'method' => 'post', 'ext' => 'json'));
// Router::connect('/view/:id', array('controller' => 'EmpSalarys', 'action' => 'view', array('pass' => '[id]'), 'ext' => 'json'));
Router::connect('/count', array('controller' => 'EmpSalarys', 'action' => 'countsalary', 'method' => 'post', 'ext' => 'json'));
Router::connect('/page/:no/*', array('controller' => 'EmpSalarys', 'action' => 'pagination', 'method' => 'post', array('pass' => '[no]'), 'ext' => 'json'));
// Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	// Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

	Router::mapResources('empSalarys');
	Router::parseExtensions();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
