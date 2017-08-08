$(function() {
  function getCookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length == 2) return parts.pop().split(";").shift();
  }

  var userHash = getCookie('qsu');
  if (userHash) {
    var defaultAvatarUrl = 'http://du7tfk0dj7me8.cloudfront.net/default.png',
      avatarUrl = 'https://www.gravatar.com/avatar/' + encodeURIComponent(userHash)
        + '?d=' + encodeURIComponent(defaultAvatarUrl);

    $('nav').addClass('logged-in').append(
      $('<a href="https://get.quicksprout.com/" class="avatar" />').append(
        $('<img />').attr('src', avatarUrl)));
  }
});
