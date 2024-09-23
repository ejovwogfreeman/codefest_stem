<?php

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $userId = $user['user_id'];
}

?>



<aside id="sidebar" class="sidebar">
    <div class="sidebar-header">
        <img src="img/logo2.png" alt="" width="120px" style="margin-left: 10px;">
        <button id="closeBtn" class="close-btn">&times;</button>
    </div>
    <ul class="sidebar-menu">
        <li>
            <a href="http://localhost/codefest_stem/admin/">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 20 20">
                    <path fill="currentColor" d="M3.76 16h12.48A7.998 7.998 0 0 0 10 3a7.998 7.998 0 0 0-6.24 13M10 4c.55 0 1 .45 1 1s-.45 1-1 1s-1-.45-1-1s.45-1 1-1M6 6c.55 0 1 .45 1 1s-.45 1-1 1s-1-.45-1-1s.45-1 1-1m8 0c.55 0 1 .45 1 1s-.45 1-1 1s-1-.45-1-1s.45-1 1-1m-5.37 5.55L12 7v6c0 1.1-.9 2-2 2s-2-.9-2-2c0-.57.24-1.08.63-1.45M4 10c.55 0 1 .45 1 1s-.45 1-1 1s-1-.45-1-1s.45-1 1-1m12 0c.55 0 1 .45 1 1s-.45 1-1 1s-1-.45-1-1s.45-1 1-1m-5 3c0-.55-.45-1-1-1s-1 .45-1 1s.45 1 1 1s1-.45 1-1" />
                </svg>
                <span>Admin Dashboard</span>
            </a>
        </li>
        <li>
            <a href="http://localhost/codefest_stem/admin/upload_blog">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="-2 -2 24 24">
                    <path fill="currentColor" d="m5.72 14.456l1.761-.508l10.603-10.73a.456.456 0 0 0-.003-.64l-.635-.642a.443.443 0 0 0-.632-.003L6.239 12.635zM18.703.664l.635.643c.876.887.884 2.318.016 3.196L8.428 15.561l-3.764 1.084a.9.9 0 0 1-1.11-.623a.9.9 0 0 1-.002-.506l1.095-3.84L15.544.647a2.215 2.215 0 0 1 3.159.016zM7.184 1.817c.496 0 .898.407.898.909a.903.903 0 0 1-.898.909H3.592c-.992 0-1.796.814-1.796 1.817v10.906c0 1.004.804 1.818 1.796 1.818h10.776c.992 0 1.797-.814 1.797-1.818v-3.635c0-.502.402-.909.898-.909s.898.407.898.91v3.634c0 2.008-1.609 3.636-3.593 3.636H3.592C1.608 19.994 0 18.366 0 16.358V5.452c0-2.007 1.608-3.635 3.592-3.635z" />
                </svg>
                <span>Upload Blog</span>
            </a>
        </li>
        <li>
            <a href="http://localhost/codefest_stem/admin/appointments">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 15 15">
                    <path fill="none" stroke="currentColor" d="M3.5 0v5m8-5v5M3 7.5h3m6 0H9m-6 3h3m3 0h3m-10.5-8h12a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1h-12a1 1 0 0 1-1-1v-10a1 1 0 0 1 1-1Z" />
                </svg>
                <span>All Appointments</span>
            </a>
        </li>
        <li>
            <a href="http://localhost/codefest_stem/logout">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M14.945 1.25c-1.367 0-2.47 0-3.337.117c-.9.12-1.658.38-2.26.981c-.524.525-.79 1.17-.929 1.928c-.135.737-.161 1.638-.167 2.72a.75.75 0 0 0 1.5.008c.006-1.093.034-1.868.142-2.457c.105-.566.272-.895.515-1.138c.277-.277.666-.457 1.4-.556c.755-.101 1.756-.103 3.191-.103h1c1.436 0 2.437.002 3.192.103c.734.099 1.122.28 1.4.556c.276.277.456.665.555 1.4c.102.754.103 1.756.103 3.191v8c0 1.435-.001 2.436-.103 3.192c-.099.734-.279 1.122-.556 1.399s-.665.457-1.399.556c-.755.101-1.756.103-3.192.103h-1c-1.435 0-2.436-.002-3.192-.103c-.733-.099-1.122-.28-1.399-.556c-.243-.244-.41-.572-.515-1.138c-.108-.589-.136-1.364-.142-2.457a.75.75 0 1 0-1.5.008c.006 1.082.032 1.983.167 2.72c.14.758.405 1.403.93 1.928c.601.602 1.36.86 2.26.982c.866.116 1.969.116 3.336.116h1.11c1.368 0 2.47 0 3.337-.116c.9-.122 1.658-.38 2.26-.982s.86-1.36.982-2.26c.116-.867.116-1.97.116-3.337v-8.11c0-1.367 0-2.47-.116-3.337c-.121-.9-.38-1.658-.982-2.26s-1.36-.86-2.26-.981c-.867-.117-1.97-.117-3.337-.117z" />
                    <path fill="currentColor" d="M15 11.25a.75.75 0 0 1 0 1.5H4.027l1.961 1.68a.75.75 0 1 1-.976 1.14l-3.5-3a.75.75 0 0 1 0-1.14l3.5-3a.75.75 0 1 1 .976 1.14l-1.96 1.68z" />
                </svg>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</aside>
<div id="overlay" class="overlay"></div>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .sidebar {
        width: 250px;
        background-color: #333;
        color: #fff;
        position: fixed;
        top: 0;
        left: -250px;
        height: 100%;
        transition: left 0.3s;
        display: flex;
        flex-direction: column;
        z-index: 1000000;
        overflow-y: scroll;
    }

    .sidebar-header {
        padding: 10px;
        background: #444;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .sidebar-menu {
        list-style-type: none;
        padding: 0;
        margin: 0;
        flex: 1;
    }

    .sidebar-menu li a {
        color: #fff;
        text-decoration: none;
        padding: 20px;
        display: flex;
        align-items: center;
    }

    .sidebar-menu li a span {
        margin-left: 5px;
    }

    .sidebar-menu li a:hover {
        background: #555;
    }

    .close-btn {
        background: none;
        border: none;
        color: #fff;
        font-size: 30px;
        cursor: pointer;
    }

    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 10000;
    }

    .overlay.show {
        display: block;
    }

    .menu-btn {
        background: none;
        border: none;
        font-size: 24px;
        cursor: pointer;
    }

    main {
        padding: 20px;
    }

    @media (max-width: 768px) {
        .sidebar {
            width: 200px;
            left: -200px;
        }

        .content {
            margin-left: 0;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuBtn = document.getElementById('menuBtn');
        const closeBtn = document.getElementById('closeBtn');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        function openSidebar() {
            sidebar.style.left = '0';
            overlay.classList.add('show');
        }

        function closeSidebar() {
            sidebar.style.left = '-250px';
            overlay.classList.remove('show');
        }

        menuBtn.addEventListener('click', openSidebar);
        closeBtn.addEventListener('click', closeSidebar);
        overlay.addEventListener('click', closeSidebar);

    });
</script>