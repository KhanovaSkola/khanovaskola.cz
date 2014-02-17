<?php //netteCache[01]000592a:2:{s:4:"time";s:21:"0.19965600 1392483716";s:9:"callbacks";a:3:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:71:"/Users/mikulas/Box Sync/Projects/khanovaskola.cz/app/config/config.neon";i:2;i:1392295174;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:74:"/Users/mikulas/Box Sync/Projects/khanovaskola.cz/app/config/config.db.neon";i:2;i:1392295174;}i:2;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:77:"/Users/mikulas/Box Sync/Projects/khanovaskola.cz/app/config/config.local.neon";i:2;i:1392483714;}}}?><?php
// source: /Users/mikulas/Box Sync/Projects/khanovaskola.cz/app/config/config.neon 
// source: /Users/mikulas/Box Sync/Projects/khanovaskola.cz/app/config/config.db.neon 
// source: /Users/mikulas/Box Sync/Projects/khanovaskola.cz/app/config/config.local.neon 

class SystemContainer extends Nette\DI\Container
{

	public $classes = array(
		'nette\\object' => FALSE, //: nette, nette.cacheJournal, cacheStorage, nette.httpRequestFactory, httpRequest, httpResponse, nette.httpContext, session, nette.userStorage, user, application, router, nette.mailer, nette.database.default, tags, progress, translations, exercises, users, groups, tasks, autocomplete, documents, volunteers, videos, categories, report, subsChecker, amara, mailChimp, google, authenticator_facebook, authors, articles, authenticator_password, authenticator_google, container,
		'nette\\config\\extensions\\netteaccessor' => 'nette',
		'nette\\caching\\storages\\ijournal' => 'nette.cacheJournal',
		'nette\\caching\\storages\\filejournal' => 'nette.cacheJournal',
		'nette\\caching\\istorage' => 'cacheStorage',
		'nette\\caching\\storages\\filestorage' => 'cacheStorage',
		'nette\\http\\requestfactory' => 'nette.httpRequestFactory',
		'nette\\http\\irequest' => 'httpRequest',
		'nette\\http\\request' => 'httpRequest',
		'nette\\http\\iresponse' => 'httpResponse',
		'nette\\http\\response' => 'httpResponse',
		'nette\\http\\context' => 'nette.httpContext',
		'nette\\http\\session' => 'session',
		'nette\\security\\iuserstorage' => 'nette.userStorage',
		'nette\\http\\userstorage' => 'nette.userStorage',
		'nette\\security\\user' => 'user',
		'model\\netteuser' => 'user',
		'nette\\application\\application' => 'application',
		'nette\\application\\ipresenterfactory' => 'nette.presenterFactory',
		'nette\\application\\presenterfactory' => 'nette.presenterFactory',
		'nette\\arraylist' => 'router',
		'traversable' => 'router',
		'iteratoraggregate' => 'router',
		'countable' => 'router',
		'arrayaccess' => 'router',
		'nette\\application\\irouter' => 'router',
		'nette\\application\\routers\\routelist' => 'router',
		'nette\\mail\\imailer' => 'nette.mailer',
		'nette\\mail\\sendmailmailer' => 'nette.mailer',
		'nette\\database\\connection' => 'nette.database.default',
		'vojtechdobes\\netteajax\\onrequesthandler' => 'ajax.onRequestHandler',
		'vojtechdobes\\netteajax\\onresponsehandler' => 'ajax.onResponseHandler',
		'orm\\table' => FALSE, //: tags, progress, translations, exercises, users, groups, tasks, autocomplete, documents, volunteers, videos, categories, authors, articles,
		'selector\\tags' => 'tags',
		'selector\\translations' => 'translations',
		'selector\\exercises' => 'exercises',
		'selector\\users' => 'users',
		'selector\\tasks' => 'tasks',
		'selector\\autocomplete' => 'autocomplete',
		'selector\\documents' => 'documents',
		'selector\\volunteers' => 'volunteers',
		'selector\\videos' => 'videos',
		'selector\\categories' => 'categories',
		'model\\report' => 'report',
		'model\\subtitlechecker' => 'subsChecker',
		'model\\amara' => 'amara',
		'model\\mailchimp' => 'mailChimp',
		'model\\google' => 'google',
		'nette\\security\\iauthenticator' => FALSE, //: authenticator_facebook, authenticator_password, authenticator_google,
		'authenticator\\facebook' => 'authenticator_facebook',
		'selector\\authors' => 'authors',
		'selector\\articles' => 'articles',
		'authenticator\\password' => 'authenticator_password',
		'authenticator\\google' => 'authenticator_google',
		'basefacebook' => 'facebook',
		'facebook' => 'facebook',
		'nette\\freezableobject' => 'container',
		'nette\\ifreezable' => 'container',
		'nette\\di\\container' => 'container',
	);

