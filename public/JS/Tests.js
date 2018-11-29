var objectQuest =
    {
        indexQuest: 0,
        indexAnswer: [0],
        incremenAnswer: 0,
        answers: function () {
            return document.querySelectorAll('.addAnswer');
        }
    }

document.onclick = function (event) {
    var target = event.target;

    if (target.className == 'addQuest') {
        event.preventDefault();
        var addQuest = document.querySelector('.addQuest');
        var questions = document.querySelector('.questions');
        var newQuestion = document.createElement('div');
         objectQuest.indexQuest++;
         objectQuest.indexAnswer.push(0);
        newQuestion.id = "question" +objectQuest.indexQuest;
        newQuestion.innerHTML = '<input name="question' + objectQuest.indexQuest + '" value="Вопрос">' +
            '<br>' +
            '<input name="' + objectQuest.indexQuest + 'answer' + (objectQuest.indexAnswer[objectQuest.indexQuest]) + '" value="Ответ">' +
            '<br>' +
            '<button id="'+objectQuest.indexQuest+'" class = "addAnswer">Добавить вариант ответа</button>' +
            '<br>' +
            '<button class="addQuest">Добавить вопрос</button>';
        addQuest.remove();
        questions.appendChild(newQuestion);
    }
   if (target.className=='addAnswer') {
        event.preventDefault();
       var elem = target.id;
      var newAnswer = document.createElement('input');
 newAnswer.name = elem +"answer"+(objectQuest.indexAnswer[elem]+1);
       objectQuest.indexAnswer[elem]++;
newAnswer.value = 'ответ';

var questSelector = document.getElementById('question'+elem);
var brBefore = document.getElementById(elem);
var br = document.createElement('br');
questSelector.insertBefore(newAnswer, brBefore);
questSelector.insertBefore(br, brBefore)


   }

}

// document.onclick = function (event) {
//
//
//     // var newAnswer = document.createElement('input');
//     // newAnswer.name = ""
//     // newAnswer.value = 'ответ';
//     // var targ = event.target;
//     // var elem = targ.id;
//
//     // elem.appendChild(newAnswer)
// }





