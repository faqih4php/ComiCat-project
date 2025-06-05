<!-- Menu -->
          <aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu flex-grow-0">
            <div class="container-xxl d-flex h-100">


              <ul class="menu-inner">
                <!-- Dashboards -->
                <li class="menu-item {{ Request::routeIs('dashboard') ? 'active' : '' }}">
                  <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base bx bx-home-smile"></i>
                    <div data-i18n="Dashboards">Dashboards</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item {{ Request::routeIs('dashboard') ? 'active' : '' }}">
                      <a href="{{ route('dashboard') }}" class="menu-link">
                        <i class="menu-icon icon-base bx bx-home"></i>
                        <div data-i18n="Dashboard">Dashboard</div>
                      </a>
                    </li>
                  </ul>
                </li>

                <!-- Users -->
                <li class="menu-item {{ Request::routeIs('users.*') ? 'active' : '' }}">
                  <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base bx bx-user"></i>
                    <div data-i18n="Users">Users</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item {{ Request::routeIs('users.index') ? 'active' : '' }}">
                      <a href="{{ route('users.index') }}" class="menu-link">
                        <i class="menu-icon icon-base bx bx-user"></i>
                        <div data-i18n="User List">User List</div>
                      </a>
                    </li>
                    <li class="menu-item {{ Request::routeIs('users.create') ? 'active' : '' }}">
                      <a href="{{ route('users.create') }}" class="menu-link">
                        <i class="menu-icon icon-base bx bx-user-plus"></i>
                        <div data-i18n="Add User">Add User</div>
                      </a>
                    </li>
                  </ul>
                </li>

                <!-- Comics -->
                <li class="menu-item {{ Request::routeIs('comics.*') ? 'active' : '' }}">
                  <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base bx bx-book-open"></i>
                    <div data-i18n="Comics">Comics</div>
                  </a>

                  <ul class="menu-sub">
                    <li class="menu-item {{ Request::routeIs('comics.index') ? 'active' : '' }}">
                      <a href="{{ route('comics.index') }}" class="menu-link">
                        <i class="menu-icon icon-base bx bx-list-ul"></i>
                        <div data-i18n="Comics List">Comics List</div>
                      </a>
                    </li>
                    <li class="menu-item {{ Request::routeIs('comics.create') ? 'active' : '' }}">
                      <a href="{{ route('comics.create') }}" class="menu-link">
                        <i class="menu-icon icon-base bx bx-book-add"></i>
                        <div data-i18n="Add Comic">Add Comic</div>
                      </a>
                    </li>
                  </ul>
                </li>

                <!-- Comments -->
                <li class="menu-item {{ Request::routeIs('comments.*') ? 'active' : '' }}">
                  <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base bx bx-comment"></i>
                    <div data-i18n="Comments">Comments</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item {{ Request::routeIs('comments.index') ? 'active' : '' }}">
                      <a href="{{ route('comments.index') }}" class="menu-link">
                        <i class="menu-icon icon-base bx bx-list-ul"></i>
                        <div data-i18n="Comment List">Comment List</div>
                      </a>
                    </li>
                    <li class="menu-item {{ Request::routeIs('comments.create') ? 'active' : '' }}">
                      <a href="{{ route('comments.create') }}" class="menu-link">
                        <i class="menu-icon icon-base bx bx-comment-add"></i>
                        <div data-i18n="Add Comment">Add Comment</div>
                      </a>
                    </li>
                  </ul>
                </li>

                <!-- Bookmarks -->
                <li class="menu-item {{ Request::routeIs('bookmarks.*') ? 'active' : '' }}">
                  <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base bx bx-bookmark"></i>
                    <div data-i18n="Bookmarks">Bookmarks</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item {{ Request::routeIs('bookmarks.index') ? 'active' : '' }}">
                      <a href="{{ route('bookmarks.index') }}" class="menu-link">
                        <i class="menu-icon icon-base bx bx-list-ul"></i>
                        <div data-i18n="Bookmark List">Bookmark List</div>
                      </a>
                    </li>
                    <li class="menu-item {{ Request::routeIs('bookmarks.create') ? 'active' : '' }}">
                      <a href="{{ route('bookmarks.create') }}" class="menu-link">
                        <i class="menu-icon icon-base bx bx-bookmark-plus"></i>
                        <div data-i18n="Add Bookmark">Add Bookmark</div>
                      </a>
                    </li>
                  </ul>
                </li>

                <!-- Roles -->
                <li class="menu-item {{ Request::routeIs('roles.*') ? 'active' : '' }}">
                  <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base bx bx-bookmark"></i>
                    <div data-i18n="Roles">Roles</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item {{ Request::routeIs('roles.index') ? 'active' : '' }}">
                      <a href="{{ route('roles.index') }}" class="menu-link">
                        <i class="menu-icon icon-base bx bx-list-ul"></i>
                        <div data-i18n="Role List">Role List</div>
                      </a>
                    </li>
                    <li class="menu-item {{ Request::routeIs('roles.create') ? 'active' : '' }}">
                      <a href="{{ route('roles.create') }}" class="menu-link">
                        <i class="menu-icon icon-base bx bx-bookmark-plus"></i>
                        <div data-i18n="Add Role">Add Role</div>
                      </a>
                    </li>
                  </ul>
                </li>

                <!-- Chapters -->
                <li class="menu-item {{ Request::routeIs('chapters.*') && !Request::routeIs('chapters.pages.*') ? 'active' : '' }}">
                  <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base bx bx-book-open"></i>
                    <div data-i18n="Chapters">Chapters</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item {{ Request::routeIs('chapters.index') ? 'active' : '' }}">
                      @if (isset($comic))
                      <a href="{{ route('chapters.index', ['comic' => $comic->id]) }}" class="menu-link">
                        <i class="menu-icon icon-base bx bx-list-ul"></i>
                        <div data-i18n="Chapter List">Chapter List</div>
                      </a>
                      @endif
                    </li>
                  </ul>
                </li>

                <!-- Pages -->
                <li class="menu-item {{ Request::routeIs('chapters.pages.*') ? 'active' : '' }}">
                  <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base bx bx-book-open"></i>
                    <div data-i18n="Pages">Pages</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item {{ Request::routeIs('chapters.pages.index') ? 'active' : '' }}">
                      @if (isset($chapter))
                      <a href="{{ route('chapters.pages.index', $chapter) }}" class="menu-link">
                        <i class="menu-icon icon-base bx bx-list-ul"></i>
                        <div data-i18n="Page List">Page List</div>
                      </a>
                      @endif
                    </li>
                  </ul>
                </li>

                <!-- Read Lists -->
                <li class="menu-item {{ Request::routeIs('readlist.*') ? 'active' : '' }}">
                  <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base bx bx-list-ul"></i>
                    <div data-i18n="Read Lists">Read Lists</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item {{ Request::routeIs('readlist.index') ? 'active' : '' }}">
                      <a href="{{ route('readlist.index') }}" class="menu-link">
                        <i class="menu-icon icon-base bx bx-list-ul"></i>
                        <div data-i18n="Read List">Read List</div>
                      </a>
                    </li>
                    <li class="menu-item {{ Request::routeIs('readlist.create') ? 'active' : '' }}">
                      <a href="{{ route('readlist.create') }}" class="menu-link">
                        <i class="menu-icon icon-base bx bx-book-add"></i>
                        <div data-i18n="Add Read List">Add Read List</div>
                      </a>
                    </li>
                  </ul>
                </li>

                <!-- Ratings -->
                <li class="menu-item {{ Request::routeIs('ratings.*') ? 'active' : '' }}">
                  <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base bx bx-star"></i>
                    <div data-i18n="Ratings">Ratings</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item {{ Request::routeIs('ratings.index') ? 'active' : '' }}">
                      <a href="{{ route('ratings.index') }}" class="menu-link">
                        <i class="menu-icon icon-base bx bx-list-ul"></i>
                        <div data-i18n="Rating List">Rating List</div>
                      </a>
                    </li>
                    <li class="menu-item {{ Request::routeIs('ratings.create') ? 'active' : '' }}">
                      <a href="{{ route('ratings.create') }}" class="menu-link">
                        <i class="menu-icon icon-base bx bx-star"></i>
                        <div data-i18n="Add Rating">Add Rating</div>
                      </a>
                    </li>
                  </ul>
                </li>

                <!-- Histories -->
                <li class="menu-item {{ Request::routeIs('histories.*') ? 'active' : '' }}">
                  <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base bx bx-history"></i>
                    <div data-i18n="Histories">Histories</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item {{ Request::routeIs('histories.index') ? 'active' : '' }}">
                      <a href="{{ route('histories.index') }}" class="menu-link">
                        <i class="menu-icon icon-base bx bx-list-ul"></i>
                        <div data-i18n="History List">History List</div>
                      </a>
                    </li>
                    <li class="menu-item {{ Request::routeIs('histories.create') ? 'active' : '' }}">
                      <a href="{{ route('histories.create') }}" class="menu-link">
                        <i class="menu-icon icon-base bx bx-history"></i>
                        <div data-i18n="Add History">Add History</div>
                      </a>
                    </li>
                  </ul>
                </li>

                <!-- Types -->
                <li class="menu-item {{ Request::routeIs('types.*') ? 'active' : '' }}">
                  <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base bx bx-tag"></i>
                    <div data-i18n="Types">Types</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item {{ Request::routeIs('types.index') ? 'active' : '' }}">
                      <a href="{{ route('types.index') }}" class="menu-link">
                        <i class="menu-icon icon-base bx bx-list-ul"></i>
                        <div data-i18n="Type List">Type List</div>
                      </a>
                    </li>
                    <li class="menu-item {{ Request::routeIs('types.create') ? 'active' : '' }}">
                      <a href="{{ route('types.create') }}" class="menu-link">
                        <i class="menu-icon icon-base bx bx-tag"></i>
                        <div data-i18n="Add Type">Add Type</div>
                      </a>
                    </li>
                  </ul>
                </li>

                <!-- Genres -->
                <li class="menu-item {{ Request::routeIs('genres.*') ? 'active' : '' }}">
                  <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base bx bx-palette"></i>
                    <div data-i18n="Genres">Genres</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item {{ Request::routeIs('genres.index') ? 'active' : '' }}">
                      <a href="{{ route('genres.index') }}" class="menu-link">
                        <i class="menu-icon icon-base bx bx-list-ul"></i>
                        <div data-i18n="Genre List">Genre List</div>
                      </a>
                    </li>
                    <li class="menu-item {{ Request::routeIs('genres.create') ? 'active' : '' }}">
                      <a href="{{ route('genres.create') }}" class="menu-link">
                        <i class="menu-icon icon-base bx bx-tag"></i>
                        <div data-i18n="Add Genre">Add Genre</div>
                      </a>
                    </li>
                  </ul>
                </li>

              </ul>


            </div>
          </aside>
          <!-- / Menu -->