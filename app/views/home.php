<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Laravel 4 + EmberJS Todo App</title>
    <meta name="description" content="A sample todo application built with Laravel 4 and EmberJS">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

    <script type="text/x-handlebars">
        <div class="container">
            <div class="row">
                <div class="span6 offset3">
                    <header class="app-header">
                        <h1 class="app-title">Avi Punes Todos</h1>
                        <h2 class="app-title">Laravel & EmberJS</h2>
                    </header>
                    {{outlet}}
                </div>
                <div class="span6 offset3">
                    <div class="info">
                        <p>לחיצה כפולה על משימה לעריכה</p>
                    </div>
                </div>
            </div>
        </div>
    </script>

    <script type="text/x-handlebars" id="todos">
        <div class="main">
            <table>
                <tr>
                    <th>
                        <div class="title">משימות</div>
                        <div class="btnWarp">
                            <div class="myBtn" {{ action "newTodo" }} >+</div>
                        </div>
                        <div {{bind-attr class=":dn isNewTodo:db"}}>
                            <form {{action "createTodo" on="submit"}}>  
                                {{input id="new-todo" class="input-todo input-block-level" placeholder="משימה חדשה" value=todoText}}
                            </form>
                        </div>
                    </th>
                </tr>
                {{#each controller itemController="todo"}}
                <tr>
                    <td {{bind-attr class=":not isCompleted:completed"}}>
                    {{#if isEditing}}
                        {{edit-todo class="input-block-level" value=bufferedText insert-newline="doneEditing" focus-out="cancelEditing" escape-press="cancelEditing"}}
                    {{else}}
                    <label class="isCompleted">
                        {{input id=text type="checkbox" class="todo-checkbox" checked=isCompleted}}
                    </label>
                    <!-- <div class="isCompleted"></div> -->
                    <div class="content" {{action "editTodo" on="doubleClick"}}>{{text}}</div>
                    <div class="cancleMission" {{action "deleteTodo"}} >X</div>
                    {{/if}}
                    </td>
                </tr>
                {{/each}}
                <tr class="tFooter">
                    <td>
                        <div class="toComplete">לסיום : <strong>{{ remaining.length }}</strong></div>
                        <div class="didCompleted">הושלמו : <strong>{{ completed.length }}</strong></div>
                        <div class="total">סה"כ : <strong>{{ todos.length }}</strong></div>
                    </td>
                </tr>
            </table>
        </div>
    </script>

    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/1.3.0/handlebars.min.js"></script>
    <script src="//builds.emberjs.com/tags/v1.3.1/ember.min.js"></script>
    <script src="//builds.emberjs.com/tags/v1.0.0-beta.6/ember-data.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/router.js"></script>
    <script src="/js/models/todo.js"></script>
    <script src="/js/controllers/todo.js"></script>
    <script src="/js/controllers/todos.js"></script>
    <script src="/js/views/edit_todo.js"></script>
    <script src="/js/views/todos_view.js"></script>
    <script src="/js/helpers/pluralize.js"></script>
</body>
</html>
