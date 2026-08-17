<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMatch Admin Dashboard</title>
        <link rel="icon" href="../assets/images/Title%20logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <style>
        html, body {
            overflow-x: hidden !important;
            overflow-y: auto !important;
            height: auto !important;
        }

        .dashboard-container {
            display: flex;
            width: 100vw;
            min-height: 100vh;
            align-items: stretch;
            overflow: hidden;
        }

        .dashboard-container > .sidebar {
            position: sticky;
            top: 0;
            left: 0;
            width: 260px;
            min-width: 260px;
            height: 100vh;
            max-height: 100vh;
            overflow: hidden;
            flex-shrink: 0;
            z-index: 20;
        }

        .dashboard-container > .main-content {
            flex: 1 1 auto;
            width: auto;
            max-width: none;
            margin-left: 0;
            padding: 0;
            min-width: 0;
            min-height: 100vh;
            height: auto;
            overflow: visible;
        }

        .dashboard-container > .main-content .top-header {
            position: sticky;
            top: 0;
            z-index: 10;
        }

        @media (max-width: 900px) {
            .dashboard-container {
                flex-direction: column;
                width: 100%;
            }

            .dashboard-container > .sidebar {
                width: 100%;
                min-width: 100%;
                height: auto;
                max-height: none;
                position: relative;
            }

            .dashboard-container > .main-content {
                min-height: auto;
            }
        }
    </style>
</head>
<body>

