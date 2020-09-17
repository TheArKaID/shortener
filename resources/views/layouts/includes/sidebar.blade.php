<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">ArKa::Shortener</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">AKS</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('home') ? 'active' : ''}}"><a class="nav-link" href="{{ route('dashboard.home') }}"><i class="fas fa-fire"></i> <span>Home</span></a></li>
            <li class="{{ Request::is('link') ? 'active' : ''}}"><a class="nav-link" href="{{ route('dashboard.link') }}"><i class="fas fa-link"></i> <span>URL</span></a></li>
        </ul>
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://arka.web.id" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> ArKa::Portfolio
        </a>
        </div>
    </aside>
</div>