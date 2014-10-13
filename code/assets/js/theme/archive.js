(function () {
    Array.prototype.forEach.call(document.querySelectorAll(".archive-filters input, .archive-filters select"), function (element) {
       element.addEventListener("change", function(e) {
           document.querySelector(".archive-filters form").submit();
       });
    });
})();