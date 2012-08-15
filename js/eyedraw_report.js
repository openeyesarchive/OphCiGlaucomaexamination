

function addToReport(x, obj)
{
    var text = x.report();

    // Use a RegEx to remove final comma and space
    text = text.replace(/, +$/, '');

    // Get reference to report textarea
    var repText = obj;

    // ***TEMP***
    repText.value = "";

    // If text there already, make it lower case and add a comma before
    if (repText.value.length > 0)
    {
        text = ", " + text.toLowerCase();
    }

    // Add to existing text in text area
    repText.value += text;
}

// Clears edit drawing and resets template
function resetEdit(x, textArea)
{
    x.deleteAllDoodles();
    x.deselectDoodles();          
    x.drawAllDoodles();
            
    // Clear diagnosis menu and text area
    textArea.value = "";
}