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

var getCurrentDate = function() {
    var monthNames = ["January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December"];
    var rawDate = new Date();
    var currentDate = monthNames[rawDate.getMonth()] + " " + 
                        rawDate.getDate() + ", " + 
                        rawDate.getFullYear();
    return (currentDate);
}