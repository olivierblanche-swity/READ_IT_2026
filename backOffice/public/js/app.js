$(function () {
  $(".delete-form").on("submit", function (e) {
    if (!confirm("Etes-vous sur de vouloir effacer ?")) {
      e.preventDefault();
      return false;
    }
  });
});


