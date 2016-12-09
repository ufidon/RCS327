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
var addchecked = 0;

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

function showup(address)
{
    //var address1 = "1000 Edgewood College Dr, Madison, WI 53711";
    //var address2 = "1000 Edgewood College Dr Madison WI 53711";
    ///var res1 = checkaddress(address1);
    //var res2 = checkaddress(address2);  

    //msg += (res1) ? (address1+" is legal<br>"):(address1+" is illegal<br>");
    //msg += (res2) ? (address2+" is legal<br>"):(address2+" is illegal<br>");
    if (addchecked < 5)
    {
        addchecked++;
        res = checkaddress(address);
        msg += (res) ? (address + " is legal<br>") : (address + " is illegal<br>");
    }



    document.getElementById('checkaddress').innerHTML = msg;
}







