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


/* DASHBOARD ROUTES */
Route::get('/dashboard/raw', 'DashboardController@getRawData');
Route::get('/dashboard/card', 'DashboardController@getCard');
Route::get('/dashboard/graph', 'DashboardController@getGraph');
Route::get('/dashboard/table', 'DashboardController@getTable');
Route::get('/dashboard/chart', 'DashboardController@getChart');

/* MAINTENANCE ROUTES */
//Facility
Route::get('/facility/getEdit', 'FacilityController@getEdit');
Route::get('/facility/nextPK', 'FacilityController@nextPK');
Route::get('/facility/refresh', 'FacilityController@refresh');
Route::post('/facility/delete', 'FacilityController@delete');
Route::post('/facility/store', 'FacilityController@store');
Route::post('/facility/update', 'FacilityController@edit');

//Facility Type
Route::get('/facility-type/getEdit', 'FacilityTypeController@getEdit');
Route::get('/facility-type/refresh', 'FacilityTypeController@refresh');
Route::post('/facility-type/delete', 'FacilityTypeController@delete');
Route::post('/facility-type/store', 'FacilityTypeController@store');
Route::post('/facility-type/update', 'FacilityTypeController@edit');

//Building
Route::get('/building/getEdit', 'BuildingController@getEdit');
Route::get('/building/refresh','BuildingController@refresh');
Route::post('/building/delete','BuildingController@delete');
Route::post('/building/store', 'BuildingController@store');
Route::post('/building/update','BuildingController@edit');

//Building Type
Route::get('/building-type/getEdit', 'BuildingTypeController@getEdit');
Route::get('/building-type/refresh','BuildingTypeController@refresh');
Route::post('/building-type/delete','BuildingTypeController@delete');
Route::post('/building-type/store', 'BuildingTypeController@store');
Route::post('/building-type/update','BuildingTypeController@edit');

//Service Type
Route::get('/service-type/getEdit', 'ServiceTypeController@getEdit');
Route::get('/service-type/refresh','ServiceTypeController@refresh');
Route::post('/service-type/delete','ServiceTypeController@delete');
Route::post('/service-type/store', 'ServiceTypeController@store');
Route::post('/service-type/update','ServiceTypeController@edit');

//Service
Route::get('/service/getEdit', 'ServiceController@getEdit');
Route::get('/service/refresh', 'ServiceController@refresh');
Route::post('/service/delete', 'ServiceController@delete');
Route::post('/service/store', 'ServiceController@store');
Route::post('/service/update', 'ServiceController@edit');

//Business Category
Route::get('/business-category/getEdit', 'BusinessCategoryController@getEdit');
Route::post('/business-category/delete', 'BusinessCategoryController@delete');
Route::post('/business-category/store', 'BusinessCategoryController@store');
Route::post('/business-category/update', 'BusinessCategoryController@edit');

//Business
/* DP */ Route::get('/business/getEdit', 'BusinessController@getEdit');
/* DP */ Route::post('/business/delete', 'BusinessController@delete');
/* DP */ Route::post('/business/store', 'BusinessController@store');
/* DP */ Route::post('/business/update', 'BusinessController@edit');

//Business Registration
Route::get('/business-registration/business', 'BusinessRegistrationController@getBusiness');
Route::get('/business-registration/category', 'BusinessRegistrationController@getCategory');
Route::get('/business-registration/owner', 'BusinessRegistrationController@getOwner');
Route::post('/business-registration/store', 'BusinessRegistrationController@store');

//Resident
Route::get('/resident/getBuilding', 'ResidentController@getBuilding');
Route::get('/resident/getEdit', 'ResidentController@getEdit');
Route::get('/resident/getHouse', 'ResidentController@getHouse');
Route::get('/resident/getLot', 'ResidentController@getLot');
Route::get('/resident/getUnit', 'ResidentController@getUnit');
Route::get('/resident/nextPK', 'ResidentController@nextPK');
Route::get('/resident/refresh', 'ResidentController@refresh');
Route::post('/resident/delete', 'ResidentController@delete');
Route::post('/resident/join', 'ResidentController@join');
Route::post('/resident/store', 'ResidentController@store');
Route::post('/resident/update', 'ResidentController@edit');

//Family
Route::get('/family/getEdit', 'ResidentController@familyGetEdit');
Route::get('/family/getMembers', 'ResidentController@getMembers');
Route::get('/family/nextPK', 'ResidentController@familyNextPK');
Route::get('/family/refresh', 'ResidentController@familyRefresh');
Route::post('/family/delete', 'ResidentController@familyDelete');
Route::post('/family/store', 'ResidentController@familyStore');

//Document
Route::get('/document/checkRequirements', 'DocumentController@checkRequirements');
Route::get('/document/getEdit', 'DocumentController@getEdit');
Route::get('/document/nextPK', 'DocumentController@nextPK');
Route::get('/document/refresh', 'DocumentController@refresh');
Route::post('/document/delete','DocumentController@delete');
Route::post('/document/requirementsStore', 'DocumentController@requirementsStore');
Route::post('/document/requirementsUpdate', 'DocumentController@requirementsDelete');
Route::post('/document/store', 'DocumentController@store');
Route::post('/document/update', 'DocumentController@edit');

//Requiement
Route::get('/requirement/getEdit', 'RequirementController@getEdit');
Route::get('/requirement/refresh', 'RequirementController@refresh');
Route::post('/requirement/delete', 'RequirementController@delete');
Route::post('/requirement/store', 'RequirementController@store');
Route::post('/requirement/update', 'RequirementController@edit');

