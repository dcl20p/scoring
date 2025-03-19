import './bootstrap';
import SimpleBar from 'simplebar';
import 'simplebar/dist/simplebar.css';
import 'preline/src/plugins/overlay';
import 'preline/src/plugins/dropdown';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// Kích hoạt SimpleBar cho tất cả các phần tử có data-simplebar
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('[data-simplebar]').forEach(el => new SimpleBar(el));
});


