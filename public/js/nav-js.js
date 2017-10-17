var BARANGAY = "barangay-id";
var BLOTTER_CASE = "blotter-case-id";
var BUILDING = "building-id";
var BUILDING_TYPE = "building-type-id";
var BUSINESS = "business-id";
var BUSINESS_CATEGORY = "business-category-id";
var BUSINESS_REGISTRATION = "business-registration-id";
var CITY = "city-id";
var COLLECTION = "collection-id";
var DASHBOARD = "dashboard-id";
var DOCUMENT = "document-id";
var DOCUMENT_TYPE = "document-type-id";
var DOCUMENT_REQUEST = "document-request-id";
var DOCUMENT_APPROVAL = "document-approval-id";
var EMPLOYEE = "employee-id";
var EMPLOYEE_POSITION = "employee-position-id";
var EMPLOYEE_REGISTRATION = "employee-registration-id";
var FACILITY = "facility-id";
var FACILITY_RESERVATION = "facility-reservation-id";
var FACILITY_TYPE = "facility-type-id";
var FORMAL_CASE = "formal-case-id";
var HOUSE = "house-number-id";
var INDIVIDUAL = "individual-id";
var ITEM = "item-id";
var ITEM_RESERVATION = "item-reservation-id";
var LOGS = "logs-id";
var LOT = "lot-id";
var ID_RELEASING = "id-releasing-id";
var MUNICIPALITY = "municipality-id";
var PHYSICAL_DOCUMENT = "physical-document-id";
var PROVINCE = "province-id";
var QUERY = "query-id";
var RECIPIENTS = "recipient-id";
var QUERY_RESIDENT = "query-resident-id";
var QUERY_RESERVATION = "query-reservation-id";
var QUERY_SERVICE = "query-service-id";
var QUERY_DOCUMENT = "query-document-id";
var QUERY_BUSINESS = "query-business-id";
var USERS = "users-id";
var REGION = "region-id";
var REPORT_COLLECTION = "report-collection-id";
var REPORT_PWD = "report-pwd-id";
var REPORT_SENIOR = "report-senior-id";
var REPORT_SERVICE = "report-service-id";
var REPORT_BUSINESS = "report-business-id";
var REPORT_RESIDENT = "report-resident-id";
var REPORT_RESERVATION = "report-reservation-id";
var REPORT_EMPLOYED = "report-employed-id";
var RESIDENT_APPLICATION = "resident-application-id";
var REQUIREMENTS = "requirement-id";
var SERVICE_REGISTRATION = "service-registration-id";
var SERVICE_SPONSORSHIP = "service-sponsorhip-id";
var SERVICE_TYPE = "service-type-id";
var SERVICES = "services-id";
var STREET = "street-id";
var UNIT = "unit-id";
var UTILITIES = "utilities-id";


function setSelectedTab(selectedTab) {
    var element = document.getElementById(selectedTab);
    element.className += " active ";
}