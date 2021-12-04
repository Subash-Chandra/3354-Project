var images = {
    "fake"  : "https://via.placeholder.com/225x225?text=fake.jpg",
    "real" : "https://via.placeholder.com/225x225?text=real.jpg",
}

function populate() {
    /*
    if (this.isEnded) {
    showScores();
    } else {
    */
    // show question
    var element = document.getElementById("question");
    element.innerHTML = "Which one is fake?";

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
    //alert("showScores called.");
    saveScore();
    alert("saveScore.php finished.");
    var gameOverHTML = "<h1>Result</h1>";
    gameOverHTML += "<h2 id='score'> Your score: " + quiz.score + "</h2>";
    gameOverHTML += '<div id="game" class="flex-center flex-column">';
    gameOverHTML += '<div><button class="btn" onclick="location.href=\'index.php\'"">Home</button></div></div>';
    var element = document.getElementById("quiz");
    element.innerHTML = gameOverHTML;
};

function saveScore() {
    alert("saveScore called.");
    $.ajax({
        type: 'POST',
        url: 'saveScore.php',
        data: {
           score: quiz.score
        },
        success: function(data){
           alert('success');
        },
        error: function(xhr, textStatus, error){
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
        }
      });
};

// create questions
var questions = [
    new Question("Which one is fake?", ["real", "real", "real", "fake"], "fake"),
];

function Question(text, choices, answer) {
    this.text = text;
    this.choices = choices;
    this.answer = answer;
}

Question.prototype.isCorrectAnswer = function(choice) {
    return this.answer === choice;
}


function Quiz(questions) {
    this.score = 0;
    this.questions = questions;
    this.questionIndex = 0;
}

Quiz.prototype.getQuestionIndex = function() {
    return this.questions[this.questionIndex];
}

Quiz.prototype.guess = function(answer) {
    if (this.getQuestionIndex().isCorrectAnswer(answer)) {
        this.score++;
    }
    else {
        //Sudden Death, quit game if not correct
        this.isEnded = true;
    }

    this.questionIndex++;
}

var isEnded = false;
Quiz.prototype.isEnded = function() {
    return this.questionIndex === this.questions.length;
}

// create quiz
var quiz = new Quiz(questions);

// display quiz
populate();