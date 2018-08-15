<!-- Sidebar -->
<nav id="sidebar" style="overflow-y: scroll;">
    <!-- Sidebar Scroll Container -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
        <div class="sidebar-content">
            <!-- Side Header -->
            <div class="side-header side-content bg-white-op" style="padding-top: 4px">
                <a class="h5 text-white" href="index.php">
                    <img src="{{ asset('new-assets') }}/img/logo-light.png" alt="logo" class="logo">
                    <span class="h5 sidebar-mini-hide" style="color: white;font-size: 18px">Digi-Sail</span>
                </a>
            </div>
            <!-- END Side Header -->

            <!-- Side Content -->
            <div class="side-content">
                @php
                  $my_permissions_triggers = \App\Http\Controllers\UsersController::myPermissionsTrigger();
                @endphp
                <ul class="nav-main">
                    <li>
                        <a class="{{ Request::segment(1) == '' ? 'active' : '' }}"
                            href="{{ url('/') }}">
                            <i class="si si-speedometer"></i><span class="sidebar-mini-hide">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Request::segment(1) == 'task-manager' ? 'active' : '' }}"
                            href="{{ url('/task-manager') }}">
                            <i class="si si-speedometer"></i><span class="sidebar-mini-hide">Task Manager</span>
                        </a>
                    </li>
                    @if( in_array('departement' ,$my_permissions_triggers) )
                    <li>
                        <a class="{{ Request::segment(1) == 'departements' ? 'active' : '' }}"
                            href="{{ url('departements') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Departements</span>
                        </a>
                    </li>
                    @endif
                    @if( in_array('positions' ,$my_permissions_triggers) )
                    <li>
                        <a class="{{ Request::segment(1) == 'positions' ? 'active' : '' }}"
                            href="{{ url('positions') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Positions</span>
                        </a>
                    </li>
                    @endif
                    @if( in_array('permissions' ,$my_permissions_triggers) )
                    <li>
                        <a class="{{ Request::segment(1) == 'permissions' ? 'active' : '' }}"
                            href="{{ url('permissions') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Permissions</span>
                        </a>
                    </li>
                    @endif
                    @if( in_array('industries' ,$my_permissions_triggers) )
                    <li>
                        <a class="{{ Request::segment(1) == 'industries' ? 'active' : '' }}"
                            href="{{ url('industries') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Industries</span>
                        </a>
                    </li>
                    @endif
                    @if( in_array('potential' ,$my_permissions_triggers) )
                    <li>
                        <a class="{{ Request::segment(1) == 'potentials' ? 'active' : '' }}"
                            href="{{ url('potentials') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Potentials</span>
                        </a>
                    </li>
                    @endif
                    @if( in_array('contracts' ,$my_permissions_triggers) )
                    <li>
                        <a class="{{ Request::segment(1) == 'contracts' ? 'active' : '' }}"
                            href="{{ url('contracts') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Contracts</span>
                        </a>
                    </li>
                    @endif
                    @if( in_array('finance' ,$my_permissions_triggers) )
                    <li>
                        <a class="{{ Request::segment(1) == 'finance' ? 'active' : '' }}"
                            href="{{ url('finance') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Finance</span>
                        </a>
                    </li>
                    @endif
                    @if( in_array('users' ,$my_permissions_triggers) )
                    <li>
                        <a class="{{ Request::segment(1) == 'users' ? 'active' : '' }}"
                            href="{{ url('users') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Users</span>
                        </a>
                    </li>
                    @endif
                    @if( in_array('customers' ,$my_permissions_triggers) )
                    <li>
                        <a class="{{ Request::segment(1) == 'customers' ? 'active' : '' }}"
                            href="{{ url('customers') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Customers</span>
                        </a>
                    </li>
                    @endif
                    @if( in_array('tasks_generator' ,$my_permissions_triggers) )
                    <li>
                        <a class="{{ Request::segment(1) == 'tasks' ? 'active' : '' }}"
                            href="{{ url('tasks') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Tasks Generator</span>
                        </a>
                    </li>
                    @endif
                    @if( in_array('tasks_assign' ,$my_permissions_triggers) )
                    <li>
                        <a class="{{ Request::segment(1) == 'task-assign' ? 'active' : '' }}"
                            href="{{ url('task-assign') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Tasks Assign</span>
                        </a>
                    </li>
                    @endif
                    @if( in_array('task_approve' ,$my_permissions_triggers) )
                    <li>
                        <a class="{{ Request::segment(1) == 'tasks-approve' ? 'active' : '' }}"
                            href="{{ url('tasks-approve') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Tasks Approve</span>
                        </a>
                    </li>
                    @endif
                    @if( in_array('director_task_approve' ,$my_permissions_triggers) )
                    <li>
                        <a class="{{ Request::segment(1) == 'director-tasks-approve' ? 'active' : '' }}"
                            href="{{ url('director-tasks-approve') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Director Approve</span>
                        </a>
                    </li>
                    @endif
                    @if( in_array('services' ,$my_permissions_triggers) )
                    <li>
                        <a class="{{ Request::segment(1) == 'services' ? 'active' : '' }}"
                            href="{{ url('services') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Services</span>
                        </a>
                    </li>
                    @endif
                    @if( in_array('plans' ,$my_permissions_triggers) )
                    <li>
                        <a class="{{ Request::segment(1) == 'plans' ? 'active' : '' }}"
                            href="{{ url('plans') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Plans</span>
                        </a>
                    </li>
                    @endif
                    <!-- <li>
                        <a class="{{ Request::segment(1) == 'subservices' ? 'active' : '' }}"
                            href="{{ url('subservices') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Sub Services</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Request::segment(1) == 'values' ? 'active' : '' }}"
                            href="{{ url('values') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Values</span>
                        </a>
                    </li> -->
                    <li class="nav-main-heading"><span class="sidebar-mini-hide">Data</span></li>
                    @if( in_array('levels' ,$my_permissions_triggers) )
                    <li>
                        <a class="{{ Request::segment(1) == 'levels' ? 'active' : '' }}"
                            href="{{ url('levels') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Levels</span>
                        </a>
                    </li>
                    @endif
                    @if( in_array('technologies' ,$my_permissions_triggers) )
                    <li>
                        <a class="{{ Request::segment(1) == 'technologies' ? 'active' : '' }}"
                            href="{{ url('technologies') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Technologies</span>
                        </a>
                    </li>
                    @endif
                    @if( in_array('look_and_feels' ,$my_permissions_triggers) )
                    <li>
                        <a class="{{ Request::segment(1) == 'look-and-feels' ? 'active' : '' }}"
                            href="{{ url('look-and-feels') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Look And Feels</span>
                        </a>
                    </li>
                    @endif
                    @if( in_array('content' ,$my_permissions_triggers) )
                    <li>
                        <a class="{{ Request::segment(1) == 'content' ? 'active' : '' }}"
                            href="{{ url('content') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Content</span>
                        </a>
                    </li>
                    @endif
                    @if( in_array('post_types' ,$my_permissions_triggers) )
                    
                    <li>
                        <a class="{{ Request::segment(1) == 'post-types' ? 'active' : '' }}"
                            href="{{ url('post-types') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Post Types</span>
                        </a>
                    </li>
                    @endif
                    @if( in_array('promote_status' ,$my_permissions_triggers) )
                    <li>
                        <a class="{{ Request::segment(1) == 'promote-status' ? 'active' : '' }}"
                            href="{{ url('promote-status') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Promote Status</span>
                        </a>
                    </li>
                    @endif
                    @if( in_array('management' ,$my_permissions_triggers) )
                    <li>
                        <a class="{{ Request::segment(1) == 'management' ? 'active' : '' }}"
                            href="{{ url('management') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Management</span>
                        </a>
                    </li>
                    @endif
                    @if( in_array('feedback_forms' ,$my_permissions_triggers) )
                    <li>
                        <a class="{{ Request::segment(1) == 'feedback-forms' ? 'active' : '' }}"
                            href="{{ url('feedback-forms') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Feedback Forms</span>
                        </a>
                    </li>
                    @endif
                    <!-- <li>
                        <a class="active" href="index.php"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                    </li> -->
                    <!-- <li class="nav-main-heading"><span class="sidebar-mini-hide">Execurse</span></li>

                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Advertisment</span></a>
                        <ul>
                          <li>
                              <a href="contracts.php">Task Manager</a>
                          </li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Digital</span></a>
                        <ul>
                          <li>
                              <a href="contracts.php">Task Manager</a>
                          </li>

                        </ul>
                    </li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Development</span></a>
                        <ul>
                          <li>
                              <a href="contracts.php">Task Manager</a>
                          </li>

                        </ul>
                    </li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Marketing</span></a>
                        <ul>
                          <li>
                              <a href="contracts.php">Task Manager</a>
                          </li>

                        </ul>
                    </li>
