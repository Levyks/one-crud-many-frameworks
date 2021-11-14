<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Book Manager</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a {!! $active === 'books' ? 'class="nav-link active" aria-current="page"' : 'class="nav-link"' !!}  href="/books">Books</a>
        <a {!! $active === 'authors' ? 'class="nav-link active" aria-current="page"' : 'class="nav-link"' !!} href="/authors">Authors</a>
        <a {!! $active === 'categories' ? 'class="nav-link active" aria-current="page"' : 'class="nav-link"' !!} href="/categories">Categories</a>
      </div>
    </div>
  </div>
</nav>