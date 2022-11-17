var googleUser = {};
var startApp = function() {
    gapi.load('auth2', function(){
        // Retrieve the singleton for the GoogleAuth library and set up the client.
        auth2 = gapi.auth2.init({
            client_id: '98047661248-174pe87fsvj9sddp4hfq95o9jqb2or81.apps.googleusercontent.com',
            cookiepolicy: 'single_host_origin',
            // Request scopes in addition to 'profile' and 'email'
            //scope: 'additional_scope'
        });
        attachSignin(document.getElementById('customBtn'));
    });
};

function attachSignin(element) {
    console.log(element.id);
    auth2.attachClickHandler(element, {},
        function(googleUser) {
            /*document.getElementById('name').innerText = "Signed in: " +
                googleUser.getBasicProfile();

                window.location=`script/googleSignConfig.php?token=${token}`
                */


            let token = googleUser.getAuthResponse().id_token;

            let xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function() {

                    console.log(this.responseText);

            };

            xhr.open('POST', 'script/googleSignConfig.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {

                /*console.log('Signed in as: ' + xhr.responseText);*/
                /*window.location=`categorias.php`*/
                mostrarLoading();
                window.location.reload();
                /*console.log(xhr.responseText)*/
            };
            xhr.send('token=' + token);

        }, function(error) {
            /*MANEJAR EL ERROR*/
            /*alert(JSON.stringify(error, undefined, 2));*/
            alert('error, contacte con el administrador');
        });
}
