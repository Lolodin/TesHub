var jsonArray = [{"question":"\u0422\u0435\u0441\u0442\u0438\u0440\u0443\u0435\u043c","questionPoint":5,"answers":{"answer0":["\u043d\u0435\u043a\u043a\u043e\u0440\u0435\u043a\u0442\u043d\u044b\u0439()0",false],"answer1":["\u041a\u043e\u0440\u0440\u0435\u043a\u0442(1)",true],"answer2":["\u043e\u0442\u0432\u0435\u0442",false]}}];
var obj =JSON.parse(jsonArray);
obj[0].question;
for (var i = 0; i<obj.length; i++)
{
   var question = obj[i].question;
   var answers;
   obj[i].answers.forEach(function (item, i, arr) {
       alert(i)
   });

}
    