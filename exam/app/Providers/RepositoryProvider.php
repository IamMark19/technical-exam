<?php

namespace App\Providers;

use App\Repository\Notes\EloquentNote;
use App\Repository\Notes\NoteInterface;
use App\Repository\Todos\TodoInterface;
use App\Repository\Todos\EloquentTodo;
use Illuminate\Support\ServiceProvider;


class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TodoInterface::class,EloquentTodo::class);
        $this->app->bind(NoteInterface::class,EloquentNote::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