<li class="nav-main-heading"><span class="sidebar-mini-hide">Admin</span></li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Finance</span></a>
                        <ul>
                          <li>
                              <a href="invoices.php">Invoices List</a>
                          </li>
                          <li>
                              <a href="invoice.php">Invoice</a>
                          </li>

                        </ul>
                    </li>

                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Legel</span></a>
                        <ul>
                          <li>
                              <a href="contracts.php">Contracts List</a>
                          </li>
                          <li>
                              <a href="contract.php">Contract </a>
                          </li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Human Resorce</span></a>
                        <ul>
                          <li>
                              <a href="employees.php">Employees List</a>
                          </li>

                        </ul>
                    </li>
                    <li class="nav-main-heading"><span class="sidebar-mini-hide">Account Managers</span></li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Campanies</span></a>
                        <ul>
                          <li>
                              <a href="companies.php">Companies list</a>
                          </li>
                          <li>
                              <a href="profile.php">Profile</a>
                          </li>
                          <li>
                              <a href="strategy.php">Strategy</a>
                          </li>
                          <li>
                              <a href="plan.php">Plan</a>
                          </li>
                          <li>
                              <a href="Contract.php">Contract</a>
                          </li>
                          <li>
                              <a href="invoice.php">Invoice</a>
                          </li>
                        </ul>
                    </li>
                    <li class="nav-main-heading"><span class="sidebar-mini-hide">Profiles</span></li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Profiles</span></a>
                        <ul>
                          <li>
                              <a href="companies.php">Company</a>
                          </li>
                          <li>
                              <a href="profile.php">Branch</a>
                          </li>
                          <li>
                              <a href="strategy.php">Project</a>
                          </li>
                          <li>
                              <a href="plan.php">Employee</a>
                          </li>
                          <li>
                              <a href="Contract.php">Contract</a>
                          </li>
                          <li>
                              <a href="invoice.php">Invoice</a>
                          </li>
                        </ul>
                    </li>
                    <li class="nav-main-heading"><span class="sidebar-mini-hide">Business Development</span></li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Sales</span></a>
                        <ul>
                          <li>
                              <a href="potantial.php">Potantials list</a>
                          </li>

                        </ul>
                    </li>


                    <li class="nav-main-heading"><span class="sidebar-mini-hide">Website</span></li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Settings</span></a>
                        <ul>
                          <li>
                              <a href="employee.php">Profile</a>
                          </li>
                          <li>
                              <a href="layout.php">Layout Design</a>
                          </li>
                          <li>
                              <a href="struchutre.php">Struchure</a>
                          </li>
                        </ul>
                    </li> -->
                </ul>
            </div>
            <!-- END Side Content -->
        </div>
        <!-- Sidebar Content -->
    </div>
    <!-- END Sidebar Scroll Container -->
</nav>
<!-- END Sidebar -->
