
<nav>
    <ul>
        <li><a href="{{ route('home') }}">
            <i class="bi bi-house"></i>
            Home
        </a></li>
        <li><a href="{{ route('transactions') }}">
            <i class="bi bi-arrow-down-up"></i>
            Transactions
        </a></li>
        <li>
            <a href="{{ route('newtransaction') }}">
                <i class="bi bi-plus-circle-fill"></i>
                New
            </a>
        </li>
        <li><a href="/account">
            <i class="bi bi-person-circle"></i>
            Account
        </a></li>
        <li>
            <a href="{{ route('logout') }}">
                <i class="bi bi-box-arrow-right"></i>
                Logout
            </a>
        </li>
    </ul>
</nav>