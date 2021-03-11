//Filter by unorder list 
function filterList() {
    var input, value, ul, li, a, i, aval;
    input = document.getElementById('src_user');
    value = input.value.toUpperCase();

    ul = document.getElementById('ul_list');
    li = ul.getElementsByTagName('li');
    console.log(li)
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName('a')[0];
        // console.log(a);
        if (a) {
            aval = a.textContent || a.innerText;
            console.log(aval);
            if (aval.toUpperCase().indexOf(value) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }

}