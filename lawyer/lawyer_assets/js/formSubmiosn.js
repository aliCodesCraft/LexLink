 //  noReload Function to Prevent Resubmission
  function noReload() {
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  }

  // Call it on load
  document.addEventListener("DOMContentLoaded", () => {
    noReload();
  });