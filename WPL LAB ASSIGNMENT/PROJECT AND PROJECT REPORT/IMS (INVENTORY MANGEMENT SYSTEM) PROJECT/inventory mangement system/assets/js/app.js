
function openAddModal() {
    document.getElementById('addModal').style.display = 'flex';
}

function closeAddModal() {
    document.getElementById('addModal').style.display = 'none';
}

function openEditModal(id, name, category, sku, supplier, unit_price, quantity, status) {
    
    document.getElementById('edit_id').value = id;

    
    document.getElementById('edit_name').value = name;
    document.getElementById('edit_category').value = category;
    document.getElementById('edit_sku').value = sku;
    document.getElementById('edit_supplier').value = supplier;
    document.getElementById('edit_unit_price').value = unit_price;
    document.getElementById('edit_quantity').value = quantity;


    document.getElementById('editModal').style.display = 'flex';
}


function closeEditModal() {
    document.getElementById('editModal').style.display = 'none';
}

