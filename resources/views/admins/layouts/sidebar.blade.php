<!-- Menu -->
<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu flex-grow-0">
    <div class="container-xxl d-flex h-100">


      <ul class="menu-inner">
        <!-- Dashboards -->
        <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}" >
          <a href="{{ route('dashboard') }}" class="menu-link menu-toggle" onclick="event.preventDefault(); window.location.href='{{ route('dashboard') }}';">
            <i class="menu-icon icon-base bx bx-home-smile"></i>
            <div data-i18n="Dashboards">Dashboards</div>
          </a>
        </li>

        <!-- Users -->
        <li class="menu-item {{ request()->routeIs('users.index') ? 'active' : '' }}" >
          <a href="{{ route('users.index') }}" class="menu-link menu-toggle" onclick="event.preventDefault(); window.location.href='{{ route('users.index') }}';">
            <i class="menu-icon icon-base bx bx-user"></i>
            <div data-i18n="Users">Users</div>
          </a>
        </li>

        <!-- Comics -->
        <li class="menu-item {{ request()->routeIs('comics.index') ? 'active' : '' }}" >
          <a href="{{ route('comics.index') }}" class="menu-link menu-toggle" onclick="event.preventDefault(); window.location.href='{{ route('comics.index') }}';">
            <i class="menu-icon icon-base bx bx-book"></i>
            <div data-i18n="Comics">Comics</div>
          </a>
        </li>

        <!-- Histories -->
        <li class="menu-item {{ request()->routeIs('histories.index') ? 'active' : '' }}" >
          <a href="{{ route('histories.index') }}" class="menu-link menu-toggle" onclick="event.preventDefault(); window.location.href='{{ route('histories.index') }}';">
            <i class="menu-icon icon-base bx bx-history"></i>
            <div data-i18n="Histories">Histories</div>
          </a>
        </li>

        <!-- Chapters -->
        <li class="menu-item {{ request()->routeIs('chapters.index') ? 'active' : '' }}" >
          <a href="{{ route('chapters.index') }}" class="menu-link menu-toggle" onclick="event.preventDefault(); window.location.href='{{ route('chapters.index') }}';">
            <i class="menu-icon icon-base bx bx-list-ul"></i>
            <div data-i18n="Chapters">Chapters</div>
          </a>
        </li>

        <!-- Readlist -->
        <li class="menu-item {{ request()->routeIs('readlist.index') ? 'active' : '' }}" >
          <a href="{{ route('readlist.index') }}" class="menu-link menu-toggle" onclick="event.preventDefault(); window.location.href='{{ route('readlist.index') }}';">
            <i class="menu-icon icon-base bx bx-list-ul"></i>
            <div data-i18n="Readlist">Readlist</div>
          </a>
        </li>

        <!-- Bookmarks -->
        <li class="menu-item {{ request()->routeIs('bookmarks.index') ? 'active' : '' }}" >
          <a href="{{ route('bookmarks.index') }}" class="menu-link menu-toggle" onclick="event.preventDefault(); window.location.href='{{ route('bookmarks.index') }}';">
            <i class="menu-icon icon-base bx bx-bookmark"></i>
            <div data-i18n="Bookmarks">Bookmarks</div>
          </a>
        </li>

        <!-- Comments -->
        <li class="menu-item {{ request()->routeIs('comments.index') ? 'active' : '' }}" >
          <a href="{{ route('comments.index') }}" class="menu-link menu-toggle" onclick="event.preventDefault(); window.location.href='{{ route('comments.index') }}';">
            <i class="menu-icon icon-base bx bx-comment"></i>
            <div data-i18n="Comments">Comments</div>
          </a>
        </li>

        <!-- Ratings -->
        <li class="menu-item {{ request()->routeIs('ratings.index') ? 'active' : '' }}" >
          <a href="{{ route('ratings.index') }}" class="menu-link menu-toggle" onclick="event.preventDefault(); window.location.href='{{ route('ratings.index') }}';">
            <i class="menu-icon icon-base bx bx-star"></i>
            <div data-i18n="Ratings">Ratings</div>
          </a>
        </li>
        
        <!-- Types -->
        <li class="menu-item {{ request()->routeIs('types.index') ? 'active' : '' }}" >
          <a href="{{ route('types.index') }}" class="menu-link menu-toggle" onclick="event.preventDefault(); window.location.href='{{ route('types.index') }}';">
            <i class="menu-icon icon-base bx bx-tag"></i>
            <div data-i18n="Types">Types</div>
          </a>
        </li>

        <!-- Genres -->
        <li class="menu-item {{ request()->routeIs('genres.index') ? 'active' : '' }}" >
          <a href="{{ route('genres.index') }}" class="menu-link menu-toggle" onclick="event.preventDefault(); window.location.href='{{ route('genres.index') }}';">
            <i class="menu-icon icon-base bx bx-book-add"></i>
            <div data-i18n="Genres">Genres</div>
          </a>
        </li>

        <!-- Comic Genres -->
        <li class="menu-item {{ request()->routeIs('comic-genres.index') ? 'active' : '' }}" >
          <a href="{{ route('comic-genres.index') }}" class="menu-link menu-toggle" onclick="event.preventDefault(); window.location.href='{{ route('comic-genres.index') }}';">
            <i class="menu-icon icon-base bx bx-book-add"></i>
            <div data-i18n="Comic Genres">Comic Genres</div>
          </a>
        </li>
        
        <!-- Roles -->
        <li class="menu-item {{ request()->routeIs('roles.index') ? 'active' : '' }}" >
          <a href="{{ route('roles.index') }}" class="menu-link menu-toggle" onclick="event.preventDefault(); window.location.href='{{ route('roles.index') }}';">
            <i class="menu-icon icon-base bx bx-user-circle"></i>
            <div data-i18n="Roles">Roles</div>
          </a>
        </li>

        <!-- Multi Level Menu -->
        <li class="menu-item">
          <a href="javascript:void(0)" class="menu-link menu-toggle">
            <i class="menu-icon icon-base bx bx-grid"></i>
            <div data-i18n="Multi Level">Multi Level</div>
          </a>
          <ul class="menu-sub">
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <div data-i18n="Level 2">Level 2</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="javascript:void(0)" class="menu-link">
                    <div data-i18n="Level 3">Level 3</div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
      </ul>


    </div>
  </aside>
  <!-- / Menu -->