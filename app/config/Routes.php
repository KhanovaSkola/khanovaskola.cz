<?php

use Nette\Application\Routers\Route;
use Nette\Utils\Strings;


class Routes
{

	public function setup($container)
	{
		$container->router[] = new Route('index.php', 'Front:Homepage:default', Route::ONE_WAY);

		/**
		 * 410 Gone
		 */
/** REMOVE 2013/03/01+ */
		$container->router[] = new Route("fyzika/<path .*>", [
			'module' => 'Front',
			'presenter' => 'Homepage',
			'action' => 'gone',
		]);
		$container->router[] = new Route("vedy", [
			'module' => 'Front',
			'presenter' => 'Homepage',
			'action' => 'gone',
		]);
		$container->router[] = new Route("kontakt/\$baseUrl", [
			'module' => 'Front',
			'presenter' => 'Homepage',
			'action' => 'gone',
		]);
		$container->router[] = new Route("kontakt/osobni-udaje", [
			'module' => 'Front',
			'presenter' => 'Homepage',
			'action' => 'gone',
		]);
/** end REMOVE 2013/03/01+ */

		$container->router[] = new Route('css/dynamic.dcss', [
			'module' => 'Front',
			'presenter' => 'DynamicCss',
			'action' => 'default',
		]);

		/**
		 * SEO Video adwords (short)
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
		$videoRoute = new VideoRoute('[!v/]<id>/<vid>[/<action>]', [
			'id' => [
				Route::FILTER_OUT => function ($id) use ($container) {
					if (!is_numeric($id)) {
						return $id;

					} else {
						return $container->categories->find($id)->getSlug();
					}
				}
			],
			'vid' => [
				Route::FILTER_OUT => function ($vid) use ($container) {
					if (!is_numeric($vid)) {
						return $vid;

					} else {
						return $container->videos->find($vid)->getSlug();
					}
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

/** REMOVE 2013/02/01+ */
		$oldVideo = new SlugRoute('video/<vid>[/<action>]', [
			'vid' => [
				Route::FILTER_OUT => function ($vid) use ($container) {
					if (!is_numeric($vid)) {
						return $vid;

					} else {
						return $container->videos->find($vid)->getSlug();
					}
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
		$oldVideo->init($container, 'vid', 'videos');
		$container->router[] = $oldVideo;
/** end REMOVE 2013/02/01+ */

		/**
		 * SEO Category
		 */
		$categoryRoute = new SlugRoute('<id>[/<action>]', [
			'id' => [
				Route::FILTER_OUT => function ($id) use ($container) {
					if (!is_numeric($id)) {
						return $id;

					} else {
						return $container->categories->find($id)->getSlug();
					}
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
		 * SEO Cviceni
		 */
		$exerciseRoute = new ExerciseRoute('[!cviceni/]<id>/<eid>[/<action>]', [
			'id' => [
				Route::FILTER_OUT => function ($id) use ($container) {
					if (!is_numeric($id)) {
						return $id;

					} else {
						return $container->categories->find($id)->getSlug();
					}
				}
			],
			'eid' => [
				Route::FILTER_OUT => function ($eid) use ($container) {
					if (!is_numeric($eid)) {
						return $eid;

					} else {
						return $container->exercises->find($eid)->getSlug();
					}
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

/** REMOVE 2013/03/01+ */
		$oldExerciseRoute = new SlugRoute('cviceni/<eid>', [
			'eid' => [
				Route::FILTER_OUT => function ($eid) use ($container) {
					if (!is_numeric($eid)) {
						return $eid;

					} else {
						return $container->exercises->find($eid)->getSlug();
					}
				}
			],
			'module' => 'Front',
			'presenter' => 'Exercise',
			'action' => 'default',
		]);
		$oldExerciseRoute->init($container, 'eid', 'exercises');
		$container->router[] = $oldExerciseRoute;
/** end REMOVE 2013/03/01+ */

		/**
		 * SEO Tag
		 */
		$tagRoute = new SlugRoute('tag/<tid>[/<action>]', [
			'tid' => [
				Route::FILTER_OUT => function ($tid) use ($container) {
					if (!is_numeric($tid)) {
						return $tid;

					} else {
						return $container->tags->find($tid)->getSlug();
					}
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
					if (!is_numeric($aid)) {
						return $aid;

					} else {
						return $container->articles->find($aid)->getSlug();
					}
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
		$container->router[] = new Route('u/<coach_id \d+>', [
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
				],
			],
		]);
	}

}
