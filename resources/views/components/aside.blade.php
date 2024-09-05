<aside>
    <x-nav-link href="/" :active="request()->is('/')" img="/assets/img/dashboard.png">Dashboard</x-nav-link>
    <x-nav-link href="/customers" :active="request()->is('customers')" img="/assets/img/customer.png">Customers</x-nav-link>
    <x-nav-link href="/contacts" :active="request()->is('contacts')" img="/assets/img/contact.png">Contact People</x-nav-link>
    <x-nav-link href="/products" :active="request()->is('products')" img="/assets/img/product.png">Products</x-nav-link>
    <x-nav-link href="/quotes" :active="request()->is('quotes')" img="/assets/img/quote.png">Quotes</x-nav-link>
    @guest
        <x-nav-link href="/login" :active="request()->is('login')" img="/assets/img/login.png">LogIn</x-nav-link>
    @endguest
    @auth
        <x-nav-link href="/logout" :active="request()->is('logout')" img="/assets/img/logout.png">LogOut</x-nav-link>
    @endauth
</aside>
