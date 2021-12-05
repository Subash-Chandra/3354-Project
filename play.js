$(document).ready(function() {
    var images = {
        "fake"  : "https://via.placeholder.com/225x225?text=fake.jpg",
        "real" : "https://via.placeholder.com/225x225?text=real.jpg",
    }

    function populate() {
        // show question
        var element = document.getElementById("question");
        element.innerHTML = "Which one is fake?";
        
        $.post("fetchImage.php",
        {
            fake: false
        }, function(response) {
            var image = response;
            alert("fetched image " + image);
        });

        // show options
        var fake = Math.floor(Math.random() * 4);
        var choices = quiz.getQuestionIndex().choices;
        for (var i = 0; i < choices.length; i++) {
            var element = document.getElementById("choice" + i);
            if (i==fake) {
                element.innerHTML = images["fake"]? '<img src="'+images["fake"]+'"/>':"fake";
                guess("btn"+i, "fake");
            }
            else {
                element.innerHTML = images["real"]? '<img src="'+images["real"]+'"/>':"real";
                guess("btn"+i, "real");
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
        gameOverHTML += "<h2 id='score'> Your score: " + quiz.score + "</h2>";
        gameOverHTML += '<div id="game" class="flex-center flex-column">';
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