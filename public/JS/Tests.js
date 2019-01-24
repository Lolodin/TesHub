var objectQuest =
    {
        indexQuest: 0,
        indexAnswer: [0],
        incremenAnswer: 0,
        answers: function () {
            return document.querySelectorAll('.addAnswer');
        }
    };
function changeButton(addQuest) {
    let deleteButton = document.createElement('button');
    deleteButton.className = 'deleteQuestion btn btn-danger';
    deleteButton.textContent = 'Удалить вопрос';
    addQuest.appendChild(deleteButton);


}
function deleteQuestion(target) {
let checkQuestion = document.querySelectorAll('.question').length;
if (checkQuestion>1) {
    target.parentElement.remove();
}
else
{
    let  a = document.querySelector('.deleteQuestion ').classList.add('disabled')
}

}
function deleteAnswer (target)
{
    target.previousSibling.previousSibling.remove();
    target.previousSibling.previousSibling.remove();
    target.previousSibling.remove();

    target.remove();

}
function addAnswer(target)
{
    let elem = target.id;
    var newAnswer = document.createElement('input');
    newAnswer.name =elem+"answer"+(objectQuest.indexAnswer[elem]+1)+'[]';
    objectQuest.indexAnswer[elem]++;
    newAnswer.placeholder = 'Ответ';
    var checkbox = document.createElement('input');
    checkbox.type = 'checkbox';
    checkbox.name = newAnswer.name;
    checkbox.value = 'true';
    let deleteAnswer = document.createElement('button');
    deleteAnswer.className='deleteAnswer btn btn-danger btn-sm';
    deleteAnswer.innerText="X";



    var questSelector = document.getElementById('question'+elem);
    var brBefore = document.getElementById(elem);
    var br = document.createElement('br');
    questSelector.insertBefore(newAnswer, brBefore);
    questSelector.insertBefore(checkbox, brBefore);
    questSelector.insertBefore(deleteAnswer, brBefore);
    questSelector.insertBefore(br, brBefore)
}
function addQuest ()
{
   try {

   document.querySelector('.disabled').classList.remove('disabled');
   } catch (e) {

   }

    var questions = document.querySelector('.questions'); //Записываем блок с вопросами в questions
    /* Создаем новый блок div с вопросом */
    var newQuestion = document.createElement('div');


    let addQuest = document.getElementById('question'+objectQuest.indexQuest);
    objectQuest.indexQuest++; //Увеличиваем индефикатор вопроса на 1
    objectQuest.indexAnswer.push(0);
    newQuestion.id = "question" +objectQuest.indexQuest;
    newQuestion.className = 'question';
    newQuestion.innerHTML = '<textarea class="form-control" name="question' + objectQuest.indexQuest + '" placeholder="Вопрос"></textarea>' +
        '<input class="score form-control" name="score' + objectQuest.indexQuest + '" type="number" placeholder="Баллы">'+


        '<br>'+
        '<input name="' + objectQuest.indexQuest + 'answer0[]' + '" value="Ответ">' +
        '<input type="checkbox" name="' + objectQuest.indexQuest +'answer0[]" value="true">'+
        '<button class="deleteAnswer btn btn-danger btn-sm">X</button>'+
        '<br>' +
        '<button id="'+objectQuest.indexQuest+'" class = "addAnswer btn btn-primary">Добавить вариант ответа</button>' +
        '<br>' +
        '<button class="addQuest btn btn-primary">Добавить вопрос</button> ';

    let deleteButton = document.createElement('button');
    deleteButton.className = 'deleteQuestion btn btn-danger';
    deleteButton.textContent = 'Удалить вопрос';
    newQuestion.appendChild(deleteButton);
         questions.appendChild(newQuestion);


return addQuest;
}

//отслеживаем клик
document.onclick = function (event) {
    var target = event.target; //записываем клик в переменную target

    if (target.classList.contains('addQuest')) { //target== addQuest
        event.preventDefault();
        /*  Можно перенести в функцию */
       let a = addQuest();
       if (objectQuest.indexQuest==1)
       {
       changeButton(a);
           }
    }
   if (target.classList.contains('addAnswer')) {
       event.preventDefault();
       addAnswer(target);


   }
    if (target.classList.contains('deleteAnswer'))
    {
        event.preventDefault();
        deleteAnswer(target);
    }
    if (target.classList.contains('deleteQuestion'))
    {
        event.preventDefault();
        deleteQuestion(target);
    }

}

var drugandDrops = document.querySelector('.questions');

drugandDrops.onmousedown = function (e) {
    if (e.which != 1) { // если клик правой кнопкой мыши
        return; // то он не запускает перенос
    }
    if (e.target.className=='question') {

        let elementDrug = e.target;
        elementDrug.addEventListener('dragstart', function (e) {
console.log('!');
        })
    }



}



