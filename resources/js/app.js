import './bootstrap';

$('.view-inline-project').on('click', function() {
    $('html, body').animate({scrollTop: $('.project-detail').offset().top}, 'slow');
    const title = $(this).attr('title').replace(' ', '-').toLowerCase();
});


// Livewire event