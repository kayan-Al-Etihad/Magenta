<li class="sidebar-menu-item">
   <a class="sidebar-menu-button" data-toggle="collapse" href="#{{ $menu_name }}">
      <span class="sidebar-menu-text">{{ $menu_name }}</span>
      <span class="ml-auto d-flex align-items-center">
         <span class="sidebar-menu-toggle-icon"></span>
      </span>
   </a>
   <ul class="sidebar-submenu collapse " id="{{ $menu_name }}">
      <li class="sidebar-menu-item ">
         <a class="sidebar-menu-button" href="{{ route($route_create) }}" data-title="{{ $menu_name }}">
            <span class="sidebar-menu-text"><i
                  class="menu-icon fa fa-caret-right"></i>{{ isset($subMenu) ? ucfirst($subMenu) : 'Create' }}</span>
         </a>
      </li>
      @if (isset($route_list))
         <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="{{ route($route_list) }}" data-title="{{ $menu_name }}">
               <span class="sidebar-menu-text">{{ isset($secondSubMenu) ? ucfirst($secondSubMenu) : 'Browse' }}</span>
            </a>
         </li>
      @endif

      @if (isset($route_createNewOrder))
         <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="{{ route($route_createNewOrder) }}" data-title="{{ $menu_name }}">
               <span class="sidebar-menu-text">{{ isset($therdSubMenu) ? ucfirst($therdSubMenu) : 'Browse' }}</span>
            </a>
         </li>
      @endif

      @if (isset($create3DModels))
         <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="{{ route($create3DModels) }}" data-title="{{ $menu_name }}">
               <span class="sidebar-menu-text">create 3dModels</span>
            </a>
         </li>
      @endif
   </ul>
</li>
