<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="google-signin-client_id" content="535148229856-m10rniu317a6q34uu6lebr91kfj1pcr7.apps.googleusercontent.com">
    <title>Document</title>
</head>
<body>
    <div class="g-signin2" data-onsuccess="onSignIn"></div>  <br>
<a href="index.php" onclick="signOut();">Sign out</a>

</body>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script>
    function onSignIn(googleUser) {
      alert("sure")

  var profile = googleUser.getBasicProfile();
 alert('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  alert('Name: ' + profile.getName());
  alert('Image URL: ' + profile.getImageUrl());
  alert('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
}

//signout
 
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
    });
  }
 
</script>
</html>