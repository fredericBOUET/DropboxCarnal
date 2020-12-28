// prevent auto sign in (debug ?)
window.onbeforeunload = function(e) {
    document.cookie = 'cookiename=; expires=' + d.toGMTString() + ';';
};

// if user sign in with a google address
function onSignIn(googleUser) {

    var auth2 = gapi.auth2.getAuthInstance();
    auth2.disconnect();

    // useful data for your client-side scripts:
     let profile = googleUser.getBasicProfile();
    console.log("ID: " + profile.getId());
    console.log('Full Name: ' + profile.getName());
    console.log('Given Name: ' + profile.getGivenName());
    console.log('Family Name: ' + profile.getFamilyName());
    console.log("Image URL: " + profile.getImageUrl());
    console.log("Email: " + profile.getEmail());
    let email = profile.getEmail();

    // if email matches RegEx (if its a valid email)
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(re.test(email)){
        // if email matches RegEx2 (if its a carnal mail)
        const re2=/^[^@\s]+@carnalmedia.com$/;
        if(re2.test(email)){
            document.getElementById("msgError").innerHTML = '';

            //  ID token to pass to the backend:
            let id_token = googleUser.getAuthResponse().id_token;
            console.log("ID Token: " + id_token);

            //ajax request to send data to the backend (to create user ?) so that we keep a trace of imports in database)
            $.ajax({
                    type: "POST",
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "user/login/"+id_token ,
                    data: {// all profile data
                    _token : $('meta[name="csrf-token"]').attr('content'),
                    _token_google_client : id_token ,
                    _id_google : profile.getId(),
                    _full_name : profile.getName() ,
                    _given_name : profile.getGivenName() ,
                    _family_name : profile.getFamilyName() ,
                    _image_url : profile.getImageUrl() ,
                    _email : profile.getEmail(),
                    },
                    dataType: "text",
                    //if succes then redirect to the dashboard with a session mail stored
                    success:function(data) {
                        console.log(data);
                        window.location="/dashboard"
                    }
                });
        }else{
            //if email isnt a carnal mail
            document.getElementById("msgError").innerHTML = "Invalid email address, carnalmedia.com needed";
        }
    }else{
        //if email isnt a valid email
        document.getElementById("msgError").innerHTML = "Please enter a valid email address.";
    }


  }
