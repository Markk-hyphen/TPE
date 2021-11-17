document.addEventListener('DOMContentLoaded', (e) => {
    'use strict';
    let url = 'http://localhost/TPE_backend/TPE/api/comentarios';
    let commentBtn = document.getElementById('comment-btn');

    commentBtn.addEventListener('click', (e) => {
        e.preventDefault();
        let comment_json = createJsonComment();
        insert_comment(comment_json);
    });
    //Agrego un evento a cada boton para eliminarlo
    let deleteBtns = document.querySelectorAll('.delete');
    add_delete_listener(deleteBtns);

    //Filtro de comentarios por puntaje
    let filterBtn = document.querySelector('#formPuntaje button');
    //La arrow function no me sirve ya que mantiene el contexto del this
    filterBtn.addEventListener('click', function(e) {
        let id = this.dataset.subject;
        let puntaje = check_puntaje(this.previousElementSibling.value);
        let url_filter = "";
        if (puntaje)
            url_filter = url + "/" + id + "/" + puntaje;
        else
            url_filter = url + "/" + "materia" + "/" + id;
        console.log(url_filter);
        insert_commentaries(url_filter, puntaje);
    });

    function check_puntaje(puntaje) {
        if (puntaje > 0 && puntaje <= 5)
            return puntaje; 
        return 0;
    }
    async function insert_commentaries(url, puntaje) {
        let comments;
        try {
            let response = await fetch(url);
            comments = await response.json();
            
        } catch (error) {
            comments = [];
        }
        let commentBox = document.getElementById('comment-box');
        if (comments.length == 0){
            commentBox.innerHTML = `<p>No hay comentarios con puntaje ${puntaje}</p>`;
            return;
        }
        commentBox.innerHTML = "";
        comments.forEach(comment => {
            set_comment(comment, comment.id);
        });
    }
    
    function delete_element(element) {
        if (element)
            element.parentNode.removeChild(element);
    }

    function add_delete_listener(buttons){
        buttons.forEach(button => button.addEventListener('click',  () => {
            let id = button.getAttribute('data-id');
            delete_comment(id);
            button.parentElement.remove();
        }))
    }
    
    function render_comment(comment){
        //La unica forma que encontre de que no me devuelva una id undefined fue resolviendo todo adentro de la misma promesa
        try {
            fetch(url)
            .then(response => response.json())
            .then(comments => {
                let fin = comments.length;
                let id = comments[fin-1].id;
                set_comment(comment, id);
            });
        } catch (error) {
            console.log(error);
        }
    
    }

    //Imito el div que tengo en el template detalle.tpl
    function set_comment(comment, id) {
        let comment_box = document.getElementById('comment-box');
        let comment_div = document.createElement('div');
        if (is_admin()){ 
            var btn = document.createElement('button');
            btn.dataset.id = id;
            btn.classList.add("delete", "btn", "btn-danger");
            btn.type = "button";
            let btns = [btn];
            btn.innerHTML = "Borrar";
            add_delete_listener(btns);
        }
        comment_div.innerHTML = 
        `
        <div id="comment-wrapper">
            <hr>
            <div class="d-flex">
                <p class="text-break">${comment.detalle}</p>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
                <p class="comment-user">${comment.fk_nombre_usuario}</p>
            </div>
                <p>Puntaje: ${comment.puntaje}</p>
        </div>
        `;
        if (is_admin())
            comment_div.appendChild(btn);

        comment_div.appendChild(document.createElement('hr'));
        comment_box.appendChild(comment_div);
    }

    function is_admin(){
        let user_role = document.getElementById('comment-box').dataset.role;
        return user_role == 'admin';
    }

    //Parseo el formulario y lo convierto en un objeto json
    function createJsonComment() {
        let comment = document.getElementById('comment').value;
        let puntaje = document.getElementById('puntaje').value;
        let formCommentInfo = document.querySelectorAll('#comment-info form input');
        let json = {};
        json.detalle = comment;
        json.fk_id_materia = formCommentInfo[2].value;
        json.fk_email_usuario = formCommentInfo[1].value;
        json.puntaje = puntaje;
        json.fk_nombre_usuario = formCommentInfo[0].value;
        return json;
     }

     async function insert_comment(json) {
        try {
            let prom = await fetch(url,
             {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body : JSON.stringify(json)
            });
        } catch (error) {
            console.log(error);
        }

        render_comment(json);
        delete_element(document.getElementById('no-comments'));
    }

    async function delete_comment(id) {
        try {
            let prom = await fetch(url + '/' + id,
             {
                method: 'DELETE',
                headers: {'Content-Type': 'application/json'},
            });
        } catch (error) {
            console.log(error);
        }
    }
});