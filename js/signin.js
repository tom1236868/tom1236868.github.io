function initApp() {
    var txtEmail = document.getElementById('inputEmail');
    var txtPassword = document.getElementById('inputPassword');
    var btnLogin = document.getElementById('signin_button');
    var btnGoogle = document.getElementById('google');
    var btnFacebook = document.getElementById('facebook');
    var provider = new firebase.auth.GoogleAuthProvider();
    var provider_FB = new firebase.auth.FacebookAuthProvider();

    var user_email = '';
    var user_name = '';
    var user_pic = '';
    var UserRef = firebase.database().ref('Users');
    firebase.auth().onAuthStateChanged(function (user) {
        var menu = document.getElementById('navmenu');
        var dropdown = document.getElementById('dropdown');
        var postbutton = document.getElementById('btn')
        // Check user login
        if (user) {
            user_email = user.email;
            if(user.photoURL != null) user_pic = user.photoURL;
            else user_pic = "../img/guset.png";
            console.log(user_email);
            console.log(user_pic);
            UserRef.once('value', function(snapshot){
                snapshot.forEach(function(childSnapshot){
                    if(childSnapshot.val().email == user_email)
                    {
                        user_name = childSnapshot.val().username;
                        console.log(user_name);
                        menu.innerHTML = "<img src='" + user_pic + "' alt='User Profile' class='rounded-circle' style='width:40px;'>" + ' ' + user_name;
                    }
                        
                });
            }).catch(e => console.log(e.message));

            dropdown.innerHTML = "<a class='dropdown-item' href='userpage.html'>User Page</a><a class='dropdown-item' href='#' id='logout-btn'>Logout</a>";
            /// TODO 5: Complete logout button event
            ///         1. Add a listener to logout button 
            ///         2. Show alert when logout success or error (use "then & catch" syntex)
            
            var btnLogout = document.getElementById("logout-btn");

            btnLogout.addEventListener('click', function () {
                firebase.auth().signOut().then(function() {
                    // Sign-out successful.
                    alert("Logout Success!");
                  }).catch(function(error) {
                    // An error happened.
                    alert("Logout Failed!");
                  });
            })

        } else {
            // It won't show any post if not login
            menu.innerHTML = "<img src='../img/guset.png' alt='User Profile' class='rounded-circle' style='width:40px;'>" + 'Guest';
            dropdown.innerHTML = "<a class='dropdown-item' href='signin.html'>sign in</a>";
            postbutton.innerHTML = "";
        }
    });

    btnLogin.addEventListener('click', function () {
        var email = txtEmail.value;
        var password = txtPassword.value;

        firebase.auth().signInWithEmailAndPassword(email, password).then(function(){
            window.location.href = "./index.html";
        }).catch(function(error) {
            // Handle Errors here.
            varerrorCode= error.code;
            varerrorMessage= error.message;
            create_alert("error",error.message);
            txtEmail.value = "";
            txtPassword.value = "";
            });
        
    });

    btnGoogle.addEventListener('click', function () {
        /// TODO 3: Add google login button event
        ///         1. Use popup function to login google
        ///         2. Back to index.html when login success
        ///         3. Show error message by "create_alert"

        firebase.auth().signInWithPopup(provider).then(function(result) {
            // This gives you a Google Access Token. You can use it to access the Google API.
            var token = result.credential.accessToken;
            // The signed-in user info.
            var user = result.user;
            window.location.href = "../index.html";
            // ...
            }).catch(function(error) {
            // Handle Errors here.
            var errorCode= error.code;
            var errorMessage= error.message;
            // The email of the user's account used.
            var email = error.email;
            // The firebase.auth.AuthCredentialtype that was used.
            var credential = error.credential;
            create_alert("error",errorMessage);
            });
    });

    btnFacebook.addEventListener('click', function(){
        firebase.auth().signInWithPopup(provider).then(function(result) {
            // This gives you a Facebook Access Token. You can use it to access the Facebook API.
            var token = result.credential.accessToken;
            // The signed-in user info.
            var user = result.user;
            }).catch(function(error) {
            // Handle Errors here.
            var errorCode= error.code;
            var errorMessage= error.message;
            // The email of the user's account used.
            var email = error.email;
            // The firebase.auth.AuthCredentialtype that was used.
            var credential = error.credential;
            create_alert("error",errorMessage);
            });
    })

    function create_alert(type, message) {
        var alertarea = document.getElementById('custom-alert');
        if (type == "success") {
            str_html = "<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>Success! </strong>" + message + "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            alertarea.innerHTML = str_html;
        } else if (type == "error") {
            str_html = "<div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error! </strong>" + message + "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            alertarea.innerHTML = str_html;
        }
    }
}

window.onload = function () {
    initApp();
};