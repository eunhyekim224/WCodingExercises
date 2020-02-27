
let form = document.querySelector('form');
let table = document.getElementById('output');

{
    form.addEventListener('submit', (e) => {       
        table.innerHTML = '';
        e.preventDefault();
        displayTable();  
    });
}

{
    function displayTable() {
        let rowsInputValue = Number(document.getElementById('rowsInput').value);
        let colsInputValue = Number(document.getElementById('colsInput').value);

        if (!Number.isInteger(rowsInputValue) || !Number.isInteger(colsInputValue)) { 
            alert('Please enter integers')
        } else {
            for (let i=0; i<rowsInputValue; i++) {
                let row = document.createElement('tr');
                row.id = i+1;
                table.appendChild(row);
            }
    
            let rows = document.querySelectorAll('tr');
    
            for (let j=0; j<rows.length; j++) {
                for (let k=0; k<colsInputValue; k++) {
                    let col = document.createElement('td');
                    rows[j].appendChild(col);
                    col.textContent = (rows[j].id)*(k+1);
                    col.style.border = 'solid 1px';
                    col.style.width = '50px';
                    col.style.textAlign = 'center';             
                }
            }
        }      
    }    
}

