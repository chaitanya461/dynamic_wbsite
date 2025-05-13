<?php 
require_once 'config.php';
require_once 'includes/auth_functions.php';

if(!isLoggedIn()) {
    header("Location: login.php");
    exit;
}

// Get user role from session (assuming you've stored it during login)
$userRole = $_SESSION['role'] ?? 'student';
?>
<?php include 'includes/header.php'; ?>

<div class="school-dashboard">
    <div class="row">
        <!-- Sidebar Navigation -->
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h5>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <img src="assets/images/user-icon.png" alt="Profile" class="rounded-circle" width="80">
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="dashboard.php"><i class="bi bi-speedometer2"></i> Dashboard</a>
                        </li>
                        <?php if($userRole === 'student'): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="my_courses.php"><i class="bi bi-book"></i> My Courses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="grades.php"><i class="bi bi-bar-chart"></i> Grades</a>
                            </li>
                        <?php elseif($userRole === 'teacher'): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="my_classes.php"><i class="bi bi-people"></i> My Classes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="attendance.php"><i class="bi bi-clipboard-check"></i> Attendance</a>
                            </li>
                        <?php elseif($userRole === 'admin'): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="manage_users.php"><i class="bi bi-person-gear"></i> User Management</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="school_settings.php"><i class="bi bi-gear"></i> School Settings</a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php"><i class="bi bi-person"></i> My Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="col-md-9">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">School Dashboard</h4>
                </div>
                <div class="card-body">
                    <?php if($userRole === 'student'): ?>
                        <div class="alert alert-info">
                            <h5><i class="bi bi-mortarboard"></i> Student Portal</h5>
                            <p>View your courses, assignments, and grades.</p>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="card text-white bg-success h-100">
                                    <div class="card-body">
                                        <h6 class="card-title">Current Courses</h6>
                                        <p class="display-4">5</p>
                                        <a href="my_courses.php" class="text-white">View Courses</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card text-white bg-warning h-100">
                                    <div class="card-body">
                                        <h6 class="card-title">Pending Assignments</h6>
                                        <p class="display-4">3</p>
                                        <a href="assignments.php" class="text-white">View Assignments</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card text-white bg-info h-100">
                                    <div class="card-body">
                                        <h6 class="card-title">Upcoming Events</h6>
                                        <p class="display-4">2</p>
                                        <a href="calendar.php" class="text-white">View Calendar</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php elseif($userRole === 'teacher'): ?>
                        <div class="alert alert-info">
                            <h5><i class="bi bi-person-badge"></i> Teacher Portal</h5>
                            <p>Manage your classes, take attendance, and submit grades.</p>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="card text-white bg-success h-100">
                                    <div class="card-body">
                                        <h6 class="card-title">Active Classes</h6>
                                        <p class="display-4">4</p>
                                        <a href="my_classes.php" class="text-white">View Classes</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card text-white bg-warning h-100">
                                    <div class="card-body">
                                        <h6 class="card-title">Assignments to Grade</h6>
                                        <p class="display-4">12</p>
                                        <a href="grading.php" class="text-white">Grade Assignments</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card text-white bg-info h-100">
                                    <div class="card-body">
                                        <h6 class="card-title">Student Messages</h6>
                                        <p class="display-4">5</p>
                                        <a href="messages.php" class="text-white">View Messages</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php elseif($userRole === 'admin'): ?>
                        <div class="alert alert-info">
                            <h5><i class="bi bi-shield-lock"></i> Admin Portal</h5>
                            <p>Manage school settings, users, and system configuration.</p>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="card text-white bg-success h-100">
                                    <div class="card-body">
                                        <h6 class="card-title">Total Students</h6>
                                        <p class="display-4">247</p>
                                        <a href="student_management.php" class="text-white">Manage Students</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card text-white bg-warning h-100">
                                    <div class="card-body">
                                        <h6 class="card-title">Total Teachers</h6>
                                        <p class="display-4">18</p>
                                        <a href="staff_management.php" class="text-white">Manage Staff</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card text-white bg-info h-100">
                                    <div class="card-body">
                                        <h6 class="card-title">System Alerts</h6>
                                        <p class="display-4">3</p>
                                        <a href="system_alerts.php" class="text-white">View Alerts</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Announcements Section -->
                    <div class="mt-4">
                        <h5><i class="bi bi-megaphone"></i> School Announcements</h5>
                        <div class="list-group">
                            <div class="list-group-item">
                                <h6>Parent-Teacher Meetings</h6>
                                <small class="text-muted">Posted: May 15, 2023</small>
                                <p>All parent-teacher meetings will be held next week from Monday to Wednesday.</p>
                            </div>
                            <div class="list-group-item">
                                <h6>Summer Break Schedule</h6>
                                <small class="text-muted">Posted: May 10, 2023</small>
                                <p>School will be closed for summer break from June 15 to August 15.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
