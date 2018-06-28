<?php

/**
 * Class DoctrineSetup
 *
 * @package DoctrineSetup
 */
class DoctrineSetup
{

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public static function createEntityManager() : \Doctrine\ORM\EntityManager {
        /** @var \Illuminate\Foundation\Application $app */
        $app = require __DIR__ . '/../../bootstrap/app.php';

        $app
            ->loadEnvironmentFrom('.env.testing')
            ->make(Illuminate\Contracts\Console\Kernel::class)
            ->bootstrap()
        ;

        return $app->make('em');
    }
}
