<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory MS - Orders</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <div class="container">
        <?php include("layout/sidebar.php"); ?>
        <main class="content">

        
            <h2>Orders Management</h2>

            
            <button class="btn edit-btn" onclick="openAddModal()">Add Order</button>

            
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Total Amount</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("config/db.php");

                    $sql = "SELECT oi.order_id, oi.user_id, oi.order_date, oi.status, oi.total_amount,
                                   oi.product_id, oi.quantity, oi.unit_price,
                                   u.name, u.email,
                                   p.product_name
                            FROM orders oi
                            LEFT JOIN users u ON oi.user_id = u.user_id
                            LEFT JOIN products p ON oi.product_id = p.product_id
                            ORDER BY oi.order_id DESC";

                    $res = mysqli_query($conn, $sql);
                    $counter = 1;

                    while ($row = mysqli_fetch_assoc($res)) {
                        echo "<tr>
                                <td>{$counter}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['order_date']}</td>
                                <td>{$row['status']}</td>
                                <td>{$row['total_amount']}</td>
                                <td>{$row['product_name']}</td>
                                <td>{$row['quantity']}</td>
                                <td>{$row['unit_price']}</td>
                                <td>
                                  <a href='#' class='btn edit-btn'
                                     onclick=\"openEditModal({$row['order_id']}, {$row['user_id']}, '{$row['status']}', {$row['total_amount']}, {$row['product_id']}, {$row['quantity']}, {$row['unit_price']})\">Edit</a>
                                  <a href='delete_order.php?id={$row['order_id']}' class='btn delete-btn'
                                     onclick=\"return confirm('Are you sure?')\">Delete</a>
                                </td>
                              </tr>";
                        $counter++;
                    }
                    ?>
                </tbody>
            </table>
        </main>
    </div>

    
    <div id="addModal" class="modal">
        <div class="modal-content">
            <h3>Add Order</h3>
            <form method="POST" action="config/order.php">
                <label>Product:</label>
                <select name="product_id" id="productSelect" required>
                    <option value="">Select Product</option>
                    <?php
                    
                    $products = mysqli_query($conn, "SELECT product_id, product_name, unit_price FROM products ORDER BY product_name ASC");
                    while ($p = mysqli_fetch_assoc($products)) {
                        
                        echo "<option value='{$p['product_id']}' data-price='{$p['unit_price']}'>{$p['product_name']}</option>";
                    }
                    ?>
                </select>

                <label>Quantity:</label>
                <input type="number" name="quantity" id="quantityInput" min="1" required>

                <label>Unit Price:</label>
                <input type="number" name="unit_price" id="unitPriceInput" readonly required>

                <label>Total Price:</label>
                <input type="number" id="totalPriceInput" name="total_amount" readonly required>

                <button type="submit" name="add_order">Save</button>
                <button type="button" onclick="closeAddModal()">Cancel</button>
            </form>

            <script>
                const productSelect = document.getElementById('productSelect');
                const quantityInput = document.getElementById('quantityInput');
                const unitPriceInput = document.getElementById('unitPriceInput');
                const totalPriceInput = document.getElementById('totalPriceInput');

                
                productSelect.addEventListener('change', function() {
                    const selectedOption = this.options[this.selectedIndex];
                    const price = selectedOption.getAttribute('data-price');
                    unitPriceInput.value = price ? parseFloat(price) : '';
                    calculateTotal();
                });

                
                quantityInput.addEventListener('input', calculateTotal);

                function calculateTotal() {
                    const qty = parseInt(quantityInput.value) || 0;
                    const price = parseFloat(unitPriceInput.value) || 0;
                    totalPriceInput.value = (qty * price).toFixed(2);
                }
            </script>

        </div>
    </div>

    
    <div id="editModal" class="modal" style="width: 100%;height: 100vh; justify-content: center; align-items: center;">
        <div class="modal-content">
            <h3>Edit Order</h3>
            <form method="POST" action="config/order.php">

                <input type="hidden" name="order_item_id" id="edit_item_id">
                <input type="hidden" name="order_id" id="edit_order_id">

                <label>Status:</label>
                <select name="status" id="edit_status" required>
                    <option value="pending">Pending</option>
                    <option value="processing">Processing</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>

                <label>Total Amount:</label>
                <input type="number" step="0.01" name="total_amount" id="edit_total" required>

                <label>Product:</label>
                <select name="product_id" id="edit_product" required>
                    <option value="">Select Product</option>
                    <?php
                    $products = mysqli_query($conn, "SELECT product_id, product_name FROM products ORDER BY product_name ASC");
                    while ($p = mysqli_fetch_assoc($products)) {
                        echo "<option value='{$p['product_id']}'>{$p['product_name']}</option>";
                    }
                    ?>
                </select>

                <label>Quantity:</label>
                <input type="number" name="quantity" id="edit_quantity" min="1" required>
                <input type="number" name="old_quantity" id="edit_old_quantity" min="1" hidden >

                <label>Unit Price:</label>
                <input type="number" step="0.01" name="unit_price" id="edit_unit_price" required>

                <button type="submit" name="update_order">Update</button>
                <button type="button" onclick="closeEditModal()">Cancel</button>

            </form>
        </div>
    </div>

    
    <script>
        function openAddModal() {
            document.getElementById('addModal').style.display = 'flex';
        }

        function closeAddModal() {
            document.getElementById('addModal').style.display = 'none';
        }

        function openEditModal(order_id, user_id, status, total_amount, product_id, quantity, unit_price) {
            
            document.getElementById('edit_order_id').value = order_id;
            document.getElementById('edit_item_id').value = user_id; 

            document.getElementById('edit_status').value = status;
            document.getElementById('edit_total').value = total_amount;
            document.getElementById('edit_product').value = product_id;
            document.getElementById('edit_quantity').value = quantity;
            document.getElementById('edit_old_quantity').value = quantity;
            document.getElementById('edit_unit_price').value = unit_price;

            document.getElementById('editModal').style.display = 'flex';
        }

        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }
    </script>
</body>

</html>