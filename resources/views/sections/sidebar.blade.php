<div class="position-sticky pt-3">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
                <span data-feather="home"></span>
                Dashboard
            </a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                <span data-feather="users"></span>
                Kişi
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdown01">
                <li><a class="dropdown-item" href="{{route('person.create')}}"><span data-feather="plus"></span>Ekle</a></li>
                <li><a class="dropdown-item" href="{{route('person.index')}}"><span data-feather="list"></span>Listele</a></li>
            </ul>
        </li>
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Saved reports</span>
        <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
        </a>
    </h6>
    <ul class="nav flex-column mb-2">
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Current month
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Last quarter
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Social engagement
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Year-end sale
            </a>
        </li>
    </ul>
</div>