//Document Request
Route::get('/document-request/getDocument', 'DocumentRequestController@getDocument');
Route::get('/document-request/getEdit', 'DocumentRequestController@getEdit');
Route::get('/document-request/getRequestor', 'DocumentRequestController@getRequestor');
Route::get('/document-request/nextPK', 'DocumentRequestController@nextPK');
Route::get('/document-request/refresh', 'DocumentRequestController@refresh');
Route::get('/document-request/view', 'DocumentRequestController@view');
Route::post('/document-request/store', 'DocumentRequestController@store');
Route::post('/document-request/delete', 'DocumentRequestController@delete');

//Document Approval

//Province
/* DP */ Route::get('/province/getEdit', 'ProvinceController@getEdit');
/* DP */ Route::post('/province/delete', 'ProvinceController@delete');
/* DP */ Route::post('/province/store', 'ProvinceController@store');
/* DP */ Route::post('/province/update', 'ProvinceController@edit');

//Municipality
/* DP */ Route::get('/municipality/getEdit', 'MunicipalityController@getEdit');
/* DP */ Route::post('/municipality/delete','MunicipalityController@delete');
/* DP */ Route::post('/municipality/store', 'MunicipalityController@store');
/* DP */ Route::post('/municipality/update','MunicipalityController@edit');

//City
/* DP */ Route::get('/city/getEdit', 'CityController@getEdit');
/* DP */ Route::post('/city/delete','CityController@delete');
/* DP */ Route::post('/city/store', 'CityController@store');
/* DP */ Route::post('/city/update','CityController@edit');

//Barangay
/* DP */ Route::get('/barangay/getEdit', 'BarangayController@getEdit');
/* DP */ Route::post('/barangay/delete','BarangayController@delete');
/* DP */ Route::post('/barangay/store', 'BarangayController@store');
/* DP */ Route::post('/barangay/update','BarangayController@edit');

//Street
Route::get('/street/getEdit', 'StreetController@getEdit');
Route::post('/street/delete','StreetController@delete');
Route::post('/street/store', 'StreetController@store');
Route::post('/street/update','StreetController@edit');

//Lot
Route::get('/lot/getEdit', 'LotController@getEdit');
Route::post('/lot/delete','LotController@delete');
Route::post('/lot/getStreet','LotController@getStreet');
Route::post('/lot/store', 'LotController@store');
Route::post('/lot/update','LotController@edit');

//Unit
Route::get('/unit/getEdit', 'UnitController@getEdit');
Route::post('/unit/delete','UnitController@delete');
Route::post('/unit/store', 'UnitController@store');
Route::post('/unit/update','UnitController@edit');

//House
Route::get('/house/getEdit', 'HouseController@getEdit');
Route::post('/house/delete','HouseController@delete');
Route::post('/house/store', 'HouseController@store');
Route::post('/house/update','HouseController@edit');

//Reservation
Route::get('/facility-reservation/getEdit', 'ReservationController@getEdit');
Route::get('/facility-reservation/updatecbo', 'ReservationController@updateCombobox');
Route::post('/facility-reservation/delete','ReservationController@delete');
Route::post('/facility-reservation/store', 'ReservationController@store');
Route::post('/facility-reservation/update', 'ReservationController@update');

//Utilities
Route::get('/utilities/getCurrentPK', 'UtilitiesController@getCurrentPK');
Route::post('/utilities/store', 'UtilitiesController@store');
Route::post('/utilities/update', 'UtilitiesController@update');

//Service-Transactions
Route::get('/service-transaction/getEdit', 'ServiceTransactionController@getEdit');
Route::get('/service-transaction/getParticipant/{id}', 'ServiceTransactionController@getParticipant');
Route::get('/service-transaction/nextPK', 'ServiceTransactionController@nextPK');
Route::get('/service-transaction/notParticipant/{id}', 'ServiceTransactionController@notParticipant');
Route::get('/service-transaction/refresh','ServiceTransactionController@Refresh');
Route::post('/service-transaction/addParticipant', 'ServiceTransactionController@addParticipant');
Route::post('/service-transaction/delete', 'ServiceTransactionController@delete');
Route::post('/service-transaction/deletePart', 'ServiceTransactionController@deletePart');
Route::post('/service-transaction/store', 'ServiceTransactionController@store');
Route::post('/service-transaction/update', 'ServiceTransactionController@update');

/* DP */
Route::get('/request', function() {
	return view('request');
});

/* DP */
Route::get('/file-case', function() {
	return view('file-case');
});

/* DP */
Route::get('/document-request', function() {
	return view('document-request');
});

Route::get('/sponsors', function() {
	return view('sponsors');
});

Route::get('/service-sponsorship', function() {
	return view('service-sponsorship');
});


Route::get('/document-approval', function() {
	return view('document-approval');
});

// Orphan Route
Route::get('/', function () {
    return view('welcome');
});

// Development Routes
Route::get('/master', function () {
	return view('master.master');
});

Route::get('/base-maintenance', function () {
	return view('master.base_maintenance');
});

/* DP */
Route::get('/resreg', function() {
	return view('residentreg');
});

/* DP */
Route::get('lot/dropdown', 'LotController@dropdown');

/* DP */
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
Route::resource('/business-registration', 'BusinessRegistrationController');
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

/* DP */
Route::get('/base-maintenance', function () {
	return view('master.base_maintenance');
});

