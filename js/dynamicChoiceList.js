
    
/**
  * Populate the second list according to the values held in the first
  * list. When selecting the first list choice, if id_list3 is not null, it's
  * style display value is set to none, only being set to inline of the
  * second list has at least one value in it (not including a 'Please
  * select' option.
  *
  * id_list1 the first list of choices1 to examine; this will not
  * be changed, and will be used to influence the values in the
  * second list. It is a div element.
  * 
  * id_list2 the second list that will be influenced by the contents
  * of the first list. It is a div element.
  * 
  * id_list3 a third list option, if necessary. Can be null; it's contents is
  * not populated, but it's visibility is set according to whether or not
  * the second list is populated or not.
  * 
  * groupRemoval
  * 
  * choices1
  * 
  * choices2
  */
function populateList(id_list1, id_list2, id_list3,
                               groupRemoval, choices1, choices2) {
    document.getElementById('div_' + id_list2).style.display = "none";
    if (document.getElementById('div_' + id_list3) != null) {
        document.getElementById('div_' + id_list3).style.display = "none";
    }
    var list1 = document.getElementById(id_list1);
    var list2 = document.getElementById(id_list2);
    var index = list1.selectedIndex;
    // only display the list if the next list is not empty:
    var displayNextList = false;
    // get the name of the currently selected medication:
    var list1SelectedName = list1.options[index].text;
    var options = list1.options;
    list2.options.length = 0;
    option = list2.options[list2.options.length] = new Option("- Please Select -","");
    for (var i = 1; i < options.length; i++) {
        var isToRemove = false;
        if (groupRemoval[choices1[list1SelectedName]]) {
            for (var k = 0; k < groupRemoval[choices1[list1SelectedName]].length; k++) {
                if (choices1[options[i].text] == groupRemoval[choices1[list1SelectedName]][k]) {
                    isToRemove = true;
                    break;
                }
            }
            if (!isToRemove) {
                displayNextList = true;
                choices2[choices2.length] = options[i].text;
                option = list2.options[list2.options.length] = new Option(options[i].text,""); 
                option.value = options[i].value;
            }
        }
    }
    if (displayNextList && list2.options.length > 1) {
        document.getElementById('div_' + id_list2).style.display = "inline";
    }
}