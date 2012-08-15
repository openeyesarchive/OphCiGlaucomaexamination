// Runs on page load
function init()
{
    
}

/**
 * Toggles the specified element from shown (block) to hidden (none),
 * setting the image to opened or closed. Upon opening, the open image is
 * shown; else the closed image is shown.
 * 
 * element_id the element to toggle visible/hidden.
 * image_id the image to modify - typically showing open/closed image.
 * image_open_id the id of the image that shows 'open' position.
 * image_close_id the id of the image that shows 'closed' position.
 */
function toggleDivWithImages(element_id, image_id, image_open_id, image_close_id) {
    var image = document.getElementById(image_id);
    var element = document.getElementById(element_id);
    // if it's not shown, show it and set the image to open-image:
    if (element.style.display == "none")
    {
        image.src=image_open_id;
        element.style.display = "block";
    }
    // else it's open so close it and set the correct (closed) image:
    else
    {
        image.src=image_close_id;
        element.style.display = "none";
    }
    return false;
}
     