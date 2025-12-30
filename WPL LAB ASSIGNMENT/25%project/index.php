<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<div style="flex:1;">
    <div class="topbar">Inventory Management Dashboard</div>

    <div class="content">

        
        <div id="dashboard" class="page" style="display:block;">
            <h1>Dashboard Overview</h1>
             <div class="cards">
                    <div class="card"><div class="card-title">Total Items</div><div class="card-value">120</div></div>
                    <div class="card"><div class="card-title">Stock In</div><div class="card-value">15</div></div>
                    <div class="card"><div class="card-title">Stock Out</div><div class="card-value">10</div></div>
                    <div class="card"><div class="card-title">Total Users</div><div class="card-value">8</div></div>
                </div>
        </div>

        
        <div id="viewProducts" class="page">
            <h1>view items</h1>
            <table>
                    <tr><th>#</th><th>Item Name</th><th>Category</th><th>Company Name</th><th>Supplier Name</th><th>Actions</th></tr>

                    <tr>
                        <td>1</td><td>Keyboard</td><td>accessories</td><td>login</td><td>usman</td>
                        <td>
                            <button class="btn edit-btn" onclick="editRow(this)">Edit</button>
                            <button class="btn delete-btn" onclick="deleteRow(this)">Delete</button>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td><td>Mouse</td><td>accessories</td><td>login</td><td>Ahsan</td>
                        <td>
                            <button class="btn edit-btn" onclick="editRow(this)">Edit</button>
                            <button class="btn delete-btn" onclick="deleteRow(this)">Delete</button>
                        </td>
                    </tr>
                </table>
        </div>

        
        <div id="addProduct" class="page">
            <h1>Add Items</h1>
        
                <div class="form-group"><label>Item Name</label><input type="text"></div>
                <div class="form-group"><label>Category</label><input type="text"></div>
                <div class="form-group"><label>Company Name</label><input type="text"></div>
               <div class="form-group"><label>Supplier Name</label><input type="text"></div>
               
                <button> + Add Items</button>
            
        </div>


        <div id="viewStockIn" class="page">
            <h1>View Stock In</h1>
            <table>
                    <tr><th>#</th><th>Item Name</th><th>Quantity</th><th>Price</th><th>Date</th><th>Actions</th></tr>

                    <tr>
                        <td>1</td><td>Aman Traders</td><td>200</td><td>200</td><td>2025-01-18</td>
                        <td>
                            <button class="btn edit-btn">Edit</button>
                            <button class="btn delete-btn">Delete</button>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td><td>Aman Suppliers</td><td>250</td><td>200</td><td>2025-01-18</td>
                        <td>
                            <button class="btn edit-btn">Edit</button>
                            <button class="btn delete-btn">Delete</button>
                        </td>
                    </tr>
                </table>
        </div>

        
        <div id="addStock" class="page">
            <h1>Add Stock In</h1>
            
                <div class="form-group"><label>Item Name</label><input type="text"></div>
                <div class="form-group"><label>Quantity</label><input type="text"></div>
                <div class="form-group"><label>Price</label><input type="text"></div>
                <div class="form-group"><label>Date</label><input type="date"></div>
                <button> + Add Stock</button>
        </div>

        
        <div id="viewStockOut" class="page">
            <h1>View Stock Out</h1>
            

                <table>
                    <tr><th>#</th><th>Item Name</th><th>Quantity</th><th>Company Name</th><th>Date</th></tr>

                    <tr>
                        <td>1</td><td>Mouse</td><td>20</td><td>Login</td><td>2025-01-18</td>
                    </tr>

                    <tr>
                        <td>2</td><td>Keyboard</td><td>10</td><td>Login</td><td>2025-01-20</td>
                    </tr>
                </table>
        </div>

        
        <div id="issueStock" class="page">
            <h1>Issue Stock</h1>
            <div class="form-group"><label>Item Name</label><input type="text"></div>
                <div class="form-group"><label>Quantity</label><input type="text"></div>
                <div class="form-group"><label>Company Name</label><input type="text"></div>
                <div class="form-group"><label>Date</label><input type="date"></div>
                <button>Issue Stock</button>
        </div>

        
        <div id="viewUsers" class="page">
            <h1>View Users</h1>
            <table>
                    <tr><th>#</th><th>Name</th><th>Email</th><th>Role</th><th>Actions</th></tr>

                    <tr>
                        <td>1</td><td>Ali</td><td>ali@gmail.com</td><td>Admin</td>
                        <td>
                            <button class="btn edit-btn">Edit</button>
                            <button class="btn delete-btn">Delete</button>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td><td>aman</td><td>aman@gmail.com</td><td>Manager</td>
                        <td>
                            <button class="btn edit-btn">Edit</button>
                            <button class="btn delete-btn">Delete</button>
                        </td>
                    </tr>

                </table>
        </div>

        
        <div id="addUser" class="page">
            <h1>Add User</h1>
             <div class="form-group"><label>Name</label><input type="text"></div>
                <div class="form-group"><label>Email</label><input type="email"></div>
                <div class="form-group"><label>Role</label>
                    <select>
                        <option>Admin</option>
                        <option>Manager</option>
                        <option>User</option>
                    </select>
                </div>
                <button>Add User</button>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>
