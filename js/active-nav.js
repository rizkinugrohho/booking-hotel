function setActive(){
    let navbar = document.getElementById('nav-bar');
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