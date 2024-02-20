let general_data, contact_data;
let general_s_form = document.getElementById('general-s-form');
let contact_s_form = document.getElementById('contacts-s-form');
let site_title_inp = document.getElementById('site_title_inp');
let site_about_inp = document.getElementById('site_about_inp');
let team_s_form = document.getElementById('team-s-form');
let member_name_inp = document.getElementById('member_name_inp');
let member_picture_inp = document.getElementById('member_picture_inp');

general_s_form.addEventListener("submit", function(event){
    event.preventDefault();
    updateGeneral(site_title_inp.value, site_about_inp.value);
})

function get_general(){
    let site_title = document.getElementById('site_title');
    let site_about = document.getElementById('site-about');
    let shutdown_toggle = document.getElementById('shutdown-toggle');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/settings_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        if(xhr.status >= 200 && xhr.status < 300){
            general_data = JSON.parse(xhr.responseText);
            site_about.innerText = general_data.site_about;
            site_title.innerText = general_data.site_title;
            site_title_inp.value = general_data.site_title;
            site_about_inp.value = general_data.site_about;

            if(general_data.shutdown == 0){
                shutdown_toggle.checked = false;
                shutdown_toggle.value = 0;
            }else{
                shutdown_toggle.checked = true;
                shutdown_toggle.value = 1;
            }
        }else{
            console.error('Request failed with status:', xhr.status);
        }
    };
    xhr.onerror = function(){
        console.error('Network error occurred');
    };
    xhr.send('get_general');
}

function updateGeneral(site_title_val, site_about_val){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/settings_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        if(xhr.status >= 200 && xhr.status < 300){
            var myModal = document.getElementById('general-s');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();
            
            if(this.responseText == 1){
                alert('success', 'Changes Saved!');
                get_general();
            }else{
                alert('error', 'No Changes Made');
            }
        }else{
            console.error('Request failed with status:', xhr.status);
        }
    };
    xhr.onerror = function(){
        console.error('Network error occurred');
    };
    xhr.send('site_title='+site_title_val+'&site_about='+site_about_val+'&updateGeneral');
}

function updateShutdown(val){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/settings_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        if(xhr.status >= 200 && xhr.status < 300){
            if(this.responseText == 1 && general_data.shutdown == 0){
                alert('success', 'Site has been Shutdown!');
            }else{
                alert('success', 'Shutdown Mode Off!');
            }
            get_general();
        }else{
            console.error('Request failed with status:', xhr.status);
        }
    };
    xhr.onerror = function(){
        console.error('Network error occurred');
    };
    xhr.send('updateShutdown='+val);
}

function get_contact(){
    let contacts_p_id = ['address', 'gmap', 'ph1', 'ph2', 'email', 'fb', 'insta', 'tw'];
    let iframe = document.getElementById('iframe');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/settings_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        if(xhr.status >= 200 && xhr.status < 300){
            contact_data = JSON.parse(xhr.responseText);
            contact_data = Object.values(contact_data);
            for(let i=0; i<contacts_p_id.length; i++){
                document.getElementById(contacts_p_id[i]).innerText = contact_data[i+1];
            }
            iframe.src = contact_data[9];
            contacts_inp(contact_data);
        }else{
            console.error('Request failed with status:', xhr.status);
        }
    };
    xhr.onerror = function(){
        console.error('Network error occurred');
    };
    xhr.send('get_contacts');
}

function contacts_inp(data){
    let contact_inp_id = ['address_inp', 'gmap_inp', 'ph1_inp', 'ph2_inp', 'email_inp', 'fb_inp', 'insta_inp', 'tw_inp', 'iframe_inp'];

    for(let i=0; i<contact_inp_id.length; i++){
        document.getElementById(contact_inp_id[i]).value = data[i+1];
    }
}

function updateContact(){
    let index = ['address', 'gmap', 'ph1', 'ph2', 'email', 'fb', 'insta', 'tw', 'iframe'];
    let contact_inp_id = ['address_inp', 'gmap_inp', 'ph1_inp', 'ph2_inp', 'email_inp', 'fb_inp', 'insta_inp', 'tw_inp', 'iframe_inp']
    let dataStr = "";

    for(let i=0; i<index.length; i++){
        dataStr += index[i] + "=" + document.getElementById(contact_inp_id[i]).value + "&";
    }
    dataStr += "updateContact";

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/settings_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        var myModal = document.getElementById('contact-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();
        if(xhr.status >= 200 && xhr.status < 300){
            if(this.responseText == 1){
                alert('success', 'Changes Saved!');
                get_contact();
            }else{
                alert('error', 'No Changeds Made!');
            }
        }else{
            console.error('Request failed with status:', xhr.status);
        }
    }

    xhr.send(dataStr);
}

contact_s_form.addEventListener("submit", function(event){
    event.preventDefault();
    updateContact();
})

function add_member(){
    let data = new FormData();
    data.append('name',member_name_inp.value);
    data.append('picture',member_picture_inp.files[0]);
    data.append('add_member', '');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/settings_crud.php", true);

    xhr.onload = function(){
        var myModal = document.getElementById('team-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();
        if(xhr.status >= 200 && xhr.status < 300){
            if(this.responseText == 'inv_img'){
                alert('error', 'Only JPEG, PNG, JPG and WEBP Formats are allowed!');
            }else if(this.responseText == 'inv_size'){
                alert('error', 'Image Should be less than 2 MB!');
            }else if(this.responseText == 'uploadFailed'){
                alert('error', 'Image Upload Failed, Server Down!');
            }else{
                alert('success', 'New Member Added Successfully!');
                member_name_inp.value = "";
                member_picture_inp.value = "";
                getMembers();
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

team_s_form.addEventListener("submit", function(event){
    event.preventDefault();
    add_member();
})

function getMembers(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/settings_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        document.getElementById('team-data').innerHTML = this.responseText;
    }
    xhr.send('getMembers');
}

function deleteMember(val){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/settings_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        if(xhr.status >= 200 && xhr.status < 300){
            if(this.responseText == 1){
                alert('success', 'Member Deleted Successfully!');
                getMembers();
            }else{
                alert('error', 'Cannot Delete Member!');
            }
        }else{
            console.error('Request failed with status:', xhr.status);
        }
    };
    xhr.onerror = function(){
        console.error('Network error occurred');
    };
    xhr.send('deleteMember='+val);
}

window.onload = function(){
    get_general();
    get_contact();
    getMembers();
}