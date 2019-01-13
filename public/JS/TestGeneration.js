
function nextQ() {
    return i =i+1;
}
function beforeQ() {
    return i = i-1;
}


function removeQuestion()
{
    questionSelector = document.getElementById(i);
    while (questionSelector.firstChild) {
        questionSelector.removeChild(questionSelector.firstChild);
    }
    questionSelector.remove();
}





function generationTest()
{
    var questionSelector = document.createElement('div');
    var question = obj[i].question;
    questionSelector.textContent = question;
    questionSelector.id = i;
    testSelector.appendChild(questionSelector);
    var answers = obj[i].answers;
    console.log(answers);


    for(answer in answers)
    {
        var answercheckbox = document.createElement('input');
        answercheckbox.type = 'checkbox';

        var answerText = document.createElement('span');

        answerText.textContent = answers[answer][0];
        questionSelector.appendChild(answerText);
        answercheckbox.value = answers[answer][2];
        questionSelector.appendChild(answercheckbox);

    }
    console.log(testSelector);

}

document.onclick = function (event) {
    var target = event.target;
    if (target.className == 'Reply' )
    {
        event.preventDefault();
        removeQuestion();
        nextQ();
        generationTest();
    }
}