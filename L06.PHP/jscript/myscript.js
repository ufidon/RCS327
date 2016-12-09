// check address
/*
 house number + street + city + state, zip code
 [1-4] house number
 [2-4] words
 [4-20] city
 2 upper case letter for state
 5 digits for zip code
 
 Test 5 addresses:
 2 legal
 3 illegal
 */

var msg = 'result of checking address will show here: <br/>';

function checkaddress(address)
{
    // check address here, if legal return true else return false
    // use string concatination to concatination all information into msg
    // it will showup when mouse is over paragraph with id 'checkaddress' in page 
    // index.html

    // the key is the regular expression
    /* Refer to :
     * http://www.w3schools.com/js/js_regexp.asp
     * http://www.w3schools.com/jsref/jsref_obj_regexp.asp
     * @type type house number + street + city + state, zip code
     [1-4] house number
     [2-4] words
     [4-20] city
     2 upper case letter for state
     5 digits for zip code
     */
    var ok = address.search(/^\d{1,4}\s+([A-Z][A-z]{1,19}\s+){2,4}([A-Z][A-z]{3,19}\s+[A-Z]{2}\s+\d{5})$/);

    if (ok == 0)
        return true;
    else
        return false;
}

function showup()
{
    var address1 = "1000 Edgewood College Dr, Madison, WI 53711";
    var address2 = "1000 Edgewood College Dr Madison WI 53711";
    var res1 = checkaddress(address1);
    var res2 = checkaddress(address2);

    msg += (res1) ? (address1 + " is legal<br>") : (address1 + " is illegal<br>");
    msg += (res2) ? (address2 + " is legal<br>") : (address2 + " is illegal<br>");

    document.getElementById('checkaddress').innerHTML = msg;
}

///// functions handling upload
function  previewImage(input)
{
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            document.getElementById('idpreviewimage').src = e.target.result;
        }

        reader.readAsDataURL(input.files[0]);
    }

}

function checkupload()
{
    alert('upload information are being checking');

    // check upload information here
    // 1. check image caption

    // 2. check image genre

    // 3. check image location

    // 4. check photographer's name

    var uploadstatus = document.getElementById('iduploadstatus');
    uploadstatus.innerHTML = 'check results:<br/>';
}

/* Here is the reference code for drag and drop on search.html 
 * Refer https://developer.mozilla.org/en-US/docs/Web/API/HTML_Drag_and_Drop_API for details
 * */
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
    ev.effectAllowed = "copyMove";
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    var draggedimage = document.getElementById(data);
    ev.target.appendChild(draggedimage);
    
    // change image style here
    draggedimage.style = 'border: 2px green solid; width: 60px; height: 60px;';
}









