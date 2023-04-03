// Serial # --- 1
// Order # --- 2
// Placement Time --- 3
// Status --- 4
// Amount --- 5
$(document).ready(function () {
    // function for sorting the table by a column
    function sortTable(table, column, asc) {
        console.log('Table:', table)
        console.log('Column:', column);
        console.log('Asc:', asc);

        const rows = table.find('li.table-row').get();
        rows.sort(function (a, b) {
            let aVal, bVal;
            if (column === 1 || column === 2 || column === 5) { // numeric sorting
                aVal = parseInt($(a).find('.col-' + column).text().replace(/\D/g, ''));
                bVal = parseInt($(b).find('.col-' + column).text().replace(/\D/g, ''));
            } else if (column === 3) { // sort according to time and date
                aVal = new Date($(a).find('.col-' + column).text()).getTime();
                bVal = new Date($(b).find('.col-' + column).text()).getTime();
            } else if (column === 4) { // sort status
                // console.log('Before Status values in HTML:', $(a).find('.col-' + column).text().toLowerCase(), $(b).find('.col-' + column).text().toLowerCase());
                // console.log('Before Status keys in statusOrder:', Object.keys(statusOrder));

                const statusOrder = {
                    "new": 0,
                    "pending": 1,
                    "processing": 2,
                    "completed": 3
                };
                aVal = statusOrder[$(a).find('.col-' + column).text().trim().toLowerCase()];
                bVal = statusOrder[$(b).find('.col-' + column).text().trim().toLowerCase()];
                // console.log('After Status values in HTML:', $(a).find('.col-' + column).text().toLowerCase(), $(b).find('.col-' + column).text().toLowerCase());
                // console.log('After Status keys in statusOrder:', Object.keys(statusOrder));

            }
            if (!isNaN(aVal) && !isNaN(bVal)) { // numeric sorting
                if (aVal < bVal) {
                    return asc ? -1 : 1;
                } else if (aVal > bVal) {
                    return asc ? 1 : -1;
                } else {
                    return 0;
                }
            } else if (aVal instanceof Date && bVal instanceof Date) { // sort according to time and date
                if (aVal < bVal) {
                    return asc ? -1 : 1;
                } else if (aVal > bVal) {
                    return asc ? 1 : -1;
                } else {
                    return 0;
                }
            } else { // sort status
                if (aVal < bVal) {
                    return asc ? -1 : 1;
                } else if (aVal > bVal) {
                    return asc ? 1 : -1;
                } else {
                    return 0;
                }
            }
        });
        $.each(rows, function (index, row) {
            table.append(row);
        });
        // Disable other sort symbols and enable current sort symbol
        const sortSymbols = table.find('.sort-symbol');
        sortSymbols.removeClass('asc desc');
        const currentSymbol = sortSymbols.eq(column - 1);
        currentSymbol.addClass(asc ? 'asc' : 'desc');
    }

    // Attach click event handlers to each table header to enable sorting
    $('.table-header .col').click(function () {
    const table = $(this).closest('.responsive-table');
    const column = $(this).index() + 1;
    const asc = $(this).hasClass('asc');
    table.find('.table-header .col').removeClass('asc desc');
    $(this).addClass(asc ? 'desc' : 'asc');
    sortTable(table, column, asc);
});
});


function toggleContainer(containerId) {
    const container = document.getElementById(containerId);
    const containers = document.querySelectorAll(".container");

    containers.forEach((c) => {
        c.style.display = "none";
    });

    container.style.display = "block";
}
function selectAllOrders() {
    // Select all order checkboxes when the 'select-all-orders' checkbox is checked
    const checkboxes = document.getElementsByName("order[]");
    for (let i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = document.getElementById("select-all-orders").checked;
    }
}

function sendSelectedOrders(status) {
    console.log('I was called');
    // Get the selected orders
    const orderCheckboxes = document.getElementsByName("order[]");
    const orderNums = [];
    for (let i = 0; i < orderCheckboxes.length; i++) {
        if (orderCheckboxes[i].checked) {
            orderNums.push(orderCheckboxes[i].value);
            orderCheckboxes[i].checked = false; // Uncheck the checkbox
        }
    }
    console.log(orderNums)
    if (orderNums.length > 0) {
        // Update the status of the selected orders to 'pending'
        fetch('../php/update_order_status.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'order_num=' + orderNums + '&status=' + status
        })
            .then(response => {
                if (response.ok) {
                    // If the update is successful, reload the page with an alert or dialog box
                    alert("Order(s) sent for further processing!");
                    location.reload();
                } else {
                    alert("Error updating order status!");
                }
                return response.text();
            })
            .then(text => console.log(text))
            .catch(error => console.error(error));
    } else {
        alert("No orders selected!");
    }
}
