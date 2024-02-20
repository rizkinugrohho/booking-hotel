let carousel_s_form = document.getElementById('carousel-s-form');
let carousel_picture_inp = document.getElementById('carousel_picture_inp');

function addImage(){
    let data = new FormData();
    data.append('picture',carousel_picture_inp.files[0]);
    data.append('addImage', '');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/carousel_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function(){
        var myModal = document.getElementById('carousel-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();
        if(xhr.status >= 200 && xhr.status < 300){
            if(this.responseText == 'inv_img'){
                alert('error', 'Only JPG, PNG, JPEG and WEBP Formats are allowed!');
            }else if(this.responseText == 'inv_size'){
                alert('error', 'Image Should be less than 2 MB!');
            }else if(this.responseText == 'uploadFailed'){
                alert('error', 'Image Upload Failed, Server Down!');
            }else{
                alert('success', 'New Image Added Successfully!');
                carousel_picture_inp.value = "";
                getCarousel();
            }
        }else{
            console.error('Request failed with status:', xhr.status);
        }
    };
    xhr.onerror = function(){
        console.error('Network error occurred');
    };
    xhr.send(data);
}

carousel_s_form.addEventListener("submit", function(event){
    event.preventDefault();
    addImage();
})

function getCarousel(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/carousel_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        document.getElementById('carousel-data').innerHTML = this.responseText;
    }
    xhr.send('getCarousel');
}

function deleteImage(val){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/carousel_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        if(xhr.status >= 200 && xhr.status < 300){
            if(this.responseText == 1){
                alert('success', 'Image Deleted Successfully!');
                getCarousel();
            }else{
                alert('error', 'Cannot Delete Image!');
            }
        }else{
            console.error('Request failed with status:', xhr.status);
        }
    };
    xhr.onerror = function(){
        console.error('Network error occurred');
    };
    xhr.send('deleteImage='+val);
}

window.onload = function(){
    getCarousel();
}