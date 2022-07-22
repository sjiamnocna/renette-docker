<?php declare(strict_types=1);

namespace APIcation;

use Nette\DI\Container;
use Nette\Configurator;

class Bootstrap
{
	public static function boot(): Container
	{
		$configurator = new Configurator();

      $configurator->addDynamicParameters([
        'ENV' => getenv()
      ]);

		$configurator->setDebugMode(boolval($_ENV['DEBUG_MODE'] ?? false));
		$configurator->enableTracy(__DIR__ . '/../log');

		$configurator->setTimeZone('Europe/Prague');
		$configurator->setTempDirectory(__DIR__ . '/../temp');

		$configurator->createRobotLoader()
			->addDirectory(__DIR__)
			->register();

		$configurator->addConfig(__DIR__ . '/config/local.neon');
		$configurator->addConfig(__DIR__ . '/config/common.neon');

		return $configurator->createContainer();
	}
}