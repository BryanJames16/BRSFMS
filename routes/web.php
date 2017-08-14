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


//Dashboard
Route::get('/dashboard/raw', 'DashboardController@getRawData');
Route::get('/dashboard/card', 'DashboardController@getCard');
Route::get('/dashboard/graph', 'DashboardController@getGraph');
Route::get('/dashboard/table', 'DashboardController@getTable');
Route::get('/dashboard/chart', 'DashboardController@getChart');


//Facility
Route::get('/facility/getEdit', 'FacilityController@getEdit');
Route::get('/facility/refresh', 'FacilityController@refresh');
Route::post('/facility/store', 'FacilityController@store');
Route::post('/facility/update','FacilityController@edit');
Route::post('/facility/delete','FacilityController@delete');
Route::get('/facility/nextPK', 'FacilityController@nextPK');

//Facility Type
Route::get('/facility-type/getEdit', 'FacilityTypeController@getEdit');
Route::get('/facility-type/refresh', 'FacilityTypeController@refresh');
Route::post('/facility-type/store', 'FacilityTypeController@store');
Route::post('/facility-type/update','FacilityTypeController@edit');
Route::post('/facility-type/delete','FacilityTypeController@delete');

//Building
Route::get('/building/refresh','BuildingController@refresh');
Route::get('/building/getEdit', 'BuildingController@getEdit');
Route::post('/building/store', 'BuildingController@store');
Route::post('/building/update','BuildingController@edit');
Route::post('/building/delete','BuildingController@delete');

//Building Type
Route::get('/building-type/refresh','BuildingTypeController@refresh');
Route::get('/building-type/getEdit', 'BuildingTypeController@getEdit');
Route::post('/building-type/store', 'BuildingTypeController@store');
Route::post('/building-type/update','BuildingTypeController@edit');
Route::post('/building-type/delete','BuildingTypeController@delete');

//Service Type
Route::get('/service-type/refresh','ServiceTypeController@refresh');
Route::get('/service-type/getEdit', 'ServiceTypeController@getEdit');
Route::post('/service-type/store', 'ServiceTypeController@store');
Route::post('/service-type/update','ServiceTypeController@edit');
Route::post('/service-type/delete','ServiceTypeController@delete');

//Service
Route::get('/service/refresh','ServiceController@refresh');
Route::get('/service/getEdit', 'ServiceController@getEdit');
Route::post('/service/store', 'ServiceController@store');
Route::post('/service/update','ServiceController@edit');
Route::post('/service/delete','ServiceController@delete');

//Business Category
Route::get('/business-category/getEdit', 'BusinessCategoryController@getEdit');
Route::post('/business-category/store', 'BusinessCategoryController@store');
Route::post('/business-category/update','BusinessCategoryController@edit');
Route::post('/business-category/delete','BusinessCategoryController@delete');

//Business
Route::get('/business/getEdit', 'BusinessController@getEdit');
Route::post('/business/store', 'BusinessController@store');
Route::post('/business/update','BusinessController@edit');
Route::post('/business/delete','BusinessController@delete');

//Business Registration


//Resident
Route::get('/resident/getEdit', 'ResidentController@getEdit');
Route::post('/resident/store', 'ResidentController@store');
Route::post('/resident/update','ResidentController@edit');
Route::post('/resident/delete','ResidentController@delete');
Route::get('/resident/refresh','ResidentController@refresh');
Route::get('/resident/nextPK','ResidentController@nextPK');
Route::get('/resident/getLot','ResidentController@getLot');
Route::get('/resident/getHouse','ResidentController@getHouse');
Route::get('/resident/getUnit','ResidentController@getUnit');
Route::get('/resident/getBuilding','ResidentController@getBuilding');
Route::post('/resident/join','ResidentController@join');

//Family
Route::get('/family/nextPK','ResidentController@familyNextPK');
Route::post('/family/store', 'ResidentController@familyStore');
Route::get('/family/refresh','ResidentController@familyRefresh');
Route::post('/family/delete','ResidentController@familyDelete');
Route::get('/family/getEdit', 'ResidentController@familyGetEdit');
Route::get('/family/getMembers', 'ResidentController@getMembers');

//Document
Route::get('/document/getEdit', 'DocumentController@getEdit');
Route::get('/document/refresh', 'DocumentController@refresh');
Route::get('/document/nextPK', 'DocumentController@nextPK');
Route::get('/document/checkRequirements', 'DocumentController@checkRequirements');
Route::post('/document/store', 'DocumentController@store');
Route::post('/document/requirementsStore', 'DocumentController@requirementsStore');
Route::post('/document/requirementsUpdate', 'DocumentController@requirementsDelete');
Route::post('/document/update','DocumentController@edit');
Route::post('/document/delete','DocumentController@delete');

//Requiement
Route::post('/requirement/store', 'RequirementController@store');
Route::get('/requirement/refresh','RequirementController@refresh');
Route::post('/requirement/delete','RequirementController@delete');
Route::get('/requirement/getEdit', 'RequirementController@getEdit');
Route::post('/requirement/update', 'RequirementController@edit');

//Document Request
Route::get('/document-request/getEdit', 'DocumentRequestController@getEdit');
Route::get('/document-request/refresh', 'DocumentRequestController@refresh');
Route::get('/document-request/nextPK', 'DocumentRequestController@nextPK');
Route::get('/document-request/view', 'DocumentRequestController@view');
Route::get('/document-request/getRequestor', 'DocumentRequestController@getRequestor');
Route::get('/document-request/getDocument', 'DocumentRequestController@getDocument');
Route::post('/document-request/store', 'DocumentRequestController@store');
Route::post('/document-request/delete','DocumentRequestController@delete');

