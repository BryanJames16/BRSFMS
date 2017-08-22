<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Models\Building::class, function (Faker\Generator $faker) {
    return [
        'lotID' => function () {
             return factory(App\Models\Lot::class)->create()->lotID;
        },
        'buildingName' => $faker->word,
        'buildingTypeID' => function () {
             return factory(App\Models\Buildingtype::class)->create()->buildingTypeID;
        },
        'status' => $faker->boolean,
        'archive' => $faker->boolean,
    ];
});

$factory->define(App\Models\Buildingtype::class, function (Faker\Generator $faker) {
    return [
        'buildingTypeName' => $faker->word,
        'status' => $faker->boolean,
        'archive' => $faker->boolean,
    ];
});

$factory->define(App\Models\Business::class, function (Faker\Generator $faker) {
    return [
        'businessID' => $faker->word,
        'businessName' => $faker->word,
        'businessDesc' => $faker->word,
        'businessType' => $faker->word,
        'categoryPrimeID' => function () {
             return factory(App\Models\Businesscategory::class)->create()->categoryPrimeID;
        },
        'status' => $faker->boolean,
        'archive' => $faker->boolean,
    ];
});

$factory->define(App\Models\Businesscategory::class, function (Faker\Generator $faker) {
    return [
        'categoryName' => $faker->word,
        'categoryDesc' => $faker->word,
        'status' => $faker->boolean,
        'archive' => $faker->boolean,
    ];
});

$factory->define(App\Models\Businessregistration::class, function (Faker\Generator $faker) {
    return [
        'businessID' => $faker->word,
        'originalName' => $faker->word,
        'tradeName' => $faker->word,
        'peoplePrimeID' => function () {
             return factory(App\Models\Person::class)->create()->peoplePrimeID;
        },
        'residentPrimeID' => function () {
             return factory(App\Models\Resident::class)->create()->residentPrimeID;
        },
        'registrationDate' => $faker->dateTimeBetween(),
        'removalDate' => $faker->dateTimeBetween(),
        'archive' => $faker->randomNumber(),
    ];
});

$factory->define(App\Models\Collection::class, function (Faker\Generator $faker) {
    return [
        'collectionID' => $faker->word,
        'collectionDate' => $faker->dateTimeBetween(),
        'collectionType' => $faker->randomNumber(),
        'amount' => $faker->randomFloat(),
        'status' => $faker->word,
        'reservationprimeID' => function () {
             return factory(App\Models\Reservation::class)->create()->primeID;
        },
        'documentHeaderPrimeID' => function () {
             return factory(App\Models\Documentheaderrequest::class)->create()->documentHeaderPrimeID;
        },
        'residentPrimeID' => function () {
             return factory(App\Models\Resident::class)->create()->residentPrimeID;
        },
        'peoplePrimeID' => function () {
             return factory(App\Models\Person::class)->create()->peoplePrimeID;
        },
    ];
});

$factory->define(App\Models\Document::class, function (Faker\Generator $faker) {
    return [
        'documentID' => $faker->word,
        'documentName' => $faker->word,
        'documentDescription' => $faker->word,
        'documentContent' => $faker->word,
        'documentType' => $faker->word,
        'documentPrice' => $faker->randomFloat(),
        'status' => $faker->boolean,
        'archive' => $faker->boolean,
    ];
});

$factory->define(App\Models\Documentdetailrequest::class, function (Faker\Generator $faker) {
    return [
        'documentDetailPrimeID' => $faker->randomNumber(),
        'headerPrimeID' => function () {
             return factory(App\Models\Documentheaderrequest::class)->create()->documentHeaderPrimeID;
        },
        'documentPrimeID' => function () {
             return factory(App\Models\Document::class)->create()->primeID;
        },
        'quantity' => $faker->randomNumber(),
    ];
});

