
  var start = function() {
    screen.orientation.lock('landscape-primary').then(
      startInternal,
      function() {
        alert('To start, rotate your screen to landscape.');

        var orientationChangeHandler = function() {
          if (!screen.orientation.type.startsWith('landscape')) {
            return;
          }
          screen.orientation.removeEventListener('change', orientationChangeHandler);
          startInternal();
        }

        screen.orientation.addEventListener('change', orientationChangeHandler);
      });
  }
  window.onload = start;
