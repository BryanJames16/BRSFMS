var DASHBOARD	 				= 	"dashboard-id";
var EMPLOYEE_POSITION 			= 	"employee-position-id";
var EMPLOYEE 					= 	"employee-id";
var FACILITY_TYPE 				= 	"facility-type-id";
var FACILITY 					= 	"facility-id";
var INDIVIDUAL					=	"individual-id";
var UNIT 						= 	"unit-id";
var LOT 						=	"lot-id";
var PROVINCE 						=	"province-id";
var STREET 						= 	"street-id";
var CITY 						= 	"city-id";
var BARANGAY 					= 	"barangay-id";
var HOUSE				= 	"house-number-id";
var MUNICIPALITY 				= 	"municipality-id";
var REGION 						= 	"region-id";
var SERVICES 					=	"services-id";
var SERVICE_TYPE 				=	"service-type-id";
var DOCUMENT_TYPE 				= 	"document-type-id";
var PHYSICAL_DOCUMENT 			= 	"physical-document-id";
var RESIDENT_APPLICATION 		= 	"resident-application-id";
var EMPLOYEE_REGISTRATION 		= 	"employee-registration-id";
var BLOTTER_CASE 				= 	"blotter-case-id";
var FORMAL_CASE 				= 	"formal-case-id";
var DOCUMENT_REQUEST 			= 	"document-request-id";
var FACILITY_RESERVATION 		= 	"facility-reservation-id";
var SERVICE_SPONSORSHIP 		= 	"service-sponsorship-id";
var INCIDENT_REPORT 			= 	"incident-report-id";
var QUERY 						= 	"query-id";
var UTILITIES 					= 	"utilities-id";
var BUSINESS_CATEGORY 			= 	"business-category-id";
var BUSINESS 					= 	"business-id";
var DOCUMENT 					= 	"document-id";


function setSelectedTab(selectedTab) {
	var retVal = true;

	var element = document.getElementById(selectedTab);
	element.className += " active ";

	return (retVal);
}