let feature_s_form = document.getElementById('feature-s-form');
let facility_s_form = document.getElementById('facility-s-form');

feature_s_form.addEventListener("submit", function(event){
    event.preventDefault();
    add_feature();
})

function add_feature(){
    let data = new FormData();
    data.append('name', feature_s_form.elements['feature_name'].value);
    data.append('add_feature', '');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/features.php", true);

    xhr.onload = function(){
        var myModal = document.getElementById('feature-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();
        if(xhr.status >= 200 && xhr.status < 300){
            if(this.responseText == 1){
                alert('success', 'New Feature Added Successfully!');
                feature_s_form.elements['feature_name'].value = "";
                getFeatures();
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

function getFeatures(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/features.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        document.getElementById('features-data').innerHTML = this.responseText;
    }
    xhr.send('getFeatures');
}

function deleteFeature(val){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/features.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        if(xhr.status >= 200 && xhr.status < 300){
            if(this.responseText == 1){
                alert('success', 'Feature Deleted Successfully!');
                getFeatures();
            }else if(this.responseText == 'room_added'){
                alert('error', 'Feature is in Use!');
            }else{
                alert('error', 'Cannot Delete Feature!');
            }
        }else{
            console.error('Request failed with status:', xhr.status);
        }
    };
    xhr.onerror = function(){
        console.error('Network error occurred');
    };
    xhr.send('deleteFeature='+val);
}

facility_s_form.addEventListener("submit", function(event){
    event.preventDefault();
    addFacility();
})

function addFacility(){
    let data = new FormData();
    data.append('name', facility_s_form.elements['facility_name'].value);
    data.append('icon', facility_s_form.elements['facility_icon'].files[0]);
    data.append('desc', facility_s_form.elements['facility_desc'].value);
    data.append('addFacility', '');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/features.php", true);

    xhr.onload = function(){
        var myModal = document.getElementById('facility-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();
        if(xhr.status >= 200 && xhr.status < 300){
            if(this.responseText == 'inv_img'){
                alert('error', 'Only SVG Formats are allowed!');
            }else if(this.responseText == 'inv_size'){
                alert('error', 'Image Should be less than 1 MB!');
            }else if(this.responseText == 'uploadFailed'){
                alert('error', 'Image Upload Failed, Server Down!');
            }else{
                alert('success', 'New Facility Added Successfully!');
                facility_s_form.reset();
                getFacilities();
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

function getFacilities(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/features.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        document.getElementById('facilities-data').innerHTML = this.responseText;
    }
    xhr.send('getFacilities');
}

function deleteFacility(val){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/features.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        if(xhr.status >= 200 && xhr.status < 300){
            if(this.responseText == 1){
                alert('success', 'Facility Deleted Successfully!');
                getFacilities();
            }else if(this.responseText == 'room_added'){
                alert('error', 'Facility is in Use!');
            }else{
                alert('error', 'Cannot Delete Facility!');
            }
        }else{
            console.error('Request failed with status:', xhr.status);
        }
    };
    xhr.onerror = function(){
        console.error('Network error occurred');
    };
    xhr.send('deleteFacility='+val);
}

window.onload = function(){
    getFeatures();
    getFacilities();
}