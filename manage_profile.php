<?php
namespace VMS;

use \VMS\Member;

session_start();

if (!empty($_SESSION["adminId"])) {
    require_once "Member.php";
    $admin = new Member();
    $adminResult = $admin->getAdminById($_SESSION["adminId"]);
}

$departments = array("COMP" => "Computer Engineering", "MECH" => "Mechanical Engineering");

$username = $adminResult[0]["username"];
$firstname = $adminResult[0]["first_name"];
$lastname = $adminResult[0]["last_name"];
$fullname = ucfirst($firstname) . " " . ucfirst($lastname);
$department = $departments[$adminResult[0]["department"]];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Use this font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/manage_profile_style.css">
    <link rel="icon" href="img/admin_icon.png">
    <script src="scripts/index.js"></script>
    <script src="scripts/manage_profile.js"></script>
    <title>Dashboard</title>
</head>
<body>
    <!-- Use desktop-hide class for mobile only content -->
    <!-- Use mobile-hide class for desktop only content -->
    <header id="header" class="back-blur">
        <!-- Container for logo -->
        <div class="logo-container">
            <a href="index.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="130.98" height="20.7" viewBox="0 0 130.98 20.7"><path class="logo-path" d="M12.93,0l7.71-20.01H15.78L10.26-4.62,4.71-20.01H-.15L7.59,0ZM29.76,0V-20.01H25.5V0ZM43.83.36c5.4,0,8.01-2.76,8.01-6.42,0-7.47-11.49-5.34-11.49-8.52,0-1.2,1.02-2.01,2.85-2.01a8.6,8.6,0,0,1,5.82,2.19l2.37-3.12a11.13,11.13,0,0,0-7.8-2.79c-4.71,0-7.59,2.76-7.59,6.09,0,7.53,11.52,5.1,11.52,8.64,0,1.14-1.14,2.22-3.48,2.22a8.773,8.773,0,0,1-6.36-2.7L35.37-2.82A11.406,11.406,0,0,0,43.83.36ZM61.98,0V-20.01H57.72V0ZM77.85,0V-16.26h5.82v-3.75H67.71v3.75h5.85V0ZM98.16.36A10.054,10.054,0,0,0,108.63-9.99,10.054,10.054,0,0,0,98.16-20.34,10.047,10.047,0,0,0,87.72-9.99,10.047,10.047,0,0,0,98.16.36Zm0-3.78c-3.69,0-6.06-2.85-6.06-6.57,0-3.75,2.37-6.57,6.06-6.57s6.09,2.82,6.09,6.57C104.25-6.27,101.85-3.42,98.16-3.42ZM130.83,0l-4.5-7.62a5.742,5.742,0,0,0,4.38-5.94c0-3.72-2.55-6.45-6.72-6.45h-9.36V0h4.26V-7.11h3.12L125.94,0Zm-7.47-10.86h-4.47v-5.4h4.47a2.717,2.717,0,0,1,3,2.7A2.717,2.717,0,0,1,123.36-10.86Z" transform="translate(0.15 20.34)"/></svg>
            </a>
        </div>
        <!-- Navigation Bar -->
        <nav class="mobile-hide">
            <div class="nav-links">
                <a class="nav-link" href="index.php">DASHBOARD</a>
                <a class="nav-link" href="visitors.php">VISITORS</a>
                <a class="nav-link" href="appointments.php">APPOINTMENTS</a>
                <a class="nav-link" href="calendar.php">CALENDAR</a>
                <a class="nav-link" href="messages.php">MESSAGES</a>
                <div class="line"></div>
            </div>
        </nav>
        <!-- Right Control Panel (Has Add Visitor button, View Messages button, View Notifications button, View Profile Button) -->
        <div class="nav-right mobile-hide">
            <!-- Use 'action-btn' class for other buttons also -->
            <div class="action-btn">
                <a href="#" id="add-visitor" onclick="showPopup();">ADD VISITOR</a>
            </div>
            <div class="messages">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="19" viewBox="0 0 512 390"><g transform="translate(0 -61)"><path d="M467,61H45A45.077,45.077,0,0,0,0,106V406a45.073,45.073,0,0,0,45,45H467a45.073,45.073,0,0,0,45-45V106A45.073,45.073,0,0,0,467,61Zm-6.214,30L256.954,294.833,51.359,91ZM30,399.788V112.069l144.479,143.24ZM51.213,421l144.57-144.57,50.657,50.222a15,15,0,0,0,21.167-.046L317,277.213,460.787,421ZM482,399.787,338.213,256,482,112.212Z"/></g></svg>
            </div>
            <div class="notifications">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" viewBox="0 0 25 31.595"><path d="M77.918,25.143a4.909,4.909,0,0,1-1.492-2.031c-1.285-2.72-1.555-6.552-1.555-9.288,0-.012,0-.024,0-.036a8.964,8.964,0,0,0-5.277-8.13V3.52A3.521,3.521,0,0,0,66.08,0h-.291a3.521,3.521,0,0,0-3.514,3.52V5.658A8.965,8.965,0,0,0,57,13.824c0,2.736-.27,6.568-1.555,9.288a4.909,4.909,0,0,1-1.492,2.031.9.9,0,0,0-.494,1.023.942.942,0,0,0,.928.723h6.785a4.766,4.766,0,0,0,9.531,0h6.785a.942.942,0,0,0,.928-.723A.9.9,0,0,0,77.918,25.143ZM64.126,3.52a1.666,1.666,0,0,1,1.663-1.665h.291A1.666,1.666,0,0,1,67.742,3.52V5.057a8.965,8.965,0,0,0-3.616,0V3.52ZM65.934,29.74a2.921,2.921,0,0,1-2.914-2.85h5.828A2.921,2.921,0,0,1,65.934,29.74Zm3.727-4.7H56.494a9.7,9.7,0,0,0,.485-.851c1.241-2.446,1.87-5.932,1.87-10.36a7.085,7.085,0,1,1,14.171,0c0,.011,0,.023,0,.034,0,4.41.633,7.884,1.87,10.323a9.71,9.71,0,0,0,.485.851Z" transform="translate(-53.434 0)"/></svg>
            </div>
            <div class="profile" onclick="toggle_visibility('dropdown-profile');">
                <img class="dropbtn" src="img/profile_pic.svg" alt="">
            </div>
        </div>
        <!-- Hamburger Menu (Only for Mobile View) -->
        <div class="burger desktop-hide" onclick="toggle_visibility('hamburger-menu');">
            <svg xmlns="http://www.w3.org/2000/svg" width="25.426" height="19.043" viewBox="0 0 25.426 19.043"><defs><style>.a{fill:#646d82;}</style></defs><g transform="translate(0 -64.267)"><path class="a" d="M23.086,64.267H2.34a2.341,2.341,0,0,0,0,4.681H23.086a2.341,2.341,0,0,0,0-4.681Z"/><path class="a" d="M23.086,208.867H2.34a2.341,2.341,0,0,0,0,4.681H23.086a2.341,2.341,0,0,0,0-4.681Z" transform="translate(0 -137.419)"/><path class="a" d="M23.086,353.467H2.34a2.341,2.341,0,0,0,0,4.681H23.086a2.341,2.341,0,0,0,0-4.681Z" transform="translate(0 -274.838)"/></g></svg>
        </div>
    </header>
    <!-- Add 'dropdown' class name to all dropdowns -->
    <div id="dropdown-profile" class="dropdown back-blur">
        <div class="dropdown-header">
            <p>Signed in as <b><?php echo $username ?></b></p>
            <div role="none" class="dropdown-divider"></div>
        </div>
        <ul>
            <li id="stat">
                <a href="#" style="pointer-events: none;">STATUS:</a>
                <label for="" id="status">active</label>
                <label class="switch">
                    <input type="checkbox" id="checkstatus" onclick="updateStatus(this)">
                    <span class="slider"></span>
                </label>
            </li>
            <li onclick="location.href='manage_profile.php';">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20.999" viewBox="0 0 21 20.999"><defs><style>.a{fill:#646d82;}</style></defs><g transform="translate(0 -0.011)"><g transform="translate(0 0.011)"><path class="a" d="M18.086,3.242A10.5,10.5,0,1,0,3.231,18.065c.006.006.008.015.014.02.061.058.127.108.188.164.169.15.337.305.515.45.1.075.194.15.292.219.168.125.336.25.511.366.119.075.242.15.364.225.162.1.323.2.49.285.142.075.286.139.43.208s.313.15.474.217.323.12.487.178.3.112.461.16c.177.053.358.094.538.139.15.037.3.079.45.109.207.041.417.067.627.1.13.018.256.043.388.056.343.034.69.052,1.039.052s.7-.019,1.039-.052c.131-.013.258-.038.388-.056.21-.029.42-.055.627-.1.15-.03.3-.075.45-.109.18-.044.361-.085.538-.139.157-.048.308-.106.461-.16s.327-.112.487-.178.316-.143.474-.217.289-.133.43-.208c.167-.089.328-.187.49-.285.122-.075.245-.143.364-.225.175-.115.343-.241.511-.366.1-.075.2-.142.292-.219.178-.142.346-.294.515-.45.061-.056.127-.106.188-.164.006-.005.008-.014.014-.02A10.484,10.484,0,0,0,18.086,3.242ZM16.4,17.28c-.136.12-.277.234-.42.344-.084.064-.168.128-.254.19-.136.1-.274.191-.414.28-.1.065-.206.128-.311.19q-.2.112-.4.225c-.12.061-.242.119-.365.176s-.259.118-.391.171-.274.1-.412.15-.253.088-.382.127c-.15.045-.307.082-.462.119-.121.028-.241.061-.364.085-.178.034-.359.058-.541.083-.1.013-.206.032-.31.043-.288.028-.58.044-.874.044s-.586-.016-.874-.044c-.1-.01-.207-.029-.31-.043-.182-.025-.364-.049-.541-.083-.123-.024-.243-.056-.364-.085-.155-.037-.31-.075-.462-.119-.128-.038-.255-.083-.382-.127s-.277-.1-.412-.15-.262-.112-.391-.171-.245-.115-.365-.176c-.136-.07-.27-.145-.4-.225-.1-.061-.209-.124-.311-.19-.14-.089-.278-.182-.414-.28-.086-.061-.17-.125-.254-.19-.142-.11-.283-.225-.42-.344-.033-.025-.063-.056-.1-.085a6.015,6.015,0,0,1,4.088-5.619,4.445,4.445,0,0,0,3.819,0,6.015,6.015,0,0,1,4.088,5.619C16.463,17.223,16.433,17.252,16.4,17.28ZM7.882,6.022a3,3,0,1,1,4.084,4.084.016.016,0,0,0-.013,0,3.177,3.177,0,0,1-.627.265c-.039.011-.075.026-.116.036-.075.02-.154.033-.231.046a3.037,3.037,0,0,1-.44.044h-.085a3.037,3.037,0,0,1-.44-.044c-.075-.013-.154-.027-.231-.046-.04-.01-.075-.025-.116-.036a3.174,3.174,0,0,1-.627-.265l-.013,0A3,3,0,0,1,7.882,6.022Zm9.943,9.686h0a7.535,7.535,0,0,0-4.014-5.168,4.5,4.5,0,1,0-6.628,0,7.535,7.535,0,0,0-4.014,5.168,9,9,0,1,1,14.656,0Z" transform="translate(0 -0.011)"/></g></g></svg>
                <a href="manage_profile.php">PROFILE</a>
            </li>
            <li>
                <a href="#">VIEW REQUESTS</a>
            </li>
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" width="21.572" height="21.572" viewBox="0 0 21.572 21.572"><defs><style>.a{fill:#646d82;}</style></defs><path class="a" d="M20.165,8.441H18.409a7.937,7.937,0,0,0-.574-1.387l1.24-1.24a1.409,1.409,0,0,0,0-1.991L17.749,2.5a1.442,1.442,0,0,0-1.99,0l-1.24,1.24a7.958,7.958,0,0,0-1.387-.574V1.407A1.409,1.409,0,0,0,11.724,0H9.848A1.409,1.409,0,0,0,8.441,1.407V3.163a7.973,7.973,0,0,0-1.387.574L5.813,2.5a1.409,1.409,0,0,0-1.99,0L2.5,3.823a1.41,1.41,0,0,0,0,1.99l1.24,1.241a7.958,7.958,0,0,0-.574,1.387H1.407A1.409,1.409,0,0,0,0,9.849v1.876a1.408,1.408,0,0,0,1.407,1.406H3.163a7.973,7.973,0,0,0,.574,1.387L2.5,15.759a1.409,1.409,0,0,0,0,1.99l1.327,1.328a1.41,1.41,0,0,0,1.99,0l1.241-1.24a7.958,7.958,0,0,0,1.387.574v1.755a1.409,1.409,0,0,0,1.407,1.407h1.876a1.409,1.409,0,0,0,1.407-1.407V18.409a7.958,7.958,0,0,0,1.387-.574l1.24,1.241a1.443,1.443,0,0,0,1.99,0l1.327-1.327a1.408,1.408,0,0,0,0-1.99l-1.24-1.241a7.958,7.958,0,0,0,.574-1.387h1.755a1.409,1.409,0,0,0,1.407-1.407V9.848A1.409,1.409,0,0,0,20.165,8.441Zm.469,3.283a.469.469,0,0,1-.469.469h-2.11a.469.469,0,0,0-.454.352,7.049,7.049,0,0,1-.752,1.816.47.47,0,0,0,.072.57l1.491,1.492a.471.471,0,0,1,0,.664l-1.327,1.327a.483.483,0,0,1-.664,0L14.93,16.922a.47.47,0,0,0-.57-.072,7.024,7.024,0,0,1-1.815.752.468.468,0,0,0-.351.453v2.11a.469.469,0,0,1-.469.469H9.848a.47.47,0,0,1-.469-.469v-2.11a.469.469,0,0,0-.352-.454,7.031,7.031,0,0,1-1.816-.752.464.464,0,0,0-.238-.065.469.469,0,0,0-.332.137L5.15,18.413a.47.47,0,0,1-.664,0L3.159,17.086a.47.47,0,0,1,0-.664L4.65,14.93a.468.468,0,0,0,.072-.57,7.041,7.041,0,0,1-.752-1.816.468.468,0,0,0-.453-.352H1.407a.47.47,0,0,1-.469-.469V9.848a.47.47,0,0,1,.469-.469h2.11a.469.469,0,0,0,.454-.352,7.031,7.031,0,0,1,.752-1.816.468.468,0,0,0-.072-.57L3.159,5.151a.47.47,0,0,1,0-.664L4.487,3.159a.47.47,0,0,1,.664,0L6.642,4.651a.468.468,0,0,0,.57.072,7.041,7.041,0,0,1,1.816-.752.469.469,0,0,0,.352-.454V1.407A.47.47,0,0,1,9.848.938h1.876a.469.469,0,0,1,.469.469v2.11a.469.469,0,0,0,.352.454,7.024,7.024,0,0,1,1.815.752.468.468,0,0,0,.57-.072l1.491-1.491a.482.482,0,0,1,.664,0l1.327,1.327a.471.471,0,0,1,0,.664L16.921,6.642a.469.469,0,0,0-.072.57A7.042,7.042,0,0,1,17.6,9.027a.468.468,0,0,0,.453.352h2.11a.469.469,0,0,1,.469.469Z"/><g transform="translate(6.565 6.565)"><path class="a" d="M116.221,112a4.221,4.221,0,1,0,4.221,4.221A4.226,4.226,0,0,0,116.221,112Zm0,7.5a3.283,3.283,0,1,1,3.283-3.283A3.286,3.286,0,0,1,116.221,119.5Z" transform="translate(-112 -112)"/></g></svg>
                <a href="#">SETTINGS</a>
            </li>
            <li onclick="location.href='admin_logout.php';">
                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18.94" viewBox="0 0 21 20.93"><defs><style>.a{fill:#646d82;}</style></defs><g transform="translate(0 -0.85)"><g transform="translate(0 0.85)"><path class="a" d="M12.3,20.036H3.075a.958.958,0,0,1-1.025-.872V3.466a.958.958,0,0,1,1.025-.872H12.3a.957.957,0,0,0,1.025-.872A.957.957,0,0,0,12.3.85H3.075A2.877,2.877,0,0,0,0,3.466v15.7A2.877,2.877,0,0,0,3.075,21.78H12.3a.883.883,0,1,0,0-1.744Z" transform="translate(0 -0.85)"/></g><g transform="translate(4.519 4.14)"><path class="a" d="M186.276,113.61l-6.232-6.15a1.025,1.025,0,1,0-1.439,1.46l4.453,4.4H171.125a1.025,1.025,0,0,0,0,2.05h11.934l-4.453,4.4a1.025,1.025,0,1,0,1.439,1.46l6.232-6.15a1.024,1.024,0,0,0,0-1.459Z" transform="translate(-170.1 -107.165)"/></g></g></svg>
                <a href="admin_logout.php">LOGOUT</a>
            </li>
        </ul>
    </div>
    <div id="hamburger-menu" class="menu back-blur desktop-hide">
        
    </div>
    <!-- Used for the header background -->
    <div class="nav-cover"></div>
    <div class="overlay back-blur"></div>
    <main>
        <h1>Manage Profile</h1>
        <form action="admin_update.php" method="POST" enctype="multipart/form-data" id="update-profile">
            <div class="admin-info">
                <div class="upload-profile-image">
                    <div class="text-center">
                        <div class="camera">
                            <svg class="camera-icon" enable-background="new 0 0 488.455 488.455" height="512" viewBox="0 0 488.455 488.455" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m287.396 216.317c23.845 23.845 23.845 62.505 0 86.35s-62.505 23.845-86.35 0-23.845-62.505 0-86.35 62.505-23.845 86.35 0"/><path d="m427.397 91.581h-42.187l-30.544-61.059h-220.906l-30.515 61.089-42.127.075c-33.585.06-60.925 27.429-60.954 61.029l-.164 244.145c0 33.675 27.384 61.074 61.059 61.074h366.338c33.675 0 61.059-27.384 61.059-61.059v-244.236c-.001-33.674-27.385-61.058-61.059-61.058zm-183.177 290.029c-67.335 0-122.118-54.783-122.118-122.118s54.783-122.118 122.118-122.118 122.118 54.783 122.118 122.118-54.783 122.118-122.118 122.118z"/></svg>
                        </div>
                        <img id="profile-picture" src="img/profile_pic.svg" alt="" style="width: 200px; height: 200px;">
                        <small class="form-text">Choose Image</small>
                        <input type="file" class="form-control-file" name="profile-upload" id="upload-profile">
                    </div>
                </div>
                <div class="details">
                    <div class="essential">
                        <div class="inline-info">
                            <h3><?php echo $fullname ?></h3>
                            <div class="admin-type">
                                <p>STAFF</p>
                            </div>
                        </div>
                        <p>Senior Lecturer</p>
                        <div class="status-label">
                            <div class="status-led"></div>
                            <label id="status-lbl">ACTIVE</label>
                        </div>
                    </div>
                    <div class="other">
                        <h3>Department</h3>
                        <p><?php echo $department ?></p>
                    </div>
                </div>
            </div>
            <div class="login-history">
                <p>Login History</p>
            </div>
            <div class="activities">
                <div class="activity-items">
                    <p>Total Approvals</p>
                    <label id="approval-count">57</label>
                </div>
                <div class="activity-items">
                    <p>Total Rejections</p>
                    <label id="approval-count">6</label>
                </div>
                <div class="activity-items">
                    <p>Total Blah</p>
                    <label id="blah-count">13</label>
                </div>
                <div class="activity-items">
                    <p>Total Blahblah</p>
                    <label id="blahblah-count">69</label>
                </div>
            </div>
            <div role="none" class="dropdown-divider divider"></div>
            <div class="profile-details">
                
            </div>
        </form>
    </main>
    <div class="add-visitor popup">
        <div class="popup-header">
            <p>Add Visitor</p>
            <svg id="close-btn" onclick="hidePopup()" xmlns="http://www.w3.org/2000/svg" width="24.146" height="24.146" viewBox="0 0 24.146 24.146"><defs><style>.circle{fill:none;stroke:#707070;stroke-width:2px;}.close{fill:#707070;}</style></defs><g transform="translate(-401.479 -18.479)"><g transform="translate(400.428 17.428)"><path id="circle" class="circle" d="M13.123,24.2A11.073,11.073,0,1,1,24.2,13.123,11.067,11.067,0,0,1,13.123,24.2Z"/></g><g transform="translate(408.761 25.761)"><path class="close" d="M171.835,170.386l-3.04-3.04,3.04-3.04a1.025,1.025,0,1,0-1.45-1.45l-3.04,3.04-3.04-3.04a1.025,1.025,0,1,0-1.45,1.45l3.04,3.04-3.04,3.04a1.025,1.025,0,1,0,1.45,1.45l3.04-3.04,3.04,3.04a1.025,1.025,0,1,0,1.45-1.45Z" transform="translate(-162.555 -162.556)"/></g></g></svg>
        </div>
    </div>
    <footer>
        <p>Copyright &copy; 2020 Bitlasagna.</p>
    </footer>
</body>
</html>
