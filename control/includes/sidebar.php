<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Charts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./chartjs.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Statistics</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./flot.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Flot</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Mange Website
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./edit-faq.php" class="nav-link">
                  <i class="fa fa-question nav-icon"></i>
                  <p>Edit FAQ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./view-users.php" class="nav-link">
                  <i class="nav-icon far fa-user"></i>
                  <p>View Users</p>
                </a>
              </li>
              
              <li class='nav-item'>
                <a href='./view-admins.php' class='nav-link'>
                  <i class='nav-icon fas fa-users-cog'></i>
                  <p>View Admins</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="./view-complaints.php" class="nav-link">
                <i class="nav-icon fas fa-exclamation-triangle"></i>
                  <p>View Complaints</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./view-groups.php" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                  <p>View Groups</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./view-blogs.php" class="nav-link">
                <i class="fas fa-pencil-alt nav-icon"></i>
                  <p>Blog</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">MORE</li>

          <li class='nav-item'>
            <a href='./calendar.php' class='nav-link'>
              <i class='nav-icon far fa-calendar-alt'></i>
              <p>
                Calendar
                <span class='badge badge-info right'>2</span>
              </p>
            </a>
          </li>
              <?php
              if(true) // if($level[5] || $level[1] || true)
              {
                print '<li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-envelope"></i>
                  <p>
                    Messages
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./mailbox.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Inbox<span class="badge badge-info right"><?php echo $total_messages; ?></span></p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./compose.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Compose Admins</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./compose-users.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Compose Users</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./read-mail.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Read</p>
                    </a>
                  </li>
                </ul>
              </li>';
              }
              ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./contacts.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contacts</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Extras
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./register.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./forgot-password.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Forgot Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./recover-password.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Recover Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./signout.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sign Out</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>