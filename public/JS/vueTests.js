var question = document.querySelector('.questions');
var newQuestion = document.createElement('div');

var incrementQuestion = 0;
var incrementAnswer = [0];
newQuestion.innerHTML = '<input id="question" name="question'+ incrementQuestion+'" value="Вопрос">' +
    '<br>'+
    '<input id="answer" name="answer'+incrementAnswer[0]+'" value="Ответ">'+
    '<br>'+
    '<button>Добавить вариант ответа</button>'+
    '<br>'+
    '<button id="addQuest">Добавить вопрос</button>';

//Если ласт чилд то кнопка добавить вопрос активна


console.log(addQuest);


var addQuest = document.getElementById('addQuest');
addQuest.addEventListener("click", function () {
    alert('asf')
})

console.log(question)
// var miniatures = document.querySelectorAll('.gallery__picture-preview');
// var bigpictures = document.querySelector('.full-picture');
// var pictureHandler = function (pictures, miniatures ) {
//     miniatures.addEventListener('click', function () {
//         bigpictures.src = pictures;
//     })
// }
// for(var i = 0; i<pictures.length;i++)
// {
//     pictureHandler(pictures[i], miniatures[i]);
// }
