const table = document.getElementById("live");

function cField(name) {
    let input = document.createElement("input");
    input.type = "input";
    input.name = name;
    input.placeholder = name;
    return input;
}
// function cButton(name) {
//   let button = document.createElement("button");
//   input.type = "button";
//   input.name = name;
//   input.innerHTML = name;
//   input.onClick = save;
//   return button;
// }
function save() {
    console.log("data disimpan");
}
function addField() {
    let rowNumber = table.rows.length;
    let row = table.insertRow(rowNumber);
    row.insertCell(0).appendChild(cField("name"));
    row.insertCell(1).appendChild(cField("jumlah"));
}