	public $meta = array();


	public function __construct()
	{
		parent::__construct(array(
			'appDir' => '/Users/mikulas/Box Sync/Projects/khanovaskola.cz/app',
			'wwwDir' => '/Users/mikulas/Box Sync/Projects/khanovaskola.cz/www',
			'debugMode' => FALSE,
			'productionMode' => TRUE,
			'environment' => 'development',
			'consoleMode' => FALSE,
			'container' => array(
				'class' => 'SystemContainer',
				'parent' => 'Nette\\DI\\Container',
			),
			'tempDir' => '/Users/mikulas/Box Sync/Projects/khanovaskola.cz/app/../temp',
			'progress' => array(
				'completed_threshold' => 95,
				'exercise_limit' => 15,
				'exercise_mastery' => 90,
				'exercise_struggle' => 30,
			),
			'github' => array(
				'url' => 'https://api.github.com',
				'id' => '599040d80ae76c23968a',
				'secret' => '6bb0114616800bc8e23a8ecae4e4a885ad265749',
				'token' => '131b7c8fefaadd1276037f58e784241f14cf0e0c',
			),
			'kontrolovac' => array(
				'url' => 'http://kontrolovac.cz/api',
			),
			'google' => array(
				'scope' => array(
					'https://www.googleapis.com/auth/userinfo.profile',
					'https://www.googleapis.com/auth/userinfo.email',
				),
				'id' => '653060487240.apps.googleusercontent.com',
				'secret' => 'sqKWXNodBrC0H1_4mlFonAX5',
			),
			'adminer_editor' => array(
				'role' => 'adminer',
			),
			'https' => FALSE,
			'facebook' => array(
				'appId' => '273608052753035',
				'secret' => '039a8ad1d3359bc6b9d8919a57d87456',
			),
			'metrics' => array(
				'user' => 'rullaf@gmail.com',
				'key' => 'f53e58094d6636effea987e1436969f7d144072da639f6156bf529da40298f5f',
			),
			'database' => array(
				'host' => 'localhost',
				'dbname' => 'khanovaskola',
				'user' => 'root',
				'password' => NULL,
			),
			'database_subs' => array(
				'dbname' => 'khan_report',
			),
			'mailChimp' => array(
				'key' => '3f105d86ae36d4e6d3b61c196e06bc2a-us4',
				'list' => '98d11ac232',
			),
		));
	}


	/**
	 * @return VojtechDobes\NetteAjax\OnRequestHandler
	 */
	protected function createServiceAjax__onRequestHandler()
	{
		$service = new VojtechDobes\NetteAjax\OnRequestHandler($this->getService('httpRequest'), $this->getService('ajax.onResponseHandler'));
		return $service;
	}


	/**
	 * @return VojtechDobes\NetteAjax\OnResponseHandler
	 */
	protected function createServiceAjax__onResponseHandler()
	{
		$service = new VojtechDobes\NetteAjax\OnResponseHandler($this->getService('httpRequest'), $this->getService('httpResponse'), $this->getService('router'));
		return $service;
	}


