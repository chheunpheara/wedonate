import './bootstrap';

$('.view-inline-project').on('click', function () {
    $('html, body').animate({ scrollTop: $('.project-detail').offset().top - 60 }, 'slow');
    const title = $(this).attr('title').replace(' ', '-').toLowerCase();
});