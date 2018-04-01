var roundStart = 0;
var roundEnd = 0;

function updatePage() {
    reqwest({
        url: 'includes/query.php',
        contentType: 'application/json',
        success: successHandler,
        error: errorHandler
    })
}
setInterval(updatePage, 2000);

function uploadScore() {
    reqwest({
        url: 'includes/uploadScore.php',
        success: successHandler2,
        error: errorHandler
    })
}

function successHandler(data) {
    dataShowScore(data);
    dataShowLocation(data);
    dataShowTeamName(data);
}

function successHandler2() {
    console.log('geupload');
}

function errorHandler(error) {
    console.log('dit gaat mis ', error);
}

//show score
function dataShowScore(data) {
    document.getElementById("score").innerHTML = "huidige score: " + data.score;
    //debug
}

//show teamname
function dataShowTeamName(data) {
    document.getElementById("teamname").innerHTML = "Team naam: " + data.teamname;
    //debug
}

//show location
function dataShowLocation(data) {
    // locatie 1
    if (data.location == 0) {
        if (roundStart == 0 && roundEnd == 1) {// ronde klaar score uploaden
            roundEnd = 0;
            roundStart = 1;
            uploadScore();
            console.log('score uploaden')
        }
        roundStart = 1;
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
        roundStart = 0;
        roundEnd = 1;
    }
}