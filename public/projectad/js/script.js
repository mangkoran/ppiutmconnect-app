const navlink=document.querySelectorAll('.navbar-dark .navbar-nav .nav-link');
for(i=0; i<navlink.length; i++){
  navlink[i].style.color='rgba(255,255,255,1)';
}
$(document).ready(function () {
    $(document).click(function (event) {
        const click = $(event.target);
        const _open = $(".navbar-collapse").hasClass("show");
        if (_open === true && !click.hasClass("navbar-toggler")) {
            if(!$(".navbar-toggler").hasClass("news-nav-toggle")){
                $(".navbar-toggler").click();
            }
            else{
                
            }
        }
    });
});
$(window).on('resize', function(){
const win = $(this); //this = window
const _open = $(".navbar-collapse").hasClass("show");
if (_open === true && win.width() >= 960) { $(".navbar-toggler").click(); }
});

window.onload = function() {
    let myiFrame = document.getElementById("driveFrame");
    console.log(myiFrame.title);
    let doc = myiFrame.contentDocument;
    doc.body.innerHTML = doc.head.innerHTML + '<style> @media (max-width:990px){iframe.drive-frame document html body div.table.table-striped table.table.table-striped tbody tr td .btn{max-width: 25vw;height: auto;font-size: 2.75vw;}}</style>';
 }

 const sign_in_btn = document.querySelector("#sign-in-btn");
 const sign_up_btn = document.querySelector("#sign-up-btn");
 const container = document.querySelector(".main-container");

 sign_up_btn.addEventListener("click", () => {container.classList.add("sign-up-mode");});
 sign_in_btn.addEventListener("click", () => {container.classList.remove("sign-up-mode");});