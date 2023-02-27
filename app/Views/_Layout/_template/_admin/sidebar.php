<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed bg-light" href="<?= base_url(); ?>">
                <i class="bi bi-house-door"></i>
                <span>HOME</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <?php if (in_groups('SuperAdmin') || in_groups('Admin')) :; ?>
            <li class="nav-heading">Data</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/data/geojson">
                    <i class="bi bi-archive"></i>
                    <span>GeoJson</span>
                </a>

                <a class="nav-link collapsed" href="/admin/data/kafe">
                    <i class="bi bi-building"></i>
                    <span>KV</span>
                </a>

                <a class="nav-link collapsed" href="/admin/pending">
                    <i class="bi bi-hourglass"></i>
                    <span>Pending</span>
                </a>
            </li>
        <?php endif ?>

        <li class="nav-heading">Setting</li>

        <?php if (in_groups('SuperAdmin') || in_groups('Admin')) :; ?>
            <a class="nav-link collapsed" href="/user/manajemen">
                <i class="bi bi-person-lines-fill"></i>
                <span>User Management</span>
            </a>
        <?php endif ?>

        <a class="nav-link collapsed" href="/user/list">
            <i class="bi bi-person-lines-fill"></i>
            <span>User List</span>
        </a>

        <?php if (in_groups('SuperAdmin') || in_groups('Admin')) :; ?>
            <a class="nav-link collapsed" href="/admin/setting">
                <i class="bi bi-sliders2"></i>
                <span>Setting Map View</span>
            </a>
        <?php endif ?>

        <a class="nav-link collapsed" href="/contact">
            <i class="bi bi-envelope"></i>
            <span>Contact</span>
        </a>
        <!-- End Contact Page Nav -->

    </ul>

</aside><!-- End Sidebar-->