/**
 * TimeHandle.js
 * @author Bryan James T. Ilaga
 */

var getRangeMonth = function(noOfMonths) {
    var monthNames = ["January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December"];
    var monthRet = [];
    var rawDate = new Date();
    var rawMonth = rawDate.getMonth() + 1;
    var monthPointer = rawDate.getMonth() + 1;

    if (noOfMonths <= 12 && noOfMonths >= 1) {
        
        if (monthPointer - (rawMonth - Math.trunc(noOfMonths / 2)) <= 0) {
            monthPointer -= noOfMonths;
            monthPointer = (12 + monthPointer);
        }
        else {
            monthPointer = (rawMonth - Math.trunc(noOfMonths / 2));
        }

        for (var count = 0; count < noOfMonths; count++) {
            monthRet.push(monthNames[monthPointer - 1]);

            if (monthPointer == 12) {
                monthPointer = 1;
            }
            monthPointer++;
        }
    }

    return (monthRet);
}

var getPrefixMonth = function(noOfMonths) {
    var monthNames = ["January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December"];
    var monthRet = [];
    var rawDate = new Date();
    var rawMonth = rawDate.getMonth() + 1;
    var monthPointer = rawDate.getMonth() + 1;

    if (noOfMonths <= 12 && noOfMonths >= 1) {
        if (monthPointer < noOfMonths) {
            monthPointer -= noOfMonths;
            monthPointer = 12 + monthPointer;
        }
        else {
            monthPointer -= noOfMonths;
            monthPointer++;
        }

        for (var count = 0; count < noOfMonths; count++) {
            monthRet.push(monthNames[monthPointer - 1]);

            if (monthPointer == 12) {
                monthPointer = 1;
            }
            monthPointer++;
        }
    }

    return (monthRet);
}

var getCurrentDateTime = function() {
    return (new Date());
}

var formatDate = function(passedDate) {
    return passedDate.getFullYear() + "-" + passedDate.getMonth() + "-" + passedDate.getDate();
}

var formatDateTime = function(passedDate) {
    return passedDate.getFullYear() + "-" + 
            ("0" + passedDate.getMonth()).slice(-2) + "-" + 
            ("0" + passedDate.getDate()).slice(-2) + " " + 
            ("0" + passedDate.getHours()).slice(-2) + ":" + 
            ("0" + passedDate.getMinutes()).slice(-2) + 
            ":00";
}

var formatJStoMySQL = function(passedDate) {
    return passedDate.getFullYear() + "-" + 
            ("0" + passedDate.getMonth()).slice(-2) + "-" + 
            ("0" + passedDate.getDate()).slice(-2) + " " + 
            ("0" + passedDate.getHours()).slice(-2) + ":" + 
            ("0" + passedDate.getMinutes()).slice(-2) + 
            ":00";
}

var formatJStoPHP = function(passedDate) {
    return passedDate.toString().substr(0, passedDate.toString().indexOf("("));
}

var formatMySQLtoJS = function(passedDate) {
    var pStruct = passedDate.split(" ");
    var pDate = pStruct[0].split("-");
    var pTime = pStruct[1].split(":");

    return new Date(pDate[0], pDate[1], pDate[2], pTime[0], pTime[1], pTime[2]);
}

var formatPHPtoJS = function(passedDate) {
    passedDate = JSON.parse(passedDate);
    var pStruct = passedDate.date.split(" ");
    var pDate = pStruct[0].split("-");
    var pTime = pStruct[1].split(":");

    return new Date(pDate[0], pDate[1], pDate[2], pTime[0], pTime[1], pTime[2].split(".")[0], pTime[2].split(".")[1]);
}

var pullNaturalTimefromMySQL = function(passedDate) {
    var JSDate = formatMySQLtoJS(passedDate);
    var meridian = "";
    var hours = 0;

    if (JSDate.getHours() > 12) {
        hours = JSDate.getHours() - 12;
        meridian = "pm"
    }
    else if (JSDate.getHours() < 12) {
        hours = JSDate.getHours();
        meridian = "am"
    }
    else {
        hours = JSDate.getHours();
        meridian = "pm"
    }

    return ("0" + hours).slice(-2) + ":" + ("0" + JSDate.getHours()).slice(-2) + " " + meridian;
}

var getReadableDate = function(passedDate) {
    var monthNames = ["January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December"];

    return (monthNames[passedDate.getMonth() - 1] + " " + 
            passedDate.getDate() + ", " + 
            passedDate.getFullYear());
}

var getReadableTime = function(passedDate) {
    var meridian = "";
    var hours = 0;

    if (passedDate.getHours() > 12) {
        hours = passedDate.getHours() - 12;
        meridian = "pm"
    }
    else if (passedDate.getHours() < 12) {
        hours = passedDate.getHours();
        meridian = "am"
    }
    else {
        hours = passedDate.getHours();
        meridian = "pm"
    }

    return ("0" + hours).slice(-2) + ":" + ("0" + passedDate.getHours()).slice(-2) + " " + meridian;
}

var getStringDateTime = function () {
    var dateTimeToday = new Date();
    return (dateTimeToday.getFullYear() + "" + 
            dateTimeToday.getMonth() + "" + 
            dateTimeToday.getDate() + "" + 
            dateTimeToday.getHours() + "" + 
            dateTimeToday.getMinutes() + "" + 
            dateTimeToday.getSeconds() + "" + 
            dateTimeToday.getMilliseconds());
}

var getDateOnly = function () {
    var dateTimeToday = new Date();
    return (dateTimeToday.getFullYear() + "-" + 
            dateTimeToday.getMonth() + "-" + 
            dateTimeToday.getDate());
}

var getCurrentDate = function() {
    var monthNames = ["January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December"];
    var rawDate = new Date();
    var currentDate = monthNames[rawDate.getMonth() - 1] + " " + 
                        rawDate.getDate() + ", " + 
                        rawDate.getFullYear();
    return (currentDate);
}