	/**
	 * @return Model\Amara
	 */
	protected function createServiceAmara()
	{
		$service = new Model\Amara($this->getService('cacheStorage'));
		return $service;
	}


	/**
	 * @return Nette\Application\Application
	 */
	protected function createServiceApplication()
	{
		$service = new Nette\Application\Application($this->getService('nette.presenterFactory'), $this->getService('router'), $this->getService('httpRequest'), $this->getService('httpResponse'));
		$service->catchExceptions = TRUE;
		$service->errorPresenter = 'Error';
		!headers_sent() && header('X-Powered-By: Nette Framework');;
		Nette\Application\Diagnostics\RoutingPanel::initializePanel($service);
		$service->onRequest[] = $this->getService('ajax.onRequestHandler');
		$service->onResponse[] = $this->getService('ajax.onResponseHandler');
		return $service;
	}


	/**
	 * @return Selector\Articles
	 */
	protected function createServiceArticles()
	{
		$service = new Selector\Articles('article', $this->getService('nette.database.default'), $this);
		return $service;
	}


	/**
	 * @return Authenticator\Facebook
	 */
	protected function createServiceAuthenticator_facebook()
	{
		$service = new Authenticator\Facebook($this->getService('users'));
		return $service;
	}


	/**
	 * @return Authenticator\Google
	 */
	protected function createServiceAuthenticator_google()
	{
		$service = new Authenticator\Google($this->getService('users'));
		return $service;
	}


	/**
	 * @return Authenticator\Password
	 */
	protected function createServiceAuthenticator_password()
	{
		$service = new Authenticator\Password($this->getService('users'));
		return $service;
	}


	/**
	 * @return Selector\Authors
	 */
	protected function createServiceAuthors()
	{
		$service = new Selector\Authors('author', $this->getService('nette.database.default'), $this);
		return $service;
	}


	/**
	 * @return Selector\Autocomplete
	 */
	protected function createServiceAutocomplete()
	{
		$service = new Selector\Autocomplete('_autocomplete', $this->getService('nette.database.default'), $this);
		return $service;
	}


	/**
	 * @return Nette\Caching\Storages\FileStorage
	 */
	protected function createServiceCacheStorage()
	{
		$service = new Nette\Caching\Storages\FileStorage('/Users/mikulas/Box Sync/Projects/khanovaskola.cz/app/../temp/cache', $this->getService('nette.cacheJournal'));
		return $service;
	}


	/**
	 * @return Selector\Categories
	 */
	protected function createServiceCategories()
	{
		$service = new Selector\Categories('category', $this->getService('nette.database.default'), $this);
		return $service;
	}


	/**
	 * @return Nette\DI\Container
	 */
	protected function createServiceContainer()
	{
		return $this;
	}


	/**
	 * @return Nette\Database\Connection
	 */
	protected function createServiceDatabase()
	{
		$service = $this->getService('nette.database.default');
		return $service;
	}


	/**
	 * @return Selector\Documents
	 */
	protected function createServiceDocuments()
	{
		$service = new Selector\Documents('document', $this->getService('nette.database.default'), $this);
		return $service;
	}


	/**
	 * @return Selector\Exercises
	 */
	protected function createServiceExercises()
	{
		$service = new Selector\Exercises('exercise', $this->getService('nette.database.default'), $this);
		return $service;
	}


	/**
	 * @return Facebook
	 */
	protected function createServiceFacebook()
	{
		$service = new Facebook(array(
			'appId' => '273608052753035',
			'secret' => '039a8ad1d3359bc6b9d8919a57d87456',
		));
		return $service;
	}


	/**
	 * @return Model\Google
	 */
	protected function createServiceGoogle()
	{
		$service = new Model\Google(array(
			'id' => '653060487240.apps.googleusercontent.com',
			'secret' => 'sqKWXNodBrC0H1_4mlFonAX5',
		));
		return $service;
	}


