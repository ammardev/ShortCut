var tid = setInterval( function () {

    if ( document.readyState !== 'complete' ) return;
    clearInterval( tid );
    var copyBtn = document.querySelector('.copyBtn');

    copyBtn.addEventListener('click', function(event) {
        var copyText = document.querySelector('.copyText');
        copyText.select();

        try {
            var successful = document.execCommand('copy');
            var msg = successful ? 'successful' : 'unsuccessful';
            console.log('Copying text command was ' + msg);
        } catch (err) {
            console.log('Error: can not copy.');
        }
    });


}, 100 );
function home() {
    window.location.href = window.location.href.split('?')[0];
}