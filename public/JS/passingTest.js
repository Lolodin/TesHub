var obj =JSON.parse(jsonArray);
var i = 0;
var mainQuestArray=[];
var maxI = obj.length;
var testSelector = document.querySelector('.test');
function nextQ() {
    return i =i+1;
}
function beforeQ() {
    return i = i-1;
}


function removeQuestion()
{

    if (testSelector.firstChild)
    {
        while (testSelector.firstChild)
        {

            let a = testSelector.firstChild;
            testSelector.removeChild(a);

        }
    }

}
function formData()
{

    var divForm = document.getElementById('form');
    var formData = new FormData(divForm);
    mainQuestArray[i]=formData;

}
/* Return Form Data*/
function toJson()
{

    var formObject = new FormData();
    mainQuestArray = mainQuestArray.filter(arrays => arrays !=='empty');
    console.log(mainQuestArray);
    for (let a=0;a<mainQuestArray.length;a++ )
    {

        for (let key of mainQuestArray[a].keys())
        {
            for (let b=0;b<mainQuestArray[a].getAll(key).length;b++ )
            {
                formObject.append(key, mainQuestArray[a].getAll(key)[b])
            }
            break;
        }

    }
    return formObject;

}

function sendTest()
{
    var request = new XMLHttpRequest();
    request.open('POST', '/testHandler', true);
    request.send(toJson());
    request.onreadystatechange = function ()
    {
        if(request.readyState === XMLHttpRequest.DONE && request.status === 200)
        {
            let responseTextResult = document.createElement('li');
            responseTextResult.textContent ='Тест пройден, получено быллов: ' + request.responseText;
            testSelector.appendChild(responseTextResult);
        };
    };
    generateThx();

}

function generateThx()
{
    var thxselector = document.createElement('div');
    thxselector.textContent = 'Вы завершили тест';
    testSelector.appendChild(thxselector);
}

function generationTest()
{

    var questionSelector = document.createElement('li');
    var question = obj[i].question;
    questionSelector.textContent = question + '   ';
    questionSelector.id = i;
    questionSelector.classList.add('list-group-item','list-group-item-primary');
    testSelector.appendChild(questionSelector);
    var answers = obj[i].answers;

    for(answer in answers)
    {

        var answercheckbox = document.createElement('input');
        answercheckbox.type = 'checkbox';

        var answerText = document.createElement('li');

        answerText.textContent = answers[answer][0];
        answerText.classList.add('list-group-item');

        answercheckbox.value = answers[answer][2];
        answercheckbox.name = 'question'+i+'[]';
        answerText.appendChild(answercheckbox);
        testSelector.appendChild(answerText);

    }


}
generationTest();
document.onclick = function (event)
{
    var target = event.target;
    // button Reply
    if (target.classList.contains('Reply'))
    {
        if (i >= maxI-1)
        {
            event.preventDefault();
            formData();
            sendTest();
            removeQuestion();
            return true;
        }

        event.preventDefault();
        formData();
        removeQuestion();
        nextQ();
        generationTest();



    }
    //button Backwards
    if (target.classList.contains('Backwards'))
    {
        if(i<=0)
        {
            event.preventDefault();
            return false;
        }
        event.preventDefault();
        removeQuestion();
        beforeQ();
        generationTest();


    }

    //sendTest Button
    if (target.classList.contains('SendTest'))
    {
        event.preventDefault();
        sendTest();
        toJson();
    }
    if (target.classList.contains('skip'))
    {
        event.preventDefault();

        removeQuestion();
        nextQ();
        generationTest();
    }




}