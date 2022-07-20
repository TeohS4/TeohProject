const scrollBtn = document.querySelector(".btnScrollUp");

scrollBtn.addEventListener("click", () => {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
});
