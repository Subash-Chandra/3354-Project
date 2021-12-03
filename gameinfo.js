var gameType;
var   gameMode;

var submitAnswer = function(gType, gMode) {
    //put the info into global variables so they can be accessed in another file
    gameType=gType;
    gameMode=gMode;

    window.location = "play.html";

};
