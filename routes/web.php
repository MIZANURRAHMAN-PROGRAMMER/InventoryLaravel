<?php

Route::get('/', function () {
    return Redirect()->route('login');
});

Auth::routes(['verify' => true]);






Route::group(['middleware' => 'verified'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/pos', 'PosController@posView')->name('pos');

    //employee Route start
    Route::get('/add_employee','Employee@addemployee')->name('add.employee');
    Route::Post('/insert_employee','Employee@insetEmployee');
    Route::get('/all_employee', 'Employee@allemployee')->name('all.employee');
    Route::get('delete-data/{id}','EmployeeController@deleteEmployee' );
    Route::get('view-data/{id}','EmployeeController@viewEmployee');
    Route::get('edit-data/{id}', 'EmployeeController@editEmployee');
    Route::post('/update_employee/{id}','EmployeeController@updateEmployee');


    //Cumtomers route start
    Route::get('/add_customer','CustomerController@addcustomer')->name('add.customer');
    Route::get('/all_customer', 'CustomerController@allcustomer')->name('all.customer');
    Route::Post('/insert_data', 'CustomerController@insertCustomer');
    Route::get('delete-customer/{id}','CustomerController@deleteCustomer');
    Route::get('edit-customer/{id}','CustomerController@updateCustomer');
    Route::post('/update_customer/{id}','CustomerController@editCustomer');


    //Supllier route start
    Route::get('/add_supplier','SupplierController@addSupplier')->name('add.supplier');
    Route::get('/all_supplier', 'SupplierController@allSupplier')->name('all.supplier');
    Route::Post('/insert_supplier', 'SupplierController@insetSupplier');
    Route::get('edit-supplier/{id}','SupplierController@updateSupplier');
    Route::post('/update_supplier/{id}','SupplierController@editSupplier');


    //employee salary route start
    Route::get('/add_salary','SalaryController@addSalary')->name('add.salary');
    Route::get('/all_salary', 'SalaryController@allSalary')->name('all.salary');
    Route::get('/advanced_salary', 'SalaryController@advancedSalary')->name('advanced.salary');
    Route::Post('/insert_advanced_salary', 'SalaryController@insetAdSalary');
    Route::get('/all_AdvancedSalary', 'SalaryController@allAdvancedSalary')->name('all.advanced.salary');



    //Catagory route here
    Route::get('/catagory','CatagoryController@catagory')->name('all.catagory');
    Route::post('/add_catagory','CatagoryController@addCatagory');
    Route::get('delete-catagory/{id}', 'CatagoryController@deleteCatagory');
    // Route::get('edit-catagory/{id}','CatagoryController@editCatagory');


    //Product route here
    Route::get('/product','ProductController@product')->name('add.product');
    Route::post('/add_product','ProductController@addProduct');
    Route::get('delete-product/{id}', 'ProductController@deleteProduct');
    Route::get('edit-product/{id}', 'ProductController@updateProduct');
    Route::post('/update_product/{id}', 'ProductController@editProduct');
    //excel import and export
    Route::get('/import-product','ProductController@ImportProduct')->name('import.product');
    Route::get('/export','ProductController@export')->name('export');
    Route::post('/import','ProductController@import');

    //purchase route here
    Route::get('/add_purchase','PurchaseController@addPurchase')->name('add.purchase');
    Route::get('/all_purchase', 'PurchaseController@allPurchase')->name('all.purchase');
    Route::post('/insert_purchase','PurchaseController@insertPurchase');
    Route::get('edit-purchase/{id}', 'PurchaseController@updatePurchas');
    Route::post('/update_purchase/{id}', 'PurchaseController@editPurchase');
    Route::get('delete-purchase/{id}','PurchaseController@deletePurchase');


    //Expenses route here
    Route::get('/add_expense','ExpenseController@addExpense')->name('add.expense');
    Route::get('/all_expense', 'ExpenseController@allExpense')->name('all.expense');
    Route::post('/insert_expenses','ExpenseController@insertExpenses');
    Route::get('edit-expenses/{id}', 'ExpenseController@editExpense');
    Route::post('/update_expenses/{id}', 'ExpenseController@updateExpense');
    Route::get('delete-expenses/{id}','ExpenseController@deleteExpense');


    //add Cart
    // /
    Route::post('/add-cart', 'CartController@index');
    Route::post('/update-cart/{rowId}', 'CartController@CardUpdate');
    Route::get('/cart-remove/{rowId}', 'CartController@CardDelete');
    Route::post('/create-invoice', 'CartController@createInvoice');

    //Invoice

    Route::post('/insert_invoice', 'CartController@finalInvoice');

    //order route here


    Route::get('/pending_order','OrderController@pendingOrder')->name('pending.order');
    Route::get('/done-order/{id}','OrderController@DonePos');




});
