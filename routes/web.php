<?php

use App\Http\Livewire\Admin\Article\CreatePage as ArticleCreatePage;
use App\Http\Livewire\Admin\Article\EditPage as ArticleEditPage;
use App\Http\Livewire\Admin\Article\IndexPage as ArticleIndexPage;
use App\Http\Livewire\Admin\Banner\CreatePage as BannerCreatePage;
use App\Http\Livewire\Admin\Banner\EditPage as BannerEditPage;
use App\Http\Livewire\Admin\Banner\IndexPage as BannerIndexPage;
use App\Http\Livewire\Admin\Category\CreatePage as CategoryCreatePage;
use App\Http\Livewire\Admin\Category\EditPage as CategoryEditPage;
use App\Http\Livewire\Admin\Category\IndexPage as CategoryIndexPage;
use App\Http\Livewire\Admin\Dashboard\IndexPage as AdminIndexPage;
use App\Http\Livewire\Admin\Product\EditPage as ProductEditPage;
use App\Http\Livewire\Admin\Product\CreatePage as ProductCreatePage;
use App\Http\Livewire\Admin\Product\IndexPage as ProductIndexPage;
use App\Http\Livewire\Admin\Province\IndexPage as ProvinceIndexPage;
use App\Http\Livewire\Admin\District\IndexPage as DistrictIndexPage;
use App\Http\Livewire\Admin\Ward\IndexPage as WardIndexPage;
use App\Http\Livewire\Admin\User\IndexPage as UserIndexPage;
use App\Http\Livewire\Admin\User\ProfilePage;
use App\Http\Livewire\Admin\Contact\IndexPage as ContactIndexPage;
use App\Http\Livewire\Admin\Order\IndexPage as OrderIndexPage;
use App\Http\Livewire\Admin\Order\EditPage as OrderEditPage;
use App\Http\Livewire\Client\Home\IndexPage as ClientHomeIndexPage;
use App\Http\Livewire\Client\Article\IndexPage as ClientArticleIndexPage;
use App\Http\Livewire\Client\Shop\IndexPage as ClientShopIndexPage;
use App\Http\Livewire\Client\Product\DetailPage as ClientProductDetail;
use App\Http\Livewire\Client\Article\DetailPage as ClientArticleDetail;
use App\Http\Livewire\Client\User\MyAccount as ClientMyAccount;
use App\Http\Livewire\Client\Cart\IndexPage as ClientCartIndexPage;
use App\Http\Livewire\Client\Order\CheckOutPage as ClientCheckOutPage;
use App\Http\Livewire\Client\Order\ThankYou as ClientThankYouPage;
use App\Http\Livewire\Client\Contact\IndexPage as ClientContactIndexPage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::group(['prefix' => '/', 'middleware' => ['admin', 'verified', 'password.confirm']], function () {
    Route::get('/dashboard', AdminIndexPage::class)->name('dashboard');

    Route::get('categories', CategoryIndexPage::class)->name('categories');
    Route::get('create-category', CategoryCreatePage::class)->name('create-category');
    Route::get('edit-category/{id}', CategoryEditPage::class)->name('edit-category');

    Route::get('articles', ArticleIndexPage::class)->name('articles');
    Route::get('create-articles', ArticleCreatePage::class)->name('create-articles');
    Route::get('edit-articles/{id}', ArticleEditPage::class)->name('edit-articles');

    Route::get('banners', BannerIndexPage::class)->name('banners');
    Route::get('create-banner', BannerCreatePage::class)->name('create-banner');
    Route::get('edit-banner/{id}', BannerEditPage::class)->name('edit-banner');

    Route::get('users', UserIndexPage::class)->name('users');
    Route::get('user-profile', ProfilePage::class)->name('user-profile')->middleware('password.confirm:password.confirm,1');

    Route::get('products', ProductIndexPage::class)->name('products');
    Route::get('create-product', ProductCreatePage::class)->name('create-product');
    Route::get('edit-product/{id}', ProductEditPage::class)->name('edit-product');

    Route::get('provinces', ProvinceIndexPage::class)->name('provinces');
    Route::get('districts', DistrictIndexPage::class)->name('districts');
    Route::get('wards', WardIndexPage::class)->name('wards');

    Route::get('orders', OrderIndexPage::class)->name('orders');
    Route::get('edit-order/{id}', OrderEditPage::class)->name('edit-order');

    Route::get('contacts', ContactIndexPage::class)->name('contacts');
});

Route::get('/', ClientHomeIndexPage::class)->name('/');
Route::get('/lien-he-voi-chung-toi', ClientContactIndexPage::class)->name('contactUs');
Route::get('/bai-viet', ClientArticleIndexPage::class)->name('listOfArticles');
Route::get('/san-pham', ClientShopIndexPage::class)->name('listOfProducts');
Route::get('/chi-tiet-san-pham/{id}/{slug}', ClientProductDetail::class)->name('productDetail');
Route::get('/chi-tiet-bai-viet/{id}/{slug}', ClientArticleDetail::class)->name('articleDetail');
Route::group(['prefix' => '/', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/cam-on', ClientThankYouPage::class)->name('thankYou');
    Route::get('/tai-khoan-cua-toi', ClientMyAccount::class)->name('myAccount');
    Route::get('/gio-hang', ClientCartIndexPage::class)->name('myCart')->middleware('user');
    Route::get('/dat-hang', ClientCheckOutPage::class)->name('checkOut')->middleware('user');
});
