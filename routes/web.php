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

//////////////////////////////////////////////////////////////////////
/* SYSTEM INTERACTION ROUTES */
//////////////////////////////////////////////////////////////////////

/* DASHBOARD ROUTES */
Route::get('/dashboard/raw', 'DashboardController@getRawData');
Route::get('/dashboard/card', 'DashboardController@getCard');
Route::get('/dashboard/graph', 'DashboardController@getGraph');
Route::get('/dashboard/table', 'DashboardController@getTable');
Route::get('/dashboard/chart', 'DashboardController@getChart');

/* MAINTENANCE ROUTES */
// Facility
Route::get('/facility/getEdit', 'FacilityController@getEdit');
Route::get('/facility/nextPK', 'FacilityController@nextPK');
Route::get('/facility/refresh', 'FacilityController@refresh');
Route::post('/facility/delete', 'FacilityController@delete');
Route::post('/facility/store', 'FacilityController@store');
Route::post('/facility/update', 'FacilityController@edit');

// Facility Type
Route::get('/facility-type/getEdit', 'FacilityTypeController@getEdit');
Route::get('/facility-type/refresh', 'FacilityTypeController@refresh');
Route::post('/facility-type/delete', 'FacilityTypeController@delete');
Route::post('/facility-type/store', 'FacilityTypeController@store');
Route::post('/facility-type/update', 'FacilityTypeController@edit');

// Recipient
Route::get('/recipient/getEdit', 'RecipientController@getEdit');
Route::get('/recipient/refresh', 'RecipientController@refresh');
Route::post('/recipient/delete', 'RecipientController@delete');
Route::post('/recipient/store', 'RecipientController@store');
Route::post('/recipient/update', 'RecipientController@edit');

// Building
Route::get('/building/getEdit', 'BuildingController@getEdit');
Route::get('/building/refresh','BuildingController@refresh');
Route::post('/building/delete','BuildingController@delete');
Route::post('/building/store', 'BuildingController@store');
Route::post('/building/update','BuildingController@edit');

// Building Type
Route::get('/building-type/getEdit', 'BuildingTypeController@getEdit');
Route::get('/building-type/refresh','BuildingTypeController@refresh');
Route::post('/building-type/delete','BuildingTypeController@delete');
Route::post('/building-type/store', 'BuildingTypeController@store');
Route::post('/building-type/update','BuildingTypeController@edit');

// Service Type
Route::get('/service-type/getEdit', 'ServiceTypeController@getEdit');
Route::get('/service-type/refresh', 'ServiceTypeController@refresh');
Route::post('/service-type/delete', 'ServiceTypeController@delete');
Route::post('/service-type/store', 'ServiceTypeController@store');
Route::post('/service-type/update', 'ServiceTypeController@edit');

// Service
Route::get('/service/getEdit', 'ServiceController@getEdit');
Route::get('/service/refresh', 'ServiceController@refresh');
Route::post('/service/delete', 'ServiceController@delete');
Route::post('/service/store', 'ServiceController@store');
Route::post('/service/update', 'ServiceController@edit');

// Business Category
Route::get('/business-category/getEdit', 'BusinessCategoryController@getEdit');
Route::post('/business-category/delete', 'BusinessCategoryController@delete');
Route::post('/business-category/store', 'BusinessCategoryController@store');
Route::post('/business-category/update', 'BusinessCategoryController@edit');

// Document
Route::get('/document/checkRequirements', 'DocumentController@checkRequirements');
Route::get('/document/getEdit', 'DocumentController@getEdit');
Route::get('/document/nextPK', 'DocumentController@nextPK');
Route::get('/document/refresh', 'DocumentController@refresh');
Route::post('/document/delete','DocumentController@delete');
Route::post('/document/requirementsStore', 'DocumentController@requirementsStore');
Route::post('/document/requirementsUpdate', 'DocumentController@requirementsDelete');
Route::post('/document/store', 'DocumentController@store');
Route::post('/document/update', 'DocumentController@edit');

// Requirement
Route::get('/requirement/getEdit', 'RequirementController@getEdit');
Route::get('/requirement/refresh', 'RequirementController@refresh');
Route::post('/requirement/delete', 'RequirementController@delete');
Route::post('/requirement/store', 'RequirementController@store');
Route::post('/requirement/update', 'RequirementController@edit');

