<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Blog

Route::get('/', 'FrontEndController@home')->name('blog');
Route::post('/notice', 'FrontEndController@notice')->name('notice');
Route::get('/policy', 'FrontEndController@policy')->name('policy');
Route::get('/staffs', 'FrontEndController@staffs')->name('staffs');
Route::get('/contact', 'FrontEndController@contact')->name('contact');
Route::get('/about', 'FrontEndController@about')->name('about');
Route::get('/developers', 'FrontEndController@developers')->name('developers');
Route::get('/ebook','FrontEndController@ebook')->name('ebooks');
Route::get('/recent','FrontEndController@recent')->name('recent');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/book-search', 'FrontEndController@bookSearch')->name('book.search');
Route::get('/book-detail/{id}', 'FrontEndController@bookDetail')->name('book.detail');




//Admin Url
Route::group(['prefix'=>'admin','middleware'=>['auth','IsAdmin','Fine']], function(){
    Route::resource('users', 'Admin\UsersController');
    Route::get('user/delete/{id}', 'Admin\UsersController@destroy')->name('user.destroy');
    Route::get('user/verify/{id}', 'Admin\UsersController@verify')->name('user.verify');
    Route::get('user/unverify/{id}', 'Admin\UsersController@unverify')->name('user.unverify');
    Route::get('user/admin/{id}', 'Admin\UsersController@admin')->name('user.admin');
    Route::get('user/general/{id}', 'Admin\UsersController@general')->name('user.general');

    // For unapproved users
    Route::get('user/unapprove', 'Admin\UsersController@getUnapprovedUser')->name('users.unapproved');

    // Categories
    Route::resource('category', 'Admin\CategoriesController');
    Route::get('category/books/{id}', 'Admin\CategoriesController@cat_books')->name('category.books');


    //Book self
    Route::resource('shelves', 'Admin\ShelvesController');
    Route::get('shelf/books/{id}', 'Admin\ShelvesController@shelf_books')->name('shelf.books');

    // Book mangement
    Route::resource('books', 'Admin\BooksManagementController');

    //Issue Book
    Route::get('book/{book_id}/issue', 'Admin\IssueController@issue')->name('book.issue');

    Route::resource('issue', 'Admin\IssueController');
    Route::get('issue/book/returned', 'Admin\IssueController@returned')->name('issue.returned');

    Route::get('issue/book_return/{id}', 'Admin\IssueController@book_returned')->name('book.return');
    Route::get('issue/book_pending/{id}', 'Admin\IssueController@book_pending')->name('book.pending');

    Route::get('book/user-email', 'Admin\BooksManagementController@check')->name('email_available.check');
    

    // Sub category
    Route::resource('sub-category','Admin\SubCategoriesController');
    Route::get('sub_cat/books/{id}', 'Admin\SubCategoriesController@sub_cat')->name('sub.books');
    Route::get('sub_category/ajax', 'Admin\SubCategoriesController@getSubCategoryByAjax')->name('sub.category.ajax');

    //Blog
    Route::resource('notices', 'blog\NoticeController');
    Route::resource('staffs', 'blog\StaffController');

    Route::get('policy/edit', 'blog\PolicyController@edit')->name('policy.edit');
    Route::put('policy/edit/{id}', 'blog\PolicyController@update')->name('policy.update');

    Route::resource('contact', 'blog\ContactController');

    Route::get('about/edit', 'blog\AboutController@edit')->name('about.edit');
    Route::put('about/edit/{id}', 'blog\AboutController@update')->name('about.update');

    // Ebook
    Route::resource('ebook','Admin\EbookController');
    // Recent
    Route::resource('recent','Admin\RecentController');

    // Change Pass
    Route::get('changePass','Admin\UsersController@changPass')->name('changPass');
    Route::post('changePass','Admin\UsersController@changePass')->name('changePass');

});





// User Url
Route::group(['middleware'=>'auth'], function(){
    Route::get('book-list', 'User\BookListController@getBooks')->name('user.bookList');
    Route::get('issue-book-list', 'User\BookListController@issueBooks')->name('user.issueBooks');
    Route::get('issue-book-returned', 'User\BookListController@issueBooksReturned')->name('user.issueBooksReturned');

    // Change Pass
    Route::get('changePass','Admin\UsersController@changPass')->name('changPass');
    Route::post('changePass','Admin\UsersController@changePass')->name('changePass');
});
