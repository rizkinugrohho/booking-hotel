function alert(type, message, position='body'){
    let bs_class = (type == "success") ? 'alert-success' : 'alert-danger';
    let element = document.createElement('div');
    element.innerHTML = `
        <div class="alert ${bs_class} alert-dismissible fade show" role="alert">
            <strong class="me-3">${message}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>    
        </div>
    `;
    if(position == 'body'){
        document.body.append(element);
        element.classList.add('custom-alert');
    }else{
        document.getElementById(position).appendChild(element);
    }
    setTimeout(removeAlert, 2000);
}

function removeAlert(){
    document.getElementsByClassName("alert")[0].remove();
}

function setActive(){
    let navbar = document.getElementById('dashboard-menu');
    let anchorTag = navbar.getElementsByTagName('a');

    for(let i=0; i<anchorTag.length; i++){
        let file = anchorTag[i].href.split('/').pop();
        let fileName = file.split('.')[0];

        if(document.location.href.indexOf(fileName) >= 0){
            anchorTag[i].classList.add(('active'));
        }
    }
}

setActive();