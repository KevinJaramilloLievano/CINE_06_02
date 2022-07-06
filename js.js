const $MENU = document.querySelector("#menu");
const $CLOSE = document.querySelector("#close");
const $MULTI = document.querySelector("#multi");
const $LINKS = document.querySelectorAll(".list li a");
const $CONTENT_ICONS = document.querySelector("#content_icons");


$LINKS.forEach((Element) => {
    Element.addEventListener("click", () => {
        toggle_buttons();
    });
});


$CONTENT_ICONS.addEventListener("click", () => {
    toggle_buttons();
    closeOrOpen("icon_multi btn", "icon_none");
});


function toggle_buttons() {
    $MENU.classList.toggle("menu_show");
}



function closeOrOpen(nameClassBtn, nameClassNone) {
    
    const aux = $MULTI.classList.value;
    
    if (aux === nameClassBtn) {
        $MULTI.classList.add(nameClassNone);
        $CLOSE.classList.remove(nameClassNone);
        
    } else {
        $MULTI.classList.remove(nameClassNone);
        $CLOSE.classList.add(nameClassNone);
    }
}
