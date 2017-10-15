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

// Items
Route::get('/item/refresh', 'ItemController@refresh');
Route::get('/item/getEdit', 'ItemController@getEdit');
Route::post('/item/delete', 'ItemController@delete');
Route::post('/item/store', 'ItemController@store');
Route::post('/item/update','ItemController@update');

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
Route::get('/resident/getWorkHistory', 'ResidentController@getWorkHistory');
Route::get('/resident/getHouse', 'ResidentController@getHouse');
Route::get('/resident/getLot', 'ResidentController@getLot');
Route::get('/resident/getUnit', 'ResidentController@getUnit');
Route::get('/resident/nextPK', 'ResidentController@nextPK');
Route::get('/resident/getPer', 'ResidentController@getPer');
Route::get('/resident/getMemDet', 'ResidentController@getMemDet');
Route::get('/resident/refresh', 'ResidentController@refresh');
Route::post('/resident/delete', 'ResidentController@delete');
Route::post('/resident/join', 'ResidentController@join');
Route::post('/resident/store', 'ResidentController@store');
Route::post('/resident/issue', 'ResidentController@issue');
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
Route::get('/document-request/getDocumentID/{rowID}', 'DocumentRequestController@getDocumentID');
Route::get('/document-request/getEdit', 'DocumentRequestController@getEdit');
Route::get('/document-request/getRequestor', 'DocumentRequestController@getRequestor');
Route::get('/document-request/nextPK', 'DocumentRequestController@nextPK');
Route::get('/document-request/refresh', 'DocumentRequestController@refresh');
Route::get('/document-request/view', 'DocumentRequestController@view');
Route::get('/document-request/checkRequirements', 'DocumentRequestController@checkRequirements');
Route::get('/document-request/chkRequirements', 'DocumentRequestController@chkRequirements');
Route::post('/document-request/store', 'DocumentRequestController@store');
Route::post('/document-request/requirementsStore', 'DocumentRequestController@requirementsStore');
Route::post('/document-request/delete', 'DocumentRequestController@delete');
Route::post('/document-request/waiting', 'DocumentRequestController@waiting');
Route::post('/document-request/requirementsDelete', 'DocumentRequestController@requirementsDelete');

// Document Approval
Route::post('/document-approval/reject', 'DocumentApprovalController@reject');
Route::post('/document-approval/approve', 'DocumentApprovalController@approve');
Route::get('/document-approval/refreshWaiting', 'DocumentApprovalController@refreshWaiting');
Route::get('/document-approval/refreshApproved', 'DocumentApprovalController@refreshApproved');
Route::get('/document-approval/refreshRejected', 'DocumentApprovalController@refreshRejected');
Route::get('/document-approval/view', 'DocumentApprovalController@view');
Route::get('/document-approval/getRemarks', 'DocumentApprovalController@getRemarks');

// Log
Route::get('/logs/getLogs', 'LogsController@getLogs');
Route::get('/logs/getUserLogs', 'LogsController@getUserLogs');

// Item Reservation
Route::get('/item-reservation/getResidents', 'ItemReservationController@getResidents');
Route::get('/item-reservation/getItems', 'ItemReservationController@getItems');
Route::get('/item-reservation/getRes', 'ItemReservationController@getRes');
Route::get('/item-reservation/getEditNonRes', 'ItemReservationController@getEditNonRes');
Route::get('/item-reservation/gReservation', 'ItemReservationController@gReservation');
Route::post('/item-reservation/store', 'ItemReservationController@store');

// Facility Reservation
Route::get('/facility-reservation/refresh', 'ReservationController@refresh');
Route::get('/facility-reservation/refreshNonRes', 'ReservationController@refreshNonRes');
Route::get('/facility-reservation/getEdit', 'ReservationController@getEdit');
Route::get('/facility-reservation/getRes', 'ReservationController@getRes');
Route::get('/facility-reservation/getEditNonRes', 'ReservationController@getEditNonRes');
Route::get('/facility-reservation/getResidents', 'ReservationController@getResidents');
Route::get('/facility-reservation/getFacilities', 'ReservationController@getFacilities');
Route::get('/facility-reservation/updatecbo', 'ReservationController@updateCombobox');
Route::get('/facility-reservation/gReservations', 'ReservationController@getReservation');
Route::get('/facility-reservation/realtime', 'ReservationController@realtime');
Route::post('/facility-reservation/delete','ReservationController@delete');
Route::post('/facility-reservation/store', 'ReservationController@store');
Route::post('/facility-reservation/residentStore', 'ReservationController@residentStore');
Route::post('/facility-reservation/nonresidentStore', 'ReservationController@nonresidentStore');
Route::post('/facility-reservation/update', 'ReservationController@update');