// Street
Route::get('/street/getEdit', 'StreetController@getEdit');
Route::post('/street/delete','StreetController@delete');
Route::post('/street/store', 'StreetController@store');
Route::post('/street/update','StreetController@edit');

// Lot
Route::get('/lot/getEdit', 'LotController@getEdit');
Route::post('/lot/delete','LotController@delete');
Route::post('/lot/getStreet','LotController@getStreet');
Route::post('/lot/store', 'LotController@store');
Route::post('/lot/update','LotController@edit');

// Unit
Route::get('/unit/getEdit', 'UnitController@getEdit');
Route::post('/unit/delete','UnitController@delete');
Route::post('/unit/store', 'UnitController@store');
Route::post('/unit/update','UnitController@edit');

// House
Route::get('/house/getEdit', 'HouseController@getEdit');
Route::post('/house/delete','HouseController@delete');
Route::post('/house/store', 'HouseController@store');
Route::post('/house/update','HouseController@edit');

/* TRANSACTION ROUTES */
// Resident
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
Route::post('/resident/addImage', 'ResidentController@addImage');
Route::post('/resident/memberRemove', 'ResidentController@memberRemove');
Route::get('/resident/notMember/{id}', 'ResidentController@notMember');


// Family
Route::get('/family/getEdit', 'ResidentController@familyGetEdit');
Route::get('/family/getMembers', 'ResidentController@getMembers');
Route::get('/family/getFamilyHead', 'ResidentController@getFamilyHead');
Route::get('/family/nextPK', 'ResidentController@familyNextPK');
Route::get('/family/getRelation', 'ResidentController@getRelation');
Route::get('/family/refresh', 'ResidentController@familyRefresh');
Route::post('/family/delete', 'ResidentController@familyDelete');
Route::post('/family/store', 'ResidentController@familyStore');
Route::post('/family/updateRelation', 'ResidentController@updateRelation');

// Document Request
Route::get('/document-request/getDocument', 'DocumentRequestController@getDocument');
Route::get('/document-request/getEdit', 'DocumentRequestController@getEdit');
Route::get('/document-request/getRequestor', 'DocumentRequestController@getRequestor');
Route::get('/document-request/nextPK', 'DocumentRequestController@nextPK');
Route::get('/document-request/refresh', 'DocumentRequestController@refresh');
Route::get('/document-request/view', 'DocumentRequestController@view');
Route::post('/document-request/store', 'DocumentRequestController@store');
Route::post('/document-request/delete', 'DocumentRequestController@delete');

// Document Approval

// Reservation
Route::get('/facility-reservation/getEdit', 'ReservationController@getEdit');
Route::get('/facility-reservation/getResidents', 'ReservationController@getResidents');
Route::get('/facility-reservation/getFacilities', 'ReservationController@getFacilities');
Route::get('/facility-reservation/updatecbo', 'ReservationController@updateCombobox');
Route::post('/facility-reservation/delete','ReservationController@delete');
Route::post('/facility-reservation/store', 'ReservationController@store');
Route::post('/facility-reservation/residentStore', 'ReservationController@residentStore');
Route::post('/facility-reservation/nonresidentStore', 'ReservationController@nonresidentStore');
Route::post('/facility-reservation/update', 'ReservationController@update');

// Collection
Route::get('/collection/gCollect', 'Collection@getCollection');

// Service-Transactions
Route::get('/service-transaction/getEdit', 'ServiceTransactionController@getEdit');
Route::get('/service-transaction/getParticipant/{id}', 'ServiceTransactionController@getParticipant');
Route::get('/service-transaction/nextPK', 'ServiceTransactionController@nextPK');
Route::get('/service-transaction/notParticipant/{id}', 'ServiceTransactionController@notParticipant');
Route::get('/service-transaction/refresh','ServiceTransactionController@Refresh');
Route::post('/service-transaction/addParticipant', 'ServiceTransactionController@addParticipant');
Route::post('/service-transaction/delete', 'ServiceTransactionController@delete');
Route::post('/service-transaction/deletePart', 'ServiceTransactionController@deletePart');
Route::post('/service-transaction/store', 'ServiceTransactionController@store');
Route::post('/service-transaction/storeNoAge', 'ServiceTransactionController@storeNoAge');
Route::post('/service-transaction/storeAge', 'ServiceTransactionController@storeAge');
Route::post('/service-transaction/storeNo', 'ServiceTransactionController@storeNo');
Route::post('/service-transaction/update', 'ServiceTransactionController@update');

