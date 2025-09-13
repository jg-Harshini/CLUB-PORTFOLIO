// Admin Security JavaScript
// Prevents back button access after logout and enhances security

(function() {
    'use strict';
    
    // Prevent back button after logout
    function preventBackButton() {
        window.history.forward();
        window.history.forward();
        window.onunload = function() { null };
    }
    
    // Check if user is on login page and came from logout
    if (window.location.pathname.includes('/login')) {
        // Disable back button
        preventBackButton();
        
        // Clear any cached data
        if ('caches' in window) {
            caches.keys().then(function(names) {
                names.forEach(function(name) {
                    caches.delete(name);
                });
            });
        }
        
        // Clear session storage
        if (typeof(Storage) !== "undefined") {
            sessionStorage.clear();
        }
    }
    
    // For admin pages - auto logout on inactivity
    if (window.location.pathname.includes('/superadmin') || 
        window.location.pathname.includes('/clubadmin') || 
        window.location.pathname.includes('/hod')) {
        
        let inactivityTimer;
        const TIMEOUT_DURATION = 30 * 60 * 1000; // 30 minutes
        
        function resetInactivityTimer() {
            clearTimeout(inactivityTimer);
            inactivityTimer = setTimeout(function() {
                alert('Session expired due to inactivity. You will be redirected to login.');
                window.location.href = '/tce/login';
            }, TIMEOUT_DURATION);
        }
        
        // Reset timer on user activity
        document.addEventListener('mousemove', resetInactivityTimer);
        document.addEventListener('keypress', resetInactivityTimer);
        document.addEventListener('click', resetInactivityTimer);
        
        // Start the timer
        resetInactivityTimer();
        
        // Prevent right-click context menu on admin pages
        document.addEventListener('contextmenu', function(e) {
            e.preventDefault();
        });
        
        // Disable F12, Ctrl+Shift+I, Ctrl+U (basic protection)
        document.addEventListener('keydown', function(e) {
            if (e.key === 'F12' || 
                (e.ctrlKey && e.shiftKey && e.key === 'I') ||
                (e.ctrlKey && e.key === 'u')) {
                e.preventDefault();
            }
        });
    }
    
    // Force reload on browser back/forward
    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    });
    
})();