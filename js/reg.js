function initApp() {
    var txtEmail = document.getElementById('inputEmail');
    var txtPassword = document.getElementById('inputPassword');
    var txtUser = document.getElementById('inputUsername');
    var btnSignUp = document.getElementById('signup_button');
    var provider = new firebase.auth.GoogleAuthProvider();

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
            //menu.innerHTML = "<img src='../img/guset.png' alt='User Profile' class='rounded-circle' style='width:40px;'>" + 'Guest';
            //dropdown.innerHTML = "<a class='dropdown-item' href='signin.html'>sign in</a>";
            //postbutton.innerHTML = "";
        }
    });

    btnSignUp.addEventListener('click', function () {        
        /// TODO 4: Add signup button event
        ///         1. Get user input email and password to signup
        ///         2. Show success message by "create_alert" and clean input field
        ///         3. Show error message by "create_alert" and clean input field

        var email = txtEmail.value;
        var password = txtPassword.value;
        var username = txtUser.value;
        var database = firebase.database().ref("/Users/"+username);

        firebase.auth().createUserWithEmailAndPassword(email,password).then(function(){
            create_alert("success","Sign in success!");
            txtEmail.value = "";
            txtPassword.value = "";
            window.location.href = "signin.html";
            database.set(
                {
                    email : email,
                    username : username
                }
            )
        }).catch(function(error) {
            // Handle Errors here.
            varerrorCode= error.code;
            varerrorMessage= error.message;
            create_alert("error",error.message);
            txtEmail.value = "";
            txtPassword.value = "";
            });
    });

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