$(document).ready(function() {

    document.addEventListener('contextmenu', event => event.preventDefault());
    var images = {
        "fake" : null,
        "real0" : null,
        "real1" : null,
        "real2" : null
    }

    function updateImageReferences() {
        $.ajax({
            'type': "POST",
            'url': "fetchRealImage.php",
            'dataType': "json",
            'async': false,
            'data': { fake: false },
            'success': function(response){
                 images["real0"] = response;
            },
        });
        $.ajax({
            'type': "POST",
            'url': "fetchRealImage.php",
            'dataType': "json",
            'async': false,
            'data': { fake: false },
            'success': function(response){
                 images["real1"] = response;
            },
        });
        $.ajax({
            'type': "POST",
            'url': "fetchRealImage.php",
            'dataType': "json",
            'async': false,
            'data': { fake: false },
            'success': function(response){
                 images["real2"] = response;
            },
        });
        $.ajax({
            'type': "POST",
            'url': "fetchFakeImage.php",
            'dataType': "json",
            'async': false,
            'data': { fake: true },
            'success': function(response){
                images["fake"] = response;
            },
        });
    }
    
    
    function populate() {
        updateImageReferences();
        
        var element = document.getElementById("question");
        element.innerHTML = "Which one is fake?";
        
        
        // show options
        var fakeIndex = Math.floor(Math.random() * 4);
        var realIndex = 0;
        var choices = quiz.getQuestionIndex().choices;
        
        for (var i = 0; i < choices.length; i++) {
            var element = document.getElementById("choice" + i);
            if (i==fakeIndex) {
                element.innerHTML = images["fake"]? '<img src="/images/fake/faces/'+images["fake"]+'"/>':"fake";
                guess("btn"+i, "fake");
            }
            else {
                element.innerHTML = images["real" + realIndex]? '<img src="/images/real/faces/'+images["real"+realIndex]+'"/>':"real";
                guess("btn"+i, "real");
                realIndex++;
            }
        }
        showProgress();
    };
    
    function guess(id, guess) {
        var button = document.getElementById(id);
        button.onclick = function() {
            if (guess=="fake") {
                //game continues
                quiz.score++;
                populate();
            }
            else {
                //guessed a real picture, end game
                showScores();
            }    
        }
    };
    
    function showProgress() {
        var currentQuestionNumber = quiz.questionIndex + 1;
        var element = document.getElementById("progress");
        element.innerHTML = "Score " + (quiz.score);
    };
    function showScores() {
        var gameOverHTML = "<h1>Result</h1>";
        gameOverHTML += '<div id="game" class="flex-center flex-column">';
        gameOverHTML += "<h2> You Lose!</h2>";
        gameOverHTML += "<h3> The Fake Image Was:</h3>"
        gameOverHTML += '<img src="/images/fake/faces/' + images.fake + '" style="width:350px">';
        gameOverHTML += "<h2 id='score'> Your score: " + quiz.score + "</h2>";
        gameOverHTML += '<h3 style="margin-bottom:50px"> Thank You For Playing! </h3>';
        gameOverHTML += '<div><button class="btn" onclick="location.href=\'play.php\'"">Try Again</button></div></div>';
        gameOverHTML += '<div><button class="btn" onclick="location.href=\'index.php\'"">Home</button></div></div>';
        var element = document.getElementById("quiz");
        element.innerHTML = gameOverHTML;
    };
    function Question(text, choices, answer) {
        this.text = text;
        this.choices = choices;
        this.answer = answer;
    }
    function Quiz(questions) {
        this.score = 0;
        this.questions = questions;
        this.questionIndex = 0;
    }
    Question.prototype.isCorrectAnswer = function(choice) {
        return this.answer === choice;
    }
    Quiz.prototype.getQuestionIndex = function() {
        return this.questions[this.questionIndex];
    }
    // create questions
    var questions = [
        new Question("Which one is fake?", ["real", "real", "real", "fake"], "fake"),
    ];

    // create quiz
    var quiz = new Quiz(questions);
    // display quiz
    populate();
});