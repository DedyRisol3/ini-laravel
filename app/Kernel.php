protected $routeMiddleware = [
    // Middleware lain...
    'auth.custom' => \App\Http\Middleware\Authenticate::class,
    'role' => \App\Http\Middleware\RoleMiddleware::class,
];
