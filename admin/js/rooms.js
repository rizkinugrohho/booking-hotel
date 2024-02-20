let add_room_form = document.getElementById('add-room-form');

add_room_form.addEventListener("submit", function(event){
    event.preventDefault();
    addRooms();
});

function addRooms(){
    let data = new FormData();
    data.append('addRoom', '');
    data.append('name', add_room_form.elements['name'].value);
    data.append('area', add_room_form.elements['area'].value);
    data.append('price', add_room_form.elements['price'].value);
    data.append('quantity', add_room_form.elements['quantity'].value);
    data.append('adult', add_room_form.elements['adult'].value);
    data.append('children', add_room_form.elements['children'].value);
    data.append('desc', add_room_form.elements['desc'].value);

    let features = [];
    add_room_form.elements['features'].forEach(element => {
        if(element.checked){
            features.push(element.value);
        }
    });

    let facilities = [];
    add_room_form.elements['facilities'].forEach(element => {
        if(element.checked){
            facilities.push(element.value);
        }
    });

    data.append('features', JSON.stringify(features));
    data.append('facilities', JSON.stringify(facilities));

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/rooms.php", true);

    xhr.onload = function(){
        var myModal = document.getElementById('add-room');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();
        if(xhr.status >= 200 && xhr.status < 300){
            if(this.responseText == 1){
                alert('success', 'New Room Added Successfully!');
                add_room_form.reset();
                getAllRooms();
            }else{
                alert('error', `Server didn't respond!`);
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

function getAllRooms(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/rooms.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function(){
        if(xhr.status >= 200 && xhr.status < 300){
            document.getElementById('room-data').innerHTML = this.responseText;
        }else{
            console.error('Request failed with status:', xhr.status);
        }
    };
    xhr.onerror = function(){
        console.error('Network error occurred');
    };
    xhr.send('getAllRooms');
}

let edit_room_form = document.getElementById('edit-room-form');

function editDetails(id){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/rooms.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        if(xhr.status >= 200 && xhr.status < 300){
            let data = JSON.parse(this.responseText);
            edit_room_form.elements['name'].value = data.roomdata.name;
            edit_room_form.elements['area'].value = data.roomdata.area;
            edit_room_form.elements['price'].value = data.roomdata.price;
            edit_room_form.elements['quantity'].value = data.roomdata.quantity;
            edit_room_form.elements['adult'].value = data.roomdata.adult;
            edit_room_form.elements['children'].value = data.roomdata.children;
            edit_room_form.elements['desc'].value = data.roomdata.description;
            edit_room_form.elements['room_id'].value = data.roomdata.id;
            
            edit_room_form.elements['facilities'].forEach(element => {
                if(data.facilities.includes(Number(element.value))){
                    element.checked = true;
                }
            });
            edit_room_form.elements['features'].forEach(element => {
                if(data.features.includes(Number(element.value))){
                    element.checked = true;
                }
            });
        }else{
            console.error('Request failed with status:', xhr.status);
        }
    };
    xhr.onerror = function(){
        console.error('Network error occurred');
    };
    xhr.send('getRoom='+id);
}

edit_room_form.addEventListener("submit", function(event){
    event.preventDefault();
    submitEditRoom();
});

function submitEditRoom(){
    let data = new FormData();
    data.append('editRoom', '');
    data.append('room_id', edit_room_form.elements['room_id'].value);
    data.append('name', edit_room_form.elements['name'].value);
    data.append('area', edit_room_form.elements['area'].value);
    data.append('price', edit_room_form.elements['price'].value);
    data.append('quantity', edit_room_form.elements['quantity'].value);
    data.append('adult', edit_room_form.elements['adult'].value);
    data.append('children', edit_room_form.elements['children'].value);
    data.append('desc', edit_room_form.elements['desc'].value);

    let features = [];
    edit_room_form.elements['features'].forEach(element => {
        if(element.checked){
            features.push(element.value);
        }
    });

    let facilities = [];
    edit_room_form.elements['facilities'].forEach(element => {
        if(element.checked){
            facilities.push(element.value);
        }
    });

    data.append('features', JSON.stringify(features));
    data.append('facilities', JSON.stringify(facilities));

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/rooms.php", true);

    xhr.onload = function(){
        var myModal = document.getElementById('edit-room');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();
        if(xhr.status >= 200 && xhr.status < 300){
            if(this.responseText == 1){
                alert('success', 'Room Data Updated Successfully!');
                edit_room_form.reset();
                getAllRooms();
            }else{
                alert('error', `Server didn't respond!`);
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

function toggleStatus(id, value){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/rooms.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function(){
        if(xhr.status >= 200 && xhr.status < 300){
            if(this.responseText == 1){
                alert('success', 'Status Toggled!');
                getAllRooms();
            }else{
                alert('error', 'Server did not Responded!');
            }
        }else{
            console.error('Request failed with status:', xhr.status);
        }
    };
    xhr.onerror = function(){
        console.error('Network error occurred');
    };
    xhr.send('toggleStatus='+id+'&value='+value);
}

let add_image_form = document.getElementById('add_image_form');
add_image_form.addEventListener("submit", function(event){
    event.preventDefault();
    addImage();
});

function addImage(){
    let data = new FormData();
    data.append('image', add_image_form.elements['image'].files[0]);
    data.append('room_id', add_image_form.elements['room_id'].value);
    data.append('addImage', '');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/rooms.php", true);

    xhr.onload = function(){
        if(xhr.status >= 200 && xhr.status < 300){
            if(this.responseText == 'inv_img'){
                alert('error', 'Only JPG, PNG, JPEG and WEBP Formats are allowed!', 'image-alert');
            }else if(this.responseText == 'inv_size'){
                alert('error', 'Image Should be less than 2 MB!', 'image-alert');
            }else if(this.responseText == 'uploadFailed'){
                alert('error', 'Image Upload Failed, Server Down!', 'image-alert');
            }else{
                alert('success','New Image Added Successfully!','image-alert');
                roomImages(add_image_form.elements['room_id'].value, document.querySelector('#room-images .modal-title').innerText);
                add_image_form.reset();
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

function roomImages(id, name){
    document.querySelector('#room-images .modal-title').innerText = name;
    add_image_form.elements['room_id'].value = id;
    add_image_form.elements['image'].value = '';
    
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/rooms.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function(){
        if(xhr.status >= 200 && xhr.status < 300){
            document.getElementById('room-image-data').innerHTML = this.responseText;
        }else{
            console.error('Request failed with status:', xhr.status);
        }
    };
    xhr.onerror = function(){
        console.error('Network error occurred');
    };
    xhr.send('getRoomImages='+id);
}

function removeImage(imageID, roomID){
    let data = new FormData();
    data.append('image_id', imageID);
    data.append('room_id', roomID);
    data.append('removeImage', '');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/rooms.php", true);

    xhr.onload = function(){
        if(xhr.status >= 200 && xhr.status < 300){
            if(this.responseText == 1){
                alert('success', 'Image Removed!', 'image-alert');
                roomImages(roomID, document.querySelector('#room-images .modal-title').innerText);
            }else{
                alert('error', 'Image Removal Failed!', 'image-alert');
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

function thumbImage(imageID, roomID){
    let data = new FormData();
    data.append('image_id', imageID);
    data.append('room_id', roomID);
    data.append('thumbImage', '');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/rooms.php", true);

    xhr.onload = function(){
        if(this.responseText == 1){
            alert('success', 'Image Thumbnail Changed!', 'image-alert');
            roomImages(roomID, document.querySelector('#room-images .modal-title').innerText);
        }else{
            alert('error', 'Image Thumbnail did not Changed!', 'image-alert');
        }
    };
    xhr.onerror = function(){
        console.error('Network error occurred');
    };
    xhr.send(data);
}

function removeRoom(roomID){
    if(confirm("You want to Delete this Room. Are Your Sure?")){
        let data = new FormData();
        data.append('room_id', roomID);
        data.append('removeRoom', '');
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "./ajax/rooms.php", true);
    
        xhr.onload = function(){
            if(this.responseText == 1){
                alert('success', 'Room Removed!');
                getAllRooms();
            }else{
                alert('error', 'Room Removal Failed!');
            }
        };
        xhr.onerror = function(){
            console.error('Network error occurred');
        };
        xhr.send(data);
    }

}


window.onload = function(){
    getAllRooms();
}