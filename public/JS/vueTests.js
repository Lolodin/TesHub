var data ={
    name: 'tests',
    indexTest: 0,
    childQuest:
        [{
        indexQuest: 0,
        name: '_Quest_',
        childAnswer:
        [{
            indexAnswer:0,
            name: '_answer_'

        }]
        }]


}
Vue.component('test-todo',{
    template: '#test-template',
    props:{
        model: Object
    },
    data: function () {
        return {
            open: false
        }
    },
    computed:
       {
           isFolderQuest: function () { //возвращаем массив
        return this.model.childQuest &&
            this.model.childQuest.length
    },
           isFolderAnswer: function () {
               return this.model.childQuest.childAnswer &&
                   this.model.childQuest.childAnswer.length
           }},

     methods:
         {
            toggle: function () {
                this.open = !this.open
            },
             cHangleTypeQuest: function () {
                 if(!this.isFolderQuest)
                     Vue.set(this.model, 'childQuest',[] )
                     this.addQuest()
                     this.open= true

             },
             cHangleTypeAnswer: function () {
                 if(!this.isFolderAnswer())
                     Vue.set(this.model, 'childAnswer',[] )
                 this.addAnswer()
                 this.open= true
             },
             addQuest: function () {
                 this.model.childQuest.push({
                     name: 'testQuest'
                 })
             },
             addAnswer: function () {
                 this.model.childQuest.childAnswer.push({
                     name: 'AnswerTest'
                 })
             },
             testsFunction: function () {
                 alert('Сработало')
             }



         }




})
var tests = new Vue({
    el: "#demo",
    data: {thRee: data,}
})