<script>
    var RELEASE = "RELEASE";
    var DEBUG = "DEBUG";

    var workType = DEBUG;

    $(document).ready(function() {
        if (workType == RELEASE) {
            console.log("%cSTOP!", "color: red; " + 
                                    "font-size: 80px; " + 
                                    "font-weight: bold;" + 
                                    "text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;" + 
                                    "font-family: Arial; "
            );

            console.log("%cThis browser feature is intended for developers only. " + 
                        "If someone told you to copy-paste something here to enable a feature " + 
                        "it is a \"scam\". You might be a victim of identity theft.", 
                            "color: black; " + 
                            "font-size: 25px; " + 
                            "font-family: Arial; ");
        }
    });
</script>