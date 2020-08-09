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

// Route::get('/', function () {
//     return view('layout');
// });

//Frontend Related Routes
Route::get('/','FrontController@index');
Route::get('/product-by-category/{id}','FrontController@showProductByCategory');
Route::get('/products-by-manufacture/{id}','FrontController@showProductByManufacture');
Route::get('/product-details','FrontController@productDetails');


//Backend Related Routes..........
//Category Related Routes
Route::get('/add-category','CategoryController@index');
Route::get('/all-category','CategoryController@allCategory');
Route::post('/save-category','CategoryController@saveCategory');

Route::get('/inactive-category/{id}',[
    'uses'=>'CategoryController@unpublishedCategoryInfo',
    'as'=>'inactive-category'
]);
Route::get('/active-category/{id}',[
    'uses'=>'CategoryController@publishedCategoryInfo',
    'as'=>'active-category'
]);
Route::get('/edit-category/{id}','CategoryController@editCategory');
Route::post('/update-category','CategoryController@updateCategory');
Route::get('/delete-category/{id}','CategoryController@deleteCategory');

//Brand Related Table

Route::get('/add-manufacture','ManufactureController@addManufacture');
Route::get('/all-manufacture','ManufactureController@allManufacture');
Route::post('/save-manufacture','ManufactureController@saveManufacture');
Route::get('/inactive-manufacture/{id}',[
    'uses'=>'ManufactureController@unpublishedManufactureInfo',
    'as'=>'inactive-manufacture'
]);
Route::get('/active-manufacture/{id}',[
    'uses'=>'ManufactureController@publishedManufactureInfo',
    'as'=>'active-manufacture'
]);
Route::get('/edit-manufacture/{id}', 'ManufactureController@editManufacture');
Route::post('/update-manufacture', 'ManufactureController@updateManufacture');
Route::get('delete-manufacture/{id}', 'ManufactureController@deleteManufacture');



//Product Related Table
Route::get('/add-product','productController@addProduct');
Route::get('/all-product','productController@allProduct');
Route::post('/save-product','productController@saveProduct');
// Route::post('/manage/product','productController@manageproduct');
Route::get('/active-product/{id}','productController@publishedProductInfo');
Route::get('/inactive-product/{id}','productController@unpublishedProductInfo');
Route::get('/edit-product/{id}','productController@editProduct');
Route::post('/update-product','productController@updateProduct');
Route::get('/delete-product/{id}','productController@deleteProduct');


//Slider Related Table
Route::get('/add-slider',[
	'uses'=>'SliderController@addSlider',
	'as'=>'add-slider'
]);
Route::get('/all-slider',[
	'uses'=>'SliderController@allSlider',
	'as'=>'all-slider'
]);
Route::post('/save-slider','SliderController@saveSlider');
Route::get('/active-slider/{id}','SliderController@publishedSliderInfo');
Route::get('/inactive-slider/{id}','SliderController@unpublishedSliderInfo');
Route::get('/edit-slider/{id}','SliderController@editSlider');
Route::post('/update-slider','SliderController@updateSlider');
Route::get('/delete-slider/{id}','SliderController@deleteSlider');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('backend','AdminController@index');
// Route::get('dashboard','AdminController@showDashboard');