	/**
	 * @return ORM\Table
	 */
	protected function createServiceGroups()
	{
		$service = new ORM\Table('group', $this->getService('nette.database.default'), $this);
		return $service;
	}


	/**
	 * @return Nette\Http\Request
	 */
	protected function createServiceHttpRequest()
	{
		$service = $this->getService('nette.httpRequestFactory')->createHttpRequest();
		if (!$service instanceof Nette\Http\Request) {
			throw new Nette\UnexpectedValueException('Unable to create service \'httpRequest\', value returned by factory is not Nette\\Http\\Request type.');
		}
		return $service;
	}


	/**
	 * @return Nette\Http\Response
	 */
	protected function createServiceHttpResponse()
	{
		$service = new Nette\Http\Response;
		return $service;
	}


	/**
	 * @return Model\MailChimp
	 */
	protected function createServiceMailChimp()
	{
		$service = new Model\MailChimp('3f105d86ae36d4e6d3b61c196e06bc2a-us4');
		return $service;
	}


	/**
	 * @return Nette\Config\Extensions\NetteAccessor
	 */
	protected function createServiceNette()
	{
		$service = new Nette\Config\Extensions\NetteAccessor($this);
		return $service;
	}


	/**
	 * @return Nette\Forms\Form
	 */
	public function createNette__basicForm()
	{
		$service = new Nette\Forms\Form;
		return $service;
	}


	/**
	 * @return Nette\Caching\Cache
	 */
	public function createNette__cache($namespace = NULL)
	{
		$service = new Nette\Caching\Cache($this->getService('cacheStorage'), $namespace);
		return $service;
	}


	/**
	 * @return Nette\Caching\Storages\FileJournal
	 */
	protected function createServiceNette__cacheJournal()
	{
		$service = new Nette\Caching\Storages\FileJournal('/Users/mikulas/Box Sync/Projects/khanovaskola.cz/app/../temp');
		return $service;
	}


	/**
	 * @return Nette\Database\Connection
	 */
	protected function createServiceNette__database__default()
	{
		$service = new Nette\Database\Connection('mysql:host=localhost;dbname=khanovaskola', 'root', NULL, NULL);
		$service->setSelectionFactory(new Nette\Database\Table\SelectionFactory($service, new Nette\Database\Reflection\DiscoveredReflection($service, $this->getService('cacheStorage')), $this->getService('cacheStorage')));
		Nette\Diagnostics\Debugger::$blueScreen->addPanel('Nette\\Database\\Diagnostics\\ConnectionPanel::renderException');
		return $service;
	}


	/**
	 * @return Nette\Http\Context
	 */
	protected function createServiceNette__httpContext()
	{
		$service = new Nette\Http\Context($this->getService('httpRequest'), $this->getService('httpResponse'));
		return $service;
	}


	/**
	 * @return Nette\Http\RequestFactory
	 */
	protected function createServiceNette__httpRequestFactory()
	{
		$service = new Nette\Http\RequestFactory;
		$service->setEncoding('UTF-8');
		return $service;
	}


	/**
	 * @return Nette\Latte\Engine
	 */
	public function createNette__latte()
	{
		$service = new Nette\Latte\Engine;
		return $service;
	}


	/**
	 * @return Nette\Mail\Message
	 */
	public function createNette__mail()
	{
		$service = new Nette\Mail\Message;
		$service->setMailer($this->getService('nette.mailer'));
		return $service;
	}


	/**
	 * @return Nette\Mail\SendmailMailer
	 */
	protected function createServiceNette__mailer()
	{
		$service = new Nette\Mail\SendmailMailer;
		return $service;
	}


	/**
	 * @return Nette\Application\PresenterFactory
	 */
	protected function createServiceNette__presenterFactory()
	{
		$service = new Nette\Application\PresenterFactory('/Users/mikulas/Box Sync/Projects/khanovaskola.cz/app', $this);
		return $service;
	}


