function mdr(val){
    if(val.value.length < 5 || val.value.length > 50)
    {
        err(val, true);
        return false;
    }
    else
    {
        err(val, false);
        return true;
    }
}
function err(val2, err)
{
    if(err) {
        val2.style.borderColor = "#f00";
        document.getElementById('err').innerHTML = "Champ incomplet";
    }
    else {
        val2.style.borderColor = "";
    }

}