// Collection
Route::get('/collection/gCollect', 'CollectionController@getCollection');
Route::get('/collection/showReceiptID', 'CollectionController@showReceiptID');
Route::get('/collection/refreshID', 'CollectionController@refreshID');
Route::get('/collection/gHeader', 'CollectionController@getHeader');
Route::get('/collection/getResID', 'CollectionController@getResID');
Route::get('/collection/gAmount', 'CollectionController@getAmount');
Route::get('/collection/gFResident', 'CollectionController@getReserveRCollection');
Route::get('/collection/gFNesident', 'CollectionController@getReserveNCollection');
Route::get('/collection/gTransact', 'CollectionController@getTransact');
Route::post('/collection/pay', 'CollectionController@payCollection');
Route::post('/collection/payID', 'CollectionController@payID');
Route::post('/collection/paidRes', 'CollectionController@paidRes');

// Service-Transactions
Route::get('/service-transaction/getEdit', 'ServiceTransactionController@getEdit');
Route::get('/service-transaction/getResident', 'ServiceTransactionController@getResident');
Route::get('/service-transaction/fillRecipients/{id}', 'ServiceTransactionController@fillRecipients');
Route::get('/service-transaction/getParticipantID', 'ServiceTransactionController@getParticipantID');
Route::get('/service-transaction/getRecipients', 'ServiceTransactionController@getRecipients');
Route::get('/service-transaction/getParticipant/{id}', 'ServiceTransactionController@getParticipant');
Route::get('/service-transaction/nextPK', 'ServiceTransactionController@nextPK');
Route::get('/service-transaction/notParticipant/{id}', 'ServiceTransactionController@notParticipant');
Route::get('/service-transaction/refresh','ServiceTransactionController@Refresh');
Route::post('/service-transaction/addParticipant', 'ServiceTransactionController@addParticipant');
Route::post('/service-transaction/delete', 'ServiceTransactionController@delete');
Route::post('/service-transaction/deleteRecipient', 'ServiceTransactionController@deleteRecipient');
Route::post('/service-transaction/deletePart', 'ServiceTransactionController@deletePart');
Route::post('/service-transaction/store', 'ServiceTransactionController@store');
Route::post('/service-transaction/addRecipient', 'ServiceTransactionController@addRecipient');
Route::post('/service-transaction/storeNoAge', 'ServiceTransactionController@storeNoAge');
Route::post('/service-transaction/storeAge', 'ServiceTransactionController@storeAge');
Route::post('/service-transaction/storeNo', 'ServiceTransactionController@storeNo');
Route::post('/service-transaction/update', 'ServiceTransactionController@update');
Route::post('/service-transaction/updateStatus', 'ServiceTransactionController@updateStatus');
Route::post('/service-transaction/finishStatus', 'ServiceTransactionController@FinishStatus');

// Business Registration
Route::get('/business-registration/business', 'BusinessRegistrationController@getBusiness');
Route::get('/business-registration/category', 'BusinessRegistrationController@getCategory');
Route::get('/business-registration/owner', 'BusinessRegistrationController@getOwner');
Route::get('/business-registration/refresh', 'BusinessRegistrationController@refresh');
Route::get('/business-registration/getEdit', 'BusinessRegistrationController@getEdit');
Route::get('/business-registration/getDetails', 'BusinessRegistrationController@getDetails');
Route::post('/business-registration/store', 'BusinessRegistrationController@store');
Route::post('/business-registration/delete', 'BusinessRegistrationController@delete');
Route::post('/business-registration/update', 'BusinessRegistrationController@edit');

/* REPORTS ROUTES */
// Collection Report Routes
Route::get('/reports/collection/fetch', 'ReportsCollectionController@fetch');

