$(document).ready(function(event) {
    const dateCluster = {
        dropWidth: 200,
        dropPrimaryColor: "#2fb594",
        dropBorder: "1px solid #2dad8d", 
        minYear: new Date().getFullYear().toString(), 
        maxYear: (new Date().getFullYear() + 5).toString(), 
        yearsRange: "1"
    };

    const timeCluster = {
        meridians: false, 
        mousewheel: true, 
        dropWidth: 200,
        dropPrimaryColor: "#2fb594",
        dropBorder: "1px solid #2dad8d"
    };

    $("#rdate").dateDropper(dateCluster);
    $("#erdate").dateDropper(dateCluster);

    $("#rstartTime").timeDropper(timeCluster);
    $("#erstartTime").timeDropper(timeCluster);
    $("#rendTime").timeDropper(timeCluster);
    $("#erendTime").timeDropper(timeCluster);
    $("#exdate").timeDropper(timeCluster);
});