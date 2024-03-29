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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/invoices/generate-pdf/{invoice}','InvoicesController@generatePDF')
    ->name('invoices.generate_pdf');


Route::middleware(['auth'])->group(function() {

    // Dashboard
    Route::get('/dashboard', 'DashboardController@index')
        ->name('dashboard');


    Route::get('/products/index','ProductsController@index')
        ->name('products.index');
    Route::get('/products/create','ProductsController@create')
        ->name('products.create');
    Route::post('/products/create','ProductsController@store')
        ->name('products.store');
    Route::get('/products/edit/{product}','ProductsController@edit')
        ->name('products.edit');
    Route::get('/products/view/{product}','ProductsController@view')
        ->name('products.view');
    Route::post('/products/edit/{product}','ProductsController@update')
        ->name('products.update');
    Route::delete('/products/delete/{product}','ProductsController@destroy')
        ->name('products.delete');
    Route::get('/products/search','ProductsController@search')
        ->name('products.search');
    Route::get('/products/create-multiple','ProductsController@addMultiple')
        ->name('products.create_multiple');
    Route::post('/products/create-multiple','ProductsController@processAddMultiple')
        ->name('products.process_create_multiple');


// Customers
    Route::get('/customers/index','CustomersController@index')
        ->name('customers.index');
    Route::get('/customers/create','CustomersController@create')
        ->name('customers.create');
    Route::post('/customers/create','CustomersController@store')
        ->name('customers.store');
    Route::get('/customers/view/{customer}','CustomersController@show')
        ->name('customers.view');
    Route::get('/customers/edit/{customer}','CustomersController@edit')
        ->name('customers.edit');
    Route::post('/customers/edit/{customer}','CustomersController@update')
        ->name('customers.update');
    Route::delete('/customers/delete/{customer}','CustomersController@destroy')
        ->name('customers.delete');




// suppliers
    Route::get('/suppliers/index','SuppliersController@index')
        ->name('suppliers.index');
    Route::get('/suppliers/create','SuppliersController@create')
        ->name('suppliers.create');
    Route::post('/suppliers/create','SuppliersController@store')
        ->name('suppliers.store');
    Route::get('/suppliers/edit/{supplier}','SuppliersController@edit')
        ->name('suppliers.edit');
    Route::post('/suppliers/edit/{supplier}','SuppliersController@update')
        ->name('suppliers.update');
    Route::delete('/suppliers/delete/{supplier}','SuppliersController@destroy')
        ->name('suppliers.delete');


// Invoices
    Route::get('/invoices/index','InvoicesController@index')
        ->name('invoices.index');
    Route::get('/invoices/create','InvoicesController@create')
        ->name('invoices.create');
    Route::post('/invoices/create','InvoicesController@store')
        ->name('invoices.store');
    Route::get('/invoices/view/{invoice}','InvoicesController@show')
        ->name('invoices.show');
    Route::delete('/invoices/delete/{invoice}','InvoicesController@destroy')
        ->name('invoices.delete');


    // Item categories
    Route::get('/data-center/categories/index','CategoriesController@index')
        ->name('categories.index');
    Route::get('/data-center/categories/create','CategoriesController@create')
        ->name('categories.create');
    Route::post('/data-center/categories/create','CategoriesController@store')
        ->name('categories.store');
    Route::get('/data-center/categories/edit/{category}','CategoriesController@edit')
        ->name('categories.edit');
    Route::post('/data-center/categories/edit/{category}','CategoriesController@update')
        ->name('categories.update');
    Route::delete('/data-center/categories/delete/{category}','CategoriesController@destroy')
        ->name('categories.delete');



// Items
    Route::get('/inventory/items/index','ItemsController@index')
        ->name('items.index');
    Route::get('/inventory/items/create','ItemsController@create')
        ->name('items.create');
    Route::post('/inventory/items/create','ItemsController@store')
        ->name('items.store');
    Route::get('/inventory/items/edit/{item}','ItemsController@edit')
        ->name('items.edit');
    Route::post('/inventory/items/edit/{item}','ItemsController@update')
        ->name('items.update');
    Route::delete('/inventory/items/delete/{item}','ItemsController@destroy')
        ->name('items.delete');


    // Ajax
    Route::get('/items/index','ItemsController@index');

    Route::get('/items/search','ItemsController@search')
        ->name('items.search');

// Item categories
    Route::get('/item-categories/index','ItemCategoriesController@index')
        ->name('item_categories.index');
    Route::get('/item-categories/create','ItemCategoriesController@create')
        ->name('item_categories.create');
    Route::post('/item-categories/create','ItemCategoriesController@store')
        ->name('item_categories.store');
    Route::get('/item-categories/edit/{itemCategory}','ItemCategoriesController@edit')
        ->name('item_categories.edit');
    Route::post('/item-categories/edit/{itemCategory}','ItemCategoriesController@update')
        ->name('item_categories.update');
    Route::delete('/item-categories/delete/{itemCategory}','ItemCategoriesController@destroy')
        ->name('item_categories.delete');
    Route::get('/item-categories/get-option-values/{id}','ItemCategoriesController@fetchOptionValues')
        ->name('item_categories.fetch_option_values');


// Users
    Route::get('/users/index','UsersController@index')
        ->name('users.index');
    Route::get('/users/create','UsersController@create')
        ->name('users.create');
    Route::post('/users/create','UsersController@store')
        ->name('users.store');
    Route::get('/users/edit/{user}','UsersController@edit')
        ->name('users.edit');
    Route::post('/users/edit/{user}','UsersController@update')
        ->name('users.update');
    Route::delete('/users/delete/{user}','UsersController@destroy')
        ->name('users.delete');


// stocks
    Route::get('/stocks/add','StocksController@add')
        ->name('stocks.add');
    Route::post('/stocks/add','StocksController@store')
        ->name('stocks.store');
    Route::get('/stocks/histories','StocksController@history')
        ->name('stocks.history');
    Route::get('/stocks/show/{stock}','StocksController@show')
        ->name('stocks.view');



    // Partners
    Route::get('/partners/index','PartnersController@index')
        ->name('partners.index');
    Route::get('/partners/create','PartnersController@create')
        ->name('partners.create');
    Route::post('/partners/create','PartnersController@store')
        ->name('partners.store');
    Route::get('/partners/edit/{partner}','PartnersController@edit')
        ->name('partners.edit');
    Route::post('/partners/edit/{partner}','PartnersController@update')
        ->name('partners.update');
    Route::delete('/partners/delete/{partner}','PartnersController@destroy')
        ->name('partners.delete');

    Route::get('/partners/get-names','PartnersController@getNames')
        ->name('partners.get_names');


    //Purchases
    Route::get('/purchases/index','PurchasesController@index')
        ->name('purchases.index');
    Route::get('/purchases/create','PurchasesController@create')
        ->name('partners.create');
    Route::post('/partners/create','PurchasesController@store')
        ->name('partners.store');


    // Settings
    Route::get('/settings','SettingsController@index')
        ->name('settings');
    Route::post('/settings','SettingsController@update')
        ->name('settings');

    // Settings
    Route::get('/business-settings','BusinessSettingsController@index')
        ->name('business_settings');
    Route::post('/business-settings','BusinessSettingsController@update')
        ->name('business_settings.update');

    // Invoice Settings
    Route::get('/invoice-settings','InvoiceSettingsController@index')
        ->name('invoice_settings');
    Route::post('/invoice-settings','InvoiceSettingsController@update')
        ->name('invoice_settings.update');

    // general Settings
    Route::get('/general-settings','GeneralsController@index')
        ->name('general_settings');
    Route::post('/general-settings','GeneralsController@update')
        ->name('general_settings.update');


// Data center
    Route::get('/data-center/items/index','ItemsDataCenterController@index')
        ->name('items_data_center.index');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/search-license-number', 'LicenseNumberController@search')
        ->name('license_number.search');


    ####################################################



    Route::get('/inventory-item-types/index','InventoryItemTypesController@index')
        ->name('inventoryItemTypes.index');
    Route::get('/inventory-item-types/create','InventoryItemTypesController@create')
        ->name('inventoryItemTypes.create');
    Route::post('/inventory-item-types/create','InventoryItemTypesController@store')
        ->name('inventoryItemTypes.store');
    Route::get('/inventory-item-types/view/{inventoryItemType}','InventoryItemTypesController@show')
        ->name('inventoryItemTypes.view');
    Route::get('/inventory-item-types/edit/{inventoryItemType}','InventoryItemTypesController@edit')
        ->name('inventoryItemTypes.edit');
    Route::post('/inventory-item-types/edit/{inventoryItemType}','InventoryItemTypesController@update')
        ->name('inventoryItemTypes.update');
    Route::delete('/inventory-item-types/delete/{inventoryItemType}','InventoryItemTypesController@destroy')
        ->name('inventoryItemTypes.delete');


    Route::get('/inventory-items/index','InventoryItemsController@index')
        ->name('inventoryItems.index');
    Route::get('/inventory-items/create','InventoryItemsController@create')
        ->name('inventoryItems.create');
    Route::post('/inventory-items/create','InventoryItemsController@store')
        ->name('inventoryItems.store');
    Route::get('/inventory-items/view/{inventoryItem}','InventoryItemsController@show')
        ->name('inventoryItems.view');
    Route::get('/inventory-items/edit/{inventoryItem}','InventoryItemsController@edit')
        ->name('inventoryItems.edit');
    Route::post('/inventory-items/edit/{inventoryItem}','InventoryItemsController@update')
        ->name('inventoryItems.update');
    Route::delete('/inventory-items/delete/{inventoryItem}','InventoryItemsController@destroy')
        ->name('inventoryItems.delete');


    Route::get('/sell/create','SellController@create')
        ->name('sell.create');

    Route::post('/sell/create','SellController@store')
        ->name('sell.store');


    // Product categories
    Route::get('/product-categories/index','ProductCategoriesController@index')
        ->name('productCategories.index');
    Route::get('/product-categories/create','ProductCategoriesController@create')
        ->name('productCategories.create');
    Route::post('/product-categories/create','ProductCategoriesController@store')
        ->name('productCategories.store');
    Route::get('/product-categories/edit/{productCategory}','ProductCategoriesController@edit')
        ->name('productCategories.edit');
    Route::post('/product-categories/edit/{productCategory}','ProductCategoriesController@update')
        ->name('productCategories.update');
    Route::delete('/product-categories/delete/{productCategory}','ProductCategoriesController@destroy')
        ->name('productCategories.delete');


    Route::get('/receipts/index','ReceiptsController@index')
        ->name('receipts.index');
    Route::get('/receipts/create','ReceiptsController@create')
        ->name('receipts.create');
    Route::post('/receipts/create','ReceiptsController@store')
        ->name('receipts.store');
    Route::get('/receipts/edit/{itemCategory}','ReceiptsController@edit')
        ->name('receipts.edit');
    Route::post('/receipts/edit/{itemCategory}','ReceiptsController@update')
        ->name('receipts.update');
    Route::delete('/receipts/delete/{itemCategory}','ReceiptsController@destroy')
        ->name('receipts.delete');


    Route::get('/recipes/index','RecipesController@index')
        ->name('recipes.index');
    Route::get('/recipes/create','RecipesController@create')
        ->name('recipes.create');
    Route::post('/recipes/create','RecipesController@store')
        ->name('recipes.store');
    Route::get('/recipes/edit/{recipe}','RecipesController@edit')
        ->name('recipes.edit');
    Route::post('/recipes/edit/{recipe}','RecipesController@update')
        ->name('recipes.update');
    Route::delete('/recipes/delete/{recipe}','RecipesController@destroy')
        ->name('recipes.delete');

});











