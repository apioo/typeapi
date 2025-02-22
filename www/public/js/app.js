
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.navbar-burger').forEach( function (el) {
        el.addEventListener('click', function () {
            var target = el.dataset.target;
            var targetEl = document.getElementById(target);
            el.classList.toggle('is-active');
            targetEl.classList.toggle('is-active');
        });
    });
});
