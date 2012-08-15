
// Call each select that needs changing
function changeOptions(_format)
{
    // Go through selects populating them
    updateSelect("ElementVisualAcuity_rva_ua", _format);
    updateSelect("ElementVisualAcuity_rva_cr", _format);
    updateSelect("ElementVisualAcuity_lva_ua", _format);
    updateSelect("ElementVisualAcuity_lva_cr", _format);
	
    // Set focus to first select
    document.getElementById("ElementVisualAcuity_rva_ua").focus();
}

// Change the options in the _select to _format
function updateSelect(_selectId, _format)
{
    //    alert(_selectId + ",  " + _format);
    // Get reference to the select
    var sel = document.getElementById(_selectId);
	
    // Remove all options
    sel.options.length = 0;
    while (sel.options.length > 0) {
        sel.options[0] = null;
    }
    var option = sel.options[sel.options.length] = new Option("Not recorded","Not recorded");
    // Repopulate with correct format
    switch (_format)
    {
        case "0": // "Snellen Metre"
            option = sel.options[sel.options.length] = new Option("6/5","");
            option.value = 95;
            option = sel.options[sel.options.length] = new Option("6/6","");
            option.value = 89;
            option = sel.options[sel.options.length] = new Option("6/9","");
            option.value = 80;
            option = sel.options[sel.options.length] = new Option("6/12","");
            option.value = 74;
            option = sel.options[sel.options.length] = new Option("6/18","");
            option.value = 59;
            option = sel.options[sel.options.length] = new Option("6/24","");
            option.value = 50;
            option = sel.options[sel.options.length] = new Option("6/60","");
            option.value = 24;
            option = sel.options[sel.options.length] = new Option("3/60","");
            option.value = 120;
            option = sel.options[sel.options.length] = new Option("NPL","");
            option.value = 1;
            option = sel.options[sel.options.length] = new Option("PL","");
            option.value = 2;
            option = sel.options[sel.options.length] = new Option("HM","");
            option.value = 3;
            option = sel.options[sel.options.length] = new Option("CF","");
            option.value = 4;
            break;
        case "1": // "Snellen Foot"
            option = sel.options[sel.options.length] = new Option("20/20","");
            option.value = 20;
            option = sel.options[sel.options.length] = new Option("20/25","");
            option.value = 25;
            option = sel.options[sel.options.length] = new Option("20/30","");
            option.value = 30;
            option = sel.options[sel.options.length] = new Option("20/40","");
            option.value = 40;
            option = sel.options[sel.options.length] = new Option("20/50","");
            option.value = 50;
            option = sel.options[sel.options.length] = new Option("20/60","");
            option.value = 60;
            option = sel.options[sel.options.length] = new Option("20/70","");
            option.value = 70;
            option = sel.options[sel.options.length] = new Option("20/80","");
            option.value = 80;
            option = sel.options[sel.options.length] = new Option("20/100","");
            option.value = 100;
            option = sel.options[sel.options.length] = new Option("20/200","");
            option.value = 200;
            option = sel.options[sel.options.length] = new Option("20/400","");
            option.value = 400;
            option = sel.options[sel.options.length] = new Option("NPL","");
            option.value = 1;
            option = sel.options[sel.options.length] = new Option("PL","");
            option.value = 2;
            option = sel.options[sel.options.length] = new Option("HM","");
            option.value = 3;
            option = sel.options[sel.options.length] = new Option("CF","");
            option.value = 4;
            //            alert('options.length=' + sel.options.length);
            //            document.getElementById(_selectId).options = options;
            //            var parent = document.getElementById(_selectId).parentNode;
            //            var currentObject = document.getElementById(_selectId);
            //            var newObject = selectObj.cloneNode(false); // Make a shallow copy
            //            document.getElementById(_selectId).replaceChild(options, document.getElementById(_selectId).options);
            break;

        case "2": // "ETDRS"
            var value = 100;
            for (i = 0; i < 20; i++)
            {
                option = sel.options[sel.options.length] = new Option(value.toFixed(0),"");
                option.value = value * 10;
                value -= 5;
            }
            option = sel.options[sel.options.length] = new Option("NPL","");
            option.value = 1;
            option = sel.options[sel.options.length] = new Option("PL","");
            option.value = 2;
            option = sel.options[sel.options.length] = new Option("HM","");
            option.value = 3;
            option = sel.options[sel.options.length] = new Option("CF","");
            option.value = 4;
            break;
								
        case "3": // "logMAR"
            var value = -0.30;
            for (i = 0; i < 20; i++)
            {
                option = sel.options[sel.options.length] = new Option(value.toFixed(2),"");
                option.value = Math.round(value * 100);
                value += 0.1;
            }
            option = sel.options[sel.options.length] = new Option("NPL","");
            option.value = 1;
            option = sel.options[sel.options.length] = new Option("PL","");
            option.value = 2;
            option = sel.options[sel.options.length] = new Option("HM","");
            option.value = 3;
            option = sel.options[sel.options.length] = new Option("CF","");
            option.value = 4;
            break;

        case "4": // "Decimal"
            value = 1.60;
            for (i = 0; i < 16; i++)
            {
                option = sel.options[sel.options.length] = new Option(value.toFixed(2),"");
                option.value = Math.round(value * 100);
                value -= 0.1;
            }
            option = sel.options[sel.options.length] = new Option("NPL","");
            option.value = 1;
            option = sel.options[sel.options.length] = new Option("PL","");
            option.value = 2;
            option = sel.options[sel.options.length] = new Option("HM","");
            option.value = 3;
            option = sel.options[sel.options.length] = new Option("CF","");
            option.value = 4;
            break;
					
        default:
            //            alert("default (format=" + _format + "), selectId=" + _selectId);
            break;
    }
}

// Sets corrected select to same value as initial
function setCorrected(_index, _id)
{
    document.getElementById(_id).selectedIndex = _index;
    document.getElementById(_id).value = document.getElementById(_id).options[_index].innerHTML;   
}