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
              <!-- <li class="nav-item">
                <a href="./view-blogs.php" class="nav-link">
                <i class="fas fa-pencil-alt nav-icon"></i>
                  <p>Blog</p>
                </a>
              </li> -->
            </ul>
          </li>
          <li class="nav-header">MORE</li>

              <li class="nav-item">
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
                    <a href="./view-tickets.php" class="nav-link">
                      <i class="fas fa-ticket-alt nav-icon"></i>
                      <p>View Tickets</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./view-conversations.php" class="nav-link">
                    <i class="fas fa-scroll nav-icon"></i>
                      <p>View Conversations</p>
                    </a>
                  </li>
                  <?php
                    if($type == 3)
                    {
                      print '
                        <li class="nav-item">
                        <a href="./view-reports.php" class="nav-link">
                        <i class="nav-icon fas fa-exclamation-triangle"></i>
                        <p>View Reports</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="./view-penalties.php" class="nav-link">
                        <i class="nav-icon fas fa-fire"></i>
                        <p>View Penalties</p>
                        </a>
                      </li>
                      ';
                    }
                  
                  ?>
                </ul>
              </li>
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
                <a href="../edit-profile.php" class="nav-link">
                  <i class="fas fa-cog nav-icon"></i>
                  <p>Edit Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./register.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register An Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?signout" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sign Out</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>