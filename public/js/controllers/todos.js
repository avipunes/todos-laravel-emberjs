/* global App, Ember */

App.TodosController = Ember.ArrayController.extend({
    orderAsc: true,
    isNewTodo: false,

    actions: {
        createTodo: function () {
            var todoText, todo;

            todoText = this.get('todoText').trim();

            if (!todoText) {
                return;
            }

            todo = this.store.createRecord('todo', {
                text: todoText,
                is_completed: false
            });

            todo.save();

            this.set('isNewTodo',false);
            this.set('todoText', '');
        },

        newTodo: function() {
            this.set('isNewTodo', true);
        },
    },

    remaining: Ember.computed.filterBy('content', 'is_completed', false),
    completed: Ember.computed.filterBy('content', 'is_completed', true),
    todos: Ember.computed.mapBy('content', 'is_completed'),

});