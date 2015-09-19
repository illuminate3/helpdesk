<?php

namespace App\Providers;

use App\Policies\LabelPolicy;
use App\Policies\IssuePolicy;
use App\Policies\CommentPolicy;
use App\Models\Label;
use App\Models\Issue;
use App\Models\Comment;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Issue::class    => IssuePolicy::class,
        Comment::class  => CommentPolicy::class,
        Label::class    => LabelPolicy::class,
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);

        //
    }
}