	/**
	 * @return Nette\Templating\FileTemplate
	 */
	public function createNette__template()
	{
		$service = new Nette\Templating\FileTemplate;
		$service->registerFilter($this->createNette__latte());
		$service->registerHelperLoader('Nette\\Templating\\Helpers::loader');
		return $service;
	}


	/**
	 * @return Nette\Caching\Storages\PhpFileStorage
	 */
	protected function createServiceNette__templateCacheStorage()
	{
		$service = new Nette\Caching\Storages\PhpFileStorage('/Users/mikulas/Box Sync/Projects/khanovaskola.cz/app/../temp/cache', $this->getService('nette.cacheJournal'));
		return $service;
	}


	/**
	 * @return Nette\Http\UserStorage
	 */
	protected function createServiceNette__userStorage()
	{
		$service = new Nette\Http\UserStorage($this->getService('session'));
		return $service;
	}


	/**
	 * @return ORM\Table
	 */
	protected function createServiceProgress()
	{
		$service = new ORM\Table('progress', $this->getService('nette.database.default'), $this);
		return $service;
	}


	/**
	 * @return Model\Report
	 */
	protected function createServiceReport()
	{
		$service = new Model\Report('khan_report', 'root', NULL);
		return $service;
	}


	/**
	 * @return Nette\Application\Routers\RouteList
	 */
	protected function createServiceRouter()
	{
		$service = new Nette\Application\Routers\RouteList;
		return $service;
	}


	/**
	 * @return Nette\Http\Session
	 */
	protected function createServiceSession()
	{
		$service = new Nette\Http\Session($this->getService('httpRequest'), $this->getService('httpResponse'));
		$service->setExpiration('14 days');
		return $service;
	}


	/**
	 * @return Model\SubtitleChecker
	 */
	protected function createServiceSubsChecker()
	{
		$service = new Model\SubtitleChecker('http://kontrolovac.cz/api', $this->getService('amara'), $this->getService('cacheStorage'));
		return $service;
	}


	/**
	 * @return Selector\Tags
	 */
	protected function createServiceTags()
	{
		$service = new Selector\Tags('tag', $this->getService('nette.database.default'), $this);
		return $service;
	}


	/**
	 * @return Selector\Tasks
	 */
	protected function createServiceTasks()
	{
		$service = new Selector\Tasks('task', $this->getService('nette.database.default'), $this);
		return $service;
	}


	/**
	 * @return Selector\Translations
	 */
	protected function createServiceTranslations()
	{
		$service = new Selector\Translations('exercise_translation', $this->getService('nette.database.default'), $this);
		return $service;
	}


	/**
	 * @return Model\NetteUser
	 */
	protected function createServiceUser()
	{
		$service = new Model\NetteUser($this->getService('nette.userStorage'), $this, $this->getService('users'), $this->getService('authenticator_facebook'), $this->getService('authenticator_google'), $this->getService('authenticator_password'));
		return $service;
	}


	/**
	 * @return Selector\Users
	 */
	protected function createServiceUsers()
	{
		$service = new Selector\Users('user', $this->getService('nette.database.default'), $this);
		return $service;
	}


	/**
	 * @return Selector\Videos
	 */
	protected function createServiceVideos()
	{
		$service = new Selector\Videos('video', $this->getService('nette.database.default'), $this);
		return $service;
	}


	/**
	 * @return Selector\Volunteers
	 */
	protected function createServiceVolunteers()
	{
		$service = new Selector\Volunteers('volunteer', $this->getService('nette.database.default'), $this);
		return $service;
	}


	public function initialize()
	{
		date_default_timezone_set('Europe/Prague');
		Nette\Diagnostics\Debugger::$email = 'rullaf@gmail.com';
		Nette\Caching\Storages\FileStorage::$useDirectories = TRUE;
		$this->session->exists() && $this->session->start();
		header('X-Frame-Options: SAMEORIGIN');
	}

}