/* UTILITIES ROUTES */
Route::get('/utilities/getCurrentPK', 'UtilitiesController@getCurrentPK');
Route::get('/utilities/refresh', 'UtilitiesController@refresh');
Route::post('/utilities/store', 'UtilitiesController@store');
Route::post('/utilities/update', 'UtilitiesController@update');
Route::post('/utilities/saveInfo','UtilitiesController@saveInfo');

/* ID RELEASE */
Route::get('/id-release/getEdit', 'IDReleasingController@getEdit');
Route::get('/id-release/refresh', 'IDReleasingController@refresh');
Route::post('/id-release/release', 'IDReleasingController@release');

/* Service Sponsorship */
Route::get('/service-sponsorship/getResidents', 'ServiceSponsorshipController@getResidents');
Route::get('/service-sponsorship/getItems', 'ServiceSponsorshipController@getItems');
Route::get('/service-sponsorship/getResidentInfo', 'ServiceSponsorshipController@getResidentInfo');
Route::get('/service-sponsorship/refresh', 'ServiceSponsorshipController@refresh');
Route::get('/service-sponsorship/getSponsorsR', 'ServiceSponsorshipController@getSponsorsR');
Route::get('/service-sponsorship/getSponsorsN', 'ServiceSponsorshipController@getSponsorsN');
Route::post('/service-sponsorship/sponsor', 'ServiceSponsorshipController@sponsor');
Route::post('/service-sponsorship/sponsorItem', 'ServiceSponsorshipController@sponsorItem');

/* QUERY RESIDENT */
Route::get('/query/resident/submit', 'QueryResidentController@getQuery');
Route::get('/query/resident/getEdit', 'QueryResidentController@getEdit');

/* QUERY BUSINESS */
Route::get('/query/business/submit', 'QueryBusinessController@getQuery');
Route::get('/query/business/getEdit', 'QueryBusinessController@getEdit');

/* QUERY DOCUMENT */
Route::get('/query/document/submit', 'QueryDocumentController@getQuery');
Route::get('/query/document/getEdit', 'QueryDocumentController@getEdit');

/* QUERY SERVICE */
Route::get('/query/service/submit', 'QueryServiceController@getQuery');
Route::get('/query/service/getEdit', 'QueryServiceController@getEdit');

/* QUERY RESERVATION */
Route::get('/query/reservation/submit', 'QueryReservationController@getQuery');
Route::get('/query/reservation/getEdit', 'QueryReservationController@getEdit');
Route::get('/query/reservation/getRes', 'QueryReservationController@getRes');
Route::get('/query/reservation/getNonRes', 'QueryReservationController@getEditNonRes');


/* USERS */
Route::get('/users/getMessage', 'UsersController@getMessage');
Route::post('/users/accept', 'UsersController@accept');
Route::post('/users/reply', 'UsersController@reply');
Route::post('/users/create', 'UsersController@create');
Route::get('/users/read', 'UsersController@read');
Route::post('/users/reject', 'UsersController@reject');
Route::get('/users/pendingRefresh', 'UsersController@pendingRefresh');
Route::get('/users/refresh', 'UsersController@refresh');
Route::post('/users/approvalAllow', 'UsersController@approvalAllow');
Route::post('/users/approvalRestrict', 'UsersController@approvalRestrict');
Route::post('/users/residentAllow', 'UsersController@residentAllow');
Route::post('/users/residentRestrict', 'UsersController@residentRestrict');
Route::post('/users/requestAllow', 'UsersController@requestAllow');
Route::post('/users/requestRestrict', 'UsersController@requestRestrict');
Route::post('/users/reservationAllow', 'UsersController@reservationAllow');
Route::post('/users/reservationRestrict', 'UsersController@reservationRestrict');
Route::post('/users/serviceAllow', 'UsersController@serviceAllow');
Route::post('/users/serviceRestrict', 'UsersController@serviceRestrict');
Route::post('/users/businessAllow', 'UsersController@businessAllow');
Route::post('/users/businessRestrict', 'UsersController@businessRestrict');
Route::post('/users/collectionAllow', 'UsersController@collectionAllow');
Route::post('/users/collectionRestrict', 'UsersController@collectionRestrict');
Route::post('/users/sponsorshipAllow', 'UsersController@sponsorshipAllow');
Route::post('/users/sponsorshipRestrict', 'UsersController@sponsorshipRestrict');

