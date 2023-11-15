<nav id="navigation">
    <div class="container">
        <div id="responsive-nav">
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="{{ route('get.category', 'hot-deals') }}">Hot Deals</a></li>
                <li><a href="{{ route('get.category', 'categories') }}">Categories</a></li>
                <li><a href="{{ route('get.category', 'laptops') }}">Laptops</a></li>
                <li><a href="{{ route('get.category', 'smartphones') }}">Smartphones</a></li>
                <li><a href="{{ route('get.category', 'cameras') }}">Cameras</a></li>
                <li><a href="{{ route('get.category', 'accessories') }}">Accessories</a></li>
            </ul>
        </div>
    </div>
</nav>
