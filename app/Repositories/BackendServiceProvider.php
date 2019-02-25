<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;
use App\Repositories\TopicRepositoryInterface;
use App\Repositories\TopicRepository;

class BackendServiceProvider extends ServiceProvider
{
    public function boot(){}

    public function register()
    {
        $this->app->bind(
            TopicRepositoryInterface::class,
            TopicRepository::class
            
        );
    }
}