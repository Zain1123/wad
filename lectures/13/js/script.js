var questions = [{
    question : "When a user views a page containing a JavaScript program, which machine actually executes the script?",
    choices : [ "The User's machine running a Web browser",
        "The Web server",
        "A central machine deep within Netscape's corporate offices",
        "None of the above"],
    correctAnswer : 2
},{
    question : "Which of the following can't be done with client-side JavaScript?",
    choices : [ "Validating a form",
        "Sending a form's contents by email",
        "Storing the form's contents to a database file on the server",
        "None of the above"],
    correctAnswer : 2
},{
    question : "Using _______ statement is how you test for a specific condition",
    choices : [ "select",
        "if",
        "for",
        "none of the above"],
    correctAnswer : 1
},{
    question : "Which of these are front-end language?",
    choices : [ "Html",
        "CSS",
        "Javascript",
        "All of these"],
    correctAnswer : 4
},{
    question : "How can declare string variable in javascript?",
    choices : [ "Var",
        "int",
        "char",
        "string"],
    correctAnswer : 1
}];

var currentQuestion = 0;
var correctAnswers = 0;
var quizOver = false;
// var number = choices.length;

displayCurrentQuestion();
document.getElementById("quiz-message").style.display = 'none';
function displayNext() {
    /*Write your code here */
    if(currentQuestion < questions.length-1) {
        currentQuestion++;
        document.getElementById("next-btn").innerText='Next Question';
        document.getElementById("choice-list").innerHTML='';
        displayCurrentQuestion();
    }
    else{
        document.getElementById("next-btn").innerText='Play again';
        displayScore();
        resetQuiz();
    }
}

function displayCurrentQuestion() {
    /*Write your code here */
    document.getElementById("question").innerText = questions[currentQuestion].question;
    for(var i=0;i<4;i++) {
        document.getElementById("choice-list").innerHTML +='<li><input type="radio">'+questions[currentQuestion].choices[i]+'</li>';
    }
}

function resetQuiz() {
    currentQuestion = 0;
    correctAnswers = 0;
    hideScore();
}
function displayScore() {
        document.getElementById("result").innerHTML = "you scored: " + correctAnswers + " out of: " + questions.length;
        document.getElementById("result").style.display = 'block';
}
function hideScore() {
    document.getElementById("result").style.display = 'none';
}