// Business Registration
Route::get('/business-registration/business', 'BusinessRegistrationController@getBusiness');
Route::get('/business-registration/category', 'BusinessRegistrationController@getCategory');
Route::get('/business-registration/owner', 'BusinessRegistrationController@getOwner');
Route::post('/business-registration/store', 'BusinessRegistrationController@store');

/* UTILITIES ROUTES */
Route::get('/utilities/getCurrentPK', 'UtilitiesController@getCurrentPK');
Route::get('/utilities/refresh', 'UtilitiesController@refresh');
Route::post('/utilities/store', 'UtilitiesController@store');
Route::post('/utilities/update', 'UtilitiesController@update');


//////////////////////////////////////////////////////////////////////
/* RESOURCE ROUTES */
//////////////////////////////////////////////////////////////////////

Route::resource('/building', 'BuildingController');
Route::resource('/building-type', 'BuildingTypeController');
Route::resource('/business-category', 'BusinessCategoryController');
Route::resource('/business-registration', 'BusinessRegistrationController');
Route::resource('/collection', 'CollectionController');
Route::resource('/dashboard', 'DashboardController');
Route::resource('/document', 'DocumentController');
Route::resource('/document-request', 'DocumentRequestController');
Route::resource('/facility', 'FacilityController');
Route::resource('/facility-reservation', 'ReservationController');
Route::resource('/facility-type', 'FacilityTypeController');
Route::resource('/house', 'HouseController');
Route::resource('/lot', 'LotController');
Route::resource('/person', 'PeopleController');
Route::resource('/reservation', 'ReservationController@populate');
Route::resource('/resident', 'ResidentController');
Route::resource('/requirement', 'RequirementController');
Route::resource('/service', 'ServiceController');
Route::resource('/service-type', 'ServiceTypeController');
Route::resource('/service-transaction', 'ServiceTransactionController');
Route::resource('/street', 'StreetController');
Route::resource('/unit', 'UnitController');
Route::resource('/utilities', 'UtilitiesController');
Route::resource('/recipient', 'RecipientController');


//////////////////////////////////////////////////////////////////////
/* AUTHENTICATION ROUTES */
//////////////////////////////////////////////////////////////////////

Route::get('/login', 'SessionsController@create');
Route::post('/login','SessionsController@store');

Route::get('/register', 'RegisterController@create');
Route::post('/register', 'RegisterController@store');

Route::get('/logout','SessionsController@destroy');

//////////////////////////////////////////////////////////////////////
/* BLOCK PAGE ROUTES */
//////////////////////////////////////////////////////////////////////

Route::get('/unmt', function () {
	return view('errors.unmt');
});

Route::get('/400', function () {
	return view('errors.400');
});

Route::get('/403', function () {
	return view('errors.403');
});

Route::get('/404', function () {
	return view('errors.404');
});

Route::get('/503', function () {
	return view('errors.503');
});


//////////////////////////////////////////////////////////////////////
/* DEVELOPMENT ROUTES */
//////////////////////////////////////////////////////////////////////

Route::get('/master', function () {
	return view('master.master');
});

Route::get('/base-maintenance', function () {
	return view('master.base_maintenance');
});


//////////////////////////////////////////////////////////////////////
/* SYSTEM TEMPORARY ROUTES */
//////////////////////////////////////////////////////////////////////

Route::get('/sponsors', function() {
	return view('sponsors');
});

Route::get('/service-sponsorship', function() {
	return view('service-sponsorship');
});


Route::get('/document-approval', function() {
	return view('document-approval');
});


//////////////////////////////////////////////////////////////////////
/* ORPHAN ROUTES */
//////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////////////
/* DEPRECATED ROUTES */
//////////////////////////////////////////////////////////////////////

