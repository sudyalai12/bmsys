<aside class="sidebar">
    <div class="sidebar-header">
        <img src={{ url("images/logo.png") }} alt="logo" />
        <h2>Neuvin</h2>
    </div>

    <ul class="sidebar-links">
        <h4>
            <span>Main Menu</span>
            <div class="menu-separator"></div>
        </h4>
        <li>
            <a href="/">
                <span class="material-symbols-outlined dashboard">
                    dashboard
                </span>
                Dashboard
            </a>
        </li>
        <li>
            <a href="/customers">
                <span class="material-symbols-outlined customers">
                    groups
                </span>
                Customers
            </a>
        </li>
        <li>
            <a href="/contacts">
                <span class="material-symbols-outlined contacts">
                    person
                </span>
                Contacts Person
            </a>
        </li>
        <li>
            <a href="/products">
                <span class="material-symbols-outlined products">
                    inventory_2
                </span>
                Products
            </a>
        </li>
        <li>
            <a href="/suppliers">
                <span class="material-symbols-outlined suppliers">
                    precision_manufacturing
                </span>
                Suppliers
            </a>
        </li>
        <li>
            <a href="/quotes">
                <span class="material-symbols-outlined quotes">
                    request_quote
                </span>
                Quotes
            </a>
        </li>

        <h4>
            <span>Account</span>
            <div class="menu-separator"></div>
        </h4>
        {{-- <li>
            <a href="#">
                <span class="material-symbols-outlined">
                    account_circle
                </span>
                Profile
            </a>
        </li> --}}
        {{-- <li>
            <a href="#">
                <span class="material-symbols-outlined">
                    settings
                </span>
                Settings
            </a>
        </li> --}}
        <li>
            <a href="/logout">
                <span class="material-symbols-outlined">
                    logout
                </span>
                Logout
            </a>
        </li>
    </ul>
    <div class="user-account">
        <div class="user-profile">
            <img src="{{ url("images/profile-img.jpg") }}" alt="Profile Image" />
            <div class="user-detail">
                <h3>Sudhanshu</h3>
                <span>Web Developer</span>
            </div>
        </div>
    </div>
</aside>
