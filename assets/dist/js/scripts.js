
$(function(){
    $('.gridtab-2').gridtab({
        grid: 4,
        config: {
            layout: 'tab'
        },
        callbacks: {
            open: function() {
                console.log('open');
            },
            close: function() {
                console.log('close');
            }
        },
        responsive: [{
            breakpoint: 991,
            settings: {

                grid: 3,
            }
        }, {
            breakpoint: 767,
            settings: {
                grid: 2,
            }
        }, {
            breakpoint: 520,
            settings: {
                grid: 1,
            }
        }]
    });
    
});