$factory->define(App\Models\Documentheaderrequest::class, function (Faker\Generator $faker) {
    return [
        'requestID' => $faker->word,
        'requestDate' => $faker->dateTimeBetween(),
        'status' => $faker->word,
        'peoplePrimeID' => function () {
             return factory(App\Models\Resident::class)->create()->residentPrimeID;
        },
    ];
});

$factory->define(App\Models\DocumentRequirement::class, function (Faker\Generator $faker) {
    return [
        'documentPrimeID' => function () {
             return factory(App\Models\Document::class)->create()->primeID;
        },
        'requirementID' => function () {
             return factory(App\Models\Requirement::class)->create()->requirementID;
        },
        'quantity' => $faker->randomNumber(),
    ];
});

$factory->define(App\Models\Employee::class, function (Faker\Generator $faker) {
    return [
        'primeID' => $faker->randomNumber(),
        'employeeID' => $faker->word,
        'registrationID' => $faker->randomNumber(),
        'username' => $faker->userName,
        'password' => bcrypt($faker->password),
        'status' => $faker->boolean,
        'archive' => $faker->boolean,
    ];
});

$factory->define(App\Models\Employeeposition::class, function (Faker\Generator $faker) {
    return [
        'positionName' => $faker->word,
        'positionDate' => $faker->dateTimeBetween(),
        'positionLevel' => $faker->randomNumber(),
        'status' => $faker->boolean,
        'archive' => $faker->boolean,
        'employeePrimeID' => function () {
             return factory(App\Models\Employee::class)->create()->primeID;
        },
    ];
});

$factory->define(App\Models\Facility::class, function (Faker\Generator $faker) {
    return [
        'facilityID' => $faker->word,
        'facilityName' => $faker->word,
        'facilityDesc' => $faker->word,
        'status' => $faker->boolean,
        'archive' => $faker->boolean,
        'facilityTypeID' => function () {
             return factory(App\Models\Facilitytype::class)->create()->typeID;
        },
        'facilityDayPrice' => $faker->randomFloat(),
        'facilityNightPrice' => $faker->randomFloat(),
    ];
});

$factory->define(App\Models\Facilitytype::class, function (Faker\Generator $faker) {
    return [
        'typeName' => $faker->word,
        'status' => $faker->boolean,
        'archive' => $faker->boolean,
    ];
});

$factory->define(App\Models\Family::class, function (Faker\Generator $faker) {
    return [
        'familyID' => $faker->word,
        'familyHeadID' => function () {
             return factory(App\Models\Resident::class)->create()->residentPrimeID;
        },
        'familyName' => $faker->word,
        'familyRegistrationDate' => $faker->dateTimeBetween(),
        'archive' => $faker->boolean,
    ];
});

$factory->define(App\Models\Familymember::class, function (Faker\Generator $faker) {
    return [
        'familyPrimeID' => function () {
             return factory(App\Models\Family::class)->create()->familyPrimeID;
        },
        'peoplePrimeID' => function () {
             return factory(App\Models\Resident::class)->create()->residentPrimeID;
        },
        'memberRelation' => $faker->word,
        'archive' => $faker->boolean,
    ];
});

$factory->define(App\Models\Generaladdress::class, function (Faker\Generator $faker) {
    return [
        'addressType' => $faker->word,
        'residentPrimeID' => function () {
             return factory(App\Models\Resident::class)->create()->residentPrimeID;
        },
        'facilitiesPrimeID' => function () {
             return factory(App\Models\Facility::class)->create()->primeID;
        },
        'businessPrimeID' => function () {
             return factory(App\Models\Businessregistration::class)->create()->registrationPrimeID;
        },
        'unitID' => function () {
             return factory(App\Models\Unit::class)->create()->unitID;
        },
        'streetID' => function () {
             return factory(App\Models\Street::class)->create()->streetID;
        },
        'lotID' => $faker->randomNumber(),
        'buildingID' => $faker->randomNumber(),
    ];
});

$factory->define(App\Models\Lot::class, function (Faker\Generator $faker) {
    return [
        'lotCode' => $faker->word,
        'streetID' => function () {
             return factory(App\Models\Street::class)->create()->streetID;
        },
        'status' => $faker->boolean,
        'archive' => $faker->boolean,
    ];
});

