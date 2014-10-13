(function () {
    document.querySelector(".date-reset").addEventListener("click", function(e) {
        document.querySelector("#start_month").value = "";
        document.querySelector("#start_year").value = "";
        document.querySelector("#end_month").value = "";
        document.querySelector("#end_year").value = "";
    });
    
    Array.prototype.forEach.call(document.querySelectorAll(".archive-filters input"), function (element) {
       element.addEventListener("change", function(e) {
           document.querySelector(".archive-filters form").submit();
       });
    });
})();