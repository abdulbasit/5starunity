<?php

namespace App\Providers;
use app\User;
use app\Policices\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\User' => 'App\Policies\UserPolicy',
        'App\Models\Lottery' => 'App\Policies\LotteryPolicy',
        'App\Models\Company' => 'App\Policies\CompanyPolicy',
        'App\Models\Product' => 'App\Policies\ProductPolicy',
        'App\Models\Blog' => 'App\Policies\BlogPolicy',
        'App\Models\Page' => 'App\Policies\FrontEndPagePolicy',
        'App\Models\Testimonial' => 'App\Policies\DonorPolicy',
        'App\Models\ContactUs' => 'App\Policies\ContactUsPolicy',
        'App\Models\Slider' => 'App\Policies\SlidersPolicy',
        'App\Models\DiscountCuppon' => 'App\Policies\DiscountCupponPolicy',
        // 'App\Models\Role' => 'App\Policies\RolesPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