<div class="dashboard-container">
    <?php include '../components/sidebar.php'; ?>

    <main class="main-content">
        <header class="top-header">
            <div class="header-date">Monday, 17 August 2026</div>
            <div class="header-user-area">
                <div class="notification-bell">
                    <i class="bi bi-bell"></i>
                    <span class="badge-count">3</span>
                </div>
                <div class="user-profile">
                    <img class="avatar" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=300&auto=format&fit=crop&q=80" alt="Admin profile picture">
                    <div class="user-info">
                        <span class="user-name">Admin User</span>
                        <span class="user-role">Administrator</span>
                    </div>
                </div>
            </div>
        </header>

        <div class="content-body">
            <div class="dashboard-header-title">
                <h1>BookMatch Admin Dashboard</h1>
                <p>Welcome back, Admin.</p>
            </div>

            <!-- Top Metric Cards -->
            <div class="metrics-grid">
                <div class="metric-card">
                    <div class="metric-icon"><i class="bi bi-book-fill"></i></div>
                    <div class="metric-info">
                        <span class="metric-title">Total Books</span>
                        <h3 class="metric-value">1,248</h3>
                        <span class="metric-trend positive"><i class="bi bi-arrow-up-right"></i> 12.4% from last month</span>
                    </div>
                </div>
                <div class="metric-card">
                    <div class="metric-icon"><i class="bi bi-person-fill"></i></div>
                    <div class="metric-info">
                        <span class="metric-title">Registered Users</span>
                        <h3 class="metric-value">8,532</h3>
                        <span class="metric-trend positive"><i class="bi bi-arrow-up-right"></i> 8.7% from last month</span>
                    </div>
                </div>
                <div class="metric-card">
                    <div class="metric-icon"><i class="bi bi-lightbulb-fill"></i></div>
                    <div class="metric-info">
                        <span class="metric-title">Completed Quizzes</span>
                        <h3 class="metric-value">3,421</h3>
                        <span class="metric-trend positive"><i class="bi bi-arrow-up-right"></i> 15.3% from last month</span>
                    </div>
                </div>
                <div class="metric-card">
                    <div class="metric-icon"><i class="bi bi-chat-square-text-fill"></i></div>
                    <div class="metric-info">
                        <span class="metric-title">Community Reviews</span>
                        <h3 class="metric-value">6,214</h3>
                        <span class="metric-trend positive"><i class="bi bi-arrow-up-right"></i> 10.1% from last month</span>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="section-container">
                <h3>Quick Actions</h3>
                <div class="quick-actions-grid">
                    <button class="action-btn"><span class="icon"><i class="bi bi-journal-plus"></i></span> Add New Book</button>
                    <button class="action-btn"><span class="icon"><i class="bi bi-tag-fill"></i></span> Add New Genre</button>
                    <button class="action-btn"><span class="icon"><i class="bi bi-lightbulb"></i></span> Create Quiz</button>
                    <button class="action-btn"><span class="icon"><i class="bi bi-bar-chart-line"></i></span> View Reports</button>
                    <button class="action-btn"><span class="icon"><i class="bi bi-people-fill"></i></span> Manage Users</button>
                </div>
            </div>

            <!-- Main Layout Split (Left Content & Right Widgets) -->
            <div class="dashboard-split-layout">
                
                <div class="left-column">
                    <!-- Book Management Table -->
                    <div class="section-container">
                        <div class="section-header-flex">
                            <h3>Book Management</h3>
                        </div>
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Book Cover</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Genre</th>
                                    <th>Status</th>
                                    <th>Date Added</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="https://images.unsplash.com/photo-1543002588-bfa74002ed7e" class="table-book-cover" alt="The Atlas Six"></td>
                                    <td><strong>The Atlas Six</strong></td>
                                    <td>Olivie Blake</td>
                                    <td><span class="badge-tag">Fantasy</span></td>
                                    <td><span class="status-badge published">Published</span></td>
                                    <td>25 Jul 2026</td>
                                    <td>
                                        <button class="icon-action-btn" title="Edit"><i class="bi bi-pencil-fill"></i></button>
                                        <button class="icon-action-btn" title="Delete"><i class="bi bi-trash-fill"></i></button>
                                        <button class="icon-action-btn" title="Download"><i class="bi bi-download"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="https://images.unsplash.com/photo-1532012197267-da84d127e765" class="table-book-cover" alt="Fourth Wing"></td>
                                    <td><strong>Fourth Wing</strong></td>
                                    <td>Rebecca Yarros</td>
                                    <td><span class="badge-tag">Fantasy</span></td>
                                    <td><span class="status-badge published">Published</span></td>
                                    <td>24 Jul 2026</td>
                                    <td>
                                        <button class="icon-action-btn" title="Edit"><i class="bi bi-pencil-fill"></i></button>
                                        <button class="icon-action-btn" title="Delete"><i class="bi bi-trash-fill"></i></button>
                                        <button class="icon-action-btn" title="Download"><i class="bi bi-download"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="https://images.unsplash.com/photo-1512820790803-83ca734da794" class="table-book-cover" alt="The Night Circus"></td>
                                    <td><strong>The Night Circus</strong></td>
                                    <td>Erin Morgenstern</td>
                                    <td><span class="badge-tag">Fantasy</span></td>
                                    <td><span class="status-badge published">Published</span></td>
                                    <td>23 Jul 2026</td>
                                    <td>
                                        <button class="icon-action-btn" title="Edit"><i class="bi bi-pencil-fill"></i></button>
                                        <button class="icon-action-btn" title="Delete"><i class="bi bi-trash-fill"></i></button>
                                        <button class="icon-action-btn" title="Download"><i class="bi bi-download"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f" class="table-book-cover" alt="The Priory"></td>
                                    <td><strong>The Priory of the Orange Tree</strong></td>
                                    <td>Samantha Shannon</td>
                                    <td><span class="badge-tag">Fantasy</span></td>
                                    <td><span class="status-badge draft">Draft</span></td>
                                    <td>22 Jul 2026</td>
                                    <td>
                                        <button class="icon-action-btn" title="Edit"><i class="bi bi-pencil-fill"></i></button>
                                        <button class="icon-action-btn" title="Delete"><i class="bi bi-trash-fill"></i></button>
                                        <button class="icon-action-btn" title="Download"><i class="bi bi-download"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="table-footer-link">
                            <a href="#">View All Books →</a>
                        </div>
                    </div>

                    <!-- Recent Activity Section -->
                    <div class="section-container">
                        <div class="section-header-flex">
                            <h3>Recent Activity</h3>
                            <a href="#" class="view-all-link">View All Activity →</a>
                        </div>
                        <div class="activity-grid">
                            <div class="activity-item">
                                <span class="activity-icon"><i class="bi bi-journal-bookmark"></i></span>
                                <p><strong>New Book Added</strong><br>"The Serpent & the Wings of Night" by Carissa Broadbent</p>
                                <span class="activity-time">2 minutes ago</span>
                            </div>
                            <div class="activity-item">
                                <span class="activity-icon"><i class="bi bi-tag"></i></span>
                                <p><strong>Genre Updated</strong><br>"Romantasy" genre was updated</p>
                                <span class="activity-time">15 minutes ago</span>
                            </div>
                            <div class="activity-item">
                                <span class="activity-icon"><i class="bi bi-person-plus"></i></span>
                                <p><strong>New User Registered</strong><br>Sophia L. joined BookMatch</p>
                                <span class="activity-time">1 hour ago</span>
                            </div>
                            <div class="activity-item">
                                <span class="activity-icon"><i class="bi bi-archive"></i></span>
                                <p><strong>Book Archived</strong><br>"The Shadows Between Us" was archived</p>
                                <span class="activity-time">2 hours ago</span>
                            </div>
                            <div class="activity-item">
                                <span class="activity-icon"><i class="bi bi-chat-dots"></i></span>
                                <p><strong>Review Awaiting Approval</strong><br>New review for "Six of Crows"</p>
                                <span class="activity-time">3 hours ago</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Sidebar Widgets Column -->
                <div class="right-column">
                    <!-- Recent Notifications -->
                    <div class="widget-card">
                        <div class="widget-header">
                            <h4>Recent Notifications</h4>
                            <a href="#">View All</a>
                        </div>
                        <ul class="notification-list">
                            <li>
                                <span class="dot"></span>
                                <div>
                                    <p>New review submitted for <strong>The Way of Kings</strong></p>
                                    <small>2 minutes ago</small>
                                </div>
                            </li>
                            <li>
                                <span class="dot"></span>
                                <div>
                                    <p>User reported a review</p>
                                    <small>1 hour ago</small>
                                </div>
                            </li>
                            <li>
                                <span class="dot"></span>
                                <div>
                                    <p>Quiz "Mood Match" reached 1000+ completions!</p>
                                    <small>3 hours ago</small>
                                </div>
                            </li>
                            <li>
                                <span class="dot"></span>
                                <div>
                                    <p>New user registration spike +43% this week</p>
                                    <small>5 hours ago</small>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Pending Reviews -->
                    <div class="widget-card pending-box">
                        <div class="widget-header">
                            <h4>Pending Reviews</h4>
                            <a href="#">View All</a>
                        </div>
                        <div class="pending-content">
                            <span class="pending-number">12</span>
                            <p>reviews awaiting approval</p>
                        </div>
                    </div>

                    <!-- Low Rated Books -->
                    <div class="widget-card">
                        <div class="widget-header">
                            <h4>Low Rated Books</h4>
                            <a href="#">View All</a>
                        </div>
                        <div class="low-rated-books-grid">
                            <div>
                                <img src="https://images.unsplash.com/photo-1543002588-bfa74002ed7e" alt="Book">
                                <span><i class="bi bi-star-fill text-warning"></i> 2.6</span>
                            </div>
                            <div>
                                <img src="https://images.unsplash.com/photo-1532012197267-da84d127e765" alt="Book">
                                <span><i class="bi bi-star-fill text-warning"></i> 2.8</span>
                            </div>
                            <div>
                                <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794" alt="Book">
                                <span><i class="bi bi-star-fill text-warning"></i> 3.1</span>
                            </div>
                        </div>
                    </div>

                    <!-- Most Popular Genres -->
                    <div class="widget-card">
                        <div class="widget-header">
                            <h4>Most Popular Genres</h4>
                            <a href="#">View All</a>
                        </div>
                        <div class="genre-progress-list">
                            <div class="genre-row"><span>Fantasy</span> <div class="bar" style="--width: 90%;"></div> <small>2,543</small></div>
                            <div class="genre-row"><span>Romantasy</span> <div class="bar" style="--width: 75%;"></div> <small>1,982</small></div>
                            <div class="genre-row"><span>Mystery</span> <div class="bar" style="--width: 50%;"></div> <small>1,245</small></div>
                            <div class="genre-row"><span>Thriller</span> <div class="bar" style="--width: 35%;"></div> <small>932</small></div>
                            <div class="genre-row"><span>Historical Fiction</span> <div class="bar" style="--width: 25%;"></div> <small>621</small></div>
                        </div>
                    </div>

                    <!-- Quick Statistics -->
                    <div class="widget-card">
                        <div class="widget-header">
                            <h4>Quick Statistics</h4>
                        </div>
                        <div class="quick-stats-row">
                            <div><span><i class="bi bi-gear-fill"></i></span><strong>98%</strong><small>System Uptime</small></div>
                            <div><span><i class="bi bi-journal-text"></i></span><strong>1.2k</strong><small>Books This Month</small></div>
                            <div><span><i class="bi bi-tools"></i></span><strong>24</strong><small>Active Quizzes</small></div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </main>
</div>

<script src="../assets/js/main.js"></script>
</body>
</html>