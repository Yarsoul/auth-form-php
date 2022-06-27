let title = document.getElementById('title');
title.style.textAlign = 'center';

let columns = document.getElementsByClassName('column');
for (let element of columns) {
    element.style.textAlign = 'center';
}

let table = document.getElementById('table');
table.style.border = '1px solid black';
table.style.borderCollapse = 'collapse';

let elementsTd = document.getElementsByTagName('td');
for (let element of elementsTd) {
    element.style.border = '1px solid black';
}