//Document Approval


//Province
Route::get('/province/getEdit', 'ProvinceController@getEdit');
Route::post('/province/store', 'ProvinceController@store');
Route::post('/province/update','ProvinceController@edit');
Route::post('/province/delete','ProvinceController@delete');

//Municipality
Route::get('/municipality/getEdit', 'MunicipalityController@getEdit');
Route::post('/municipality/store', 'MunicipalityController@store');
Route::post('/municipality/update','MunicipalityController@edit');
Route::post('/municipality/delete','MunicipalityController@delete');

//City
Route::get('/city/getEdit', 'CityController@getEdit');
Route::post('/city/store', 'CityController@store');
Route::post('/city/update','CityController@edit');
Route::post('/city/delete','CityController@delete');

//Barangay
Route::get('/barangay/getEdit', 'BarangayController@getEdit');
Route::post('/barangay/store', 'BarangayController@store');
Route::post('/barangay/update','BarangayController@edit');
Route::post('/barangay/delete','BarangayController@delete');

//Street
Route::get('/street/getEdit', 'StreetController@getEdit');
Route::post('/street/store', 'StreetController@store');
Route::post('/street/update','StreetController@edit');
Route::post('/street/delete','StreetController@delete');

//Lot
Route::get('/lot/getEdit', 'LotController@getEdit');
Route::post('/lot/store', 'LotController@store');
Route::post('/lot/update','LotController@edit');
Route::post('/lot/delete','LotController@delete');
Route::post('/lot/getStreet','LotController@getStreet');

//Unit
Route::get('/unit/getEdit', 'UnitController@getEdit');
Route::post('/unit/store', 'UnitController@store');
Route::post('/unit/update','UnitController@edit');
Route::post('/unit/delete','UnitController@delete');

//House
Route::get('/house/getEdit', 'HouseController@getEdit');
Route::post('/house/store', 'HouseController@store');
Route::post('/house/update','HouseController@edit');
Route::post('/house/delete','HouseController@delete');

//Reservation
Route::get('/facility-reservation/getEdit', 'ReservationController@getEdit');
Route::post('/reservation/store', 'ReservationController@store');
Route::post('/facility-reservation/update', 'ReservationController@update');
Route::post('/facility-reservation/delete','ReservationController@delete');

//Utilities
Route::get('/utilities/getCurrentPK', 'UtilitiesController@getCurrentPK');
Route::post('/utilities/store', 'UtilitiesController@store');
Route::post('/utilities/update', 'UtilitiesController@update');

//Service-Transactions
Route::post('/service-transaction/store', 'ServiceTransactionController@store');
Route::get('/service-transaction/getEdit', 'ServiceTransactionController@getEdit');
Route::post('/service-transaction/update', 'ServiceTransactionController@update');
Route::get('/service-transaction/refresh','ServiceTransactionController@Refresh');
Route::get('/service-transaction/nextPK', 'ServiceTransactionController@nextPK');


Route::get('/business-registration', function() {
	return view('business-registration');
});

Route::get('/request', function() {
	return view('request');
});


Route::get('/file-case', function() {
	return view('file-case');
});



Route::get('/document-request', function() {
	return view('document-request');
});




Route::get('/reservation/updatecbo', 'ReservationController@updateCombobox');

Route::get('/sponsors', function() {
	return view('sponsors');
});

Route::get('/service-sponsorship', function() {
	return view('service-sponsorship');
});



Route::get('/document-approval', function() {
	return view('document-approval');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/master', function () {
	return view('master.master');
});

Route::get('/base-maintenance', function () {
	return view('master.base_maintenance');
});

Route::get('/resreg', function() {
	return view('residentreg');
});

Route::get('lot/dropdown', 'LotController@dropdown');

Route::get('/dashboard', function () {
	return view('dashboard');
});

/*
Route::get('login', function(){
	return view('auth/login');
});
Route::get('register', function(){
	return view('auth/register');
});
*/
Route::get('/login', 'SessionsController@create');
Route::post('/login','SessionsController@store');

Route::get('/register', 'RegisterController@create');
Route::post('/register', 'RegisterController@store');

Route::get('/logout','SessionsController@destroy');

Route::get('/unmt', function() {
	return view('errors.unmt');
});

Route::resource('/facility', 'FacilityController');
Route::resource('/reservation', 'ReservationController@populate');
Route::resource('/facility-reservation', 'ReservationController');
Route::resource('/facility-type', 'FacilityTypeController');
Route::resource('/business', 'BusinessController');
Route::resource('/business-category', 'BusinessCategoryController');
Route::resource('/service-type', 'ServiceTypeController');
Route::resource('/service', 'ServiceController');
Route::resource('/person', 'PeopleController');
Route::resource('/dashboard', 'DashboardController');
Route::resource('/document', 'DocumentController');
Route::resource('/document-request', 'DocumentRequestController');
Route::resource('/province', 'ProvinceController');
Route::resource('/municipality', 'MunicipalityController');
Route::resource('/city', 'CityController');
Route::resource('/barangay', 'BarangayController');
Route::resource('/street', 'StreetController');
Route::resource('/lot', 'LotController');
Route::resource('/unit', 'UnitController');
Route::resource('/house', 'HouseController');
Route::resource('/resident', 'ResidentController');
Route::resource('/building', 'BuildingController');
Route::resource('/building-type', 'BuildingTypeController');
Route::resource('/utilities', 'UtilitiesController');
Route::resource('/requirement', 'RequirementController');
Route::resource('/service-transaction', 'ServiceTransactionController');

Route::get('/base-maintenance', function () {
	return view('master.base_maintenance');
});

