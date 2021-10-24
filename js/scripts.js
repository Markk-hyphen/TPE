document.addEventListener('DOMContentLoaded', (e) => {
    'use strict';
    let url = 'http://localhost/TPE_backend/TPE/api/comentarios';

    let commentBtn = document.getElementById('comment-btn');
    commentBtn.addEventListener('click', (e) => {
        e.preventDefault();
        let comment_json = createJsonComment();
        insert_comment(comment_json);
        load_comments();
    });
    
    let deleteBtns = document.querySelectorAll('.delete');
    add_delete_listener(deleteBtns);

    async function load_comments() {
        let comment_box = document.getElementById('comment-box');
        try {
            let prom = await fetch(url);
        } catch (error) {
            
        }
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
    
    function delete_element(element) {
        element.parentNode.removeChild(element);
    }

    function add_delete_listener(buttons){
        buttons.forEach(button => button.addEventListener('click',  () => {
            let id = button.getAttribute('data-id');
            delete_comment(id);
            button.parentElement.remove();
        }))
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

    function set_comment(comment, id) {
        //Imito el div que tengo en el template detalle.tpl
        let comment_box = document.getElementById('comment-box');
        let comment_div = document.createElement('div');
        let btn = document.createElement('button');
        btn.dataset.id = id;
        btn.classList.add("delete", "btn", "btn-danger");
        btn.type = "button";
        let btns = [btn];
        btn.innerHTML = "Borrar";
        add_delete_listener(btns);
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
        comment_div.appendChild(btn);
        comment_div.appendChild(document.createElement('hr'));
        comment_box.appendChild(comment_div);
    }

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
});