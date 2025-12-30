<div class="sidebar">
    <div class="sidebar-header">Inventory Pro</div>

    <div class="menu-title">Main</div>
    <a onclick="showPage('dashboard')">Dashboard</a>

    <div class="menu-title">Management</div>

    <a onclick="toggleSubmenu('itemsMenu')">Total Items</a>
    <div id="itemsMenu" class="submenu">
        <a onclick="showPage('viewProducts')">View Items</a>
        <a onclick="showPage('addProduct')">Add Items</a>
    </div>

    <a onclick="toggleSubmenu('stockInMenu')">Stock In</a>
    <div id="stockInMenu" class="submenu">
        <a onclick="showPage('viewStockIn')">View Stock In</a>
        <a onclick="showPage('addStock')">Add Stock In</a>
    </div>

    <a onclick="toggleSubmenu('stockOutMenu')">Stock Out</a>
    <div id="stockOutMenu" class="submenu">
        <a onclick="showPage('viewStockOut')">View Stock Out</a>
        <a onclick="showPage('issueStock')">Issue Stock</a>
    </div>

    <a onclick="toggleSubmenu('userMenu')">Users</a>
    <div id="userMenu" class="submenu">
        <a onclick="showPage('viewUsers')">View Users</a>
        <a onclick="showPage('addUser')">Add User</a>
    </div>

    <a onclick="showPage('Logout')">Logout</a>

    <div class="aside">
        Aman <br>
        aman@iqra.edu.pk
    </div>
</div>