//PWD REPORT
Route::get('/report/pwd/generate', 'ReportController@generate');



//////////////////////////////////////////////////////////////////////
/* RESOURCE ROUTES */
//////////////////////////////////////////////////////////////////////

Route::resource('/brgy', 'BrgyController')->middleware("auth");
Route::resource('/building', 'BuildingController')->middleware("auth");
Route::resource('/building-type', 'BuildingTypeController')->middleware("auth");
Route::resource('/business-category', 'BusinessCategoryController')->middleware("auth");
Route::resource('/business-registration', 'BusinessRegistrationController')->middleware("auth");
Route::resource('/collection', 'CollectionController')->middleware("auth");
Route::resource('/dashboard', 'DashboardController')->middleware("auth");
Route::resource('/document', 'DocumentController')->middleware("auth");
Route::resource('/document-approval', 'DocumentApprovalController')->middleware("auth");
Route::resource('/document-request', 'DocumentRequestController')->middleware("auth");
Route::resource('/facility', 'FacilityController')->middleware("auth");
Route::resource('/facility-reservation', 'ReservationController')->middleware("auth");
Route::resource('/facility-type', 'FacilityTypeController')->middleware("auth");
Route::resource('/house', 'HouseController')->middleware("auth");
Route::resource('/id-release', 'IDReleasingController')->middleware("auth");
Route::resource('/item', 'ItemController')->middleware("auth");
Route::resource('/item-reservation', 'ItemReservationController')->middleware("auth");
Route::resource('/logs', 'LogsController')->middleware("auth");
Route::resource('/lot', 'LotController')->middleware("auth");
Route::resource('/person', 'PeopleController')->middleware("auth");
Route::resource('/query/resident', 'QueryResidentController');
Route::resource('/query/reservation', 'QueryReservationController')->middleware("auth");
Route::resource('/query/service', 'QueryServiceController')->middleware("auth");
Route::resource('/query/document', 'QueryDocumentController')->middleware("auth");
Route::resource('/query/business', 'QueryBusinessController')->middleware("auth");
Route::resource('/recipient', 'RecipientController')->middleware("auth");
Route::resource('/reports/collection', 'ReportsCollectionController');
Route::resource('/reports/pwd', 'ReportsPwdController')->middleware("auth");
Route::resource('/report/pwd', 'ReportController')->middleware("auth");
Route::resource('/reservation', 'ReservationController@populate')->middleware("auth");
Route::resource('/resident', 'ResidentController')->middleware("auth");
Route::resource('/requirement', 'RequirementController')->middleware("auth");
Route::resource('/service', 'ServiceController')->middleware("auth");
Route::resource('/service-sponsorship', 'ServiceSponsorshipController')->middleware("auth");
Route::resource('/service-type', 'ServiceTypeController')->middleware("auth");
Route::resource('/service-transaction', 'ServiceTransactionController')->middleware("auth");
Route::resource('/street', 'StreetController')->middleware("auth");
Route::resource('/unit', 'UnitController')->middleware("auth");
Route::resource('/users', 'UsersController')->middleware("auth");
Route::resource('/utilities', 'UtilitiesController')->middleware("auth");


//////////////////////////////////////////////////////////////////////
/* AUTHENTICATION ROUTES */
//////////////////////////////////////////////////////////////////////

Route::get('/login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::post('/login', ['as' => 'login', 'uses' => 'SessionsController@store']);

Route::get('/register', ['as' => 'register', 'uses' => 'RegisterController@create']);
Route::post('/register', ['as' => 'register', 'uses' => 'RegisterController@store']);

Route::get('/logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);

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
/* REDIRECT ROUTES */
//////////////////////////////////////////////////////////////////////
Route::get('/home', function() {
	return redirect('/dashboard');
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
/* SYSTEM TEMPORARY ROUTES 
//////////////////////////////////////////////////////////////////////

Route::get('/sponsors', function() {
	return redirect('/unmt');
});

Route::get('/service-sponsorship', function() {
	return redirect('/unmt');
});

Route::get('/business-registration', function () {
	return redirect('/unmt');
});

*/

//////////////////////////////////////////////////////////////////////
/* ORPHAN ROUTES */
//////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////////////
/* DEPRECATED ROUTES */
//////////////////////////////////////////////////////////////////////

