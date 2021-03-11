function filter() {
    var input, value, table, tr, td, i, tdval;
    input = document.getElementById('search');
    value = input.value.toUpperCase();

    table = document.getElementById('mytbl');
    tr = table.getElementsByTagName('tr');

    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName('td')[1];
        console.log(td);
        if (td) {
            tdval = td.textContent || td.innerText;
            // console.log(tdval);
            if (tdval.toUpperCase().indexOf(value) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }

}
function filter2() {
    var input, value, table, tr, td, i, tdval;
    input = document.getElementById('search');
    value = input.value.toUpperCase();

    table = document.getElementById('mytbl');
    tr = table.getElementsByTagName('tr');

    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName('td')[2];
        console.log(td);
        if (td) {
            tdval = td.textContent || td.innerText;
            // console.log(tdval);
            if (tdval.toUpperCase().indexOf(value) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }

}
function filter1() {
    var input, value, table, tr, td, i, tdval;
    input = document.getElementById('search1');
    value = input.value.toUpperCase();

    table = document.getElementById('mytbl1');
    tr = table.getElementsByTagName('tr');

    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName('td')[1];
        // console.log(td);
        if (td) {
            tdval = td.textContent || td.innerText;
            // console.log(tdval);
            if (tdval.toUpperCase().indexOf(value) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }

}
// dynamic filter 
function dynamic_filter(tbl_id,input_id,src_by_col="1") {
    var input, value, table, tr, td, i, tdval;
    input = document.getElementById(input_id);
    value = input.value.toUpperCase();

    table = document.getElementById(tbl_id);
    tr = table.getElementsByTagName('tr');
    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName('td')[src_by_col];
        // console.log(td);
        if (td) {
            tdval = td.textContent || td.innerText;
            // console.log(tdval);
            if (tdval.toUpperCase().indexOf(value) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }

}

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