$factory->define(App\Models\Participant::class, function (Faker\Generator $faker) {
    return [
        'serviceTransactionPrimeID' => function () {
             return factory(App\Models\Servicetransaction::class)->create()->serviceTransactionPrimeID;
        },
        'residentID' => function () {
             return factory(App\Models\Resident::class)->create()->residentPrimeID;
        },
        'dateRegistered' => $faker->dateTimeBetween(),
    ];
});

$factory->define(App\Models\Person::class, function (Faker\Generator $faker) {
    return [
        'personID' => $faker->word,
        'firstName' => $faker->word,
        'middleName' => $faker->word,
        'lastName' => $faker->word,
        'suffix' => $faker->word,
        'contactNumber' => $faker->word,
        'gender' => $faker->word,
        'status' => $faker->boolean,
        'archive' => $faker->boolean,
    ];
});

$factory->define(App\Models\Requirement::class, function (Faker\Generator $faker) {
    return [
        'requirementName' => $faker->word,
        'requirementDesc' => $faker->word,
        'status' => $faker->boolean,
        'archive' => $faker->boolean,
    ];
});

$factory->define(App\Models\Reservation::class, function (Faker\Generator $faker) {
    return [
        'reservationName' => $faker->word,
        'reservationDescription' => $faker->word,
        'reservationStart' => $faker->dateTimeBetween(),
        'reservationEnd' => $faker->dateTimeBetween(),
        'dateReserved' => $faker->dateTimeBetween(),
        'peoplePrimeID' => function () {
             return factory(App\Models\Person::class)->create()->peoplePrimeID;
        },
        'facilityPrimeID' => function () {
             return factory(App\Models\Facility::class)->create()->primeID;
        },
        'status' => $faker->word,
    ];
});

$factory->define(App\Models\Resident::class, function (Faker\Generator $faker) {
    return [
        'residentID' => $faker->word,
        'firstName' => $faker->word,
        'middleName' => $faker->word,
        'lastName' => $faker->word,
        'suffix' => $faker->word,
        'contactNumber' => $faker->word,
        'gender' => $faker->word,
        'birthDate' => $faker->dateTimeBetween(),
        'civilStatus' => $faker->word,
        'seniorCitizenID' => $faker->word,
        'disabilities' => $faker->word,
        'residentType' => $faker->word,
        'status' => $faker->boolean,
    ];
});

$factory->define(App\Models\Residentaccount::class, function (Faker\Generator $faker) {
    return [
        'accountID' => $faker->word,
        'username' => $faker->userName,
        'password' => bcrypt($faker->password),
        'accessCode' => $faker->word,
        'status' => $faker->boolean,
        'archive' => $faker->boolean,
        'peoplePrimeID' => function () {
             return factory(App\Models\Resident::class)->create()->residentPrimeID;
        },
    ];
});

$factory->define(App\Models\Residentaccountregistration::class, function (Faker\Generator $faker) {
    return [
        'registrationDate' => $faker->dateTimeBetween(),
        'accountPrimeID' => function () {
             return factory(App\Models\Residentaccount::class)->create()->accountPrimeID;
        },
    ];
});

$factory->define(App\Models\Residentbackground::class, function (Faker\Generator $faker) {
    return [
        'currentWork' => $faker->word,
        'monthlyIncome' => $faker->word,
        'dateStarted' => $faker->dateTimeBetween(),
        'peoplePrimeID' => function () {
             return factory(App\Models\Resident::class)->create()->residentPrimeID;
        },
        'status' => $faker->boolean,
        'archive' => $faker->boolean,
    ];
});

$factory->define(App\Models\Residentregistration::class, function (Faker\Generator $faker) {
    return [
        'registrationDate' => $faker->dateTimeBetween(),
        'employeePrimeID' => function () {
             return factory(App\Models\Employee::class)->create()->primeID;
        },
        'peoplePrimeID' => function () {
             return factory(App\Models\Resident::class)->create()->residentPrimeID;
        },
    ];
});

