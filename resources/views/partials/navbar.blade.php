<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
      <a class="navbar-brand" {{ ($active === 'home') ? 'active': '' }} href="/">asguard articles</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($active === 'home') ? 'active': '' }}"  href="/">home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === 'about') ? 'active': '' }}" href="/about">about</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === 'posts') ? 'active': '' }}" href="/posts">posts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === 'categories') ? 'active': '' }}" href="/categories">category</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
        @guest
            <li class="nav-item">
              <a href="/login" class="nav-link {{ ($active === 'login') ? 'active': '' }}"><i class="bi bi-box-arrow-in-right"></i> login</a>
            </li>
        @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              welcome, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#"><i class="bi bi-layout-text-sidebar-reverse"></i> Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="POST">
                  @csrf
                   <button type="submit" class="dropdown-item">
                     <i class="bi bi-box-arrow-in-left"></i> logout
                   </button>
                </form>
              </li>
            </ul>
          </li>
        @endguest
        </ul>
      </div>
    </div>
</nav>