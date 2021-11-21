document.addEventListener('DOMContentLoaded', (e) => {
    'use strict';
    initialize_tooltips();
    let url = 'http://localhost/TPE_backend/TPE/api/comentarios';
    let commentBtn = document.getElementById('comment-btn');
    let id_subject = document.getElementById('subject').value;
    let sortBtns = document.querySelectorAll('.filters-wrapper > button');
    let deleteBtns = document.querySelectorAll('.delete');
    let filterBtn = document.querySelector('#formPuntaje button');
    let svgUp = `<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white" class="bi bi-sort-up" viewBox="0 0 16 16">
                    <path d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707V12.5zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
                </svg>`;
    let svgDown = ` <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white" class="bi bi-sort-down" viewBox="0 0 16 16">
                        <path d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293V2.5zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
                    </svg>`;
  
    add_delete_listener(deleteBtns);
    commentBtn.addEventListener('click', (e) => {
        e.preventDefault();
        let comment_json = createJsonComment();
        insert_comment(comment_json);
    });
    //Agrego un evento a cada boton para eliminarlo
    //Filtro de comentarios por puntaje
    //La arrow function no me sirve ya que mantiene el contexto del this
    filterBtn.addEventListener('click', function(e) {
        let id = id_subject;
        let puntaje = check_puntaje(this.previousElementSibling.value);
        let url_filter = "";
        if (puntaje)
            url_filter = url + "/" + id + "/" + puntaje;
        else
            url_filter = url + "/" + "materia" + "/" + id;
        insert_commentaries(url_filter, puntaje);
    });

    sortBtns.forEach(sortBtn => {
        sortBtn.addEventListener('click', function() {
            let url_sort = url + "/" + id_subject + "/";
            let order = sortBtn.dataset.order;
            //Hago un toggle del tipo de ordenamiento.
            if (order == "asc") {
                sortBtn.dataset.order = "desc";
                if (sortBtn.dataset.col == "1")
                    toggle_message(sortBtn, "Mayor a menor", svgUp);
                url_sort += "desc";
            } else {
                sortBtn.dataset.order = "asc";
                if (sortBtn.dataset.col == "1")
                    toggle_message(sortBtn, "Menor a mayor", svgDown);
                url_sort += "asc";
            }
            url_sort += "/" + sortBtn.dataset.col;
            insert_commentaries(url_sort);
        });
    });


    function toggle_message(element, message, svg = null) {
        element.innerHTML = "";
        //Icono svg que representa el ordenamiento
        if(svg){
            element.innerHTML = svg;
            element.innerHTML += "&nbsp";
        }
        element.innerHTML += message;

    }

    function check_puntaje(puntaje) {
        if (puntaje > 0 && puntaje <= 5)
            return puntaje; 
        return 0;
    }
    async function insert_commentaries(url, puntaje = 0) {
        let comments;
        try {
            let response = await fetch(url);
            comments = await response.json();
        } catch (error) {
            comments = [];
        }
        let commentBox = document.getElementById('comment-box');
        if (comments.length == 0){
            if (puntaje)
                commentBox.innerHTML = `<p>No hay comentarios con puntaje ${puntaje}</p>`;
            return;
        }
        commentBox.innerHTML = "";
        comments.forEach(comment => {
            set_comment(comment, comment.id);
        });
    }
    //Funcion generica para borrar cualquier elemento
    function delete_element(element) {
        if (element)
            element.parentNode.removeChild(element);
    }

    function add_delete_listener(buttons){
        //Agrega a cada boton un evento para eliminar el comentario
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

    //Imito el div de comentario que tengo en el template detalle.tpl
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
                <span class="ms-auto">${comment.fecha}</span>
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
        let date = new Date().toISOString().slice(0, 10); 
        let formCommentInfo = document.querySelectorAll('#comment-info form input');
        let json = {};
        json.detalle = comment;
        json.fk_id_materia = id_subject;
        json.fk_nombre_usuario = formCommentInfo[0].value;
        json.fk_email_usuario = formCommentInfo[1].value;
        json.puntaje = puntaje;
        json.fecha = date;
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

    function initialize_tooltips(){
        let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        let tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    }
});