$factory->define(App\Models\Service::class, function (Faker\Generator $faker) {
    return [
        'serviceID' => $faker->word,
        'serviceName' => $faker->word,
        'serviceDesc' => $faker->word,
        'typeID' => function () {
             return factory(App\Models\Servicetype::class)->create()->typeID;
        },
        'status' => $faker->boolean,
        'archive' => $faker->boolean,
    ];
});

$factory->define(App\Models\Servicesponsorship::class, function (Faker\Generator $faker) {
    return [
        'sponsorshipDate' => $faker->dateTimeBetween(),
        'servicePrimeID' => function () {
             return factory(App\Models\Service::class)->create()->primeID;
        },
        'peoplePrimeID' => function () {
             return factory(App\Models\Person::class)->create()->peoplePrimeID;
        },
        'startOfImplementation' => $faker->dateTimeBetween(),
        'endOfImplementation' => $faker->dateTimeBetween(),
    ];
});

$factory->define(App\Models\Servicetransaction::class, function (Faker\Generator $faker) {
    return [
        'serviceTransactionID' => $faker->word,
        'serviceName' => $faker->word,
        'servicePrimeID' => function () {
             return factory(App\Models\Service::class)->create()->primeID;
        },
        'fromAge' => $faker->randomNumber(),
        'toAge' => $faker->randomNumber(),
        'fromDate' => $faker->dateTimeBetween(),
        'toDate' => $faker->dateTimeBetween(),
        'status' => $faker->word,
        'archive' => $faker->boolean,
    ];
});

$factory->define(App\Models\Servicetype::class, function (Faker\Generator $faker) {
    return [
        'typeName' => $faker->word,
        'typeDesc' => $faker->word,
        'status' => $faker->boolean,
        'archive' => $faker->boolean,
    ];
});

$factory->define(App\Models\Street::class, function (Faker\Generator $faker) {
    return [
        'streetName' => $faker->word,
        'status' => $faker->boolean,
        'archive' => $faker->boolean,
    ];
});

$factory->define(App\Models\Sysutil::class, function (Faker\Generator $faker) {
    return [
        'brgyName' => $faker->word,
    ];
});

$factory->define(App\Models\Unit::class, function (Faker\Generator $faker) {
    return [
        'unitCode' => $faker->word,
        'status' => $faker->boolean,
        'archive' => $faker->boolean,
        'buildingID' => function () {
             return factory(App\Models\Building::class)->create()->buildingID;
        },
    ];
});

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt($faker->password),
        'remember_token' => str_random(10),
        'firstName' => $faker->word,
        'middleName' => $faker->word,
        'lastName' => $faker->word,
        'suffix' => $faker->word,
        'imagePath' => $faker->word,
    ];
});

$factory->define(App\Models\Utility::class, function (Faker\Generator $faker) {
    return [
        'barangayName' => $faker->word,
        'chairmanName' => $faker->word,
        'address' => $faker->word,
        'brgyLogoPath' => $faker->word,
        'provLogoPath' => $faker->word,
        'facilityPK' => $faker->word,
        'documentPK' => $faker->word,
        'servicePK' => $faker->word,
        'residentPK' => $faker->word,
        'familyPK' => $faker->word,
        'docRequestPK' => $faker->word,
        'docApprovalPK' => $faker->word,
        'reservationPK' => $faker->word,
        'serviceRegPK' => $faker->word,
        'sponsorPK' => $faker->word,
    ];
});

$factory->define(App\Models\Voter::class, function (Faker\Generator $faker) {
    return [
        'voterPrimeID' => $faker->word,
        'votersID' => $faker->word,
        'datVoter' => $faker->dateTimeBetween(),
        'peoplePrimeID' => function () {
             return factory(App\Models\Resident::class)->create()->residentPrimeID;
        },
        'status' => $faker->boolean,
        'archive' => $faker->boolean,
    ];
});

