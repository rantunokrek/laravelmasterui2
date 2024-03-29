<aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
       <img src="{{asset('public/backend')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
       <span class="brand-text font-weight-light">AdminLTE 3</span>
     </a>
 
     <!-- Sidebar -->
     <div class="sidebar">
       <!-- Sidebar user panel (optional) -->
       <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="image">
           <img src="{{asset('public/backend')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
         </div>
         <div class="info">
           <a href="#" class="d-block">Admin-{{Auth::user()->name}}</a>
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
           <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
           <li class="nav-item menu-open">
             <a href="{{route('home')}}" class="nav-link active">
               <i class="nav-icon fas fa-tachometer-alt"></i>
               <p>
                 Dashboard
                 <i class="right fas fa-angle-left"></i>
               </p>
             </a>

           </li>

           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('categories.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('categories.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Category</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Sub Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('subcategory.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('subcategory.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Category</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
               Post
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('post.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add post</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('post.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Post</p>
                </a>
              </li>

            </ul>
          </li>

         
           <li class="nav-item">
             <a href="pages/widgets.html" class="nav-link">
               <i class="nav-icon fas fa-th"></i>
               <p>
                 Widgets
                 <span class="right badge badge-danger">New</span>
               </p>
             </a>
           </li>
           <li class="nav-item">
             <a href="#" class="nav-link">
               <i class="nav-icon fas fa-copy"></i>
               <p>
                 Layout Options
                 <i class="fas fa-angle-left right"></i>
                 <span class="badge badge-info right">6</span>
               </p>
             </a>




           <li class="nav-header">EXAMPLES</li>
           <li class="nav-item">
             <a href="pages/calendar.html" class="nav-link">
               <i class="nav-icon fas fa-calendar-alt"></i>
               <p>
                 Calendar
                 <span class="badge badge-info right">2</span>
               </p>
             </a>
           </li>
           <li class="nav-item">
             <a href="pages/gallery.html" class="nav-link">
               <i class="nav-icon far fa-image"></i>
               <p>
                 Gallery
               </p>
             </a>
           </li>
           <li class="nav-item">
             <a href="pages/kanban.html" class="nav-link">
               <i class="nav-icon fas fa-columns"></i>
               <p>
                 Kanban Board
               </p>
             </a>
           </li>

      
           <li class="nav-header">MULTI LEVEL EXAMPLE</li>
           <li class="nav-item">
             <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
               <p>Level 1</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ route('password.change') }}" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
               <p>
                {{ __('Password Change') }}
                 <i class="right fas fa-angle-left"></i>
               </p>
             </a>
    
           </li>
   
           <li class="nav-item" onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
            <a href="{{ route('logout') }}" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
          </li>

         </ul>
       </nav>
       <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
   </aside>
 