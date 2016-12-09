// the key is the regular expression
/* Refer to :
 * http://www.w3schools.com/js/js_regexp.asp
 * http://www.w3schools.com/jsref/jsref_obj_regexp.asp
 * /
 
 /* @photolocation type house number + street + city + state, zip code
 // address pattern 
 [1-4] house number
 [2-4] words
 [4-20] city
 2 upper case letter for state
 5 digits for zip code
 */
var addresspattern = /^\d{1,4}\s+([A-Z][A-z]{1,19}\s+){2,4}([A-Z][A-z]{3,19}\s+[A-Z]{2}\s+\d{5})$/;
// image caption : not empty
var captionpattern = /[^\s]+/;
// Image genre: not empty
var genrepattern = /[^\s]+/;
// Photographer Name: FirstName MiddleName LastName
var namepattern = /([A-Z][a-z]{1,19}\s+)([A-Z][a-z.]{1,19}\s+)([A-Z][a-z]{1,19})/;

var msg = "check result: \n";
function checkpattern(pattern, str, item)
{
    var res = pattern.test(str);
    msg += (res) ? str + " is good " : str + " is bad ";
    msg += item + "\n";
    return res;
}



function checkupload()
{
    // check upload information here
    // 1. check image caption
    var imgcap = document.getElementById('idcap').value;
    checkpattern(captionpattern, imgcap, "caption");
    // 2. check image genre
    var imggenre = document.getElementById('idgenre').value;
    checkpattern(genrepattern, imggenre, "genre");
    // 3. check image location
    var imgloc = document.getElementById('idloc').value;
    checkpattern(addresspattern, imgloc, "address");
    // 4. check photographer's name
    var ptname = document.getElementById('idpname').value;
    checkpattern(namepattern, ptname, "photographer name");
    alert(msg);
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

    /*
     if(ev.target.hasChildNodes())
     ev.target.insertBefore(draggedimage, ev.target.firstChild);
     else
     ev.target.appendChild(draggedimage);
     */
    ev.target.appendChild(draggedimage);
    // change image style here
    if (ev.target.id == "searchresults")
        draggedimage.style = 'border: 2px green solid; width: 60px; height: 60px;';
    if (ev.target.id == "resizebox")
    {
         draggedimage.className = "resize-drag";
    }
    if(ev.target.id == "playground") 
    {
        draggedimage.style.width = ev.target.style.width;
        draggedimage.style.height = ev.target.style.height;
        ev.target.style.backgroundImage = draggedimage.src;
        ev.target.style.backgroundSize = "cover";
    }

}


