function highlightEdit(editableObj) {
	$(editableObj).css("background","#FFF");
}

function saveInlineEdit(editableObj,column,old) {
// no change change made then return false
    if($(editableObj).attr('data-old_value') === editableObj.innerHTML)
        return false;
// send ajax to update value
    $(editableObj).css("background","#FFF url(loader.gif) no-repeat right");
    $.ajax({
        url: "saveInlineEdit.php",
        type: "POST",
        dataType: "json",
        data:'column='+column+'&value='+editableObj.innerHTML+'&old='+old,
        success: function(response) {
// set updated value as old value
            console.log(response);
            $(editableObj).attr('data-old_value',editableObj.innerHTML);
            $(editableObj).css("background","#FDFDFD");
        },
        error: function (data) {
            console.log(data);
            window.location.reload();
        }
    });
}