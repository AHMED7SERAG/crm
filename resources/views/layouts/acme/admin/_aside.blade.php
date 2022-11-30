<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.home') }}" class="brand-link">
        <i class="fa  fa-flag"></i>
      <img   class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"> {{ __('general.app') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin-assets//dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name ?? '' }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            {{--  @if(auth()->user()->hasRole('admin'))  --}}
                           @foreach($laravelAdminMenus->menus as $section)
                                 @if($section->items)
                                     @if($section->section == 'Tools')
                                          <li class="nav-item">
                                      <span data-i18n="{{ $section->section }}"
                                                     style="font-size: large; color:white;">{{strtoupper(__('general.'. strtolower($section->section)))}}</span>
                                           <i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right"
                                                 data-original-title="General"></i>
                                          </li>
                                    @endif
                                       @foreach($section->items as $menu)
                                          <li class="nav-item">
                                              <a href="{{url($menu->url)}}"
                                                  class="nav-link {{Request::is('*'.$menu->url.'*')?'active':''}}">
                                                  @if($section->section == 'Tools')
                                                  <i class="nav-icon {{ $menu->icon }}"></i>
                                                  @else
                                                  <i class="nav-icon fas fa-copy"></i>
                                                  @endif
                                                  <p>
                                                     @lang(strtolower($menu->title) .'.'. strtolower($menu->title))
                                                   </p>
                                             </a>
                                           </li>
                                       @endforeach
                                    @endif
                              @endforeach
                            {{--  @endif  --}}


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
