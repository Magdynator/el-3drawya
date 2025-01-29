function searchItems() {
    // Get input and list elements
    const input = document.getElementById("searchBox");
    const filter = input.value.toLowerCase();
    const items = document.getElementById("itemList").getElementsByTagName("li");

    // Loop through all list items and filter based on input
    for (let i = 0; i < items.length; i++) {
        const text = items[i].textContent || items[i].innerText;
        if (text.toLowerCase().indexOf(filter) > -1) {
            items[i].style.display = "";
        } else {
            items[i].style.display = "none";
        }
    }
}
