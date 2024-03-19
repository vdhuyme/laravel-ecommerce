<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Livewire\Admin\Post\CreatePage as ArticleCreatePage;
use App\Http\Livewire\Admin\Post\EditPage as ArticleEditPage;
use App\Http\Livewire\Admin\Post\IndexPage as ArticleIndexPage;
use App\Http\Livewire\Admin\Slider\CreatePage as BannerCreatePage;
use App\Http\Livewire\Admin\Slider\EditPage as BannerEditPage;
use App\Http\Livewire\Admin\Slider\IndexPage as BannerIndexPage;
use App\Http\Livewire\Admin\Category\CreatePage as CategoryCreatePage;
use App\Http\Livewire\Admin\Category\EditPage as CategoryEditPage;
use App\Http\Livewire\Admin\Category\IndexPage as CategoryIndexPage;
use App\Http\Livewire\Admin\Dashboard\IndexPage as AdminIndexPage;
use App\Http\Livewire\Admin\Product\EditPage as ProductEditPage;
use App\Http\Livewire\Admin\Product\CreatePage as ProductCreatePage;
use App\Http\Livewire\Admin\Product\IndexPage as ProductIndexPage;
use App\Http\Livewire\Admin\User\IndexPage as UserIndexPage;
use App\Http\Livewire\Admin\User\ProfilePage;
use App\Http\Livewire\Admin\Contact\IndexPage as ContactIndexPage;
use App\Http\Livewire\Admin\Order\IndexPage as OrderIndexPage;
use App\Http\Livewire\Admin\Order\EditPage as OrderEditPage;
use App\Http\Livewire\Client\Cart\IndexPage;
use App\Http\Livewire\Client\Home\IndexPage as ClientHomeIndexPage;
use App\Http\Livewire\Client\Post\IndexPage as ClientArticleIndexPage;
use App\Http\Livewire\Client\Shop\IndexPage as ClientShopIndexPage;
use App\Http\Livewire\Client\Product\DetailPage as ClientProductDetail;
use App\Http\Livewire\Client\Post\DetailPage as ClientArticleDetail;
use App\Http\Livewire\Client\User\MyAccount as ClientMyAccount;
use App\Http\Livewire\Client\Order\CheckOutPage as ClientCheckOutPage;
use App\Http\Livewire\Client\Contact\IndexPage as ClientContactIndexPage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);
Route::get('auth/{provider}/redirect', [SocialiteController::class, 'redirect'])->name('socialite.redirect');
Route::get('auth/{provider}/callback', [SocialiteController::class, 'callback'])->name('socialite.callback');

Route::group(['prefix' => '/'], function () {
    Route::get('/dashboard', AdminIndexPage::class)->name('dashboard');

    Route::get('categories', CategoryIndexPage::class)->name('categories');
    Route::get('create-category', CategoryCreatePage::class)->name('create-category');
    Route::get('edit-category/{id}', CategoryEditPage::class)->name('edit-category');

    Route::get('posts', ArticleIndexPage::class)->name('posts');
    Route::get('create-post', ArticleCreatePage::class)->name('create-posts');
    Route::get('edit-post/{id}', ArticleEditPage::class)->name('edit-posts');

    Route::get('sliders', BannerIndexPage::class)->name('sliders');
    Route::get('create-slider', BannerCreatePage::class)->name('create-slider');
    Route::get('edit-slider/{id}', BannerEditPage::class)->name('edit-slider');

    Route::get('users', UserIndexPage::class)->name('users');
    Route::get('user-profile', ProfilePage::class)->name('user-profile')->middleware('password.confirm:password.confirm,1');

    Route::get('products', ProductIndexPage::class)->name('products');
    Route::get('create-product', ProductCreatePage::class)->name('create-product');
    Route::get('edit-product/{id}', ProductEditPage::class)->name('edit-product');

    Route::get('orders', OrderIndexPage::class)->name('orders');
    Route::get('edit-order/{id}', OrderEditPage::class)->name('edit-order');

    Route::get('contacts', ContactIndexPage::class)->name('contacts');
});

Route::get('/', ClientHomeIndexPage::class)->name('/');
Route::get('/lien-he-voi-chung-toi', ClientContactIndexPage::class)->name('contactUs');
Route::get('/bai-viet', ClientArticleIndexPage::class)->name('listOfArticles');
Route::get('/san-pham', ClientShopIndexPage::class)->name('product-list');
Route::get('/chi-tiet-san-pham/{id}/{slug}', ClientProductDetail::class)->name('product-detail');
Route::get('/chi-tiet-bai-viet/{id}/{slug}', ClientArticleDetail::class)->name('articleDetail');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/gio-hang', IndexPage::class)->name('user-cart');
    Route::get('/tai-khoan-cua-toi', ClientMyAccount::class)->name('myAccount');
    Route::get('/dat-hang', ClientCheckOutPage::class)->name('checkOut')->middleware('user');
});
