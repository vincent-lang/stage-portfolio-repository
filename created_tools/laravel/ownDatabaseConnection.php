<?php

namespace App;
use Illuminate\Support\Facades\DB;

// defines the class
class ownDatabaseConnection {

    function __construct($subscription) 
    {
        config(['database.connections.gebruiker' => [
			'driver'        => 'mysql',
			'host'          => $subscription->database_hostname,
			'port'          => $subscription->database_port,
			'database'      => $subscription->database_name,
			'username'      => $subscription->database_username,
			'password'      => $subscription->database_password,
			'prefix'        => env('DB_PREFIX'),
		]]);
    }

    function testConnection(): bool 
    {
        try {
            DB::connection('gebruiker')->getPdo();

            return true;
        } catch (\Throwable $e) {
            return false;
        }
    }
}