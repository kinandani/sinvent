var table = document.getElementById("myTable").getElementsByTagName('tbody')[0];

for (var i = 0, row; row = table.rows[i]; i++) {
    row.cells[0].innerHTML = i + 1;
}

document.getElementById("copyrihgt").innerHTML = 'Copyright &copy; Syaiful Rahmatdani 2024';