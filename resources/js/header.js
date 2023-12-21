export default function Header(){
    if (document.querySelectorAll("header").length < 1) {
        return;
    }

    const header = document.querySelector(".header");
    const topbar = document.querySelector(".topbar");
    const toggleClass = "is-sticky";

    function handleStickyHeaderOnScroll() {
        const currentScroll = window.pageYOffset;
        const windowWidth = window.innerWidth;

        if (currentScroll > 150) {
            header.classList.add(toggleClass);
            topbar.style.display = "none"; 
        } else {
            header.classList.remove(toggleClass);
            if(windowWidth > 768) {
                topbar.style.display = "block"; 
            } else {
                topbar.style.display = "none"; 
            }
        }
    }

    window.addEventListener("scroll", handleStickyHeaderOnScroll);
    window.addEventListener("resize", handleStickyHeaderOnScroll);

 }