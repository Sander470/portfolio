function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}



function changeNav(element) {
    if(document.getElementById("projects".isVisible(element))) {
        invertNav();
    }
}

function invertNav() {
    let root = document.documentElement;
    
    root.style.setProperty("--pNav", "#CCEBE9");
    root.style.setProperty("--sNav", "#0A3D47");
}

const projects = document.getElementById("projects");
console.log(isInViewport(projects));

document.addEventListener("scroll", isVisible())