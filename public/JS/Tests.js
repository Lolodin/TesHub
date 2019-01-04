var objectQuest =
    {
        indexQuest: 0,
        indexAnswer: [0],
        incremenAnswer: 0,
        answers: function () {
            return document.querySelectorAll('.addAnswer');
        }
    }
//отслеживаем клик
document.onclick = function (event) {
    var target = event.target; //записываем клик в переменную target

    if (target.className == 'addQuest') { //target== addQuest
        event.preventDefault();
        /*  Можно перенести в функцию */
        var addQuest = document.querySelector('.addQuest'); // Добавляем кнопку в переменную
        var questions = document.querySelector('.questions'); //Записываем блок с вопросами в questions
       /* Создаем новый блок div с вопросом */
        var newQuestion = document.createElement('div');
         objectQuest.indexQuest++; //Увеличиваем индефикатор вопроса на 1
         objectQuest.indexAnswer.push(0);
        newQuestion.id = "question" +objectQuest.indexQuest;
        newQuestion.innerHTML = '<input name="question' + objectQuest.indexQuest + '" value="Вопрос">' +
            '<input class="polzun" name="score' + objectQuest.indexQuest + '" type="number" value="0">'+
            '<br>' +
            '<input name="' + objectQuest.indexQuest + 'answer0[]' + '" value="Ответ">' +
            '<input type="checkbox" name="' + objectQuest.indexQuest +'answer0[]" value="true">'+
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
      newAnswer.name =elem+"answer"+(objectQuest.indexAnswer[elem]+1)+'[]';
      objectQuest.indexAnswer[elem]++;
      newAnswer.value = 'ответ';
      var checkbox = document.createElement('input');
      checkbox.type = 'checkbox';
      checkbox.name = newAnswer.name;
      checkbox.value = 'true';


var questSelector = document.getElementById('question'+elem);
var brBefore = document.getElementById(elem);
var br = document.createElement('br');
questSelector.insertBefore(newAnswer, brBefore);
questSelector.insertBefore(checkbox, brBefore);
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





