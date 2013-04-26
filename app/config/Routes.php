<?php

namespace Config;

use Nette\Application\Routers\Route;
use Nette\Utils\Strings;


class Routes
{

	public function setup($container)
	{
		if (isset($container->parameters['routerFlags'])) {
			Route::$defaultFlags = $container->parameters['routerFlags'];
		}

		$container->router[] = new Route('index.php', 'Front:Homepage:default', Route::ONE_WAY);

		/** OLD GONE ROUTES */
		$container->router[] = new Route('p', 'Front:Homepage:gone');
		$container->router[] = new Route('vsechny-problemy', [
			'module' => 'Front',
			'presenter' => 'Homepage',
			'action' => 'gone',
		]);

		$container->router[] = new Route('css/dynamic.dcss', [
			'module' => 'Front',
			'presenter' => 'DynamicCss',
			'action' => 'default',
		]);

		/**
		 * SEO Video adwords (short)
		 * @TODO deprecate
		 */
		$videoAdRoute = new VideoAdRoute('a/<vid>', [
			'vid' => [
				Route::FILTER_OUT => function ($vid) use ($container) {
					if (!is_numeric($vid)) {
						return $vid;

					} else {
						return $container->videos->find($vid)->getAdSlug();
					}
				}
			],
			'module' => 'Front',
			'presenter' => 'Watch',
			'action' => 'alias',
		]);
		$videoAdRoute->init($container, 'id', 'vid');
		$container->router[] = $videoAdRoute;

		/**
		 * SEO Video
		 */
		/* OLD VIDEO ROUTE */
		$videoRoute = new VideoRoute('v/<id>/<vid>[/<action>]', [
			'id' => [
				Route::FILTER_OUT => function ($id) use ($container) {
					return $this->filter($container, 'categories', $id);
				}
			],
			'vid' => [
				Route::FILTER_OUT => function ($vid) use ($container) {
					return $this->filter($container, 'videos', $vid);
				}
			],
			'module' => 'Front',
			'presenter' => 'Watch',
			'action' => [
				Route::VALUE => 'default',
				Route::FILTER_TABLE => [
					'upravit' => 'edit',
				]
			],
		], Route::ONE_WAY);
		$videoRoute->init($container, 'id', 'vid');
		$container->router[] = $videoRoute;

		$videoRoute = new VideoRoute('<id>/<vid>/lekce[/<action>]', [
			'id' => [
				Route::FILTER_OUT => function ($id) use ($container) {
					return $this->filter($container, 'categories', $id);
				}
			],
			'vid' => [
				Route::FILTER_OUT => function ($vid) use ($container) {
					return $this->filter($container, 'videos', $vid);
				}
			],
			'module' => 'Front',
			'presenter' => 'Watch',
			'action' => [
				Route::VALUE => 'default',
				Route::FILTER_TABLE => [
					'upravit' => 'edit',
				]
			],
		]);
		$videoRoute->init($container, 'id', 'vid');
		$container->router[] = $videoRoute;

		/**
		 * SEO Cviceni
		 */
		/* OLD EXERCISE ROUTE */
		$exerciseRoute = new ExerciseRoute('cviceni/<eid>[/<action>]', [
			'eid' => [
				Route::FILTER_OUT => function ($eid) use ($container) {
					return $this->filter($container, 'exercises', $eid);
				}
			],
			'module' => 'Front',
			'presenter' => 'Exercise',
			'action' => [
				Route::VALUE => 'default',
				Route::FILTER_TABLE => [
					'upravit' => 'edit',
				]
			],
		], Route::ONE_WAY);
		$exerciseRoute->init($container, NULL, 'eid');
		$container->router[] = $exerciseRoute;

		/* OLD EXERCISE ROUTE */
		$exerciseRoute = new ExerciseRoute('cviceni/<id>/<eid>[/<action>]', [
			'id' => [
				Route::FILTER_OUT => function ($id) use ($container) {
					return $this->filter($container, 'categories', $id);
				}
			],
			'eid' => [
				Route::FILTER_OUT => function ($eid) use ($container) {
					return $this->filter($container, 'exercises', $eid);
				}
			],
			'module' => 'Front',
			'presenter' => 'Exercise',
			'action' => [
				Route::VALUE => 'default',
				Route::FILTER_TABLE => [
					'upravit' => 'edit',
				]
			],
		], Route::ONE_WAY);
		$exerciseRoute->init($container, 'id', 'eid');
		$container->router[] = $exerciseRoute;

		$exerciseRoute = new ExerciseRoute('<id>/<eid>/cviceni[/<action>]', [
			'id' => [
				Route::FILTER_OUT => function ($id) use ($container) {
					return $this->filter($container, 'categories', $id);
				}
			],
			'eid' => [
				Route::FILTER_OUT => function ($eid) use ($container) {
					return $this->filter($container, 'exercises', $eid);
				}
			],
			'module' => 'Front',
			'presenter' => 'Exercise',
			'action' => [
				Route::VALUE => 'default',
				Route::FILTER_TABLE => [
					'upravit' => 'edit',
				]
			],
		]);
		$exerciseRoute->init($container, 'id', 'eid');
		$container->router[] = $exerciseRoute;

		/** OLD VIDEO ROUTE */
		$videoRoute = new VideoRoute('<id>/<vid>[/<action>]', [
			'id' => [
				Route::FILTER_OUT => function ($id) use ($container) {
					return $this->filter($container, 'categories', $id);
				}
			],
			'vid' => [
				Route::FILTER_OUT => function ($vid) use ($container) {
					return $this->filter($container, 'videos', $vid);
				}
			],
			'module' => 'Front',
			'presenter' => 'Watch',
			'action' => [
				Route::VALUE => 'default',
				Route::FILTER_TABLE => [
					'upravit' => 'edit',
				]
			],
		]);
		$videoRoute->init($container, 'id', 'vid');
		$container->router[] = $videoRoute;

		/**
		 * SEO Category
		 */
		$categoryRoute = new SlugRoute('<id>[/<action>]', [
			'id' => [
				Route::FILTER_OUT => function ($id) use ($container) {
					return $this->filter($container, 'categories', $id);
				}
			],
			'module' => 'Front',
			'presenter' => 'Browse',
			'action' => [
				Route::VALUE => 'default',
				Route::FILTER_TABLE => [
					'upravit' => 'edit',
				]
			],
		]);
		$categoryRoute->init($container, 'id', 'categories');
		$container->router[] = $categoryRoute;

		/**
		 * SEO Tag
		 */
		$tagRoute = new SlugRoute('tag/<tid>[/<action>]', [
			'tid' => [
				Route::FILTER_OUT => function ($tid) use ($container) {
					return $this->filter($container, 'tags', $tid);
				}
			],
			'module' => 'Front',
			'presenter' => 'Tag',
			'action' => 'default',
		]);
		$tagRoute->init($container, 'tid', 'tags');
		$container->router[] = $tagRoute;

		/**
		 * SEO Blog
		 */
		$blogRoute = new SlugRoute('blog/<aid>', [
			'aid' => [
				Route::FILTER_OUT => function ($aid) use ($container) {
					return $this->filter($container, 'articles', $aid);
				}
			],
			'module' => 'Front',
			'presenter' => 'Blog',
			'action' => 'detail',
		]);
		$blogRoute->init($container, 'aid', 'articles');
		$container->router[] = $blogRoute;

		/**
		 * Shortest add teacher url possible
		 */
		/** OLD TEACHER ROUTE */
		$container->router[] = new Route('u/<coach_id \d+>', [
			'module' => 'Front',
			'presenter' => 'Homepage',
			'action' => 'gone',
		], Route::ONE_WAY);
		$container->router[] = new Route('u/<coach_id \d+>-<hash>', [
			'module' => 'Front',
			'presenter' => 'Profile',
			'action' => 'confirmCoach',
		]);

		/**
		 * Static files
		 */
		$container->router[] = new Route('sitemap[!.xml]', [
			'presenter' => 'Static',
			'action' => 'sitemap',
		]);
		$container->router[] = new Route('opensearch[!.xml]', [
			'presenter' => 'Static',
			'action' => 'opensearch',
		]);
		$container->router[] = new Route("robots.txt", [
			'presenter' => 'Static',
			'action' => 'robots',
		]);

		/**
		 * Direct actions of sign presenter
		 */
		$container->router[] = new Route('<action (prihlaseni|odhlaseni|fb-auth|google-auth)>', [
			'presenter' => 'Sign',
			'action' => [
				Route::FILTER_TABLE => [
					'prihlaseni' => 'in',
					'odhlaseni' => 'out',
				]
			]
		]);
		$container->router[] = new Route('auth/<action>', [
			'presenter' => 'Sign',
			'action' => 'default',
		]);
		$container->router[] = new Route('knihovna', [
			'module' => 'Front',
			'presenter' => 'Homepage',
			'action' => 'library',
		]);
		$container->router[] = new Route('newsletter', [
			'module' => 'Front',
			'presenter' => 'Homepage',
			'action' => 'newsletter',
		]);
		$container->router[] = new Route('newsletter-podekovani', [
			'module' => 'Front',
			'presenter' => 'Homepage',
			'action' => 'newsletterThanks',
		]);

		/**
		 * Moderator module without tanslations
		 */
		$container->router[] = new Route('moderator/<presenter>/<action>[/<id>]', [
			'module' => 'Moderator',
			'presenter' => 'Dashboard',
			'action' => 'default',
		]);

		/**
		 * Coach module
		 */
		$container->router[] = new Route('ucit/<presenter>/<action>', [
			'module' => 'Coach',
			'presenter' => [
				Route::VALUE => 'Dashboard',
				Route::FILTER_TABLE => [
					'prehled' => 'Dashboard',
					'skupina' => 'Group',
					'student' => 'Profile',
					'ukol' => 'Task',
				],
			],
			'action' => [
				Route::VALUE => 'default',
				Route::FILTER_TABLE => [
					'pridat-studenty' => 'addStudents',
					'nemate-studenty' => 'noStudents',
					'upravit' => 'edit',
				],
			],
		]);

		$container->router[] = new Route('log[/<action>]', [
			'module' => 'Log',
			'presenter' => 'Exception',
			'action' => 'default'
		]);

		/**
		 * Other presenters
		 */
		$container->router[] = new Route('<presenter>/<action>[/<id>]', [
			'module' => 'Front',
			'presenter' => [
				Route::VALUE => 'Homepage',
				Route::FILTER_TABLE => [
					'cviceni' => 'Exercise',
					'registrace' => 'Registration',
					'o-skole' => 'About',
					'kontakt' => 'Contact',
					'dobrovolnici' => 'Volunteer',
					'profil' => 'Profile',
					'dokumenty' => 'Document',
					'hledat' => 'Search',
					'video' => 'Watch',
				],
			],
			'action' => [
				Route::VALUE => 'default',
				Route::FILTER_TABLE => [
					'pravidla-pouziti' => 'tos',
					'osobni-udaje' => 'privacy',
					'ucit' => 'coach',
					'pravidla-prekladu' => 'rules',
					'projekty' => 'projects',
					'sponzori' => 'sponsors',
					'vitejte' => 'welcome',
					'pridat' => 'add',
					'preklad' => 'howToTranslate',
					'preklad-cviceni' => 'howToTranslateExercises',
				],
			],
		]);
	}



	private function filter($container, $selector, $id)
	{
		if (!is_numeric($id)) {
			return $id;

		} else {
			$object = $container->$selector->find($id);
			if ($object)
				return $object->getSlug();
			return FALSE;
		}
	}

}
