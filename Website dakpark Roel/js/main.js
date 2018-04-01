function updatePage() {
    reqwest({
        url: 'includes/query.php',
        contentType: 'application/json',
        success: successHandler,
        error: errorHandler
    })


    function successHandler(data) {
        console.log('de score is ' + data.score)
        console.log('de locatie is ' + data.location)
        dataShowScore(data);
        dataShowLocation(data);
        dataShowTeamName(data);
    }

    function errorHandler(error) {
        console.log('dit gaat mis ', error);
    }

    //show score
    function dataShowScore(data) {
        document.getElementById("score").innerHTML = "huidige score: " + data.score;
        //debug
        console.log("updating score");
    }

    //show teamname
    function dataShowTeamName(data) {
        document.getElementById("teamname").innerHTML = "Team naam: " + data.teamname;
        //debug
        console.log("updating teamname");
    }

    //show location
    function dataShowLocation(data) {
        // locatie 1
        if (data.location == 0) {
            document.getElementById("marker").style.top = "67%";
            document.getElementById("marker").style.left = "21%";
        }
        // locatie 2
        if (data.location == 1) {
            document.getElementById("marker").style.top = "73%";
            document.getElementById("marker").style.left = "50%";
        }
        // locatie 3
        if (data.location == 2) {
            document.getElementById("marker").style.top = "0%";
            document.getElementById("marker").style.left = "50%";
        }
        // locatie 4
        if (data.location == 3) {
            document.getElementById("marker").style.top = "35%";
            document.getElementById("marker").style.left = "9.4%";
        }
        //debug
        console.log("updating location");
    }
}
setInterval(updatePage, 2000);