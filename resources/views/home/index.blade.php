 @extends('layouts.app')

    @section('title', 'Dashboard')

    @section('content')
    
    <!-- css -->
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @endpush

        <!-- Page Content (will be replaced by specific pages) -->
        <div id="page-content">
            <!-- Content loaded here -->
        </div>
    
    <script>
        // Set active menu item based on current page
        document.addEventListener('DOMContentLoaded', function() {
            const currentPage = window.location.pathname.split('/').pop() || 'index.html';
            const menuItems = document.querySelectorAll('.sidebar-menu a');
            menuItems.forEach(item => {
                if (item.getAttribute('href') === currentPage) {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });
        });
    </script>
@endsection
