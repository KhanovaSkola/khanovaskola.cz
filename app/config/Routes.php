<?php

use Nette\Application\Routers\Route;
use Nette\Utils\Strings;


class Routes
{

	public function setup($container)
	{
		$container->router[] = new Route('index.php', 'Front:Homepage:default', Route::ONE_WAY);

		/**
		 * API
		 */
		$container->router[] = new Route('//api.<domain>.<top l|cz>/', [
			'module' => 'Api',
			'presenter' => 'Documentation',
		]);
		$container->router[] = new Route('//api.<domain>.<top l|cz>/<presenter>[/<id>[/<method>]]', [
			'module' => 'Api',
			'presenter' => 'Category',
		]);

		/**
		 * SEO Category
		 */
		$categoryRoute = new SlugRoute('<id>[/<action>]', [
			'id' => [
				Route::FILTER_OUT => function ($id) use ($container) {
					if (!is_numeric($id)) {
						return $id;

					} else {
						return Strings::webalize($container->categories->findOneBy(['id' => $id])->label);
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
		 * SEO Video
		 */
		$videoRoute = new SlugRoute('video/<vid>[/<action>]', [
			'vid' => [
				Route::FILTER_OUT => function ($vid) use ($container) {
					if (!is_numeric($vid)) {
						return $vid;

					} else {
						return Strings::webalize($container->videos->findOneBy(['id' => $vid])->label);
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
		$videoRoute->init($container, 'vid', 'videos');
		$container->router[] = $videoRoute;

		/**
		 * SEO Cviceni
		 */
		$exRoute = new SlugRoute('cviceni/<eid>', [
			'eid' => [
				Route::FILTER_OUT => function ($eid) use ($container) {
					if (!is_numeric($eid)) {
						return $eid;

					} else {
						return Strings::webalize($container->exercises->findOneBy(['id' => $eid])->label);
					}
				}
			],
			'module' => 'Front',
			'presenter' => 'Exercise',
			'action' => 'default',
		]);
		$exRoute->init($container, 'eid', 'exercises');
		$container->router[] = $exRoute;

		/**
		 * Shortest add teacher url possible
		 */
		$container->router[] = new Route('u/<coach_id \d+>', [
			'module' => 'Front',
			'presenter' => 'Settings',
			'action' => 'confirmCoach',
		]);

		/**
		 * Direct actions of sign presenter
		 */
		$container->router[] = new Route('<action (prihlaseni|odhlaseni)>', [
			'presenter' => 'Sign',
			'action' => [
				Route::FILTER_TABLE => [
					'prihlaseni' => 'in',
					'odhlaseni' => 'out',
				]
			]
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
				],
			],
			'action' => [
				Route::VALUE => 'default',
				Route::FILTER_TABLE => [
					'pravidla-pouziti' => 'tos',
					'osobni-udaje' => 'privacy',
				]
			]
		]);
	}

}
